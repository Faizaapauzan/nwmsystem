<?php
include "dbconnect.php";

if (isset($_GET['customer_name'])) {
    $customer_name = $_GET['customer_name'];
    $result = mysqli_query($conn, "SELECT * FROM machine_list WHERE customer_name='$customer_name'");
    $options = "<option value=''>Select Serial Number</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='{$row['serialnumber']}'>{$row['serialnumber']}</option>";
    }

    echo $options;
} else {
    echo "<option value=''>Select Serial Number</option>";
}
?>

