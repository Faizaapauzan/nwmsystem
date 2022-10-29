<?php session_start(); ?>

<?php
  $db = mysqli_connect("localhost", "Ithink", "iThink3399*");
  if(!$db)
    {
      die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>NWM Technician Photo Update</title>
	<link href="css/ajaxtechphtoupdt.css" rel="stylesheet"/>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	


</head>

<style media="screen">
    #preview{
      display: flex;
      width: 200px;
      height: 200px;
      border: 1px solid black;
      margin-top: -15px;
      flex-wrap: wrap;
      overflow-y: scroll;
    }
    #preview img{
      width: 50%;
      height: 50%;
    }

    
form .upload-report .input-box {
  padding-left: 49px;
  margin-bottom: 1px;
  margin-top: 7px;
  width: calc(100% / 2 - -302px);
  padding: 0 -9px 0 15px;
}
form .upload-report label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.upload-report .input-box input,
.upload-report .input-box select {
  height: 40px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.upload-report .input-box input:focus,
.upload-report .input-box input:valid,
.upload-report .input-box select:focus,
.upload-report .input-box select:valid {
  border-color: #081d45;
}



  </style>

<body>	

 <form id="submitForm">

<!-- for select job register id -->
<div>
      <?php
      include 'dbconnect.php';
      if (isset($_POST['jobregister_id'])) { 
        $jobregister_id =$_POST['jobregister_id'];
        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                
        <div class="input-box">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        </div>

 <?php }  } } ?>


 <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (Before Service)</label></b>
                 
 <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
      <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table style="box-shadow: 0 5px 10px #f7f7f7;" >
      <tbody style="display: flex; flex-wrap: wrap;">

			<?php foreach($queryRecords as $res) :?>
			<tr style="display:grid; padding-left: 25px; background-color: rgb(255 255 255 / 90%);" ><td><a href="image/<?php echo $res['file_name']; ?>" download>
      <img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>       
			<td >
      </td>
		  </tr> 
			<?php endforeach;?>

      </tbody>	
      </table>
      </div>
    </div>
 
   
</form>
<br/>

<!-- AFTER -->
 <form id="submitAfterForm">

<!-- for select job register id -->
<div>
      <?php
      include 'dbconnect.php';
      if (isset($_POST['jobregister_id'])) { 
        $jobregister_id =$_POST['jobregister_id'];
        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
   
        <div class="input-box">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

 <?php }  } } ?>

 <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (After Service)</label></b>
  
          
     <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>

    <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table style="box-shadow: 0 5px 10px #f7f7f7;" >
      <tbody style="display: flex; flex-wrap: wrap;">

			<?php foreach($queryRecords as $res) :?>
			<tr style="display:grid; padding-left: 25px; background-color: rgb(255 255 255 / 90%);" ><td><a href="image/<?php echo $res['file_name']; ?>" download>
      <img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>       
			<td >
      </td>
		</tr> 
			<?php endforeach;?>

 
      </tbody>	
      </table>
        </div>
    </div>
 
        
</form>
    
</body>
</html>