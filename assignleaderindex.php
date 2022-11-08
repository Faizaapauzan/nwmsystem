<?php
include 'dbconnect.php';

    $response = array('success' => false);

    if (isset($_POST['updateassign'])) {

        $jobregister_id = $_POST['jobregister_id'];
        $username = $_POST['username'];
        $assistantname=implode(",",$username);
        $ass_date = $_POST['ass_date'];

        $cust_name = $_POST['cust_name'];
        $requested_date = $_POST['requested_date'];
        $machine_name = $_POST['machine_name'];
      
    {
     
       $sql = "INSERT INTO assistants (jobregister_id , username , ass_date, cust_name , requested_date, machine_name) 
               VALUES ('$jobregister_id','$assistantname','$ass_date', '$cust_name','$requested_date','$machine_name')";
       
    

 if($conn->query($sql))
        {
            $response['success'] = true;
        }
        
        }
    }

echo json_encode($response);

                    ?>