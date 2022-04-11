<?php 

include 'dbconnect.php';

//code check customer code
	
	$result = mysqli_query($conn,"SELECT count(*) FROM accessories_list WHERE accessories_code='" . $_POST["accessories_code"] . "'");
	$row = mysqli_fetch_row($result);
	$accessories_code_count = $row[0];
	if($accessories_code_count>0) echo "<span style='color:red'> accessories code Already Exist </span>";
	
	else

		//insert into database
	
	{
 
    if(isset($_POST['submit'])){

	$accessories_code = $_POST['accessories_code'];
    $accessories_name = $_POST['accessories_name'];
    $accessories_group = $_POST['accessories_group'];
    $accessories_description = $_POST['accessories_description'];
    $accessorieslistcreated_by = $_POST['accessorieslistcreated_by'];
    $accessorieslistlasmodify_by = $_POST['accessorieslistlasmodify_by'];

    // File upload configuration
    $targetDir = "image/";
    $allowTypes = array('jpg','png','jpeg','gif','jfif');
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    if(!empty(array_filter($_FILES['files']['name']))){
        foreach($_FILES['files']['name'] as $key=>$val){
            // File upload path
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
             
            // Check whether file type is valid
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                    // Image db insert sql
                    $insertValuesSQL .= "('".$accessories_code."','".$accessories_name."','".$accessories_group."','".$accessories_description."','".$fileName."','".$accessorieslistcreated_by."','".$accessorieslistlasmodify_by."'),";
                }else{
                    $errorUpload .= $_FILES['files']['name'][$key].', ';
                }
            }else{
                $errorUploadType .= $_FILES['files']['name'][$key].', ';
            }
        }
         
        if(!empty($insertValuesSQL)){
            $insertValuesSQL = trim($insertValuesSQL,',');
            // Insert image file name into database
            $insert = $conn->query("INSERT INTO accessories_list (accessories_code, accessories_name, accessories_group,
                                                            accessories_description,file_name, accessorieslistcreated_by, accessorieslistlasmodify_by ) VALUES $insertValuesSQL");
            if($insert){
                $errorUpload = !empty($errorUpload)?'Upload Error: '.$errorUpload:'';
                $errorUploadType = !empty($errorUploadType)?'File Type Error: '.$errorUploadType:'';
                $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType;
                $statusMsg = "Files are uploaded successfully.".$errorMsg;
                	header("location: accessories.php");
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
     
    // Display status message
    echo $statusMsg;
}
	}
	?>
