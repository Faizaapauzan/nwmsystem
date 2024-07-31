<?php
include "dbconnect.php";

if (isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    $result = mysqli_query($conn, "SELECT * FROM machine_type WHERE brand_id='$brand_id'");
    $options = "<option value=''>Select Machine Type</option>";

    while ($row = mysqli_fetch_assoc($result)) {
        $options .= "<option value='{$row['type_name']}'>{$row['type_name']}</option>";
    }

    echo $options;
} else {
    echo "<option value=''>Select Machine Type</option>";
}
?>
