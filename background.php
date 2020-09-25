<?php

include ("includes/dbcon.php");

?>
 <label>Department</label>
<select class="form-control" name="department">
	<option>Select Department</option>
	<?php
	$sql1 = mysqli_query($con, "SELECT * FROM departments WHERE status=1");
while ($results = mysqli_fetch_array($sql1)) { ?>
		<option value="<?php echo$results['dept_id'];?>"><?php echo$results['name'];?></option>
		<?php
        
 } 
?>
</select>