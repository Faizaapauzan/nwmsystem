<?php

    require 'dbconnect.php';
    
    // ========== View ==========
    if(isset($_GET['staffregister_id'])) {
        
        $staffregister_id = mysqli_real_escape_string($conn, $_GET['staffregister_id']);
        
        $query = "SELECT * FROM staff_register WHERE staffregister_id='$staffregister_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $staff = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Staff Fetch Successfully', 'data' => $staff];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Staff ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }

    // ========== Update ==========
    if (isset($_POST['update_technician'])) {
        $staffregister_id = mysqli_real_escape_string($conn, $_POST['staffregister_id']);
        $technician_rank = mysqli_real_escape_string($conn, $_POST['technician_rank']);
        $job_ability = isset($_POST['job_ability']) ? (is_array($_POST['job_ability']) ? implode(',', $_POST['job_ability']) : $_POST['job_ability']) : '';
        $staffregisterlastmodify_by = mysqli_real_escape_string($conn, $_POST['staffregisterlastmodify_by']);
    
        // Use prepared statements to prevent SQL injection
        $query = "UPDATE staff_register SET  
                    technician_rank = ?, 
                    job_ability = ?,
                    staffregisterlastmodify_by = ?
                  WHERE staffregister_id = ?";
        
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $technician_rank, $job_ability, $staffregisterlastmodify_by, $staffregister_id);
        
        if (mysqli_stmt_execute($stmt)) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Technician Info Updated Successfully!</span>'];
            
            // Retrieve the updated data and send it back to the client
            $updatedData = [
                'technician_rank' => $technician_rank,
                'job_ability' => $job_ability,
                'staffregisterlastmodify_by' => $staffregisterlastmodify_by
            ];
            $res['data'] = $updatedData;
        } else {
            $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Technician Info Not Updated</span>'];
        }
        
        mysqli_stmt_close($stmt);
        
        echo json_encode($res);
    }
?>