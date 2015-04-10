<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: April 10, 2015
| Latest Updates: 
|		* Created brief descriptions and comments
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Login.php 
|--------------------------------------------------------------------------
|
| This file is the user-defined controller for the login module of this project.
| This does the execution of all the functions and verifications required for logging 
| a user if he/she is allowed to access the system.
|
*/

class Login extends CI_Controller {

	/*
	|--------------------------------------------------------------------------
	| __construct 
	|--------------------------------------------------------------------------
	|
	| This is the constructor for this controller that inherits base class
	| constructor properties of Codeigniter. 
	|
	*/
	public function __construct() 
	{
		parent::__construct();
	}

	/*
	|--------------------------------------------------------------------------
	| index 
	|--------------------------------------------------------------------------
	|
	| This function does execute by linking the login_model and the login_view
	| for checking and verifying whether the logged in user is allowed access. 
	|
	*/
	public function index() 
	{
		$this->load->helper(array('form'));
		$this->load->model('login_model');
		$this->load->view('login_view');
	}

}