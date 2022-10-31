<?php
include 'dbconnect.php';

    if(isset($_POST['update']))
    {   
        $jobregister_id = $_POST['jobregister_id'];
        $accessories_required = $_POST['accessories_required'];
        $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];

        $query = "UPDATE job_register SET
                        
accessories_required='$accessories_required',
jobregisterlastmodify_by ='$jobregisterlastmodify_by'

WHERE jobregister_id='$jobregister_id'";

$query_run = mysqli_query($conn, $query);

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