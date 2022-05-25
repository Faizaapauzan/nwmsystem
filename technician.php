<?php
 session_start();
 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['staff_position']=="" AND $_SESSION['technician_rank']=="" ){
  header("location:index.php?error");
 }


if(!isset($_SESSION['username']))
	{	
    header("location:index.php?error");
	}

    elseif($_SESSION['staff_position']== 'Technician')
	{

	}

  else
	{
			header("location:index.php?error");
	}

?>



<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="css/technicianmain.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
</head>



<body>

  <nav class="navbar">
    <div class="wrapper">
    <ul class="main-nav" id="js-menu">
      <!-- <li>
        <a href="#" class="nav-links sidebarbutton" style="text-decoration: none;">ATTENDANCE</a>
      </li> -->
	  <li>
        <a href="joblistingst.php" class="nav-links sidebarbutton" style="text-decoration: none;">JOB LISTING</a>
      </li>
    </ul>
    <ul class="ul2">
      <!-- <li>
        <a href="#" class="nav-links"><i class='bx bxs-bell-ring'></i></a>
      </li> -->
      <li>
        <a href="logout.php" class="nav-links"><i class="bx bx-log-out"></i></a>
      </li>
    </ul>
    </div>
  </nav>


<!--TODO-->


        <div class="container">
			  <div style="text-align: center; font-size: 35px; font-weight: bold;" class="welcome">Welcome <?php echo $_SESSION['username'] ?>!</div>
			
      
				<div class="column" >
					<p class="column-title"id="doing" >Todo</p>
          <?php            
								include 'dbconnect.php';
								$results = $conn->query("SELECT
								jobregister_id, job_order_number, job_priority, job_name, customer_name, 
								customer_grade, job_status, job_description, machine_name
								FROM
								job_register
								WHERE
								job_assign ='{$_SESSION['username']}' AND  job_status = ''
								OR
								job_assign ='{$_SESSION['username']}' AND  job_status = 'Incomplete'
								ORDER BY jobregisterlastmodify_at
								DESC LIMIT 50");

								while($row = $results->fetch_assoc()) {             
							?>

						
				            <div class="cards">
								<div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>"  data-toggle="modal" data-target="#myModal" >
									<button type="button" class="btn btn-light text-left font-weight-bold font-color-black"> <!-- Modal-->                  
										<ul class="b" id="draged">
										<strong text-align="center"><?php echo $row['job_priority']?></strong>
										<li><?php echo $row['job_order_number']?></li>
										<li><?php echo $row['job_description']?></li>
										<li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
										<li><?php echo $row['machine_name']?></li>
										</ul>
										<div class="status"  id="incompleteStatus">
										<?php echo $row['job_status']?>
										</div>
								</div>
							</div>
					<?php } ?>				
				</div>
				
				
<!--DOING-->				
				
				<div class="column" >
					<p class="column-title"id="doing" >Doing</p>
						<?php            
							include 'dbconnect.php';
							$results = $conn->query("SELECT
							jobregister_id, job_order_number, job_priority, job_name, customer_name, 
							customer_grade, job_status, job_description, machine_name
							FROM
							job_register
							WHERE
							job_assign ='{$_SESSION['username']}' AND  job_status = 'Doing'

							ORDER BY jobregisterlastmodify_at
							DESC LIMIT 50");

							while($row = $results->fetch_assoc()) {
              
						?>
						
				            <div class="cards">
								<div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>"  data-toggle="modal" data-target="#myModal" >
									<button type="button" class="btn btn-light text-left font-weight-bold font-color-black"> <!-- Modal-->                  
										<ul class="b" id="draged">
										<strong text-align="center"><?php echo $row['job_priority']?></strong>
										<li><?php echo $row['job_order_number']?></li>
										<li><?php echo $row['job_description']?></li>
										<li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
										<li><?php echo $row['machine_name']?></li>
										</ul>
										<div class="status"  id="doingStatus">
										<?php echo $row['job_status']?>
										</div>
								</div>
							</div>
					<?php } ?>				
				</div>
				
<!--PENDING-->


				<div class="column" >
					<p class="column-title"id="pending" >Pending</p>
					<?php             
						include 'dbconnect.php';
						$results = $conn->query("SELECT
						jobregister_id, job_order_number, job_priority, job_name, customer_name, 
						customer_grade, job_status, job_description, machine_name
						FROM
						job_register
						WHERE
						job_assign ='{$_SESSION['username']}' AND  job_status = 'Pending'

						ORDER BY jobregisterlastmodify_at
						DESC LIMIT 50");

						while($row = $results->fetch_assoc()) {
              
					?>
			  
						<div class="cards">
							<div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>"  data-toggle="modal" data-target="#myModal" >
								<button type="button" class="btn btn-light text-left font-weight-bold font-color-black"> <!-- Modal-->                  
									<ul class="b" id="draged">
										<strong text-align="center"><?php echo $row['job_priority']?></strong>
										<li><?php echo $row['job_order_number']?></li>
										<li><?php echo $row['job_description']?></li>
										<li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
										<li><?php echo $row['machine_name']?></li>
									</ul>
										<div class="status"  id="pendingStatus">
										<?php echo $row['job_status']?>
										</div>
							</div>
						</div>
					<?php } ?>
				</div>				
				
<!--COMPLETED-->				

				<div class="column" >
					<p class="column-title"id="done" >Completed</p>
					<?php             
						include 'dbconnect.php';
						$results = $conn->query("SELECT
						jobregister_id, job_order_number, job_priority, job_name, customer_name, 
						customer_grade, job_status, machine_name, job_description
						FROM
						job_register
						WHERE
						job_assign ='{$_SESSION['username']}' AND  job_status = 'Completed'

						ORDER BY jobregisterlastmodify_at
						DESC LIMIT 50");

						while($row = $results->fetch_assoc()) {
              
					?>
			  
						<div class="cards">
							<div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>"  data-toggle="modal" data-target="#myModal" >
								<button type="button" class="btn btn-light text-left font-weight-bold font-color-black"> <!-- Modal-->                  
									<ul class="b" id="draged">
										<strong text-align="center"><?php echo $row['job_priority']?></strong>
										<li><?php echo $row['job_order_number']?></li>
										<li><?php echo $row['job_description']?></li>
										<li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
										<li><?php echo $row['machine_name']?></li>
									</ul>
										<div class="status"  id="completedStatus">
										<?php echo $row['job_status']?>
										</div>
							</div>
						</div>
					<?php } ?>
				</div>
		
</div>

        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">						
                        <div class="tabs active" id="tab01">
                           <h6 class="font-weight-bold">Job Info</h6>
						</div>
						
                        <div class="tabs" id="tab02">
                           <h6 class="text-muted">Update</h6>
					    </div>
						
                        <div class="tabs" id="tab03">
                           <h6 class="text-muted">Remarks</h6>
					    </div>	
								
					    <div class="tabs" id="tab04">
                           <h6 class="text-muted">Accessories</h6>
					    </div>
						
					    <div class="tabs" id="tab05">
                           <h6 class="text-muted">Photo</h6>
					    </div>

							 <div class="tabs" id="tab06">
                            <h6 class="text-muted">Video</h6>
						</div>
						
					    <div class="tabs" id="tab07">
                            <h6 class="text-muted">Job Status</h6>
					    </div>

                        <div class="tabs" id="tab08">
                            <h6 class="text-muted">Report</h6>
						</div>

					
          
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					        <span aria-hidden="true">&times;</span>
					    </button>


<!--TOP BAR-->
						
						<div class="line"></div>
							<br>
						<div class="modal-body p-0">
					
					
<!--JOB INFO-->					
                        <fieldset class="show" id="tab011">

								<form action="" method="post">
									<div class="tech-details">           
									</div>
								</form>
						<script type='text/javascript'>
    
						$(document).ready(function() {
						$('.card').click(function() {
        
						var jobregister_id = $(this).data('id');
        
// AJAX request
        
						$.ajax({
						url: 'ajaxtechnician.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {
// Add response in Modal body

						$('.tech-details').html(response);
			
// Display Modal
			
						$('#myModal').modal('show');
						}
					});
				});
			});
    
						</script>								
						</fieldset>						
						



<!--UPDATE-->

                        <fieldset id="tab021">
                          

								<form action="ajaxtechupdate.php" method="post">
									<div class="techupdate-details">

									</div>
								</form>
								
								<script type='text/javascript'>
        
								$(document).ready(function() {
          
								$('.card').click(function() {
            
								var jobregister_id = $(this).data('id');
            
// AJAX request
            
								$.ajax({
								url:'ajaxtechupdate.php',
								type:'post',
								data:{jobregister_id: jobregister_id},
								success: function(response) {
// Add response in Modal body
								$('.techupdate-details').html(response);
// Display Modal
								$('#myModal').modal('show');
								}
							});
						});
					});
      
							</script>                         
                        </fieldset>


<!--REMARKS-->

                        <fieldset id="tab031">
                          

								<form action="ajaxremarks.php" method="post">
									<div class="remark-details">
									</div>
								</form>		
								
							<script type='text/javascript'>

							$(document).ready(function() {
							$('.card').click(function() {
							var jobregister_id = $(this).data('id');
        
        // AJAX request
        
							$.ajax({
							url: 'ajaxremarks.php',
							type: 'post',
							data: {jobregister_id: jobregister_id},
							success: function(response) {
                
         // Add response in Modal body
							$('.remark-details').html(response);
         // Display Modal
							$('#myModal').modal('show');
							}
						});
					});
				});
			</script>
                            
                        </fieldset>


<!--ACCESSORIES-->

                        <fieldset id="tab041">
                            
							
								<form action="ajaxtabaccessoriestech.php" method="post">
									<div class="acc-details">
									</div>
								</form>
								
								<script type='text/javascript'>

								$(document).ready(function() {
								$('.card').click(function() {
								var jobregister_id = $(this).data('id');
        
        // AJAX request
        
								$.ajax({
								url: 'ajaxtabaccessoriestech.php',
								type: 'post',
								data: {jobregister_id: jobregister_id},
								success: function(response) {
                
		// Add response in Modal body
								$('.acc-details').html(response);
        // Display Modal
								$('#myModal').modal('show');
								}
							});
						});
					});
							</script>														
						</fieldset>



<!--PHOTOS-->						
						
                        <fieldset id="tab051">
                            
							
						        <form action="ajaxtechnicianphoto.php" method="post">
									<div class="photo-details">
									</div>
								</form>	
								
								<script type='text/javascript'>

								$(document).ready(function() {
								$('.card').click(function() {
								var jobregister_id = $(this).data('id');
        
        // AJAX request
        
								$.ajax({
								url: 'ajaxtechnicianphoto.php',
								type: 'post',
								data: {jobregister_id: jobregister_id},
								success: function(response) {
                
        // Add response in Modal body
								$('.photo-details').html(response);
        // Display Modal
								$('#myModal').modal('show');
								}
							});
						});
					});
							</script>												
						</fieldset>

								<!--MEDIA-->

                        <fieldset id="tab061">
                            

							    <form action="ajaxtechnicianvideo.php" method="post">
									<div class="video-details">
									</div>
								</form>
								
								
								<script type='text/javascript'>

								$(document).ready(function() {
								$('.card').click(function() {
								var jobregister_id = $(this).data('id');
        
        // AJAX request
        
								$.ajax({
								url: 'ajaxtechnicianvideo.php',
								type: 'post',
								data: {jobregister_id: jobregister_id},
								success: function(response) {
                
        // Add response in Modal body
								$('.video-details').html(response);
        // Display Modal
								$('#myModal').modal('show');
								}
							});
						});
					});
							</script>                          
                        </fieldset>



<!--JOB STATUS-->

                        <fieldset id="tab071">
                           
							
							    <form action="ajaxtechjobstatus.php" method="post">
									<div class="techjobstatus-details">

									</div>
								</form>
								
								<script type='text/javascript'>

								$(document).ready(function() {
								$('.card').click(function() {
								var jobregister_id = $(this).data('id');
        
        // AJAX request
        
								$.ajax({
								url: 'ajaxtechjobstatus.php',
								type: 'post',
								data: {jobregister_id: jobregister_id},
								success: function(response) {
                // Add response in Modal body
								$('.techjobstatus-details').html(response);
                // Display Modal
								$('#myModal').modal('show');
								}
							});
						});
					});
							</script>													
						</fieldset>		

<!--REPORT-->

                        <fieldset id="tab081">
                            

							    <form action="ajaxreport.php" method="post">
									<div class="report-details">
									</div>
								</form>
								
								
								<script type='text/javascript'>

								$(document).ready(function() {
								$('.card').click(function() {
								var jobregister_id = $(this).data('id');
        
        // AJAX request
        
								$.ajax({
								url: 'ajaxreport.php',
								type: 'post',
								data: {jobregister_id: jobregister_id},
								success: function(response) {
                
        // Add response in Modal body
								$('.report-details').html(response);
        // Display Modal
								$('#myModal').modal('show');
								}
							});
						});
					});
							</script>                          
                        </fieldset>

				


</div>
</div>
</div>
</div>
</div>

</body>