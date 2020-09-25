<!doctype html>
<html class="no-js" lang="en">
    <?php include 'includes/head.php'; ?>
<body>
<!-- Start Left menu area -->
<?php include 'includes/sidebar.php'; ?>
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
<!--     including Top Bar -->
<?php include 'includes/topbar.php'; ?>
<!-- Mobile Menu start -->
<?php include 'includes/mobile_menu.php'; ?>
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
                                <li><span class="bread-blod">All Users</span>
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
<!-- Table for active users -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>List of <span class="table-project-n">Active</span> Workers</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control dt-tb">
									<option value="">Export Basic</option>
									<option value="all">Export All</option>
									<option value="selected">Export Selected</option>
								</select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id" >ID</th>
                                        <th data-field="pic">Photo</th>
                                        <th data-field="name" data-editable="false">Name</th>
                                        <th data-field="dept" data-editable="false">Dept</th>
                                        <th data-field="email" data-editable="false">Email</th>
                                        <th data-field="phone" data-editable="false">Phone</th>
                                        <th data-field="complete">Address</th>
                                        <th data-field="salary" data-editable="false">Salary</th>
                                        <th data-field="status" data-editable="false">Status</th>
                                        <th data-field="price" data-editable="false">AddedBy</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT * FROM `workers` WHERE `status`='1'");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                                    <tr>
                                        <td><?php echo $No; ?></td>
                                        <td><img src="<?php echo 'images/workers/'.$results['pic']; ?>" alt="Failed" width="60px" height="60px"></td>
                                        <td><?php echo $results['name']; ?></td>
                                        <td><?php

                                        $dept_id = $results['dept']; 
                                        $dept_query = mysqli_query($con, "Select * from departments where dept_id='$dept_id'");
                                        $rowdept = mysqli_fetch_array($dept_query);
                                        echo $rowdept['name'];

                                        ?></td>
                                        <td><?php echo $results['email']; ?></td>
                                        <td><?php echo $results['phone']; ?></td>
                                        <td><?php echo $results['address']; ?></td>
                                        <td><?php echo number_format($results['salary']); ?></td>
                                        <td><a href="mute_workers.php?id=<?php echo $results['w_id'] ?>"><button data-toggle="tooltip" title="Edit" class="btn btn-primary">Mute</button></a></td>
                                        <td><?php echo $results['addedby']; ?></td>
                                        <td></td>
                                        <td><button data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        <a href="worker_details.php?id=<?php echo $results['w_id'] ?>"><button data-toggle="tooltip" title="View" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
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
<!-- Active Table End -->
<!-- Table for muted users -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>List of <span class="table-project-n">Muted</span> Users</h1>
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
                                        <th data-field="pic">Photo</th>
                                        <th data-field="name" data-editable="false">Name</th>
                                        <th data-field="dept" data-editable="false">Dept</th>
                                        <th data-field="email" data-editable="false">Email</th>
                                        <th data-field="phone" data-editable="false">Phone</th>
                                        <th data-field="complete">Address</th>
                                        <th data-field="status" data-editable="false">Status</th>
                                        <th data-field="date" data-editable="false">DateAdded</th>
                                        <th data-field="price" data-editable="false">AddedBy</th>
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
                                        <td><img src="<?php echo 'images/workers/'.$results['pic']; ?>" alt="Failed" width="60px" height="60px"></td>
                                        <td><?php echo $results['name']; ?></td>
                                        <td><?php echo $results['dept']; ?></td>
                                        <td><?php echo $results['email']; ?></td>
                                        <td><?php echo $results['phone']; ?></td>
                                        <td><?php echo $results['address']; ?></td>
                                        <td><a href="unmute_workers.php?id=<?php echo $results['w_id'] ?>"><button class="btn btn-primary">UnMute</button></a></td>
                                        <td><?php echo $results['addedby']; ?></td>
                                        <td><button data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <a href="#"><button data-toggle="tooltip" title="Trash" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                        <a href="worker_details.php?id=<?php echo $results['w_id'] ?>"><button data-toggle="tooltip" title="View" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
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
<!-- Muted users Table End -->
        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- jquery
		============================================ -->
    <?php include 'includes/scripts.php'; ?>
   
</body>

</html>