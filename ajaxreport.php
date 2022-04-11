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

<!DOCTYPE html>

<html lang=”en”>

<head>

<meta charset=”UTF-8″>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tab.css"/>
<link href="css/ajax.css"rel="stylesheet" />

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
  
    </center>
    <label for="reportdate" style="margin-left: 20px">Service Report Date:</label>
    <div class="date-form">
    <div class="submit-date" style="padding-left: 20px; padding-right: 25px;">
    <div class="input-box" style="display: flex; align-items: baseline;">
    <input type="date" id="srvcreportdate" name="srvcreportdate" value="<?php echo $row['srvcreportdate'] ?>">
    <input type="submit" name="submit-date" value="Submit" style="background-color: #081d45; color: #fff; cursor: pointer;">
    </div>
</form>
</div>
</center>

  <center> 

<form id="view_form" method="post">
    <div class="view-report" style="display: flex; padding-left: 18px; padding-right: 25px;">
    <input type="text" value="Click View for View Report" readonly style="font-size: medium; height: 35px; cursor: default; outline: none; font-size: 16px; border-radius: 5px; padding-left: 15px; border: 1px solid #ccc; border-bottom-width: 2px;">
    <button data-id='<?php echo $row['jobregister_id']; ?>' class="userinfo btn btn-success" style="margin-right: 1px; outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;">View</button>
    </div>
</form>

</center>

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

 
<form id="uploadreport-form" method="POST" action="uploadservicereport.php" enctype="multipart/form-data">
    
<?php
    include 'dbconnect.php';
    
    if (isset($_POST['jobregister_id'])) {
        
        $jobregister_id =$_POST['jobregister_id'];
        
        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
        
        $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
?>


        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

<?php
            }
        }
        }
?>

<center>
 <div class="update-form">
    <div class="upload-report">
    <div class="input-box" style="display: flex;">
    <input type="file" name="files[]" multiple>
    <input type="submit" name="update" value="Update" style="background-color: #081d45; color: #fff; cursor: pointer;">
    </div>

    </form> 
    </div>
</center>
</div>

<form id="view_upload" method="">

<?php
include_once 'dbconnect.php';

// fetch files
$sql = "SELECT * FROM servicereport WHERE jobregister_id ='$jobregister_id'";
$result = mysqli_query($conn, $sql);
?>

<div class="row">
    <div class="col-xs-8 col-xs-offset-2">
        <center>
    <table class="table table-striped table-hover" style="width: 700px;">
    <thead>
    <tr>
  
    <th>File Name</th>
    <th>Download</th>
    <th>Delete</th>
    </tr>
    </thead>

                <tbody>
                <?php
                
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  
                    <td><?php echo $row['file_name']; ?></td>
                    <td><a href="servicereport/<?php echo $row['file_name']; ?>" download>Download</td>
                    <td><span class='deletes' data-id='<?php echo $row["id"]; ?>'>Delete</span></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </center>
        </div>
    </div>

 <script>
  $(document).ready(function(){

 // Delete 
 $('.deletes').click(function(){
   var el = this;
  
   // Delete id
   var deletesid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'servicereportdelete.php',
        type: 'POST',
        data: { id:deletesid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});

</script>

</form>

</body>
</html>