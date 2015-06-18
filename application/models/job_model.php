<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: April 11, 2015
| Version: 1.0
| Latest Updates: 
		*
| Bugs to fix: 

|--------------------------------------------------------------------------
*/

class Job_model extends CI_Model {

	/*
	|--------------------------------------------------------------------------
	| create_job_posting()
	|--------------------------------------------------------------------------
	|
	| This function inserts a job posting record into the database.
	| 
	| Parameters:
	| 	@job_data job posting data array
	| Return 0 an error occured
	| Return 1 success
	*/
	public function create_job_posting( $job_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->insert( "jobs", $job_data );
		$this->db->trans_complete();

		// ADD ANOTHER DATABASE INSERT QUERY FOR EMPLOYER_JOB DATABASE TABLE

		if($this->db->trans_status() === FALSE)
		{	// echo "internal server error creating the user";
			return 0;
		}
		else 
		{	// echo "successfully created the user!";
			return 1;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| view_job_posting()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for job posting values.
	| 
	| Parameters:
	| 	@job_id the job_id of the job posting
	| Return query->result() data array
	*/
	public function view_job_posting( $job_id )
	{
		$this->load->database();
		$this->db->select();
		$this->db->from('jobs');
		$this->db->where('job_id', $job_id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| edit_job_posting()
	|--------------------------------------------------------------------------
	|
	| This function edits a database record for a job posting.
	| 
	| Parameters:
	| 	@job_id the job_id of the job posting
	| 	@job_data job posting data array
	*/
	public function edit_job_posting( $job_id, $job_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->where( 'job_id', $job_id );
		$this->db->update( 'jobs', $job_data );
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else ;
	}

	/*
	|--------------------------------------------------------------------------
	| search_job_postings_bykey()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the job posting
	| details with regard to the key arguments
	| 
	| Parameters:
	| 	@key the keyword for the job search
	| Return query->result() data array
	| Return false
	*/
	public function search_job_postings_bykey( $key = "" )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('');
		$this->db->from('jobs');
		$this->db->like('job_keywords', $key, 'both');
		$query = $this->db->get();
		$this->db->trans_complete();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| search_job_postings_byloc()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for determining the employers
	| of the logged in freelancer.
	| 
	| Parameters:
	| 	@loc the location key argument
	| Return query->result() data array
	*/
	public function search_job_postings_byloc( $loc = "" )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select();
		$this->db->from('employer_job a');
		$this->db->join('jobs b', 'a.job_id = b.job_id');
		$this->db->where('emp_city', $loc);
		$this->db->or_where('emp_state_province_region', $loc);
		$this->db->or_where('emp_country', $loc);
		$this->db->like('emp_city', $loc, 'both');
		$this->db->like('emp_state_province_region', $loc, 'both');
		$this->db->like('emp_country', $loc, 'both');
		$query = $this->db->get();
		$this->db->trans_complete();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| get_latest_jobfeeds()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the latest job feeds 
	| of the logged in freelancer.
	| 
	| Parameters:
	| 	@filter the keyword filters for geolocation
	| Return json encoded query->result() data array
	| Return false
	*/
	public function get_latest_jobfeeds( $filters )
	{
		foreach($filters as $row)
		{
			$city = $row->freelancer_city;
			$state = $row->freelancer_state_province_region;
			$country = $row->freelancer_country;
		}
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('b.job_id, b.job_code, b.job_name, b.job_description, b.job_type, b.job_duration,
		 					b.job_level, b.job_category, b.job_requirements, b.job_keywords');
		$this->db->from('employer_job a');
		$this->db->join('jobs b', 'a.job_id = b.job_id');
		$this->db->where('emp_city', $city);
		$this->db->or_where('emp_state_province_region', $state);
		$this->db->or_where('emp_country', $country);
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else
		{
			if($query->num_rows() > 0)
			{
				return json_encode($query->result());
			}
			else
			{
				return false;
			}
		}
	}

	/*
	|--------------------------------------------------------------------------
	| get_job_details()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the job details of a job posting
	| 
	| Parameters:
	| 	@id the job posting id 
	| Return query->result() data array
	| Return false
	*/
	public function get_job_details( $id )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('');
		$this->db->from('jobs');
		$this->db->where('job_id', $id);
		$query = $this->db->get();
		$this->db->trans_complete();

		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| insert_job_application()
	|--------------------------------------------------------------------------
	|
	| This function inserts a job application record
	| of the logged in freelancer.
	| 
	| Parameters:
	| 	@record the job application record data array()
	| Return 0 an error occured
	| Return 1 success
	*/
	public function insert_job_application( $record )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert( "job_applications", $record );
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ 	// echo "internal server error creating the user";
			return 0;
		}
		else 
		{  	// echo "successfully created the user!";
			return 1;
		}		
	}

	/*
	|--------------------------------------------------------------------------
	| get_job_employer()
	|--------------------------------------------------------------------------
	|
	| This function retrieves the employers for every job that the logged in 
	| freelancer/user is currently active.
	| 
	| Parameters:
	| 	@job_id the job id
	| Return query->result() data array
	| Return false
	*/
	public function get_job_employer( $job_id )
	{
		$this->load->database();
		$this->db->trans_start();

		$this->db->select('emp_first_name');
		$this->db->from('employer_job a');
		$this->db->join('jobs b', 'a.job_id = b.job_id');
		$this->db->join('employers c', 'c.emp_id = a.emp_id');
		$this->db->where('a.job_id', $job_id);
		$query = $this->db->get();

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ 	// echo "internal server error creating the user";
			return 0;
		}
		else 
		{  	// echo "successfully created the user!";
			if ($query->num_rows() > 0) 
			{
				return $query->result();
			} 
			else 
			{
				return false;
			}
		}			
	}

	/*
	|--------------------------------------------------------------------------
	| insert_message() !check this function usage
	|--------------------------------------------------------------------------
	|
	| This function inserts the message to the database.
	| 
	| Parameters:
	| 	@message the message data array
	| Return -1 for error
	| Return id or primary key of the last inserted record.
	*/
	public function insert_message( $message )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert( "messages", $message );
		$id = $this->db->insert_id();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ 	// echo "internal server error creating the user";
			return -1;
		}
		else 
		{  	// echo "successfully created the message!";
			return $id;
		}		
	}

