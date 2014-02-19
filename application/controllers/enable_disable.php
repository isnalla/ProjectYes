<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Author: Billy Joel Arlo T. Zarate
	File Description : This document is the controller of the search module for user accounts
*/
class Enable_disable extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');//loads the form helper
		$this->load->library('session');//loads the session library
		if(!isset($_SESSION))
			session_start();
	}

	public function index()
	{
		$this->load->view('enable_disable_view');//loads the view
	}

	public function search()
	{
		$data['field'] = $_POST["field"];//copies the data from $_POST to an array
		switch($_POST["field"]){
			case "name": {
				$data['fname'] = $_POST["firstname"];
				$data['mname'] = $_POST["middlename"];
				$data['lname'] = $_POST["lastname"];
				break;
			}

			case "stdno": {
				$data['student_no'] = $_POST["studentno"];
				break;
			}

			case "uname": {
				$data['username'] = $_POST["username"];
				break;
			}

			case "email": {
				$data['email'] = $_POST["emailadd"];
				break;
			}
		}
		$data['status'] = $_POST["status"];
		$this->load->model('enable_disable_model');
		$this->session->set_userdata('sql', $this->enable_disable_model->generateQuery($data));//puts the sql query to the session
		$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));//gets the result from the query
		$array['result'] = $result;							//passes the result to the view 
		$this->load->view('enable_disable_view', $array);	//loads the view with the results
	}


	/*
		sample ajax call
		$.ajax({
			url : "http://localhost/myfirstrepo/index.php/enable_disable/activate/"+ username +"/"+ student_no + "/" + email,
			type : 'POST',
			dataType : "html",
			async : true,
			success: function(data) {}
		});
				
	*/

	public function activate($username, $student_no, $email)
	{
		/*
			activates a user account
		*/

		$admin = $_SESSION['username'];//hardcoded
		$action = "activate";//hardcoded

		$this->load->model('enable_disable_model');//loads model
		if($this->enable_disable_model->activate($username, $student_no, $email))//calls function activate
			$this->enable_disable_model->log($admin, $username, $email, $action);//calls function log from model if activate returns true

		//will not be used if this function was called using AJAX	
		$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));	//refreshes
		$array['result'] = $result;															//page
		$this->load->view('enable_disable_view', $array);									//with same query

		//used for AJAX implementation
		$json = array('success' => $success);
		echo json_encode($json);
	}

	/*
		sample ajax call
		$.ajax({
			url : "http://localhost/myfirstrepo/index.php/enable_disable/disable/"+ username +"/"+ student_no + "/" + email,
			type : 'POST',
			dataType : "html",
			async : true,
			success: function(data) {}
		});
	*/

	public function enable($username, $student_no, $email)
	{
		/*
			enables a user account
		*/
		$admin = $_SESSION['username'];//hardcoded
		$action = "enable";//hardcoded

		$this->load->model('enable_disable_model');//loads model
		if($this->enable_disable_model->enable($username, $email))//calls function enable from model
			$this->enable_disable_model->log($admin, $username, $email, $action);//calls function log from model if enable returns true
		
		//will not be used if this function was called using AJAX
		$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));	//refreshes
		$array['result'] = $result;															//page
		$this->load->view('enable_disable_view', $array);									//with the same query
		
		//return value for AJAX implementation
		$json = array('success' => $success);
		echo json_encode($json);
	}

	/*
		sample ajax call
		$.ajax({
			url : "http://localhost/myfirstrepo/index.php/enable_disable/enable/"+ username +"/"+ student_no + "/" + email,
			type : 'POST',
			dataType : "html",
			async : true,
			success: function(data) {}
		});
	*/

	public function disable($username, $student_no, $email)
	{
		/*
			disables a user account
		*/
		$admin = $_SESSION['username'];//hardcoded
		$action = "disable";//hardcoded

		$this->load->model('enable_disable_model');//loads model
		if($this->enable_disable_model->disable($username, $student_no, $email))//calls function disable from model
			$this->enable_disable_model->log($admin, $username, $email, $action);//calls function log from model if disable returns true
		
		//will not be used if this function was called using AJAX
		$result = $this->enable_disable_model->runQuery($this->session->userdata('sql'));	//refreshes
		$array['result'] = $result;															//page
		$this->load->view('enable_disable_view', $array);									//with same query

		//return value for AJAX implementation
		$json = array('success' => $success);
		echo json_encode($json);
	}
}

/* End of file enable_disable.php */
/* Location: ./application/controllers/enable_disable.php */