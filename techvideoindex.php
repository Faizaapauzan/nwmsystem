<?php
include "dbconnect.php";
if (isset($_POST['uploadVideoBtn'])) {
    $uploadFolder = 'image/';
    $jobregister_id = $_POST['jobregister_id'];
    $description = $_POST['description'];
    foreach ($_FILES['videoFile']['tmp_name'] as $key => $image) {
        $videoTmpName = $_FILES['videoFile']['tmp_name'][$key];
        $videoName = $_FILES['videoFile']['name'][$key];
        $result = move_uploaded_file($videoTmpName,$uploadFolder.$videoName);

        // save to database
        // $query = "INSERT INTO technician_photoupdate SET file_name='$imageName' " ;
          $query = "INSERT INTO `technician_videoupdate`(`jobregister_id`, `video_url`, `description`) VALUES ('$jobregister_id','$videoName','$description')";
        $run = $conn->query($query) or die("Error in saving image".$conn->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
         header("Location:".$_SERVER["HTTP_REFERER"]);
        
    }
}