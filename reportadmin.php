<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
  height: 21cm;
  overflow: hidden;
}

tbody {
  counter-reset: Serial;   
}

tr td:first-child:before {
  counter-increment: Serial;      
	content: counter(Serial) "."; 
  padding-left: 5px;
  padding: 5px;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}


</style>

<body>
  <div class="text-center">
    <button onclick="window.print();" class="btn btn-primary" id="print-btn" style="margin: 20px;">Print</button>
    </div>
    
    

    <div class="my-5 page" size="A4">
    <div class="status" style="margin: 20px;">
    Worker Assignment
    <br/>
    Date : <input type="text" value="<?php echo $date = date('d-m-Y'); ?>">
    </div>

    <div class="remarks-job" style="margin-top: 27px; margin: 20px;">
    Remark - Total Workers:
    <div class="job-update" style="margin-top: 20px; margin: 20px;">
    <table style="width:100%">

        <thead style="height: 42px;">
            <th></th>
            <th style="width: 10%;">Leader</th>
            <th style="width: 12%;">Assistant</th>
            <th style="width: 15%;">Place</th>
            <th style="width: 32%;">Machine</th>
            <th style="width: 5%;">Departure</th>
            <th style="width: 5%;">Arrival</th>
            <th style="width: 5%;">Leaving</th>
            <th style="width: 5%;">Work Time</th>
            <th style="width: 5%;">Travel Time</th>
        </thead>

            <?php
                include_once 'dbconnect.php';

                $sql = "SELECT * FROM job_register WHERE DateAssign='$date'";
                $result = mysqli_query($conn, $sql);

                if ($result){
                  // output data of each row
                  while ($row = mysqli_fetch_array($result)) {

                  $technician_departure =$row['technician_departure'];
                  $technician_arrival =$row['technician_arrival'];
                  $technician_leaving =$row['technician_leaving'];
                  $departure = substr($technician_departure,11);
                  $arrival = substr($technician_arrival,11); 
                  $leaving = substr($technician_leaving,11);

                  if (!function_exists('difftime'))   {
                    function difftime($techniciandeparture, $technicianarrival)  {
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

                if (!function_exists('difftime2'))   {
                  function difftime2($technicianarrival, $technicianleaving)  {
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

        <tbody>
            <td></td>
            <td><?php echo $row["job_assign"]; ?></td>
            <td></td>
            <td><?php echo $row["customer_name"]; ?></td>
            <td><?php echo $row["machine_type"]; ?> - <?php echo $row["job_name"]; ?></td>
            <td><?php echo "$departure" ?></td>
            <td><?php echo "$arrival" ?></td>
            <td><?php echo "$leaving" ?></td>
            <td><?php echo difftime($arrival, $leaving)['h']?>   hours <?php echo difftime($arrival, $leaving)['m']?>  minutes</td>
            <td><?php echo difftime($departure, $arrival)['h']?>   hours <?php echo difftime($departure, $arrival)['m']?>  minutes</td>
            
        </tbody>
        <?php } } ?>

    </table>
       </div>
    </div>
<div class="remarks-worker" style="margin: 20px;padding-top: 102px;">
    Remark - Workers Attendance

    <div class="staff-update" style="margin-top: 50px; margin: 20px;">
    <table style="width:100%">
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

                $sql = "SELECT * FROM tech_update WHERE techupdate_date='$date'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
            ?>

        <tbody>
            <td></td>
            <td><?php echo $row["tech_leader"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["tech_clockin"]; ?></td>
            <td><?php echo $row["tech_clockout"]; ?></td>
            <td><?php echo $row["tech_out"]; ?></td>
            <td><?php echo $row["tech_in"]; ?></td>
        </tbody>
        <?php } } ?>
    </table>
        </div>
    </div>

    </div>