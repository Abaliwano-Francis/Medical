<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `workers` SET `status`=0 WHERE `w_id`='$id'");
	if ($query) {
		echo "<script>alert('Worker muted successfully')
		window.location='view_workers.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Mute Worker')
        window.location='view_workers.php'</script>";
    }
}

?>