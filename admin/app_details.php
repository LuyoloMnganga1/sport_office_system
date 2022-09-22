<?php error_reporting(0);?>
<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>

<?php
	$appid=($_GET['appid']);  
	// code for action taken on application
	if(isset($_POST['update']))
	{  
		$full_name=$_POST['full_name'];
		$student_number=$_POST['student_number'];
		$sport_code=$_POST['sport_code'];
		$course=$_POST['course'];
		$address=$_POST['address'];
		$id_number=$_POST['id_number'];
		$phone_number=$_POST['phone_number'];
		$next_of_kin_name=$_POST['next_of_kin_name'];
		$next_of_kin_phone=$_POST['next_of_kin_phone'];
		$medical_condition=$_POST['medical_condition'];
		$medical_details=$_POST['medical_details'];
		$medical_aid_name=$_POST['medical_aid_name'];
		$medical_aid_number=$_POST['medical_aid_number'];
		$signed_date=$_POST['signed_date'];
		$signature=$_POST['signature'];
		$created_at=date('Y-m-d H:i:s', time());
		$updated_at=date('Y-m-d H:i:s', time());
		
				// $result = mysqli_query($conn,"UPDATE tblapp SET id='[value-1]',full_name='[value-2]',student_number='[value-3]',sport_code='[value-4]',course='[value-5]',address='[value-6]',id_number='[value-7]',phone_number='[value-8]',next_of_kin_name='[value-9]',next_of_kin_phone='[value-10]',medical_condition='[value-11]',medical_details='[value-12]',medical_aid_name='[value-13]',medical_aid_number='[value-14]',signed_date='[value-15]',signature='[value-16]',status='[value-17]',created_at='[value-18]',updated_at='[value-19]' WHERE id='$appid'");

				// if ($result) {
			    //  	echo "<script>alert('Leave updated Successfully');</script>";
				// 	} else{
				// 	  die(mysqli_error());
				//    }
		
	}
?>

