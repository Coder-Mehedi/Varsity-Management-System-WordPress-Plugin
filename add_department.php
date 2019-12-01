<?php echo $name = ''; 
require_once 'department_methods.php';
$department = new Department();
$url_param_id = $_GET['id'] ?? '';
if($url_param_id){
	$edit_department = $department->get_department_by_id($url_param_id);
}
$department_id = $edit_department[0]->DepartmentId ?? '';
$name = $edit_department[0]->Name ?? '';

//$department->add_department(1000, 'Finance & Banking');
// print_r($department->get_department_by_id(1000));
$error = ['id' => '', 'name' => ''];

if(isset($_POST['submit'])) {
	
	$department_id = $_POST['department_id'];
	if(empty($department_id)) {
        $error['id'] = "Department ID is required <br />";
    }
	$department_name = $_POST['name'] ?? '';
	if(empty($department_name)) {
        $error['name'] = "Department Name is required <br />";
    }
	
    if(array_filter($error)){
    	// print_r($error);
    } else {
    	if(!$url_param_id){
			$department->add_department($department_id, $department_name);
			echo '<h3 class="center green-text">Department Added</h3>';
			$department_id = $name =  null;
		}elseif($url_param_id && $_GET['action'] == 'edit') {
			$department->update_department($department_id, $department_name);
			echo '<h3 class="center green-text">Department Information Updated Successfully</h3>';
		}
	}
}


?>


<div class="row">
	<h1 class="center">Add Department</h1>
	<div class="col m6 offset-m3 ">
		<form method="POST" id="department">
			<label for="department_id">Department ID</label>
			<input type="number" name="department_id" id="department_id" value="<?php echo $department_id ?>">
			<div class="red-text"><?php echo $error['id'] ?></div>

			<label for="name">Department Name</label>
			<input type="text" name="name" id="name" value="<?php echo $name ?>">
			<div class="red-text"><?php echo $error['name'] ?></div>
	
			<button type="submit" name="submit" class="btn">Add Department</button>
		</form>
	</div>
</div>