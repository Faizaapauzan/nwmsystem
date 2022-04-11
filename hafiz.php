<!-- <?php

session_start();

if(!isset($_SESSION['username']))
	{	
    header("location:loginpage.php");
	}

    elseif($_SESSION["username"]="HAFIZ")
	{

	}

  else
	{
			header("location:loginpage.php");
	}

?> -->

<!DOCTYPE html>


<html lang="en">

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>
    <link href="css/testing.css"rel="stylesheet" />
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	

 
</head>

<body>

    <!--Home navigation-->
    <section class="home-section">
        <nav>
		
           <div class="sidebar-button1">
            <i class='bx bx-log-out'></i>
            <a href="logout.php">
                  <span class="dashboard">LOGOUT</span>
            </a>
           </div>		

           <div class="sidebar-button">
            <i class='bx bx-detail'></i>
            <a href="hafizjoblisting.php">
                  <span class="dashboard">JOB LISTING</span>
              </a>
           </div>
	
          <div class="welcome">Welcome <?php echo $_SESSION["username"] ?>!</div>
        </nav>
        
		
<!--TODO-->


        <div class="container">
          <div class="column">
            <p class="column-title" id="todo">Todo</p>
  <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Hafiz' AND job_status = ''
               OR
               job_assign = 'Hafiz' AND job_status = 'Doing'
               OR
               job_assign = 'Hafiz' AND job_status = 'Ready'
               OR
               job_assign = 'Hafiz' AND job_status = 'Incomplete')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");

              while($row = $results->fetch_assoc()) {
              
              ?>

              <div class="cards">
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>"  data-toggle="modal" data-target="#myModal" >
			  	<button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black"> <!-- Modal-->                  
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="toDoStatus">
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
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Hafiz' AND job_status = 'Pending')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              
              while($row = $results->fetch_assoc()) {
                  
              ?>

              <div class="cards" >
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>"  data-toggle="modal" data-target="#myModal" >
			  	<button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black"> <!-- Modal-->
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="pendingStatus">
                    <?php echo $row['job_status']?>
                    </div>
                </div>
              </div>

              <?php } ?>

            </div>


 <!--COMPLETE-->


          
            <div class="column">
              <p class="column-title" id="done">Complete</p>
              
               <?php
              
              include 'dbconnect.php';
              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Hafiz' AND job_status = 'Completed')
              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              while($row = $results->fetch_assoc()) {
                
              ?>

              <div class="cards" >
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
			  	<button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black"> <!-- Modal-->
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="completedStatus">
                    <?php echo $row['job_status']?>
                    </div>
                </div>
				</button>
              </div>
              <?php } ?>

            </div>
            </div>
        </section>



 <!--VIEW BUTTON MODAL AJAX-->
	

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
                            <h6 class="text-muted">Report</h6>
						</div>
						
						<div class="tabs" id="tab05">
                            <h6 class="text-muted">Accessories</h6>
						</div>
						
						<div class="tabs" id="tab06">
                            <h6 class="text-muted">Media</h6>
						</div>
						
						<div class="tabs" id="tab07">
                            <h6 class="text-muted">Job Status</h6>
						</div>
					

<!--JOB INFO-->
						
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
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
		</div>


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


<!--REPORT-->

                        <fieldset id="tab041">
                            

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


<!--ACCESSORIES-->

                        <fieldset id="tab051">
                            
							
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
						
<!--PHOTO-->						
						
                        <fieldset id="tab061">
                            
							
						        <form action="ajaxtechphtoupdt.php" method="post">
									<div class="photo-details">
									</div>
								</form>	
								
								<script type='text/javascript'>

								$(document).ready(function() {
								$('.card').click(function() {
								var jobregister_id = $(this).data('id');
        
        // AJAX request
        
								$.ajax({
								url: 'ajaxtechphtoupdt.php',
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

		</div>			
        </div>						
		</div>
		</div>
		</div>
				
						
						
						

	



















</body>
</html>