<style>
	input[type="text"]
	{
	    font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	.btn-outline:hover {
	  color: #fff;
	  background-color: #524d7d;
	  border-color: #524d7d; 
	}

	textarea { 
		font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
	}

	textarea.text_area{
        height: 8em;
        font-size:16px;
	    color: #0f0d1b;
	    font-family: Verdana, Helvetica;
      }

	</style>

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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>APPLICATION DETAILS</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Applications</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Application Details</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<form method="post" action="">

						<?php 
						if(!isset($_GET['appid']) && empty($_GET['appid'])){
							header('Location: admin_dashboard.php');
						}
						else {
						
						$appid=($_GET['appid']);
						$sql = "SELECT * from tblapp where id=:status";
						$query = $dbh -> prepare($sql);
						$query->bindParam(':appid',$appid,PDO::PARAM_STR);
						$query->execute();
						$results=$query->fetchAll(PDO::FETCH_OBJ);
						$cnt=1;
						if($query->rowCount() > 0)
						{
						foreach($results as $result)
						{         
						?>  

						<div class="row">
						<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Name &amp; Surname:</label>
							<input type="text" class="form-control" name="full_name" require="true" placeholder="Enter your name and surname" value="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Student Number:</label>
							<input type="text" class="form-control" name="student_number" require="true" pattern="[0-9]{9}"  placeholder="Enter your student number">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Sport Code:</label>
							<select class="form-select" aria-label="Default select example" name="sport_code" require="true"> 
								<option selected>Select sport code</option>
								<option value="Chess">Chess</option>
								<option value="Table tennis">Table tennis</option>
								<option value="Aerobics">Aerobics</option>
								<option value="Boxing">Boxing</option>
								<option value="Pool">Pool</option>
								<option value="Ultimate Frisbee">Ultimate Frisbee</option>
								<option value="Tennis">Tennis</option>
								<option value="Handball">Handball</option>
								<option value="Softball">Softball</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Instructional Program (Course):</label>
							<input type="text" name="course"  class="form-control"  require="true" placeholder="Enter your course">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Address While Studying:</label>
							<input type="text" name="address"  class="form-control"  require="true" placeholder="Enter your study address">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Identity Number:</label>
							<input type="text" name="id_number"  class="form-control" placeholder="Enter your ID Number" pattern="[0-9]{13}"  require="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Contact Number:</label>
							<input type="text" name="phone_number"  placeholder="Enter your phone number e.g 0811234567" pattern="[0-9]{10}"  class="form-control"  require="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Next of Kin (Name &amp; Surname):</label>
							<input type="text" name="next_of_kin_name"  class="form-control" placeholder="Enter your next of kin full name"  require="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Next of Kin Contact Number:</label>
							<input type="text" name="next_of_kin_phone"  class="form-control" placeholder="Enter your next of kin phone number e.g 0811234567" pattern="[0-9]{10}" require="true">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Medical Condition:</label>
							<input type="text" name="medical_condition"  class="form-control" placeholder="Enter your medical condition">
						</div>
					</div>
					<p><br></p>
					<p class="mt-2">Any pertinent information concerning your medical condition?</p>
					<div class="col-lg-7">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">if so please give details:</label>
							<input type="text" name="medical_details"  class="form-control" placeholder="Enter your details">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Medical Aid Name:</label>
							<input type="text" name="medical_aid_name"  class="form-control" placeholder="Enter your medical aid name">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="inputPassword6" class="col-form-label">Medical Aid Number:</label>
							<input type="text" name="medical_aid_number"  class="form-control" placeholder="Enter your medical aid number e.g 0811234567" pattern="[0-9]{10}">
						</div>
					</div>
					<p><br></p>              
					<p>I hereby concert to my participation in all games and tournaments tours, trips, sporting excursions arranged by WSU and /or conducted under its authority.</p><br>
					<p>Whilst it is recognized that this institution will take every precaution to ensure the safety and well-being of its students. I hereby indemnify and hold blameless this institution, its staff, and other agents against all claims which may arise in consequence of death of or any injury sustained by myself during the course of such sporting event, from whatsoever nature attributed to this institution, save that liability shall not be excluded under indemnity for loss occasioned by a deliberate act of wilful misconduct attributed to the University.</p>
				   <br>
					<p>I the event of me being injured I hereby authorize the University, its staff, and other agents to procure such medical treatment/surgery as may its/their absolute discretion be deemed necessary. I undertake to indemnity the University, its staff, and other agents from all medical and hospital costs occasioned thereby.</p>
					<p><br></p>   
					</div>
					<div class="row g-3 align-items-center">
					<div class="col-auto">
						<label for="inputPassword6" class="col-form-label">Signed at East London, on :</label>
					</div>
					<div class="col-auto">
						<input type="datetime-local" name="signed_date" require="true" class="form-control" aria-describedby="passwordHelpInline">
					</div>
					<p><br></p>
					<div class="col-auto">
						<label for="inputPassword6" class="col-form-label">Signature:</label>
					</div>
					<input type="hidden" name="signature" id="signature">
					<div class="col-auto">
							<div class="flex-row">
								<div class="wrapper">
									<canvas id="signature-pad" width="400" height="200"></canvas>
								</div>
								<div class="clear-btn">
									<button id="clear"><span> Clear </span></button>
								</div>
							</div>
					</div>
							
							<form name="adminaction" method="post">
  								<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body text-center font-18">
												<h4 class="mb-20">Leave take action</h4>
												<select name="status" required class="custom-select form-control">
													<option value="">Choose your option</option>
				                                          <option value="1">Approved</option>
				                                          <option value="2">Rejected</option>
												</select>

												<div class="form-group">
													<label></label>
													<textarea id="textarea1" name="description" class="form-control" required placeholder="Description" length="300" maxlength="300"></textarea>
												</div>
											</div>
											<div class="modal-footer justify-content-center">
												<input type="submit" class="btn btn-primary" name="update" value="Submit">
											</div>
										</div>
									</div>
								</div>
  							</form>

							<?php }?>
						</div>

						<?php $cnt++;} } ?>
					</form>
				</div>

			</div>
			
			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<?php include('includes/scripts.php')?>
</body>
</html>