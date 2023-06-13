<?php
    
    require 'dbconnect.php';

if (isset($_POST['save_entry'])) {
    $inout_id = mysqli_real_escape_string($conn, $_POST['inout_id']);
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $quantityReturn = mysqli_real_escape_string($conn, $_POST['quantityReturn']);
    $technicianname = mysqli_real_escape_string($conn, $_POST['technicianname']);
    $in_date = mysqli_real_escape_string($conn, $_POST['in_date']);
    $received_by = mysqli_real_escape_string($conn, $_POST['received_by']);
    $remarkreturn = mysqli_real_escape_string($conn, $_POST['remarkreturn']);

    if ($inout_id == NULL || $item == NULL || $quantityReturn == NULL || $technicianname == NULL || $in_date == NULL || $received_by == NULL || $remarkreturn == NULL) {
        $res = ['status' => 422, 'message' => 'All fields are mandatory'];

        echo json_encode($res);

        return;
    }

    // Retrieve the balance from accessories_inout table
    $balanceQuery = "SELECT balance, quantity FROM accessories_inout WHERE inout_id = '$inout_id'";
    $balanceResult = mysqli_query($conn, $balanceQuery);
    $balanceRow = mysqli_fetch_assoc($balanceResult);
    $balance = $balanceRow['balance'];
    $quantity = $balanceRow['quantity'];

    if ($balance === NULL) {
        // If balance is initially NULL, use quantity instead
        $newBalance = $quantity - $quantityReturn;
        if ($newBalance < 0) {
            // Quantity return exceeds the available quantity
            $res = ['status' => 422, 'message' => 'Quantity return exceeds the available quantity'];

            echo json_encode($res);

            return;
        }

        // Update the balance in accessories_inout table
        $updateBalanceQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
        mysqli_query($conn, $updateBalanceQuery);
    } else {
        $newBalance = $balance - $quantityReturn;
        if ($newBalance < 0) {
            // Quantity return exceeds the available balance
            $res = ['status' => 422, 'message' => 'Quantity return exceeds the available balance'];

            echo json_encode($res);

            return;
        }

        // Update the balance in accessories_inout table
        $updateBalanceQuery = "UPDATE accessories_inout SET balance = '$newBalance' WHERE inout_id = '$inout_id'";
        mysqli_query($conn, $updateBalanceQuery);
    }

    $query = "INSERT INTO accessories_return (inout_id, item, quantityReturn,technicianname,in_date,received_by,remarkreturn) 
              VALUES ('$inout_id', '$item','$quantityReturn','$technicianname','$in_date','$received_by','$remarkreturn')";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = ['status' => 200, 'message' => 'New Entry Inserted'];

        echo json_encode($res);

        return;
    } else {
        $res = ['status' => 500, 'message' => 'Entry Not Inserted'];

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