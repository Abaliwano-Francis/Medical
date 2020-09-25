<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
  $w_id = $_GET['id'];
$sqlw = mysqli_query($con, "SELECT * FROM `workers` WHERE `w_id`='$w_id'");
$resultsw = mysqli_fetch_array($sqlw);

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
                                            <li><span class="bread-blod">Worker Profile</span>
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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <h4 class="text-info">Profile Pic</h4>
                                <img src='<?php echo "images/workers/".$resultsw["pic"]; ?>' alt="Failed" />
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#INFORMATION">Worker's Details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Name: </b> <?php echo $resultsw['name']; ?></p>
                                        </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div>
                                                <p><b>Department: </b> <?php echo $resultsw['dept']; ?></p>
                                            </div>
                                        </div>
                                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div>
                                                <p><b>Email: </b> <?php echo $resultsw['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div>
                                                <p><b>Phone: </b> <?php echo $resultsw['phone']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Address: </b> <?php echo $resultsw['address']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Salary: </b> <?php echo $resultsw['salary']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Added By: </b> <?php echo $resultsw['addedby']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Date Added: </b> <?php echo $resultsw['date_added']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <a href="#"><button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15">Edit Info</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- jquery
        ============================================ -->
    <?php include 'includes/scripts.php'; ?>
</body>

</html>