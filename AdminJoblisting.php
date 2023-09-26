<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>NWM Job Listing</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }
    </style>

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
        <!-- Table -->
        <div class="card mb-3">
            <div class="card-header">
                <h4>Job Listing</h4>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="jobListTable" class="table table-bordered" style="font-size: small;">
                        <thead>
                            <tr>
                                <th style='text-align: center;'>No</th>
                                <th style='text-align: center; white-space: nowrap;'>Job Order Number</th>
                                <th style='text-align: center; white-space: nowrap;'>Job Priority</th>
                                <th style='text-align: center; white-space: nowrap;'>Job Status</th>
                                <th style='text-align: center; white-space: nowrap;'>Customer Name</th>
                                <th style='text-align: center; white-space: nowrap;'>Job Name</th>
                                <th style='text-align: center; white-space: nowrap;'>Machine Code</th>
                                <th style='text-align: center; white-space: nowrap;'>Job Assign</th>
                            </tr>
                        </thead>
                                
                        <tbody>
                            <?php
                                        
                                require 'dbconnect.php';
                                        
                                $query = "SELECT * FROM job_register  
                                          WHERE (job_cancel = '' OR job_cancel IS NULL) AND job_status != 'Completed' 
                                          ORDER BY jobregisterlastmodify_at DESC";

                                $query_run = mysqli_query($conn, $query);

                                $counter = 1;
                                
                                if(mysqli_num_rows($query_run) > 0) {
                                    foreach($query_run as $job) {
                                        $color = ($job['staff_position'] == 'Storekeeper') ? 'table-primary' : (($job['job_status'] == 'Doing') ? 'table-success' : (($job['job_status'] == 'Incomplete') ? 'table-warning' : (($job['job_status'] == 'Pending') ? 'table-danger' : '')));
                            ?>
                            <tr class="<?php echo $color?>">
                                <td style='text-align: center; white-space: nowrap;'><?= $counter ?></td>
                                <td style='text-align: center; white-space: nowrap;'>
                                    <button type="button" data-jobregister-id="<?=$job['jobregister_id'];?>" class="openModal btn btn-sm fw-bold" style="border: none;"><?= $job['job_order_number'] ?></button>
                                </td>
                                <td style='text-align: center; white-space: nowrap;'><?= $job['job_priority'] ?></td>
                                <td style='text-align: center; white-space: nowrap;'><?= $job['job_status'] ?></td>
                                <td><?= $job['customer_name'] ?></td>
                                <td style='text-align: center; white-space: nowrap;'><?= $job['job_name'] ?></td>
                                <td style='text-align: center; white-space: nowrap;'><?= $job['machine_code'] ?></td>
                                <td>
                                    <select class="form-select form-select-sm technician" style="width: 100%;" onchange="status_update(this.options[this.selectedIndex].value,'<?= $job['jobregister_id'] ?>')">
                                        <option value=""><?= $job['job_assign'] ?></option>
                                            <?php
                                                include "dbconnect.php";  

                                                $records = mysqli_query($conn,
                                                   "SELECT * FROM staff_register 
                                                    WHERE technician_rank = '1st Leader' AND tech_avai = '0'
                                                    OR technician_rank = '2nd Leader' AND tech_avai = '0'
                                                    OR staff_position='storekeeper' AND tech_avai = '0' 
                                                    ORDER BY username ASC"
                                                );

                                                while ($data = mysqli_fetch_array($records)) {
                                                    echo "<option value='" . $data['username'] . "'>" . $data['username'] . "</option>";
                                                }
                                            ?>
                                    </select>
                                </td>
                            </tr>
                            <?php $counter++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <!--========== JS ==========-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="assets/js/main.js"></script>

        <script>
            $(document).ready(function(){
                $('.technician').select2({
                    theme: 'bootstrap-5'
                });
            });
        </script>

        <script>
            $(document).ready(function(){
                $('#jobListTable').DataTable({
                    responsive:true,
                    language: {search:"_INPUT_",
                               searchPlaceholder:"Search"},
                    pagingType: 'full_numbers'
                });
            });
        </script>
        

        <script>
            function status_update(value, jobregister_id) {
                let url = "adminjoblisting.php";
                window.location.href = url + "?jobregister_id=" + jobregister_id + "&job_assign=" + value;
            }
            function status_update(value, jobregister_id) {
                lastmodify_by = "<?php echo $_SESSION['username']?>";
                $.ajax({
                    url: 'assigntechindex.php',
                    type: 'get',
                    data: {
                        value: value,
                        jobregister_id: jobregister_id,
                        lastmodify_by: lastmodify_by,
                        jobstatus: true
                    },
                
                    success: function(response) {
                        var res = JSON.parse(response);
                        console.log(res);

                        if (res.success == true) 
                            window.location.reload();
                        else 
                            alert("Failed to update");
                    }
                });
            }
        </script>

        <!-- PopUp Modal -->
        <div class="modal fade" id="JobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="tab-buttons d-flex flex-wrap" role="tablist">
                            <button class="btn tab-button mx-3 fw-bold active" data-bs-toggle="tab" data-target="#JobInfo" data-action="AdminHomepageJobinfo.php">Job Info</button>
                            <button class="btn tab-button mx-3 fw-bold" data-bs-toggle="tab" data-target="#JobAssign" data-action="AdminHomepageJobassign.php">Job Assign</button>
                            <button class="btn tab-button mx-3 fw-bold" data-bs-toggle="tab" data-target="#Update" data-action="AdminHomepageUpdate.php">Update</button>
                            <button class="btn tab-button mx-3 fw-bold" data-bs-toggle="tab" data-target="#Accessories" data-action="ajaxtabaccessories.php">Accessory</button>
                            <button class="btn tab-button mx-3 fw-bold" data-bs-toggle="tab" data-target="#Photo" data-action="ajaxtechphtoupdt.php">Photo</button>
                            <button class="btn tab-button mx-3 fw-bold" data-bs-toggle="tab" data-target="#Video" data-action="ajaxtechvideoupdt.php">Video</button>
                        </div>
                
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="tab-content">
                            <!-- Job info -->
                            <div class="tab-pane show active" id="JobInfo" role="tabpanel" aria-labelledby="JobInfo" style="color: black;">
                                <form id="showjobinfo" action="AdminHomepageJobinfo.php" method="post">
                                    <div class="completed-details"></div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('.openModal').click(function() {
                                        var jobregister_id = $(this).data('jobregister-id');
                                        
                                        $.ajax({
                                            url: 'AdminHomepageJobinfo.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            
                                            success: function(response) {
                                                $('.completed-details').html(response);
                                            },
                                            
                                            error: function(xhr, status, error) {
                                                console.log("AJAX Error:", xhr, status, error);
                                                $('.completed-details').html("An error occurred while fetching data.");
                                            }
                                        });
                                    });
                                });
                            </script>
                    
                            <!-- Job Assign -->
                            <div class="tab-pane" id="JobAssign" role="tabpanel" aria-labelledby="JobAssign" style="color: black;">
                                <form id="showjobassign" action="AdminHomepageJobassign.php" method="post">
                                    <div class="completed-JobAssign"></div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('.openModal').click(function() {
                                        var jobregister_id = $(this).data('jobregister-id');
                                        
                                        $.ajax({
                                            url: 'AdminHomepageJobassign.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
            
                                            success: function(response) {
                                                $('.completed-JobAssign').html(response);
                                            },
            
                                            error: function(xhr, status, error) {
                                                console.log("AJAX Error:", xhr, status, error);
                                                $('.completed-JobAssign').html("An error occurred while fetching data.");
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Update -->
                            <div class="tab-pane" id="Update" role="tabpanel" aria-labelledby="Update" style="color: black;">
                                <form id="showUpdate" action="AdminHomepageUpdate.php" method="post">
                                    <div class="completed-update"></div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('.openModal').click(function() {
                                        var jobregister_id = $(this).data('jobregister-id');
                                        
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            
                                            success: function(response) {
                                                $('.completed-update').html(response);
                                            },
                                            
                                            error: function(xhr, status, error) {
                                                console.log("AJAX Error:", xhr, status, error);
                                                $('.completed-update').html("An error occurred while fetching data.");
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Accessories -->
                            <div class="tab-pane" id="Accessories" role="tabpanel" aria-labelledby="Accessories" style="color: black;">
                                <form id="showaccessory" action="ajaxtabaccessories.php" method="post">
                                    <div class="completed-accessories"></div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('.openModal').click(function() {
                                        var jobregister_id = $(this).data('jobregister-id');
                                        
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
            
                                            success: function(response) {
                                                $('.completed-accessories').html(response);
                                            },
            
                                            error: function(xhr, status, error) {
                                                console.log("AJAX Error:", xhr, status, error);
                                                $('.completed-accessories').html("An error occurred while fetching data.");
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Photo -->
                            <div class="tab-pane" id="Photo" role="tabpanel" aria-labelledby="Photo" style="color: black;">
                                <form id="showPhoto" action="ajaxtechphtoupdt.php" method="post">
                                    <div class="completed-photos"></div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('.openModal').click(function() {
                                        var jobregister_id = $(this).data('jobregister-id');
                                        
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
            
                                            success: function(response) {
                                                $('.completed-photos').html(response);
                                            },
            
                                            error: function(xhr, status, error) {
                                                console.log("AJAX Error:", xhr, status, error);
                                                $('.completed-photos').html("An error occurred while fetching data.");
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Video -->
                            <div class="tab-pane" id="Video" role="tabpanel" aria-labelledby="Video" style="color: black;">
                                <form id="showVideo" action="ajaxtechvideoupdt.php" method="post">
                                    <div class="completed-video"></div>
                                </form>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('.openModal').click(function() {
                                        var jobregister_id = $(this).data('jobregister-id');
                                        
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            
                                            success: function(response) {
                                                $('.completed-video').html(response);
                                            },
            
                                            error: function(xhr, status, error) {
                                                console.log("AJAX Error:", xhr, status, error);
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
                const modal = document.querySelector('#JobModal');
                const modalContent = modal.querySelector('.modal-content');
                const tabButtons = modalContent.querySelectorAll('.tab-button');
                const viewJobButtons = document.querySelectorAll('.openModal');
                
                tabButtons.forEach((button) => {
                    button.addEventListener('click', (event) => {
                        event.preventDefault();
                        
                        const targetTab = button.getAttribute('data-target');
                        
                        modalContent.querySelectorAll('.tab-pane').forEach((pane) => {
                            pane.classList.remove('show', 'active');
                        });
                        
                        modalContent.querySelector(targetTab).classList.add('show', 'active');
                        
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
                        const jobRegisterInput = modalContent.querySelector('#jobregister_id');
                        
                        if (jobRegisterInput) {
                            jobRegisterInput.value = jobregisterId;
                        }

                        const bootstrapModal = new bootstrap.Modal(modal);

                        bootstrapModal.show();
                    });
                });
            });
        </script>
    </body>
</html>