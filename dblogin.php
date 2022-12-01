<?php session_start();

include 'dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn,"SELECT * FROM staff_register WHERE username='$username'");

$cek = mysqli_num_rows($sql);

if($cek > 0) {

 $data = mysqli_fetch_assoc($sql);

 if($data['staff_position']=="Admin" AND password_verify($password, $data['password'])) {

  $_SESSION['username'] = $username;
  $_SESSION['staff_position'] = "Admin";

  header("location:Adminhomepage.php");
  }

  else if($data['username']=="KEONG" AND password_verify($password, $data['password'])){
	  
	  $_SESSION['username'] = $username;
	  header("location:NeoSauKeong.php");
  }
  
 
 else if($data['staff_position']=="Leader" AND $data['technician_rank']=="1st Leader" AND password_verify($password, $data['password'])){

  $_SESSION['username'] = $username;
  $_SESSION['staff_position'] = "Leader";
  $_SESSION['technician_rank'] = "1st Leader"; 
  
  header("location:technician.php");
 }
 
 else if($data['staff_position']=="Leader" AND $data['technician_rank']=="2nd Leader" AND password_verify($password, $data['password'])){
	
  $_SESSION['username'] = $username;
  $_SESSION['staff_position'] = "Leader";
  $_SESSION['technician_rank'] = "2nd Leader"; 
  
  header("location:technician.php");	
 }
 
 else if($data['staff_position']=="Storekeeper" AND password_verify($password, $data['password'])) {
	 
	$_SESSION['username'] = $username;
	$_SESSION['staff_position'] = "Storekeeper";
	header("location:store.php");
}

else {
  header("location:index.php?error");
 }

}

else {
 header("location:index.php?error");
}

?>

