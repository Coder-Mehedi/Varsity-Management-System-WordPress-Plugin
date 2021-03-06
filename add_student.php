<?php
require_once 'admin/student_methods.php';
require_once 'admin/department_methods.php';
require_once 'admin/semester_methods.php';
$main = new Students();

$url_param_id = $_GET['id'] ?? '';
if($url_param_id){
	$edit_student = $main->get_student_by_id($url_param_id);
}

if($url_param_id && $_GET['action'] == 'edit'){
	$button_text = 'Update Student Info';
} else {
	$button_text = 'Add Student';
}
// print_r($edit_student);

$dept = new Department();
$semest = new Semester();
$all_dept = $dept->get_every_department();
$all_semester = $semest->get_every_semester();


$student_id = $edit_student[0]->StudentId ?? rand();;
$name = $edit_student[0]->Name ?? '';
$gender = $edit_student[0]->Sex ?? '';
$mobile_number = $edit_student[0]->MobileNumber ?? '';
$address = $edit_student[0]->Address ?? '';
$father_name = $edit_student[0]->FatherName ?? '';
$father_mobile_number = $edit_student[0]->FatherMobileNumber ?? '';
$date_of_birth = $edit_student[0]->DateOfBirth ?? '';
$department = $edit_student[0]->Department ?? '';
$semester = $edit_student[0]->Semester ?? '';

$error = ['name' => '', 'gender' => '', 'mobile_number' => '', 'address' => '', 'father_name' => '', 'father_mobile_number' => '', 'date_of_birth' => '', 'department' => '', 'semester' => ''];
if(isset($_POST['submit'])) {
	
	$name = $_POST['name'];
	if(empty($name)) {
        $error['name'] = "Name is required <br />";
    }
	$gender = $_POST['gender'] ?? '';
	if(empty($gender)) {
        $error['gender'] = "Gender is required <br />";
    }
	$mobile_number = $_POST['mobile_number'];
	if(empty($mobile_number)) {
        $error['mobile_number'] = "Mobile Number is required <br />";
    }
	$address = $_POST['address'];
	if(empty($address)) {
        $error['address'] = "Address is required <br />";
    }
	$father_name = $_POST['father_name'];
	if(empty($father_name)) {
        $error['father_name'] = "Father Name is required <br />";
    }
	$father_mobile_number = $_POST['father_mobile_number'];
	if(empty($father_mobile_number)) {
        $error['father_mobile_number'] = "Father Mobile_number is required <br />";
    }
	$date_of_birth = $_POST['dob'];
	if(empty($date_of_birth)) {
        $error['date_of_birth'] = "Date Of Birth is required <br />";
    }
    $department = $_POST['department'] ?? '';
	if(empty($department)) {
        $error['department'] = "Department is required <br />";
    }
    $semester = $_POST['semester'] ?? '';
	if(empty($semester)) {
        $error['semester'] = "Semester is required <br />";
    }
    if(array_filter($error)){
    	// print_r($error);
    } else {
    	if(!$url_param_id){
			$main->add_student($student_id, $name, $gender, $date_of_birth, $mobile_number, $address, $father_name, $father_mobile_number, $department, $semester);
			echo '<h3 class="center green-text">Add Student Successfully</h3>';
			$student_id = $name = $gender = $mobile_number = $address = $father_name = $father_mobile_number = $date_of_birth = $department = $semester = null;
		}elseif($url_param_id && $_GET['action'] == 'edit') {
			$main->update_student($student_id, $name, $gender, $date_of_birth, $mobile_number, $address, $father_name, $father_mobile_number, $department, $semester);
			echo '<h3 class="center green-text">Student Information Updated Successfully</h3>';
			// $student_id = $name = $gender = $mobile_number = $address = $father_name = $father_mobile_number = $date_of_birth = null;
		}
	}
}

?>


<div class="row">
	<h1 class="center">Add Student</h1>
	<div class="col m6 offset-m3 ">
		<form method="POST" id="student">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="<?php echo $name ?>">
			<div class="red-text"><?php echo $error['name'] ?></div>
			<br>
			<label for="Gender">Gender</label>
			<select name="gender">
				<option value="" disabled selected>Select</option>
				<option value="Male" <?php echo $gender == 'Male' ? 'selected' : ''; ?>>Male</option>
				<option value="Female" <?php echo $gender == 'Female' ? 'selected' : ''; ?>>Female</option>
			</select>
			<div class="red-text"><?php echo $error['gender'] ?></div>
			<br>
			<label for="Mobile Number">Mobile Number</label>
			<input type="text" name="mobile_number" value="<?php echo $mobile_number ?>">
			<div class="red-text"><?php echo $error['mobile_number'] ?></div>
			<br>
			<label for="address">Address</label>
			<textarea name="address" id="address" class="materialize-textarea" placeholder="address"><?php echo $address ?></textarea>
			<div class="red-text"><?php echo $error['address'] ?></div>
			<br>
			<label for="FatherName">Father Name</label>
			<input type="text" name="father_name" value="<?php echo $father_name ?>">
			<div class="red-text"><?php echo $error['father_name'] ?></div>
			<br>
			<label for="FatherMobileNumber">Father Mobile Numebr</label>
			<input type="text" name="father_mobile_number" value="<?php echo $father_mobile_number ?>">
			<div class="red-text"><?php echo $error['father_mobile_number'] ?></div>
			<br>
			<label for="dob">Date Of Birth</label>
			<input type="text" class="datepicker" name="dob" placeholder="Date Of Birth" value="<?php echo $date_of_birth ?>">
			<div class="red-text"><?php echo $error['date_of_birth'] ?></div>
			<br>
			<label for="department">Department</label>
			<select name="department">
				<option value="" disabled selected>Select</option>
				<?php foreach($all_dept as $single_dept): ?>
				<option value="<?php echo $single_dept->ID ?>" <?php echo $department == $single_dept->ID ? 'selected' : ''; ?>><?php echo $single_dept->Name; ?></option>
				<?php endforeach; ?>
			</select>
			<div class="red-text"><?php echo $error['department'] ?></div>
			
			<label for="semester">Semester</label>
			<select name="semester">
				<option value="" disabled selected>Select</option>
				<?php foreach($all_semester as $single_semester): ?>
				<option value="<?php echo $single_semester->ID ?>" <?php echo $semester == $single_semester->ID ? 'selected' : ''; ?>><?php echo $single_semester->Name; ?></option>
				<?php endforeach; ?>
			</select>
			<div class="red-text"><?php echo $error['semester'] ?></div>


			<button type="submit" name="submit" class="btn"><?php echo $button_text ?></button>
		</form>
	</div>
</div>