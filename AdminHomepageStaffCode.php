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

        $query2 = "SELECT * FROM machine_type WHERE brand_id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "s", $rows['brand_id']);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $rows2 = mysqli_fetch_all($result2);

        $query3 = "SELECT * FROM machine_list WHERE type_id = ?";
        $stmt3 = mysqli_prepare($conn, $query3);
        mysqli_stmt_bind_param($stmt3, "s", $type_id);
        mysqli_stmt_execute($stmt3);
        $result3 = mysqli_stmt_get_result($stmt3);
        $rows3 = mysqli_fetch_all($result3);

        $res = ['status' => 200, 'message' => 'Success', 'data' => $rows, 'data2' => $rows2, 'data3' => $rows3];
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

    if (isset($_POST['jobaccessories'])){
        $query2 = "SELECT * FROM job_accessories WHERE jobregister_id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "s", $jobregister_id);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $rows2 = mysqli_fetch_all($result2);

        $res = ['status' => 200, 'message' => 'Success', 'data2' => $rows2];
        echo json_encode($res);
    }

    if (isset($_POST['photo'])){
        $description = 'Machine (Before Service)';
        $query2 = "SELECT * FROM technician_photoupdate WHERE description= ? AND jobregister_id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "ss", $description, $jobregister_id);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $rows2 = mysqli_fetch_all($result2);

        $description2 = 'Machine (After Service)';
        $query3 = "SELECT * FROM technician_photoupdate WHERE description= ? AND jobregister_id = ?";
        $stmt3 = mysqli_prepare($conn, $query3);
        mysqli_stmt_bind_param($stmt3, "ss", $description2, $jobregister_id);
        mysqli_stmt_execute($stmt3);
        $result3 = mysqli_stmt_get_result($stmt3);
        $rows3 = mysqli_fetch_all($result3);

        $res = ['status' => 200, 'message' => 'Success', 'data2' => $rows2, 'data3' => $rows3];
        echo json_encode($res);
    }

    if (isset($_POST['video'])){
        $description = 'Machine (Before Service)';
        $query2 = "SELECT * FROM technician_videoupdate WHERE description= ? AND jobregister_id = ?";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt2, "ss", $description, $jobregister_id);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $rows2 = mysqli_fetch_all($result2);

        $description2 = 'Machine (After Service)';
        $query3 = "SELECT * FROM technician_videoupdate WHERE description= ? AND jobregister_id = ?";
        $stmt3 = mysqli_prepare($conn, $query3);
        mysqli_stmt_bind_param($stmt3, "ss", $description2, $jobregister_id);
        mysqli_stmt_execute($stmt3);
        $result3 = mysqli_stmt_get_result($stmt3);
        $rows3 = mysqli_fetch_all($result3);

        $res = ['status' => 200, 'message' => 'Success', 'data2' => $rows2, 'data3' => $rows3];
        echo json_encode($res);
    }
?>
