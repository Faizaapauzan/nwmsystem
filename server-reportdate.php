
<?php
	//include connection file 
	include_once("dbconnect.php");
	
	//define index of column
	$columns = array(
		1 =>'srvcreportdate', 

		
	);
	$error = false;
	$colVal = '';
	$colIndex = $rowId = 0;
	
	$msgdate = array('status' => !$error, 'msgdate' => 'Failed! updation in mysql');

	if(isset($_POST)){
    if(isset($_POST['val']) && !empty($_POST['val']) && !$error) {
      $colVal = $_POST['val'];
      $error = false;
      
    } else {
      $error = true;
    }
    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  !$error) {
      $colIndex = $_POST['index'];
      $error = false;
    } else {
      $error = true;
    }
    if(isset($_POST['jobregister_id']) && $_POST['jobregister_id'] > 0 && !$error) {
      $rowId = $_POST['jobregister_id'];
      $error = false;
    } else {
      $error = true;
    }
	
	if(!$error) {
			$sql = "UPDATE job_register SET ".$columns[$colIndex]." = '".$colVal."' WHERE jobregister_id='".$rowId."'";
			$status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			$msgdate = array('error' => $error, 'msgdate' => 'Update Succeed !');
	} else {
		$msgdate = array('error' => $error, 'msgdate' => 'Update Failed !');
	}
	}
	// send data as json format
	echo json_encode($msgdate);
	
?>
	