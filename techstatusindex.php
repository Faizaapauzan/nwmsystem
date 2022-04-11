<?php 

include 'dbconnect.php';

if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT jobregister_id FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
  }

        if (isset($_POST['update_techstatus'])) {


           $job_status = $_POST['job_status'];

         $query = "UPDATE job_register SET job_status ='$job_status' WHERE jobregister_id='$jobregister_id'";
    
                            
            $query_run=mysqli_query($conn, $query) or die(mysqli_error($conn));
            if ($query_run) {
                echo "Data Saved Successfully";
            } else {
                echo "Failed to save data";
            }
        }
    

?>