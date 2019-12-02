<?php 

class Students{
	function __construct() {

	}
	public function get_every_students() {
			global $wpdb;
			$table = $wpdb->prefix.'Student';
			$every_student = $wpdb->get_results("SELECT * FROM $table");
			return $every_student;

			// print_r($every_student); // display data
		}

	public function get_student_by_id($student_id) {
		global $wpdb;
		$table = $wpdb->prefix.'Student';
		$student = $wpdb->get_results("SELECT * FROM $table WHERE StudentId = $student_id");

		return $student;
	}


	public function add_student($student_id, $student_name, $student_gender, $student_dob, $mobile_number, $address, $father_name, $father_mobile_number, $department, $semester) {

		$exist = $this->get_student_by_id($student_id);

		if($exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'Student';
		$data = array('Name' => $student_name, 'StudentId' => $student_id, 'Sex' => $student_gender, 'DateOfBirth' => $student_dob, 'MobileNumber' => $mobile_number, 'Address' => $address, 'FatherName' => $father_name, 'FatherMobileNumber' => $father_mobile_number, 'Department' => $department, 'Semester' => $semester );
		$format = array('%s','%d', '%s', '%s', '%s', '%s', '%s', '%s');
		$wpdb->insert($table,$data,$format);
		// $my_id = $wpdb->insert_id;
	}
	
	public function update_student($student_id, $student_name, $student_gender, $student_dob, $mobile_number, $address, $father_name, $father_mobile_number, $department, $semester) {
		$exist = $this->get_student_by_id($student_id);

		if(!$exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'Student';
		$data = array('Name' => $student_name, 'StudentId' => $student_id, 'Sex' => $student_gender, 'DateOfBirth' => $student_dob, 'MobileNumber' => $mobile_number, 'Address' => $address, 'FatherName' => $father_name, 'FatherMobileNumber' => $father_mobile_number, 'Department' => $department, 'Semester' => $semester );
		$where = array('StudentId' => $student_id);
		$wpdb->update($table,$data,$where);
		// $my_id = $wpdb->insert_id;
	}

	public function delete_student($student_id) {
		$exist = $this->get_student_by_id($student_id);

		if(!$exist) return;
		// print_r($exist);
		global $wpdb;
		$table = $wpdb->prefix.'Student';
		$data = array('StudentId' => $student_id);
		$wpdb->delete($table,$data);
	}
}