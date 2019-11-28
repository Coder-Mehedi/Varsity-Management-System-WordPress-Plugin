<?php 

class Varsity_management_system_main{
	function __construct() {
		add_action( 'admin_menu', array($this, 'vms_varsity_management_menu' ));
	}

	function vms_varsity_management_menu() {
		add_menu_page( 'Varsity Management', 'Varsity Management', 'manage_options', 'varsity-management', 'vms_menu_callback', 'dashicons-welcome-learn-more');

		function vms_menu_callback() {
			// require_once 'front.php';
			echo 'helo';
		}

		add_submenu_page( 'varsity-management', 'Student', 'Student', 'manage_options', 'students', 'sub_callback' );


		function sub_callback() {
			// get_every_students();
			// add_student(344);
			// delete_student(344);
			update_student(1624639);
			

		}

		function get_every_students() {
			global $wpdb;
			$results = $wpdb->get_results("SELECT * FROM Student");

			print_r($results); // display data
		}

		function get_student_by_id($student_id) {
			global $wpdb;
			$student = $wpdb->get_results("SELECT * FROM Student WHERE StudentId = $student_id");

			return $student;
		}

		function add_student($student_id) {
			$exist = get_student_by_id($student_id);

			if($exist) return;

			global $wpdb;
			// $table = $wpdb->prefix.'you_table_name';
			$table = 'Student';
			$data = array('Name' => 'Mehedi', 'StudentId' => $student_id, 'Sex' => 'Male', 'MobileNumber' => '01718294922', 'Address' => 'Jurain', 'FatherName' => 'Blah Blah', 'FatherMobileNumber' => 'blah blah' );
			$format = array('%s','%d', '%s', '%s', '%s', '%s', '%s');
			$wpdb->insert($table,$data,$format);
			$my_id = $wpdb->insert_id;
		}

		function update_student($student_id) {
			$exist = get_student_by_id($student_id);
			if(!$exist) return;

			global $wpdb;
			$data = array('Name' => 'Mehedi Hasan');
			$where = array('StudentId' => $student_id);
			$wpdb->update('Student', $data, $where);

		}

		function delete_student($student_id) {
			$exist = get_student_by_id($student_id);

			if(!$exist) return;
			// print_r($exist);
			global $wpdb;
			$data = array('StudentId' => $student_id);
			$wpdb->delete('Student',$data);
		}
		
	}

	



	function vms_create_table() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		require_once 'query.php';
		foreach($sql_query as $query){

			$main_query = $query.$charset_collate;
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($main_query);
		}
	}
}

$vmsc = new Varsity_management_system_main();
$vmsc->vms_create_table();