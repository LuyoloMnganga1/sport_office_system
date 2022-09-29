<?php
session_start();
include('includes/config.php');
if(isset($_POST['new_update']))
{
	$username=$_POST['username'];
	$new_password=md5($_POST['new_password']);   
	$confirm_new_password=md5($_POST['confirm_new_password']);  
    
    $sql ="SELECT * FROM tblemployees where EmailId ='$username'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count <= 0)
	{
        echo "<script>alert('Your credentials are invalid');</script>";
    }else if($new_password !== $confirm_new_password){
        echo "<script>alert('New password and confirm password do not match');</script>";
    }else{

    $result = mysqli_query($conn,"update tblemployees set Password='$new_password' where EmailId='$username'         
		")or die(mysqli_error());
        if ($result) {
            echo "<script>alert('Your password has been Successfully Updated');</script>";
            echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
        } else{
        die(mysqli_error());
    }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SIM | Forgot Password</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<img src="vendors/images/logo2.jpg" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-12 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-dark"> Sport Indemnity Management Forgot Password
							</h2> 
						</div>
						<form name="signin" method="post">
						<div class="weight-500 col-md-12">
															<div class="form-group">
																<label>Email ID</label>
																<div class="input-group custom">
																<input type="text" class="form-control form-control-lg" placeholder="Email ID" name="username" id="username">
																	<div class="input-group-append custom">
																		<span class="input-group-text"><i class="icon-copy fa fa-envelope-o" aria-hidden="true"></i></span>
																	</div>
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-12">
															<div class="form-group">
																<label>New Password</label>
																<div class="input-group">
                                                                    <input type="password" name="new_password" class="form-control pwd1" placeholder="Enter your new password">
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-dark form-control reveal1" type="button"><i class="fa fa-eye text-light"></i></button>
                                                                    </span>
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-12">
															<div class="form-group">
																<label>Confirm New Password</label>
																<div class="input-group">
                                                                    <input type="password" name="confirm_new_password" class="form-control pwd2" placeholder="Re-enter your new password">
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-dark form-control reveal2" type="button"><i class="fa fa-eye text-light"></i></button>
                                                                    </span>
                                                                </div>
															</div>
														</div>
														<div class="row pb-30">
								
								<div class="col-6">
									<div class="forgot-password"><a href="/sport_office_system/login.php">back to login?</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									   <input class="btn btn-dark btn-lg btn-block" name="new_update" id="new_update" type="submit" value="Change Password">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }

});
$(".reveal1").on('click',function() {
    var $pwd = $(".pwd1");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }

});
$(".reveal2").on('click',function() {
    var $pwd = $(".pwd2");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }

});

</script>
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>