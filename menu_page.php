<?php 


add_menu_page( 'Varsity Management', 'Varsity Management', 'manage_options', 'varsity-management', 'vms_menu_callback', 'dashicons-welcome-learn-more', 30);

function vms_menu_callback() {
	//require_once 'admin/vms.php';
	echo 'hello';
}

add_submenu_page( 'varsity-management', 'All Students', 'All Student', 'manage_options', 'all_students', 'all_student_sub_callback' );


function all_student_sub_callback() {
	// require_once 'all_student.php';
	require_once 'admin/all_student_alternate.php';
}

add_submenu_page( 'varsity-management', 'Add Student', 'Add Student', 'manage_options', 'add_student', 'add_student_form_callback' );

function add_student_form_callback() {
	// require_once 'add_student.php';
	require_once 'admin/add_student_alternate.php';
}

add_submenu_page( 'varsity-management', 'All Departments', 'All Departments', 'manage_options', 'all_department', 'all_department' );

function all_department() {
	// require_once 'all_department.php';
	require_once 'admin/all_department_alternate.php';
}

add_submenu_page( 'varsity-management', 'Add Departments', 'Add Departments', 'manage_options', 'add_department', 'add_department' );

function add_department() {
	// require_once 'add_department.php';
	require_once 'admin/add_department_alternate.php';
}

add_submenu_page( 'varsity-management', 'All Semester', 'All Semester', 'manage_options', 'all_semester', 'semester_menu_callback' );

function semester_menu_callback() {
	require_once 'all_semester.php';
}

add_submenu_page( 'varsity-management', 'Add Semester', 'Add Semester', 'manage_options', 'add_semester', 'add_semester_callback' );

function add_semester_callback() {
	require_once 'add_semester.php';
}
