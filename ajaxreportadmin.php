<?php session_start(); ?>

    <?php
        //include connection file 
        include_once("dbconnect.php");
        if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];
        $sql = "SELECT * FROM `job_register` WHERE  jobregister_id ='$jobregister_id'";
        $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
        }
    ?>

    <?php
// Return current date from the remote server
$date = date('d-m-Y');

?>

<!DOCTYPE html>

<html lang=”en”>

<head>

<meta charset=”UTF-8″>

<link href="css/ajax.css" rel="stylesheet" />

</head>

<style>

form .upload-report .input-box {
  margin-bottom: 15px;
  margin-top: 15px;
  width: calc(100% / 2 - -335px);
  padding: 0 -9px 0 15px;
}
form .upload-report label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.upload-report .input-box input,
.upload-report .input-box select {
  height: 40px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.upload-report .input-box input:focus,
.upload-report .input-box input:valid,
.upload-report .input-box select:focus,
.upload-report .input-box select:valid {
  border-color: #081d45;
}


form .submit-date .submit-date {
  margin-bottom: 40px;
  width: calc(100% / 2 - -344px);
  padding: 0 -9px 0 15px;
}
form .submit-date label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.submit-date .input-box input,
.submit-date .input-box select {
  height: 35px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.submit-date .input-box input:focus,
.submit-date .input-box input:valid,
.submit-date .input-box select:focus,
.submit-date .input-box select:valid {
  border-color: #081d45;
}


</style>

<body>



<form method="POST" action="servicereportdate.php">

    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <label for="reportdate" style="margin-left: 20px">Service Report Date:</label>
    <div class="date-form">
    <div class="submit-date" style="padding-left: 20px; padding-right: 25px;">
    <div class="input-box" style="width: 75%; display: flex; align-items: baseline;">
    <input type="text" id="srvcreportdate" name="srvcreportdate" value="<?php echo $date; ?>" readonly>
    
    <div class="input-group-append" style="display: flex; justify-content: space-between; flex-wrap: nowrap;">
   
    </form>
      <?php foreach($queryRecords as $res) :?>
  	<form id="view_form" method="post">
    <div style="display:flex;">
    <button  style="padding: 8px 44px; border-radius: 4px;" class="userinfo" type="button" 
      data-id='<?php echo $res['jobregister_id']; ?>' 
      data-custname='<?php echo $res['customer_name']; ?>' 
      data-machine_name='<?php echo $res['machine_name']; ?>' 
      data-requested_date='<?php echo $res['requested_date']; ?>'
      data-job_assign='<?php echo $res['job_assign']; ?>'>New</button></n>
    <button style="padding: 8px 44px; border-radius: 4px; display: flex; background-color: #f43636 ;" class="useredit" type="button" data-id2='<?php echo $res['jobregister_id']; ?>'>Edit</button>
    </div>  
    </form>
    <?php endforeach;?>
    </div>

    <!-- FOR NEW SERVICE REPORT-->	
    <script type='text/javascript'>
        $(document).ready(function(){
        $('.userinfo').click(function(){
        var jobregister_id = $(this).data('id');
        var customer_name = $(this).data('custname');
        var machine_name = $(this).data('machine_name');
        var requested_date = $(this).data('requested_date');
        var job_assign = $(this).data('job_assign');
        $.ajax({
            url: 'servicereportajaxadmin.php',
            type: 'post',
            data: {jobregister_id:jobregister_id, 
                  customer_name:customer_name,
                  machine_name:machine_name,
                  requested_date:requested_date,
                  job_assign:job_assign},
            success: function(data){
            var win = window.open('servicereport.php');
            win.document.write(data);
                        }
                    });
                });
            });
    </script>
    <!-- FOR NEW SERVICE REPORT-->	

    <!-- FOR EDIT SERVICE REPORT-->	
    <script type='text/javascript'>
        $(document).ready(function(){
        $('.useredit').click(function(){
        var jobregister_id = $(this).data('id2');
        $.ajax({
            url: 'servicereportEDIT.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(data){
            var win = window.open('servicereportEDIT.php');
            win.document.write(data);
                        }
                    });
                });
            });
    </script>
    <!-- FOR EDIT SERVICE REPORT-->	


</div>

</body>
</html>