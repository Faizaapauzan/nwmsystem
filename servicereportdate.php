<?php

$con = mysqli_connect("localhost","root","","nwmsystem");

    if (isset($_POST['submit-date'])) {

        # Date-button was clicked
        $jobregister_id = $_POST['jobregister_id'];
        $srvcreportdate = $_POST['srvcreportdate'];
        
        $sql = "UPDATE job_register SET srvcreportdate ='$srvcreportdate' WHERE jobregister_id='$jobregister_id'";
        
        $query=mysqli_query($con,$sql) or die(mysqli_error($con));
        
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