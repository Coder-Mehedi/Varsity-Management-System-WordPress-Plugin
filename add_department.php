<?php echo $name = ''; 
require_once 'admin/department_methods.php';
$department = new Department();
$url_param_id = $_GET['id'] ?? '';
if($url_param_id){
	$edit_department = $department->get_department_by_name($url_param_id);
}
// $department_id = $edit_department[0]->ID ?? $department->get_last_id();
$old_department_name = $department_name = $edit_department[0]->Name ?? '';

$error = ['name' => ''];

if(isset($_POST['submit'])) {
	
	$department_name = $_POST['name'] ?? '';
	if(empty($department_name)) {
        $error['name'] = "Department Name is required <br />";
    }
	
    if(array_filter($error)){
    	// print_r($error);
    } else {
    	if(!$url_param_id){
			$department->add_department($department_name);
			echo "<h3 class='center green-text'>$department_name Department Added</h3>";
			$department_name =  null;
		}elseif($url_param_id && $_GET['action'] == 'edit') {
			$department->update_department($old_department_name, $department_name);
			echo "<h3 class='center green-text'>$department_name Department Information Updated Successfully</h3>";
		}
	}
}

?>


<div class="row">
	<h1 class="center">Add Department</h1>
	<div class="col m6 offset-m3 ">
		<form method="POST" id="department">
			<label for="name">Department Name</label>
			<input type="text" name="name" id="name" value="<?php echo $department_name ?>">
			<div class="red-text"><?php echo $error['name'] ?></div>
	
			<button type="submit" name="submit" class="btn">Add Department</button>
		</form>
	</div>
</div>