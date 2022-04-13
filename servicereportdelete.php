<?php 
include "dbconnect.php";

$servicereport_id = 0;
if(isset($_POST['servicereport_id'])){
   $servicereport_id = mysqli_real_escape_string($conn,$_POST['servicereport_id']);
}
if($servicereport_id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM servicereport WHERE servicereport_id=".$servicereport_id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM servicereport WHERE servicereport_id=".$servicereport_id;
    mysqli_query($conn,$query);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }
}

echo 0;
exit;