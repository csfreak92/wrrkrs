<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: April 10, 2015
| Version: 1.0
| Latest Updates: 

| Bugs to fix: 

|--------------------------------------------------------------------------
*/

class Job_model extends CI_Model {

	public function create_job_posting( $job_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->insert( "jobs", $job_data );
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

	public function search_job_postings( $city = "", $state = "", $country = "" )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->select();
		$this->db->from('employer_job');
		$this->db->where('emp_city', $city);
		$this->db->where('emp_state_province_region', $state);
		$this->db->where('emp_country', $country);
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

} 
// end of class model definition 
