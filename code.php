<?php
    
    require 'dbconnect.php';

    // ======== More Acc ========
    if(isset($_POST['moreacc'])){
        $jobregister_id = mysqli_real_escape_string($conn, $_POST['jobregister_id']);
        $accessoriesid = mysqli_real_escape_string($conn, $_POST['accessories_id']);
        $accessoriescode = mysqli_real_escape_string($conn, $_POST['accessories_code']);
        $accessoriesname = mysqli_real_escape_string($conn, $_POST['accessories_name']);
        $accessoriesuom = mysqli_real_escape_string($conn, $_POST['accessories_uom']);
        $accessoriesquantity = mysqli_real_escape_string($conn, $_POST['accessories_quantity']);

        if($accessoriesid  == NULL ||  $accessoriescode == NULL || $accessoriesname == NULL || $accessoriesuom == NULL || $accessoriesquantity == NULL) {
            return;
        }

        $query = "INSERT INTO job_accessories (jobregister_id, accessories_id, accessories_code, accessories_name, accessories_uom, accessories_quantity)
                  VALUES ('$jobregister_id', '$accessoriesid', '$accessoriescode', '$accessoriesname', '$accessoriesuom', '$accessoriesquantity')";

        $query_run = mysqli_query($conn, $query);  
        
        if($query_run) {
            
            $res = ['status' => 200, 'message'=> "good"];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            
            $res = ['status' => 500, 'message'=> "bad"];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Save ==========
    if(isset($_POST['save_entry'])) {
        $jobregister_id = $_POST['jobregister_id'] ?? NULL;
        $accessoriesname = $_POST['accessoriesname'];
        $techname = $_POST['techname'];
        $out_date = $_POST['out_date'];
        $quantity = $_POST['quantity'];
        
        
        if($accessoriesname == NULL || $techname == NULL || $out_date == NULL || $quantity == NULL) {
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
            
            echo json_encode($res);
            
            return;
        }   
        
        $query = "INSERT INTO accessories_inout (jobregister_id, accessoriesname, techname, out_date, quantity, balance) 
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isssii", $jobregister_id, $accessoriesname, $techname, $out_date, $quantity, $quantity);
                
            $query_run = mysqli_stmt_execute($stmt);

            if ($query_run) {
                $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">New Entry Inserted</span>'];
            } else {
                $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Entry Not Inserted</span>'];
            }

            echo json_encode($res);

            mysqli_stmt_close($stmt);
            } else {
            $res = ['status' => 500, 'message' => '<span style="white-space: nowrap;">Entry Not Inserted</span>'];
            echo json_encode($res);
        }

    }

    // ========== View ==========
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

    // ========== Update ==========
    if(isset($_POST['update_entry'])) {
        
        $entry_id = mysqli_real_escape_string($conn, $_POST['inout_id']);
        $techname = mysqli_real_escape_string($conn, $_POST['techname']);
        $out_date = mysqli_real_escape_string($conn, $_POST['out_date']);
        $balance = mysqli_real_escape_string($conn, $_POST['balance']);
        
        if( $techname == NULL || $out_date == NULL || $balance == NULL) {
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
            
            echo json_encode($res);
            
            return;
        }
        
        $query = "UPDATE accessories_inout SET 
                         techname='$techname', 
                         out_date='$out_date',
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
    
    // ========== Delete ==========
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
    
    // ========== Remark ==========
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
    // ========== Delete Remark ==========
    if (isset($_POST['delete_remark'])) {
        $entry_idRemark = mysqli_real_escape_string($conn, $_POST['entry_id']);

        $queryremark = mysqli_query($conn, "SELECT * FROM accessories_remark WHERE remarkid=$entry_idRemark");
        $row = mysqli_fetch_assoc($queryremark);
        $inout_id = $row['inout_id'];
        $quantity = $row['remark_quantity'];

        $queryinout = mysqli_query($conn, "SELECT * FROM accessories_inout WHERE inout_id=$inout_id");
        $row2 = mysqli_fetch_assoc($queryinout);
        $curbalance = $row2['balance'];

        $newbalance = $curbalance + $quantity;

        $querynew = mysqli_query($conn, "UPDATE accessories_inout SET balance='$newbalance' WHERE inout_id=$inout_id");

        if ($querynew) {
            $queryRemark_run = mysqli_query($conn, "DELETE FROM accessories_remark WHERE remarkid='$entry_idRemark'");
            if($queryRemark_run){
                $res = ['status' => 200, 'message' => 'Successfully Deleted'];
    
                echo json_encode($res);
            }else {
                $res = ['status' => 404, 'message' => 'Failed to delete'];
        
                echo json_encode($res);
            }

        } 
        
        else {
            $res = ['status' => 404, 'message' => 'Failed to delete'];
    
            echo json_encode($res);
        }
    }

    // ========== Request ==========
    if (isset($_GET['Request'])) {
    
        $queryRequest = "SELECT * FROM accessories_remark";
    
        $queryRequest_run = mysqli_query($conn, $queryRequest);

        $pattern = '/.*\(request by [^)]+\)/';
    
        if (mysqli_num_rows($queryRequest_run) > 0) {
            $resultsRequest = array();
            
            while ($row = mysqli_fetch_assoc($queryRequest_run)) {
                if (preg_match($pattern, $row['remark_note'])) {
                    $resultsRequest[] = $row;
                }
            }
    
            $res = ['status' => 200, 'message' => 'Successfully fetched by id', 'data' => $resultsRequest];
    
            echo json_encode($res);
        } 
        
        else {
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
            $item_name = $resultRequest['accessoriesname'];

            $res = ['status' => 200, 'message' => 'Successfully fetched by id', 'accessoriesname' => $item_name]; // Use the correct field name
        } 
        
        else {
            $res = ['status' => 404, 'message' => 'No records found'];
        }
    
        echo json_encode($res);
        return;
    }

    // ========== Accept ==========
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
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Request Accepted</span>'];
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Failed'];
        }
    
        echo json_encode($res);
        return;
    }

    // ========== Delete Remark ==========
    if (isset($_POST['delete'])) {
        $remarkid = mysqli_real_escape_string($conn, $_POST['remarkid']);
    
        $queryRequest = "DELETE FROM accessories_remark WHERE remarkid='$remarkid'";
    
        $queryRequest_run = mysqli_query($conn, $queryRequest);
    
        if ($queryRequest_run) {
            $res = ['status' => 200, 'message' => '<span style="white-space: nowrap;">Deleted Successfully!</span>'];
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Failed'];
        }
    
        echo json_encode($res);
        return;
    }

    if (isset($_POST['return'])){
        $inout_id = $_POST['inout_id'];
        $remark_note = $_POST['remark_note'];
        $remark_date = $_POST['remark_date'];
        $remark_quantity = $_POST['remark_quantity'];
        $verified_by = $_POST['verified_by'];
        $total = 0;

        foreach ($remark_note as $index => $remark_note_value) {
            $s_remark_note = $remark_note_value;
            $s_remark_date = $remark_date[$index];
            $s_remark_quantity = $remark_quantity[$index];
            $s_verified_by = $verified_by[$index];
        
            $sql = "INSERT INTO `accessories_remark`(`inout_id`, `remark_note`, `remark_date`,`remark_quantity`,`verified_by`) VALUES ('$inout_id','$s_remark_note','$s_remark_date','$s_remark_quantity','$s_verified_by')";
   
            $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));

            $total += $s_remark_quantity;

        }

        if ($query) {
            $query2_run = mysqli_query($conn, "SELECT * FROM accessories_inout WHERE inout_id='$inout_id'");
            $result = mysqli_fetch_assoc($query2_run);
            $curbalance = $result['balance'];

            $newbalance = $curbalance - $total;

            $query3_run = mysqli_query($conn, "UPDATE accessories_inout set balance='$newbalance' WHERE inout_id='$inout_id'");
            $response = ['status' => 200, 'message' => 'Successfully Updated'];
        } 
        
        else {
            $response = ['status' => 500, 'message' => 'Failed to Update'];
        }
        
        echo json_encode($response);


    }

    if (isset($_POST['update_remark'])) {
        $inoutid = mysqli_real_escape_string($conn, $_POST['inout_id']);
        $remark_note = mysqli_real_escape_string($conn, $_POST['remark_note']);
        $remark_date = mysqli_real_escape_string($conn, $_POST['remark_date']);
        $remark_quantity = mysqli_real_escape_string($conn, $_POST['remark_quantity']);

        $query_run = mysqli_query($conn, "SELECT * FROM accessories_remark WHERE inout_id='$inoutid' and remark_note='$remark_note' and remark_date='$remark_date'");
        $result = mysqli_fetch_assoc($query_run);
        $curquantity = $result['remark_quantity'];

        $query2_run = mysqli_query($conn, "SELECT * FROM accessories_inout WHERE inout_id='$inoutid'");
        $result = mysqli_fetch_assoc($query2_run);
        $curbalance = $result['balance'];

        $newbalance = $curbalance + $curquantity - $remark_quantity;


        if (mysqli_query($conn, "UPDATE accessories_inout set balance='$newbalance' WHERE inout_id='$inoutid'")) {
            $query3_run = mysqli_query($conn, "UPDATE accessories_remark set remark_quantity='$remark_quantity' WHERE inout_id='$inoutid' and remark_note='$remark_note' and remark_date='$remark_date'");
            if ($query3_run)
                $res = ['status' => 200, 'message' => 'Successfully Updated'];
            else
                $res = ['status' => 404, 'message' => 'Failed to update'];
        } 
        
        else {
            $res = ['status' => 404, 'message' => 'Failed to update'];
        }
    
        echo json_encode($res);
        return;
    }
    
?>