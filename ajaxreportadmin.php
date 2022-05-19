<?php session_start(); ?>

<?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) {
          $jobregister_id =$_POST['jobregister_id'];
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>

    <?php
// Return current date from the remote server
$date = date('d-m-y');

?>

<!DOCTYPE html>

<html lang=”en”>

<head>

<meta charset=”UTF-8″>
<link rel="stylesheet" type="text/css" href="css/tab.css"/>
<link href="css/ajax.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
  	<form id="view_form" method="post">
    <button  style="padding: 8px 44px; border-radius: 4px;" class="userinfo" type="button" data-id='<?php echo $row['jobregister_id']; ?>'>View</button>
    </form>
    </div>

    <script type='text/javascript'>
        $(document).ready(function(){
        $('.userinfo').click(function(){
        var jobregister_id = $(this).data('id');
        $.ajax({
            url: 'servicereport.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(data){
            var win = window.open('servicereport.php');
            win.document.write(data);
                        }
                    });
                });
            });
    </script>

    <?php
    }
  }
}
?>
</div>

</body>
</html>