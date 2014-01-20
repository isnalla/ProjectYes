<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

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


    }

    function insertBook(){
        $this->db->query("INSERT INTO book VALUES ('{$_GET['book_no']}','{$_GET['book_title']}','{$_GET['status']}','{$_GET['description']}','{$_GET['publisher']}','{$_GET['date_published']}')");
    }

    function delBook($data){

        $this->db->query("DELETE FROM book WHERE book_no='{$data}'");
    }


}

/* End of file booker.php */
/* Location: ./application/controllers/booker.php */