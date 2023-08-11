<?php 
    session_start();

    if (isset($_SESSION["username"]))
?>

<?php
    include 'dbconnect.php';
    
    if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];
      $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
      $query_run = mysqli_query($conn, $query);
      if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta name="keywords" content="" />
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">

      <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
      <link href="css/technicianmain.css"rel="stylesheet">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
      <script src="js/testing.js" type="text/javascript"></script>  
  
      <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    </head>
    
    <body>
      <form action="ajaxstorejobstatus.php" method="post" style="margin-right: 20px; margin-left: 20px;">
        <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        <div class="form-group">
          <label for="exampleFormControlSelect2">Job Status</label>
          <select class="form-control" type="text" id="job_status" name="job_status" onchange="myFunction()">
            <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
            <option value="Doing" <?php if($row['job_status'] == "Doing") { echo "SELECTED"; } ?>>Doing</option>
            <option value="Ready" <?php if($row['job_status'] == "Ready") { echo "SELECTED"; } ?>>Ready</option>
            <option value="Pending" <?php if($row['job_status'] == "Pending") { echo "SELECTED"; } ?>>Pending</option>
          </select>
        </div>
        
        <!--PENDING & INCOMPLETE REASON-->
        <div id="reasonInput" class="input-box">
          <label for="reason">Reason</label>
          <input type="text" id="reason" name="reason" value="<?php echo $row["reason"]; ?>">
          </br>
        </div>
        
        <script>
          function myFunction() {
            var jobStatus = document.getElementById("job_status").value;
            var reasonDiv = document.getElementById("reasonInput");
            
            if (jobStatus === "Pending") {
              reasonDiv.style.display = "block";
            }
            
            else {
              reasonDiv.style.display = "none";
            }
          }
          
          myFunction();
        </script>
        <!--PENDING & INCOMPLETE END REASON-->
        
        <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        <p class="control"><b id="messagestatus"></b></p>
        <div class="btn-box">
          <button type="submit" id="update" name="update" value="Update" style="width: 103px;padding-left: 29px;" class="buttonbiru" onclick="submitFormstatus();">Update</button>
          </br>
          </br>
        </div>
      </form>
      
      <?php
        if (isset($_POST['update'])) {
          $job_status = $_POST['job_status'];
          $reason = $_POST['reason'];
          $jobregisterlastmodify_by  = $_POST['jobregisterlastmodify_by'];
          
          $query = "UPDATE job_register SET
                           job_status ='$job_status',
                           reason ='$reason',
                           jobregisterlastmodify_by ='$jobregisterlastmodify_by'
                    WHERE jobregister_id='$jobregister_id'";
                    
          $query_run = mysqli_query($conn, $query);
          
          if ($query_run) {
            echo '<script> alert("Data Updated"); </script>';
            header("location:store.php");
          }
          
          else {
            echo '<script> alert("Data Not Updated"); </script>';
          }
        }
        } 
      ?>
      
      <?php } } ?>
    </body>
  </html>