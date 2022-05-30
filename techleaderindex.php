<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'nwmsystem');

    if(isset($_POST['update']))
    {   
        $jobregister_id = $_POST['jobregister_id'];
        $accessories_required = $_POST['accessories_required'];
        $job_assign = $_POST['job_assign'];
         $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $Job_assistant = $_POST['Job_assistant'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        $query = "UPDATE job_register SET
                        
accessories_required='$accessories_required',
job_assign ='$job_assign',
Job_assistant ='$Job_assistant',
technician_rank ='$technician_rank',
staff_position ='$staff_position',
jobregisterlastmodify_by ='$jobregisterlastmodify_by'

WHERE jobregister_id='$jobregister_id'";

$query_run = mysqli_query($connection, $query);

        {

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("Location:".$_SERVER["HTTP_REFERER"]);
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
    }
             ?>