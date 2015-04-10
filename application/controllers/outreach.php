<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: March 21, 2015
| Version: 2.7
| Latest Updates: 
		* added more functionalities in the backend for loading data 
			in different page views 
		* fixed the index view bug
		* fixed the updating of students data
		* fixed multiple HTML table bugs in views
		* add a login page
| Bugs to fix: 
|
| Things to add: 
		* jquery DataTable Table Tools functionalities		
		* add csv parser/importer reader
		* add csv exporter/downloader
|--------------------------------------------------------------------------
*/


class Outreach extends CI_Controller {

	// public function __construct()
	// {
		// $this->load->model('outreach_model');
	// }
		

	// public function index()
	// {
	// 	$this->mainpage();
	// }

	public function add_student_participant() 
	{
		$id 		= $this->input->post('addStudentIDNo');
		$last 		= $this->input->post('addStudentLastName');
		$first 		= $this->input->post('addStudentFirstName');
		$middle 	= $this->input->post('addStudentMiddleName');
		$contact 	= $this->input->post('addContactNo');
		$year  		= $this->input->post('addYear');
		$course 	= $this->input->post('addCourse');
		$org 		= $this->input->post('addOrganization');
		$type 		= 'student';

		$data = array(
			'id_number'	=> $id, 
			'last_name' => $last, 
			'first_name' => $first, 
			'middle_name' => $middle, 
			'contact_number' => $contact, 
			'participant_type' => $type
		);

		$stud = array(
			'id_number' => $id, 
			'year' => $year, 
			'course' => $course, 
			'organization' => $org
		);

		$this->outreach_model->insert_participant( $data );
		if($type == 'student')
		{
			$this->load->model('outreach_model');
			$this->outreach_model->insert_student( $stud );
			redirect('outreach/students', 'refresh');
		}		
	}

	public function delete_student_participant( $idNo ) 
	{
		$ret_val = $this->outreach_model->delete_student_data( $idNo );
		$this->load->helper('url');
		if($ret_val == 1)
		{
			redirect('outreach/students', 'refresh');
		}
		else 
		{
			redirect('outreach/students', 'refresh');
		}
		
	}

	public function edit_student_participant()
	{
		$id 		= $this->input->post('studentID');
		$last 		= $this->input->post('studentLastName');
		$first 		= $this->input->post('studentFirstName');
		$middle		= $this->input->post('studentMiddleName');
		$org 		= $this->input->post('organization');
		// $dept 		= $this->input->post('department');
		$contact 	= $this->input->post('contactNo');
		$year  		= $this->input->post('year');
		$course 	= $this->input->post('course');
		$type 		= 'student';

		$data = array(
			'id_number'	=> $id, 
			'last_name' => $last, 
			'first_name' => $first, 
			'middle_name' => $middle, 
			'contact_number' => $contact, 
			'participant_type' => $type
		);

		$stud = array(
			'id_number' => $id, 
			'year' => $year, 
			'course' => $course, 
			'organization' => $org
		);

		$this->outreach_model->update_participant_entry( $id, $data );
		if($type == 'student')
		{
			$this->load->model('outreach_model');
			$this->outreach_model->update_student_entry( $data, $id, $stud );
			$res = $this->outreach_model->get_student_data();
			$this->load->view( 'students_view', $res );
		}		
	}

	public function mainpage() 
	{
		$this->load->model('outreach_model');
		$this->load->model('login_model');
		$user = $this->login_model->getloggedinusername();
		$level = $this->login_model->get_user_level( $user );
		$user_auth = $this->login_model->check_user_authentication_level( $level );
		if($user_auth == "superadmin")
		{
			$res['data'] = $this->outreach_model->get_program_data();
			$res['type'] = $this->outreach_model->get_outreach_subtype();
			$res['edittype'] = $this->outreach_model->get_outreach_subtype();
			$this->load->view( 'mainpage', $res );	
		}
		else if($user_auth == "staff" || $user_auth == "encoder")
		{
			$this->load->model('staff_model');
			$res['data'] = $this->staff_model->get_program_data_staff();
			$res['type'] = $this->staff_model->get_outreach_subtype();
			$res['edittype'] = $this->staff_model->get_outreach_subtype();
			$this->load->view( 'mainpage_staff', $res );	
		}
		else
			redirect('outreach/login', 'refresh');
	}

