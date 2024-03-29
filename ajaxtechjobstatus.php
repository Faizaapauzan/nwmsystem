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
  <title>NWM Technician Page</title>
  <link href="css/technicianmain.css"rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/testing.js" type="text/javascript"></script>
</head>

</head>

<body>
  
  <form id="techstatus_form" method="post">
    
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

    <input type="hidden" name="technician_departure" class="technician_departure" value="<?php echo $row['technician_departure'] ?>">
    <input type="hidden" name="technician_arrival" class="technician_arrival" value="<?php echo $row['technician_arrival'] ?>">
    <input type="hidden" name="technician_leaving" class="technician_leaving" value="<?php echo $row['technician_leaving'] ?>">
    
    <div class="form-group">
      <label for="exampleFormControlSelect2">Job Status</label>
      <select class="form-control" type="text" id="job_status" name="job_status" onchange="myFunction()">
        <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
        <option value="Doing" <?php if($row['job_status'] == "Doing") { echo "SELECTED"; } ?>>Doing</option>
        <option value="Pending" <?php if($row['job_status'] == "Pending") { echo "SELECTED"; } ?>>Pending</option>
        <option value="Incomplete" <?php if($row['job_status'] == "Incomplete") { echo "SELECTED"; } ?>>Incomplete</option>
        <option value="Completed" <?php if($row['job_status'] == "Completed") { echo "SELECTED"; } ?>>Completed</option>
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
        if (jobStatus === "Pending" || jobStatus === "Incomplete") {
          reasonDiv.style.display = "block";
        } 
        
        else {
          reasonDiv.style.display = "none";
        }
      }
      
      // Call the function once to set the initial state of the "reason" div
      myFunction();
    </script>
    <!--PENDING & INCOMPLETE END REASON-->
    
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <p class="control"><b id="messagestatus"></b></p>
    <div class="btn-box">
      <button type="button" id="update_techstatus" name="update_techstatus" value="Update" style="width: 103px;padding-left: 29px;" class="buttonbiru" onclick="submitFormstatus();">Update</button>
      <br><br>
    </div>
  </form>
  
  <script type="text/javascript">
      function submitFormstatus() {
        var job_status = document.getElementById('job_status').value;
        var technician_departure = document.getElementById('technician_departure').value;
        var technician_arrival = document.getElementById('technician_arrival').value;
        var technician_leaving = document.getElementById('technician_leaving').value;

        var job_status = $('select[name=job_status]').val();
        var reason = $('input[name=reason]').val();
        var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
        var jobregister_id = $('input[name=jobregister_id]').val();

        if (job_status === 'Completed' && (!technician_departure || !technician_arrival || !technician_leaving)) {
          $('#messagestatus').html('<span style="color: red">Please fill in departure time, arrival time and leaving time before marking the job as Completed.</span>');
          return false;
        }
        
        if(jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='',
                         job_status!='' || job_status=='',
                             reason!='' || reason=='',
                     jobregister_id!='' || jobregister_id=='')
        {
          var formData = {jobregisterlastmodify_by: jobregisterlastmodify_by,
                                        job_status: job_status,
                                            reason: reason,
                                    jobregister_id: jobregister_id};
                                    
          $.ajax({
            url: "techstatusindex.php",
            type: 'POST', 
            data: formData,
            success: function(response)
              {
                var res = JSON.parse(response);
                console.log(res);
                if(res.success == true)
                $('#messagestatus').html('<span style="color: green">Update Saved!</span>');
                else
                $('#messagestatus').html('<span style="color: red">Data Cannot Be Saved</span>');
              }
            });
        }
      } 
  </script>

<?php } } } ?>

</body>

</html>