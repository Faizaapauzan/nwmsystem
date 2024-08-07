<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Completed Job</title>

        <!--========== CSS ==========-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        
        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    </head>
    
    <body>
        <!--========== HEADER ==========-->
        <script>
            $(document).ready(function() {
                function toggleMobileView() {
                    if (window.innerWidth <= 768) {
                        $('#home').attr('href', '#');
                        $('#home').off('click');
                        $('#home').click(function(e) {
                            e.preventDefault();
                            
                            if ($('#mobile-view').css('display') === 'none'){
                                $('#mobile-view').css('display', 'block');
                            }
                            
                            else {
                                $('#mobile-view').css('display', 'none');
                            }
                        });
                    }
                    
                    else {
                        $('#home').attr('href', 'Adminhomepage.php');
                        $('#home').off('click');
                    }
                }
                
                toggleMobileView();
                
                $(window).resize(function() {
                    toggleMobileView();
                });
            });
        </script>
        
        <header class="header">
            <div class="header__container">
                <div class="header__search">
                    <div class="dropdown1">
                        <a href="Adminhomepage.php" id="home" style="font-weight: bold; font-size:25px; color:black;">Home</a>
                        <div class="dropdown-content1">
                            <a href="AdminJobTable.php">Job - Table view</a>
                            <a href="adminjoblisting.php">Job - List View</a>
                        </div>
                    </div>
                </div>
                
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
            
            <div class="mobile-view" id="mobile-view">
                <div class="dropdown-content2" id="dropdown-content2">
                    <a href="Adminhomepage.php">Home</a>
                    <a href="AdminJobTable.php">Table View</a>
                    <a href="adminjoblisting.php">List View</a>
                </div>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="Adminhomepage.php" class="nav__link nav__logo">
                        <img src="neo.png" height="50" width="60"></img>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">

                            <a href="jobregister.php" class="nav__link active">
                                <i class='bx bx-folder-plus nav__icon'></i>
                                <span class="nav__name">New Job</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-group nav__icon'></i>
                                    <span class="nav__name">Staff</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="staff.php" class="nav__dropdown-item">All User</a>
                                        <a href="technicianlist.php" class="nav__dropdown-item">Technician</a>
                                        <a href="attendanceadmin.php" class="nav__dropdown-item">Attendance</a>
                                        <a href="AdminLeave.php" class="nav__dropdown-item">Leave</a>
                                    </div>
                                </div>
                            </div>

                            <a href="customer.php" class="nav__link">
                                <i class='bx bx-buildings nav__icon'></i>
                                <span class="nav__name">Customer</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-group nav__icon'></i>
                                    <span class="nav__name">Machine</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="machine.php" class="nav__dropdown-item">Machine</a>
                                        <a href="machineBrand.php" class="nav__dropdown-item">Machine Brand</a>
                                        <a href="machineType.php" class="nav__dropdown-item">Machine Type</a>
                                    </div>
                                </div>
                            </div>

                            <a href="accessories.php" class="nav__link">
                                <i class='bx bx-wrench nav__icon'></i>
                                <span class="nav__name">Accessory</span>
                            </a>

                            <a href="jobtype.php" class="nav__link">
                                <i class='bx bx-highlight nav__icon'></i>
                                <span class="nav__name">Job Type</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-file nav__icon'></i>
                                    <span class="nav__name">Record</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="jobcompleted.php" class="nav__dropdown-item">Completed Job</a>
                                        <a href="jobcanceled.php" class="nav__dropdown-item">Cancelled Job</a>
                                        <a href="AccessoryInOut.php" class="nav__dropdown-item" style="white-space: nowrap;">Accessories In/Out</a>
                                    </div>
                                </div>
                            </div>

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-task nav__icon'></i>
                                    <span class="nav__name">Reports</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="adminreport.php" class="nav__dropdown-item">Admin Report</a>
                                        <a href="report.php" class="nav__dropdown-item">Service Report</a>
                                        <a href="technicianJobDaily.php" class="nav__dropdown-item">Daily Job</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="logout.php" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon'></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <!--========== CONTENTS ==========-->
        <main>
            <section>
                <!-- Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Completed Job</h4>
                    </div>
                    
                    <div class="card-body" >
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
                            <input type="text" id="min" name="min" placeholder="Start Date" class="form-control border border-dark">
                            <input type="text" id="max" name="max" placeholder="End Date" class="form-control border border-dark">
                            
                            <button type="reset" id="refreshButton" class="btn btn-primary" style="background-color: #1a0845; color: white; border:none;" onclick="document.location='jobcompleted.php'">Refresh</button>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="completeJobTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Order Number</th>
                                        <th style='text-align: center; white-space: nowrap;'>Customer Name</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Assign</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Created date</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                        require 'dbconnect.php';
                                        
                                        $query = "SELECT * FROM job_register WHERE job_status = 'Completed' ORDER BY job_order_number DESC";
                                        $query_run = mysqli_query($conn, $query);

                                        $counter = 1;
                                
                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $job) {
                                    ?>
                            
                                    <tr>
                                        <td style='text-align: center;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['job_order_number'] ?></td>
                                        <td><?= $job['customer_name'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['job_assign'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['today_date'] ?></td>
                                        <td style='text-align: center;'>
                                            <button type="button" class="viewJobBtn btn btn-info btn-sm" data-jobregister-id="<?=$job['jobregister_id'];?>">Details</button>
                                        </td>
                                    </tr>
                                    <?php $counter++; } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </br>
                
                <!--========== JS ==========-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
                
                <script>
                    $(document).ready(function() {
                        let table = $('#completeJobTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_", searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                        
                        let currentJobId = null;
                        
                        $('#completeJobTable tbody').on('click', '.viewJobBtn', function() {
                            currentJobId = $(this).data('jobregister-id');
                            console.log("jobregister_id:", currentJobId);
                            
                            var modal = $('#JobModal');
                            
                            modal.modal('show');
                            
                            var firstTab = $('#modalTabs .tab-switch').first();
                            
                            activateTab(firstTab.data('bs-target'));
                        });
                        
                        $('.tab-switch').click(function() {
                            var target = $(this).data('bs-target');
                            
                            activateTab(target);
                        });
                        
                        function activateTab(tabId) {
                            $('.tab-switch').removeClass('active');
                            $('.tab-switch[data-bs-target="' + tabId + '"]').addClass('active');
                            $('.tab-pane').removeClass('show active');
                            
                            $(tabId).addClass('show active');
                            
                            if(tabId === '#tab1') {
                                loadJobDetails(currentJobId);
                            }
                            
                            else if(tabId === '#tab2') {
                                loadJobAssign(currentJobId);
                            }

                            else if(tabId === '#tab3') {
                                loadJobUpdate(currentJobId);
                            }

                            else if(tabId === '#tab4') {
                                loadJobAccessories(currentJobId);
                            }

                            else if(tabId === '#tab5') {
                                loadJobPhoto(currentJobId);
                            }

                            else if(tabId === '#tab6') {
                                loadJobVideo(currentJobId);
                            }
                        }
                        
                        // Job Info Tab
                        function loadJobDetails(jobId) {
                            $.ajax({
                                url: 'AdminCompletedJobInfo.php',
                                type: 'POST',
                                data: { jobregister_id: jobId },
                                
                                success: function(response) {
                                    $('.completed-details').html(response);
                                },
                                
                                error: function(xhr, status, error) {
                                    console.log("An error occurred:", error);
                                    
                                    $('.completed-details').html("An error occurred while fetching data.");
                                }
                            });
                        }
                        
                        // Job Assign Tab
                        function loadJobAssign(jobId) {
                            $.ajax({
                                url: 'jobassignAdminCOMPLETED.php',
                                type: 'POST',
                                data: { jobregister_id: jobId },
                                
                                success: function(response) {
                                    $('.completed-JobAssign').html(response);
                                },
                                
                                error: function(xhr, status, error) {
                                    console.log("An error occurred:", error);
                                    
                                    $('.completed-JobAssign').html("An error occurred while fetching data.");
                                }
                            });
                        }

                        // Job Update Tab
                        function loadJobUpdate(jobId) {
                            $.ajax({
                                url: 'ajaxtechupdatecomplete.php',
                                type: 'POST',
                                data: { jobregister_id: jobId },
                                
                                success: function(response) {
                                    $('.completed-update').html(response);
                                },
                                
                                error: function(xhr, status, error) {
                                    console.log("An error occurred:", error);
                                    
                                    $('.completed-update').html("An error occurred while fetching data.");
                                }
                            });
                        }

                        // Job Accessories Tab
                        function loadJobAccessories(jobId) {
                            $.ajax({
                                url: 'ajaxtabaccessories.php',
                                type: 'POST',
                                data: { jobregister_id: jobId },
                                
                                success: function(response) {
                                    $('.completed-accessories').html(response);
                                },
                                
                                error: function(xhr, status, error) {
                                    console.log("An error occurred:", error);
                                    
                                    $('.completed-accessories').html("An error occurred while fetching data.");
                                }
                            });
                        }

                        // Job Photo Tab
                        function loadJobPhoto(jobId) {
                            $.ajax({
                                url: 'ajaxtechphtoupdtcomplete.php',
                                type: 'POST',
                                data: { jobregister_id: jobId },
                                
                                success: function(response) {
                                    $('.completed-photos').html(response);
                                },
                                
                                error: function(xhr, status, error) {
                                    console.log("An error occurred:", error);
                                    
                                    $('.completed-photos').html("An error occurred while fetching data.");
                                }
                            });
                        }

                        // Job Video Tab
                        function loadJobVideo(jobId) {
                            $.ajax({
                                url: 'ajaxtechvideoupdtcomplete.php',
                                type: 'POST',
                                data: { jobregister_id: jobId },
                                
                                success: function(response) {
                                    $('.completed-video').html(response);
                                },
                                
                                error: function(xhr, status, error) {
                                    console.log("An error occurred:", error);
                                    
                                    $('.completed-video').html("An error occurred while fetching data.");
                                }
                            });
                        }
                        
                        let minDate, maxDate;
                        
                        DataTable.ext.search.push(function (settings, data, dataIndex) {
                            let min = minDate.val();
                            let max = maxDate.val();
                            let date = new Date(data[4]);
                            
                            if ((min === null && max === null) || (min === null && date <= max) || (min <= date && max === null) || (min <= date && date <= max)) {
                                return true;
                            }
                            
                            return false;
                        });
                        
                        minDate = new DateTime('#min', {
                            format: 'DD/MM/YYYY'
                        });
                        
                        maxDate = new DateTime('#max', {
                            format: 'DD/MM/YYYY'
                        });
                        
                        document.querySelectorAll('#min, #max').forEach((el) => {
                            el.addEventListener('change', () => table.draw());
                        });
                    });
                </script>

                <!-- Popup Modal -->
                <div class="modal fade" id="JobModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- Tab Buttons -->
                                <div class="d-flex flex-wrap" id="modalTabs">
                                    <button class="btn tab-switch flex-grow-1 flex-md-grow-0" data-bs-target="#tab1" style="border:none; font-weight: bold; white-space: nowrap;">Job Info</button>
                                    <button class="btn tab-switch flex-grow-1 flex-md-grow-0" data-bs-target="#tab2" style="border:none; font-weight: bold; white-space: nowrap;">Job Assign</button>
                                    <button class="btn tab-switch flex-grow-1 flex-md-grow-0" data-bs-target="#tab3" style="border:none; font-weight: bold;">Update</button>
                                    <button class="btn tab-switch flex-grow-1 flex-md-grow-0" data-bs-target="#tab4" style="border: none; font-weight:bold;">Accessories</button>
                                    <button class="btn tab-switch flex-grow-1 flex-md-grow-0" data-bs-target="#tab5" style="border: none; font-weight:bold;">Photo</button>
                                    <button class="btn tab-switch flex-grow-1 flex-md-grow-0" data-bs-target="#tab6" style="border: none; font-weight:bold;">Video</button>
                                </div>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <!-- Job info -->
                                    <div class="tab-pane fade show active" id="tab1" style="color: black;">
                                        <div class="container" id="tab1Content">
                                            <form id="showjobinfo" action="AdminCompletedJobInfo.php" method="post">
                                                <div class="completed-details">

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Job Assign -->
                                    <div class="tab-pane fade" id="tab2" style="color: black;">
                                        <div class="container" id="tab1Content">
                                            <form id="showjobassign" action="jobassignAdminCOMPLETED.php" method="post">
                                                <div class="completed-JobAssign">

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Update -->
                                    <div class="tab-pane fade" id="tab3" style="color: black;">
                                        <div class="container" id="tab3Content">
                                            <form id="showUpdate" action="ajaxtechupdatecomplete.php" method="post">
                                                <div class="completed-update">

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Accessories -->
                                    <div class="tab-pane fade" id="tab4" style="color: black;">
                                        <div class="container" id="tab4Content">
                                            <form id="showaccessory" action="ajaxtabaccessories.php" method="post">
                                                <div class="completed-accessories">

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Photo -->
                                    <div class="tab-pane fade" id="tab5" style="color: black;">
                                        <div class="container" id="tab5Content">
                                            <form id="showPhoto" action="ajaxtechphtoupdtcomplete.php" method="post">
                                                <div class="completed-photos">

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Video -->
                                    <div class="tab-pane fade" id="tab6" style="color: black;">
                                        <div class="container" id="tab6Content">
                                            <form id="showVideo"action="ajaxtechvideoupdtcomplete.php" method="post">
                                                <div class="completed-video">

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>        
    </body>
</html>