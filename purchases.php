<?php 
include 'includes/dbcon.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $unit = $_POST['unit'];
    $qtty = $_POST['qtty'];
    $supplier = $_POST['supplier'];
    $u_price = $_POST['unit_price'];
    $supplier_cont = $_POST['phone'];
    $exp_date = $_POST['exp_date'];
    $addedby = "2";
    $t_price = $u_price*$qtty;

    $query = mysqli_query($con, "INSERT INTO `t_stock`(`name`, `quantity`, `unit_price`, `total_price`, `supplier_name`, `supplier_contact`, `exp_date`, `unit_id`, `user_id`) VALUES ('$name','$qtty','$u_price','$t_price','$supplier','$supplier_cont','$exp_date','$unit','$addedby')");
    if ($query) {
        echo "<script>alert('Produt added successfully')
        window.location='purchases.php'</script>";
    }
    else{
        echo "<script>alert('Failed to add Produt')
        window.location='purchases.php'</script>";
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
                                <li><span class="bread-blod">Purchases</span>
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
                <li class="active"><a href="#description">New Purchase</a></li>
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
                                    <input name="name" type="text" class="form-control" placeholder="Produt Name" required>
                                </div>
                                <div class="form-group">
                                    <input name="qtty" type="number" class="form-control" placeholder="Quantity Purchased">
                                </div>
                                <div class="form-group">
                                    <div class="chosen-select-single mg-b-20">
                                        <label>Units</label>
                                        <select class="form-control" name="unit">
                                <?php 
                                include 'dbcon.php';
                                $sql = mysqli_query($con, "SELECT * FROM `units` WHERE 1");
                                while ($results = mysqli_fetch_array($sql)) { ?>
                                        <option value="<?php echo $results['id'] ?>"><?php echo $results['name']; ?></option>
                                <?php } ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input onkeyup="this.value=addCommas(this.value);" name="unit_price" type="text" min="0" class="form-control" placeholder="Unit Price">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input name="exp_date" type="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input name="supplier" type="text" class="form-control" placeholder="Name of Supplier">
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" placeholder="Contact of Supplier">
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