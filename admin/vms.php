<?php require_once 'header.php';
require_once 'student_methods.php';
$main = new Students();
$student_id = $_GET['id'] ?? '';

if($student_id && $_GET['action'] == 'delete') {
  $main->delete_student($student_id);
  echo '<h3 class="center green-text">Student Information Deleted</h3>';
}
$all_students = $main->get_every_students();
print_r($all_students);
?>
    <!--sidebar end-->
    <!-- *********** MAIN CONTENT ****************-->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

      	<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4 class="center">All Students</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Name</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Student ID</th>
                    <!-- <th><i class="fa fa-bookmark"></i> Department</th> -->
                    <!-- <th><i class=" fa fa-edit"></i> Semester</th> -->
                    <th><i class=" fa fa-edit"></i> Date Of Birth</th>
                    <th><i class=" fa fa-edit"></i> Gender</th>
                    <th><i class=" fa fa-edit"></i> Mobile Number</th>
                    <th><i class=" fa fa-edit"></i> Address</th>
                    <th><i class=" fa fa-edit"></i> Father Name</th>
                    <th><i class=" fa fa-edit"></i> Father Mobile Number</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($all_students as $student): ?>
                  <tr>
                    <td><?php echo $student->Name; ?></td>
                    <td><?php echo $student->StudentId; ?></td>
                    <!-- <td><?php echo $student->DepartmentId; ?></td> -->
                    <!-- <td><?php echo $student->SemesterId; ?></td> -->
                    <td><?php echo $student->DateOfBirth; ?></td>
                    <td><?php echo $student->Sex; ?></td>
                    <td><?php echo $student->MobileNumber; ?></td>
                    <td><?php echo $student->Address; ?></td>
                    <td><?php echo $student->FatherName; ?></td>
                    <td><?php echo $student->FatherMobileNumber; ?></td>
                    <td>
                      <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
                  </tr>
                <?php endforeach; ?>
                  
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
      
      </section>
    </section>
    <!--main content end-->

<?php require_once 'footer.php'; ?>
