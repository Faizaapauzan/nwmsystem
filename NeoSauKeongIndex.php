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
            
            $res = ['status' => 200,
                    'message' => 'Info Fetch Successfully',
                    'data' => $info];
    
            echo json_encode($res);
        } 
        
        else {
            $res = ['status' => 404,
                    'message' => 'Data Not Found',];
    
            echo json_encode($res);
        }
    }

    // Update Job Assign
    if (isset($_POST['assignJob'])) {
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
?>