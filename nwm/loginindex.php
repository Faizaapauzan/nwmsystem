<!DOCTYPE html>
<html>

<head>
	<title>login</title>
</head>

<body>

	<?php
	include 'dbconnect.php';
	?>

	<?php



	// Taking all 2 values from the form data(input)

	if (isset($_REQUEST['submit'])) {
		$login_id = $_REQUEST['login_id'];
		$username = $_REQUEST['Username'];
		$password = $_REQUEST['Password'];
		$log_in_at = $_REQUEST['log_in_at'];
	}


	// Performing insert query execution
	// here our table name is college


	// $sql = "INSERT INTO log_in  VALUES ('DEFAULT',
	//         '$username','$password',now())";

	$sql = "INSERT INTO log_in (login_id, Username, Password, log_in_at)
VALUES ('default', '$username', '$password', now())";



	if (mysqli_query($conn, $sql)) {
		$login_id = mysqli_insert_id($conn);
		echo "<h3>data stored in a database successfully."
			. " Please browse your localhost php my admin"
			. " to view the updated data</h3>";

		echo nl2br("\n$username\n $password\n ");

		header("location: Adminhomepage.php");
	} else {
		echo "ERROR: Hush! Sorry $sql. "
			. mysqli_error($conn);
	}

	// Close connection
	mysqli_close($conn);
	?>

</body>

</html>