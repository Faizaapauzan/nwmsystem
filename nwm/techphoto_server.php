
<?php
	//include connection file 
	include_once("dbconnect.php");
	
	//define index of column
	$columns = array(
		0 =>'tech_photo', 
		1 => 'description',
		
	);
	$error = false;
	$colVal = '';
	$colIndex = $rowId = 0;
	
	$photomsg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

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
    if(isset($_POST['id']) && $_POST['id'] > 0 && !$error) {
      $rowId = $_POST['id'];
      $error = false;
    } else {
      $error = true;
    }
	
	if(!$error) {
			$sql = "UPDATE technician_photoupdate SET ".$columns[$colIndex]." = '".$colVal."' WHERE id='".$rowId."'";
			$status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			$photomsg = array('error' => $error, 'msg' => 'Update Succeed !');
	} else {
		$photomsg = array('error' => $error, 'msg' => 'Update Failed !');
	}
	}
	// send data as json format
	echo json_encode($photomsg);
	
?>
	