<?php
include_once("dbconnect.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "select * from machine_type where brand_id=$id";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Type</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['type_id'] . '">' . $row['type_name'] . '</option>';
        }
    }
} elseif (!empty($_POST['sid'])) {
    $id = $_POST['sid'];
    $query1 = "select * from machine_list where type_id=$id";
    $result1 = mysqli_query($conn, $query1);
    if ($result1->num_rows > 0) {
        echo '<option value="">Select Serial Number</option><option value="Add Serial Number" style="color:darkblue;">Add Serial Number</option>';
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['machine_id'] . '">' . $row['serialnumber'] .  ' -   ' . $row['customer_name'].'</option>';
        }
    }
} elseif (!empty($_POST['idname'])){
    $id = $_POST['idname'];
    $query1 = "select * from machine_list where type_id=$id";
    $result1 = mysqli_query($conn, $query1);
    if ($result1->num_rows > 0) {
        echo '<option value="">Select Machine Name</option>';
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['machine_id'] . '">' . $row['machine_name'] .'</option>';
        }
    }
}
