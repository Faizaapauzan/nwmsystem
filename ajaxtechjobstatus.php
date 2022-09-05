<?php
session_start();

?>

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

#reason {
display:none;  
}

</style>

</head>

<body>

<form id="techstatus_form" method="post">

<input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

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

<div id="reason" class="form-group row">
<label for="reason" class="col-sm-2 col-form-label">Reason</label>
<div class="col-sm-10">
  <input type="text" class="form-control" id="inputreason" name="reason" value="<?php echo $row['reason'] ?>">
</div>
</div>

<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("job_status").value;
  if(x == 'Pending' || x == 'Incomplete'){
    document.getElementById("reason").style.display = 'block';
  }
  else {
    document.getElementById("reason").style.display = 'none';
  }
}
</script>

<!--PENDING & INCOMPLETE END REASON-->

<?php if (isset($_SESSION["username"])) ?>
<input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
<!-- <button type="submit" id="button" name="update" class="button">Update Job Status</button> -->

<p class="control"><b id="messagestatus"></b></p>
<div class="btn-box">
<button type="button" id="update_techstatus" name="update_techstatus" value="Update" style="width: 103px;padding-left: 29px;" class="buttonbiru" onclick="submitFormstatus();">Update</button>
<br><br>
</form>

<script type="text/javascript">

        function submitFormstatus()
          {
            var job_status = $('select[name=job_status]').val();
            var reason = $('input[name=reason]').val();
            var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
            var jobregister_id = $('input[name=jobregister_id]').val();
            
            if(job_status!='' || job_status=='',
               reason!='' || reason=='',
               jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='',
               jobregister_id!='' || jobregister_id=='')

              {
                var formData = {job_status: job_status,
                                    reason: reason,
                  jobregisterlastmodify_by: jobregisterlastmodify_by,
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

<?php


}
} ?>

<?php
}

?>

</body>

</html>