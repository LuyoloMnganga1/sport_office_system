<?php
require('phpmailer/PHPMailer.php');
require('phpmailer/SMTP.php');
require('phpmailer/Exception.php');
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\SMTP;
use  PHPMailer\PHPMailer\Exception;
?>
<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php

$appid =($_GET['appid']);

if(isset($_POST['update']))
{
	$status=$_POST['status'];
	$updated_at=date('Y-m-d H:i:s', time());

	$result = mysqli_query($conn,"update tblapp set status='$status', updated_at='$updated_at' where id='$appid'")or die(mysqli_error());
	if ($result) {
		$query = mysqli_query($conn,"select * from tblapp where id = '$appid' ")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		
		$mail = new PHPMailer;
		$mail->isSMTP();     
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

		$mail->Username = 'zfiglan63@gmail.com';                 // SMTP username
		$mail->Password = 'rajykjhnpdrriora';                           // SMTP password

		$mail->setFrom('zfiglan63@gmail.com','WSU Sport Office');
		$mail->addAddress($row['email'], $row['full_name']); 			// Add a recipient
		$mail->addReplyTo('zfiglan63@gmail.com', 'Admin');

		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Sport Indemnity Responce';
		if($status==1){ //approved
			$mail->Body    = 'Good day'.$row['full_name'].',<br> We will like to infrom you that the will be a trails for <b>'.$row['sport_code'].'</b> on Wednesday next week on WSU Potsdam playground.';
			$mail->AltBody = 'Good day student,<br> We will like to infrom you that the will be a trails for your sport code on Wednesday next week on WSU Potsdam playground.';
		}elseif($status==2){  // rejected
			$mail->Body    = 'Good day'.$row['full_name'].',<br> We are sorry to infrom you that <b>you are not selected</b> to participate for <b>'.$row['sport_code'].'</b> trials taking place on Wednesday next week on WSU Potsdam playground.';
			$mail->AltBody = 'Good day student,<br> We are sorry to infrom you that you are not selected to participate for your sport code trials taking place on Wednesday next week on WSU Potsdam playground.';
		}else{ //pennding
			$mail->Body    = 'Good day'.$row['full_name'].',<br> We will like to infrom you that your status for <b>'.$row['sport_code'].'</b> is still <b>pendding</b>.';
			$mail->AltBody = 'Good day student,<br> We will like to infrom you that your status for your sport code is still <b>pendding</b>.';
		}

		$mail->addAttachment('../vendors/images/logo2.jpg');         //Add attachments
    	$mail->addAttachment('../vendors/images/logo.png');    //Optional name

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {

		}
		$mail->smtpClose();

		echo "<script>alert('Application Status has been Successfully Updated');</script>";
		echo "<script type='text/javascript'> document.location = 'admin_dashboard.php'; </script>";
	} else{
	die(mysqli_error());
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
							<h4>APPLICATION DETAILS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Applications</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Application Details</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- application Tab start -->
										<?php
											$query = mysqli_query($conn,"select * from tblapp where id = '$appid' ")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
										?>
									<div class="tab-pane active height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
													<div class="profile-edit-list row">
														<div class="col-md-12"><h4 class="text-dark h5 mb-20">Update the application status</h4></div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Full Name</label>
															     <div class="input-group">
                                                                    <input type="text" name="full_name" class="form-control" readonly value="<?php echo $row['full_name']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Student Number</label>
																<div class="input-group">
                                                                    <input type="text" name="student_number" class="form-control" readonly value="<?php echo $row['student_number']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Email Address</label>
																<div class="input-group">
                                                                    <input type="email" name="email" class="form-control" readonly value="<?php echo $row['email']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Sport Code </label>
																<div class="input-group">
                                                                    <input type="text" name="sport_code" class="form-control" readonly value="<?php echo $row['sport_code']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Course</label>
																<div class="input-group">
                                                                    <input type="text" name="course" class="form-control" readonly value="<?php echo $row['course']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Studing Address</label>
																<div class="input-group">
                                                                    <input type="text" name="address" class="form-control" readonly value="<?php echo $row['address']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>ID Number</label>
																<div class="input-group">
                                                                    <input type="text" name="id_number" class="form-control" readonly value="<?php echo $row['id_number']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Phone Number</label>
																<div class="input-group">
                                                                    <input type="text" name="phone_number" class="form-control" readonly value="<?php echo $row['phone_number']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Next of Kin Name</label>
																<div class="input-group">
                                                                    <input type="text" name="next_of_kin_name" class="form-control" readonly value="<?php echo $row['next_of_kin_name']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Next of Kin Phone</label>
																<div class="input-group">
                                                                    <input type="text" name="next_of_kin_phone" class="form-control" readonly value="<?php echo $row['next_of_kin_phone']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Medical Condition</label>
																<div class="input-group">
                                                                    <input type="text" name="medical_condition" class="form-control" readonly value="<?php echo $row['medical_condition']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Pertinent information concerning your medical condition</label>
																<div class="input-group">
                                                                    <input type="text" name="medical_details" class="form-control" readonly value="<?php echo $row['medical_details']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Medical Aid Name</label>
																<div class="input-group">
                                                                    <input type="text" name="medical_aid_name" class="form-control" readonly value="<?php echo $row['medical_aid_name']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Medical Aid Number</label>
																<div class="input-group">
                                                                    <input type="text" name="medical_aid_number" class="form-control" readonly value="<?php echo $row['medical_aid_number']; ?>">
                                                                </div>
															</div>
														</div>
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label>Application Submition Date</label>
																<div class="input-group">
                                                                    <input type="text" name="signed_date" class="form-control" readonly value="<?php echo $row['created_at']; ?>">
                                                                </div>
															</div>
														</div>
														<!-- <div class="col-md-6">
															<div class="form-group">
																<label>Signature</label>
																<div class="input-group">
																<img id="sig-image" src="" alt="Your signature will go here!"/>
															 <canvas id="signature-pad" width="400" height="200"><?php echo $row['signature']; ?></canvas>
																</div>
															</div>
														</div> -->
														<div class="weight-500 col-md-6">
															<div class="form-group">
																<label></label>
																<div class="modal-footer justify-content-center">
																	<button class="btn btn-dark" name="new_update" data-toggle="modal" data-target="#exampleModal">Update</button>
																</div>
															</div>
														</div>
								
														
															<!-- Modal -->
															<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<form action="" method="POST">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Update Application Status</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																<div class="form-group">
																	<label for="exampleSelect">Application Status</label>
																	<select class="form-control" id="exampleSelect" name="status" required>
																	<option  selected>select status</option>
																	<option value="1">Approve</option>
																	<option value="2">Reject</option>
																	<option value="0">Pending</option>
																	</select>
																</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" name="update" class="btn btn-dark">Save changes</button>
																</div>
																</form>
																</div>
															</div>
															</div>
														</div>

													</div>
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
	<?php include('includes/scripts.php')?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$( document ).ready(function() {
			var signiture = "<?php echo $row['signature']; ?>";
			// alert(signiture);
			$("#sig-image").attr("src", signiture);
			// sigImage.setAttribute("src", dataUrl);
		
		});
	</script>
</body>
</html>