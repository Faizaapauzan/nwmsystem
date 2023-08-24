<?php
	
	session_start();
    
    date_default_timezone_set("Asia/Kuala_Lumpur");

    $showDate = date("d-m-Y");
    $_SESSION["storeDate"] = $showDate;

    $RestTime = date("g:i A");
    $_SESSION["resttime"] = $RestTime;

    $TimeStamp = date('H:i:s');
    $_SESSION['timestamp'] = $TimeStamp;

?>

<!DOCTYPE html>
	<html lang="en">
		<body>
			<!-- To show travel time and rest hour -->
			<?php
				
				include "dbconnect.php";
				
				if (isset($_POST["jobregister_id"])) {
					$jobregister_id = $_POST["jobregister_id"];
					
					$query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
					$query_run = mysqli_query($conn, $query);
					
					if ($query_run) {
						while ($row = mysqli_fetch_array($query_run)) { 
			?>
			
			<input type="hidden" name="jobregister_id" value="<?php echo $row["jobregister_id"]; ?>">
			
			<?php } } } ?>
			
			<!-- To update travel time and rest hour -->
			<?php
				
				include "dbconnect.php";
				
				if (isset($_POST["jobregister_id"])) {
					$jobregister_id = $_POST["jobregister_id"];
					
					$query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
					$query_run = mysqli_query($conn, $query);
					
					if ($query_run) {
						while ($row = mysqli_fetch_array($query_run)) { 
        	?>
			
			<form action="" id="formStatusComplete" method="post">
				
				<input type="hidden" name="jobregister_id" value="<?php echo $row["jobregister_id"]; ?>">
				
				<!-- Departure Time -->
				<div class="input-group mb-3">
					<label for="Departure" class="form-label">Departure Time</label>
					
					<div class="input-group">
						<input type="text" id="Departure" name="technician_departure" value="<?php echo $row["technician_departure"]; ?>" class="form-control">
						<button type="button" id="status" class="btn btn-outline-primary" style="background-color: #1a0845; color: white; border:none; width:100px;" onclick="doSomething();">Departure</button>
					</div>
					
					<input type="hidden" name="DateAssign" value="<?php echo $_SESSION['storeDate'] ?>">
					<input type="hidden" name="departure_timestamp" value="<?php echo $_SESSION["timestamp"] ?>">

					<script type="text/javascript">
						function doSomething() {
								$.ajax({
									url: "departureTime.php",
									
									success: function(result) {
										$("#Departure").val(result);
									}
								})
							}
					</script>
						
					<!-- Insert Assign Date and Departure timestamp -->
					<script>
						$(document).ready(function () {
							$('#status').click(function () {
								var data = $('#formStatusComplete').serialize() + '&status=status';
								
								$.ajax({
									url: 'assigndateAdminCompleted.php',
									type: 'post',
									data: data,
									
									success: function(response) {
										var res = JSON.parse(response);
										console.log(res);
									}
								});
							});
						});
                    </script>
				</div>
				
				<!-- Time at site -->
				<div class="input-group mb-3">
					<label for="Arrival" class="form-label">Time at site</label>
					<div class="input-group">
						<input type="text" name="technician_arrival" id="arrival" value="<?php echo $row["technician_arrival"]; ?>" class="form-control">
						<button type="button" class="btn btn-outline-primary" style="background-color: #1a0845; color: white; border:none; width:100px;" onclick="test2()">Arrival</button>
					</div>
					
					<input type="hidden" name="DateAssign" value="<?php echo $_SESSION["storeDate"]; ?>">
					
					<script>
						function test2() {
							$.ajax({
								url: "departureTime.php",
								
								success: function(result) {
									$("#arrival").val(result);
								}
							})
						}
					</script>
				</div>
				
				<!-- Return Time -->
				<div class="input-group mb-3">
					<label for="Return" class="form-label">Return Time</label>
					<div class="input-group">
						<input type="text" name="technician_leaving" id="leaving" value="<?php echo $row["technician_leaving"]; ?>" class="form-control">
						<button type="button" id="status" class="btn btn-outline-primary" style="background-color: #1a0845; color: white; border:none; width:100px;" onclick="test3()">Return</button>
					</div>
					
					<script type="text/javascript">
						function test3() {
							$.ajax({
								url: "departureTime.php",
								
								success: function(result) {
									$("#leaving").val(result);
								}
							})
						}
					</script>
				</div>
				
				<!-- Rest Hour -->
				<div class="d-grid gap-2">
					<label for="" class="form-label">Rest Time</label>
					<!-- Rest Hour Out -->
					<div class="input-group">
						<input type="text" name="tech_out" id="tech_out" value="<?php echo $row["tech_out"]; ?>" class="form-control">
						<button type="button" id="status" class="btn btn-outline-primary" style="background-color: #1a0845; color: white; border:none; width:100px;" onclick="tech_outs(); RestOutA();">OUT</button>
					</div>
					
					<input type="hidden" name="techupdate_date" id="techupdate_date" value="<?php echo $_SESSION["storeDate"]; ?>">
					<input type="hidden" name="job_assign" value="<?php echo $row["job_assign"]; ?>">
					<input type="hidden" name="today_date" value="<?php echo $_SESSION["storeDate"]; ?>">
					<input type="hidden" name=" technician_out" value="<?php echo $_SESSION["resttime"]; ?>">
					
					<script type="text/javascript">
						function tech_outs() {
							$.ajax({
								url: "techresthourtime.php",
								
								success: function(result) {
									$("#tech_out").val(result);
								}
							})
						}
						
						function RestOutA() {
							var technician_out = $('input[name=technician_out]').val();
							var tech_leader = $('input[name=job_assign]').val();
							var techupdate_date = $('input[name=techupdate_date]').val();
							
							if (technician_out != '' || technician_out == '',
							    tech_leader != '' || tech_leader == '',
								techupdate_date != '' || techupdate_date == '') {
								
								var formData = {
									technician_out: technician_out,
									tech_leader: tech_leader,
									techupdate_date: techupdate_date
								};
								
								$.ajax({
									url: "techoutupdate2.php",
									type: 'POST',
									data: formData,
									
									success: function(response) {
										var res = JSON.parse(response);
										console.log(res);
									}
								});
							}
						}
					</script>
					
					<!-- Rest Hour In -->
					<div class="input-group">
						<input type="text" name="tech_in" id="tech_in" value="<?= $row["tech_in"] ?>" class="form-control">
						<button type="button" id="status" class="btn btn-outline-primary" style="background-color: #1a0845; color: white; border:none; width:100px;" onclick="tech_ins(); RestInA();">IN</button>
					</div>
					
					<input type="hidden" name="technician_in" value="<?php echo $_SESSION["resttime"]; ?>">
					<input type="hidden" name="job_assign" value="<?php echo $row["job_assign"]; ?>">
					<input type="hidden" name="techupdate_date" id="techupdate_date" value="<?php echo $_SESSION["storeDate"]; ?>">
					
					<script type="text/javascript">
						function tech_ins() {
							$.ajax({
								url: "techresthourtime.php",
								
								success: function(result) {
									$("#tech_in").val(result);
								}
							})
						}
						
						function RestInA() {
							var technician_in = $('input[name=technician_in]').val();
							var tech_leader = $('input[name=job_assign]').val();
							var techupdate_date = $('input[name=techupdate_date]').val();
							
							if (technician_in != '' || technician_in == '', 
								tech_leader != '' || tech_leader == '', 
								techupdate_date != '' || techupdate_date == '') {
				
								var formData = {
									technician_in: technician_in,
									tech_leader: tech_leader,
									techupdate_date: techupdate_date
								};
								
								$.ajax({
									url: "techinupdate2.php",
									type: 'POST',
									data: formData,
									
									success: function(response) {
										var res = JSON.parse(response);
										console.log(res);
									}
								});
							}
						}
					</script>
				</div>
				
				<p class="control"><b id="techupdateAdminComplete"></b></p>
				
				<div class="d-grid d-md-flex justify-content-md-end">
					<input type="hidden" name="jobregister_id" value="<?php echo $row["jobregister_id"]; ?>">
					<button type="button" id="update_timeComplete" name="update_time" class="btn btn-primary" style="background-color: #1a0845; color: white; border:none; width:100px;">Update</button>
				</div>
			</form>

			<script>
				$(document).ready(function() {
					$('#update_timeComplete').click(function() {
						var data = $('#formStatusComplete').serialize() + '&update_time=update_timeComplete';
						
						$.ajax({
							url: 'jobupdate.php',
							type: 'post',
							data: data,
							
							success: function(response) {
								var res = JSON.parse(response);
								console.log(res);
								if (res.success == true) 
									$('#techupdateAdminComplete').html('<span style="color: green">Update Saved!</span>');
								else 
									$('#techupdateAdminComplete').html('<span style="color: red">Data Cannot Be Saved</span>');
							}
						});
					});
				});
			</script>
			<?php } } } ?>
		</body>
	</html>