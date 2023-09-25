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

        .nav-pills .nav-link {
            background-color: transparent !important;
        }

        .nav-pills .nav-link.active {
            background-color: grey;
            color: black;
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
                    <table id="jobListTable" class="table table-bordered table-striped" style="font-size: small;">
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
                            ?>
                            <tr>
                                <td style='text-align: center; white-space: nowrap;' id="<?php echo $row["job_status"]; ?>"><?= $counter ?></td>
                                <td style='text-align: center; white-space: nowrap;'
                                    id="<?php echo $row["job_status"]; ?>" 
                                    data-id="<?php echo $row['jobregister_id'];?>" 
                                    data-idupdate="<?php echo $row['customer_name'];?>" 
                                    data-idlagi="<?php echo $row['job_assign'];?>" 
                                    data-idagain="<?php echo $row['requested_date'];?>" 
                                    class = '<?php echo $row["job_status"]; ?>'
                                    data-bs-target="#myModal" data-bs-toggle="modal">
                                    <button type="button" data-id="<?= $job['jobregister_id'] ?>" class="openModal btn btn-sm fw-bold" style="border: none;"><?= $job['job_order_number'] ?></button>
                                </td>
                                <td style='text-align: center; white-space: nowrap;' id="<?php echo $row["job_status"]; ?>"><?= $job['job_priority'] ?></td>
                                <td style='text-align: center; white-space: nowrap;' id="<?php echo $row["job_status"]; ?>"><?= $job['job_status'] ?></td>
                                <td id="<?php echo $row["job_status"]; ?>"><?= $job['customer_name'] ?></td>
                                <td style='text-align: center; white-space: nowrap;' id="<?php echo $row["job_status"]; ?>"><?= $job['job_name'] ?></td>
                                <td style='text-align: center; white-space: nowrap;' id="<?php echo $row["job_status"]; ?>"><?= $job['machine_code'] ?></td>
                                <td id="<?php echo $row["job_status"]; ?>">
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
                            <?php $counter++; } } ?>
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
        </script>
        
        <!-- Popup Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <ul class="nav-pills list-unstyled m-2 gap-3 fw-bold" style="display: flex; flex-wrap: wrap;">
                            <li class="nav-item" style="white-space: nowrap;"><a class="nav-link active" data-toggle="tab" href="#tab1">Job Info</a></li>
                        </ul>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="tab-content">
                            <!-- Job Info -->
                            <div id="tab1" class="tab-pane show in active" style="color: black">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).on("click", ".openModal", function () {
                var jobregister_id = $(this).data("id");
                
                $("#myModal").modal("show");
                
                $.ajax({
                    url: "AdminHomepageJobinfo.php",
                    type: 'POST',
                    data: {jobregister_id: jobregister_id},
            
                    success: function (response) {
                        $("#tab1").html(response);
                    }
                });
            });
        </script>
    </body>
</html>