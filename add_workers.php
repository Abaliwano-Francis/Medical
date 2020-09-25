<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $salary = str_replace(',', '', $salary);
    $status = 1;
    $addedby = 2;
    $dept = mysqli_real_escape_string($con, $_POST['dept']);
    $image = $_FILES['pic']['name'];
    $Target = "images/workers/".basename($image);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $Target);

    $query = mysqli_query($con, "INSERT INTO `workers`(`name`, `email`, `phone`, `address`, `dept`, `salary`, `status`, `pic`, `addedby`) VALUES ('$name','$email','$phone','$address','$dept','$salary','$status','$image','$addedby')");
    if ($query) {
        echo "<script>alert('Worker added successfully')
        window.location='all_workers.php'</script>";
    }
    else{
        echo "<script>alert('Failed to add Worker')
        window.location='all_workers.php'</script>";
    }
}

?>
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
                                <li><span class="bread-blod">Add Worker</span>
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
                <li class="active"><a href="#description">Add Worker</a></li>
            </ul>


<!-- form for adding department -->
<div id="myTabContent" class="tab-content custom-product-edit">
    <div class="product-tab-list tab-pane fade active in" id="description">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="review-content-section">
                    <form id="add-department" action="#" class="add-department" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="chosen-select-single mg-b-20">
                                        <select class="form-control" name="dept">
                                <?php 
                                include 'dbcon.php';
                                $sql1 = mysqli_query($con, "SELECT * FROM `departments` WHERE 1");
                                while ($results1 = mysqli_fetch_array($sql1)) { ?>
                                        <option value="<?php echo $results1['dept_id'] ?>"><?php echo $results1['name']; ?></option>
                                <?php } ?>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input onkeyup="this.value=addCommas(this.value);" type="text" class="form-control" name="salary" placeholder="salary">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input name="pic" type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="payment-adress">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Submit</button>
                                </div>
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