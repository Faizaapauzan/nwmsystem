<?php
    require 'dbconnect.php';

    // ========== View ==========
    if(isset($_GET['jobregister_id'])) {
        
        $jobregister_id = mysqli_real_escape_string($conn, $_GET['jobregister_id']);
        
        $query = "SELECT * FROM job_register WHERE jobregister_id='$jobregister_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $job = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Job Type Fetch Successfully', 'data' => $job];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Job Type ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Update ==========
    if(isset($_POST['update_job'])) {
        $jobregister_id = mysqli_real_escape_string($conn, $_POST['jobregister_id']);
        
        $job_name = mysqli_real_escape_string($conn, $_POST['job_name']);
        $job_code = mysqli_real_escape_string($conn, $_POST['job_code']);
        $job_description = mysqli_real_escape_string($conn, $_POST['job_description']);
        $customer_PIC = mysqli_real_escape_string($conn, $_POST['customer_PIC']);
        $job_assign = mysqli_real_escape_string($conn, $_POST['job_assign']);
        $requested_date = mysqli_real_escape_string($conn, $_POST['requested_date']);
        $job_cancel = mysqli_real_escape_string($conn, $_POST['job_cancel']);
        $jobregisterlastmodify_by = mysqli_real_escape_string($conn, $_POST['jobregisterlastmodify_by']);
        
        $query = "UPDATE job_register SET 
                    job_name='$job_name', 
                    job_code='$job_code',
                    job_description='$job_description', 
                    customer_PIC='$customer_PIC',
                    job_assign='$job_assign', 
                    requested_date='$requested_date', 
                    job_cancel='$job_cancel',
                    jobregisterlastmodify_by='$jobregisterlastmodify_by'
                  WHERE jobregister_id='$jobregister_id'";
                  
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Job Info Updated Successfully!</span>'];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Job Info Not Updated</span>'];
        
            echo json_encode($res);
        
            return;
        }
    }
?>