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

    // Update Job Info
    if (isset($_POST['update_jobInfo'])) {
        $jobregister_id = $_POST['jobregister_id'];
        $job_code = $_POST['job_code'];
        $job_name = $_POST['job_name'];
        $job_order_number = $_POST['job_order_number'];
        $job_description = $_POST['job_description'];
        $job_cancel = $_POST['job_cancel'];
        $job_status = $_POST['job_status'];
        $reason = $_POST['reason'];
        $customer_code = $_POST['customer_code'];
        $customer_name = $_POST['customer_name'];
        $customer_grade = $_POST['customer_grade'];
        $job_priority = $_POST['job_priority'];
        $requested_date = $_POST['requested_date'];
        $delivery_date = $_POST['delivery_date'];
        $customer_PIC = $_POST['customer_PIC'];
        $cust_phone1 = $_POST['cust_phone1'];
        $cust_phone2 = $_POST['cust_phone2'];
        $cust_address1 = $_POST['cust_address1'];
        $cust_address2 = $_POST['cust_address2'];
        $cust_address3 = $_POST['cust_address3'];
        $machine_code = $_POST['machine_code'];
        $machine_name = $_POST['machine_name'];
        $machine_type = $_POST['machine_type'];
        $machine_brand = $_POST['machine_brand'];
        $serialnumber = $_POST['serialnumber'];
        $accessories_required = $_POST['accessories_required'];
        $accessories_for = $_POST['accessories_for'];
        $jobregistercreated_by = $_POST['jobregistercreated_by'];
        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];

        $machine_id = !empty($_POST['machine_id']) ? $_POST['machine_id'] : null;
        $type_id = !empty($_POST['type_id']) ? $_POST['type_id'] : null;
        $brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : null;
        
        $query = "UPDATE job_register SET
                         job_code=?,
                         job_name=?,
                         job_order_number=?,
                         job_description=?,
                         job_cancel=?,
                         job_status=?,
                         reason=?,
                         customer_code=?,
                         customer_name=?,
                         customer_grade=?,
                         job_priority=?,
                         requested_date=?,
                         delivery_date=?,
                         customer_PIC=?,
                         cust_phone1=?, 
                         cust_phone2=?,
                         cust_address1=?,
                         cust_address2=?,
                         cust_address3=?,
                         machine_id=?,
                         machine_code=?,
                         machine_name=?,
                         machine_type=?,
                         type_id=?,
                         machine_brand=?,
                         brand_id=?,
                         serialnumber=?,
                         accessories_required=?,
                         accessories_for=?,
                         jobregisterlastmodify_by=?
                  WHERE jobregister_id=?";

        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            $machine_id = $machine_id ?: null;
            $type_id = $type_id ?: null;
            $brand_id = $brand_id ?: null;

            mysqli_stmt_bind_param($queryResult, 'ssssssssssssssssssssssssssssssi', $job_code,
                                   $job_name, $job_order_number, $job_description, $job_cancel,
                                   $job_status, $reason, $customer_code, $customer_name, $customer_grade,
                                   $job_priority, $requested_date, $delivery_date, $customer_PIC,
                                   $cust_phone1, $cust_phone2, $cust_address1, $cust_address2, $cust_address3,
                                   $machine_id, $machine_code, $machine_name, $machine_type, $type_id, 
                                   $machine_brand, $brand_id, $serialnumber, $accessories_required,
                                   $accessories_for, $jobregisterlastmodify_by, $jobregister_id);
    
            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Job info successfully updated'];

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

    // Job Support
    if (isset($_POST['submit_jobSupport'])) {
        $today_date = $_POST['today_date'];
        $job_code = $_POST['job_code'];
        $job_name = $_POST['job_name'];
        $job_order_number = $_POST['job_order_number'];
        $job_description = $_POST['job_description'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $support = $_POST['support'];
        $customer_code = $_POST['customer_code'];
        $customer_name = $_POST['customer_name'];
        $customer_grade = $_POST['customer_grade'];
        $job_priority = $_POST['job_priority'];
        $requested_date = $_POST['requested_date'];
        $delivery_date = $_POST['delivery_date'];
        $customer_PIC = $_POST['customer_PIC'];
        $cust_phone1 = $_POST['cust_phone1'];
        $cust_phone2 = $_POST['cust_phone2'];
        $cust_address1 = $_POST['cust_address1'];
        $cust_address2 = $_POST['cust_address2'];
        $cust_address3 = $_POST['cust_address3'];
        $machine_code = $_POST['machine_code'];
        $machine_name = $_POST['machine_name'];
        $machine_type = $_POST['machine_type'];
        $machine_brand = $_POST['machine_brand'];
        $serialnumber = $_POST['serialnumber'];
        $accessories_required = $_POST['accessories_required'];
        $accessories_for = $_POST['accessories_for'];
        $jobregistercreated_by = $_POST['jobregistercreated_by'];
        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];

        $machine_id = !empty($_POST['machine_id']) ? $_POST['machine_id'] : null;
        $type_id = !empty($_POST['type_id']) ? $_POST['type_id'] : null;
        $brand_id = !empty($_POST['brand_id']) ? $_POST['brand_id'] : null;

        $query = "INSERT INTO job_register (today_date, job_code, job_name, job_order_number, job_description,
                                            job_assign, technician_rank, staff_position, support, customer_code,
                                            customer_name, customer_grade, job_priority, requested_date, delivery_date,
                                            customer_PIC, cust_phone1, cust_phone2, cust_address1, cust_address2, cust_address3,
                                            machine_id, machine_code, machine_name, machine_type, type_id, machine_brand,
                                            brand_id, serialnumber, accessories_required, accessories_for,
                                            jobregistercreated_by, jobregisterlastmodify_by) 
            
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                          ?, ?, ?)";
                          
        $queryResult = mysqli_prepare($conn, $query);
        
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'sssssssssssssssssssssssssssssssss', $today_date, $job_code,
                                   $job_name, $job_order_number, $job_description, $job_assign, $technician_rank,
                                   $staff_position, $support, $customer_code, $customer_name, $customer_grade,
                                   $job_priority, $requested_date, $delivery_date, $customer_PIC, $cust_phone1, 
                                   $cust_phone2, $cust_address1, $cust_address2, $cust_address3, $machine_id,
                                   $machine_code, $machine_name, $machine_type, $type_id, $machine_brand, $brand_id,
                                   $serialnumber, $accessories_required, $accessories_for, $jobregistercreated_by, 
                                   $jobregisterlastmodify_by);
                                  
            if (mysqli_stmt_execute($queryResult)) {
                $res = ['status' => 200, 
                        'message' => 'Support Job Successfully Registered'];
                        
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
    
        $usernameString = implode("\n\n", $usernames);
    
        $query = "INSERT INTO assistants (jobregister_id, username, ass_date, cust_name, 
                                          requested_date, machine_name) 
                  
                  VALUES (?, ?, ?, ?, ?, ?)";
                  
        $queryResult = mysqli_prepare($conn, $query);
    
        if ($queryResult) {
            mysqli_stmt_bind_param($queryResult, 'ssssss', $jobregister_id, $usernameString, $ass_date, 
                                   $cust_name, $requested_date, $machine_name);

            $success = mysqli_stmt_execute($queryResult);

            if ($success) {
                $res = ['status' => 200,
                        'message' => 'Assistant successfully added'];

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
   
    // Upload photo Before
    if (isset($_POST['upload_photoBefore'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowImg = array('png', 'jpeg', 'jpg', 'jfif');
            $target_dir = 'image/';
    
            foreach ($_FILES['file_name']['name'] as $key => $value) {
                $fileExt = pathinfo($_FILES['file_name']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExt, $allowImg) && $_FILES['file_name']['size'][$key] > 0 && $_FILES['file_name']['error'][$key] == 0) {
                    
                    $originalFileName = $_FILES['file_name']['name'][$key];
                    $tempFilePath = $_FILES['file_name']['tmp_name'][$key];
                    $destinationFilePath = $target_dir . $originalFileName;
                    
                    compressImage($tempFilePath, $destinationFilePath, $fileExt);
                    
                    if (file_exists($destinationFilePath)) {
                        $photoInsertQuery = "INSERT INTO technician_photoupdate (jobregister_id, file_name, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $photoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            $success = mysqli_stmt_execute($stmt);
    
                            if ($success) {
                                $res = ['status' => 200,
                                        'message' => 'Photo uploaded successfully'];
                            }
                            
                            else {
                                $res = ['status' => 500,
                                        'message' => 'Error uploading photos: ' . mysqli_error($conn)];
                            }
    
                            mysqli_stmt_close($stmt);
                        }
                        
                        else {
                            $res = ['status' => 500,
                                    'message' => 'Error: ' . mysqli_error($conn)];
                        }
                    }
                    
                    else {
                        $res = ['status' => 500,
                                'message' => 'Error: Compressed file does not exist at ' . $destinationFilePath];
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
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowImg = array('png', 'jpeg', 'jpg', 'jfif');
            $target_dir = 'image/';
    
            foreach ($_FILES['file_name']['name'] as $key => $value) {
                $fileExt = pathinfo($_FILES['file_name']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExt, $allowImg) && $_FILES['file_name']['size'][$key] > 0 && $_FILES['file_name']['error'][$key] == 0) {
                    
                    $originalFileName = $_FILES['file_name']['name'][$key];
                    $tempFilePath = $_FILES['file_name']['tmp_name'][$key];
                    $destinationFilePath = $target_dir . $originalFileName;
                    
                    compressImage($tempFilePath, $destinationFilePath, $fileExt);
                    
                    if (file_exists($destinationFilePath)) {
                        $photoInsertQuery = "INSERT INTO technician_photoupdate (jobregister_id, file_name, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $photoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            $success = mysqli_stmt_execute($stmt);
    
                            if ($success) {
                                $res = ['status' => 200,
                                        'message' => 'Photo uploaded successfully'];
                            }
                            
                            else {
                                $res = ['status' => 500,
                                        'message' => 'Error uploading photos: ' . mysqli_error($conn)];
                            }
    
                            mysqli_stmt_close($stmt);
                        }
                        
                        else {
                            $res = ['status' => 500,
                                    'message' => 'Error: ' . mysqli_error($conn)];
                        }
                    }
                    
                    else {
                        $res = ['status' => 500,
                                'message' => 'Error: Compressed file does not exist at ' . $destinationFilePath];
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

    function compressImage($source, $destination, $fileExt) {
        $quality = 50;
        
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
            
            $pngQuality = 9;
            
            imagepng($image, $destination, $pngQuality);
        }
        
        else {
            error_log('Unsupported file extension: ' . $fileExt);
            
            return false;
        }
        
        imagedestroy($image);
        
        return true;
    }

    // Upload Video Before
    if (isset($_POST['upload_videoBefore'])) {
        try {
            $jobregister_id = $_POST['jobregister_id'];
            $description = $_POST['description'];
            $allowVideo = array('mp4', '3gp', 'webm', 'mov', 'avi', 'mkv');
            $target_dir = 'image/';
    
            foreach ($_FILES['video_url']['name'] as $key => $value) {
                $fileExnt = pathinfo($_FILES['video_url']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExnt, $allowVideo) &&
                    $_FILES['video_url']['size'][$key] > 0 &&
                    $_FILES['video_url']['error'][$key] == 0) {
    
                    $originalFileName = $_FILES['video_url']['name'][$key];
    
                    if (move_uploaded_file($_FILES['video_url']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $videoInsertQuery = "INSERT INTO technician_videoupdate (jobregister_id, video_url, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $videoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            $success = mysqli_stmt_execute($stmt);
    
                            if ($success) {
                                $res = ['status' => 200,
                                        'message' => 'Video uploaded successfully'];
                            }
                            
                            else {
                                $res = ['status' => 500,
                                        'message' => 'Error: ' . mysqli_error($conn)];
                            }
    
                            mysqli_stmt_close($stmt);
                        }
                        
                        else {
                            $res = ['status' => 500,
                                    'message' => 'Error: ' . mysqli_error($conn)];
                        }
                    }
                }
            }
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
            $description = $_POST['description'];
            $allowVideo = array('mp4', '3gp', 'webm', 'mov', 'avi', 'mkv');
            $target_dir = 'image/';
    
            foreach ($_FILES['video_url']['name'] as $key => $value) {
                $fileExnt = pathinfo($_FILES['video_url']['name'][$key], PATHINFO_EXTENSION);
    
                if (in_array($fileExnt, $allowVideo) &&
                    $_FILES['video_url']['size'][$key] > 0 &&
                    $_FILES['video_url']['error'][$key] == 0) {
    
                    $originalFileName = $_FILES['video_url']['name'][$key];
    
                    if (move_uploaded_file($_FILES['video_url']['tmp_name'][$key], $target_dir . $originalFileName)) {
                        $videoInsertQuery = "INSERT INTO technician_videoupdate (jobregister_id, video_url, description) 
                                             VALUES (?, ?, ?)";
    
                        $stmt = mysqli_prepare($conn, $videoInsertQuery);
    
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'iss', $jobregister_id, $originalFileName, $description);
    
                            $success = mysqli_stmt_execute($stmt);
    
                            if ($success) {
                                $res = ['status' => 200,
                                        'message' => 'Video uploaded successfully'];
                            } else {
                                $res = ['status' => 500,
                                        'message' => 'Error uploading videos: ' . mysqli_error($conn)];
                            }
    
                            mysqli_stmt_close($stmt);
                        } else {
                            $res = ['status' => 500,
                                    'message' => 'Error preparing statement: ' . mysqli_error($conn)];
                        }
                    }
                }
            }
        } catch (Exception $e) {
            $res = ['status' => 500,
                    'message' => 'Submit error: ' . $e->getMessage()];
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
?>
