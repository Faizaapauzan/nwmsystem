<?php
    require 'dbconnect.php';
    
    // ========== Add ==========
    if(isset($_POST['save_typeName'])) {
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        $type_name = mysqli_real_escape_string($conn, $_POST['type_name']);
        
        $query = "INSERT INTO machine_type (brand_id, type_name) VALUES ('$brand_id', '$type_name')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $latest_query = "SELECT * FROM machine_type ORDER BY type_name ASC";
            $latest_result = mysqli_query($conn, $latest_query);
            $latest_row = mysqli_fetch_assoc($latest_result);
            
            $res = [
                'status' => 200,
                'message' => 'Machine Type Register Successfully',
                'latest_jobtype' => $latest_row
            ];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Type Not Registered'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== View ==========
    if(isset($_GET['type_id'])) {
        
        $type_id = mysqli_real_escape_string($conn, $_GET['type_id']);
        
        $query = "SELECT * FROM machine_type WHERE type_id='$type_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $type = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 
                    'message' => 'Machine Type Fetch Successfully', 
                    'data' => $type];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 
                    'message' => 'Machine Type ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Update ==========
    if(isset($_POST['update_machType'])) {
        $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
        $type_name = mysqli_real_escape_string($conn, $_POST['type_name']);
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        
        $query = "UPDATE machine_type SET type_name='$type_name', brand_id='$brand_id' WHERE type_id='$type_id'";
                  
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 
                    'message' => 'Machine Type Updated Successfully!'];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Machine Type Not Updated'];
        
            echo json_encode($res);
        
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_machType'])) {
        $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
        
        $query = "DELETE FROM machine_type WHERE type_id='$type_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 
                    'message' => 'Machine Type Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 
                    'message' => '>Machine Type Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>