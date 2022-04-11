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
    <link href="css/testing.css"rel="stylesheet" />
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>

<style>

.btn btn-primary {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.btn btn-primary {
  background-color: #008CBA;
  color: white;
}


body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #ffffff;
    background-repeat: no-repeat
}

.container {
  padding: 1%;
  display: flex;
  width: 100%;
  justify-content: space-around;
  padding: 0 30px;
  margin-bottom: 20px;
  flex-direction: column;
}

</style>

</head>

<body>



 <form id="techstatus_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

  <div class="form-group">
    <label for="exampleFormControlSelect2">Job Status</label>
        <select type="text" id="job_status" name="job_status">
            <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
            <option value="Doing" <?php if($row['job_status'] == "Doing") { echo "SELECTED"; } ?>>Doing</option>
            <option value="Pending" <?php if($row['job_status'] == "Pending") { echo "SELECTED"; } ?>>Pending</option>
            <option value="Incomplete" <?php if($row['job_status'] == "Incomplete") { echo "SELECTED"; } ?>>Incomplete</option>
            <option value="Completed" <?php if($row['job_status'] == "Completed") { echo "SELECTED"; } ?>>Completed</option>
        </select>
  </div>

    
    <?php if (isset($_SESSION["username"])) ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <!-- <button type="submit" id="button" name="update" class="button">Update Job Status</button> -->

<div class="btn-box">
<p class="control"><b id="mesejstatus"></b></p>
<button type="button" id="update_techstatus" name="update_techstatus" value="Update" class="btn btn-primary">Update</button>
<br><br>
</form>


<script>
    $(document).ready(function () {
        $('#update_techstatus').click(function () {
            var data = $('#techstatus_form').serialize() + '&update_techstatus=update_techstatus';
            $.ajax({
                url: 'techstatusindex.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#mesejstatus').text(response);
                    $('#job_status').text('');

                   
                }
            });
        });
    });
</script>

<?php


}
} ?>

<?php
}

?>

</body>

</html>