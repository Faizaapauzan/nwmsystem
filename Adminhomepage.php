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
     <title>NWM Admin Homepage</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link href="css/homepage.css"rel="stylesheet" />
    <link href="css/adminhomepage.css"rel="stylesheet" />
    <link href="css/machine.css"rel="stylesheet" />
       <link href="css/adminboard.css"rel="stylesheet" />
        <link href="css/admin.css"rel="stylesheet" />
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
	    <img src="neo.png" height="65" width="75"></img>
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






 
         <!-- BOON -->

        <div class="box" id="myModal">
        <div class="left-side" >
        <div class="box_topic">Boon</div>
        
        
        <?php
        include 'dbconnect.php';
                                
        $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                (job_assign = 'Boon' AND job_status = ''
                OR
                job_assign = 'Boon' AND job_status = 'Doing'
                OR
                job_assign = 'Boon' AND job_status = 'Ready'
                OR
                job_assign = 'Boon' AND job_status = 'Pending'
                OR
                job_assign = 'Boon' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at
                DESC LIMIT 50");


            $numRow = "SELECT * FROM `job_register`WHERE 
            job_assign = 'Boon' AND job_status = ''
                OR
                job_assign = 'Boon' AND job_status = 'Doing'
                OR
                job_assign = 'Boon' AND job_status = 'Ready'
                OR
                job_assign = 'Boon' AND job_status = 'Pending'                
                OR
                job_assign = 'Boon' AND job_status = 'Incomplete' ";
            $numRow_run = mysqli_query ($conn,$numRow);

            if ($row_Total = mysqli_num_rows($numRow_run))
            {
                echo  '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
            }
            else
            {
                echo '<h4 style="text-align:right;">No Data </h4>';
            }
                    
                    
        while($row = $results->fetch_assoc()) {
        ?>

        <div class="Boon" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Boon"  ondblclick="document.getElementById('doubleClick-Boon').style.display='block'">
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
        </div>

    <!--Double click Job Info (Boon) -->
    <div id="doubleClick-Boon" class="modal">
    <div class="tabBoon">

        <input type="radio" name="tabDoingBoon" id="tabDoingBoon1" checked="checked">
        <label for="tabDoingBoon1" class="tabHeadingBoon"> Job Info </label>
        <div class="tab" id="BoonJobInfoTab">
        <div class="contentBoonJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="boon-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Boon',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.boon-details').html(response);
            // Display Modal
            $('#doubleClick-Boon').modal('show');
            }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingBoon" id="tabDoingBoon2">
        <label for="tabDoingBoon2" class="tabHeadingBoon">Update</label>
        <div class="tab" id="BoonJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="boon-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Boon',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.boon-update').html(response);
            // Display Modal
            $('#doubleClick-Boon').modal('show');
                        }
                    });
                });
            });
        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingBoon" id="tabDoingBoon3">
        <label for="tabDoingBoon3" class="tabHeadingBoon"> Remarks </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="boon-remarks">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Boon',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.boon-remarks').html(response);
            // Display Modal
            $('#doubleClick-Boon').modal('show');
                        }
                    });
                });
            });
        </script>


        <!--Double click Accessories -->

        <input type="radio" name="tabDoingBoon" id="tabDoingBoon4">
        <label for="tabDoingBoon4" class="tabHeadingBoon"> Accessories </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="boon-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
           $('body').on('click','.Boon',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.boon-accessories').html(response);
            // Display Modal
            $('#doubleClick-Boon').modal('show');
                        }
                    });
                });
            });
        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingBoon" id="tabDoingBoon5">
        <label for="tabDoingBoon5" class="tabHeadingBoon"> Media </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="boon-photos">

        </div></form></div>
        
    
    <script type='text/javascript'>
        $(document).ready(function () {
        $('body').on('click','.Boon',function(){ 
        var jobregister_id = $(this).data('id');
        // AJAX request
        $.ajax({
        url: 'ajaxtechphtoupdt.php',
        type: 'post',
        data: { jobregister_id: jobregister_id },
        success: function (response) {
        // Add response in Modal body
        $('.boon-photos').html(response);
        // Display Modal
        $('#doubleClick-Boon').modal('show');
                }
            });
        });
    });
    </script>

    
        <!--Double click Report-->
        <input type="radio" name="tabDoingBoon" id="tabDoingBoon6">
        <label for="tabDoingBoon6" class="tabHeadingBoon"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="boon-report">

        </div></form></div>

            <!-- div for doubleclick and tabs -->
    </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Boon',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.boon-report').html(response);
            // Display Modal
            $('#doubleClick-Boon').modal('show');
                     }
                    });
                });
            });
        </script>

<!-- END BOON -->

<!-- HAFIZ -->

        <div class="box" id="myModal">
        <div class="left-side">
        <div class="box_topic">Hafiz</div>
                            
        <?php
        include 'dbconnect.php';
                                
        $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                (job_assign = 'Hafiz' AND job_status = ''
                OR
                job_assign = 'Hafiz' AND job_status = 'Doing'
                OR
                job_assign = 'Hafiz' AND job_status = 'Ready'
                OR
                job_assign = 'Hafiz' AND job_status = 'Pending'
                OR
                job_assign = 'Hafiz' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at
                DESC LIMIT 50");

        $numRow = "SELECT * FROM `job_register`WHERE 
        job_assign = 'Hafiz' AND job_status = ''
                OR
                job_assign = 'Hafiz' AND job_status = 'Doing'
                OR
                job_assign = 'Hafiz' AND job_status = 'Ready'
                OR
                job_assign = 'Hafiz' AND job_status = 'Pending'
                OR
                job_assign = 'Hafiz' AND job_status = 'Incomplete' ";
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
                            
        <div class="Hafiz" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Hafiz"  ondblclick="document.getElementById('doubleClick-Hafiz').style.display='block'">
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
        </div>
        </div>

    <!--Double click Job Info (Hafiz) -->
    <div id="doubleClick-Hafiz" class="modal">
    <div class="tabHafiz">

        <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz1" checked="checked">
        <label for="tabDoingHafiz1" class="tabHeadingHafiz"> Job Info </label>
        <div class="tab" id="HafizJobInfoTab">
        <div class="contentHafizJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="hafiz-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hafiz',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hafiz-details').html(response);
            // Display Modal
            $('#doubleClick-Hafiz').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz2">
        <label for="tabDoingHafiz2" class="tabHeadingHafiz">Update</label>
        <div class="tab" id=HafizJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="hafiz-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hafiz',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

             $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hafiz-update').html(response);
            // Display Modal
            $('#doubleClick-Hafiz').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz3">
        <label for="tabDoingHafiz3" class="tabHeadingHafiz">Remark</label>
        <div class="tab" id=HafizJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="hafiz-remarks">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hafiz',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {

            // Add response in Modal body
            $('.hafiz-remarks').html(response);
            // Display Modal
            $('#doubleClick-Hafiz').modal('show');
                        }
                    });
                });
            });

        </script>

 

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz4">
        <label for="tabDoingHafiz4" class="tabHeadingHafiz">Accessories</label>
        <div class="tab" id=HafizJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="hafiz-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hafiz',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {

            // Add response in Modal body
            $('.hafiz-accessories').html(response);
            // Display Modal
            $('#doubleClick-Hafiz').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz5">
        <label for="tabDoingHafiz5" class="tabHeadingHafiz">Media</label>
        <div class="tab" id="HafizJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="hafiz-photo">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hafiz',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {

            // Add response in Modal body
            $('.hafiz-photo').html(response);
            // Display Modal
            $('#doubleClick-Hafiz').modal('show');
                }
            });
        });
    });

        </script>

               <!-- Double click Report -->
        <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz6">
        <label for="tabDoingHafiz6" class="tabHeadingHafiz"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="hafiz-report">

        </div></form></div>

                <!-- div for doubleclick and tabs -->
    </div></div>


        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Hafiz',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.hafiz-report').html(response);
            // Display Modal
            $('#doubleClick-Hafiz').modal('show');
                     }
                    });
                });
            });
        </script>

