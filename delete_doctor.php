<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `doctors` WHERE `id`='$delete_id'");
	if ($sql) {
		echo "<script>alert('Doctor/Nurse Deleted successfully')
        window.location='view_doctors.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Doctor/Nurse')
        window.location='view_doctors.php'</script>";
    }
}
?>