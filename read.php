<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($con, "UPDATE `messages` SET `status`=0 WHERE `id`='$id'");
	if ($query) {
		echo "<script>alert(Message marked as read successfully')
		window.location='messages.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Mark Message as read')
        window.location='messages.php'</script>";
}
}

?>