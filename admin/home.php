<?php require_once 'header.php'; ?>

<h1 class="text-center">Welcome to Varsity Management System (VMS)</h1>
<br><hr>
<h1 class="text-center">Search Student</h1>
<?php 
require_once 'student_methods.php';
$stm = new Students();
$error = ['term' => '', 'user_input' => ''];
if(isset($_POST['submit'])) {
	$search_term = $_POST['search_term'] ?? '';
	if(empty($search_term)){
		$error['term'] = 'No Search Term Selected';
	}
	$user_input = $_POST['search_input'];
	if(empty($user_input)) {
		$error['user_input'] = 'No Input';
	}
	if(array_filter($error)) {

	} else {
		if($search_term == 'name'){
			$st = $stm->get_student_by_name($user_input);
		} else if($search_term == 'student_id') {
			$st = $stm->get_student_by_id($user_input);
		}
	}
}
?>
<div class="col m9 offset-m1 mb-5 mb mt">
	<form method="POST">
		<div class="col m3">
			<label for="search_term">Select Search Term</label>
			<select name="search_term" id="search_term">
		        <option value="" disabled selected>Select</option>
		        <option value="name">Name</option>
		        <option value="student_id">Student Id</option>
      		</select>
      		<div class="red-text"><?php echo $error['term'] ?></div>
		</div>
		<div class="col m9">
			<label for="name" class="col m12 left">Search</label>
			<input type="text" id="name" name="search_input" class="col m9">
			<button type="submit" name="submit" class="btn right col m3">Submit</button>
			<div class="red-text"><?php echo $error['user_input'] ?></div>
		</div>

		
	</form>
</div>
<table class="table table-striped table-advance table-hover px">            
	<thead>
	  <tr>
	    
	    <th>Name</th>
	    <th>Student ID</th>
	    <th>Department</th>
	    <th>Semester</th>
	    <th>Date Of Birth</th>
	    <th>Gender</th>
	    <th>Mobile Number</th>
	    <th>Address</th>
	    <th style="width: 70px">Actions</th>
	  </tr>
	  
	</thead>
	<?php if(!empty($st)): ?>
	<tbody>
	  <?php foreach($st as $student): ?>
	  <tr>
	    <td><?php echo $student->Name; ?></td>
	    <td><?php echo $student->StudentId; ?></td>
	    <td><?php echo $student->DepartmentName; ?></td>
	    <td><?php echo $student->SemesterName; ?></td>
	    <td><?php echo $student->DateOfBirth; ?></td>
	    <td><?php echo $student->Sex; ?></td>
	    <td><?php echo $student->MobileNumber; ?></td>
	    <td><?php echo $student->Address; ?></td>
	    <td>
	      <a href="<?php echo admin_url( 'admin.php?page=add_student&id=' . $student->StudentId . '&action=edit' ); ?>">
	      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
	      <a href="<?php echo admin_url( 'admin.php?page=all_students&id=' . $student->StudentId . '&action=delete' ); ?>">
	      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
	    </td>
	  </tr>

	<?php endforeach; ?>
	  
	</tbody>
<?php endif; ?>
</table>

<?php require_once 'footer.php'; ?>