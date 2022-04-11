<?php 

include 'dbconnect.php';

//code check customer code
	
	$result = mysqli_query($conn,"SELECT count(*) FROM accessories_list WHERE accessories_code ='" . $_POST["accessories_code"] . "'");
	$row = mysqli_fetch_row($result);
	$accessories_code_count = $row[0];
	if($accessories_code_count>0) echo "<span style='color:red'> Accessories Code Already Exist </span>";
	
	

	else

		//insert into database
	
	{
        if (isset($_POST['save_acc'])) {
            $accessories_code  = $_POST['accessories_code'];
            $accessories_name = $_POST['accessories_name'];
            $accessories_group = $_POST['accessories_group'];
            $accessories_description = $_POST['accessories_description'];
            $file_name = $_POST['file_name'];
            $accessorieslistcreated_by = $_POST['accessorieslistcreated_by'];
            $accessorieslistlasmodify_by = $_POST['accessorieslistlasmodify_by'];

        
            $sql = "INSERT INTO accessories_list (accessories_code, accessories_name, accessories_group,
											   accessories_description, file_name, accessorieslistcreated_by, accessorieslistlasmodify_by) 
					VALUES ('$accessories_code', '$accessories_name', '$accessories_group',
							'$accessories_description', '$file_name', '$accessorieslistcreated_by', '$accessorieslistlasmodify_by')";
                            
            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($query) {
                echo "Data Saved Successfully";
            } else {
                echo "Failed to save data";
            }
        }
    }

?>