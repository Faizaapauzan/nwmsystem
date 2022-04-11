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

<meta charset="UTF-8">

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

</style>

</head>

<body>


 <form id="techstatus_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    
    <div class="input-boxAccessories">
        <label for="Job status" class="details">Job Status</label>
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
<input type="button" id="update_techstatus" name="update_techstatus" value="Update" />
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