<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `doctors` SET `status`=0 WHERE `id`='$id'");
	if ($query) {
		echo "<script>alert('Doctor/Nurse muted successfully')
		window.location='view_doctors.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Mute Doctor/Nurse')
        window.location='view_doctors.php'</script>";
    }
}

?>