<?php 

class Varsity_management_system_main{
	function __construct() {
		add_action( 'admin_menu', array($this, 'vms_varsity_management_menu' ));
	}

	function vms_create_table() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		require_once 'includes/query.php';
		foreach($sql_query as $query){

			$main_query = $query.$charset_collate;
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($main_query);
		}
	}

	function vms_varsity_management_menu() {
		add_menu_page( 'Varsity Management', 'Varsity Management', 'manage_options', 'varsity-management', 'vms_menu_callback', 'dashicons-welcome-learn-more', 30);


		function vms_menu_callback() {
			// require_once 'front.php';
			echo 'helo';
		}

		add_submenu_page( 'varsity-management', 'Student', 'Student', 'manage_options', 'students', 'sub_callback' );
		


		function sub_callback() {
			require_once 'student_form.php';

			// get_every_students();
			// add_student(12);
			// delete_student(34445654);
			// update_student(344);

		}
		
	}
	function get_every_students() {
			global $wpdb;
			$table = $wpdb->prefix.'Student';
			$every_student = $wpdb->get_results("SELECT * FROM $table");

			// print_r($every_student); // display data
		}

		function get_student_by_id($student_id) {
			global $wpdb;
			$table = $wpdb->prefix.'Student';
			$student = $wpdb->get_results("SELECT * FROM $table WHERE StudentId = $student_id");

			return $student;
		}


		function add_student($student_id, $student_name, $student_gender, $student_dob, $mobile_number, $address, $father_name, $father_mobile_number) {
			$exist = $this->get_student_by_id($student_id);

			if($exist) return;

			global $wpdb;
			$table = $wpdb->prefix.'Student';
			$data = array('Name' => $student_name, 'StudentId' => $student_id, 'Sex' => $student_gender, 'DateOfBirth' => $student_dob, 'MobileNumber' => $mobile_number, 'Address' => $address, 'FatherName' => $father_name, 'FatherMobileNumber' => $father_mobile_number );
			$format = array('%s','%d', '%s', '%s', '%s', '%s', '%s');
			$wpdb->insert($table,$data,$format);
			// $my_id = $wpdb->insert_id;
		}

		function update_student($student_id) {
			$exist = $this->get_student_by_id($student_id);
			if(!$exist) return;

			global $wpdb;
			$table = $wpdb->prefix.'Student';
			$data = array('Name' => 'Abir');
			$where = array('StudentId' => $student_id);
			$wpdb->update($table, $data, $where);

		}

		function delete_student($student_id) {
			$exist = $this->get_student_by_id($student_id);

			if(!$exist) return;
			// print_r($exist);
			global $wpdb;
			$table = $wpdb->prefix.'Student';
			$data = array('StudentId' => $student_id);
			$wpdb->delete($table,$data);
		}

	
}

