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
    <title>NWM Technician Video Update</title>

	<link href="css/ajaxtechphtoupdt.css" rel="stylesheet"/>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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


  </style>

<body>	

 <form style="margin-left: -3px;" id="submitVideoBefore">

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

 <b><label style="margin-left: -3px; font-size: 20px;" for="position" class="details">Machine (Before Service)</label></b>
  <input type="hidden" id="description" name="description" value="Machine (Before Service)">
  <div id="previewBeforeVideo"></div>
  <div class="update-form">
    <div class="upload-video">
    <div class="input-box" style="display: flex;">
    <input type="file" class="form-control" name="multipleVideo[]" id="multipleVideo" required="" multiple>
     <input type="submit" name="uploadVideo" value="Upload Machine (Before Service)" style="font-size: 13px; background-color: #081d45; color: #fff; cursor: pointer; padding-left: 12px;
    padding-right: 12px;
    border-radius: 4px;">
    </div>
    </div>
    <div class="message">
    <p class="control"><b id="messageVideoBefore"></b></p>
    </div>
               
 <!-- for select data from tech video update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
      <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table style="box-shadow: 0 5px 10px #f7f7f7;" >
      <tbody style="display: flex; flex-wrap: wrap;">

			<?php foreach($queryRecords as $res) :?>
			<tr style="display:grid; padding-left: 25px;" ><td><video width="170" height="150" src="image/<?=$res['video_url']?>" controls></video></td>       
			<td ><span class='deletedv' style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span>
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

            function previewVideos() {

                var $preview = $('#previewBeforeVideo').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {
                
                var reader = new FileReader();

                $(reader).on("load", function() {
                  $preview.append($("<video/>", {src:this.result, height:100}));
                });

                reader.readAsDataURL(file);
                
              }

            }

            $('#multipleVideo').on("change", previewVideos);

            $("#submitVideoBefore").on("submit", function(e){
                e.preventDefault();
                $.ajax({
                    url  :"uploadvideo.php",
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
                          $('#messageVideoBefore').html('<span style="color: green">Video Uploaded!</span>');
                        else
                          $('#messageVideoBefore').html('<span style="color: red">Video cannot be Upload</span>');
                      $("#multipleVideo").val("");
                    }
                });
            });
        });
    </script>
<br/><br/>

<!-- AFTER -->

 <form id="submitAfterVideo">

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

 <b><label style="margin-left: -3px; font-size: 20px;" for="position" class="details">Machine (After Service)</label></b>
  <input type="hidden" id="description" name="description" value="Machine (After Service)">
    <div id="previewAfterVideo"></div>
  <div class="update-form">
    <div class="upload-video">
    <div class="input-box" style="display: flex;">
     <input type="file" class="form-control" name="multipleVideo[]" id="multipleAfterVideo" required="" multiple>
     <input type="submit" name="uploadVideo" value="Upload Machine (After Service)" style="font-size: 13px; background-color: #081d45; color: #fff; cursor: pointer;     padding-left: 15px;
    padding-right: 12px;
    border-radius: 4px;">
    </div>
    </div>
    </div>
    <div class="message">
    <p class="control"><b id="messageVideoAfter"></b></p>
    </div>
          
     <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>

    <!-- Photos Table After Service -->
      <div class="table-responsive">
      <table style="box-shadow: 0 5px 10px #f7f7f7;" >
      <tbody style="display: flex; flex-wrap: wrap;">

			<?php foreach($queryRecords as $res) :?>
			<tr style="display:grid; padding-left: 25px;" ><td><video width="170" height="150" src="image/<?=$res['video_url']?>" controls></video></td>       
			<td ><span class='deletedv' style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span>
      </td>
		</tr> 
			<?php endforeach;?>

 
      </tbody>	
      </table>
        </div>
    </div>
 
        
</form>
    
<script>
  $(document).ready(function(){
 // Delete 
 $('.deletedv').click(function(){
   var el = this;
   // Delete id
   var deletedid = $(this).data('id');
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'techvideo-delete.php',
        type: 'POST',
        data: { id:deletedid },
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
<script type="text/javascript">
        $(document).ready(function(){

            function previewVideos() {

                var $preview = $('#previewAfterVideo').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {
                
                var reader = new FileReader();

                $(reader).on("load", function() {
                  $preview.append($("<video/>", {src:this.result, height:100}));
                });

                reader.readAsDataURL(file);
                
              }

            }

            $('#multipleAfterVideo').on("change", previewVideos);

            $("#submitAfterVideo").on("submit", function(e){
                e.preventDefault();
                $.ajax({
                    url  :"uploadvideo.php",
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
                          $('#messageVideoAfter').html('<span style="color: green">Video Uploaded!</span>');
                        else
                          $('#messageVideoAfter').html('<span style="color: red">Video cannot be Upload</span>');
                      $("#multipleAfterVideo").val("");
                    }
                });
            });
        });
    </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>