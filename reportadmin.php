<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Report Admin</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
        
        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap");

        ::-webkit-scrollbar {display: none;}

        :root {
            --body-bg: rgb(204, 204, 204);
            --white: #ffffff;
            --darkWhite: rgb(0, 0, 0);
            --themeColor: #ffffff;
        }
        
        @media print {
            .hours-print,
            .minutes-print {
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
            }

            @page {
                size: landscape;
            }
        }

        @media screen {
            .hours-print,
            .minutes-print {
                display: inline;
            }
        }

        table .table-responsive {
            page-break-inside: avoid;
        }

        .pre{
            font-family: var(--body-font);
        }
    </style>
        
    <body>
        <div class="card border border-white">
            <div class="card-body">
                <div class="page mt-3 mb-3">
                    <form method="GET">
                        <div class="d-grid d-flex gap-2">
                            <h4 class="fw-bold">Worker Assignment</h4>
                            <button type="button" class="btn btn-outline-secondary pb-0 pt-0 mt-1" style="height:min-content;" id="print-btn" onclick="window.print();">Print</button>
                        </div>
                        
                        <p class="fw-bold mt-3">Date: <?php if(isset($_GET['DateAssign'])){echo $_GET['DateAssign'];} else { echo $date = date('d-m-Y'); } ?></p>
                        
                        <div class="table-responsive mb-3">
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
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= $wh !== '' || $wm !== '' ? "{$wh} hrs {$wm} mins" : ''; ?></td>
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap; '><?= $th !== '' || $tm !== '' ? "{$th} hrs {$tm} mins" : ''; ?></td>
                                    </tr>
                                    <?php
                                                    $counter++;  
                                                }
                                            }
                                            
                                            else {
                                                echo '<tbody><tr><td colspan="10" style="text-align: center;">No Record Found</td></tr></tbody>';
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
                                            
                                        if (((totalWorkingMinutes + totalTravelMinutes) - restMinutes) < 480) {
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
                        
                        <div class="table-responsive mb-3">
                            <label for="" class="fw-bold mb-3">Technician Attendance and Rest Time</label>
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th></th>
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
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><?= $counter ?></td>
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><?php echo $row["tech_leader"]; ?></td>
                                        <td style='text-align: center; vertical-align: middle;'><pre class="pre"><?= $formattedUsernames; ?></pre></td>
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><pre class="pre"><?php echo $row["tech_clockin"]; ?></pre></td>
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><pre class="pre"><?php echo $row["tech_clockout"]; ?></pre></td>
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><pre class="pre"><?php echo $row["technician_out"]; ?></pre></td>
                                        <td style='text-align: center; vertical-align: middle; white-space: nowrap;'><pre class="pre"><?php echo $row["technician_in"]; ?></pre></td>
                                    </tr>
                                    
                                    <?php   
                                        
                                        $counter++;  
                                                }   
                                            }
                                            
                                            else {
                                                echo '<tbody><tr><td colspan="10" style="text-align: center;">No Record Found</td></tr></tbody>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="table-responsive mb-3">
                            <label for="" class="fw-bold mb-3">Technician On Leave</label>
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center;">Technician</th>
                                        <th></th>
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
                                        <td style="text-align: center;"><?= $counter ?></td>
                                        <td style="text-align: center;"><?= $row['tech_name']; ?></td>
                                        <td style="text-align: center; color:red" class="fw-bold">OFF</td>
                                    </tr>
                                    
                                    <?php  
                                        
                                        $counter++;  
                                                }
                                            }
                                            
                                            else {
                                                echo '<tbody><tr><td colspan="10" style="text-align: center;">No Record Found</td></tr></tbody>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>