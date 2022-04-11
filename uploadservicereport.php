<?php
session_start();
$con = mysqli_connect("localhost","root","","nwmsystem");

if (isset($_POST['update'])) {

    $jobregister_id = $_POST['jobregister_id'];
    
    $file=$_FILES['files']['name'];
    $file_tmp=$_FILES['files']['tmp_name'];

    $targetDir = "servicereport/";
    $allowTypes = array('pdf');
     
    if (!empty(array_filter($file))) {
        foreach ($file as $key=>$val) {
            $fileName = basename($_FILES['files']['name'][$key]);
            // $filetmp = basename($_FILES['files']['tmp_name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }  
    
            $query = "INSERT INTO `servicereport`(`jobregister_id`, `file_name`) VALUES ('$jobregister_id','$fileName')";
            $query_run = mysqli_query($con, $query);

            // mysqli_query($con, $query);
     
        }

        if ($query_run) {
 
            echo '<script> alert("Report uploaded"); </script>';
            header("Location:".$_SERVER["HTTP_REFERER"]);
        } else {
            echo '<script> alert("Report failed to upload"); </script>';
        }
    }

?>