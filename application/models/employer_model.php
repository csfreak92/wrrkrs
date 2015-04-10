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

class Employer_model extends CI_Model {

	public function create_user_employer( $user_employer_data )
	{
		$this->load->database();

		$this->db->trans_start();
		$this->db->insert( "employers", $user_employer_data );
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

} 
// end of class model definition 