<?php session_start(); ?>

<!DOCTYPE html>

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>NWM Technician Page</title>
	<link href="css/ajaxtechupdate.css" rel="stylesheet" />
    <link href="css/technicianmain.css" rel="stylesheet" />
    <link href="main.css" rel="stylesheet" />

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<script src="js/testing.js" type="text/javascript"></script>

</head>

<style>
  
.status{
  float:none;
}

</style>

<body>

<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
?>

 <form action="ajaxtechupdate.php" method="post">

    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

<label>Departure Time</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>" aria-describedby="basic-addon2">
</div>

<label>Arrival Time</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" name="technician_arrival" id="arrival" value="<?php echo $row['technician_arrival']?>" aria-describedby="basic-addon2">
</div>

<label>Leaving Time</label>
<div class="input-group mb-3">
  <input readonly type="text" class="form-control" name="technician_leaving" id="leaving" value="<?php echo $row['technician_leaving']?>" aria-describedby="basic-addon2">
</div>
    
    <p class="control"><b id="message"></b></p>
    <div class="updateBtn">
    </div>           
</form>

           <?php
        }
    }
    ?>

                   <?php
            } ?>
</body>
</html>