<?php session_start(); ?>

<!DOCTYPE html>

<head>
    <meta name="keywords" content=""/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    <title>Job Update</title>
    <link href="css/technicianmain.css" rel="stylesheet" />
    <link href="main.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/testing.js" type="text/javascript"></script>
</head>

<body> 
	
	<?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) {
          $jobregister_id =$_POST['jobregister_id'];
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run)
            {
              while ($row = mysqli_fetch_array($query_run))
              {
    ?> 
	
	<form action="" method="post">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
		<label>Departure time</label>
        <input type="hidden" name="technician_departure" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $technician_departure = date('d-m-Y g:i A')?>">

		<input type="hidden" name="DateAssign" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $DateAssign = date('d-m-Y') ?>">
        <input type="hidden" name="departure_timestamp" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $departure_timestamp = date('H:i:s') ?>">
        <input type="hidden" name="job_status" value="Doing">
        
		<div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="Departure" value="<?php echo $row['technician_departure']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_techstatus" name="update_techstatus" class="buttonbiru update" onclick="DepartTime(); TechnicianDeparture();">Departure</button>
            </div>
            
			<!-- Generate departure time -->
			<script type="text/javascript">
                function DepartTime() {
                    $.ajax({
                        url: "departureTime.php",
                        success: function(result) {$("#Departure").val(result);}
                    })
                }
            </script>
            
			<!-- Update in Job Register Table -->
			<script type="text/javascript">
                function TechnicianDeparture() {
                    var technician_departure = $('input[name=technician_departure]').val();
                    var departure_timestamp = $('input[name=departure_timestamp]').val();
                    var DateAssign = $('input[name=DateAssign]').val();
                    var job_status = $('input[name=job_status]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    
					if (technician_departure != '' || technician_departure == '',
                         departure_timestamp != '' || departure_timestamp == '',
                                  DateAssign != '' || DateAssign == '',
                                  job_status != '' || job_status == '',
                              jobregister_id != '' || jobregister_id == '') 
						
						{
							var formData = {technician_departure: technician_departure,
                                             departure_timestamp: departure_timestamp,
                                                      DateAssign: DateAssign,
                                                      job_status: job_status,
                            					  jobregister_id: jobregister_id};
                        
							$.ajax({
								url: "departureupdate.php",
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
        
		<label>Time at site</label>
        <input type="hidden" name="technician_arrival" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $technician_arrival = date('d-m-Y g:i A') ?>">
        
		<div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="arrival" value="<?php echo $row['technician_arrival']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button style="padding-left: 64px;" id="arrivaltechnician" class="buttonbiru" onclick="ArrivalTime(); TechnicianArrival();" type="button">Arrival</button>
            </div>
            
			<!-- Generate arrival time -->
			<script type="text/javascript">
                function ArrivalTime() {
                    $.ajax({
                        url: "departureTime.php",
                        success: function(result) {$("#arrival").val(result);}
                    })
                }
            </script>
            
			<!-- Save arrival time in job register table -->
			<script type="text/javascript">
                function TechnicianArrival() {
                    var technician_arrival = $('input[name=technician_arrival]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    
					if (technician_arrival != '' || technician_arrival == '', 
							jobregister_id != '' || jobregister_id == '') 
							
						{
							var formData = {technician_arrival: technician_arrival,
                            				    jobregister_id: jobregister_id};
                        	
							$.ajax({
								url: "arrivalupdate.php",
								type: 'POST',
								data: formData,
								success: function(response)
									{
										var res = JSON.parse(response);
										console.log(res);
                            		}
                        	});
                    	}
                }
            </script>
        </div>
        
		<label>Return time</label>
        <input type="hidden" name="technician_leaving" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $technician_leaving = date('d-m-Y g:i A') ?>">
        
		<div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="leaving" value="<?php echo $row['technician_leaving']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button style="padding-left: 51px;" class="buttonbiru" onclick="LeavingTime(); TechnicianLeaving();" type="button">Leaving</button>
            </div>
            
			<!-- generate leaving time -->
			<script type="text/javascript">
                function LeavingTime() {
                    $.ajax({
                        url: "departureTime.php",
                        success: function(result) {
                            $("#leaving").val(result);
                        }
                    })
                }
            </script>
            
			<!-- save leaving time in job register table -->
			<script type="text/javascript">
                function TechnicianLeaving() {
                    var technician_leaving = $('input[name=technician_leaving]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    
                    if (technician_leaving != '' || technician_leaving == '', 
					        jobregister_id != '' || jobregister_id == '') 
						
						{
							var formData = {technician_leaving: technician_leaving,
                            					jobregister_id: jobregister_id};
                        
							$.ajax({
								url: "leavingupdate.php",
								type: 'POST',
								data: formData,
								success: function(response)
									{
										var res = JSON.parse(response);
										console.log(res);
									}
							});
                    	}
                }
            </script>
        </div>
        
		<label>Rest Hour</label>
		<input type="hidden" name="technician" value="<?php echo $_SESSION['username'] ?>">
        <input type="hidden" name="today_date" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $today_date = date('d-m-Y') ?>">
        
		<input type="hidden" name="tech_out" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $tech_out = date('g:i A') ?>">
        <input type="hidden" name="technician_out" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $technician_out = date('g:i A') ?>">
       
		<div class="input-group mb-3">
			<input readonly type="text" style="position: static;" class="form-control" id="tech_out" value="<?php echo $row['tech_out']?>" aria-describedby="basic-addon2">
			<div class="input-group-append">
                <button class="buttonbiru" onclick="OutTime(); TechnicianOut(); TechnicianOutUpdate();" style="position: static; width: fit-content;" type="button">OUT</button>
            </div>
            
			<!-- Generate rest out time -->
			<script type="text/javascript">
                function OutTime() {
                    $.ajax({
                        url: "techresthourtime.php",
                        success: function(result) {
                            $("#tech_out").val(result);
                        }
                    })
                }
            </script>
            
			<!-- save rest out time in job register table -->
			<script type="text/javascript">
                function TechnicianOut() {
                    var tech_out = $('input[name=tech_out]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    
                    if (tech_out != '' || tech_out == '', 
				        jobregister_id != '' || jobregister_id == '') 
				  	
				  	{
						var formData = {tech_out: tech_out,
                                  jobregister_id: jobregister_id};
                        
						$.ajax({
							url: "techoutupdate.php",
							type: 'POST',
							data: formData,
							success: function(response) 
								{
									var res = JSON.parse(response);
									console.log(res);
								}
						});
                    }
                }
			</script>

            <!-- save rest out time in tech_update table -->
			<script type="text/javascript">
                function TechnicianOutUpdate() {
                    var technician_out = $('input[name=technician_out]').val();
                    var tech_leader = $('input[name=technician]').val();
                    var techupdate_date = $('input[name=today_date]').val();
                    
					if (technician_out != '' || technician_out == '', 
						   tech_leader != '' || tech_leader == '', 
					   techupdate_date != '' || techupdate_date == '') 
					
				   {
						var formData = {technician_out: technician_out,
                            			   tech_leader: tech_leader,
                            		   techupdate_date: techupdate_date};
                        
						$.ajax({
							url: "techoutupdate2.php",
                            type: 'POST',
                            data: formData,
                            success: function(response) 
								{
									var res = JSON.parse(response);
                                	console.log(res);
								}
                        });
                    }
                }
            </script>
        </div>
        
		<div class="input-group mb-3">
            <input type="hidden" name="tech_in" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $tech_in = date('g:i A') ?>">
            <input type="hidden" name="technician_in" value="<?php date_default_timezone_set('Asia/Kuala_Lumpur'); echo $technician_in = date('g:i A') ?>">

			<input readonly type="text" style="position: static;" class="form-control" id="tech_in" value="<?php echo $row['tech_in']?>" aria-describedby="basic-addon2">
			<div class="input-group-append">
                <button class="buttonbiru" onclick="InTime(); TechnicianIn(); TechnicianInUpdate();" style="position: static; width: fit-content; padding-left: 55px;" type="button">IN</button>
            </div>
            
			<!-- Generate rest in time -->
			<script type="text/javascript">
                function InTime() {
                    $.ajax({
                        url: "techresthourtime.php",
                        success: function(result) {
                            $("#tech_in").val(result);
                        }
                    })
                }
			</script>

			<!-- save rest our in job register table -->
			<script type="text/javascript">
                function TechnicianIn() {
                    var tech_in = $('input[name=tech_in]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    
                    if (tech_in != '' || tech_in == '', 
						jobregister_id != '' || jobregister_id == '') 
					
					{
						var formData = {tech_in: tech_in,
								 jobregister_id: jobregister_id};
                        
						$.ajax({
							url: "techinupdate.php",
                            type: 'POST',
                            data: formData,
                            success: function(response) 
								{
									var res = JSON.parse(response);
                                	console.log(res);
                            	}
                        });
                    }
                }
			</script>

			<!-- save rest our in tech_update table -->
			<script type="text/javascript">
                function TechnicianInUpdate() {
                    var technician_in = $('input[name=technician_in]').val();
                    var tech_leader = $('input[name=technician]').val();
                    var techupdate_date = $('input[name=today_date]').val();
                    
					if (technician_in != '' || technician_in == '', 
						  tech_leader != '' || tech_leader == '', 
					  techupdate_date != '' || techupdate_date == '') 
					  
					{
						var formData = {technician_in: technician_in,
                            			  tech_leader: tech_leader,
                                      techupdate_date: techupdate_date};

                        $.ajax({
                            url: "techinupdate2.php",
                            type: 'POST',
                            data: formData,
                            success: function(response) 
								{
									var res = JSON.parse(response);
                                	console.log(res);
                            	}
                        });
                    }
                }
            </script>
        </div>
    </form> 
	
	<?php } } } ?> 

</body>

</html>