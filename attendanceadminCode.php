<?php

    require 'dbconnect.php';

    // ========== Delete ==========
    if(isset($_POST['delete_attendance'])) {
        $techupdate_id = mysqli_real_escape_string($conn, $_POST['techupdate_id']);
        
        $query = "DELETE FROM tech_update WHERE techupdate_id='$techupdate_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Staff Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Staff Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>