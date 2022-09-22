<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php 
	 if (isset($_GET['delete'])) {
		$appid = $_GET['delete'];
		$sql = "DELETE FROM tblapp where id = ".$appid;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Application deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'app.php'; </script>";
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

	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="page-header">
				<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Application Portal</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">All Application</li>
								</ol>
							</nav>
						</div>
				</div>
			</div>

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL INDEMNITY APPLICATIONS</h2>
					</div>
				<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
							<th class="table-plus datatable-nosort">#</th>
								<th>FULL NAME</th>
								<th>STUDENT NUMBER</th>
								<th>APPLIED DATE</th>
								<th>SPORT CODE</th>
								<th>COURSE</th>
								<th>ADDRESS</th>
								<th>STATUS</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<tr>

								<?php 
								$status=1;
								$sql = "SELECT * from tblapp order by created_at desc limit 5";
									$query = mysqli_query($conn, $sql) or die(mysqli_error());
									$cnt=1;
									while ($row = mysqli_fetch_array($query)) {
									
								 ?> 
								<td>
								<div class="name-avatar d-flex align-items-center">
										<div class="txt mr-2 flex-shrink-0">
											<b><?php echo htmlentities($cnt);?></b>
										</div>
									</div>
								</td>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="txt">
											<div class="weight-600"><?php echo $row['full_name'];?></div>
										</div>
									</div>
								</td>
								<td><?php echo $row['student_number']; ?></td>
								<td><?php echo $row['created_at']; ?></td>
	                            <td><?php echo $row['sport_code']; ?></td>
								<td><?php echo $row['course']; ?></td>
								<td><?php echo $row['address']; ?></td>
								<td><?php $stats=$row['status'];
	                             if($stats==1){
	                              ?>
	                                  <span style="color: green">Approved</span>
	                                  <?php } if($stats==2)  { ?>
	                                 <span style="color: red">Rejected</span>
	                                  <?php } if($stats==0)  { ?>
	                             <span style="color: blue">Pending</span>
	                             <?php } ?>
	                            </td>
								<td>
									<div class="dropdown">
										<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="dw dw-more"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
											<a class="dropdown-item" href="app_details.php?appid=<?php echo $row['id']; ?>"><i class="dw dw-eye"></i> View</a>
											<a class="dropdown-item" href="admin_dashboard.php?delete=<?php echo $row['id']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php $cnt++; }?>
						</tbody>
					</table>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>
	<!-- js -->

	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="../src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="../src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

	<!-- buttons for Export datatable -->
	<script src="../src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="../src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="../src/plugins/datatables/js/vfs_fonts.js"></script>
	
	<script src="../vendors/scripts/datatable-setting.js"></script></body>
</body>
</html>