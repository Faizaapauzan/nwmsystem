<?php
    
    require 'dbconnect.php';
    
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
        
        // Retrieve the current balance from the accessories_inout table
        $balanceQuery = "SELECT balance, quantity FROM accessories_inout WHERE inout_id = '$inout_id'";
        $balanceResult = mysqli_query($conn, $balanceQuery);
        $balanceRow = mysqli_fetch_assoc($balanceResult);
        $currentBalance = $balanceRow['balance'];
        $quantity = $balanceRow['quantity'];
        
        if ($currentBalance !== NULL) {
            // First situation: Update balance amount when it is not null
            
            // Check if the quantityReturn exceeds the current balance
            if ($quantityReturn > $currentBalance) {
                $res = ['status' => 422, 'message' => 'Quantity returned cannot exceed the current balance'];
                
                echo json_encode($res);
                
                return;
            }
            
            // Calculate the new balance
            $newBalance = $currentBalance - $quantityReturn;
            
            // Update the balance in the accessories_inout table
            $updateQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
            mysqli_query($conn, $updateQuery);
        
        } 
        
        else {
            
            // Second situation: Update balance amount when it is null
            
            // Check if the quantityReturn exceeds the quantity
            if ($quantityReturn > $quantity) {
                $res = ['status' => 422, 'message' => 'Quantity returned cannot exceed the quantity'];
                
                echo json_encode($res);
                
                return;
            }
            
            // Calculate the new balance
            $newBalance = $quantity - $quantityReturn;
            
            // Update the balance in the accessories_inout table
            $updateQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
            mysqli_query($conn, $updateQuery);
        }
        
        $query = "INSERT INTO accessories_return (inout_id, item, quantityReturn, technicianname, in_date, received_by, remarkreturn) 
                         VALUES ('$inout_id', '$item', '$quantityReturn', '$technicianname', '$in_date', '$received_by', '$remarkreturn')";
        
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
    
    if(isset($_POST['delete_entry'])) {
        
        $entry_id = mysqli_real_escape_string($conn, $_POST['entry_id']);
        
        $query = "DELETE FROM accessories_return WHERE accreturn_id='$entry_id'";
        
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
?>