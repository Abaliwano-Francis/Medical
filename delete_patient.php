<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `patients` WHERE `id`='$delete_id'");
	if ($sql) {
		echo "<script>alert(Patient Deleted successfully')
        window.location='view_patients.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Patient')
        window.location='view_patients.php'</script>";
    }
}
?>