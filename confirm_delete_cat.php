<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id']; ?>
<script>
	var btn = confirm('Are you sure you want to delete this Category?');
	if (btn) {window.location="delete_cat.php?id=<?php echo $delete_id; ?>"}
	if (!btn) {window.location="doc_category.php"}
</script>
<?php
}
?>