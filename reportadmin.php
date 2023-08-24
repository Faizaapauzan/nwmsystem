<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
    <title>Report Admin</title>
</head>

<style>
    :root {
        --body-bg: rgb(204, 204, 204);
        --white: #ffffff;
        --darkWhite: rgb(0, 0, 0);
        --themeColor: #ffffff;
    }

    /* Font Include */
    @import url("https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap");

    .page {
        /* background: var(--white); */
        display: block;
        margin: 0 auto;
        position: relative;
    }

    .page[size="A4"] {
        width: 29.7cm;
        height: auto;
        overflow: hidden;
    }

    #auto {
        counter-reset: rowNumber;
    }

    #auto tr>td:first-child {
        counter-increment: rowNumber;
    }

    #auto tr td:first-child::before {
        content: counter(rowNumber);
        min-width: 1em;
        margin-right: 0.5em;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    .infoarea {
        writing-mode: horizontal-tb !important;
        font-family: Arial;
        font-size: 13px;
        font-weight: 500;
        text-rendering: auto;
        display: inline-block;
        line-height: 17px;
        text-align: start;
        cursor: text;
        width: 136px;
        height: 43px;
        padding: 1px 2px;
        border-width: 0px;
        resize: none;
    }

    .differenttime {
        writing-mode: horizontal-tb !important;
        font-family: Arial;
        font-size: 13px;
        font-weight: 500;
        text-rendering: auto;
        display: inline-block;
        line-height: 17px;
        text-align: start;
        cursor: text;
        width: 74px;
        height: 35px;
        padding: 1px 2px;
        border-width: 0px;
        resize: none;
    }

    .assistantarea {
        writing-mode: horizontal-tb !important;
        font-family: Arial;
        font-size: 13px;
        font-weight: 500;
        text-rendering: auto;
        display: inline-block;
        line-height: 17px;
        text-align: start;
        cursor: text;
        width: 136px;
        height: 27px;
        padding: 1px 2px;
        border-width: 0px;
        resize: none;
    }
</style>

