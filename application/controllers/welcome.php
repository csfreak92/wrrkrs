<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outreach extends CI_Controller {

	public function index()
	{
		$this->load->model('outreach');
		$id 		= $this->input->post('id_number');
		$lastname 	= $this->input->post('firstname');
		$firstname  = $this->input->post('lastname');
		$middlename = $this->input->post('middlename');
		$contact 	= $this->input->post('contact_number');
		$type  		= $this->input->post('type');
		$year  		= $this->input->post('year');
		$course 	= $this->input->post('course');
		$org 		= $this->input->post('org');
		$data = array(
				'id_number' => $id, 
				'lastname' => $lastname, 
				'firstname' => $firstname, 
				'middlename' => $middlename, 
				'contact_number' => $contact, 
				'type' => $type, 
				'year' => $year,
				'course' => $course, 
				'org' => $org
			);
		$this->outreach->add_student( $data );
		// $this->load->view('');
	}

	public function home() 
	{
		$this->load->model('outreach');
		$this->load->view('home_view');
	}

	public function programs()
	{
		$this->load->model('outreach');
		$this->load->helper('form');
		// $log_user = $this->login_model->getloggedinusername();
		// $log_pass = $this->login_model->getloggedinpass();
		// $dept = $this->login_model->getloginuser_deptid( $log_user );
		$data['type'] = $this->outreach->get_program_type();
		$this->load->view( 'program_view', $data );
	}

	public function list_programs()
	{
		$this->load->database();
		$query = $this->db->query("SELECT barangay, town, province, program_type FROM programs ORDER BY program_id");
		$this->load->library('table');
		$this->table->set_heading('barangay', 'town', 'province', 'program_type');
		$tmpl = array (
           'table_open' => '<table border="1" cellpadding="4" cellspacing="0" align="center" id="mytable" class="stripe">'
        );
		$this->table->set_template($tmpl);
		echo $this->table->generate($query);	
	}

	public function program_lists()
	{
		$this->load->database();
		$query = $this->db->query("SELECT barangay, town, province, program_type FROM programs ORDER BY program_id");
		$this->load->library('table');
		$this->table->set_heading('barangay', 'town', 'province', 'program_type', 'edit', 'delete');
		foreach($query->result() as $row)
		{
			$links = anchor('mymodules/view_teacher_request_details/'.$row->out_request_id.'/'.$row->schedule_id,
			 'View Request Details');
			$this->table->add_row(
					$row->out_request_id, 
					$row->status, 
					// for debugging purposes //row->requesting_dept_id, 
					$row->department_name,
					$row->schedule_id,
					$links
				);
		}
		$tmpl = array (
           'table_open' => '<table border="1" cellpadding="4" cellspacing="0" align="center" class="table table-hover" id="mytable">'
        );
		$this->table->set_template($tmpl);
		echo $this->table->generate();		

	}
			
		

}











	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
// 	public function index()
// 	{
// 		$data['department'] = $this->outreach->department();
// 		$this->load->view('welcome_message',$data);
// 	}
	
	
// 	public function employees(){
		
// 		$str_display = '';
		
// 		$emp_details = $this->outreach->employees($this->input->post());
		
// 		foreach($emp_details as $e_d){
// 			$str_display .= '<option value="'.$e_d['emp_id'].'">'.$e_d['emp_name'].'</option>';
// 		}
		
// 		echo json_encode(array('result_display'=>$str_display));
// 	}
// }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */