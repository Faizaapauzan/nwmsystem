
<?php
	//include connection file 
	include_once("dbconnect.php");
	
	//define index of column
	$columns = array(
		0 => 'accessories_name',
		1 => 'accessories_quantity',
        2 => 'accessories_remark'
	);
	$error = false;
	$colVal = '';
	$colIndex = $rowId = 0;
	
	$storesmsg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');

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
			$sql = "UPDATE job_accessories SET ".$columns[$colIndex]." = '".$colVal."' WHERE id='".$rowId."'";
			$status = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			$storesmsg = array('error' => $error, 'message' => 'Update Succeed !');
	} else {
		$storesmsg = array('error' => $error, 'message' => 'Update Failed !');
	}
	}
	// send data as json format
	echo json_encode($storesmsg);
	
?>
	