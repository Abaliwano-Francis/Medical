<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$dat = date("d/m/Y");
	$query = mysqli_query($con, "UPDATE `patients` SET `status1`='0',`discharged`='$dat' WHERE `id`='$id'");
	if ($query) {
		echo "<script>alert('Patient Discharged successfully')
		window.location='doctor_patients.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Discharge Patient')
        window.location='doctor_patients.php'</script>";
    }
}

?>