<?php
    
    require 'dbconnect.php';

if (isset($_POST['jobregister_id'])) {
    $CompletedJobRegID = mysqli_real_escape_string($conn, $_POST['jobregister_id']);

    $query = "SELECT * FROM job_register WHERE jobregister_id=?";
    
   
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $CompletedJobRegID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $info = $result->fetch_assoc();

        $res = ['status' => 200, 'message' => 'Info Fetch Successfully', 'data' => $info];
        echo json_encode($res);
    } else {
        $res = ['status' => 404, 'message' => 'Info ID Not Found'];
        echo json_encode($res);
    }
}
?>
