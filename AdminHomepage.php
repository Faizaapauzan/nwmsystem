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
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
        <title>Admin Homepage</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' >
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

        <!--========== CSS ==========-->
        <link href="assets/css/styles.css" rel="stylesheet" >
        <link href="css/homepage.css"rel="stylesheet" />
        <link href="css/style.css"rel="stylesheet" />
        <link href="css/adminhomepage.css"rel="stylesheet" />
        <link href="css/adminboard.css"rel="stylesheet" />
        <link href="css/admin.css"rel="stylesheet" />
        <link href="css/adminhomepageAUTO.css" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.gstatic.com">
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
    
        /* flexible box */
        .box {
            flex-wrap: wrap;
            flex: 1 1 200px;
        }  
    </style>
    
    <body>
        <!--========== HEADER ==========-->
        <header class="header">
            <div class="header__container">

                <div class="header__search">
                    <a href="Adminhomepage.php" style="font-weight: bold; font-size:25px; color:black;">Home</a>
                </div>
                
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <img src="neo.png" height="50" width="60"></img>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">
                            
                            <a href="jobregister.php" class="nav__link active">
                                <i class='bx bx-folder-plus nav__icon' ></i>
                                <span class="nav__name">New Job</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="staff.php" class="nav__link">
                                    <i class='bx bx-group nav__icon' ></i>
                                    <span class="nav__name">Staff</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>
                                                                  
                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="staff.php" class="nav__dropdown-item">All User</a>
                                        <a href="technicianlist.php" class="nav__dropdown-item">Technician</a>
                                        <a href="attendanceadmin.php" class="nav__dropdown-item">Attendance</a>
                                        <a href="AdminLeave.php" class="nav__dropdown-item">Leave</a>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="customer.php" class="nav__link">
                                <i class='bx bx-buildings nav__icon' ></i>
                                <span class="nav__name">Customer</span>
                            </a>
                            
                            <a href="machine.php" class="nav__link">
                                <i class='bx bx-cog nav__icon' ></i>
                                <span class="nav__name">Machine</span>
                            </a>
                            
                            <a href="accessories.php" class="nav__link">
                                <i class='bx bx-wrench nav__icon' ></i>
                                <span class="nav__name">Accessory</span>
                            </a>
                            
                            <a href="jobtype.php" class="nav__link">
                                <i class='bx bx-highlight nav__icon' ></i>
                                <span class="nav__name">Job Type</span>
                            </a>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-file nav__icon' ></i>
                                    <span class="nav__name">Record</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>
                                
                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="jobcompleted.php" class="nav__dropdown-item">Completed Job</a>
                                        <a href="jobcanceled.php" class="nav__dropdown-item">Cancelled Job</a>
                                        <a href="AccessoryInOut.php" class="nav__dropdown-item" style="white-space: nowrap;">Acessories In/Out</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-task nav__icon' ></i>
                                    <span class="nav__name">Reports</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>
                                
                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="adminreport.php" class="nav__dropdown-item">Admin Report</a>
                                        <a href="report.php" class="nav__dropdown-item">Service Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="logout.php" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <!--========== CONTENTS ==========-->
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
        
        <main>
            <section>
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
                                                    ("SELECT * FROM job_register WHERE (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
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

                                    $numRow = "SELECT * FROM job_register WHERE (accessories_required = '' AND job_status = '' AND job_assign = '' AND job_cancel = '')
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

                                                $.ajax({
                                                    url: 'AdminHomepageJobinfo.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id, 
                                                                  type_id: type_id,
                                                            customer_name: customer_name},
                                                    
                                                    success: function(response) {
                                                        $('.tech-details').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassign.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    success: function(response) {
                                                        $('.assign-details').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.acc-details').html(response);
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
                                                    ("SELECT * FROM job_register WHERE (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
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
                                
                                    $numRow = "SELECT * FROM job_register WHERE (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoStorekeeper.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id, 
                                                                  type_id: type_id},
                                                    
                                                    success: function (response) {
                                                        $('.store-details').html(response);
                                                        $('#doubleClick-Store').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Storekeeper Job Assign Tab -->
                                    <input type="radio" name="tabDoingStore" id="tabDoingStore2">
                                    <label for="tabDoingStore2" class="tabHeadingStore">Job Assign</label>
                                    <div style="min-width: -webkit-fill-available;" class="tab">
                                    <div style="right: 410px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Store').style.display='none'">&times</div>
                                    <form action="AdminHomepageJobassignStore.php" method="post">
                                        <div class="store-jobassign">

                                        </div>
                                    </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('.Store').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassignStore.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.store-jobassign').html(response);
                                                        $('#doubleClick-Store').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Storekeeper Accessories Tab -->
                                    <input type="radio" name="tabDoingStore" id="tabDoingStore3">
                                    <label for="tabDoingStore3" class="tabHeadingStore"> Accessories </label>
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.store-accessories').html(response);
                                                        $('#doubleClick-Store').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Storekeeper Update Tab -->
                                    <input type="radio" name="tabDoingStore" id="tabDoingStore4">
                                    <label for="tabDoingStore4" class="tabHeadingStore"> Update </label>
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
                                                
                                                $.ajax({
                                                    url: 'ajaxstoreupdateADMIN.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.store-update').html(response);
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
                                    
                                    $results = $conn->query ("SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                                OR    
                                                            (job_status = 'Pending' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                
                                    $numRow = "SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                                                    OR    
                                                                                (job_status = 'Pending' AND job_cancel IS NULL)";
                                
                                    $numRow_run = mysqli_query ($conn,$numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
                                    }
                                    
                                    else {
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoPending.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id, 
                                                                  type_id: type_id},
                                                            
                                                    success: function (response) {
                                                        $('.pending-details').html(response);
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
                                            $('body').on('click','.Pending',function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassign.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.pending-assign').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageUpdate.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function (response) {
                                                        $('.pending-update').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.pending-accessories').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtechphtoupdt.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.pending-photos').html(response);
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
                                                
                                                $.ajax({
                                                    url:'ajaxtechvideoupdt.php',
                                                    type:'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.pending-video').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxreportadmin.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.pending-report').html(response);
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
                                    
                                    $results = $conn->query ("SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                                OR    
                                                            (job_status = 'Incomplete' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                
                                    $numRow = "SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                                                    OR    
                                                                                (job_status = 'Incomplete' AND job_cancel IS NULL)";
                                
                                    $numRow_run = mysqli_query ($conn,$numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;">Total Job: '.$row_Total.' </h4>';
                                    }
                                    
                                    else {
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoIncomplete.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.incomplete-details').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassign.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.incomplete-assign').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageUpdate.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.incomplete-update').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.incomplete-accessories').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtechphtoupdt.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.incomplete-photos').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxtechvideoupdt.php',
                                                    type: 'post',
                                                    data: { jobregister_id: jobregister_id },
                                                    
                                                    success: function (response) {
                                                        $('.incomplete-video').html(response);
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
                                                
                                                $.ajax({
                                                    url: 'ajaxreportadmin.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.incomplete-report').html(response);
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
                        
                        <!-- Technician Card -->
                        <?php
                            
                            include 'dbconnect.php';
                            
                            $results = $conn->query("SELECT * FROM staff_register WHERE staff_position='Leader' ORDER BY username ASC");
                            $numsofrow = mysqli_num_rows($results);
                            $employees = [];
                            $i = 0;
                            
                            while ($row = $results->fetch_assoc()) {
                                $employees[] = $row;
                            }
                        ?>
                        
                        <?php foreach ($employees as $employee) : ?>
                        <!-- Employee Modal Box -->
                        <?php
                            $i++;
                            $username = $employee['username'];
                            if ($i % 4 == 1) {
                        ?>
                        
                        <div class="">
                            <div class="row">
                                <?php } ?>
                                <div class="box">
                                    <div class="left-side">
                                        <div class="box_topic"><?php echo $username ?></div>
                                        
                                        <?php
                                            $results = $conn->query
                                                            ("SELECT * FROM job_register WHERE (job_assign = '$username' AND job_status = '' AND job_cancel = '')
                                                                OR
                                                            (job_assign = '$username' AND job_status = '' AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status IS NULL AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Doing' AND job_cancel = '')
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Ready' AND job_cancel = '')
                                                                OR
                                                            (job_assign = '$username' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                                OR
                                                            (job_assign = '$username' AND job_status IS NULL AND job_cancel = '') ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                            $numRow = "SELECT * FROM job_register WHERE (job_assign = '$username' AND job_status = '' AND job_cancel = '')
                                                            OR
                                                        (job_assign = '$username' AND job_status = '' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = '$username' AND job_status IS NULL AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = '$username' AND job_status = 'Doing' AND job_cancel = '')
                                                            OR
                                                        (job_assign = '$username' AND job_status = 'Doing' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = '$username' AND job_status = 'Ready' AND job_cancel = '')
                                                            OR
                                                        (job_assign = '$username' AND job_status = 'Ready' AND job_cancel IS NULL)
                                                            OR
                                                        (job_assign = '$username' AND job_status IS NULL AND job_cancel = '')";

                                            $numRow_run = mysqli_query($conn, $numRow);
                                            
                                            if ($row_Total = mysqli_num_rows($numRow_run)) {
                                                echo '<h4 style="text-align: -webkit-right;">Total Job: ' . $row_Total . ' </h4>';
                                            }
                                            
                                            $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE username ='$username'");
                                            
                                            while ($data = mysqli_fetch_array($records)) {
                                                if ($data['tech_avai'] == 1) {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id=' . $data['staffregister_id'] . '&tech_avai=0" style="color:red; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                } 
                                                
                                                else {
                                                    echo '<p style="text-align: -webkit-right;"><a href="statusadmin.php?staffregister_id=' . $data['staffregister_id'] . '&tech_avai=1" style="color:#B2BEB5; font-weight: bold; text-decoration:none;">Off</a></p>';
                                                }
                                            }
                                            
                                            $username = str_replace(" ", "", $username);
                                            
                                            while ($row = $results->fetch_assoc()) {
                                        ?>
                                        
                                        <div class="Staff" id="<?php echo $username ?>" data-type_id="<?php echo $row['type_id']; ?>" data-id="<?php echo $row['jobregister_id']; ?>" data-customer_name="<?php echo $row['customer_name']; ?>" data-target="doubleClick-<?php echo $username ?>" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='block'">
                                        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                        <ul class="b" id="draged">
                                            <strong text-align="center"><?php echo $row['job_order_number'] ?></strong>
                                            <li><?php echo $row['job_priority'] ?></li>
                                            <li><?php echo $row['customer_name'] ?></li>
                                            <li><?php echo $row['machine_type'] ?></li>
                                            <li><?php echo $row['job_description'] ?></li>
                                            <li><?php echo $row['job_status'] ?></li>
                                        </ul>
                                        <div class='supports' id='support'> <?php echo $row['support'] ?></div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div id="doubleClick-<?php echo $username ?>" class="modal">
                                <div class="tabStaff">
                                    <!-- Staff Job Info -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>1" checked="checked">
                                    <label for="tabDoing<?php echo $username ?>1" class="tabHeadingStaff">Job Info</label>
                                    <div class="tab" id="StaffJobInfoTab">
                                        <div class="contentStaffJobInfo" style="margin-top: -27px; margin-left: -22px;">
                                            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                                <form action="homeindex.php" method="post">
                                                    <div class="Staff-details <?php echo $username ?>-details"></div>
                                                </form>
                                        </div>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                var type_id = $(this).data('type_id');
                                                var customer_name = $(this).data('customer_name');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobinfoTechnician.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id,
                                                                  type_id: type_id,
                                                            customer_name: customer_name},

                                                    success: function(response) {
                                                        $('.<?php echo $username ?>-details').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Staff Job Assign -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>2">
                                    <label for="tabDoing<?php echo $username ?>2" class="tabHeadingStaff">Job Assign</label>
                                    <div class="tab">
                                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                        <form action="AdminHomepageJobassignAsisstant.php" method="post">
                                            <div class="Staff-assign <?php echo $username ?>-assign"></div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageJobassignAsisstant.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.<?php echo $username ?>-assign').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Staff Update Tab -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>3">
                                    <label for="tabDoing<?php echo $username ?>3" class="tabHeadingStaff">Update</label>
                                    <div class="tab" id="StaffJobInfoTab">
                                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                        <form action="AdminHomepageUpdate.php" method="post">
                                            <div class="Stafftechupdate-details <?php echo $username ?>techupdate-details"></div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'AdminHomepageUpdate.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.<?php echo $username ?>techupdate-details').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Staff Accessories Tab -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>4">
                                    <label for="tabDoing<?php echo $username ?>4" class="tabHeadingStaff">Accessories</label>
                                    <div class="tab">
                                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                        <form action="ajaxtabaccessories.php" method="post">
                                            <div class="StaffAcc-details <?php echo $username ?>Acc-details"></div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtabaccessories.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.<?php echo $username ?>Acc-details').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>

                                    <!-- Staff Photo Tab -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>5">
                                    <label for="tabDoing<?php echo $username ?>5" class="tabHeadingStaff">Photo</label>
                                    <div class="tab">
                                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                        <form action="ajaxtechphtoupdt.php" method="post">
                                            <div class="Staff-photo-details <?php echo $username ?>-photo-details"></div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechphtoupdt.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.<?php echo $username ?>-photo-details').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Staff Video Tab -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>6">
                                    <label for="tabDoing<?php echo $username ?>6" class="tabHeadingStaff">Video</label>
                                    <div class="tab">
                                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                        <form action="ajaxtechvideoupdt.php" method="post">
                                            <div class="Staff-video-details <?php echo $username ?>-video-details"></div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'ajaxtechvideoupdt.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.<?php echo $username ?>-video-details').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    
                                    <!-- Staff Report Tab -->
                                    <input type="radio" name="tabDoing<?php echo $username ?>" id="tabDoing<?php echo $username ?>8">
                                    <label for="tabDoing<?php echo $username ?>8" class="tabHeadingStaff">Report</label>
                                    <div class="tab">
                                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-<?php echo $username ?>').style.display='none'">&times</div>
                                        <form action="ajaxreportadmin.php" method="post">
                                            <div class="Staff-report <?php echo $username ?>-report"></div>
                                        </form>
                                    </div>
                                    
                                    <script type='text/javascript'>
                                        $(document).ready(function() {
                                            $('#<?php echo $username ?>').click(function() {
                                                var jobregister_id = $(this).data('id');
                                                
                                                $.ajax({
                                                    url: 'ajaxreportadmin.php',
                                                    type: 'post',
                                                    data: {jobregister_id: jobregister_id},
                                                    
                                                    success: function(response) {
                                                        $('.<?php echo $username ?>-report').html(response);
                                                        $('#doubleClick-<?php echo $username ?>').modal('show');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                                </div>
                                <?php if ($i % 4 == 0 && $i !== $numsofrow) {?>
                            </div>
                        </div>
                        <?php } if ($i == $numsofrow) { ?>
                    </div>
                </div>
                <?php } ?>
                
                <script type="text/javascript">
                    $(document).ready(function() {
                        function closeAllModalsAndRefresh() {
                            $('.modal').modal('hide');
                            location.reload();
                        }
                        
                        $('.modal').on('hidden.bs.modal', function() {
                            closeAllModalsAndRefresh();
                        });
                    });
                </script>
                
                <?php endforeach; ?>   
                <!-- End of staffs modal -->
            </div>
        </div>
        <!-- End of Admin Board Card -->
        </section>
    </main>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
    </body>
    </html>