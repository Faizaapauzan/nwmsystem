<?php
    
    require 'dbconnect.php';

    if (isset($_POST['update_entry'])) {
        $success = true;
        
        for ($i = 0; $i < count($_POST['remark_note']); $i++) {

            $remark_note = mysqli_real_escape_string($conn, $_POST['remark_note'][$i]);
            $remark_date = mysqli_real_escape_string($conn, $_POST['remark_date'][$i]);
            $remark_quantity = mysqli_real_escape_string($conn, $_POST['remark_quantity'][$i]);
            $inout_id = mysqli_real_escape_string($conn, $_POST['inout_id'][$i]);
    
            if ($remark_note == '' || $remark_date == '' || $remark_quantity == '' || $inout_id == '') {
                $res = ['status' => 422, 'message' => 'All fields are mandatory'];
    
                echo json_encode($res);
                $success = false; 
                break; 
            }

            // Retrieve the current balance from the accessories_inout table
            $balanceQuery = "SELECT balance, quantity FROM accessories_inout WHERE inout_id = '$inout_id'";
            $balanceResult = mysqli_query($conn, $balanceQuery);
            $balanceRow = mysqli_fetch_assoc($balanceResult);
            $currentBalance = $balanceRow['balance'];
            $quantity = $balanceRow['quantity'];
            
            if ($currentBalance !== NULL) {
                
                // First situation: Update balance amount when it is not null
                // Check if the remark_quantity exceeds the current balance
                if ($remark_quantity > $currentBalance) {

                    $res = ['status' => 422, 'message' => 'Quantity returned cannot exceed the current balance'];
                    echo json_encode($res);
                    
                    return;
                }
                
                // Calculate the new balance
                $newBalance = $currentBalance - $remark_quantity;
                // Update the balance in the accessories_inout table
                $updateQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
                mysqli_query($conn, $updateQuery);
            }
            
            else {
                
                // Second situation: Update balance amount when it is null
                // Check if the remark_quantity exceeds the quantity
                if ($remark_quantity > $quantity) {
                    $res = ['status' => 422, 'message' => 'Quantity returned cannot exceed the quantity'];
                    echo json_encode($res);
                    
                    return;
                }
                
                // Calculate the new balance
                $newBalance = $quantity - $remark_quantity;
                
                // Update the balance in the accessories_inout table
                $updateQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
                mysqli_query($conn, $updateQuery);
            }
    
            $query = "INSERT INTO accessories_remark (remark_note, remark_date, remark_quantity, inout_id) 
                      VALUES ('$remark_note', '$remark_date', '$remark_quantity', '$inout_id')";
    
            $query_run = mysqli_query($conn, $query);
    
            if (!$query_run) {
                $success = false; 
                break;
            }
        }
    
        if ($success) {
            $res = ['status' => 200, 'message' => 'Entry Updated Successfully'];
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Entry Not Updated'];
        }
    
        echo json_encode($res);
    }
    
    if (isset($_GET['entry_id'])) {

        $entry_id = mysqli_real_escape_string($conn, $_GET['entry_id']);
    
        $query = "SELECT * FROM accessories_inout WHERE inout_id='$entry_id'";

        $query_run = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($query_run) == 1) {
            $result = mysqli_fetch_assoc($query_run);
    
            $res = ['status' => 200, 'message' => 'Successfully fetch by id', 'data' => $result];
    
            echo json_encode($res);
        } 
        
        else {
            
            $res = ['status' => 404, 'message' => 'Id Not Found'];
    
            echo json_encode($res);
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
        } 
        
        else {
            $res = ['status' => 404, 'message' => 'No records found'];
    
            echo json_encode($res);
        }
    }
?>