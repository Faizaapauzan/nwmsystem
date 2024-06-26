<?php session_start(); ?>

<?php
include 'dbconnect.php';
?>

<!DOCTYPE html>

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'> -->
    <title>NWM Technician Photo Update</title>

	<link href="css/ajaxtechphtoupdt.css" rel="stylesheet"/>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<style media="screen">

    #preview{
      display: flex;
      width: 200px;
      height: 200px;
      border: 1px solid black;
      margin-top: -15px;
      flex-wrap: wrap;
      overflow-y: scroll;
    }
    #preview img{
      width: 50%;
      height: 50%;
    }
      
form .upload-photo .input-box {
  padding-left: 49px;
  margin-bottom: 1px;
  margin-top: 7px;
  /* width: calc(100% / 2 - -302px); */
  padding: 0 -9px 0 15px;
}

form .upload-photo label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}

.upload-photo .input-box input,
.upload-photo .input-box select {
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
.upload-photo .input-box input:focus,
.upload-photo .input-box input:valid,
.upload-photo .input-box select:focus,
.upload-photo .input-box select:valid {
  border-color: #081d45;
}

</style>

<body>	

 <form style="margin-left: -19px;" id="submitForm">

<!-- for select job register id -->
<div>
      <?php
      include 'dbconnect.php';
      if (isset($_POST['jobregister_id'])) { 
        $jobregister_id =$_POST['jobregister_id'];
        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                
        <div class="input-box">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        </div>

 <?php }  } } ?>

 <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (Before Service)</label></b>
  <input type="hidden" id="description" name="description" value="Machine (Before Service)">
  <div id="previewBefore"></div>
  <div class="update-form">
    <div class="upload-photo" style="padding-bottom: 10px; border-radius: 3px;">
    <div class="input-box" style="display: flex;">
    </div>
               
 <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
      <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table style="box-shadow: 0 5px 10px #f7f7f7;" >
      <tbody style="display: flex; flex-wrap: wrap;">

			<?php foreach($queryRecords as $res) :?>
			<tr style="display:grid; padding-left: 25px;" ><td><a href="image/<?php echo $res['file_name']; ?>" download>
<img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>       
			<td >
      </td>
		</tr> 
			<?php endforeach;?>

 
      </tbody>	
      </table>
        </div>
    </div>
 
        
</form>

<script type="text/javascript">
        $(document).ready(function(){

            function previewImages() {

                var $preview = $('#previewBefore').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {
                
                var reader = new FileReader();

                $(reader).on("load", function() {
                  $preview.append($("<img/>", {src:this.result, height:100}));
                });

                reader.readAsDataURL(file);
                
              }

            }

            $('#multipleFile').on("change", previewImages);

            $("#submitForm").on("submit", function(e){
                e.preventDefault();
                $.ajax({
                    url  :"uploads.php",
                    type :"POST",
                    cache:false,
                    contentType : false, // you can also use multipart/form-data replace of false
                    processData : false,
                    data: new FormData(this),
                    success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#messageImagebefore').html('<span style="color: green">Image Uploaded!</span>');
                        else
                          $('#messageImagebefore').html('<span style="color: red">Image cannot be Upload</span>');
                      $("#multipleFile").val("");
                    }
                });
            });
        });
    </script>
<br/>
 <form id="submitAfterForm">

<!-- for select job register id -->
<div>
      <?php
      include 'dbconnect.php';
      if (isset($_POST['jobregister_id'])) { 
        $jobregister_id =$_POST['jobregister_id'];
        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
   
        <div class="input-box">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

 <?php }  } } ?>

<b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (After Service)</label></b>
  <input type="hidden" id="description" name="description" value="Machine (After Service)">
    <div id="previewAfter"></div>
  <div class="update-form">
    <div class="upload-photo" style="padding-bottom: 10px; border-radius: 3px;">
    <div class="input-box" style="display: flex;">
    </div>
          
     <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>

    <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table style="box-shadow: 0 5px 10px #f7f7f7; overflow:hidden;" >
      <tbody style="display: flex; flex-wrap: wrap;">

			<?php foreach($queryRecords as $res) :?>
			<tr style="display:grid; padding-left: 25px;" ><td><a href="image/<?php echo $res['file_name']; ?>" download>
      <img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>       
			<td >
      </td>
		  </tr> 
			<?php endforeach;?>
      </tbody>	
      </table>
      </div>
      </div>
      <br>
 
</form>
    
<script type="text/javascript">
        $(document).ready(function(){

            function previewImages() {

                var $preview = $('#previewAfter').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {
                
                var reader = new FileReader();

                $(reader).on("load", function() {
                  $preview.append($("<img/>", {src:this.result, height:100}));
                });

                reader.readAsDataURL(file);
                
              }

            }

            $('#multipleAfter').on("change", previewImages);

            $("#submitAfterForm").on("submit", function(e){
                e.preventDefault();
                $.ajax({
                    url  :"uploads.php",
                    type :"POST",
                    cache:false,
                    contentType : false, // you can also use multipart/form-data replace of false
                    processData : false,
                    data: new FormData(this),
                    success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#messageImageAfter').html('<span style="color: green">Image Uploaded!</span>');
                        else
                          $('#messageImageAfter').html('<span style="color: red">Image cannot be Upload</span>');
                      $("#multipleAfter").val("");
                    }
                });
            });
        });
    </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>