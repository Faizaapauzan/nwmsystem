<?php
    session_start();
    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");
    }
    if(!isset($_SESSION['username'])) {
        header("location: index.php?error=login");
    }
    elseif($_SESSION['staff_position']!= 'Admin' && $_SESSION['staff_position']!='Manager') {
        header("location: index.php?error=permission");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Homepage</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css/homepage.css"rel="stylesheet" />
    <link href="css/style.css"rel="stylesheet" />
    <link href="css/adminhomepage.css"rel="stylesheet" />
    <link href="css/adminboard.css"rel="stylesheet" />
    <link href="css/admin.css"rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
</head>
<style>

    .supports {
        border-radius: 6px;
        font-size: 15px;
        width: max-content;
        text-align: center;
        font-weight: bold;
        font-family: "Times New Roman", Times, serif;
        margin-bottom: 2px;
        color: #22304d;
        margin: unset;
        margin-top: auto;
    }
    
    .dropdown-content1 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
    }
    
    .dropdown-content1 a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        padding-right: 7px;
    }
    
    .dropdown-content1 a:hover {background-color: #f1f1f1}
    
    .dropdown1:hover .dropdown-content1 {display: block;}
    
    .dropdown1:hover .dropbtn1 {color:whitesmoke;}

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: auto;
        padding-left: 20px;
        bottom: 55px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    
    .dropdown-content a {
        color: black;
        padding: 10px 10px;
        text-decoration: none;
        display: block;
        padding-right: 7px;
    }

    .dropdown-content a:hover {background-color: #f1f1f1}
    
    .dropdown:hover .dropdown-content {display: block;}
    
    .dropdown:hover .dropbtn {color:whitesmoke;}
    
    .updateBtn input {
        height: 30px;
        width: 100px;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: #081d45;
        margin-bottom: 10px;
    }
    
</style>
<body>
    
    <!-- Navigation Sidebar -->
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
                    <a href="">
                        <i class='bx bx-calendar-check' ></i>
                        <span class="link_name">Attendance</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="attendanceadmin.php">Attendance</a></li>
                    <li><a class="link_name" href="AdminLeave.php">Leave</a></li>
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
                <a href="">
                    <i class='bx bxs-report' ></i>
                    <span class="link_name">Report</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminreport.php">Admin Report</a></li>
                    <li><a class="link_name" href="report.php">Service Report</a></li>
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
        </ul>
    </div>
    <!-- End of Navigation Sidebar -->

    <!-- Admin Home Board -->
    <section class="home-section">

        <!-- Admin Home Button Dropdown -->
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <ul class="main-nav" id="js-menu">
                    <div class="dropdown1">
                        <button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="nav1-links sidebarbutton dropbtn1">Home</button>
                        <div class="dropdown-content1">
                            <a href="AdminJobTable.php">Job - Table view</a>
                            <a href="adminjoblisting.php">Job - List View</a>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
        <!-- End of Admin Home Button Dropdown -->
        
        <!-- Back to top Button -->
        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        
        <script>
            var mybutton = document.getElementById("myBtn");
            window.onscroll = function() {scrollFunction()};
            
            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                }
                else {
                    mybutton.style.display = "none";
                }
            }
            
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- End Back to top Button -->

    <!-- Admin Home Board Card -->
    <div class="w3-quarter">
        <div class="overview-boxes">
            
            <!-- First row of Admin Board Card -->
            <div class="row">
                 
                <!-- Job Listing -->
                <div class="box" id="myModal">
                    <div class="box_topic">Job Listing</div>
                            
                            <?php
                                include 'dbconnect.php';
                                $results = $conn->query
                                            ("SELECT * FROM job_register WHERE
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign = '' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_status IS NULL AND job_assign = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status = '' AND job_assign IS NULL AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'NO' AND job_status = '' AND job_assign = '' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'NO' AND job_assign = '' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required IS NULL AND job_status IS NULL AND job_assign IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                    OR
                                                (job_assign = '' AND job_status = 'Ready' AND job_cancel = '')
                                                    OR
                                                (job_assign IS NULL AND job_status = 'Ready' AND job_cancel IS NULL)   
                                             ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                $numRow = "SELECT * FROM job_register WHERE
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
                                                (job_assign IS NULL AND job_status = 'Ready' AND job_cancel IS NULL)";
                                
                                $numRow_run = mysqli_query ($conn,$numRow);
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
                                    }
                                    
                                    else {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                    
                                    while($row = $results->fetch_assoc()) {
                            ?>
                        
                        <div class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
                        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                        <ul class="b" id="draged">
                            <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                            <li><?php echo $row['job_priority']?></li>
                            <li><?php echo $row['customer_name']?></li>
                            <li><?php echo $row['machine_type']?></li>
                            <li><?php echo $row['job_description']?></li>
                            <li><b><?php echo $row['accessories_required']?></b> accessories required</li>
                            <li><?php echo $row['job_status']?></li>
                            <strong text-align="center" style="color:red"><?php echo $row['reason']?></strong>
                        </ul>
                        <div class='supports' id='support'> <?php echo $row['support']?></div>
                        </div>
                            <?php } ?>
                </div>
                
                <!-- Job Listing PopUp -->
                <div id="doubleClick-1" class="modal">
                    <div class="tabs">
                        
                        <!-- Job Listing Job Info Tab -->
                        <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
                        <label for="tabDoingOne" class="tabHeading">Job Info</label>
                        <div class="tab" id="jobInfoTabs">
                            <div class="TechJobInfoTab">
                                <div class="contentTechJobInfo">
                                    <div style="right: 507px; top: -53px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none';">&times</div>
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
                                    var type_id = $(this).data('type_id');
                                    var customer_name = $(this).data('customer_name');
                                    // AJAX request
                                    $.ajax({
                                        url: 'AdminHomepageJobinfo.php',
                                        type: 'post',
                                       data: {jobregister_id: jobregister_id, 
                                                     type_id: type_id,
                                               customer_name: customer_name},
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

                        <!-- Job Listing Job Assign Tab -->
                        <input type="radio" name="tabDoing" id="tabDoingTwo">
                        <label for="tabDoingTwo" class="tabHeading"> Job Assign </label>
                        <div class="tab">
                            <div class="TechJobInfoTab">
                                <div class="contentTechJobInfo">
                                    <div style="right: 507px; top: -53px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                                    <form action="AdminHomepageJobassign.php" method="post">
                                        <div class="assign-details">

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
                                        url: 'AdminHomepageJobassign.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
                                        success: function(response) {
                                            // Add response in Modal body
                                            $('.assign-details').html(response);
                                            // Display Modal
                                            $('#doubleClick-1').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>
                        
                        <!-- Job Listing Accessories Tab -->
                        <input type="radio" name="tabDoing" id="tabDoingThree">
                        <label for="tabDoingThree" class="tabHeading"> Accessories </label>
                        <div class="tab">
                            <div class="TechJobInfoTab">
                                <div class="contentTechJobInfo">
                                    <div style="right: 507px; top: -53px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
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

                    </div>
                </div>
                <!-- End of Job Listing PopUp -->
                <!-- End of Job Listing -->		

                <!-- Storekeeper -->
                <div class="box" id="myModal">
                    <div class="box_topic">Store</div>
                            
                            <?php
                                include 'dbconnect.php';
                                $results = $conn->query
                                            ("SELECT * FROM job_register WHERE
                                                (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel IS NULL)
                                             ORDER BY jobregisterlastmodify_at DESC LIMIT 50");	 
                                
                                $numRow = "SELECT * FROM job_register WHERE
                                                (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (accessories_required = 'Yes' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = '' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status IS NULL AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Not Ready' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Incomplete' AND job_cancel IS NULL)
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel = '')
                                                    OR
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel IS NULL)";
                                
                                $numRow_run = mysqli_query ($conn,$numRow);
                                if ($row_Total = mysqli_num_rows($numRow_run)) {
                                    echo '<h4 style="text-align:right;" >Total Job: '.$row_Total.' </h4>';
                                }
                                
                                else {
                                    echo '<h4 style="text-align:right;">No Data </h4>';
                                }
                                
                                while($row = $results->fetch_assoc()) {
                            ?>
						
                        <div class="Store" data-id="<?php echo $row['jobregister_id'];?>" data-type_id="<?php echo $row['type_id'];?>" data-target="doubleClick-Store"  ondblclick="document.getElementById('doubleClick-Store').style.display='block'">
                        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                        <ul class="b" id="draged">
                            <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                            <li><?php echo $row['job_priority']?></li>
                            <li><?php echo $row['customer_name']?></li>
                            <li><?php echo $row['machine_type']?></li>
                            <li><?php echo $row['job_description']?></li>
                            <li><?php echo $row['job_status']?></li>
                            <strong text-align="center" style="color:red"><?php echo $row['reason']?></strong>
                        </ul>
                        </div>
                            <?php } ?>
                </div>
                
                <!-- Storekeeper PopUp -->
                <div id="doubleClick-Store" class="modal">
                    <div class="tabStore">

                        <!-- Storekeeper Job Info Tab -->
                        <input type="radio" name="tabDoingStore" id="tabDoingStore1" checked="checked">
                        <label for="tabDoingStore1" class="tabHeadingStore"> Job Info </label>
                        <div class="tab" id="StoreJobInfoTab">
                            <div class="contentStoreJobInfo" style="padding-left: 66px; margin-left: -89px; margin-top: -47px;">
                            <div style="right: 410px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
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
                                    var type_id = $(this).data('type_id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'AdminHomepageJobinfo.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id, type_id: type_id},
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
                        <div style="min-width: -webkit-fill-available;" class="tab">
                        <div style="right: 410px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
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
                        <div style="min-width: -webkit-fill-available;" class="tab">
                        <div style="right: 410px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
                        <form action="ajaxstoreupdateADMIN.php" method="post">
                            <div class="store-update">

                            </div>
                        </form>
                        </div>

                        <script type='text/javascript'>
                            $(document).ready(function() {
                                $('.Store').click(function() {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxstoreupdateADMIN.php',
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

                    </div>
                </div>
                <!-- End of Storekeeper PopUp -->
                <!-- End of Storekeeper -->

                <!-- Pending -->
                <div class="box" id="myModal">
                    <div class="box_topic">Pending</div>
                        
                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query
                                            ("SELECT * FROM job_register WHERE 
                                                (job_status = 'Pending' AND job_cancel = '')
                                                    OR    
                                                (job_status = 'Pending' AND job_cancel IS NULL)
                                             ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                
                                $numRow = "SELECT * FROM job_register WHERE 
                                             (job_status = 'Pending' AND job_cancel = '')
                                                OR    
                                             (job_status = 'Pending' AND job_cancel IS NULL)";
                                
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

						<div class="Pending" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Pending"  ondblclick="document.getElementById('doubleClick-Pending').style.display='block'">
                        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                        <ul class="b" id="draged">
                            <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                            <li><?php echo $row['job_priority']?></li>
                            <li><?php echo $row['customer_name']?></li>
                            <li><?php echo $row['machine_type']?></li>
                            <li><?php echo $row['job_description']?></li>
                            <li><?php echo $row['job_status']?></li>
                            <li><b>Pending Reason: </b><?php echo $row['reason']?></li>
                        </ul>
                        </div>
                            <?php } ?>
                </div>
                
                <!-- Pending Popup Modal -->
                <div id="doubleClick-Pending" class="modal">
                    <div class="tabPending">
                        <input type="radio" name="tabDoingPending" id="tabDoingPending1" checked="checked">
                        
                        <!-- Pending Job Info Tab -->
                        <label for="tabDoingPending1" class="tabHeadingPending"> Job Info </label>
                        <div class="tab" id="PendingJobInfoTab">
                            <div class="contentPendingJobInfo" style="margin-top: -27px; margin-left: -22px;">
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
                                    var type_id = $(this).data('type_id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'AdminHomepageJobinfoPending.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id, 
                                                      type_id: type_id},
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
                    
                        <!-- Pending Job Assign tab -->
                        <input type="radio" name="tabDoingPending" id="tabDoingPending3">
                        <label for="tabDoingPending3" class="tabHeadingPending">Job Assign</label>
                        <div class="tab" id="PendingJobInfoTab">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                            <form action="jobassignADMIN.php" method="post">
                                <div class="pending-assign">

                                </div>
                            </form>
                        </div>
                        
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('body').on('click','.Pending',function(){
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'AdminHomepageJobassign.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-assign').html(response);
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
                            <form action="AdminHomepageUpdate.php" method="post">
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
                                        url: 'AdminHomepageUpdate.php',
                                        type: 'post',
                                        data: {jobregister_id: jobregister_id},
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
                        
                        <!-- Pending Photo Tab -->
                        <input type="radio" name="tabDoingPending" id="tabDoingPending5">
                        <label for="tabDoingPending5" class="tabHeadingPending">Photo</label>
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
                        
                        <!-- Pending Video Tab -->
                        <input type="radio" name="tabDoingPending" id="tabDoingPending7">
                        <label for="tabDoingPending7" class="tabHeadingPending">Video</label>
                        <div class="tab" id="PendingJobInfoTab">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                            <form action="ajaxtechvideoupdt.php" method="post">
                                <div class="pending-video">

                                </div>
                            </form>
                        </div>
                        
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Pending').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url:'ajaxtechvideoupdt.php',
                                        type:'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-video').html(response);
                                            // Display Modal
                                            $('#doubleClick-Pending').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>
                        
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
                    </div>
                </div>
                <!-- End of Pending Popup Modal -->
                <!-- End of Pending -->

                <!-- Incomplete -->
                <div class="box" id="myModal">
                    <div class="box_topic">Incomplete</div>
                            
                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query
                                            ("SELECT * FROM job_register 
                                                WHERE job_status = 'Incomplete'
                                                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                
                                $numRow = "SELECT * FROM job_register WHERE job_status = 'Incomplete'";
                                
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
                        
						<div class="Incomplete" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Incomplete" ondblclick="document.getElementById('doubleClick-Incomplete').style.display='block'">
                        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                        <ul class="b" id="draged">
                            <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                            <li><?php echo $row['job_priority']?></li>
                            <li><?php echo $row['customer_name']?></li>
                            <li><?php echo $row['machine_type']?></li>
                            <li><?php echo $row['job_description']?></li>
                            <li><?php echo $row['job_status']?></li>
                            <li><b>Incomplete Reason: </b><?php echo $row['reason']?></li>
                        </ul>
                        </div>
                            <?php } ?>                              
                </div>
                
                <!-- Incomplete Popup Modal -->
                <div id="doubleClick-Incomplete" class="modal">
                    <div class="tabIncomplete">
                        <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete1" checked="checked">
                        
                        <!-- Incomplete Job Info Tab -->
                        <label for="tabDoingIncomplete1" class="tabHeadingIncomplete"> Job Info </label>
                        <div class="tab" id="IncompleteJobInfoTab">
                            <div class="contentIncompleteJobInfo" style="margin-top: -27px; margin-left: -22px;">
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
                                        url: 'AdminHomepageJobinfoIncomplete.php',
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

                        <!-- Incomplete Job Assign Tab -->
                        <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete3">
                        <label for="tabDoingIncomplete3" class="tabHeadingIncomplete">Job Assign</label>
                        <div class="tab" id="IncompleteJobInfoTab">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                            <form action="jobassignADMIN.php" method="post">
                                <div class="incomplete-assign">

                                </div>
                            </form>
                        </div>
                        
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'AdminHomepageJobassign.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-assign').html(response);
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
                            <form action="AdminHomepageUpdate.php" method="post">
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
                                        url: 'AdminHomepageUpdate.php',
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
                        
                        <!-- Pending Photo Tab -->
                        <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete5">
                        <label for="tabDoingIncomplete5" class="tabHeadingIncomplete">Photo</label>
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
                        
                        <!-- Incomplete Video Tab -->
                        <input type="radio" name="tabDoingIncomplete" id="tabDoingIncomplete7">
                        <label for="tabDoingIncomplete7" class="tabHeadingIncomplete">Video</label>
                        <div class="tab" id="IncompleteJobInfoTab">
                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Incomplete').style.display='none'">&times</div>
                            <form action="ajaxtechvideoupdt.php" method="post">
                                <div class="incomplete-video">

                                </div>
                            </form>
                        </div>
                        
                        <script type='text/javascript'>
                            $(document).ready(function () {
                                $('.Incomplete').click(function () {
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxtechvideoupdt.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.incomplete-video').html(response);
                                            // Display Modal
                                            $('#doubleClick-Incomplete').modal('show');
                                        }
                                    });
                                });
                            });
                        </script>
                        
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
                    </div>
                </div>
                <!-- End of Incomplete Popup Modal -->
                <!-- End of Incomplete -->
            </div>
            <!-- End of First row of Admin Board Card -->				
				
            <!-- Second row of Admin Board Card -->
            <div class="" >
                <div class="row">
                    
                    <!-- Hamir -->
                    <div class="box" id="myModal">
                        <div class="left-side">
                            <div class="box_topic">Hamir</div>
                                
                                    <?php
                                        include 'dbconnect.php';
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Hamir' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status IS NULL AND job_cancel = '')
                                                      ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                        
                                        $numRow = "SELECT * FROM job_register WHERE
                                                        (job_assign = 'Hamir' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hamir' AND job_status IS NULL AND job_cancel = '')";
                                        
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                        if ($row_Total = mysqli_num_rows($numRow_run)) {
                                            echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                        }
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Hamir'");
                                        while($data = mysqli_fetch_array($records)) {
                                            if ($data['tech_avai']==1) {
                                                echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                            }
                                            else {
                                                echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                            }
                                        }
                                        while($row = $results->fetch_assoc()) {
                                    ?>
                                    
                                <div class="Hamir" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-Hamir"  ondblclick="document.getElementById('doubleClick-Hamir').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Hamir PopUp Modal -->
                    <div id="doubleClick-Hamir" class="modal">
                        <div class="tabHamir">

                            <!-- Hamir Job Info Tab -->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir1" checked="checked">
                            <label for="tabDoingHamir1" class="tabHeadingHamir">Job Info</label>
                            <div class="tab" id="HamirJobInfoTab">
                                <div class="contentHamirJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="hamir-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hamir',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, type_id: type_id, customer_name: customer_name},
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
                        
                            <!-- Hamir Job Assign Tab -->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir2">
                            <label for="tabDoingHamir2" class="tabHeadingHamir">Job Assign</label>
                            <div class="tab" id="HamirJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="hamir-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hamir',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.hamir-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Hamir').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Hamir Update Tab -->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir3">
                            <label for="tabDoingHamir3" class="tabHeadingHamir">Update</label>
                            <div class="tab" id="HamirJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="hamir-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hamir',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Hamir Accessories Tab -->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir4">
                            <label for="tabDoingHamir4" class="tabHeadingHamir">Accessories</label>
                            <div class="tab" id="HamirJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="hamir-accessories">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Hamir Photo -->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir5">
                            <label for="tabDoingHamir5" class="tabHeadingHamir">Photo</label>
                            <div class="tab" id="HamirJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="hamir-photo">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Hamir Video Tab -->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir6">
                            <label for="tabDoingHamir6" class="tabHeadingHamir">Video</label>
                            <div class="tab" id="HamirJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="hamir-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hamir',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.hamir-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Hamir').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Hamir Report Tab-->
                            <input type="radio" name="tabDoingHamir" id="tabDoingHamir8">
                            <label for="tabDoingHamir8" class="tabHeadingHamir">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hamir').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="hamir-report">

                                    </div>
                                </form>
                            </div>

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
                        </div>
                    </div>
                    <!-- END OF HAMIR -->
                    
                    <!-- HWA -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Hwa</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                   ("SELECT * FROM job_register WHERE
                                                       (job_assign = 'Hwa' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status IS NULL AND job_cancel = '')
                                                      ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                                      
                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Hwa' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hwa' AND job_status IS NULL AND job_cancel = '') ";
                                                        
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                        if ($row_Total = mysqli_num_rows($numRow_run))
                                            {
                                                echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                            }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Hwa'");
                                        while($data = mysqli_fetch_array($records))
                                            {
                                                if ($data['tech_avai']==1) {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                                
                                                else {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                            }
                                            while($row = $results->fetch_assoc()) {
                                    ?>
                                    
                                <div class="Hwa" data-id="<?php echo $row['jobregister_id'];?>" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-Hwa"  ondblclick="document.getElementById('doubleClick-Hwa').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'><?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Hwa PopUp Modal -->
                    <div id="doubleClick-Hwa" class="modal">
                        <div class="tabHwa">

                            <!-- Hwa Job Info tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa1" checked="checked">
                            <label for="tabDoingHwa1" class="tabHeadingHwa">Job Info</label>
                            <div class="tab" id="HwaJobInfoTab">
                                <div class="contentHwaJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="hwa-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hwa',function(){ 
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id,
                                                    customer_name: customer_name},
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
                            
                            <!-- Hwa Job Assign tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa2">
                            <label for="tabDoingHwa2" class="tabHeadingHwa">Job Assign</label>
                            <div class="tab" id="HwaJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="hwa-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hwa',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.hwa-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Hwa').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Hwa update tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa3">
                            <label for="tabDoingHwa3" class="tabHeadingHwa">Update</label>
                            <div class="tab" id="HwaJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="hwa-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hwa',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Hwa Accessoies Tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa4">
                            <label for="tabDoingHwa4" class="tabHeadingHwa">Accessories</label>
                            <div class="tab" id="HwaJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="hwa-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hwa',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Hwa Photo tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa5">
                            <label for="tabDoingHwa5" class="tabHeadingHwa">Photo</label>
                            <div class="tab" id="HwaJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="hwa-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hwa',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Hwa video tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa6">
                            <label for="tabDoingHwa6" class="tabHeadingHwa">Video</label>
                            <div class="tab" id="HwaJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="hwa-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hwa',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.hwa-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Hwa').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Hwa report tab -->
                            <input type="radio" name="tabDoingHwa" id="tabDoingHwa8">
                            <label for="tabDoingHwa8" class="tabHeadingHwa">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hwa').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="hwa-report">

                                    </div>
                                </form>
                            </div>

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
                        </div>
                    </div>
                    <!-- End of Hwa PopUp Modal -->
                    <!-- END OF HWA -->
                    
                    <!-- Iskandar -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Iskandar</div>
                                
                                    <?php
                                        include 'dbconnect.php';

                                        $results = $conn->query
                                                   ("SELECT * FROM job_register WHERE
                                                       (job_assign = 'ISKANDAR' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                        
                                        $numRow = "SELECT * FROM job_register WHERE
                                                        (job_assign = 'ISKANDAR' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'ISKANDAR' AND job_status IS NULL AND job_cancel = '') ";
                                                
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                        if ($row_Total = mysqli_num_rows($numRow_run))
                                            {
                                                echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                            }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='ISKANDAR'");
                                        while($data = mysqli_fetch_array($records))
                                            {
                                                if ($data['tech_avai']==1){
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                                else {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                            }
                                            
                                            while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="Isk" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-Isk" ondblclick="document.getElementById('doubleClick-Isk').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Iskandar PopUp Modal -->
                    <div id="doubleClick-Isk" class="modal">
                        <div class="tabIsk">
                            
                            <!-- Iskandar Job Info Tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk1" checked="checked">
                            <label for="tabDoingIsk1" class="tabHeadingIsk">Job Info</label>
                            <div class="tab" id="IskJobInfoTab">
                                <div class="contentIskJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="isk-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Isk',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Iskandar Job Assign Tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk2">
                            <label for="tabDoingIsk2" class="tabHeadingIsk">Job Assign</label>
                            <div class="tab" id="IskJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="isk-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Isk',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.isk-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Isk').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Iskandar Update tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk3">
                            <label for="tabDoingIsk3" class="tabHeadingIsk">Update</label>
                            <div class="tab" id="IskJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="isk-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Isk',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Iskandar Accessories Tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk4">
                            <label for="tabDoingIsk4" class="tabHeadingIsk">Accessories</label>
                            <div class="tab" id="IskJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="isk-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Isk',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Iskandar Photo Tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk5">
                            <label for="tabDoingIsk5" class="tabHeadingIsk">Photo</label>
                            <div class="tab" id="IskJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="isk-photos">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Iskandar Video Tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk6">
                            <label for="tabDoingIsk6" class="tabHeadingIsk">Video</label>
                            <div class="tab" id="IskJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="isk-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Isk',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.isk-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Isk').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
 
                            <!-- Iskandar Report Tab -->
                            <input type="radio" name="tabDoingIsk" id="tabDoingIsk8">
                            <label for="tabDoingIsk8" class="tabHeadingIsk">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Isk').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="isk-report">

                                    </div>
                                </form>
                            </div>

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
                        </div>
                    </div>
                    <!-- End of Iskandar PopUp Modal -->        
                    <!-- End of Iskandar -->

                    <!-- HAFIZ -->
                    <div class="box" id="myModal">
                        <div class="left-side">
                            <div class="box_topic">Hafiz</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Hafiz' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                    
                                        $numRow = "SELECT * FROM `job_register`WHERE 
                                                        (job_assign = 'Hafiz' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Hafiz' AND job_status IS NULL AND job_cancel = '')";
                                    
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                    
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Hafiz'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1)
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                    
                                                    else
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                }
                                                
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="Hafiz" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Hafiz"  ondblclick="document.getElementById('doubleClick-Hafiz').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Hafiz PopUp Modal -->
                    <div id="doubleClick-Hafiz" class="modal">
                        <div class="tabHafiz">
                            
                            <!-- Hafiz Job Info Tab -->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz1" checked="checked">
                            <label for="tabDoingHafiz1" class="tabHeadingHafiz"> Job Info </label>
                            <div class="tab" id="HafizJobInfoTab">
                                <div class="contentHafizJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="hafiz-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hafiz',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id,
														  type_id: type_id,
													customer_name: customer_name},
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
                            
                            <!-- Hafiz Job Assign Tab -->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz2">
                            <label for="tabDoingHafiz2" class="tabHeadingHafiz">Job Assign</label>
                            <div class="tab" id="HafizJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="hafiz-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hafiz',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.hafiz-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Hafiz').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Hafiz Update Tab -->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz3">
                            <label for="tabDoingHafiz3" class="tabHeadingHafiz">Update</label>
                            <div class="tab" id="HafizJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="hafiz-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hafiz',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Hafiz Accessories Tab -->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz4">
                            <label for="tabDoingHafiz4" class="tabHeadingHafiz">Accessories</label>
                            <div class="tab" id="HafizJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="hafiz-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hafiz',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Hafiz Photo Tab -->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz5">
                            <label for="tabDoingHafiz5" class="tabHeadingHafiz">Photo</label>
                            <div class="tab" id="HafizJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="hafiz-photo">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hafiz',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!--Hafiz Vidoe Tab-->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz6">
                            <label for="tabDoingHafiz6" class="tabHeadingHafiz">Video</label>
                            <div class="tab" id="HafizJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="hafiz-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Hafiz',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.hafiz-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Hafiz').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Hafiz Report Tab -->
                            <input type="radio" name="tabDoingHafiz" id="tabDoingHafiz8">
                            <label for="tabDoingHafiz8" class="tabHeadingHafiz"> Report </label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Hafiz').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="hafiz-report">

                                    </div>
                                </form>
                            </div>
                            
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
                        </div>
                    </div>
                    <!-- End Of HAFIZ PopUp Modal -->
                    <!-- End Of HAFIZ -->
                </div>
            </div>
            <!-- End of Second row of Admin Board Card -->
            
            <!-- Third Row of Admin Board Card -->
            <div class="" >
                <div class="row">

                    <!-- Jun Jie -->
                    <div class="box" id="myModal">
                        <div class="left-side">
                            <div class="box_topic">Jun Jie</div>
                            
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                   ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Jun Jie' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                                     
                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Jun Jie' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Jun Jie' AND job_status IS NULL AND job_cancel = '') ";
                                                        
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                                
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Jun Jie'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1){
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                                    
                                                    else {
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                                }
                                                
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="JunJie" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-JunJie" ondblclick="document.getElementById('doubleClick-JunJie').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Jun Jie PopUp Modal -->
                    <div id="doubleClick-JunJie" class="modal">
                        <div class="tabJunJie">

                            <!-- Jun Jie Job Info Tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie1" checked="checked">
                            <label for="tabDoingJunJie1" class="tabHeadingJunJie">Job Info</label>
                            <div class="tab" id="JunJieJobInfoTab">
                                <div class="contentJunJieJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="junjie-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.JunJie',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Jun Jie Job Assign Tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie2">
                            <label for="tabDoingJunJie2" class="tabHeadingJunJie">Job Assign</label>
                            <div class="tab" id="JunJieJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="junjie-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.JunJie',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.junjie-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-JunJie').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Jun Jie Update Tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie3">
                            <label for="tabDoingJunJie3" class="tabHeadingJunJie">Update</label>
                            <div class="tab" id="JunJieJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="junjie-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.JunJie',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Jun Jie Accessories Tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie4">
                            <label for="tabDoingJunJie4" class="tabHeadingJunJie">Accessories</label>
                            <div class="tab" id="JunJieJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="junjie-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.JunJie',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Jun Jie photo tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie5">
                            <label for="tabDoingJunJie5" class="tabHeadingJunJie">Photo</label>
                            <div class="tab" id="JunJieJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="junjie-photos">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Jun Jie Video tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie6">
                            <label for="tabDoingJunJie6" class="tabHeadingJunJie">Video</label>
                            <div class="tab" id="JunJieJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="junjie-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.JunJie',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.junjie-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-JunJie').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Jun Jie Report tab -->
                            <input type="radio" name="tabDoingJunJie" id="tabDoingJunJie8">
                            <label for="tabDoingJunJie8" class="tabHeadingJunJie">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-JunJie').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="junjie-report">

                                    </div>
                                </form>
                            </div>
                            
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
                        </div>
                    </div>
                    <!-- End of Jun Jie PopUp Modal -->
                    <!-- End of Jun Jie -->
                    
                    <!-- RAZWILL -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Razwill</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        $results = $conn->query
                                                   ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Will' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                    
                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Will' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Will' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Will' AND job_status IS NULL AND job_cancel = '')";
                    
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Will'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1){
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                                    
                                                    else {
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                                }
                                                
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="Razwill" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-Razwill" ondblclick="document.getElementById('doubleClick-Razwill').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>

                    <!-- Razwill PopUp Modal -->
                    <div id="doubleClick-Razwill" class="modal">
                        <div class="tabRazwill">

                            <!-- Razwill Job Info tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill1" checked="checked">
                            <label for="tabDoingRazwill1" class="tabHeadingRazwill">Job Info</label>
                            <div class="tab" id="RazwillJobInfoTab">
                                <div class="contentRazwillJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="razwill-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Razwill',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Razwill Job Assign Tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill2">
                            <label for="tabDoingRazwill2" class="tabHeadingRazwill">Job Assign</label>
                            <div class="tab" id="RazwillJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="razwill-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Razwill',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.razwill-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Razwill').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Razwill Update Tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill3">
                            <label for="tabDoingRazwill3" class="tabHeadingRazwill">Update</label>
                            <div class="tab" id="RazwillJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="razwill-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Razwill',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                $('.razwill-update').html(response);
                                                $('#doubleClick-Razwill').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Razwill Accessories Tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill4">
                            <label for="tabDoingRazwill4" class="tabHeadingRazwill">Accessories</label>
                            <div class="tab" id="RazwillJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="razwill-accessories">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Razwill Photo Tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill5">
                            <label for="tabDoingRazwill5" class="tabHeadingRazwill">Photo</label>
                            <div class="tab" id="RazwillJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="razwill-photos">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Razwill video tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill6">
                            <label for="tabDoingRazwill6" class="tabHeadingRazwill">Video</label>
                            <div class="tab" id="RazwillJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="razwill-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Razwill',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.razwill-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Razwill').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Razwill Report Tab -->
                            <input type="radio" name="tabDoingRazwill" id="tabDoingRazwill8">
                            <label for="tabDoingRazwill8" class="tabHeadingRazwill">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Razwill').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="razwill-report">

                                    </div>
                                </form>
                            </div>

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
                        </div>
                    </div>
                    <!-- End of Razwill PopUp modal -->
                    <!-- End of Razwill -->
                    
                    <!-- SAHELE -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Sahele</div>
                            
                                    <?php
                                        include 'dbconnect.php';
                                        $results = $conn->query
                                                   ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Sahele' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                            
                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Sahele' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sahele' AND job_status IS NULL AND job_cancel = '') ";
                    
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                        if ($row_Total = mysqli_num_rows($numRow_run))
                                            {
                                                echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                            }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Sahele'");
                                        while($data = mysqli_fetch_array($records))
                                            {
                                                if ($data['tech_avai']==1) {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                                
                                                else {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                            }
                                            
                                            while($row = $results->fetch_assoc()) {
                                    ?>
                                    
                                <div class="Sahele" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-Sahele"  ondblclick="document.getElementById('doubleClick-Sahele').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Sahele PopUp Modal -->
                    <div id="doubleClick-Sahele" class="modal">
                        <div class="tabSahele">

                            <!-- Sahele Job Info Tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele1" checked="checked">
                            <label for="tabDoingSahele1" class="tabHeadingSahele">Job Info</label>
                            <div class="tab" id="SaheleJobInfoTab">
                                <div class="contentSaheleJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="sahele-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sahele',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, type_id: type_id, customer_name: customer_name},
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
                            
                            <!-- Sahele Job Assign Tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele2">
                            <label for="tabDoingSahele2" class="tabHeadingSahele">Job Assign</label>
                            <div class="tab" id="SaheleJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="sahele-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sahele',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.sahele-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Sahele').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Sahele Update Tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele3">
                            <label for="tabDoingSahele3" class="tabHeadingSahele">Update</label>
                            <div class="tab" id="SaheleJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="sahele-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sahele',function(){
                                        var jobregister_id = $(this).data('id');
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                $('.sahele-update').html(response);
                                                $('#doubleClick-Sahele').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Sahele Accessories Tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele4">
                            <label for="tabDoingSahele4" class="tabHeadingSahele">Accessories</label>
                            <div class="tab" id="SaheleJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="sahele-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sahele',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Sahele Photo Tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele5">
                            <label for="tabDoingSahele5" class="tabHeadingSahele">Photo</label>
                            <div class="tab" id="SaheleJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="sahele-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sahele',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Sahele video tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele6">
                            <label for="tabDoingSahele6" class="tabHeadingSahele">Video</label>
                            <div class="tab" id="SaheleJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="sahele-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sahele',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: { jobregister_id: jobregister_id },
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.sahele-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Sahele').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!-- Sahele Report Tab -->
                            <input type="radio" name="tabDoingSahele" id="tabDoingSahele8">
                            <label for="tabDoingSahele8" class="tabHeadingSahele">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sahele').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="sahele-report">

                                    </div>
                                </form>
                            </div>

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

                        </div>
                    </div>
                    <!-- End of Sahele PopUp Modal -->
                    <!-- End of Sahele -->
                    
                    <!-- SAZALY -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Sazaly</div>
                                
                                    <?php

                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                   ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Sazaly' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                        
                                        $numRow = "SELECT * FROM job_register WHERE
                                                        (job_assign = 'Sazaly' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Sazaly' AND job_status IS NULL AND job_cancel = '') ";
                
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Sazaly'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1)
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                    else 
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                }
                                        
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                        
                                <div class="Sazaly" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-target="doubleClick-Sazaly"  ondblclick="document.getElementById('doubleClick-Sazaly').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Sazaly PopUp Modal -->
                    <div id="doubleClick-Sazaly" class="modal">
                        <div class="tabSazaly">

                            <!-- Sazaly Job Info Tab -->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly1" checked="checked">
                            <label for="tabDoingSazaly1" class="tabHeadingSazaly">Job Info</label>
                            <div class="tab" id="SazalyJobInfoTab">
                                <div class="contentSazalyJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="sazaly-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sazaly',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Sazaly Job Assign Tab -->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly2">
                            <label for="tabDoingSazaly2" class="tabHeadingSazaly">Job Assign</label>
                            <div class="tab" id="SazalyJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="sazaly-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sazaly',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.sazaly-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Sazaly').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Sazaly Update Tab -->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly3">
                            <label for="tabDoingSazaly3" class="tabHeadingSazaly">Update</label>
                            <div class="tab" id="SazalyJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="sazaly-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sazaly',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Sazaly Accessories Tab-->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly4">
                            <label for="tabDoingSazaly4" class="tabHeadingSazaly">Accessories</label>
                            <div class="tab" id="SazalyJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="sazaly-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sazaly',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Sazaly Photo Tab -->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly5">
                            <label for="tabDoingSazaly5" class="tabHeadingSazaly">Photo</label>
                            <div class="tab" id="SazalyJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="sazaly-photos">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Sazaly Video Tab -->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly6">
                            <label for="tabDoingSazaly6" class="tabHeadingSazaly">Video</label>
                            <div class="tab" id="SazalyJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="sazaly-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Sazaly',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.sazaly-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Sazaly').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Sazaly Report Tab -->
                            <input type="radio" name="tabDoingSazaly" id="tabDoingSazaly8">
                            <label for="tabDoingSazaly8" class="tabHeadingSazaly">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Sazaly').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="sazaly-report">

                                    </div>
                                </form>
                            </div>
                            
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
                        </div>
                    </div>
                    <!-- End Of Sazaly PopUp Modal -->
                    <!-- End Of Sazaly -->
                </div>
            </div>
            <!-- End of third row of Admin Board Card -->
            
            <!-- Fourth row of Admin Board Card -->
            <div class="" >
                <div class="row">

                    <!-- Faizan -->
                    <div class="box" id="myModal">
                        <div class="left-side">
                            <div class="box_topic">Faizan</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Faizan' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                        
                                        $numRow = "SELECT * FROM `job_register`WHERE
                                                        (job_assign = 'Faizan' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Faizan' AND job_status IS NULL AND job_cancel = '')";
                
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Faizan'");
                                        while($data = mysqli_fetch_array($records))
                                            {
                                                if ($data['tech_avai']==1)
                                                    {
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                                
                                                else
                                                    {
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                            }
                                            
                                            while($row = $results->fetch_assoc()) {
                                    ?>

                                <div class="Faizan" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Faizan"  ondblclick="document.getElementById('doubleClick-Faizan').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Faizan PopUp Modal -->
                    <div id="doubleClick-Faizan" class="modal">
                        <div class="tabFaizan">

                            <!-- Faizan Job Info Tab -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan1" checked="checked">
                            <label for="tabDoingFaizan1" class="tabHeadingFaizan">Job Info</label>
                            <div class="tab" id="FaizanJobInfoTab">
                                <div class="contentFaizanJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="faizan-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Faizan',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Faizan Job Assign -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan2">
                            <label for="tabDoingFaizan2" class="tabHeadingFaizan">Job Assign</label>
                            <div class="tab" id="FaizanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="faizan-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Faizan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.faizan-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Faizan').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Faizan Update Tab -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan3">
                            <label for="tabDoingFaizan3" class="tabHeadingFaizan">Update</label>
                            <div class="tab" id="FaizanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="faizan-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Faizan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
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
                            
                            <!-- Faizan Accessories Tab -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan4">
                            <label for="tabDoingFaizan4" class="tabHeadingFaizan">Accessories</label>
                            <div class="tab" id="FaizanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="faizan-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Faizan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Faizan Photo Tab -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan5">
                            <label for="tabDoingFaizan5" class="tabHeadingFaizan">Photo</label>
                            <div class="tab" id="FaizanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="faizan-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Faizan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Faizan Video Tab -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan6">
                            <label for="tabDoingFaizan6" class="tabHeadingFaizan">Video</label>
                            <div class="tab" id="FaizanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="faizan-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Faizan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.faizan-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Faizan').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Faizan Report -->
                            <input type="radio" name="tabDoingFaizan" id="tabDoingFaizan8">
                            <label for="tabDoingFaizan8" class="tabHeadingFaizan">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Faizan').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="faizan-report">

                                    </div>
                                </form>
                            </div>
                            
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
                        </div>
                    </div>
                    <!-- End of Faizan PopUp Modal -->
                    <!-- End of Faizan -->
                    
                    <!-- Fauzin -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Fauzin</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Fauzin' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Fauzin' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Fauzin' AND job_status IS NULL AND job_cancel = '')";
            
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Fauzin'");
                                        while($data = mysqli_fetch_array($records))
                                            {
                                                if ($data['tech_avai']==1)
                                                    {
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                                
                                                else 
                                                    {
                                                        echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                    }
                                            }
                                            
                                            while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="Fauzin" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-id="<?php echo $row['jobregister_id'];?>" ondblclick="document.getElementById('doubleClick-Fauzin').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Fauzin PopUp Modal -->
                    <div id="doubleClick-Fauzin" class="modal">
                        <div class="tabFauzin">

                            <!-- Fauzin Job Info tab -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin1" checked="checked">
                            <label for="tabDoingFauzin1" class="tabHeadingFauzin">Job Info</label>
                            <div class="tab" id="FauzinJobInfoTab">
                                <div class="contentFauzinJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="fauzin-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Fauzin',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Fauzin Job Assign -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin2">
                            <label for="tabDoingFauzin2" class="tabHeadingFauzin">Job Assign</label>
                            <div class="tab" id="FauzinJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="fauzin-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Fauzin',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.fauzin-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Fauzin').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Fauzin Update Tab -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin3">
                            <label for="tabDoingFauzin3" class="tabHeadingFauzin">Update</label>
                            <div class="tab" id="FauzinJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="fauzin-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Fauzin',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Fauzin Accessories Tab -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin4">
                            <label for="tabDoingFauzin4" class="tabHeadingFauzin">Accessories</label>
                            <div class="tab" id="FauzinJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="fauzin-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Fauzin',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Fauzin Photo Tab -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin5">
                            <label for="tabDoingFauzin5" class="tabHeadingFauzin">Photo</label>
                            <div class="tab" id="FauzinJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="fauzin-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Fauzin',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Fauzin Video Tab -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin6">
                            <label for="tabDoingFauzin6" class="tabHeadingFauzin">Video</label>
                            <div class="tab" id="FauzinJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="fauzin-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Fauzin',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.fauzin-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Fauzin').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Fauzin Report Tab -->
                            <input type="radio" name="tabDoingFauzin" id="tabDoingFauzin8">
                            <label for="tabDoingFauzin8" class="tabHeadingFauzin"> Report </label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Fauzin').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="fauzin-report">

                                    </div>
                                </form>
                            </div>
                            
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
                        </div>
                    </div>
                    <!-- End Of Fauzin PopUp Modal -->
                    <!-- End of Fauzin -->
                    
                    <!-- IZAAN -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Izaan</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Izaan' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Izaan' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Izaan' AND job_status IS NULL AND job_cancel = '')";
            
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                            $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Izaan'");
                                                while($data = mysqli_fetch_array($records))
                                                    {
                                                        if ($data['tech_avai']==1) 
                                                            {
                                                                echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                            }
                                                        
                                                        else
                                                            {
                                                                echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                            }
                                                    }
                                                    
                                                    while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="Izaan" data-customer_name="<?php echo $row['customer_name'];?>" data-type_id="<?php echo $row['type_id'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Izaan"  ondblclick="document.getElementById('doubleClick-Izaan').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Izaan PopUp Modal -->
                    <div id="doubleClick-Izaan" class="modal">
                        <div class="tabIzaan">
                            
                            <!-- Izaan Job Info Tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan1" checked="checked">
                            <label for="tabDoingIzaan1" class="tabHeadingIzaan">Job Info</label>
                            <div class="tab" id="IzaanJobInfoTab">
                                <div class="contentIzaanJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="izaan-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Izaan',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Izaan Job Assign tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan2">
                            <label for="tabDoingIzaan2" class="tabHeadingIzaan">Job Assign</label>
                            <div class="tab" id="IzaanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="izaan-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Izaan',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.izaan-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Izaan').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Izaan Update Tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan3">
                            <label for="tabDoingIzaan3" class="tabHeadingIzaan">Update</label>
                            <div class="tab" id="IzaanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="izaan-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Izaan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Izaan Accessories Tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan4">
                            <label for="tabDoingIzaan4" class="tabHeadingIzaan">Accessories</label>
                            <div class="tab" id="IzaanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="izaan-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Izaan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Izaan Photo Tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan5">
                            <label for="tabDoingIzaan5" class="tabHeadingIzaan">Photo</label>
                            <div class="tab" id="IzaanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="izaan-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Izaan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Izaan Video Tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan6">
                            <label for="tabDoingIzaan6" class="tabHeadingIzaan">Video</label>
                            <div class="tab" id="IzaanJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="izaan-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Izaan',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.izaan-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Izaan').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Izaan Report Tab -->
                            <input type="radio" name="tabDoingIzaan" id="tabDoingIzaan8">
                            <label for="tabDoingIzaan8" class="tabHeadingIzaan"> Report </label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Izaan').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="izaan-report">

                                    </div>
                                </form>
                            </div>
                            
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
                        </div>
                    </div>
                    <!-- End of Izaan PopUp Modal -->
                    <!-- End of Izaan -->
                    
                    <!-- TECK -->
                    <div class="box" id="myModal">
                        <div class="left-side">
                            <div class="box_topic">Teck</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Teck' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                        $numRow = "SELECT * FROM job_register WHERE 
                                                        (job_assign = 'Teck' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Teck' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Teck' AND job_status IS NULL AND job_cancel = '')";
            
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
            
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Teck'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1) 
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                    else 
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                }
                                                
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                                
                                <div class="Teck" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Teck"  ondblclick="document.getElementById('doubleClick-Teck').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'><?php echo $row['support']?></div>
                                </div>
                                     <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Teck PopUp Modal -->
                    <div id="doubleClick-Teck" class="modal">
                        <div class="tabTeck">

                            <!-- Teck Job Info tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck1" checked="checked">
                            <label for="tabDoingTeck1" class="tabHeadingTeck">Job Info</label>
                            <div class="tab" id="TeckJobInfoTab">
                                <div class="contentTeckJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="teck-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Teck',function(){
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Teck Job Assign Tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck2">
                            <label for="tabDoingTeck2" class="tabHeadingTeck">Job Assign</label>
                            <div class="tab" id="TeckJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="teck-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Teck',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.teck-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Teck').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Teck Update Tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck3">
                            <label for="tabDoingTeck3" class="tabHeadingTeck">Update</label>
                            <div class="tab" id="TeckJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="teck-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Teck',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Teck Accessories Tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck3=4">
                            <label for="tabDoingTeck4" class="tabHeadingTeck">Accessories</label>
                            <div class="tab" id="TeckJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="teck-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Teck',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Teck Photo Tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck5">
                            <label for="tabDoingTeck5" class="tabHeadingTeck">Photo</label>
                            <div class="tab" id="TeckJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="teck-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Teck',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Teck Video Tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck6">
                            <label for="tabDoingTeck6" class="tabHeadingTeck">Video</label>
                            <div class="tab" id="TeckJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="teck-video">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Teck',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.teck-video').html(response);
                                                // Display Modal
                                                $('#doubleClick-Teck').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Teck Report Tab -->
                            <input type="radio" name="tabDoingTeck" id="tabDoingTeck8">
                            <label for="tabDoingTeck8" class="tabHeadingTeck">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Teck').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="teck-report">

                                    </div>
                                </form>
                            </div>

                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Teck',function() {
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
                        </div>
                    </div>
                    <!-- End of Teck PopUp Modal -->
                    <!-- End of Teck -->
                </div>
            </div>
            <!-- Fourth row of Admin Board Card -->
            
            <!-- Fifth row of Admin Board Card -->
            <div class="" >
                <div class="row">

                    <!-- AIZAT -->
                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic">Aizat</div>
                                    
                                    <?php
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Aizat' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status IS NULL AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                        $numRow = "SELECT * FROM `job_register`WHERE 
                                                        (job_assign = 'Aizat' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status IS NULL AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Aizat' AND job_status = 'Pending' AND job_cancel IS NULL)";
            
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run))
                                                {
                                                    echo '<h4 style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='Aizat'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1)
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                    
                                                    else 
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                }
                                                
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                            
                                <div class="Aizat" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Aizat" ondblclick="document.getElementById('doubleClick-Aizat').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Aizat PopUp Modal -->
                    <div id="doubleClick-Aizat" class="modal">
                        <div class="tabAizat" >

                            <!-- Aizat Job Info -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat1" checked="checked">
                            <label for="tabDoingAizat1" class="tabHeadingAizat">Job Info</label>
                            <div class="tab" id="AizatJobInfoTab">
                                <div class="contentAizatJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="aizat-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Aizat',function() {
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id, 
                                                          type_id: type_id, 
                                                    customer_name: customer_name},
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
                            
                            <!-- Aizat Job Assign -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat2">
                            <label for="tabDoingAizat2" class="tabHeadingAizat">Job Assign</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="aizat-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Aizat',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function(response) {
                                                // Add response in Modal body
                                                $('.aizat-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Aizat').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Aizat Update Tab -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat3">
                            <label for="tabDoingAizat3" class="tabHeadingAizat">Update</label>
                            <div class="tab" id="AizatJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="Aizattechupdate-details">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Aizat',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url:'AdminHomepageUpdate.php',
                                            type:'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Aizat Accessories Tab -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat4">
                            <label for="tabDoingAizat4" class="tabHeadingAizat">Accessories</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="AizatAcc-details">

                                    </div>
                                </form>
                            </div>
                            
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
                            
                            <!-- Aizat Photo Tab -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat5">
                            <label for="tabDoingAizat5" class="tabHeadingAizat">Photo</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="Aizat-photo-details">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Aizat',function() {
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
                            
                            <!-- Aizat Video Tab -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat6">
                            <label for="tabDoingAizat6" class="tabHeadingAizat">Video</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="Aizat-video-details">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Aizat',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function(response) {
                                                // Add response in Modal body
                                                $('.Aizat-video-details').html(response);
                                                // Display Modal
                                                $('#doubleClick-Aizat').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Aizat Report Tab -->
                            <input type="radio" name="tabDoingAizat" id="tabDoingAizat8">
                            <label for="tabDoingAizat8" class="tabHeadingAizat">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Aizat').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="aizat-report">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Aizat',function() {
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
                        </div>
                    </div>
                    <!-- End Of Aizat PopUp Modal -->
                    <!-- End Of Aizat -->
                    
                    <!-- BOON -->
                    <div class="box" id="myModal">
                        <div class="left-side" >
                            <div class="box_topic">Boon</div>
                                    
                                    <?php
                                        
                                        include 'dbconnect.php';
                                        
                                        $results = $conn->query
                                                    ("SELECT * FROM job_register WHERE
                                                        (job_assign = 'Boon' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status IS NULL AND job_cancel = '')
                                                     ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                    
                                        $numRow = "SELECT * FROM `job_register`WHERE 
                                                        (job_assign = 'Boon' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Pending' AND job_cancel = '')
                                                            OR
                                                        (job_assign = 'Boon' AND job_status = 'Pending' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = 'Boon' AND job_status IS NULL AND job_cancel = '')";
                                    
                                        $numRow_run = mysqli_query ($conn,$numRow);
                                            if ($row_Total = mysqli_num_rows($numRow_run)) 
                                                {
                                                    echo  '<h4  style="text-align: -webkit-right;">Total Job: '.$row_Total.' </h4>';
                                                }
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='BOON'");
                                            while($data = mysqli_fetch_array($records))
                                                {
                                                    if ($data['tech_avai']==1) 
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                    
                                                    else
                                                        {
                                                            echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id='.$data['staffregister_id'].'&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                        }
                                                }
                                                
                                                while($row = $results->fetch_assoc()) {
                                    ?>
                                    
                                <div class="Boon" data-type_id="<?php echo $row['type_id'];?>" data-customer_name="<?php echo $row['customer_name'];?>" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-Boon"  ondblclick="document.getElementById('doubleClick-Boon').style.display='block'">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                <ul class="b" id="draged">
                                    <strong text-align="center"><?php echo $row['job_order_number']?></strong>
                                    <li><?php echo $row['job_priority']?></li>
                                    <li><?php echo $row['customer_name']?></li>
                                    <li><?php echo $row['machine_type']?></li>
                                    <li><?php echo $row['job_description']?></li>
                                    <li><?php echo $row['job_status']?></li>
                                </ul>
                                <div class='supports' id='support'> <?php echo $row['support']?></div>
                                </div>
                                    <?php } ?>
                        </div>
                    </div>
                    
                    <!--Boon PopUp -->
                    <div id="doubleClick-Boon" class="modal">
                        <div class="tabBoon">
                            
                            <!--Boon Job Info Tab -->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon1" checked="checked">
                            <label for="tabDoingBoon1" class="tabHeadingBoon">Job Info</label>
                            <div class="tab" id="BoonJobInfoTab">
                                <div class="contentBoonJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="homeindex.php" method="post">
                                    <div class="boon-details">

                                    </div>
                                </form>
                                </div>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Boon',function() {
                                        var jobregister_id = $(this).data('id');
                                        var type_id = $(this).data('type_id');
                                        var customer_name = $(this).data('customer_name');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageJobinfoTechnician.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id,
														  type_id: type_id,
													customer_name: customer_name},
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
                            
                            <!-- Boon Job Assign Tab -->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon2">
                            <label for="tabDoingBoon2" class="tabHeadingBoon">Job Assign</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                    <div class="boon-assign">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Boon',function(){
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax( {
                                            url: 'AdminHomepageJobassignAsisstant.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.boon-assign').html(response);
                                                // Display Modal
                                                $('#doubleClick-Boon').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Boon Update Tab-->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon3">
                            <label for="tabDoingBoon3" class="tabHeadingBoon">Update</label>
                            <div class="tab" id="BoonJobInfoTab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="AdminHomepageUpdate.php" method="post">
                                    <div class="boon-update">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Boon',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'AdminHomepageUpdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Boon Accessories Tab -->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon4">
                            <label for="tabDoingBoon4" class="tabHeadingBoon"> Accessories </label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="ajaxtabaccessories.php" method="post">
                                    <div class="boon-accessories">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Boon',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtabaccessories.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Boon Photo Tab-->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon5">
                            <label for="tabDoingBoon5" class="tabHeadingBoon"> Photo </label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="ajaxtechphtoupdt.php" method="post">
                                    <div class="boon-photos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Boon',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechphtoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
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
                            
                            <!-- Boon Video Tab -->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon6">
                            <label for="tabDoingBoon6" class="tabHeadingBoon">Video</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="ajaxtechvideoupdt.php" method="post">
                                    <div class="boon-videos">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function () {
                                    $('body').on('click','.Boon',function() {
                                        var jobregister_id = $(this).data('id');
                                        // AJAX request
                                        $.ajax({
                                            url: 'ajaxtechvideoupdt.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            success: function (response) {
                                                // Add response in Modal body
                                                $('.boon-videos').html(response);
                                                // Display Modal
                                                $('#doubleClick-Boon').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                            
                            <!-- Boon Report Tab -->
                            <input type="radio" name="tabDoingBoon" id="tabDoingBoon8">
                            <label for="tabDoingBoon8" class="tabHeadingBoon">Report</label>
                            <div class="tab">
                                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                                <form action="ajaxreportadmin.php" method="post">
                                    <div class="boon-report">

                                    </div>
                                </form>
                            </div>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click','.Boon',function() {
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
                        </div>
                    </div>
                    <!-- End of Boon PopUp -->
                    <!-- End of BOON -->
                    
                    
                </div>
            </div>
            <!-- End of fifth row of Admin Board Card -->
        </div>
    </div>
    <!-- End of Admin Board Card -->
    </section>
    <!-- Admin Home Board -->

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) 
            {
                arrow[i].addEventListener("click", (e)=>
                    {
                        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
                        arrowParent.classList.toggle("showMenu");
                    });
            }
            
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>
            {
                sidebar.classList.toggle("close");
            });
    </script>

</body>
</html>