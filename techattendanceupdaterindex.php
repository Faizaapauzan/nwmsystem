<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['tech_leader']) && $_POST['tech_leader']!='' || $_POST['tech_leader']==''
    &&
    isset($_POST['techupdate_date']) && $_POST['techupdate_date']!='' || $_POST['techupdate_date']==''
    &&
    isset($_POST['tech_clockin']) && $_POST['tech_clockin']!='' || $_POST['tech_clockin']==''
    &&
   isset($_POST['tech_clockout']) && $_POST['tech_clockout']!='' || $_POST['tech_clockout']==''
    &&
   isset($_POST['techupdate_id']) && $_POST['techupdate_id']!='' || $_POST['techupdate_id']==''
   &&
   isset($_POST['attendancecreated_by']) && $_POST['attendancecreated_by']!='' || $_POST['attendancecreated_by']=='')

    {
        $techLeader = $_POST['tech_leader'];
        $techupdate_date = $_POST['techupdate_date'];
        $newClockin = $_POST['tech_clockin'];
        $newClockout = $_POST['tech_clockout']; 

        $techClockinFromDB = ""; 
        $techClockoutFromDB = "";

        $stmt = mysqli_prepare($conn, "SELECT tech_clockin, tech_clockout FROM tech_update WHERE tech_leader = ? and techupdate_date = ?");
        mysqli_stmt_bind_param($stmt, "ss", $techLeader, $techupdate_date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $techClockinFromDB, $techClockoutFromDB);
        while (mysqli_stmt_fetch($stmt)) {
            $techClockinFromDB .= $newClockin ."\n";
            $techClockoutFromDB .= $newClockout . "\n" ;
        }



        
        $sql = "UPDATE tech_update SET
                       tech_clockin ='".$techClockinFromDB."',
                       tech_clockout ='".$techClockoutFromDB."',
                       attendancecreated_by ='".addslashes($_POST['attendancecreated_by'])."'

                       WHERE tech_leader='".addslashes($_POST['tech_leader'])."'
                       AND techupdate_date='".addslashes($_POST['techupdate_date'])."'";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>