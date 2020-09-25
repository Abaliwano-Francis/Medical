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
                                <li><span class="bread-blod">Stock</span>
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
                            <h1>List of <span class="table-project-n">Items in</span> Stock</h1>
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
                                        <th data-field="name" data-editable="false">Item Name</th>
                                        <th data-field="dept" data-editable="false">Quantity</th>
                                        <th data-field="email" data-editable="false">Unit Price</th>
                                        <th data-field="tprij" data-editable="false">Total Price</th>
                                        <th data-field="units" data-editable="false">Supplier</th>
                                        <th data-field="status" data-editable="false">Supplier Contact</th>
                                        <th data-field="expiry" data-editable="false">Expiry Date</th>
                                        <th data-field="addedby" data-editable="false">AddedBy</th>
                                        <th data-field="date" data-editable="false">DateAdded</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT *, (SELECT symbol FROM units WHERE id=t_stock.unit_id) as units, (SELECT name FROM sys_users WHERE id=t_stock.user_id) as addedby FROM `t_stock`");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                                    <tr>
                                        <td><?php echo $No; ?></td>
                                        <td><?php echo $results['name']; ?></td>
                                        <td><?php echo $results['quantity']." ".$results['units']; ?></td>
                                        <td><?php echo number_format($results['unit_price']); ?></td>
                                        <td><?php echo number_format($results['total_price']); ?></td>
                                        <td><?php echo $results['supplier_name']; ?></td>
                                        <td><?php echo $results['supplier_contact']; ?></td>
                                        <td><?php echo $results['exp_date']; ?></td>
<?php 
$date = strtotime($results['date_added']);
$date_added = date("d/m/Y", $date);
?>
                                        <td><?php echo $results['addedby']; ?></td>
                                        <td><?php echo $date_added; ?></td>
                                        <td><button data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <a href="#"><button data-toggle="tooltip" title="Trash" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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
<!-- Table for Products running out of stock -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>List of <span class="table-project-n">Items running out of </span> Stock</h1>
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
                                        <th data-field="name" data-editable="false">Item Name</th>
                                        <th data-field="dept" data-editable="false">Quantity</th>
                                        <th data-field="email" data-editable="false">Unit Price</th>
                                        <th data-field="tprij" data-editable="false">Total Price</th>
                                        <th data-field="units" data-editable="false">Supplier</th>
                                        <th data-field="status" data-editable="false">Supplier Contact</th>
                                        <th data-field="expiry" data-editable="false">Expiry Date</th>
                                        <th data-field="addedby" data-editable="false">AddedBy</th>
                                        <th data-field="date" data-editable="false">DateAdded</th>
                                        <th data-field="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT *, (SELECT name FROM units WHERE id=t_stock.unit_id) as units, (SELECT name FROM sys_users WHERE id=t_stock.user_id) as addedby FROM `t_stock`");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                                    <tr>
                                        <td><?php echo $No; ?></td>
                                        <td><?php echo $results['name']; ?></td>
                                        <td><?php echo $results['quantity']." ".$results['units']; ?></td>
                                        <td><?php echo $results['unit_price']; ?></td>
                                        <td><?php echo $results['total_price']; ?></td>
                                        <td><?php echo $results['supplier_name']; ?></td>
                                        <td><?php echo $results['supplier_contact']; ?></td>
                                        <td><?php echo $results['exp_date']; ?></td>
                                        <td><?php echo $results['addedby']; ?></td>
                                        <td><?php echo $results['date_added']; ?></td>
                                        <td><button data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <a href="#"><button data-toggle="tooltip" title="Trash" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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