<?php

session_start();


include 'dbconnect.php';


$username = $_POST['username'];
$password = $_POST['password'];


$sql = mysqli_query($conn,"SELECT * FROM staff_register WHERE username='$username' and password='$password'");

$cek = mysqli_num_rows($sql);


if($cek > 0){

 $data = mysqli_fetch_assoc($sql);


 if($data['staff_position']=="Admin"){

  $_SESSION['username'] = $username;
  $_SESSION['staff_position'] = "Admin";

  header("location:Adminhomepage.php");

 }else if($data['staff_position']=="Technician" AND $data['technician_rank']=="1st Leader"){

  $_SESSION['username'] = $username;
  $_SESSION['staff_position'] = "Technician";
  $_SESSION['technician_rank'] = "1st Leader"; 
  
  header("location:technician.php");

 }else if($data['staff_position']=="Technician" AND $data['technician_rank']=="2nd Leader"){
	
  $_SESSION['username'] = $username;
  $_SESSION['staff_position'] = "Technician";
  $_SESSION['technician_rank'] = "2nd Leader"; 
  
  header("location:technician.php");	
	 
	 
 }else if($data['staff_position']=="Storekeeper"){
	 
	$_SESSION['username'] = $username;
	$_SESSION['staff_position'] = "Storekeeper";
	header("location:store.php");

}else if($data['username']=="KEONG"){

	$_SESSION['username'] = $KEONG;
	header("location:neosaukeong.php"); 
    	 
 }else{

  header("location:index.html?pesan=gagal");
 } 
}else{
 header("location:index.html?pesan=gagal");
}

?>