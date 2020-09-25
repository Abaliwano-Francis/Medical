<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$dept_id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `departments` SET `status`=1 WHERE `dept_id`='$dept_id'");
	if ($query) {
		echo "<script>alert('Department activated successfully')
		window.location='departments.php'</script>";
    }
    else{
        echo "<script>alert('Failed to activate Department')
        window.location='departments.php'</script>";
    }
}

?>