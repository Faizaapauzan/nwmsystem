<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>NWM Job of The Day</title>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
   
    <link href="css/adminjoblistinghomepage.css" rel="stylesheet" />
    <link href="css/adminjoblisting.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
    #auto { counter-reset: rowNumber; }

    #auto tr td:first-child { counter-increment: rowNumber; }

    #auto tr td:first-child::before { content: counter(rowNumber); }
</style>

<body>
    
    <!-- Sidebar Navigation -->
    <div class="sidebar close">
        <div class="logo-details">
            <img src="neo.png" height="65" width="75"></img>
            <span class="logo_name">NWM SYSTEM</span>
        </div>
        
        <div class="welcome" style="color: white; text-align: center; font-size:small;">Hi  <?php echo $_SESSION["username"] ?>!</div>
        
        <ul class="nav-links">
            <li><a href="jobregister.php">
                <i class='bx bx-registered'></i>
                <span class="link_name">Register Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobregister.php">Register Job</a></li>
                </ul>
            </li>
            
            <li>
                <div class="iocn-link">
                    <a href="attendanceadmin.php">
                        <i class='bx bx-calendar-check'></i><span class="link_name">Attendance</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="attendanceadmin.php">Attendance</a></li>
                </ul>
            </li>
            
            <li>
                <div class="iocn-link">
                    <a href="staff.php">
                        <i class='bx bx-id-card'></i><span class="link_name">Staff</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="staff.php">Staff</a></li>
                </ul>
            </li>
            
            <li>
                <a href="technicianlist.php">
                    <i class='fa fa-users'></i><span class="link_name">Technician</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="technicianlist.php">Technician</a></li>
                </ul>
            </li>
            
            <li>
                <a href="customer.php">
                    <i class='bx bx-user'></i><span class="link_name">Customers</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="customer.php">Customers</a></li>
                </ul>
            </li>
            
            <li>
                <div class="iocn-link">
                    <a href="machine.php">
                        <i class='fa fa-medium'></i><span class="link_name">Machine</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="machine.php">Machine</a></li>
                </ul>
            </li>
            
            <li>
                <a href="accessories.php">
                    <i class='bx bx-wrench'></i><span class="link_name">Accessories</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="accessories.php">Accessories</a></li>
                </ul>
            </li>
            
            <li>
                <a href="jobtype.php">
                    <i class='bx bx-briefcase'></i><span class="link_name">Job Type</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobtype.php">Job Type</a></li>
                </ul>
            </li>
            
            <li>
                <a href="jobcompleted.php">
                    <i class='fa fa-check-square-o'></i><span class="link_name">Completed Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobcompleted.php">Compeleted Job</a></li>
                </ul>
            </li>
            
            <li>
                <a href="jobcanceled.php">
                    <i class='fa fa-minus-square'></i><span class="link_name">Canceled Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobcanceled.php">Canceled Job</a></li>
                </ul>
            </li>
            
            <li>
                <a href="">
                    <i class='bx bxs-report'></i><span class="link_name">Report</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminreport.php">Admin Report</a></li>
                    <li><a class="link_name" href="report.php">Service Report</a></li>
                </ul>
            </li>
            
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i><span class="link_name">Logout</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar Navigation -->
    
    <section class="home-section">
        <!-- Home button -->
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <a>
                    <button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="btn-reset" onclick="document.location='Adminhomepage.php'" ondblclick="document.location='adminjoblisting.php'">Home</button>
                </a>
            </div>
        </nav>
        <!-- End of Home button -->
        
        <div class="machineList" style="margin-top: 27px; margin: 20px;">
            <h1>Job of The Day</h1>
            <br/>
            
            <!-- Incomplete Job -->
            <?php
                
                include 'dbconnect.php';
                
                $numRow = "SELECT * FROM job_register WHERE job_status = 'Incomplete' 
                           AND (job_cancel = '' OR job_cancel IS NULL) LIMIT 50";
                
                $numRow_run = mysqli_query ($conn,$numRow);
                
                if ($row_Total = mysqli_num_rows($numRow_run)) {
                    echo '<b>Incomplete Job - '.$row_Total.'</b>';
                }
                
                else {
                    echo '<b>Incomplete Job - No Data</b>';
                }
            ?>

            <br/>
            <br/>
            <table class="table table-bordered" id="auto" style="box-shadow:none; border-color: black; background-color:#ffffff;">
                <thead style="box-shadow:none;">
                    <tr>
                        <th style="border-color: black;"></th>
                        <th style="border-color: black;">Leader</th>
                        <th style="border-color: black;">Place</th>
                        <th style="border-color: black;">Machine</th>
                        <th style="border-color: black;">Reason</th>
                        <th style="border-color: black;">Last Update Date</th>
                    </tr>
                </thead>

                    <?php
                        include 'dbconnect.php';
                        
                        $results = $conn->query("SELECT * FROM job_register WHERE job_status = 'Incomplete' AND (job_cancel = '' OR job_cancel IS NULL)
                                                 ORDER BY job_register.job_assign ASC, job_register.jobregisterlastmodify_at DESC LIMIT 50");
                    
                        while($row = $results->fetch_assoc()) {
                          
                            $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
                            $datemodify = substr($jobregisterlastmodify_at,0,11); 
                    ?>
                
                <tbody>
                    <tr>
                        <td style="border-color: black;"></td>
                        <td style="border-color: black;" 
                            id="<?php echo $row["jobregister_id"]; ?>"
                            data-id="<?php echo $row['jobregister_id'];?>"
                            data-idlagi="<?php echo $row['job_assign'];?>"
                            class = '<?php echo $row["jobregister_id"];?>' 
                            onClick="document.getElementById('doubleClick-info').style.display='block'">
                            <p style="text-decoration: none; text-align: center;" 
                               data-id="<?php echo $row['jobregister_id'];?>" 
                               data-idlagi="<?php echo $row['job_assign'];?>"
                               class = 'JobInfo'><?php echo $row["job_assign"]; ?>
                            </p>
                        </td>
                        <td style="border-color: black;"><?php echo $row['customer_name']?></td>
                        <td style="border-color: black;"><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                        <td style="border-color: black;"><?php echo $row['reason']?></td>
                        <td style="border-color: black;"><?php echo $datemodify ?></td>
                    </tr>
                </tbody>
                    
                    <?php } ?>

            </table>
            <!-- End of Incomplete Job -->

            <!-- Pending Job -->
            <?php
                
                include 'dbconnect.php';
                
                $numRow = "SELECT * FROM job_register WHERE job_status = 'Pending'
                           AND (job_cancel = '' OR job_cancel IS NULL) LIMIT 50";
                
                $numRow_run = mysqli_query ($conn,$numRow);
                
                if ($row_Total = mysqli_num_rows($numRow_run)) {
                    echo '<b>Pending Job - '.$row_Total.'</b>';
                }
                
                else {
                    echo '<b>Pending Job - No Data</b>';
                }
            ?>

            <br/>
            <br/>
            <table class="table table-bordered" id="auto" style="box-shadow:none; border-color: black; background-color:#ffffff;">
                <thead style="box-shadow:none;">
                    <tr>
                        <th style="border-color: black;"></th>
                        <th style="border-color: black;">Leader</th>
                        <th style="border-color: black;">Place</th>
                        <th style="border-color: black;">Machine</th>
                        <th style="border-color: black;">Reason</th>
                        <th style="border-color: black;">Last Update Date</th>
                    </tr>
                </thead>

                    <?php
                        include 'dbconnect.php';
                        
                        $results = $conn->query("SELECT * FROM job_register WHERE job_status = 'Pending' AND (job_cancel = '' OR job_cancel IS NULL)
                                                 ORDER BY job_register.job_assign ASC, job_register.jobregisterlastmodify_at DESC LIMIT 50");
                    
                        while($row = $results->fetch_assoc()) {
                          
                            $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
                            $datemodify = substr($jobregisterlastmodify_at,0,11); 
                    ?>

                <tbody>
                    <tr>
                        <td style="border-color: black;"></td>
                        <td style="border-color: black;" 
                            id="<?php echo $row["jobregister_id"]; ?>"
                            data-id="<?php echo $row['jobregister_id'];?>"
                            data-idlagi="<?php echo $row['job_assign'];?>"
                            class = '<?php echo $row["jobregister_id"];?>' 
                            onClick="document.getElementById('doubleClick-info').style.display='block'">
                            <p style="text-decoration: none; text-align: center;" 
                               data-id="<?php echo $row['jobregister_id'];?>" 
                               data-idlagi="<?php echo $row['job_assign'];?>"
                               class = 'JobInfo'><?php echo $row["job_assign"]; ?>
                            </p>
                        </td>
                        <td style="border-color: black;"><?php echo $row['customer_name']?></td>
                        <td style="border-color: black;"><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                        <td style="border-color: black;"><?php echo $row['reason']?></td>
                        <td style="border-color: black;"><?php echo $datemodify ?></td>
                    </tr>
                </tbody>

                    <?php } ?>

            </table>
            <!-- End of Pending Job -->

            <!-- Planned Job -->
            <?php
                
                include 'dbconnect.php';
                
                $numRow = "SELECT * FROM job_register WHERE job_assign IS NOT NULL AND TRIM(job_assign) != ''
                           AND (job_cancel IS NULL OR job_cancel = ' ')
                           AND (job_status = '' OR job_status IS NULL OR job_status = 'Doing')
                           LIMIT 50;";
                
                $numRow_run = mysqli_query ($conn,$numRow);
                
                if ($row_Total = mysqli_num_rows($numRow_run)) {
                    echo '<b>Planned Job For The Day - '.$row_Total.'</b>';
                }
                
                else {
                    echo '<b>Planned Job For The Day - No Data</b>';
                }
            ?>

            <br/>
            <br/>
            <table class="table table-bordered" id="auto" style="box-shadow:none; border-color: black; background-color:#ffffff;">
                <thead style="box-shadow:none;">
                    <tr>
                        <th style="border-color: black;"></th>
                        <th style="border-color: black;">Leader</th>
                        <th style="border-color: black;">Place</th>
                        <th style="border-color: black;">Machine</th>
                        <th style="border-color: black;">Status</th>
                    </tr>
                </thead>

                    <?php
                        include 'dbconnect.php';
                        
                        $results = $conn->query("SELECT * FROM job_register WHERE job_assign IS NOT NULL AND TRIM(job_assign) != ''
                                                 AND (job_cancel IS NULL OR job_cancel = ' ')
                                                 AND (job_status = '' OR job_status IS NULL OR job_status = 'Doing')
                                                 ORDER BY job_assign ASC, jobregisterlastmodify_at DESC LIMIT 50");
                    
                        while($row = $results->fetch_assoc()) {
                    ?>

                <tbody>
                    <tr>
                        <td style="border-color: black;"></td>
                        <td style="border-color: black;" 
                            id="<?php echo $row["jobregister_id"]; ?>"
                            data-id="<?php echo $row['jobregister_id'];?>"
                            data-idlagi="<?php echo $row['job_assign'];?>"
                            class = '<?php echo $row["jobregister_id"];?>' 
                            onClick="document.getElementById('doubleClick-info').style.display='block'">
                            <p style="text-decoration: none; text-align: center;" 
                               data-id="<?php echo $row['jobregister_id'];?>" 
                               data-idlagi="<?php echo $row['job_assign'];?>"
                               class = 'JobInfo'><?php echo $row["job_assign"]; ?>
                            </p>
                        </td>
                        <td style="border-color: black;"><?php echo $row['customer_name']?></td>
                        <td style="border-color: black;"><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                        <td style="border-color: black;"><?php echo $row['job_status']?></td>
                    </tr>
                </tbody>

                    <?php } ?>

            </table>
            <!-- End of Planned Job -->

            <!-- Unplanned Job -->
            <?php
                
                include 'dbconnect.php';
                
                $numRow = "SELECT * FROM job_register WHERE
                
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
                
                LIMIT 50";
                
                $numRow_run = mysqli_query ($conn,$numRow);
                
                if ($row_Total = mysqli_num_rows($numRow_run)) {
                    echo '<b>Unplanned Job For The Day - '.$row_Total.'</b>';
                }
                
                else {
                    echo '<b>Unplanned Job For The Day - No Data</b>';
                }
            ?>

            <br/>
            <br/>
            <table class="table table-bordered" id="auto" style="box-shadow:none; border-color: black; background-color:#ffffff;">
                <thead style="box-shadow:none;">
                    <tr>
                        <th style="border-color: black;"></th>
                        <th style="border-color: black;">Leader</th>
                        <th style="border-color: black;">Place</th>
                        <th style="border-color: black;">Machine</th>
                        <th style="border-color: black;">Status</th>
                    </tr>
                </thead>

                    <?php
                        include 'dbconnect.php';
                        
                        $results = $conn->query("SELECT * FROM job_register WHERE
                        
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
                        
                        ORDER BY job_assign ASC, jobregisterlastmodify_at DESC LIMIT 50");
                    
                        while($row = $results->fetch_assoc()) {
                    ?>

                <tbody>
                    <tr>
                        <td style="border-color: black;"></td>
                        <td style="border-color: black;"><?php echo $row['job_assign']?></td>
                        <td style="border-color: black;" 
                            id="<?php echo $row["jobregister_id"]; ?>"
                            data-id="<?php echo $row['jobregister_id'];?>"
                            data-idlagi="<?php echo $row['job_assign'];?>"
                            class = '<?php echo $row["jobregister_id"];?>' 
                            onClick="document.getElementById('doubleClick-info').style.display='block'">
                            <p style="text-decoration: none; text-align: center;" 
                               data-id="<?php echo $row['jobregister_id'];?>" 
                               data-idlagi="<?php echo $row['job_assign'];?>"
                               class = 'JobInfo'><?php echo $row["customer_name"]; ?>
                            </p>
                        </td>
                        <td style="border-color: black;"><?php echo $row['machine_type']?> - <?php echo $row['job_description']?></td>
                        <td style="border-color: black;"><?php echo $row['job_status']?></td>
                    </tr>
                </tbody>

                    <?php } ?>

            </table>
            <!-- End of Unplanned Job -->
        </div>
    </section>

    <!-- Job Listing Pop Up Modal -->
    <div id="doubleClick-info" class="modal">
        <div class="tabInfo">
            <input type="radio" name="tabDoingInfo" id="tabDoingInfo1" checked="checked">
            <label for="tabDoingInfo1" class="tabHeadingInfo">Job Info</label>
            <div class="tab" id="JobInfoTab">
                <div class="contentJobInfo">
                    <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                    <form action="homeindex.php" method="post">
                        <div class="info-details">

                        </div>
                    </form>
                </div>
            </div>
                    
            <script type='text/javascript'>
                $(document).ready(function () {
                    $('body').on('click','.JobInfo',function() {
                        var jobregister_id = $(this).data('id');
                        $.ajax({
                            url: 'AdminJoblistingJobinfo.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},
                            success: function (response) {
                                $('.info-details').html(response);
                                $('#doubleClick-info').modal('show');
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
    <!-- End of Job Listing Pop Up Modal -->
    
    <script>
        let arrow = document.querySelectorAll(".arrow");
        
        for (var i = 0; i < arrow.length; i++) {
                arrow[i].addEventListener("click", (e)=> {
                        let arrowParent = e.target.parentElement.parentElement;
                        arrowParent.classList.toggle("showMenu");
                    });
        }
        
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=> {
                sidebar.classList.toggle("close");
        });
    </script>

</body>
</html>