<!-- END HAFIZ -->

<!-- HAMIR -->

            <div class="" >
			<div class="row">
            <div class="box" id="myModal">
            <div class="left-side">
            <div class="box_topic">Hamir</div>
                            
            <?php
                    include 'dbconnect.php';
                                
                    $results = $conn->query("SELECT
                    jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status
                    FROM job_register WHERE
                    (job_assign = 'Hamir' AND job_status = ''
                    OR
                    job_assign = 'Hamir' AND job_status = 'Doing'
                    OR
                    job_assign = 'Hamir' AND job_status = 'Ready'
                    OR 
                    job_assign = 'Hamir' AND job_status = 'Pending'
                    OR
                    job_assign = 'Hamir' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");


                    $numRow = "SELECT * FROM `job_register`WHERE 
                    job_assign = 'Hamir' AND job_status = ''
                    OR
                    job_assign = 'Hamir' AND job_status = 'Doing'
                    OR
                    job_assign = 'Hamir' AND job_status = 'Ready'
                    OR
                    job_assign = 'Hamir' AND job_status = 'Pending'
                    OR
                    job_assign = 'Hamir' AND job_status = 'Incomplete' ";
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

                <div class="Hamir" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Hamir"  ondblclick="document.getElementById('doubleClick-Hamir').style.display='block'">
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
                </div>

    <!--Double click Job Info (Hamir) -->
    <div id="doubleClick-Hamir" class="modal">
    <div class="tabHamir">

        <input type="radio" name="tabDoingHamir" id="tabDoingHamir1" checked="checked">
        <label for="tabDoingHamir1" class="tabHeadingHamir"> Job Info </label>
        <div class="tab" id=HamirJobInfoTab>
        <div class="contentHamirJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="hamir-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hamir',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hamir-details').html(response);
            // Display Modal
            $('#doubleClick-Hamir').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingHamir" id="tabDoingHamir2">
        <label for="tabDoingHamir2" class="tabHeadingHamir">Update</label>
        <div class="tab" id="HamirJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="hamir-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hamir',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hamir-update').html(response);
            // Display Modal
            $('#doubleClick-Hamir').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingHamir" id="tabDoingHamir3">
        <label for="tabDoingHamir3" class="tabHeadingHamir">Remarks</label>
        <div class="tab" id="HamirJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="hamir-remarks">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hamir',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hamir-remarks').html(response);
            // Display Modal
            $('#doubleClick-Hamir').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingHamir" id="tabDoingHamir4">
        <label for="tabDoingHamir4" class="tabHeadingHamir">Accessories</label>
        <div class="tab" id="HamirJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="hamir-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hamir',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request

            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hamir-accessories').html(response);
            // Display Modal
            $('#doubleClick-Hamir').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingHamir" id="tabDoingHamir5">
        <label for="tabDoingHamir5" class="tabHeadingHamir">Media</label>
        <div class="tab" id="HamirJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="hamir-photo">

        </div></form></div>

          <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hamir',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hamir-photo').html(response);
            // Display Modal
            $('#doubleClick-Hamir').modal('show');
                }
                    });
                 });
             });

        </script>

                <!-- Double click Report -->
        <input type="radio" name="tabDoingHamir" id="tabDoingHamir6">
        <label for="tabDoingHamir6" class="tabHeadingHamir"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="hamir-report">

        </div></form></div>

              <!-- div for doubleclick and tabs -->
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Hamir',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.hamir-report').html(response);
            // Display Modal
            $('#doubleClick-Hamir').modal('show');
                     }
                    });
                });
            });
        </script>


        <!-- END OF HAMIR -->

        <!-- HWA -->
                
            <div class="box">
            <div class="left-side">
            <div class="box_topic">Hwa</div>
                        
            <?php
            include 'dbconnect.php';
                                
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                (job_assign = 'Hwa' AND job_status = ''
                OR
                job_assign = 'Hwa' AND job_status = 'Doing'
                OR
                job_assign = 'Hwa' AND job_status = 'Ready'
                OR
                job_assign = 'Hwa' AND job_status = 'Pending'
                OR
                job_assign = 'Hwa' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at
                DESC LIMIT 50");


                $numRow = "SELECT * FROM `job_register`WHERE 
                job_assign = 'Hwa' AND job_status = ''
                OR
                job_assign = 'Hwa' AND job_status = 'Doing'
                OR
                job_assign = 'Hwa' AND job_status = 'Pending'
                OR
                job_assign = 'Hwa' AND job_status = 'Ready'
                OR
                job_assign = 'Hwa' AND job_status = 'Incomplete' ";
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

            <div class="Hwa" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Hwa"  ondblclick="document.getElementById('doubleClick-Hwa').style.display='block'">
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
            </div>

    <!--Double click Job Info (Hwa) -->
    <div id="doubleClick-Hwa" class="modal">
    <div class="tabHwa">

        <input type="radio" name="tabDoingHwa" id="tabDoingHwa1" checked="checked">
        <label for="tabDoingHwa1" class="tabHeadingHwa"> Job Info </label>
        <div class="tab" id="HwaJobInfoTab">
        <div class="contentHwaJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="hwa-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hwa',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hwa-details').html(response);
            // Display Modal
            $('#doubleClick-Hwa').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingHwa" id="tabDoingHwa2">
        <label for="tabDoingHwa2" class="tabHeadingHwa">Update</label>
        <div class="tab" id="HwaJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="hwa-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hwa',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hwa-update').html(response);
            // Display Modal
            $('#doubleClick-Hwa').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingHwa" id="tabDoingHwa3">
        <label for="tabDoingHwa3" class="tabHeadingHwa">Remarks</label>
        <div class="tab" id="HwaJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="hwa-remarks">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hwa',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hwa-remarks').html(response);
            // Display Modal
            $('#doubleClick-Hwa').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingHwa" id="tabDoingHwa4">
        <label for="tabDoingHwa4" class="tabHeadingHwa">Accessories</label>
        <div class="tab" id="HwaJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="hwa-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hwa',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {

            // Add response in Modal body
            $('.hwa-accessories').html(response);
            // Display Modal
            $('#doubleClick-Hwa').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingHwa" id="tabDoingHwa5">
        <label for="tabDoingHwa5" class="tabHeadingHwa">Media</label>
        <div class="tab" id="HwaJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="hwa-photos">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Hwa',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.hwa-photos').html(response);
            // Display Modal
            $('#doubleClick-Hwa').modal('show');
                }
            });
                     });
                });
        </script>

           <!--Double click Report-->
        <input type="radio" name="tabDoingHwa" id="tabDoingHwa6">
        <label for="tabDoingHwa6" class="tabHeadingHwa"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="hwa-report">

        </div></form></div>

        <!-- div for doubleclick and tabs -->
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Hwa',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.hwa-report').html(response);
            // Display Modal
            $('#doubleClick-Hwa').modal('show');
                     }
                    });
                });
            });
        </script>


            <!-- END OF HWA -->

            <!-- ISK -->
                <div class="box">
                <div class="left-side">
                <div class="box_topic">Iskandar</div>
                            
                <?php
                include 'dbconnect.php';
                                
                $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                        (job_assign = 'Isk' AND job_status = ''
                        OR
                        job_assign = 'Isk' AND job_status = 'Doing'
                        OR
                        job_assign = 'Isk' AND job_status = 'Ready'
                        OR
                        job_assign = 'Isk' AND job_status = 'Pending'
                        OR
                        job_assign = 'Isk' AND job_status = 'Incomplete')
                        ORDER BY jobregisterlastmodify_at
                        DESC LIMIT 50");


                    $numRow = "SELECT * FROM `job_register`WHERE 
                    job_assign = 'Isk' AND job_status = ''
                        OR
                        job_assign = 'Isk' AND job_status = 'Doing'
                        OR
                        job_assign = 'Isk' AND job_status = 'Ready'
                        OR
                        job_assign = 'Isk' AND job_status = 'Pending'
                        OR
                        job_assign = 'Isk' AND job_status = 'Incomplete' ";
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

                <div class="Isk" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Isk"  ondblclick="document.getElementById('doubleClick-Isk').style.display='block'">
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
                </div>

    <!--Double click Job Info (Isk) -->
    <div id="doubleClick-Isk" class="modal">
    <div class="tabIsk">

        <input type="radio" name="tabDoingIsk" id="tabDoingIsk1" checked="checked">
        <label for="tabDoingIsk1" class="tabHeadingIsk"> Job Info </label>
        <div class="tab" id="IskJobInfoTab">
        <div class="contentIskJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="isk-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Isk',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.isk-details').html(response);
            // Display Modal
            $('#doubleClick-Isk').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingIsk" id="tabDoingIsk2">
        <label for="tabDoingIsk2" class="tabHeadingIsk">Update</label>
        <div class="tab" id="IskJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="isk-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Isk',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.isk-update').html(response);
            // Display Modal
            $('#doubleClick-Isk').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingIsk" id="tabDoingIsk3">
        <label for="tabDoingIsk3" class="tabHeadingIsk">Remarks</label>
        <div class="tab" id="IskJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="isk-remarks">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Isk',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {

            // Add response in Modal body
            $('.isk-remarks').html(response);
            // Display Modal
            $('#doubleClick-Isk').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingIsk" id="tabDoingIsk4">
        <label for="tabDoingIsk4" class="tabHeadingIsk">Accessories</label>
        <div class="tab" id="IskJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="isk-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Isk',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.isk-accessories').html(response);
            // Display Modal
            $('#doubleClick-Isk').modal('show');
                        }
                    });
                });
            });
        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingIsk" id="tabDoingIsk5">
        <label for="tabDoingIsk5" class="tabHeadingIsk">Update</label>
        <div class="tab" id="IskJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="isk-photos">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Isk',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.isk-photos').html(response);
            // Display Modal
            $('#doubleClick-Isk').modal('show');
                }
                 });
                     });
             });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingIsk" id="tabDoingIsk6">
        <label for="tabDoingIsk6" class="tabHeadingIsk"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="isk-report">

        </div></form></div>

        <!-- div for doubleclick and tabs -->
         </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Isk',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.isk-report').html(response);
            // Display Modal
            $('#doubleClick-Isk').modal('show');
                     }
                    });
                });
            });
        </script>

        
                <!-- END OF ISK -->

                <!-- JOHN -->

                <div class="box">
                <div class="left-side">
                <div class="box_topic">John</div>
                        
                <?php
                include 'dbconnect.php';
                                
                $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                        (job_assign = 'John' AND job_status = ''
                        OR
                        job_assign = 'John' AND job_status = 'Doing'
                        OR
                        job_assign = 'John' AND job_status = 'Ready'
                        OR
                        job_assign = 'John' AND job_status = 'Pending'
                        OR
                        job_assign = 'John' AND job_status = 'Incomplete')
                        ORDER BY jobregisterlastmodify_at
                        DESC LIMIT 50");

                $numRow = "SELECT * FROM `job_register`WHERE 
                job_assign = 'John' AND job_status = ''
                        OR
                        job_assign = 'John' AND job_status = 'Doing'
                        OR
                        job_assign = 'John' AND job_status = 'Ready'
                        OR
                        job_assign = 'John' AND job_status = 'Pending'
                        OR
                        job_assign = 'John' AND job_status = 'Incomplete' ";
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

                <div class="John" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-John"  ondblclick="document.getElementById('doubleClick-John').style.display='block'">
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
                </div>  
                </div>
                
    <!--Double click Job Info (John) -->
    <div id="doubleClick-John" class="modal">
    <div class="tabJohn">

        <input type="radio" name="tabDoingJohn" id="tabDoingJohn1" checked="checked">
        <label for="tabDoingJohn1" class="tabHeadingJohn"> Job Info </label>
        <div class="tab" id="JohnJobInfoTab">
        <div class="contentJohnJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-John').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="john-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.John',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.john-details').html(response);
            // Display Modal
            $('#doubleClick-John').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingJohn" id="tabDoingJohn2">
        <label for="tabDoingJohn2" class="tabHeadingJohn">Update</label>
        <div class="tab" id=JohnJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-John').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="john-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.John',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.john-update').html(response);
            // Display Modal
            $('#doubleClick-John').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingJohn" id="tabDoingJohn3">
        <label for="tabDoingJohn3" class="tabHeadingJohn">Remarks</label>
        <div class="tab" id=JohnJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-John').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="john-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.John',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.john-remark').html(response);
            // Display Modal
            $('#doubleClick-John').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingJohn" id="tabDoingJohn4">
        <label for="tabDoingJohn4" class="tabHeadingJohn">Accessories</label>
        <div class="tab" id=JohnJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-John').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="john-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.John',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.john-accessories').html(response);
            // Display Modal
            $('#doubleClick-John').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingJohn" id="tabDoingJohn5">
        <label for="tabDoingJohn5" class="tabHeadingJohn">Media</label>
        <div class="tab" id=JohnJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-John').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="john-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.John',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.john-photos').html(response);
            // Display Modal
            $('#doubleClick-John').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingJohn" id="tabDoingJohn6">
        <label for="tabDoingJohn6" class="tabHeadingJohn"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-John').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="john-report">

        </div></form></div>

                <!-- div for doubleclick and tabs -->
    </div></div>


        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.John',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.john-report').html(response);
            // Display Modal
            $('#doubleClick-John').modal('show');
                     }
                    });
                });
            });
        </script>
              
                <!-- END OF JOHN -->

                <!-- JUN JIE -->

            <div class="" >
			<div class="row">
            <div class="box" id="myModal">
            <div class="left-side">
            <div class="box_topic">Jun Jie</div>
                            
            <?php
                include 'dbconnect.php';                
                $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                        (job_assign = 'Jun Jie' AND job_status = ''
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Doing'
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Ready'
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Pending'
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Incomplete')
                        ORDER BY jobregisterlastmodify_at
                        DESC LIMIT 50");

                $numRow = "SELECT * FROM `job_register`WHERE 
                job_assign = 'Jun Jie' AND job_status = ''
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Doing'
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Ready'
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Pending'
                        OR
                        job_assign = 'Jun Jie' AND job_status = 'Incomplete'";
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

                <div class="JunJie" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-JunJie"  ondblclick="document.getElementById('doubleClick-JunJie').style.display='block'">
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
                </div>

                    <!--Double click Job Info (JunJie) -->
    <div id="doubleClick-JunJie" class="modal">
    <div class="tabJunJie">

        <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie1" checked="checked">
        <label for="tabDoingJunJie1" class="tabHeadingJunJie"> Job Info </label>
        <div class="tab" id="JunJieJobInfoTab">
        <div class="contentJunJieJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="junjie-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.JunJie',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.junjie-details').html(response);
            // Display Modal
            $('#doubleClick-JunJie').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie2">
        <label for="tabDoingJunJie2" class="tabHeadingJunJie">Update</label>
        <div class="tab" id=JunJieJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="junjie-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.JunJie',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.junjie-update').html(response);
            // Display Modal
            $('#doubleClick-JunJie').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie3">
        <label for="tabDoingJunJie3" class="tabHeadingJunJie">Remarks</label>
        <div class="tab" id=JunJieJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="junjie-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.JunJie',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.junjie-remark').html(response);
            // Display Modal
            $('#doubleClick-JunJie').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Accessories -->
        <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie4">
        <label for="tabDoingJunJie4" class="tabHeadingJunJie">Accessories</label>
        <div class="tab" id=JunJieJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="junjie-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.JunJie',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.junjie-accessories').html(response);
            // Display Modal
            $('#doubleClick-JunJie').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie5">
        <label for="tabDoingJunJie5" class="tabHeadingJunJie">Media</label>
        <div class="tab" id=JunJieJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="junjie-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.JunJie',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.junjie-photos').html(response);
            // Display Modal
            $('#doubleClick-JunJie').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie6">
        <label for="tabDoingJunJie6" class="tabHeadingJunJie"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="junjie-report">

        </div></form></div>

                <!-- div for doubleclick and tabs -->
    </div></div>


        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.JunJie',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.junjie-report').html(response);
            // Display Modal
            $('#doubleClick-JunJie').modal('show');
                     }
                    });
                });
            });
        </script>

                <!-- END OF JUNJIE -->

                <!-- RAZWILL -->
                
                <div class="box">
                <div class="left-side">
                <div class="box_topic">Razwill</div>
                            
                <?php
                    include 'dbconnect.php';
                    $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                            (job_assign = 'Will' AND job_status = ''
                            OR
                            job_assign = 'Will' AND job_status = 'Doing'
                            OR
                            job_assign = 'Will' AND job_status = 'Ready'
                            OR
                            job_assign = 'Will' AND job_status = 'Pending'
                            OR
                            job_assign = 'Will' AND job_status = 'Incomplete')
                            ORDER BY jobregisterlastmodify_at
                            DESC LIMIT 50");


                    $numRow = "SELECT * FROM `job_register`WHERE 
                    job_assign = 'Will' AND job_status = ''
                            OR
                            job_assign = 'Will' AND job_status = 'Doing'
                            OR
                            job_assign = 'Will' AND job_status = 'Ready'
                            OR
                            job_assign = 'Will' AND job_status = 'Pending'
                            OR
                            job_assign = 'Will' AND job_status = 'Incomplete'";
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

                <div class="Razwill" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Razwill"  ondblclick="document.getElementById('doubleClick-Razwill').style.display='block'">
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
                </div>

                
                    <!--Double click Job Info (Razwill) -->
    <div id="doubleClick-Razwill" class="modal">
    <div class="tabRazwill">

        <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill1" checked="checked">
        <label for="tabDoingRazwill1" class="tabHeadingRazwill"> Job Info </label>
        <div class="tab" id="RazwillJobInfoTab">
        <div class="contentRazwillJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="razwill-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Razwill',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.razwill-details').html(response);
            // Display Modal
            $('#doubleClick-Razwill').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill2">
        <label for="tabDoingRazwill2" class="tabHeadingRazwill">Update</label>
        <div class="tab" id=RazwillJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="razwill-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Razwill',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.razwill-update').html(response);
            // Display Modal
            $('#doubleClick-Razwill').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill3">
        <label for="tabDoingRazwill3" class="tabHeadingRazwill">Remarks</label>
        <div class="tab" id=RazwillJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="razwill-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Razwill',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.razwill-remark').html(response);
            // Display Modal
            $('#doubleClick-Razwill').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Accessories -->
        <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill4">
        <label for="tabDoingRazwill4" class="tabHeadingRazwill">Accessories</label>
        <div class="tab" id="RazwillJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="razwill-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Razwill',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.razwill-accessories').html(response);
            // Display Modal
            $('#doubleClick-Razwill').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill5">
        <label for="tabDoingRazwill5" class="tabHeadingRazwill">Media</label>
        <div class="tab" id="RazwillJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="razwill-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Razwill',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.razwill-photos').html(response);
            // Display Modal
            $('#doubleClick-Razwill').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill6">
        <label for="tabDoingRazwill6" class="tabHeadingRazwill"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="razwill-report">

        </div></form></div>

        
        <!-- div for doubleclick and tabs -->
    </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Razwill',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.razwill-report').html(response);
            // Display Modal
            $('#doubleClick-Razwill').modal('show');
                     }
                    });
                });
            });
        </script>


                <!-- END OF RAZWILL -->
                <!-- SAHELE -->

                <div class="box">
                <div class="left-side">
                <div class="box_topic">Sahele</div>
                            
                <?php
                    include 'dbconnect.php';
                    $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                            (job_assign = 'Sahele' AND job_status = ''
                            OR
                            job_assign = 'Sahele' AND job_status = 'Doing'
                            OR
                            job_assign = 'Sahele' AND job_status = 'Ready'
                            OR
                            job_assign = 'Sahele' AND job_status = 'Pending'
                            OR
                            job_assign = 'Sahele' AND job_status = 'Incomplete')
                            ORDER BY jobregisterlastmodify_at
                            DESC LIMIT 50");

                    $numRow = "SELECT * FROM `job_register`WHERE 
                    job_assign = 'Sahele' AND job_status = ''
                            OR
                            job_assign = 'Sahele' AND job_status = 'Doing'
                            OR
                            job_assign = 'Sahele' AND job_status = 'Ready'
                            OR
                            job_assign = 'Sahele' AND job_status = 'Pending'
                            OR
                            job_assign = 'Sahele' AND job_status = 'Incomplete' ";
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
                        
                <div class="Sahele" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Sahele"  ondblclick="document.getElementById('doubleClick-Sahele').style.display='block'">
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
                </div>

                               
                    <!--Double click Job Info (Sahele) -->
    <div id="doubleClick-Sahele" class="modal">
    <div class="tabSahele">
        <input type="radio" name="tabDoingSahele" id="tabDoingSahele1" checked="checked">
        <label for="tabDoingSahele1" class="tabHeadingSahele"> Job Info </label>
        <div class="tab" id="SaheleJobInfoTab">
        <div class="contentSaheleJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="sahele-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sahele',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sahele-details').html(response);
            // Display Modal
            $('#doubleClick-Sahele').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingSahele" id="tabDoingSahele2">
        <label for="tabDoingSahele2" class="tabHeadingSahele">Update</label>
        <div class="tab" id="SaheleJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="sahele-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sahele',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sahele-update').html(response);
            // Display Modal
            $('#doubleClick-Sahele').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingSahele" id="tabDoingSahele3">
        <label for="tabDoingSahele3" class="tabHeadingSahele">Remarks</label>
        <div class="tab" id="SaheleJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="sahele-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sahele',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sahele-remark').html(response);
            // Display Modal
            $('#doubleClick-Sahele').modal('show');
                        }
                    });
                });
            });

        </script>

 
        <!--Double click Accessories -->
        <input type="radio" name="tabDoingSahele" id="tabDoingSahele4">
        <label for="tabDoingSahele4" class="tabHeadingSahele">Accessories</label>
        <div class="tab" id="SaheleJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="sahele-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sahele',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sahele-accessories').html(response);
            // Display Modal
            $('#doubleClick-Sahele').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingSahele" id="tabDoingSahele5">
        <label for="tabDoingSahele5" class="tabHeadingSahele">Media</label>
        <div class="tab" id="SaheleJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="sahele-photos">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sahele',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sahele-photos').html(response);
            // Display Modal
            $('#doubleClick-Sahele').modal('show');
                }
             });
                });
                     });
        </script>

               <!--Double click Report-->
        <input type="radio" name="tabDoingSahele" id="tabDoingSahele6">
        <label for="tabDoingSahele6" class="tabHeadingSahele"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="sahele-report">

        </div></form></div>

        
        <!-- div for doubleclick and tabs -->
    </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Sahele',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.sahele-report').html(response);
            // Display Modal
            $('#doubleClick-Sahele').modal('show');
                     }
                    });
                });
            });
        </script>

                <!-- END OF SAHELE -->

                <!-- SAZALY -->

                <div class="box">
                <div class="left-side">
                <div class="box_topic">Sazaly</div>
                            
                <?php
                 include 'dbconnect.php';
                $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                        (job_assign = 'Sazaly' AND job_status = ''
                        OR
                        job_assign = 'Sazaly' AND job_status = 'Doing'
                         OR
                        job_assign = 'Sazaly' AND job_status = 'Ready'
                        OR
                        job_assign = 'Sazaly' AND job_status = 'Pending'
                        OR
                        job_assign = 'Sazaly' AND job_status = 'Incomplete')
                        ORDER BY jobregisterlastmodify_at
                        DESC LIMIT 50");

                $numRow = "SELECT * FROM `job_register`WHERE 
                job_assign = 'Sazaly' AND job_status = ''
                        OR
                        job_assign = 'Sazaly' AND job_status = 'Doing'
                         OR
                        job_assign = 'Sazaly' AND job_status = 'Ready'
                        OR
                        job_assign = 'Sazaly' AND job_status = 'Pending'
                        OR
                        job_assign = 'Sazaly' AND job_status = 'Incomplete'";
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
                        
                <div class="Sazaly" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Sazaly"  ondblclick="document.getElementById('doubleClick-Sazaly').style.display='block'">
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
                </div>               
                </div>

                               
                    <!--Double click Job Info (Sazaly) -->
    <div id="doubleClick-Sazaly" class="modal">
    <div class="tabSazaly">

        <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly1" checked="checked">
        <label for="tabDoingSazaly1" class="tabHeadingSazaly"> Job Info </label>
        <div class="tab" id="SazalyJobInfoTab">
        <div class="contentSazalyJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="sazaly-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sazaly',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sazaly-details').html(response);
            // Display Modal
            $('#doubleClick-Sazaly').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly2">
        <label for="tabDoingSazaly2" class="tabHeadingSazaly">Update</label>
        <div class="tab" id="SazalyJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="sazaly-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sazaly',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sazaly-update').html(response);
            // Display Modal
            $('#doubleClick-Sazaly').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly3">
        <label for="tabDoingSazaly3" class="tabHeadingSazaly">Remarks</label>
        <div class="tab" id="SazalyJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="sazaly-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sazaly',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sazaly-remark').html(response);
            // Display Modal
            $('#doubleClick-Sazaly').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly4">
        <label for="tabDoingSazaly4" class="tabHeadingSazaly">Accessories</label>
        <div class="tab" id="SazalyJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="sazaly-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sazaly',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sazaly-accessories').html(response);
            // Display Modal
            $('#doubleClick-Sazaly').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly5">
        <label for="tabDoingSazaly5" class="tabHeadingSazaly">Media</label>
        <div class="tab" id="SazalyJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="sazaly-photos">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Sazaly',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.sazaly-photos').html(response);
            // Display Modal
            $('#doubleClick-Sazaly').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly6">
        <label for="tabDoingSazaly6" class="tabHeadingSazaly"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="sazaly-report">

        </div></form></div>

        <!-- div for doubleclick and tabs -->
         </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Sazaly',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.sazaly-report').html(response);
            // Display Modal
            $('#doubleClick-Sazaly').modal('show');
                     }
                    });
                });
            });
        </script>

                <!-- END OF SAZALY -->

                <!-- FAIZAN -->

            <div class="" >
			<div class="row">
            <div class="box" id="myModal">
            <div class="left-side">
            <div class="box_topic">Faizan</div>
                            
            <?php
            include 'dbconnect.php';
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                    (job_assign = 'Faizan' AND job_status = ''
                    OR
                    job_assign = 'Faizan' AND job_status = 'Doing'
                    OR
                    job_assign = 'Faizan' AND job_status = 'Ready'
                    OR
                    job_assign = 'Faizan' AND job_status = 'Pending'
                    OR
                    job_assign = 'Faizan' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");

                $numRow = "SELECT * FROM `job_register`WHERE 
                job_assign = 'Faizan' AND job_status = ''
                    OR
                    job_assign = 'Faizan' AND job_status = 'Doing'
                    OR
                    job_assign = 'Faizan' AND job_status = 'Ready'
                    OR
                    job_assign = 'Faizan' AND job_status = 'Pending'
                    OR
                    job_assign = 'Faizan' AND job_status = 'Incomplete' ";
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
                        
            <div class="Faizan" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Faizan"  ondblclick="document.getElementById('doubleClick-Faizan').style.display='block'">
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
            </div>
                           
                    <!--Double click Job Info (Faizan) -->
    <div id="doubleClick-Faizan" class="modal">
    <div class="tabFaizan">

        <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan1" checked="checked">
        <label for="tabDoingFaizan1" class="tabHeadingFaizan"> Job Info </label>
        <div class="tab" id="FaizanJobInfoTab">
        <div class="contentFaizanJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="faizan-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Faizan',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.faizan-details').html(response);
            // Display Modal
            $('#doubleClick-Faizan').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan2">
        <label for="tabDoingFaizan2" class="tabHeadingFaizan">Update</label>
        <div class="tab" id="FaizanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="faizan-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Faizan',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.faizan-update').html(response);
            // Display Modal
            $('#doubleClick-Faizan').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan3">
        <label for="tabDoingFaizan3" class="tabHeadingFaizan">Remarks</label>
        <div class="tab" id="FaizanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="faizan-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Faizan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.faizan-remark').html(response);
            // Display Modal
            $('#doubleClick-Faizan').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan4">
        <label for="tabDoingFaizan4" class="tabHeadingFaizan">Accessories</label>
        <div class="tab" id="FaizanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="faizan-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Faizan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.faizan-accessories').html(response);
            // Display Modal
            $('#doubleClick-Faizan').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan5">
        <label for="tabDoingFaizan5" class="tabHeadingFaizan">Media</label>
        <div class="tab" id="FaizanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="faizan-photos">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Faizan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.faizan-photos').html(response);
            // Display Modal
            $('#doubleClick-Faizan').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan6">
        <label for="tabDoingFaizan6" class="tabHeadingFaizan"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="faizan-report">

        </div></form></div>

                <!-- div for doubleclick and tabs -->
    </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Faizan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.faizan-report').html(response);
            // Display Modal
            $('#doubleClick-Faizan').modal('show');
                     }
                    });
                });
            });
        </script>



            <!-- END OF FAIZAN --

            <!-FAUZIN -->
                
            <div class="box">
            <div class="left-side">
            <div class="box_topic">Fauzin</div>
                            
            <?php
            include 'dbconnect.php';
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                    (job_assign = 'Fauzin' AND job_status = ''
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Doing'
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Ready'
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Pending'
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");

            $numRow = "SELECT * FROM `job_register`WHERE 
            job_assign = 'Fauzin' AND job_status = ''
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Doing'
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Ready'
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Pending'
                    OR
                    job_assign = 'Fauzin' AND job_status = 'Incomplete' ";
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

            <div class="Fauzin" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Fauzin"  ondblclick="document.getElementById('doubleClick-Fauzin').style.display='block'">
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
            </div>

               
                    <!--Double click Job Info (Fauzin) -->
    <div id="doubleClick-Fauzin" class="modal">
    <div class="tabFauzin">

        <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin1" checked="checked">
        <label for="tabDoingFauzin1" class="tabHeadingFauzin"> Job Info </label>
        <div class="tab" id="FauzinJobInfoTab">
        <div class="contentFauzinJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="fauzin-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Fauzin',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.fauzin-details').html(response);
            // Display Modal
            $('#doubleClick-Fauzin').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin2">
        <label for="tabDoingFauzin2" class="tabHeadingFauzin">Update</label>
        <div class="tab" id="FauzinJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="fauzin-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Fauzin',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.fauzin-update').html(response);
            // Display Modal
            $('#doubleClick-Fauzin').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin3">
        <label for="tabDoingFauzin3" class="tabHeadingFauzin">Remarks</label>
        <div class="tab" id="FauzinJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="fauzin-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Fauzin',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.fauzin-remark').html(response);
            // Display Modal
            $('#doubleClick-Fauzin').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Accessories -->
        <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin4">
        <label for="tabDoingFauzin4" class="tabHeadingFauzin">Accessories</label>
        <div class="tab" id="FauzinJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="fauzin-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Fauzin',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.fauzin-accessories').html(response);
            // Display Modal
            $('#doubleClick-Fauzin').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin5">
        <label for="tabDoingFauzin5" class="tabHeadingFauzin">Media</label>
        <div class="tab" id="FauzinJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="fauzin-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Fauzin',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.fauzin-photos').html(response);
            // Display Modal
            $('#doubleClick-Fauzin').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin6">
        <label for="tabDoingFauzin6" class="tabHeadingFauzin"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="fauzin-report">

        </div></form></div>
       
        <!-- div for doubleclick and tabs -->
    </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Fauzin',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.fauzin-report').html(response);
            // Display Modal
            $('#doubleClick-Fauzin').modal('show');
                     }
                    });
                });
            });
        </script>

