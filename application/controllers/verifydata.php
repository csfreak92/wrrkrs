<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: April 12, 2014
| Latest Updates: 
|		* Created brief descriptions and comments
		* updated the login mechanism since it has a bug due to the database design. now fixed
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


class Verifydata extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('job_model', '', TRUE);
	}

	public function index() 
	{		
		;
	}

	public function verify_jobpost()
	{
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type
        );
		$this->form_validation->set_rules('job_name', 'Job Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_description', 'Job Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_type', 'Job Type', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_duration', 'Job Duration', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_level', 'Job Level', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_category', 'Job Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_requirements', 'Job Requirements', 'trim|required|xss_clean');
		$this->form_validation->set_rules('job_keywords', 'Job Keywords', 'trim|required|xss_clean');
		$data['notif'] = "";
		if ($this->form_validation->run() == FALSE) 
		{	// field validation failed. user redirected to job posting page with error messages.
			$data['username'] = $user_full;
			$this->load->helper('form');
			$dur_arr = array();
			$lev_arr = array();
			$cat_arr = array();
			$type_arr = array();
			$dur = $this->job_model->get_job_durations();
			$lev = $this->job_model->get_job_levels();
			$cat = $this->job_model->get_job_categories();
			$types = $this->job_model->get_job_types();
			foreach($dur as $val)
				$dur_arr[$val->duration_name] = $val->duration_name;
			foreach($lev as $val)
				$lev_arr[$val->level_name] = $val->level_name;
			foreach($cat as $val)
				$cat_arr[$val->category_name] = $val->category_name;
			foreach($types as $val)
				$type_arr[$val->type_name] = $val->type_name;
			$data['duration'] = $dur_arr;
			$data['level'] = $lev_arr;
			$data['category'] = $cat_arr;
			$data['type'] = $type_arr;
			$this->load->view('employers/findworker_view', $data);
		} 
		else
		{	// go back to job posting page
			$this->load->library('../controllers/core');
			$this->core->proceed_jobpost();
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

		if($result) 
		{
			$sess_array = array();
			foreach($result as $row)
			{
				if($row->user_type == "employer")
				{
					$sess_array = array(
						'username' => $row->emp_username, 
						'password' => $row->emp_password, 
						'usertype' => $row->user_type, 
						'fullname' => $row->emp_first_name." ".$row->emp_middle_initial." ".$row->emp_last_name
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
				else if($row->user_type == "freelancer")
				{
					$sess_array = array(
						'username' => $row->freelancer_username, 
						'password' => $row->freelancer_password, 
						'usertype' => $row->user_type, 
						'fullname' => $row->freelancer_first_name." ".$row->freelancer_middle_initial." ".$row->freelancer_last_name
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
				else 
					;
			}
			return TRUE;
		} 
		else 
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}

	public function verify_signup()
	{
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type
        );
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('middleinitial', 'Middle Initial', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sex', 'Sex', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
		$this->form_validation->set_rules('stateprovreg', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact', 'Contact Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$data['notif'] = "";
		$usertype = $this->input->post('usertype');
		if ($this->form_validation->run() == FALSE) 
		{	// field validation failed. user redirected to user signup page with error messages.
			$data['username'] = $user_full;
			$data['usertype'] = $usertype;
			$this->load->helper('form');
			$this->load->view('signup_page', $data);
		} 
		else
		{	// go proceed with processing signup data
			$this->load->library('../controllers/core');
			$this->core->proceed_signup();
		}
	}

} // end of class definition