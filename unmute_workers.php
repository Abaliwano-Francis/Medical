<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `workers` SET `status`=1 WHERE `w_id`='$id'");
	if ($query) {
		echo "<script>alert('Worker Activated successfully')
		window.location='all_workers.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Activate Worker')
        window.location='all_workers.php'</script>";
    }
}

?>