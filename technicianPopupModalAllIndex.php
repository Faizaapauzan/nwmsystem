<?php

    include 'dbconnect.php';
    
    // Fetch data
    if (isset($_GET['jobregister_id'])) {
        $jobregister_id = $_GET['jobregister_id'];
        
        $queries = [
            'job_register' => "SELECT * FROM job_register WHERE jobregister_id = ?",
            'assistants' => "SELECT * FROM assistants WHERE jobregister_id = ?",
            'job_accessories' => "SELECT * FROM job_accessories WHERE jobregister_id = ?",
            'photos_before' => "SELECT * FROM technician_photoupdate WHERE description = 'Machine (Before Service)' AND jobregister_id = ?",
            'photos_after' => "SELECT * FROM technician_photoupdate WHERE description = 'Machine (After Service)' AND jobregister_id = ?",
            'videos_before' => "SELECT * FROM technician_videoupdate WHERE description = 'Machine (Before Service)' AND jobregister_id = ?",
            'videos_after' => "SELECT * FROM technician_videoupdate WHERE description = 'Machine (After Service)' AND jobregister_id = ?"
        ];

        $data = [];

        foreach ($queries as $key => $query) {
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            $data[$key] = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[$key][] = $row;
            }
            mysqli_stmt_close($stmt);
        }

        if (count($data['job_register']) == 1) {
            $res = [
                'status' => 200,
                'message' => 'Info Fetch Successfully',
                'data' => $data['job_register'][0],
                'assistant' => $data['assistants'],
                'jobAccessories' => $data['job_accessories'],
                'photosBefore' => $data['photos_before'],
                'photosAfter' => $data['photos_after'],
                'videosBefore' => $data['videos_before'],
                'videosAfter' => $data['videos_after'],
            ];
        }
        
        else {
            $res = ['status' => 404,
                    'message' => 'Data Not Found',];
        }

        echo json_encode($res);
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
                                          tech_out=?, 
                                          tech_in=? 
                                          
                  WHERE jobregister_id=?";
        
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'sssssi', $technician_departure, $technician_arrival, 
                                   $technician_leaving, $tech_out, $tech_in, $jobregister_id);
            
            $success = mysqli_stmt_execute($queryResult);
    
            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Time successfully updated'];
    
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
    
    // Update Job Info
    if (isset($_POST['update_jobInfo'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $machine_brand = $_POST['machine_brand'];
        $machine_type = $_POST['machine_type'];
        $machine_name = $_POST['machine_name'];
        $machine_code = $_POST['machine_code'];
        $serialnumber = $_POST['serialnumber'];
        
        $machine_id = !empty($_POST['machine_id']) ? $_POST['machine_id'] : null;
        $type_id = !empty($_POST['type_id']) ? $_POST['type_id'] : null;
        $brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : null;
    
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
    
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'ssssssssi', $machine_brand, $brand_id, $machine_type, $type_id, $machine_name,
                                                              $machine_id, $machine_code, $serialnumber, $jobregister_id);
    
            if (mysqli_stmt_execute($queryResult)) {
                $res = ['status' => 200, 
                        'message' => 'Job info successfully updated'];
            }
            
            else {
                $res = ['status' => 500, 
                        'message' => 'Error: ' . mysqli_error($conn)];
            }
            
            mysqli_stmt_close($queryResult);
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Prepare failed: ' . mysqli_error($conn)];
        }
    
        echo json_encode($res);
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
        $machine_type = $_POST['machine_type'];
        $machine_name = $_POST['machine_name'];
        $machine_code = $_POST['machine_code'];
        $serialnumber = $_POST['serialnumber'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $jobregistercreated_by = $_POST['jobregistercreated_by'];
        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];

        $machine_id = !empty($_POST['machine_id']) ? $_POST['machine_id'] : null;
        $type_id = !empty($_POST['type_id']) ? $_POST['type_id'] : null;
        $brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : null;
        
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
        $machine_type = $_POST['machine_type'];
        $machine_name = $_POST['machine_name'];
        $machine_code = $_POST['machine_code'];
        $serialnumber = $_POST['serialnumber'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $jobregistercreated_by = $_POST['jobregistercreated_by'];
        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];

        $machine_id = !empty($_POST['machine_id']) ? $_POST['machine_id'] : null;
        $type_id = !empty($_POST['type_id']) ? $_POST['type_id'] : null;
        $brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : null;
        
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

        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'sssi', $job_assign, $technician_rank, $staff_position, $jobregister_id);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Job assign update successfully updated'];

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

    // Submit Assistant
    if (isset($_POST['submit_Assistant'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $usernames = $_POST['username'];
        $ass_date = $_POST['ass_date'];
        $cust_name = $_POST['cust_name'];
        $requested_date = $_POST['requested_date'];
        $machine_name = $_POST['machine_name'];
    
        $usernameString = implode("\n", $usernames);
    
        $query = "INSERT INTO assistants (jobregister_id, username, ass_date, cust_name, 
                                          requested_date, machine_name)

                  VALUES (?, ?, ?, ?, ?, ?)";
                  
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'ssssss', $jobregister_id, $usernameString, $ass_date, 
                                   $cust_name, $requested_date, $machine_name);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $updatedAssistantsQuery = "SELECT * FROM assistants WHERE jobregister_id = ?";
                
                $stmt = mysqli_prepare($conn, $updatedAssistantsQuery);
                        mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
                        mysqli_stmt_execute($stmt);
                
                $result = mysqli_stmt_get_result($stmt);
        
                $assistants = [];
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $assistants[] = $row;
                }
                
                mysqli_stmt_close($stmt);

                $res = ['status' => 200,
                        'message' => 'Assistant successfully added',
                        'assistant' => $assistants];
            }
            
            else {
                $res = ['status' => 500,
                        'message' => 'Error: ' . mysqli_error($conn)];
            }
            
            echo json_encode($res);

            mysqli_stmt_close($queryResult);
        }

        else {
            $res = ['status' => 500,
                    'message' => 'Error: ' . mysqli_error($conn)];

            echo json_encode($res);
        }
    }

    // Delete Assistant
    if (isset($_POST['idAss'])) {
        $id = $_POST['idAss'];
        
        $query = "DELETE FROM assistants WHERE id = ?";
        
        $queryResult = mysqli_prepare($conn, $query);
        
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'i', $id);
            
            $success = mysqli_stmt_execute($queryResult);
            
            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Assistant deleted successfully'];

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

    function compressImage($source, $destination, $fileExt) {
        $fileSize = filesize($source) / 1024;
        
        if ($fileSize > 5000) {
            $quality = 30;
        }
        
        elseif ($fileSize > 2000) {
            $quality = 50;
        }
        
        else {
            $quality = 70;
        }
        
        if ($fileExt == 'jpeg' || $fileExt == 'jpg') {
            $image = imagecreatefromjpeg($source);
            
            if ($image === false) {
                error_log('Failed to create image from source: ' . $source);
                
                return false;
            }
            
            imagejpeg($image, $destination, $quality);
        }
        
        elseif ($fileExt == 'png') {
            $image = imagecreatefrompng($source);
            
            if ($image === false) {
                error_log('Failed to create image from source: ' . $source);
                
                return false;
            }
            
            $pngQuality = 9 - round(($quality / 100) * 9);
            
            imagepng($image, $destination, $pngQuality);
        }
        
        else {
            error_log('Unsupported file extension: ' . $fileExt);
            
            return false;
        }
        
        imagedestroy($image);
        
        return true;
    }

    function uploadFiles($conn, $jobregister_id, $description, $files, $target_dir, $tableName, $field_name) {
        $responseFiles = [];
        
        try {
            $allowExts = ['png', 'jpeg', 'jpg', 'jfif'];
    
            foreach ($files['name'] as $key => $value) {
                $fileExt = pathinfo($files['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExt, $allowExts) && $files['size'][$key] > 0 && $files['error'][$key] == 0) {
                    $originalFileName = uniqid() . '-' . basename($files['name'][$key]);
                    $tempFilePath = $files['tmp_name'][$key];
                    $destinationFilePath = $target_dir . $originalFileName;
    
                    compressImage($tempFilePath, $destinationFilePath, $fileExt);
    
                    if (file_exists($destinationFilePath)) {
                        $insertQuery = "INSERT INTO $tableName (jobregister_id, $field_name, description) VALUES (?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $insertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
    
                            $responseFiles[] = [
                                'id' => mysqli_insert_id($conn),
                                'file_name' => $originalFileName,
                            ];
                        }
                    }
                }
            }
            
            return ['status' => 200, 'message' => 'Files uploaded successfully', 'uploadedFiles' => $responseFiles];
        }
        
        catch (Exception $e) {
            return ['status' => 500, 'message' => 'Error: ' . $e->getMessage()];
        }
    }

    // Upload photo before
    if (isset($_POST['upload_photoBefore'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $description = $_POST['description'];
        
        $response = uploadFiles($conn, $jobregister_id, $description, $_FILES['file_name'], 'image/', 'technician_photoupdate', 'file_name');

        $query = "SELECT * FROM technician_photoupdate WHERE description = 'Machine (Before Service)' AND jobregister_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
    
        $photosBefore = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $photosBefore[] = $row;
        }
    
        mysqli_stmt_close($stmt);
        
        $response['photosBefore'] = $photosBefore;
    
        echo json_encode($response);
    }
    

    // Delete Photo Before 
    if(isset($_POST['delete_photoBefore'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_photoupdate WHERE id = ?";
        
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'i', $id);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Photo deleted successfully'];

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

    // Upload photo After
    if (isset($_POST['upload_photoAfter'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $description = $_POST['description'];
        
        $response = uploadFiles($conn, $jobregister_id, $description, $_FILES['file_name'], 'image/', 'technician_photoupdate', 'file_name');

        $query = "SELECT * FROM technician_photoupdate WHERE description = 'Machine (After Service)' AND jobregister_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
    
        $photosAfter = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $photosAfter[] = $row;
        }
    
        mysqli_stmt_close($stmt);
        
        $response['photosAfter'] = $photosAfter;
    
        echo json_encode($response);
    }

    // Delete Photo After
    if(isset($_POST['delete_photoAfter'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_photoupdate WHERE id = ?";
        
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'i', $id);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Photo deleted successfully'];

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
    
    // Upload Video Before
    if (isset($_POST['upload_videoBefore'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = 'Machine (Before Service)';
            $allowVideo = array('mp4', '3gp', 'webm', 'mov', 'avi', 'mkv');
            $target_dir = 'image/';
    
            foreach ($_FILES['video_url']['name'] as $key => $value) {
                $fileExt = pathinfo($_FILES['video_url']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExt, $allowVideo) &&
                    $_FILES['video_url']['size'][$key] > 0 &&
                    $_FILES['video_url']['error'][$key] == 0) {
    
                    $originalFileName = uniqid() . '-' . $_FILES['video_url']['name'][$key];
    
                    if (move_uploaded_file($_FILES['video_url']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $videoInsertQuery = "INSERT INTO technician_videoupdate (jobregister_id, video_url, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $videoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
            }
    
            $query = "SELECT * FROM technician_videoupdate WHERE description = 'Machine (Before Service)' AND jobregister_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            
            mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
    
            $videosBefore = [];
            
            while ($row = mysqli_fetch_assoc($result)) {
                $videosBefore[] = $row;
            }
    
            mysqli_stmt_close($stmt);
    
            $res = ['status' => 200,
                    'message' => 'Videos uploaded successfully',
                    'videosBefore' => $videosBefore];
        }
        
        catch (Exception $e) {
            $res = ['status' => 500,
                    'message' => 'Error: ' . $e->getMessage()];
        }
    
        echo json_encode($res);
    }
        
    // Delete Video Before 
    if(isset($_POST['delete_videoBefore'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_videoupdate WHERE id = ?";
        
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'i', $id);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Video deleted successfully'];

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

    // Upload Video After
    if (isset($_POST['upload_videoAfter'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = 'Machine (After Service)';
            $allowVideo = array('mp4', '3gp', 'webm', 'mov', 'avi', 'mkv');
            $target_dir = 'image/';
    
            foreach ($_FILES['video_url']['name'] as $key => $value) {
                $fileExt = pathinfo($_FILES['video_url']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExt, $allowVideo) &&
                    $_FILES['video_url']['size'][$key] > 0 &&
                    $_FILES['video_url']['error'][$key] == 0) {
    
                    $originalFileName = uniqid() . '-' . $_FILES['video_url']['name'][$key];
    
                    if (move_uploaded_file($_FILES['video_url']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $videoInsertQuery = "INSERT INTO technician_videoupdate (jobregister_id, video_url, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $videoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
            }
    
            $query = "SELECT * FROM technician_videoupdate WHERE description = 'Machine (After Service)' AND jobregister_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            
            mysqli_stmt_bind_param($stmt, 'i', $jobregister_id);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
    
            $videosAfter = [];
            
            while ($row = mysqli_fetch_assoc($result)) {
                $videosAfter[] = $row;
            }
    
            mysqli_stmt_close($stmt);
    
            $res = ['status' => 200,
                    'message' => 'Videos uploaded successfully',
                    'videosAfter' => $videosAfter];
        }
        
        catch (Exception $e) {
            $res = ['status' => 500,
                    'message' => 'Error: ' . $e->getMessage()];
        }
    
        echo json_encode($res);
    }
        
    // Delete Video After 
    if(isset($_POST['delete_videoAfter'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        
        $query = "DELETE FROM technician_videoupdate WHERE id = ?";
        
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'i', $id);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Video deleted successfully'];

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
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'ssi', $job_status, $reason, $jobregister_id);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Job Status successfully updated'];

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