<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id']; ?>
<script>
	var btn = confirm('Are you sure you want to delete this Department?');
	if (btn) {window.location="delete_dept.php?id=<?php echo $delete_id; ?>"}
	if (!btn) {window.location="departments.php"}
</script>
<?php
}
?>