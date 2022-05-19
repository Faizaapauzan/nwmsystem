<?php
//fetch.php;

	include("dbconnect.php");
	
if(isset($_POST["view"])){
	

	if($_POST["view"] != ''){
		mysqli_query($conn,"update `job_register` set status='1' where status='0'");
	}
	
	$query=mysqli_query($conn,"select * from `job_register` order by jobregister_id desc limit 8");
	$output = '';
 
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
	$output .= '
	<li>
		<a href="#">
        <strong>New Job created!</strong><br/>
		Job-number: <strong>'.$row['job_order_number'].'</strong><br />
		Created by: <strong>'.$row['jobregistercreated_by'].'</strong>
		</a>
	</li>
	
	';
	}
	}
	else{
	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
	}
	
	$query1=mysqli_query($conn,"select * from  `job_register` where status='0' ");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
	
}
?>



