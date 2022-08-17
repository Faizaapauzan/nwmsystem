<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['staff_position']=="" AND $_SESSION['technician_rank']=="" ){
		header("location:index.php?error");
	}
	
	if(!isset($_SESSION['username']))
	{
		header("location:index.php?error");
	}
	
	elseif($_SESSION['staff_position']== 'Technician')
	{

	}
	
	else
	{
		header("location:index.php?error");
	}
?>

<!DOCTYPE html>

<html>

<head>
	<meta name="keywords" content=""/>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Technician</title>
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="css/technicianmain.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

	<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>

<style>

.dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  padding-right: 7px;
}

.dropdown-content1 a:hover {background-color: #f1f1f1}

.dropdown1:hover .dropdown-content1 {
  display: block;
}

.dropdown1:hover .dropbtn1 {
  color:#1565c0;
}

.dropbtn1{
	border:none
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: auto;
  padding-left: 20px;
  bottom: 55px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  padding-right: 7px;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  color:whitesmoke;
}

#notYetStatus{
	position: static;
}

.card-complete{
	position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1pxsolidrgba(0,0,0,.125);
    border-radius: 0.25rem;	
}

/* Main Feature */
.navbar {
  margin-top: 20px;
  background-color: #ddd;
  overflow: hidden;
  max-height: 1800px;
  -webkit-transition: max-height 0.3s; 
  -moz-transition: max-height 0.3s; 
  -ms-transition: max-height 0.3s; 
  -o-transition: max-height 0.3s; 
  transition: max-height 0.3s;
}

/* Other */
 
.navbar-toggle {
  background-color: #D2D2CF;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  font-weight: bold;
}

