<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: May 30, 2015
| Version: 1.0
| Latest Updates: 
	* created more functions and modules that will handle API requests and responses
| Bugs to fix: 
|
| Things to add: 
	* backend codes for sending an email to the user and then confirmation of the user
|--------------------------------------------------------------------------
*/

class Api_handler extends CI_Controller {

	// public function curl_request_indeed()
	// {
	// 	$this->get_curl_indeed();
	// }

	public function fetch_existing_jobdata()
	{
		$key = $this->input->post('searchKey');
		$loc = $this->input->post('searchLoc');

		$rec_val = $this->check_database_records($key, $loc);
		if($rec_val != "" || $rec_val != false || $rec_val != NULL || $rec_val != " ")
			echo json_encode($rec_val);
		else
			echo "Sorry, no data found";
	}

	// this takes at least 30 seconds to react for the website
	// this also somehow crashes the site when it is so slow
	public function curl_request_indeed()
	{
		$key = $this->input->post('searchKey');
		$loc = $this->input->post('searchLoc');
		// $country = $this->input->post('country');
		// set this country to ca by default since we want Canada. refer to Indeed API documentation
		$country = "ca";
		$curl = curl_init();
		// this could have no location &l= NULL but 
		// this could not have &q= NULL
		// either way could not be null!!!
		// country cannot be null!!!

		// Everything must be urlencoded because the API had problems if it is not encoded
		$encoded_key = urlencode($key);
		$encoded_loc = urlencode($loc);
		$link = 'http://api.indeed.com/ads/apisearch?publisher=2891706259072003&q='.$encoded_key.'&l='.$encoded_loc.'&sort=&radius=&st=&jt=&start=&limit=100&fromage=&filter=&latlong=1&co='.$country.'&chnl=&userip=1.2.3.4&useragent=Mozilla/%2F4.0%28Firefox%29&v=2&format=json';
		// Set some options 
		curl_setopt_array($curl, array(
			// Return the response as a string instead of outputting it to the screen
			CURLOPT_RETURNTRANSFER => 1, 
			// URL to send request to 
			CURLOPT_URL => $link, 
			CURLOPT_CONNECTTIMEOUT => 5
			// CURLOPT_TIMEOUT => 5
		));
		// Send the request and save response to $resp 
		$resp = curl_exec($curl);
		// Display result output
		// echo json_encode($resp);
		echo $resp;
		// have a function here that catches the response for writing it in the backend database tables!!!
		if($resp != false)
			$this->save_indeed_api_response( $resp, $key, $loc );
		// Close request to clear up some resources
		curl_close($curl);
	}

	private function check_database_records( $key, $loc )
	{
		$data = $this->job_model->get_available_jobdata($key, $loc);
		return $data;
	}

	private function save_indeed_api_response( $resp, $key, $loc )
	{
		if($key == "" || $key == false || $key == " " || $key == null)
			$key = $loc;
		$parsed = json_decode($resp, true);
		$version = $parsed['version'];
		for($x = 0; $x < 25; $x++)
		{
			$results = $parsed['results'][$x];
			$job_data = array(
				'jobtitle' 			=> $results['jobtitle'], 
				'company' 			=> $results['company'],
				'city' 				=> $results['city'],
				'state' 			=> $results['state'],
				'country'			=> $results['country'],
				'formattedLocation'	=> $results['formattedLocation'],
				'source'			=> $results['source'],
				'date'				=> $results['date'],
				'snippet'			=> $results['snippet'],
				'url'				=> $results['url'],
				'formattedRelativeTime'	=> $results['formattedRelativeTime'], 
				'keywords'			=> $key
			);
			$this->job_model->insert_indeed_api_response($job_data);
		}
	}

}	// end class definition

?>