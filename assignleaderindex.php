<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'nwmsystem');

    if(isset($_POST['updateassign']))
    {   
        $jobregister_id = $_POST['jobregister_id'];
        $job_assign = $_POST['job_assign'];
        $technician_rank = $_POST['technician_rank'];
        $staff_position = $_POST['staff_position'];
        $Job_assistant = $_POST['Job_assistant'];
        $Job_assistant2 = $_POST['Job_assistant2'];
        $Job_assistant3 = $_POST['Job_assistant3'];
        $Job_assistant4 = $_POST['Job_assistant4'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        $query = "UPDATE job_register SET
                        
job_assign ='$job_assign',
Job_assistant ='$Job_assistant',
Job_assistant2 ='$Job_assistant2',
Job_assistant3 ='$Job_assistant3',
Job_assistant4 ='$Job_assistant4',
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