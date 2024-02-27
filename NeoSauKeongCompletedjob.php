<?php
    session_start();

    include "dbconnect.php";
    
    if (!isset($_SESSION['username'])) {
        header("location:index.php?error");
        
        exit();
    }
    
    $keongName = mysqli_real_escape_string($conn, $_SESSION["username"]);
    
    if (strtolower($keongName) === 'keong') {
        $query_run = mysqli_query($conn, "SELECT * FROM staff_register WHERE username='$keongName'");
        
        if ($query_run) {
            $row = mysqli_fetch_assoc($query_run);

            if ($row) {
                $username = $row["username"];
                
                echo "<script>var usernameValue = '" . htmlspecialchars($username) . "';</script>";
            }
            
            else {
                header("location:index.php?error=nouser");
                
                exit();
            }
        }
        
        else {
            header("location:index.php?error=queryerror");
            
            exit();
        }
    }
    
    else {
        header("location:index.php?error=unauthorized");
        
        exit();
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
        <link rel="stylesheet" href="css/NeoSauKeong.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>   
    </head>

    <body>
        <!--========== Header ==========-->
        <header class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <a class="nav-link m-3" href="NeoSauKeongAttendance.php"><i class="iconify" data-icon="mdi:table-clock" style="font-size:220%; color: #081d45;"></i></a>
            </div>

            <div style="margin-top: 25px;">
                <h6>Hi! Neo Sau Keong</h6>
            </div>
        
            <div class="d-flex justify-content-end">
                <a class="nav-link m-3" href="logout.php"><i class="iconify" data-icon="heroicons-outline:logout" style="font-size:220%; color: #081d45;"></i></a>
            </div>
        </header>

        <!--========== Content ==========-->
        <div class="container p-3" style="margin-bottom: 70px;">
            <!-- Search function -->
            <input type="text" id="myInput" placeholder="Search" class="form-control mb-3">

            <div class="Box card" style="margin-bottom: 30px;" id="livesearch">
                <div class="card-body">
                    <div class="clearfix mb-2">
                        <div class="float-start"><h6 class="fw-bold" style="color: #0047AB;">Completed</h6></div>
                        <?php
                            
                            include 'dbconnect.php';
                            
                            $numRow = "SELECT * FROM job_register WHERE (job_status = 'Completed' AND job_cancel = '' AND YEAR(today_date) = YEAR(CURDATE()) AND MONTH(today_date) = MONTH(CURDATE()))
                                       OR (job_status = 'Completed' AND job_cancel IS NULL AND YEAR(today_date) = YEAR(CURDATE()) AND MONTH(today_date) = MONTH(CURDATE()))";

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
                        
                        $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Completed' AND job_cancel = '' AND YEAR(today_date) = YEAR(CURDATE()) AND MONTH(today_date) = MONTH(CURDATE()))
                                                 OR (job_status = 'Completed' AND job_cancel IS NULL AND YEAR(today_date) = YEAR(CURDATE()) AND MONTH(today_date) = MONTH(CURDATE()))
												 ORDER BY jobregisterlastmodify_at DESC");
                                        
                    	  while ($row = $results->fetch_assoc()) {
							$jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
							$updatedate = substr($jobregisterlastmodify_at,0,10);
							$row['updatedate'] = $updatedate;
                    ?>
                    <div class="Job card mb-3" data-bs-toggle="modal" data-bs-target="#keongModal" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
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
                    $("#livesearch .Job.card.mb-3").each(function() {
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
        <div class="modal fade" id="keongModal" tabindex="-1" aria-labelledby="keongModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active me-1" id="JobInfo-tab" data-bs-toggle="tab" data-bs-target="#JobInfo" type="button" role="tab" aria-controls="JobInfo" aria-selected="true" style="font-weight: bold;">Job Info</button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="JobAssign-tab" data-bs-toggle="tab" data-bs-target="#JobAssign" type="button" role="tab" aria-controls="JobAssign" aria-selected="false" style="font-weight: bold;">Job Assign</button>
                            </li>
                        </ul>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
        
                    <div class="modal-body">
                        <!-- Tab panes -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Job Info -->
                            <div class="tab-pane fade show active" id="JobInfo" role="tabpanel" aria-labelledby="JobInfo-tab">
                                <div class="container p-2">
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
                                            <label for="" class="form-label fw-bold">Customer Name</label>
                                            <input type="text" name="customer_name" id="customer_name" class="form-control" readonly>
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
                                            <label for="" class="form-label fw-bold">Customer Address</label>
                                            <input type="text" name="customer_PIC" id="cust_address1" class="form-control mb-1" readonly>
                                            <input type="text" name="customer_PIC" id="cust_address2" class="form-control mb-1" readonly>
                                            <input type="text" name="customer_PIC" id="cust_address3" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Customer Phone Number</label>
                                            <div class="d-grid d-flex gap-2 mt-2">
                                                <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" readonly>
                                                <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label fw-bold">Machine Name</label>
                                            <input type="text" name="machine_name" id="machine_name" class="form-control" readonly>
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
                                            <label for="" class="form-label fw-bold">Serial Number</label>
                                            <input type="text" name="serialnumber" id="serialnumber" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Assign -->
                            <div class="tab-pane fade" id="JobAssign" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container p-2">
                                    <form id="jobAssignForm">
                                        <input type="text" name="jobregister_id" id="jobregisterID_jobAssign">
                                        <input type="text" name="technician_rank" id="technician_rank">
                                        <input type="text" name="staff_position" id="staff_position">
                                        <input type="text" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" >
                                        
                                        <div class="input-group">
                                            <select name="job_assign" id="job_assign" class="form-select" onchange="GetTechDetails(this.value)">
                                                <option value="">Select Technician</option>
                                                <?php
                                                    
                                                    include 'dbconnect.php';
                                                    
                                                    $query = "SELECT * FROM staff_register WHERE staff_position = 'Leader' AND tech_avai = '0' ORDER BY username ASC";
                                                    
                                                    $query_run = mysqli_query($conn, $query);
                                                    
                                                    if ($query_run) {
                                                        if(mysqli_num_rows($query_run) > 0) {
                                                            foreach ($query_run as $rowstaff) {
                                                                echo "<option value='".$rowstaff["username"]."' 
                                                                              data-techRank='".$rowstaff["technician_rank"]."'
                                                                              data-techPost='".$rowstaff["staff_position"]."'>".$rowstaff["username"]."</option>";
                                                            }
                                                        }
                                                        
                                                        else {
                                                            echo "<option>No Record Found</option>";
                                                        }
                                                    }
                                                    
                                                    else {
                                                        echo "<option>Error in Query Execution</option>";
                                                    }
                                                ?>
                                            </select>
                                            
                                            <button type="submit" class="btn" id="assignJob" style="border: none; background-color: #081d45; color: #FFFFFF;">Assign</button>
                                        </div>

                                        <div id="jobAssignMessage"></div>

                                        <script>
                                            function GetTechDetails(value) {
                                                var selectedOptionJob = document.querySelector('#job_assign option[value="' + value + '"]');
                                                var techRank = selectedOptionJob.getAttribute('data-techRank');
                                                var techPost = selectedOptionJob.getAttribute('data-techPost');
                                
                                                document.querySelector('input[name="technician_rank"]').value = techRank;
                                                document.querySelector('input[name="staff_position"]').value = techPost;
                                            }
                                        </script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // select2
            $(document).ready(function() {
                $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                    $("#job_assign").select2({
                        dropdownParent: $('#jobAssignForm'),
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

            // Fetch Username
            function fetchUsername() {
                $('#jobregisterlastmodify_by').val(usernameValue);
            }

            // Fetch Job Info Tab
            function fetchJobInfoData(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "NeoSauKeongIndex.php?jobregister_id=" + jobregister_id,
        
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            $('#job_priority').val(res.data.job_priority);
                            $('#job_order_number').val(res.data.job_order_number);
                            $('#job_name').val(res.data.job_name);
                            $('#job_description').val(res.data.job_description);
                            $('#requested_date').val(res.data.requested_date);
                            $('#delivery_date').val(res.data.delivery_date);
                            $('#customer_name').val(res.data.customer_name);
                            $('#customer_grade').val(res.data.customer_grade);
                            $('#customer_PIC').val(res.data.customer_PIC);
                            $('#cust_address1').val(res.data.cust_address1);
                            $('#cust_address2').val(res.data.cust_address2);
                            $('#cust_address3').val(res.data.cust_address3);
                            $('#cust_phone1').val(res.data.cust_phone1);
                            $('#cust_phone2').val(res.data.cust_phone2);
                            $('#machine_name').val(res.data.machine_name);
                            $('#machine_brand').val(res.data.machine_brand);
                            $('#machine_type').val(res.data.machine_type);
                            $('#serialnumber').val(res.data.serialnumber);
                        }
                        
                        else {
                            console.error(res.message);
                        }
                    },
                    
                    error: function() {
                        console.error('Error fetching job info.');
                    }
                });
            }
            
            // Fetch Job Assign
            function fetchJobAssign(jobregister_id) {
                $.ajax({
                    type: "GET",
                    url: "NeoSauKeongIndex.php?jobregister_id=" + jobregister_id,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            console.log(res.message);
                        }
                        
                        else if (res.status == 200) {
                            $('#jobregisterID_jobAssign').val(res.data.jobregister_id);
                            $('#technician_rank').val(res.data.technician_rank);
                            $('#staff_position').val(res.data.staff_position);
                            $('#job_assign').val(res.data.job_assign).trigger('change');
                        }
                        
                        else {
                            console.log(res.message);
                        }
                    }
                });
            }
            
            // Fetch All Tab Data
            $(document).on('click', '.Job', function () {
                var jobregister_id = $(this).data('jobregisterid');
                
                fetchUsername()
                fetchJobInfoData(jobregister_id)
                fetchJobAssign(jobregister_id)
                
                $('#keongModal').modal('show');
            });

            // Hide respond message
            function hideElementById(elementId) {
                document.getElementById(elementId).style.display = "none";
            }

            // Assign Job
            $(document).on('submit', '#jobAssignForm', function (e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                    formData.append("assignJob", true);

                var jobregister_id = $("#jobregisterID_jobAssign").val();

                $.ajax({
                    type: "POST",
                    url: "NeoSauKeongIndex.php",
                    data: formData,
                    processData: false, 
                    contentType: false,
                    
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                       
                        if (res.status === 200) {
                            $('#jobAssignMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("jobAssignMessage");
                            }, 2000);                     
                        } 
                        
                        else if (res.status === 500) {
                            $('#jobAssignMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("jobAssignMessage");
                            }, 2000);
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        $('#jobAssignMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("jobAssignMessage");
                        }, 2000);
                        
                        console.error('AJAX Error:', status, error);                        
                    }
                });
            });
        </script>
                       
        <!--========== Footer ==========-->
        <footer>
            <nav class="navbar navbar-light position-fixed bottom-0 w-100 justify-content-center" style="background-color: #C0C0C0; z-index: 2">
                <ul class="nav">
                    <li class="nav-item dropup">
                        <div class="text-center">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="ep:list" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Assigned</span>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-center" href="NeoSauKeongTodojob.php">Todo</a></li>
                                <li><hr class="dropdown-divider"></hr></li>
                                <li><a class="dropdown-item text-center" href="NeoSauKeongDoingjob.php">Doing</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeongPendingjob.php"><i class="iconify" data-icon="carbon:warning-filled" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Pending</span>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeong.php"><i class="iconify" data-icon="ant-design:home-filled" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Home</span>
                        </div>
                    </li>

                    <li class="nav-item me-2">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeongIncompletejob.php"><i class="iconify" data-icon="fluent-emoji-high-contrast:no-entry" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Incomplete</span>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeongCompletedjob.php"><i class="iconify" data-icon="fluent-mdl2:completed-solid" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Completed</span>
                        </div>
                    </li>
                </ul>
            </nav>          
        </footer>
    </body>
</html>