<?php

	session_start();

    include "dbconnect.php";
	
	if($_SESSION['staff_position']=="" AND $_SESSION['technician_rank']=="" ) {
		header("location:index.php?error");
	}
	
	if(!isset($_SESSION['username'])) {
		header("location:index.php?error");
	}

    elseif (isset($_SESSION["username"])) {
        $techName = $_SESSION["username"];
        
        $query_run = mysqli_query($conn, "SELECT * FROM staff_register WHERE username='$techName'");
        
        $row = mysqli_fetch_assoc($query_run);
        $username = $row["username"];

        echo "<script>var usernameValue = '" . $username . "';</script>";
    }

	elseif($_SESSION['staff_position']== 'Leader') {

	}
	
	else {
		header("location:index.php?error");
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Technician</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="css/technicianStyle.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>   
    </head>
    
    <body>
        <!--========== Header ==========-->
        <header>
            <nav class="navbar navbar-light position-fixed top-0 w-100" style="background-color: #C0C0C0; z-index: 2;">
                <ul class="nav start-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="dashicons:welcome-widgets-menus" style="font-size:200%; color: #081d45;"></i></a>
                        <ul class="dropdown-menu ms-3">
                            <li><a class="dropdown-item" href="techattendance.php">Attendance</a></li>
                            <li><a class="dropdown-item" href="techresthour.php">Rest Hour</a></li>
                            <li><a class="dropdown-item" href="technicianLeave.php">Leave</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="jobregistertechnician.php">Job Register</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="techaccessories.php">Accessory</a></li> -->
                        </ul>
                    </li>
                </ul>

                <nav class="nav ms-auto">
                    <span class="fw-bold">Hi <?=$username?>!</span>
                </nav>
                
                <nav class="nav ms-auto">
                    <a class="nav-link" href="logout.php"><i class="iconify" data-icon="heroicons-outline:logout" style="font-size:200%; color: #081d45;"></i></a>
                </nav>
            </nav>            
        </header>
        
        <!--========== Content ==========-->
        <div class="container p-3" style="margin-top: 70px; margin-bottom: 100px;">
            <!-- Todo -->
            <div class="Box card" style="margin-bottom: 30px;">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #081d45;">Todo</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}'
									   AND (job_status = '' OR job_status IS NULL OR job_status = 'Ready') 
									   AND (job_cancel = '' OR job_cancel IS NULL)
									   ORDER BY jobregisterlastmodify_at DESC";

                            $numRow_run = mysqli_query($conn, $numRow);
                                    
                            if ($row_Total = mysqli_num_rows($numRow_run)) {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #081d45;">Total Job: '. $row_Total .'</h6></div> ';
							}
							
							else {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #081d45;">No Record</h6></div>';
							}
                        ?>
                    </div>
                    
					<?php
						
						include 'dbconnect.php';
						
						$results = $conn->query("SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}'
                                                 AND (job_status = '' OR job_status IS NULL OR job_status = 'Ready') 
                                                 AND (job_cancel = '' OR job_cancel IS NULL)
                                                 ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	while ($row = $results->fetch_assoc()) {
                    ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="card-title fw-bold m-2"><?php echo $row['customer_name'] ?> [<?php echo $row['customer_grade'] ?>]</h6>
                        </div>

                        <div class="Job card-body" data-bs-toggle="modal" data-bs-target="#popUpModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>" data-jobAssign="<?php echo $row['job_assign']; ?>">
                            <ul>
                                <li><?php echo $row['job_priority'] ?></li>
                                <li><?php echo $row['job_order_number'] ?></li>
                                <li><?php echo $row['job_description'] ?></li>
                                <li><?php echo $row['machine_brand'] ?></li>
                                <li><?php echo $row['machine_type'] ?></li>
                                <li><?php echo $row['machine_name'] ?></li>
                                <li><?php echo $row['serialnumber'] ?></li>
								<?php
									if($row['reason'] != "" || $row['reason'] != NULL) {
										echo'<li><span class="fw-bold" style="color: red;">'.$row['reason'].'</span></li>';
									}
                            	?>
                            </ul>
							
							<?php
								if($row['support'] != "" || $row['support'] != NULL) {
									echo'<div class="d-grid justify-content-end">
										 	<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.7rem; width: 5rem;">'.$row['support'].'</h6>
                            			 </div>';
								}
                            ?>
                        </div>

                        <div class="card-footer p-0" data-jobRegisterIDdept="<?php echo $row['jobregister_id']; ?>">
                            <button type="button" id="depBtn" class="btn w-100 h-100 fw-bold d-flex align-items-center justify-content-center rounded-top-0 rounded-bottom" style="border: none; background-color: #081d45; color: #FFFFFF;">Departure</button>
                        </div>

                        <div style="display: none;">
                            <form id="departureForm">
                                <input type="hidden" name="jobregister_id" id="jobregister_idDptr">
                                <input type="hidden" name="technician_departure" id="technician_departureCLK">
                                <input type="hidden" name="departure_timestamp" id="departure_timestamp">
                                <input type="hidden" name="DateAssign" id="DateAssign">
                                <input type="hidden" name="job_status" id="job_status" value="Doing">
                            </form>
                            
                            <script>
                                $(document).on('click', '#depBtn', function () {
                                    const jobRegisterID = $(this).closest('.card-footer').data('jobregisteriddept');
                                    
                                    document.getElementById('jobregister_idDptr').value = jobRegisterID;
                                    
                                    $.ajax({
                                        url: 'departTechBtn.php',
                                        method: 'GET',
                                        success: function(response) {
                                            const data = JSON.parse(response);
                                            
                                            if (data.error) {
                                                alert(data.error);
                                                
                                                return;
                                            }
                                            
                                            document.getElementById('technician_departureCLK').value = data.technician_departure;
                                            document.getElementById('departure_timestamp').value = data.departure_timestamp;
                                            document.getElementById('DateAssign').value = data.DateAssign;
                                            
                                            $.ajax({
                                                url: 'departFormBtn.php',
                                                method: 'POST',
                                                data: $('#departureForm').serialize(),
                                                success: function(response) {
                                                    if (response === "success") {
                                                        location.reload();
                                                    }
                                                    
                                                    else {
                                                        console.error("Update failed");
                                                    }
                                                },
                                                
                                                error: function() {
                                                    console.error('Error submitting departure form.');
                                                }
                                            });
                                        },
                                        
                                        error: function() {
                                            alert('Error fetching time from server.');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>

            <!-- Doing -->
            <div class="Box card" style="margin-bottom: 30px;">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #228B22;">Doing</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
							           AND job_status = 'Doing' 
									   AND (job_cancel IS NULL OR job_cancel = '')
									   ORDER BY jobregisterlastmodify_at DESC";

                            $numRow_run = mysqli_query($conn, $numRow);
                                    
                            if ($row_Total = mysqli_num_rows($numRow_run)) {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #228B22;">Total Job: '. $row_Total .'</h6></div> ';
							}
							
							else {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #228B22;">No Record</h6></div>';
							}
                        ?>
                    </div>
                    
					<?php
						
						include 'dbconnect.php';
						
						$results = $conn->query("SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}'
												 AND job_status = 'Doing' 
												 AND (job_cancel IS NULL OR job_cancel = '')
												 ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	while ($row = $results->fetch_assoc()) {
                    ?>
					<div class="card mb-3" id="doingJobsContainer">
                        <div class="card-header">
                            <h6 class="card-title fw-bold m-2"><?php echo $row['customer_name'] ?> [<?php echo $row['customer_grade'] ?>]</h6>
                        </div>

                        <div class="Job card-body" data-bs-toggle="modal" data-bs-target="#popUpModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>" data-jobAssign="<?php echo $row['job_assign']; ?>">
                            <ul>
                                <li><?php echo $row['job_priority'] ?></li>
                                <li><?php echo $row['job_order_number'] ?></li>
                                <li><?php echo $row['job_description'] ?></li>
								<li><?php echo $row['machine_brand'] ?></li>
                                <li><?php echo $row['machine_type'] ?></li>
                                <li><?php echo $row['machine_name'] ?></li>
                                <li><?php echo $row['serialnumber'] ?></li>
                            </ul>

                            <?php
								if($row['support'] != "" || $row['support'] != NULL) {
									echo'<div class="d-grid justify-content-end">
										 	<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.7rem; width: 5rem;">'.$row['support'].'</h6>
                            			 </div>';
								}
                            ?>
                        </div>

                        <div class="card-footer p-0" data-jobregisteridarv="<?php echo $row['jobregister_id']; ?>" data-jobregisteridrtn="<?php echo $row['jobregister_id']; ?>">
                            <div class="btn-group w-100" role="group">
                                <button type="button" id="ArvBtn" class="btn flex-grow-1 fw-bold d-flex align-items-center justify-content-center rounded-top-0 rounded-bottom-end-0" style="border: 1px solid #E5E4E2; background-color: #081d45; color: #FFFFFF;">Arrival</button>
                                <button type="button" id="RtnBtn" class="btn flex-grow-1 fw-bold d-flex align-items-center justify-content-center rounded-0" style="border: 1px solid #E5E4E2; background-color: #081d45; color: #FFFFFF;">Return</button>
                                <button type="button" class="JobSupport btn flex-grow-1 fw-bold d-flex align-items-center justify-content-center rounded-top-0 " style="border: 1px solid #E5E4E2; background-color: #880808; color: #FFFFFF;" data-bs-toggle="modal" data-bs-target="#supportPopupModal" data-supportID="<?php echo $row['jobregister_id']; ?>">Support</button>
                            </div>
                        </div>

                        <!-- Technician Arrival Form -->
                        <div style="display: none;">
                            <form id="ArrivalForm">
                                <input type="hidden" name="jobregister_id" id="jobregister_idArv">
                                <input type="hidden" name="technician_arrival" id="technician_arrivalForm">
                            </form>
                        </div>
                        
                        <div id="ArvMsg_<?php echo $row['jobregister_id']; ?>" style="display: none;"></div>
                        
                        <script>
                            $(document).on('click', '#ArvBtn', function () {
                                const jobRegisterID = $(this).closest('.card-footer').data('jobregisteridarv');
                                
                                if (!jobRegisterID) {
                                    console.error('jobregister_id not found!');
                                    
                                    $('#ArvMsg_' + jobRegisterID).html('<div class="alert alert-danger m-2">Job ID not found</div>').show();
                                    
                                    return;
                                }
                                
                                $('#jobregister_idArv').val(jobRegisterID);
                                
                                $.ajax({
                                    url: 'departTechBtn.php',
                                    method: 'GET',
                                    success: function(response) {
                                        try {
                                            const data = JSON.parse(response);
                                            
                                            if (data.error) {
                                                $('#ArvMsg_' + jobRegisterID).html('<div class="alert alert-danger m-2">' + data.error + '</div>').show();
                                                
                                                return;
                                            }
                                            
                                            $('#technician_arrivalForm').val(data.technician_arrival);
                                            
                                            $.ajax({
                                                url: 'arriveFormBtn.php',
                                                method: 'POST',
                                                data: $('#ArrivalForm').serialize(),
                                                
                                                success: function(response) {
                                                    const msgDiv = $('#ArvMsg_' + jobRegisterID);
                                                    
                                                    if (response === "success") {
                                                        msgDiv.html('<div class="alert alert-success m-2">Arrival Time recorded!</div>').show();
                                                        
                                                        setTimeout(function() {
                                                            msgDiv.html('').hide();
                                                        }, 2000);
                                                    }
                                                    
                                                    else {
                                                        console.error("Update failed: " + response);
                                                        
                                                        msgDiv.html('<div class="alert alert-danger m-2">Failed to record arrival time: ' + response + '</div>').show();
                                                    }
                                                },
                                                
                                                error: function(xhr, status, error) {
                                                    console.error('Error submitting arrival form:', error);
                                                    
                                                    $('#ArvMsg_' + jobRegisterID).html('<div class="alert alert-danger">Error submitting arrival form: ' + error + '</div>').show();
                                                }
                                            });
                                        }
                                        
                                        catch (e) {
                                            console.error('Error parsing response:', e);
                                            
                                            $('#ArvMsg_' + jobRegisterID).html('<div class="alert alert-danger">Error processing server response</div>').show();
                                        }
                                    },
                                    
                                    error: function(xhr, status, error) {
                                        console.error('Error fetching time from server:', error);
                                        
                                        $('#ArvMsg_' + jobRegisterID).html('<div class="alert alert-danger">Error fetching time from server: ' + error + '</div>').show();
                                    }
                                });
                            });
                        </script>
                        <!-- Technician Arrival Form -->

                        <!-- Technician Return Form -->
                        <div style="display: none;">
                            <form id="ReturnForm">
                                <input type="hidden" name="jobregister_id" id="jobregister_idRtn">
                                <input type="hidden" name="technician_leaving" id="technician_leavingForm">
                            </form>
                        </div>
                        
                        <div id="RtnMsg_<?php echo $row['jobregister_id']; ?>" style="display: none;"></div>
                        
                        <script>
                            $(document).on('click', '#RtnBtn', function () {
                                const jobRegisterIDrtn = $(this).closest('.card-footer').data('jobregisteridrtn');
                                
                                $('#jobregister_idRtn').val(jobRegisterIDrtn);
                                
                                $.ajax({
                                    url: 'departTechBtn.php',
                                    method: 'GET',
                                    success: function(response) {
                                        const data = JSON.parse(response);
                                        
                                        if (data.error) {
                                            $('#RtnMsg_' + jobRegisterIDrtn).html('<div class="alert alert-danger m-2">' + data.error + '</div>').show();
                                            
                                            return;
                                        }
                                        
                                        $('#technician_leavingForm').val(data.technician_leaving);
                                        
                                        $.ajax({
                                            url: 'returnFormBtn.php',
                                            method: 'POST',
                                            data: $('#ReturnForm').serialize(),
                                            success: function(response) {
                                                const msgDivRtn = $('#RtnMsg_' + jobRegisterIDrtn);
                                                
                                                if (response === "success") {
                                                    msgDivRtn.html('<div class="alert alert-success m-2">Return Time recorded!</div>').show();
                                                    
                                                    setTimeout(function() {
                                                        msgDivRtn.html('').hide();
                                                    }, 2000);
                                                }
                                                
                                                else {
                                                    console.error("Update failed: " + response);
                                                    
                                                    msgDivRtn.html('<div class="alert alert-danger m-2">Failed to record return time: ' + response + '</div>').show();
                                                }
                                            },
                                            
                                            error: function(xhr, status, error) {
                                                console.error('Error submitting return form:', error);
                                                
                                                $('#RtnMsg_' + jobRegisterIDrtn).html('<div class="alert alert-danger">Error submitting return form: ' + error + '</div>').show();
                                            }
                                        });
                                    },
                                    
                                    error: function(xhr, status, error) {
                                        console.error('Error fetching time from server:', error);
                                        
                                        $('#RtnMsg_' + jobRegisterIDrtn).html('<div class="alert alert-danger">Error fetching time from server: ' + error + '</div>').show();
                                    }
                                });
                            });
                        </script>
                        <!-- Technician Return Form -->
                    </div>
					<?php } ?>
                </div>
            </div>

            <!-- Pending -->
            <div class="Box card" style="margin-bottom: 30px;">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #D2042D;">Pending</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
							           AND job_status = 'Pending'
									   AND (job_cancel IS NULL OR job_cancel = '')
							           ORDER BY jobregisterlastmodify_at DESC";

                            $numRow_run = mysqli_query($conn, $numRow);
                                    
                            if ($row_Total = mysqli_num_rows($numRow_run)) {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #D2042D;">Total Job: '. $row_Total .'</h6></div> ';
							}
							
							else {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #D2042D;">No Record</h6></div>';
							}
                        ?> 
                    </div>

					<?php
						
						include 'dbconnect.php';
						
						$results = $conn->query("SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
												 AND job_status = 'Pending'
												 AND (job_cancel IS NULL OR job_cancel = '')
												 ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	while ($row = $results->fetch_assoc()) {
                    ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="card-title fw-bold m-2"><?php echo $row['customer_name'] ?> [<?php echo $row['customer_grade'] ?>]</h6>
                        </div>

                        <div class="Job card-body" data-bs-toggle="modal" data-bs-target="#popUpModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>" data-jobAssign="<?php echo $row['job_assign']; ?>">
                            <ul>
								<li><?php echo $row['job_priority'] ?></li>
                                <li><?php echo $row['job_order_number'] ?></li>
                                <li><?php echo $row['job_description'] ?></li>
								<li><?php echo $row['machine_brand'] ?></li>
                                <li><?php echo $row['machine_type'] ?></li>
                                <li><?php echo $row['machine_name'] ?></li>
                                <li><?php echo $row['serialnumber'] ?></li>
								<?php
									if($row['reason'] != "" || $row['reason'] != NULL) {
										echo'<li><span class="fw-bold" style="color: red;">'.$row['reason'].'</span></li>';
									}
                            	?>
                            </ul>

                            <?php
								if($row['support'] != "" || $row['support'] != NULL) {
									echo'<div class="d-grid justify-content-end">
										 	<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.7rem; width: 5rem;">'.$row['support'].'</h6>
                            			 </div>';
								}
                            ?>
                        </div>
                        
                        <div class="JobDuplicate card-footer" style="background-color: #b11226;" data-bs-toggle="modal" data-bs-target="#DuplicatePopupModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
                            <h6 class="fw-bold" style="color: white; text-align: center;">Duplicate</h6>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>

            <!-- Incomplete -->
            <div class="Box card" style="margin-bottom: 30px;">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #FF5F1F;">Incomplete</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
							           AND job_status = 'Incomplete'
									   AND (job_cancel IS NULL OR job_cancel = '')
							           ORDER BY jobregisterlastmodify_at DESC";

                            $numRow_run = mysqli_query($conn, $numRow);
                                    
                            if ($row_Total = mysqli_num_rows($numRow_run)) {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #FF5F1F;">Total Job: '. $row_Total .'</h6></div> ';
							}
							
							else {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #FF5F1F;">No Record</h6></div>';
							}
                        ?> 
                    </div>

					<?php
						
						include 'dbconnect.php';
						
						$results = $conn->query("SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
												 AND job_status = 'Incomplete'
												 AND (job_cancel IS NULL OR job_cancel = '')
												 ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	while ($row = $results->fetch_assoc()) {
                    ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="card-title fw-bold m-2"><?php echo $row['customer_name'] ?> [<?php echo $row['customer_grade'] ?>]</h6>
                        </div>

                        <div class="Job card-body" data-bs-toggle="modal" data-bs-target="#popUpModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>" data-jobAssign="<?php echo $row['job_assign']; ?>">
                            <ul>
								<li><?php echo $row['job_priority'] ?></li>
                                <li><?php echo $row['job_order_number'] ?></li>
                                <li><?php echo $row['job_description'] ?></li>
								<li><?php echo $row['machine_brand'] ?></li>
                                <li><?php echo $row['machine_type'] ?></li>
                                <li><?php echo $row['machine_name'] ?></li>
                                <li><?php echo $row['serialnumber'] ?></li>
								<?php
									if($row['reason'] != "" || $row['reason'] != NULL) {
										echo'<li><span class="fw-bold" style="color: red;">'.$row['reason'].'</span></li>';
									}
                            	?>
                            </ul>

                            <?php
								if($row['support'] != "" || $row['support'] != NULL) {
									echo'<div class="d-grid justify-content-end">
										 	<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.7rem; width: 5rem;">'.$row['support'].'</h6>
                            			 </div>';
								}
                            ?>
                        </div>
                        
                        <div class="JobDuplicate card-footer" style="background-color: #b11226;" data-bs-toggle="modal" data-bs-target="#DuplicatePopupModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
                            <h6 class="fw-bold" style="color: white; text-align: center;">Duplicate</h6>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>

            <!-- Completed -->
            <div class="Box card">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #0047AB;">Completed</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
                                                                  AND job_status = 'Completed'
                                                                  AND (job_cancel IS NULL OR job_cancel = '')
                                                                  AND YEAR(jobregisterlastmodify_at) = YEAR(CURDATE())
                                                                  AND MONTH(jobregisterlastmodify_at) = MONTH(CURDATE())
                                       ORDER BY jobregisterlastmodify_at DESC";

                            $numRow_run = mysqli_query($conn, $numRow);
                                    
                            if ($row_Total = mysqli_num_rows($numRow_run)) {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #0047AB;">Total Job: '. $row_Total .'</h6></div> ';
							}
							
							else {
								echo '<div class="float-end"><h6 class="fw-bold" style="color: #0047AB;">No Record</h6></div>';
							}
                        ?>
                    </div>

					<?php
						
						include 'dbconnect.php';
						
						$results = $conn->query("SELECT * FROM job_register WHERE job_assign ='{$_SESSION['username']}' 
												                            AND job_status = 'Completed'
												                            AND (job_cancel IS NULL OR job_cancel = '')
                                                                            AND YEAR(jobregisterlastmodify_at) = YEAR(CURDATE())
                                                                            AND MONTH(jobregisterlastmodify_at) = MONTH(CURDATE())
												 ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	while ($row = $results->fetch_assoc()) {
                    ?>
                    <div class="JobCompleted card mb-3" data-bs-toggle="modal" data-bs-target="#completedPopupModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
                        <div class="card-header">
                            <h6 class="card-title fw-bold m-2"><?php echo $row['customer_name'] ?> [<?php echo $row['customer_grade'] ?>]</h6>
                        </div>

                        <div class="card-body">
                            <ul>
								<li><?php echo $row['job_priority'] ?></li>
                                <li><?php echo $row['job_order_number'] ?></li>
                                <li><?php echo $row['job_description'] ?></li>
								<li><?php echo $row['machine_brand'] ?></li>
                                <li><?php echo $row['machine_type'] ?></li>
                                <li><?php echo $row['machine_name'] ?></li>
                                <li><?php echo $row['serialnumber'] ?></li>
                            </ul>

                            <?php
								if($row['support'] != "" || $row['support'] != NULL) {
									echo'<div class="d-grid justify-content-end">
										 	<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.7rem; width: 5rem;">'.$row['support'].'</h6>
                            			 </div>';
								}
                            ?>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>

        <!--========== Popup Modal ==========-->
        <div class="modal fade" id="popUpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header p-1">
                        <ul class="nav nav-pills justify-content-center m-1" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active p-1 fw-bold" id="pills-Update-tab" data-bs-toggle="pill" data-bs-target="#pills-Update" type="button" role="tab" aria-controls="pills-Update" aria-selected="true">Update</button>
                            </li>

                            <li class="nav-item" role="presentation">
                              <button class="nav-link p-1 fw-bold" id="pills-JobInfo-tab" data-bs-toggle="pill" data-bs-target="#pills-JobInfo" type="button" role="tab" aria-controls="pills-JobInfo" aria-selected="false">Job Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                              <button class="nav-link p-1 fw-bold" id="pills-JobAssign-tab" data-bs-toggle="pill" data-bs-target="#pills-JobAssign" type="button" role="tab" aria-controls="pills-JobAssign" aria-selected="false">Job Assign</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 fw-bold" id="pills-Accessories-tab" data-bs-toggle="pill" data-bs-target="#pills-Accessories" type="button" role="tab" aria-controls="pills-Accessories" aria-selected="false">Accessories</button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 fw-bold" id="pills-Photo-tab" data-bs-toggle="pill" data-bs-target="#pills-Photo" type="button" role="tab" aria-controls="pills-Photo" aria-selected="false">Photo</button>
                            </li>
                              
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 fw-bold" id="pills-Video-tab" data-bs-toggle="pill" data-bs-target="#pills-Video" type="button" role="tab" aria-controls="pills-Video" aria-selected="false">Video</button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 fw-bold" id="pills-JobStatus-tab" data-bs-toggle="pill" data-bs-target="#pills-JobStatus" type="button" role="tab" aria-controls="pills-JobStatus" aria-selected="false">Job Status</button>
                            </li>
                              
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 fw-bold" id="pills-Report-tab" data-bs-toggle="pill" data-bs-target="#pills-Report" type="button" role="tab" aria-controls="pills-Report" aria-selected="false">Report</button>
                            </li>
                        </ul>
                        
                        <button type="button" class="btn-close m-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Update -->
                            <div class="tab-pane show active" id="pills-Update" role="tabpanel" aria-labelledby="pills-Update-tab">
                                <div class="container" id="jobUpdateTab">
                                    <input type="hidden" name="DateAssign" id="DateAssign">
                                    <input type="hidden" name="job_status" id="job_status">
                                    <input type="hidden" name="departure_timestamp" id="departure_timestamp">

                                    <input type="hidden" name="techupdate_date" id="techupdate_date">
                                    <input type="hidden" name="tech_leader" id="tech_leader">
                                    <input type="hidden" name="technician_out" id="technician_out">
                                    <input type="hidden" name="technician_in" id="technician_in">

                                    <form id="techJobUpdateForm">
                                        <input type="hidden" name="jobregister_id" id="jobregisterID_jobUpdate">

                                        <!-- Departure Time -->
                                        <label for="" class="form-label fw-bold">Departure Time</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="technician_departure" id="technician_departure" class="form-control" readonly>
                                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="departureButton">Departure</button>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const departureButton = document.getElementById('departureButton');
                                                const technicianDepartureInput = document.getElementById('technician_departure');
                                                const jobCards = document.querySelectorAll('.Job');
                                                const jobregister_idInput = document.getElementById("jobregisterID_jobUpdate");
                                                
                                                jobCards.forEach(jobCard => {
                                                    jobCard.addEventListener('click', function () {
                                                        const jobRegisterID = jobCard.getAttribute('data-jobRegisterID');
                                                        jobregister_idInput.value = jobRegisterID;
                                                    });
                                                });
                                                
                                                departureButton.addEventListener('click', function () {
                                                    fetch('departureTimeServer.php')
                                                    
                                                    .then(response => {
                                                        if (!response.ok) {
                                                            throw new Error('Network response was not ok');
                                                        }
                                                        
                                                        return response.json();
                                                    })
                                                    
                                                    .then(data => {
                                                        if (data.error) {
                                                            alert(data.error);
                                                            
                                                            return;
                                                        }
                                                        
                                                        technicianDepartureInput.value = data.technician_departure;
                                                        
                                                        const jobregister_id = jobregister_idInput.value;
                                                        const job_status = "Doing";
                                                        const DateAssign = data.date_assign;
                                                        const departure_timestamp = data.departure_timestamp;
                                                        const dataString = `jobregister_id=${jobregister_id}&DateAssign=${DateAssign}&job_status=${job_status}&departure_timestamp=${departure_timestamp}`;
                                                        
                                                        fetch('departureupdate.php', {
                                                            method: 'POST',
                                                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                                                            body: dataString
                                                        })
                                                        
                                                        .then(response => {
                                                            if (!response.ok) {
                                                                throw new Error('Network response was not ok');
                                                            }
                                                            
                                                            return response.text();
                                                        })
                                                        
                                                        .then(responseText => {
                                                            if (responseText === "success") {
                                                                console.log("Update successful");
                                                            }
                                                            
                                                            else {
                                                                console.error("Update failed");
                                                            }
                                                        })
                                                        
                                                        .catch(error => {
                                                            console.error('Error during update:', error);
                                                        });
                                                    })
                                                    
                                                    .catch(error => {
                                                        alert('Error fetching time from server.');
                                                    });
                                                });
                                            });
                                        </script>

                                        <!-- Arrival Time -->
                                        <label for="" class="form-label fw-bold">Time At Site</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="technician_arrival" id="technician_arrival" class="form-control" readonly>
                                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="arrivalButton">Arrival</button>
                                        </div>
                                        
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const arrivalButton = document.getElementById('arrivalButton');
                                                const technicianArrivalInput = document.getElementById('technician_arrival');
                                                
                                                arrivalButton.addEventListener('click', function () {
                                                    fetch('get_server_time.php')
                                                    .then(response => {
                                                        if (!response.ok) {
                                                            throw new Error('Network response was not ok');
                                                        }
                                                        
                                                        return response.text();
                                                    })
                                                    
                                                    .then(serverTime => {
                                                        technicianArrivalInput.value = serverTime;
                                                    })
                                                    
                                                    .catch(error => {
                                                        alert('Error fetching time from server.');
                                                    });
                                                });
                                            });
                                        </script>

                                        <!-- Leaving Time -->
                                        <label for="" class="form-label fw-bold">Return Time</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="technician_leaving" id="technician_leaving" class="form-control" readonly>
                                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="returnButton">Return</button>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const returnButton = document.getElementById('returnButton');
                                                const technicianLeavingInput = document.getElementById('technician_leaving');
                                                
                                                returnButton.addEventListener('click', function () {
                                                    fetch('get_server_time.php')
                                                    .then(response => {
                                                        if (!response.ok) {
                                                            throw new Error('Network response was not ok');
                                                        }
                                                        
                                                        return response.text();
                                                    })
                                                    
                                                    .then(serverTime => {
                                                        technicianLeavingInput.value = serverTime;
                                                    })
                                                    
                                                    .catch(error => {
                                                        alert('Error fetching time from server.');
                                                    });
                                                });
                                            });
                                        </script>
                                        
                                        <!-- Rest Time -->
                                        <label for="" class="form-label fw-bold">Rest Hour</label>
                                        <div class="d-grid gap-3 mb-3">
                                            <!-- Rest Out -->
                                            <div class="input-group">
                                                <input type="text" name="tech_out" id="tech_out" class="form-control" readonly>
                                                <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="outButton">Out</button>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const outButton = document.getElementById('outButton');
                                                    const techOutInput = document.getElementById('tech_out');
                                                    const techLeaderInput = document.getElementById('tech_leader');
                                                    const jobCards = document.querySelectorAll('.Job');
                                                    
                                                    jobCards.forEach(jobCard => {
                                                        jobCard.addEventListener('click', function () {
                                                            const jobAssign = jobCard.getAttribute('data-jobAssign');
                                                            
                                                            techLeaderInput.value = jobAssign;
                                                        });
                                                    });
                                                    
                                                    outButton.addEventListener('click', function () {
                                                        fetch('resttime.php')
                                                        
                                                        .then(response => {
                                                            if (!response.ok) {
                                                                throw new Error('Network response was not ok');
                                                            }
                                                            
                                                            return response.json();
                                                        })
                                                        
                                                        .then(data => {
                                                            if (data.error) {
                                                                alert(data.error);
                                                                
                                                                return;
                                                            }
                                                            
                                                            techOutInput.value = data.tech_out;
                                                            
                                                            const tech_leader = techLeaderInput.value;
                                                            const techupdate_date = data.techupdate_date;
                                                            const technician_out = data.tech_out;
                                                            const dataString = `technician_out=${technician_out}&tech_leader=${tech_leader}&techupdate_date=${techupdate_date}`;
                    
                                                            fetch('techoutupdate.php', {
                                                                method: 'POST',
                                                                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                                                                body: dataString
                                                            })
                                                            
                                                            .then(response => {
                                                                if (!response.ok) {
                                                                    throw new Error('Network response was not ok');
                                                                }
                                                                
                                                                return response.text();
                                                            })
                                                            
                                                            .then(responseText => {
                                                                if (responseText === "success") {
                                                                    console.log("Update successful");
                                                                }
                                                                
                                                                else {
                                                                    console.error("Update failed");
                                                                }
                                                            })
                                                            
                                                            .catch(error => {
                                                                console.error('Error during update:', error);
                                                            });
                                                        })
                                                        
                                                        .catch(error => {
                                                            alert('Error fetching time from server.');
                                                        });
                                                    });
                                                });
                                            </script>
                                            
                                            <!-- Rest In -->
                                            <div class="input-group">
                                                <input type="text" name="tech_in" id="tech_in" class="form-control" readonly>
                                                <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="inButton">In</button>
                                            </div>

                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const inButton = document.getElementById('inButton');
                                                    const techInInput = document.getElementById('tech_in');
                                                    const techLeaderInput = document.getElementById('tech_leader');
                                                    const jobCards = document.querySelectorAll('.Job');
                                                    
                                                    jobCards.forEach(jobCard => {
                                                        jobCard.addEventListener('click', function () {
                                                            const jobAssign = jobCard.getAttribute('data-jobAssign');
                                                            
                                                            techLeaderInput.value = jobAssign;
                                                        });
                                                    });
                                                    
                                                    inButton.addEventListener('click', function () {
                                                        fetch('resttime.php')
                                                        
                                                        .then(response => {
                                                            if (!response.ok) {
                                                                throw new Error('Network response was not ok');
                                                            }
                                                            
                                                            return response.json();
                                                        })
                                                        
                                                        .then(data => {
                                                            if (data.error) {
                                                                alert(data.error);
                                                                
                                                                return;
                                                            }
                                                            
                                                            techInInput.value = data.tech_in;
                                                            
                                                            const tech_leader = techLeaderInput.value;
                                                            const techupdate_date = data.techupdate_date;
                                                            const technician_in = data.tech_in;
                                                            const dataString = `technician_in=${technician_in}&tech_leader=${tech_leader}&techupdate_date=${techupdate_date}`;
                                                            
                                                            fetch('techinupdate.php', {
                                                                method: 'POST',
                                                                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                                                                body: dataString
                                                            })
                                                            
                                                            .then(response => {
                                                                if (!response.ok) {
                                                                    throw new Error('Network response was not ok');
                                                                }
                                                                
                                                                return response.text();
                                                            })
                                                            
                                                            .then(responseText => {
                                                                if (responseText === "success") {
                                                                    console.log("Update successful");
                                                                }
                                                                
                                                                else {
                                                                    console.error("Update failed");
                                                                }
                                                            })
                                                            
                                                            .catch(error => {
                                                                console.error('Error during update:', error);
                                                            });
                                                        })
                                                        
                                                        .catch(error => {
                                                            alert('Error fetching time from server.');
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    
                                        <div id="JobUpdateMessage"></div>

                                        <div class="d-grid justify-content-end mb-3">
                                            <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Job Info -->
                            <div class="tab-pane" id="pills-JobInfo" role="tabpanel" aria-labelledby="pills-JobInfo-tab">
                                <div class="container" id="jobInfoTab">
                                    <form id="techJobInfoForm">
                                        <input type="hidden" name="jobregister_id" id="jobregisterID_jobInfo" readonly>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Job Priority</label>
                                                <input type="text" name="job_priority" id="job_priority" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Job Order Number</label>
                                                <input type="text" name="job_order_number" id="job_order_number" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Job Name</label>
                                                <input type="text" name="job_name" id="job_name" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Job Description</label>
                                                <input type="text" name="job_description" id="job_description" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Requested Date</label>
                                                <input type="text" name="requested_date" id="requested_date" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Delivery Date</label>
                                                <input type="text" name="delivery_date" id="delivery_date" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="fw-bold mb-2">Customer Name</label>
                                                <input type="text" name="customer_name" id="customer_name" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="form-label fw-bold">Customer Address</label>
                                                <input type="text" name="cust_address1" id="cust_address1" class="form-control" readonly>
                                                <div class="d-grid d-flex gap-2 mt-2">
                                                    <input type="text" name="cust_address2" id="cust_address2" class="form-control" readonly>
                                                    <input type="text" name="cust_address3" id="cust_address3" class="form-control" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Customer Grade</label>
                                                <input type="text" name="customer_grade" id="customer_grade" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Customer PIC</label>
                                                <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" readonly>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="form-label fw-bold">Customer Phone Number</label>
                                                <div class="d-grid d-flex gap-2 mt-2">
                                                    <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" readonly>
                                                    <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="form-label fw-bold">Serial Number</label>
                                                <select name="serialnumber" id="serialnumber"  style="width: 100%;" class="form-select" onchange="loadMachineDetails(this.value)">
                                                    <option value="">Select Serial Number</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Machine Brand</label>
                                                <select name="brand_id" id="brand_id" style="width: 100%;" class="form-select" onchange="onBrandIDChange(this.value)">
                                                    <option value="">Select Machine Brand</option>
                                                    <?php
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT * FROM machine_brand ORDER BY brandname ASC");
                                                        
                                                        while ($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='".$data['brand_id']."'
                                                                          data-machBrand='". $data['brandname'] ."'>".$data['brandname']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                                
                                                <input type="hidden" name="machine_brand" id="machine_brand">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="form-label fw-bold">Machine Type</label>
                                                <select name="machine_type" id="machine_type" style="width: 100%;" onchange="loadMachNameTypeID(this.value)" class="form-select">
                                                    <option value="">Select Machine Type</option>
                                                </select>
                                                
                                                <input type="hidden" name="type_id" id="type_id">
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label fw-bold">Machine Name</label>
                                                <input type="text" id="machine_name" name="machine_name" class="form-control">
                                                <input type="hidden" id="machine_id" name="machine_id">
                                                <input type="hidden" id="machine_code" name="machine_code">
                                            </div>
                                            
                                            <input type="hidden" id="jobregistercreated_by" name="jobregistercreated_by">
                                            <input type="hidden" id="jobregisterlastmodify_by" name="jobregisterlastmodify_by">
                                        </div>
                                        
                                        <div class="mt-2">
                                            <button type="submit" id="updtInfo" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width:100%">Update</button>
                                        </div>
                                        
                                        <div class="mt-3" id="JobInfoMessage"></div>
                                    </form>
                                </div>
                            </div>

                            <!-- Job Assign -->
                            <div class="tab-pane" id="pills-JobAssign" role="tabpanel" aria-labelledby="pills-JobAssign-tab">
                                <div class="container" id="jobAssignTab">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div id="jobAssignData"></div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold">Assistant</label>
                                            
                                            <div class="table-responsive mb-3">
                                                <table class="table border table-borderless table-striped" id="assistantTable">
                                                    <tbody></tbody>
                                                </table>
                                            </div>

                                            <form id="techJobAssistantForm">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_assistant">
                                                <input type="hidden" name="ass_date" id="ass_date">
                                                <input type="hidden" name="techupdate_date" id="assistantDate">
                                                <input type="hidden" name="cust_name" id="cust_name">
                                                <input type="hidden" name="requested_date" id="requestedDate">
                                                <input type="hidden" name="machine_name" id="machineName">
                                                <input type="hidden" name="job_assign" id="jobAssignAssistant">
                                                
                                                <select name="username[]" id="username" class="form-select mb-3" multiple="multiple">
                                                    <?php

                                                        $query = "SELECT * FROM staff_register WHERE staff_group = 'Technician' AND tech_avai = '0' ORDER BY username ASC";
                                                        $query_run = mysqli_query($conn, $query);

                                                        if(mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $rowstaff) {
                                                    ?> 
    
                                                    <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option>

                                                    <?php } } else {echo "No Record Found";} ?> 
                                                </select>

                                                <div id="assistantMessage"></div>

                                                <div class="d-grid justify-content-end mt-3">
                                                    <button type="submit" id="updateassign" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Update</button>
                                                </div>
                                            </form>

                                            <script>
                                                $(document).ready(function() {
                                                    $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                                        $("#username").select2({
                                                            dropdownParent: $('#techJobAssistantForm'),
                                                            matcher: oldMatcher(matchStart),
                                                            theme: 'bootstrap-5'
                                                        })
                                                    });
                                                    
                                                    function matchStart (term, text) {
                                                        if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                                                            return true;
                                                        }
                                                        
                                                        return false;
                                                    }
                                                });
                                            </script>

                                            <!-- Update Assistant in technician Update table -->
                                            <script>
                                                $(document).ready(function() {
                                                    $('#updateassign').click(function() {
                                                        var data = $('#techJobAssistantForm').serialize() + '&updateassign=updateassign';
                                                        
                                                        $.ajax({
                                                            url: 'assistantupdate.php',
                                                            type: 'POST',
                                                            data: data,
                                                            dataType: 'json',
                                                            
                                                            success: function(response) {
                                                                console.log(response);
                                                                
                                                                if (response.success) {
                                                                    console.log('Update Saved!');
                                                                }
                                                                
                                                                else {
                                                                    console.error('Data Cannot Be Saved');
                                                                }
                                                            },
                                                            
                                                            error: function(xhr, status, error) {
                                                                console.error('Error:', error);
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                            <!-- Update Assistant in technician Update table -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Accessories -->
                            <div class="tab-pane" id="pills-Accessories" role="tabpanel" aria-labelledby="pills-Accessories-tab">
                                <div class="container" id="jobAccessoriesTab">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="accessoryTable">
                                            <thead>
                                                <tr>
                                                    <th style='text-align: center;'>No</th>
                                                    <th style='text-align: center;'>Code</th>
                                                    <th style='text-align: center;'>Name</th>
                                                    <th style='text-align: center;'>UOM</th>
                                                    <th style='text-align: center;'>Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo -->
                            <div class="tab-pane" id="pills-Photo" role="tabpanel" aria-labelledby="pills-Photo-tab">
                                <div class="container" id="jobPhotoTab">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold">Photo Before Service</label>
                                            <form class="photoBefore" id="techJobPhotoBeforeForm">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_photoBefore">

                                                <div class="input-group mb-3">
                                                    <input type="file" name="file_name[]" id="fileName_before" class="form-control" accept="image/*" multiple>
                                                    <input type="hidden" name="description" id="descriptionBefore" value="Machine (Before Service)">
                                                    <button type="submit" name="upload" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
                                                </div>

                                                <div id="photoBeforeMessage"></div>
                                            
                                                <div id="previewPhotoBefore" style="display: flex; flex-wrap: wrap;">
                                                    <script>
                                                        document.getElementById("fileName_before").addEventListener("change", function (event) {
                                                            const imagePreview = document.getElementById("previewPhotoBefore");
                                                            imagePreview.innerHTML = "";
                                                            const files = event.target.files;
                                                        
                                                            for (let i = 0; i < files.length; i++) {
                                                                const file = files[i];
                                                                const reader = new FileReader();
                                                            
                                                                reader.onload = function (e) {
                                                                    const img = document.createElement("img");
                                                                    img.src = e.target.result;
                                                                    img.classList.add("preview-image");
                                                                    img.style.width = "270px"; 
                                                                    img.style.height = "200px";
                                                                    img.style.margin = "10px";
                                                                    imagePreview.appendChild(img);
                                                                };
                                                            
                                                                reader.readAsDataURL(file);
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </form>

                                            <div class="container">
                                                <div class="row" id="photoBeforeService"></div>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold" >Photo After Service</label>
                                            <form id="techJobPhotoAfterForm">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_photoAfter">
                                            
                                                <div class="input-group mb-3">
                                                <input type="file" name="file_name[]" id="fileName_after" class="form-control" accept="image/*" multiple>
                                                    <input type="hidden" name="description" id="descriptionAfter" value="Machine (After Service)">
                                                    <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
                                                </div>

                                                <div id="photoAfterMessage"></div>

                                                <div id="previewPhotoAfter" style="display: flex; flex-wrap: wrap;">
                                                    <script>
                                                        document.getElementById("fileName_after").addEventListener("change", function (event) {
                                                            const imagePreview = document.getElementById("previewPhotoAfter");
                                                            imagePreview.innerHTML = "";
                                                            const files = event.target.files;
                                                        
                                                            for (let i = 0; i < files.length; i++) {
                                                                const file = files[i];
                                                                const reader = new FileReader();
                                                            
                                                                reader.onload = function (e) {
                                                                    const img = document.createElement("img");
                                                                    img.src = e.target.result;
                                                                    img.classList.add("preview-image");
                                                                    img.style.width = "270px"; 
                                                                    img.style.height = "200px";
                                                                    img.style.margin = "10px";
                                                                    imagePreview.appendChild(img);
                                                                };
                                                            
                                                                reader.readAsDataURL(file);
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </form>

                                            <div class="container">
                                                <div class="row" id="photoAfterService"></div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Video -->
                            <div class="tab-pane" id="pills-Video" role="tabpanel" aria-labelledby="pills-Video-tab">
                                <div class="container" id="jobVideoTab">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold" >Video Before Service</label>
                                            <form id="techJobVideoBeforeForm">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_videoBefore">

                                                <div class="input-group mb-3">
                                                    <input type="file" name="video_url[]" id="videoBefore" class="form-control" accept="video/*" multiple>
                                                    <input type="hidden" name="description" id="descriptionVideoBefore" value="Machine (Before Service)">
                                                    <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
                                                </div>

                                                <div id="videoBeforeMessage"></div>

                                                <div id="previewVideoBefore">
                                                    <script>
                                                        document.getElementById("videoBefore").addEventListener("change", function (event) {
                                                            const videoPreview = document.getElementById("previewVideoBefore");
                                                            videoPreview.innerHTML = "";
                                                            const files = event.target.files;
                                                            
                                                            for (let i = 0; i < files.length; i++) {
                                                                const file = files[i];
                                                                const video = document.createElement("video");
                                                                
                                                                video.controls = true;
                                                                video.style.width = "270px";
                                                                video.style.height = "200px";
                                                                video.style.margin = "10px";
                                                                
                                                                const source = document.createElement("source");
                                                                source.src = URL.createObjectURL(file);
                                                                source.type = file.type;
                                                                
                                                                video.appendChild(source);
                                                                videoPreview.appendChild(video);
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </form>

                                            <div class="container">
                                                <div class="row" id="videoBeforeService"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold" >Video After Service</label>
                                            <form id="techJobVideoAfterForm">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_videoAfter">
                                                
                                                <div class="input-group mb-3">
                                                    <input type="file" name="video_url[]" id="videoAfter" class="form-control" accept="video/*" multiple>
                                                    <input type="hidden" id="description" name="description" value="Machine (After Service)">
                                                    <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
                                                </div>

                                                <div id="videoAfterMessage"></div>

                                                <div id="previewVideoAfter">
                                                    <script>
                                                        document.getElementById("videoAfter").addEventListener("change", function (event) {
                                                            const videoPreview = document.getElementById("previewVideoAfter");
                                                            videoPreview.innerHTML = "";
                                                            const files = event.target.files;
                                                            
                                                            for (let i = 0; i < files.length; i++) {
                                                                const file = files[i];
                                                                const video = document.createElement("video");
                                                                
                                                                video.controls = true;
                                                                video.style.width = "270px";
                                                                video.style.height = "200px";
                                                                video.style.margin = "10px";
                                                                
                                                                const source = document.createElement("source");
                                                                source.src = URL.createObjectURL(file);
                                                                source.type = file.type;
                                                                
                                                                video.appendChild(source);
                                                                videoPreview.appendChild(video);
                                                            }
                                                        });
                                                    </script>
                                                </div>
                                            </form>

                                            <div class="container">
                                                <div class="row" id="videoAfterService"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Status -->
                            <div class="tab-pane" id="pills-JobStatus" role="tabpanel" aria-labelledby="pills-JobStatus-tab">
                                <div class="container" id="jobStatusTab">
                                    <form id="techJobStatusForm">
                                        <input type="hidden" name="jobregister_id" id="jobregisterID_jobStatus">
                                        <input type="hidden" name="technician_departure" id="jobStatus_departure">
                                        <input type="hidden" name="technician_arrival" id="jobStatus_arrival">
                                        <input type="hidden" name="technician_leaving" id="jobStatus_leaving">
                                        
                                        <label for="job_statusChange" class="form-label fw-bold">Job Status</label>
                                        <div class="input-group mb-3">
                                            <select name="job_status" id="job_statusChange" class="form-select" onchange="myFunctionReason()">
                                                <option value=''></option>
                                                <option value='Doing'>Doing</option>
                                                <option value='Pending'>Pending</option>
                                                <option value='Incomplete'>Incomplete</option>
                                                <option value='Completed'>Completed</option>
                                            </select>
                                            
                                            <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Update</button>
                                        </div>
                                        
                                        <script>
                                            function myFunctionReason() {
                                                var status = document.getElementById("job_statusChange").value;
                                                var reasonDiv = document.getElementById("giveReason");
                                                var reasonInput = document.getElementById("reason");
                                                
                                                if (status === "Pending" || status === "Incomplete") {
                                                    reasonDiv.style.display = "block";
                                                    reasonInput.required = true;
                                                } 
                                                
                                                else {
                                                    reasonDiv.style.display = "none";
                                                    reasonInput.required = false;
                                                    reasonInput.value = "";
                                                }
                                            }
                                        </script>
                                        
                                        <div class="mb-3" id="giveReason" style="display: none;">
                                            <label for="reason" class="form-label fw-bold">Reason</label>
                                            <input type="text" name="reason" id="reason" class="form-control">
                                        </div>
                                        
                                        <div id="statusUpdateMessage"></div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Report -->
                            <div class="tab-pane" id="pills-Report" role="tabpanel" aria-labelledby="pills-Report-tab">
                                <div class="container" id="jobReportTab">
                                    <form id="techJobReportForm">
                                        <input type="hidden" name="jobregister_id" id="jobregisterID_jobReport">

                                        <label for="" class="form-label fw-bold">Service Report Date:</label>
                                        <div class="input-group mb-3">
                                            <input type="text" id="serviceReport_Date" class="form-control">
                                            <button type="button" class="NewServiceReport btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">New</button>
                                            <button type="button" class="EditServiceReport btn" style="border: none; background-color: #790604; color: #FFFFFF; width: fit-content;">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            // Fetch Username
            function fetchUsername() {
                $('#jobregistercreated_by').val(usernameValue);
                $('#jobregisterlastmodify_by').val(usernameValue);
            }

            // select2 Library
            $(document).ready(function() {
                var select2Elements = ['#serialnumber', '#brand_id', 
                                       '#machine_type', '#assign_JobInfo'];
                                       
                $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                    select2Elements.forEach(function(elementId) {
                        $(elementId).select2({
                            dropdownParent: $('#techJobInfoForm'),
                            matcher: oldMatcher(matchStart),
                            theme: 'bootstrap-5'
                        });
                    });
                });
                
                function matchStart(term, text) {
                    if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                        return true;
                    }
                    
                    return false;
                }
                
                var jobregister_id = $('#jobregisterID_jobInfo').val();
                
                if (jobregister_id) {
                    fetchJobInfoData(jobregister_id);
                }
            });
            
            // Fetch All Job Data
            function fetchAllJobData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            updateJobUpdateTab(res.data);
                            updateJobInfoTab(res.data);
                            updateJobAssignTab(res.data);
                            updateAssistantTab(res.assistant);
                            updateAccessoryTab(res.jobAccessories);
                            updatePhotoBeforeTab(res.photosBefore, jobregister_id);
                            updatePhotoAfterTab(res.photosAfter, jobregister_id);
                            updateVideoBeforeTab(res.videosBefore, jobregister_id);
                            updateVideoAfterTab(res.videosAfter, jobregister_id);
                            updateJobStatusTab(res.data);
                            updateJobReportTab(res.data);
                        }
                        
                        else {
                            console.log(res.message);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        console.error('Error fetching job data:', error);
                    }
                });
            }
            
            // Update Job Update Tab
            function updateJobUpdateTab(data) {
                $('#jobregisterID_jobUpdate').val(data.jobregister_id);
                $('#technician_departure').val(data.technician_departure);
                $('#technician_arrival').val(data.technician_arrival);
                $('#technician_leaving').val(data.technician_leaving);
                $('#tech_out').val(data.tech_out);
                $('#tech_in').val(data.tech_in);
            }
            
            // Update Job Info Tab
            function updateJobInfoTab(data) {
                $('#jobregisterID_jobInfo').val(data.jobregister_id);
                $('#job_priority').val(data.job_priority);
                $('#job_order_number').val(data.job_order_number);
                $('#job_name').val(data.job_name);
                $('#job_description').val(data.job_description);
                $('#requested_date').val(data.requested_date);
                $('#delivery_date').val(data.delivery_date);
                $('#customer_name').val(data.customer_name);
                $('#cust_address1').val(data.cust_address1);
                $('#cust_address2').val(data.cust_address2);
                $('#cust_address3').val(data.cust_address3);
                $('#customer_grade').val(data.customer_grade);
                $('#customer_PIC').val(data.customer_PIC);
                $('#cust_phone1').val(data.cust_phone1);
                $('#cust_phone2').val(data.cust_phone2);
                $('#serialnumber').val(data.serialnumber);
                $('#serialnumber').data('existing-value', data.serialnumber);
                $('#brand_id').val(data.brand_id).trigger('change');
                $('#brand_id').data('existing-value', data.brand_id);
                $('#machine_brand').val(data.machine_brand);
                $('#machine_type').val(data.machine_type).trigger('change');
                $('#machine_type').data('existing-value', data.machine_type);
                $('#type_id').val(data.type_id);
                $('#machine_name').val(data.machine_name);
                $('#machine_id').val(data.machine_id);
                $('#machine_code').val(data.machine_code);
                
                loadSerialNumbers(data.customer_name);
                loadMachineTypes(data.brand_id);
            }

            // Function to load serial numbers based on customer name
            function loadSerialNumbers(customer_name) {
                $.ajax({
                    url: "getMachineDetailsBySerial.php",
                    method: "POST",
                    data: { customer_name: customer_name },
                    
                    success: function (response) {
                        $('#serialnumber').html(response);
                        
                        let existingType = $('#serialnumber').data('existing-value');
                        
                        if (existingType) {
                            $('#serialnumber').val(existingType);
                        }
                    },
                    
                    error: function () {
                        console.error("Failed to load serial numbers.");
                    }
                });
            }
            
            // Auto-fill machine details based on selected serial number
            function loadMachineDetails(serialnumber) {
                var selectedOption = document.querySelector('#serialnumber option[value="' + serialnumber + '"]');
                
                if (selectedOption) {
                    var machNameValue = selectedOption.getAttribute('data-machName');
                    var machIDValue = selectedOption.getAttribute('data-machID');
                    var machCodeValue = selectedOption.getAttribute('data-machCode');
                    var brandIDValue = selectedOption.getAttribute('data-brandID');
                    var machBrandValue = selectedOption.getAttribute('data-machBrand');
                    var machTypeValue = selectedOption.getAttribute('data-machType');
                    var typeIDValue = selectedOption.getAttribute('data-typeID');
                    var brandSelect = document.querySelector('select[name="brand_id"]');
                    var typeSelect = document.querySelector('select[name="machine_type"]');
                    
                    brandSelect.value = brandIDValue;
                    typeSelect.value = machTypeValue;
                    
                    $(brandSelect).trigger('change');
                    $(typeSelect).trigger('change');
                    
                    document.querySelector('input[name="machine_name"]').value = machNameValue;
                    document.querySelector('input[name="machine_id"]').value = machIDValue;
                    document.querySelector('input[name="machine_code"]').value = machCodeValue;
                    document.querySelector('input[name="machine_brand"]').value = machBrandValue;
                    document.querySelector('input[name="type_id"]').value = typeIDValue;
                }
                
                else {
                    console.error('No matching option found for serial number:', serialnumber);
                }
            }

            function onBrandIDChange(brand_id) {
                GetBrandName(brand_id);
                loadMachineTypes(brand_id);
            }
            
            // Auto-fill machine_brand based on brand_id selection
            function GetBrandName(brand_id) {
                var selectedOption = document.querySelector('#brand_id option[value="' + brand_id + '"]');
                
                if (selectedOption) {
                    var brandNameValue = selectedOption.getAttribute('data-machBrand');
                    
                    document.querySelector('input[name="machine_brand"]').value = brandNameValue || '';
                }
                
                else {
                    console.error("No matching option found for brand_id:", brand_id);
                }
            }
            
            // Function to load machine types based on selected brand
            function loadMachineTypes(brand_id) {
                $.ajax({
                    url: "getMachineTypes.php",
                    method: "POST",
                    data: { brand_id: brand_id },
                    
                    success: function (response) {
                        $('#machine_type').html(response);
                        
                        let existingType = $('#machine_type').data('existing-value');
                        
                        if (existingType) {
                            $('#machine_type').val(existingType);
                        }
                    },
                    
                    error: function () {
                        console.error("Failed to load machine types.");
                    }
                });
            }

            // Auto-fill type_id and machine_name when machine_type changes
            function loadMachNameTypeID(type_id) {
                const selectedOption = $("#machine_type option[value='" + type_id + "']");
                
                if (selectedOption.length > 0) {
                    const machineName = selectedOption.data('machname');
                    const machineID = selectedOption.data('machid');
                    const machineCode = selectedOption.data('machcode');
                    
                    $('#machine_name').val(machineName);
                    $('#machine_id').val(machineID);
                    $('#machine_code').val(machineCode);
                }
                
                else {
                    console.error('No matching machine type found for type_id:', type_id);
                }
            }
            
            // Update Job Assign Tab
            function updateJobAssignTab(data) {
                $('#jobAssignData').html('<label for="" class="form-label fw-bold">Job Assign: ' + data.job_assign + '</label>');
                
                var currentDate = new Date();
                var formattedDate = ("0" + currentDate.getDate()).slice(-2) + "-" + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-" + currentDate.getFullYear();
                
                $('#jobregisterID_assistant').val(data.jobregister_id);
                $('#ass_date').val(data.DateAssign);
                $('#assistantDate').val(formattedDate);
                $('#cust_name').val(data.customer_name);
                $('#requestedDate').val(data.requested_date);
                $('#machineName').val(data.machine_name);
                $('#jobAssignAssistant').val(data.job_assign);
            }
            
            // Update Assistant
            function updateAssistantTab(assistantData) {
                var tableBody = $('#assistantTable tbody');
                    tableBody.empty();
                    
                if (assistantData && assistantData.length > 0) {
                    assistantData.forEach(function(assistant) {
                        var row = "<tr data-idAss='" + assistant.id + "'>" +
                                        "<td style='text-align: center; vertical-align: middle;'>" + assistant.username.replace(/\n/g, "<br>") + "</td>" +
                                        "<td style='text-align: center; vertical-align: middle;'><button class='delete-button btn fw-bold' style='color:red; border:none;'>Delete</button></td>" +
                                  "</tr>";
                            
                        tableBody.append(row);
                    });
                }
                
                else {
                    tableBody.append('<tr><td colspan="2" style="text-align: center;">No Assistant</td></tr>');
                }
            }

            // Update Accessory Tab
            function updateAccessoryTab(accessoriesData) {
                var tableBody = $('#accessoryTable tbody');
                    tableBody.empty();
                    
                if (accessoriesData && accessoriesData.length > 0) {
                    var counter = 1;
                    
                    accessoriesData.forEach(function (jobAccessories) {
                        var row = "<tr>" +
                                        "<td style='text-align: center;'>" + counter + "</td>" +
                                        "<td>" + jobAccessories.accessories_code + "</td>" +
                                        "<td>" + jobAccessories.accessories_name + "</td>" +
                                        "<td style='text-align: center;'>" + jobAccessories.accessories_uom + "</td>" +
                                        "<td style='text-align: center;'>" + jobAccessories.accessories_quantity + "</td>" +
                                  "</tr>";
                
                        tableBody.append(row);
                
                        counter++;
                    });
                }
                
                else {
                    tableBody.append('<tr><td style="text-align: center;" colspan="5">No Accessory</td></tr>');
                }
            }
            
            // Update Photo Before Tab
            function updatePhotoBeforeTab(photosBeforeData, jobregister_id) {
                $('#jobregisterID_photoBefore').val(jobregister_id);
                
                var photoCard = $('#photoBeforeService');
                    photoCard.empty();
                    
                    if (photosBeforeData && photosBeforeData.length > 0) {
                        photosBeforeData.forEach(function (photosBefore) {
                            var row = "<div class='photoBeforeContainer col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + photosBefore.id + "'>" +
                                            "<div class='card'>" +
                                                "<a href='image/" + photosBefore.file_name + "' download>" +
                                                    "<img src='image/" + photosBefore.file_name + "' class='rounded img-fluid' alt='Photo uploaded by technician'>" +
                                                "</a>" +
                                                "<button type='button' class='photoBeforeDelete btn position-absolute top-0 end-0 p-1' style='background-color:#D2042D;'><i class='iconify' data-icon='fa-regular:window-close' style='font-size:150%; color: white; font-weight:bold'></i></button>" +
                                            "</div>" +
                                      "</div>";
                
                            photoCard.append(row);
                        });
                    }
            }
            
            // Update Photo After Tab
            function updatePhotoAfterTab(photosAfterData, jobregister_id) {
                $('#jobregisterID_photoAfter').val(jobregister_id);

                var photoCardAfter = $('#photoAfterService');
                    photoCardAfter.empty();
                    
                if (photosAfterData && photosAfterData.length > 0) {
                    photosAfterData.forEach(function (photosAfter) {
                        var row = "<div class='photoAfterContainer col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + photosAfter.id + "'>" +
                                        "<div class='card'>" +
                                            "<a href='image/" + photosAfter.file_name + "' download>" +
                                                "<img src='image/" + photosAfter.file_name + "' class='rounded img-fluid' alt='Photo uploaded by technician'>" +
                                            "</a>" +
                                            "<button type='button' class='photoAfterDelete btn position-absolute top-0 end-0 p-1' style='background-color:#D2042D;'>" + "<i class='iconify' data-icon='fa-regular:window-close' style='font-size:150%; color: white; font-weight:bold'></i></button>" +
                                        "</div>" +
                                  "</div>";
                
                        photoCardAfter.append(row);
                    });
                }
            }
            
            // Update Video Before Tab
            function updateVideoBeforeTab(videosBeforeData, jobregister_id) {
                $('#jobregisterID_videoBefore').val(jobregister_id);

                var videoCard = $('#videoBeforeService');
                    videoCard.empty();
                    
                if (videosBeforeData && videosBeforeData.length > 0) {
                    videosBeforeData.forEach(function (videosBefore) {
                        var row = "<div class='videoBeforeContainer col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + videosBefore.id + "'>" +
                                        "<div class='card'>" +
                                            "<video class='rounded card-img-top' controls>" +
                                                "<source src='image/" + videosBefore.video_url + "' type='video/mp4'>" +
                                            "</video>" +
                                            "<button type='button' class='videoBeforeDeletebtn btn position-absolute top-0 end-0 p-1' style='background-color:#D2042D;'><i class='iconify' data-icon='fa-regular:window-close' style='font-size:150%; color: white; font-weight:bold'></i></button>" +
                                        "</div>" +
                                  "</div>";
                
                        videoCard.append(row);
                    });
                }
            }
            
            // Update Video After Tab
            function updateVideoAfterTab(videosAfterData, jobregister_id) {
                $('#jobregisterID_videoAfter').val(jobregister_id);

                var videoCardAfter = $('#videoAfterService');
                    videoCardAfter.empty();
                    
                if (videosAfterData && videosAfterData.length > 0) {
                    videosAfterData.forEach(function (videosAfter) {
                        var row = "<div class='videoAfterContainer col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + videosAfter.id + "'>" +
                                        "<div class='card'>" +
                                            "<video class='rounded card-img-top' controls>" +
                                                "<source src='image/" + videosAfter.video_url + "' type='video/mp4'>" +
                                            "</video>" +
                                            "<button type='button' class='videoAfterDeletebtn btn position-absolute top-0 end-0 p-1' style='background-color:#D2042D;'><i class='iconify' data-icon='fa-regular:window-close' style='font-size:150%; color: white; font-weight:bold'></i></button>" +
                                        "</div>" +
                                  "</div>";
                          
                        videoCardAfter.append(row);
                    });
                }
            }
            
            // Update Job Status Tab
            function updateJobStatusTab(data) {
                $('#jobregisterID_jobStatus').val(data.jobregister_id);
                $('#jobStatus_departure').val(data.technician_departure);
                $('#jobStatus_arrival').val(data.technician_arrival);
                $('#jobStatus_leaving').val(data.technician_leaving);
                $('#job_statusChange').val(data.job_status).trigger('change');
                $('#reason').val(data.reason);
            }
            
            // Update Job Report Tab
            function updateJobReportTab(data) {
                $('#jobregisterID_jobReport').val(data.jobregister_id);
                $('#serviceReport_Date').val(data.DateAssign);
            }
            
            // Fetch All Tab Data on Modal Open
            $(document).on('click', '.Job', function () {
                var jobregister_id = $(this).data('jobregisterid');
                
                fetchUsername();
                fetchAllJobData(jobregister_id);
                
                $('#popUpModal').modal('show');
            });
            
            // Hide respond message
            function hideElementById(elementId) {
                document.getElementById(elementId).style.display = "none";
            }
            
            // Update job update tab
            $(document).on('submit', '#techJobUpdateForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("update_jobUpdate", true);

                var jobregister_id = $("#jobregisterID_jobUpdate").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#JobUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("JobUpdateMessage");
                            }, 2000);
                        }
                        
                        else if (res.status === 500) {
                            $('#JobUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("JobUpdateMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#JobUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("JobUpdateMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            
            // Update job info tab
            $(document).on('submit', '#techJobInfoForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("update_jobInfo", true);

                var jobregister_id = $("#jobregisterID_jobInfo").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#JobInfoMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("JobInfoMessage");
                            }, 2000);
                        }
                        
                        else if (res.status === 500) {
                            $('#JobInfoMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("JobInfoMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#JobInfoMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("JobInfoMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            
            // Add Assistant
            $(document).on('submit', '#techJobAssistantForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("submit_Assistant", true);

                var jobregister_id = $("#jobregisterID_assistant").val();

                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false, 
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        console.log("Received Data:", res.assistant);
                       
                        if (res.status === 200) {
                            $('#assistantMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            $('#username').val(null).trigger('change');

                            setTimeout(function () {
                                hideElementById("assistantMessage");
                            }, 2000);

                            updateAssistantTab(res.assistant);                            
                        } 
                        
                        else if (res.status === 500) {
                            $('#assistantMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            $('#username').val(null).trigger('change');

                            setTimeout(function () {
                                hideElementById("assistantMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#assistantMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        $('#username').val(null).trigger('change');
                        
                        setTimeout(function () {
                            hideElementById("assistantMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);                        
                    }
                });
            });

            // Delete Assistant
            $('#assistantTable').on('click', '.delete-button', function() {
                var row = $(this).closest('tr');
                var assistantId = row.data('idass');
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: {idAss: assistantId},
                    
                    success: function(response) {
                        try {
                            var res = JSON.parse(response);
                            
                            if (res.status === 200) {
                                row.remove();
                            }
                            
                            else {
                                console.error("Failed to delete assistant:", res.message);
                            }
                        }
                        
                        catch (e) {
                            console.error("Error parsing JSON:", e);
                        }
                    },
                    
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                    }
                });
            });

            // Upload Photo Before
            $(document).on('submit', '#techJobPhotoBeforeForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("upload_photoBefore", true);

                var jobregister_id = $("#jobregisterID_photoBefore").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#photoBeforeMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                        }
                        
                        else if (res.status === 500) {
                            $('#photoBeforeMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                        }
                        
                        $('#previewPhotoBefore').empty();
                        $('#techJobPhotoBeforeForm')[0].reset();

                        setTimeout(function () {
                            hideElementById("photoBeforeMessage");
                        }, 2000);

                        updatePhotoBeforeTab(res.photosBefore, jobregister_id);
                    },
                    
                    error: function (xhr, status, error) {
                        $('#photoBeforeMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        $('#previewPhotoBefore').empty();
                        $('#techJobPhotoBeforeForm')[0].reset();
                        
                        setTimeout(function () {
                            hideElementById("photoBeforeMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });

            // Delete Photo Before
            $('#photoBeforeService').on('click', '.photoBeforeDelete', function () {
                var photoBefore = $(this).closest('.photoBeforeContainer');
                var photoId = photoBefore.data('id');
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: {'delete_photoBefore': true,
                           'id': photoId},
                           
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            photoBefore.remove();
                        }
                        
                        else {
                            console.log("Error deleting assistant.");
                        }
                    }
                });
            });
            
            // Upload Photo After
            $(document).on('submit', '#techJobPhotoAfterForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("upload_photoAfter", true);

                var jobregister_id = $("#jobregisterID_photoAfter").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#photoAfterMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                        }
                        
                        else if (res.status === 500) {
                            $('#photoAfterMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                        }
                        
                        $('#previewPhotoAfter').empty();
                        $('#techJobPhotoBeforeForm')[0].reset();
                        
                        setTimeout(function () {
                            $('#photoAfterMessage').hide();
                        }, 2000);

                        updatePhotoAfterTab(res.photosAfter, jobregister_id);
                    },
                    
                    error: function (xhr, status, error) {
                        $('#photoAfterMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        $('#previewPhotoAfter').empty();
                        $('#techJobPhotoAfterForm')[0].reset();
                        
                        setTimeout(function () {
                            hideElementById("photoAfterMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });

            // Delete Photo After
            $('#photoAfterService').on('click', '.photoAfterDelete', function () {
                var photoAfter = $(this).closest('.photoAfterContainer');
                var photoIdAfter = photoAfter.data('id');
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: {'delete_photoAfter': true,
                           'id': photoIdAfter},
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            photoAfter.remove();
                        }
                        
                        else {
                            console.log("Error deleting assistant.");
                        }
                    }
                });
            });
            
            // Upload Video Before
            $(document).on('submit', '#techJobVideoBeforeForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("upload_videoBefore", true);
            
                var jobregister_id = $("#jobregisterID_videoBefore").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#videoBeforeMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                        }
                        
                        else if (res.status === 500) {
                            $('#videoBeforeMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                        }
                        
                        $('#previewVideoBefore').empty();
                        $('#techJobVideoBeforeForm')[0].reset();
                        
                        setTimeout(function () {
                            hideElementById("videoBeforeMessage");
                        }, 2000);
                        
                        updateVideoBeforeTab(res.videosBefore, jobregister_id)
                    },
                    
                    error: function (xhr, status, error) {
                        $('#videoBeforeMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        $('#previewVideoBefore').empty();
                        $('#techJobVideoBeforeForm')[0].reset();
                        
                        setTimeout(function () {
                            hideElementById("videoBeforeMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            
            // Delete Video Before
            $('#videoBeforeService').on('click', '.videoBeforeDeletebtn', function () {
                var videoBefore = $(this).closest('.videoBeforeContainer');
                var videoIdBefore = videoBefore.data('id');
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: {'delete_videoBefore': true,
                           'id': videoIdBefore},
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            videoBefore.remove();
                        }
                        
                        else {
                            console.log("Error deleting video.");
                        }
                    }
                });
            });
            
            // Upload Video After
            $(document).on('submit', '#techJobVideoAfterForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("upload_videoAfter", true);

                var jobregister_id = $("#jobregisterID_videoAfter").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#videoAfterMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                        }
                        
                        else if (res.status === 500) {
                            $('#videoAfterMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                        }
                        
                        $('#previewVideoAfter').empty();
                        $('#techJobVideoAfterForm')[0].reset();
                        
                        setTimeout(function () {
                            hideElementById("videoAfterMessage");
                        }, 2000);
                        
                        updateVideoAfterTab(res.videosAfter, jobregister_id)
                    },
                    
                    error: function (xhr, status, error) {
                        $('#videoAfterMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        $('#previewVideoAfter').empty();
                        $('#techJobVideoAfterForm')[0].reset();
                        
                        setTimeout(function () {
                            hideElementById("videoAfterMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            
            // Delete Video After
            $('#videoAfterService').on('click', '.videoAfterDeletebtn', function () {
                var videoAfter = $(this).closest('.videoAfterContainer');
                var videoIdAfter = videoAfter.data('id');
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: {'delete_videoAfter': true,
                           'id': videoIdAfter},
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            videoAfter.remove();
                        }
                        
                        else {
                            console.log("Error deleting video.");
                        }
                    }
                });
            });
            
            // Update job status tab
            $(document).on('submit', '#techJobStatusForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("update_jobStatus", true);

                var jobregister_id = $("#jobregisterID_jobStatus").val();
                var technician_departure = $("#jobStatus_departure").val();
                var technician_arrival = $("#jobStatus_arrival").val();
                var technician_leaving = $("#jobStatus_leaving").val();
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#statusUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p');
                            
                            setTimeout(function () {
                                hideElementById("statusUpdateMessage");
                            }, 2000);
                        }
                        
                        else if (res.status === 400) {
                            $('#statusUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: #C41E3A; display:block;">' + res.message + '</p');
                            
                            setTimeout(function () {
                                hideElementById("statusUpdateMessage");
                            }, 3000);
                        }
                        
                        else if (res.status === 500) {
                            $('#statusUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p');
                            
                            setTimeout(function () {
                                hideElementById("statusUpdateMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#statusUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("statusUpdateMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            
            // New Service Report
            function newServiceReport(jobregister_id) {
                $.ajax({
                    url: 'servicereport.php',
                    type: 'POST',
                    data: {jobregister_id: jobregister_id},
                    
                    success: function (data) {
                        var win = window.open('servicereport.php');
                            win.document.write(data);
                    },
                    
                    error: function (xhr, status, error) {
                        console.error("AJAX request error: " + error);
                    }
                });
            }
            
            $('.NewServiceReport').click(function () {
                var jobregister_id = $("#jobregisterID_jobReport").val();
                
                newServiceReport(jobregister_id);
            });
            
            // Edit Service Report
            function editServiceReport(jobregister_id) {
                $.ajax({
                    url: 'servicereportEDIT.php',
                    type: 'POST',
                    data: { jobregister_id: jobregister_id },
                    
                    success: function (data) {
                        var win = window.open('servicereportEDIT.php');
                            win.document.write(data);
                    },
                    
                    error: function (xhr, status, error) {
                        console.error("AJAX request error: " + error);
                    }
                });
            }
            
            $('.EditServiceReport').click(function () {
                var jobregister_id = $("#jobregisterID_jobReport").val();
                
                editServiceReport(jobregister_id);
            });
        </script>
		<!-- End of Popup Modal -->

        <!-- Completed Popup Modal -->
        <div class="modal fade" id="completedPopupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <ul class="nav nav-pills mb-3" id="pills-tab-Completed" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active p-1 me-1 fw-bold" id="pills-UpdateCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-UpdateCompleted" type="button" role="tab" aria-controls="pills-UpdateCompleted" aria-selected="true">Update</button>
                            </li>

                            <li class="nav-item" role="presentation">
                              <button class="nav-link p-1 me-1 fw-bold" id="pills-JobInfoCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-JobInfoCompleted" type="button" role="tab" aria-controls="pills-JobInfoCompleted" aria-selected="false">Job Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                              <button class="nav-link p-1 me-1 fw-bold" id="pills-JobAssignCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-JobAssignCompleted" type="button" role="tab" aria-controls="pills-JobAssignCompleted" aria-selected="false">Job Assign</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 me-1 fw-bold" id="pills-AccessoriesCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-AccessoriesCompleted" type="button" role="tab" aria-controls="pills-AccessoriesCompleted" aria-selected="false">Accessories</button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 me-1 fw-bold" id="pills-PhotoCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-PhotoCompleted" type="button" role="tab" aria-controls="pills-PhotoCompleted" aria-selected="false">Photo</button>
                            </li>
                              
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 me-1 fw-bold" id="pills-VideoCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-VideoCompleted" type="button" role="tab" aria-controls="pills-VideoCompleted" aria-selected="false">Video</button>
                            </li>
                              
                            <li class="nav-item" role="presentation">
                                <button class="nav-link p-1 me-1 fw-bold" id="pills-ReportCompleted-tab" data-bs-toggle="pill" data-bs-target="#pills-ReportCompleted" type="button" role="tab" aria-controls="pills-ReportCompleted" aria-selected="false">Report</button>
                            </li>
                        </ul>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="tab-content" id="pills-tabContent-Completed">
                            <!-- Update -->
                            <div class="tab-pane show active" id="pills-UpdateCompleted" role="tabpanel" aria-labelledby="pills-UpdateCompleted-tab">
                                <div class="container">
                                    <!-- Departure Time -->
                                    <label for="" class="form-label fw-bold">Departure Time</label>
                                    <input type="text" name="technician_departure" id="techdeparture_completed" class="form-control mb-3" readonly>
                                    
                                    <!-- Arrival Time -->
                                    <label for="" class="form-label fw-bold">Time At Site</label>
                                    <input type="text" name="technician_arrival" id="techarrival_completed" class="form-control mb-3" readonly>
                                    
                                    <!-- Leaving Time -->
                                    <label for="" class="form-label fw-bold">Return Time</label>
                                    <input type="text" name="technician_leaving" id="techleaving_completed" class="form-control mb-3" readonly>
                                    
                                    <!-- Rest Time -->
                                    <label for="" class="form-label fw-bold">Rest Hour</label>
                                    <div class="d-grid gap-3 mb-3">
                                        <!-- Rest Out -->
                                        <input type="text" name="tech_out" id="techOut_completed" class="form-control" readonly>
                                        <!-- Rest In -->
                                        <input type="text" name="tech_in" id="techIn_completed" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Info -->
                            <div class="tab-pane" id="pills-JobInfoCompleted" role="tabpanel" aria-labelledby="pills-JobInfoCompleted-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Job Priority</label>
                                            <input type="text" name="job_priority" id="jobPriority_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Job Order Number</label>
                                            <input type="text" name="job_order_number" id="JON_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Job Name</label>
                                            <input type="text" name="job_name" id="jobName_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Job Description</label>
                                            <input type="text" name="job_description" id="jobDesc_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Requested Date</label>
                                            <input type="text" name="requested_date" id="reqDate_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Delivery Date</label>
                                            <input type="text" name="delivery_date" id="delDate_completed" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="fw-bold mb-2">Customer Name</label>
                                            <input type="text" name="customer_name" id="custName_completed" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Customer Address</label>
                                            <input type="text" name="cust_address1" id="custAddr1_completed" class="form-control" readonly>
                                            <div class="d-grid d-flex gap-2 mt-2">
                                                <input type="text" name="cust_address2" id="custAddr2_completed" class="form-control" readonly>
                                                <input type="text" name="cust_address3" id="custAddr3_completed" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Customer Grade</label>
                                            <input type="text" name="customer_grade" id="custGrade_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Customer PIC</label>
                                            <input type="text" name="customer_PIC" id="custPIC_completed" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Customer Phone Number</label>
                                            <div class="d-grid d-flex gap-2 mt-2">
                                                <input type="text" name="cust_phone1" id="custPhone1_completed" class="form-control" readonly>
                                                <input type="text" name="cust_phone2" id="custPhone2_completed" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Machine Brand</label>
                                            <input type="text" name="machine_brand" id="machBrand_completed" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Machine Type</label>
                                            <input type="text" name="machine_type" id="machType_completed" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Machine Name</label>
                                            <input type="text" name="machine_name" id="machName_completed" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Serial Number</label>
                                            <input type="text" name="serialnumber" id="serNum_completed" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Assign -->
                            <div class="tab-pane" id="pills-JobAssignCompleted" role="tabpanel" aria-labelledby="pills-JobAssignCompleted-tab">
                                <div class="container">
                                    <div class="card mb-3">
                                        <div class="card-body" id="jobAsgn_completed"></div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold">Assistant</label>
                                            
                                            <div class="table-responsive mb-3">
                                                <table class="table border table-borderless table-striped" id="assistant_completed">
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Accessories -->
                            <div class="tab-pane" id="pills-AccessoriesCompleted" role="tabpanel" aria-labelledby="pills-AccessoriesCompleted-tab">
                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="accessory_completed">
                                            <thead>
                                                <tr>
                                                    <th style='text-align: center;'>No</th>
                                                    <th style='text-align: center;'>Code</th>
                                                    <th style='text-align: center;'>Name</th>
                                                    <th style='text-align: center;'>UOM</th>
                                                    <th style='text-align: center;'>Quantity</th>
                                                </tr>
                                            </thead>

                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Photo -->
                            <div class="tab-pane" id="pills-PhotoCompleted" role="tabpanel" aria-labelledby="pills-PhotoCompleted-tab">
                                <div class="container">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold">Photo Before Service</label>
                                            <div class="container">
                                                <div class="row" id="photoBefore_completed"></div>
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold" >Photo After Service</label>
                                            <div class="container">
                                                <div class="row" id="photoAfter_completed"></div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Video -->
                            <div class="tab-pane" id="pills-VideoCompleted" role="tabpanel" aria-labelledby="pills-VideoCompleted-tab">
                                <div class="container">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold" >Video Before Service</label>
                                            
                                            <div class="container">
                                                <div class="row" id="videoBefore_completed"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold" >Video After Service</label>
                                            
                                            <div class="container">
                                                <div class="row" id="videoAfter_completed"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Report -->
                            <div class="tab-pane" id="pills-ReportCompleted" role="tabpanel" aria-labelledby="pills-ReportCompleted-tab">
                                <div class="container">
                                    <label for="" class="form-label fw-bold">Service Report Date:</label>
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="jobregister_id" id="jobRegID_completed" class="form-control">
                                        <input type="text" name="DateAssign" id="DateAssign_completed" class="form-control">
                                        <button type="button" class="CompletedNewServiceReport btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">New</button>
                                        <button type="button" class="CompletedEditServiceReport btn" style="border: none; background-color: #790604; color: #FFFFFF; width: fit-content;">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Fetch completed job update, job info, job asssign and report
            function fetchCompletedJobData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            console.log(res.message);
                        } 
                        
                        else if (res.status == 200) {
                            // Job Update
                            $('#techdeparture_completed').val(res.data.technician_departure);
                            $('#techarrival_completed').val(res.data.technician_arrival);
                            $('#techleaving_completed').val(res.data.technician_leaving);
                            $('#techOut_completed').val(res.data.tech_out);
                            $('#techIn_completed').val(res.data.tech_in);

                            // Job Info
                            $('#jobPriority_completed').val(res.data.job_priority);
                            $('#JON_completed').val(res.data.job_order_number);
                            $('#jobName_completed').val(res.data.job_name);
                            $('#jobDesc_completed').val(res.data.job_description);
                            $('#reqDate_completed').val(res.data.requested_date);
                            $('#delDate_completed').val(res.data.delivery_date);
                            $('#custName_completed').val(res.data.customer_name);
                            $('#custAddr1_completed').val(res.data.cust_address1);
                            $('#custAddr2_completed').val(res.data.cust_address2);
                            $('#custAddr3_completed').val(res.data.cust_address3);
                            $('#custGrade_completed').val(res.data.customer_grade);
                            $('#custPIC_completed').val(res.data.customer_PIC);
                            $('#custPhone1_completed').val(res.data.cust_phone1);
                            $('#custPhone2_completed').val(res.data.cust_phone2);
                            $('#machBrand_completed').val(res.data.machine_brand);
                            $('#machType_completed').val(res.data.machine_type);
                            $('#machName_completed').val(res.data.machine_name);
                            $('#serNum_completed').val(res.data.serialnumber);

                            // Job Assign
                            $('#jobAsgn_completed').html('<label for="" class="form-label fw-bold">Job Assign: '+ res.data.job_assign +'</label>');

                            // Report
                            $('#DateAssign_completed').val(res.data.DateAssign);
                            $('#jobRegID_completed').val(res.data.jobregister_id);
                        }
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Completed Job Assistant Data
            function fetchCompletedAssistantData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var tableBodyCompleted = $('#assistant_completed tbody');
                        
                        tableBodyCompleted.empty();
                        
                        if (res.status == 200) {
                            var assistantData = res.assistant;
                    
                            if (assistantData.length > 0) {
                                assistantData.forEach(function (assistant) {
                                    var row = "<tr data-id='" + assistant.id + "'>" +
                                                "<td style='text-align: center; vertical-align: middle;'>" + assistant.username + "</td>" +
                                              "</tr>";

                                    tableBodyCompleted.append(row);
                                });
                            } 
                            
                            else {
                                tableBodyCompleted.append('<tr><td style="text-align: center;">No Assistant</td></tr>');
                            }
                        } 
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Completed Accessory Data
            function fetchCompletedAccessoryData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var tableBodyCompleted = $('#accessory_completed tbody');
                        
                        tableBodyCompleted.empty();
                        
                        if (res.status == 200) {
                            var accessoriesData = res.jobAccessories;
                            
                            if (accessoriesData.length > 0) {
                                var counter = 1;
                                
                                accessoriesData.forEach(function (jobAccessories) {
                                    var row = "<tr>" +
                                                "<td style='text-align: center;'>" + counter + "</td>" +
                                                "<td>" + jobAccessories.accessories_code + "</td>" +
                                                "<td>" + jobAccessories.accessories_name + "</td>" +
                                                "<td style='text-align: center;'>" + jobAccessories.accessories_uom + "</td>" +
                                                "<td style='text-align: center;'>" + jobAccessories.accessories_quantity + "</td>" +
                                              "</tr>";
                                    
                                    tableBodyCompleted.append(row);
                                    counter++;
                                });
                            } 
                            
                            else {
                                tableBodyCompleted.append('<tr><td style="text-align: center;" colspan="5">No Accessory</td></tr>');
                            }
                        } 
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Completed Photo Before Service Data
            function fetchCompletedPhotoBeforeData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var photoCard = $('#photoBefore_completed');
                    
                        photoCard.empty();
                        
                        if (res.status == 200) {
                            var photosBeforeData = res.photosBefore;
                            
                            if (photosBeforeData.length > 0) {
                                
                                photosBeforeData.forEach(function (photosBefore) {
                                    var row = "<div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-3'>" +
                                                "<div class='card'>" +
                                                    "<a href='image/" + photosBefore.file_name + "' download>" +
                                                        "<img src='image/" + photosBefore.file_name + "' class='rounded img-fluid' alt='Photo uploaded by technician'>" +
                                                    "</a>" +
                                                "</div>" +
                                              "</div>";

                                    photoCard.append(row);
                                });
                            } 
                        } 
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Completed Photo After Service Data
            function fetchCompletedPhotoAfterData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var photoCardAfter = $('#photoAfter_completed');
                        
                        photoCardAfter.empty();
                        
                        if (res.status == 200) {
                            var photosAfterData = res.photosAfter;
                            
                            if (photosAfterData.length > 0) {
                                
                                photosAfterData.forEach(function (photosAfter) {
                                    var row = "<div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + photosAfter.id + "'>" +
                                                "<div class='card'>" +
                                                    "<a href='image/" + photosAfter.file_name + "' download>" +
                                                        "<img src='image/" + photosAfter.file_name + "' class='rounded img-fluid' alt='Photo uploaded by technician'>" +
                                                    "</a>" +
                                                "</div>" +
                                              "</div>";
                                    
                                    photoCardAfter.append(row);
                                });
                            } 
                        } 
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Completed Video Before Service Data
            function fetchCompletedVideoBeforeData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var videoCard = $('#videoBefore_completed');
                        
                        videoCard.empty();
                        
                        if (res.status == 200) {
                            var videosBeforeData = res.videosBefore;
                            
                            if (videosBeforeData.length > 0) {
                                
                                videosBeforeData.forEach(function (videosBefore) {
                                    var row = "<div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + videosBefore.id + "'>" +
                                                "<div class='card'>" +
                                                    "<video class='rounded card-img-top' controls>" +
                                                        "<source src='image/" + videosBefore.video_url + "' type='video/mp4'>" +
                                                    "</video>" +
                                                "</div>" +
                                              "</div>";

                                    videoCard.append(row);
                                });
                            } 
                        } 
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Completed Video After Service Data
            function fetchCompletedVideoAfterData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var videoCardAfter = $('#videoAfter_completed');
                        
                        videoCardAfter.empty();
                        
                        if (res.status == 200) {
                            var videosAfterData = res.videosAfter;
                            
                            if (videosAfterData.length > 0) {
                                
                                videosAfterData.forEach(function (videosAfter) {
                                    var row = "<div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-3' data-id='" + videosAfter.id + "'>" +
                                                "<div class='card'>" +
                                                    "<video class='rounded card-img-top' controls>" +
                                                        "<source src='image/" + videosAfter.video_url + "' type='video/mp4'>" +
                                                    "</video>" +
                                                "</div>" +
                                              "</div>";
                                    
                                    videoCardAfter.append(row);
                                });
                            } 
                        } 
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            $(document).on('click', '.JobCompleted', function () {
                var jobregister_id = $(this).data('jobregisterid');
                
                fetchCompletedJobData(jobregister_id)
                fetchCompletedAssistantData(jobregister_id)
                fetchCompletedAccessoryData(jobregister_id)
                fetchCompletedPhotoBeforeData(jobregister_id)
                fetchCompletedPhotoAfterData(jobregister_id)
                fetchCompletedVideoBeforeData(jobregister_id)
                fetchCompletedVideoAfterData(jobregister_id)
            
                $('#completedPopupModal').modal('show');
            });

            // Completed New Service Report
            function newServiceReportCompleted(jobregister_id) {
                $.ajax({
                    url: 'servicereport.php',
                    type: 'POST',
                    data: {jobregister_id: jobregister_id},
                    
                    success: function (data) {
                        var win = window.open('servicereport.php');
                        win.document.write(data);
                    },
                    
                    error: function (xhr, status, error) {
                        console.error("AJAX request error: " + error);
                    }
                });
            }
            
            $('.CompletedNewServiceReport').click(function () {
                var jobregister_id = $("#jobRegID_completed").val();
                
                newServiceReportCompleted(jobregister_id);
            });

            // Completed Edit Service Report
            function editServiceReportCompleted(jobregister_id) {
                $.ajax({
                    url: 'servicereportEDIT.php',
                    type: 'POST',
                    data: {jobregister_id: jobregister_id},
                    
                    success: function (data) {
                        var win = window.open('servicereportEDIT.php');
                        win.document.write(data);
                    },
                    
                    error: function (xhr, status, error) {
                        console.error("AJAX request error: " + error);
                    }
                });
            }
            
            $('.CompletedEditServiceReport').click(function () {
                var jobregister_id = $("#jobRegID_completed").val();
                
                editServiceReportCompleted(jobregister_id);
            });
        </script>
		<!-- End of Completed Popup Modal -->

        <!-- Support Popup Modal -->
        <div class="modal fade" id="supportPopupModal" tabindex="-1" aria-labelledby="supportPopupModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="supportPopupModalLabel">Support</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="container">
                            <form id="jobSupportForm">
                                <input type="hidden" name="today_date" id="todayDate_Support">
                                <input type="hidden" name="accessories_required" id="accsReq_Support">
                                <input type="hidden" name="accessories_for" id="accsFor_Support">
                                <input type="hidden" name="support" id="support">
                            
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Priority</label>
                                        <input type="text" name="job_priority" id="jobPriority_Support" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Order Number</label>
                                        <input type="text" name="job_order_number" id="JON_Support" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Name</label>
                                        <input type="text" name="job_name" id="jobName_Support" class="form-control" readonly>
                                        <input type="hidden" name="job_code" id="jobCode_Support">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Description</label>
                                        <input type="text" name="job_description" id="jobDesc_Support" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Requested Date</label>
                                        <input type="text" name="requested_date" id="reqDate_Support" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Delivery Date</label>
                                        <input type="text" name="delivery_date" id="delDate_Support" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Customer Name</label>
                                        <input type="text" name="customer_name" id="custName_Support" class="form-control" readonly>
                                        <input type="hidden" name="customer_code" id="custCode_Support">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Customer Address</label>
                                        <input type="text" name="cust_address1" id="custAddr1_Support" class="form-control" readonly>
                                        <div class="d-grid d-flex gap-2 mt-2">
                                            <input type="text" name="cust_address2" id="custAddr2_Support" class="form-control" readonly>
                                            <input type="text" name="cust_address3" id="custAddr3_Support" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Customer Grade</label>
                                        <input type="text" name="customer_grade" id="custGrade_Support" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Customer PIC</label>
                                        <input type="text" name="customer_PIC" id="custPIC_Support" class="form-control" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Customer Phone Number</label>
                                        <div class="d-grid d-flex gap-2 mt-2">
                                            <input type="text" name="cust_phone1" id="custPhone1_Support" class="form-control" readonly>
                                            <input type="text" name="cust_phone2" id="custPhone2_Support" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Machine Brand</label>
                                        <input type="text" name="machine_brand" id="machBrand_Support" class="form-control" readonly>
                                        <input type="hidden" name="brand_id" id="brandID_Support">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Machine Type</label>
                                        <input type="text" name="machine_type" id="machType_Support" class="form-control" readonly>
                                        <input type="hidden" name="type_id" id="typeID_Support">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Machine Name</label>
                                        <input type="text" name="machine_name" id="machName_Support" class="form-control" readonly>
                                        <input type="hidden" name="machine_id" id="machID_Support">
                                        <input type="hidden" name="machine_code" id="machCode_Support">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Serial Number</label>
                                        <input type="text" name="serialnumber" id="serNum_Support" class="form-control" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Ask support from:</label>
                                        <select name="job_assign" id="jobAss_Support" onchange="GetAssignDetails(this.value)" class="form-select">
                                            <?php
                                            
                                                include "dbconnect.php";
                                            
                                                $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' AND tech_avai = '0' ORDER BY username ASC");
                                            
                                                echo "<option value=''>Select Technician</option>";
                                            
                                                if (mysqli_num_rows($records) > 0) {
                                                    while ($data = mysqli_fetch_array($records)) {
                                                        echo "<option value='" . $data['username'] . "'
                                                                      data-rank='". $data['technician_rank'] ."'
                                                                      data-position='". $data['staff_position'] ."'>" . $data['username'] . "</option>";
                                                    }
                                                } 
                                            
                                                else {
                                                    echo "No Record Found";
                                                }
                                            
                                                mysqli_close($conn);
                                            ?>
                                        </select>

                                        <script>
                                            $(document).ready(function() {
                                                $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                                    $("#jobAss_Support").select2({
                                                        dropdownParent: $('#jobSupportForm'),
                                                        matcher: oldMatcher(matchStart),
                                                        theme: 'bootstrap-5'
                                                    })
                                                });
                                                
                                                function matchStart (term, text) {
                                                    if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                                                        return true;
                                                    }
                                                    
                                                    return false;
                                                }
                                            });
                                        </script>
                                        
                                        <script>
                                            function GetAssignDetails(value) {
                                                var selectedOption = document.querySelector('#jobAss_Support option[value="' + value + '"]');
                                                var rank = selectedOption.getAttribute('data-rank');
                                                var position = selectedOption.getAttribute('data-position');
                            
                                                document.querySelector('input[name="technician_rank"]').value = rank;
                                                document.querySelector('input[name="staff_position"]').value = position;
                                            }
                                        </script>
                                        
                                        <input type="hidden" name="technician_rank" id="techRank_Support">
                                        <input type="hidden" name="staff_position" id="staffPos_Support">
                                    </div>

                                    <input type="hidden" name="jobregistercreated_by" id="jobRegBy_Support">
                                    <input type="hidden" name="jobregisterlastmodify_by" id="jobLastModBy_Support">

                                    <div class="mb-3 mt-3">
                                        <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width:100%">Submit</button>
                                    </div>

                                    <div id="jobSupportMessage"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Get Support Job Info Value
            function fetchJobInfoDataSupport(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            console.log(res.message);
                        } 
                        
                        else if (res.status == 200) {
                            $('#todayDate_Support').val(new Date().toISOString().slice(0, 10));
                            $('#accsReq_Support').val(res.data.accessories_required);
                            $('#accsFor_Support').val(res.data.accessories_for);
                            $('#support').val('Support for ' + res.data.job_assign);
                            $('#jobPriority_Support').val(res.data.job_priority);
                            $('#JON_Support').val(res.data.job_order_number + -1);
                            $('#jobName_Support').val(res.data.job_name);
                            $('#jobCode_Support').val(res.data.job_code);
                            $('#jobDesc_Support').val(res.data.job_description);
                            $('#reqDate_Support').val(res.data.requested_date);
                            $('#delDate_Support').val(res.data.delivery_date);
                            $('#custName_Support').val(res.data.customer_name);
                            $('#custCode_Support').val(res.data.customer_code);
                            $('#custAddr1_Support').val(res.data.cust_address1);
                            $('#custAddr2_Support').val(res.data.cust_address2);
                            $('#custAddr3_Support').val(res.data.cust_address3);
                            $('#custGrade_Support').val(res.data.customer_grade);
                            $('#custPIC_Support').val(res.data.customer_PIC);
                            $('#custPhone1_Support').val(res.data.cust_phone1);
                            $('#custPhone2_Support').val(res.data.cust_phone2);
                            $('#machBrand_Support').val(res.data.machine_brand);
                            $('#brandID_Support').val(res.data.brand_id);
                            $('#machType_Support').val(res.data.machine_type);
                            $('#typeID_Support').val(res.data.type_id);
                            $('#machName_Support').val(res.data.machine_name);
                            $('#machID_Support').val(res.data.machine_id);
                            $('#machCode_Support').val(res.data.machine_code);
                            $('#serNum_Support').val(res.data.serialnumber);
                            $('#jobAss_Support').val(res.data.job_assign).trigger('change');
                            $('#techRank_Support').val(res.data.technician_rank);
                            $('#staffPos_Support').val(res.data.staff_position);
                            $('#jobRegBy_Support').val(usernameValue);
                            $('#jobLastModBy_Support').val(usernameValue);
                        }
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Support Job info data
            $(document).on('click', '.JobSupport.btn', function () {
                var jobregister_id = $(this).data('supportid');
                
                fetchJobInfoDataSupport(jobregister_id)
            
                $('#supportPopupModal').modal('show');
            });

            // Hide respond message
            function hideElementById(elementId) {
                document.getElementById(elementId).style.display = "none";
            }

            // Submit Support form to database
            $(document).on('submit', '#jobSupportForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("submit_jobSupport", true);

                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false, 
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);

                        if (res.status === 200) {
                            $('#jobSupportMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("jobSupportMessage");
                            }, 2000);
                        } 
                        
                        else if (res.status === 500) {
                            $('#jobSupportMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("jobSupportMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#jobSupportMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("jobSupportMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        </script>
		<!-- End of Support Popup Modal -->

        <!-- Duplicate Popup Modal -->
        <div class="modal fade" id="DuplicatePopupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Duplicate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="container">
                            <form id="jobDuplicateForm">
                                <input type="hidden" name="today_date" id="todayDate_Duplicate">
                                <input type="hidden" name="accessories_required" id="accsReq_Duplicate">
                                <input type="hidden" name="accessories_for" id="accsFor_Duplicate">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Priority</label>
                                        <input type="text" name="job_priority" id="jobPriority_Duplicate" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Order Number</label>
                                        <input type="text" name="job_order_number" id="JON_Duplicate" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Name</label>
                                        <input type="text" name="job_name" id="jobName_Duplicate" class="form-control">
                                        <input type="hidden" name="job_code" id="jobCode_Duplicate">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Description</label>
                                        <input type="text" name="job_description" id="jobDesc_Duplicate" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Requested Date</label>
                                        <input type="text" name="requested_date" id="reqDate_Duplicate" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Delivery Date</label>
                                        <input type="text" name="delivery_date" id="delDate_Duplicate" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Customer Name</label>
                                        <input type="text" name="customer_name" id="custName_Duplicate" class="form-control">
                                        <input type="hidden" name="customer_code" id="custCode_Duplicate">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Customer Address</label>
                                        <input type="text" name="cust_address1" id="custAddr1_Duplicate" class="form-control">
                                        <div class="d-grid d-flex gap-2 mt-2">
                                            <input type="text" name="cust_address2" id="custAddr2_Duplicate" class="form-control">
                                            <input type="text" name="cust_address3" id="custAddr3_Duplicate" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Customer Grade</label>
                                        <input type="text" name="customer_grade" id="custGrade_Duplicate" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Customer PIC</label>
                                        <input type="text" name="customer_PIC" id="custPIC_Duplicate" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Customer Phone Number</label>
                                        <div class="d-grid d-flex gap-2 mt-2">
                                            <input type="text" name="cust_phone1" id="custPhone1_Duplicate" class="form-control">
                                            <input type="text" name="cust_phone2" id="custPhone2_Duplicate" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Machine Brand</label>
                                        <input type="text" name="machine_brand" id="machBrand_Duplicate" class="form-control">
                                        <input type="hidden" name="brand_id" id="brandID_Duplicate">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Machine Type</label>
                                        <input type="text" name="machine_type" id="machType_Duplicate" class="form-control">
                                        <input type="hidden" name="type_id" id="typeID_Duplicate">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label fw-bold">Machine Name</label>
                                        <input type="text" name="machine_name" id="machName_Duplicate" class="form-control">
                                        <input type="hidden" name="machine_id" id="machID_Duplicate">
                                        <input type="hidden" name="machine_code" id="machCode_Duplicate">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Serial Number</label>
                                        <input type="text" name="serialnumber" id="serNum_Duplicate" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label fw-bold">Job Assign To:</label>
                                       
                                        <select name="job_assign" id="jobAss_Duplicate" onchange="GetAssignDuplicateDetails(this.value)" class="form-select">
                                            <?php
                                            
                                                include "dbconnect.php";
                                            
                                                $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' AND tech_avai = '0' ORDER BY username ASC");
                                            
                                                echo "<option value=''>Select Technician</option>";
                                            
                                                if (mysqli_num_rows($records) > 0) {
                                                    while ($data = mysqli_fetch_array($records)) {
                                                        echo "<option value='" . $data['username'] . "'
                                                                      data-rankDup='". $data['technician_rank'] ."'
                                                                      data-positionDup='". $data['staff_position'] ."'>" . $data['username'] . "</option>";
                                                    }
                                                } 
                                            
                                                else {
                                                    echo "No Record Found";
                                                }
                                            
                                                mysqli_close($conn);
                                            ?>
                                        </select>

                                        <script>
                                            $(document).ready(function() {
                                                $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                                    $("#jobAss_Duplicate").select2({
                                                        dropdownParent: $('#jobDuplicateForm'),
                                                        matcher: oldMatcher(matchStart),
                                                        theme: 'bootstrap-5'
                                                    })
                                                });
                                                
                                                function matchStart (term, text) {
                                                    if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                                                        return true;
                                                    }
                                                    
                                                    return false;
                                                }
                                            });
                                        </script>
                                        
                                        <script>
                                            function GetAssignDuplicateDetails(value) {
                                                var selectedOption = document.querySelector('#jobAss_Duplicate option[value="' + value + '"]');
                                                var rankDup = selectedOption.getAttribute('data-rankDup');
                                                var positionDup = selectedOption.getAttribute('data-positionDup');
                            
                                                document.querySelector('input[name="technician_rank"]').value = rankDup;
                                                document.querySelector('input[name="staff_position"]').value = positionDup;
                                            }
                                        </script>

                                        <input type="hidden" name="technician_rank" id="techRank_Duplicate">
                                        <input type="hidden" name="staff_position" id="staffPos_Duplicate">
                                    </div>

                                    <input type="hidden" name="reason" id="reason_Duplicate">
                                    <input type="hidden" name="jobregistercreated_by" id="jobRegBy_Duplicate">
                                    <input type="hidden" name="jobregisterlastmodify_by" id="jobLastModBy_Duplicate">

                                    <div class="mb-3">
                                        <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width:100%">Update</button>
                                    </div>

                                    <div id="duplicateJobMessage"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Get Duplicate Job Info Value
            function fetchJobInfoDataDuplicate(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            console.log(res.message);
                        } 
                        
                        else if (res.status == 200) {
                            $('#todayDate_Duplicate').val(new Date().toISOString().slice(0, 10));
                            $('#accsReq_Duplicate').val(res.data.accessories_required);
                            $('#accsFor_Duplicate').val(res.data.accessories_for);
                            $('#jobPriority_Duplicate').val(res.data.job_priority);
                            $('#JON_Duplicate').val(res.data.job_order_number + -1);
                            $('#jobName_Duplicate').val(res.data.job_name);
                            $('#jobCode_Duplicate').val(res.data.job_code);
                            $('#jobDesc_Duplicate').val(res.data.job_description);
                            $('#reqDate_Duplicate').val(res.data.requested_date);
                            $('#delDate_Duplicate').val(res.data.delivery_date);
                            $('#custName_Duplicate').val(res.data.customer_name);
                            $('#custCode_Duplicate').val(res.data.customer_code);
                            $('#custAddr1_Duplicate').val(res.data.cust_address1);
                            $('#custAddr2_Duplicate').val(res.data.cust_address2);
                            $('#custAddr3_Duplicate').val(res.data.cust_address3);
                            $('#custGrade_Duplicate').val(res.data.customer_grade);
                            $('#custPIC_Duplicate').val(res.data.customer_PIC);
                            $('#custPhone1_Duplicate').val(res.data.cust_phone1);
                            $('#custPhone2_Duplicate').val(res.data.cust_phone2);
                            $('#machBrand_Duplicate').val(res.data.machine_brand);
                            $('#brandID_Duplicate').val(res.data.brand_id);
                            $('#machType_Duplicate').val(res.data.machine_type);
                            $('#typeID_Duplicate').val(res.data.type_id);
                            $('#machName_Duplicate').val(res.data.machine_name);
                            $('#machID_Duplicate').val(res.data.machine_id);
                            $('#machCode_Duplicate').val(res.data.machine_code);
                            $('#serNum_Duplicate').val(res.data.serialnumber);
                            $('#jobAss_Duplicate').val(res.data.job_assign).trigger('change');
                            $('#techRank_Duplicate').val(res.data.technician_rank);
                            $('#staffPos_Duplicate').val(res.data.staff_position);
                            $('#reason_Duplicate').val(res.data.reason);
                            $('#jobRegBy_Duplicate').val(usernameValue);
                            $('#jobLastModBy_Duplicate').val(usernameValue);
                        }
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }

            // Fetch Duplicate Job info data
            $(document).on('click', '.JobDuplicate', function () {
                var jobregister_id = $(this).data('jobregisterid');
                
                fetchJobInfoDataDuplicate(jobregister_id)
            
                $('#DuplicatePopupModal').modal('show');
            });

            // Hide respond message
            function hideElementById(elementId) {
                document.getElementById(elementId).style.display = "none";
            }

            // Submit Duplicate form to database
            $(document).on('submit', '#jobDuplicateForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("submit_jobDuplicate", true);

                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false, 
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);

                        if (res.status === 200) {
                            $('#duplicateJobMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("duplicateJobMessage");
                            }, 2000);
                        } 
                        
                        else if (res.status === 500) {
                            $('#duplicateJobMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("duplicateJobMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#duplicateJobMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("duplicateJobMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        </script>
		<!-- End of Duplicate Popup Modal -->

        <!-- Refresh page when close modal -->
        <script>
            $(document).ready(function() {
                function closeAllModalsAndRefresh() {
                    $('.modal').modal('hide');
                    
                    location.reload();
                }
                
                $('.modal').on('hidden.bs.modal', function() {
                    closeAllModalsAndRefresh();
                });
            });
        </script>

        <!--========== Footer ==========-->
        <footer>
            <nav class="navbar navbar-light position-fixed bottom-0 w-100 justify-content-center" style="background-color: #C0C0C0; z-index: 2">
                <ul class="nav">
                    <li class="nav-item dropup">
                        <div class="text-center">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="ep:list" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Job List</span> 

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="assignedjob.php">Assigned Job</a></li>
                                <li><a class="dropdown-item" href="unassignedjob.php">Unassigned Job</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="pendingjoblistst.php"><i class="iconify" data-icon="carbon:warning-filled" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Pending</span>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="technician.php"><i class="iconify" data-icon="ant-design:home-filled" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Home</span>
                        </div>
                    </li>

                    <li class="nav-item me-2">
                        <div class="text-center">
                            <a class="nav-link" href="incompletejoblistst.php"><i class="iconify" data-icon="fluent-emoji-high-contrast:no-entry" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Incomplete</span>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="completejoblistst.php"><i class="iconify" data-icon="fluent-mdl2:completed-solid" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Completed</span>
                        </div>
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>