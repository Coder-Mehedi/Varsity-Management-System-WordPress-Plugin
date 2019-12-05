<?php
require_once 'header.php';
require_once 'semester_methods.php';
$semester = new Semester();

$semester_id = $_GET['id'] ?? '';

if($semester_id && $_GET['action'] == 'delete') {
      $semester->delete_semester($semester_id);
      echo '<h3 class="center green-text">Semester Deleted</h3>';
    }
?>

<?php $all_semesters = $semester->get_every_semester(); ?>
	<h1 class="center">All semesters</h1>
  <a class="btn right" href="<?php echo admin_url( 'admin.php?page=add_semester' ) ?>">Add semester</a>
  <table class="responsive-table table">
    <thead>
      <tr>
          <th>Semester Name</th>
          <th>Actions</th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($all_semesters as $semester): ?>
      <tr>
        <td><?php echo $semester->Name; ?></td>
        
        <td>
          <a href="<?php echo admin_url( 'admin.php?page=add_semester&id=' . $semester->Name . '&action=edit' ); ?>">Edit</a>
          <a href="<?php echo admin_url( 'admin.php?page=all_semester&id=' . $semester->Name . '&action=delete' ); ?>">Delete</a>
        </td>
      </tr>
  	<?php endforeach; ?>
    </tbody>
  </table>

  <?php require_once 'footer.php'; ?>