<!-- END OF FAUZIN -->

<!-- IZAAN -->

            <div class="box">
            <div class="left-side">
            <div class="box_topic">Izaan</div>
                            
            <?php
            include 'dbconnect.php';
                                
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                    (job_assign = 'Izaan' AND job_status = ''
                    OR
                    job_assign = 'Izaan' AND job_status = 'Doing'
                    OR
                    job_assign = 'Izaan' AND job_status = 'Ready'
                    OR
                    job_assign = 'Izaan' AND job_status = 'Pending'
                    OR
                    job_assign = 'Izaan' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");

            $numRow = "SELECT * FROM `job_register`WHERE 
           job_assign = 'Izaan' AND job_status = ''
                    OR
                    job_assign = 'Izaan' AND job_status = 'Doing'
                    OR
                    job_assign = 'Izaan' AND job_status = 'Ready'
                    OR
                    job_assign = 'Izaan' AND job_status = 'Pending'
                    OR
                    job_assign = 'Izaan' AND job_status = 'Incomplete'";
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
                        
            <div class="Izaan" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Izaan"  ondblclick="document.getElementById('doubleClick-Izaan').style.display='block'">
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
            </div>

                           
                    <!--Double click Job Info (Izaan) -->
    <div id="doubleClick-Izaan" class="modal">
    <div class="tabIzaan">

        <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan1" checked="checked">
        <label for="tabDoingIzaan1" class="tabHeadingIzaan"> Job Info </label>
        <div class="tab" id="IzaanJobInfoTab">
        <div class="contentIzaanJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="izaan-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Izaan',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.izaan-details').html(response);
            // Display Modal
            $('#doubleClick-Izaan').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan2">
        <label for="tabDoingIzaan2" class="tabHeadingIzaan">Update</label>
        <div class="tab" id="IzaanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="izaan-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Izaan',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.izaan-update').html(response);
            // Display Modal
            $('#doubleClick-Izaan').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan3">
        <label for="tabDoingIzaan3" class="tabHeadingIzaan">Remarks</label>
        <div class="tab" id="IzaanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="izaan-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Izaan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.izaan-remark').html(response);
            // Display Modal
            $('#doubleClick-Izaan').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan4">
        <label for="tabDoingIzaan4" class="tabHeadingIzaan">Accessories</label>
        <div class="tab" id="IzaanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="izaan-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Izaan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.izaan-accessories').html(response);
            // Display Modal
            $('#doubleClick-Izaan').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan5">
        <label for="tabDoingIzaan5" class="tabHeadingIzaan">Media</label>
        <div class="tab" id="IzaanJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="izaan-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Izaan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.izaan-photos').html(response);
            // Display Modal
            $('#doubleClick-Izaan').modal('show');
                }
             });
                });
                     });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan6">
        <label for="tabDoingIzaan6" class="tabHeadingIzaan"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="izaan-report">

        </div></form></div>

        
        <!-- div for doubleclick and tabs -->
    </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Izaan',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.izaan-report').html(response);
            // Display Modal
            $('#doubleClick-Izaan').modal('show');
                     }
                    });
                });
            });
        </script>

            <!-- END OF IZAAN -->

            <!-- SALAM -->

            <div class="box">
            <div class="left-side">
            <div class="box_topic">Salam</div>
                            
            <?php
            include 'dbconnect.php';
                                
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                    (job_assign = 'Salam' AND job_status = ''
                    OR
                    job_assign = 'Salam' AND job_status = 'Doing'
                    OR
                    job_assign = 'Salam' AND job_status = 'Ready'
                    OR
                    job_assign = 'Salam' AND job_status = 'Pending'
                    OR
                    job_assign = 'Salam' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");

            $numRow = "SELECT * FROM `job_register`WHERE 
            job_assign = 'Salam' AND job_status = ''
                    OR
                    job_assign = 'Salam' AND job_status = 'Doing'
                    OR
                    job_assign = 'Salam' AND job_status = 'Ready'
                    OR
                    job_assign = 'Salam' AND job_status = 'Pending'
                    OR
                    job_assign = 'Salam' AND job_status = 'Incomplete'";
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
                        
            <div class="Salam" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Salam"  ondblclick="document.getElementById('doubleClick-Salam').style.display='block'">
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
            </div>               
            </div>

                           
        <!--Double click Job Info (Salam) -->
    <div id="doubleClick-Salam" class="modal">
    <div class="tabSalam">

        <input type="radio" name="tabDoingSalam" id="tabDoingSalam1" checked="checked">
        <label for="tabDoingSalam1" class="tabHeadingSalam"> Job Info </label>
        <div class="tab" id="SalamJobInfoTab">
        <div class="contentSalamJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Salam').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="salam-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Salam',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.salam-details').html(response);
            // Display Modal
            $('#doubleClick-Salam').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Update-->
        <input type="radio" name="tabDoingSalam" id="tabDoingSalam2">
        <label for="tabDoingSalam2" class="tabHeadingSalam">Update</label>
        <div class="tab" id="SalamJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Salam').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="salam-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Salam',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.salam-update').html(response);
            // Display Modal
            $('#doubleClick-Salam').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingSalam" id="tabDoingSalam3">
        <label for="tabDoingSalam3" class="tabHeadingSalam">Remarks</label>
        <div class="tab" id="SalamJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Salam').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="salam-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Salam',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.salam-remark').html(response);
            // Display Modal
            $('#doubleClick-Salam').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingSalam" id="tabDoingSalam4">
        <label for="tabDoingSalam4" class="tabHeadingSalam">Accessories</label>
        <div class="tab" id="SalamJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Salam').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="salam-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Salam',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.salam-accessories').html(response);
            // Display Modal
            $('#doubleClick-Salam').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingSalam" id="tabDoingSalam5">
        <label for="tabDoingSalam5" class="tabHeadingSalam">Media</label>
        <div class="tab" id="SalamJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Salam').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="salam-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Salam',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.salam-photos').html(response);
            // Display Modal
            $('#doubleClick-Salam').modal('show');
                }
             });
                });
                     });
        </script>

               <!--Double click Report-->
        <input type="radio" name="tabDoingSalam" id="tabDoingSalam6">
        <label for="tabDoingSalam6" class="tabHeadingSalam"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Salam').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="salam-report">

        </div></form></div>

        <!-- div for doubleclick and tabs -->
        </div></div>


        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Salam',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.salam-report').html(response);
            // Display Modal
            $('#doubleClick-Salam').modal('show');
                     }
                    });
                });
            });
        </script>

            <!-- END OF SALAM -->

            <!-- TECK -->

            <div class="" >
			<div class="row">
                <div class="box" id="myModal">
            <div class="left-side">
            <div class="box_topic">Teck</div>
                            
            <?php
            include 'dbconnect.php';
                                
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                    (job_assign = 'Teck' AND job_status = ''
                    OR
                    job_assign = 'Teck' AND job_status = 'Doing'
                    OR
                    job_assign = 'Teck' AND job_status = 'Ready'
                    OR
                    job_assign = 'Teck' AND job_status = 'Pending'
                    OR
                    job_assign = 'Teck' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");

            $numRow = "SELECT * FROM `job_register`WHERE 
            job_assign = 'Teck' AND job_status = ''
                    OR
                    job_assign = 'Teck' AND job_status = 'Doing'
                    OR
                    job_assign = 'Teck' AND job_status = 'Ready'
                    OR
                    job_assign = 'Teck' AND job_status = 'Pending'
                    OR
                    job_assign = 'Teck' AND job_status = 'Incomplete'";
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

            <div class="Teck" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Teck"  ondblclick="document.getElementById('doubleClick-Teck').style.display='block'">
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
            </div>

                           
    <!--Double click Job Info (Teck) -->
    <div id="doubleClick-Teck" class="modal">
    <div class="tabTeck">

        <input type="radio" name="tabDoingTeck" id="tabDoingTeck1" checked="checked">
        <label for="tabDoingTeck1" class="tabHeadingTeck"> Job Info </label>
        <div class="tab" id="TeckJobInfoTab">
        <div class="contentTeckJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="teck-details">

        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Teck',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.teck-details').html(response);
            // Display Modal
            $('#doubleClick-Teck').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Update-->
        <input type="radio" name="tabDoingTeck" id="tabDoingTeck2">
        <label for="tabDoingTeck2" class="tabHeadingTeck">Update</label>
        <div class="tab" id="TeckJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="teck-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Teck',function(){ 
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.teck-update').html(response);
            // Display Modal
            $('#doubleClick-Teck').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingTeck" id="tabDoingTeck3">
        <label for="tabDoingTeck3" class="tabHeadingTeck">Remarks</label>
        <div class="tab" id="TeckJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="teck-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Teck',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.teck-remark').html(response);
            // Display Modal
            $('#doubleClick-Teck').modal('show');
                        }
                    });
                });
            });

        </script>


        <!--Double click Accessories -->
        <input type="radio" name="tabDoingTeck" id="tabDoingTeck4">
        <label for="tabDoingTeck4" class="tabHeadingTeck">Accessories</label>
        <div class="tab" id="TeckJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="teck-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Teck',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.teck-accessories').html(response);
            // Display Modal
            $('#doubleClick-Teck').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingTeck" id="tabDoingTeck5">
        <label for="tabDoingTeck5" class="tabHeadingTeck">Media</label>
        <div class="tab" id="TeckJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="teck-photos">

        </div></form></div>


        <script type='text/javascript'>
            $(document).ready(function () {
            $('body').on('click','.Teck',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.teck-photos').html(response);
            // Display Modal
            $('#doubleClick-Teck').modal('show');
                }
             });
                });
                     });
        </script>

                        <!--Double click Report-->
        <input type="radio" name="tabDoingTeck" id="tabDoingTeck6">
        <label for="tabDoingTeck6" class="tabHeadingTeck"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="teck-report">

        </div></form></div>

                <!-- div for doubleclick and tabs -->
    </div></div>


        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Teck',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.teck-report').html(response);
            // Display Modal
            $('#doubleClick-Teck').modal('show');
                     }
                    });
                });
            });
        </script>


            <!-- END OF TECK -->

            <!-- AIZAT -->

            <div class="box">
            <div class="left-side">
            <div class="box_topic">Aizat</div>
                            
            <?php
            include 'dbconnect.php';
                                
            $results = $conn->query("SELECT jobregister_id, job_order_number, job_priority, job_description, customer_name, machine_type, job_status FROM job_register WHERE
                    (job_assign = 'Aizat' AND job_status = ''
                    OR
                    job_assign = 'Aizat' AND job_status = 'Doing'
                    OR
                    job_assign = 'Aizat' AND job_status = 'Ready'
                    OR
                    job_assign = 'Aizat' AND job_status = 'Pending'
                    OR
                    job_assign = 'Aizat' AND job_status = 'Incomplete')
                    ORDER BY jobregisterlastmodify_at
                    DESC LIMIT 50");

            $numRow = "SELECT * FROM `job_register`WHERE 
            job_assign = 'Aizat' AND job_status = ''
                    OR
                    job_assign = 'Aizat' AND job_status = 'Doing'
                    OR
                    job_assign = 'Aizat' AND job_status = 'Ready'
                    OR
                    job_assign = 'Aizat' AND job_status = 'Pending'
                    OR
                    job_assign = 'Aizat' AND job_status = 'Incomplete'";
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

            <div class="Aizat" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Aizat" ondblclick="document.getElementById('doubleClick-Aizat').style.display='block'">
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
            </div>
                                                     
                      <!--Double click Job Info (Aizat) -->
    <div id="doubleClick-Aizat" class="modal">
    <div class="tabAizat" >

        <input type="radio" name="tabDoingAizat" id="tabDoingAizat1" checked="checked">
        <label for="tabDoingAizat1" class="tabHeadingAizat"> Job Info </label>
        <div class="tab" id=AizatJobInfoTab>
        <div class="contentAizatJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="aizat-details">
               
        </div></form></div></div>
        
        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Aizat',function(){ 
            var jobregister_id = $(this).data('id');
        
            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.aizat-details').html(response);
            // Display Modal
            $('#doubleClick-Aizat').modal('show');
             }
                 });
                });
            });
        </script>

 
     <!--Double click Update-->
        <input type="radio" name="tabDoingAizat" id="tabDoingAizat2">
        <label for="tabDoingAizat2" class="tabHeadingAizat">Update</label>
        <div class="tab" id=AizatJobInfoTab>
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="Aizattechupdate-details">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Aizat',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request     
            $.ajax({
            url:'ajaxtechupdateadmin.php',
            type:'post',
            data:{jobregister_id: jobregister_id},
            success: function(response) {
              // Add response in Modal body
              $('.Aizattechupdate-details').html(response);
              // Display Modal
              $('#doubleClick-Aizat').modal('show');
             }
             });
             });
            });
        </script>

         <!--Double click Remarks-->
        <input type="radio" name="tabDoingAizat" id="tabDoingAizat3">
        <label for="tabDoingAizat3" class="tabHeadingAizat"> Remarks </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="Aizatremark-details">

        </div></form></div>
            
        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Aizat',function(){ 
            var jobregister_id = $(this).data('id');
        
            // AJAX request        
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {  
            // Add response in Modal body
            $('.Aizatremark-details').html(response);
            // Display Modal
            $('#doubleClick-Aizat').modal('show');
                 }
                     });
                 });
            });
        </script>

