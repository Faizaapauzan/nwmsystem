<?php
$con = mysqli_connect("localhost", "root", "", "nwmsystem");

// Get the user id
// $machine_id = $_REQUEST['machine_id'];
// $machine_code = $_REQUEST['machine_code'];

// Database connection


// if ($machine_id !== "") {

if (isset($_GET['machine_id'])) {
    $machine_id =$_GET['machine_id'];

    $query = ("SELECT * FROM machine_list WHERE machine_id='$machine_id'");

    $result = $con->query($query);

    while ($row = $result->fetch_assoc()) {
        // Get the first name
        $machine_name = $row['machine_name'];
        $serialnumber = $row['serialnumber'];
        $machine_code = $row['machine_code'];
    }

    // Store it in a array
    $results = array("$machine_name" , "$serialnumber", "$machine_code");

    // Send in JSON encoded form
    $myJSON = json_encode($results);
    echo $myJSON;
}
?>