<?php
    require 'dbconnect.php';
    
    // ========== Add ==========
    if(isset($_POST['save_jobType'])) {
        $job_code = mysqli_real_escape_string($conn, $_POST['job_code']);
        $job_name = mysqli_real_escape_string($conn, $_POST['job_name']);
        $job_description = mysqli_real_escape_string($conn, $_POST['job_description']);
        $jobtypecreated_by = mysqli_real_escape_string($conn, $_POST['jobtypecreated_by']);
        $jobtypelastmodify_by = mysqli_real_escape_string($conn, $_POST['jobtypelastmodify_by']);
        
        if($job_code == NULL || $job_name == NULL || $job_description == NULL || $jobtypecreated_by == NULL || $jobtypelastmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'Some info are empty'];
                    
            echo json_encode($res);
            
            return;
        }
        
        $query = "INSERT INTO jobtype_list (job_code, job_name, job_description, jobtypecreated_by, jobtypelastmodify_by) 
                  VALUES ('$job_code','$job_name','$job_description','$jobtypecreated_by', '$jobtypelastmodify_by')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Job Type Registered Successfully!'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Job Type Not Registered'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== View ==========
    if(isset($_GET['jobtype_id'])) {
        
        $jobtype_id = mysqli_real_escape_string($conn, $_GET['jobtype_id']);
        
        $query = "SELECT * FROM jobtype_list WHERE jobtype_id='$jobtype_id'";
        
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
    if(isset($_POST['update_jobType'])) {
        $jobtype_id = mysqli_real_escape_string($conn, $_POST['jobtype_id']);
        
        $job_code = mysqli_real_escape_string($conn, $_POST['job_code']);
        $job_name = mysqli_real_escape_string($conn, $_POST['job_name']);
        $job_description = mysqli_real_escape_string($conn, $_POST['job_description']);
        $jobtypelastmodify_by = mysqli_real_escape_string($conn, $_POST['jobtypelastmodify_by']);
        
        if($job_code == NULL || $job_name == NULL || $job_description == NULL) {
            
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
        
            echo json_encode($res);
            
            return;
        }
        
        $query = "UPDATE jobtype_list SET 
                    job_code='$job_code', 
                    job_name='$job_name', 
                    job_description='$job_description', 
                    jobtypelastmodify_by='$jobtypelastmodify_by'
                  WHERE jobtype_id='$jobtype_id'";
                  
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Job Type Updated Successfully!'];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Job Type Not Updated'];
        
            echo json_encode($res);
        
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_jobType'])) {
        $jobtype_id = mysqli_real_escape_string($conn, $_POST['jobtype_id']);
        
        $query = "DELETE FROM jobtype_list WHERE jobtype_id='$jobtype_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Job Type Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => '>Job Type Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>