	public function programs()
	{
		$this->load->model('outreach_model');
		$this->load->helper('form');
		$this->load->view( 'programs_view' );
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

	public function students()
	{
		$this->load->model('outreach_model');
		$this->load->model('login_model');
		$user = $this->login_model->getloggedinusername();
		$level = $this->login_model->get_user_level( $user );
		$user_auth = $this->login_model->check_user_authentication_level( $level );
		if($user_auth == "superadmin")
		{
			$res = $this->outreach_model->get_student_data();
			$this->load->view( 'students_view', $res );
		}
		else if($user_auth == "staff" || $user_auth == "encoder")
		{
			$this->load->model('staff_model');
			$res = $this->staff_model->get_student_data();
			$this->load->view( 'students_view_staff', $res );
		}
		else
			redirect('outreach/login', 'refresh');

	}

	public function employees()
	{
		$this->load->model('outreach_model');
		$this->load->model('login_model');
		$user = $this->login_model->getloggedinusername();
		$level = $this->login_model->get_user_level( $user );
		$user_auth = $this->login_model->check_user_authentication_level( $level );
		if($user_auth == "superadmin")
		{
			$res['data'] 	= $this->outreach_model->get_employee_data();
			$res['office']	= $this->outreach_model->get_office_departments();
			$this->load->view( 'employees_view', $res );
		}
		else if($user_auth == "staff")
		{
			$this->load->model('staff_model');
			$res['data'] 	= $this->staff_model->get_employee_data();
			$res['office']	= $this->staff_model->get_office_departments();
			$this->load->view( 'employees_view_staff', $res );
		}
		else if($user_auth == "encoder")
		{
			$this->load->model('staff_model');
			$res['data'] 	= $this->staff_model->get_employee_data_noid();
			$res['office']	= $this->staff_model->get_office_departments();
			$this->load->view( 'employees_view_encoder', $res );
		}
		else
			redirect('outreach/login', 'refresh');
	}

	public function add_employee_participant() 
	{
		$id 		= $this->input->post('addEmployeeIDNo');
		$last 		= $this->input->post('addEmployeeLastname');
		$first 		= $this->input->post('addEmployeeFirstname');
		$middle 	= $this->input->post('addEmployeeMiddlename');
		$contact 	= $this->input->post('addEmployeeContactNo');
		$dept  		= $this->input->post('addEmployeeDepartment');
		$type 		= 'employee';

		$dept_id 	= $this->outreach_model->get_office_dept_id($dept);

		$data = array(
			'id_number'	=> $id, 
			'last_name' => $last, 
			'first_name' => $first, 
			'middle_name' => $middle, 
			'contact_number' => $contact, 
			'participant_type' => $type
		);

		$empl = array(
			'id_number' 	=> $id, 
			'office_department_id'	=> $dept_id
		);
		$this->outreach_model->insert_participant( $data );
		if($type == 'employee')
		{
			$this->load->model('outreach_model');
			$this->outreach_model->insert_employee( $empl );
			redirect('outreach/employees', 'refresh');
		}
	}

	public function delete_employee_participant( $idNo ) 
	{
		$ret_val = $this->outreach_model->delete_employee_data( $idNo );
		$this->load->helper('url');
		if($ret_val == 1)
		{
			redirect('outreach/students', 'refresh');
		}
		else 
		{
			redirect('outreach/students', 'refresh');
		}
		
	}

	public function edit_employee_participant()
	{
		$id 		= $this->input->post('employeeID');
		$last 		= $this->input->post('employeeLastName');
		$first 		= $this->input->post('employeeFirstName');
		$middle		= $this->input->post('employeeMiddleName');
		$contact 	= $this->input->post('employeeContactNo');
		$dept 		= $this->input->post('employeeDepartment');
		$type 		= 'employee';

		$dept_id 	= $this->outreach_model->get_office_dept_id($dept);

		$data = array(
			'id_number'	=> $id, 
			'last_name' => $last, 
			'first_name' => $first, 
			'middle_name' => $middle, 
			'contact_number' => $contact, 
			'participant_type' => $type
		);

		$stud = array(
			'id_number' => $id, 
			'office_department_id' => $dept_id
		);

		$this->outreach_model->update_participant_entry( $id, $data );
		if($type == 'employee')
		{
			$this->load->model('outreach_model');
			$this->outreach_model->update_employee_entry( $data, $id, $stud );
			$res = $this->outreach_model->get_employee_data();
			$this->load->view( 'employees_view', $res );
		}		
	}

	public function organizations()
	{
		$this->load->model('outreach_model');
		$this->load->model('login_model');
		$user = $this->login_model->getloggedinusername();
		$level = $this->login_model->get_user_level( $user );
		$user_auth = $this->login_model->check_user_authentication_level( $level );
		if($user_auth == "superadmin")
		{
			$res = $this->outreach_model->get_organizations_data();
			$this->load->view( 'organizations_view', $res );		
		}
		else if($user_auth == "staff" || $user_auth == "encoder")
		{
			$this->load->model('staff_model');
			$res = $this->staff_model->get_organizations_data();
			$this->load->view( 'organizations_view_staff', $res );
		}
		else
			redirect('outreach/login', 'refresh');		
	}

	public function sampleStudentData( $id )
	{
		$stud_details['details'] = $this->outreach_model->get_student_details( $id );
		$stud_details['student_name'] = $this->outreach_model->get_student_name( $id );
		$stud_details['programs_attended'] = $this->outreach_model->get_student_attended_programs( $id );

		$stud_details['id_num'] = $id;
		$stud_details['con_num'] = $this->outreach_model->get_student_contactnum( $id );
		$stud_details['yr'] = $this->outreach_model->get_student_year( $id );
		$stud_details['course'] = $this->outreach_model->get_student_course( $id );
		$stud_details['org'] = $this->outreach_model->get_student_org( $id );

		$this->load->view('sampleStudentData', $stud_details);
	}

	public function sampleEmployeeData( $id )
	{
		$empl_details['details'] = $this->outreach_model->get_employee_details( $id );
		$empl_details['employee_name'] = $this->outreach_model->get_employee_name( $id );
		$empl_details['programs_attended'] = $this->outreach_model->get_employee_attended_programs( $id );

		$empl_details['id_num'] = $id;
		$empl_details['con_num'] = $this->outreach_model->get_student_contactnum( $id );
		$empl_details['office'] = $this->outreach_model->get_office_department_name( $id );
		
		$this->load->model('login_model');
		$user = $this->login_model->getloggedinusername();
		$level = $this->login_model->get_user_level( $user );
		$user_auth = $this->login_model->check_user_authentication_level( $level );
		if($user_auth == "superadmin" || $user_auth == "staff")
		{
			$this->load->view('sampleEmployeeData', $empl_details);
		}
		else if($user_auth == "encoder")
		{
			$this->load->view('sampleEmployeeDataEncoder', $empl_details);
		}
		else
			$this->load->view('sampleEmployeeData', $empl_details);	
		
	}

	public function sampleOrganizationData( $id )
	{
		$org_details['details'] = $this->outreach_model->get_org_details( $id );
		$org_details['org_name'] = $this->outreach_model->get_org_name( $id );
		$org_details['programs_attended'] = $this->outreach_model->get_org_attended_programs( $id );
		$this->load->view('sampleOrganizationData', $org_details);
	}

	public function sampleProgramData( $id )
	{
		$prog_details['id']	= $id;
		$prog_details['details'] = $this->outreach_model->get_program_details( $id );
		$prog_details['program_name'] = $this->outreach_model->get_program_name( $id );
		$prog_details['program_address'] = $this->outreach_model->get_program_address( $id );
		$prog_details['program_date'] = $this->outreach_model->get_program_date( $id );
		$prog_details['program_type'] = $this->outreach_model->get_program_progtype( $id );
		$prog_details['program_desc'] = $this->outreach_model->get_program_desc( $id );
		$prog_details['program_semester'] = $this->outreach_model->get_program_progsem( $id );
		$prog_details['program_schoolyear'] = $this->outreach_model->get_program_progschoolyear( $id );

		$prog_details['program_attendees_students'] = $this->outreach_model->get_program_attendees_students( $id );
		$prog_details['program_attendees_employees'] = $this->outreach_model->get_program_attendees_employees( $id );
		$prog_details['program_attendees_org'] = $this->outreach_model->get_program_attendees_org( $id );
		$prog_details['list_of_students'] = $this->outreach_model->get_students_list( $id );
		$prog_details['list_of_employees'] = $this->outreach_model->get_employees_list( $id );
		$prog_details['list_of_orgs'] = $this->outreach_model->get_organizations_list( $id );
		$this->load->view('sampleProgramData', $prog_details);	
	}

	public function add_organization()
	{
		$org 		= $this->input->post('orgName');
		$desc 		= $this->input->post('orgDesc');
		$contact 	= $this->input->post('contactNo');

		$data = array(
			'organization_name'	=> $org, 
			'organization_description'	=> $desc, 
			'organization_contact_number' => $contact, 
		);		
		
		$this->load->model('outreach_model');
		$this->outreach_model->insert_organization( $data );
		redirect('outreach/organizations', 'refresh');
	}

	public function edit_organization() 
	{
		$id 		= $this->input->post('orgId');
		$org 		= $this->input->post('editOrgName');
		$desc 		= $this->input->post('editOrgDesc');
		$contact 	= $this->input->post('editContactNo');

		$data = array(
			'organization_name'				=> $org, 
			'organization_description'		=> $desc, 
			'organization_contact_number'   => $contact, 
		);		
		
		$this->outreach_model->update_organization_entry( $id, $data );
		$this->load->model('outreach_model');
		$res = $this->outreach_model->get_organizations_data();
		$this->load->view( 'organizations_view', $res );
	}

	public function delete_organization( $idNo ) 
	{
		$ret_val = $this->outreach_model->delete_org_data( $idNo );
		$this->load->helper('url');
		if($ret_val == 1)
		{
			redirect('outreach/students', 'refresh');
		}
		else 
		{
			redirect('outreach/students', 'refresh');
		}
		
	}

	public function add_program()
	{
		$title 		= $this->input->post('titleProgram');
		$date 		= $this->input->post('dateProgram');
		$brgy 		= $this->input->post('brgy');
		$town 		= $this->input->post('town');
		$province 	= $this->input->post('province');
		$desc  		= $this->input->post('descProgram');
		$type 		= $this->input->post('programType');
		$sem 		= $this->input->post('semester');
		$sy 	 	= $this->input->post('schoolYear');

		$data = array(
			'program_title'			=> $title, 
			'date'		 			=> $date, 
			'barangay' 				=> $brgy, 
			'town' 					=> $town, 
			'province' 				=> $province, 
			'program_description' 	=> $desc, 
			'program_type'			=> $type, 
			'semester'				=> $sem, 
			'school_year'			=> $sy
		);

		$this->load->model('outreach_model');
		$this->outreach_model->insert_program( $data );
		redirect('outreach/mainpage', 'refresh');
	}

	public function delete_program( $idNo ) 
	{
		$ret_val = $this->outreach_model->delete_program_data( $idNo );
		$this->load->helper('url');
		if($ret_val == 1)
		{
			redirect('outreach/mainpage', 'refresh');
		}
		else 
		{
			redirect('outreach/mainpage', 'refresh');
		}
	}

	public function edit_program()
	{ 
		$title 		= $this->input->post('editTitleProgram');
		$date 		= $this->input->post('editDateProgram');
		$brgy 		= $this->input->post('editBrgy');
		$town		= $this->input->post('editTown');
		$province 	= $this->input->post('editProvince');
		$desc 		= $this->input->post('editDescProgram');
		$type  		= $this->input->post('editProgramType');
		$id 		= $this->input->post('programID');
		$sem 		= $this->input->post('editSemester');
		$sy 		= $this->input->post('editSchoolYear');

		$data = array(
			'program_title'			=> $title, 
			'program_description' 	=> $desc, 
			'barangay' 				=> $brgy, 
			'town' 					=> $town, 
			'province' 				=> $province, 
			'date'					=> $date,
			'program_type' 			=> $type,
			'semester'				=> $sem,
			'school_year'			=> $sy
		);

		$this->load->model('outreach_model');
		$this->outreach_model->update_program_entry( $data, $id );
		$res = $this->outreach_model->get_program_data();
		$this->load->view( 'mainpage', $res );

	}

	public function program_add_organization()
	{
		$id = $this->input->post('orgId');
		$prog = $this->input->post('progId');
		$this->outreach_model->program_add_this_org( $id, $prog );
	}


	public function program_add_employee()
	{
		$id = $this->input->post('empId');
		$prog = $this->input->post('empProgId');
		$this->outreach_model->program_add_this_emp( $id, $prog );
	}

	public function program_add_student()
	{
		$id = $this->input->post('studId');
		$prog = $this->input->post('studProgId');
		$this->outreach_model->program_add_this_stud( $id, $prog );
	}

	public function aboutus()
	{
		$this->load->view('aboutus');
	}

	public function options()
	{
		$this->load->model('outreach_model');
		$res['data'] 	= $this->outreach_model->get_systemuser_data();
		$this->load->view('options', $res);
	}

	public function add_system_user()
	{
		$this->load->helper('security');
		$this->load->model('outreach_model');
		$user = $this->input->post('userName');
		$pass = $this->input->post('userPassword');
		$level = $this->input->post('accountLevel');
		$first = $this->input->post('firstName');
		$last = $this->input->post('lastName');
		$hashed = do_hash($pass, 'md5');

		$sys_user_data = array(
			'username' => $user, 
			'password' => $hashed, 
			'account_level' => $level, 
			'firstname' => $first, 
			'lastname' => $last
		);
		// get user session here... and check if level is == 5
		$authorization = $this->outreach_model->check_authorized_user( $user, $first, $last );
		if($authorization == 'authorized')
		{
			$ret = $this->outreach_model->insert_system_user( $sys_user_data );
			if($ret == 1)
				redirect('outreach/options', 'refresh');
				// echo $ret;
			else
				echo $ret;
		}
		else 
		{
			// send a warning to the frontend saying that the user 
			// currently logged in is not authorized 
			redirect('outreach/options', 'refresh');	
		}
	}

	public function delete_system_user( $username, $first, $last )
	{
		$authorization = $this->outreach_model->check_authorized_user( $username, $first, $last );
		if($authorization == 'authorized')
		{
			$this->outreach_model->remove_system_user( $username, $first, $last );
			redirect('outreach/options', 'refresh');
		}
		else 
		{
			// send a warning to the frontend saying that the user 
			// currently logged in is not authorized 
			redirect('outreach/options', 'refresh');	
		}	
	}

	public function edit_system_user()
	{
		$this->load->helper('security');
		$id = $this->input->post('editAccountID');
		$user = $this->input->post('editUserName');
		$pass = $this->input->post('editUserPassword');
		$level = $this->input->post('editAccountLevel');
		$first = $this->input->post('editFirstName');
		$last = $this->input->post('editLastName');
		$hashed = do_hash($pass, 'md5');
		$edit_details = array(
			'username' => $user, 
			'password' => $hashed, 
			'account_level' => $level, 
			'firstname' => $first, 
			'lastname' => $last
		);

		$this->outreach_model->update_system_user( $id, $edit_details );
		redirect('outreach/options', 'refresh');
	}

	public function logout() 
	{
		$this->session->unset_userdata('logged_in');
		// session_destroy();
		redirect('login', 'refresh');
	}

}

?>