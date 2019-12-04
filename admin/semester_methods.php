<?php 

class Semester{
	function __construct() {
		
	}
	public function get_every_semester() {
		global $wpdb;
		$table = $wpdb->prefix.'semester';
		$every_semester = $wpdb->get_results("SELECT * FROM $table");
		return $every_semester;

		// print_r($every_semester); // display data
	}

	public function get_semester_by_name($semester_name) {
		global $wpdb;
		$table = $wpdb->prefix.'semester';
		$semester = $wpdb->get_results("SELECT * FROM $table WHERE Name = '$semester_name'");

		return $semester;
	}

	public function get_last_id() {
		global $wpdb;
		$table = $wpdb->prefix.'semester';
		$last_id = $wpdb->get_results("SELECT MAX(ID) AS ID FROM $table");

		return $last_id[0]->ID+1;
	}


	public function add_semester($semester_name) {
		$exist = $this->get_semester_by_name($semester_name);

		if($exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'semester';
		$data = array('Name' => $semester_name);
		$format = array('%s');
		$wpdb->insert($table,$data,$format);
		// $my_id = $wpdb->insert_id;
	}
	
	public function update_semester($old_semester_name, $new_semester_name) {
		$exist = $this->get_semester_by_name($old_semester_name);

		if(!$exist) return;

		global $wpdb;
		$table = $wpdb->prefix.'semester';
		$data = array('Name' => $new_semester_name);
		$where = array('Name' => $old_semester_name);
		$wpdb->update($table,$data,$where);
		// $my_id = $wpdb->insert_id;
	}

	public function delete_semester($semester_name) {
		$exist = $this->get_semester_by_name($semester_name);

		if(!$exist) return;
		// print_r($exist);
		global $wpdb;
		$table = $wpdb->prefix.'semester';
		$data = array('Name' => $semester_name);
		$wpdb->delete($table,$data);
	}


}