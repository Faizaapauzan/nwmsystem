<?php session_start(); ?>

<!DOCTYPE html>
<head>
<link href="css/ajaxtechupdate.css"rel="stylesheet" />
</head>

<body>

    <!-- To open ajax -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['customer_name']) && isset($_POST['job_assign']) && isset($_POST['requested_date'])) { 
          $customer_name =$_POST['customer_name'];
          $job_assign =$_POST['job_assign'];
          $requested_date =$_POST['requested_date'];
          $query = "SELECT * FROM job_register 
                    WHERE customer_name ='$customer_name'
                    AND job_assign ='$job_assign'
                    AND requested_date ='$requested_date'
                    ORDER BY customer_name DESC LIMIT 1";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>

      <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
      <input type="hidden" name="job_assign" value="<?php echo $row['job_assign'] ?>">
      <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
      
    <?php } } } ?>

    <!-- To update travel time and rest hour -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['customer_name']) && isset($_POST['job_assign']) && isset($_POST['requested_date'])) { 
          $customer_name =$_POST['customer_name'];
          $job_assign =$_POST['job_assign'];
          $requested_date =$_POST['requested_date'];
          $query = "SELECT * FROM job_update 
                    WHERE customer_name ='$customer_name'
                    AND tech_name ='$job_assign'
                    AND requested_date ='$requested_date'
                    ORDER BY customer_name DESC LIMIT 1";
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