<?php
include 'dbconnect.php';

    $response = array('success' => false);

    if (isset($_POST['updateassign'])) {

        $jobregister_id = $_POST['jobregister_id'];
        $username = $_POST['username'];
        $ass_date = $_POST['ass_date'];

       $assistantname=implode(",",$username);
    {
     
       $sql = "INSERT INTO assistants (jobregister_id , username , ass_date) VALUES ('$jobregister_id','$assistantname','$ass_date')";
       
    

 if($conn->query($sql))
        {
            $response['success'] = true;
        }
        
        }

        
     
    }

echo json_encode($response);

                    ?>