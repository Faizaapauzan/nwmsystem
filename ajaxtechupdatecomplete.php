<?php session_start(); ?>

<!DOCTYPE html>
<head>
<link href="css/ajaxtechupdate.css"rel="stylesheet" />
</head>

<body>

    <!-- To open ajax -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) { 

          $jobregister_id =$_POST['jobregister_id'];
          
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run)
            {
              while ($row = mysqli_fetch_array($query_run))
              {
    ?>

    <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    
    <form action="" method="post">
      <div class="input-box-departure">
        <label for="">Departure Time</label>
        <div class="technician-time">
          <input type="text" class="technician_departure" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure']?>">
        </div>
      </div>
      
      <div class="input-box-arrival">
        <label for="">Arrival Time</label>
        <div class="technician-time">
          <input type="text" class="technician_arrival" name="technician_arrival" id="arrival" value="<?php echo $row['technician_arrival']?>">
        </div>
      </div>
      
      <div class="input-box-leaving">
        <label for="">Leaving Time</label>
        <div class="technician-time">
          <input type="text" class="technician_leaving" name="technician_leaving" id="leaving" value="<?php echo $row['technician_leaving']?>">
        </div>
      </div>
      
      <div class="input-box-out">
        <label for="">Rest Hour</label>
        <div class="technician-time">
          <input type="text" class="technician_leaving" name="tech_out" id="tech_out" value="<?= $row['tech_out']; ?>">
          <input type="text" class="technician_leaving" name="tech_in" id="tech_in" value="<?= $row['tech_in']; ?>">
        </div>
      </div>
    
    </form>
          
    <?php } } } ?>

</body>
</html>