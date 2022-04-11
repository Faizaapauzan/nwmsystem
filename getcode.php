 <?php

// Get the user id
$accessories_id = $_POST['accessories_id'];

// Database connection
$conn = mysqli_connect("localhost", "root", "", "nwmsystem");

if ($accessories_id !== "") {
    $query = "SELECT accessories_code, accessories_name FROM accessories_list WHERE accessories_id='$accessories_id'";
    $result=mysqli_query($conn, $query);

    $data =  mysqli_fetch_assoc($result);
    // print_r($data);
    echo json_encode($data);
    exit();
}

    ?>