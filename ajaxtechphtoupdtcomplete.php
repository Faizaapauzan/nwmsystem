<?php
session_start();

?>


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
<link href="css/ajaxtech.css"rel="stylesheet" />
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
    	<td oldVal ="<?php echo $res['description'];?>"><?php echo $res['description'];?></td>
         <td></td>
      </tr>
	  <?php endforeach;?>
   </tbody>
</table>

</div>  

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
                                     
                                    </tr>
                                </thead>
                                <tbody >
									<?php foreach($queryRecords as $res) :?>
									<tr data-row-id="<?php echo $res['id'];?>">
									
									
									<td col-index='2' >
									<video width="150" height="120" src="image/<?=$res['video_url']?>" controls></video></td>
									
								<td oldVal ="<?php echo $res['description'];?>"><?php echo $res['description'];?></td>
									
			
								
									</tr>
									<?php endforeach;?>
                                </tbody>
                            </table>
							<br>
									
							<br><br>

              
						</div></div>
            <br><div class="btn-box">
       
        </form></div>

  


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