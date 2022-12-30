<?php
    
    include 'dbconnect.php';
    
    $technician_out = $tech_leader = $techupdate_date = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $technician_out = $conn->real_escape_string($_POST['technician_out']);
      $tech_leader = $conn->real_escape_string($_POST['tech_leader']);
      $techupdate_date = $conn->real_escape_string($_POST['techupdate_date']);
      
      $query = "UPDATE tech_update SET technician_out='$technician_out' WHERE tech_leader='$tech_leader' AND techupdate_date='$techupdate_date'";
      if ($conn->query($query) === TRUE) {
        echo json_encode(array("status" => "success"));
      }
      
      else {
        echo json_encode(array("status" => "error", "message" => $conn->error));
      }
    }
    
    $conn->close();

?>
