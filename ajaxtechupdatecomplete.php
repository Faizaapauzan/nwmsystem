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

<!doctype html>
<html lang=en>

	<head>
        <meta charset="utf-8" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Job Update</title>
        <link href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" rel="icon" type="image/x-icon">
		<link href="css/technicianmain.css" rel="stylesheet" />
		<link href="main.css" rel="stylesheet" />
        <link href="css/ajaxtechupdate.css" rel="stylesheet" />
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="js/testing.js" type="text/javascript"></script>
	</head>

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
			<div class="input-box-departure">
				<label for="">Departure Time</label>
				<div class="technician-time">
					<input type="text" class="technician_departure" id="Departure" name="technician_departure" value="<?php echo $row["technician_departure"]; ?>">
                    <input type="hidden" name="DateAssign" value="<?php echo $_SESSION['storeDate'] ?>">
                    <input type="hidden" name="departure_timestamp" value="<?php echo $_SESSION["timestamp"] ?>">
					<input type="button" id="status" value="Departure" onclick="doSomething();">

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
                                    success: function(response)
                                    {
                                        var res = JSON.parse(response);
                                        console.log(res);
                                    }
                                });
                            });
                        });
                    </script>

				</div>
			</div>

			<!-- Time at site -->
			<div class="input-box-arrival">
				<label for="">Time at site</label>
				<div class="technician-time">
					<input type="text" class="technician_arrival" name="technician_arrival" id="arrival" value="<?php echo $row["technician_arrival"]; ?>">
					<input type="hidden" name="DateAssign" value="<?php echo $_SESSION["storeDate"]; ?>">
					<input type="button" value="Arrival" onclick="test2()">

					<script type="text/javascript">
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
			</div>

			<!-- Return Time -->
			<div class="input-box-leaving">
				<label for="">Return time</label>
				<div class="technician-time">
					<input type="text" class="technician_leaving" name="technician_leaving" id="leaving" value="<?php echo $row["technician_leaving"]; ?>">
					<input type="button" value="Leaving" onclick="test3()">

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
			</div>

			<div class="input-box-out">
				<label for="">Rest Hour</label>

				<!-- Rest Hour Out -->
				<div class="out-time" style="display: flex; align-items: baseline;">
					<input type="hidden" name="techupdate_date" id="techupdate_date" value="<?php echo $_SESSION["storeDate"]; ?>">
					<input type="hidden" name="job_assign" value="<?php echo $row["job_assign"]; ?>">
					<input type="hidden" name="today_date" value="<?php echo $_SESSION["storeDate"]; ?>">
					<input type="hidden" name=" technician_out" value="<?php echo $_SESSION["resttime"]; ?>">
					<input type="text" name="tech_out" id="tech_out" value="<?php echo $row["tech_out"]; ?>">
					<input style="background-color: #1a0845; color: white; width: 216px;" type="button" value="OUT" onclick="tech_outs(); RestOutA();">

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
							if (technician_out != '' || technician_out == '', tech_leader != '' || tech_leader == '', techupdate_date != '' || techupdate_date == '') {
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

				</div>

				<!-- Rest Hour In -->
				<div class="in-time" style="display: flex; align-items: baseline;">
					<input type="hidden" name="technician_in" value="<?php echo $_SESSION["resttime"]; ?>">
					<input type="hidden" name="job_assign" value="<?php echo $row["job_assign"]; ?>">
					<input type="hidden" name="techupdate_date" id="techupdate_date" value="<?php echo $_SESSION["storeDate"]; ?>">
					<input type="text" name="tech_in" id="tech_in" value="<?= $row["tech_in"] ?>">
					<input style="background-color: #1a0845; color: white; width: 216px;" type="button" value="IN" onclick="tech_ins(); RestInA();">

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
							if (technician_in != '' || technician_in == '', tech_leader != '' || tech_leader == '', techupdate_date != '' || techupdate_date == '') {
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
			</div>
			<p class="control"><b id="techupdateAdminComplete"></b></p>
			<div class="updateBtn">
				<input type="hidden" name="jobregister_id" value="<?php echo $row["jobregister_id"]; ?>">
				<input style="height: 36px; margin-left: 20px; margin-right: 43px; font-size: 15px;" type="button" id="update_timeComplete" name="update_time" value="Update" />
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
							if (res.success == true) $('#techupdateAdminComplete').html('<span style="color: green">Update Saved!</span>');
							else $('#techupdateAdminComplete').html('<span style="color: red">Data Cannot Be Saved</span>');
						}
					});
				});
			});
		</script>

		<?php } } } ?>

	</body>

</html>