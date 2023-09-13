<?php
    
    require 'dbconnect.php';
    
    // ========== View Info ==========
    if(isset($_GET['servicereport_id'])) {
        
        $servicereport_id = mysqli_real_escape_string($conn, $_GET['servicereport_id']);
        
        $query = "SELECT * FROM job_register INNER JOIN servicereport ON job_register.jobregister_id = servicereport.jobregister_id  WHERE servicereport.servicereport_id='$servicereport_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            
            $student = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Entry Fetch Successfully by id', 'data' => $student];
            
            echo json_encode($res);
            
            return;
        }
    
        else {
            
            $res = ['status' => 404, 'message' => 'Entry Id Not Found'];
            
            echo json_encode($res);
            
            return;
        }
    }

    // ========== View Media ==========
    if(isset($_GET['jobregister_id'])) {
        
        $jobregister_id = mysqli_real_escape_string($conn, $_GET['jobregister_id']);
        
        $query = "SELECT * FROM technician_photoupdate WHERE jobregister_id='$jobregister_id'";
        
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) == 1) {
            $photo = mysqli_fetch_assoc($query_run);

            if (!empty($photo['file_name'])) {
                $photoPath =$photo['file_name'];
                $photo['file_name'] = $photoPath;
            } 
            
            else {
                $photo['file_name'] = null;
            }
            
            $res = ['status' => 200, 'message' => 'Photo Fetch Successfully by id', 'data' => $photo];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'No photo for this job'];
            echo json_encode($res);
            return;
        }
    }

    // ========== Delete ==========
    if(isset($_POST['delete_report'])) {
        $servicereport_id = mysqli_real_escape_string($conn, $_POST['servicereport_id']);
        
        $query = "DELETE FROM servicereport WHERE servicereport_id='$servicereport_id'";
        
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