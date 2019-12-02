<?php 

class Department{
	function __construct() {
		
	}
	public function get_every_department() {
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$every_department = $wpdb->get_results("SELECT * FROM $table");
		return $every_department;

		// print_r($every_department); // display data
	}

	public function get_department_by_name($department_name) {
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$department = $wpdb->get_results("SELECT * FROM $table WHERE Name = '$department_name'");

		return $department;
	}

	public function get_last_id() {
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$last_id = $wpdb->get_results("SELECT MAX(ID) AS ID FROM $table");

		return $last_id[0]->ID+1;
	}


	public function add_department($department_name) {
		$exist = $this->get_department_by_name($department_name);

		if($exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'department';
		$data = array('Name' => $department_name);
		$format = array('%s');
		$wpdb->insert($table,$data,$format);
		// $my_id = $wpdb->insert_id;
	}
	
	public function update_department($old_department_name, $new_department_name) {
		$exist = $this->get_department_by_name($old_department_name);

		if(!$exist) return;
		print_r($exist);
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$data = array('Name' => $new_department_name);
		$where = array('Name' => $old_department_name);
		$wpdb->update($table,$data,$where);
		// $my_id = $wpdb->insert_id;
	}

	public function delete_department($department_name) {
		$exist = $this->get_department_by_name($department_name);

		if(!$exist) return;
		// print_r($exist);
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$data = array('Name' => $department_name);
		$wpdb->delete($table,$data);
	}


}