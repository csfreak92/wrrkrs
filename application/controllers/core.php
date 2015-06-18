<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: May 23, 2015
| Version: 1.0
| Latest Updates: 
	* created more functions and important core modules
	* added employer main modules and functionalities
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
		
	/*
	|--------------------------------------------------------------------------
	| index()
	|--------------------------------------------------------------------------
	|
	| This is the default function of the controller in case the user tries 
	| anything not relevant and could cause bugs. This prevents it.
	| 
	*/
	public function index()
	{
		$this->secured_page();
	}

	/*
	|--------------------------------------------------------------------------
	| security_breach_cheker()
	|--------------------------------------------------------------------------
	|
	| This function checks if the session of the logged in user is still active.
	| If it has expired already, then the user will be redirected to the login 
	| page through the login controller.
	| 
	*/
	private function security_breach_checker()
	{
		// security breach checker
        if ($this->session->userdata('logged_in')) 
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
        } 
        else 
        { // if no session, redirect to login page
            redirect('login', 'refresh');
        }
	}

	/*
	|--------------------------------------------------------------------------
	| secured_page()
	|--------------------------------------------------------------------------
	|
	| This function checks the user type of the logged in user and loads the 
	| appropriate views depending on what user type it is. Employers have different
	| workspaces with freelancers.
	| 
	*/
	public function secured_page()
	{
		$this->security_breach_checker();
        // session_start();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type
        );
        if($type == "employer")
        {
        	// load employer view
        	$data['username'] = $user_full;
        	$this->load->view('employers/employer_mainpage', $data);
        }
        if($type == "freelancer")
        {
        	// load freelancer view
			$data['username'] = $user_full;
        	$this->load->view('freelancers/freelancer_mainpage', $data);
        }
	}

	/*
	|--------------------------------------------------------------------------
	| signup()
	|--------------------------------------------------------------------------
	|
	| This function checks the user type of the logged in user and loads the 
	| appropriate sign up pages/views depending on what user type it is. 
	| Employers need to provide different information also as freelancers.
	| 
	*/
	public function signup()
	{
		$free = $this->input->post('freelancers');
		$jobs = $this->input->post('jobs');
		if($free == "Find Freelancers")
		{
			$data['usertype'] = "employer";
			$this->load->view('signup_page', $data);
		}
		else if($jobs == "Find Jobs")
		{
			$data['usertype'] = "freelancer";
			$this->load->view('signup_page', $data);
		}
		else
		{
			$data['usertype'] = "freelancer";
			$this->load->view('signup_page', $data);	
		}
	}

	/*
	|--------------------------------------------------------------------------
	| signup_user() !check function usage
	|--------------------------------------------------------------------------
	|
	| This function checks the user type of the logged in user and loads the 
	| appropriate sign up pages/views depending on what user type it is. 
	| Employers need to provide different information also as freelancers.
	| 
	*/
	public function signup_user()
	{
		$this->load->library('../controllers/verifydata');
		$this->verifydata->verify_signup();
	}

	public function proceed_signup()
	{
		$usertype = $this->input->post('usertype');
		$first = $this->input->post('firstname');
		$middle = $this->input->post('middleinitial');
		$last = $this->input->post('lastname');
		$sex = $this->input->post('sex');
		$address = $this->input->post('address');
		$city 	= $this->input->post('city');
		$state	= $this->input->post('stateprovreg');
		$country= $this->input->post('country');
		$zip	= $this->input->post('zip');
		$contact= $this->input->post('contact');
		$email  = $this->input->post('email');
		$user 	= $this->input->post('username');
		$pass 	= $this->input->post('password');
		if($usertype == "freelancer")
		{
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
				'freelancer_email_add' 		=> $this->db->escape_str($email), 
				'user_type'					=> $this->db->escape_str($usertype)	
			);

			$free_ret = $this->freelancer_model->create_user_freelancer( $user_freelancer_data );
			if($free_ret == 1)
			{
				// meaning it is successfully created
				// do something in the UI frontend telling the user that his/her account is created
				// and he/she must check his/her email for confirmation
				$data['response'] = $free_ret;
				$this->load->view('confirmation_page', $data);
			}
			else
			{
				// meaning creation of user is not successfully done
				// do something in the UI frontend telling the user about an error that occurred
				// redirect page to redo signing up again. 
				$data['response'] = $free_ret;
				$this->load->view('errorsignup_page', $data);
			}
			// redirect('outreach/students', 'refresh');
		}
		else if($usertype == "employer")
		{
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
				'emp_email_add' 		=> $this->db->escape_str($email), 
				'user_type'				=> $this->db->escape_str($usertype)
			);

			$emp_ret = $this->employer_model->create_user_employer( $user_employer_data );
			if($emp_ret == 1)
			{
				// meaning it is successfully created
				// do something in the UI frontend telling the user that his/her account is created
				// and he/she must check his/her email for confirmation
				$data['response'] = $emp_ret;
				$this->load->view('confirmation_page', $data);
			}
			else
			{
				// meaning creation of user is not successfully done
				// do something in the UI frontend telling the user about an error that occurred
				// redirect page to redo signing up again. 
				$data['response'] = $emp_ret;
				$this->load->view('errorsignup_page', $data);
			}
			// redirect('outreach/students', 'refresh');
		}
	}

	/*
	|--------------------------------------------------------------------------
	| signup_user_employer() !check function usage
	|--------------------------------------------------------------------------
	|
	| This function creates an employer record in the database with the corresponding
	| employer fields as posted. 
	| 
	*/
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

	/*
	|--------------------------------------------------------------------------
	| signup_user_freelancer() !check function usage
	|--------------------------------------------------------------------------
	|
	| This function creates a freelancer record in the database with the corresponding
	| freelancer fields as posted. 
	| 
	*/
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
		$this->security_breach_checker();		
		$this->load->library('../controllers/verifydata');
		$this->verifydata->verify_jobpost();
	}

	public function proceed_jobpost()
	{ 	//!notice: getback here
		// this module is not yet finished
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		// retrieve area code of the job poster/employer
		$emp_id = $this->employer_model->get_employer_id($credential_data);
		$prof = $this->employer_model->get_employercode_profile($emp_id);
		$country = "";
		$city = "";
		$prov = "";
		$name = "";

		$code = "";
		foreach($prof as $row)
		{
			$country = $row->emp_country;
			$city = $row->emp_city;
			$prov = $row->emp_state_province_region;
			$name = $row->emp_username;
		}
		// create job code from area code and company code
		/* 
		I THINK JOB CODE MUST CONTAIN CITY CODE, COMPANY CODE AND AREA CODE
		SOMETHING LIKE STATE, PROVINCE, REGION CODE WILL ALSO DO
		REMEMBER TO USE ONLY UP TO 15 CHARACTERS FOR THE JOB CODE SINCE ITS 
		VARCHAR(15) DATA ONLY IN THE DATABASE STRUCTURE!
		*/
		$str = substr($name, 0, 2);
		$fin = strtoupper($str);
		var_dump($fin);
		$code += $fin;
		// THIS IS NOT YET FINISHED
		$str = substr($city, 0, 3);
		$fin = strtoupper($str);
		var_dump($fin);

		// $code = $this->input->post('job_code');
		$name = $this->input->post('job_name');
		$desc = $this->input->post('job_description');
		$type = $this->input->post('job_type');
		$duration = $this->input->post('job_duration');
		$level = $this->input->post('job_level');
		$category = $this->input->post('job_category');
		$req = $this->input->post('job_requirements');
		$key = $this->input->post('job_keywords');
		$job_data = array(
			'job_code' => $this->db->escape_str($code), 
			'job_name' => $this->db->escape_str($name), 
			'job_description' => $this->db->escape_str($desc), 
			'job_type' => $this->db->escape_str($type), 
			'job_duration' => $this->db->escape_str($duration), 
			'job_level' => $this->db->escape_str($level), 
			'job_category' => $this->db->escape_str($category), 
			'job_requirements' => $this->db->escape_str($req), 
			'job_keywords' => $this->db->escape_str($key)
		);
		var_dump($job_data);
		$job_ret = $this->job_model->create_job_posting( $job_data );
		$data['job_ret'] = $job_ret;
		$data['notif'] = $job_ret;
		var_dump($job_ret);
		if($job_ret == 1)
		{	// meaning it is successfully created
			// do something in the UI frontend telling the user that the job is posted
			// $this->session->set_flashdata('notif', $data);
			// redirect('core/notify_post');
			$this->load->view('employers/findworker_view', $data);
		}
		else
		{
			// meaning creation of user is not successfully done
			// do something in the UI frontend telling the user about an error that occurred
			// redirect page to redo signing up again. 
			$this->load->view('employers/findworker_view', $data);
		}
		// // redirect('outreach/students', 'refresh');
	}

	public function notify_post()
	{
		$this->security_breach_checker();
		$notif = $this->session->flashdata('notif');
		$data['notif'] = $notif;
		$this->load->view('employers/findworker_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| apply_for_job()
	|--------------------------------------------------------------------------
	|
	| This function creates a freelancer record in the database with the corresponding
	| freelancer fields as posted. 
	| 
	*/
	public function apply_for_job()
	{
		$this->security_breach_checker();
		$this->load->model('job_model');
		// there is a problem in the database design here... will get back to it later.
	}

	/*
	|--------------------------------------------------------------------------
	| apply_to_job()
	|--------------------------------------------------------------------------
	|
	| This function creates a job application record in the database 
	| with the freelancers information. This adds a record in the job_applications
	| and job_application_record tables in the database. job_application_record pertain
	| to the applications of the freelancer while job_applications pertain to the 
	| records of all jobs that had applications to.
	| 
	*/
	public function apply_to_job()
	{
		$this->security_breach_checker();
		$btn = $this->input->post('jobappsubmitbtn');
		$hid = $this->input->post('hiddenid');
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $free_array = $this->freelancer_model->get_freelancer_id($credential_data);
        foreach($free_array as $col)
        {
        	$free_id = $col->freelancer_id;
        }
        $date = date('M/d/Y');
		if($btn == "Apply Now")
		{	
			$record = array(
				'freelancer_id' => $free_id, 'job_id' => $hid, 'status' => "pending", 'application_date' => $date
			);
			$this->freelancer_model->add_job_application_record( $record, $hid );
			echo "SUCCESS! you have added a add_job_application_record!<br>";
			$application = array(
				'job_id' => $hid, 'job_application_status' => "pending"
			);
			$this->job_model->insert_job_application( $application );
			echo "SUCCESS! you have added a job_application!<br>";
		}
	}

	/*
	|--------------------------------------------------------------------------
	| search_for_job()
	|--------------------------------------------------------------------------
	|
	| This function searches for job postings in the database either by keywords
	| or geolocations as posted after the searchboxes.
	|
	| return encoded json search_results 
	*/
	public function search_for_job()
	{
		// !notice: this has an error when $key and $geo != ""
		// using the searchbtn in searchjobs_view
		$this->security_breach_checker();
		$this->load->model('job_model');
		$key = $this->input->post('searchbox');
		$geo = $this->input->post('searchgeoloc');
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );	

        $user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$search_results = "";
		if($key != "" && $geo == "")
			$search_results = $this->job_model->search_job_postings_bykey( $key );
		else if($geo != "" && $key == "")
			$search_results = $this->job_model->search_job_postings_byloc( $geo );
		else if($geo != "" && $key != "")
			$search_results = $this->job_model->search_job_postings_byloc( $geo );
		else 
			;
		echo json_encode( $search_results );
	}

	/*
	|--------------------------------------------------------------------------
	| home()
	|--------------------------------------------------------------------------
	|
	| This function loads the default home page.
	|
	*/
	public function home()
	{
		$this->security_breach_checker();
		$this->secured_page();
	}

	/*
	|--------------------------------------------------------------------------
	| searchfreelancers()
	|--------------------------------------------------------------------------
	|
	| This function loads the default home page as you search for freelancers.
	|
	*/
	public function searchfreelancers()
	{
		$this->security_breach_checker();
		$this->secured_page();
	}

	/*
	|--------------------------------------------------------------------------
	| freelancer_details()
	|--------------------------------------------------------------------------
	|
	| This function creates displays the freelancer details page. It contains 
	| all the necessary information for the employer to know about the freelancer.
	|
	| Parameters:
	| @id the freelancer id passed on the for the page
	*/
	public function freelancer_details( $id )
	{
		$this->security_breach_checker();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type
        );
        $data['username'] = $user_full;
        $prof = $this->freelancer_model->get_freelancer_profile( $id );
        // $data['profile'] = json_encode($prof);
        if($prof != "" || $prof != NULL || $prof != false)
        {
			foreach($prof as $row)
	        {
	        	$data['prof_pic'] = $row->freelancer_photo;
	        	$data['portfolio'] = $row->freelancer_portfolio_pics;
	        	$data['rating'] = $row->freelancer_rating;
	        	$data['title'] = $row->freelancer_title;
	        	$data['skills'] = $row->freelancer_skills;
	        	$data['summary'] = $row->freelancer_summary;
	        	$data['avail'] = $row->freelancer_availability;
	        	$data['educ'] = $row->freelancer_education;
	        	$data['user'] = $row->freelancer_username;
	        	$data['fullname'] = $row->freelancer_first_name." ".$row->freelancer_middle_initial." ".$row->freelancer_last_name;
	        	$data['sex'] = $row->freelancer_sex;
	        	$data['address'] = $row->freelancer_address.", ".$row->freelancer_city.", ".$row->freelancer_state_province_region." ".$row->freelancer_zipcode;
	        	$data['country'] = $row->freelancer_country;
	        	$data['contact'] = $row->freelancer_contact_number;
	        	$data['email'] = $row->freelancer_email_add;
	        }        	
        }
        if($type == "employer")
        	$this->load->view('employers/freelancer_details_view', $data);
        else	
			$this->load->view('freelancer_details_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| searchemployers()
	|--------------------------------------------------------------------------
	|
	| This function loads the search employer pages based on the user type.
	|
	*/
	public function searchemployers()
	{
		$this->security_breach_checker();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type
        );
        if($type == "employer")
        {
        	// load employer view
        	// $this->load->view('employer_mainpage');
        	$data['username'] = $user_full;
        	$this->load->view('search_employers_view', $data);
        }
        if($type == "freelancer")
        {
        	// load freelancer view
        	// $this->load->view('freelancer_mainpage');
        	$data['username'] = $user_full;
        	$this->load->view('search_employers_view', $data);
        }
	}

	/*
	|--------------------------------------------------------------------------
	| employer_details()
	|--------------------------------------------------------------------------
	|
	| This function creates displays the employer details page. It contains 
	| all the necessary information for the freelancer to know about the employer.
	|
	| Parameters:
	| @id the employer id passed on the for the page
	*/
	public function employer_details( $id )
	{
		$this->security_breach_checker();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type
        );
        $this->load->model('employer_model');
        $data['username'] = $user_full;
        $prof = $this->employer_model->get_employer_profile( $id );
        // var_dump($prof);
        // $data['profile'] = json_encode($prof);

        //!notice I NEED TO REDESIGN THE DATABASE TABLES FOR EMPLOYERS AND EMPLOYER PROFILES!!!!!
        foreach($prof as $row)
        {
        	$data['user'] = $row->emp_username;
        	$data['fullname'] = $row->emp_first_name." ".$row->emp_middle_initial." ".$row->emp_last_name;
        	$data['sex'] = $row->emp_sex;
        	$data['address'] = $row->emp_address.", ".$row->emp_city.", ".$row->emp_state_province_region." ".$row->emp_zipcode;
        	$data['country'] = $row->emp_country;
        	$data['contact'] = $row->emp_contact_number;
        	$data['email'] = $row->emp_email_add;
        	$data['rating'] = $row->emp_rating;
        	$data['type'] = $row->emp_type;
        	$data['summary'] = $row->emp_summary;
        	$data['photo'] = $row->emp_photo_logo;
        	$data['industry'] = $row->emp_industry;
        	$data['benefits'] = $row->emp_benefits;
        	$data['site'] = $row->emp_website;
        	$data['pics'] = $row->emp_portfolio_pics;
        }
		$this->load->view('employer_details_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| search_for_freelancer()
	|--------------------------------------------------------------------------
	|
	| This function does the actual searching for a particular freelancer either
	| the search field has a value or not. If there is not value in the search 
	| field, this will return all freelancers. If there is a value in the search 
	| field, this will return all freelancers that match the name, username, 
	| country, city or skills as entered.
	|
	| return encoded json search_results 
	*/
	public function search_for_freelancer()
	{
		$this->security_breach_checker();
		$this->load->model('job_model');
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );	
        $user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$res = "";
		$key = $this->input->post('keybox');
		if($key == "" || $key == false)
		{
			// return all the freelancers in the db in the place of the user based on geoloc in case the user is an employer.
			// return all the freelancers in the db regardless of the geolocation.
			$res = $this->freelancer_model->get_freelancers();
		}
		else
		{
			// do a universal search of all the matching keys in the freelancers db table and return it.
			// UNIVERSAL SEARCH COULD BE SEARCH BY NAME, USERNAME, COUNTRY, CITY, SKILLS
			$res = $this->freelancer_model->universal_search_freelancer( $key );
		}
		echo json_encode($res);
	}

	/*
	|--------------------------------------------------------------------------
	| search_for_employers()
	|--------------------------------------------------------------------------
	|
	| This function does the actual searching for a particular employer either
	| the search field has a value or not. If there is not value in the search 
	| field, this will return all employers. If there is a value in the search 
	| field, this will return all employers that match the name, username, 
	| country, city or skills as entered.
	|
	| return encoded json search_results 
	*/
	public function search_for_employers()
	{
		$this->security_breach_checker();
		$this->load->model('job_model');
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );	
        $user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$res = "";
		$key = $this->input->post('keybox');
		if($key == "" || $key == false)
		{	// return all the freelancers in the db in the place of the user based on geoloc in case the user is an employer.
			// return all the freelancers in the db regardless of the geolocation.
			$res = $this->employer_model->get_employers();
		}
		else
		{	// do a universal search of all the matching keys in the freelancers db table and return it.
			// UNIVERSAL SEARCH COULD BE SEARCH BY NAME, USERNAME, COUNTRY, CITY, SKILLS
			$res = $this->employer_model->universal_search_employer( $key );
		}
		echo json_encode($res);
	}

	/*
	|--------------------------------------------------------------------------
	| findwork()
	|--------------------------------------------------------------------------
	|
	| This function automatically searches for job postings in the database 
	| to the nearest geolocation of the user as what is written in his/her profile.
	| This is for the job feeds section of the platform.
	|
	*/
	public function findwork()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $filters = $this->freelancer_model->get_freelancer_geolocation($credential_data);
		$data['feeds'] = $this->job_model->get_latest_jobfeeds($filters);
		if($data['feeds'] === false)
			$data['feeds'] = "Sorry, there are matching results for job openings in your location.";
		$this->load->view('freelancers/findwork_view', $data);
	}

	// NEW FUNCTION EMPLOYER MODULES
	public function findworker()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$data['notif'] = "";
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
	public function postjob()
	{
		$this->security_breach_checker();
		$this->findworker();
	}
	public function freelancerfeeds()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$job_id = $this->employer_model->get_employer_id($credential_data);
		$filters = $this->employer_model->get_employer_jobkeywords($job_id);
		$result_arr = explode(", ", $filters);
		$data['match'] = $result_arr;
		$data_feeds = array();
		foreach ($result_arr as $value) 
		{	
			$val = $this->job_model->get_latest_freelancerfeeds($value);
			array_push($data_feeds, $val);
		}
		$final = array_unique($data_feeds, SORT_REGULAR);
		$data['feeds'] = json_encode($final);
		if($data['feeds'] == false || $data['feeds'] == "" || $data['feeds'] == NULL || $data['feeds'] == "false")
			$data['feeds'] = json_encode("Sorry, there are matching results for freelancers that match your job posting/s.");
		$this->load->view('employers/freelancerfeeds_view', $data);	
	}
	// this module is fine, including the UI all is working as of checking
	public function myjobpostings()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$id = $this->employer_model->get_employer_id($credential_data);
		$data['jobs'] = $this->employer_model->get_employer_jobpostings($id);
		$this->load->view('employers/myjobpostings_view', $data);
	}
	public function freelancerjobapps()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$id = $this->employer_model->get_employer_id($credential_data);
		$data['jobs'] = $this->job_model->get_incoming_jobapplications($id);
		$this->load->view('employers/freelancer_job_applications_view', $data);	
	}
	// job details page that employers view only, similar to openlink function for freelancers
	public function myjobdetails( $job_id )
	{ // !NOTICE: THERE ARE BUGS HERE IN THE UI, THE HEADER AND FOOTER DOES NOT SHOW UP AFTER LOADING THE PAGE
		// this module needs refinement for the most of its UI and backend features
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $data['username'] = $user_full;
	 	// write a function here that returns the status value of the logged in user
		$emp_id = $this->employer_model->get_employer_id( $credential_data );
		// this returns the job_status of the job id
		// $status = $this->freelancer_model->get_job_status( $emp_id, $job_id );
		// $app = $this->freelancer_model->get_application_status( $emp_id, $job_id );
		$details = $this->job_model->get_job_details( $job_id );
		if($details != false || $details != NULL || $details != "")
		{
			foreach($details as $row)
			{
				$data['id'] = $job_id;
				$data['job_code'] = $row->job_code;
				$data['job_name'] = $row->job_name;
				$data['job_description'] = $row->job_description;
				$data['job_type'] = $row->job_type;
				$data['job_duration'] = $row->job_duration;
				$data['job_level'] = $row->job_level;
				$data['job_category'] = $row->job_category;
				$data['job_requirements'] = $row->job_requirements;
				$data['job_keywords'] = $row->job_keywords;
				// if($status == "not_hired")
				// 	$status = $app_status;
				// $data['job_status'] = $status;
			}			
			$this->load->view('employers/job_details_view', $data);
		}
		// $this->jobdetails($link_page, $status, $app);
	}
	public function view_freelancer_application($job_id)
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		// this should not just be one chunk of data. it shall be broken down
		$my_data = $this->job_model->get_jobapplication_details($job_id);
		$job_det = $this->job_model->get_job_details($job_id);
		foreach($job_det as $row)
		{
			$data['job_id'] = $job_id;
			$data['job_code'] = $row->job_code;
			$data['job_name'] = $row->job_name;
			$data['job_description'] = $row->job_description;
			$data['job_type'] = $row->job_type;
			$data['job_duration'] = $row->job_duration;
			$data['job_level'] = $row->job_level;
			$data['job_category'] = $row->job_category;
			$data['job_requirements'] = $row->job_requirements;
			$data['job_keywords'] = $row->job_keywords;
		}
		foreach($my_data as $value)
		{
			$data['prof_pic'] = $value->freelancer_photo;
			$data['free_id'] = $value->freelancer_id;
			$data['stat'] = $value->status;
			$data['date'] = $value->application_date;
			$data['user'] = $value->freelancer_username;
			$data['name'] = $value->freelancer_first_name." ".$value->freelancer_last_name;
		}
		$this->load->view('employers/freelancer_application_view', $data);
	}
	public function respond_application( $freelancer_id, $job_id )
	{
		$this->security_breach_checker();
		$hire_yes = $this->input->post('confirmhireyes');
		$hire_no = $this->input->post('confirmhireno');
		$reject_yes = $this->input->post('confirmrejectyes');
		$reject_no = $this->input->post('confirmrejectno');

		if($hire_yes != "" || $hire_yes != NULL || $hire_yes != false) 
		{
			var_dump($hire_yes);
			$this->job_model->hire_this_freelancer($freelancer_id, $emp_id, $job_id);
		}
		if($hire_no != "" || $hire_no != NULL || $hire_no != false) 
		{
			var_dump($hire_no);

		}
		if($reject_yes != "" || $reject_yes != NULL || $reject_yes != false) 
		{
			var_dump($reject_yes);
		}
		if($reject_no != "" || $reject_no != NULL || $reject_no != false) 
		{
			var_dump($reject_no);
		}
	}
	public function employer_searchjobs()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$this->load->view('employers/employer_searchjobs_view', $data);
	}
	public function employer_profile()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$data['fullname'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$data['uname'] = $uname;
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$emp_id = $this->employer_model->get_employer_id( $credential_data );
		$employer_details = $this->employer_model->get_employer_profile($emp_id);
		foreach($employer_details as $row)
		{
			$data['address'] = $row->emp_address;
			$data['country'] = $row->emp_country;
			$data['state']	= $row->emp_state_province_region;
			$data['city'] 	= $row->emp_city;
			$data['email'] = $row->emp_email_add;
			$data['rating'] = $row->emp_rating;
			$data['summary'] = $row->emp_summary;
			$data['photo'] = $row->emp_photo_logo;
			$data['industry'] = $row->emp_industry;
			$data['contact'] = $row->emp_contact_number;
			$data['portfolio'] = $row->emp_portfolio_pics;
		}
		$this->load->view('employers/employer_profile_view', $data);
	}
	public function employer_myjobs()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$this->load->view('employers/employer_myjobs_view', $data);
	}
	public function employer_myreports()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$this->load->view('employers/employer_myreports_view', $data);
	}		
	public function employer_conversations()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$this->load->view('employers/employer_conversations_view', $data);
	}		
	public function employer_notifications()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
		$pass = $this->login_model->get_loggedin_pass();
		$type = $this->login_model->get_loggedin_usertype();
		$credential_data = array(
			'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
		);
		$this->load->view('employers/employer_notifications_view', $data);
	}
	/*
	|--------------------------------------------------------------------------
	| myprofile()
	|--------------------------------------------------------------------------
	|
	| This function loads the user profile page of the logged in freelancer.
	|
	*/
	public function myprofile()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
     	if($type == "employer")
			$this->employer_profile();
		else
		{
			$freelancer_id = $this->freelancer_model->get_freelancer_id($credential_data);
		    foreach($freelancer_id as $row)
			{
				$id = $row->freelancer_id;
			}
			$profile_data = $this->freelancer_model->get_freelancer_profile($id);
			$data['username'] = $user_full;
			$data['fullname'] = $user_full;
			foreach($profile_data as $row)
			{
				$title = $row->freelancer_title;
				$skills = $row->freelancer_skills;
				$summary = $row->freelancer_summary;
				$availability = $row->freelancer_availability;
				$educ = $row->freelancer_education;
				$pic = $row->freelancer_photo;
				$address = $row->freelancer_address.", ".$row->freelancer_city.", ".$row->freelancer_state_province_region;
				$country = $row->freelancer_country;
				$zip = $row->freelancer_zipcode;
				$rating = $row->freelancer_rating;
				$email = $row->freelancer_email_add;
				$portfolio = $row->freelancer_portfolio_pics;
			}
			$data['uname'] = $uname;
			$data['title'] = $title;
			$data['skills'] = $skills;
			$data['summary'] = $summary;
			$data['availability'] = $availability;
			$data['rating'] = $rating;
			$data['educ'] = $educ;
			$data['photo'] = $pic;
			$data['address'] = $address;
			$data['country'] = $country;
			$data['zip'] = $zip;
			$data['email'] = $email;
			$data['portfolio'] = $portfolio;
			// $data['profile_data'] = json_encode($profile_data);
			$this->load->view('myprofile_view', $data);	
		}
			


	}

	/*
	|--------------------------------------------------------------------------
	| edit_my_profile()
	|--------------------------------------------------------------------------
	|
	| This function loads the editable user profile page of the logged in freelancer.
	|
	*/	
	public function edit_my_profile()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $freelancer_id = $this->freelancer_model->get_freelancer_id($credential_data);
        foreach($freelancer_id as $row)
		{
			$id = $row->freelancer_id;
		}
		$profile_data = $this->freelancer_model->get_freelancer_profile($id);
		$data['username'] = $user_full;
		$data['fullname'] = $user_full;
		foreach($profile_data as $row)
		{
			$title = $row->freelancer_title;
			$skills = $row->freelancer_skills;
			$summary = $row->freelancer_summary;
			$availability = $row->freelancer_availability;
			$educ = $row->freelancer_education;
			$pic = $row->freelancer_photo;
		}
		$data['title'] = $title;
		$data['skills'] = $skills;
		$data['summary'] = $summary;
		$data['availability'] = $availability;
		$data['educ'] = $educ;
		$data['photo'] = $pic;
        $this->load->view('edit_profile_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| save_edited_profile()
	|--------------------------------------------------------------------------
	|
	| This function saves the posted user data profile.
	|
	*/	
	public function save_edited_profile()
	{
		// THERE ARE BUGS HERE, BE SURE TO GET BACK HERE!!!!
		$skills = $this->input->post('skills_text');
		$summary = $this->input->post('summary_box');
		$avail = $this->input->post('availability_sel');
		$educ = $this->input->post('educ_txt');
		$edited_data = array('skills' => $skills, 'summary' => $summary, 'availability' => $avail, 'education' => $educ);
		var_dump($edited_data);

	}

	public function save_edited_emp_profile()
	{
		// this is used in employers profile
		// THERE ARE BUGS HERE, BE SURE TO GET BACK HERE!!!!
		// the bug is in the summary post
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
		$email = $this->input->post('email_text');
		$contact = $this->input->post('contact_text');
		$address = $this->input->post('address_text');
		$city = $this->input->post('city_sel');
		$state = $this->input->post('state_sel');
		$country = $this->input->post('country_sel');
		
		$rating = $this->input->post('rating_text');
		$summary = $this->input->post('summary_box');
		$industry = $this->input->post('industry_text');
		
		$edited_main_data = array('emp_email_add' => $email, 'emp_contact_number' => $contact, 'emp_address' => $address, 
			'emp_city' => $city, 'emp_state_province_region' => $state, 'emp_country' => $country);
		$edited_profile_data = array('emp_rating' => $rating, 'emp_summary' => $summary, 'emp_industry' => $industry);
		var_dump($edited_main_data);	
		var_dump($edited_profile_data);
		$emp_id = $this->employer_model->get_employer_id($credential_data);
		$first_ret = $this->employer_model->update_employer_info($emp_id, $edited_main_data);
		$second_ret = $this->employer_model->update_employer_profile($emp_id, $edited_profile_data);
	}

	// this is for the employer profile. its an editable page
	public function edit_employer_profile()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
		$data['username'] = $user_full;
		$data['fullname'] = $user_full;
		$data['uname'] = $uname;
   		$emp_id = $this->employer_model->get_employer_id( $credential_data );
		$employer_details = $this->employer_model->get_employer_profile($emp_id);
		foreach($employer_details as $row)
		{
			$data['address'] = $row->emp_address;
			$data['country'] = $row->emp_country;
			$data['state']	= $row->emp_state_province_region;
			$data['city'] 	= $row->emp_city;
			$data['email'] = $row->emp_email_add;
			$data['rating'] = $row->emp_rating;
			$data['summary'] = $row->emp_summary;
			$data['photo'] = $row->emp_photo_logo;
			$data['industry'] = $row->emp_industry;
			$data['contact'] = $row->emp_contact_number;
			$data['portfolio'] = $row->emp_portfolio_pics;
		}
        $this->load->view('employers/edit_employer_profile_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| messages()
	|--------------------------------------------------------------------------
	|
	| This function calls for conversations() function and executes its body.
	|
	*/
	public function messages()
	{
		$this->security_breach_checker();
		$this->conversations();
	}

	/*
	|--------------------------------------------------------------------------
	| jobfeeds()
	|--------------------------------------------------------------------------
	|
	| This function calls for the findwork() function and invoke its body. They 
	| both function the same.
	|
	*/
	public function jobfeeds()
	{
		$this->security_breach_checker();
		$this->findwork();
	}

	/*
	|--------------------------------------------------------------------------
	| searchjobs() !check function usage
	|--------------------------------------------------------------------------
	|
	| This function searches for job postings in the database either by keywords
	| or geolocations as posted after the searchboxes.
	|
	| return encoded json search_results 
	*/
	public function searchjobs()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );		
		$this->load->view('searchjobs_view', $data);	
	}

	/*
	|--------------------------------------------------------------------------
	| jobdetails()
	|--------------------------------------------------------------------------
	|
	| This function checks if the session of the logged in user is still active.
	| If it has expired already, then the user will be redirected to the login 
	| page through the login controller.
	| 
	| Parameters:
	| 	@id the job_id field of the job posting
	| 	@stat the status of the job posting
	*/
	public function jobdetails( $id, $stat )
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );	
        $free_id = $this->freelancer_model->get_freelancer_id( $credential_data );
		$freelancer_id = "";
		foreach($free_id as $res)
		{
			$freelancer_id = $res->freelancer_id;
		}
     	$status = $this->freelancer_model->get_job_status( $freelancer_id, $id );   
     	$app_status = $this->freelancer_model->get_application_status( $freelancer_id, $id );
		$details = $this->job_model->get_job_details( $id );
		if($details != false || $details != NULL || $details != "")
		{
			foreach($details as $row)
			{
				$data['id'] = $id;
				$data['job_code'] = $row->job_code;
				$data['job_name'] = $row->job_name;
				$data['job_description'] = $row->job_description;
				$data['job_type'] = $row->job_type;
				$data['job_duration'] = $row->job_duration;
				$data['job_level'] = $row->job_level;
				$data['job_category'] = $row->job_category;
				$data['job_requirements'] = $row->job_requirements;
				$data['job_keywords'] = $row->job_keywords;
				if($status == "not_hired")
					$status = $app_status;
				$data['job_status'] = $status;
			}			
			$this->load->view('jobdetails_view', $data);
		}
		else
		{
			$this->load->view('jobnotfound_view', $data);
		}
	}

	/*
	|--------------------------------------------------------------------------
	| myapplications()
	|--------------------------------------------------------------------------
	|
	| This function loads the job applications of the logged in freelancer.
	|
	*/
	public function myapplications()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
		$data['username'] = $user_full;
		$data['applications_data'] = $this->freelancer_model->get_myapplication_records($credential_data);
		$this->load->view('myapplications_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| viewmyprofile()
	|--------------------------------------------------------------------------
	|
	| This function loads the online resume/profile of the freelancer.
	|
	*/
	public function viewmyprofile()
	{
		$this->security_breach_checker();
		$this->myprofile();
	}

	/*
	|--------------------------------------------------------------------------
	| tests()
	|--------------------------------------------------------------------------
	|
	| This function loads the tests taken by the freelancer.
	|
	*/

	/* GET BACK HERE LATER!!!!!!!!!!!!! */
	public function tests()
	{
		$this->security_breach_checker();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );	
		$data['username'] = $user_full;
		$data['recommended'] = $this->freelancer_model->get_freelancer_skills($credential_data);
		var_dump($data);
		$this->load->view('tests_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| myjobs()
	|--------------------------------------------------------------------------
	|
	| This function loads the currently hired and on going jobs of the freelancer.
	|
	*/
	public function myjobs()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $data['current_jobs'] = $this->freelancer_model->get_mycurrent_jobs($credential_data);
		$data['username'] = $user_full;
		$this->load->view('myjobs_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| openlink()
	|--------------------------------------------------------------------------
	|
	| This function opens the job details page and loads the status of the job.
	|
	| Parameters:
	| @link_page the job id passed on the link of the page
	*/
	public function openlink( $link_page )
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
	 	// write a function here that returns the status value of the logged in user
		$free_id = $this->freelancer_model->get_freelancer_id( $credential_data );
		$freelancer_id = "";
		foreach($free_id as $res)
		{
			$freelancer_id = $res->freelancer_id;
		}
		// this returns the job_status of the job id
		$status = $this->freelancer_model->get_job_status( $freelancer_id, $link_page );
		$app = $this->freelancer_model->get_application_status( $freelancer_id, $link_page );
		$this->jobdetails($link_page, $status, $app);
	}

	/*
	|--------------------------------------------------------------------------
	| myreports()
	|--------------------------------------------------------------------------
	|
	| This function loads the reports view of the logged in user.
	|
	*/
	public function myreports()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$this->load->view('myreports_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| conversations()
	|--------------------------------------------------------------------------
	|
	| This function loads the conversations view of the logged in user.
	|
	*/
	public function conversations()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        if($type == "employer")
        	$this->employer_conversations();
        else
        {
		 	// write a function here that returns the status value of the logged in user
			$free_id = $this->freelancer_model->get_freelancer_id( $credential_data );
			$freelancer_id = "";
			foreach($free_id as $res)
			{
				$freelancer_id = $res->freelancer_id;
			}
			$this->load->helper('form');
			$user_full = $this->login_model->get_user_fullname();
			$data['username'] = $user_full;
			$data['receipient'] = $this->get_msg_receivers();
			$data['messages_data'] = $this->job_model->get_messaging_records($freelancer_id, $credential_data);
			$this->load->view('conversations_view', $data);        	
        }
	}

	/*
	|--------------------------------------------------------------------------
	| message_conversations()
	|--------------------------------------------------------------------------
	|
	| This function shows the message conversation exchange between the user and
	| his/her employers in a chat type manner.
	|
	| Parameters:
	| @receiver the person name receiving the message.
	*/
	public function message_conversations( $receiver )
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $data['username'] = $user_full;
        $data['conversation_data'] = $this->job_model->get_message_conversation($receiver, $credential_data);		
		$this->load->view('message_conversations_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| create_new_msg()
	|--------------------------------------------------------------------------
	|
	| This function saves the message and sends it the receiver.
	|
	*/
	public function create_new_msg()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $data['username'] = $user_full;
		$send = $this->input->post('sendbtn');
		$name = $this->input->post('receipient_name');
		$subj = $this->input->post('messagesubject');
		$body = $this->input->post('messagecontent');
		$date = date('M/d/Y');
		$message = array(
			'message_subject' => $subj, 'message_body' => $body, 'message_timestamp' => $date, 'sender' => $user_full, 'receiver' => $name
		);
		$msg_stat = $this->job_model->insert_message($message);
		if($msg_stat != -1)
		{
			$free = $this->freelancer_model->get_freelancer_id($credential_data);
			foreach($free as $row)
			{
				$free_id = $row->freelancer_id;
			}
			$free_msg = array(
				'freelancer_id' => $free_id, 'message_id' => $msg_stat
			);	
			$this->job_model->insert_freelancer_message($free_msg);
			// issue a JSON notif to frontend that sending the message succeeded
			$this->conversations();
		}
		else
		{ 	// issue a JSON notif to frontend that sending message failed
			$this->conversations();	
		}
	}

	/*
	|--------------------------------------------------------------------------
	| get_msg_receivers() 
	|--------------------------------------------------------------------------
	|
	| This function retrieves all possible message receivers for the logged in user.
	| A message receiver is only someone who is an employer of this freelancer.
	|
	| return array ret_arr 
	*/	
	public function get_msg_receivers()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
	 	// write a function here that returns the status value of the logged in user
		$free_id = $this->freelancer_model->get_freelancer_id( $credential_data );
		$jobs = $this->freelancer_model->get_mycurrent_jobs( $credential_data );
		$empl = "";
		if($jobs != "" || $jobs != false)
		{
			foreach($jobs as $row)
			{
				$res = $row->job_id;
				$empl = $this->job_model->get_job_employer($res);
			}
		}	

		$ret_arr = array();
		if($empl != false || $empl != "")
		{
			foreach($empl as $val)
				$ret_arr[$val->emp_first_name] = $val->emp_first_name;
		}	
		else
		{
			$ret_arr['default'] = "no available results";
		}
		return $ret_arr;
	}

	/*
	|--------------------------------------------------------------------------
	| notifications()
	|--------------------------------------------------------------------------
	|
	| This function loads the notifications of the logged in user.
	|
	*/
	public function notifications()
	{
		$this->security_breach_checker();
		// fetch data from the backend here 
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$this->load->view('notifications_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| settings()
	|--------------------------------------------------------------------------
	|
	| This function loads the settings page of the logged in user.
	|
	*/
	public function settings()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );		
        $this->load->view('settings_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| help()
	|--------------------------------------------------------------------------
	|
	| This function loads the help page for the user where he/she can ask for
	| assistance over an issue or module of the site.
	|
	*/
	public function help()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $this->load->view('help_support_view', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| change_pass()
	|--------------------------------------------------------------------------
	|
	| This function loads the change password page for the user where the logged in
	| user can change his/her password as desired.
	|
	*/
	public function change_pass()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $this->load->view('change_password_view', $data);	
   	}

	/*
	|--------------------------------------------------------------------------
	| change_my_password()
	|--------------------------------------------------------------------------
	|
	| This function changes the actual password for the logged in user.
	|
	*/
	public function change_my_password()
	{
		$this->security_breach_checker();
		$user_full = $this->login_model->get_user_fullname();
		$data['username'] = $user_full;
		$uname = $this->login_model->get_loggedin_username();
        $pass =  $this->login_model->get_loggedin_pass();
        $type = $this->login_model->get_loggedin_usertype();
        $user_full = $this->login_model->get_user_fullname();
        $credential_data = array(
        	'username' => $uname, 'password' => $pass, 'type' => $type, 'fullname' => $user_full
        );
        $user = $this->input->post('username');
        $new_pass = $this->input->post('password');
        $pass_conf = $this->input->post('passwordRetyped');
        if($user == $uname && $new_pass == $pass_conf)
        {
        	$new_data = array( 'freelancer_password' => $new_pass );
        	$data['val'] = $this->freelancer_model->change_freelancer_password($user, $new_data);
   	        $this->load->view('password_confirmation_view', $data);	
        }
        else
        {
        	$data['val'] = 0;
        	$this->load->view('password_confirmation_view', $data);	
        }
	}

	/*
	|--------------------------------------------------------------------------
	| evaluate()
	|--------------------------------------------------------------------------
	|
	| This function changes the actual password for the logged in user.
	|
	| Parameters:
	| @val the freelancer id passed on the for the page
	| !check this parameter usage!
	*/	
	public function evaluate($val)
	{
		//!notice: this code seems to not initiate or work
		// this is a bug with ajax request and php 
		var_dump($val);
		$this->logout();
	}

	/*
	|--------------------------------------------------------------------------
	| logout()
	|--------------------------------------------------------------------------
	|
	| This function unsets the session, destroys the session and logs out the user
	| from the system.
	|
	*/	
	public function logout() 
	{
		session_start(); // session start is needed here to stop bugs from occurring, which is weird. need to investigate this
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}

} // end controller class definition

?>