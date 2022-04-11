<?php
include 'dbconnect.php';

 if (isset($_POST['jobregister_id'])) {
     $jobregister_id =$_POST['jobregister_id'];



     $sql = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'"; // Fetch data from the table customers using id
     $result=mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
 }
?>