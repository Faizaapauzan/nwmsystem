<?php
    
    include 'dbconnect.php';
    
    // Fetch data
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['jobregister_id'])) {
        $jobregister_id = $_GET['jobregister_id'];
        $response = ['status' => 200];
        
        // job info
        $jobQuery = "SELECT * FROM job_register WHERE jobregister_id = ?";
        
        $stmt = mysqli_prepare($conn, $jobQuery);
                mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
                mysqli_stmt_execute($stmt);

        $jobResult = mysqli_stmt_get_result($stmt);
        
        if ($jobRow = mysqli_fetch_assoc($jobResult)) {
            $response['jobInfo'] = $jobRow;
        }
        
        else {
            $response['jobInfo'] = null;
        }
        
        // accessory
        $accessoriesQuery = "SELECT * FROM job_accessories WHERE jobregister_id = ?";
        
        $stmt = mysqli_prepare($conn, $accessoriesQuery);
                mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
                mysqli_stmt_execute($stmt);

        $accessoriesResult = mysqli_stmt_get_result($stmt);

        $accessoriesData = [];
        
        while ($accessoryRow = mysqli_fetch_assoc($accessoriesResult)) {
            $accessoriesData[] = $accessoryRow;
        }
    
        $response['jobAccessories'] = $accessoriesData;

        echo json_encode($response);
    }
    
    // update accessory
    else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'], $_POST['remark'])) {
        $accessoryId = $_POST['id'];
        $newStatus = $_POST['status'];
        $newRemark = $_POST['remark'];
        
        $updateQuery = "UPDATE job_accessories SET 
                               accessories_status = ?, 
                               accessories_remark = ? 
                        WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $updateQuery);
                mysqli_stmt_bind_param($stmt, 'ssi', $newStatus, $newRemark, $accessoryId);
                
        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $response = ['status' => 200, 
                             'message' => 'Data updated successfully'];
            }
            
            else {
                $response = ['status' => 404, 
                             'message' => 'Data not found or data unchanged'];
            }
        }
        
        else {
            $response = ['status' => 500, 
                         'message' => 'Error updating accessory: ' . mysqli_error($conn)];
        }
        
        mysqli_stmt_close($stmt);
        
        echo json_encode($response);
    }
    
    else {
        echo json_encode(['status' => 400, 'message' => 'Invalid Request']);
    }
    
    mysqli_close($conn);

?>
