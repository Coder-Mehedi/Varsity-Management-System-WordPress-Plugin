<?php
require_once 'main.php';
$main = new Varsity_management_system_main();
$student_id = $name = $gender = $mobile_number = $address = $father_name = $father_mobile_number = $date_of_birth = null;
$error = ['name' => '', 'gender' => '', 'mobile_number' => '', 'address' => '', 'father_name' => '', 'father_mobile_number' => '', 'date_of_birth' => ''];
if(isset($_POST['submit'])) {
	$student_id = rand();
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
    if(array_filter($error)){
    	// print_r($error);
    } else {
		$main->add_student($student_id, $name, $gender, $date_of_birth, $mobile_number, $address, $father_name, $father_mobile_number);
		$student_id = $name = $gender = $mobile_number = $address = $father_name = $father_mobile_number = $date_of_birth = null;
	}
	// echo $SESSION['dob'];
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
			<input type="submit" value="Submit" name="submit" class="btn">
		</form>
	</div>
</div>