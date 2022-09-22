<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php
if(isset($_POST['new_update']))
{
	$empid=$session_id;
	$current_password=md5($_POST['current_password']);
	$new_password=md5($_POST['new_password']);   
	$confirm_new_password=md5($_POST['confirm_new_password']);  
    
    $sql ="SELECT * FROM tblemployees where emp_id ='$empid' AND Password ='$current_password'";
	$query= mysqli_query($conn, $sql);
	$count = mysqli_num_rows($query);
	if($count <= 0)
	{
        echo "<script>alert('Your current password is invalid');</script>";
    }else if($new_password !== $confirm_new_password){
        echo "<script>alert('New password and confirm password do not match');</script>";
    }else{

    $result = mysqli_query($conn,"update tblemployees set Password='$new_password' where emp_id='$empid'         
		")or die(mysqli_error());
        if ($result) {
            echo "<script>alert('Your password has been Successfully Updated');</script>";
            echo "<script type='text/javascript'> document.location = 'change_password.php'; </script>";
        } else{
        die(mysqli_error());
    }
    }
}

?>

<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../vendors/images/logo.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<?php include('includes/navbar.php')?>

<?php include('includes/right_sidebar.php')?> 
	<?php include('includes/left_sidebar.php')?>

	<div class="mobile-menu-overlay"></div>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Update  Password</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">password</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Password</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- password Tab start -->
										<div class="tab-pane active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form method="POST" enctype="multipart/form-data">
													<div class="profile-edit-list row">
														<div class="col-md-12"><h4 class="text-blue h5 mb-20">change your password</h4></div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Current Password</label>
															     <div class="input-group">
                                                                    <input type="password" name="current_password" class="form-control pwd" placeholder="Enter your current password">
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-dark form-control reveal" type="button"><i class="fa fa-eye text-light"></i></button>
                                                                    </span>
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
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
														<div class="weight-500 col-md-6">
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
													
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label></label>
																<div class="modal-footer justify-content-center">
																	<button class="btn btn-primary" name="new_update" id="new_update" data-toggle="modal">Save & &nbsp;Update</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
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
	<?php include('includes/scripts.php')?>
</body>
</html>