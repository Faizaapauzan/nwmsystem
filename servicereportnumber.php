<?php

    include 'dbconnect.php';

    $m=date('m');
    $y=date('y');
    $year = date('Y');

    $sql = mysqli_query($conn, "SELECT MAX(srvcreportnumber) AS max_code FROM servicereport WHERE month(today_date_report)='$m' AND year(today_date_report)='$year'");
    $data = mysqli_fetch_array($sql);
    $code = $data['max_code'];
    $i = (int)substr($code, 7, 3);
    $i++;

    $srvcreportnumber = "S".$y.$m."-".sprintf("%03s",$i);
    
    echo $srvcreportnumber;
    
?>




