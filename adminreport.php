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
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Admin Report</h4>
                    </div>
                    
                    <form method="GET" id="getRecord">
                        <div class="card-body">
                            <!-- Date -->
                            <div class="d-grid d-flex gap-2 mt-3" style="margin-bottom: 30px; width:fit-content;">
                                <label for="" class="fw-bold pt-1" style="font-size: large;">Date</label>
                                <input type="text" name="DateAssign" id="myInput" class="form-control border border-dark" onchange="changeRecord();">
                                <button type="button" class="btn btn-primary" style="color: white; background-color: #081d45; border:none; width:max-content;" onclick="window.open('reportadmin.php?DateAssign=' + document.getElementById('myInput').value)">Print</button>
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
                            
                            <div class="table-responsive mb-3">
                                <label for="" class="fw-bold mb-3">Worker Assignment</label>
                                <table id="myTable" class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th style='text-align: center;'>No</th>
                                            <th style='text-align: center;'>Leader</th>
                                            <th style='text-align: center;'>Assistant</th>
                                            <th style='text-align: center;'>Place</th>
                                            <th style='text-align: center;'>Machine</th>
                                            <th style='text-align: center;'>Departure</th>
                                            <th style='text-align: center;'>Arrival</th>
                                            <th style='text-align: center;'>Leaving</th>
                                            <th style='text-align: center; white-space: nowrap;'>Working Time</th>
                                            <th style='text-align: center; white-space: nowrap;'>Travel Time</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id ="tbody">
                                        <?php
                                        
                                            include_once 'dbconnect.php';
                                            
                                            if(isset($_GET['DateAssign'])) {
                                                $DateAssign = $_GET['DateAssign'];
                                                
                                                $query = mysqli_query($conn, "SELECT * FROM job_register LEFT JOIN assistants 
                                                                              ON job_register.jobregister_id=assistants.jobregister_id 
                                                                              WHERE (job_register.DateAssign='$DateAssign' AND job_register.job_assign !='' 
                                                                              AND (job_register.job_cancel = '' OR job_register.job_cancel IS NULL))
                                                                              ORDER BY job_assign ASC, departure_timestamp ASC");
                                            
                                                if(mysqli_num_rows($query) > 0) {
                                                    $counter = 1;
                                                    
                                                    foreach($query as $row) {
                                                        $currentname = $row['job_assign'];
                                                        $technician_departure =$row['technician_departure'];
                                                        $technician_arrival =$row['technician_arrival'];
                                                        $technician_leaving =$row['technician_leaving'];
                                                        
                                                        $departure = (new DateTime($technician_departure))->format('h:i A');
                                                        $arrival = (new DateTime($technician_arrival))->format('h:i A');
                                                        $leaving = (new DateTime($technician_leaving))->format('h:i A');
                                                        
                                                        if (!function_exists('difftime')) {
                                                            function difftime($techniciandeparture, $technicianarrival) {
                                                                $dif=array();
                                                                $first = strtotime($techniciandeparture);
                                                                $second = strtotime($technicianarrival);
                                                                $TravelTime = abs($first - $second);
                                                                $dif['s'] = floor($TravelTime);
                                                                $dif['m'] = floor($TravelTime/(60) % 60 );
                                                                $dif['h'] = floor($TravelTime/(60*60)); 
                                                      
                                                                return $dif;
                                                            }
                                                        }
                                                
                                                        if (!function_exists('difftime2')) {
                                                            function difftime2($technicianarrival, $technicianleaving) {
                                                                $dif2=array();
                                                                $first = strtotime($technicianarrival);
                                                                $second = strtotime($technicianleaving);
                                                                $WorkTime = abs($first - $second);
                                                                $dif['s'] = floor($WorkTime);
                                                                $dif['m'] = floor($WorkTime/(60) % 60 );
                                                                $dif['h'] = floor($WorkTime/(60*60));
                                                            
                                                                return $dif2;
                                                            }
                                                        }

                                                        $wh = '';
                                                        $wm = '';
                                                        $th = '';
                                                        $tm = '';
                                                        
                                                        if ($arrival != '' && $leaving != ''){
                                                            $wh = difftime($arrival, $leaving)['h'];
                                                            $wm = difftime($arrival, $leaving)['m'];
                                                        }
                                                        
                                                        if ($departure != '' && $arrival != ''){
                                                            $th = difftime($departure, $arrival)['h'];
                                                            $tm = difftime($departure, $arrival)['m'];
                                                        }
                                        ?>
                                    
                                        <tr>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $row['job_assign']; ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= nl2br($row['username']); ?></td>
                                            <td style="vertical-align: middle;"><?= $row['customer_name']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['machine_type']; ?> - <?= $row['job_description']; ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo "$departure" ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo "$arrival" ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo "$leaving" ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                                <span class="hours-print"><?php echo(($wh != '' && $wm != '') && ($wh != 0 || $wm != 0)) ? $wh . ' hrs ': '';?></span>
                                                <span class="minutes-print"><?php echo(($wh != '' && $wm != '') && ($wh != 0 || $wm != 0)) ? $wm . ' mins ': '';?></span>
                                            </td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                                <span class="hours-print"><?php  echo (($th != '' && $tm != '') && ($th != 0 || $tm != 0)) ? $th . ' hrs ': '';?></span>
                                                <span class="minutes-print"><?php  echo (($th != '' && $tm != '') && ($th != 0 || $tm != 0)) ? $tm . ' mins ': '';?></span>
                                            </td>
                                        </tr>
                                    
                                        <?php
                                            
                                            $counter++;  
                                                    } 
                                                }
                                                
                                                else {
                                                    echo "<p style='color:red; text-align:center; font-weight:bold'>No record found</p>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>

                                <script>
                                    $(document).ready(function() {
                                        var previousName = null;
                                        var count = 1;
                                        var index2;
                                        
                                        $("#tbody tr").each(function(index) {
                                            index2 = index;
                                            
                                            var currentName = $(this).find("td:eq(1)").text();
                                            
                                            if (previousName !== currentName) {
                                                if (count > 1) {
                                                    $("#tbody tr:eq(" + (index - count) + ") td:eq(1)").attr("rowspan", count);
                                                }
                                                
                                                count = 1;
                                                
                                                previousName = currentName;
                                            }
                                            
                                            else {
                                                count++;
                                                
                                                $(this).find("td:eq(1)").hide();
                                            }
                                        });
                                        
                                        if (count > 1){
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(1)").attr("rowspan", count);
                                        }
                                    });
                                </script>
                            </div>

                            <div class="table-responsive mb-3">
                                <label for="" class="fw-bold mb-3">Total Working Time</label>
                                <table id="myTable2" class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th style='text-align: center;'>No</th>
                                            <th style='text-align: center;'>Technician</th>
                                            <th style='text-align: center;'>Place</th>
                                            <th style='text-align: center; white-space: nowrap;'>Working Time</th>
                                            <th style='text-align: center; white-space: nowrap;'>Rest Time</th>
                                            <th style='text-align: center; white-space: nowrap;'>Travel Time</th>
                                            <th style='text-align: center; white-space: nowrap;'>Total Working Time</th>
                                            <th style='text-align: center; white-space: nowrap;'>Total Travel Time</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody id ="tbody2">
                                        <?php
                                            $counter2 = 1;
                                            include_once 'dbconnect.php';
                                            
                                            if(isset($_GET['DateAssign'])) {
                                                $DateAssign = $_GET['DateAssign'];

                                                $records = array();

                                                $query = mysqli_query($conn, "SELECT * FROM job_register LEFT JOIN assistants 
                                                                              ON job_register.jobregister_id=assistants.jobregister_id 
                                                                              WHERE (job_register.DateAssign='$DateAssign' AND job_register.job_assign !='' 
                                                                              AND (job_register.job_cancel = '' OR job_register.job_cancel IS NULL))");

                                                if ($query) {
                                                    while ($row1 = mysqli_fetch_assoc($query)) {
                                                        $records[] = $row1;
                                                    }
                                                    mysqli_free_result($query);
                                                }

                                                $staff_query = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' and tech_avai = 0
                                                                                    ORDER BY username ASC");

                                                foreach($staff_query as $row){
                                                    $countrecords = 0;
                                                    $workinghrArray = array();
                                                    $workingminArray = array();
                                                    $resttimehrArray = array();
                                                    $resttimeminArray = array();
                                                    $totalworkinghr = 0;
                                                    $totalworkingmin = 0;
                                                    $noloop = false;
                                                    $totaltravelhr = 0;
                                                    $totaltravelmin = 0;
                                                    
                                                    foreach ($records as $record) {
                                                        if ($row['username'] == strtoupper($record['job_assign'])){
                                                            $countrecords++;
                                                            
                                                            $workingtimehr = (difftime($record['technician_leaving'], $record['technician_arrival'])['h'] <= 24) ? 
                                                                              difftime($record['technician_leaving'], $record['technician_arrival'])['h'] : 0;
                                                            
                                                            $workingtimemin = (difftime($record['technician_leaving'], $record['technician_arrival'])['h'] <= 24) ?
                                                                               difftime($record['technician_leaving'], $record['technician_arrival'])['m'] : 0;
                                                            
                                                            $workinghrArray[] = $workingtimehr;
                                                            $workingminArray[] = $workingtimemin;

                                                            $resttimehr = (difftime($record['tech_in'], $record['tech_out'])['h'] <= 24) ?
                                                                           difftime($record['tech_in'], $record['tech_out'])['h'] : 0;

                                                            $resttimemin = (difftime($record['tech_in'], $record['tech_out'])['h'] <= 24) ?
                                                                           difftime($record['tech_in'], $record['tech_out'])['m'] : 0;
                                                                         
                                                            $resttimehrArray[] = $resttimehr; 
                                                            $resttimeminArray[] = $resttimemin;
                                                            
                                                            $TravelTimehr = (difftime($record['technician_arrival'], $record['technician_departure'])['h'] <= 24) ?
                                                                             difftime($record['technician_arrival'], $record['technician_departure'])['h'] : 0;
                                                            
                                                            $TravelTimemin = (difftime($record['technician_arrival'], $record['technician_departure'])['h'] <= 24) ?
                                                                              difftime($record['technician_arrival'], $record['technician_departure'])['m'] : 0; 
                                                            
                                                            $totaltravelhr += $TravelTimehr;
                                                            $totaltravelmin += $TravelTimemin;
                                                            
                                                            if ($totaltravelmin >= 60){
                                                                $totaltravelmin -= 60;
                                                                $totaltravelhr += 1;
                                                            }
                                        ?>
                                        <tr>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter2 ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $row['username'] ?></td>
                                            <td style="text-align: center; vertical-align: middle;"><?= $record['customer_name'] ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= (($workingtimehr == 0 && $workingtimemin != 0) || ($workingtimehr != 0 && $workingtimemin == 0) || ($workingtimehr != 0 && $workingtimemin != 0)) ? $workingtimehr . 'hrs ' . $workingtimemin . 'mins' : '' ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= ($resttimehr > 0 || $resttimemin > 0) ? $resttimehr . 'hrs ' . $resttimemin . 'mins' : '' ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= (($TravelTimehr == 0 && $TravelTimemin != 0) || ($TravelTimehr != 0 && $TravelTimemin == 0) || ($TravelTimehr != 0 && $TravelTimemin != 0)) ? $TravelTimehr . 'hrs ' . $TravelTimemin . 'mins' : '' ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                        </tr>
                                        <?php
                                            
                                            $counter2++; 
                                                        }
                                                    }
                                                    
                                            $noloop = true;
                                            
                                            foreach ($workinghrArray as $wh){
                                                $totalworkinghr += $wh;
                                            }
                                            
                                            foreach ($workingminArray as $wm){
                                                $totalworkingmin += $wm;
                                                
                                                if ($totalworkingmin >= 60){
                                                    $totalworkingmin -= 60;
                                                    $totalworkinghr += 1;
                                                }
                                            }
                                            
                                            if (($totalworkinghr == 0 && $totalworkingmin > 0) || ($totalworkinghr > 0 && $totalworkingmin == 0) || ($totalworkinghr > 0 && $totalworkingmin > 0)){
                                                if (($totalworkingmin - $resttimehr) < 0) {
                                                    $totalworkingmin = 60 + $totalworkingmin - $resttimehr;
                                                    $totalworkinghr -= 1;
                                                }
                                                
                                                else {
                                                    $totalworkingmin = $totalworkingmin - $resttimehr;
                                                }
                                            }
                                            
                                            if ($countrecords == 0){ 
                                        ?>
                                        <tr>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter2 ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $row['username']; ?></td>
                                            <td style="vertical-align: middle;"></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'></td>
                                        </tr>
                                        <?php $counter2++; } ?>
                                                    
                                        <!-- Insert Total Working Time and Total Travel Time and change font color -->
                                        <script>
                                            if (<?= $noloop ?>) {
                                                var $table2 = $('#myTable2');
                                                var $row = $table2.find("td:contains('<?= $row['username']; ?>')").closest("tr");
                                                var totalWorkingTimeInMinutes = (<?= $totalworkinghr ?> * 60) + <?= $totalworkingmin ?>;
                                                var totalTravelTimeInMinutes = (<?= $totaltravelhr ?> * 60) + <?= $totaltravelmin ?>;
                                                var totalRestTimeInMinutes = (<?= array_sum($resttimehrArray); ?> * 60) + <?= array_sum($resttimeminArray); ?>;
                                                var totalTime = totalWorkingTimeInMinutes + totalTravelTimeInMinutes - totalRestTimeInMinutes;
                                                
                                                if (totalTime > 420) {
                                                    $row.find("td").css("color", "");
                                                }
                                                
                                                else {
                                                    $row.find("td").css("color", "red");
                                                }
                                                
                                                var totalWorkingHours = Math.floor(totalWorkingTimeInMinutes / 60);
                                                var totalWorkingMinutes = totalWorkingTimeInMinutes % 60;
                                                var totalTravelHours = Math.floor(totalTravelTimeInMinutes / 60);
                                                var totalTravelMinutes = totalTravelTimeInMinutes % 60;
                                                
                                                if (totalWorkingTimeInMinutes > 0) {
                                                    $row.find("td:nth-last-child(2)").text(totalWorkingHours + "hrs " + totalWorkingMinutes + "mins");
                                                }
                                                
                                                if (totalTravelTimeInMinutes > 0) {
                                                    $row.find("td:last-child").text(totalTravelHours + "hrs " + totalTravelMinutes + "mins");
                                                }
                                            }
                                        </script>
                                        <?php
                                                }
                                            }
                                            
                                            else {
                                                echo "<p style='color:red; text-align:center; font-weight:bold'>No record found</p>";
                                            }
                                        ?>
                                    </tbody>

                                    <!-- Merge cell -->
                                    <script>
                                        $(document).ready(function() {
                                            var previousName = null;
                                            var count = 1;
                                            var restTimeAccumulator = {};
                                            
                                            $("#tbody2 tr").each(function(index) {
                                                var currentName = $(this).find("td:eq(1)").text();
                                                var restTimeText = $(this).find("td:eq(4)").text();
                                                
                                                if (!restTimeAccumulator[currentName]) {
                                                    restTimeAccumulator[currentName] = {
                                                        hours: 0,
                                                        minutes: 0
                                                    };
                                                }
                                                
                                                var restTimeParts = restTimeText.match(/(\d+)hrs\s+(\d+)mins/);
                                                
                                                if (restTimeParts) {
                                                    restTimeAccumulator[currentName].hours += parseInt(restTimeParts[1]);
                                                    restTimeAccumulator[currentName].minutes += parseInt(restTimeParts[2]);
                                                    
                                                    if (restTimeAccumulator[currentName].minutes >= 60) {
                                                        restTimeAccumulator[currentName].hours += Math.floor(restTimeAccumulator[currentName].minutes / 60);
                                                        restTimeAccumulator[currentName].minutes %= 60;
                                                    }
                                                }
                                                
                                                if (currentName === previousName) {
                                                    count++;
                                                    
                                                    $(this).find("td:eq(1), td:eq(4), td:eq(6), td:eq(7)").hide();
                                                }
                                                
                                                else {
                                                    if (count > 1) {
                                                        var firstRow = $("#tbody2 tr").eq(index - count);
                                                        
                                                        firstRow.find("td:eq(1)").attr("rowspan", count);
                                                        firstRow.find("td:eq(4)").attr("rowspan", count).text(restTimeAccumulator[previousName].hours + 'hrs ' + restTimeAccumulator[previousName].minutes + 'mins');
                                                        firstRow.find("td:eq(6)").attr("rowspan", count);
                                                        firstRow.find("td:eq(7)").attr("rowspan", count);
                                                    }
                                                    
                                                    count = 1;
                                                    previousName = currentName;
                                                }
                                                
                                                if (index + 1 === $("#tbody2 tr").length && count > 1) {
                                                    var lastFirstRow = $("#tbody2 tr").eq(index - count + 1);
                                                    
                                                    lastFirstRow.find("td:eq(1)").attr("rowspan", count);
                                                    lastFirstRow.find("td:eq(4)").attr("rowspan", count).text(restTimeAccumulator[currentName].hours + 'hrs ' + restTimeAccumulator[currentName].minutes + 'mins');
                                                    lastFirstRow.find("td:eq(6)").attr("rowspan", count);
                                                    lastFirstRow.find("td:eq(7)").attr("rowspan", count);
                                                }
                                            });
                                        });
                                    </script>
                                </table>
                            </div>
                            
                            <div class="table-responsive mb-3">
                                <label for="" class="fw-bold mb-3">Attendance And Rest Time</label>
                                <table id="myTable" class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th style='text-align: center;'>No</th>
                                            <th style='text-align: center;'>Leader</th>
                                            <th style='text-align: center;'>Assistant</th>
                                            <th style='text-align: center; white-space: nowrap;'>Clock In</th>
                                            <th style='text-align: center; white-space: nowrap;'>Clock Out</th>
                                            <th style='text-align: center; white-space: nowrap;'>Rest Out</th>
                                            <th style='text-align: center; white-space: nowrap;'>Rest In</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            
                                            include_once 'dbconnect.php';
                                            
                                            if(isset($_GET['DateAssign'])) {
                                                $DateAssign = $_GET['DateAssign'];
                                                
                                                $query = mysqli_query($conn, "SELECT * FROM tech_update WHERE techupdate_date='$DateAssign' AND tech_leader <> 'Ithink'");
                                                
                                                if(mysqli_num_rows($query) > 0) {
                                                    $counter = 1;
                                                    
                                                    foreach($query as $row) {
                                        ?>
                                        <tr>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row["tech_leader"]; ?></td>
                                            <td style='text-align: center; white-space: nowrap;vertical-align: middle;'><?= nl2br($row['username']); ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row["tech_clockin"]; ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row["tech_clockout"]; ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row["technician_out"]; ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo $row["technician_in"]; ?></td>
                                        </tr>
                                        <?php
                                            
                                            $counter++;
                                                    } 
                                                }
                                                
                                                else {
                                                    echo "<p style='color:red; text-align:center; font-weight:bold'>No record found</p>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="table-responsive mb-3">
                                <label for="" class="fw-bold mb-3">Technician On Leave</label>
                                <table id="myTable" class="table table-bordered border-dark">
                                    <thead>
                                        <tr>
                                            <th style='text-align: center;'>No</th>
                                            <th style='text-align: center; white-space: nowrap;'>Technician</th>
                                            <th style='text-align: center;'></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            
                                            include_once 'dbconnect.php';
                                            
                                            if(isset($_GET['DateAssign'])) {
                                                $DateAssign = $_GET['DateAssign'];
                                                
                                                $query = mysqli_query($conn, "SELECT * FROM tech_off WHERE leave_date='$DateAssign'");
                                                
                                                if(mysqli_num_rows($query) > 0) {
                                                    $counter = 1;
                                                    
                                                    foreach($query as $row) {
                                        ?>
                                        <tr>
                                            <td style='text-align: center;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap;'><?= $row['tech_name']; ?></td>
                                            <td style='text-align: center; color:red;' class="fw-bold">OFF</td>
                                        </tr>
                                        <?php
                                            
                                            $counter++;
                                                    } 
                                                }
                                                
                                                else {
                                                    echo "<p style='color:red; text-align:center; font-weight:bold'>No record found</p>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                
                <script src="assets/js/main.js"></script>

            </section>
        </main>        
    </body>
    </html>