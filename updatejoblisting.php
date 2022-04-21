<?php

include 'dbconnect.php';

    if(isset($_POST['update_job']))
    {  

    $jobregister_id = $_POST['jobregister_id'];
    $job_assign = $_POST['job_assign'];

     $query = "UPDATE job_register SET job_assign ='$job_assign' WHERE jobregister_id='$jobregister_id'";
     $query_run = mysqli_query($conn, $query);
     
if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("Location:".$_SERVER["HTTP_REFERER"]);
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>
?>