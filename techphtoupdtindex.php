<?php
session_start();
include 'dbconnect.php';

if (isset($_POST['update'])) {

   $total=count ($_FILES['files']['name']);
   for ($x=0;$x<$total;$x++){


    $jobregister_id = $_POST['jobregister_id'];
    $description = $_POST['description'];

    $file=$_FILES['files']['name'];
    $file_tmp=$_FILES['files']['tmp_name'];

    $targetDir = "image/";
    $allowTypes = array('jpg','png','jpeg','gif','jfif');
     //implode is for upload in one row only

    if (!empty(array_filter($file))) {
        foreach ($file as $x=>$val) {
            $fileName = basename($_FILES['files']['name'][$x]);
            //  $filetmp = basename($_FILES['files']['tmp_name'][s]);
            $filedescription = $description[$x];
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$x], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$fileName."','".$filedescription."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$x].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$x].', ';
    
        }  
    
            $query = "INSERT INTO `technician_photoupdate`(`jobregister_id`, `file_name`,`description`) VALUES ('$jobregister_id','$fileName','$filedescription')";
            $query_run = mysqli_query($conn, $query);

            // mysqli_query($con, $query);
     
        }
    }

        if ($query_run) {
 
            echo '<script> alert("Data Updated"); </script>';
            header("Location:".$_SERVER["HTTP_REFERER"]);
        } else {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }

}
?>