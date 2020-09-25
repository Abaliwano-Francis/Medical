<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `departments` WHERE `dept_id`='$delete_id'");
	if ($sql) {
		echo "<script>alert('Department Deleted successfully')
        window.location='departments.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Department')
        window.location='departments.php'</script>";
    }
}
?>