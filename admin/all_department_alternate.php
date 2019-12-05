<?php require_once 'header.php';
require_once 'department_methods.php';
$department = new Department();

$department_id = $_GET['id'] ?? '';

if($department_id && $_GET['action'] == 'delete') {
      $department->delete_department($department_id);
      echo '<h3 class="center green-text">Department Deleted</h3>';
    }
?>

<?php $all_departments = $department->get_every_department(); ?>
	<h1 class="center">All Departments</h1>
  <a class="btn right" href="<?php echo admin_url( 'admin.php?page=add_department' ) ?>">Add Department</a>
  <table class="responsive-table table">
    <thead>
      <tr>
          <th>Department Name</th>
          <th>Actions</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($all_departments as $department): ?>
      <tr>
        <td><?php echo $department->Name; ?></td>
        
        <td>
          <a href="<?php echo admin_url( 'admin.php?page=add_department&id=' . $department->Name . '&action=edit' ); ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          <a href="<?php echo admin_url( 'admin.php?page=all_department&id=' . $department->Name . '&action=delete' ); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
        </td>
      </tr>
  	<?php endforeach; ?>
    </tbody>
  </table>


<?php require_once 'footer.php'; ?>