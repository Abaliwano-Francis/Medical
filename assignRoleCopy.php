<!doctype html>
<html class="no-js" lang="en">

<?php include 'includes/head.php'; ?>

<body>
    <!-- Start Left menu area -->
    <?php require("includes/sidebar.php"); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
<div class="header-advance-area">
<!-- top bar starts -->
<?php require("includes/topbar.php"); ?>
<!-- Mobile Menu start -->
<?php require("includes/mobile_menu.php"); ?>
    <!-- Mobile Menu end -->
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list single-page-breadcome">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <form role="search" class="sr-input-func">
                                    <input type="text" placeholder="Search..." class="search-int form-control">
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">StaffRoles</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="product-payment-inner-st">
            <ul id="myTabedu1" class="tab-review-design">
                <li class="active"><a href="#description">Assign Role to Staff</a></li>
            </ul>


<!-- form for adding Role -->
<div id="myTabContent" class="tab-content custom-product-edit">
    <div class="product-tab-list tab-pane fade active in" id="description">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <!-- Table for Assigned Roles -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Roles <span class="table-project-n">Assigned to</span> Workers</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar1">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar1">
                                <thead>
                                    <tr>
                                        <th data-field="id" >ID</th>
                                        <th data-field="name" data-editable="false">Name</th>
                                        <th data-field="dept" data-editable="false">Department</th>
                                        <th data-field="phone" data-editable="false">Role</th>
                                        <th data-field="complete">Description</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT * FROM `workers` WHERE `status`='0'");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                                    <tr>
                                        <td><?php echo $No; ?></td>
                                        <td><?php echo $results['name']; ?></td>
                                        <td><?php
                                        $dept_id = $results['dept']; 
                                        $dept_query = mysqli_query($con, "Select * from departments where dept_id='$dept_id'");
                                        $rowdept = mysqli_fetch_array($dept_query);
                                        echo $rowdept['name']; ?></td>
                                        <td><?php echo $results['date_added'];?></td>
                                        <td><?php echo $results['addedby']; ?></td>
                                        <td><a href="edit_workers.php?id=<?php echo $results['w_id'] ?>"><button data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <a href="confirm_delete_worker.php?id=<?php echo $results['w_id'] ?>"><button data-toggle="tooltip" title="Trash" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                        </td>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Muted Roles Table End -->
            </div>
            <div class="col-md-4" style="border: 1px solid silver; border-radius:10px;">
            <h3 style="text-align:center; color:white; background-color:blue; padding:10px;">New Role</h3>
            <div class="review-content-section">
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="form-group">
                                    <div class="chosen-select-single">
                                        <select class="form-control" name="staff">
                                            <option value="none" selected="" disabled="">Select Staff</option>
                                <?php 
                                include 'includes/dbcon.php';
                                $sql1 = mysqli_query($con, "SELECT *, (SELECT name FROM departments WHERE dept_id=workers.dept) as dept FROM `workers` WHERE `status`='1'");
                                while ($results = mysqli_fetch_array($sql1)) { ?>
                                        <option value="<?php echo $results['w_id'] ?>"><?php echo $results['name']." - ".$results['dept']; ?></option>
                                <?php } ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="form-group">
                                    <div class="chosen-select-single">
                                        <select class="form-control" name="role" id="role" onchange="getdepartments(this.value)">
                                            <option value="none" selected="" disabled="">Select Role</option>
                                <?php 
                                include 'includes/dbcon.php';
                                $sql1 = mysqli_query($con, "SELECT * FROM staffroles");
                                while ($results = mysqli_fetch_array($sql1)) { ?>
                                        <option value="<?php echo $results['id'] ?>"><?php echo $results['name']; ?></option>
                                <?php } ?>
                                           <!-- <option value="HOD">Head of Department</option> -->
                                        </select>
                                    </div>
                                    
                                </div>
                            </div> 
                            <!-- Script for displaying Department -->
                            <script>
        function getdepartments(role_id){
          
            //chek inthe background
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var response=this.responseText;
      document.getElementById("fileds").innerHTML=response;
    }
  };
  xhttp.open("GET", "background.php?role_id="+role_id, true);
  xhttp.send();
}
        </script>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="dept">
                                 <div class="form-group">
                                    <div class="chosen-select-single">
                                      <div id="fileds">

                                    </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mt-2" name="submit">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of form -->
            </div>
        </div>
    </div>
</div>
</div>

<!-- footer -->
<?php include 'includes/footer.php'; ?>

<?php include 'includes/scripts.php'; ?>
</body>

</html>

<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $_POST['staff'];
    $role = $_POST['role'];

    $query = mysqli_query($con, "INSERT INTO `wstaffroles`(`w_id`, `RoleID`) VALUES ('$name','$role')");
    if ($query) {
        $info = mysqli_query($con, "SELECT name from workers WHERE w_id='$name'");
        $info2 = mysqli_query($con, "SELECT name FROM staffroles WHERE id='$role'");
        $wrow = mysqli_fetch_array($info);
        $wrow2 = mysqli_fetch_array($info2);
        $wname = $wrow['name'];
        $wrole = $wrow2['name'];
        echo "<script>alert('Assigned role of ".$wrole." to ".$wname." successfully')
        window.location='assignRole.php'</script>";
    }
    else{
        echo "<script>alert('Failed to assign role')
        window.location='assignRole.php'</script>";
    }
}


 ?>
