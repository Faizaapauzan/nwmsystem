<?php

    include 'dbconnect.php';
  
    $m=date('m');
    $y=date('y');
    $year = date('Y');

    $sql = mysqli_query($conn, "SELECT MAX(job_order_number) AS max_code FROM job_register WHERE month(today_date)='$m' AND year(today_date)='$year'");
    $data = mysqli_fetch_array($sql);
    $code = $data['max_code'];
    $i = (int)substr($code, 7, 3);
    $i++;
    
    $job_order_number = "J-".$y.$m."-".sprintf("%03s",$i);

    echo $job_order_number;

?>