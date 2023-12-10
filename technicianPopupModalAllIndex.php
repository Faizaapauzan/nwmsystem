<?php
    
    include 'dbconnect.php';
    
    // Fetch data
    if (isset($_GET['jobregister_id'])) {
        $jobregister_id = $_GET['jobregister_id'];
        
        // Fetch job_register table
        $jobQuery = "SELECT * FROM job_register WHERE jobregister_id = ?";
        $jobQueryResult = mysqli_prepare($conn, $jobQuery);
    
        mysqli_stmt_bind_param($jobQueryResult, 'i', $jobregister_id);
        mysqli_stmt_execute($jobQueryResult);
    
        $result = mysqli_stmt_get_result($jobQueryResult);
    
        if (mysqli_num_rows($result) == 1) {
            $info = mysqli_fetch_array($result);
    
            // Fetch assistants table
            $assistantsQuery = "SELECT * FROM assistants WHERE jobregister_id = ?";
            $assistantsQueryResult = mysqli_prepare($conn, $assistantsQuery);
    
            mysqli_stmt_bind_param($assistantsQueryResult, 'i', $jobregister_id);
            mysqli_stmt_execute($assistantsQueryResult);
    
            $assistantsResult = mysqli_stmt_get_result($assistantsQueryResult);
    
            $assistantData = array();
    
            while ($row = mysqli_fetch_assoc($assistantsResult)) {
                $assistantData[] = $row;
            }
    
            // Fetch job_accessories table
            $accessoriesQuery = "SELECT * FROM job_accessories WHERE jobregister_id = ?";
            $accessoriesQueryResult = mysqli_prepare($conn, $accessoriesQuery);
    
            mysqli_stmt_bind_param($accessoriesQueryResult, 'i', $jobregister_id);
            mysqli_stmt_execute($accessoriesQueryResult);
    
            $accessoriesResult = mysqli_stmt_get_result($accessoriesQueryResult);
    
            $accessoriesData = array();
    
            while ($row = mysqli_fetch_assoc($accessoriesResult)) {
                $accessoriesData[] = $row;
            }

            // Fetch technician_photoupdate table (Before)
            $photoBeforeQuery = "SELECT * FROM technician_photoupdate WHERE description= 'Machine (Before Service)' AND jobregister_id = ?";
            $photoQueryBeforeResult = mysqli_prepare($conn, $photoBeforeQuery);
    
            mysqli_stmt_bind_param($photoQueryBeforeResult, 'i', $jobregister_id);
            mysqli_stmt_execute($photoQueryBeforeResult);
    
            $photosBeforeResult = mysqli_stmt_get_result($photoQueryBeforeResult);
    
            $photosBeforeData = array();
    
            while ($row = mysqli_fetch_assoc($photosBeforeResult)) {
                $photosBeforeData[] = $row;
            }

            // Fetch technician_photoupdate table (After)
            $photoAfterQuery = "SELECT * FROM technician_photoupdate WHERE description = 'Machine (After Service)' AND jobregister_id = ?";
            $photoQueryAfterResult = mysqli_prepare($conn, $photoAfterQuery);
    
            mysqli_stmt_bind_param($photoQueryAfterResult, 'i', $jobregister_id);
            mysqli_stmt_execute($photoQueryAfterResult);
    
            $photosAfterResult = mysqli_stmt_get_result($photoQueryAfterResult);
    
            $photosAfterData = array();
    
            while ($row = mysqli_fetch_assoc($photosAfterResult)) {
                $photosAfterData[] = $row;
            }

            // Fetch technician_videoupdate table (Before)
            $videoBeforeQuery = "SELECT * FROM technician_videoupdate WHERE description = 'Machine (Before Service)' AND jobregister_id = ?";
            $videoQueryBeforeResult = mysqli_prepare($conn, $videoBeforeQuery);
    
            mysqli_stmt_bind_param($videoQueryBeforeResult, 'i', $jobregister_id);
            mysqli_stmt_execute($videoQueryBeforeResult);
    
            $videosBeforeResult = mysqli_stmt_get_result($videoQueryBeforeResult);
    
            $videosBeforeData = array();
    
            while ($row = mysqli_fetch_assoc($videosBeforeResult)) {
                $videosBeforeData[] = $row;
            }

            // Fetch technician_videoupdate table (After)
            $videoAfterQuery = "SELECT * FROM technician_videoupdate WHERE description = 'Machine (After Service)' AND jobregister_id = ?";
            $videoQueryAfterResult = mysqli_prepare($conn, $videoAfterQuery);
    
            mysqli_stmt_bind_param($videoQueryAfterResult, 'i', $jobregister_id);
            mysqli_stmt_execute($videoQueryAfterResult);
    
            $videosAfterResult = mysqli_stmt_get_result($videoQueryAfterResult);
    
            $videosAfterData = array();
    
            while ($row = mysqli_fetch_assoc($videosAfterResult)) {
                $videosAfterData[] = $row;
            }
    
            $res = ['status' => 200,
                    'message' => 'Info Fetch Successfully',
                    'data' => $info,
                    'assistant' => $assistantData,
                    'jobAccessories' => $accessoriesData,
                    'photosBefore' => $photosBeforeData,
                    'photosAfter' => $photosAfterData,
                    'videosBefore' => $videosBeforeData,
                    'videosAfter' => $videosAfterData,];
    
            echo json_encode($res);
        } 
        
        else {
            $res = ['status' => 404,
                    'message' => 'Data Not Found',];
    
            echo json_encode($res);
        }
    }

    // Update Job Update
    if (isset($_POST['update_jobUpdate'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $technician_departure = $_POST['technician_departure'];
        $technician_arrival = $_POST['technician_arrival'];
        $technician_leaving = $_POST['technician_leaving'];
        $tech_out = $_POST['tech_out'];
        $tech_in = $_POST['tech_in'];
    
        $query = "UPDATE job_register SET technician_departure=?, 
                                          technician_arrival=?, 
                                          technician_leaving=?, 
                                          tech_out=?, tech_in=? 
                  WHERE jobregister_id=?";
        
        $stmt = $conn->prepare($query);
        
        $stmt->bind_param('sssssi', $technician_departure, $technician_arrival, $technician_leaving, $tech_out, $tech_in, $jobregister_id);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $res = ['status' => 200, 
                        'message' => 'Time successfully updated'];
            } 
            
            else {
                $res = ['status' => 200, 
                        'message' => 'No changes made'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Update error: ' . $stmt->error];
        }
    
        $stmt->close();
    
        echo json_encode($res);
    }
    
    // Update Job Info
    if (isset($_POST['update_jobInfo'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $machine_brand = $_POST['machine_brand'];
        $brand_id = $_POST['brand_id'];
        $machine_type = $_POST['machine_type'];
        $type_id = $_POST['type_id'];
        $machine_name = $_POST['machine_name'];
        $machine_id = $_POST['machine_id'];
        $machine_code = $_POST['machine_code'];
        $serialnumber = $_POST['serialnumber'];
        
        $brand_id = !empty($brand_id) ? $brand_id : null;
        $type_id = !empty($type_id) ? $type_id : null;
        $machine_id = !empty($machine_id) ? $machine_id : null;

        $query = "UPDATE job_register SET 
                         machine_brand=?, 
                         brand_id=?, 
                         machine_type=?,
                         type_id=?, 
                         machine_name=?, 
                         machine_id=?,
                         machine_code=?,
                         serialnumber=? 
                  WHERE jobregister_id=?";

        $stmt = $conn->prepare($query);
        
        $stmt->bind_param('ssssssssi', $machine_brand, $brand_id, $machine_type, $type_id, $machine_name,
                                       $machine_id, $machine_code, $serialnumber, $jobregister_id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $res = ['status' => 200, 
                        'message' => 'Job successfully updated'];
            }
            
            else {
                $res = ['status' => 200, 
                        'message' => 'No changes made'];
            }
        }
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Update error: ' . $stmt->error];
        }

        $stmt->close();

        echo json_encode($res);
    }

    // Update Job Assign
    if (isset($_POST['update_jobAssign'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        
        $query = "UPDATE job_register SET job_assign=?, 
                                          technician_rank=?, 
                                          staff_position=? 
                  WHERE jobregister_id=?";

        $stmt = $conn->prepare($query);
        
        $stmt->bind_param('sssi', $job_assign, $technician_rank, $staff_position, $jobregister_id);
                                    
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $res = ['status' => 200, 
                        'message' => 'Job assign successfully updated'];
            }
            
            else {
                $res = ['status' => 200, 
                        'message' => 'No changes made'];
            }
        }
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Update error: ' . $stmt->error];
        }
        
        $stmt->close();
        
        echo json_encode($res);
    }

    // Submit Assistant
    if (isset($_POST['submit_Assistant'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $usernames = $_POST['username'];
        $ass_date = $_POST['ass_date'];
        $cust_name = $_POST['cust_name'];
        $requested_date = $_POST['requested_date'];
        $machine_name = $_POST['machine_name'];
    
        $usernameString = implode("\n\n", $usernames);
    
        $query = "INSERT INTO assistants (jobregister_id, username, ass_date, cust_name, requested_date, machine_name) 
                  VALUES (?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bind_param('ssssss', $jobregister_id, $usernameString, $ass_date, 
                                    $cust_name, $requested_date, $machine_name);
    
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $res = ['status' => 200, 
                        'message' => 'Assistant successfully added'];
            } 
            
            else {
                $res = ['status' => 200, 
                        'message' => 'No changes made'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Submit error: ' . $stmt->error];
        }
    
        $stmt->close();
    
        echo json_encode($res);
    }
        
    // Delete Assistant
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM assistants WHERE id = ?";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param('i', $id);
        
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $res = ['status' => 200, 
                        'message' => 'Assistant deleted successfully'];
            } 
            
            else {
                $res = ['status' => 200, 
                        'message' => 'No changes made'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Deleting error: ' . $stmt->error];
        }
    
        $stmt->close();
    
        echo json_encode($res);
    }
        
    // Upload photo Before
    if (isset($_POST['upload_photoBefore'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowImg = array('png', 'jpeg', 'jpg', 'jfif');
            $target_dir = 'image/';
    
            foreach ($_FILES['file_name']['name'] as $key => $value) {
                $fileExnt = pathinfo($_FILES['file_name']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExnt, $allowImg) &&
                    $_FILES['file_name']['size'][$key] > 0 &&
                    $_FILES['file_name']['error'][$key] == 0) {
    
                    $originalFileName = $_FILES['file_name']['name'][$key];
    
                    if (move_uploaded_file($_FILES['file_name']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $photoInsertQuery = "INSERT INTO technician_photoupdate (jobregister_id, file_name, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $photoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            if (mysqli_stmt_execute($stmt)) {
                                $res = ['status' => 200,
                                        'message' => 'Photo uploaded successfully'];
                            } 
                            
                            else {
                                $res = ['status' => 500,
                                        'message' => 'Error uploading photos: ' . $stmt->error];
                            }
    
                            mysqli_stmt_close($stmt);
                        } 
                        
                        else {
                            $res = ['status' => 500,
                                    'message' => 'Error: ' . $conn->error];
                        }
                    }
                }
            }
        } 
        
        catch (Exception $e) {
            $res = ['status' => 500,
                    'message' => 'Submit error: ' . $e->getMessage()];
        }
    
        echo json_encode($res);
    }
    
    // Delete Photo Before 
    if(isset($_POST['delete_photoBefore'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_photoupdate WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $query_run = mysqli_stmt_execute($stmt);
    
            if ($query_run) {
                $res = ['status' => 200, 
                        'message' => 'Photo Deleted Successfully'];
            } 
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Photo Not Deleted'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Prepared statement failed'];
    
            echo json_encode($res);
        }
    }

    // Upload photo After
    if (isset($_POST['upload_photoAfter'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowImg = array('png', 'jpeg', 'jpg', 'jfif');
            $target_dir = 'image/';
    
            foreach ($_FILES['file_name']['name'] as $key => $value) {
                $fileExnt = pathinfo($_FILES['file_name']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExnt, $allowImg) &&
                    $_FILES['file_name']['size'][$key] > 0 &&
                    $_FILES['file_name']['error'][$key] == 0) {
    
                    $originalFileName = $_FILES['file_name']['name'][$key];
    
                    if (move_uploaded_file($_FILES['file_name']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $photoInsertQuery = "INSERT INTO technician_photoupdate (jobregister_id, file_name, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $photoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            if (mysqli_stmt_execute($stmt)) {
                                $res = ['status' => 200,
                                        'message' => 'Photo uploaded successfully'];
                            } 
                            
                            else {
                                $res = ['status' => 500,
                                        'message' => 'Error uploading photos: ' . $stmt->error];
                            }
    
                            mysqli_stmt_close($stmt);
                        } 
                        
                        else {
                            $res = ['status' => 500,
                                    'message' => 'Error: ' . $conn->error];
                        }
                    }
                }
            }
        } 
        
        catch (Exception $e) {
            $res = ['status' => 500,
                    'message' => 'Submit error: ' . $e->getMessage()];
        }
    
        echo json_encode($res);
    }

    // Delete Photo After
    if(isset($_POST['delete_photoAfter'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_photoupdate WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $query_run = mysqli_stmt_execute($stmt);
    
            if ($query_run) {
                $res = ['status' => 200, 
                        'message' => 'Photo Deleted Successfully'];
            } 
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Photo Not Deleted'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Prepared statement failed'];
    
            echo json_encode($res);
        }
    }

    // Upload Video Before
    if (isset($_POST['upload_videoBefore'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowImg = array('mp4', '3gp', 'webm', 'mov', 'avi', 'mkv');
            $target_dir = 'image/';
    
            foreach ($_FILES['video_url']['name'] as $key => $value) {
                $fileExnt = pathinfo($_FILES['video_url']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExnt, $allowImg) &&
                    $_FILES['video_url']['size'][$key] > 0 &&
                    $_FILES['video_url']['error'][$key] == 0) {
    
                    $originalFileName = $_FILES['video_url']['name'][$key];
    
                    if (move_uploaded_file($_FILES['video_url']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $photoInsertQuery = "INSERT INTO technician_videoupdate (jobregister_id, video_url, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $photoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            if (mysqli_stmt_execute($stmt)) {
                                $res = ['status' => 200, 
                                        'message' => 'Video uploaded successfully'];
                            }
                            
                            else {
                                $res = ['status' => 500, 
                                        'message' => 'Error uploading Videos: ' . $stmt->error];
                            }
    
                            mysqli_stmt_close($stmt);
                        }
                        
                        else {
                            $res = ['status' => 500, 
                                    'message' => 'Error: ' . $conn->error];
                        }
                    }
                }
            }
        }
        
        catch (Exception $e) {
            $res = ['status' => 500, 
                    'message' => 'Submit error: ' . $e->getMessage()];
        }
    
        echo json_encode($res);
    }
    
    // Delete Video Before 
    if(isset($_POST['delete_videoBefore'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_videoupdate WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $query_run = mysqli_stmt_execute($stmt);
    
            if ($query_run) {
                $res = ['status' => 200, 
                        'message' => 'Video Deleted Successfully'];
            } 
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Video Not Deleted'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Prepared statement failed'];
    
            echo json_encode($res);
        }
    }

    // Upload Video After
    if (isset($_POST['upload_videoAfter'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowImg = array('mp4', '3gp', 'webm', 'mov', 'avi', 'mkv');
            $target_dir = 'image/';
    
            foreach ($_FILES['video_url']['name'] as $key => $value) {
                $fileExnt = pathinfo($_FILES['video_url']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExnt, $allowImg) &&
                    $_FILES['video_url']['size'][$key] > 0 &&
                    $_FILES['video_url']['error'][$key] == 0) {
    
                    $originalFileName = $_FILES['video_url']['name'][$key];
    
                    if (move_uploaded_file($_FILES['video_url']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $photoInsertQuery = "INSERT INTO technician_videoupdate (jobregister_id, video_url, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $photoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            if (mysqli_stmt_execute($stmt)) {
                                $res = ['status' => 200, 
                                        'message' => 'Video uploaded successfully'];
                            }
                            
                            else {
                                $res = ['status' => 500, 
                                        'message' => 'Error uploading Videos: ' . $stmt->error];
                            }
    
                            mysqli_stmt_close($stmt);
                        }
                        
                        else {
                            $res = ['status' => 500, 
                                    'message' => 'Error: ' . $conn->error];
                        }
                    }
                }
            }
        }
        
        catch (Exception $e) {
            $res = ['status' => 500, 
                    'message' => 'Submit error: ' . $e->getMessage()];
        }
    
        echo json_encode($res);
    }

    // Delete Video After 
    if(isset($_POST['delete_videoAfter'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_videoupdate WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            $query_run = mysqli_stmt_execute($stmt);
    
            if ($query_run) {
                $res = ['status' => 200, 
                        'message' => 'Video Deleted Successfully'];
            } 
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Video Not Deleted'];
            }
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Prepared statement failed'];
    
            echo json_encode($res);
        }
    }

    // Update Job Status
    if (isset($_POST['update_jobStatus'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $job_status = $_POST['job_status'];
        $reason = $_POST['reason'];

        // Check if technician_departure, technician_arrival, and technician_leaving are not empty
        if ($job_status === 'Completed') {
            $technician_departure = $_POST['technician_departure'];
            $technician_arrival = $_POST['technician_arrival'];
            $technician_leaving = $_POST['technician_leaving'];
            
            if (empty($technician_departure) || empty($technician_arrival) || empty($technician_leaving)) {
                $res = ['status' => 400, 
                        'message' => 'Please fill in all tehnician update time before changing the status to Completed'];
                
                echo json_encode($res);
                
                exit;
            }
        }
        
        // Check if the reason is fill for Pending or Incomplete status
        if (($job_status === 'Pending' || $job_status === 'Incomplete') && empty($reason)) {
            $res = ['status' => 400, 
                    'message' => 'Please provide a reason.'];
            
            echo json_encode($res);
            
            exit;
        }
        
        $query = "UPDATE job_register SET job_status=?, reason=? WHERE jobregister_id=?";
        $queryResult = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($queryResult, 'ssi', $job_status, $reason, $jobregister_id);
        mysqli_stmt_execute($queryResult);
        
        if (mysqli_stmt_affected_rows($queryResult) > 0) {
            $res = ['status' => 200, 
                    'message' => 'Job Status successfully updated'];
            
            echo json_encode($res);
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Update error: ' . $conn->error];
            
            echo json_encode($res);
        }
    }

    // Job Support
    if (isset($_POST['submit_jobSupport'])) {
        $today_date = $_POST['today_date'];
        $accessories_required = $_POST['accessories_required'];
        $accessories_for = $_POST['accessories_for'];
        $support = $_POST['support'];
        $job_priority = $_POST['job_priority'];
        $job_order_number = $_POST['job_order_number'];
        $job_name = $_POST['job_name'];
        $job_code = $_POST['job_code'];
        $job_description = $_POST['job_description'];
        $requested_date = $_POST['requested_date'];
        $delivery_date = $_POST['delivery_date'];
        $customer_name = $_POST['customer_name'];
        $customer_code = $_POST['customer_code'];
        $cust_address1 = $_POST['cust_address1'];
        $cust_address2 = $_POST['cust_address2'];
        $cust_address3 = $_POST['cust_address3'];
        $customer_grade = $_POST['customer_grade'];
        $customer_PIC = $_POST['customer_PIC'];
        $cust_phone1 = $_POST['cust_phone1'];
        $cust_phone2 = $_POST['cust_phone2'];
        $machine_brand = $_POST['machine_brand'];
        $brand_id = $_POST['brand_id'];
        $machine_type = $_POST['machine_type'];
        $type_id = $_POST['type_id'];
        $machine_name = $_POST['machine_name'];
        $machine_id = $_POST['machine_id'];
        $machine_code = $_POST['machine_code'];
        $serialnumber = $_POST['serialnumber'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $jobregistercreated_by = $_POST['jobregistercreated_by'];
        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];
        
        $query = "INSERT INTO job_register (today_date, accessories_required, accessories_for, support, job_priority,
                                            job_order_number, job_name, job_code, job_description, requested_date,
                                            delivery_date, customer_name, customer_code, cust_address1, cust_address2,
                                            cust_address3, customer_grade, customer_PIC, cust_phone1, cust_phone2,
                                            machine_brand, brand_id, machine_type, type_id, machine_name,
                                            machine_id, machine_code, serialnumber, job_assign, technician_rank,
                                            staff_position, jobregistercreated_by, jobregisterlastmodify_by) 
            
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                          
        $queryResult = mysqli_prepare($conn, $query);
        
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'sssssssssssssssssssssssssssssssss',
                                  $today_date, $accessories_required, $accessories_for, $support, $job_priority,
                                  $job_order_number, $job_name, $job_code, $job_description, $requested_date,
                                  $delivery_date, $customer_name, $customer_code, $cust_address1, $cust_address2,
                                  $cust_address3, $customer_grade, $customer_PIC, $cust_phone1, $cust_phone2,
                                  $machine_brand, $brand_id, $machine_type, $type_id, $machine_name,
                                  $machine_id, $machine_code, $serialnumber, $job_assign, $technician_rank,
                                  $staff_position, $jobregistercreated_by, $jobregisterlastmodify_by);
                                  
            if (mysqli_stmt_execute($queryResult)) {
                $res = ['status' => 200, 
                        'message' => 'Support Job Successfully Submitted'];
                        
                echo json_encode($res);
            } 
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Error: ' . mysqli_error($conn)];
                
                echo json_encode($res);
            }
            
            mysqli_stmt_close($queryResult);
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Error: ' . mysqli_error($conn)];
            echo json_encode($res);
        }
    }

    // Job Duplicate
    if (isset($_POST['submit_jobDuplicate'])) {
        $today_date = $_POST['today_date'];
        $accessories_required = $_POST['accessories_required'];
        $accessories_for = $_POST['accessories_for'];
        $reason = $_POST['reason'];
        $job_priority = $_POST['job_priority'];
        $job_order_number = $_POST['job_order_number'];
        $job_name = $_POST['job_name'];
        $job_code = $_POST['job_code'];
        $job_description = $_POST['job_description'];
        $requested_date = $_POST['requested_date'];
        $delivery_date = $_POST['delivery_date'];
        $customer_name = $_POST['customer_name'];
        $customer_code = $_POST['customer_code'];
        $cust_address1 = $_POST['cust_address1'];
        $cust_address2 = $_POST['cust_address2'];
        $cust_address3 = $_POST['cust_address3'];
        $customer_grade = $_POST['customer_grade'];
        $customer_PIC = $_POST['customer_PIC'];
        $cust_phone1 = $_POST['cust_phone1'];
        $cust_phone2 = $_POST['cust_phone2'];
        $machine_brand = $_POST['machine_brand'];
        $brand_id = $_POST['brand_id'];
        $machine_type = $_POST['machine_type'];
        $type_id = $_POST['type_id'];
        $machine_name = $_POST['machine_name'];
        $machine_id = $_POST['machine_id'];
        $machine_code = $_POST['machine_code'];
        $serialnumber = $_POST['serialnumber'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $jobregistercreated_by = $_POST['jobregistercreated_by'];
        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];
        
        $query = "INSERT INTO job_register (today_date, accessories_required, accessories_for, reason, job_priority,
                                            job_order_number, job_name, job_code, job_description, requested_date,
                                            delivery_date, customer_name, customer_code, cust_address1, cust_address2,
                                            cust_address3, customer_grade, customer_PIC, cust_phone1, cust_phone2,
                                            machine_brand, brand_id, machine_type, type_id, machine_name,
                                            machine_id, machine_code, serialnumber, job_assign, technician_rank,
                                            staff_position, jobregistercreated_by, jobregisterlastmodify_by) 
            
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                          
        $queryResult = mysqli_prepare($conn, $query);
        
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'sssssssssssssssssssssssssssssssss',
                                  $today_date, $accessories_required, $accessories_for, $reason, $job_priority,
                                  $job_order_number, $job_name, $job_code, $job_description, $requested_date,
                                  $delivery_date, $customer_name, $customer_code, $cust_address1, $cust_address2,
                                  $cust_address3, $customer_grade, $customer_PIC, $cust_phone1, $cust_phone2,
                                  $machine_brand, $brand_id, $machine_type, $type_id, $machine_name,
                                  $machine_id, $machine_code, $serialnumber, $job_assign, $technician_rank,
                                  $staff_position, $jobregistercreated_by, $jobregisterlastmodify_by);
                                  
            if (mysqli_stmt_execute($queryResult)) {
                $res = ['status' => 200, 
                        'message' => 'Job is successfully duplicate'];
                        
                echo json_encode($res);
            } 
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Error: ' . mysqli_error($conn)];
                
                echo json_encode($res);
            }
            
            mysqli_stmt_close($queryResult);
        } 
        
        else {
            $res = ['status' => 500, 
                    'message' => 'Error: ' . mysqli_error($conn)];
            echo json_encode($res);
        }
    }

?>