.nav {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

</style>

<body>
	
	<nav class="navbar1">
		<div class="wrapper">
			<ul class="main-nav" id="js-menu">
				<div class="dropdown1">
					<a class="nav1-links"><i class="iconify" data-icon="mdi:calendar-clock" style="font-size:37px;"></i></a>
					<div class="dropdown-content1">
						<a href="techattendance.php">Attendance</a>
						<a href="techresthour.php">Rest Hour</a>
						<a href="techreportoff.php">Report Off</a>
					</div>
				</div>
			</ul>
			<div class="ul2">
				<a href="logout.php" class="nav1-links"><i class="iconify" data-icon="icon-park:logout" style="font-size:32px;"></i></a>
			</div>
		</div>
	</nav>
	
	<nav class="nav">
		<div class="nav__link nav__link dropdown">
			<i class="material-icons">list_alt</i>
			<span class="nav__text">Job Listing</span>
			<div class="dropdown-content">
				<a href="assignedjob.php">Assigned Job</a>
				<a href="unassignedjob.php">Unassigned Job</a>
			</div>
		</div>
		
		<a href="pendingjoblistst.php" class="nav__link">
			<i class="material-icons">pending_actions</i>
			<span class="nav__text">Pending</span>
		</a>
		
		<a href="technician.php" class="nav__link">
			<i class="material-icons">home</i>
			<span class="nav__text">Home</span>
		</a>
		
		<a href="incompletejoblistst.php" class="nav__link">
			<i class="material-icons">do_not_disturb_on</i>
			<span class="nav__text">Incomplete</span>
		</a>
		
		<a href="completejoblistst.php" class="nav__link">
			<i class="material-icons">check_circle</i>
			<span class="nav__text">Complete</span>
		</a>
	</nav>
	
	<!--TODO-->
		<div class="container">
			<div style="text-align: center; font-size: 35px; font-weight: bold;" class="welcome">Welcome <?php echo $_SESSION['username'] ?>!</div>
			<div class="column" >
				<p class="column-title"id="doing" >Todo</p>
					<?php
						include 'dbconnect.php';
						
						$query = "SELECT * FROM job_register
						WHERE
						job_assign ='{$_SESSION['username']}' AND  job_status = '' AND job_cancel = ''
						OR
						job_assign ='{$_SESSION['username']}' AND  job_status = 'Incomplete' AND job_cancel = ''
						OR
						job_assign ='{$_SESSION['username']}' AND  job_status = 'Ready' AND job_cancel = ''
						ORDER BY jobregisterlastmodify_at
						DESC LIMIT 50";
						$result = mysqli_query($conn, $query);
						
						$customer_name = '';
						while ($row = mysqli_fetch_assoc($result)) {
							// only show artist when it's an other artist then the previous one
							if ($row['customer_name'] != $customer_name){
								echo "<div class='cardupdate' data-idupdate='".$row['customer_name']."' data-toggle='modal' data-target='#myModalupdate'>
										<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>
									  </div>";
								$customer_name = $row['customer_name'];
							}
							    echo "<nav id='mainNav'>
								      <div class='cards'>
									  <div class='card' id='notYetStatus' data-id='".$row['jobregister_id']."' data-toggle='modal' data-target='#myModal'>
									  <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
									  	<!-- Modal-->
										<ul class='b' id='draged'>
											<strong text-align='center'>".$row['job_priority']."</strong>
											<li>".$row['job_order_number']."</li>
											<li>".$row['job_description']."</li>
											<li>".$row['machine_name']."</li>
											<li>".$row['machine_type']."</li>
											<li>".$row['serialnumber']."</li>
											<p style='color:red;'>".$row['reason']."</p>
										</ul>
										<div class='status'  id='incompleteStatus'>
											".$row['job_status']."
										</div>
										</div>
										</div>
									  </nav>";
						}
					?>
					
			</div>
				
	<!--DOING-->				
				
			<div class="column">
				<p class="column-title"id="doing">Doing</p>
					<?php
						include 'dbconnect.php';
						
						$query = "SELECT * FROM job_register
						WHERE
						job_assign ='{$_SESSION['username']}' AND  job_status = 'Doing' AND job_cancel = ''
						ORDER BY jobregisterlastmodify_at
						DESC LIMIT 50";
						$result = mysqli_query($conn, $query);
						
						$customer_name = '';
						while ($row = mysqli_fetch_assoc($result)) {
							// only show artist when it's an other artist then the previous one
							if ($row['customer_name'] != $customer_name){
								echo "<div class='cardupdate' data-idupdate='".$row['customer_name']."' data-toggle='modal' data-target='#myModalupdate'>
										<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>
									  </div>";
								$customer_name = $row['customer_name'];
							}
							
								echo "<nav id='mainNav'>
									  <div class='cards'>
									  <div class='card' id='notYetStatus' data-id='".$row['customer_name']."'  data-toggle='modal' data-target='#myModal'>
									  <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
									  	<!-- Modal-->
										<ul class='b' id='draged'>
											<strong text-align='center'>".$row['job_priority']."</strong>
											<li>".$row['job_order_number']."</li>
											<li>".$row['job_description']."</li>
											<li>".$row['machine_name']."</li>
											<li>".$row['machine_type']."</li>
											<li>".$row['serialnumber']."</li>
										</ul>
										<div class='status'  id='doingStatus'>
											".$row['job_status']."
										</div>
									  </div>
									  </div>
									  </nav>";
						}
					?>
			</div>
			
	<!--PENDING-->

			<div class="column">
				<p class="column-title"id="pending" >Pending</p>
					<?php
						include 'dbconnect.php';
						
						$query = "SELECT * FROM job_register
						WHERE
						job_assign ='{$_SESSION['username']}' AND  job_status = 'Pending'
						ORDER BY jobregisterlastmodify_at
						DESC LIMIT 50";
						$result = mysqli_query($conn, $query);
						
						$customer_name = '';
						while ($row = mysqli_fetch_assoc($result)) {
							// only show artist when it's an other artist then the previous one
							if ($row['customer_name'] != $customer_name){
								echo "<div class='cardupdate' data-idupdate='".$row['customer_name']."' data-toggle='modal' data-target='#myModalupdate'>
										<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>
									  </div>";
								$customer_name = $row['customer_name'];
							}						
								echo "<nav id='mainNav'>
								      <div class='cards'>
									  <div class='card' id='notYetStatus' data-id='".$row['jobregister_id']."' data-toggle='modal' data-target='#myModal'>
									  <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
									  	<!-- Modal-->
										<ul class='b' id='draged'>
											<strong text-align='center'>".$row['job_priority']."</strong>
											<li>".$row['job_order_number']."</li>
											<li>".$row['job_description']."</li>
											<li>".$row['machine_name']."</li>
											<li>".$row['machine_type']."</li>
											<li>".$row['serialnumber']."</li>
											<p style='color:red;'>".$row['reason']."</p>
										</ul>
										<div class='status'  id='pendingStatus'>
											".$row['job_status']."
										</div>
									  </div>
									  </div>
									  </nav>";
						}
					?>
			</div>
			
			<!-- Update Modal -->
			<div id="myModalupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
				<div role="document" class="modal-dialog">
					<div style="padding-bottom: 26px;" class="modal-content">
					<div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
						<div class="tabs" id="tab02">
							<h6 class="text-muted">Update</h6>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" style="font-size:20px;"></i></button>
						<!--TOP BAR-->
						<div class="line">

						</div>
						
						<br>
						
						<div class="modal-body p-0">
							<fieldset class="show" id="tab021">
								<form action="ajaxtechupdate.php" method="post">
									<div class="techupdate-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.cardupdate').click(function() {
											var customer_name = $(this).data('idupdate');
											// AJAX request
											$.ajax({
												url:'ajaxtechupdate.php',
												type:'post',
												data:{customer_name: customer_name},
												success: function(response) {
													// Add response in Modal body
													$('.techupdate-details').html(response);
													// Display Modal
													$('#myModalupdate').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
						</div>
					</div>
					</div>
				</div>
			</div>
			
			<!-- Job info modal -->
			<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
				<div role="document" class="modal-dialog">
					<div style="padding-bottom: 26px;" class="modal-content">
					<div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
						<div class="tabs active" id="tab01">
							<h6 class="font-weight-bold">Job Info</h6>
						</div>
						
						<div class="tabs" id="tab03">
							<h6 class="text-muted">Job Assign</h6>
						</div>
						
						<div class="tabs" id="tab04">
							<h6 class="text-muted">Accessories</h6>
						</div>
						
						<div class="tabs" id="tab05">
							<h6 class="text-muted">Photo</h6>
						</div>
						
						<div class="tabs" id="tab06">
							<h6 class="text-muted">Video</h6>
						</div>
						
						<div class="tabs" id="tab07">
							<h6 class="text-muted">Job Status</h6>
						</div>
						
						<div class="tabs" id="tab08">
							<h6 class="text-muted">Report</h6>
						</div>
						
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" style="font-size:20px;"></i></button>
						
						<!--TOP BAR-->
						<div class="line">

						</div>
						
						<div class="line"></div>
							<br>
						<div class="modal-body p-0">
							<!--JOB INFO-->
							<fieldset class="show" id="tab011">
								<form action="" method="post">
									<div class="tech-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url: 'ajaxtechnician.php',
												type: 'post',
												data: {jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.tech-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
							
							<!--Job assign-->
							
							<fieldset id="tab031">
								<form action="jobassignnd.php" method="post">
									<div class="remark-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url:'jobassignnd.php',
												type:'post',
												data: {jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.remark-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
							
							<!--ACCESSORIES-->
							
							<fieldset id="tab041">
								<form action="ajaxtabaccessoriestech.php" method="post">
									<div class="acc-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url: 'ajaxtabaccessoriestech.php',
												type: 'post',
												data: {jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.acc-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
							
							<!--PHOTOS-->
							
							<fieldset id="tab051">
								<form action="ajaxtechnicianphoto.php" method="post">
									<div class="photo-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url:'ajaxtechnicianphoto.php',
												type:'post',
												data:{jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.photo-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
							
							<!--Video-->
							
							<fieldset id="tab061">
								<form action="ajaxtechnicianvideo.php" method="post">
									<div class="video-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url:'ajaxtechnicianvideo.php',
												type:'post',
												data: {jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.video-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
							
							<!--JOB STATUS-->
							
							<fieldset id="tab071">
								<form action="ajaxtechjobstatus.php" method="post">
									<div class="techjobstatus-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url: 'ajaxtechjobstatus.php',
												type: 'post',
												data: {jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.techjobstatus-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>

							</fieldset>
							
							<!--REPORT-->
							
							<fieldset id="tab081">
								<form action="ajaxreport.php" method="post">
									<div class="report-details">

									</div>
								</form>
								
								<script type='text/javascript'>
									$(document).ready(function() {
										$('.card').click(function() {
											var jobregister_id = $(this).data('id');
											// AJAX request
											$.ajax({
												url: 'ajaxreport.php',
												type: 'post',
												data: {jobregister_id: jobregister_id},
												success: function(response) {
													// Add response in Modal body
													$('.report-details').html(response);
													// Display Modal
													$('#myModal').modal('show');
												}
											});
										});
									});
								</script>
								
							</fieldset>
						</div>
					</div>
					</div>
				</div>
			</div>
			
	<!-- Completed Job -->
	
			<div class="column">
				<p class="column-title"id="done">Completed</p>
					<?php
						include 'dbconnect.php';
						
						$query = "SELECT * FROM job_register
						WHERE job_assign ='{$_SESSION['username']}' AND  job_status = 'Completed'
						ORDER BY jobregisterlastmodify_at DESC LIMIT 50";
						$result = mysqli_query($conn, $query);
						
						$customer_name = '';
						while ($row = mysqli_fetch_assoc($result)) {
							// only show artist when it's an other artist then the previous one
							if ($row['customer_name'] != $customer_name){
								echo "<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>";
								$customer_name = $row['customer_name'];
							}
							
								echo "<nav id='mainNav'>
									  <div class='cards'>
									  <div class='card-complete' id='notYetStatus' data-id-complete='".$row['jobregister_id']."' data-toggle='modal' data-target='#myModal-completed'>
									  <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
									  	<!-- Modal-->
										<ul class='b' id='draged'>
											<strong text-align='center'>".$row['job_priority']."</strong>
											<li>".$row['job_order_number']."</li>
											<li>".$row['job_description']."</li>
											<li>".$row['machine_name']."</li>
											<li>".$row['machine_type']."</li>
											<li>".$row['serialnumber']."</li>
										</ul>
									  <div class='status'  id='completedStatus'>
									  	".$row['job_status']."
									  </div>
									  </div>
									  </div>
									  </nav>";
						}
					?>
			</div>
		</div>
	
			<!-- Completed modal -->
			<div id="myModal-completed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
				<div role="document" class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
							<div class="tabs active" id="tab11">
								<h6 class="font-weight-bold">Job Info</h6>
							</div>
							<div class="tabs" id="tab13">
								<h6 class="text-muted">Job Assign</h6>
							</div>
							<div class="tabs" id="tab12">
								<h6 class="text-muted">Update</h6>
							</div>
							<div class="tabs" id="tab14">
								<h6 class="text-muted">Accessories</h6>
							</div>
							<div class="tabs" id="tab15">
								<h6 class="text-muted">Photo</h6>
							</div>
							<div class="tabs" id="tab16">
								<h6 class="text-muted">Video</h6>
							</div>
							<div class="tabs" id="tab17">
								<h6 class="text-muted">Job Status</h6>
							</div>
							<div class="tabs" id="tab18">
								<h6 class="text-muted">Report</h6>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							
							<!--TOP BAR-->
							<div class="line"></div>
							
							<br>
							
							<div class="modal-body p-0">

								<!--Job Info Completed-->

								<fieldset class="show" id="tab111">
									<form action="" method="post">
										<div class="tech-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url: 'ajaxtechnician.php',
													type: 'post',
													data: {jobregister_id: jobregister_id},
													success: function(response) {
														$('.tech-details-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Job assign-->
								
								<fieldset id="tab131">
									<form action="jobassignst-completed.php" method="post">
										<div class="techupdate-assign-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url:'jobassignst-completed.php',
													type:'post',
													data:{jobregister_id: jobregister_id},
													success: function(response) {
														$('.techupdate-assign-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Update Completed-->
								
								<fieldset id="tab121">
									<form action="ajaxtechupdate-completed.php" method="post">
										<div class="techupdate-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url:'ajaxtechupdate-completed.php',
													type:'post',
													data:{jobregister_id: jobregister_id},
													success: function(response) {
														$('.techupdate-details-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Accessories Completed-->
								
								<fieldset id="tab141">
									<form action="ajaxtabaccessoriestech-completed.php" method="post">
										<div class="acc-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url:'ajaxtabaccessoriestech-completed.php',
													type:'post',
													data: {jobregister_id: jobregister_id},
													success: function(response) {
														// Add response in Modal body
														$('.acc-details-completed').html(response);
														// Display Modal
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Photos Completed-->
								
								<fieldset id="tab151">
									<form action="ajaxtechnicianphoto-completed.php" method="post">
										<div class="photo-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url:'ajaxtechnicianphoto-completed.php',
													type:'post',
													data:{jobregister_id: jobregister_id},
													success: function(response) {
														$('.photo-details-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Video Completed-->
								
								<fieldset id="tab161">
									<form action="ajaxtechnicianvideo-completed.php" method="post">
										<div class="video-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url: 'ajaxtechnicianvideo-completed.php',
													type: 'post',
													data: {jobregister_id: jobregister_id},
													success: function(response) {
														$('.video-details-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Job Status Completed-->
								
								<fieldset id="tab171">
									<form action="ajaxtechjobstatus-completed.php" method="post">
										<div class="techjobstatus-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url: 'ajaxtechjobstatus-completed.php',
													type: 'post',
													data: {jobregister_id: jobregister_id},
													success: function(response) {
														$('.techjobstatus-details-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
								
								<!--Report Completed-->
								
								<fieldset id="tab181">
									<form action="ajaxreport.php" method="post">
										<div class="report-details-completed">

										</div>
									</form>
									
									<script type='text/javascript'>
										$(document).ready(function() {
											$('.card-complete').click(function() {
												var jobregister_id = $(this).data('id-complete');
												$.ajax({
													url:'ajaxreport.php',
													type:'post',
													data:{jobregister_id: jobregister_id},
													success: function(response) {
														$('.report-details-completed').html(response);
														$('#myModal-completed').modal('show');
													}
												});
											});
										});
									</script>
									
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Completed Job -->
</body>
</html>