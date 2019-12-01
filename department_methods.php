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

	public function get_department_by_id($department_id) {
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$department = $wpdb->get_results("SELECT * FROM $table WHERE DepartmentId = $department_id");

		return $department;
	}


	public function add_department($department_id, $department_name) {
		$exist = $this->get_department_by_id($department_id);

		if($exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'department';
		$data = array('Name' => $department_name, 'DepartmentId' => $department_id);
		$format = array('%s', '%s');
		$wpdb->insert($table,$data,$format);
		// $my_id = $wpdb->insert_id;
	}
	
	public function update_department($department_id, $department_name) {
		$exist = $this->get_department_by_id($department_id);

		if(!$exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'department';
		$data = array('Name' => $department_name);
		$where = array('DepartmentId' => $department_id);
		$wpdb->update($table,$data,$where);
		// $my_id = $wpdb->insert_id;
	}

	public function delete_department($department_id) {
		$exist = $this->get_department_by_id($department_id);

		if(!$exist) return;
		// print_r($exist);
		global $wpdb;
		$table = $wpdb->prefix.'department';
		$data = array('departmentId' => $department_id);
		$wpdb->delete($table,$data);
	}
}