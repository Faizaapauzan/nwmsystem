<?php
    require 'dbconnect.php';
    
    // ========== Add ==========
    if(isset($_POST['save_brandName'])) {
        $brandname = mysqli_real_escape_string($conn, $_POST['brandname']);
        
        $query = "INSERT INTO machine_brand (brandname) VALUES ('$brandname')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $latest_query = "SELECT * FROM machine_brand ORDER BY brandname ASC";
            $latest_result = mysqli_query($conn, $latest_query);
            $latest_row = mysqli_fetch_assoc($latest_result);
            
            $res = [
                'status' => 200,
                'message' => 'Machine Brand Register Successfully',
                'latest_jobtype' => $latest_row
            ];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Brand Not Registered'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== View ==========
    if(isset($_GET['brand_id'])) {
        
        $brand_id = mysqli_real_escape_string($conn, $_GET['brand_id']);
        
        $query = "SELECT * FROM machine_brand WHERE brand_id='$brand_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $job = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 
                    'message' => 'Machine Brand Fetch Successfully', 
                    'data' => $job];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 
                    'message' => 'Machine Brand ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Update ==========
    if(isset($_POST['update_machBrand'])) {
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        $brandname = mysqli_real_escape_string($conn, $_POST['brandname']);
        
        $query = "UPDATE machine_brand SET brandname='$brandname' WHERE brand_id='$brand_id'";
                  
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Machine Brand Updated Successfully!'];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Brand Not Updated'];
        
            echo json_encode($res);
        
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_machBrand'])) {
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        
        $query = "DELETE FROM machine_brand WHERE brand_id='$brand_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 
                    'message' => 'Machine Brand Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 
                    'message' => '>Machine Brand Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>