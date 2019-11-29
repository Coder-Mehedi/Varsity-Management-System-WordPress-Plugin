
<?php
require_once 'main.php';
$main = new Varsity_management_system_main();

?>


<?php $all_students = $main->get_every_students(); ?>
	<h1 class="center">All Students</h1>
  <table class="responsive-table">
    <thead>
      <tr>
          <th>Name</th>
          <th>Student ID</th>
          <th>Date Of Birth</th>
          <th>Gender</th>
          <th>Mobile Number</th>
          <th>Address</th>
          <th>Father Name</th>
          <th>Father Name Number</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($all_students as $student): ?>
      <tr>
        <td><?php echo $student->Name; ?></td>
        <td><?php echo $student->StudentId; ?></td>
        <td><?php echo $student->DateOfBirth; ?></td>
        <td><?php echo $student->Sex; ?></td>
        <td><?php echo $student->MobileNumber; ?></td>
        <td><?php echo $student->Address; ?></td>
        <td><?php echo $student->FatherName; ?></td>
        <td><?php echo $student->FatherMobileNumber; ?></td>
      </tr>
  	<?php endforeach; ?>
    </tbody>
  </table>