<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$sql = mysqli_query($con, "DELETE FROM `messages` WHERE `id`='$delete_id'");
	if ($sql) {
		echo "<script>alert('Message Deleted successfully')
        window.location='messages.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Delete Message')
        window.location='messages.php'</script>";
    }
}
?>