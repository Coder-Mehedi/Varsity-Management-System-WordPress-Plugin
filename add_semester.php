<?php echo $name = ''; 
require_once 'semester_methods.php';
$semester = new Semester();
$url_param_id = $_GET['id'] ?? '';
if($url_param_id){
	$edit_semester = $semester->get_semester_by_name($url_param_id);
}
// $semester_id = $edit_semester[0]->ID ?? $semester->get_last_id();
$old_semester_name = $semester_name = $edit_semester[0]->Name ?? '';

$error = ['name' => '', 'exists' => ''];

if(isset($_POST['submit'])) {
	
	$semester_name = $_POST['name'] ?? '';
	$semester_in_form = $_POST['name'] ?? '';
	if(empty($semester_name)) {
        $error['name'] = "semester Name is required <br />";
    }
    if($semester_in_form === $semester_name){
    	$error['exists'] = "$semester_name Semester Already Exists <br />";
    }
	
    if(array_filter($error)){
    	// print_r($error);
    } else {
    	if(!$url_param_id){
    		

			$semester->add_semester($semester_name);
			echo "<h3 class='center green-text'>$semester_name semester Added</h3>";
			$semester_name =  null;
		}elseif($url_param_id && $_GET['action'] == 'edit') {
			$semester->update_semester($old_semester_name, $semester_name);
			echo "<h3 class='center green-text'>$semester_name semester Information Updated Successfully</h3>";
		}
	}
}

?>


<div class="row">
	<h1 class="center">Add semester</h1>
	<div class="col m6 offset-m3 ">
		<form method="POST" id="semester">
			<label for="name">semester Name</label>
			<input type="text" name="name" id="name" value="<?php echo $semester_name ?>">
			<div class="red-text"><?php echo $error['name'] ?></div>
			<div class="red-text"><?php echo $error['exists'] ?></div>
			<button type="submit" name="submit" class="btn">Add semester</button>
		</form>
		
	</div>
</div>