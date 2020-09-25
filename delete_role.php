<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `staffroles` WHERE `id`='$delete_id'");
	if ($sql) {
		echo "<script>alert('Staff Role Deleted successfully')
        window.location='addRole.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Staff Role')
        window.location='addRole.php'</script>";
    }
}
?>