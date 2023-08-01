<?php

// Get the user id

if (isset($_REQUEST['jobregister_id'])) {

    $entry = $_REQUEST['jobregister_id'];

    // Database connection
    include 'dbconnect.php';

    if ($entry !== "") {
        $query = mysqli_query($conn, "SELECT accessories_name,accessories_quantity FROM job_register,job_accessories WHERE job_register.jobregister_id= job_accessories.jobregister_id AND job_register.jobregister_id='$entry';");

        while ($row = mysqli_fetch_array($query)) {
            $accessories[] = array(
                "name" => $row["accessories_name"],
            );
        }
    }

    echo json_encode($accessories);
    exit;
}  else if (isset($_REQUEST['accessory_name'])) {

    $entry = $_REQUEST['accessory_name'];

    // Database connection
    include 'dbconnect.php';
    $query = mysqli_query($conn, "SELECT accessories_quantity FROM job_register,job_accessories WHERE job_register.jobregister_id= job_accessories.jobregister_id AND job_accessories.accessories_name='$entry';");
    $row = mysqli_fetch_array($query);
    $quantity = $row['accessories_quantity'];

    echo json_encode($quantity);
    exit;
}
?>
