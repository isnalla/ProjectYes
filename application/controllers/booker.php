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
        $data['book_no'] = $_GET['book_no'];
        $data['book_title'] = $_GET['book_title'];
        $data['description'] = $_GET['description'];
        $data['publisher'] = $_GET['publisher'];
        $data['date_published'] = $_GET['date_published'];
        $data['tags'] = $_GET['tags'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('book_no','BookNumber','required|is_unique[ics-lib-db.Book_no]|min_length[1]|alpha_numeric');
        $this->form_validation->set_rules('book_title','BookTitle','required' );
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('publisher','Publisher','required');
        $this->form_validation->set_rules('date_published','DatePublished','required');
        $this->form_validation->set_rules('tags','Tags','callback_tags_check');
        $this->book_model->insertBook($data);

        if ($this->form_validation->run()==FALSE){

            $this->load->view(manage_view);

        }
        else{
            $this->load->view(views/index.html);


        }
        public function tags_check($str)
        {
            return ( ! preg_match("/^([a-zA-Z0-9 ]+,)*([a-zA-Z0-9]*)$/", $str)) ? FALSE : TRUE;
        }
    }

    public function delete(){
        $book_no = $_GET['book_no'];
        $this->book_model->delBook($book_no);
        $this->index();
    }

    public function edit(){
        $data['prev_book_no'] = $_GET['prev_book_no'];
        $data['book_no'] = $_GET['book_no'];
        $data['book_title'] = $_GET['book_title'];
        $data['description'] = $_GET['description'];
        $data['publisher'] = $_GET['publisher'];
        $data['date_published'] = $_GET['date_published'];

        $this->book_model->editBook($data);
    }

    public function index()
    {
        $data['title'] = "Sample";
        $this->load->view('manage_view',$data);

        if(isset($_GET['edit_submit'])){
            var_dump($this->book_model->editBook($_GET['book_no_edit']));
            $res = $this->book_model->editBook($_GET['book_no_edit']);
            $newData=($res[0]->book_title);
            echo "<script> $('input[type=\"text\"][id=\"book_title\"]').val('".$newData."') </script>";
        }
        elseif(isset($_GET['save_edit_submit'])){

        }
        /*ayusin mo to allan!!!*/
        /*elseif(isset($_GET['edit_submit'])){
            var_dump($this->book_model->editBook($_GET['book_no_edit']));
            $res = $this->book_model->editBook($_GET['book_no_edit']);
            $newData=($res[0]->book_title);
            echo "<script> $('input[type=\"text\"][id=\"book_title\"]').val('".$newData."') </script>";
        }*/
        elseif(isset($_GET['save_edit_submit'])){

        }
        else{

        }
    }
}

/* End of file booker.php */
/* Location: ./application/controllers/booker.php */