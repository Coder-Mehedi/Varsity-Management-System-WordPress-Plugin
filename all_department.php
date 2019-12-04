
<?php
require_once 'admin/department_methods.php';
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
  <table class="responsive-table">
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
          <a href="<?php echo admin_url( 'admin.php?page=add_department&id=' . $department->Name . '&action=edit' ); ?>">Edit</a>
          <a href="<?php echo admin_url( 'admin.php?page=all_department&id=' . $department->Name . '&action=delete' ); ?>">Delete</a>
        </td>
      </tr>
  	<?php endforeach; ?>
    </tbody>
  </table>