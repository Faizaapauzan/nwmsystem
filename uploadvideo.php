<?php
include 'dbconnect.php';

    if ($conn->connect_error) {
        die("Connection failed". $conn->connect_error);
    }

    $response = array('success' => false);

    if (!empty($_FILES['multipleVideo']['name'])) {

        $jobregister_id = $_POST['jobregister_id'];
        $description = $_POST['description'];

        $multiplevideo = $_FILES['multipleVideo']['name'];

        foreach ($multiplevideo as $name => $value) {
            
            $allowImg = array('mp4','mov','mkv','avi','');   

            $fileExnt = explode('.', $multiplevideo[$name]);

            if (in_array($fileExnt[1], $allowImg)) {

                if ($_FILES['multipleVideo']['size'][$name] > 0 && $_FILES['multipleVideo']['error'][$name]== 0) {
                    
                    $fileTmp = $_FILES['multipleVideo']['tmp_name'][$name];
                    
                    $newFile =  rand(). '.'. $fileExnt[1];

                    $target_dir = 'image/'.$newFile; 

                    if (move_uploaded_file($fileTmp, $target_dir)) {

                         $query = "INSERT INTO `technician_videoupdate`(`jobregister_id`, `video_url`,`description`) VALUES ('$jobregister_id','$newFile','$description')";

                        mysqli_query($conn, $query);
                    }

                }
            }
        }
    }   

          if($query)
{
    $response['success'] = true;
	
} 

echo json_encode($response);

?>