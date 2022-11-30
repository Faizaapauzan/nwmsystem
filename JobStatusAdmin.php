<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<style>
        
    #reason {display:none;}

</style>

<body>

    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form method="post">

        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
        <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
        <input type="hidden" name="machine_id" value="<?php echo $row['machine_id'] ?>">

        <div class="form-group">
            <label for="">Job Status</label><br>
            <select id="job_status" name="job_status" class="form-control" style="width:704px; height:50px; font-size:15px;" onchange="myFunction()">
                <option value='' <?php if ($row['job_status'] == '') {echo "SELECTED";} ?>></option>
                <option value="Doing" <?php if ($row['job_status'] == "Doing") {echo "SELECTED";} ?>>Doing</option>
                <option value="Pending" <?php if ($row['job_status'] == "Pending") {echo "SELECTED";} ?>>Pending</option>
                <option value="Incomplete" <?php if ($row['job_status'] == "Incomplete") {echo "SELECTED";} ?>>Incomplete</option>
                <option value="Completed" <?php if ($row['job_status'] == "Completed") {echo "SELECTED";} ?>>Completed</option>
            </select>
        </div>

        <!--Reason for pending & complete-->
        <div id="reason" class="form-group" style="margin-top:10px;">
            <label for="reason" class="col-sm-2 col-form-label">Reason</label>
            <div class="col-sm-10">
                <input type="text" id="inputreason" name="reason" class="form-control" value="<?php echo $row['reason'] ?>">
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
        <!-- End of Reason for pending & complete-->
        
        <?php if (isset($_SESSION["username"])) ?>
        <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        
        <p class="control"><b id="messagestatus"></b></p>
        <div class="btn-box">
            <button type="button" id="update_techstatus" name="update_techstatus" value="Update" style="width:150px; padding: 5px; border-radius: 5px; font-size:medium; float: right;" class="buttonbiru" onclick="submitFormstatus();">Update</button>
        </div>
    </form>
    
    <script type="text/javascript">
        function submitFormstatus()
          {
            var requested_date = $('input[name=requested_date]').val();
            var customer_name = $('input[name=customer_name]').val();
            var machine_id = $('input[name=machine_id]').val();
            var job_status = $('select[name=job_status]').val();
            var reason = $('input[name=reason]').val();
            var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
            var jobregister_id = $('input[name=jobregister_id]').val();
            
            if(requested_date!='' || requested_date=='',
                customer_name!='' || customer_name=='',
                   machine_id!='' || machine_id=='',
                   job_status!='' || job_status=='',
                       reason!='' || reason=='',
     jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='',
               jobregister_id!='' || jobregister_id=='')
                
            {
                var formData = {requested_date: requested_date,
                                 customer_name: customer_name,
                                    machine_id: machine_id,
                                    job_status: job_status,
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

    <?php } } } ?>

</body>
</html>