<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `doc_category` WHERE `id`='$delete_id'");
	if ($sql) {
		echo "<script>alert('Doctor Category Deleted successfully')
        window.location='doc_category.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Doctor Category')
        window.location='doc_category.php'</script>";
    }
}
?>