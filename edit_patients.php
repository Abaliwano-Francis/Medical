<?php 
include 'includes/dbcon.php';
if (isset($_GET['id'])) {
    $idFromUrl = $_GET['id'];
        $sql = mysqli_query($con, "SELECT *, (SELECT name FROM doctors WHERE id=patients.doc_id) as doctor, (SELECT name FROM sys_users WHERE id=patients.addedby) as addedby FROM `patients` WHERE `status`='1' and id='$idFromUrl'");

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
                                <input name="name" type="text" class="form-control" placeholder="FullName" value="<?php echo $resultsd['name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-home"></i></span>
                                <input name="address" type="text" class="form-control" placeholder="Address" value="<?php echo $resultsd['address'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-phone"></i></span>
                                <input name="mobileno" type="text" class="form-control" placeholder="Phone Number" value="<?php echo $resultsd['contact'] ?>">
                            </div>
                        </div>
                        <div class="form-group data-custon-pick" id="data_2">
                            <label>Date of Birth</label>
                            <div class="input-group date">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control" name="dob" value="<?php echo $resultsd['date_of_birth'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="weight" type="number" class="form-control" placeholder="Weight" value="<?php echo $resultsd['weight'] ?>">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-user"></i></span>
                                <input name="next_of_kin" type="text" class="form-control" placeholder="Next of kin's FullName" value="<?php echo $resultsd['next_of_kin'] ?>">
                            </div>
                        </div>
                        <div class="payment-adress ttt">
                            <a href="view_patients.php"><button type="submit" class="btn btn-success waves-effect waves-light" name="submit">Cancel</button></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" style="background: blue; color: white"><i class="fa fa-phone"></i></span>
                                <input name="next_of_kin_cont" type="text" class="form-control" placeholder="Next of kin's Phone Number" value="<?php echo $resultsd['next_of_kin_contact']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="symptoms" class="form-control" placeholder="Symptoms/Problem"><?php echo $resultsd['symptoms'] ?></textarea>                        
                        </div>
                        <div class="form-group">
                            <select name="gander" class="form-control">
<!--								<option value="none" selected="" disabled="">Select Gander</option>-->
								<option value="M" <?php if($resultsd['gander']=='M'){?>selected <?php 
    }?> >Male</option>
								<option value="F" <?php if($resultsd['gander']=='F'){?>selected <?php 
    }?>>Female</option>
							</select>
                        </div>
                       <div class="form-group">
                           <label>Assigned Doctor</label>
                            <div class="chosen-select-single mg-b-20">
                                
                                <select class="form-control" name="doctor">
                        <?php 
    $doctor = $resultsd['doc_id'];
                        include 'includes/dbcon.php';
                        $sql1 = mysqli_query($con, "SELECT *, (SELECT name FROM doc_category WHERE id=doctors.category_id) as category FROM `doctors` WHERE `status`='1'");
                        while ($results5 = mysqli_fetch_array($sql1)) { ?>
                                <option value="<?php echo $results5['id'] ?>" <?php if($results5['id']==$doctor){?>selected<?php }?>><?php echo $results5['name']."-".$results5['category']; ?></option>
                        <?php } ?>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="payment-adress">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Update</button>
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
    <?php } ?>
</body>

</html>

<!-- Updating Patient's info -->
<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gander = $_POST['gander'];
    $phone = $_POST['mobileno'];
    $symptoms = $_POST['symptoms'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $doctor1 = $_POST['doctor'];
    $weight = $_POST['weight'];
    $nxtOfKin = $_POST['next_of_kin'];
    $nxtOfKinContact = $_POST['next_of_kin_cont'];
   
    $query = mysqli_query($con, "UPDATE `patients` SET `name`='$name',`address`='$address',`contact`='$phone',`weight`='$weight',`date_of_birth`='$dob',`gander`='$gander',`next_of_kin`='$nxtOfKin',`next_of_kin_contact`='$nxtOfKinContact',`doc_id`='$doctor1',`symptoms`='$symptoms' WHERE id='$idFromUrl'");
    if ($query) {
        echo "<script>alert('Patient Updated successfully')
        window.location='view_patients.php'</script>";
    }
    else{
        echo "<script>alert('Failed to Update Patient  Info')</script>
        window.location='view_patients.php'";
    }
}

?>