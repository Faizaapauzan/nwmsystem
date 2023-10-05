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

        .pre{
            font-family: var(--body-font);
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
                                                        $departure = substr($technician_departure,11);
                                                        $arrival = substr($technician_arrival,11); 
                                                        $leaving = substr($technician_leaving,11);
                                                        
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
                                
                                  
                                                        $username = $row['username'];   
                                                        $usernamesArray = explode(",", $username);
                                                        $formattedUsernames = '';
                                                        foreach ($usernamesArray as $name) {
                                                            $formattedUsernames .= $name . "\n";
                                                        }
                                        ?>
                                    
                                        <tr>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= strtoupper($row['job_assign']); ?></td>
                                            <td style='text-align: center; vertical-align: middle;'><pre class="pre"><?= strtoupper($formattedUsernames); ?></pre></td>
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
                                                                        AND (job_register.job_cancel = '' OR job_register.job_cancel IS NULL))
                                                                        ORDER BY job_assign ASC");

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
                                                    $resttimeArray = array();
                                                    $totalworkinghr = 0;
                                                    $totalworkingmin = 0;
                                                    $noloop = false;
                                                    $totaltravelhr = 0;
                                                    $totaltravelmin = 0;
                                                    
                                                    
                                                    foreach ($records as $record) {
                                                        if ($row['username'] == strtoupper($record['job_assign'])){
                                                            $countrecords++;
                                                            $rest1 = strtotime('13:00:00');
                                                            $rest2 = strtotime('14:00:00');
                                                            $workingtimehr = (difftime($record['technician_leaving'], $record['technician_arrival'])['h'] <= 24) ? 
                                                                                difftime($record['technician_leaving'], $record['technician_arrival'])['h'] : 0;
                                                            $workingtimemin = (difftime($record['technician_leaving'], $record['technician_arrival'])['h'] <= 24) ?
                                                                                difftime($record['technician_leaving'], $record['technician_arrival'])['m'] : 0;
                                                            $workinghrArray[] = $workingtimehr;
                                                            $workingminArray[] = $workingtimemin;

                                                            if (strtotime($record['tech_out']) >= $rest1 && strtotime($record['tech_out']) < $rest2 && difftime($record['tech_in'], '14:00:00')['h'] <= 0){
                                                                $resttimeArray[] = difftime($record['tech_in'], $record['tech_out'])['m'];
                                                            }
                                                            
                                                            $resttime = !empty($resttimeArray) ? max($resttimeArray) : 0;
                                                            

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
                                            <td style="text-align: center; white-space: nowrap; vertical-align: middle;"><?= $record['customer_name'] ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= (($workingtimehr == 0 && $workingtimemin != 0) || ($workingtimehr != 0 && $workingtimemin == 0) || ($workingtimehr != 0 && $workingtimemin != 0)) ? $workingtimehr . 'hrs ' . $workingtimemin . 'mins' : '' ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= ($resttime != 0)? $resttime . 'mins': ''?></td>
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
                                                        if (($totalworkingmin - $resttime) < 0) {
                                                            $totalworkingmin = 60 + $totalworkingmin - $resttime;
                                                            $totalworkinghr -= 1;
                                                        } else {
                                                            $totalworkingmin = $totalworkingmin - $resttime;
                                                        }
                                                    }

                                                    if ($countrecords == 0){ ?>
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

                                                    <?php  
                                                    $counter2++;  
                                                    }
                                                    ?>
                                                    <!-- INSERT TOTAL WORKING TIME -->
                                                    <script>
                                                        if (<?=$noloop?>){
                                                            var $table2 = $('#myTable2');
                                                            var $row = $table2.find("td:contains('<?php echo $row['username']; ?>')").closest("tr");
                                                            if (<?=$totalworkinghr?> != 0 || <?=$totalworkingmin?> != 0){
                                                                $row.find("td:nth-last-child(2)").text("<?=$totalworkinghr . "hrs " . $totalworkingmin . "mins"?>");
                                                                if (<?=$totaltravelhr?> != 0 || <?=$totaltravelmin?> != 0)
                                                                    $row.find("td:last-child").text("<?=$totaltravelhr . "hrs " . $totaltravelmin . "mins"?>");
                                                                if (<?=$totalworkinghr?> < 6){
                                                                    $row.find("td").css("color", "red");
                                                                }
                                                            }else{
                                                                $row.find("td").css("color", "red");
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

                                    <script>
                                    $(document).ready(function() {
                                        var previousName = null;
                                        var count = 1;
                                        var index2;
                                        
                                        $("#tbody2 tr").each(function(index) {
                                            index2 = index;
                                            
                                            var currentName = $(this).find("td:eq(1)").text();
                                            
                                            if (previousName !== currentName) {
                                                if (count > 1) {
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(1)").attr("rowspan", count);
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(4)").attr("rowspan", count);
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(6)").attr("rowspan", count);
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(7)").attr("rowspan", count);


                                                }
                                                
                                                count = 1;
                                                
                                                previousName = currentName;
                                            }
                                            
                                            else {
                                                count++;
                                                
                                                $(this).find("td:eq(1)").hide();
                                                $(this).find("td:eq(4)").hide();
                                                $(this).find("td:eq(6)").hide();
                                                $(this).find("td:eq(7)").hide();

                                            }
                                        });
                                        
                                        if (count > 1){
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(1)").attr("rowspan", count);
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(4)").attr("rowspan", count);
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(6)").attr("rowspan", count);
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(7)").attr("rowspan", count);
                                        }
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
                                                
                                                $sql = "SELECT * FROM tech_update WHERE techupdate_date='$DateAssign'";
                                                
                                                $result = mysqli_query($conn, $sql);
                                                
                                                if(mysqli_num_rows($result) > 0) {
                                                    $counter = 1;
                                                    
                                                    foreach($result as $row) {
                                                        $username = $row['username'];   
                                                        $usernamesArray = explode(",", $username);
                                                        $formattedUsernames = '';
                                                        foreach ($usernamesArray as $name) {
                                                            $formattedUsernames .= $name . "\n";
                                                        }
                                        ?>
                                
                                        <tr>
                                            <td style='text-align: center; white-space: nowrap;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap;'><?php echo $row["tech_leader"]; ?></td>
                                            <td style='text-align: center;'><?= $formattedUsernames?></td>
                                            <td style='text-align: center; white-space: nowrap;'><pre class="pre"><?php echo $row["tech_clockin"]; ?></pre></td>
                                            <td style='text-align: center; white-space: nowrap;'><pre class="pre"><?php echo $row["tech_clockout"]; ?></pre></td>
                                            <td style='text-align: center; white-space: nowrap;'><pre class="pre"><?php echo $row["technician_out"]; ?></pre></td>
                                            <td style='text-align: center; white-space: nowrap;'><pre class="pre"><?php echo $row["technician_in"]; ?></pre></td>
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