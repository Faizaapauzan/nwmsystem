<?php
    
    require 'dbconnect.php';
    
    if(isset($_POST['save_entry'])) {
        $accessoriesname = mysqli_real_escape_string($conn, $_POST['accessoriesname']);
        $techname = mysqli_real_escape_string($conn, $_POST['techname']);
        $out_date = mysqli_real_escape_string($conn, $_POST['out_date']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        
        if($accessoriesname == NULL || $techname == NULL || $out_date == NULL || $quantity == NULL) {
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
            
            echo json_encode($res);
            
            return;
        }
        
        $query = "INSERT INTO accessories_inout (accessoriesname, techname,out_date,quantity) 
                  VALUES ('$accessoriesname','$techname','$out_date','$quantity')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            
            $res = ['status' => 200, 'message' => 'New Entry Inserted'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            
            $res = ['status' => 500, 'message' => 'Entry Not Inserted'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    if(isset($_POST['update_entry'])) {
        
        $entry_id = mysqli_real_escape_string($conn, $_POST['inout_id']);
        $accessoriesname = mysqli_real_escape_string($conn, $_POST['accessoriesname']);
        $techname = mysqli_real_escape_string($conn, $_POST['techname']);
        $out_date = mysqli_real_escape_string($conn, $_POST['out_date']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $balance = mysqli_real_escape_string($conn, $_POST['balance']);
        
        if($accessoriesname == NULL || $techname == NULL || $out_date == NULL || $quantity == NULL  || $balance == NULL) {
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
            
            echo json_encode($res);
            
            return;
        }
        
        $query = "UPDATE accessories_inout SET 
                         accessoriesname='$accessoriesname', 
                         techname='$techname', 
                         out_date='$out_date',
                         quantity='$quantity',
                         balance='$balance'
                  WHERE inout_id='$entry_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            
            $res = ['status' => 200, 'message' => 'Entry Updated Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            
            $res = ['status' => 500,'message' => 'Entry Not Updated'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    if(isset($_GET['entry_id'])) {
        
        $entry_id = mysqli_real_escape_string($conn, $_GET['entry_id']);
        
        $query = "SELECT * FROM accessories_inout WHERE inout_id='$entry_id'";
        
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
    
    if(isset($_POST['delete_entry'])) {
        
        $entry_id = mysqli_real_escape_string($conn, $_POST['entry_id']);
        
        $query = "DELETE FROM accessories_inout WHERE inout_id='$entry_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            
            $res = ['status' => 200, 'message' => 'Entry Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            
            $res = ['status' => 500, 'message' => 'Entry Not Deleted'];
            
            echo json_encode($res);
            
            return;
        }
    }

    if (isset($_GET['entry_idRemark'])) {
        $entry_idRemark = mysqli_real_escape_string($conn, $_GET['entry_idRemark']);
    
        $queryRemark = "SELECT * FROM accessories_remark WHERE inout_id='$entry_idRemark'";
    
        $queryRemark_run = mysqli_query($conn, $queryRemark);
    
        if (mysqli_num_rows($queryRemark_run) > 0) {
            $results = array();
            
            while ($row = mysqli_fetch_assoc($queryRemark_run)) {
                $resultsRemark[] = $row;
            }
    
            $res = ['status' => 200, 'message' => 'Successfully fetched by id', 'data' => $resultsRemark];
    
            echo json_encode($res);
        } else {
            $res = ['status' => 404, 'message' => 'No records found'];
    
            echo json_encode($res);
        }
    }
?>