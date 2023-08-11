<?php

    require 'dbconnect.php';
    
    // ========== Add ==========
    if (isset($_POST['save_record'])) {
        $tech_name = mysqli_real_escape_string($conn, $_POST['tech_name']);
        $reason = mysqli_real_escape_string($conn, $_POST['reason']);
        $leave_dates = $_POST['leave_date'];
        
        $leave_date_array = explode(',', $leave_dates);
        
        foreach ($leave_date_array as $leave_date) {
            $query = "INSERT INTO tech_off (tech_name, reason, leave_date) 
                      VALUES ('$tech_name','$reason','$leave_date')";
                      
            $query_run = mysqli_query($conn, $query);
            
            if (!$query_run) {
                break;
            }
        }
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Leave Recorded Successfully!</span>'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Leave Not Recorded'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_record'])) {
        $techOFF_id = mysqli_real_escape_string($conn, $_POST['techOFF_id']);
        
        $query = "DELETE FROM tech_off WHERE techOFF_id='$techOFF_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Record Deleted Successfully</span>'];

            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Record Not Deleted</span>'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>