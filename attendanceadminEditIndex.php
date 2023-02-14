<?php
    
    include 'dbconnect.php';
    
    if (isset($_POST['update'])) {
        
        $techupdate_id = $_POST['techupdate_id'];
        $tech_leader = $_POST['tech_leader'];
        
        $query = "UPDATE tech_update SET tech_leader = ? WHERE techupdate_id = ?";
        
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $tech_leader, $techupdate_id);
        mysqli_stmt_execute($stmt);
    
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo '<script> alert("Data Updated"); </script>';
            header("location:attendanceadmin.php");
        } 
        
        else {
            echo '<script> alert("Data Not Updated"); </script>';
        }
        
        mysqli_stmt_close($stmt);
    }
    
?>