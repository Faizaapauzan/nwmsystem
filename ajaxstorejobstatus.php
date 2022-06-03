<?php
session_start();
?>

<style>
#reason {
  display:none;  
}
</style>
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

    <form action="ajaxstorejobstatus.php" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    
    <div class="JobStatusUpdate">
        <label style="margin-left: 40px;" class="details">Job Status Update</label>
        <select type="text" id="job_status" name="job_status" onchange="myFunctionStore()">
            <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
            <option value="Doing" <?php if($row['job_status'] == "Doing") { echo "SELECTED"; } ?>>Doing</option>            
            <option value="Pending" <?php if($row['job_status'] == "Pending") { echo "SELECTED"; } ?>>Pending</option>
            <option value="Ready" <?php if($row['job_status'] == "Ready") { echo "SELECTED"; } ?>>Ready</option>
            <option value="Not Ready" <?php if($row['job_status'] == "Not Ready") { echo "SELECTED"; } ?>>Not ready</option>
        </select>
    </div>

    <!--PENDING & INCOMPLETE REASON-->

  <div id="reason" class="form-group row">
    <label style="margin-bottom: 24px; margin-left: 36px;" for="reason" class="col-sm-2 col-form-label">Reason</label>
    <div class="col-sm-10">
      <input style="width: 284px; height: 62px; margin-left: 115px; margin-top: -51px;" type="text" class="form-control" id="inputreason" name="reason" value="<?php echo $row['reason'] ?>">
    </div>
  </div>

  <script type="text/javascript">
    function myFunctionStore() {
      var x = document.getElementById("job_status").value;
      if(x == 'Pending' || x == 'Not Ready'){
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

    <button style="border-color: #081d45; background-color: #081d45; margin-left: 35px; margin-bottom: 20px;" type="submit" id="update" name="update" class="btn btn-primary"> Update Data </button>
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
    
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo '<script> alert("Data Updated"); </script>';
        header("location:store.php");
    } else {
        echo '<script> alert("Data Not Updated"); </script>';
    }
}
} ?>

<?php
}
}
?>