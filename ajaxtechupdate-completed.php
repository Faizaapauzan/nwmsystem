<?php
    session_start();
    $showDate = date("d.m.Y");
    $_SESSION['storeDate'] = $showDate;
?>

<!DOCTYPE html>
<head>
  <meta name="keywords" content=""/>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
  <title>Job Update</title>
  <link href="css/technicianmain.css" rel="stylesheet"/>
  <link href="main.css" rel="stylesheet"/>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/testing.js" type="text/javascript"></script>
</head>

<body>

    <!-- To show travel time and rest hour -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['customer_name'])) { 
          $customer_name =$_POST['customer_name'];
          $query = "SELECT * FROM job_update 
                    WHERE customer_name ='$customer_name'
                    AND tech_name ='{$_SESSION['username']}'
                    AND storeDate ='{$_SESSION['storeDate']}'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="" method="post">

      <input type="hidden" name="jobupdate_id" value="<?php echo $row['jobupdate_id'] ?>">
      <label><?php echo $row['tech_name'] ?></label><br>
      <label><?php echo $row['storeDate'] ?></label><br>
      <label><?php echo $row['customer_name'] ?></label><br>

      <br>

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
      
      <label>Rest Hour</label>
      <div class="input-group mb-3">
        <input readonly type="text" style="position: static;" class="form-control" id="tech_out" name="tech_out" value="<?= $row['tech_out']; ?>" aria-describedby="basic-addon2">
      </div>
      
      <div class="input-group mb-3">
        <input readonly type="text" style="position: static;" class="form-control" id="tech_in" name="tech_in" value="<?= $row['tech_in']; ?>" aria-describedby="basic-addon2">
      </div>
    
    </form>
          
    <?php } } } ?>

</body>
</html>