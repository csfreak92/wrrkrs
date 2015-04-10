<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
/--------------------------------------------------------------------------
| Code Maintainer: Ralph Nicole N. Andalis - Lead Web Developer/Backend Developer
| Last Date Updated: February 27, 2015
| Version: 2.7
| Latest Updates: 
		* edited the return query of get_student_data() function
		* added more functions in the organizations, programs and employees pages
| Bugs to fix: 
|--------------------------------------------------------------------------
*/


class Outreach_model extends CI_Model {

	public function add_student( $data )
	{
		$this->load->database();

		$part_data = array(
				'id_number' => $data['id_number'], 
				'last_name'  => $data['lastname'], 
				'first_name' => $data['firstname'], 
				'middle_name' => $data['middlename'],
				'contact_number' => $data['contact_number'], 
				'participant_type' => $data['type']
			);
		$this->db->insert( "participants" , $part_data );

		$stud_data = array(
				'id_number' => $data['id_number'], 
				'year' => $data['year'],
				'course' => $data['course'],
				'organization' => $data['org']
			);
		$this->db->insert( "students" , $stud_data );

		echo "DATA: has been inserted to PARTICIPANTS & STUDENTS table<br>";
	}

	public function insert_participant( $part_data )
	{
		$this->db->insert( "participants" , $part_data );
	}

	public function insert_student( $stud_data )
	{
		$this->db->insert( "students", $stud_data );
	}

	public function insert_employee( $emp_data ) 
	{
		$this->db->insert( "employees", $emp_data );
	}

	public function insert_organization( $org_data )
	{
		$this->db->insert( "organizations", $org_data );
	}

	public function insert_program( $prog_data )
	{
		$this->db->insert( "programs", $prog_data );
	}

	public function update_participant_entry( $id, $data )
	{
		$this->load->database();
		$this->db->where('id_number', $id);
		$this->db->update('participants', $data);
	}

	public function update_student_entry( $data, $id, $stud )
	{
		$this->load->database();
		$this->db->where('id_number', $id );
		$this->db->update('students', $stud );
		// echo "successfully updated student entry!<br>";
		// add a JSON here for the alert of JS! :) 
	}

	public function update_organization_entry( $id, $data )
	{
		$this->load->database();
		$this->db->where('organization_id', $id);
		$this->db->update('organizations', $data);
	}


