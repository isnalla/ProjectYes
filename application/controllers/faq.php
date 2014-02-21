<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('faq_model');
    }

    public function index(){
        $data['title'] = "eICS Lib FAQ";
        $this->load->view("header", $data);
       
        $this->load->view("faq_manage_view");
        //$this->load->view("faq_view");
        //$is_admin = isset($_SESSION['type']) && $_SESSION['type'] == "admin";
        //if ($is_admin) $this->load->view('manage_view');

        $this->load->view("footer");
    }

    public function add(){
        $data['question'] = filter_var($_POST['question'], FILTER_SANITIZE_MAGIC_QUOTES);
        $data['answer'] = filter_var($_POST['answer'], FILTER_SANITIZE_MAGIC_QUOTES);
        $this->faq_model->add_faq($data);

        echo json_encode($_POST);
    }

}

/* End of file faq.php */
/* Location: ./application/controllers/faq.php */