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
        
        $query = "INSERT INTO accessories_inout (accessoriesname, techname,out_date,quantity,balance) 
                  VALUES ('$accessoriesname','$techname','$out_date','$quantity','$quantity')";
        
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

        $query = "SELECT * FROM accessories_remark WHERE inout_id='$entry_id'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 0){
            $query = "DELETE FROM accessories_inout WHERE inout_id='$entry_id'";
            $query_run = mysqli_query($conn, $query);
        }else {
            $query = "DELETE FROM accessories_remark WHERE inout_id='$entry_id'; DELETE FROM accessories_inout WHERE inout_id='$entry_id'";
            $query_run = mysqli_multi_query($conn, $query);
        }

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
    if (isset($_GET['Request'])) {
    
        $queryRequest = "SELECT * FROM accessories_remark";
    
        $queryRequest_run = mysqli_query($conn, $queryRequest);

        $pattern = '/.*\(request by [^)]+\)/';
    
        if (mysqli_num_rows($queryRequest_run) > 0) {
            $resultsRequest = array();
            
            while ($row = mysqli_fetch_assoc($queryRequest_run)) {

                if (preg_match($pattern, $row['remark_note'])){
                    $resultsRequest[] = $row;
                }
               
            }
    
            $res = ['status' => 200, 'message' => 'Successfully fetched by id', 'data' => $resultsRequest];
    
            echo json_encode($res);
        } else {
            $res = ['status' => 404, 'message' => 'No records found'];
    
            echo json_encode($res);
        }
    }
    if (isset($_GET['RequestItem'])) {
        
        $inout_id = mysqli_real_escape_string($conn, $_GET['inout_id']);

        $queryRequest = "SELECT * FROM accessories_inout WHERE inout_id = $inout_id";
    
        $queryRequest_run = mysqli_query($conn, $queryRequest);

        if ($queryRequest_run && mysqli_num_rows($queryRequest_run) > 0) {
            $resultRequest = mysqli_fetch_assoc($queryRequest_run);
            $item_name = $resultRequest['accessoriesname']; // Fetch the item name from the result

            $res = ['status' => 200, 'message' => 'Successfully fetched by id', 'accessoriesname' => $item_name]; // Use the correct field name

        } else {
            $res = ['status' => 404, 'message' => 'No records found'];
        }
    
        echo json_encode($res);
        return;
    }
    if (isset($_POST['accept'])) {
        $remarkid = mysqli_real_escape_string($conn, $_POST['remarkid']);
    
        $queryRequest = "SELECT * FROM accessories_remark WHERE remarkid='$remarkid'";
        $queryRequest_run = mysqli_query($conn, $queryRequest);
        $resultRequest = mysqli_fetch_assoc($queryRequest_run);

        $itemname = $resultRequest['remark_note'];
        $itemquantity = $resultRequest['remark_quantity'];
        $inout_id = $resultRequest['inout_id'];

        $pattern = '/\(request by [^)]+\)/';

        $modifiedname = preg_replace($pattern, '', $itemname);

        $query_run = mysqli_query($conn, "UPDATE accessories_remark set remark_note='$modifiedname' WHERE remarkid='$remarkid'");

        $query2_run = mysqli_query($conn, "SELECT * FROM accessories_inout WHERE inout_id='$inout_id'");
        $result = mysqli_fetch_assoc($query2_run);
        $curbalance = $result['balance'];

        $newbalance = $curbalance - $itemquantity;

        $query3_run = mysqli_query($conn, "UPDATE accessories_inout set balance='$newbalance' WHERE inout_id='$inout_id'");
    
        if ($query3_run) {
            $res = ['status' => 200, 'message' => 'Request Accepted'];
        } else {
            $res = ['status' => 500, 'message' => 'Failed'];
        }
    
        echo json_encode($res);
        return;
    }
    if (isset($_POST['delete'])) {
        $remarkid = mysqli_real_escape_string($conn, $_POST['remarkid']);
    
        $queryRequest = "DELETE FROM accessories_remark WHERE remarkid='$remarkid'";
    
        $queryRequest_run = mysqli_query($conn, $queryRequest);
    
        if ($queryRequest_run) {
            $res = ['status' => 200, 'message' => 'Request Rejected'];
        } else {
            $res = ['status' => 500, 'message' => 'Failed'];
        }
    
        echo json_encode($res);
        return;
    }
    
?>