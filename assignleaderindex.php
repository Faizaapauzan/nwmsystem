	<?php
	include 'dbconnect.php';
	?> 
	

	<?php

    $response = array('success' => false);

    if (isset($_POST['updateassign'])) {

        $jobregister_id = $_POST['jobregister_id'];
        $assistant = $_POST['assistant'];

       
        foreach ($assistant as $assistantlist)

        {

            $sql = "INSERT INTO assistants (jobregister_id , username) VALUES ('$jobregister_id','$assistantlist')";

             if($conn->query($sql))
        {
            $response['success'] = true;
        }
        
        }

        
     
    }

echo json_encode($response);


  
	?>