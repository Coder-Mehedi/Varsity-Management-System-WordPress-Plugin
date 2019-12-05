<?php require_once 'header.php'; ?>

<?php echo $name = ''; 
require_once 'semester_methods.php';
$semester = new Semester();
$url_param_id = $_GET['id'] ?? '';
if($url_param_id){
	$edit_semester = $semester->get_semester_by_name($url_param_id);
}
// $semester_id = $edit_semester[0]->ID ?? $semester->get_last_id();
$old_semester_name = $edit_semester[0]->Name ?? '';
$semester_name = $edit_semester[0]->Name ?? '';
print_r($old_semester_name);
$error = ['name' => '', 'exists' => ''];

if(isset($_POST['submit'])) {
	
	$semester_name = $_POST['name'] ?? '';
	$semester_in_form = $_POST['name'] ?? '';
	if(empty($semester_name)) {
        $error['name'] = "Semester Name is required <br />";
    }
    if($semester->get_semester_by_name($semester_name)){
    	$error['exists'] = "$semester_name Semester already exists";
    };
	
    if(array_filter($error)){
    	// print_r($error);
    } else {
    	if(!$url_param_id){
			$semester->add_semester($semester_name);
			echo "<h3 class='center green-text'>$semester_name Semester Added</h3>";
			$semester_name =  null;
		}elseif($url_param_id && $_GET['action'] == 'edit') {
			$semester->update_semester($old_semester_name, $semester_name);
			echo "<h3 class='center green-text'>$semester_name Semester Information Updated Successfully</h3>";
		}
	}
}

?>


<div class="row">
	<h1 class="center">Add Semester</h1>
	<div class="col m6 offset-m3 ">
		<form method="POST" id="semester">
			<label for="name">Semester Name</label>
			<input type="text" name="name" id="name" value="<?php echo $semester_name ?>">
			<div class="red-text"><?php echo $error['name'] ?></div>
			<div class="red-text"><?php echo $error['exists'] ?></div>
			<button type="submit" name="submit" class="btn">Add Semester</button>
		</form>
		
	</div>
</div>

<?php require_once 'footer.php'; ?>