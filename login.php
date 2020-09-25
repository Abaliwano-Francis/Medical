<!doctype html>
<html class="no-js" lang="en">
<?php include 'includes/head.php'; ?>
<style>
    body {
        background-image: url("images/bg/dd.JPG") !important;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        overflow: hidden;
    }
    .top{
        width: 100%;
        height: 50px;
        background-color: #000;
    }
</style>
<body>
    <div style="width: 100%; height: 5px; background-color: blue;"></div>
        <div class="top">
            <h2>Enrique Hospital</h2>
        </div>
        <div style="width: 100%; height: 5px; background-color: blue;"></div>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Welcome to system Login Page</h3>
				<p>This is the best system ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="#" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" name="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
										<input type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2020. All rights reserved. Developed by <a href="#">Abaliwano Francis</a></p>
			</div>
		</div>   
    </div>
    <!-- jquery
		============================================ -->
   <?php include 'includes/scripts.php'; ?>
</body>

</html>