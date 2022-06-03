<?php session_start(); ?>
 
<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician OFF</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="css/technicianmain.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>

	<script src="https://kit.fontawesome.com/7b6b55bad0.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
</head>

<style>
.dropbtn {
    background-color: #1a0845;
    color: white;
    border-radius: 5px;
    border: none;
    font-size: 17px;
    font-weight: bold;
    letter-spacing: 1px;
    cursor: pointer;
    padding: 7px 7px;
    margin-right: 10px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
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

#off-report {
display:none;  
}

</style>

<body>

<!-- Home Button -->
	<nav class="nav">
	
					  <div class="nav__link nav__link dropdown">
			<i class="material-icons">access_time</i>
			<span class="nav__text">Clock In</span>
			  <div class="dropdown-content">
				  <a href="techresthour.php">Rest Hour</a>
				  <a href="techreportoff.php">Report Off</a>
				</div>
			</div>
	
		<a href="joblistst.php" class="nav__link nav__link">
			<i class="material-icons">list_alt</i>
			<span class="nav__text">Job Listing</span>
		</a>
		
		<a href="pendingjoblistst.php" class="nav__link">
			<i class="material-icons">pending_actions</i>
			<span class="nav__text">Pending</span>
		</a>
		
		<a href="technician.php" class="nav__link">
			<i class="material-icons">home</i>
			<span class="nav__text">Home</span>
		</a>
		
		<a href="completejoblistst.php" class="nav__link">
			<i class="material-icons">check_circle</i>
			<span class="nav__text">Complete</span>
		</a>
		
		<a href="incompletejoblistst.php" class="nav__link">
			<i class="material-icons">do_not_disturb_on</i>
			<span class="nav__text">Incomplete</span>
		</a>
		<a href="logout.php" class="nav__link">
			<i class="material-icons">logout</i>
			<span class="nav__text">Logout</span>
		</a>
	</nav>
<!-- Home Button -->
	
	<div class="column" >
		<div class="container">
			<div class="row justify-content-center">
				<div class="cards">
					<div class="card">
						<!--Technician Availability-->
						<div class="card-body">
							<form action="" method="POST">
								<div class="row">
									<div class="col-md-8">
										<input type="text" name="username" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>" class="form-control">
									</div>
									<div class="col-md-4">
										<button type="submit" class="btn btn-primary">Click</button>
									</div>
								</div>
							</form>
							<div class="row">
								<div class="col-md-12">
									<hr>
									
									<?php
										include 'dbconnect.php';
										
										if(isset($_POST['username']))
											{
												$username = $_POST['username'];
												$query = "SELECT * FROM staff_register WHERE username ='$username'";
												$query_run = mysqli_query($conn, $query);
												if(mysqli_num_rows($query_run) > 0)
											{
												foreach($query_run as $row)
											{
									?>
									
									<form action="" method="post">
										<input type="hidden" name="staffregister_id" class="staffregister_id" value="<?php echo $row['staffregister_id'] ?>">
										<div class="form-group mb-3">
											<label for="">Technician Availability</label>
											<div class="input-box">
												<select id="tech_avai" name="tech_avai" class="form-control" onchange="myFunction()">
												<option value='' <?php if ($row['tech_avai'] == '') {echo "SELECTED";} ?>></option>
												<option value="OFF" <?php if ($row['tech_avai'] == "OFF") {echo "SELECTED";} ?>>OFF</option>
											</select>
										</div>
										<br>
										<div><input type="button" onclick="updateForm();" class="buttonbiru" style="width: fit-content; padding:5px;" value="Update" /></div>
										<p class="control"><b id="message-update"></b></p>
										</div>
									<?php } } } ?>
									</form>
									
									<script type="text/javascript">
										function updateForm()
											{
												var staffregister_id = $('input[name=staffregister_id]').val();
												var tech_avai = $('select[name=tech_avai]').val();
												if(staffregister_id!='' || staffregister_id=='',
												tech_avai!='' || tech_avai=='')
											{
											var formData = {staffregister_id: staffregister_id,
								                                   tech_avai: tech_avai};
																   
																$.ajax({
																	url: "techOFFindex.php",
																	type: 'POST',
																	data: formData,
																	success: function(response)
																	{
																		var res = JSON.parse(response);
																		console.log(res);
																		if(res.success == true)
																		$('#message-update').html('<span style="color: green">Update Saved!</span>');
																		else
																		$('#message-update').html('<span style="color: red">Update Cannot Be Saved</span>');
																	}
																});
															}
														} 
						</script>
    
				<!--Technician Availability-->
				
				<!-- Unavailable Date -->
				
				<form action="" method="post" id="off-report">

				<?php if (isset($_SESSION["username"])) ?>
				<input type="text" name="tech_name" id="tech_name" value="<?php echo $_SESSION["username"] ?>" style="border:none;" readonly hidden>
					
				<div class="form-group mb-3">
					<label for="">Reason</label>
					<div class="input-box">
						<select id="reason" name="reason" class="form-control">
							<option value=""></option>
							<option value="Paid Leave">Paid Leave</option>
							<option value="Unpaid Leave">Unpaid Leave</option>
							<option value="Emergency leave">Emergency leave</option>
							<option value="Sick leave">Sick leave</option>
						</select>
					</div>
				</div>
				<div class="form-group mb-3">
					<label for="">From</label>
					<input type="date" name="date_from" class="form-control">
				</div>
				<div class="form-group mb-3">
					<label for="">To</label>
					<input type="date" name="date_to" class="form-control">
				</div>

				<br>
				
				<div><input type="button" onclick="UnavailableForm();" class="buttonbiru" style="width: fit-content; padding:5px;" value="Update" /></div>
				<p class="control"><b id="message-Unavailable"></b></p>
	
				</form>

				<script type="text/javascript">
					function myFunction() {
						var x = document.getElementById("tech_avai").value;
						if(x == 'OFF'){
							document.getElementById("off-report").style.display = 'block';
						}
						else {
							document.getElementById("off-report").style.display = 'none';
						}
						}
                </script>

				<script type="text/javascript">
							function UnavailableForm()
								{
									var tech_name = $('input[name=tech_name]').val();
									var reason = $('select[name=reason]').val();
									var date_from = $('input[name=date_from]').val();
									var date_to = $('input[name=date_to]').val();
									
									if(tech_name!='' || tech_name=='',
									      reason!='' || reason=='',
									   date_from!='' || date_from=='',
									     date_to!='' || date_to=='')
										 
										 {
											 var formData = {tech_name: tech_name,
												                reason: reason,
												             date_from: date_from,
												               date_to: date_to};
																   
																$.ajax({
																	url: "techunavailableindex.php",
																	type: 'POST',
																	data: formData,
																	success: function(response)
																	{
																		var res = JSON.parse(response);
																		console.log(res);
																		if(res.success == true)
																		$('#message-Unavailable').html('<span style="color: green">You are currently on leave!</span>');
																		else
																		$('#message-Unavailable').html('<span style="color: red">Update Cannot Be Saved</span>');
																	}
																});
															}
														} 
						</script>

				<!-- Unavailable Date -->
						
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>