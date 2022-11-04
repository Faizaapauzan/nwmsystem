<?php

include 'dbconnect.php';

$response = array('success' => false);

	$result = mysqli_query($conn,"SELECT count(*) FROM tech_update WHERE tech_leader='" . $_POST["tech_leader"] . "' AND techupdate_date='" . $_POST["techupdate_date"] . "'");
	$row = mysqli_fetch_row($result);
	$tech_leader_count = $row[0];
	if($tech_leader_count>0) echo "<span style='color:red'> You Already Submit the Attendance </span>";
	

	else

    {
    if (isset($_POST['tech_leader']) && $_POST['tech_leader']!='' || $_POST['tech_leader']==''
        &&
       isset($_POST['techupdate_date']) && $_POST['techupdate_date']!='' || $_POST['techupdate_date']=='') {
        $sql = "INSERT INTO tech_update (tech_leader, techupdate_date) 
                       
                       VALUES ('".addslashes($_POST['tech_leader'])."',
                               '".addslashes($_POST['techupdate_date'])."') LIMIT 1";

        if ($conn->query($sql)) {
            $response['success'] = true;
        }
    }

    echo json_encode($response);
}
?>