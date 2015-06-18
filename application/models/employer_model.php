<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: May 21, 2015
| Version: 1.0
| Latest Updates: 
	- added employer functionalities for the backend
| Bugs to fix: 
|--------------------------------------------------------------------------
*/

class Employer_model extends CI_Model {

	/*
	|--------------------------------------------------------------------------
	| create_user_employer()
	|--------------------------------------------------------------------------
	|
	| This function inserts a new employer user record to the database.
	| 
	| Parameters:
	| 	@user_employer_data the user employer data array
	| Return 0 an error occured
	| Return 1 successfully created the user
	*/
	public function create_user_employer( $user_employer_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->insert( "employers", $user_employer_data );
		$this->db->trans_complete();

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
	| get_employers()
	|--------------------------------------------------------------------------
	|
	| This function retrieves all employer record from the database. This is used
	| in the searching for employer functionalities.
	| 
	| Return 0 an error occured
	| Return query->result() array values
	*/
	public function get_employers()
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('a.emp_id, emp_first_name, emp_last_name, emp_address, emp_city, 
			emp_state_province_region, emp_country, emp_zipcode, emp_email_add'); 
			// freelancer_title, freelancer_skills');
		$this->db->from('employers a');
		// $this->db->join('freelancer_profile b', 'a.freelancer_id = b.freelancer_id');
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
	| get_employer_profile()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the logged in employer's profile.
	| 
	| Parameters:
	| 	@id the logged in employer id
	| Return query->result() array values
	| Return false
	*/
	public function get_employer_profile( $id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select();
		$this->db->from('employers a');
		$this->db->join('employer_profile b', 'a.emp_id = b.emp_id');
		$this->db->where('a.emp_id', $id);
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
	| universal_search_employer()
	|--------------------------------------------------------------------------
	|
	| This function queries the database for the logged in employer's profile.
	| This searches the database using the search key given and it could find either
	| through name, username, city or country.
	| 
	| Parameters:
	| 	@key the posted search key
	| Return query->result() array values
	| Return false
	*/
	public function universal_search_employer( $key )
	{
		$this->load->database();
		$this->db->trans_start();
		// universal searching algorithm
		$this->db->select('emp_id, emp_first_name, emp_last_name, emp_address, emp_city, 
			emp_state_province_region, emp_country, emp_zipcode, emp_email_add'); 
		$this->db->from('employers');
		$this->db->like('emp_first_name', $key, 'both');
		$this->db->or_like('emp_last_name', $key, 'both');
		$this->db->or_like('emp_city', $key, 'both');
		$this->db->or_like('emp_country', $key, 'both');
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

	public function get_employer_jobkeywords( $id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('job_keywords');
		$this->db->from('jobs');
		$this->db->where('job_id', $id);
		$query = $this->db->get();
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{	// error occured
			return 0;
		}
		else
		{
			if($query->num_rows() > 0)
			{	// return $query->result();
				foreach($query->result() as $key)
					return $key->job_keywords;
			}
			else
				return false;
		}
	}

	public function get_employer_id( $credential_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select('emp_id');
		$this->db->from('employers');
		$this->db->where('emp_username', $credential_data['username']);
		$this->db->where('emp_password', $credential_data['password']);
		$this->db->where('user_type', $credential_data['type']);
		$query = $this->db->get();
		$this->db->trans_complete();

		if($this->db->trans_status() === FALSE)
		{
			// generate an error... or use the log_message() function to log your error
			// echo "ERROR: there is a problem updating the entry, try again<br>";
			return 0;
		}	
		else
		{
			if($query->num_rows() == 1)
			{
				// return $query->result();
				foreach ($query->result() as $key) 
				{
					return $key->emp_id;
				}
			}
			else
			{
				return false;
			}
		}	
	}

	public function get_employer_jobpostings( $id )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select();
		$this->db->from('employers a');
		$this->db->join('employer_job b', 'a.emp_id = b.emp_id');
		$this->db->join('jobs c', 'b.job_id = c.job_id');
		$this->db->where('a.emp_id', $id);
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

	public function get_employercode_profile($emp_id)
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->select('emp_username, emp_city, emp_state_province_region, emp_country');
		$this->db->from('employers');
		$this->db->where('emp_id', $emp_id);
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

	public function update_employer_info( $emp_id, $edited_main_data )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->where("emp_id", $emp_id);
		$this->db->update("employers", $edited_main_data);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}

	public function update_employer_profile( $emp_id, $edited_profile_data )
	{
		$this->load->database();
		$this->db->trans_start();
		$this->db->where("emp_id", $emp_id);
		$this->db->update("employer_profile", $edited_profile_data);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}	

} 
// end of class model definition 