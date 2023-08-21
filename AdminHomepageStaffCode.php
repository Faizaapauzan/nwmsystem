<?php
    include 'dbconnect.php';

    $jobregister_id = mysqli_real_escape_string($conn, $_POST['jobregister_id']);

    $query = "SELECT * FROM job_register WHERE jobregister_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $jobregister_id);
    mysqli_stmt_execute($stmt);
    $result1 = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_array($result1);

    if (isset($_POST['jobinfo'])) {
        
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);

        // Query 2: Using prepared statements
        $query2 = "SELECT * FROM machine_list WHERE customer_name = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "s", $customer_name);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $rows2 = mysqli_fetch_all($result2);

        $res = ['status' => 200, 'message' => 'Success', 'data' => $rows, 'data2' => $rows2];
        echo json_encode($res);
    }

    if (isset($_POST['jobassign'])){
        $query2 = "SELECT * FROM assistants WHERE jobregister_id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "s", $jobregister_id);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $rows2 = mysqli_fetch_all($result2);

        $res = ['status' => 200, 'message' => 'Success', 'data2' => $rows2];
        echo json_encode($res);
    }
?>
