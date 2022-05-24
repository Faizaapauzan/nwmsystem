<?php session_start(); ?>

<?php
  $db = mysqli_connect("localhost","root","","nwmsystem");
  if(!$db)
    {
      die("Connection failed: " . mysqli_connect_error());
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    /* #ImageRow {
      margin-right: 20px;
      margin-left: 40px;
      display: flex; 
      width: 200px; 
      height: 200px;

    } */

    
form .upload-report .input-box {
  padding-left: 49px;
  margin-bottom: 1px;
  margin-top: 7px;
  width: calc(100% / 2 - -302px);
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



  </style>

<body>	

<form action="techvideoindex.php" method="post" enctype="multipart/form-data">

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
  <div class="update-form">
    <div class="upload-report">
    <div class="input-box" style="display: flex;">
    <input type="file" name="videoFile[]" required multiple class="form-control">
     <input type="submit" name="uploadVideoBtn" id="uploadVideoBtn" value="Upload Machine (Before Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
    </div>
    </div>
               
 <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
      <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table>
      <thead>
      <tr>
      <th scope="col">Video</th>
      <th scope="col">Action</th>
      </tr>
      </thead>

      <tbody>

			<?php foreach($queryRecords as $res) :?>
			<tr data-row-id="<?php echo $res['id'];?>">
			<td col-index='2'><video width="150" height="120" src="image/<?=$res['video_url']?>" controls></video></td>
	    <td><a href="image/<?php echo $res['video_url']; ?>" style="text-align:center;" download>Download</td>           
			<td><span class='deletedv' style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>

			</tr>
			<?php endforeach;?>

 
      </tbody>	
      </table>
        </div>
    </div>
 
        
</form>
<br/><br/>
<form action="techvideoindex.php" method="post" enctype="multipart/form-data">

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
  <div class="update-form">
    <div class="upload-report">
    <div class="input-box" style="display: flex;">
    <input type="file" name="videoFile[]" required multiple class="form-control">
     <input type="submit" name="uploadVideoBtn" id="uploadVideoBtn" value="Upload Machine (After Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
    </div>
    </div>
               
 <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
      <!-- Photos Table Before Service -->
      <div class="table-responsive">
      <table>
      <thead>
      <tr>
      <th scope="col">Video</th>
      <th scope="col">Action</th>
      </tr>
      </thead>

      <tbody>

			<?php foreach($queryRecords as $res) :?>
			<tr data-row-id="<?php echo $res['id'];?>">
			<td col-index='2'><video width="150" height="120" src="image/<?=$res['video_url']?>" controls></video></td>
	    <td><a href="image/<?php echo $res['video_url']; ?>" style="text-align:center;" download>Download</td>           
			<td><span class='deletedv' style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>

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

<!-- 
    <p>Preview</p>
    <div id = "preview">

  <script type="text/javascript">
      function preview(){
        var totalFiles = $('#fileImg').get(0).files.length;
        for(var i = 0; i < totalFiles; i++){
          $('#preview').append("<img src = '"+URL.createObjectURL(event.target.files[i])+"'>");
        }
      }

      function submitData(){
        $(document).ready(function(){
          var formData = new FormData();

          var totalFiles = $("#fileImg").get(0).files.length;
          for (var i = 0; i < totalFiles; i++) {
              formData.append("fileImg[]", $("#fileImg").get(0).files[i]);
          }

          $.ajax({
            url: 'insertphoto.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success:function(response){
              alert(response);
            }
          });
        });
      }
    </script> -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>