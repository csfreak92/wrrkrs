<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: April 10, 2015
| Version: 1.0
| Latest Updates: 
	* started the signing up and user creation functions
| Bugs to fix: 
|
| Things to add: 
	* backend codes for sending an email to the user and then confirmation of the user
|--------------------------------------------------------------------------
*/

class Core extends CI_Controller {

	// public function __construct()
	// {
		// $this->load->model('outreach_model');
	// }
		

	// public function index()
	// {
	// 	$this->mainpage();
	// }

	public function secured_page()
	{
		$this->load->view('mainpage');
	}

	public function signup()
	{
		// $this->load->model('employer_model');
		$this->load->view('signup_view');
	}

	public function signup_user_employer()
	{
		$this->load->model('employer_model');
		$user 	= $this->input->post('emp_username');
		$pass 	= $this->input->post('emp_password');
		$first 	= $this->input->post('emp_first_name');
		$middle = $this->input->post('emp_middle_initial');
		$last 	= $this->input->post('emp_last_name');
		$sex 	= $this->input->post('emp_sex');
		$address= $this->input->post('emp_address');
		$city 	= $this->input->post('emp_city');
		$state	= $this->input->post('emp_state_province_region');
		$country= $this->input->post('emp_country');
		$zip	= $this->input->post('emp_zipcode');
		$contact= $this->input->post('emp_contact_number');
		$email  = $this->input->post('emp_email_add');

		$user_employer_data = array(
			'emp_username'			=> $this->db->escape_str($user), 
			'emp_password'			=> $this->db->escape_str($pass),
			'emp_first_name' 		=> $this->db->escape_str($first), 
			'emp_middle_initial' 	=> $this->db->escape_str($middle), 
			'emp_last_name' 		=> $this->db->escape_str($last), 
			'emp_sex' 				=> $this->db->escape_str($sex), 
			'emp_address' 			=> $this->db->escape_str($address), 
			'emp_city' 				=> $this->db->escape_str($city), 
			'emp_state_province_region' => $this->db->escape_str($state), 
			'emp_country' 			=> $this->db->escape_str($country), 
			'emp_zipcode' 			=> $this->db->escape_str($zip), 
			'emp_contact_number' 	=> $this->db->escape_str($contact), 
			'emp_email_add' 		=> $this->db->escape_str($email)
		);

		$emp_ret = $this->employer_model->create_user_employer( $user_employer_data );
		if($emp_ret == 1)
		{
			// meaning it is successfully created
			// do something in the UI frontend telling the user that his/her account is created
			// and he/she must check his/her email for confirmation
		}
		else
		{
			// meaning creation of user is not successfully done
			// do something in the UI frontend telling the user about an error that occurred
			// redirect page to redo signing up again. 
		}
		// redirect('outreach/students', 'refresh');
	}

	public function signup_user_freelancer()
	{
		$this->load->model('freelancer_model');
		$user 	= $this->input->post('freelancer_username');
		$pass 	= $this->input->post('freelancer_password');
		$first 	= $this->input->post('freelancer_first_name');
		$middle = $this->input->post('freelancer_middle_initial');
		$last 	= $this->input->post('freelancer_last_name');
		$sex 	= $this->input->post('freelancer_sex');
		$address= $this->input->post('freelancer_address');
		$city 	= $this->input->post('freelancer_city');
		$state	= $this->input->post('freelancer_state_province_region');
		$country= $this->input->post('freelancer_country');
		$zip	= $this->input->post('freelancer_zipcode');
		$contact= $this->input->post('freelancer_contact_number');
		$email  = $this->input->post('freelancer_email_add');

		$user_freelancer_data = array(
			'freelancer_username'		=> $this->db->escape_str($user), 
			'freelancer_password'		=> $this->db->escape_str($pass),
			'freelancer_first_name' 	=> $this->db->escape_str($first), 
			'freelancer_middle_initial' => $this->db->escape_str($middle), 
			'freelancer_last_name' 		=> $this->db->escape_str($last), 
			'freelancer_sex' 			=> $this->db->escape_str($sex), 
			'freelancer_address' 		=> $this->db->escape_str($address), 
			'freelancer_city' 			=> $this->db->escape_str($city), 
			'freelancer_state_province_region' => $this->db->escape_str($state), 
			'freelancer_country' 		=> $this->db->escape_str($country), 
			'freelancer_zipcode' 		=> $this->db->escape_str($zip), 
			'freelancer_contact_number' => $this->db->escape_str($contact), 
			'freelancer_email_add' 		=> $this->db->escape_str($email)
		);

		$free_ret = $this->freelancer_model->create_user_freelancer( $user_freelancer_data );
		if($free_ret == 1)
		{
			// meaning it is successfully created
			// do something in the UI frontend telling the user that his/her account is created
			// and he/she must check his/her email for confirmation
		}
		else
		{
			// meaning creation of user is not successfully done
			// do something in the UI frontend telling the user about an error that occurred
			// redirect page to redo signing up again. 
		}
		// redirect('outreach/students', 'refresh');
	}

	public function post_job()
	{
		$this->load->model('job_model');
		$code = $this->input->post('job_code');
		$name = $this->input->post('job_name');
		$desc = $this->input->post('job_description');
		$type = $this->input->post('job_type');
		$duration = $this->input->post('job_duration');
		$level = $this->input->post('job_level');
		$category = $this->input->post('job_category');
		$req = $this->input->post('job_requirements');
		// job code must be a unique job coding autogenerated by the backend for a different purpose
		// if($level == 1)
			// $code = "ENL".
		$job_data = array(
			'job_code'	=> $this->db->escape_str($code), 
			'job_name'	=> $this->db->escape_str($name), 
			'job_description' => $this->db->escape_str($desc), 
			'job_type' => $this->db->escape_str($type), 
			'job_duration' => $this->db->escape_str($duration), 
			'job_level' => $this->db->escape_str($level), 
			'job_category' => $this->db->escape_str($category), 
			'job_requirements' => $this->db->escape_str($req)
		);

		$job_ret = $this->freelancer_model->create_job_posting( $job_data );
		if($job_ret == 1)
		{
			// meaning it is successfully created
			// do something in the UI frontend telling the user that his/her account is created
			// and he/she must check his/her email for confirmation
		}
		else
		{
			// meaning creation of user is not successfully done
			// do something in the UI frontend telling the user about an error that occurred
			// redirect page to redo signing up again. 
		}
		// redirect('outreach/students', 'refresh');
	}

	public function apply_for_job()
	{
		$this->load->model('job_model');
		// there is a problem in the database design here... will get back to it later.
	}

	public function search_for_job()
	{
		$this->load->model('job_model');
		$this->job_model->search_job_postings();
	}


}

?>