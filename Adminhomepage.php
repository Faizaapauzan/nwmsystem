<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['staff_position']==""){
  header("location:index.php?pesan=gagal");
  
 }
 ?>

<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link href="css/homepage.css"rel="stylesheet" />
    <link href="css/adminhomepage.css"rel="stylesheet" />
    <link href="css/machine.css"rel="stylesheet" />
    <!-- Boxiocns CDN Link -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
	
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>


   
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">NWM SYSTEM</span>
    </div>

    <div class="welcome" style="color: white; text-align: center; font-size:small;">Hi  <?php echo $_SESSION["username"] ?>!</div>

    <ul class="nav-links">

      <li>
        <a href="jobregister.php">
          <i class='bx bx-registered' ></i>
          <span class="link_name">Register Job</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobregister.php">Register Job</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="accessoriesregister.php">
            <i class='bx bx-spreadsheet' ></i>
            <span class="link_name">Job Accessories</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="accessoriesregister.php">Job Accessories</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="staff.php">
            <i class='bx bx-id-card' ></i>
            <span class="link_name">Staff</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="staff.php">Staff</a></li>
        </ul>
      </li>

      <li>
        <a href="technicianlist.php">
          <i class='fa fa-users' ></i>
          <span class="link_name">Technician</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="technicianlist.php">Technician</a></li>
        </ul>
      </li>

      <li>
        <a href="customer.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Customers</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="customer.php">Customers</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="machine.php">
            <i class='fa fa-medium' ></i>
            <span class="link_name">Machine</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="machine.php">Machine</a></li>
        </ul>
      </li>

      <li>
        <a href="accessories.php">
          <i class='bx bx-wrench' ></i>
          <span class="link_name">Accessories</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="accessories.php">Accessories</a></li>
        </ul>
      </li>

      <li>
        <a href="jobtype.php">
          <i class='bx bx-briefcase'></i>
          <span class="link_name">Job Type</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobtype.php">Job Type</a></li>
        </ul>
      </li>

      <li>
        <a href="jobcompleted.php">
          <i class='fa fa-check-square-o' ></i>
          <span class="link_name">Completed Job</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobcompleted.php">Compeleted Job</a></li>
        </ul>
      </li>

      <li>
        <a href="jobcanceled.php">
          <i class='fa fa-minus-square' ></i>
          <span class="link_name">Canceled Job</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobcanceled.php">Canceled Job</a></li>
        </ul>
      </li>
      
      <li>
        <a href="report.php">
          <i class='bx bxs-report' ></i>
          <span class="link_name">Report</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="report.php">Report</a></li>
        </ul>
      </li>

      <li>
        <a href="logout.php">
          <i class='bx bx-log-out' ></i>
          <span class="link_name">Logout</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="logout.php">Logout</a></li>
        </ul>
      </li>


  </div>



