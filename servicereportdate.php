<?php

include 'dbconnect.php';

    if (isset($_POST['submit-date'])) {

        # Date-button was clicked
        $jobregister_id = $_POST['jobregister_id'];
        $srvcreportdate = $_POST['srvcreportdate'];
        
        $sql = "UPDATE job_register SET srvcreportdate ='$srvcreportdate' WHERE jobregister_id='$jobregister_id'";
        
        $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        
        if($query)
        
        {
            echo "Data Saved Successfully";
        } else {
            echo "Failed to save data";
        }
            // redirecting back
            header("Location:".$_SERVER["HTTP_REFERER"]);
    }
?>