<?php include('includes/header.php')?>
<?php include('../includes/session.php')?>
<?php $get_id = $_GET['edit']; ?>
<?php 
	 if (isset($_GET['delete'])) {
		$sport_code_id = $_GET['delete'];
		$sql = "DELETE FROM tblsportcodes where id = ".$sport_code_id;
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Sport code deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'sport_codes.php'; </script>";
		}
	}
?>

<?php
 if(isset($_POST['edit']))
{
	 $sport_name=$_POST['sport_name'];
	 $trail_date=$_POST['trail_date'];
	 $trail_time =$_POST['trail_time'];
    $result = mysqli_query($conn,"update tblsportcodes set sport_name='$sport_name', trail_date='$trail_date', trail_time='$trail_time' where id = '$get_id' ");
    if ($result) {
     	echo "<script>alert('Record Successfully Updated');</script>";
     	echo "<script type='text/javascript'> document.location = 'sport_codes.php'; </script>";
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

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Sport Code List</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
										<li class="breadcrumb-item active" aria-current="page">Edit Sport Code</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Edit Sport Code</h2>
								<section>
									<?php
									$query = mysqli_query($conn,"SELECT * from tblsportcodes where id = '$get_id'")or die(mysqli_error());
									$row = mysqli_fetch_array($query);
									?>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Sport Code Name</label>
												<input name="sport_name" type="text" class="form-control" required="true" autocomplete="off" value="<?php echo $row['sport_name']; ?>">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label >Sport Code trail date</label>
												<input name="trail_date" type="date" class="form-control" required="true" autocomplete="off" value="<?php echo $row['trail_date']; ?>">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label >Sport Code trail time</label>
												<input name="trail_time" type="time" class="form-control" required="true" autocomplete="off" value="<?php echo $row['trail_time']; ?>">
											</div>
										</div>
									</div>									
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-dark" type="submit" value="UPDATE" name="edit" id="edit">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Sport Code List</h2>
								<div class="pb-20">
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
										<th class="table-plus">#</th>
											<th class="table-plus">SPORT CODE</th>
											<th class="table-plus">TRAIL DATE</th>
											<th class="table-plus">TRAIL TIME</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $sql = "SELECT * from tblsportcodes";
											$query = $dbh -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
											foreach($results as $result)
											{               ?>  

											<tr>
												<td> <?php echo htmlentities($result->id);?></td>
	                                            <td><?php echo htmlentities($result->sport_name);?></td>	
												<td> <?php echo htmlentities($result->trail_date);?></td>
												<td> <?php echo htmlentities($result->trail_time);?></td>                                
												<td>
													<div class="table-actions">
														<a href="sport_codes.php?delete=<?php echo htmlentities($result->id);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
													</div>
												</td>
											</tr>

											<?php $cnt++;} }?>  

										</tbody>
									</table>
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
</body>
</html>