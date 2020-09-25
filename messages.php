<!doctype html>
<html class="no-js" lang="en">
<?php require("includes/head.php"); ?>

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
                                    <li><span class="bread-blod">Messages</span>
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
<!-- Table for New unread Messages -->
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>New Messages</h4>
                    <div class="add-product">
                        <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl">Compose Message</a>
                    </div>
                    <!-- Modal for adding department -->
                    <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Compose Message</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Fill...</h2>
                                        <form id="add-department" action="#" class="add-department" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message goes here"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    <div class="chosen-select-single mg-b-20">
                                        <select class="form-control" name="receiver">
                                            <option value="none" selected="" disabled="">Select Receipient</option>
                                <?php 
                                include 'includes/dbcon.php';
                                $sql1 = mysqli_query($con, "SELECT *, (SELECT name FROM departments WHERE dept_id=sys_users.role) as dept FROM `sys_users` WHERE `status`='1'");
                                while ($results = mysqli_fetch_array($sql1)) { ?>
                                        <option value="<?php echo $results['id'] ?>"><?php echo $results['name']." - ".$results['dept']; ?></option>
                                <?php } ?>
                                           
                                        </select>
                                        <?php echo $results['dept']; ?>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a data-dismiss="modal" href="#">Cancel</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit" style="margin-left: 30%; height: 40px;">Send</button>
                                    </div>
                        </form>
                                </div>
                            </div>
                        </div>
                       <!--  Modal end -->
<!-- Inserting data from the modal into the database to add a new department -->
<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $receiver = $_POST['receiver'];
    $status = 1;
    $sender = 1;

    $query = mysqli_query($con, "INSERT INTO `messages`(`body`, `sender`, `receiver`, `status`) VALUES ('$message','$sender','$receiver','$status')");
    if ($query) {
        echo "<script>alert('Message sent successfully')
        window.location='messages.php</script>";
    }
    else{
        echo "<script>alert('Failed to send Message')
        window.location='messages.php</script>";
    }
}
?>
<!-- End of data insertion -->
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Sender</th>
                                <th>Dept of Sender</th>
                                <th>Message</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                            </tr>
<?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT messages.id, messages.body, messages.date_time, sys_users.name, departments.name AS dept FROM messages, sys_users, departments WHERE sys_users.id=messages.sender AND sys_users.role=departments.dept_id AND messages.status=1");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                            <tr>
                                <td><?php echo $No; ?></td>
                                <td><?php echo $results['name']; ?></td>
                                <td><?php echo $results['dept']; ?></td>
                                <td><?php echo $results['body'] ?></td>
                                <td><?php echo $results['date_time'] ?></td>
                                <td>
                                    <a href="read.php?id=<?php echo $results['id'] ?>"><button data-toggle="tooltip" title="Mark as Read" class="btn btn-primary"><i class="fa fa-book" aria-hidden="true"></i></button></a>
                                    <a href="confirm_delete_message.php?id=<?php echo $results['id'] ?>"><button data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                <?php } ?>
                        </table>
                    </div>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table for Read Messages -->
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Read Messages</h4>
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Sender</th>
                                <th>Dept of Sender</th>
                                <th>Message</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                            </tr>
<?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT messages.id, messages.body, messages.date_time, sys_users.name, departments.name AS dept FROM messages, sys_users, departments WHERE sys_users.id=messages.sender AND sys_users.role=departments.dept_id AND messages.status=0");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                            <tr>
                                <td><?php echo $No; ?></td>
                                <td><?php echo $results['name']; ?></td>
                                <td><?php echo $results['dept'] ?></td>
                                <td><?php echo $results['body'] ?></td>
                                <td><?php echo $results['date_time'] ?></td>
                                <td>
                                    <a href="confirm_delete_message.php?id=<?php echo $results['id'] ?>"><button data-toggle="tooltip" title="Delete Message" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                <?php } ?>
                        </table>
                    </div>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table of Sent Messages -->
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Sent Messages</h4>
                    <div class="asset-inner">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Receiver</th>
                                <th>Dept of Receiver</th>
                                <th>Message</th>
                                <th>Date & Time</th>
                                <th>Action</th>
                            </tr>
<?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT messages.id, messages.body, messages.date_time, sys_users.name, departments.name AS dept FROM messages, sys_users, departments WHERE sys_users.id=messages.receiver AND sys_users.role=departments.dept_id");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                            <tr>
                                <td><?php echo $No; ?></td>
                                <td><?php echo $results['name']; ?></td>
                                <td><?php echo $results['dept'] ?></td>
                                <td><?php echo $results['body'] ?></td>
                                <td><?php echo $results['date_time'] ?></td>
                                <td>
                                    <a href="confirm_delete_message.php?id=<?php echo $results['id'] ?>"><button data-toggle="tooltip" title="Delete Message" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                </td>
                            </tr>
                <?php } ?>
                        </table>
                    </div>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'includes/footer.php'; ?>
</div>

<!-- jquery
	============================================ -->
<?php include 'includes/scripts.php'; ?>
</body>

</html>