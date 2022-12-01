<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta name="keywords" content=""/>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Neo Sau Keong</title>
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="css/technicianmain.css" rel="stylesheet" />
    <!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
	<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>
<body>
	
	<nav class="navbar1">
		<div class="wrapper">
			<div class="ul2" style="margin-left: auto; display: block;">
				<a href="logout.php" class="nav1-links"><i class="iconify" data-icon="icon-park:logout" style="font-size:32px;"></i></a>
			</div>
		</div>
	</nav>
	
	<nav class="nav">
		<a href="NeoSauKeongAssignedjob.php" class="nav__link">
			<i class="material-icons">list_alt</i>
			<span class="nav__text">Assigned Job</span>
		</a>

		<a href="NeoSauKeongPendingjob.php" class="nav__link">
			<i class="material-icons">pending_actions</i>
			<span class="nav__text">Pending</span>
		</a>
		
		<a href="NeoSauKeong.php" class="nav__link">
			<i class="material-icons">home</i>
			<span class="nav__text">Home</span>
		</a>
		
		<a href="NeoSauKeongIncompletejob.php" class="nav__link">
			<i class="material-icons">do_not_disturb_on</i>
			<span class="nav__text">Incomplete</span>
		</a>
		
		<a href="NeoSauKeongCompletedjob.php" class="nav__link">
			<i class="material-icons">check_circle</i>
			<span class="nav__text">Complete</span>
		</a>
	</nav>
	
	<div class="container">
		<div style="text-align: center; font-size: 35px; font-weight: bold; margin-top: -29px;" class="welcome">Welcome <?php echo $_SESSION['username'] ?>!</div>
		<div class="column" >
			<p class="column-title"id="doing">Job Listing</p>
				<?php
					include 'dbconnect.php';
					
					$query ="SELECT * FROM job_register WHERE
								(accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = '')
									OR
                            	(accessories_required IS NULL AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                	OR
                            	(accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                	OR
                            	(accessories_required = 'NO' AND job_status IS NULL AND job_assign = '' AND job_cancel IS NULL)
                                	OR
                            	(accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
                                	OR
                            	(accessories_required = 'NO' AND job_status = '' AND job_assign IS NULL AND job_cancel = '')
                                	OR
                            	(accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                	OR
                            	(accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel IS NULL)
                                	OR
                            	(accessories_required = 'NO' AND job_assign = '' AND job_status = 'Doing' AND job_cancel IS NULL)
                                	OR
                            	(staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel = '')
                                	OR
                            	(staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel IS NULL)
                                	OR
                            	(job_assign = '' AND job_status = 'Ready' AND job_cancel = '')
                                	OR
                            	(job_assign IS NULL AND job_status = 'Ready' AND job_cancel IS NULL) 
							 ORDER BY jobregisterlastmodify_at DESC LIMIT 50";
						
					$result = mysqli_query($conn, $query);
						
					$customer_name = '';
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row['customer_name'] != $customer_name)
								{
									echo "<div class='cardupdate' data-id='".$row['jobregister_id']."' data-customer_name='".$row['customer_name']."' data-requested_date='".$row['requested_date']."' data-toggle='modal' data-target='#myModalupdate'>
										  	<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>
									  	  </div>";
										
									$customer_name = $row['customer_name'];
								}

							    	echo "<nav id='mainNav'>
										  	<div class='cards'>
												<div class='card' id='notYetStatus' data-id='".$row['jobregister_id']."' data-type_id='".$row['type_id']."' data-customer_name='".$row['customer_name']."' data-toggle='modal' data-target='#myModal'>
													<button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
														<ul class='b' id='draged'>
															<strong text-align='center'>".$row['job_priority']."</strong>
															<li>".$row['job_order_number']."</li>
															<li>".$row['job_description']."</li>
															<li>".$row['machine_type']."</li>
															<li>".$row['machine_name']."</li>
															<li>".$row['serialnumber']."</li>
															<p style='color:red;'>".$row['reason']."</p>
														</ul>
														<div class='supports'  id='support'>
															".$row['support']."
														</div>
												</div>
											</div>
									  	  </nav>";
						}
				?>
					
		</div>
		
		<!-- Job Listing PopUp Modal -->
		<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
			<div role="document" class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
					<div class="tabs active" id="tab01">
                        <h6 class="font-weight-bold">Job Info</h6>
                    </div>
                    
                    <div class="tabs" id="tab02">
                        <h6 class="text-muted">Job Assign</h6>
                    </div>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" style="font-size:20px;"></i></button>
					
					<div class="line">

					</div>
					
					<div class="line"></div>
					<br>
					<div class="modal-body p-0">
						
						<!--Job Info-->
						<fieldset class="show" id="tab011">
                            <form action="ajaxtechleader.php" method="post">
                                <div class="tech-details">

                                </div>
                            </form>
							
							<script type='text/javascript'>
								$(document).ready(function() {
									$('.card').click(function() {
										var jobregister_id = $(this).data('id');
										var type_id = $(this).data('type_id');
										var customer_name = $(this).data('customer_name');
										// AJAX request
										$.ajax({
											url: 'ajaxtechnician-completed.php',
											type: 'post',
											data: {jobregister_id: jobregister_id,
														  type_id: type_id,
													customer_name: customer_name},
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
						
						<!--Job Assign-->
						<fieldset id="tab021">
                            <form action="jobassignst.php" method="post">
                                <div class="techupdate-details">

                                </div>
                            </form>
							
							<script type='text/javascript'>
                                $(document).ready(function() {
                                    $('.card').click(function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url:'jobassignst.php',
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
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>