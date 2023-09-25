<?php

    session_start();

    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");
    }

    if (!isset($_SESSION['username'])) {
        header("location: index.php?error=login");
    } elseif ($_SESSION['staff_position'] != 'Admin' && $_SESSION['staff_position'] != 'Manager') {
        header("location: index.php?error=permission");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
        
        <title>Admin Homepage</title>
        
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="css/AdminHomepageStyle.css">
       
        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
   
        <!--========== ICONS ==========-->
        <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
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
        <!-- Back to top Button -->
        <button onclick="topFunction()" id="myBtn" class="btn btn-lg rounded-3 pb-1" style="border:none; background-color: #081d45; color: #fff; width:max-content; height:max-content;"><i class='bx bxs-to-top'></i></button>
        
        <script>
            var mybutton = document.getElementById("myBtn");
            
            window.onscroll = function() {
                scrollFunction()
            };
            
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                }
                
                else {
                    mybutton.style.display = "none";
                }
            }
            
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- End Back to top Button -->
        
        <div class="container-fluid" style="margin-top: 2%;">
            <div class="row">
                <!-- Job List Box -->
                <div class="col-lg-3 mb-3">
                    <div class="Box card">
                        <div class="card-body">
                            <div class="clearfix mb-2">
                                <div class="float-start"><h6 class="fw-bold">Job Listing</h6></div>
                                <?php
                                    
                                    include 'dbconnect.php';
                                    
                                    $numRow = "SELECT * FROM job_register WHERE (accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required IS NULL AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign = '' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status = '' AND job_assign IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_assign = '' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                    OR
                                                (job_assign = '' AND job_status = 'Ready' AND job_cancel = '')
                                                    OR
                                                (job_assign IS NULL AND job_status = 'Ready' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = '' AND job_status = 'NULL' AND job_assign = 'NULL' AND job_cancel = 'NULL')";

                                    $numRow_run = mysqli_query($conn, $numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<div class="float-end"><h6 class="fw-bold">Total Job: ' . $row_Total . '</h6></div>';
                                    }
                                    
                                    else {
                                        echo '<div class="float-end"><h6 class="fw-bold">No Record</h6></div>';
                                    }
                                ?>
                            </div>

                            <?php
                                
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT * FROM job_register WHERE (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = 'NO' AND job_status IS NULL AND job_assign = '' AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = 'NO' AND job_status IS NULL AND job_assign = '' AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'NO' AND job_status = '' AND job_assign IS NULL AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = 'NO' AND job_assign = '' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                            OR
                                                        (accessories_required IS NULL AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = '' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign IS NULL AND job_status = 'Ready' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC");
                                        
                                while ($row = $results->fetch_assoc()) {
                            ?>
                            <div class="Job card mb-3 joblistPopup" data-bs-toggle="modal" data-bs-target="#joblistModal" data-jobregisterjoblist-id="<?php echo $row['jobregister_id']; ?>">
                                <div class="card-body">
                                    <p class="fw-bold mb-1 ms-3"><?php echo $row['job_order_number'] ?></p>
                                    <ul class="mb-0">
                                        <li><?php echo $row['job_priority'] ?></li>
                                        <li><?php echo $row['customer_name'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['accessories_required'] ?> Accessory require</li>
                                        <li><?php echo $row['job_status'] ?></li>
                                    </ul>
                                    <p class="fw-bold ms-3" style="color: red;"><?php echo $row['reason'] ?></p>
                                    <?php
                                        if($row['support'] != "" || $row['support'] != NULL) {
                                            echo '<div class="badge bg-secondary text-wrap float-end" id="support" style="width:fit-content;">';
                                            echo '' .$row['support'] ;
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                <!-- Job Listing Popup Modal -->
                <div class="modal fade" id="joblistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="tab-buttonsjoblist d-flex flex-wrap" role="tablist">
                                        <button class="btn tab-buttonjoblist active flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobInfoJoblist" aria-controls="JobInfoJoblist" aria-selected="true" id="showjobinfoJoblist">Job Info</button>
                                        <button class="btn tab-buttonjoblist flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobAssignJoblist" aria-controls="JobAssignJoblist" aria-selected="false" id="showjobassignJoblist">Job Assign</button>
                                        <button class="btn tab-buttonjoblist flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#AccessoryJoblist" aria-controls="AccessoryJoblist" aria-selected="false" id="showaccessoryJoblist">Accessory</button>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="tab-content">
                                    <!-- Job info -->
                                    <div class="tab-pane show active" id="JobInfoJoblist" role="tabpanel" aria-labelledby="JobInfoJoblist" style="color: black;">
                                        <form id="showjobinfoJoblist" action="homeindex.php" method="post">
                                            <div class="jobinfo-details">

                                            </div>
                                        </form>
                                    </div>
                                
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.joblistPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterjoblist-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfo.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                
                                                    success: function(response) {
                                                        $('.jobinfo-details').html(response);
                                                    },
                                                
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.jobinfo-details').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                
                                    <!-- Job Assign -->
                                    <div class="tab-pane" id="JobAssignJoblist" role="tabpanel" aria-labelledby="JobAssignJoblist" style="color: black;">
                                        <form id="showjobassignJoblist" action="AdminHomepageJobassign.php" method="post">
                                            <div class="Joblist-JobAssign">

                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.joblistPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterjoblist-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassign.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function(response) {
                                                        $('.Joblist-JobAssign').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Joblist-JobAssign').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Accessories -->
                                    <div class="tab-pane" id="AccessoryJoblist" role="tabpanel" aria-labelledby="AccessoryJoblist" style="color: black;">
                                        <form id="showaccessoryJoblist" action="ajaxtabaccessories.php" method="post">
                                            <div class="Joblist-accessories">

                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.joblistPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterjoblist-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function(response) {
                                                        $('.Joblist-accessories').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Joblist-accessories').html("An error occurred while fetching data.");
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
                        const tabButtonsJoblist = document.querySelectorAll('.tab-buttonsjoblist .tab-buttonjoblist');
                        const todoElements = document.querySelectorAll('.Job.card-body[data-jobregisterjoblist-id]');
                        const joblistModal = new bootstrap.Modal(document.getElementById('joblistModal'));
                        
                        function setActiveTab(button, targetTab) {
                            document.querySelectorAll('.tab-pane').forEach((pane) => {
                                pane.classList.remove('show', 'active');
                            });
                            
                            document.querySelector(targetTab).classList.add('show', 'active');
                            
                            tabButtonsJoblist.forEach((btn) => {
                                btn.classList.remove('active');
                            });
                            
                            button.classList.add('active');
                        }
                        
                        tabButtonsJoblist.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                const targetTab = button.getAttribute('data-bs-target');
                                setActiveTab(button, targetTab);
                            });
                        });
                        
                        todoElements.forEach((todoElement) => {
                            todoElement.addEventListener('click', () => {
                                joblistModal.show();
                            });
                        });
                    });
                </script>
                <!-- End of Job Listing Popup Modal -->
                <!-- End of Job List Box -->
                
                <!-- Storekeeper Box -->
                <div class="col-lg-3 mb-3">
                    <div class="Box card">
                        <div class="card-body">
                            <div class="clearfix mb-2">
                                <div class="float-start"><h6 class="fw-bold">Store</h6></div>
                                <?php
                                    
                                    include 'dbconnect.php';

                                    $numRow = "SELECT * FROM job_register WHERE (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'Yes' AND job_status IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel IS NULL)";
                                                
                                    $numRow_run = mysqli_query($conn, $numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<div class="float-end"><h6 class="fw-bold">Total Job: ' . $row_Total . '</h6></div>';
                                    } 
                                    
                                    else {
                                        echo '<div class="float-end"><h6 class="fw-bold">No Data</h6></div>';
                                    }
                                
                                ?>
                            </div>
                            
                            <?php
                                
                                include 'dbconnect.php';

                                $results = $conn->query("SELECT * FROM job_register WHERE (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC");

                                while ($row = $results->fetch_assoc()) {
                            ?> 
                            <div class="Job card mb-3 storePopup" data-bs-toggle="modal" data-bs-target="#StoreModal" data-jobregisterstore-id="<?php echo $row['jobregister_id']?>">
                                <div class="card-body">
                                    <p class="fw-bold mb-1 ms-3"><?php echo $row['job_order_number'] ?></p>
                                    <ul class="mb-0">
                                        <li><?php echo $row['job_priority'] ?></li>
                                        <li><?php echo $row['customer_name'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['job_status'] ?></li>
                                    </ul>
                                    <p class="fw-bold ms-3"><?php echo $row['reason'] ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Store Popup Modal -->
                <div class="modal fade" id="StoreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="tab-buttonsStore d-flex flex-wrap" role="tablist">
                                        <button class="btn tab-buttonStore active flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobInfoStore" aria-controls="JobInfoStore" aria-selected="true" id="showjobinfoStore">Job Info</button>
                                        <button class="btn tab-buttonStore flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobAssignStore" aria-controls="JobAssignStore" aria-selected="false" id="showjobassignStore">Job Assign</button>
                                        <button class="btn tab-buttonStore flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#AccessoryStore" aria-controls="AccessoryStore" aria-selected="false" id="showaccessoryStore">Accessory</button>
                                        <button class="btn tab-buttonStore flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#UpdateStore" aria-controls="UpdateStore" aria-selected="false" id="showUpdateStore">Update</button>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="tab-content">
                                    <!-- Job info -->
                                    <div class="tab-pane show active" id="JobInfoStore" role="tabpanel" aria-labelledby="JobInfoStore" style="color: black;">
                                        <form id="showjobinfoJoblist" action="homeindex.php" method="post">
                                            <div class="Store-details">

                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.storePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterstore-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoStorekeeper.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Store-details').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Store-details').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Job Assign -->
                                    <div class="tab-pane" id="JobAssignStore" role="tabpanel" aria-labelledby="JobAssignStore" style="color: black;">
                                        <form id="showjobassignJoblist" action="AdminHomepageJobassignStore.php" method="post">
                                            <div class="Store-JobAssign">

                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.storePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterstore-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassignStore.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function(response) {
                                                        $('.Store-JobAssign').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Store-JobAssign').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Accessories -->
                                    <div class="tab-pane" id="AccessoryStore" role="tabpanel" aria-labelledby="AccessoryStore" style="color: black;">
                                        <form id="showaccessoryJoblist" action="ajaxtabaccessories.php" method="post">
                                            <div class="Store-accessories">
            
                                            </div>
                                        </form>
                                    </div>
            
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.storePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterstore-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Store-accessories').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Store-accessories').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Update -->
                                    <div class="tab-pane" id="UpdateStore" role="tabpanel" aria-labelledby="UpdateStore" style="color: black;">
                                        <form id="showUpdateStore" action="ajaxstoreupdateADMIN.php" method="post">
                                            <div class="Store-update">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.storePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterstore-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxstoreupdateADMIN.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Store-update').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Store-update').html("An error occurred while fetching data.");
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
                        const tabButtonsStore = document.querySelectorAll('.tab-buttonsStore .tab-buttonStore');
                        const todoElements = document.querySelectorAll('.Job.card-body[data-jobregisterjoblist-id]');
                        const storeModal = new bootstrap.Modal(document.getElementById('StoreModal'));
                        
                        function setActiveTab(button, targetTab) {
                            document.querySelectorAll('.tab-pane').forEach((pane) => {
                                pane.classList.remove('show', 'active');
                            });
                            
                            document.querySelector(targetTab).classList.add('show', 'active');
                            
                            tabButtonsStore.forEach((btn) => {
                                btn.classList.remove('active');
                            });
                            
                            button.classList.add('active');
                        }
                        
                        tabButtonsStore.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                const targetTab = button.getAttribute('data-bs-target');
                                setActiveTab(button, targetTab);
                            });
                        });
                        
                        todoElements.forEach((todoElement) => {
                            todoElement.addEventListener('click', () => {
                                storeModal.show();
                            });
                        });
                    });
                </script>
                <!-- End of Store Popup Modal -->
                <!-- End of Storekeeper Box -->
                
                <!-- Pending Box -->
                <div class="col-lg-3 mb-3">
                    <div class="Box card">
                        <div class="card-body">
                            <div class="clearfix mb-2">
                                <div class="float-start"><h6 class="fw-bold">Pending</h6></div>
                                <?php
                                    include 'dbconnect.php';

                                    $numRow = "SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                    OR    
                                               (job_status = 'Pending' AND job_cancel IS NULL)";

                                    $numRow_run = mysqli_query($conn, $numRow);

                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<div class="float-end"><h6 class="fw-bold">Total Job: ' . $row_Total . '</h6></div>';
                                    }
                                
                                    else {
                                        echo '<div class="float-end"><h6 class="fw-bold">No Data</h6></div>';
                                    }
                                ?>
                            </div>
                            
                            <?php
                                
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                            OR    
                                                        (job_status = 'Pending' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC");

                                while ($row = $results->fetch_assoc()) {
                            ?>
                            <div class="Job card mb-3 pendingPopup" data-bs-toggle="modal" data-bs-target="#PendingModal" data-jobregisterpending-id="<?php echo $row['jobregister_id'] ?>">
                                <div class="card-body">
                                    <p class="fw-bold mb-1 ms-3"><?php echo $row['job_order_number'] ?></p>
                                    <ul class="mb-0">
                                        <li><?php echo $row['job_priority'] ?></li>
                                        <li><?php echo $row['customer_name'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['job_status'] ?></li>
                                        <li class="fw-bold">Pending Reason: <?php echo $row['reason'] ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Pending Job Popup Modal -->
                <div class="modal fade" id="PendingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="tab-buttonsPending container m-auto" role="tablist">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn tab-buttonPending active" data-bs-target="#JobInfoPending" aria-controls="JobInfoPending" aria-selected="true" id="showjobinfoPending" style="border: none; font-weight: bold;">Job Info</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-buttonPending" data-bs-target="#JobAssignPending" aria-controls="JobAssignPending" aria-selected="false" id="showjobassignPending" style="border: none; font-weight: bold; white-space: nowrap;">Job Assign</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-buttonPending" data-bs-target="#UpdatePending" aria-controls="UpdatePending" aria-selected="false" id="showUpdatePending" style="border: none; font-weight: bold; white-space: nowrap;">Update</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-buttonPending" data-bs-target="#AccessoryPending" aria-controls="AccessoryPending" aria-selected="false" id="showaccessoryPending" style="border: none; font-weight: bold;">Accessory</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-buttonPending" data-bs-target="#PhotoPending" aria-controls="PhotoPending" aria-selected="false" id="showPhotoPending" style="border: none; font-weight: bold;">Photo</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-buttonPending" data-bs-target="#VideoPending" aria-controls="VideoPending" aria-selected="false" id="showVideoPending" style="border: none; font-weight: bold;">Video</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="tab-content">
                                    <!-- Job info -->
                                    <div class="tab-pane show active" id="JobInfoPending" role="tabpanel" aria-labelledby="JobInfoPending" style="color: black;">
                                        <form id="showjobinfoPending" action="homeindex.php" method="post">
                                            <div class="Pending-details">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.pendingPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterpending-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoPending.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Pending-details').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Pending-details').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                                
                                    <!-- Job Assign -->
                                    <div class="tab-pane" id="JobAssignPending" role="tabpanel" aria-labelledby="JobAssignPending" style="color: black;">
                                        <form id="showjobassignPending" action="AdminHomepageJobassign.php" method="post">
                                            <div class="Pending-JobAssign">
            
                                            </div>
                                        </form>
                                    </div>
            
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.pendingPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterpending-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassign.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Pending-JobAssign').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Pending-JobAssign').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Update -->
                                    <div class="tab-pane" id="UpdatePending" role="tabpanel" aria-labelledby="UpdatePending" style="color: black;">
                                        <form id="showUpdatePending" action="AdminHomepageUpdate.php" method="post">
                                            <div class="Pending-update">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.pendingPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterpending-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageUpdate.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Pending-update').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Pending-update').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Accessories -->
                                    <div class="tab-pane" id="AccessoryPending" role="tabpanel" aria-labelledby="AccessoryPending" style="color: black;">
                                        <form id="showaccessoryPending" action="ajaxtabaccessories.php" method="post">
                                            <div class="Pending-accessories">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.pendingPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterpending-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Pending-accessories').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Pending-accessories').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Photo -->
                                    <div class="tab-pane" id="PhotoPending" role="tabpanel" aria-labelledby="PhotoPending" style="color: black;">
                                        <form id="showPhotoPending" action="ajaxtechphtoupdt.php" method="post">
                                            <div class="Pending-photo">
            
                                            </div>
                                        </form>
                                    </div>
            
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.pendingPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterpending-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechphtoupdt.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Pending-photo').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Pending-photo').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Video -->
                                    <div class="tab-pane" id="VideoPending" role="tabpanel" aria-labelledby="VideoPending" style="color: black;">
                                        <form id="showVideoPending" action="ajaxtechvideoupdt.php" method="post">
                                            <div class="Pending-Video">

                                            </div>
                                        </form>
                                    </div>
                                                
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.pendingPopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterpending-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechvideoupdt.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Pending-Video').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Pending-Video').html("An error occurred while fetching data.");
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
                        const tabButtonsPending = document.querySelectorAll('.tab-buttonsPending .tab-buttonPending');
                        const todoElements = document.querySelectorAll('.Job.card-body[data-jobregisterjoblist-id]');
                        const pendingModal = new bootstrap.Modal(document.getElementById('PendingModal'));
                        
                        function setActiveTab(button, targetTab) {
                            document.querySelectorAll('.tab-pane').forEach((pane) => {
                                pane.classList.remove('show', 'active');
                            });
                            
                            document.querySelector(targetTab).classList.add('show', 'active');
                            
                            tabButtonsPending.forEach((btn) => {
                                btn.classList.remove('active');
                            });
                            
                            button.classList.add('active');
                        }
                        
                        tabButtonsPending.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                const targetTab = button.getAttribute('data-bs-target');
                                setActiveTab(button, targetTab);
                            });
                        });
                        
                        todoElements.forEach((todoElement) => {
                            todoElement.addEventListener('click', () => {
                                pendingModal.show();
                            });
                        });
                    });
                </script>
                <!-- End of Pending Job Popup Modal -->
                <!-- End of Pending Box -->
                
                <!-- Incomplete Box -->
                <div class="col-lg-3 mb-3">
                    <div class="Box card">
                        <div class="card-body">
                            <div class="clearfix mb-2">
                                <div class="float-start"><h6 class="fw-bold">Incomplete</h6></div>
                                <?php
                                    
                                    include 'dbconnect.php';
                                    
                                    $numRow ="SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                OR    
                                            (job_status = 'Incomplete' AND job_cancel IS NULL)";
                                            
                                    $numRow_run = mysqli_query($conn, $numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<div class="float-end"><h6 class="fw-bold">Total Job: ' . $row_Total . '</h6></div>';
                                    }
                                    
                                    else {
                                        echo '<div class="float-end"><h6 class="fw-bold">No Data</h6></div>';
                                    }
                                ?> 
                            </div>
                            
                            <?php
                                
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                            OR    
                                                        (job_status = 'Incomplete' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC");

                                while ($row = $results->fetch_assoc()) {
                            ?> 
                            <div class="Job card mb-3 IncompletePopup" data-bs-toggle="modal" data-bs-target="#IncompleteModal" data-jobregisterincomplete-id="<?php echo $row['jobregister_id'] ?>">
                                <div class="card-body">
                                    <p class="fw-bold mb-1 ms-3"><?php echo $row['job_order_number'] ?></p>
                                    <ul class="mb-0">
                                        <li><?php echo $row['job_priority'] ?></li>
                                        <li><?php echo $row['customer_name'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['job_status'] ?></li>
                                        <li class="fw-bold">Incomplete reason: <?php echo $row['reason'] ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Incomplete Job Popup Modal -->
                <div class="modal fade" id="IncompleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="tab-buttonsIncomplete d-flex flex-wrap gap-4" role="tablist">
                                        <button class="btn tab-buttonIncomplete active flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobInfoIncomplete" aria-controls="JobInfoIncomplete" aria-selected="true" id="showjobinfoIncomplete">Job Info</button>
                                        <button class="btn tab-buttonIncomplete flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#JobAssignIncomplete" aria-controls="JobAssignIncomplete" aria-selected="false" id="showjobassignIncomplete">Job Assign</button>
                                        <button class="btn tab-buttonIncomplete flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#UpdateIncomplete" aria-controls="UpdateIncomplete" aria-selected="false" id="showUpdateIncomplete">Update</button>
                                        <button class="btn tab-buttonIncomplete flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#AccessoryIncomplete" aria-controls="AccessoryIncomplete" aria-selected="false" id="showaccessoryIncomplete">Accessory</button>
                                        <button class="btn tab-buttonIncomplete flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#PhotoIncomplete" aria-controls="PhotoIncomplete" aria-selected="false" id="showPhotoIncomplete">Photo</button>
                                        <button class="btn tab-buttonIncomplete flex-grow-1" style="border:none; font-weight: bold;" data-bs-target="#VideoIncomplete" aria-controls="VideoIncomplete" aria-selected="false" id="showVideoIncomplete">Video</button>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                 <div class="tab-content mt-3">
                                    <!-- Job info -->
                                    <div class="tab-pane show active" id="JobInfoIncomplete" role="tabpanel" aria-labelledby="JobInfoIncomplete" style="color: black;">
                                        <form id="showjobinfoIncomplete" action="homeindex.php" method="post">
                                            <div class="Incomplete-details">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.IncompletePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterincomplete-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoIncomplete.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Incomplete-details').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Incomplete-details').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Job Assign -->
                                    <div class="tab-pane" id="JobAssignIncomplete" role="tabpanel" aria-labelledby="JobAssignIncomplete" style="color: black;">
                                        <form id="showjobassignIncomplete" action="AdminHomepageJobassign.php" method="post">
                                            <div class="Incomplete-JobAssign">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.IncompletePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterincomplete-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassign.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Incomplete-JobAssign').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Incomplete-JobAssign').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Update -->
                                    <div class="tab-pane" id="UpdateIncomplete" role="tabpanel" aria-labelledby="UpdateIncomplete" style="color: black;">
                                        <form id="showUpdateIncomplete" action="AdminHomepageUpdate.php" method="post">
                                            <div class="Incomplete-update">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.IncompletePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterincomplete-id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageUpdate.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Incomplete-update').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Incomplete-update').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Accessories -->
                                    <div class="tab-pane" id="AccessoryIncomplete" role="tabpanel" aria-labelledby="AccessoryIncomplete" style="color: black;">
                                        <form id="showaccessoryIncomplete" action="ajaxtabaccessories.php" method="post">
                                            <div class="Incomplete-accessories">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.IncompletePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterincomplete-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function(response) {
                                                        $('.Incomplete-accessories').html(response);
                                                    },
                                                                
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Incomplete-accessories').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Photo -->
                                    <div class="tab-pane" id="PhotoIncomplete" role="tabpanel" aria-labelledby="PhotoIncomplete" style="color: black;">
                                        <form id="showPhotoIncomplete" action="ajaxtechphtoupdt.php" method="post">
                                            <div class="Incomplete-photo">
            
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.IncompletePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterincomplete-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechphtoupdt.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function(response) {
                                                        $('.Incomplete-photo').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Incomplete-photo').html("An error occurred while fetching data.");
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Video -->
                                    <div class="tab-pane" id="VideoIncomplete" role="tabpanel" aria-labelledby="VideoIncomplete" style="color: black;">
                                        <form id="showVideoIncomplete" action="ajaxtechvideoupdt.php" method="post">
                                            <div class="Incomplete-Video">

                                            </div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.IncompletePopup').click(function() {
                                                var jobregister_id = $(this).data('jobregisterincomplete-id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechvideoupdt.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.Incomplete-Video').html(response);
                                                    },
                                                    
                                                    error: function(xhr, status, error) {
                                                        console.log("An error occurred:", error);
                                                        $('.Incomplete-Video').html("An error occurred while fetching data.");
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
                        const tabButtonsIncomplete = document.querySelectorAll('.tab-buttonsIncomplete .tab-buttonIncomplete');
                        
                        tabButtonsIncomplete.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                
                                const targetTab = button.getAttribute('data-bs-target');
                                const jobregisterId = button.getAttribute('data-jobregisterincomplete-id');
                                const modal = new bootstrap.Modal(document.querySelector(targetTab));
                                
                                document.querySelectorAll('.tab-pane').forEach((pane) => {
                                    pane.classList.remove('show', 'active');
                                });
                                
                                document.querySelector(targetTab).classList.add('show', 'active');
                                
                                tabButtonsIncomplete.forEach((btn) => {
                                    btn.classList.remove('active');
                                });
                                
                                button.classList.add('active');
                            });
                        });
                        
                        const todoElements = document.querySelectorAll('.todo.card-body[data-jobregisterincomplete-id]');
                        
                        todoElements.forEach((todoElement) => {
                            todoElement.addEventListener('click', () => {
                                const jobregisterId = todoElement.getAttribute('data-jobregisterincomplete-id');
                                const modal = new bootstrap.Modal(document.getElementById('IncompleteModal'));
                                
                                modal.show();
                            });
                        });
                    });
                </script>
                <!-- End of Incomplete Job Popup Modal -->
                <!-- End of Incomplete Box -->
                        
                <!-- Technician Box -->
                <?php
                    
                    include 'dbconnect.php';
                    
                    $results = $conn->query("SELECT * FROM staff_register WHERE staff_position='Leader' ORDER BY username ASC");
                    
                    $numsofrow = mysqli_num_rows($results);
                    
                    $employees = [];
                    
                    $i = 0;
                    
                    while ($row = $results->fetch_assoc()) {
                        $employees[] = $row;
                    }
                    
                    foreach ($employees as $employee) :
                        $i++;
                        $username = $employee['username'];        
                ?>  
                <div class="col-lg-3 mb-3">
                    <div class="Box card">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-start"><h6 class="fw-bold"><?php echo $username ?></h6></div>
                                <?php
                                    $numRow = "SELECT * FROM job_register WHERE (job_assign = '$username' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (job_assign = '$username' AND job_status = '' AND job_cancel IS NULL)
                                                    OR
                                                (job_assign = '$username' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (job_assign = '$username' AND job_status = 'Doing' AND job_cancel = '')
                                                    OR
                                                (job_assign = '$username' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                    OR
                                                (job_assign = '$username' AND job_status = 'Ready' AND job_cancel = '')
                                                    OR
                                                (job_assign = '$username' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                    OR
                                                (job_assign = '$username' AND job_status IS NULL AND job_cancel = '')";

                                    $numRow_run = mysqli_query($conn, $numRow);
                
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<div class="float-end"><h6 class="fw-bold">Total Job: ' . $row_Total . '</h6></div>';
                                    }

                                    else {
                                        echo '<div class="float-end"><h6 class="fw-bold">No Record</h6></div>';
                                    }

                                    echo '</div>';
                                    
                                    $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='$username'");
                                    
                                    while ($data = mysqli_fetch_array($records)) {
                                        if ($data['tech_avai'] == 1) {
                                            echo '<div class="Off clearfix mb-2">
                                                    <div class="float-end"><h6 class="fw-bold"><a href="statusadmin.php?staffregister_id=' . $data['staffregister_id'] . '&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></h6></div>
                                                  </div>';
                                        } 
                                
                                        else {
                                            echo '<div class="Off clearfix mb-2">
                                                    <div class="float-end"><h6 class="fw-bold"><a href="statusadmin.php?staffregister_id=' . $data['staffregister_id'] . '&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></h6></div>
                                                  </div>';
                                        }
                                    }

                                    $results = $conn->query("SELECT * FROM job_register WHERE (job_assign = '$username' AND job_status = '' AND job_cancel = '')
                                                                OR
                                                            (job_assign = '$username' AND job_status = '' AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status IS NULL AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Doing' AND job_cancel = '')
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Ready' AND job_cancel = '')
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status IS NULL AND job_cancel = '') ORDER BY jobregisterlastmodify_at DESC");
                                
                                    $username = str_replace(" ", "", $username);

                                    while ($row = $results->fetch_assoc()) {
                            ?> 
                            <div class="Job card mb-3 staff-card" data-bs-toggle="modal" data-bs-target="#techPopup" data-type_id="<?php echo $row['type_id']; ?>" data-id="<?php echo $row['jobregister_id']; ?>" data-customer_name="<?php echo $row['customer_name']; ?>">
                                <div class="card-body">
                                    <p class="fw-bold mb-1 ms-3"><?php echo $row['job_order_number'] ?></p>
                                    <ul class="mb-0">
                                        <li><?php echo $row['job_priority'] ?></li>
                                        <li><?php echo $row['customer_name'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['job_status'] ?></li>
                                    </ul>
                                    <?php
                                        if($row['support'] != "" || $row['support'] != NULL) {
                                            echo '<div class="badge bg-secondary text-wrap float-end" id="support" style="width:fit-content;">';
                                            echo '' .$row['support'] ;
                                            echo '</div>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Technician Popup Modal -->
                <div class="modal fade" id="techPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="tab-buttons container px-auto" role="tablist">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn tab-button active" data-bs-target="#tab1" aria-controls="tab1" aria-selected="true" id="jobInfoTab" style="border: none; font-weight: bold;">Job Info</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-button" data-bs-target="#tab2" aria-controls="tab2" aria-selected="false" id="jobAssignTab" style="border: none; font-weight: bold; white-space: nowrap;">Job Assign</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-button" data-bs-target="#tab3" aria-controls="tab3" aria-selected="false" id="updateTab" style="border: none; font-weight: bold; white-space: nowrap;">Update</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-button" data-bs-target="#tab4" aria-controls="tab4" aria-selected="false" id="accessoryTab" style="border: none; font-weight: bold;">Accessory</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-button" data-bs-target="#tab5" aria-controls="tab5" aria-selected="false" id="photoTab" style="border: none; font-weight: bold;">Photo</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-button" data-bs-target="#tab6" aria-controls="tab6" aria-selected="false" id="videoTab" style="border: none; font-weight: bold;">Video</button>
                                        </div>
                                        
                                        <div class="col">
                                            <button class="btn tab-button" data-bs-target="#tab7" aria-controls="tab7" aria-selected="false" id="reportTab" style="border: none; font-weight: bold;">Report</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="tab-content">
                                    <!-- Job Info Tab -->
                                    <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1" style="color: black;">
                                    <form method="post" id="info">
                                        <div class="row me-auto">
                                            <input type="hidden" name="jobregister_id" id="jobregister_idinfo" value="">
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Priority</label>
                                                <input type="text" name="job_priority" id="job_priority" class="form-control" value="">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Order Number</label>
                                                <div class="input-group">
                                                    <input type="text" name="job_order_number" id="job_order_number" class="form-control" value="">
                                                    <button type="button" class="btn" style="color: white; background-color: #081d45; border:none; width: fit-content;" id="button-addon2" onclick="buttonClick()">Click</button>
                                                    
                                                    <script>
                                                        var i = 1;
                                                        var jobordernumber2;
                                                        
                                                        function buttonClick() {
                                                            if (i == 1){
                                                                var jobordernumber = document.getElementById('job_order_number').value;
                                                                    jobordernumber2 = jobordernumber;
                                                            }
                                                            
                                                            var parts = jobordernumber2.split('-');
                                                            var newNumber = parts[parts.length-1] + "-" + i;
                                                            var newJobOrderNumber = parts[0];
                                                            
                                                            for (var j = 1; j < parts.length-1; j++){
                                                                newJobOrderNumber = newJobOrderNumber + "-" + parts[j];
                                                            }
                                                            
                                                            newJobOrderNumber = newJobOrderNumber + "-" + newNumber;
                                                            document.getElementById('job_order_number').value = newJobOrderNumber;
                                                            i++;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Name</label>
                                                <select name="job_code" id="job_code" class="form-select" onchange="GetJob(this.value)">
                                                    <option value="">
                                                        <?php
                                                            
                                                            include "dbconnect.php";
                                                            
                                                            $records = mysqli_query($conn, "SELECT * From jobtype_list");
                                                            
                                                            while($data = mysqli_fetch_array($records)) {
                                                                echo "<option value='". $data['job_code'] ."'>" . $data['job_code']. "      -      " . $data['job_name']."</option>";
                                                            }
                                                        ?>
                                                    </option>
                                                </select>
                                                <input type="hidden" id="job_name" name="job_name" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Description</label>
                                                <input type="text" name="job_description" id="job_description" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Requested Date</label>
                                                <input type="text" name="requested_date" id="requested_date" class="form-control" value="">
                                            </div>
                                            
                                            <script>
                                                $("#requested_date").datepicker();
                                                $("#requested_date").datepicker("option", "dateFormat", "dd/mm/yy");
                                            </script>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Delivery Date</label>
                                                <input type="text" name="delivery_date" id="delivery_date" class="form-control" value="">
                                            </div>
                                            
                                            <script>
                                                $("#delivery_date").datepicker();
                                                $("#delivery_date").datepicker("option", "dateFormat", "dd/mm/yy");
                                            </script>
                                            
                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Customer Name</label>
                                                <select id="custModel" class="form-select" onchange="GetCustomer(this.value)">
                                                <option value=""></option>
                                                    <?php
                                                        
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT customer_id, customer_code, customer_name From customer_list ORDER BY customerlasmodify_at ASC");
                                                        
                                                        while($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='". $data['customer_id'] ."'>" . $data['customer_name']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <input type="hidden" id="cust"onchange="GetCustomer(this.value)" readonly>
                                                <input type="hidden" id="customer_code" name="customer_code" value="" readonly>
                                                <input type="hidden" id="customer_name" name="customer_name" value="" readonly>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Customer Address</label>
                                                <input type="text" name="cust_address1" id="cust_address1" class="form-control" value="">
                                                <div class="d-flex gap-2 mt-2">
                                                    <input type="text" name="cust_address2" id="cust_address2" class="form-control" value="">
                                                    <input type="text" name="cust_address3" id="cust_address3" class="form-control" value="">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer Grade</label>
                                                <input type="text" name="customer_grade" id="customer_grade" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer PIC</label>
                                                <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer Contact Number 1</label>
                                                <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer Contact Number 2</label>
                                                <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Machine Brand</label>
                                                <select name="brand_id" id="brand_id" class="form-select">
                                                    <option value=""></option>
                                                        <?php
                                                            
                                                            include "dbconnect.php";
                                                            
                                                            $records = mysqli_query($conn, "SELECT * From machine_brand");
                                                            
                                                            while($data = mysqli_fetch_array($records)) {
                                                                echo "<option value='". $data['brand_id'] ."' data-brandname='".$data['brandname']."'>" . $data['brandname']."</option>";
                                                            }
                                                        ?>
                                                </select>
                                                <input type="hidden" name="machine_brand" id="machine_brand" value="">
                                            </div>
                                            
                                            <script>
                                                $(document).ready(function() {
                                                    $('#brand_id').on('change', function() {
                                                        var selectedBrandId = $(this).val();
                                                        var selectedBrandName =$(this).find('option:selected').data('brandname');
                                                        
                                                        $.ajax({
                                                            url: 'machineGetMachineType.php',
                                                            type: 'POST',
                                                            data: {brand_id: selectedBrandId},
                                                                   dataType: 'json',
                                                                   
                                                            success: function(response) {
                                                                $("#machine_brand").val(selectedBrandName);
                                                                $('#type_id').empty().append('<option value="">Select Machine Type</option>');
                                                                $('#serialnumbers').empty().append('<option value="">Select Serial Number</option>');
                                                                
                                                                $.each(response, function(index, value) {
                                                                    $('#type_id').append('<option value="' + value.machine_type_id + '" data-typename="' + value.machine_type_name + '">' + value.machine_type_name + '</option>');
                                                                });
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Machine Type</label>
                                                <select name="type_id" id="type_id" class="form-select">
                                                    <option value=""></option>
                                                </select>
                                                <input type="hidden" name="machine_type" id="machine_type" value="">
                                            </div>
                                            
                                            <script>
                                                $(document).ready(function() {
                                                    $("#type_id").on('change', function() {
                                                        var typeid = $(this).val();
                                                        var typename = $(this).find('option:selected').data("typename");
                                                        
                                                        $.ajax({
                                                            method: "POST",
                                                            url: "ajaxData.php",
                                                            data: {sid: typeid},
                                                            datatype: "html",
                                                            
                                                            success: function(data) {
                                                                $("#machine_type").val(typename);
                                                                $("#serialnumbers").html(data);
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Serial Number</label>
                                                <select id="serialnumbers" class="form-select" onchange="GetMachines(this.value)">
                                                    <option value=""></option>
                                                </select>
                                            
                                                <input type="hidden" id="machine_id" name="machine_id" value="">
                                                <input type="hidden" id="serialnumber" name="serialnumber" value="">
                                                <input type="hidden" id="machine_code" name="machine_code" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="accessories_required" class="fw-bold">Accessory Required</label>
                                                <select name="accessories_required" id="accessories_required" class="form-select" onchange="myFunctionAccessory()">
                                                    <option value=''></option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            
                                            <script>
                                                function myFunctionAccessory() {
                                                    var accessories = document.getElementById("accessories_required").value;
                                                    var accForDiv = document.getElementById("Accessory");
                                                    
                                                    if (accessories === "Yes") {
                                                        accForDiv.style.display = "block";
                                                    } 
                                                    
                                                    else {
                                                        accForDiv.style.display = "none";
                                                        document.getElementById("accessories_for").value = "";
                                                    }
                                                }
                                            </script>
                                            
                                            <div class="mb-3" id="Accessory">
                                                <label for="accessories_for" class="fw-bold">Accessory For</label>
                                                <select name="accessories_for" id="accessories_for" class="form-select">
                                                    <option value="Technician Use">Technician Use</option>
                                                    <option value="Customer Request">Customer Request</option>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Machine Name</label>
                                                <input type="text" name="machine_name" id="machine_name" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Cancel Job</label>
                                                <select name="job_cancel" id="job_cancel" class="form-select">
                                                    <option value=''></option>
                                                    <option value='YES'>YES</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Status</label>
                                                <select name="job_status" id="job_status" class="form-select" onchange="myFunctionReason()">
                                                    <option value='' ></option>
                                                    <option value='Doing'>Doing</option>
                                                    <option value='Pending'>Pending</option>
                                                    <option value='Incomplete'>Incomplete</option>
                                                    <option value='Completed'>Completed</option></select>
                                            </div>

                                            <script>
                                                function myFunctionReason() {
                                                    var status = document.getElementById("job_status").value;
                                                    var reasonDiv = document.getElementById("giveReason");
                                                        
                                                    if (status === "Pending" || status === "Incomplete") {
                                                        reasonDiv.style.display = "block";
                                                    } 
                                                    
                                                    else {
                                                        reasonDiv.style.display = "none";
                                                        document.getElementById("reason").value="";
                                                    }
                                                }
                                            </script>
                                                        
                                            <div class="mb-3" id="giveReason">
                                                <label for="" class="fw-bold">Reason</label>
                                                <input type="text" name="reason" id="reason" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Assign To</label>
                                                <select name="jobassignsupport" id="jobassignsupport" class="form-control">
                                                    <option value=""></option>
                                                        <?php
                                                      
                                                            $results = mysqli_query($conn, "SELECT * From staff_register WHERE staff_position = 'Leader'");
                                                            
                                                            while($data = mysqli_fetch_array($results)) {
                                                                echo "<option value='". $data['username'] ."'>" . $data['username']."</option>";
                                                            }
                                                        ?>
                                                </select>
                                                <input type="hidden" name="support" id="infosupport" value="">
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="" readonly>
                                        
                                        <div class="d-flex">
                                            <button class="btn" style="background-color: #081d45; color: #fff; border:none; width:54%; margin-right:1%;" type="submit" id="submit" name="update">Update</button>
                                            <button class="btn" style="background-color: #023020; color: #fff; border:none; width:54%; margin-left:1%;" type="button" id="duplicate" name="duplicate" onclick="submitFormSupportAdmin();">Support</button>
                                        </div>
                                        <div class="fw-bold mt-2" id="messageSupportAdmin"></div>
                                    </form>
                                    
                                    <script>
                                        $(document).ready(function() {
                                            function hideSuccessMessage() {
                                                document.getElementById("updatetextinfo").style.display = "none";
                                            }
                                            
                                            $("#info").submit(function(e) {
                                                e.preventDefault();
                                                
                                                var formData = new FormData(this);
                                                formData.append("update", "true");
                                              
                                                
                                                $.ajax({
                                                    type: "POST",
                                                    url: "homeindex.php",
                                                    data: formData,
                                                    contentType: false,
                                                    processData: false,
                                                    dataType: "text",
                                                    
                                                    success: function(response) {
                                                        response = response.trim();
                                                        if (response == "success") {
                                                            $("#updatetextinfo").html("Updated Successfully");
                                                            $("#updatetextinfo").css("color", "green");
                                                            $("#updatetextinfo").css("display", "block");
                                                            
                                                            setTimeout(hideSuccessMessage, 2000);
                                                        } 
                                                        
                                                        else {
                                                            console.error("AJAX error:", response);
                                                            $("#updatetextinfo").html("Failed to update");
                                                            $("#updatetextinfo").css("color", "red");
                                                            $("#updatetextinfo").css("display", "block");
                                                            setTimeout(hideSuccessMessage, 2000);
                                                        }
                                                    },
                                                    
                                                    error: function(xhr, textStatus, errorThrown) {
                                                        console.error("AJAX errorr:", errorThrown);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <p class="text-center fw-bold" id="updatetextinfo" style="display: none;"></p>
                                    </div>
                                    <!-- End Job Info Tab -->
                                    
                                    <!-- Job Assign Tab -->
                                    <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2" style="color: black;">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <form id="assignupdate_form" method="post">
                                                    <input type="hidden" name="jobregister_id" class="jobregister_id" id="jobregister_id2" value="">
                                                    
                                                    <label for="" class="fw-bold mb-3">Job Assign</label>
                                                    <div class="input-group">
                                                        <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)">
                                                            <option value=""></option> 
                                                            <?php
                                                                            include "dbconnect.php";
                                                                            
                                                                            $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE 
                                                                                                            technician_rank = '1st Leader' AND tech_avai = '0'
                                                                                                                OR
                                                                                                            technician_rank = '2nd Leader' AND tech_avai = '0'
                                                                                                                OR
                                                                                                            staff_position='Storekeeper' AND tech_avai = '0' ORDER BY staffregister_id ASC");
                                                                            echo "<option></option>";
                                                                            
                                                                            while($data = mysqli_fetch_array($records))
                                                                                {echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." </option>";}	
                                                            ?> 
                                                                    
                                                            <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
                                                            <input type="hidden" name="job_assign" id='username' value="">
                                                            <input type="hidden" name="technician_rank" id='technician_rank' value="" readonly>
                                                            <input type="hidden" name="staff_position" id='staff_position' value="" readonly>
                                                        </select> 
                                                            <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION['username']?>" readonly>
                                                        <button type="button" id="technicianassign" class="btn btn-outline-secondary" style="color: white; background-color: #081d45; border-color: #081d45; width: fit-content;">Update</button>
                                                    </div> 
                                                </form>
                                                <p class="text-center fw-bold" id="assignupdateadminmessage"></p>
                                            </div>
                                        </div>
                    
                                        <div class="card">
                                            <div class="card-body" id="multipleassist">
                                                <form class="form" id="adminassistant_form" method="post">
                                                    <input type="hidden" name="jobregister_id" id="jobregister_id3" value="">
                                                    <input type="hidden" name="ass_date" id="ass_date" value="">
                                                    <input type="hidden" name="techupdate_date" id="techupdate_date" value="">
                                                    <input type="hidden" name="tech_leader" id="tech_leader" value="">
                                                    <input type="hidden" name="cust_name" id="cust_name" value="">
                                                    <input type="hidden" name="requested_date" id="requested_date2" value="">
                                                    <input type="hidden" name="machine_name" id="machine_name2" value="">
                                                    
                                                    <label for="" class="fw-bold mb-3">Assistant</label>
                                                    <div class="table-responsive">
                                                        <table id="selectedassistant" class="table border table-borderless table-striped">
                                                            <tbody> 

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    <div class="input-box" style="width:100%">
                                                        <select name="username[]" id="selectAssistant" class="multiple-assistant form-control" multiple="multiple">
                                                            <?php
                                                                
                                                                $query = "SELECT * FROM staff_register WHERE staff_group = 'Technician' AND tech_avai = '0' 
                                                                          ORDER BY staffregister_id ASC";
                                                                        
                                                                $query_run = mysqli_query($conn, $query);
                                                                
                                                                if(mysqli_num_rows($query_run) > 0) {
                                                                    foreach ($query_run as $rowstaff) {
                                                            ?> 
                                                                    
                                                            <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option> 
                                                                    
                                                            <?php } } else {echo "No Record Found";} ?> 
                                                        </select>
                                                    </div>

                                                    <div class="d-grid justify-content-end mt-3">
                                                        <button type="button" id="updateassign" class="btn" style="color: white; background-color: #081d45; border:none; width: 100px;">Update</button>
                                                    </div>
                                                    
                                                    <script>
                                                        $(document).ready(function () {
                                                            $('#selectAssistant').select2({
                                                                dropdownParent: $('#adminassistant_form'),
                                                                theme: 'bootstrap-5',
                                                                placeholder: 'Select Assistant',
                                                                width: '100%',
                                                            });
                                                        });
                                                    </script>
                                                       
                                                    <input type="hidden" name="ass_date" id="ass_date">
                                                    <input type="hidden" name="cust_name" id="cust_name">
                                                    <input type="hidden" name="requested_date" id="requested_date">
                                                    <input type="hidden" name="machine_name" id="machine_name">
                                                </form>                                     
                                                <input type="hidden" name="jobregisterlastmodify_by2" id="jobregisterlastmodify_by2" value="<?php echo $_SESSION['username']?>" readonly>
                                                <p class="text-center fw-bold" id="assignadminmessage"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Job Assign Tab -->
                                    
                                    <!-- Update Tab -->
                                    <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3" style="color: black;">
                                        <form id="jobUpdate">
                                            <input type="hidden" name="jobregister_id" id="jobregister_id">
                                            <input type="hidden" name="DateAssign" id="DateAssign">
                                            
                                            <label for="" class="fw-bold mb-2">Departure Time</label>
                                            <div class="input-group mb-2">
                                                <input type="text" name="technician_departure" id="technician_departure" class="form-control border border-dark">
                                                <button type="button" class="btn btn-outline-secondary" style="color: white; background-color: #081d45; border-color: #081d45; width: 100px;" onclick="getFormattedDateTime('technician_departure')">Departure</button>
                                            </div>
                                            
                                            <label for="" class="fw-bold mb-2">Time At Site</label>
                                            <div class="input-group mb-2">
                                                <input type="text" name="technician_arrival" id="technician_arrival" class="form-control border border-dark">
                                                <button type="button" class="btn btn-outline-secondary" style="color: white; background-color: #081d45; border-color: #081d45; width: 100px;" onclick="getFormattedDateTime('technician_arrival')">Arrival</button>
                                            </div>
                                            
                                            <label for="" class="fw-bold mb-2">Leaving Time</label>
                                            <div class="input-group mb-2">
                                                <input type="text" name="technician_leaving" id="technician_leaving" class="form-control border border-dark">
                                                <button type="button" class="btn btn-outline-secondary" style="color: white; background-color: #081d45; border-color: #081d45; width: 100px;" onclick="getFormattedDateTime('technician_leaving')">Leaving</button>
                                            </div>
                                            
                                            <label for="" class="fw-bold mb-2">Rest Hour</label>
                                            <div class="d-grid gap-2">
                                                <div class="input-group">
                                                    <input type="text" name="tech_out" id="tech_out" class="form-control border border-dark">
                                                    <button type="button" class="btn btn-outline-secondary" style="color: white; background-color: #081d45; border-color: #081d45; width: 100px;" onclick="getFormattedTime('tech_out')">Out</button>
                                                </div>
                                                
                                                <div class="input-group">
                                                    <input type="text" name="tech_in" id="tech_in" class="form-control border border-dark">
                                                    <button type="button" class="btn btn-outline-secondary" style="color: white; background-color: #081d45; border-color: #081d45; width: 100px;" onclick="getFormattedTime('tech_in')">In</button>
                                                </div>
                                            </div>
                                            
                                            <div class="d-grid justify-content-end mt-3">
                                                <button type="button" id="update_tech" name="update_tech" class="btn" style="color: white; background-color: #081d45; border:none; width: 100px;">Update</button>
                                            </div>
                                        </form>
                                        <p id="techupdateAdmin" class="text-center fw-bold"></p>
                                    </div>
                                    <!-- End of Update Tab -->
                                    
                                    <!-- Accessory Tab -->
                                    <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4" style="color: black;">
                                        <input type="hidden" name="jobregister_id" id="jobregister_id">
                                    
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th style='text-align: center;'>No</th>
                                                        <th style='text-align: center;'>Code</th>
                                                        <th style='text-align: center;'>Name</th>
                                                        <th style='text-align: center;'>UOM</th>
                                                        <th style='text-align: center;'>Quantity</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                        
                                                <tbody id="_editable_table">
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <a href="javascript:void(0);" class="add_button fw-bold mb-3" title="Add field" type="button">Add another accessory</a>
                                        
                                        <form id="adminacc_form" method="post">
                                            <div class="model">

                                            </div>
                                            
                                            <div class="d-grid justify-content-end">
                                                <button type="button" id="update_acc" name="update_acc" class="btn btn-primary" style="color: white; background-color: #081d45; border-color: #081d45; width: 100px;">Update</button>
                                            </div>
                                        </form>
                                        
                                        <p class="text-center fw-bold" id="accessoriesmessage"></p>
                                    </div>
                                    <!-- End of Accessory Tab -->
                                    
                                    <!-- Photo Tab -->
                                    <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5" style="color: black;">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <form id="submitForm">
                                                    <input type="hidden" id="jobregister_idp1" name="jobregister_id" value="">
                                                    
                                                    <label for="" class="fw-bold mb-3">Photo Before Service</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" name="multipleFile[]" id="multipleFile" required="" multiple>
                                                        <input type="hidden" id="description" name="description" value="Machine (Before Service)">
                                                        <button type="submit" class="btn" style="color: white; background-color: #081d45;">Upload</button>
                                                    </div>
                                                    
                                                    <div id="previewBefore"></div>
                                                    
                                                    <p class="text-center fw-bold" id="messageImagebefore"></p>
                                                </form>
                                                
                                                <div class="d-grid gap-2 text-center">
                                                    <!-- <a href="image/<?php echo $res['file_name']; ?>" download><img class="img-thumbnail vw-auto vh-auto" src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></a> -->
                                                    
                                                    <table id="tablep1">
                                                        <tbody id="tbodyp1" style="display: flex; flex-wrap: wrap;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <form id="submitAfterForm">
                                                    <input type="hidden" id="jobregister_idp2" name="jobregister_id" value="">
                                                    
                                                    <label for="" class="fw-bold mb-3">Photo After Service</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" name="multipleFile[]" id="multipleAfter" required="" multiple>
                                                        <input type="hidden" id="description" name="description" value="Machine (After Service)">
                                                        <button type="submit" class="btn" style="color: white; background-color: #081d45; width: fit-content;">Upload</button>
                                                    </div>
                                                    
                                                    <div id="previewAfter"></div>
                                                    
                                                    <p class="text-center fw-bold" id="messageImageAfter"></p>
                                                </form>
                                                
                                                <div class="d-grid gap-2 text-center">
                                                    <table id="tablep2">
                                                        <tbody id="tbodyp2" style="display: flex; flex-wrap: wrap;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Photo Tab -->
                                    
                                    <!-- Video Tab -->
                                    <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6" style="color: black;">
                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <form id="submitVideoBefore">
                                                    <input type="hidden" id="jobregister_idv1" name="jobregister_id" value="">
                                                    
                                                    <label for="" class="fw-bold mb-3">Video Before Service</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" name="multipleVideo[]" id="multipleVideo" required="" multiple>
                                                        <input type="hidden" id="description" name="description" value="Machine (Before Service)">
                                                        <button type="submit" class="btn" style="color: white; background-color: #081d45; width: fit-content;">Upload</button>
                                                    </div>
                                                    
                                                    <div id="previewBeforeVideo"></div>
                                                    
                                                    <p class="text-center fw-bold" id="messageVideoBefore"></p>
                                                </form>
                                                
                                                <div class="d-grid gap-2 justify-content-center text-center">
                                                    <table id="tablev1">
                                                        <tbody id="tbodyv1"style="display: flex; flex-wrap: wrap; padding-left: 15px;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mt-3">
                                            <div class="card-body">
                                                <form id="submitAfterVideo">
                                                    <input type="hidden" name="jobregister_id" id="jobregister_idv2" value="">
                                                    
                                                    <label for="" class="fw-bold mb-3">Video After Service</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" name="multipleVideo[]" id="multipleAfterVideo" required="" multiple>
                                                        <input type="hidden" id="description" name="description" value="Machine (After Service)">
                                                        <button type="submit" class="btn" style="color: white; background-color: #081d45; width: fit-content;">Upload</button>
                                                    </div>

                                                    <div id="previewAfterVideo"></div>
                                                    
                                                    <p class="text-center fw-bold" id="messageVideoAfter"></p>
                                                </form>
                                                
                                                <div class="d-grid gap-2 justify-content-center text-center">
                                                    <table id="tablev2" style="box-shadow: 0 5px 10px #f7f7f7;">
                                                        <tbody id="tbodyv2" style="display: flex; flex-wrap: wrap; padding-left: 15px;">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Video Tab -->
                                    
                                    <!-- Report Tab -->
                                    <div class="tab-pane" id="tab7" role="tabpanel" aria-labelledby="tab7" style="color: black;">
                                        <form method="POST" action="servicereportdate.php">
                                            <input type="hidden" id="jobregister_idreport" name="jobregister_id" value="">
                                            
                                            <div class="input-group">
                                                <input type="text" id="srvcreportdate" name="srvcreportdate" class="form-control border border-dark" value="<?php echo date('d-m-Y');?>" readonly>
                                                <button class="btn userinfo" id="userinfo" style="width: fit-content; background-color: #081d45; color: #fff;" type="button">New</button>
                                                <button class="btn useredit" id="useredit" style="width: fit-content; background-color: #ff0000; color: #fff;" type="button">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End of Report Tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const tabButtonsTech = document.querySelectorAll('.tab-buttons .tab-button');
                        
                        tabButtonsTech.forEach((button) => {
                            button.addEventListener('click', (event) => {
                                event.preventDefault();
                                
                                const targetTab = button.getAttribute('data-bs-target');
                                const jobregisterId = button.getAttribute('data-jobregister-id');
                                const modal = new bootstrap.Modal(document.querySelector(targetTab));
                                
                                document.querySelectorAll('.tab-pane').forEach((pane) => {
                                    pane.classList.remove('show', 'active');
                                });
                                
                                document.querySelector(targetTab).classList.add('show', 'active');
                                
                                tabButtonsTech.forEach((btn) => {
                                    btn.classList.remove('active');
                                });
                                
                                button.classList.add('active');
                            });
                        });
                        
                        const todoElements = document.querySelectorAll('.todo.card-body[data-jobregister-id]');
                        
                        todoElements.forEach((todoElement) => {
                            todoElement.addEventListener('click', () => {
                                const jobregisterId = todoElement.getAttribute('data-jobregister-id');
                                const modal = new bootstrap.Modal(document.getElementById('techPopup'));
                                modal.show();
                            });
                        });
                    });
                </script>
                <!-- End of Technician Popup Modal -->
                
                <!-- Technician Form Handling Script -->
                <script type='text/javascript'>
                    var job_table;
                        
                    // STAFF JOB INFO FUNCTION
                    function updateJobInfo(data2, data3) {
                        var i;
                        var jobregister_id = document.getElementById('jobregister_idinfo');
                        var job_priority = document.getElementById('job_priority');
                        var job_order_number = document.getElementById('job_order_number');
                        var job_code = document.getElementById('job_code');
                        var job_name = document.getElementById('job_name');
                        var custModel = document.getElementById('custModel');
                        var customer_code = document.getElementById('customer_code');
                        var customer_name = document.getElementById('customer_name');
                        var job_description = document.getElementById('job_description');
                        var delivery_date = document.getElementById('delivery_date');
                        var requested_date = document.getElementById('requested_date');
                        var customer_grade = document.getElementById('customer_grade');
                        var customer_PIC = document.getElementById('customer_PIC');
                        var cust_phone1 = document.getElementById('cust_phone1');
                        var cust_phone2 = document.getElementById('cust_phone2');
                        var cust_address1 = document.getElementById('cust_address1');
                        var cust_address2 = document.getElementById('cust_address2');
                        var cust_address3 = document.getElementById('cust_address3');
                        var machine_brand = document.getElementById('brand_id');
                        var machine_brand2 = document.getElementById("machine_brand");
                        var machine_type = document.getElementById('type_id');
                        var machine_type2 = document.getElementById('machine_type');
                        var serialnumbers = document.getElementById('serialnumbers');
                        var serialnumber = document.getElementById('serialnumber');
                        var machine_id = document.getElementById('machine_id');
                        var machine_code = document.getElementById('machine_code');
                        var accessories_required = document.getElementById('accessories_required');
                        var accessories_for = document.getElementById('accessories_for');
                        var machine_name = document.getElementById('machine_name');
                        var job_cancel = document.getElementById('job_cancel');
                        var job_status = document.getElementById('job_status');
                        var reason = document.getElementById('reason');
                        var jobassignsupport = document.getElementById('jobassignsupport');
                        var support = document.getElementById('infosupport');
                        var jobregisterlastmodify_by = document.getElementById('jobregisterlastmodify_by');
                        
                        jobregister_id.value = job_table.jobregister_id;
                        job_priority.value = job_table.job_priority;
                        job_order_number.value = job_table.job_order_number;
                        job_name.value = job_table.job_name;
                        
                        for (i = 0; i < job_code.options.length; i++) {
                            if (job_code.options[i].text === (job_table.job_code + " - " + job_table.job_name)) {
                                job_code.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        for (i = 0; i < custModel.options.length; i++) {
                            if (custModel.options[i].text === job_table.customer_name) {
                                custModel.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        customer_code.value = job_table.customer_code;
                        customer_name.value = job_table.customer_name;
                        customer_grade.value = job_table.customer_grade;
                        customer_PIC.value = job_table.customer_PIC;
                        job_description.value = job_table.job_description;
                        delivery_date.value = job_table.delivery_date;
                        requested_date.value = job_table.requested_date;
                        cust_phone1.value = job_table.cust_phone1;
                        cust_phone2.value = job_table.cust_phone2;
                        cust_address1.value = job_table.cust_address1;
                        cust_address2.value = job_table.cust_address2;
                        cust_address3.value = job_table.cust_address3;
                        
                        for (i = 0; i < machine_brand.options.length; i++) {
                            if (machine_brand.options[i].text === job_table.machine_brand) {
                                machine_brand.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        for (i = 0; i < data2.length; i++) {
                            addOptionType(machine_type, data2[i]);
                        }
                        
                        for (i = 0; i < machine_type.options.length; i++) {
                            if (machine_type.options[i].text === job_table.machine_type) {
                                machine_type.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        machine_brand2.value = job_table.machine_brand;
                        machine_type2.value = job_table.machine_type;
                        machine_id.value = job_table.machine_id;
                        machine_code.value = job_table.machine_code;
                        machine_name.value = job_table.machine_name;
                        
                        for (i = 0; i < data3.length; i++) {
                            addOptionSerial(serialnumbers, data3[i]);
                        }
                        
                        for (i = 0; i < serialnumbers.options.length; i++) {
                            if (serialnumbers.options[i].text === job_table.serialnumber) {
                                serialnumbers.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        serialnumber.value = job_table.serialnumber;
                        
                        for (i = 0; i < accessories_required.options.length; i++) {
                            if (accessories_required.options[i].text === job_table.accessories_required) {
                                accessories_required.options[i].selected = true;
                                
                                break;
                            }
                        }
                        for (i = 0; i < accessories_for.options.length; i++) {
                            if (accessories_for.options[i].value === job_table.accessories_for) {
                                accessories_for.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        for (i = 0; i < job_cancel.options.length; i++) {
                            if (job_cancel.options[i].text === job_table.job_cancel) {
                                job_cancel.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        for (i = 0; i < job_status.options.length; i++) {
                            if (job_status.options[i].text === job_table.job_status) {
                                job_status.options[i].selected = true;
                                
                                break;
                            }
                        }

                        for (i = 0; i < jobassignsupport.options.length; i++) {
                            if (jobassignsupport.options[i].text === job_table.job_status) {
                                jobassignsupport.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        reason.value = job_table.reason;
                        support.value = "Support For " + job_table.job_assign;
                        jobregisterlastmodify_by.value = '<?php echo $_SESSION["username"]?>'

                        $('#job_code').select2({
                            dropdownParent: $('#info'),
                            theme: 'bootstrap-5'
                        });

                        $('#custModel').select2({
                            dropdownParent: $('#info'),
                            theme: 'bootstrap-5'
                        });

                        $('#brand_id').select2({
                            dropdownParent: $('#info'),
                            theme: 'bootstrap-5'
                        });

                        $('#type_id').select2({
                            dropdownParent: $('#info'),
                            theme: 'bootstrap-5'
                        });

                        $('#serialnumbers').select2({
                            dropdownParent: $('#info'),
                            theme: 'bootstrap-5'
                        });  
                        $('#jobassignsupport').select2({
                            dropdownParent: $('#info'),
                            theme: 'bootstrap-5'
                        });                                    
                    }
                    
                    function addOptionType(element, data2) {
                        var newOption = document.createElement("option");
                        var type_id = data2[0];
                        var machine_type = data2[1];
                        
                        newOption.value = type_id;
                        newOption.setAttribute('data-typename', machine_type);
                        newOption.text = machine_type;
                    
                        element.appendChild(newOption);
                    }
                    
                    function addOptionSerial(element, data3) {
                        var newOption = document.createElement("option");
                        var machine_id = data3[0];
                        var serialNumber = data3[7];
                        
                        newOption.value = machine_id;
                        newOption.text = serialNumber;
                    
                        element.appendChild(newOption);
                    }
                    
                    function GetMachines(str) {
                        if (str.length == 0) {
                            document.getElementById("machine_id").value = "";
                            document.getElementById("serialnumber").value = "";
                            document.getElementById("machine_code").value = "";
                            document.getElementById("machine_name").value = "";
                            
                            return;
                        } 
                    
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    
                                    document.getElementById("machine_id").value = myObj[0];
                                    document.getElementById("serialnumber").value = myObj[1];
                                    document.getElementById("machine_code").value = myObj[2];
                                    document.getElementById("machine_name").value = myObj[3];
                                }
                            };
                        
                            xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
                            xmlhttp.send();
                        }
                    }

                    function GetJob(str){
                        if (str.length == 0){
                            document.getElementById("job_name").value = "";
                            document.getElementById("job_description").value = "";

                            return;
                        }

                        else {
                            var xmlhttp = new XMLHttpRequest();

                            xmlhttp.onreadystatechange = function(){
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);                        
                                    document.getElementById("job_name").value = myObj[0];
                                    document.getElementById("job_description").value = myObj[1];
                                }
                            };

                            xmlhttp.open("GET", "fetchjob.php?job_code=" + str, true);
                            xmlhttp.send();
                        }
                    }
                    
                    function GetCustomer(str) {
                        if (str.length == 0) {
                            document.getElementById("customer_code").value = "";
                            document.getElementById("customer_name").value = "";
                            document.getElementById("customer_grade").value = "";
                            document.getElementById("customer_PIC").value = "";
                            document.getElementById("cust_phone1").value = "";
                            document.getElementById("cust_phone2").value = "";
                            document.getElementById("cust_address1").value = "";
                            document.getElementById("cust_address2").value = "";
                            document.getElementById("cust_address3").value = "";
                            
                            return;
                        } 
                    
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    
                                    document.getElementById("customer_code").value = myObj[0];
                                    document.getElementById("customer_name").value = myObj[1];
                                    document.getElementById("customer_grade").value = myObj[2];
                                    document.getElementById("customer_PIC").value = myObj[3];
                                    document.getElementById("cust_phone1").value = myObj[4];
                                    document.getElementById("cust_phone2").value = myObj[5];
                                    document.getElementById("cust_address1").value = myObj[6];
                                    document.getElementById("cust_address2").value = myObj[7];
                                    document.getElementById("cust_address3").value = myObj[8];
                                }
                            };
                            
                            xmlhttp.open("GET", "fetchcustomer.php?customer_id=" + str, true);
                            xmlhttp.send();
                        }
                    }
                    
                    function submitFormSupportAdmin() {
                        var job_priority = $('input[name=job_priority]').val();
                        var job_order_number = $('input[name=job_order_number]').val();
                        var job_name = $('input[name=job_name]').val();
                        var job_code = document.getElementById('job_code').value;
                        var job_description = $('input[name=job_description]').val();
                        var requested_date = $('input[name=requested_date]').val();
                        var delivery_date = $('input[name=delivery_date]').val();
                        var customer_name = document.getElementById('customer_name').value;
                        var customer_code = $('input[name=customer_code]').val();
                        var customer_grade = $('input[name=customer_grade]').val();
                        var cust_address1 = $('input[name=cust_address1]').val();
                        var cust_address2 = $('input[name=cust_address2]').val();
                        var cust_address3 = $('input[name=cust_address3]').val();
                        var customer_PIC = $('input[name=customer_PIC]').val();
                        var cust_phone1 = $('input[name=cust_phone1]').val();
                        var cust_phone2 = $('input[name=cust_phone2]').val();
                        var machine_name = $('input[name=machine_name]').val();
                        var machine_code = $('input[name=machine_code]').val();
                        var type_id = document.getElementById('type_id').value;
                        var machine_type = $('input[name=machine_type]').val();
                        var serialnumber = $('input[name=serialnumber]').val();
                        var machine_id = $('input[name=machine_id]').val();
                        var brand_id = document.getElementById('brand_id').value;
                        var machine_brand = $('input[name=machine_brand]').val();
                        var accessories_required = $('select[name=accessories_required]').val();
                        var accessories_for = $('select[name=accessories_for]').val();
                        var job_cancel = $('select[name=job_cancel]').val();
                        var jobassignsupport = $('select[name=jobassignsupport]').val();
                        var infosupport = $('input[name=support]').val();
                        var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
                        
                        if (job_priority != '' || job_priority == '', 
                            job_order_number != '' || job_order_number == '', 
                            job_name != '' || job_name == '', 
                            job_code != '' || job_code == '', 
                            job_description != '' || job_description == '', 
                            requested_date != '' || requested_date == '', 
                            delivery_date != '' || delivery_date == '', 
                            customer_name != '' || customer_name == '', 
                            customer_code != '' || customer_code == '', 
                            customer_grade != '' || customer_grade == '', 
                            cust_address1 != '' || cust_address1 == '', 
                            cust_address2 != '' || cust_address2 == '', 
                            cust_address3 != '' || cust_address3 == '', 
                            customer_PIC != '' || customer_PIC == '', 
                            cust_phone1 != '' || cust_phone1 == '', 
                            cust_phone2 != '' || cust_phone2 == '', 
                            machine_name != '' || machine_name == '', 
                            machine_code != '' || machine_code == '', 
                            type_id != '' || type_id == '', 
                            machine_type != '' || machine_type == '', 
                            serialnumber != '' || serialnumber == '', 
                            machine_id != '' || machine_id == '', 
                            brand_id != '' || brand_id == '', 
                            machine_brand != '' || machine_brand == '', 
                            accessories_required != '' || accessories_required == '', 
                            accessories_for != '' || accessories_for == '',
                            job_cancel != '' || job_cancel == '', 
                            jobassignsupport != '' || jobassignsupport == '', 
                            infosupport != '' || infosupport == '', 
                            jobregisterlastmodify_by != '' || jobregisterlastmodify_by == '') {
                                
                            var formData = {
                                job_priority: job_priority,
                                job_order_number: job_order_number,
                                job_name: job_name,
                                job_code: job_code,
                                job_description: job_description,
                                requested_date: requested_date,
                                delivery_date: delivery_date,
                                customer_name: customer_name,
                                customer_code: customer_code,
                                customer_grade: customer_grade,
                                cust_address1: cust_address1,
                                cust_address2: cust_address2,
                                cust_address3: cust_address3,
                                customer_PIC: customer_PIC,
                                cust_phone1: cust_phone1,
                                cust_phone2: cust_phone2,
                                machine_name: machine_name,
                                machine_code: machine_code,
                                type_id: type_id,
                                machine_type: machine_type,
                                serialnumber: serialnumber,
                                machine_id: machine_id,
                                brand_id: brand_id,
                                machine_brand: machine_brand,
                                accessories_required: accessories_required,
                                accessories_for: accessories_for,
                                job_cancel: job_cancel,
                                jobassignsupport: jobassignsupport,
                                infosupport: infosupport,
                                jobregisterlastmodify_by: jobregisterlastmodify_by
                            };
                            console.log(formData);

                            $.ajax({
                                url: "adminsupporttechnician.php",
                                type: 'POST',
                                data: formData,      
                                success: function(response) {
                                    
                                    var res = JSON.parse(response);
                                    if (res.success == true) 
                                        $('#messageSupportAdmin').html('<span style="color: green">Succesfully Request for Support!</span>');
                                    else 
                                        $('#messageSupportAdmin').html('<span style="color: red">Request for support failed</span>');
                                }
                            });
                        }
                    }
                
                    // STAFF JOB ASSIGN
                    function updateJobAssign(data2) {
                        var jobregister_id2 = document.getElementById('jobregister_id2');
                        var jobassignto = document.getElementById('jobassignto')
                        
                        jobregister_id2.value = job_table.jobregister_id;
                        
                        for (i = 0; i < jobassignto.options.length; i++) {
                            if (jobassignto.options[i].text === (job_table.job_assign + " - " + job_table.technician_rank)) {
                                jobassignto.options[i].selected = true;
                                
                                break;
                            }
                        }
                        
                        var job_assign = document.getElementById('username');
                        var jobregister_id3 = document.getElementById('jobregister_id3');
                        var tech_leader = document.getElementById('tech_leader');
                        var cust_name = document.getElementById('cust_name');
                        var requested_date2 = document.getElementById('requested_date2');
                        var machine_name = document.getElementById('machine_name2');

                        job_assign.value = job_table.job_assign;
                        jobregister_id3.value = job_table.jobregister_id;
                        tech_leader.value = job_table.technician_rank;
                        cust_name.value = job_table.customer_name;
                        requested_date2 = job_table.requested_date;
                        machine_name = job_table.machine_name;

                        var tableBody = document.querySelector('#selectedassistant tbody');
                        tableBody.innerHTML = ''; // Clear the table body

                        data2.forEach(function(record) {
                            var tableBody = document.querySelector('#selectedassistant tbody');
                            var newRow = document.createElement("tr");
                            
                            newRow.setAttribute("data-row-id", record[0]);
                            
                            var usernameCell = document.createElement("td");
                            var usernameText = document.createElement("b");
                            
                            usernameText.textContent = record[2];
                            usernameCell.appendChild(usernameText);

                            var actionCell = document.createElement("td");
                            var deleteSpan = document.createElement("span");
                            
                            deleteSpan.style.color = "red";
                            deleteSpan.className = "deleteassa";
                            deleteSpan.setAttribute("data-id", record[0]);
                            deleteSpan.textContent = "Delete";
                            actionCell.appendChild(deleteSpan);
                            
                            newRow.appendChild(usernameCell);
                            newRow.appendChild(actionCell);

                            tableBody.appendChild(newRow);
                        });

                        $('#jobassignto').select2({
                            dropdownParent: $('#assignupdate_form'),
                            theme: 'bootstrap-5'
                        });
                                  
                    }
                    
                    function GetJobAss(str) {
                        if (str.length == 0) {
                            document.getElementById("username").value = "";
                            document.getElementById("technician_rank").value = "";
                            document.getElementById("staff_position").value = "";
                            
                            return;
                        }
                        
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    
                                    document.getElementById("username").value = myObj[0];
                                    document.getElementById("technician_rank").value = myObj[1];
                                    document.getElementById("staff_position").value = myObj[2];
                                }
                            };
                            
                            xmlhttp.open("GET", "fetchtechnicianrank.php?staffregister_id=" + str, true);
                            xmlhttp.send();
                        }
                    }
                    
                    $(document).ready(function() {
                        function hideadminupdate() {
                            document.getElementById("assignupdateadminmessage").style.display = "none";
                        }
                        
                        $('#technicianassign').click(function(e) {
                            e.preventDefault();
                            
                            var data = $('#assignupdate_form').serialize() + '&technicianassign=technicianassign';
                            
                            $.ajax({
                                url: 'assigntechindex.php',
                                type: 'post',
                                data: data,
                                
                                success: function(response) {
                                    var res = JSON.parse(response);
                                    
                                    if (res.success == true){
                                        $("#assignupdateadminmessage").html("Updated Successfully");
                                        $("#assignupdateadminmessage").css("color", "green");
                                        $("#assignupdateadminmessage").css("display", "block");

                                        setTimeout(hideadminupdate, 2000);
                                    }
                                    
                                    else {
                                        $("#assignupdateadminmessage").html("Failed to update");
                                        $("#assignupdateadminmessage").css("color", "red");
                                        $("#assignupdateadminmessage").css("display", "block");
                                        
                                        setTimeout(hideadminupdate, 2000);
                                    }
                                }
                            });
                        });
                    });
                    
                    function resetAssistant() {
                        var jobregister_id = job_table.jobregister_id;
                        
                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                        jobassign: true},

                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                var data2 = res.data2;
                                
                                updateJobAssign(data2);
                            }
                        });
                    }
                    
                    $(document).ready(function() {
                        function hideassistantupdate() {
                            document.getElementById("assignadminmessage").style.display = "none";
                        }
                        
                        $('#updateassign').click(function() {
                            var data = $('#adminassistant_form').serialize() + '&updateassign=updateassign';
                            
                            $.ajax({
                                url: 'assignleaderindex.php',
                                type: 'post',
                                data: data,
                                
                                success: function(response) {
                                    var res = JSON.parse(response);
                                    
                                    if (res.success == true){
                                        $("#assignadminmessage").html("Updated Successfully");
                                        $("#assignadminmessage").css("color", "green");
                                        $("#assignadminmessage").css("display", "block");
                                        
                                        setTimeout(hideassistantupdate, 2000);
                                        
                                        $(".multiple-assistant").val(null).trigger("change");
                                        
                                        resetAssistant();
                                    }
                                    
                                    else {
                                        $("#assignadminmessage").html("Failed to update");
                                        $("#assignadminmessage").css("color", "red");
                                        $("#assignadminmessage").css("display", "block");
                                        
                                        setTimeout(hideassistantupdate, 2000);
                                    }
                                }
                            });
                        });
                    });
                    
                    $(document).ready(function() {
                        $(document).on('click', '.deleteassa', function() {
                            var el = this;
                            var deletedid = $(this).data('id');
                            var confirmalert = confirm("Are you sure?" + deletedid);
                            
                            if (confirmalert == true) {
                                $.ajax({
                                    url: 'delete-assistant.php',
                                    type: 'POST',
                                    data: {id: deletedid},
                                    
                                    success: function(response) {
                                        if (response == 1) {
                                            $(el).closest('tr').fadeOut(800, function() {
                                                $(this).remove();
                                            });
                                        }
                                        
                                        else {alert('Invalid ID.');}
                                    }
                                });
                            }
                        });
                    });
                
                    // STAFF UPDATE TAB
                    function updateJobUpdate(){
                        var dateassign = document.getElementById('DateAssign');
                        var technician_departure = document.getElementById('technician_departure');
                        var technician_arrival = document.getElementById('technician_arrival');
                        var technician_leaving = document.getElementById('technician_leaving');
                        var tech_out = document.getElementById('tech_out');
                        var tech_in = document.getElementById('tech_in');

                        dateassign.value = job_table.DateAssign;
                        technician_departure.value = job_table.technician_departure;
                        technician_arrival.value = job_table.technician_arrival;
                        technician_leaving.value = job_table.technician_leaving;
                        tech_out.value = job_table.tech_out;
                        tech_in.value = job_table.tech_in;
                    }

                    function getFormattedDateTime(textid) {
                        var options = {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit',
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        };  
                        var textchange = document.getElementById(textid);
                        var formattedDateTime = new Date().toLocaleString('en-SG', options);

                        if(textid == "technician_departure"){
                            var dateassign = document.getElementById("DateAssign");
                            var currentDate = new Date();
                            
                            var day = currentDate.getDate().toString().padStart(2, '0');
                            var month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                            var year = currentDate.getFullYear(); 
                            const formattedDate = `${day}-${month}-${year}`;

                            dateassign.value = formattedDate;
                        }
                        
                        textchange.value = formattedDateTime;
                    }
                    
                    function getFormattedTime(textid) {
                        var options = {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        };
                        
                        var textchange = document.getElementById(textid);
                        var formattedTime = new Date().toLocaleTimeString('en-SG', options);
                        
                        textchange.value =formattedTime;
                    }
                
                    function hideTimeUpdate() {
                        document.getElementById("techupdateAdmin").style.display = "none";
                    }
                    
                    $(function() {
                        $('#update_tech').click(function() {
                            var dateassign = $('#DateAssign').val();
                            var technician_departure = $('#technician_departure').val();
                            var technician_arrival = $('#technician_arrival').val();
                            var technician_leaving = $('#technician_leaving').val();
                            var tech_out = $('#tech_out').val();
                            var tech_in = $('#tech_in').val();
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                type: 'POST',
                                url: 'techupdateindex.php',
                                data: {
                                         dateassign: dateassign,
                                         technician_departure: technician_departure,
                                         technician_arrival: technician_arrival,
                                         technician_leaving: technician_leaving,
                                                   tech_out: tech_out,
                                                    tech_in: tech_in,
                                             jobregister_id: jobregister_id},
                            
                                success: function(response) {
                                    $("#techupdateAdmin").html("Updated Successfully");
                                    $("#techupdateAdmin").css("color", "green");
                                    $("#techupdateAdmin").css("display", "block");

                                    setTimeout(hideTimeUpdate, 2000);
                                },
                                
                                error: function() {
                                    $('#techupdateAdmin').html('An error occurred while updating the time');
                                }
                            });
                        });
                    });

                    // STAFF ACCESSORIES TAB
                    function updateJobAccessory(data2) {
                        var count = 1;
                        var tbody = document.getElementById("_editable_table");
                        
                        tbody.innerHTML = "";
                        
                        data2.forEach(function(res){
                            var row = document.createElement("tr");
                            
                            row.setAttribute("data-row-id", res[0]);
                            
                            var idCell = document.createElement("td");
                            
                            idCell.textContent = count++;
                            row.appendChild(idCell);

                            var codeCell = document.createElement("td");
                            var codeLink = document.createElement("a");
                            
                            codeLink.style.color = "blue";
                            codeLink.style.cursor = "pointer";
                            codeLink.textContent = res[3];
                            codeLink.setAttribute("data-toggle", "tooltip");
                            codeLink.className = "hover";
                            codeLink.id = res[2];
                            codeCell.appendChild(codeLink);
                            row.appendChild(codeCell);

                            var nameCell = createEditableCell(res[4], 1);
                            var uomCell = createEditableCell(res[5], 2);
                            var quantityCell = createEditableCell(res[6], 3);
                            
                            row.appendChild(nameCell);
                            row.appendChild(uomCell);
                            row.appendChild(quantityCell);

                            var deleteCell = document.createElement("td");
                            var deleteSpan = document.createElement("span");
                            
                            deleteSpan.className = "delete";
                            deleteSpan.setAttribute("data-id", res[0]);
                            deleteSpan.textContent = "Delete";
                            deleteCell.appendChild(deleteSpan);
                            row.appendChild(deleteCell);

                            tbody.appendChild(row);
                        });

                        $('[data-toggle="tooltip"]').tooltip({
                            title: fetchData,
                            html: true,
                            placement: 'right'
                        });
                    }

                    function createEditableCell(value, colIndex) {
                        var cell = document.createElement("td");
                        
                        cell.className = "editable-col";
                        cell.setAttribute("contenteditable", "true");
                        cell.setAttribute("col-index", colIndex);
                        cell.setAttribute("oldVal", value);
                        cell.textContent = value;
                        
                        return cell;
                    }

                    function resettable(){
                        var model = $('.model');
                        model.empty();
                        
                        var jobregister_id = job_table.jobregister_id;

                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                   jobaccessories: true},
                        
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                var data2 = res.data2;
                                
                                updateJobAccessory(data2);
                            }
                        });
                    }

                    $(document).ready(function() {
                        function hideaccMessage() {
                            document.getElementById("accessoriesmessage").style.display = "none";
                        }
                        
                        $('#update_acc').click(function () {
                            var formDataArray = $('#adminacc_form').serializeArray();
                            var data = $('#adminacc_form').serialize(); 
                            
                            $.ajax({
                                url: 'addaccessoriesindex.php',
                                type: 'post',
                                data: { data: data, jobregister_id: job_table.jobregister_id, update_acc: true },

                                success: function(response) {
                                    var res = JSON.parse(response);
                                    
                                    if(res.success == true) {
                                        $("#accessoriesmessage").html("Updated Successfully");
                                        $("#accessoriesmessage").css("color", "green");
                                        $("#accessoriesmessage").css("display", "block");

                                        setTimeout(hideaccMessage, 2000);   
                                        resettable();
                                    }
                                    
                                    else{
                                        $("#accessoriesmessage").html("Failed to update");
                                        $("#accessoriesmessage").css("color", "red");
                                        $("#accessoriesmessage").css("display", "block");
                                        setTimeout(hideaccMessage, 2000);
                                    }
                                }
                            });
                        });
                        
                        // Delete
                        $(document).on('click', '.delete', function() {
                            var el = this;
                            var deleteid = $(this).data('id');
                            var confirmalert = confirm("Are you sure?");
                            
                            if (confirmalert == true) {
                                $.ajax({
                                    url: 'delete-ajax-acc.php',
                                    type: 'POST',
                                    data: {id:deleteid},
                                    
                                    success: function(response){
                                        if(response == 1){
                                            $(el).closest('tr').css('background','tomato');
                                            $(el).closest('tr').fadeOut(800,function() {
                                                $(this).remove();
                                            });
                                        }
                                        
                                        else {
                                            alert('Invalid ID.');
                                        }
                                    }
                                });
                            }
                        });
                    });
                    
                    function fetchData() {
                        var fetch_data = '';
                        var element = $(this);
                        var accessories_id = element.attr("id");
                        
                        $.ajax({
                            url:"fetch-hover.php",
                            method:"POST",
                            async: false,
                            data:{accessories_id:accessories_id},
                            
                            success:function(data) {
                                fetch_data = data;
                            }
                        });
                        
                        return fetch_data;
                    }

                    $(document).ready(function () {
                        $('.model').on('change', '.form-select', function () {
                            $(this).select2({
                                theme: 'bootstrap-5',
                                width: '100%',
                                placeholder: 'Select Accessories Code',
                                allowClear: true,
                                dropdownParent: $(this).parent(),
                            });
                        });

                        var maxField = 100;
                        var addButton = $('.add_button');
                        var wrapper = $('.model'); 
                        var fieldHTML = `
                            <div class="field-element mb-3">
                                <div class="model">
                                    <select style="width: 100%;" id="select_box" class="accessoriesModel form-select" name="accessoriesModel[]">
                                        <option value="">Select Accessories Code</option>
                                        <!-- Options will be dynamically added using PHP -->
                                        <?php
                                            include "dbconnect.php";
                                            
                                            $records = mysqli_query($conn, "SELECT accessories_code, accessories_name, accessories_uom, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");
                                            
                                            while($data = mysqli_fetch_array($records)) {
                                                echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";
                                            }	
                                        ?>
                                    </select>
                                    
                                    <div id="results" class="mb-3">
                                        <input type="hidden" name="accessories_id[]" class="accessories_id">
                                        <input type="text" id="codes" class="accessories_code form-control mb-2 mt-2" name="accessories_code[]" placeholder="Accessories Code">
                                        <input type="text" class="accessories_name form-control mb-2" name="accessories_name[]" placeholder="Accessories Name">
                                        <div class="d-flex gap-2 mt-2">
                                            <input type="text" class="accessories_uom form-control" name="accessories_uom[]" placeholder="Unit of Measurement">
                                            <input type="text" class="accQuan form-control" name="accessories_quantity[]" placeholder="Accessories Quantity">
                                        </div>
                                    </div>
                                    
                                    <a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a>
                                </div>
                            </div>`;
                            
                        var x = 1;
                        
                        $(addButton).click(function () {
                            console.log("Add button clicked");
                            
                            if (x < maxField) {
                                console.log("Adding field");
                                x++;
                                $(wrapper).append(fieldHTML);
                                $('.field-element:last-child .form-select').select2({
                                    theme: 'bootstrap-5',
                                    width: '100%',
                                    placeholder: 'Select Accessories Code',
                                    allowClear: true,
                                    dropdownParent: $(this).parent(),
                                });
                            }
                        });
                        
                        //Once remove button is clicked
                        $(wrapper).on('click', '.remove_button', function (e) {
                            e.preventDefault();
                            $(this).parent().closest(".field-element").remove();
                            x--;
                        });
                    });

                    $(document).on('change', '[name="accessoriesModel[]"]', function() {
                        var accessories_id = $(this).val();
                        var model = $(this).parent('.model');
                        
                        if (accessories_id != '') {
                            $.ajax({
                                url:"getcode.php",
                                method:"POST",
                                data: {accessories_id:accessories_id},
                                dataType:"json",
                                
                                success:function(result){
                                    model.find(".accessories_id").val(accessories_id);
                                    model.find(".accessories_code").val(result.accessories_code);
                                    model.find(".accessories_name").val(result.accessories_name);
                                    model.find(".accessories_uom").val(result.accessories_uom);
                                }
                            })
                        }
                    });

                    // STAFF PHOTO TAB
                    $(document).ready(function(){
                        function resetphoto() {
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                       photo: true},
                            
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    var data2 = res.data2;
                                    var data3 = res.data3;
                                    
                                    updatephototab(data2, data3);
                                }
                            });
                        }
                        
                        function hidephotoMessage(messageContainer) {
                            $(messageContainer).css("display", "none");
                        }
                        
                        function setupImageUpload(formSelector, previewContainer, messageContainer) {
                            function previewImages() {
                                var $preview = $(previewContainer).empty();
                                
                                if (this.files) $.each(this.files, readAndPreview);
                                
                                function readAndPreview(i, file) {
                                    var reader = new FileReader();
                                    
                                    $(reader).on("load", function() {
                                        $preview.append($("<img/>", { src: this.result, height: 100 }));
                                    });
                                    
                                    reader.readAsDataURL(file);
                                }
                            }

                            $(formSelector + " input[type=file]").on("change", previewImages);
                        
                            $(formSelector).on("submit", function (e) {
                                e.preventDefault();
                                
                                $.ajax({
                                    url: 'uploads.php',
                                    type: 'POST',
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: new FormData(this),
                                    
                                    success: function (response) {
                                        var res = JSON.parse(response);
                                        
                                        if (res.success == true) {
                                            $(messageContainer).html("Image Uploaded");
                                            $(messageContainer).css("color", "green");
                                            $(messageContainer).css("display", "block");

                                            setTimeout(function() {
                                                hidephotoMessage(messageContainer);
                                            }, 2000);
                                            
                                            resetphoto();
                                            $(previewContainer).empty();
                                        } 
                                        
                                        else {
                                            $(messageContainer).html("Failed to update");
                                            $(messageContainer).css("color", "red");
                                            $(messageContainer).css("display", "block");

                                            setTimeout(function() {
                                                hidephotoMessage(messageContainer);
                                            }, 2000);
                                        }
                                        
                                        $(formSelector + " input[type=file]").val("");
                                    }
                                });
                            });
                        }
                        
                        setupImageUpload("#submitForm", "#previewBefore", "#messageImagebefore");
                        setupImageUpload("#submitAfterForm", "#previewAfter", "#messageImageAfter");

                        // Delete 
                        $(document).on('click', '.deleted', function () {
                            var el = this;
                            var deletedid = $(this).data('id');
                            var confirmalert = confirm("Are you sure?");
                            
                            if (confirmalert == true) {
                                $.ajax({
                                    url: 'techphoto_delete.php',
                                    type: 'POST',
                                    data: {id: deletedid},
                                    
                                    success: function (response) {
                                        if (response == 1) {
                                            $(el).closest('tr').fadeOut(800, function () {
                                                $(this).remove();
                                            });
                                        } 
                                        
                                        else {
                                            alert('Invalid ID.');
                                        }
                                    }
                                });
                            }
                        });
                    });
                    
                    function clearTableBody(tableSelector) {
                        $(tableSelector + ' tbody').empty();
                    }
                    
                    function updatephototab(data2, data3){
                        clearTableBody("#tablep1");
                        clearTableBody("#tablep2");
                        
                        var jobregister_idp1 = document.getElementById('jobregister_idp1');
                        
                        jobregister_idp1.value = job_table.jobregister_id;
                        
                        var tbodyp1 = document.getElementById('tbodyp1');

                        data2.forEach(function(res) {
                            var newRow = document.createElement('tr');
                            
                            newRow.style.display = 'grid';
                            newRow.style.paddingLeft = '25px';
                        
                            var imgCell = document.createElement('td');
                            var imgLink = document.createElement('a');
                            
                            imgLink.href = 'image/' + res[2];
                            imgLink.download = '';
                            
                            var imgElement = document.createElement('img');
                            
                            imgElement.src = 'image/' + res[2];
                            imgElement.id = 'display_image';
                            imgLink.appendChild(imgElement);
                            imgCell.appendChild(imgLink);
                        
                            var deleteCell = document.createElement('td');
                            var deleteSpan = document.createElement('span');
                            
                            deleteSpan.className = 'deleted';
                            deleteSpan.style.color = 'red';
                            deleteSpan.style.cursor = 'pointer';
                            deleteSpan.setAttribute('data-id', res[0]);
                            deleteSpan.textContent = 'Delete';
                            deleteCell.appendChild(deleteSpan);
                            
                            newRow.appendChild(imgCell);
                            newRow.appendChild(deleteCell);
                            
                            tbodyp1.appendChild(newRow);
                        });

                        var jobregister_idp2 = document.getElementById('jobregister_idp2');
                        
                        jobregister_idp2.value = job_table.jobregister_id;
                        
                        var tbodyp2 = document.getElementById('tbodyp2');

                        data3.forEach(function(res2) {
                            var newRow = document.createElement('tr');
                            
                            newRow.style.display = 'grid';
                            newRow.style.paddingLeft = '25px';

                            var imgCell = document.createElement('td');
                            var imgLink = document.createElement('a');
                            
                            imgLink.href = 'image/' + res2[2];
                            imgLink.download = '';
                            
                            var imgElement = document.createElement('img');
                        
                            imgElement.src = 'image/' + res2[2];
                            imgElement.id = 'display_image';
                            imgLink.appendChild(imgElement);
                            imgCell.appendChild(imgLink);

                            var deleteCell = document.createElement('td');
                            var deleteSpan = document.createElement('span');
                        
                            deleteSpan.className = 'deleted';
                            deleteSpan.style.color = 'red';
                            deleteSpan.style.cursor = 'pointer';
                            deleteSpan.setAttribute('data-id', res2[0]);
                            deleteSpan.textContent = 'Delete';
                            deleteCell.appendChild(deleteSpan);

                            newRow.appendChild(imgCell);
                            newRow.appendChild(deleteCell);
                            
                            tbodyp2.appendChild(newRow);
                        });
                    }

                    // STAFF VIDEO TAB
                    $(document).ready(function() {
                        function resetvideo() {
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                       video: true},
                            
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    var data2 = res.data2;
                                    var data3 = res.data3;
                                    
                                    updatevideotab(data2, data3);
                                }
                            });
                        }
                        function hidephotoMessage(messageContainer) {
                            $(messageContainer).css("display", "none");
                        }
                        function setupVideoUpload(formSelector, previewContainer, messageContainer) {
                            function previewVideos() {
                                var $preview = $(previewContainer).empty();
                                
                                if (this.files) {
                                    $.each(this.files, function(i, file) {
                                        var reader = new FileReader();
                                        
                                        $(reader).on("load", function() {
                                            $preview.append($("<video/>", { src: this.result, height: 100, controls: true }));
                                        });
                                        
                                        reader.readAsDataURL(file);
                                    });
                                }
                            }

                            $(formSelector + " input[type=file]").on("change", previewVideos);

                            $(formSelector).on("submit", function(e) {
                                e.preventDefault();
                                
                                $.ajax({
                                    url: 'uploadvideo.php',
                                    type: 'POST',
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: new FormData(this),
                                    success: function(response) {
                                        var res = JSON.parse(response);
                                        if (res.success == true) {
                                            $(messageContainer).html("Video Uploaded");
                                            $(messageContainer).css("color", "green");
                                            $(messageContainer).css("display", "block");

                                            setTimeout(function() {
                                                hidephotoMessage(messageContainer);
                                            }, 2000);
                                            
                                            resetvideo();
                                            $(previewContainer).empty();
                                        } 
                                        else {
                                            $(messageContainer).html("Failed to update");
                                            $(messageContainer).css("color", "red");
                                            $(messageContainer).css("display", "block");

                                            setTimeout(function() {
                                                hidephotoMessage(messageContainer);
                                            }, 2000);
                                        }
                                        
                                        $(formSelector + " input[type=file]").val("");
                                    }
                                });
                                data = new FormData(this);
                            });
                        }

                        setupVideoUpload("#submitVideoBefore", "#previewBeforeVideo", "#messageVideoBefore");
                        setupVideoUpload("#submitAfterVideo", "#previewAfterVideo", "#messageVideoAfter");

                        // Delete
                        $(document).on('click', '.deletedv', function () {
                            var el = this;
                            var deletedid = $(this).data('id');
                            var confirmalert = confirm("Are you sure?");
                            console.log(deletedid);
                            
                            if (confirmalert == true) {
                                $.ajax({
                                    url: 'techvideo-delete.php',
                                    type: 'POST',
                                    data: {id:deletedid},
                                    
                                    success: function(response) {
                                        if(response == 1){
                                            $(el).closest('tr').fadeOut(800, function () {
                                                $(this).remove();
                                            });
                                        }
                                        
                                        else {
                                            alert('Invalid ID.');
                                        }
                                    }
                                });
                            }
                        });
                    });
                
                    function updatevideotab(data2, data3) {
                        clearTableBody("#tablev1");
                        clearTableBody("#tablev2");
                        
                        var jobregister_idv1 = document.getElementById('jobregister_idv1');
                        var tbodyv1 = document.getElementById('tbodyv1');

                        jobregister_idv1.value = job_table.jobregister_id;

                        data2.forEach(function(data) {
                            var newRow = document.createElement('tr');
                        
                            newRow.style.display = 'grid';
                            newRow.style.paddingLeft = '25px';
                            newRow.style.marginLeft = '3px';
                        
                        
                            var videoCell = document.createElement('td');
                            var videoElement = document.createElement('video');
                            
                            videoElement.width = 170;
                            videoElement.height = 150;
                            videoElement.src = 'image/' + data[2];
                            videoElement.controls = true;
                            videoCell.appendChild(videoElement);
                        
                            var deleteCell = document.createElement('td');
                            var deleteSpan = document.createElement('span');
                            
                            deleteSpan.className = 'deletedv';
                            deleteSpan.style.color = 'red';
                            deleteSpan.style.cursor = 'pointer';
                            deleteSpan.setAttribute('data-id', data[0]);
                            deleteSpan.textContent = 'Delete';
                            deleteCell.appendChild(deleteSpan);
                        
                            newRow.appendChild(videoCell);
                            newRow.appendChild(deleteCell);
                        
                            tbodyv1.appendChild(newRow);
                        });

                        var jobregister_idv2 = document.getElementById('jobregister_idv2');
                        var tbodyv2 = document.getElementById('tbodyv2');

                        jobregister_idv2.value =job_table.jobregister_id;
                        data3.forEach(function(data) {
                            var newRow = document.createElement('tr');
                        
                            newRow.style.display = 'grid';
                            newRow.style.paddingLeft = '25px';
                            newRow.style.marginLeft = '3px';
                        
                        
                            var videoCell = document.createElement('td');
                            var videoElement = document.createElement('video');
                        
                            videoElement.width = 170;
                            videoElement.height = 150;
                            videoElement.src = 'image/' + data[2];
                            videoElement.controls = true;
                            videoCell.appendChild(videoElement);
                        
                        
                            var deleteCell = document.createElement('td');
                            var deleteSpan = document.createElement('span');
                        
                            deleteSpan.className = 'deletedv';
                            deleteSpan.style.color = 'red';
                            deleteSpan.style.cursor = 'pointer';
                            deleteSpan.setAttribute('data-id', data[0]);
                            deleteSpan.textContent = 'Delete';
                            deleteCell.appendChild(deleteSpan);
                        
                            newRow.appendChild(videoCell);
                            newRow.appendChild(deleteCell);
                        
                            tbodyv2.appendChild(newRow);
                        });
                    }

                    // STAFF REPORT TAB
                    function updatereporttab(){
                        var jobregister_id = document.getElementById('jobregister_idreport');
                        
                        jobregister_id.value = job_table.jobregister_id;
                    }
                    
                    $(document).ready(function() {
                        $('.userinfo').click(function(){
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'servicereportajaxadmin.php',
                                type: 'post',
                                data: {jobregister_id:jobregister_id},
                                
                                success: function(data) {
                                    var win = window.open('servicereport.php');
                                    win.document.write(data);
                                }
                            });
                        });
                        
                        $('.useredit').click(function() {
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'servicereportEDIT.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id},
                                
                                success: function(data){
                                    var win = window.open('servicereportEDIT.php');
                                    
                                    win.document.write(data);
                                }
                            });
                        });
                    });

                    $(document).ready(function() {
                        $('.staff-card').click(function() {
                            var jobregister_id = $(this).data('id');
                            var type_id = $(this).data('type_id');
                            var customer_name = $(this).data('customer_name');

                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                              type_id: type_id,
                                        customer_name: customer_name,
                                              jobinfo: true},

                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    
                                    job_table = res.data;
                                    
                                    var data2 = res.data2;
                                    var data3 = res.data3;
                                
                                    updateJobInfo(data2, data3);
                                    myFunctionAccessory();
                                    myFunctionReason();
                                }
                            });
                        });

                        $('#jobAssignTab').click(function() {
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                            jobassign: true},

                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    var data2 = res.data2;
                                    
                                    updateJobAssign(data2);
                                }
                            });
                        });
                        
                        $('#updateTab').click(function() {
                            updateJobUpdate();
                        });

                        $('#accessoryTab').click(function() {
                            var model = $('.model');
                            
                            model.empty();
                            
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                       jobaccessories: true},
                            
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    var data2 = res.data2;
                                
                                    updateJobAccessory(data2);
                                }
                            });
                        });

                        $('#photoTab').click(function() {
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                                photo: true},
                            
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    var data2 = res.data2;
                                    var data3 = res.data3;
                                    
                                    updatephototab(data2, data3);
                                }
                            });
                        });

                        $('#videoTab').click(function() {
                            var jobregister_id = job_table.jobregister_id;
                            
                            $.ajax({
                                url: 'AdminHomepageStaffCode.php',
                                type: 'post',
                                data: {jobregister_id: jobregister_id,
                                                video: true},
                            
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    var data2 = res.data2;
                                    var data3 = res.data3;
                                
                                    updatevideotab(data2, data3);
                                }
                            });
                        });

                        $('#reportTab').click(function() {

                        });
                    });
                </script>
                
                <script type="text/javascript">
                    $(document).ready(function() {
                        function closeAllModalsAndRefresh() {
                            $('.modal').modal('hide');
                            
                            location.reload();
                        }
                        
                        $('.modal').on('hidden.bs.modal', function() {
                            closeAllModalsAndRefresh();
                        });
                    });
                    
                    function resetTabs() {
                        var tabRadioButtons = document.getElementsByClassName("tabbutton");
                        
                        for (var i = 0; i < tabRadioButtons.length; i++) {
                            tabRadioButtons[i].checked = false;
                        }
                        
                        var tabContents = document.getElementsByClassName("tab");
                        
                        for (var i = 0; i < tabContents.length; i++) {
                            tabContents[i].style.display = "none";
                        }
                    }
                    
                    function openPopup(popupId) {
                        resetTabs();
                        
                        document.getElementById(popupId).style.display = "block";
                        document.body.classList.add("popup-open");
                        
                        var firstTabRadio = document.getElementById("tabDoing");
                        var firstTabContent = document.getElementById("StaffJobInfoTab");
                        
                        if (firstTabRadio && firstTabContent) {
                            firstTabRadio.checked = true;
                            firstTabContent.style.display = "block";
                        }
                    }
                    
                    function openTab(tabId) {
                        var tabContents = document.getElementsByClassName("tab");
                        
                        for (var i = 0; i < tabContents.length; i++) {
                            tabContents[i].style.display = "none";
                        }
                        
                        // Uncheck all radio buttons
                        var tabRadioButtons = document.getElementsByClassName("tabbutton");
                        
                        for (var i = 0; i < tabRadioButtons.length; i++) {
                            tabRadioButtons[i].checked = false;
                        }
                        
                        // Display the selected tab content
                        document.getElementById(tabId).style.display = "block";
                    }
                </script>
                <!-- End of Technician Form Handling Script -->
                <!-- End of Technician Box -->
            </div> <!-- closing row class -->
        </div> <!-- closing container-fluid class -->
        <script src="assets/js/main.js"></script>
    </body>
</html