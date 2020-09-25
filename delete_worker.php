<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `workers` WHERE `w_id`='$delete_id'");
	if ($sql) {
		echo "<script>alert('Worker Deleted successfully')
        window.location='all_workers.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Worker')
        window.location='all_workers.php'</script>";
    }
}
?>