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
    
    <style>
        ::-webkit-scrollbar {display: none;}

        .dropdown:hover .dropbtn {color:#f5f5f5}
        .dropdown1:hover .dropbtn1 {color:#f5f5f5}

        .dropdown-content a:hover {background-color:#f1f1f1}
        .dropdown-content1 a:hover {background-color:#f1f1f1}

        .dropdown:hover .dropdown-content {display:block}
        .dropdown1:hover .dropdown-content1 {display:block}

        .dropdown-content {
            display:none;
            position:absolute;
            background-color:#f9f9f9;
            min-width:auto;
            padding-left:20px;
            bottom:55px;
            box-shadow:0 8px 16px 0 rgba(0,0,0,.2);
            z-index:1
        }
        
        .dropdown-content1{
            display:none;
            position:absolute;
            background-color:#f9f9f9;
            min-width:160px;
            box-shadow:0 8px 16px 0 rgba(0,0,0,.2);
            padding:12px 16px;z-index:1
        }

        .dropdown-content a {
            color:#000;
            padding:10px 10px;
            text-decoration:none;
            display:block;
            padding-right:7px
        }
        
        .dropdown-content1 a{
            color:#000;
            padding:12px 16px;
            text-decoration:none;
            display:block;
            padding-right:7px
        }
    </style>
    
    <body>
        <!--========== HEADER ==========-->
        <header class="header">
            <div class="header__container">
                <div class="header__search">
                    <div class="dropdown1">
                        <a href="Adminhomepage.php" style="font-weight: bold; font-size:25px; color:black;">Home</a>
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
                                <a href="staff.php" class="nav__link">
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

                            <a href="machine.php" class="nav__link">
                                <i class='bx bx-cog nav__icon'></i>
                                <span class="nav__name">Machine</span>
                            </a>

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
                                        
                                        $query = "SELECT * FROM job_register WHERE job_status = 'Completed' ORDER BY today_date ASC";
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
                    $(document).ready(function(){
                        let table = $('#completeJobTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                        
                        let minDate, maxDate;
 
                        DataTable.ext.search.push(function (settings, data, dataIndex) {
                            let min = minDate.val();
                            let max = maxDate.val();
                            let date = new Date(data[4]);
                        
                            if ((min === null && max === null) ||
                                (min === null && date <= max) ||
                                (min <= date && max === null) ||
                                (min <= date && date <= max)) {
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

                <!-- PopUp Modal -->
                <div class="modal fade" id="JobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="tab-buttons d-flex flex-wrap" role="tablist">
                                        <button class="btn tab-button active flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobInfo" aria-controls="JobInfo" aria-selected="true" id="showjobinfo">Job Info</button>
                                        <button class="btn tab-button flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobAssign" aria-controls="JobAssign" aria-selected="false" id="showjobassign">Job Assign</button>
                                        <button class="btn tab-button flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#Update" aria-controls="Update" aria-selected="false" id="showUpdate">Update</button>
                                        <button class="btn tab-button flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#Accessory" aria-controls="Accessory" aria-selected="false" id="showaccessory">Accessory</button>
                                        <button class="btn tab-button flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#Photo" aria-controls="Photo" aria-selected="false" id="showPhoto">Photo</button>
                                        <button class="btn tab-button flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#Video" aria-controls="Video" aria-selected="false" id="showVideo">Video</button>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="tab-content mt-3">
                                    <!-- Job info -->
                                    <div class="tab-pane show active" id="JobInfo" role="tabpanel" aria-labelledby="JobInfo" style="color: black;">
                                        <form id="showjobinfo" action="AdminCompletedJobInfo.php" method="post">
                                            <div class="completed-details">

                                            </div>
                                        </form>
                                    </div>

                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.viewJobBtn').click(function() {
                                                var jobregister_id = $(this).data('jobregister-id');
                                                
                                                $.ajax({
                                                    url: 'AdminCompletedJobInfo.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    success: function(response) {
                                                        $('.completed-details').html(response);

                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.completed-details').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Job Assign -->
                                    <div class="tab-pane" id="JobAssign" role="tabpanel" aria-labelledby="JobAssign" style="color: black;">
                                        <form id="showjobassign" action="jobassignAdminCOMPLETED.php" method="post">
                                            <div class="completed-JobAssign">

                                            </div>
                                        </form>
                                    </div>

                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.viewJobBtn').click(function() {
                                                var jobregister_id = $(this).data('jobregister-id');
                                                
                                                $.ajax({
                                                    url: 'jobassignAdminCOMPLETED.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    success: function(response) {
                                                        $('.completed-JobAssign').html(response);

                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.completed-JobAssign').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Update -->
                                    <div class="tab-pane" id="Update" role="tabpanel" aria-labelledby="Update" style="color: black;">
                                        <form id="showUpdate" action="ajaxtechupdatecomplete.php" method="post">
                                            <div class="completed-update">

                                            </div>
                                        </form>
                                    </div>

                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.viewJobBtn').click(function() {
                                                var jobregister_id = $(this).data('jobregister-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechupdatecomplete.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    success: function(response) {
                                                        $('.completed-update').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.completed-update').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Accessories -->
                                    <div class="tab-pane" id="Accessory" role="tabpanel" aria-labelledby="Accessory" style="color: black;">
                                        <form id="showaccessory" action="ajaxtabaccessories.php" method="post">
                                            <div class="completed-accessories">

                                            </div>
                                        </form>
                                    </div>

                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.viewJobBtn').click(function() {
                                                var jobregister_id = $(this).data('jobregister-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    success: function(response) {
                                                        $('.completed-accessories').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.completed-accessories').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Photo -->
                                    <div class="tab-pane" id="Photo" role="tabpanel" aria-labelledby="Photo" style="color: black;">
                                        <form id="showPhoto" action="ajaxtechphtoupdtcomplete.php" method="post">
                                            <div class="completed-photos">

                                            </div>
                                        </form>
                                    </div>

                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.viewJobBtn').click(function() {
                                                var jobregister_id = $(this).data('jobregister-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechphtoupdtcomplete.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    success: function(response) {
                                                        $('.completed-photos').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.completed-photos').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Video -->
                                    <div class="tab-pane" id="Video" role="tabpanel" aria-labelledby="Video" style="color: black;">
                                        <form id="showVideo"action="ajaxtechvideoupdtcomplete.php" method="post">
                                            <div class="completed-video">

                                            </div>
                                        </form>
                                    </div>

                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.viewJobBtn').click(function() {
                                                var jobregister_id = $(this).data('jobregister-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechvideoupdtcomplete.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    success: function(response) {
                                                        $('.completed-video').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.completed-video').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const tabButtons = document.querySelectorAll('.tab-buttons .tab-button');
                        const viewJobButtons = document.querySelectorAll('.viewJobBtn');
                        
                        tabButtons.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                const targetTab = button.getAttribute('data-bs-target');
                                
                                document.querySelectorAll('.tab-pane').forEach((pane) => {
                                    pane.classList.remove('show', 'active');
                                });
                                
                                document.querySelector(targetTab).classList.add('show', 'active');
                                
                                tabButtons.forEach((btn) => {
                                    btn.classList.remove('active');
                                });
                                
                                button.classList.add('active');
                            });
                        });
                        
                        viewJobButtons.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                const jobregisterId = button.getAttribute('data-jobregister-id');
                                const modal = document.querySelector('#JobModal');
                                const jobRegisterInput = modal.querySelector('#jobregister_id');
                                
                                if (jobRegisterInput) {
                                    jobRegisterInput.value = jobregisterId;
                                }
                                
                                const bootstrapModal = new bootstrap.Modal(modal);
                                bootstrapModal.show();
                            });
                        });
                    });
                </script>
            </section>
        </main>        
    </body>
    </html>