<body>
    <div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn" style="margin: 20px;">Print</button>
    </div>
    <div class="my-5 page" size="A4">
        <div class="status" style="margin: 20px;font-weight: bold;">Worker Assignment<br />
        </div>
        <form action="" method="GET">
            <div class="CodeDropdown" style="margin-right: 20px;margin-left: 21px; display: flex; align-items: center;" >
                <label for="date" class="details" style="padding-right: 10px;">Date:</label>
                <p><?php if(isset($_GET['DateAssign'])){echo $_GET['DateAssign'];} else { echo $date = date('d-m-Y'); } ?></p>
            </div>

            <!-- Job Update Time -->
            <div class="remarks-job" style="margin-top: 27px; margin: 20px;">
                <b>Job Update Time</b>
                <div class="job-update" style="margin-top: 20px; margin: 20px;">
                    <table id="auto" style="width:100%">
                        <thead style="height: 42px;">
                            <th style="width: 3%;"></th>
                            <th style="width: 8%;">Leader</th>
                            <th style="width: 10%;">Assistant</th>
                            <th style="width: 15%;">Place</th>
                            <th style="width: 27%;">Machine</th>
                            <th style="width: 7%;">Departure</th>
                            <th style="width: 7%;">Arrival</th>
                            <th style="width: 7%;">Leaving</th>
                            <th style="width: 9%;">Work Time</th>
                            <th style="width: 9%;">Travel Time</th>
                        </thead> 
                        <tbody id = "tbody">
                            <?php
                                include_once 'dbconnect.php';
                                
                                if(isset($_GET['DateAssign']))
                                    {
                                        $DateAssign = $_GET['DateAssign'];
                                        $query = mysqli_query($conn, "SELECT * FROM job_register LEFT JOIN assistants ON job_register.jobregister_id=assistants.jobregister_id WHERE job_register.DateAssign='$DateAssign' AND job_register.job_cancel = '' OR job_register.DateAssign='$DateAssign' AND job_register.job_cancel IS NULL ORDER BY job_assign ASC, departure_timestamp ASC");
                                        if(mysqli_num_rows($query) > 0)
                                            {
                                                foreach($query as $row)
                                            {
                                                $currentname = $row['job_assign'];
                                                $technician_departure =$row['technician_departure'];
                                                $technician_arrival =$row['technician_arrival'];
                                                $technician_leaving =$row['technician_leaving'];
                                                $departure = substr($technician_departure,11);
                                                $arrival = substr($technician_arrival,11); 
                                                $leaving = substr($technician_leaving,11);
                                                
                                        if (!function_exists('difftime'))
                                            {
                                                function difftime($techniciandeparture, $technicianarrival)
                                                    {
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
                                                
                                        if (!function_exists('difftime2'))
                                            {
                                                function difftime2($technicianarrival, $technicianleaving)
                                                    {
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
                            ?> 
                        

                            <tr>
                                <td style="text-align: center;"></td>
                                <td><?= $row['job_assign']; ?></td>
                                <td><textarea style="border:none; resize:none;" class="infoarea" id="textarea-container"><?= $row['username']; ?></textarea></td>
                                <td style="padding-left: 7px;"><?= $row['customer_name']; ?></td>
                                <td style="padding-left: 7px;"><?= $row['machine_type']; ?> - <?= $row['job_description']; ?></td>
                                <td style="text-align: center;"><?php echo "$departure" ?></td>
                                <td style="text-align: center;"><?php echo "$arrival" ?></td>
                                <td style="text-align: center;"><?php echo "$leaving" ?></td>
                                <td style="text-align: center;"><?php echo difftime($arrival, $leaving)['h']?> hours <?php echo difftime($arrival, $leaving)['m']?> minutes</td>
                                <td style="text-align: center;"><textarea style="border:none; resize:none; text-align: center;" class="differenttime" id="textarea-container"><?php echo difftime($departure, $arrival)['h']?> hours <?php echo difftime($departure, $arrival)['m']?> minutes</textarea></td>
                            </tr>
                       
                            
                            <?php
                                } }
                                    else
                                        {
                                            echo '<tbody><tr><td colspan="10" style="text-align: center;">No Record Found</td></tr></tbody>';
                                        }
                                    }
                            ?>
                         </tbody> 
                    </table>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {
                        var previousName = null;
                        var count = 1;
                        var index2;

                        $("#tbody tr").each(function(index) {
                            index2 = index;
                            var currentName = $(this).find("td:eq(1)").text();

                            if (previousName !== currentName) {
                                if (count > 1){
                                    $("#tbody tr:eq(" + (index - count) + ") td:eq(1)").attr("rowspan", count);
                                }

                                count = 1;
                                previousName = currentName;
                            } else {
                                count++;
                                $(this).find("td:eq(1)").hide();
                            }
                        });
                        if (count > 1){
                            $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(1)").attr("rowspan", count);
                        }
                    });

                    var $textArea = $("#textarea-container");
                    resizeTextArea($textArea);
                    $textArea.off("keyup.textarea").on("keyup.textarea", function() {
                        resizeTextArea($(this));
                    });
                </script>

            </div>
            <!-- End of Job Update Time -->

            <!-- Technician Attendance And Rest Hour -->
            <div class="remarks-worker" style="margin: 20px;padding-top: 50px; margin-top:-30px">
                <b>Technician Attendance And Rest Hour</b>
                <div class="staff-update" style="margin-top: 50px; margin: 20px;">
                    <table id="auto" style="width:100%">
                        <thead style="height: 42px;">
                            <th style="width: 3%;"></th>
                            <th style="width: 20%;">Leader</th>
                            <th style="width: 20%;">Assistant</th>
                            <th style="width: 10%">Clock In</th>
                            <th style="width: 10%;">Clock Out</th>
                            <th style="width: 10%;">Rest Out</th>
                            <th style="width: 10%;">Rest In</th>
                        </thead> 
                            
                            <?php
                                include_once 'dbconnect.php';
                                
                                if(isset($_GET['DateAssign']))
                                    {
                                        $DateAssign = $_GET['DateAssign'];
                                        $sql = "SELECT * FROM tech_update WHERE techupdate_date='$DateAssign'";
                                        $result = mysqli_query($conn, $sql);
                                
                                        if(mysqli_num_rows($result) > 0)
                                            {
                                                foreach($result as $row)
                                                {
                            ?> 
                        
                        <tbody>
                            <td style="text-align: center;"></td>
                            <td style="padding-left: 7px;"><?php echo $row["tech_leader"]; ?></td>
                            <td><textarea style="border:none; resize:none;" class="assistantarea" id="textarea-container"><?php echo $row["username"]; ?></textarea></td>
                            <td style="text-align: center;"><?php echo $row["tech_clockin"]; ?></td>
                            <td style="text-align: center;"><?php echo $row["tech_clockout"]; ?></td>
                            <td style="text-align: center;"><?php echo $row["technician_out"]; ?></td>
                            <td style="text-align: center;"><?php echo $row["technician_in"]; ?></td>
                        </tbody> 
                            
                            <?php
                                }   }
                                
                                else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                                   
                            ?>

                    </table>
                </div>
            </div>
            <!-- End of Technician Attendance And Rest Hour -->

            <!-- Remark - Absent Technician -->
            <div class="remarks-worker" style="margin: 20px;padding-top: 70px; margin-top:-50px">
                <b>Absent Technician</b>
                <div class="staff-update" style="margin-top: 50px; margin: 20px;">
                    <table id="auto" style="width:100%">
                        <thead style="height: 42px;">
                            <th style="width: 3%;"></th>
                            <th style="width: 20%;">Technician</th>
                            <th style="width: 20%;"></th>
                        </thead> 
                            
                            <?php
                                
                                include_once 'dbconnect.php';
                                
                                if(isset($_GET['DateAssign']))
                                    {
                                        $DateAssign = $_GET['DateAssign'];
                                        $query = mysqli_query($conn, "SELECT * FROM tech_off WHERE leave_date='$DateAssign'");
                                        if(mysqli_num_rows($query) > 0)
                                            {
                                        foreach($query as $row)
                                            { 
                            ?> 
                        
                        <tbody>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"><?= $row['tech_name']; ?></td>
                            <td style="text-align: center; color:red;">OFF</td>
                        </tbody> 
                            
                            <?php
                                } }
                                
                                else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            
                    </table>
                </div>
            </div>
            <!-- End of Remark - Absent Technician -->
    </div>
</body>

</html>