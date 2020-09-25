<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id']; ?>
<script>
	var btn = confirm('Are you sure you want to delete this Patient?');
	if (btn) {window.location="delete_patient.php?id=<?php echo $delete_id; ?>"}
	if (!btn) {window.location="view_patients.php"}
</script>
<?php
}
?>