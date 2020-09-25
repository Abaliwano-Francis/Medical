<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$dept_id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `departments` SET `status`=0 WHERE `dept_id`='$dept_id'");
	if ($query) {
		echo "<script>alert('Department deactivated successfully')
		window.location='departments.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Deactivate Department')
        window.location='departments.php'</script>";
    }
}

?>