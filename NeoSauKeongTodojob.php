<?php session_start(); ?>

<html lang="en">
<head>
    <title>Assigned Job</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
	<link href="css/technicianmain.css"rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="#"rel="shortcut icon" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/7b6b55bad0.js" crossorigin="anonymous"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	<script src="js/search.js" type="text/javascript"></script>
</head>

<style>

    #notYetStatus{
        position: static;
    }
    
    /* Main Feature */
    .navbar {
        margin-top: 20px;
        background-color: #ddd;
        overflow: hidden;
        max-height: 1800px;
        -webkit-transition: max-height 0.3s;
        -moz-transition: max-height 0.3s;
        -ms-transition: max-height 0.3s;
        -o-transition: max-height 0.3s;
        transition: max-height 0.3s;
    }
    
    /* Other */
    
    .navbar-toggle {
        background-color: #D2D2CF;
        color: black;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        font-weight: bold;
    }
    
    .nav {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

</style>

<body>
    
    <nav class="nav">
		<div class="nav__link nav__link dropdown">
			<i class="material-icons">list_alt</i>
			<span class="nav__text">Assigned Job</span>
			<div class="dropdown-content">
				<a href="NeoSauKeongTodojob.php">Todo</a>
				<a href="NeoSauKeongDoingjob.php">Doing</a>
			</div>
		</div>

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
        <div class="example" style="text-align: end; padding-bottom: 10px;">
		<input type="text" id="search">
		<input type="button"  id="button" onmousedown="doSearch(document.getElementById('search').value)" value="Find">
	</div>
    
    <!-- Todo -->
    <div class="column">
        <p class="column-title" id="joblisting"><b>Todo</b></p>
			<?php
                include 'dbconnect.php';
				
				$query ="SELECT * FROM job_register WHERE
                            (job_assign !='Storekeeper' AND job_assign != '' AND  job_status = '' AND job_cancel='' AND accessories_required ='')
                                OR
				            (job_assign !='Storekeeper' AND job_assign != '' AND  job_status IS NULL AND job_cancel IS NULL AND accessories_required IS NULL)
				                OR
				            (job_assign !='Storekeeper' AND job_assign != '' AND  job_status = '' AND job_cancel='' AND accessories_required ='No')
				                OR
				            (job_assign !='Storekeeper' AND job_assign != '' AND  job_status IS NULL AND job_cancel IS NULL AND accessories_required IS NULL)
				                OR
				            (job_assign !='Storekeeper' AND job_assign != '' AND  job_status IS NULL AND job_cancel IS NULL AND accessories_required ='No')
				         ORDER BY jobregisterlastmodify_at DESC LIMIT 50";
				
				$result = mysqli_query($conn, $query);
				
				$customer_name = '';
				
				while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['customer_name'] != $customer_name)
                    {
                        echo "<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>";
						$customer_name = $row['customer_name'];
					}
                    
                    echo "<div class='cards'>
                            <div class='card' id='notYetStatus' data-id='".$row['jobregister_id']."' data-type_id='".$row['type_id']."' data-toggle='modal' data-target='#mymodal'>
                                <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
                                    <ul class='b' id='draged'>
                                        <strong text-align='center'>".$row['job_priority']."</strong>
                                        <li>".$row['job_order_number']."</li>
                                        <li>".$row['job_description']."</li>
                                        <li>".$row['machine_name']."</li>
                                        <li>".$row['machine_type']."</li>
                                        <li>".$row['serialnumber']."</li>
                                    </ul>
                                    <div class='timestamp' style='font-family: sans-serif;'>
                                        <strong>".$row['support']."</strong>
                                        <br>
                                        <strong>".$row['job_assign']."</strong>
                                    </div>
						    </div>
						  </div>";
				}
			?>
	</div>
    <!-- End of Todo -->

    <!-- PopUp Modal -->
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
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
                        
                        <!--JOB INFO-->
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
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechnician-completed.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id,type_id: type_id},
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