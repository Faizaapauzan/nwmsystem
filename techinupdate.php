<?php
  
  include 'dbconnect.php';
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $technician_in = $_POST["technician_in"];
    $tech_leader = $_POST["tech_leader"];
    $techupdate_date = $_POST["techupdate_date"];
    
    $sql = "UPDATE tech_update SET technician_in = ? WHERE tech_leader = ? AND techupdate_date = ?";
    
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("sss", $technician_in, $tech_leader, $techupdate_date);
      
      if ($stmt->execute()) {
        echo "success";
      } 
      
      else {
        echo "Error: " . $stmt->error;
      }
      
      $stmt->close();
    } 
    
    else {
      echo "Error: " . $conn->error;
    }
  }
  
?>
