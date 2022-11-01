<?php 

include 'dbconnect.php';


		if (isset($_POST['submitassign'])) {

       $jobregister_id = $_POST['jobregister_id'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $DateAssign = $_POST['DateAssign'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

	
           
	 $query = "UPDATE job_register SET 
      technician_rank='".addslashes($technician_rank)."',
      staff_position='".addslashes($staff_position)."',
      job_assign='".addslashes($job_assign)."',
      DateAssign='".addslashes($DateAssign)."',
      jobregisterlastmodify_by='".addslashes($jobregisterlastmodify_by)."'

      WHERE jobregister_id='".addslashes($jobregister_id)."'";

			 $query_run = mysqli_query($conn, $query);
     
if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:Adminhomepage.php");
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>
	
