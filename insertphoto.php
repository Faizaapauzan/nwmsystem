<?php
include "dbconnect.php";
if (isset($_POST['uploadImageBtn'])) {
    $uploadFolder = 'image/';
    $jobregister_id = $_POST['jobregister_id'];
    $description = $_POST['description'];
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);

        // save to database
        // $query = "INSERT INTO technician_photoupdate SET file_name='$imageName' " ;
          $query = "INSERT INTO `technician_photoupdate`(`jobregister_id`, `file_name`, `description`) VALUES ('$jobregister_id','$imageName','$description')";
        $run = $conn->query($query) or die("Error in saving image".$conn->error);
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
         header("Location:".$_SERVER["HTTP_REFERER"]);
        
    }
}