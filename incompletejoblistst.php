<?php
session_start();
 if($_SESSION['technician_rank']!="1st Leader" ){
  header("location:incompletejoblistnd.php");
 }
?>

<html lang="en">

<head>

	<title>Incomplete Job List</title>
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
	<script src="js/testing.js" type="text/javascript"></script>
	<script src="js/search.js" type="text/javascript"></script>

</head>

<style>

.dropdown-content {
  display: none;
  padding-left: 20px;
  position: absolute;
  background-color: #f9f9f9;
  min-width: auto;
  bottom: 55px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  padding-right: 7px;

}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  color:whitesmoke;
}

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
	  <span class="nav__text">Job Listing</span>
		<div class="dropdown-content">
			<a href="assignedjob.php">Assigned Job</a>
			<a href="unassignedjob.php">Unassigned Job</a>
		  </div>
	  </div>

  <a href="pendingjoblistst.php" class="nav__link">
	  <i class="material-icons">pending_actions</i>
	  <span class="nav__text">Pending</span>
  </a>
  
  <a href="technician.php" class="nav__link">
	  <i class="material-icons">home</i>
	  <span class="nav__text">Home</span>
  </a>

  <a href="incompletejoblistst.php" class="nav__link">
	  <i class="material-icons">do_not_disturb_on</i>
	  <span class="nav__text">Incomplete</span>
  </a>
  
  <a href="completejoblistst.php" class="nav__link">
	  <i class="material-icons">check_circle</i>
	  <span class="nav__text">Complete</span>
  </a>
	</nav>
	
	
<div class="container">	

<div class="example" style="text-align: end; padding-bottom: 10px;" >
    <input type="text" id="search">
    <input type="button"  id="button" onmousedown="doSearch(document.getElementById('search').value)" value="Find">
</div>	

    <div class="column">
        <p class="column-title" id="joblisting"><b>Incomplete</b></p>
		<?php
include 'dbconnect.php';

$query = "SELECT * FROM job_register 
WHERE job_status = 'Incomplete' AND job_cancel=''
ORDER BY jobregisterlastmodify_at DESC LIMIT 50";

$result = mysqli_query($conn, $query);

$customer_name = '';
while ($row = mysqli_fetch_assoc($result)){

  $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
  $updatedate = substr($jobregisterlastmodify_at,0,10);
  $row['updatedate'] = $updatedate;

    // only show artist when it's an other artist then the previous one
    if ($row['customer_name'] != $customer_name){
        echo "<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>";
        $customer_name = $row['customer_name'];
    }
    echo "<div class='cards'>
    <div class='card' id='notYetStatus' data-id='".$row['jobregister_id']."' data-toggle='modal' data-target='#mymodal'>
    <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
    <ul class='b' id='draged'>
            <strong text-align='center'>".$row['job_priority']."</strong>
            <li>".$row['job_order_number']."</li>
            <li>".$row['job_description']."</li>
            <li>".$row['machine_name']."</li>
            <li>".$row['machine_type']."</li>
            <li>".$row['serialnumber']."</li>
            <strong text-align='center' style='color:red'>".$row['reason']."</strong>
        </ul>
        <div class='timestamp' style='font-family: sans-serif;'>
        <strong>".$row['job_assign']."</strong>
					  <br>
					  <strong>".$row['updatedate']."</strong>
    </div>
    </div>
    </div>";
    }
?>
        </div>
	
 <!--VIEW BUTTON MODAL AJAX-->
	

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
	

<!--JOB INFO-->
						
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab011">
						
						
                        <form action="techleaderindex.php" method="post">
                            <div class="tech-details">

                            </div>
                        </form>				
						
						
							<script type='text/javascript'>

							$(document).ready(function() {
							$('.card').click(function() {
							var jobregister_id = $(this).data('id');
        
							// AJAX request
        
							$.ajax({
							url: 'ajaxtechnician-completed.php',
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
							</script></fieldset>

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

	<script src="https://kit.fontawesome.com/7b6b55bad0.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
	
</body>
</html>