<section class="home-section">
    <nav>
                <div class="home-content">
                      <i class='bx bx-menu' ></i>
                          <a>
						<button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="btn-reset" onclick="document.location='Adminhomepage.php'" ondblclick="document.location='adminjoblisting.php'">Home</button>
                          </a>

                 </div>

    </nav>  

       <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

        <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
                }
            }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
            }
    </script>

    
                <div class="w3-quarter">
                    <div class="overview-boxes">
						<div class="row">
                   
                    
        <!-- Job Listing -->

                        <div class="box" id="myModal">
                              <div class="box_topic">Job Listing</div>

                            <?php
                                include 'dbconnect.php';
                            
                                $results = $conn->query("SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status FROM job_register WHERE
                                                               (accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = ''
                                                                    OR
                                                                accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel = ''
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel = ''
                                                                    OR
                                                                job_assign = '' AND job_status = 'Ready' AND job_cancel = '')
                                                        ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                $numRow = "SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status FROM job_register WHERE
                                                               (accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = ''
                                                                    OR
                                                                accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel = ''
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel = ''
                                                                    OR
                                                                job_assign = '' AND job_status = 'Ready' AND job_cancel = '')";
                                $numRow_run = mysqli_query ($conn,$numRow);
                                if ($row_Total = mysqli_num_rows($numRow_run))
                                    {
                                        echo '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
                                    }
                                else
                                    {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                while($row = $results->fetch_assoc()) {
                            ?>
                            
								<div class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
									<input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
										<ul class="b" id="draged">
										<strong text-align="center"><?php echo $row['job_order_number']?></strong>
										<li><?php echo $row['job_priority']?></li>
										<li><?php echo $row['customer_name']?></li>
										<li><?php echo $row['machine_type']?></li>
										<li><?php echo $row['job_description']?></li>
										<li><b><?php echo $row['accessories_required']?></b> accessories required</li>
										<li><?php echo $row['job_status']?></li>
										</ul>
								</div>
                            <?php } ?>             
							
                        </div>
                        
						
					
        <!-- Job Listing Popup Modal -->

            <div id="doubleClick-1" class="modal">
                <div class="tabs">
                    <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
                    <label for="tabDoingOne" class="tabHeading">Job Info</label>
                    <div class="tab" id=jobInfoTabs>
                        <div class="TechJobInfoTab">
                            <div class="contentTechJobInfo">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="tech-details">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.todo').click(function() {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxhome.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.tech-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-1').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Job Listing Accessories Tab -->

                    <input type="radio" name="tabDoing" id="tabDoingTwo">
                    <label for="tabDoingTwo" class="tabHeading"> Accessories </label>
                    <div class="tab">
                        <div class="TechJobInfoTab">
                            <div class="contentTechJobInfo">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="acc-details">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.todo').click(function() {
                                    var jobregister_id = $(this).data('id'); 
                                    // AJAX request 
                                    $.ajax({
                                        url: 'ajaxtabaccessories.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.acc-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-1').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

        <!-- Job Listing Popup Modal -->

        </div>
    </div>						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
				
						
                        <div class="box" id="myModal">
                              <div class="box_topic">Store</div>

                             <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status FROM job_register WHERE
                                                               (accessories_required = 'Yes' AND job_status = ''
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = ''
                                                                    OR
                                                                accessories_required = 'Yes' AND job_status = 'Not Ready'
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Not Ready'
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Incomplete'
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Pending')
                                                         ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
														 
                                $numRow = "SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status FROM job_register WHERE
                                                               (accessories_required = 'Yes' AND job_status = ''
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = ''
                                                                    OR
                                                                accessories_required = 'Yes' AND job_status = 'Not Ready'
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Not Ready'
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Incomplete'
                                                                    OR
                                                                staff_position = 'Storekeeper' AND job_status = 'Pending')";
                                $numRow_run = mysqli_query ($conn,$numRow);
                                if ($row_Total = mysqli_num_rows($numRow_run))
                                    {
                                        echo '<h4 style="text-align:right;" >Total Job: '.$row_Total.' </h4>';
                                    }
                                else
                                    {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                while($row = $results->fetch_assoc()) {
                            ?>

										<div class="Store" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Store"  ondblclick="document.getElementById('doubleClick-Store').style.display='block'">
											<input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
												<ul class="b" id="draged">
													<strong text-align="center"><?php echo $row['job_order_number']?></strong>
													<li><?php echo $row['job_priority']?></li>
													<li><?php echo $row['customer_name']?></li>
													<li><?php echo $row['machine_type']?></li>
													<li><?php echo $row['job_description']?></li>
													<li><?php echo $row['job_status']?></li>
												</ul>
										</div>
												<?php } ?>                                                           
                        </div>
							
        <!-- Storekeeper Popup Modal -->
                
            <div id="doubleClick-Store" class="modal">
                <div class="tabStore">
                    <input type="radio" name="tabDoingStore" id="tabDoingStore1" checked="checked">
                    <label for="tabDoingStore1" class="tabHeadingStore"> Job Info </label>
                    <div class="tab" id="StoreJobInfoTab">
                        <div class="contentStoreJobInfo">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
                            <form action="homeindex.php" method="post">
                                <div class="store-details">

                                </div>
                            </form>
                        </div>
                    </div>
                        
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Store').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxhome.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.store-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-Store').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Storekeeper Accessories Tab -->
            
                    <input type="radio" name="tabDoingStore" id="tabDoingStore2">
                    <label for="tabDoingStore2" class="tabHeadingStore"> Accessories </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
                        <form action="ajaxtabaccessories.php" method="post">
                            <div class="store-accessories">

                            </div>
                        </form>
                    </div>
                    
                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.Store').click(function() {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtabaccessories.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.store-accessories').html(response);
                                            // Display Modal
                                            $('#doubleClick-Store').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Storekeeper Update Tab -->
        
                    <input type="radio" name="tabDoingStore" id="tabDoingStore3">
                    <label for="tabDoingStore3" class="tabHeadingStore"> Update </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
                        <form action="ajaxstoreupdate.php" method="post">
                            <div class="store-update">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.Store').click(function() {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxstoreupdate.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.store-update').html(response);
                                            // Display Modal
                                            $('#doubleClick-Store').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

        <!-- Storekeeper Popup Modal -->

        <!-- Storekeeper -->






        <!-- TECHNICIAN -->


            <?php
                include 'dbconnect.php';
                
                $result = $conn->query("SELECT job_assign, jobregister_id, jobregisterlastmodify_at,
                                        GROUP_CONCAT(CONCAT_WS('<ul><li></li></ul>',job_order_number, job_priority, customer_name, machine_type, job_description, job_status)) as technicianinfo
                                        FROM tech_joblist
                                        WHERE job_status = '' OR job_status = 'Doing' OR job_status = 'Incomplete' OR job_status = 'Ready'
                                        GROUP BY job_assign
                                        ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
									
					while($row = $result->fetch_assoc()){
                    $jobregister_id = $row['jobregister_id'];
                    $value = $row['technicianinfo'];
                    $technicianinfo = explode(',',$value);
            ?>
            
			
            <div class="box" id="myModal">
                <div class="left-side">
                    <div class="box_topic"><?php echo $row['job_assign'] ?></div>
                    <?php foreach( $technicianinfo as $item){
                        echo"<div class='Technician' data-id='" . $jobregister_id . "' data-target='doubleClick-Technician'  ondblclick='document.getElementById('doubleClick-Boon').style.display='block''>
                             <input type='hidden' name='jobregister_id' id='jobregister_id' value='" . $jobregister_id . "' readonly>
                                <ul class='b' id='draged'>
                                    $item
                                </ul>
                             </div>";
                    }?>
                </div>
            </div>
            <?php } ?>						
							


        <!-- Technician Popup Modal -->







            <div id="doubleClick-Technician" class="modal">
                <div class="tabTechnician">
                    <input type="radio" name="tabDoingTechnician" id="tabDoingTechnician1" checked="checked">
                    <label for="tabDoingTechnician1" class="tabHeadingTechnician"> Job Info </label>
                    <div class="tab" id="TechnicianJobInfoTab">
                        <div class="contentTechnicianJobInfo">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Technician').style.display='none'">&times</div>
                            <form action="homeindex.php" method="post">
                                <div class="Technician-details">

                                </div>
                            </form>
                        </div>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
							$('body').on('click','.Technician',function(){ 
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxhome.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.Technician-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-Technician').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Technician Update Tab -->

                    <input type="radio" name="tabDoingTechnician" id="tabDoingTechnician2">
                    <label for="tabDoingTechnician2" class="tabHeadingTechnician">Update</label>
                    <div class="tab" id="TechnicianJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Technician').style.display='none'">&times</div>
                        <form action="ajaxtechupdateadmin.php" method="post">
                            <div class="Technician-update">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
							$('body').on('click','.Technician',function(){
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechupdateadmin.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.Technician-update').html(response);
                                            // Display Modal
                                            $('#doubleClick-Technician').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Technician Remark tab -->

                    <input type="radio" name="tabDoingTechnician" id="tabDoingTechnician3">
                    <label for="tabDoingTechnician3" class="tabHeadingTechnician"> Remarks </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Technician').style.display='none'">&times</div>
                        <form action="ajaxremarks.php" method="post">
                            <div class="Technician-remarks">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
							$('body').on('click','.Technician',function(){
                                $('.Technician').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxremarks.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.Technician-remarks').html(response);
                                            // Display Modal
                                            $('#doubleClick-Technician').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Technician Accessories Tab -->

                    <input type="radio" name="tabDoingTechnician" id="tabDoingTechnician4">
                    <label for="tabDoingTechnician4" class="tabHeadingTechnician"> Accessories </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Technician').style.display='none'">&times</div>
                        <form action="ajaxtabaccessories.php" method="post">
                            <div class="Technician-accessories">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
							$('body').on('click','.Technician',function(){
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtabaccessories.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.Technician-accessories').html(response);
                                            // Display Modal
                                            $('#doubleClick-Technician').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Technician Media tab -->
			

                    <input type="radio" name="tabDoingTechnician" id="tabDoingTechnician5">
                    <label for="tabDoingTechnician5" class="tabHeadingTechnician"> Media </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Technician').style.display='none'">&times</div>
                        <form action="ajaxtechphtoupdt.php" method="post">
                            <div class="Technician-photos">

                            </div>
                        </form>
                    </div>
        
    
                        <script type='text/javascript'>
                            $(document).ready(function () {
							$('body').on('click','.Technician',function(){
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechphtoupdt.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.Technician-photos').html(response);
                                            // Display Modal
                                            $('#doubleClick-Technician').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>			
			
			
		
			
			<!-- Technician Media tab -->


    
            <!-- Technician Report Tab -->

                    <input type="radio" name="tabDoingTechnician" id="tabDoingTechnician6">
                    <label for="tabDoingTechnician6" class="tabHeadingTechnician"> Report </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Technician').style.display='none'">&times</div>
                        <form action="ajaxreportadmin.php" method="post">
                            <div class="Technician-report">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

                        <script type='text/javascript'>                           
                            $(document).ready(function() {
							$('body').on('click','.Technician',function(){
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxreportadmin.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.Technician-report').html(response);
                                            // Display Modal
                                            $('#doubleClick-Technician').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

        <!-- Technician Popup Modal -->

        <!-- Technician -->

        <!-- END TECHNICIAN -->


							
							
                        <div class="box" id="myModal">
                              <div class="box_topic">Pending</div>

                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status
                                                         FROM job_register WHERE job_status = 'Pending'
                                                         ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                $numRow = "SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status
                                           FROM `job_register`WHERE job_status = 'Pending' ";
                                $numRow_run = mysqli_query ($conn,$numRow);
                                if ($row_Total = mysqli_num_rows($numRow_run))
                                    {
                                        echo '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
                                    }
                                else
                                    {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                while($row = $results->fetch_assoc()) {
                            ?>

								<div class="Pending" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Pending"  ondblclick="document.getElementById('doubleClick-Pending').style.display='block'">
									<input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
									<ul class="b" id="draged">
									<strong text-align="center"><?php echo $row['job_order_number']?></strong>
									<li><?php echo $row['job_priority']?></li>
									<li><?php echo $row['customer_name']?></li>
									<li><?php echo $row['machine_type']?></li>
									<li><?php echo $row['job_description']?></li>
									<li><?php echo $row['job_status']?></li>
									</ul>
								</div>
                            <?php } ?>                              
                              
                        </div>
						
						
            <div id="doubleClick-Pending" class="modal">
                <div class="tabPending">
                    <input type="radio" name="tabDoingPending" id="tabDoingPending1" checked="checked">
                    <label for="tabDoingPending1" class="tabHeadingPending"> Job Info </label>
					
                    <div class="tab" id="PendingJobInfoTab">
                        <div class="contentPendingJobInfo">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                            <form action="homeindex.php" method="post">
                                <div class="pending-details">

                                </div>
                            </form>
                        </div>
                    </div>			

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Pending').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxhome.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-Pending').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Pending Update Tab -->

                    <input type="radio" name="tabDoingPending" id="tabDoingPending2">
                    <label for="tabDoingPending2" class="tabHeadingPending">Update</label>
                    <div class="tab" id="PendingJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                        <form action="ajaxtechupdateadmin.php" method="post">
                            <div class="pending-update">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Pending').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechupdateadmin.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-update').html(response);
                                            // Display Modal
                                            $('#doubleClick-Pending').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>
						
            <!-- Pending Accessories Tab -->

                    <input type="radio" name="tabDoingPending" id="tabDoingPending4">
                    <label for="tabDoingPending4" class="tabHeadingPending">Accessories</label>
                    <div class="tab" id="PendingJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                        <form action="ajaxtabaccessories.php" method="post">
                            <div class="pending-accessories">

                            </div>
                        </form>
                    </div>
                    
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Pending').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtabaccessories.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-accessories').html(response);
                                            // Display Modal
                                            $('#doubleClick-Pending').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>


<!-- Pending MEDIA Tab -->

                    <input type="radio" name="tabDoingPending" id="tabDoingPending5">
                    <label for="tabDoingPending5" class="tabHeadingPending">Media</label>
                    <div class="tab" id="PendingJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                        <form action="ajaxtechphtoupdt.php" method="post">
                            <div class="pending-photos">

                            </div>
                        </form>
                    </div>
                    
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Pending').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechphtoupdt.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-photos').html(response);
                                            // Display Modal
                                            $('#doubleClick-Pending').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>



<!-- Pending MEDIA Tab -->





            <!-- Pending Report Tab -->
                
                    <input type="radio" name="tabDoingPending" id="tabDoingPending6">
                    <label for="tabDoingPending6" class="tabHeadingPending"> Report </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                        <form action="ajaxreportadmin.php" method="post">
                            <div class="pending-report">

                            </div>
                        </form>
                    </div>
					
					
                </div>
            </div>

                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.Pending').click(function() {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxreportadmin.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.pending-report').html(response);
                                            // Display Modal
                                            $('#doubleClick-Pending').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>


									
						
						
						
						
						
						
						
						
						
							
                        <div class="box" id="myModal">
                              <div class="box_topic">Incomplete</div>

                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status
                                                         FROM job_register WHERE job_status = 'Incomplete'
                                                         ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                $numRow = "SELECT jobregister_id, staff_position, job_order_number, job_priority, customer_name, machine_type, job_description, accessories_required, job_status
                                           FROM job_register WHERE job_status = 'Incomplete'";
                                $numRow_run = mysqli_query ($conn,$numRow);
                                if ($row_Total = mysqli_num_rows($numRow_run))
                                    {
                                        echo '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
                                    }
                                else
                                    {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                while($row = $results->fetch_assoc()) {
                            ?>
                        
									<div class="Incomplete" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Incomplete"  ondblclick="document.getElementById('doubleClick-Incomplete').style.display='block'">
										<input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
										<ul class="b" id="draged">
											<strong text-align="center"><?php echo $row['job_order_number']?></strong>
											<li><?php echo $row['job_priority']?></li>
											<li><?php echo $row['customer_name']?></li>
											<li><?php echo $row['machine_type']?></li>
											<li><?php echo $row['job_description']?></li>
											<li><?php echo $row['job_status']?></li>
										</ul>
									</div>
									<?php } ?>                              
                              
                        </div>				




        <!-- Incomplete Popup Modal -->

            <div id="doubleClick-Incomplete" class="modal">
                <div class="tabIncomplete">
                    <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete1" checked="checked">
                    <label for="tabDoingIncomplete1" class="tabHeadingIncomplete"> Job Info </label>
                    <div class="tab" id="IncompleteJobInfoTab">
                        <div class="contentIncompleteJobInfo">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                            <form action="homeindex.php" method="post">
                                <div class="incomplete-details">

                                </div>
                            </form>
                        </div>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxhome.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>


            <!-- Incomplete Update Tab -->

                    <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete2">
                    <label for="tabDoingIncomplete2" class="tabHeadingIncomplete">Update</label>
                    <div class="tab" id="IncompleteJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                        <form action="ajaxtechupdateadmin.php" method="post">
                            <div class="incomplete-update">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechupdateadmin.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-update').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

            <!-- Incomplete Remark Tab -->

                    <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete3">
                    <label for="tabDoingIncomplete3" class="tabHeadingIncomplete">Remarks</label>
                    <div class="tab" id="IncompleteJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                        <form action="ajaxremarks.php" method="post">
                            <div class="incomplete-remark">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxremarks.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-remark').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>						
							
							
            <!-- Incomplete Accessories Tab -->

                    <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete4">
                    <label for="tabDoingIncomplete4" class="tabHeadingIncomplete">Accessories</label>
                    <div class="tab" id="IncompleteJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                        <form action="ajaxtabaccessories.php" method="post">
                            <div class="incomplete-accessories">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtabaccessories.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-accessories').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>							
					
					
					
					
<!-- Pending MEDIA Tab -->

                    <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete5">
                    <label for="tabDoingIncomplete5" class="tabHeadingIncomplete">Media</label>
                    <div class="tab" id="IncompleteJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                        <form action="ajaxtechphtoupdt.php" method="post">
                            <div class="incomplete-photos">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechphtoupdt.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-photos').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>



<!-- Pending MEDIA Tab -->
					
				
			
            <!-- Incomplete Report Tab -->

                    <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete6">
                    <label for="tabDoingIncomplete6" class="tabHeadingIncomplete"> Report </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                        <form action="ajaxreportadmin.php" method="post">
                            <div class="incomplete-report">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.Incomplete').click(function() {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxreportadmin.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.incomplete-report').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>

        <!-- Incomplete Popup Modal -->

        <!-- Incomplete -->					
					
				
					
			</div>





</div>
</div>


























</section>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>


        










</section>

</body>
</html>