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
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">NWM SYSTEM</span>
    </div>

    <div class="welcome" style="color: white; text-align: center; font-size:small;">Hi  !</div>

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




				</div>
					</div>
						</div>
	





</section>	
  
  
  
</body>
</html>