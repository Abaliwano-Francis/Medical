<!-- Inserting Patient's info into the database -->
<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gander = $_POST['gander'];
    $phone = $_POST['mobileno'];
    $symptoms = $_POST['symptoms'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $doctor = $_POST['doctor'];
    $status1 = 1;
    $status2 = 1;
    $addedby = "2";
    $weight = $_POST['weight'];
    $nxtOfKin = $_POST['next_of_kin'];
    $nxtOfKinContact = $_POST['next_of_kin_cont'];
   
    $query = mysqli_query($con, "INSERT INTO `patients`(`name`, `address`, `contact`, `weight`, `date_of_birth`, `gander`, `next_of_kin`, `next_of_kin_contact`, `doc_id`, `status`, `status1`, `symptoms`, `addedby`) VALUES ('$name','$address','$phone','$weight','$dob','$gander','$nxtOfKin','$nxtOfKinContact','$doctor','$status1','$status2','$symptoms','$addedby')");
    if ($query) {
        echo "<script>alert('Patient added successfully')
        window.location='view_patients.php'</script>";
    }
    else{
        echo "<script>alert('Failed to add Patient')
        window.location='view_patients.php'</script>";
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
                                    <li><span class="bread-blod">Add Patient</span>
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
            <li class="active"><a href="#description">Patient Information</a></li>
        </ul>
        <div id="myTabContent" class="tab-content custom-product-edit">
            <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <div id="dropzone1" class="pro-ad">
                <form action="" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-user"></i></span>
                                <input name="name" type="text" class="form-control" placeholder="FullName">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-home"></i></span>
                                <input name="address" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-phone"></i></span>
                                <input name="mobileno" type="text" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group data-custon-pick" id="data_2">
                            <label>Date of Birth</label>
                            <div class="input-group date">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" value="08/09/2017" name="dob">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="weight" type="number" class="form-control" placeholder="Weight">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-user"></i></span>
                                <input name="next_of_kin" type="text" class="form-control" placeholder="Next of kin's FullName">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-phone"></i></span>
                                <input name="next_of_kin_cont" type="text" class="form-control" placeholder="Next of kin's Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="symptoms" class="form-control" placeholder="Symptoms/Problem"></textarea>                        
                        </div>
                        <div class="form-group">
                            <select name="gander" class="form-control">
								<option value="none" selected="" disabled="">Select Gender</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
                        </div>
                       <div class="form-group">
                            <div class="chosen-select-single mg-b-20">
                                <select class="form-control" name="doctor">
                                    <option value="none" selected="" disabled="">Assign Doctor/Nurse</option>
                        <?php 
                        include 'includes/dbcon.php';
                        $sql1 = mysqli_query($con, "SELECT *, (SELECT name FROM doc_category WHERE id=doctors.category_id) as category FROM `doctors` WHERE `status`='1'");
                        while ($results5 = mysqli_fetch_array($sql1)) { ?>
                                <option value="<?php echo $results5['id'] ?>"><?php echo $results5['name']."-".$results5['category']; ?></option>
                        <?php } ?>
                                   
                                </select>
                            </div>
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
   </div>
  </div>
 </div>
 </div>
</div>
</div>
        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>