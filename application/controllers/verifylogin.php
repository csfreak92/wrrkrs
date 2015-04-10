<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: December 25, 2014
| Latest Updates: 
|		* Created brief descriptions and comments
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Verifylogin.php 
|--------------------------------------------------------------------------
|
| This file is the user-defined controller for the login module of this project.
| This does further the execution of all the functions and verifications 
| required for logging a user if he/she is allowed to access the system.
|
*/


class Verifylogin extends CI_Controller {
	
	/*
	|--------------------------------------------------------------------------
	| __construct 
	|--------------------------------------------------------------------------
	|
	| This is the constructor for this controller that inherits base class
	| constructor properties of Codeigniter. It also loads the model login_model
	| preparing the succeeding function calls for using that model 
	|
	*/
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('login_model', '', TRUE);
	}

	/*
	|--------------------------------------------------------------------------
	| index 
	|--------------------------------------------------------------------------
	|
	| This method will have the credentials validation of the values
	| entered by the user in the login form. If form validation succeeds
	| this method redirects the user to a secured page (main page of the system),
	| else if the form validation fails, the user is redirected back to the login page.
	|
	*/
	public function index() 
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
		if ($this->form_validation->run() == FALSE) 
		{
			// field validation failed. user redirected to login page.
			$this->load->view('login_view');
		} 
		else
		{
			// enter secured page	
			// session_start();
			redirect('core/secured_page', 'refresh');
		}
	}

	/*
	|--------------------------------------------------------------------------
	| check_database 
	|--------------------------------------------------------------------------
	|
	| This method will have the credentials of the user by querying from the 
	| login_model if the user is registered in the system. If credential checking
	| succeeds, a session is set for the user; else an error message is produced.
	|
	*/
	public function check_database( $password )
	{
		// field validation succeeded. validate against database
		$username = $this->input->post('username');
		// query the database
		$result = $this->login_model->login($username, $password);

		if($result) {
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'username' => $row->username, 
					'password' => $row->password
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
}


?>