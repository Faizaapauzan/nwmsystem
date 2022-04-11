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
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/tab.css"/>
<link href="css/ajaxtechphtoupdt.css" rel="stylesheet"/>

<style>

  video {
			width: 280px;
			height: 160px;
		}

</style>

</head>

<body>
<!-- <div class="container" style="padding:50px 250px;"> -->		
<form action="techphtoupdtindex.php" class="remark-inline" id="frm-add-remark" action="javascript:void(0)" method="post" enctype="multipart/form-data">
<div class="input-boxPhoto" id="input_fields_wrap">  
<div id="photomsg" class="alert"></div>

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
                
        <div class="photo">
        <div class="input-box">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        </div>

 <?php }  } } ?>

 <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `technician_photoupdate` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
<table id="remark_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">

   <thead>
      <tr>
        <th>Photo</th>
         <th>Description</th>
         <th></th>
      </tr>
   </thead>
  
   <tbody>
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
         <td col-index='2'><img src="image/<?php echo $res['file_name']; ?>" id="display_image"/></td>
        <td oldVal ="<?php echo $res['description'];?>"><select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; outline: none; font-size: 16px;">
<option value='' <?php if ($res['description'] == '') { echo "SELECTED"; } ?>></option>
<option value="Machine (Before Service)" <?php if ($res['description'] == "Machine (Before Service)") { echo "SELECTED";} ?>>Machine (Before Service)</option>
<option value="Accessories (Broken)" <?php if ($res['description'] == "Accessories (Broken)") { echo "SELECTED"; } ?>>Accessories (Broken)</option>
<option value="Accessories (New)" <?php if ($res['description'] == "Accessories (New)") { echo "SELECTED"; } ?>>Accessories (New)</option>
<option value="Machine (After Service)" <?php if ($res['description'] == "Machine (After Service)") { echo "SELECTED"; } ?>>Machine (After Service)</option>
</select></td>

<td><a href="image/<?php echo $res['file_name']; ?>" download>Download</td>
         <td><span class='deleted' data-id='<?php echo $res["id"]; ?>' style="color:red">Delete</span></td>
      </tr>
	  <?php endforeach;?>
   </tbody>
</table>

<a href="javascript:void(0);" class="add_photo" title="Add photo" type="button">Click Here to Insert Photo</a>

</div>  

<script>
  $(document).ready(function(){
 // Delete 
 $('.updated').click(function(){
   var el = this;
   // Delete id
   var updatedid = $(this).data('id');
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'techphoto_update.php',
        type: 'POST',
        data: { id:updatedid },
        success: function(response){

          if(response == 1){
	   
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});

</script>

<script>
  $(document).ready(function(){
 // Delete 
 $('.deleted').click(function(){
   var el = this;
   // Delete id
   var deletedid = $(this).data('id');
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'techphoto_delete.php',
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
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['index'] = $(this).attr('col-index');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "techphoto_server.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#photomsg").removeClass('alert-danger');
							$("#photomsg").addClass('alert-success').html(response.msg);
						} else {
							$("#photomsg").removeClass('alert-success');
							$("#photomsg").addClass('alert-danger').html(response.msg);
						}
					}   
				});
	});
});

</script>

   <!--Accessories add-->
  <script type="text/javascript">

		$(document).ready(function () {

			var maxField = 2; // Total 100 product fields we add

			var addButton = $('.add_photo'); // Add more button selector

			var wrapper = $('.photo'); // Input fields wrapper

			var fieldHTML = `

		<div class="photo-element">
   
        <div class="photo">
        
        <?php
        
        include 'dbconnect.php';
        
        if (isset($_POST['jobregister_id'])) {

        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="photo">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>

<div>
<input type="file" class="tech_photo" oninput="pic.src=window.URL.createObjectURL(this.files[0])" name="files[]" multiple><br>
<img id="pic" width="150px" height="120px"/><br>
<select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; outline: none; font-size: 16px;" name='description[]'>
<option value='' name="description[]"></option>
<option value="Machine (Before Service)" name="description[]">Machine (Before Service)</option>
<option value="Accessories (Broken)" name="description[]">Accessories (Broken)</option>
<option value="Accessories (New)" name="description[]">Accessories (New)</option>
<option value="Machine (After Service)" name="description[]">Machine (After Service)</option>
</select>

<br><div class="btn-box">
<button type="submit" name="update" value="update">Update</button>
</form></div>   </div>
					
<a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></div></div>

				`; //New input field html 

			var x = 1; //Initial field counter is 1

			$(addButton).click(function () {
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					$(wrapper).append(fieldHTML);
				}
			});

			//Once remove button is clicked
			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).parent().closest(".photo-element").remove();
				x--; //Decrement field counter
			});
		});
