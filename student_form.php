<div class="row">
	<h1 class="center">Add Student</h1>
	<div class="col m6 offset-m3 ">
		<form method="POST" id="student">
			<label for="name">Name</label>
			<input type="text" name="name" id="name">
			<br>
			<label for="Gender">Gender</label>
			<select name="gender">
				<option value="" disabled selected>Select</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
			<br>
			<label for="Mobile Number">Mobile Number</label>
			<input type="text" name="mobile_number">
			<br>
			<label for="address">Address</label>
			<textarea name="address" id="address" class="materialize-textarea" placeholder="address"></textarea>
			<br>
			<label for="FatherName">Father Name</label>
			<input type="text" name="father_name">
			<br>
			<label for="FatherMobileNumber">Father Mobile Numebr</label>
			<input type="text" name="father_mobile_number">
			<br>
			<label for="dob">Date Of Birth</label>
			<input type="text" class="datepicker" name="dob" placeholder="Date Of Birth">
			<br>
			<input type="submit" value="Submit" name="submit" class="btn">
		</form>
	</div>
</div>


<?php
require_once 'main.php';
$main = new Varsity_management_system_main();

if(isset($_POST['submit'])) {
	$student_id = rand();
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$mobile_number = $_POST['mobile_number'];
	$address = $_POST['address'];
	$father_name = $_POST['father_name'];
	$father_mobile_number = $_POST['father_mobile_number'];
	$date_of_birth = $_POST['dob'];
	$SESSION['dob'] = $_POST['dob'];

	$main->add_student($student_id, $name, $gender, $date_of_birth, $mobile_number, $address, $father_name, $father_mobile_number);
	// echo $SESSION['dob'];
}
echo $SESSION['dob'];

?>