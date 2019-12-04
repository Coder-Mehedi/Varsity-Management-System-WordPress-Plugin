
<?php
require_once 'admin/student_methods.php';
$main = new Students();

$student_id = $_GET['id'] ?? '';

if($student_id && $_GET['action'] == 'delete') {
      $main->delete_student($student_id);
      echo '<h3 class="center green-text">Student Information Deleted</h3>';
    }
?>

<?php $all_students = $main->get_every_students(); ?>
	<h1 class="center">All Students</h1>
  <a class="btn right" href="<?php echo admin_url( 'admin.php?page=add_student' ) ?>">Add Student</a>
  <table class="responsive-table">
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
          <th>Father Name</th>
          <th>Father Mobile Number</th>
          <th>Actions</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($all_students as $student): ?>
      <tr>
        <td><?php echo $student->Name; ?></td>
        <td><?php echo $student->StudentId; ?></td>
        <td><?php echo $student->DepartmentId; ?></td>
        <td><?php echo $student->SemesterId; ?></td>
        <td><?php echo $student->DateOfBirth; ?></td>
        <td><?php echo $student->Sex; ?></td>
        <td><?php echo $student->MobileNumber; ?></td>
        <td><?php echo $student->Address; ?></td>
        <td><?php echo $student->FatherName; ?></td>
        <td><?php echo $student->FatherMobileNumber; ?></td>
        <td>
          <a href="<?php echo admin_url( 'admin.php?page=add_student&id=' . $student->StudentId . '&action=edit' ); ?>">Edit</a>
          <a href="<?php echo admin_url( 'admin.php?page=all_students&id=' . $student->StudentId . '&action=delete' ); ?>">Delete</a>
        </td>
      </tr>
  	<?php endforeach; ?>
    </tbody>
  </table>