<?php
    
    session_start();
    
    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");
    }
    
    if (!isset($_SESSION['username'])) {
        header("location: index.php?error=login");
    } 
    
    elseif ($_SESSION['staff_position'] != 'Admin' && $_SESSION['staff_position'] != 'Manager') {
        header("location: index.php?error=permission");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Job Of The Day</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        /* Back To Top Button */
        #myBtn {
            display: none;
            position: fixed;
            bottom: 15px;
            right:15px;
            z-index: 99;
            cursor: pointer;
        }
        
        #myBtn:hover {
            background-color: #555;
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

                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Job Of The Day</h4>
                    </div>
                    
                    <div class="card-body" id="livesearch">
                        <!-- Search function -->
                        <input type="text" id="myInput" placeholder="Search" class="form-control mb-3">

                        <!-- Incomplete Job -->
                        <div class="table-responsive">
                            <?php
                                
                                include 'dbconnect.php';
                                
                                $numRow = "SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                           OR (job_status = 'Incomplete' AND job_cancel IS NULL)";
                                
                                $numRow_run = mysqli_query ($conn,$numRow);
                                
                                if ($row_Total = mysqli_num_rows($numRow_run)) {
                                    echo '<label for="" class="fw-bold mb-3">Incomplete Job - '.$row_Total.'</label>';
                                }
                                
                                else {
                                    echo '<label for="" class="fw-bold mb-3">Incomplete Job - No Data</label>';
                                }
                            ?>
                            
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center;'>Leader</th>
                                        <th style='text-align: center;'>Place</th>
                                        <th style='text-align: center;'>Machine</th>
                                        <th style='text-align: center;'>Reason</th>
                                        <th style='text-align: center; white-space: nowrap;'>Last Update Date</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                                 OR (job_status = 'Incomplete' AND job_cancel IS NULL)
                                                                 ORDER BY job_assign ASC, jobregisterlastmodify_at DESC");
                    
                                        $counter = 1;

                                        while($row = $results->fetch_assoc()) {
                                            $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
                                            $datemodify = substr($jobregisterlastmodify_at,0,11); 
                                    ?>
                                    <tr>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                            <button type="button" value="<?php echo $row['jobregister_id'];?>" class="openModal btn fw-bold" style="border: none;"><?php echo $row['job_assign']?></button>
                                        </td>
                                        <td style='vertical-align: middle;'><?php echo $row['customer_name']?></td>
                                        <td style='vertical-align: middle;'><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                                        <td style='text-align: center; vertical-align: middle;'><?php echo $row['reason']?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $datemodify ?></td>
                                    </tr>
                                    <?php $counter++; }?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Incomplete Job -->

                        <!-- Pending Job -->
                        <div class="table-responsive">
                            <?php
                                
                                include 'dbconnect.php';
                                
                                $numRow = "SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                           OR (job_status = 'Pending' AND job_cancel IS NULL)";
                
                                $numRow_run = mysqli_query ($conn,$numRow);
                                
                                if ($row_Total = mysqli_num_rows($numRow_run)) {
                                    echo '<label for="" class="fw-bold mb-3">Pending Job - '.$row_Total.'</label>';
                                }
                
                                else {
                                    echo '<label for="" class="fw-bold mb-3">Pending Job - No Data</label>';
                                }
                            ?>
                            
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center;'>Leader</th>
                                        <th style='text-align: center;'>Place</th>
                                        <th style='text-align: center;'>Machine</th>
                                        <th style='text-align: center;'>Reason</th>
                                        <th style='text-align: center; white-space: nowrap;'>Last Update Date</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                                 OR (job_status = 'Pending' AND job_cancel IS NULL)
                                                                 ORDER BY job_assign ASC, jobregisterlastmodify_at DESC");
                    
                                        $counter = 1;

                                        while($row = $results->fetch_assoc()) {
                                            $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
                                            $datemodify = substr($jobregisterlastmodify_at,0,11); 
                                    ?>
                                    <tr>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                            <button type="button" value="<?php echo $row['jobregister_id'];?>" class="openModal btn fw-bold" style="border: none;"><?php echo $row['job_assign']?></button>
                                        </td>
                                        <td style='vertical-align: middle;'><?php echo $row['customer_name']?></td>
                                        <td style='vertical-align: middle;'><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                                        <td style='text-align: center; vertical-align: middle;'><?php echo $row['reason']?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $datemodify ?></td>
                                    </tr>
                                    <?php $counter++; }?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Pending Job -->

                        <!-- Planned Job -->
                        <div class="table-responsive">
                            <?php
                                
                                include 'dbconnect.php';
                                
                                $numRow = "SELECT * FROM job_register WHERE (job_status = '' OR job_status IS NULL OR job_status = 'Doing') 
                                           AND (job_cancel = '' OR job_cancel IS NULL) 
                                           AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                           AND staff_position = 'Leader'";
                
                                $numRow_run = mysqli_query ($conn,$numRow);
                
                                if ($row_Total = mysqli_num_rows($numRow_run)) {
                                    echo '<label for="" class="fw-bold mb-3">Planned Job For The Day - '.$row_Total.'</label>';
                                }
                                
                                else {
                                    echo '<label for="" class="fw-bold mb-3">Planned Job For The Day - No Data</label>';
                                }
                            ?>

                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center;'>Leader</th>
                                        <th style='text-align: center;'>Place</th>
                                        <th style='text-align: center;'>Machine</th>
                                        <th style='text-align: center;'>Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        include 'dbconnect.php';

                                        $results = $conn->query("SELECT * FROM job_register WHERE (job_status = '' OR job_status IS NULL OR job_status = 'Doing') 
                                                                 AND (job_cancel = '' OR job_cancel IS NULL) 
                                                                 AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                                                 AND staff_position = 'Leader'
                                                                 ORDER BY jobregisterlastmodify_at DESC");

                                        $counter = 1;

                                        while($row = $results->fetch_assoc()) {
                                            
                                    ?>
                                    <tr>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                            <button type="button" value="<?php echo $row['jobregister_id'];?>" class="openModal btn fw-bold" style="border: none;"><?php echo $row['job_assign']?></button>
                                        </td>
                                        <td style='vertical-align: middle;'><?php echo $row['customer_name']?></td>
                                        <td style='vertical-align: middle;'><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row['job_status']?></td>
                                    </tr>
                                    <?php $counter++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Planned Job -->

                        <!-- Unplan Job -->
                        <div class="table-responsive">
                            <?php
                                
                                include 'dbconnect.php';
                                
                                $numRow = "SELECT * FROM job_register WHERE (job_assign ='' OR job_assign IS NULL)
                                           AND (staff_position != 'Storekeeper' OR staff_position = '' OR staff_position IS NULL) 
                                           AND (job_status ='' OR job_status IS NULL OR job_status ='Ready')
                                           AND (job_cancel IS NULL OR job_cancel = '')";
                
                                $numRow_run = mysqli_query ($conn,$numRow);
                
                                if ($row_Total = mysqli_num_rows($numRow_run)) {
                                    echo '<label for="" class="fw-bold mb-3">Unplanned Job For The Day - '.$row_Total.'</label>';
                                }
                                
                                else {
                                    echo '<label for="" class="fw-bold mb-3">Unplanned Job For The Day - No Data</label>';
                                }
                            ?>

                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center;'>Place</th>
                                        <th style='text-align: center;'>Machine</th>
                                        <th style='text-align: center;'>Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query("SELECT * FROM job_register WHERE (job_assign ='' OR job_assign IS NULL)
                                                                 AND (staff_position != 'Storekeeper' OR staff_position = '' OR staff_position IS NULL) 
                                                                 AND (job_status ='' OR job_status IS NULL OR job_status ='Ready')
                                                                 AND (job_cancel IS NULL OR job_cancel = '')
                                                                 ORDER BY job_assign ASC, jobregisterlastmodify_at DESC");
                    
                                        $counter = 1;

                                        while($row = $results->fetch_assoc()) {
                                    ?>

                                    <tr>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                            <button type="button" value="<?php echo $row['jobregister_id'];?>" class="openModal btn fw-bold" style="border: none;"><?php echo $row["customer_name"]; ?></button>
                                        </td>
                                        <td style='text-align: center; vertical-align: middle;'><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row['job_status']?></td>
                                    </tr>
                                    <?php $counter++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Unplan Job -->

                        <!-- Search Function -->
                        <script>
                            $(document).ready(function() {
                                $("#myInput").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                    
                                    $("#livesearch .table-responsive").each(function() {
                                        var table = $(this).find("table tbody");
                                        var hasMatch = false;
                                        
                                        table.find("tr").each(function() {
                                            var rowText = $(this).text().toLowerCase();
                                            
                                            if (rowText.indexOf(value) > -1) {
                                                hasMatch = true;
                                                $(this).show();
                                            } 
                                            
                                            else {
                                                $(this).hide();
                                            }
                                        });
                                        
                                        $(this).toggle(hasMatch);
                                    });
                                });
                            });
                        </script>
                        <!-- End of Search Function -->

                        <!-- Job Info Popup Modal -->
                        <div class="modal fade" id="jobInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Job Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Priority</label>
                                                <p id="view_jobPriority" class="form-control"></p>
                                            </div>
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Order Number</label>
                                                <p id="view_JON" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Name</label>
                                                <p id="view_jobName" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Description</label>
                                                <p id="view_jobDesc" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Delivery Date</label>
                                                <p id="view_delDate" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Requested Date</label>
                                                <p id="view_reqDate" class="form-control"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Customer Name</label>
                                                <p id="view_custName" class="form-control"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Customer Address</label>
                                                <p id="view_custAddr1" class="form-control"></p>
                                                <div class="d-grid d-flex gap-2 mt-2">
                                                    <p id="view_custAddr2" class="form-control"></p>
                                                    <p id="view_custAddr3" class="form-control"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer Grade</label>
                                                <p id="view_custGrade" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer PIC</label>
                                                <p id="view_custPIC" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer Phone Number 1</label>
                                                <p id="view_custPhone1" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Customer Phone Number 2</label>
                                                <p id="view_custPhone2" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Machine Brand</label>
                                                <p id="view_machBrand" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Machine Type</label>
                                                <p id="view_machType" class="form-control"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Machine Name</label>
                                                <p id="view_machName" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Serial Number</label>
                                                <p id="view_serNum" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Accessory Require</label>
                                                <p id="view_accReq" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Status</label>
                                                <p id="view_jobStatus" class="form-control"></p>
                                            </div> 
                                            
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Reason</label>
                                                <p id="view_reason" class="form-control"></p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                            $(document).on('click', '.openModal', function () {
                                var jobregister_id = $(this).val();
                                
                                $.ajax({
                                    type: "GET",
                                    url: "jobTableCode.php?jobregister_id=" + jobregister_id,
                                    
                                    success: function (response) {
                                        var res = jQuery.parseJSON(response);
                                        
                                        if(res.status == 404) {
                                            alert(res.message);
                                        }
                                        
                                        else if(res.status == 200) {
                                            $('#view_jobPriority').text(res.data.job_priority);
                                            $('#view_JON').text(res.data.job_order_number);
                                            $('#view_jobName').text(res.data.job_name);
                                            $('#view_jobDesc').text(res.data.job_description);
                                            $('#view_jobStatus').text(res.data.job_status);
                                            $('#view_delDate').text(res.data.delivery_date);
                                            $('#view_reqDate').text(res.data.requested_date);
                                            $('#view_custName').text(res.data.customer_name);
                                            $('#view_custAddr1').text(res.data.cust_address1);
                                            $('#view_custAddr2').text(res.data.cust_address2);
                                            $('#view_custAddr3').text(res.data.cust_address3);
                                            $('#view_custGrade').text(res.data.customer_grade);
                                            $('#view_custPIC').text(res.data.customer_PIC);
                                            $('#view_custPhone1').text(res.data.cust_phone1);
                                            $('#view_custPhone2').text(res.data.cust_phone2);
                                            $('#view_machBrand').text(res.data.machine_brand);
                                            $('#view_machType').text(res.data.machine_type);
                                            $('#view_machName').text(res.data.machine_name);
                                            $('#view_serNum').text(res.data.serialnumber);
                                            $('#view_accReq').text(res.data.accessories_required);
                                            $('#view_reason').text(res.data.reason);
                                            
                                            $('#jobInfoModal').modal('show');
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End of Job Info Popup Modal -->
                    </div>
                </div>

                <script src="assets/js/main.js"></script>

            </section>
        </main>        
    </body>
    </html>