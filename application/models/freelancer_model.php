<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: May 3, 2015
| Version: 1.0
| Latest Updates: 

| Bugs to fix: 

|--------------------------------------------------------------------------
*/

class Freelancer_model extends CI_Model {

	/*
	|--------------------------------------------------------------------------
	| create_user_freelancer()
	|--------------------------------------------------------------------------
	|
	| This function inserts a new freelancer user record to the database.
	| 
	| Parameters:
	| 	@user_freelancer_data the user freelancer data array
	| Return 0 an error occured
	| Return 1 successfully created the user
	*/
	public function create_user_freelancer( $user_freelancer_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->insert( "freelancers", $user_freelancer_data );
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error creating the user";
			return 0;
		}
		else 
		{
			// echo "successfully created the user!";
			return 1;
		}
	}

	/*
	|--------------------------------------------------------------------------
	| get_freelancer_geolocation()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the logged in freelancer's location.
	| 
	| Parameters:
	| 	@credential_data the user's credential data array
	| Return query->result() array values
	*/
	public function get_freelancer_geolocation( $credential_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('freelancer_city, freelancer_state_province_region, freelancer_country');
		$this->db->from('freelancers');
		$this->db->where('freelancer_username', $credential_data['username']);
		$this->db->where('freelancer_password', $credential_data['password']);
		$this->db->where('user_type', $credential_data['type']);
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else
		{
			if($query->num_rows() == 1)
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
	| get_freelancer_profile()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the freelancer's profile.
	| 
	| Parameters:
	| 	@freelancer_id the id of the logged in freelancer
	| Return query->result() array values
	*/
	public function get_freelancer_profile( $id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select();
		$this->db->from('freelancer_profile a');
		$this->db->join('freelancers b', 'a.freelancer_id = b.freelancer_id');
		$this->db->where('a.freelancer_id', $id);
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

	/*
	|--------------------------------------------------------------------------
	| get_freelancer_id()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the freelancer_id of the logged in user.
	| 
	| Parameters:
	| 	@credential_data the user credential data array()
	| Return query->result() array value
	*/
	public function get_freelancer_id( $credential_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('freelancer_id');
		$this->db->from('freelancers');
		$this->db->where('freelancer_username', $credential_data['username']);
		$this->db->where('freelancer_password', $credential_data['password']);
		$this->db->where('user_type', $credential_data['type']);
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else
		{
			if($query->num_rows() == 1)
			{
				return $query->result();
			}
			else
			{
				return false;
			}
		}	
	}

	// !check function usage. this has problems in the backend
	public function add_job_application_record( $record, $job_id )
	{
		$this->load->database();
		$one = $this->insert_job_application_record( $record );
		// $two = $this->insert_job_application( $record, $job_id );
		// if($one === true && $two === true)
	}	

	/*
	|--------------------------------------------------------------------------
	| insert_job_application_record()
	|--------------------------------------------------------------------------
	|
	| This function inserts a new job application record to the database.
	| 
	| Parameters:
	| 	@record the job_application record data array()
	| Return true
	| Return false
	*/
	public function insert_job_application_record( $record )
	{
		$this->db->trans_start();
		$this->db->insert( "job_application_record", $record );
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
			return false;
		}	
		else
		{
			return true;
		}			
	}

	/*
	|--------------------------------------------------------------------------
	| get_myapplication_records()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for all the application records of the 
	| logged in freelancer.
	| 
	| Parameters:
	| 	@credential_data the logged in user credential details array()
	| Return query->result() array
	*/
	public function get_myapplication_records( $credential_data )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('b.application_record_id, a.freelancer_id, b.status, b.application_date, c.job_id, 
			d.job_code, d.job_name, d.job_description, d.job_type, d.job_duration, d.job_level, d.job_category');
		$this->db->from('freelancers a');
		$this->db->join('job_application_record b', 'a.freelancer_id = b.freelancer_id');
		$this->db->join('job_applications c', 'b.job_id = c.job_id');
		$this->db->join('jobs d', 'd.job_id = c.job_id');
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

	/*
	|--------------------------------------------------------------------------
	| get_mycurrent_jobs()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the currently hired and on going jobs
	| of the logged in freelancer.
	| 
	| Parameters:
	| 	@credential data the logged in user credential details
	| Return query->result() array values
	*/
	public function get_mycurrent_jobs( $credential_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('b.freelancer_job_id, b.freelancer_id, c.job_id, c.job_code, c.job_name, c.job_description, 
			c.job_type, c.job_duration, c.job_level, c.job_category');
		$this->db->from('freelancers a');
		$this->db->join('freelancer_job b', 'a.freelancer_id = b.freelancer_id');
		$this->db->join('jobs c', 'b.job_id = c.job_id');
		// $this->db->join('jobs d', 'd.job_id = c.job_id');
		$this->db->where('a.freelancer_username', $credential_data['username']);
		$this->db->where('a.freelancer_password', $credential_data['password']);
		$this->db->where('a.user_type', $credential_data['type']);
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

	/*
	|--------------------------------------------------------------------------
	| get_job_status()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for determining what is the job status
	| of a current job posting.
	| 
	| Parameters:
	| 	@freelancer_id the freelancer_id of the logged in user
	| 	@job_id the job_id of the job posting 
	| Return hired
	| Return not_hired
	*/
	public function get_job_status( $freelancer_id, $job_id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select();
		$this->db->from('freelancer_job');
		$this->db->where('job_id', $job_id);
		$this->db->where('freelancer_id', $freelancer_id);
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{	// generate an error
			;
		}
		else
		{
			if($query->num_rows() == 1 )
			{
				return "hired";
			}
			else
			{
				return "not_hired";
			}
		}
	}	

	/*
	|--------------------------------------------------------------------------
	| get_application_status()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for determining the job application status
	| of the freelancer to a certain job posting.
	| 
	| Parameters:
	| 	@freelancer_id the freelancer_id of the logged in user
	| 	@job_id the job_id of the job posting 
	| Return applied
	| Return not_applied
	*/
	public function get_application_status( $freelancer_id, $job_id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('');
		$this->db->from('job_application_record');
		$this->db->where('job_id', $job_id);
		$this->db->where('freelancer_id', $freelancer_id);
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{	// generate an error
			;
			
		}
		else
		{
			if($query->num_rows() == 1 )
			{
				return "applied";
			}
			else
			{
				return "not_applied";
			}
		}	
	}

	/*
	|--------------------------------------------------------------------------
	| get_freelancer_employers()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for determining the employers
	| of the logged in freelancer.
	| 
	| Parameters:
	| 	@free the freelancer_id of the logged in user
	| Return query->result() data array
	| Return not_applied
	*/
	public function get_freelancer_employers( $free )
	{
		$this->load->database();
		foreach ($free as $id) {
			$free_id = $id->freelancer_id;
		}

		$this->db->trans_start();
		$this->db->select('e.emp_first_name');
		// $this->db->from('employers a');
		// $this->db->join('freelancers d', 'c.freelancer_id = d.freelancer_id');
		// $this->db->join('freelancer_job c', 'c.freelancer_id = d.freelancer_id');
		// $this->db->join('employer_job b', 'b.job_id = c.job_id');

		$this->db->from('freelancers a');
		$this->db->join('freelancer_job b', 'a.freelancer_id = b.freelancer_id');
		$this->db->join('jobs c', 'b.job_id = c.job_id');
		$this->db->join('employer_job d', 'c.job_id = d.job_id');
		$this->db->join('employers e', 'e.emp_id = d.emp_id');
		
		$this->db->where('a.freelancer_id', $free_id);
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
		}	
		else
		{
			if($query->num_rows() == 1)
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
	| change_freelancer_password()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the freelancer's profile.
	| 
	| Parameters:
	| 	@user_name the username of the the logged in freelancer
	| 	@new_pass the newly set password of the logged in freelancer
	| Return 0 an error occured
	| Return 1 successfully created the user
	*/
	public function change_freelancer_password( $user_name, $new_pass )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->where('freelancer_username', $user_name);
		$this->db->update('freelancers', $new_pass);
		$this->db->trans_complete();
		
		if($this->db->trans_status() === FALSE)
		{	// generate an error
			return 0;		
		}
		else
		{	// means successfully done update
			return 1;
		}			
	}

	/*
	|--------------------------------------------------------------------------
	| get_freelancers()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for searching freelancer if given the search key is blank.
	| 
	| Return query->result() data array
	| Return false
	*/
	public function get_freelancers()
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('a.freelancer_id, freelancer_first_name, freelancer_last_name, freelancer_address, freelancer_city, 
			freelancer_state_province_region, freelancer_country, freelancer_zipcode, freelancer_email_add, 
			freelancer_title, freelancer_skills');
		$this->db->from('freelancers a');
		$this->db->join('freelancer_profile b', 'a.freelancer_id = b.freelancer_id');
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{	// error
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

	/*
	|--------------------------------------------------------------------------
	| universal_search_freelancer()
	|--------------------------------------------------------------------------
	|
	| This function searches the database for finding a freelancer based on the 
	| search key given. The search key could be a name, username, city, country, 
	| or skills relating to the freelancer.
	| 
	| Parameters:
	| 	@key the key posted in the search field.
	| Return query->result() data array
	| Return false
	*/
	public function universal_search_freelancer( $key )
	{
		$this->load->database();
		$this->db->trans_start();
		// universal searching algorithm
		$this->db->select('a.freelancer_id, freelancer_first_name, freelancer_last_name, freelancer_address, freelancer_city, 
			freelancer_state_province_region, freelancer_country, freelancer_zipcode, freelancer_email_add, 
			freelancer_title, freelancer_skills');
		$this->db->from('freelancers a');
		$this->db->join('freelancer_profile b', 'a.freelancer_id = b.freelancer_id');
		$this->db->like('freelancer_first_name', $key, 'both');
		$this->db->or_like('freelancer_last_name', $key, 'both');
		$this->db->or_like('freelancer_city', $key, 'both');
		$this->db->or_like('freelancer_country', $key, 'both');
		$this->db->or_like('freelancer_skills', $key, 'both');
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{	// error
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

	/*
	|--------------------------------------------------------------------------
	| get_freelancer_skills()
	|--------------------------------------------------------------------------
	|
	| This function retrieves the freelancer skills of the logged in user. 
	| 
	| Parameters:
	| 	@credential_data the logged in user's credentials.
	| Return query->result() data array
	| Return false
	*/
	public function get_freelancer_skills( $credential_data )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('b.freelancer_skills');
		$this->db->from('freelancers a');
		$this->db->join('freelancer_profile b', 'a.freelancer_id = b.freelancer_id');
		$this->db->where('a.freelancer_username', $credential_data['username']);
		$this->db->where('a.freelancer_password', $credential_data['password']);
		$this->db->where('a.user_type', $credential_data['type']);
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{	// error
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

	/*
	|--------------------------------------------------------------------------
	| get_recommended_tests()
	|--------------------------------------------------------------------------
	|
	| This function retrieves the tests recommended for the logged in user. 
	| 
	| Parameters:
	| 	@credential_data the logged in user's credentials.
	| Return query->result() data array
	| Return false
	*/
	public function get_recommended_tests( $credential_data )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select();
		$this->db->from('freelancers a');
		$this->db->join('tests b');
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{	// error
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
} 
// end of class model definition 

?>