<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: May 31, 2015
| Version: 1.0
| Latest Updates: 
	* placed here the controller modules and functions for the searching of grabbed data from Indeed API
| Bugs to fix: 
|
| Things to add: 
	* backend codes for sending an email to the user and then confirmation of the user
|--------------------------------------------------------------------------
*/

class Extras extends CI_Controller {

	public function index()
	{
		$this->search_grabbed_data();
	}

	public function search_grabbed_data()
	{
		$this->load->view('search_grabbed_data_view');
	}

}