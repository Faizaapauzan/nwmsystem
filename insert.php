<?php
//insert.php
if(isset($_POST["submit"]))
{
 include("dbconnect.php");
$machine_name = mysqli_real_escape_string($conn, $_POST["machine_name"]);
$machine_type = mysqli_real_escape_string($conn, $_POST["machine_type"]);
$machine_brand = mysqli_real_escape_string($conn, $_POST["machine_brand"]);
$serialnumber = mysqli_real_escape_string($conn, $_POST["serialnumber"]);
$machine_description = mysqli_real_escape_string($conn, $_POST["machine_description"]);

 $query = "INSERT INTO comments(comment_subject, comment_text)
 VALUES ('$machine_name', '$machine_type','$machine_brand', '$serialnumber','$machine_description')
 ";
 mysqli_query($conn, $query);
}
?>