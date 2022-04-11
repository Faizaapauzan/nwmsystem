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

 <form action="" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    
    <div class="JobStatusUpdate">
        <label for="Accessories" class="details">Job Status Update</label>
        <select type="text" id="job_status" name="job_status">
            <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
            <option value="Pending" <?php if($row['job_status'] == "Pending") { echo "SELECTED"; } ?>>Pending</option>
            <option value="Ready" <?php if($row['job_status'] == "Ready") { echo "SELECTED"; } ?>>Ready</option>
            <option value="Not Ready" <?php if($row['job_status'] == "Not Ready") { echo "SELECTED"; } ?>>Not ready</option>
        </select>
    </div>
    
   
    <button type="submit" id="update" name="update" class="btn btn-primary"> Update Data </button>
</form>

<?php

if (isset($_POST['update'])) {
    
    $job_status = $_POST['job_status'];
    
    $query = "UPDATE job_register SET
    
    job_status ='$job_status'
    
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