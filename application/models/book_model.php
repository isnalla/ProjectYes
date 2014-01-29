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
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function insertBook($data){
        $this->db->query("INSERT INTO book (book_no,book_title,description,publisher,date_published)".
                                                  " VALUES ('{$data['book_no']}'".
                                                  ",'{$data['book_title']}'".
                                                  ",'{$data['description']}'".
                                                  ",'{$data['publisher']}'".
                                                  ",'{$data['date_published']}')");
    }
 
    function delBook($book_no){

        $this->db->query("DELETE FROM book WHERE book_no='{$book_no}'");
    }

    function editBook($data){
        $sql="UPDATE book SET book_no='{$data['book_no']}'".
                                    ",book_title='{$data['book_title']}'".
                                    ",description='{$data['book_no']}'".
                                    ",publisher='{$data['publisher']}'".
                                    ",date_published='{$data['date_published']}'".
                                    ", WHERE book_no='{$data['prev_book_no']}'";
        $this->db->query($sql);
    }




}

/* End of file booker.php */
/* Location: ./application/controllers/booker.php */