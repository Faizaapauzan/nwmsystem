<?php

// Get the user id

if (isset($_REQUEST['jobregister_id'])) {

    $entry = $_REQUEST['jobregister_id'];

    // Database connection
    include 'dbconnect.php';

    if ($entry !== "") {
        $query = mysqli_query($conn, "SELECT job_assign, accessories_name,accessories_quantity FROM job_register,job_accessories WHERE job_register.jobregister_id= job_accessories.jobregister_id AND job_register.jobregister_id='$entry';");

        while ($row = mysqli_fetch_array($query)) {
            $accessories[] = array(
                "name" => $row["accessories_name"],
                "jobassign" => $row["job_assign"]
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
}else if (isset($_REQUEST['accessory_id'])){
    $entry = $_REQUEST['accessory_id'];
    include 'dbconnect.php';

    $query = mysqli_query($conn, "SELECT * FROM accessories_list WHERE accessories_id='$entry'");
    $row = mysqli_fetch_array($query);
    $code = $row['accessories_code'];
    $name = $row['accessories_name'];
    $uom = $row['accessories_uom'];

    $res = ['status' => 200, 'code' => $code, 'name' => $name, 'uom' => $uom];

    echo json_encode($res);
    exit;
}
?>
