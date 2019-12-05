<?php require_once 'header.php';
require_once 'student_methods.php';
$main = new Students();
$student_id = $_GET['id'] ?? '';

if($student_id && $_GET['action'] == 'delete') {
  $main->delete_student($student_id);
  echo '<h3 class="center green-text">Student Information Deleted</h3>';
}
$all_students = $main->get_every_students();
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
                    
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <!-- <th><i class=" fa fa-edit"></i> Semester</th> -->
                    <th>Date Of Birth</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <!-- <th><i class=" fa fa-edit"></i> Father Name</th> -->
                    <!-- <th><i class=" fa fa-edit"></i> Father Mobile Number</th> -->
                    <th style="width: 70px">Actions</th>
                  </tr>
                  
                </thead>
                
                <tbody>
                  <?php foreach($all_students as $student): ?>
                  <tr>
                    <td><?php echo $student->Name; ?></td>
                    <td><?php echo $student->StudentId; ?></td>
                    <td><?php echo $student->DepartmentName; ?></td>
                    <td><?php echo $student->SemesterName; ?></td>
                    <!-- <td><?php echo $student->SemesterId; ?></td> -->
                    <td><?php echo $student->DateOfBirth; ?></td>
                    <td><?php echo $student->Sex; ?></td>
                    <td><?php echo $student->MobileNumber; ?></td>
                    <td><?php echo $student->Address; ?></td>
                    <!-- <td><?php echo $student->FatherName; ?></td> -->
                    <!-- <td><?php echo $student->FatherMobileNumber; ?></td> -->
                    <td>
                      <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->
                      <a href="<?php echo admin_url( 'admin.php?page=add_student&id=' . $student->StudentId . '&action=edit' ); ?>">
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                      <a href="<?php echo admin_url( 'admin.php?page=all_students&id=' . $student->StudentId . '&action=delete' ); ?>">
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
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
