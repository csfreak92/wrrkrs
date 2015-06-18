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

class Login_model extends CI_Model {

	public function login ( $username, $password )
	{
		$this->load->helper('security');
		// NOTE: JUST TURN BACK THE MD5 HASH LATER AFTER DEBUGGING AND MAKING THE BASIC FUNCTIONALITIES
		// OF USER ADDING AND PASSWORD CREATION!!!!
		// $hashed_pass = do_hash( $password, 'md5' );
		$hashed_pass = $password;
		// this query checks if the logging in user is an employer
		$this->db->select();
		$this->db->from('employers');
		$this->db->where('emp_username', $this->db->escape_str($username) );
		$this->db->where('emp_password', $this->db->escape_str($hashed_pass) );
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			// this query checks if the logging in user is a freelancer
			$this->db->select();
			$this->db->from('freelancers');
			$this->db->where('freelancer_username', $this->db->escape_str($username) );
			$this->db->where('freelancer_password', $this->db->escape_str($hashed_pass) );
			$this->db->limit(1);
			$another_query = $this->db->get();
			if ($another_query->num_rows() == 1)
			{
				return $another_query->result();
			}
			else
				return false;
		}
	}

	public function get_loggedin_username( )
	{
		$var = $this->session->userdata('logged_in');
		// get the username of the logged in user in a session
		$uname = $var['username'];
		return $uname;
	}

	public function get_loggedin_pass( )
	{
		$var = $this->session->userdata('logged_in');
		// get the password of the logged in user in a session
		$pass = $var['password'];
		return $pass;
	}

	public function get_loggedin_usertype()
	{
		$var = $this->session->userdata('logged_in');
		$type = $var['usertype'];
		return $type;
	}

	public function get_user_fullname()
	{
		$var = $this->session->userdata('logged_in');
		$full = $var['fullname'];
		return $full;
	}

	public function loggedinuser( $table, $username, $password )
	{
		$this->load->database();
		$this->db->select('firstname, lastname');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get( $table );
		if($query->num_rows() > 0)
		{
			$row = $query->row_array();
			echo $row['firstname']." ";
			echo $row['lastname'];
		}
	}
}

?>