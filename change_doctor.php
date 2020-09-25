<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
    $idFromUrl = $_GET['id'];
    $sql = mysqli_query($con, "SELECT *, (SELECT name FROM doctors WHERE id=patients.doc_id) as doctor, (SELECT name FROM sys_users WHERE id=patients.addedby) as addedby FROM `patients` WHERE `status`='1' and id='$idFromUrl'");
    $resultsr = mysqli_fetch_array($sql);
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
                                <li><span class="bread-blod">Re-Assign Dr/Nr</span>
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
            <h3 class="text-primary">Edit Doctor for patient <?php echo $resultsr['name'];?></h3>


<!-- form for Editing department -->
<div id="myTabContent" class="tab-content custom-product-edit">
    <div class="product-tab-list tab-pane fade active in" id="description">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="review-content-section">
                    <form id="add-department" action="#" class="add-department" method="POST">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                           <label>Assigned Doctor</label>
                            <div class="chosen-select-single mg-b-20">
                                
                                <select class="form-control" name="doctor">
                        <?php 
    $doctor = $resultsr['doc_id'];
                        include 'includes/dbcon.php';
                        $sql1 = mysqli_query($con, "SELECT *, (SELECT name FROM doc_category WHERE id=doctors.category_id) as category FROM `doctors` WHERE `status`='1'");
                        while ($results5 = mysqli_fetch_array($sql1)) { ?>
                                <option value="<?php echo $results5['id'] ?>" <?php if($results5['id']==$doctor){?>selected<?php }?>><?php echo $results5['name']."-".$results5['category']; ?></option>
                        <?php } ?>
                                   
                                </select>
                            </div>
                        </div>
                            </div>
                           </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="row">
                                    <div class="payment-adress col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a class="btn btn-danger waves-effect waves-light" href="view_patients.php">Cancel</a>
                                </div>
                                <div class="payment-adress col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Update</button>
                                </div>
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

<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $doc = $_POST['doctor'];

    $query = mysqli_query($con, "UPDATE `patients` SET `doc_id`='$doc' WHERE `id`='$idFromUrl'");
    if ($query) {
        echo "<script>alert('Patient doctor changed successfully')
        window.location='view_patients.php'</script>";
    }
    else{
        echo "<script>alert('Failed to change Patient doctor')
        window.location='view_patients.php'</script>";
    }
}


 ?>
