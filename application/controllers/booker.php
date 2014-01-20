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
    public function index()
    {
        $data['title'] = "Sample";
        $this->load->view('manage_view',$data);
        $this->load->model('book_model');
        if(isset($_GET['add_submit'])){
            $this->book_model->insertBook();
        }
        elseif(isset($_GET['del_submit'])){
            $this->book_model->delBook($_GET['book_no_del']);
        }
        else{
            echo 'hello';
        }
    }
}

/* End of file booker.php */
/* Location: ./application/controllers/booker.php */