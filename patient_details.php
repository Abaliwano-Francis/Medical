<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
  $idFromUrl = $_GET['id'];
$sql = mysqli_query($con, "SELECT *, (SELECT name FROM doctors WHERE id=patients.doc_id) as doctor, (SELECT name FROM sys_users WHERE id=patients.addedby) as addedby FROM `patients` WHERE `id`='$idFromUrl'");
$resultsc = mysqli_fetch_array($sql);

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
                                            <li><span class="bread-blod">Patient Profile</span>
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
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#INFORMATION">Doctor/Nurse's Details</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="profile-details-hr">
                                <div class="row">
                                    <!-- First Row -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Name: </b> <?php echo $resultsc['name']; ?></p>
                                    </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Gander: </b> <?php if ($resultsc['gander']=="F") {
                                           echo "Female";
                                        }
                                        else  {
                                             echo "Male";
                                         } ?></p>
                                    </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Date of Birth: </b> <?php echo $resultsc['date_of_birth']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
<?php
$dob = strtotime($resultsc['date_of_birth']);
$now = strtotime(date("Y-m-d"));
$ageinSec = $now-$dob;
$age = round($ageinSec/(60*60*24*365));
?>
                                            <p><b>Age: </b> <?php echo $age." Years"; ?></p>
                                        </div>
                                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Address: </b> <?php echo $resultsc['address']; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Phone: </b> <?php echo $resultsc['contact']; ?></p>
                                    </div>
                                </div>
                            </div>
                                    <!-- Another row -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Next of Kin Name: </b> <?php echo $resultsc['next_of_kin']; ?></p>
                                    </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Next of Kin Contact: </b> <?php echo $resultsc['next_of_kin_contact']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Weight: </b> <?php echo $resultsc['weight']."Kg"; ?></p>
                                        </div>
                                    </div>
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Assigned Doctor/Nurse: </b> <?php echo $resultsc['doctor']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Attended To: </b> <?php if ($resultsc['status']=="0") {
                                           echo "Yes";
                                        }
                                        else  {
                                             echo "Not Yet";
                                         } ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Discharged on: </b> <?php if ($resultsc['status1']=="0") {
                                           echo $resultsc['discharged'];
                                        }
                                        else  {
                                             echo "Not Yet";
                                         } ?></p>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Another row -->
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Symptoms: </b> <?php echo $resultsc['symptoms']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div>
                                            <p><b>Medication: </b> <?php echo $resultsc['medication']; ?></p>
                                        </div>
                                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Added By: </b> <?php echo $resultsc['addedby']; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div>
                                        <p><b>Date Added: </b> <?php echo $resultsc['date_added']; ?></p>
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