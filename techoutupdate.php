<?php

    include 'dbconnect.php';
    
    $tech_out = $jobregister_id = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $tech_out = $conn->real_escape_string($_POST['tech_out']);
      $jobregister_id = $conn->real_escape_string($_POST['jobregister_id']);
      
      $query = "UPDATE job_register SET tech_out='$tech_out' WHERE jobregister_id='$jobregister_id'";
      if ($conn->query($query) === TRUE) {
        echo json_encode(array("status" => "success"));
      } 
      
      else {
        echo json_encode(array("status" => "error", "message" => $conn->error));
      }
    }
    
    $conn->close();

?>