<!--Double click Accessories -->

        <input type="radio" name="tabDoingAizat" id="tabDoingAizat4">
        <label for="tabDoingAizat4" class="tabHeadingAizat"> Accessories </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="AizatAcc-details">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Aizat',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.AizatAcc-details').html(response);
            // Display Modal
            $('#doubleClick-Aizat').modal('show');
                }
                 });
                });
            });
        </script>

<!--Double click Photo-->
        <input type="radio" name="tabDoingAizat" id="tabDoingAizat5">
        <label for="tabDoingAizat5" class="tabHeadingAizat"> Media </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="Aizat-photo-details">

        </div></form></div>

      
        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Aizat',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) { 
            // Add response in Modal body
            $('.Aizat-photo-details').html(response);
            // Display Modal
            $('#doubleClick-Aizat').modal('show');
                }
                    });
                    });
                });
        </script>

                <!--Double click Report-->
        <input type="radio" name="tabDoingAizat" id="tabDoingAizat6">
        <label for="tabDoingAizat6" class="tabHeadingAizat"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="aizat-report">

        </div></form></div>

        
      <!-- div for doubleclick and tabs -->
  </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.Aizat',function(){ 
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.aizat-report').html(response);
            // Display Modal
            $('#doubleClick-Aizat').modal('show');
                     }
                    });
                });
            });
        </script>

               <!-- END OF AIZAT -->


							
							
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
                                        url: 'ajaxhomepending.php',
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