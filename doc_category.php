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
                                    <li><span class="bread-blod">Doc Categories</span>
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
<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                    <h4>Doctor Categories</h4>
                    <div class="add-product">
                        <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl">Add Category</a>
                    </div>
                    <!-- Modal for adding department -->
                    <div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Add New Category</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Fill...</h2>
                                        <form id="add-department" action="#" class="add-department" method="POST">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control" placeholder="Category Name">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <a data-dismiss="modal" href="#">Cancel</a>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit" style="margin-left: 30%; height: 40px;">Save</button>
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
    $name = $_POST['name'];
    $addedby = 1;

    $query = mysqli_query($con, "INSERT INTO `doc_category`(`name`, `added_by`) VALUES ('$name','$addedby')");
    if ($query) {
        echo "<script>alert('Category added successfully')
        window.location='doc_category.php</script>";
    }
    else{
        echo "<script>alert('Failed to add Category')
        window.location='doc_category.php</script>";
    }
}
?>
<!-- End of data insertion -->
                    <div class="asset-inner">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Added By</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
<?php 
include"includes/dbcon.php";
$sql = mysqli_query($con, "SELECT * FROM `doc_category`");
$No = 0;
while($results = mysqli_fetch_array($sql)){
    $No++
?>
                            <tr>
                                <td><?php echo $No; ?></td>
                                <td><?php echo $results['name']; ?></td>
                                <td><?php echo $results['added_by']; ?></td>
                                <td><?php echo $results['date_added']; ?></td>
                                <td>
                                    <a href="edit_doc_category.php?id=<?php echo $results['id'] ?>"><button data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    <a href="confirm_delete_cat.php?id=<?php echo $results['id'] ?>"><button data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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