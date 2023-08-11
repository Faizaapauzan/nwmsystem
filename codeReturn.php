<?php
    
    require 'dbconnect.php';
    
    // ========== Add ==========
    if(isset($_POST['save_entry'])) {
        $inout_id = mysqli_real_escape_string($conn, $_POST['inout_id']);
        $item = mysqli_real_escape_string($conn, $_POST['item']);
        $quantityReturn = mysqli_real_escape_string($conn, $_POST['quantityReturn']);
        $technicianname = mysqli_real_escape_string($conn, $_POST['technicianname']);
        $in_date = mysqli_real_escape_string($conn, $_POST['in_date']);
        $received_by = mysqli_real_escape_string($conn, $_POST['received_by']);
        $remarkreturn = mysqli_real_escape_string($conn, $_POST['remarkreturn']);
        
        if($inout_id == NULL || $item == NULL || $quantityReturn == NULL || $technicianname == NULL || $in_date == NULL || $received_by == NULL || $remarkreturn == NULL) {
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
            
            echo json_encode($res);
            
            return;
        }

        $balanceQuery = "SELECT balance, quantity FROM accessories_inout WHERE inout_id = '$inout_id'";
        $balanceResult = mysqli_query($conn, $balanceQuery);
        $balanceRow = mysqli_fetch_assoc($balanceResult);
        $currentBalance = $balanceRow['balance'];
        $quantity = $balanceRow['quantity'];
        
        if ($currentBalance !== NULL) {
            if ($quantityReturn > $currentBalance) {
                $res = ['status' => 422, 'message' => 'Quantity returned cannot exceed the current balance'];
                
                echo json_encode($res);
                
                return;
            }
            
            $newBalance = $currentBalance - $quantityReturn;
            
            $updateQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
            
            mysqli_query($conn, $updateQuery);
        } 
        
        else {
            if ($quantityReturn > $quantity) {
                $res = ['status' => 422, 'message' => 'Quantity returned cannot exceed the quantity'];
                
                echo json_encode($res);
                
                return;
            }
            
            $newBalance = $quantity - $quantityReturn;
            
            $updateQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
            
            mysqli_query($conn, $updateQuery);
        }
        
        $query = "INSERT INTO accessories_return (inout_id, item, quantityReturn, technicianname, in_date, received_by, remarkreturn) 
                  VALUES ('$inout_id', '$item', '$quantityReturn', '$technicianname', '$in_date', '$received_by', '$remarkreturn')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">New Entry Inserted</span>'];
            
            echo json_encode($res);
            
            return;
        } 
        
        else {
            $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Entry Not Inserted</span>'];
            
            echo json_encode($res);
            
            return;
        }
    }

    // ========== View ==========
    if(isset($_GET['entry_id'])) {
        
        $entry_id = mysqli_real_escape_string($conn, $_GET['entry_id']);
        
        $query = "SELECT * FROM accessories_return WHERE accreturn_id='$entry_id'";
        
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

    // ========== Update ==========
    if(isset($_POST['update_entry'])) {
        
        $accreturn_id = mysqli_real_escape_string($conn, $_POST['accreturn_id']);
        $inout_id = mysqli_real_escape_string($conn, $_POST['inout_id']);
        $item = mysqli_real_escape_string($conn, $_POST['item']);
        $quantityReturn = mysqli_real_escape_string($conn, $_POST['quantityReturn']);
        $technicianname = mysqli_real_escape_string($conn, $_POST['technicianname']);
        $in_date = mysqli_real_escape_string($conn, $_POST['in_date']);
        $received_by = mysqli_real_escape_string($conn, $_POST['received_by']);
        $remarkreturn = mysqli_real_escape_string($conn, $_POST['remarkreturn']);
        
        if($accreturn_id == NULL || $item == NULL || $quantityReturn == NULL || $technicianname == NULL || $in_date == NULL  || $received_by == NULL || $remarkreturn == NULL) {
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
                    
                    echo json_encode($res);

                    return;
        }
        
        $query = "UPDATE accessories_return SET
                         inout_id='$inout_id',  
                         item='$item', 
                         quantityReturn='$quantityReturn', 
                         technicianname='$technicianname',
                         in_date='$in_date',
                         received_by='$received_by',
                         remarkreturn='$remarkreturn'  
                  WHERE accreturn_id='$accreturn_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Entry Updated Successfully</span>'];
                    
                    echo json_encode($res);
                    
                    return;
        }
        
        else {
            
            $res = ['status' => 500,'message' => '<span style="white-space: nowrap;">Entry Not Updated</span>'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_staff'])) {
        $entry_id = mysqli_real_escape_string($conn, $_POST['entry_id']);
        
        $query = "DELETE FROM accessories_return WHERE accreturn_id='$entry_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Entry Deleted Successfully</span>'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Entry Not Deleted</span>'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>