<?php 

include 'dbconnect.php';


//code check Employe ID availability
	
	$result = mysqli_query($conn,"SELECT count(*) FROM staff_register WHERE employee_id='" . $_POST["employee_id"] . "'");
	$row = mysqli_fetch_row($result);
	$employee_id_count = $row[0];
	if($employee_id_count>0) echo "<span style='color:red'> Employee ID Already Exist </span>";

	else
	
	{
		if (isset($_POST['submit'])) {
		$staffregister_id  = $_POST['staffregister_id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$staff_fullname = $_POST['staff_fullname'];
		$employee_id   = $_POST['employee_id'];
		$staff_phone  = $_POST['staff_phone'];
		$staff_email = $_POST['staff_email'];
		$staff_department  = $_POST['staff_department'];
		$staff_position = $_POST['staff_position'];
		$staff_group  = $_POST['staff_group'];
		$technician_group = $_POST['technician_group'];
		$technician_rank = $_POST['technician_rank'];
		$staffregistercreated_by = $_POST['staffregistercreated_by'];
		$staffregisterlastmodify_by = $_POST['staffregisterlastmodify_by'];
            
$sql = "INSERT INTO staff_register (staffregister_id, username, password, staff_fullname, employee_id,
     staff_phone, staff_email, staff_department, staff_position, staff_group, technician_group, technician_rank,
	 staffregistercreated_by, staffregistercreated_at, staffregisterlastmodify_by, staffregisterlastmodify_at)

					
VALUES ('default', '$username', '$password', '$staff_fullname', '$employee_id', '$staff_phone', '$staff_email', '$staff_department', '$staff_position', '$staff_group', '$technician_group', '$technician_rank', '$staffregistercreated_by',
     '$staffregistercreated_at', '$staffregisterlastmodify_by', now())";


			if (mysqli_query($conn, $sql)) {
				$employee_id = mysqli_insert_id($conn);
			
				header("location: staff.php");
			}
		}

	}
	
?>
