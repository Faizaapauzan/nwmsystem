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
            $res = ['status' => 200, 'message' => 'Leave Recorded Successfully!'];
            
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
            $res = ['status' => 200, 'message' => 'Record Deleted Successfully'];

            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Record Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }

    // ========== Update (for technician) ==========
    if (isset($_POST['update_record'])) {
        $techOFF_id = $_POST['techOFF_id'];
        $leave_date = $_POST['date'];
        $reason = $_POST['reason'];
    
        $query = "UPDATE tech_off SET leave_date=?, reason=? WHERE techOFF_id=?";
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssi', $leave_date, $reason, $techOFF_id);
            $result = mysqli_stmt_execute($stmt);
    
            if ($result) {
                $res = ['status' => 200,
                        'message' => 'Updated Successfully!'];
    
                echo json_encode($res);
            } 
            
            else {
                $res = ['status' => 500,
                        'message' => 'Error updating record: ' . mysqli_error($conn)];
    
                echo json_encode($res);
            }
    
            mysqli_stmt_close($stmt);
        } 
        
        else {
            $res = ['status' => 500,
                    'message' => 'Error preparing statement: ' . mysqli_error($conn)];
    
            echo json_encode($res);
        }
    }
    
    mysqli_close($conn);
?>