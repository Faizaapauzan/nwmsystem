<?php
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['staff_position']==""){
  header("location:index.php?pesan=gagal");
  
 }
 ?>

<!DOCTYPE html>

<html lang="en">

<head>
     
 <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Admin Page</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layouttry.css"rel="stylesheet" />
    <link href="css/admin.css"rel="stylesheet" />
    <link href="css/adminhomepage.css"rel="stylesheet" />
    <link href="css/adminboard.css"rel="stylesheet" />
    <!-- <link href="tab.css"rel="stylesheet" /> -->

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">




</head>
 <body>

    <!--Home navigation-->

    <div class="sidebar">
            <div class="logo-details">
                <i class='bx bx-window-alt'></i>
            <span class="logo_name">NWM System</span>
            </div>
        </a>
        
        <ul class="nav-links">
               <li>
                <a href="jobregister.php">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
            </li>

             <li>
                <a href="accessoriesregister.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="link_name">Job Accessories</span>
                </a>
            </li>
           
            <li>
                <a href="staff.php">
                    <i class="bx bxs-id-card"></i>
                    <span class="link_name">Staff</span>
                </a>
            </li>

            <li>
                <a href="technicianlist.php">
                    <i class="fa fa-users"></i>
                    <span class="link_name">Technician</span>
                </a>
            </li>

            <li>
                <a href="customer.php">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Customers</span>
                </a>
            </li>

            <li>
                <a href="machine.php">
                    <i class="bx bxl-medium-square"></i>
                    <span class="link_name">Machine</span>
                </a>
            </li>

            <li>
                <a href="accessories.php">
                    <i class="bx bx-wrench"></i>
                    <span class="link_name">Accessories</span>
                </a>
            </li>

            <li>
                <a href="jobtype.php">
                    <i class="bx bx-briefcase"></i>
                    <span class="link_name">Job Type</span>
                </a>
            </li>

                <li>
                <a href="jobcompleted.php">
                    <i class="fa fa-check-square-o"></i>
                    <span class="link_name">Completed Job</span>
                </a>
            </li>

            <li>
                <a href="jobcanceled.php">
                    <i class="fa fa-minus-square"></i>
                    <span class="link_name">Canceled Job</span>
                </a>
            </li>

            <li>
                <a href="report.php">
                    <i class='bx bxs-report' ></i>
                    <span class="link_name">Report</span>
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
            </li>
            
        </ul>
    </div>
    
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn' ></i>
            <button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="btn-reset" onclick="document.location='Adminhomepage.php'" ondblclick="document.location='adminjoblisting.php'">Home</button>
                <!-- <a href="Adminhomepage.php"> -->
                    <!-- <span class="dashboard" onclick="document.getElementById('doubleClick-Pending').style.display='none'">Home</span> -->
                <!-- </a> -->
                 <!-- <a href="adminjoblisting.php">
                    <span class="dashboard">Job Listing</span>
                </a> -->
            </div>

            <div class="notification-button">
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
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

        <div class="welcome">Welcome <?php echo $_SESSION["username"] ?> !</div>

        <div class="home-content">
        <div class="overview-boxes">

        <!-- Job Listing -->

            <div class="box" id="myModal">
                <div class="left-side">
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
            </div>
        
        <!-- Job Listing -->

        <!-- Storekeeper -->

            <div class="box" id="myModal">
                <div class="left-side">
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

        <!-- Technician -->
            
            <?php
                include 'dbconnect.php';
                
                $result = $conn->query("SELECT job_assign, jobregister_id, jobregisterlastmodify_at,
                                        GROUP_CONCAT(CONCAT_WS('<ul><li></li></ul>',job_order_number, job_priority, customer_name, machine_type, job_description, job_status)) as technicianinfo
                                        FROM tech_joblist
                                        WHERE job_status = '' OR job_status = 'Doing' OR job_status = 'Incomplete' OR job_status = 'Ready' OR  job_status = 'Pending'
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
                        echo"<div class='Boon' data-id='" . $jobregister_id . "' data-target='doubleClick-Boon'  ondblclick='document.getElementById('doubleClick-Boon').style.display='block''>
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

            <div id="doubleClick-Boon" class="modal">
            <div class="tabBoon">
            <input type="radio" name="tabDoingBoon" id="tabDoingBoon1" checked="checked">
            <label for="tabDoingBoon1" class="tabHeadingBoon"> Job Info </label>
            <div class="tab" id="BoonJobInfoTab">
            <div class="contentBoonJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
            <form action="homeindex.php" method="post">
            <div class="boon-details">


                    </div>
                    </form>
                    </div>
                    </div>
                    
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

        <!--Technician Update Tab-->
        
                    <input type="radio" name="tabDoingBoon" id="tabDoingBoon2">
                    <label for="tabDoingBoon2" class="tabHeadingBoon">Update</label>
                    <div class="tab" id="BoonJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                        <form action="ajaxtechupdateadmin.php" method="post">
                            <div class="boon-update">

                            </div>
                        </form>
                    </div>

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

        <!--Technician Remark Tab-->
        
                    <input type="radio" name="tabDoingBoon" id="tabDoingBoon3">
                    <label for="tabDoingBoon3" class="tabHeadingBoon"> Remarks </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                        <form action="ajaxremarks.php" method="post">
                            <div class="boon-remarks">
                            
                        </div>
                        </form>
                    </div>

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

        <!--Technician Accessories Tab-->

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

        <!--Technician Media Tab-->

                    <input type="radio" name="tabDoingBoon" id="tabDoingBoon5">
                    <label for="tabDoingBoon5" class="tabHeadingBoon"> Media </label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Boon').style.display='none'">&times</div>
                        <form action="ajaxtechphtoupdt.php" method="post">
                            <div class="boon-photos">

                            </div>
                        </form>
                    </div>
                    
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

        <!-- Technician Popup Modal -->

        <!-- Technician -->

        </div>

        <div class="overview-boxes" >

        <!-- Pending -->

            <div class="box" id="myModal">
                <div class="left-side">
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
            </div>

        <!-- Pending Popup Modal -->

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
                             $('body').on('click','.Pending',function(){     
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
                                $('body').on('click','.Pending',function(){ 
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

            <!-- Pending Remark Tab -->
            
                    <input type="radio" name="tabDoingPending" id="tabDoingPending3">
                    <label for="tabDoingPending3" class="tabHeadingPending">Remarks</label>
                    <div class="tab" id="PendingJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-Pending').style.display='none'">&times</div>
                        <form action="ajaxremarks.php" method="post">
                            <div class="pending-remark">

                            </div>
                        </form>
                    </div>

                        <script type='text/javascript'>
                            $(document).ready(function () {
                             $('body').on('click','.Pending',function(){ 
                                    var jobregister_id = $(this).data('id');
                                    // AJAX request
                                    $.ajax({
                                        url: 'ajaxremarks.php',
                                        type: 'post',
                                        data: { jobregister_id: jobregister_id },
                                        success: function (response) {
                                            // Add response in Modal body
                                            $('.pending-remark').html(response);
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
                            $('body').on('click','.Pending',function(){ 
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

            <!-- Pending Media Tab -->

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
                            $('body').on('click','.Pending',function(){ 
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
                            $('body').on('click','.Pending',function(){ 
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

        <!-- Pending Popup Modal -->

        <!-- Pending -->

        <!-- Incomplete -->

            <div class="box" id="myModal">
                <div class="left-side">
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
                            $('body').on('click','.Incomplete',function(){ 
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
                            $('body').on('click','.Incomplete',function(){ 
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
                            $('body').on('click','.Incomplete',function(){ 
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
                            $('body').on('click','.Incomplete',function(){ 
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

            <!-- Incomplete Media Tab -->

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
                            $('body').on('click','.Incomplete',function(){ 
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
                            $('body').on('click','.Incomplete',function(){ 
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
                            $('body').on('click','.todo',function(){ 
                        
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
                                
                                $('body').on('click','.todo',function(){ 
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

    

<script>
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function(){
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
        sidebar.classList.replace("bx-menu","bx-menu-alt-right")
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right","bx-menu");
}
</script>

</body>

</html>