	public function get_student_data()
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM students a JOIN participants b	WHERE a.id_number = b.id_number");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)	
			{
				$data = $this->table->add_row( 
					$row->id_number, 
					$row->last_name,
					$row->first_name, 
					$row->middle_name, 
					$row->contact_number, 
					$row->year, 
					$row->course, 
					$row->organization, 

					$det_link = '<div class="medium warning btn icon-left icon-pencil" name="del-btn" id="'.$row->id_number.'" data-key="'.$row->id_number.'">
					<a href="#" class="clickableRow" data-key="'.$row->id_number.'" gumby-trigger="|#detailStudent" gumby-on="click">Details</a></div>',

					$del_link = '<div class="medium danger btn icon-left icon-cancel" name="del-btn" id="'.$row->id_number.'" data-key="'.$row->id_number.'">
					<a href="#" class="toggle" data-key="'.$row->id_number.'" gumby-trigger="|#delStudent" gumby-on="click">Delete</a></div>',

					$edit_link = '<div class="medium info btn icon-left icon-pencil"><a href="#" class="switch" gumby-trigger="#editStudent" id="'.$row->id_number.'" data-key="'.$row->id_number.'"
					data-lastname="'.$row->last_name.'" data-firstname="'.$row->first_name.'" data-middlename="'.$row->middle_name.'" data-contactnumber="'.$row->contact_number.'"
					data-year="'.$row->year.'" data-course="'.$row->course.'" data-organization="'.$row->organization.'">Edit</a></div>'
				);
				echo $data;				
			}
		}		
	}

	public function get_student_details( $id )
	{
		$this->load->database();
		$result = $this->db->query("SELECT * FROM students a JOIN participants b ON a.id_number = b.id_number WHERE a.id_number = '".$id."' ");
		$data = array();
		if($result->result() > 0 )
		{
			foreach($result->result() as $row)
			{
				$data = array(
					'id_number' 		=> $row->id_number, 
					'first_name'		=> $row->first_name, 
					'last_name'			=> $row->last_name, 
					'middle_name'		=> $row->middle_name, 
					'contact_number'	=> $row->contact_number,
					'year'				=> $row->year, 
					'course' 			=> $row->course,
					'organization'		=> $row->organization
				);
			}
			return $data;
		}
	}

	public function get_student_name( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT last_name, first_name, middle_name FROM participants WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->first_name." ".$row->middle_name." ".$row->last_name;
			}
		}
	}

	public function get_student_attended_programs( $id )
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM participant_record a
			JOIN programs b ON a.program_id = b.program_id
		 WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data = $this->table->add_row(
					// $row->participant_record_id, 
					// $row->program_id, 
					// $row->id_number,
					// $row->program_type
					$row->program_title, 
					$row->program_description, 
					$row->date,
					$row->barangay.", ".$row->town.", ".$row->province
				);
				echo $data;	
				// return $row->participant_record_id." ".$row->program_id." ".$row->id_number." ".$row->program_type;
			}
		}
	}

	public function get_program_type()
	{
		$this->load->database();
		$result = $this->db->query("SELECT program_type FROM programs ORDER BY ASC");
		$return = array();
		if($result->num_rows() > 0) {
			$return[''] = 'please select program type';
			foreach ($result->result_array() as $row) {
				$return[$row['program_type']] = $row['program_type'];
			}
		}
		return $return;		
	}

	public function delete_student_data( $idNo )
	{
		$this->load->database();
		$this->db->trans_start();

		$this->db->where('id_number', $idNo);
		$this->db->delete('students'); 

		$this->db->where('id_number', $idNo);
		$this->db->delete('participants'); 

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error updating the record";
			return 0;
		}
		else 
		{
			// echo "successfully deleted student and participant data!";
			return 1;
		}	
	}

	public function get_office_departments()
	{
		$query = $this->db->query("SELECT * FROM office_department");
		$data = array();
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				// $data[$row->office_department_id]

				$data[$row->office_department_id] = array(
					// 'office_department_id' 		=> $row->office_department_id, 
					'office_department_name'	=> $row->office_department_name
				);
			}
			return $data;				
		}
	}

	public function get_office_dept_id( $name )
	{
		$q = $this->db->escape_str($name);
		$query = $this->db->query("SELECT office_department_id FROM office_department
			WHERE office_department_name='".$q."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
				return $row->office_department_id;
		}
	}

	public function get_employee_data()
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM employees a JOIN participants b ON a.id_number = b.id_number
			JOIN office_department c ON c.office_department_id = a.office_department_id
			WHERE a.id_number = b.id_number");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)	
			{
				$data = $this->table->add_row( 
					$row->id_number, 
					$row->last_name,
					$row->first_name, 
					$row->middle_name, 
					$row->contact_number, 
					$row->office_department_name, 

					$det_link = '<div class="medium warning btn icon-left icon-pencil" name="del-btn" id="'.$row->id_number.'" data-key="'.$row->id_number.'">
					<a href="#" class="clickableRow" data-key="'.$row->id_number.'" gumby-trigger="|#detailEmployee" gumby-on="click">Details</a></div>',

					$del_link = '<div class="medium danger btn icon-left icon-cancel" name="del-btn" id="'.$row->id_number.'" data-key="'.$row->id_number.'">
					<a href="#" class="toggle" data-key="'.$row->id_number.'" gumby-trigger="|#delEmployee" gumby-on="click">Delete</a></div>',

					$edit_link = '<div class="medium info btn icon-left icon-pencil"><a href="#" class="switch" gumby-trigger="#editEmployee" id="'.$row->id_number.'" data-key="'.$row->id_number.'"
					data-lastname="'.$row->last_name.'" data-firstname="'.$row->first_name.'" data-middlename="'.$row->middle_name.'" data-contactnumber="'.$row->contact_number.'"
					data-department="'.$row->office_department_name.'">Edit</a></div>'
				);
				echo $data;				
			}
		}		
	}

	public function delete_employee_data( $idNo )
	{
		$this->load->database();
		$this->db->trans_start();

		$this->db->where('id_number', $idNo);
		$this->db->delete('employees'); 

		$this->db->where('id_number', $idNo);
		$this->db->delete('participants'); 

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error updating the record";
			return 0;
		}
		else 
		{
			// echo "successfully deleted student and participant data!";
			return 1;
		}	
	}

	public function update_employee_entry( $data, $id, $stud )
	{
		$this->load->database();
		$this->db->where('id_number', $id );
		$this->db->update('employees', $stud );
		// echo "successfully updated student entry!<br>";
		// add a JSON here for the alert of JS! :) 
	}

	public function get_employee_details( $id )
	{
		$this->load->database();
		$result = $this->db->query("SELECT * FROM students a JOIN participants b ON a.id_number = b.id_number WHERE a.id_number = '".$id."' ");
		$data = array();
		if($result->result() > 0 )
		{
			foreach($result->result() as $row)
			{
				$data = array(
					'id_number' 		=> $row->id_number, 
					'first_name'		=> $row->first_name, 
					'last_name'			=> $row->last_name, 
					'middle_name'		=> $row->middle_name, 
					'contact_number'	=> $row->contact_number,
					'department'		=> $row->department, 
				);
			}
			return $data;
		}
	}

	public function get_employee_name( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT last_name, first_name, middle_name FROM participants WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->first_name." ".$row->middle_name." ".$row->last_name;
			}
		}
	}

	public function get_employee_attended_programs( $id )
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM participant_record a
			JOIN programs b ON a.program_id = b.program_id
		 WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data = $this->table->add_row(
					$row->program_title, 
					$row->program_description, 
					$row->date,
					$row->barangay.", ".$row->town.", ".$row->province
				);
				echo $data;	
			}
		}
	}

	public function get_organizations_data()
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM organizations");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)	
			{
				$data = $this->table->add_row( 
					$row->organization_name, 
					$row->organization_description, 
					$row->organization_contact_number, 

					$det_link = '<div class="medium warning btn icon-left icon-pencil" name="del-btn" id="'.$row->organization_id.'" data-key="'.$row->organization_id.'">
					<a href="#" class="clickableRow" data-key="'.$row->organization_id.'" gumby-trigger="|#detailOrg" gumby-on="click">Details</a></div>',

					$del_link = '<div class="medium danger btn icon-left icon-cancel" name="del-btn" id="'.$row->organization_id.'" data-key="'.$row->organization_id.'">
					<a href="#" class="toggle" data-key="'.$row->organization_id.'" gumby-trigger="|#delOrg" gumby-on="click">Delete</a></div>',

					$edit_link = '<div class="medium info btn icon-left icon-pencil"><a href="#" class="switch" gumby-trigger="#editOrg" id="'.$row->organization_id.'" data-key="'.$row->organization_id.'"
					data-name="'.$row->organization_name.'" data-description="'.$row->organization_description.'" data-contactnumber="'.$row->organization_contact_number.'">Edit</a></div>'
				);
				echo $data;				
			}
		}		
	}

	public function get_org_details( $id )
	{
		$this->load->database();
		$result = $this->db->query("SELECT * FROM organizations WHERE organization_id = '".$id."' ");
		$data = array();
		if($result->result() > 0 )
		{
			foreach($result->result() as $row)
			{
				$data = array(
					'organization_name' 			=> $row->organization_name, 
					'organization_description'		=> $row->organization_description, 
					'organization_contact_number'	=> $row->organization_contact_number
				);
			}
			return $data;
		}
	}

	public function get_org_name( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT organization_name FROM organizations WHERE organization_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->organization_name;
			}
		}
	}

	public function get_org_attended_programs( $id )
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM participant_org_record a
			JOIN programs b ON a.program_id = b.program_id
			JOIN organizations c ON a.organization_id = c.organization_id
		 WHERE  a.organization_id= '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data = $this->table->add_row(
					$row->program_title, 
					$row->program_description, 
					$row->date,
					$row->barangay.", ".$row->town.", ".$row->province
				);
				echo $data;	
			}
		}
	}


	public function delete_org_data( $idNo )
	{
		$this->load->database();
		$this->db->trans_start();

		$this->db->where('organization_id', $idNo);
		$this->db->delete('organizations'); 

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error updating the record";
			return 0;
		}
		else 
		{
			// echo "successfully deleted student and participant data!";
			return 1;
		}	
	}

	public function get_program_data()
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM programs");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)	
			{
				$data = $this->table->add_row( 
					$row->program_title, 
					// $row->program_description,
					$row->date,
					$row->barangay,
					$row->town, 
					$row->province, 
					$row->program_type,
					$row->semester, 
					$row->school_year,
					
					$det_link = '<div class="medium warning btn icon-left icon-pencil" name="del-btn" id="'.$row->program_id.'" data-key="'.$row->program_id.'">
					<a href="#" class="clickableRow" data-key="'.$row->program_id.'" gumby-trigger="|#detailProgram" gumby-on="click">Details</a></div>',

					$del_link = '<div class="medium danger btn icon-left icon-cancel" name="del-btn" id="'.$row->program_id.'" data-key="'.$row->program_id.'">
					<a href="#" class="toggle" data-key="'.$row->program_id.'" gumby-trigger="|#delProgram" gumby-on="click">Delete</a></div>',

					$edit_link = '<div class="medium info btn icon-left icon-pencil"><a href="#" class="switch" gumby-trigger="#editProgram" id="'.$row->program_id.'" data-key="'.$row->program_id.'"
					data-title="'.$row->program_title.'" data-date="'.$row->date.'" data-barangay="'.$row->barangay.'" data-town="'.$row->town.'"
					data-description="'.$row->program_description.'" data-province="'.$row->province.'" data-semester="'.$row->semester.'" data-school_year="'.$row->school_year.'" data-type="'.$row->program_type.'" ">Edit</a></div>'
				);
				echo $data;				
			}
		}		
	
	}

	public function get_outreach_subtype()
	{
		$query = $this->db->query("SELECT * FROM program_types");
		if($query->result() > 0)
		{
			foreach ($query->result() as $row) 
			{
				$data[$row->type_id] = array(
					'type_name' => $row->type_name
				);
			}
			return $data;
		}
	}

	public function delete_program_data( $idNo )
	{
		$this->load->database();
		$this->db->trans_start();

		$this->db->where('program_id', $idNo);
		$this->db->delete('programs'); 

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error updating the record";
			return 0;
		}
		else 
		{
			// echo "successfully deleted student and participant data!";
			return 1;
		}		
	}

	public function update_program_entry( $data, $id )
	{
		$this->load->database();
		$this->db->where('program_id', $id);
		$this->db->update('programs', $data);	
	}


	public function get_program_details( $id )
	{
		$this->load->database();
		$result = $this->db->query("SELECT * FROM programs WHERE program_id = '".$id."' ");
		$data = array();
		if($result->result() > 0 )
		{
			foreach($result->result() as $row)
			{
				$data = array(
					'program_title' 		=> $row->program_title, 
					'program_description'	=> $row->program_description, 
					'barangay'				=> $row->barangay,
					'town'					=> $row->town, 
					'province'				=> $row->province,
					'program_type'			=> $row->program_type, 
					'date' 					=> $row->date
				);
			}
			return $data;
		}
	}

	public function get_program_name( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT program_title FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->program_title;
			}
		}
	}



