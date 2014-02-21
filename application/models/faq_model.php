<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends CI_Model {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

     function add_faq($data){
        $query = "INSERT INTO faq (question,answer)".
            " VALUES ('{$data['question']}'".
            ",'{$data['answer']}'".")";

        $this->db->query($query);
    }
}






/* End of file book.php */
/* Location: ./application/controllers/book.php */