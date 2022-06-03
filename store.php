<?php

session_start();
if($_SESSION['staff_position']==""){
  header("location:index.php?error");
 }

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
   	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>Storekeeper</title>
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
		
    <div class="sidebar-button">
     <i class='bx bx-log-out'></i>
     <a href="logout.php">
           <span class="dashboard">LOGOUT</span>
     </a>
    </div>	

<!--            <div class="sidebar-button">
         <a href="logout.php">
             <i class='bx bx-log-out'></i>
         </a>
     </div> -->
   
    </nav>
        
        <div class="container">
        <div style="text-align: center; font-size: 35px; font-weight: bold;" class="welcome">Welcome <?php echo $_SESSION['username'] ?>!</div>
          <div class="column">
            <p class="column-title" id="todo">Todo</p>

               <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
                accessories_required = 'Yes' AND job_status = ''
                  OR
                staff_position = 'Storekeeper' AND job_status = ''
                  OR
                accessories_required = 'Yes' AND job_status = 'Incomplete'
                  OR
                staff_position = 'Storekeeper' AND job_status = 'Incomplete'
                 


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
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                  </p>
                </div>
              </div>

              <?php } ?>

            </div>

            <div class="column">
            <p class="column-title" id="doing">Doing</p>

               <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              accessories_required = 'Yes' AND job_status = 'Doing'
               OR
              staff_position = 'Storekeeper' AND job_status = 'Doing'

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
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                  </p>
                </div>
              </div>

              <?php } ?>

            </div>

            <div class="column">
              <p class="column-title"id="pending" >Accessories Ready</p>

            <?php
              
              include 'dbconnect.php';
              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              staff_position = 'Storekeeper' AND job_status = 'Ready'
              OR
              accessories_required = 'Yes' AND job_status = 'Ready'
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
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="readyStatus">
                    <?php echo $row['job_status']?>
                    </div>
                  </p>
                </div>
              </div>

              <?php } ?>

            </div>
            
            <div class="column">
              <p class="column-title" id="done">Accessories Not Ready</p>

            <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status, reason
              FROM
              job_register
              WHERE
              accessories_required = 'Yes' AND job_status = 'Not Ready'
              OR
              staff_position = 'Storekeeper' AND job_status = 'Not Ready'
              OR
              accessories_required = 'Yes' AND job_status = 'Pending'
              OR
              staff_position = 'Storekeeper' AND job_status = 'Pending'


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
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                    <li><b>Pending Reason: </b><?php echo $row['reason']?></li>
                  </ul>
                    <div class="status"  id="pendingStatus">
                    <?php echo $row['job_status']?>
                    </div>
                  </p>
                </div>
              </div>

              <?php } ?>


            </div>
          </div>
        </section>


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
                            <h6 class="text-muted">Status</h6>
					            	</div>	

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					            		<span aria-hidden="true">&times;</span>
					            	</button>

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
						

                        <fieldset  id="tab021">


                        <form action="ajaxstoreupdate.php" method="post">
                         <div class="storeupdate-details">

                        </div>
                        </form>
					      	<script type='text/javascript'>    
					      	$(document).ready(function() {
					      	$('.card').click(function() {        
					      	var jobregister_id = $(this).data('id');
        
// AJAX request
        
						$.ajax({
						url: 'ajaxstoreupdate.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {
// Add response in Modal body

						$('.storeupdate-details').html(response);
			
// Display Modal
			
						$('#myModal').modal('show');
						}
					});
				});
			});
    
	        </script>								
					</fieldset>						
	</div>



<!--STATUS-->
						

                        <fieldset  id="tab031">


                        <form action="ajaxstorejobstatus.php" method="post">
                         <div class="storejobstatus-details">

                         </div>
                        </form>
					      	<script type='text/javascript'>    
					      	$(document).ready(function() {
					      	$('.card').click(function() {        
					      	var jobregister_id = $(this).data('id');
        
// AJAX request
        
						$.ajax({
						url: 'ajaxstorejobstatus.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {
// Add response in Modal body

						$('.storejobstatus-details').html(response);
			
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