<?php 
    
    session_start();
    
    include "dbconnect.php";

    if (isset($_SESSION["username"])) {
        $techName = $_SESSION["username"];
        
        $query_run = mysqli_query($conn, "SELECT * FROM staff_register WHERE username='$techName'");
        
        $row = mysqli_fetch_assoc($query_run);
        $username = $row["username"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Technician Assigned Job</title>

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
                            <li><a class="dropdown-item" href="techresthour.php">Leave</a></li>
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
        <div class="container p-3" style="margin-top: 70px; margin-bottom: 60px;">
            <!-- Search function -->
            <input type="text" id="myInput" placeholder="Search" class="form-control mb-3">

            <!-- Todo -->
            <div class="Box card" style="margin-bottom: 30px;" id="livesearch">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #081d45;">Todo</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE (job_status = '' OR job_status IS NULL OR job_status = 'Ready') 
                                       AND (job_cancel = '' OR job_cancel IS NULL) 
                                       AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                       AND staff_position = 'Leader'";

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
						
						$results = $conn->query("SELECT * FROM job_register WHERE (job_status = '' OR job_status IS NULL OR job_status = 'Ready') 
                                                 AND (job_cancel = '' OR job_cancel IS NULL) 
                                                 AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                                 AND staff_position = 'Leader' ORDER BY jobregisterlastmodify_at DESC");

                    	while ($row = $results->fetch_assoc()) {
							$jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
							$updatedate = substr($jobregisterlastmodify_at,0,10);
							$row['updatedate'] = $updatedate;
                    ?>
                    <div class="Job card mb-3" data-bs-toggle="modal" data-bs-target="#assignedJobModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
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
                                <?php
									if($row['reason'] != "" || $row['reason'] != NULL) {
										echo'<li class="fw-bold" style="color: red;">'.$row['reason'].'</li>';
									}
                            	?>
                            </ul>

							<?php
                                if ($row['support'] !== "" && $row['support'] !== NULL) {
                                    echo '<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.8rem; width: max-content;">' . $row['support'] . '</h6>';
                                }
                            ?>

                            <div class="d-grid justify-content-end">
                                <h6 class="fw-bold text-end" style="font-size: 0.8rem;"><?php echo $row['job_assign'] ?></h6>
                                <h6 class="fw-bold text-center" style="font-size: 0.8rem;"><?php echo $row['updatedate'] ?></h6>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>

            <!-- Doing -->
            <div class="Box card" style="margin-bottom: 30px;" id="livesearch">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #228B22;">Doing</h6></div>
						<?php
							
							include 'dbconnect.php';
							
							$numRow = "SELECT * FROM job_register WHERE job_status = 'Doing' 
                                       AND (job_cancel = '' OR job_cancel IS NULL) 
                                       AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                       AND staff_position = 'Leader'";

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
						
						$results = $conn->query("SELECT * FROM job_register WHERE job_status = 'Doing' 
                                                 AND (job_cancel = '' OR job_cancel IS NULL) 
                                                 AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                                 AND staff_position = 'Leader' ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	while ($row = $results->fetch_assoc()) {
							$jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
							$updatedate = substr($jobregisterlastmodify_at,0,10);
							$row['updatedate'] = $updatedate;
                    ?>
                    <div class="Job card mb-3" data-bs-toggle="modal" data-bs-target="#assignedJobModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
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
                                if ($row['support'] !== "" && $row['support'] !== NULL) {
                                    echo '<h6 class="badge bg-secondary text-wrap fw-bold ms-3" style="font-size: 0.8rem; width: max-content;">' . $row['support'] . '</h6>';
                                }
                            ?>

                            <div class="d-grid justify-content-end">
                                <h6 class="fw-bold text-end" style="font-size: 0.8rem;"><?php echo $row['job_assign'] ?></h6>
                                <h6 class="fw-bold text-center" style="font-size: 0.8rem;"><?php echo $row['updatedate'] ?></h6>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>

        <!-- Search Function -->
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#livesearch .Job.card").each(function() {
                        var text = $(this).text().toLowerCase();
                        if (text.indexOf(value) > -1) {
                            $(this).show();
                        } 
                        
                        else {
                            $(this).hide();
                        }
                    });
                });
            });
        </script>
        <!-- End of Search Function -->

        <!-- Popup Modal -->
        <div class="modal fade" id="assignedJobModal" tabindex="-1" aria-labelledby="popUpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active fw-bold" id="pills-JobInfo-tab" data-bs-toggle="pill" data-bs-target="#pills-JobInfo" type="button" role="tab" aria-controls="pills-JobInfo" aria-selected="false">Job Info</button>
                            </li>

                            <li class="nav-item" role="presentation">
                              <button class="Assign nav-link fw-bold" id="pills-JobAssign-tab" data-bs-toggle="pill" data-bs-target="#pills-JobAssign" type="button" role="tab" aria-controls="pills-JobAssign" aria-selected="false">Job Assign</button>
                            </li>
                        </ul>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Job Info -->
                            <div class="tab-pane show active" id="pills-JobInfo" role="tabpanel" aria-labelledby="pills-JobInfo-tab">
                                <div class="container"> 
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

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Machine Brand</label>
                                            <input type="text" name="machine_brand" id="machine_brand" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="" class="form-label fw-bold">Machine Type</label>
                                            <input type="text" name="machine_type" id="machine_type" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Machine Name</label>
                                            <input type="text" name="machine_name" id="machine_name" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Serial Number</label>
                                            <input type="text" name="serialnumber" id="serialnumber" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Assign -->
                            <div class="tab-pane" id="pills-JobAssign" role="tabpanel" aria-labelledby="pills-JobAssign-tab">
                                <div class="container">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="" class="form-label fw-bold">Job Assign</label>
                                            <form id="assignJob">
                                                <input type="hidden" name="jobregister_id" id="jobRegisterID_jobAssign">
                                                
                                                <div class="input-group mb-3">
                                                    <select name="job_assign" id="job_assign" onchange="GetTechDetails(this.value)" class="form-select">
                                                        <?php
                                                            
                                                            include "dbconnect.php";
                                                    
                                                            $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position ='Leader' 
                                                                                            AND tech_avai = '0' ORDER BY username ASC");
                                                            
                                                            echo"<option value='NULL'>Select Name</option>";
                                                            
                                                            while($data = mysqli_fetch_array($records)) {
                                                                echo "<option value='". $data['username'] ."'
                                                                              data-techRank='". $data['technician_rank'] ."'
                                                                              data-staffPos='". $data['staff_position'] ."'>" .$data['username']. "</option>";
                                                            }	
                                                        ?> 
                                                    </select>

                                                    <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width:fit-content">Update</button>
                                                </div>

                                                <div id="assignMessage"></div>
                                                
                                                <script>
                                                    $(document).ready(function() {
                                                        $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                                            $("#job_assign").select2({
                                                                dropdownParent: $('#assignJob'),
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

                                                <!-- Technician hidden info -->
                                                <script>
                                                    function GetTechDetails(value) {
                                                        var selectedOption = document.querySelector('#job_assign option[value="' + value + '"]');
                                                        var techRank = selectedOption.getAttribute('data-techRank');
                                                        var staffPos = selectedOption.getAttribute('data-staffPos');
                                
                                                        document.querySelector('input[name="technician_rank"]').value = techRank;
                                                        document.querySelector('input[name="staff_position"]').value = staffPos;
                                                    }
                                                </script>
                                                
                                                <input type="hidden" name="technician_rank" id="technician_rank">
                                                <input type="hidden" name="staff_position" id="staff_position">
                                            </form>
                                        </div>
                                    </div>

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <label for="Assistant" class="form-label fw-bold">Assistant</label>
                                            
                                            <div class="table-responsive mb-3">
                                                <table class="table border table-borderless table-striped" id="assistantTable">
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Job Info Data
            function fetchJobInfoData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            alert(res.message);
                        } 
                        
                        else if (res.status == 200) {
                            $('#job_priority').val(res.data.job_priority);
                            $('#job_order_number').val(res.data.job_order_number);
                            $('#job_name').val(res.data.job_name);
                            $('#job_description').val(res.data.job_description);
                            $('#requested_date').val(res.data.requested_date);
                            $('#delivery_date').val(res.data.delivery_date);
                            $('#customer_name').val(res.data.customer_name);
                            $('#cust_address1').val(res.data.cust_address1);
                            $('#cust_address2').val(res.data.cust_address2);
                            $('#cust_address3').val(res.data.cust_address3);
                            $('#customer_grade').val(res.data.customer_grade);
                            $('#customer_PIC').val(res.data.customer_PIC);
                            $('#cust_phone1').val(res.data.cust_phone1);
                            $('#cust_phone2').val(res.data.cust_phone2);
                            $('#machine_brand').val(res.data.machine_brand);
                            $('#machine_type').val(res.data.machine_type);
                            $('#machine_name').val(res.data.machine_name);
                            $('#serialnumber').val(res.data.serialnumber);
                        }
                        
                        else {
                            alert(res.message);
                        }
                    }
                });
            }

            // Job Assign Data
            function fetchJobAssignData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            alert(res.message);
                        } 
                        
                        else if (res.status == 200) {
                            $('#jobRegisterID_jobAssign').val(res.data.jobregister_id);
                            $('#job_assign').val(res.data.job_assign).trigger('change');
                            $('#technician_rank').val(res.data.technician_rank);
                            $('#staff_position').val(res.data.staff_position);
                        }
                        
                        else {
                            alert(res.message);
                        }
                    }
                });
            }
            
            // Assistant Data
            function fetchAssistantData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "technicianPopupModalAllIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        var tableBody = $('#assistantTable tbody');

                        tableBody.empty();
                        
                        if (res.status == 200) {
                            var assistantData = res.assistant;
                            
                            if (assistantData.length > 0) {
                                assistantData.forEach(function (assistant) {
                                    var row = "<tr><td style='text-align: center;'>" + assistant.username + "</td></tr>";
                                    
                                    tableBody.append(row);
                                });
                            } 
                            
                            else {
                                tableBody.append('<tr><td style="text-align: center;">No data available</td></tr>');
                            }
                        } 
                        
                        else {
                            alert(res.message);
                        }
                    }
                });
            }
            
            // Fetch data when the tab is clicked
            $(document).on('click', '.Job', function () {
                var jobregister_id = $(this).data('jobregisterid');
                
                fetchJobInfoData(jobregister_id)
                fetchJobAssignData(jobregister_id);
                fetchAssistantData(jobregister_id);
                
                $('#assignedJobModal').modal('show');
            });

             // Hide respond message
             function hideElementById(elementId) {
                document.getElementById(elementId).style.display = "none";
            }

            // Update Job Assign
            $(document).on('submit', '#assignJob', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("update_jobAssign", true);

                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: formData,
                    processData: false, 
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                       
                        if (res.status === 200) {
                            $('#assignMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("assignMessage");
                            }, 2000);
                        } 
                        
                        else if (res.status === 500) {
                            $('#assignMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                        
                            setTimeout(function () {
                                hideElementById("assignMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#assignMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("assignMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);                        
                    }
                });
            });
        </script>

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