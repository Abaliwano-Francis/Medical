<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
    $idFromUrl = $_GET['id'];
    $sql = mysqli_query($con, "SELECT *, (SELECT name FROM doc_category WHERE id=doctors.category_id) as category FROM `doctors` WHERE `id`='$idFromUrl'");
    $resultsd = mysqli_fetch_array($sql);
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
        <?php 
$dob = $resultsd['date_of_birth'];
$category1 = $resultsd['category'];
?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="review-content-section">
                    <form id="add-department" action="#" class="add-department" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="<?php echo $resultsd['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $resultsd['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $resultsd['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" placeholder="Phone" value="<?php echo $resultsd['phone'] ?>">
                                </div>
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" placeholder="Address" value="<?php echo $resultsd['address'] ?>">
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="chosen-select-single mg-b-20">
                                        <label>Category</label>
                                        <select class="form-control" name="category" value="<?php echo $category1; ?>">
                                <?php 
                                include 'dbcon.php';
                                $sql = mysqli_query($con, "SELECT * FROM `doc_category` WHERE 1");
                                while ($resultsb = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?php echo $resultsb['id'] ?>"><?php echo $resultsb['name']; ?></option>
                                <?php } ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Profile Pic</label>
                                    <span>Existing Image: <img src="<?php echo 'images/doctors/'.$resultsd['pic']; ?>" width="100px"; height="50px";></span>
                                    <input name="pic" type="file" class="form-control" value="<?php echo $resultsd['pic'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input name="dob" type="date" class="form-control" value="<?php echo $dob; ?>">
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
<?php } ?>

<!-- footer -->
<?php include 'includes/footer.php'; ?>

<?php include 'includes/scripts.php'; ?>
</body>

</html>

<!-- Updating doctor's information -->
<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $addedby = "2";
    $category = $_POST['category'];
    $dat = $_POST['dob'];
    $image = $_FILES['pic']['name'];
    $Target = "images/doctors/".basename($image);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $Target);

    if (!empty($image)) {
        $query = mysqli_query($con, "UPDATE `doctors` SET `name`='$name',`username`='$uname',`email`='$email',`phone`='$phone',`address`='$address',`category_id`='$category',`pic`='$image',`date_of_birth`='$dat' WHERE `id`='$idFromUrl'");
    }
    if (empty($image)) {
        $query = mysqli_query($con, "UPDATE `doctors` SET `name`='$name',`username`='$uname',`email`='$email',`phone`='$phone',`address`='$address',`category_id`='$category',`date_of_birth`='$dat' WHERE `id`='$idFromUrl'");
    }
    
    if ($query) {
        echo "<script>alert('Doctor/Nurse Info Updated successfully')
        window.location='view_doctors.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Update Doctor/Nurse Info')
        window.location='view_doctors.php'</script>";
    }
}

?>