// 

	public function get_program_attendees_students( $id )
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM participant_record a
			JOIN programs b ON a.program_id = b.program_id
			JOIN participants d ON a.id_number = d.id_number
			WHERE  a.program_id= '".$id."' AND participant_type='student' ");
		$data = array();
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[$row->id_number] = array(
					'id_number' 	=> $row->id_number, 
					'last_name'		=> $row->last_name,
					'first_name'	=> $row->first_name,
					'middle_name'	=> $row->middle_name, 
					'contact_number'=> $row->contact_number, 
					'participant_type'=> $row->participant_type
				);
			}
		}
		return $data;
	}

	public function get_program_attendees_employees( $id )
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM participant_record a
			JOIN programs b ON a.program_id = b.program_id
			JOIN participants d ON a.id_number = d.id_number
			JOIN employees e ON d.id_number = e.id_number
			JOIN office_department f ON e.office_department_id = f.office_department_id
			WHERE  a.program_id= '".$id."' AND participant_type='employee' ");
		$data = array();
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[$row->id_number] = array(
					'id_number' 	=> $row->id_number, 
					'last_name'		=> $row->last_name,
					'first_name'	=> $row->first_name,
					'middle_name'	=> $row->middle_name, 
					'contact_number'=> $row->contact_number, 
					'participant_type'=> $row->participant_type, 
					'office_department_name'=> $row->office_department_name
				);
			}
		}
		return $data;
	}

	public function get_program_attendees_org( $id )
	{
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT * FROM participant_org_record a
			JOIN programs b ON a.program_id = b.program_id
			JOIN organizations c ON a.organization_id = c.organization_id
			WHERE a.program_id = '".$id."' ");
		$data = array();
		if($query->result() > 0) 
		{			
			foreach($query->result() as $row)
			{
				// $data = $this->table->add_row(
				// 	$row->organization_name, 
				// 	$row->program_title, 
				// 	$row->organization_contact_number
				// );
				// echo $data;
				$data[$row->record_id] = array(
					'organization_name' 			=> $row->organization_name, 
					'organization_contact_number'	=> $row->organization_contact_number
				);
			}	
		}
		return $data;
	}

	public function get_students_list( $id )
	{
		// $query = $this->db->query("SELECT * FROM students a
		// 	JOIN participants b ON a.id_number = b.id_number");
		$query = $this->db->query("SELECT a.id_number, a.last_name, a.first_name, a.middle_name, a.contact_number, a.participant_type
			FROM participants a WHERE a.id_number NOT IN (SELECT b.id_number FROM participant_record b WHERE b.program_id = '".$id."') AND a.participant_type = 'student'");
		$data = array();
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[$row->id_number] = array(
					'id_number' 	=> $row->id_number, 
					'last_name'		=> $row->last_name,
					'first_name'	=> $row->first_name,
					'middle_name'	=> $row->middle_name, 
					'contact_number'=> $row->contact_number, 
					'participant_type'=> $row->participant_type
				);
			}
		}
		return $data;
	}
	

	public function get_employees_list( $id )
	{
		// $query = $this->db->query("SELECT * FROM employees a
		// 	JOIN participants b ON a.id_number = b.id_number");

		$query = $this->db->query("SELECT a.id_number, a.last_name, a.first_name, a.middle_name, a.contact_number, a.participant_type
			FROM participants a WHERE a.id_number NOT IN (SELECT b.id_number FROM participant_record b WHERE b.program_id = '".$id."') AND a.participant_type = 'employee'");
		$data = array();
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[$row->id_number] = array(
					'id_number' 	=> $row->id_number, 
					'last_name'		=> $row->last_name,
					'first_name'	=> $row->first_name,
					'middle_name'	=> $row->middle_name, 
					'contact_number'=> $row->contact_number, 
					'participant_type'=> $row->participant_type
				);
			}
		}
		return $data;
	}

	public function get_organizations_list( $id )
	{
		$query = $this->db->query("SELECT a.organization_id, a.organization_name, a.organization_description, a.organization_contact_number
			FROM organizations a WHERE a.organization_id NOT IN (SELECT b.organization_id FROM participant_org_record b WHERE b.program_id = '".$id."') ");
			// AND a.program_id = 1
			// SELECT TBL1.ORGANIZATION_ID, TBL1.ORGANIZATION_NAME 
			// FROM ORGANIZATIONS TBL1
			// WHERE TBL1.ORGANIZATION_ID NOT IN (SELECT TBL2.ORGANIZATION_ID FROM PARTICIPANT_ORG_RECORD TBL2);

			// SELECT TBL1.ORGANIZATION_ID, TBL1.ORGANIZATION_NAME FROM ORGANIZATIONS TBL1 
			// LEFT JOIN PARTICIPANT_ORG_RECORD TBL2 ON TBL1.ORGANIZATION_ID = TBL2.ORGANIZATION_ID 
			// WHERE TBL2.RECORD_ID IS NULL
		$data = array();
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				$data[$row->organization_id] = array(
					'organization_id'	=> $row->organization_id,
					'organization_name'		=> $row->organization_name,
					'organization_description'	=> $row->organization_description,
					'organization_contact_number'	=> $row->organization_contact_number
				);
			}
		}
		return $data;
	}

	public function program_add_this_org( $id, $prog )
	{
		$part_org_data = array(
			'organization_id' => $id, 
			'program_id' 	=> $prog
		);
		$this->db->insert( "participant_org_record" , $part_org_data );	
	}

	public function program_add_this_emp( $id, $prog )
	{
		$part_emp_data = array(
			'id_number' => $id, 
			'program_id' 	=> $prog
		);
		$this->db->insert( "participant_record" , $part_emp_data );		
	}

	public function program_add_this_stud( $id, $prog )
	{
		$part_stud_data = array(
			'id_number' => $id, 
			'program_id' 	=> $prog
		);
		$this->db->insert( "participant_record" , $part_stud_data );	
	}

	public function get_systemuser_data()
	{
		$query = $this->db->query("SELECT * FROM accounts WHERE account_id != 1 AND account_id != 2");
		if($query->result() > 0)
		{
			$data = array();
			foreach($query->result() as $row)
			{
				$data = $this->table->add_row( 
					$row->username, 
					$row->password,
					$row->account_level,
					$row->firstname, 
					$row->lastname, 

					// $det_link = '<div class="medium warning btn icon-left icon-pencil" name="del-btn" id="'.$row->username.'" data-key="'.$row->username.'">
					// <a href="#" class="clickableRow" data-key="'.$row->username.'" gumby-trigger="|#detailProgram" gumby-on="click">Details</a></div>',

					$del_link = '<div class="medium danger btn icon-left icon-cancel" name="del-btn" data-account_level="'.$row->account_level.'" 
					data-account_id="'.$row->account_id.'" data-username="'.$row->username.'" data-password="'.$row->password.'" data-firstname="'.$row->firstname.'" data-lastname="'.$row->lastname.'" >
					<a href="#" class="toggle" data-account_id="'.$row->account_id.'" data-username="'.$row->username.'" data-firstname="'.$row->firstname.'" data-lastname="'.$row->lastname.'" 
					gumby-trigger="|#delUser" gumby-on="click">Delete</a></div>', 

					$edit_link = '<div class="medium info btn icon-left icon-pencil"><a href="#" class="switch" gumby-trigger="#editUser" id="'.$row->username.'" data-key="'.$row->username.'"
					data-account_id="'.$row->account_id.'" data-username="'.$row->username.'" data-password="'.$row->password.'" data-account_level="'.$row->account_level.'" 
					data-firstname="'.$row->firstname.'" data-lastname="'.$row->lastname.'" ">Edit</a></div>'
				);
				echo $data;				
				
			}
		}
	}

	public function insert_system_user( $sys_user_data )
	{
		$this->load->database();

		$this->db->trans_start();

		// $this->db->where('id_number', $idNo);
		// $this->db->delete('students'); 

		// $this->db->where('id_number', $idNo);
		// $this->db->delete('participants'); 
		$this->db->insert( "accounts" , $sys_user_data );

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error updating the record";
			return 0;
		}
		else 
		{
			// echo "successfully deleted student and participant data!";
			return 1;
		}
	}

	public function check_authorized_user( $username, $first, $last )
	{
		$query = $this->db->query("SELECT * FROM accounts WHERE 
			username='".$username."' AND firstname='".$first."'
			AND lastname='".$last."' ");
		if($query->result() > 0)
		{
			// $data = array();
			// foreach($query->result() as $row)
			// {
			// 	$data = array(
			// 		'username' => $row->username, 
			// 		'password' => $row->password, 
			// 		'account_level' => $row->account_level, 
			// 		'firstname' => $row->firstname, 
			// 		'lastname' => $row->lastname
			// 	);
			// 	echo $data;
			// }
			return "authorized";
		}
		else
		{
			return "unauthorized";
		}
	}

	// public function check_user_permission(  )

	public function remove_system_user( $username, $first, $last )
	{
		$this->load->database();
		$this->db->trans_start();

		$this->db->where('username', $username);
		$this->db->where('firstname', $first);
		$this->db->where('lastname', $last);
		$this->db->delete('accounts'); 

		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			// echo "internal server error updating the record";
			return 0;
		}
		else 
		{
			// echo "successfully deleted student and participant data!";
			return 1;
		}		
	}

	public function update_system_user( $id, $data )
	{
		$this->load->database();
		$this->db->where('account_id', $id);
		$this->db->update('accounts', $data);
	}

	public function get_program_address( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT barangay, town, province FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->barangay." , ".$row->town." , ".$row->province;
			}
		}
	}

	public function get_program_date( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT date FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->date;
			}
		}
	}	

	public function get_program_progtype( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT program_type FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->program_type;
			}
		}
	}		

	public function get_program_desc( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT program_description FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->program_description;
			}
		}
	}		

	public function get_program_progsem( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT semester FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->semester;
			}
		}
	}

	public function get_program_progschoolyear( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT school_year FROM programs WHERE program_id = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->school_year;
			}
		}
	}
	
	public function get_student_contactnum( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT contact_number FROM participants WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->contact_number;
			}
		}
	}

	public function get_student_year( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT year FROM students WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->year;
			}
		}
	}
	
	public function get_student_course( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT course FROM students WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->course;
			}
		}
	}

	public function get_student_org( $id ) 
	{
		$this->load->database();
		$query = $this->db->query("SELECT organization FROM students WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->organization;
			}
		}
	}

	public function get_office_department_name( $id )
	{
		$this->load->database();
		$query = $this->db->query("SELECT office_department_name 
			FROM office_department a JOIN employees b ON a.office_department_id = b.office_department_id
			WHERE id_number = '".$id."' ");
		if($query->result() > 0)
		{
			foreach($query->result() as $row)
			{
				return $row->office_department_name;
			}
		}	
	}

} 
// end of class model definition 


// 	public function department(){
			
// 		$qry_execute = $this->db->get('department'); 
// 		$qry_result = $qry_execute->result_array();
// 		return $qry_result;
		
// 	}
	
// 	public function employees($arr_dept_id){
		
// 		$this->db->where('dept_id',$arr_dept_id['dept_id']);
// 		$qry_execute = $this->db->get('employee');
// 		$qry_result = $qry_execute->result_array();
// 		return $qry_result;
		
// 	}
	
// }