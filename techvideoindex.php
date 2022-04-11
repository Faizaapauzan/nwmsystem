<?php
session_start();
$con = mysqli_connect("localhost","root","","nwmsystem");

if (isset($_POST['hantar'])) {
    $jobregister_id = $_POST['jobregister_id'];
    $description = $_POST['description'];

    $file=$_FILES['files']['name'];
    $file_tmp=$_FILES['files']['tmp_name'];

    $targetDir = "image/";
    $allowTypes = array('mp4', 'webm', 'avi', 'flv');
     //implode is for upload in one row only
     
    if (!empty(array_filter($file))) {
        foreach ($file as $key=>$val) {
            $fileName = basename($_FILES['files']['name'][$key]);
            //  $filetmp = basename($_FILES['files']['tmp_name'][$key]);
            $filedescription = $description[$key];
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."','".$filedescription."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }  
    
            $query = "INSERT INTO `technician_videoupdate`(`jobregister_id`, `video_url`,`description`) VALUES ('$jobregister_id','$fileName','$filedescription')";
            $query_run = mysqli_query($con, $query);

            // mysqli_query($con, $query);
     
        }

        if ($query_run) {
 
            echo '<script> alert("Data Updated"); </script>';
            header("Location:".$_SERVER["HTTP_REFERER"]);
        } else {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

?>