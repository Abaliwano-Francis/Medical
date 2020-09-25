<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `doctors` SET `status`=1 WHERE `id`='$id'");
	if ($query) {
		echo "<script>alert('Doctor Activated successfully')
		window.location='view_doctors.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Activate Doctor')
        window.location='view_doctors.php'</script>";
    }
}

?>