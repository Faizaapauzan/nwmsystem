<?php 

include 'dbconnect.php';

//code check customer code
	
	$result = mysqli_query($conn,"SELECT count(*) FROM jobtype_list WHERE job_code='" . $_POST["job_code"] . "'");
	$row = mysqli_fetch_row($result);
	$job_code_count = $row[0];
	if($job_code_count>0) echo "<span style='color:red'> Job code Already Exist </span>";
	
	

	else

		//insert into database
	
	{
		if (isset($_POST['submit'])) {
            $job_code = $_POST['job_code'];
            $job_name = $_POST['job_name'];
            $job_description = $_POST['job_description'];
			$jobtypecreated_by = $_POST['jobtypecreated_by'];
            $jobtypelastmodify_by = $_POST['jobtypelastmodify_by'];

           
			$sql = "INSERT INTO jobtype_list (job_code, job_name, job_description, jobtypecreated_by, jobtypelastmodify_by)

					VALUES ('$job_code', '$job_name', '$job_description', '$jobtypecreated_by', '$jobtypelastmodify_by')";

			if (mysqli_query($conn, $sql)) {
				$job_code = mysqli_insert_id($conn);
			
				header( "Location: jobtype.php" ) ;;
			}
		}

	}
	
?>
