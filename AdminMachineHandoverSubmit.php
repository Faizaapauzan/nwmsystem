<?php
    
    session_start();
    include "dbconnect.php";

    // ========== Update ==========
    if (isset($_POST['update_entry']) && isset($_POST['machHO_id'])) {
        $response = ['success' => false, 'message' => ''];
        
        try {
            $machHO_id = mysqli_real_escape_string($conn, $_POST['machHO_id']);
            $machHO_cstrmNm = $_POST['machHO_cstrmNm'] ?? '';
            
            if (empty($machHO_cstrmNm)) {
                $response['message'] = 'Customer name is required';
                header('Content-Type: application/json');
                echo json_encode($response);
                
                exit();
            }
            
            $check_query = "SELECT machHO_id FROM machine_handover WHERE machHO_id='$machHO_id'";
            $check_result = mysqli_query($conn, $check_query);
            
            if (mysqli_num_rows($check_result) == 0) {
                $response['message'] = 'Entry not found';
                
                header('Content-Type: application/json');
                echo json_encode($response);
                
                exit();
            }
            
            $machHO_delDate = $_POST['machHO_delDate'] ?? '';
            $machHO_delTime = $_POST['machHO_delTime'] ?? '';
            $loadDate = $_POST['loadDate'] ?? '';
            $loadTime = $_POST['loadTime'] ?? '';
            $lorrySize = $_POST['lorrySize'] ?? '';
            $fklftCapcty = $_POST['fklftCapcty'] ?? '';
            $extFrk = $_POST['extFrk'] ?? 'No';
            $instllnProg = $_POST['instllnProg'] ?? '';
            $Remark = $_POST['Remark'] ?? '';
            $MHOmodify_by = $_SESSION['username'] ?? '';
            $machines_data = $_POST['machines_data'] ?? '';
            $machines = json_decode($machines_data, true);
            
            if (empty($machines) || !is_array($machines)) {
                $response['message'] = 'At least one machine entry is required';
                
                header('Content-Type: application/json');
                echo json_encode($response);
                
                exit();
            }
            
            $all_machModels = [];
            $all_numPckgs = [];
            $all_nameplatNums = [];
            
            foreach ($machines as $machine) {
                $all_machModels[] = $machine['machModel'] ?? '';
                $all_numPckgs[] = $machine['numPckg'] ?? '';
                $all_nameplatNums[] = $machine['nameplatNum'] ?? '';
            }
            
            $machModel = implode(', ', $all_machModels);
            $numPckg = implode(', ', $all_numPckgs);
            $nameplatNum = implode(', ', $all_nameplatNums);
            
            $stmt = $conn->prepare("UPDATE machine_handover SET machHO_cstrmNm = ?, machHO_delDate = ?, machHO_delTime = ?,
                                                                numPckg = ?, machModel = ?, nameplatNum = ?, loadDate = ?, 
                                                                loadTime = ?, lorrySize = ?, fklftCapcty = ?, extFrk = ?, 
                                                                instllnProg = ?, Remark = ?, MHOmodify_by = ?, MHOmodify_at = NOW()
                                    WHERE machHO_id = ?");
                            
            $stmt->bind_param("ssssssssssssssi", $machHO_cstrmNm, $machHO_delDate, $machHO_delTime, $numPckg,
                                                 $machModel, $nameplatNum, $loadDate, $loadTime, $lorrySize,
                                                 $fklftCapcty, $extFrk, $instllnProg, $Remark, $MHOmodify_by, $machHO_id);
                                            
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $response['success'] = true;
                    $response['message'] = 'Data updated successfully';
                }
                
                else {
                    $response['message'] = 'No changes made to the data';
                }
            }
            
            else {
                $response['message'] = 'Error updating data: ' . $stmt->error;
            }
            
            $stmt->close();
        }
        
        catch (Exception $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
        
        exit();
    }

    // ========== Delete ==========
    if(isset($_POST['delete_entry']) && isset($_POST['machHO_id'])) {
        $machHO_id = mysqli_real_escape_string($conn, $_POST['machHO_id']);
        $check_query = "SELECT machHO_id FROM machine_handover WHERE machHO_id='$machHO_id'";
        $check_result = mysqli_query($conn, $check_query);
        
        if (mysqli_num_rows($check_result) == 0) {
            $res = ['status' => 404, 'message' => 'Entry not found'];
            
            header('Content-Type: application/json');
            echo json_encode($res);
            
            exit();
        }
        
        // Delete the record
        $query = "DELETE FROM machine_handover WHERE machHO_id='$machHO_id'";
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run && mysqli_affected_rows($conn) > 0) {
            $res = ['status' => 200, 'message' => 'Entry Deleted Successfully'];
            
            header('Content-Type: application/json');
            echo json_encode($res);
            
            exit();
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Entry Not Deleted - Database Error'];
            
            header('Content-Type: application/json');
            echo json_encode($res);
            
            exit();
        }
    }

    // ========== Add ==========
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete_entry']) && !isset($_POST['update_entry'])) {
        $response = ['success' => false, 'message' => ''];
        
        try {
            $machHO_cstrmNm = $_POST['machHO_cstrmNm'] ?? '';
            
            if (empty($machHO_cstrmNm)) {
                $response['message'] = 'Customer name is required';
                
                header('Content-Type: application/json');
                echo json_encode($response);
                
                exit();
            }
            
            $machHO_delDate = $_POST['machHO_delDate'] ?? '';
            $machHO_delTime = $_POST['machHO_delTime'] ?? '';
            $loadDate = $_POST['loadDate'] ?? '';
            $loadTime = $_POST['loadTime'] ?? '';
            $lorrySize = $_POST['lorrySize'] ?? '';
            $fklftCapcty = $_POST['fklftCapcty'] ?? '';
            $extFrk = $_POST['extFrk'] ?? 'No';
            $instllnProg = $_POST['instllnProg'] ?? '';
            $Remark = $_POST['Remark'] ?? '';
            $MHOupdate_by = $_SESSION['username'] ?? '';
            $machines_data = $_POST['machines_data'] ?? '';
            $machines = json_decode($machines_data, true);
            
            if (empty($machines) || !is_array($machines)) {
                $response['message'] = 'At least one machine entry is required';
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
            
            // Initialize arrays to store all machine data
            $all_machModels = [];
            $all_numPckgs = [];
            $all_nameplatNums = [];
            
            // Collect all machine data into separate arrays
            foreach ($machines as $machine) {
                $all_machModels[] = $machine['machModel'] ?? '';
                $all_numPckgs[] = $machine['numPckg'] ?? '';
                $all_nameplatNums[] = $machine['nameplatNum'] ?? '';
            }
            
            // Convert arrays to comma-separated strings
            $machModel = implode(', ', $all_machModels);
            $numPckg = implode(', ', $all_numPckgs);
            $nameplatNum = implode(', ', $all_nameplatNums);
            
            // Insert single row with all machine data concatenated
            $stmt = $conn->prepare("INSERT INTO machine_handover (machHO_cstrmNm, machHO_delDate, machHO_delTime, numPckg,
                                                                  machModel, nameplatNum, loadDate, loadTime, lorrySize,
                                                                  fklftCapcty, extFrk, instllnProg, Remark, MHOupdate_by, MHOupdate_at)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                                                                  
            $stmt->bind_param("ssssssssssssss", $machHO_cstrmNm, $machHO_delDate, $machHO_delTime, $numPckg, 
                                                $machModel, $nameplatNum, $loadDate, $loadTime, $lorrySize,
                                                $fklftCapcty, $extFrk, $instllnProg, $Remark, $MHOupdate_by);
                                                
            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Data saved successfully with ' . count($machines) . ' machine(s)';
            }
            
            else {
                $response['message'] = 'Error saving data: ' . $stmt->error;
            }
            
            $stmt->close();
        }
        
        catch (Exception $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
        
        exit();
    }

    // ========== View ==========
    if (isset($_GET['machHO_id']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $machHO_id = mysqli_real_escape_string($conn, $_GET['machHO_id']);
        
        $query = "SELECT * FROM machine_handover WHERE machHO_id='$machHO_id'";
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $hndOvr = mysqli_fetch_array($query_run);
            $res = ['status' => 200, 'message' => 'Machine Handover Fetch Successfully', 'data' => $hndOvr];
            
            header('Content-Type: application/json');
            echo json_encode($res);
            
            exit();
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Machine Handover ID Not Found'];
            
            header('Content-Type: application/json');
            echo json_encode($res);
            
            exit();
        }
    }

    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['status' => 400, 'message' => 'Invalid request']);
    
    exit();

?>