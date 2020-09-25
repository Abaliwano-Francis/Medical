<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $address = $_POST['address'];
    $cpass = $_POST['cpassword'];
    $status = 1;
    $addedby = "2";
    $category = $_POST['category'];
    $dob = $_POST['dob'];
    $image = $_FILES['pic']['name'];
    $Target = "images/doctors/".basename($image);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $Target);

    $query = mysqli_query($con, "INSERT INTO `doctors`(`name`, `username`, `email`, `phone`, `address`, `category_id`, `status`, `pic`, `addedby`, `date_of_birth`) VALUES ('$name','$uname','$email','$phone','$address','$category','$status','$image','$addedby','$dob')");
    if(!$query){
        die("Error ".mysqli_error($con));
    }
    if ($query) {
        echo "<script>alert('Doctor added successfully')
        window.location='view_doctors.php'</script>";
    }
   else{
       echo "<script>alert('Failed to add Doctor')
       window.location='view_doctors.php'</script>";
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
                                <li><span class="bread-blod">Add Doctor/Nurse</span>
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
                <li class="active"><a href="#description">Add Doctor/Nurse</a></li>
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
                                    <input name="username" type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <input name="cpassword" type="password" class="form-control" placeholder="Confirm password">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="chosen-select-single mg-b-20">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                <?php 
                                include 'dbcon.php';
                                $sql = mysqli_query($con, "SELECT * FROM `doc_category` WHERE 1");
                                while ($results = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?php echo $results['id'] ?>"><?php echo $results['name']; ?></option>
                                <?php } ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input name="dob" type="date" class="form-control">
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