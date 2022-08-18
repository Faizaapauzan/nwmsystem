<?php
    include 'dbconnect.php';
  
        $staffregister_id = $_GET['staffregister_id'];
        $tech_avai = $_GET['tech_avai'];
    
        $query = "UPDATE staff_register
                  SET tech_avai=$tech_avai
                  WHERE staffregister_id=$staffregister_id";
        
        mysqli_query($conn, $query);

        header('location:Adminhomepage.php');  
?>