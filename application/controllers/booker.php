<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booker extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct(){
        parent::__construct();
        $this->load->model('book_model');
    }

    public function add(){
        $data['book_no'] = $_POST['book_no'];
        $data['book_title'] = $_POST['book_title'];
        $data['description'] = $_POST['description'];
        $data['author'] = $_POST['author'];
        $data['publisher'] = $_POST['publisher'];
        $data['date_published'] = $_POST['date_published'];
        $data['tags'] = $_POST['tags'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('book_no','BookNumber','required|is_unique[ics-lib-db.Book_no]|min_length[1]|alpha_numeric');
        $this->form_validation->set_rules('book_title','BookTitle','required' );
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('publisher','Publisher','required');
        $this->form_validation->set_rules('date_published','DatePublished','required');
        $this->form_validation->set_rules('tags','Tags','callback_tags_check');

        $this->book_model->insertBook($data);

        echo json_encode($_POST);
        /* ???
        if ($this->form_validation->run()==FALSE){

            $this->load->view('manage_view');

        }
        else{
            $this->load->view('views/index.html');
        }
        */

    }

    public function delete(){
        $book_no = $_POST['book_no'];
        $this->book_model->delBook($book_no);
    }

    public function edit(){
        //$data['prev_book_no'] = $_POST['prev_book_no']; //temporarily commented out
        $data['book_no'] = $_POST['book_no'];
        $data['book_title'] = $_POST['book_title'];
        $data['author'] = $_POST['author'];
        $data['status'] = $_POST['book_status'];
        $data['description'] = $_POST['description'];
        $data['publisher'] = $_POST['publisher'];
        $data['tags'] = $_POST['tags'];
        $data['date_published'] = $_POST['date_published'];

        $this->book_model->editBook($data);
    }

    public function display_views($data){

        $this->load->view('header',$data);
        $this->load->view('search_view');
        $this->load->view('table_view',$data);
        $this->load->view('manage_view',$data);
        $this->load->view('footer');
    }

    public function index(){
        $this->load->library('javascript');
        $data['title'] = "eICS Lib";
        $data['is_admin'] = true;

        if (isset($_POST["submit_search"])){
            $data['table'] = $this->search($this->get_search_input());
        }else if(isset($_POST['submit_edit'])){
            $this->edit();
        }

        $this->display_views($data);
    }



    public function get_search_input(){
        //parameters needed for the search function
        if (isset($_POST['search'])) $input['search_term'] = $_POST['search'];
        if (isset($_POST['search_by'])) $input['search_by'] = $_POST['search_by'];
        if (isset($_POST['order_by'])) $input['order_by'] = $_POST['order_by'];

        $input['available'] = isset($_POST["available"]);
        $input['borrowed'] = isset($_POST["borrowed"]);
        $input['reserved'] = isset($_POST["reserved"]);

        return $input;
    }


    public function search($input){
        //set defaults
        $search_term = "";
        $search_by = "book_title";
        $order_by = "a.book_no";
        $status_check = "status='available' or status='borrowed' or status='reserved'";

        $booktitle_points = 7;
        $bookdesc_points = 3;
        $booktags_points = 1;


        if (isset($input['search_term']) && isset($input['search_by'])){
            //filter by book status
            if (!$input["available"]) $status_check = str_replace("status='available' or ","",$status_check);
            if (!$input["borrowed"]) $status_check = str_replace("status='borrowed' or ","",$status_check);
            if (!$input["reserved"]){
                $status_check = str_replace(" or status='reserved'","",$status_check);
                $status_check = str_replace("status='reserved'","",$status_check);
            }

            if($search_by == "book_no") $search_by = "a.book_no";
            if($order_by == "book_no") $order_by = "a.book_no";
        }

        if($status_check!="") $status_check = "(" . $status_check . ") and";
        else $status_check = "(0=1) and";

        $details = array(
            'search_term'   => $input['search_term'],
            'search_by'     => $input['search_by'],
            'order_by'      => $input['order_by'],
            'status_check'  => $status_check
        );

        $table = $this->book_model->query_result($details);
        
        if ($table == null) return null;

        foreach($table as $row):
            //clone table
            $table_copy[$row->book_no] = $row;

            //transform input and words to search into arrays
            $arr        = explode(" ", $input['search_term']);
            $booktitle  = explode(" ", $row->book_title);
            $descr      = explode(" ", $row->description);
            $tg         = explode(",", $row->Tags);

            //reset points for each row
            $points[$row->book_no] = 0;

            //compare each search term/word to each of the words in the book title, description, tags
            foreach ($arr as $maila):
                $maila = strtolower($maila);

                //compare input to book title words, follow point system
                foreach($booktitle as $ysa):
                    $ysa = strtolower($ysa);
                    if ($maila == "") continue;

                    if(strcasecmp($maila, $ysa)==0){
                        $points[$row->book_no] += $booktitle_points;                   
                    } else if (strpos($ysa, $maila) !== false && strlen($maila) / strlen($ysa) > 0.70){
                        $points[$row->book_no] += $booktitle_points * (strlen($maila) / strlen($ysa));
                        // echo strlen($maila) / strlen($ysa);
                    }
                endforeach;

                //compare input to description words
                foreach($descr as $ysa1):
                    if(strcasecmp($maila, $ysa1)==0){
                          $points[$row->book_no] +=  $bookdesc_points;
                    }
                endforeach;

                //compare input to tags
                foreach($tg as $ysa2):
                    if(strcasecmp($maila, trim($ysa2))==0){
                         $points[$row->book_no] +=  $booktags_points;
                    }
                endforeach;
            endforeach;
        endforeach;

        //reverse sort $points structure by value
        arsort($points);

        //copy the sorted table to $table
        $counter = 0;
        foreach ($points as $key => $value):
                // echo $key . " " . $value . "<br>";
                $table[$counter++] = $table_copy[$key];
        endforeach;

        return $table;

    }

}

/* End of file booker.php */
/* Location: ./application/controllers/booker.php */