	/*
	|--------------------------------------------------------------------------
	| insert_freelancer_message()
	|--------------------------------------------------------------------------
	|
	| This function inserts a message record of the logged in freelancer.
	| 
	| Parameters:
	| 	@free_msg the freelancer message data array()
	| Return 0 an error occured
	| Return 1 success
	*/
	public function insert_freelancer_message( $free_msg )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert( "freelancer_message", $free_msg );
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ 	// echo "internal server error creating the user";
			return 0;
		}
		else 
		{  	// echo "successfully created the message!";
			return 1;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| insert_freelancer_message()
	|--------------------------------------------------------------------------
	|
	| This function inserts a message record of the logged in freelancer.
	| 
	| Parameters:
	| 	@free_msg the freelancer message data array()
	| Return 0 an error occured
	| Return 1 success
	*/
	public function get_messaging_records( $free_id, $credential_data )
	{
		$this->load->database();
		$this->db->trans_start();
		// $this->db->select('b.application_record_id, a.freelancer_id, b.status, b.application_date, c.job_id, 
		// 	d.job_code, d.job_name, d.job_description, d.job_type, d.job_duration, d.job_level, d.job_category');
		$this->db->select('b.message_id, b.message_subject, b.message_body, b.message_timestamp, b.sender, b.receiver');
		$this->db->from('messages b');
		$this->db->join('freelancer_message c', 'b.message_id = c.message_id');
		$this->db->join('freelancers a', 'a.freelancer_id = c.freelancer_id');
		$this->db->where('a.freelancer_username', $credential_data['username']);
		$this->db->where('a.freelancer_password', $credential_data['password']);
		$this->db->where('a.user_type', $credential_data['type']);
		$this->db->distinct();
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else
		{
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}
	}

	public function get_message_conversation($msg_id, $credential_data)
	{
		$this->load->database();
		$this->db->trans_start();
		// $this->db->select('b.message_id, b.message_subject, b.message_body, b.message_timestamp, b.sender, b.receiver');
		$this->db->select();
		$this->db->from('messages');
		// $this->db->join('freelancer_message c', 'b.message_id = c.message_id');
		// $this->db->join('freelancers a', 'a.freelancer_id = c.freelancer_id');
		$this->db->where('receiver', $msg_id);
		// $this->db->where('a.freelancer_username', $credential_data['username']);
		// $this->db->where('a.freelancer_password', $credential_data['password']);
		// $this->db->where('a.user_type', $credential_data['type']);
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else
		{
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}	
	}

	public function get_user_id( $name )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('emp_id');
		$this->db->from('employers');
		$this->db->where('emp_username', $name);
		$query = $this->db->get();

		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{ 	// echo "internal server error creating the user";
			
			return 0;
		}
		else 
		{  	// echo "successfully created the user!";
			if ($query->num_rows() == 1) 
			{
				return $query->result();
			} 
			else 
			{
				return false;
			}
		}
	}

	public function get_latest_freelancerfeeds( $filters )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('a.freelancer_id, freelancer_first_name, freelancer_last_name, freelancer_address, freelancer_city, 
			freelancer_state_province_region, freelancer_country, freelancer_zipcode, freelancer_email_add, 
			freelancer_title, freelancer_skills');
		$this->db->from('freelancers a');
		$this->db->join('freelancer_profile b', 'a.freelancer_id = b.freelancer_id');
		$this->db->like('freelancer_skills', $filters, 'both');
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{	// error
			return 0;
		}
		else
		{	// success
			if($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
				return false;
		}
	}

	public function get_incoming_jobapplications( $id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('d.job_id, d.status, d.application_date, d.freelancer_id, e.freelancer_username');
		$this->db->from('employer_job b');
		$this->db->join('jobs c', 'b.job_id = c.job_id');
		$this->db->join('job_application_record d', 'b.job_id = d.job_id');
		$this->db->join('freelancers e', 'e.freelancer_id = d.freelancer_id');
		$this->db->where('b.emp_id', $id);
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			if($query->num_rows() > 0)
				return $query->result();
			else 
				return false;
		}
	}

	public function get_jobapplication_details( $job_id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('d.application_record_id, d.freelancer_id, d.job_id, d.status, d.application_date, e.freelancer_username, e.freelancer_first_name, e.freelancer_last_name, f.freelancer_photo');
		$this->db->from('jobs c');
		$this->db->join('job_application_record d', 'c.job_id = d.job_id');
		$this->db->join('freelancers e', 'e.freelancer_id = d.freelancer_id');
		$this->db->join('freelancer_profile f', 'e.freelancer_id = f.freelancer_id');
		$this->db->where('c.job_id', $job_id);
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			if($query->num_rows() == 1)
				return $query->result();
			else 
				return false;
		}	
	}

	public function get_job_durations()
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('duration_name');
		$this->db->from('job_duration');
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
			return 0;
		else
		{
			if($query->num_rows() > 0) 
				return $query->result();
			else
				return false;
		}
	}

	public function get_job_levels()
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('level_name');
		$this->db->from('job_level');
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
			return 0;
		else
		{
			if($query->num_rows() > 0) 
				return $query->result();
			else
				return false;
		}
	}

	public function get_job_categories()
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('category_name');
		$this->db->from('job_category');
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
			return 0;
		else
		{
			if($query->num_rows() > 0) 
				return $query->result();
			else
				return false;
		}
	}

	public function get_job_types()
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('type_name');
		$this->db->from('job_type');
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
			return 0;
		else
		{
			if($query->num_rows() > 0) 
				return $query->result();
			else
				return false;
		}
	}

	public function hire_this_freelancer( $freelancer_id, $emp_id, $job_id )
	{
		$this->load->database();
		$this->db->trans_start();
		// edit job_applications and job_application_record DB tables, especially the status must be changed
		// add new entries to job_application_responses and freelancer_job DB table
		$status = 1;
		$this->edit_job_applications_record($job_id, $status);
		$this->edit_job_application_record($freelancer_id, $job_id, $status);
		$this->create_job_application_responses($emp_id, $job_id);
		$this->create_freelancer_job_record($freelancer_id, $job_id);
		$this->db->trans_complete();
		if($this->db->status() === FALSE)
			return 0;
		else
		{
			return 1;
		}
	}

	private function edit_job_applications_record( $job_id, $status )
	{
		if($status == 1)
		{
			$app_status = "received";
			$data = array('job_id' => $job_id, 'job_application_status' => $app_status);
		}
		else
		{	
			$app_status = "pending";
			$data = array('job_id' => $job_id, 'job_application_status' => $app_status);	
		}
		
		$this->load->database();
		$this->db->trans_start();
		$this->db->where('job_id', $job_id);
		$this->db->update('job_applications', $data);
		$this->db->trans_complete();
		if($this->db->status() === FALSE)
			return 0;
		else
		{
			return 1;
		}
	}

	private function edit_job_application_record( $freelancer_id, $job_id, $status )
	{	
		if($status == 1)
		{
			$app_status = "approved";
			$data = array('status' => $app_status);
		}
		else
		{	
			$app_status = "rejected";
			$data = array('status' => $app_status);	
		}
		
		$this->load->database();
		$this->db->trans_start();
		$this->db->where('job_id', $job_id);
		$this->db->where('freelancer_id', $freelancer_id);
		$this->db->update('job_application_record', $data);
		$this->db->trans_complete();
		if($this->db->status() === FALSE)
			return 0;
		else
		{
			return 1;
		}
	}

	private function create_job_application_responses( $emp_id, $job_id, $status, $date )
	{
		if($status == 1)
		{
			$app_status = "approved";
		}
		else
		{	
			$app_status = "rejected";
		}
		$data = array('emp_id' => $emp_id, 'job_id' => $job_id, 'response' => $response, 'response_date' => $date);	
		
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert("job_application_responses", $data);
		$this->db->trans_complete();
		if($this->db->status() === FALSE)
			return 0;
		else
		{
			return 1;
		}
	}

	private function create_freelancer_job_record( $freelancer_id, $job_id )
	{
		$data = array('freelancer_id' => $freelancer_id, 'job_id' => $job_id);			
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert("freelancer_job", $data);
		$this->db->trans_complete();
		if($this->db->status() === FALSE)
			return 0;
		else
		{
			return 1;
		}
	}

	public function get_available_jobdata( $key, $loc )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select();
		// set the from table to jobs as of now, later it will be changed to a db table that we 
		// created just to handle this transaction, but for now jobs db table would be a good example
		// separate indeed_jobs table
		$this->db->from('indeed_jobs');
		$this->db->where('keywords', $key, 'both');
		$this->db->trans_complete();
		$query = $this->db->get();
		if($this->db->trans_status() === FALSE)
			return 0;
		else
		{
			if($query->num_rows() > 0) 
				return $query->result();
			else
				return false;
		}
	}

	// THIS IS USED IN THE API HANDLER CLASS CONTROLLER
	public function insert_indeed_api_response( $resp_data )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->insert("indeed_jobs", $resp_data);
		$this->db->trans_complete();	
		if($this->db->trans_status() === FALSE)
			return 0;
		else
			return 1;
	}

} 
// end of class model definition 
