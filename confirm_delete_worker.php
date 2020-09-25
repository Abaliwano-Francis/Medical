<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id']; ?>
<script>
	var btn = confirm('Are you sure you want to delete this Worker?');
	if (btn) {window.location="delete_worker.php?id=<?php echo $delete_id; ?>"}
	if (!btn) {window.location="all_workers.php"}
</script>
<?php
}
?>