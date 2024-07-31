<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Admin Report</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
                <div class="card">
                <div class="card-header">
                        <h4>Worker's Daily Job</h4>
                    </div>
                    
                    <div class="card-body">
                        <form method="GET" id="getRecord">
                            <div class="card-body">
                                <div class="table-responsive mb-3">
                                    <!-- Date -->
                                    <div class="d-grid d-flex gap-2" style="margin-bottom: 30px; width:fit-content;">
                                        <label for="" class="fw-bold pt-1" style="font-size: large;">Date</label>
                                        <input type="text" name="DateAssign" id="myInput" class="form-control border border-dark" onchange="changeRecord();">
                                    </div>
                                    
                                    <script>
                                        var date = new Date();
                                        var day = date.getDate();
                                        var month = date.getMonth() + 1;
                                        var year = date.getFullYear();
                                        var formattedDay = (day < 10) ? '0' + day : day;
                                        var formattedMonth = (month < 10) ? '0' + month : month;
                                        var formattedDate = formattedDay + "-" + formattedMonth + "-" + year;
                                        var pattern = /DateAssign=[0-9]{2}-[0-9]{2}-[0-9]{4}/;
                                        
                                        $(document).ready(function() {
                                            $("#myInput").datepicker();
                                            $("#myInput").datepicker("option", "dateFormat", "dd-mm-yy");
                                            
                                            var urlParams = new URLSearchParams(window.location.search);
                                            var dateFromUrl = urlParams.get('DateAssign');
                                            
                                            if (!pattern.test(document.URL)) {
                                                $("#myInput").datepicker("setDate", new Date());
                                                
                                                document.getElementById("getRecord").submit();
                                            }
                                            
                                            else {
                                                $("#myInput").datepicker("setDate", dateFromUrl);
                                            }
                                        });
                                        
                                        function changeRecord() {
                                            document.getElementById("getRecord").submit();
                                        }
                                    </script>
                                    <!-- End of Date -->

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style='text-align: center;'></th>
                                                <th style='text-align: center;'>Technician</th>
                                                <th style='text-align: center; white-space: nowrap;'>Job Name</th>
                                                <th style='text-align: center;'>Count</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                                
                                                include_once 'dbconnect.php';
                                                
                                                if (isset($_GET['DateAssign'])) {
                                                    $DateAssign = $_GET['DateAssign'];
                                                    $query = mysqli_query($conn, "SELECT * FROM job_register WHERE DateAssign ='$DateAssign' AND job_assign <> 'Ithink' ORDER BY job_assign ASC");
                                                    
                                                    if (mysqli_num_rows($query) > 0) {
                                                        $counter = 1;
                                                        $data = [];
                                                        
                                                        foreach ($query as $row) {
                                                            $data[$row["job_assign"]][] = $row;
                                                        }
                                                        
                                                        foreach ($data as $technician => $jobs) {
                                                            $jobTypeCounts = [];
                                                            
                                                            foreach ($jobs as $job) {
                                                                if (!isset($jobTypeCounts[$job["job_name"]])) {
                                                                    $jobTypeCounts[$job["job_name"]] = 0;
                                                                }
                                                                
                                                                $jobTypeCounts[$job["job_name"]]++;
                                                            }
                                                            
                                                            $rowspan = count($jobTypeCounts);
                                                            $firstRow = true;
                                                            
                                                            foreach ($jobTypeCounts as $jobType => $count) {
                                                                echo "<tr>";
                                                                
                                                                if ($firstRow) {
                                                                    ?>
                                                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;' rowspan='<?php echo $rowspan; ?>'><?= $counter ?></td>
                                                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;' rowspan='<?php echo $rowspan; ?>'><?php echo $technician; ?></td>
                                                                    <?php
                                                                    
                                                                    $firstRow = false;
                                                                }
                                                                
                                                                ?>
                                                                        <td style='white-space: nowrap;' class='ps-3'><?php echo $jobType; ?></td>
                                                                        <td style='text-align: center; white-space: nowrap;'><?php echo $count; ?></td>
                                                                    </tr>
                                                                <?php
                                                            }
                    
                                                            $counter++;
                                                        }
                                                    }
                                                    
                                                    else {
                                                        echo '<tbody><tr><td colspan="4" style="color:red; text-align:center; font-weight:bold">No Record Found</td></tr></tbody>';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <script src="assets/js/main.js"></script>
            </section>
        </main>        
    </body>
</html>

