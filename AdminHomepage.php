<?php
    
    session_start();
    
    include "dbconnect.php";
    
    if ($_SESSION['staff_position'] != 'Admin' && $_SESSION['staff_position'] != 'Manager') {
        header("location: index.php?error=permission");
        
        exit();
    }

    if (session_status() == PHP_SESSION_NONE || !isset($_SESSION['username'])) {
        header("location: index.php?error=session");
        
        exit();
    }

    $techName = $_SESSION["username"];
    
    $query = "SELECT * FROM staff_register WHERE username=?";
    $stmt = mysqli_prepare($conn, $query);
    
    mysqli_stmt_bind_param($stmt, "s", $techName);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $username = $row["username"];
        
        echo "<script>var usernameValue = '" . $username . "';</script>";
    } 
    
    else {
        header("location: index.php?error=user_not_found");
        
        exit();
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
        
        <title>Admin Homepage</title>

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">

        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="css/AdminHomepageStyle.css">
       
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
                                                (accessories_required = 'No' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'No' AND job_status IS NULL AND job_assign = '' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'No' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'No' AND job_status = '' AND job_assign IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'No' AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'No' AND job_status = '' AND job_assign = '' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'No' AND job_assign = '' AND job_status = 'Doing' AND job_cancel IS NULL)
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
                                
                                $results = $conn->query("SELECT * FROM job_register WHERE (accessories_required = 'No' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'No' AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = 'No' AND job_status IS NULL AND job_assign = '' AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = 'No' AND job_status IS NULL AND job_assign = '' AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'No' AND job_status = '' AND job_assign IS NULL AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'No' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                            OR
                                                        (accessories_required = 'No' AND job_status = '' AND job_assign = '' AND job_cancel IS NULL)
                                                            OR
                                                        (accessories_required = 'No' AND job_assign = '' AND job_status = 'Doing' AND job_cancel IS NULL)
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
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['machine_brand'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['machine_name'] ?></li>
                                        <li><?php echo $row['serialnumber'] ?></li>
                                        <li><strong><?php echo $row['accessories_required'] ?></strong> Accessory require</li>
                                        <?php
                                            if($row['job_status'] != "" || $row['job_status'] != NULL) {
                                                echo'<li>'.$row['job_status'].'</li>';
									        }
                            	        ?>

                                        <?php
                                            if($row['reason'] != "" || $row['reason'] != NULL) {
                                                echo'<li><span class="fw-bold" style="color: #ff0000;">'.$row['reason'].'</span></li>';
									        }
                            	        ?>
                                    </ul>
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
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['machine_brand'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['machine_name'] ?></li>
                                        <li><?php echo $row['serialnumber'] ?></li>
                                        <?php
                                            if($row['job_status'] != "" || $row['job_status'] != NULL) {
                                                echo'<li>'.$row['job_status'].'</li>';
									        }
                            	        ?>

                                        <?php
                                            if($row['reason'] != "" || $row['reason'] != NULL) {
                                                echo'<li><span class="fw-bold" style="color: #ff0000;">'.$row['reason'].'</span></li>';
									        }
                            	        ?>
                                    </ul>
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
                                                    url: 'AdminHomepageJobassignAsisstant.php',
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
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['machine_brand'] ?></li>
                                        <li><?php echo $row['machine_name'] ?></li>
                                        <li><?php echo $row['serialnumber'] ?></li>
                                        <li><?php echo $row['job_status'] ?></li>
                                        <li><span class="fw-bold" style="color: #ff0000;"><?php echo $row['reason'] ?></span></li>
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
                                                    url: 'AdminHomepageJobassignAsisstant.php',
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
                                        <li><?php echo $row['job_description'] ?></li>
                                        <li><?php echo $row['machine_type'] ?></li>
                                        <li><?php echo $row['machine_brand'] ?></li>
                                        <li><?php echo $row['machine_name'] ?></li>
                                        <li><?php echo $row['serialnumber'] ?></li>
                                        <li><?php echo $row['job_status'] ?></li>
                                        <li><span class="fw-bold" style="color: #ff0000;"><?php echo $row['reason'] ?></span></li>
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
                                                    url: 'AdminHomepageJobassignAsisstant.php',
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
                                <div class="JobTech card mb-3" data-bs-toggle="modal" data-bs-target="#techPopup" data-jobRegisterID="<?php echo $row['jobregister_id']; ?>">
                                    <div class="card-body">
                                        <p class="fw-bold mb-1 ms-3"><?php echo $row['job_order_number'] ?></p>
                                        <ul class="mb-0">
                                            <li><?php echo $row['job_priority'] ?></li>
                                            <li><?php echo $row['customer_name'] ?></li>
                                            <li><?php echo $row['job_description'] ?></li>
                                            <li><?php echo $row['machine_type'] ?></li>
                                            <li><?php echo $row['machine_brand'] ?></li>
                                            <li><?php echo $row['machine_name'] ?></li>
                                            <li><?php echo $row['serialnumber'] ?></li>
                                            <?php
                                                if($row['job_status'] != "" || $row['job_status'] != NULL) {
                                                    echo'<li>'.$row['job_status'].'</li>';
									            }
                            	            ?>
                                        </ul>
                                        <?php
                                            if($row['support'] != "" || $row['support'] != NULL) {
                                                echo '<div class="badge bg-secondary text-wrap mt-3 mb-1 float-end" id="support" style="width:fit-content;">';
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
                                        <div class="container" id="jobInfoTab">
                                            <form id="techJobInfoForm">
                                                <input type="hidden" name="today_date" id="todayDate_Support">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_jobInfo">
                                                <input type="hidden" name="support" id="support">
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Job Priority</label>
                                                        <input type="text" name="job_priority" id="job_priority" class="form-control">
                                                    </div>
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Job Order Number</label>
                                                        <div class="input-group">
                                                            <input type="text" name="job_order_number" id="job_order_number" class="form-control">
                                                            <button type="button" class="btn" style="color: white; background-color: #081d45;" id="button-addon2" onclick="buttonClick()">Click</button>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        var i = 1;
                                                        var jobordernumber2;
                                                        
                                                        function buttonClick() {
                                                            if (i == 1) {
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
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Job Name</label>
                                                        <select name="job_name" id="job_name" class="form-select" style="width: 100%;" onchange="GetJobDetails(this.value)">
                                                            <option value="">Select Job</option>
                                                            <?php
                                                                
                                                                include "dbconnect.php";
                                                                
                                                                $records = mysqli_query($conn, "SELECT * FROM jobtype_list ORDER BY job_name ASC");
                                                                
                                                                while ($data = mysqli_fetch_array($records)) {
                                                                    echo "<option value='".$data['job_name']."' 
                                                                                  data-jobCode='". $data['job_code'] ."'
                                                                                  data-jobDesc='". $data['job_description'] ."'>".$data['job_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>

                                                        <input type="hidden" id="job_code" name="job_code" value="">
                                                    </div>

                                                    <script>
                                                        function GetJobDetails(value) {
                                                            var selectedOptionJob = document.querySelector('#job_name option[value="' + value + '"]');
                                                            var jobCode = selectedOptionJob.getAttribute('data-jobCode');
                                                            var jobDesc = selectedOptionJob.getAttribute('data-jobDesc');
                                                            
                                                            document.querySelector('input[name="job_code"]').value = jobCode;
                                                            document.querySelector('input[name="job_description"]').value = jobDesc;
                                                        }
                                                    </script>
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Job Description</label>
                                                        <input type="text" name="job_description" id="job_description" class="form-control">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Requested Date</label>
                                                        <input type="text" name="requested_date" id="requested_date" class="form-control" autocomplete="off">
                                                    </div>

                                                    <script>
                                                        $("#requested_date").datepicker();
                                                        $("#requested_date").datepicker("option", "dateFormat", "dd/mm/yy");
                                                    </script>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Delivery Date</label>
                                                        <input type="text" name="delivery_date" id="delivery_date" class="form-control" autocomplete="off">
                                                    </div>

                                                    <script>
                                                        $("#delivery_date").datepicker();
                                                        $("#delivery_date").datepicker("option", "dateFormat", "dd/mm/yy");
                                                    </script>

                                                    <div class="mb-3">
                                                        <label for="" class="fw-bold mb-2">Customer Name</label>
                                                        <select name="customer_name" id="customer_name" class="form-select" style="width: 100%;" onchange="onCustomerNameChange(this.value)">
                                                            <option value="">Select Customer Name</option>
                                                            <?php
                                                                
                                                                include "dbconnect.php";
                                                                
                                                                $records = mysqli_query($conn, "SELECT * FROM customer_list ORDER BY customer_name ASC");
                                                                
                                                                while ($data = mysqli_fetch_array($records)) {
                                                                    echo "<option value='".$data['customer_name']."'
                                                                                  data-custGrade='". $data['customer_grade'] ."'
                                                                                  data-custCode='". $data['customer_code'] ."'
                                                                                  data-custPIC='". $data['customer_PIC'] ."'
                                                                                  data-custAddr1='". $data['cust_address1'] ."'
                                                                                  data-custAddr2='". $data['cust_address2'] ."'
                                                                                  data-custAddr3='". $data['cust_address3'] ."'
                                                                                  data-custNum1='". $data['cust_phone1'] ."'
                                                                                  data-custNum2='". $data['cust_phone2'] ."'>".$data['customer_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>

                                                        <input type="hidden" id="customer_code" name="customer_code">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Customer Address</label>
                                                        <input type="text" name="cust_address1" id="cust_address1" class="form-control">
                                                        <div class="d-grid d-flex gap-2 mt-2">
                                                            <input type="text" name="cust_address2" id="cust_address2" class="form-control">
                                                            <input type="text" name="cust_address3" id="cust_address3" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Customer Grade</label>
                                                        <input type="text" name="customer_grade" id="customer_grade" class="form-control">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="form-label fw-bold">Customer PIC</label>
                                                        <input type="text" name="customer_PIC" id="customer_PIC" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Customer Phone Number</label>
                                                        <div class="d-grid d-flex gap-2 mt-2">
                                                            <input type="text" name="cust_phone1" id="cust_phone1" class="form-control">
                                                            <input type="text" name="cust_phone2" id="cust_phone2" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Serial Number</label>
                                                        <select name="serialnumber" id="serialnumber"  style="width: 100%;" class="form-select" onchange="loadMachineDetails(this.value)">
                                                            <option value="">Select Serial Number</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label fw-bold">Machine Name</label>
                                                        <input type="text" id="machine_name" name="machine_name" class="form-control">
                                                        
                                                        <input type="hidden" id="machine_id" name="machine_id">
                                                        <input type="hidden" id="machine_code" name="machine_code">
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

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="fw-bold">Job Status</label>
                                                        <select id="job_status" name="job_status" class="form-select" onchange="myFunction()">
                                                            <option value=''></option>
                                                            <option value='Doing'>Doing</option>
                                                            <option value='Pending'>Pending</option>
                                                            <option value='Incomplete'>Incomplete</option>
                                                            <option value='Completed'>Completed</option>
                                                        </select>
                                                    </div>

                                                    <!--PENDING & INCOMPLETE REASON-->
                                                    <div class="col-md-6 mb-3" id="reasonInput">
                                                        <label for="" class="fw-bold">Reason</label>
                                                        <input type="text" name="reason" id="inputreason" value="<?php echo $row['reason']?>" class="form-control">
                                                    </div>
                                                    
                                                    <script>
                                                        function myFunction() {
                                                            var jobStatus = document.getElementById("job_status").value;
                                                            var reasonDiv = document.getElementById("reasonInput");
                                                            
                                                            if (jobStatus === "Pending" || jobStatus === "Incomplete") {
                                                                reasonDiv.style.display = "block";
                                                            }
                                                            
                                                            else {
                                                                reasonDiv.style.display = "none";
                                                            }
                                                        }
                                                        
                                                        myFunction();
                                                        
                                                    </script>
                                                    <!--PENDING & INCOMPLETE END REASON-->

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="fw-bold">Assign To (For Support Job)</label>
                                                        <select name="job_assign" id="assign_JobInfo" style="width: 100%;" class="form-select" onchange="GetAssignDetails(this.value)">
                                                            <?php
                                                        
                                                                include "dbconnect.php";
                                                    
                                                                $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' ORDER BY username ASC");
                                                            
                                                                echo"<option value=''>Select Technician</option>";
                                                            
                                                                while($data = mysqli_fetch_array($records)) {
                                                                    echo "<option value='". $data['username'] ."' 
                                                                                  data-techRankInfo='". $data['technician_rank'] ."' 
                                                                                  data-staffPosInfo='". $data['staff_position'] ."'>" .$data['username']. "</option>";
                                                                }	
                                                            ?>
                                                        </select>

                                                        <script>
                                                            function GetAssignDetails(value) {
                                                                var selectedOption = document.querySelector('#assign_JobInfo option[value="' + value + '"]');
                                                                var techRankInfo = selectedOption.getAttribute('data-techRankInfo');
                                                                var staffPosInfo = selectedOption.getAttribute('data-staffPosInfo');
                                                            
                                                                document.querySelector('input[name="technician_rank"]').value = techRankInfo;
                                                                document.querySelector('input[name="staff_position"]').value = staffPosInfo;
                                                            }
                                                        </script>

                                                        <input type="hidden" name="technician_rank" id="techRankInfo">
                                                        <input type="hidden" name="staff_position" id="staffPosInfo">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="fw-bold">Accessory Require</label>
                                                        <select name="accessories_required" id="accessories_required" class="form-select" onchange="accessoryFor()">
                                                            <option value=''></option>
                                                            <option value='Yes'>Yes</option>
                                                            <option value='No'>No</option>
                                                        </select>
                                                    </div>

                                                    <!-- Accessory For -->
                                                    <div class="col-md-6 mb-3" id="accFor">
                                                        <label for="" class="fw-bold">Accessory For</label>
                                                        <select name="accessories_for" id="accessories_for" class="form-select">
                                                            <option value=''></option>
                                                            <option value='Technician Use'>Technician Use</option>
                                                            <option value='Customer Request'>Customer Request</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <script>
                                                        function accessoryFor() {
                                                            var accReq = document.getElementById("accessories_required").value;
                                                            var forDiv = document.getElementById("accFor");
                                                            
                                                            if (accReq === "Yes") {
                                                                forDiv.style.display = "block";
                                                            }
                                                            
                                                            else {
                                                                forDiv.style.display = "none";
                                                            }
                                                        }
                                                        
                                                        accessoryFor();
                                                    </script>
                                                    <!-- Accessory For -->
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <label for="" class="fw-bold">Cancel Job</label>
                                                        <select id="job_cancel" name="job_cancel" class="form-select">
                                                            <option value=''></option>
                                                            <option value='YES'>YES</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <input type="hidden" id="jobregistercreated_by" name="jobregistercreated_by">
                                                    <input type="hidden" id="jobregisterlastmodify_by" name="jobregisterlastmodify_by">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mt-2">
                                                        <button type="submit" id="updtInfo" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width:100%">Update</button>
                                                    </div>
                                                    
                                                    <div class="col-md-6 mt-2">
                                                        <button type="submit" id="supportJob" class="btn" style="border: none; background-color: #023020; color: #FFFFFF; width:100%">Duplicate</button>
                                                    </div>
                                           
                                                    <div class="mt-3" id="JobInfoMessage"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End Job Info Tab -->
                                    
                                    <!-- Job Assign Tab -->
                                    <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2" style="color: black;">
                                        <div class="container" id="jobAssignTab">
                                            <div class="card mb-3">
                                                <form id="adminJobAssign">
                                                    <input type="hidden" name="jobregister_id" id="jobregisterID_jobAssign">

                                                    <div class="card-body">
                                                        <label for="" class="form-label fw-bold">Job Assign</label>
                                                        <div class="input-group mb-2">
                                                            <select name="job_assign" id="job_assign" class="form-select" onchange="GetTechDetails(this.value)">
                                                                <?php
                                                                
                                                                    include "dbconnect.php";
                                            
                                                                    $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' ORDER BY username ASC");
                                                    
                                                                    echo"<option value=''>Select Technician</option>";
                                                    
                                                                    while($data = mysqli_fetch_array($records)) {
                                                                        echo "<option value='". $data['username'] ."'
                                                                                      data-techRank='". $data['technician_rank'] ."'
                                                                                      data-staffPos='". $data['staff_position'] ."'>" .$data['username']. "</option>";
                                                                    }	
                                                                ?>
                                                            </select>
                                                            <button type="submit" id="jobAssBtn" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF;">Update</button>
                                                        </div>

                                                        <div id="assignMessage"></div>

                                                        <script>
                                                            function GetTechDetails(value) {
                                                                var selectedOption = document.querySelector('#job_assign option[value="' + value + '"]');
                                                                var techRank = selectedOption.getAttribute('data-techRank');
                                                                var staffPos = selectedOption.getAttribute('data-staffPos');
                                                            
                                                                document.querySelector('input[name="technician_rank"]').value = techRank;
                                                                document.querySelector('input[name="staff_position"]').value = staffPos;
                                                            }
                                                        </script>

                                                        <input type="hidden" id="technician_rank" name="technician_rank">
                                                        <input type="hidden" id="staff_position" name="staff_position">
                                                    
                                                        <script>
                                                            $(document).ready(function() {
                                                                $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                                                    $("#job_assign").select2({
                                                                        dropdownParent: $('#adminJobAssign'),
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
                                                    </div>
                                                </form>
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
                                                        <input type="hidden" name="cust_name" id="cust_name">
                                                        <input type="hidden" name="requested_date" id="requestedDate">
                                                        <input type="hidden" name="machine_name" id="machineName">
                                                
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
                                                            <button type="submit" id="addAssistant" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Update</button>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Job Assign Tab -->
                                    
                                    <!-- Update Tab -->
                                    <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3" style="color: black;">
                                        <div class="container" id="jobUpdateTab">
                                            <input type="hidden" name="tech_leader" id="tech_leader">
                            
                                            <form id="techJobUpdateForm">
                                                <input type="hidden" name="jobregister_id" id="jobregisterID_jobUpdate">

                                                <!-- Departure Time -->
                                                <label for="" class="form-label fw-bold">Departure Time</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="technician_departure" id="technician_departure" class="form-control" autocomplete="off">
                                                    <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="departureButton">Departure</button>
                                                </div>

                                                <script>
                                                    const jobCards = document.querySelectorAll('.Job');
                                                    
                                                    jobCards.forEach(jobCard => {
                                                        jobCard.addEventListener('click', function () {
                                                            const jobRegisterID = jobCard.getAttribute('data-jobRegisterID');
                                                            const jobregister_idInput = document.getElementById("jobregisterID_jobUpdate");
                                                            
                                                            jobregister_idInput.value = jobRegisterID;
                                                        });
                                                    });
                                                    
                                                    $(document).on('click', '#departureButton', function () {
                                                        $.ajax({
                                                            url: 'departureTimeServer.php',
                                                            method: 'GET',
                                                            
                                                            success: function(response) {
                                                                const data = JSON.parse(response);
                                                                
                                                                if (data.error) {
                                                                    alert(data.error);
                                                                    
                                                                    return;
                                                                }
                                                                
                                                                document.getElementById('technician_departure').value = data.technician_departure;
                                                                
                                                                const jobregister_idInput = document.getElementById("jobregisterID_jobUpdate");
                                                                const jobregister_id = jobregister_idInput.value;
                                                                const job_status = "Doing";
                                                                const DateAssign = data.date_assign;
                                                                const departure_timestamp = data.departure_timestamp;
                                                                const xhr = new XMLHttpRequest();
                                                                
                                                                xhr.open("POST", "departureupdate.php", true);
                                                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                                
                                                                xhr.onreadystatechange = function () {
                                                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                                                        const responseText = xhr.responseText;
                                                                        
                                                                        if (responseText === "success") {
                                                                            console.log("Update successful");
                                                                        }
                                                                        
                                                                        else {
                                                                            console.error("Update failed");
                                                                        }
                                                                    }
                                                                };
                                                                
                                                                const dataString = `jobregister_id=${jobregister_id}&DateAssign=${DateAssign}&job_status=${job_status}&departure_timestamp=${departure_timestamp}`;
                                                                
                                                                xhr.send(dataString);
                                                            },
                                                            
                                                            error: function() {
                                                                alert('Error fetching time from server.');
                                                            }
                                                        });
                                                    });
                                                </script>

                                                <!-- Arrival Time -->
                                                <label for="" class="form-label fw-bold">Time At Site</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="technician_arrival" id="technician_arrival" class="form-control" autocomplete="off">
                                                    <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="arrivalButton">Arrival</button>
                                                </div>

                                                <script>
                                                    $(document).on('click', '#arrivalButton', function () {
                                                        $.ajax({
                                                            url: 'get_server_time.php',
                                                            method: 'GET',
                                                            
                                                            success: function(response) {
                                                                document.getElementById('technician_arrival').value = response;
                                                            },
                                                            
                                                            error: function() {
                                                                alert('Error fetching time from server.');
                                                            }
                                                        });
                                                    });
                                                </script>

                                                <!-- Leaving Time -->
                                                <label for="" class="form-label fw-bold">Return Time</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" name="technician_leaving" id="technician_leaving" class="form-control" autocomplete="off">
                                                    <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="returnButton">Return</button>
                                                </div>

                                                <script>
                                                    $(document).on('click', '#returnButton', function () {
                                                        $.ajax({
                                                            url: 'get_server_time.php',
                                                            method: 'GET',
                                                            
                                                            success: function(response) {
                                                                document.getElementById('technician_leaving').value = response;
                                                            },
                                                            
                                                            error: function() {
                                                                alert('Error fetching time from server.');
                                                            }
                                                        });
                                                    });
                                                </script>

                                                <!-- Rest Time -->
                                                <label for="" class="form-label fw-bold">Rest Hour</label>
                                                <div class="d-grid gap-3 mb-3">
                                                    <!-- Rest Out -->
                                                    <div class="input-group">
                                                        <input type="text" name="tech_out" id="tech_out" class="form-control" autocomplete="off">
                                                        <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="outButton">Out</button>
                                                    </div>

                                                    <script>
                                                        jobCards.forEach(jobCard => {
                                                            jobCard.addEventListener('click', function () {
                                                                const jobAssign = jobCard.getAttribute('data-jobAssign');
                                                                const techLeaderInput = document.getElementById("tech_leader");
                                                                
                                                                techLeaderInput.value = jobAssign;
                                                            });
                                                        });
                                                        
                                                        $(document).on('click', '#outButton', function () {
                                                            $.ajax({
                                                                url: 'resttime.php',
                                                                method: 'GET',
                                                                
                                                                success: function(response) {
                                                                    const data = JSON.parse(response);
                                                                    
                                                                    if (data.error) {
                                                                        alert(data.error);
                                                                        
                                                                        return;
                                                                    }
                                                                    
                                                                    document.getElementById('tech_out').value = data.tech_out;
                                                                    
                                                                    const techLeaderInput = document.getElementById("tech_leader");
                                                                    const tech_leader = techLeaderInput.value;
                                                                    const techupdate_date = data.techupdate_date;
                                                                    const technician_out = data.tech_out;
                                                                    const xhr = new XMLHttpRequest();
                                                                    
                                                                    xhr.open("POST", "techoutupdate.php", true);
                                                                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                                    
                                                                    xhr.onreadystatechange = function () {
                                                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                                                            const responseText = xhr.responseText;
                                                                            
                                                                            if (responseText === "success") {
                                                                                console.log("Update successful");
                                                                            }
                                                                            
                                                                            else {
                                                                                console.error("Update failed");
                                                                            }
                                                                        }
                                                                    };
                                                                    
                                                                    const dataString = `technician_out=${technician_out}&tech_leader=${tech_leader}&techupdate_date=${techupdate_date}`;
                                                                    
                                                                    xhr.send(dataString);
                                                                },
                                                                
                                                                error: function() {
                                                                    alert('Error fetching time from server.');
                                                                }
                                                            });
                                                        });
                                                    </script>

                                                    <!-- Rest In -->
                                                    <div class="input-group">
                                                        <input type="text" name="tech_in" id="tech_in" class="form-control" autocomplete="off">
                                                        <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;" id="inButton">In</button>
                                                    </div>

                                                    <script>
                                                        jobCards.forEach(jobCard => {
                                                            jobCard.addEventListener('click', function () {
                                                                const jobAssign = jobCard.getAttribute('data-jobAssign');
                                                                const techLeaderInput = document.getElementById("tech_leader");
                                                                
                                                                techLeaderInput.value = jobAssign;
                                                            });
                                                        });
                                                        
                                                        $(document).on('click', '#inButton', function () {
                                                            $.ajax({
                                                                url: 'resttime.php',
                                                                method: 'GET',
                                                                
                                                                success: function(response) {
                                                                    const data = JSON.parse(response);
                                                                    
                                                                    if (data.error) {
                                                                        alert(data.error);
                                                                        
                                                                        return;
                                                                    }
                                                                    
                                                                    document.getElementById('tech_in').value = data.tech_in;
                                                                    
                                                                    const techLeaderInput = document.getElementById("tech_leader");
                                                                    const tech_leader = techLeaderInput.value;
                                                                    const techupdate_date = data.techupdate_date;
                                                                    const technician_in = data.tech_in;
                                                                    const xhr = new XMLHttpRequest();
                                                                    
                                                                    xhr.open("POST", "techinupdate.php", true);
                                                                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                                                    
                                                                    xhr.onreadystatechange = function () {
                                                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                                                            const responseText = xhr.responseText;
                                                                            
                                                                            if (responseText === "success") {
                                                                                console.log("Update successful");
                                                                            }
                                                                            
                                                                            else {
                                                                                console.error("Update failed");
                                                                            }
                                                                        }
                                                                    };
                                                                    
                                                                    const dataString = `technician_in=${technician_in}&tech_leader=${tech_leader}&techupdate_date=${techupdate_date}`;
                                                            
                                                            xhr.send(dataString);
                                                        },
                                                        
                                                        error: function() {
                                                            alert('Error fetching time from server.');
                                                        }
                                                    });
                                                });
                                            </script>
                                                </div>
                                    
                                                <div id="JobUpdateMessage"></div>

                                                <div class="d-grid justify-content-end mb-3">
                                                    <button type="submit" id="timeUpdate" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 95px;">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- End of Update Tab -->
                                    
                                    <!-- Accessory Tab -->
                                    <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4" style="color: black;">
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
                                    <!-- End of Accessory Tab -->
                                    
                                    <!-- Photo Tab -->
                                    <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5" style="color: black;">
                                        <div class="container" id="jobPhotoTab">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <label for="" class="form-label fw-bold">Photo Before Service</label>
                                                    <form class="photoBefore" id="techJobPhotoBeforeForm">
                                                        <input type="hidden" name="jobregister_id" id="jobregisterID_photoBefore">

                                                        <div class="input-group mb-3">
                                                            <input type="file" name="file_name[]" id="fileName_before" class="form-control" accept="image/*" multiple>
                                                            <input type="Hidden" name="description" id="descriptionBefore" value="Machine (Before Service)">
                                                            <button type="submit" id="photoBefore" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
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
                                                            <input type="Hidden" name="description" id="descriptionAfter" value="Machine (After Service)">
                                                            <button type="submit" id="photoAfter" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
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
                                    <!-- End of Photo Tab -->
                                    
                                    <!-- Video Tab -->
                                    <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6" style="color: black;">
                                        <div class="container" id="jobVideoTab">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <label for="" class="form-label fw-bold" >Video Before Service</label>
                                                    <form id="techJobVideoBeforeForm">
                                                        <input type="hidden" name="jobregister_id" id="jobregisterID_videoBefore">

                                                        <div class="input-group mb-3">
                                                            <input type="file" name="video_url[]" id="videoBefore" class="form-control" accept="video/*" multiple>
                                                            <input type="hidden" name="description" id="descriptionVideoBefore" value="Machine (Before Service)">
                                                            <button type="submit" id="uploadVideoBefore" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
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
                                                            <button type="submit" id="uploadVideoAfter" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Upload</button>  
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
                                    <!-- End of Video Tab -->
                                    
                                    <!-- Report Tab -->
                                    <div class="tab-pane" id="tab7" role="tabpanel" aria-labelledby="tab7" style="color: black;">
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

                <script>
                    // Fetch Username
                    function fetchUsername() {
                        $('#jobregistercreated_by').val(usernameValue);
                        $('#jobregisterlastmodify_by').val(usernameValue);
                    }

                    // select2 Library
                    $(document).ready(function() {
                        var select2Elements = ['#job_name', '#customer_name', '#serialnumber', 
                                               '#brand_id', '#machine_type', '#assign_JobInfo'];
                                       
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
                            url: "AdminHomepageTechnicianIndex.php?jobregister_id=" + jobregister_id,
                            
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

                    // Update Job Info Tab
                    function updateJobInfoTab(data) {
                        $('#todayDate_Support').val(new Date().toISOString().slice(0, 10));
                        $('#jobregisterID_jobInfo').val(data.jobregister_id);
                        $('#support').val(data.support);
                        $('#job_priority').val(data.job_priority);
                        $('#job_order_number').val(data.job_order_number);
                        $('#job_name').val(data.job_name).trigger('change');
                        $('#job_code').val(data.job_code);
                        $('#job_description').val(data.job_description);
                        $('#requested_date').val(data.requested_date);
                        $('#delivery_date').val(data.delivery_date);
                        $('#customer_name').val(data.customer_name).trigger('change');
                        $('#customer_code').val(data.customer_code);
                        $('#cust_address1').val(data.cust_address1);
                        $('#cust_address2').val(data.cust_address2);
                        $('#cust_address3').val(data.cust_address3);
                        $('#customer_grade').val(data.customer_grade);
                        $('#customer_PIC').val(data.customer_PIC);
                        $('#cust_phone1').val(data.cust_phone1);
                        $('#cust_phone2').val(data.cust_phone2);
                        $('#serialnumber').val(data.serialnumber).trigger('change');
                        $('#serialnumber').data('existing-value', data.serialnumber);
                        $('#brand_id').val(data.brand_id).trigger('change');
                        $('#brand_id').data('existing-value', data.brand_id);
                        $('#machine_brand').val(data.machine_brand);
                        $('#machine_type').val(data.machine_type).trigger('change');
                        $('#machine_type').data('existing-value', data.machine_type);
                        $('#type_id').val(data.type_id);
                        $('#job_status').val(data.job_status).trigger('change');
                        $('#inputreason').val(data.reason);
                        $('#assign_JobInfo').val(data.job_assign).trigger('change');
                        $('#techRankInfo').val(data.technician_rank);
                        $('#staffPosInfo').val(data.staff_position);
                        $('#accessories_required').val(data.accessories_required).trigger('change');
                        $('#accessories_for').val(data.accessories_for).trigger('change');
                        $('#job_cancel').val(data.job_cancel).trigger('change');

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

                    // Auto-fill customer details based on customer_name selection
                    function onCustomerNameChange(customer_name) {
                        var selectedOption = document.querySelector('#customer_name option[value="' + customer_name + '"]');
                        
                        if (selectedOption) {
                            var custGradeValue = selectedOption.getAttribute('data-custGrade');
                            var custCodeValue = selectedOption.getAttribute('data-custCode');
                            var custPicValue = selectedOption.getAttribute('data-custPIC');
                            var custAddr1Value = selectedOption.getAttribute('data-custAddr1');
                            var custAddr2Value = selectedOption.getAttribute('data-custAddr2');
                            var custAddr3Value = selectedOption.getAttribute('data-custAddr3');
                            var custNum1Value = selectedOption.getAttribute('data-custNum1');
                            var custNum2Value = selectedOption.getAttribute('data-custNum2');
                            
                            document.querySelector('input[name="customer_grade"]').value = custGradeValue;
                            document.querySelector('input[name="customer_code"]').value = custCodeValue;
                            document.querySelector('input[name="customer_PIC"]').value = custPicValue;
                            document.querySelector('input[name="cust_address1"]').value = custAddr1Value;
                            document.querySelector('input[name="cust_address2"]').value = custAddr2Value;
                            document.querySelector('input[name="cust_address3"]').value = custAddr3Value;
                            document.querySelector('input[name="cust_phone1"]').value = custNum1Value;
                            document.querySelector('input[name="cust_phone2"]').value = custNum2Value;
                        }
                        
                        else {
                            console.error('No matching option found for customer name:', customer_name);
                        }
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
                        var selectedOption = document.querySelector('#machine_type option[value="' + type_id + '"]');
                        
                        if (selectedOption) {
                            var machineName = selectedOption.getAttribute('data-machname');
                            var machineID = selectedOption.getAttribute('data-machid');
                            var machineCode = selectedOption.getAttribute('data-machcode');
                            
                            document.querySelector('input[name="machine_name"]').value = machineName;
                            document.querySelector('input[name="machine_id"]').value = machineID;
                            document.querySelector('input[name="machine_code"]').value = machineCode;
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

                        $('#jobregisterID_jobAssign').val(data.jobregister_id);
                        $('#job_assign').val(data.job_assign).trigger('change');
                        $('#technician_rank').val(data.technician_rank);
                        $('#staff_position').val(data.staff_position);
                        
                        // For Assistant
                        $('#jobregisterID_assistant').val(data.jobregister_id);
                        $('#ass_date').val(data.DateAssign);
                        $('#cust_name').val(data.customer_name);
                        $('#requestedDate').val(data.requested_date);
                        $('#machineName').val(data.machine_name);
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

                    // Update Job Update Tab
                    function updateJobUpdateTab(data) {
                        $('#jobregisterID_jobUpdate').val(data.jobregister_id);
                        $('#technician_departure').val(data.technician_departure);
                        $('#technician_arrival').val(data.technician_arrival);
                        $('#technician_leaving').val(data.technician_leaving);
                        $('#tech_out').val(data.tech_out);
                        $('#tech_in').val(data.tech_in);
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
                    $(document).on('click', '.JobTech', function () {
                        var jobregister_id = $(this).data('jobregisterid');
                        
                        fetchUsername();
                        fetchAllJobData(jobregister_id);
                        
                        $('#techPopup').modal('show');
                    });

                    // Hide respond message
                    function hideElementById(elementId) {
                        document.getElementById(elementId).style.display = "none";
                    }

                    // Update job info
                    $(document).on('click', '#updtInfo', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData($('#techJobInfoForm')[0]);
                        formData.append("update_jobInfo", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // Job support
                    $(document).on('click', '#supportJob', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData($('#techJobInfoForm')[0]);
                        formData.append("submit_jobSupport", true);
                                
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // Update Job Assign
                    $(document).on('click', '#jobAssBtn', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData($('#adminJobAssign')[0]);
                        formData.append("update_jobAssign", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // Update Job Update
                    $(document).on('click', '#timeUpdate', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData($('#techJobUpdateForm')[0]);
                        formData.append("update_jobUpdate", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // Delete Photo (Before)
                    $('#photoBeforeService').on('click', '.photoBeforeDelete', function () {
                        var photoBefore = $(this).closest('.photoBeforeContainer');
                        var photoId = photoBefore.data('id');
                        
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // Delete Photo (After)
                    $('#photoAfterService').on('click', '.photoAfterDelete', function () {
                        var photoAfter = $(this).closest('.photoAfterContainer');
                        var photoIdAfter = photoAfter.data('id');
                        
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // Delete Video (Before)
                    $('#videoBeforeService').on('click', '.videoBeforeDeletebtn', function () {
                        var videoBefore = $(this).closest('.videoBeforeContainer');
                        var videoIdBefore = videoBefore.data('id');
                
                        $.ajax({
                            type: "POST",
                            url: "AdminHomepageTechnicianIndex.php",
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
                            url: "AdminHomepageTechnicianIndex.php",
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

                    // New Service Report
                    $('.NewServiceReport').click(function () {
                        var jobregister_id = $("#jobregisterID_jobReport").val();
                
                        newServiceReport(jobregister_id);
                    });

                    // Edit Service Report
                    $('.EditServiceReport').click(function () {
                        var jobregister_id = $("#jobregisterID_jobReport").val();
                
                        editServiceReport(jobregister_id);
                    });
                </script>
                <!-- End of Technician Popup Modal -->
                <!-- End of Technician Box -->
            </div> <!-- closing row class -->
        </div> <!-- closing container-fluid class -->
        
        <script src="assets/js/main.js"></script>

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

        <!--========== JS ==========-->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

        <!--========== ICONS ==========-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>   
    </body>
</html