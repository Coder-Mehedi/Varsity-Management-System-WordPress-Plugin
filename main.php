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
		require_once 'menu_page.php';
		
	}
}
