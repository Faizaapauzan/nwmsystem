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
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
  <title>NWM Technician Photo Update</title>

	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="css/ajaxtechphtoupdt.css" rel="stylesheet"/>

</head>

<body>	
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
            $query = ("SELECT * FROM `technician_photoupdate` WHERE  jobregister_id ='$jobregister_id'");
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>

 
 
                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

								<?php foreach($query_run as $res) :?>
								<tr data-row-id="<?php echo $res['id'];?>">
								<td col-index='2'><img src="image/<?php echo $res['file_name']; ?>" id="display_image"/></td>
							<td oldVal ="<?php echo $res['description'];?>"><?php echo $res['description'];?></td>
									<td><a href="image/<?php echo $res['file_name']; ?>" download>Download</td>
									<td><span class='deleted' style="color:red;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>

                  
								</tr>
								<?php endforeach;?>

 
                                </tbody>	
                            </table>
                        </div>
                    </div>
								
                <br><div class="btn-box">
                     <button class="photoinfo btn btn-success" type="button" data-id='<?php echo $row['jobregister_id']; ?>'>Print</button>
                      <br/><br/>            
    <?php } } ?>
    <?php } ?>

                        
<br>

</form></div>

<!-- FOR PRINT PHOTO REPORT -->

	    <script type='text/javascript'>
        $(document).ready(function(){
        $('.photoinfo').click(function(){
        var jobregister_id = $(this).data('id');
        $.ajax({
            url: 'printreport.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(data){
            var win = window.open('printreport.php');
            win.document.write(data);
                        }
                    });
                });
            });
    </script>


<!-- FOR DELETE PHOTO -->

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
 
                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Video</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody >
									<?php foreach($queryRecords as $res) :?>
									<tr data-row-id="<?php echo $res['id'];?>">
									
									
									<td col-index='2' >
									<video width="150" height="120" src="image/<?=$res['video_url']?>" controls></video></td>
									
									<td oldVal ="<?php echo $res['description'];?>"><?php echo $res['description'];?></td>
									
			
									<td><span class='deleted'  style="color:red;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
									</tr>
									<?php endforeach;?>
                                </tbody>
                            </table>
							<br>
						
							<br><br>
						</div>

</div>  


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

 
</<form>
  

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>