</script>
</form>

<!---------------------------------- video ------------------------------------------>

<!-- <div class="container" style="padding:50px 250px;"> -->		
<form action="techvideoindex.php" class="video-inline" id="frm-add-video" action="javascript:void(0)" method="post" enctype="multipart/form-data">
<div class="input-boxVideo" id="input_fields_wrap">  
<div id="videomsg" class="alert"></div>

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
                
        <div class="video">
        <div class="input-box">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        </div>

 <?php }  } } ?>

 <!-- for select data from tech photo update database -->
 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `technician_videoupdate` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
 
<table id="remark_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">

   <thead>
      <tr>
        <th>Video</th>
         <th>Description</th>
         <th></th>
      </tr>
   </thead>
  
   <tbody>
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
         <td col-index='2'><video src="image/<?=$res['video_url']?>" controls></video></td>
        <td oldVal ="<?php echo $res['description'];?>"><select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; outline: none; font-size: 16px;">
<option value='' <?php if ($res['description'] == '') { echo "SELECTED"; } ?>></option>
<option value="Machine (Before Service)" <?php if ($res['description'] == "Machine (Before Service)") { echo "SELECTED";} ?>>Machine (Before Service)</option>
<option value="Accessories (Broken)" <?php if ($res['description'] == "Accessories (Broken)") { echo "SELECTED"; } ?>>Accessories (Broken)</option>
<option value="Accessories (New)" <?php if ($res['description'] == "Accessories (New)") { echo "SELECTED"; } ?>>Accessories (New)</option>
<option value="Machine (After Service)" <?php if ($res['description'] == "Machine (After Service)") { echo "SELECTED"; } ?>>Machine (After Service)</option>
</select></td>

         <td><span class='deleted' data-id='<?php echo $res["id"]; ?>'style="color:red">Delete</span></td>
      </tr>
	  <?php endforeach;?>
   </tbody>
</table>

<a href="javascript:void(0);" class="add_video" title="Add video" type="button">Click Here to Insert video</a>

</div>  

<script>
  $(document).ready(function(){
 // Delete 
 $('.updated').click(function(){
   var el = this;
   // Delete id
   var updatedid = $(this).data('id');
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'techvideo-update.php',
        type: 'POST',
        data: { id:updatedid },
        success: function(response){

          if(response == 1){
	   
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});

</script>

<script>
  $(document).ready(function(){
 // Delete 
 $('.deleted').click(function(){
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
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['index'] = $(this).attr('col-index');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "techvideo-server.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#videomsg").removeClass('alert-danger');
							$("#videomsg").addClass('alert-success').html(response.msg);
						} else {
							$("#videomsg").removeClass('alert-success');
							$("#videomsg").addClass('alert-danger').html(response.msg);
						}
					}   
				});
	});
});

</script>

   <!--Accessories add-->
  <script type="text/javascript">

		$(document).ready(function () {

			var maxField = 2; // Total 100 product fields we add

			var addButton = $('.add_video'); // Add more button selector

			var wrapper = $('.video'); // Input fields wrapper

			var fieldHTML = `

		<div class="video-element">
   
        <div class="video">
        
        <?php
        
        include 'dbconnect.php';
        
        if (isset($_POST['jobregister_id'])) {

        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="video">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>

<div>
<input type="file" class="tech_video" name="files[]" multiple><br>
<select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; outline: none; font-size: 16px;" name='description[]'>
<option value='' name="description[]"></option>
<option value="Machine (Before Service)" name="description[]">Machine (Before Service)</option>
<option value="Accessories (Broken)" name="description[]">Accessories (Broken)</option>
<option value="Accessories (New)" name="description[]">Accessories (New)</option>
<option value="Machine (After Service)" name="description[]">Machine (After Service)</option>
</select>

<br><div class="btn-box">
<button type="submit" name="hantar" value="update">Update</button>
</form></div>   </div>
					
<a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></div></div>

				`; //New input field html 

			var x = 1; //Initial field counter is 1

			$(addButton).click(function () {
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					$(wrapper).append(fieldHTML);
				}
			});

			//Once remove button is clicked
			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).parent().closest(".video-element").remove();
				x--; //Decrement field counter
			});
		});
</script>
  </form>
  

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>