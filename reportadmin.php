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
                            <table class="table table-bordered border-dark">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'></th>
                                        <th style='text-align: center;'>Leader</th>
                                        <th style='text-align: center;'>Assistant</th>
                                        <th style='text-align: center;'>Place</th>
                                        <th style='text-align: center;'>Machine</th>
                                        <th style='text-align: center;'>Departure</th>
                                        <th style='text-align: center;'>Arrival</th>
                                        <th style='text-align: center;'>Leaving</th>
                                        <th style='text-align: center; white-space: nowrap;'>Work Time</th>
                                        <th style='text-align: center; white-space: nowrap;'>Travel Time</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="tbody">
                                    <?php
                                        
                                        include_once 'dbconnect.php';
                                        
                                        if(isset($_GET['DateAssign'])) {
                                            $DateAssign = $_GET['DateAssign'];
                                            
                                            $query = mysqli_query($conn, "SELECT * FROM job_register LEFT JOIN assistants ON job_register.jobregister_id=assistants.jobregister_id WHERE job_register.DateAssign='$DateAssign' AND job_register.job_cancel = '' OR job_register.DateAssign='$DateAssign' AND job_register.job_cancel IS NULL ORDER BY job_assign ASC, departure_timestamp ASC");
                                            
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
                                                            $dif['m'] = floor($TravelTime/(60) % 60 ); //minute
                                                            $dif['h'] = floor($TravelTime/(60*60)); //hour
                                                        
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
                                                            $dif['m'] = floor($WorkTime/(60) % 60 ); //minute
                                                            $dif['h'] = floor($WorkTime/(60*60)); //hour
                                                                
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
                                        <td style="text-align: center; white-space: nowrap; vertical-align: middle;"><?= $row['job_assign']; ?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?=$formattedUsernames; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['customer_name']; ?></td>
                                        <td style="vertical-align: middle;"><?= $row['machine_type']; ?> - <?= $row['job_description']; ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo "$departure" ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo "$arrival" ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?php echo "$leaving" ?></td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                            <span class="hours-print"><?php echo($wh != '' && $wm != '') ? $wh . ' hrs ': '';?></span>
                                            <span class="minutes-print"><?php echo($wh != '' && $wm != '') ? $wm . ' mins ': '';?></span>
                                        </td>
                                        <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                            <span class="hours-print"><?php  echo ($th != '' && $tm != '') ? $th . ' hrs ': '';?></span>
                                            <span class="minutes-print"><?php  echo ($th != '' && $tm != '') ? $tm . ' mins ': '';?></span>
                                        </td>
                                    </tr>
                                    
                                    <?php $counter++;  
                                                } 
                                            }
                                            
                                            else {
                                                echo '<tbody><tr><td colspan="10" style="text-align: center;">No Record Found</td></tr></tbody>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            
                            <script type="text/javascript">
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
                                    
                                    if (count > 1) {
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

                                                $staff_query = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader'
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
                                                        if ($row['username'] == $record['job_assign']){
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
                                                            $TravelTimemin = (difftime($record['technician_arrival'], $record['technician_departure'])['m'] <= 24) ?
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
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= ($workingtimehr != 0 && $workingtimemin != 0) ? $workingtimehr . 'hrs ' . $workingtimemin . 'mins' : '' ?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $resttime . 'mins'?></td>
                                            <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= ($TravelTimehr != 0 && $TravelTimemin != 0) ? $TravelTimehr . 'hrs ' . $TravelTimemin . 'mins' : '' ?></td>
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
                                                    if (($totalworkinghr == 0 && $totalworkingmin > 0) || ($totalworkinghr > 0 && $totalworkingmin == 0)){
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
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(5)").attr("rowspan", count);
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(6)").attr("rowspan", count);
                                                    $("#tbody2 tr:eq(" + (index - count) + ") td:eq(7)").attr("rowspan", count);


                                                }
                                                
                                                count = 1;
                                                
                                                previousName = currentName;
                                            }
                                            
                                            else {
                                                count++;
                                                
                                                $(this).find("td:eq(1)").hide();
                                                $(this).find("td:eq(5)").hide();
                                                $(this).find("td:eq(6)").hide();
                                                $(this).find("td:eq(7)").hide();

                                            }
                                        });
                                        
                                        if (count > 1){
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(1)").attr("rowspan", count);
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(5)").attr("rowspan", count);
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(6)").attr("rowspan", count);
                                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(7)").attr("rowspan", count);
                                        }
                                    });
                                </script>
                                </table>
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
                                                echo "No Record Found";
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
                                                echo "No Record Found";
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