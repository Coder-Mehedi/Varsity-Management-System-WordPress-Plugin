<?php 

class Students{
	function __construct() {
		
	}
	public function get_every_students() {
			global $wpdb;
			$table = $wpdb->prefix.'student';
			$sql = "SELECT
					st.Name,
					st.StudentId,
				    st.DateOfBirth,
				    st.Sex,
				    st.MobileNumber,
				    st.Address,
				    st.FatherName,
				    st.FatherMobileNumber,
				    dep.Name AS DepartmentName,
                    sem.Name AS SemesterName
				FROM $table st
				JOIN wp_department dep
					ON DepartmentId = dep.ID
				JOIN wp_semester sem
                	ON SemesterId = sem.ID";
			
			// $every_student = $wpdb->get_results("SELECT * FROM $table");
			$every_student = $wpdb->get_results($sql);

			return $every_student;

			// print_r($every_student); // display data
		}

	public function get_student_by_id($student_id) {
		global $wpdb;
		$table = $wpdb->prefix.'student';
		$student = $wpdb->get_results("SELECT
					st.Name,
					st.StudentId,
				    st.DateOfBirth,
				    st.Sex,
				    st.MobileNumber,
				    st.Address,
				    st.FatherName,
				    st.FatherMobileNumber,
				    dep.Name AS DepartmentName,
                    sem.Name AS SemesterName
				FROM `wp_student` st
				JOIN wp_department dep
					ON DepartmentId = dep.ID
				JOIN wp_semester sem
                	ON SemesterId = sem.ID
                WHERE st.StudentId = $student_id");

		return $student;
	}

	public function get_student_by_name($student_name) {
		global $wpdb;
		$table = $wpdb->prefix.'student';
		$student = $wpdb->get_results("SELECT
					st.Name,
					st.StudentId,
				    st.DateOfBirth,
				    st.Sex,
				    st.MobileNumber,
				    st.Address,
				    st.FatherName,
				    st.FatherMobileNumber,
				    dep.Name AS DepartmentName,
                    sem.Name AS SemesterName
				FROM `wp_student` st
				JOIN wp_department dep
					ON DepartmentId = dep.ID
				JOIN wp_semester sem
                	ON SemesterId = sem.ID
                WHERE st.Name LIKE '$student_name%'");

		return $student;
	}


	public function add_student($student_id, $student_name, $student_gender, $student_dob, $mobile_number, $address, $father_name, $father_mobile_number, $department, $semester) {

		$exist = $this->get_student_by_id($student_id);

		if($exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'student';
		$data = array('Name' => $student_name, 'StudentId' => $student_id, 'Sex' => $student_gender, 'DateOfBirth' => $student_dob, 'MobileNumber' => $mobile_number, 'Address' => $address, 'FatherName' => $father_name, 'FatherMobileNumber' => $father_mobile_number, 'DepartmentId' => $department, 'SemesterId' => $semester );
		$format = array('%s','%d', '%s', '%s', '%s', '%s', '%s', '%s');
		$wpdb->insert($table,$data,$format);
		// $my_id = $wpdb->insert_id;
	}
	
	public function update_student($student_id, $student_name, $student_gender, $student_dob, $mobile_number, $address, $father_name, $father_mobile_number, $department, $semester) {
		$exist = $this->get_student_by_id($student_id);

		if(!$exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'student';
		$data = array('Name' => $student_name, 'StudentId' => $student_id, 'Sex' => $student_gender, 'DateOfBirth' => $student_dob, 'MobileNumber' => $mobile_number, 'Address' => $address, 'FatherName' => $father_name, 'FatherMobileNumber' => $father_mobile_number, 'DepartmentId' => $department, 'SemesterId' => $semester );
		$where = array('StudentId' => $student_id);
		$wpdb->update($table,$data,$where);
		// $my_id = $wpdb->insert_id;
	}

	public function delete_student($student_id) {
		$exist = $this->get_student_by_id($student_id);

		if(!$exist) return;
		// print_r($exist);
		global $wpdb;
		$table = $wpdb->prefix.'student';
		$data = array('StudentId' => $student_id);
		$wpdb->delete($table,$data);
	}
}