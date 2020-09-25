<!-- Badge for new messages -->
<?php 
include"includes/dbcon.php";
$sql1 = mysqli_query($con, "SELECT COUNT(messages.id) AS num FROM messages, sys_users WHERE sys_users.id=messages.sender AND messages.status=1;");
$results1 = mysqli_fetch_array($sql1);
?>

<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a class="has-arrow" href="index.html">
						   <span class="educate-icon educate-home icon-wrap"></span>
						   <span class="mini-click-non">Dashboard</span>
						</a>
                    <ul class="submenu-angle" aria-expanded="true">
                        <li><a title="Dashboard v.1" href="index.php"><span class="mini-sub-pro">Admin Dashboard</span></a></li>
                        <li><a title="Analytics" href="analytics.html"><span class="mini-sub-pro">Analytics</span></a></li>
                        <li><a title="Widgets" href="widgets.html"><span class="mini-sub-pro">Widgets</span></a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Doctors</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="All Doctors/Nurses" href="view_doctors.php"><span class="mini-sub-pro">View Doctors</span></a></li>
                        <li><a title="Add Doctor" href="add_doctors.php"><span class="mini-sub-pro">Add Doctor/Nurse</span></a></li>
                        <li><a title="Doctor Categories" href="doc_category.php" class="mini-sub-pro">Doctor Category</a>
                        <li><a title="View logs" href="patients_log.php" class="mini-sub-pro">Doctor Logs</a>
                        <li><a title="View logs" href="doctor_patients.php" class="mini-sub-pro">Assignments</a>
                </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Patients</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="All Students" href="view_patients.php"><span class="mini-sub-pro">All Patients</span></a></li>
                        <li><a title="Add Students" href="add_patient.php"><span class="mini-sub-pro">Add Patient</span></a></li>
                        <li><a href="patients_log.php">Patients Log</a>
                </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Stock</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Items in Stock" href="available_stock.php"><span class="mini-sub-pro">Available Stock</span></a></li>
                        <li><a title="Purchase Details" href="purchases.php"><span class="mini-sub-pro">Purchases</span></a></li>
                        <li><a title="Units Section" href="units.php"><span class="mini-sub-pro">Units</span></a></li>
                        <li><a title="View Stock Logs" href="stock_log.php"><span class="mini-sub-pro">Stock Lod</span></a></li>
                </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Departments</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="Departments List" href="departments.php"><span class="mini-sub-pro">Departments List</span></a></li>
                        <li><a title="Add Departments" href="add_department.php"><span class="mini-sub-pro">Add Departments</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="messages.php"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Messages</span><span class="badge"><?php echo $results1['num'] ?></span></a>
                </li>
                <li>
                    <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Workers</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="All Users" href="all_workers.php"><span class="mini-sub-pro">All Workers</span></a></li>
                        <li><a title="Add Users" href="add_workers.php"><span class="mini-sub-pro">Add Worker</span></a></li>
                        <li><a title="Edit Professor" href="#"><span class="mini-sub-pro">Workers Logs</span></a></li>
                    </ul>
                </li>
                <li>
               <li>
                    <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Users</span></a>
                    <ul class="submenu-angle" aria-expanded="false">
                        <li><a title="All Users" href="users.php"><span class="mini-sub-pro">All Users</span></a></li>
                        <li><a title="Add Users" href="add_users.php"><span class="mini-sub-pro">Add User</span></a></li>
                        <li><a title="Edit Professor" href="edit-professor.html"><span class="mini-sub-pro">Users Logs</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="myaccount.php"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">My Account</span></a>
                </li>
            </ul>
        </nav>
            </div>
        </nav>
    </div>