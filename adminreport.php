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
                            
                            <!-- Worker Assignment -->
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
                                    
                                    <tbody id="tbody">
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
                                                        $technician_departure = $row['technician_departure'] ? DateTime::createFromFormat('m/d/Y h:i A', $row['technician_departure']) : null;
                                                        $technician_arrival = $row['technician_arrival'] ? DateTime::createFromFormat('m/d/Y h:i A', $row['technician_arrival']) : null;
                                                        $technician_leaving = $row['technician_leaving'] ? DateTime::createFromFormat('m/d/Y h:i A', $row['technician_leaving']) : null;
                                                        
                                                        $departure = $technician_departure ? $technician_departure->format('h:i A') : '';
                                                        $arrival = $technician_arrival ? $technician_arrival->format('h:i A') : '';
                                                        $leaving = $technician_leaving ? $technician_leaving->format('h:i A') : '';
                                                        
                                                        $workingTime = $technician_leaving && $technician_arrival ? $technician_leaving->diff($technician_arrival) : null;
                                                        $travelTime = $technician_arrival && $technician_departure ? $technician_arrival->diff($technician_departure) : null;
                                                        
                                                        $wh = $workingTime ? $workingTime->h : '';
                                                        $wm = $workingTime ? $workingTime->i : '';
                                                        $th = $travelTime ? $travelTime->h : '';
                                                        $tm = $travelTime ? $travelTime->i : '';
                                        ?>
                                        <tr>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><?= $counter; ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><?= $row['job_assign']; ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= nl2br($row['username']); ?></td>
                                            <td style="vertical-align: middle;"><?= $row['customer_name']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['machine_type']; ?> - <?= $row['job_description']; ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><?= $departure; ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= $arrival; ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= $leaving; ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '>
                                                <?= $wh !== '' || $wm !== '' ? "{$wh} hrs {$wm} mins" : ''; ?>
                                            </td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '>
                                                <?= $th !== '' || $tm !== '' ? "{$th} hrs {$tm} mins" : ''; ?>
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

                            <!-- Total Working Time -->
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
                                            
                                            include_once 'dbconnect.php';
                                            
                                            $DateAssign = $_GET['DateAssign'] ?? date('Y-m-d');
                                            
                                            $technicians = [];
                                            
                                            $staff_query = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' AND tech_avai = 0 ORDER BY username ASC");
                                            
                                            while ($staff = mysqli_fetch_assoc($staff_query)) {
                                                $technicians[$staff['username']] = ['total_working_time' => 0, 'total_travel_time' => 0, 'details' => []];
                                            }
                                            
                                            $job_query = mysqli_query($conn, "SELECT * FROM job_register WHERE DateAssign='$DateAssign' AND job_assign != '' AND job_cancel IS NULL");
                                            
                                            while ($job = mysqli_fetch_assoc($job_query)) {
                                                $tech_username = $job['job_assign'];
                                                
                                                $technician_departure = $job['technician_departure'] ? DateTime::createFromFormat('n/j/Y g:i A', $job['technician_departure']) : null;
                                                $technician_arrival = $job['technician_arrival'] ? DateTime::createFromFormat('n/j/Y g:i A', $job['technician_arrival']) : null;
                                                $technician_leaving = $job['technician_leaving'] ? DateTime::createFromFormat('n/j/Y g:i A', $job['technician_leaving']) : null;
                                                $tech_out = $job['tech_out'] ? DateTime::createFromFormat('g:i A', $job['tech_out']) : null;
                                                $tech_in = $job['tech_in'] ? DateTime::createFromFormat('g:i A', $job['tech_in']) : null;
                                                
                                                $workingTime = $technician_leaving && $technician_arrival ? $technician_leaving->diff($technician_arrival) : null;
                                                $restTime = $tech_in && $tech_out ? $tech_in->diff($tech_out) : null;
                                                $travelTime = $technician_arrival && $technician_departure ? $technician_arrival->diff($technician_departure) : null;
                                                
                                                $workingMinutes = $workingTime ? ($workingTime->h * 60 + $workingTime->i) : 0;
                                                $restMinutes = $restTime ? ($restTime->h * 60 + $restTime->i) : 0;
                                                $travelMinutes = $travelTime ? ($travelTime->h * 60 + $travelTime->i) : 0;
 
                                                $technicians[$tech_username]['total_working_time'] += $workingMinutes;
                                                $technicians[$tech_username]['total_travel_time'] += $travelMinutes;
                                                
                                                $technicians[$tech_username]['details'][] = ['place' => $job['customer_name'],
                                                                                             'working_time' => $workingTime ? $workingTime->format('%h hrs %i mins') : '',
                                                                                             'rest_time' => $restTime ? $restTime->format('%h hrs %i mins') : '',
                                                                                             'travel_time' => $travelTime ? $travelTime->format('%h hrs %i mins') : ''];
                                            }
                                            
                                            $counter2 = 1;
                                            
                                            foreach ($technicians as $username => $tech_data) {
                                                if (empty($tech_data['details'])) {
                                        ?>
                                        <tr>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= $counter2 ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= htmlspecialchars($username) ?></td>
                                            <td style='text-align: center; vertical-align: middle;'></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '></td>
                                        </tr>
                                        <?php
                                                    $counter2++;
                                                }

                                                else {
                                                    foreach ($tech_data['details'] as $index => $detail) {
                                        ?>
                                        <tr>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= $counter2 ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= htmlspecialchars($username) ?></td>
                                            <td style='text-align: center; vertical-align: middle;'><?= htmlspecialchars($detail['place']) ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= htmlspecialchars($detail['working_time']) ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= htmlspecialchars($detail['rest_time']) ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= htmlspecialchars($detail['travel_time']) ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= formatMinutes($tech_data['total_working_time']) ?></td>
                                            <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= formatMinutes($tech_data['total_travel_time']) ?></td>
                                        </tr>
                                        <?php
                                                       $counter2++; 
                                                    }
                                                }
                                            }

                                            function formatMinutes($minutes) {
                                                if ($minutes == 0) {

                                                    return '';
                                                }

                                                $hours = floor($minutes / 60);
                                                $mins = $minutes % 60;
                                                
                                                return "{$hours} hrs {$mins} mins";
                                            }
                                        ?>
                                    </tbody>
                                </table>

                                <!-- Script to change font color -->
                                <script>
                                    $(document).ready(function() {
                                        $("#myTable2 tbody tr").each(function() {
                                            var $this = $(this);
                                            var totalWorkingTimeText = $this.find("td:nth-last-child(3)").text();
                                            var totalTravelTimeText = $this.find("td:nth-last-child(1)").text();
                                            var restTimeText = $this.find("td:nth-child(5)").text();
                                            
                                            function toMinutes(timeText) {
                                                var parts = timeText.match(/(\d+)\s*hrs\s*(\d+)\s*mins/);
                                                
                                                return parts ? (parseInt(parts[1]) * 60 + parseInt(parts[2])) : 0;
                                            }
                                            
                                            var totalWorkingMinutes = toMinutes(totalWorkingTimeText);
                                            var totalTravelMinutes = toMinutes(totalTravelTimeText);
                                            var restMinutes = toMinutes(restTimeText);
                                            
                                            if ((totalWorkingMinutes + totalTravelMinutes - restMinutes) < 480) {
                                                $this.find("td").css("color", "red");
                                            }
                                        });
                                    });
                                </script>

                                <!-- Script to Merge cell -->
                                <script>
                                    $(document).ready(function() {
                                        var previousName = null;
                                        var count = 1;
                                        
                                        $("#tbody2 tr").each(function(index) {
                                            var currentName = $(this).find("td:eq(1)").text();
                                            var restTimeCell = $(this).find("td:eq(4)");
                                            var restTimeValue = restTimeCell.text();
                                            var isFirstInstanceOfName = currentName !== previousName;
                                            var isLastRow = index + 1 === $("#tbody2 tr").length;
                                            
                                            if (isFirstInstanceOfName && previousName !== null && count > 1) {
                                                var firstRow = $("#tbody2 tr").eq(index - count);
                                                
                                                    firstRow.find("td:eq(1)").attr("rowspan", count);
                                                    firstRow.find("td:eq(4)").attr("rowspan", count);
                                                    firstRow.find("td:eq(6)").attr("rowspan", count);
                                                    firstRow.find("td:eq(7)").attr("rowspan", count);
                                                    
                                                count = 1;
                                            }
                                            
                                            if (currentName === previousName) {
                                                count++;
                                                
                                                $(this).find("td:eq(1)").hide();
                                                restTimeCell.hide();
                                                $(this).find("td:eq(6)").hide();
                                                $(this).find("td:eq(7)").hide();
                                            }
                                            
                                            else {
                                                previousName = currentName;
                                            }
                                            
                                            if (isLastRow && count > 1) {
                                                var lastFirstRow = $("#tbody2 tr").eq(index - count + 1);
                                                
                                                    lastFirstRow.find("td:eq(1)").attr("rowspan", count);
                                                    lastFirstRow.find("td:eq(4)").attr("rowspan", count);
                                                    lastFirstRow.find("td:eq(6)").attr("rowspan", count);
                                                    lastFirstRow.find("td:eq(7)").attr("rowspan", count);
                                            }
                                        });
                                        
                                        $("#tbody2 tr").each(function() {
                                            var restTimeCell = $(this).find("td:eq(4)");
                                            var restTimeValue = restTimeCell.text();
                                            
                                            if (restTimeValue.startsWith("0 hrs") && !restTimeCell.is(':visible')) {
                                                $(this).prevAll("tr:has(td[rowspan]):first").find("td:eq(4)").text(restTimeValue);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                            
                            <!-- Attendance And Rest Time -->
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