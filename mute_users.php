<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `sys_users` SET `status`=0 WHERE `id`='$id'");
	if ($query) {
		echo "<script>alert('User muted successfully')
		window.location='users.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Mute User')
        window.location='users.php'</script>";
    }
}

?>