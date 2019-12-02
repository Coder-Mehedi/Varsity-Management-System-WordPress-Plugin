<?php 

class Varsity_management_system_main{
	function __construct() {
		add_action( 'admin_menu', array($this, 'vms_varsity_management_menu' ));
		//global $wpdb;
	}

	function vms_create_table() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();
		require_once 'includes/query.php';
		foreach($sql_query as $query){

			$main_query = $query . $charset_collate;
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($main_query);
		}
	}

	function vms_varsity_management_menu() {
		add_menu_page( 'Varsity Management', 'Varsity Management', 'manage_options', 'varsity-management', 'vms_menu_callback', 'dashicons-welcome-learn-more', 30);


		function vms_menu_callback() {
			// require_once 'front.php';
			echo 'hello world';
		}

		add_submenu_page( 'varsity-management', 'All Students', 'All Student', 'manage_options', 'students', 'all_student_sub_callback' );
		

		function all_student_sub_callback() {
			require_once 'all_student.php';
		}

		add_submenu_page( 'varsity-management', 'Add Student', 'Add Student', 'manage_options', 'add-student', 'add_student_form_callback' );

		function add_student_form_callback() {
			require_once 'add_student.php';
		}

		add_submenu_page( 'varsity-management', 'All Departments', 'All Departments', 'manage_options', 'department', 'all_department' );

		function all_department() {
			require_once 'all_department.php';
		}

		add_submenu_page( 'varsity-management', 'Add Departments', 'Add Departments', 'manage_options', 'add_department', 'add_department' );

		function add_department() {
			require_once 'add_department.php';
		}

		add_submenu_page( 'varsity-management', 'Semester', 'Semester', 'manage_options', 'semester', 'semester_menu_callback' );

		function semester_menu_callback() {
			// require_once 'semester.php';
		}
		
	}
}
function wpexplorer_remove_menus() {
	remove_menu_page( 'themes.php' );          // Appearance
	remove_menu_page( 'plugins.php' );         // Plugins
	remove_menu_page( 'users.php' );           // Users
	remove_menu_page( 'tools.php' );           // Tools
	remove_menu_page( 'options-general.php' ); // Settings
	show_admin_bar(false);
	add_filter('show_admin_bar', '__return_false');

}
add_action( 'admin_menu', 'wpexplorer_remove_menus' );


add_filter('show_admin_bar', '__return_false');
