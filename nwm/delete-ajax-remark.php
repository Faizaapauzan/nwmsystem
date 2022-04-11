<?php 
include "dbconnect.php";

$id = 0;
if(isset($_POST['id'])){
   $id = mysqli_real_escape_string($conn,$_POST['id']);
}
if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM technician_remark WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM technician_remark WHERE id=".$id;
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