<?php

    session_start();

    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");
    }

    if (!isset($_SESSION['username'])) {
        header("location: index.php?error=login");
    } elseif ($_SESSION['staff_position'] != 'Admin' && $_SESSION['staff_position'] != 'Manager') {
        header("location: index.php?error=permission");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    <title>Admin Homepage</title>

    <!--========== CSS ==========-->
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="css/homepage.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/adminboard.css" rel="stylesheet" />
    <link href="css/admin.css" rel="stylesheet" />
    <link href="css/adminhomepageAUTO.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!--========== JS ==========-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

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

    .dropdown:hover .dropbtn {
        color: #f5f5f5
    }

    .dropdown1:hover .dropbtn1 {
        color: #f5f5f5
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown-content1 a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block
    }

    .dropdown1:hover .dropdown-content1 {
        display: block
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: auto;
        padding-left: 20px;
        bottom: 55px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, .2);
        z-index: 1
    }

    .dropdown-content1 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, .2);
        padding: 12px 16px;
        z-index: 1
    }

    .dropdown-content a {
        color: #000;
        padding: 10px 10px;
        text-decoration: none;
        display: block;
        padding-right: 7px
    }

    .dropdown-content1 a {
        color: #000;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        padding-right: 7px
    }

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

    @media (min-width: 769px) {
        .mobile-view {
            display: none;
        }
    }

    /* Styles for phone and smaller screens */
    @media (max-width: 768px) {
        .mobile-view {
            display: block;
            position: relative;
            top: -10px;
        }

        .dropdown-content1 {
            display: none;
        }

        .dropdown1:hover .dropdown-content1 {
            display: none;
        }
    }

    .mobile-view a {
        color: black;
        margin-left: 10px;
    }
</style>
</head>

<body>
    <!--========== HEADER ==========-->
    <header class="header">
        <div class="header__container">
            <div class="header__search">
                <div class="dropdown1">
                    <a href="Adminhomepage.php" style="font-weight: bold; font-size:25px; color:black;">Home</a>
                    <div class="dropdown-content1">
                        <a href="AdminJobTable.php">Job - Table view</a>
                        <a href="adminjoblisting.php">Job - List View</a>
                    </div>
                </div>
            </div>

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>

        <div class="mobile-view">
            <a href="AdminJobTable.php">Table View</a>
            <a href="adminjoblisting.php">List View</a>
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
                            <i class='bx bx-folder-plus nav__icon'></i>
                            <span class="nav__name">New Job</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="staff.php" class="nav__link">
                                <i class='bx bx-group nav__icon'></i>
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
                            <i class='bx bx-buildings nav__icon'></i>
                            <span class="nav__name">Customer</span>
                        </a>

                        <a href="machine.php" class="nav__link">
                            <i class='bx bx-cog nav__icon'></i>
                            <span class="nav__name">Machine</span>
                        </a>

                        <a href="accessories.php" class="nav__link">
                            <i class='bx bx-wrench nav__icon'></i>
                            <span class="nav__name">Accessory</span>
                        </a>

                        <a href="jobtype.php" class="nav__link">
                            <i class='bx bx-highlight nav__icon'></i>
                            <span class="nav__name">Job Type</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-file nav__icon'></i>
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
                                <i class='bx bx-task nav__icon'></i>
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
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <!--========== CONTENTS ==========-->
    <!-- Back to top Button -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script>
        var mybutton = document.getElementById("myBtn");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
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
            <div id="staffpopup" class="modal">
                <div class="tabStaff">
                    `<!-- Staff Job Info -->
                    <input type="radio"  id="tabDoing" class="tab-radio" checked="checked">
                    <label for="tabDoing" class="tabHeadingStaff" onclick="openTab('StaffJobInfoTab')">Job Info</label>
                    <div class="tab" id="StaffJobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('staffpopup').style.display='none'">&times</div>
                        <form action="homeindex.php" method="post" style="display: contents;" >
                            <input type="hidden" id="jobregister_idinfo" name="jobregister_id" value="">
                            <input type="hidden" id="support" name="support" value="Support For">
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Job Priority</label>
                                <input type="text" id="job_priority" name="job_priority" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Job Order Number</label>
                                <div style="display: flex;">
                                    <input type="text" class="job_order_number" name="job_order_number" id="job_order_number" value="">
                                    <button type="button" style="border-radius: 5px; color: white;background-color: #081d45;border-color: #081d45;padding-left: 7px;padding-right: 8px; width:auto" onclick="buttonClick();">Click</button>
                                    
                                    <script>
                                        var i = 1;
                                        var jobordernumber2;
                                        
                                        function buttonClick() {
                                            if (i == 1){
                                                var jobordernumber = document.getElementById('job_order_number').value;
                                                jobordernumber2 = jobordernumber;
                                            }
                                            

                                            // Split the existing job order number into parts
                                            var parts = jobordernumber2.split('-');
                                            
                                            
                                            // Increment the number part
                                            var newNumber = parts[parts.length-1] + "-" + i;
                                            var newJobOrderNumber = parts[0];

                                            // Construct the new job order number
                                            for (var j = 1; j < parts.length-1; j++){
                                                newJobOrderNumber = newJobOrderNumber + "-" + parts[j];
                                            }
                                            newJobOrderNumber = newJobOrderNumber + "-" + newNumber;
                                            

                                            // Update the input value
                                            document.getElementById('job_order_number').value = newJobOrderNumber;

                                            i++;
                                        }
                                    </script>

                                </div>
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Job Name</label>
                                <input type="text" id="job_name" name="job_name" value="">
                                <input type="hidden" id="job_code" name="job_code" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Customer Name</label>
                                <select id="custModel" onchange="GetCustomer(this.value)">
                                    <option value=""></option> 
                                    
                                    <?php
                                        include "dbconnect.php";
                                        $records = mysqli_query($conn, "SELECT customer_id, customer_code, customer_name From customer_list ORDER BY customerlasmodify_at ASC");  // Use select query here
                                        while($data = mysqli_fetch_array($records))
                                        {
                                            echo "<option value='". $data['customer_id'] ."'>" . $data['customer_name']."</option>";  // displaying data in option menu
                                        }
                                    ?>

                                </select>
                                <input type="hidden" id="cust" name="customer_id" onchange="GetCustomer(this.value)" readonly>
                                <input type="hidden" id="customer_code" name="customer_code" value="" readonly>
                                <input type="hidden" id="customer_name" name="customer_name" value="" readonly>
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Job Description</label>
                                <input type="text" id="job_description" name="job_description" value="">
                            </div>

                            <div class="input-box" style="width: 50%;">
                                <label for="">Assign Date</label>
                                <input type="text" id="DateAssign" name="DateAssign" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Delivery date</label>
                                <input type="date" id="delivery_date" name="delivery_date" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Requested date</label>
                                <input type="date" id="requested_date" name="requested_date" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Customer Grade</label>
                                <input type="text" id="customer_grade" name="customer_grade" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Customer PIC</label>
                                <input type="text" id="customer_PIC" name="customer_PIC" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Contact Number 1</label>
                                <input type="text" id="cust_phone1" name="cust_phone1" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="">Contact Number 2</label>
                                <input type="text" id="cust_phone2" name="cust_phone2" value="">
                            </div>
                            
                            <div class="input-box" style="width: 100%;">
                                <label for="">Customer Address</label>
                                <input type="text" id="cust_address1" name="cust_address1" value="">
                                <input type="text" style="width: calc(100% / 2 - 2.5px);" id="cust_address2" name="cust_address2" value="">
                                <input type="text" style="width: calc(100% / 2 - 2.5px);" id="cust_address3" name="cust_address3" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="brand">Machine Brand</label>
                                <input type="text" id="brandname" name="machine_brand" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="type">Machine Type</label>
                                <input type="text" id="type_name" name="machine_type" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="sn">Serial Number</label>
                                <select id="serialnumbers" onchange="GetMachines(this.value)">
                                    <option value=""></option> 

                                </select>
                                <input type="hidden" id="machine_id" name="machine_id" value="">
                                <input type="hidden" id="serialnumber" name="serialnumber" value="">
                                <input type="hidden" id="machine_code" name="machine_code" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="accessories_required">Accessories Required</label>
                                <select id="accessories_required" name="accessories_required">
                                    <option value=''></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            
                            <div class="input-box" style="width: 100%;">
                                <label for="">Machine Name</label>
                                <input type="text" id="machine_name" name="machine_name" value="">
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="job_cancel">Cancel Job:</label>
                                <select type="text" id="job_cancel" name="job_cancel">
                                    <option value=''></option>
                                    <option value='YES'>YES</option>
                                </select>
                            </div>
                            
                            <div class="input-box" style="width: 50%;">
                                <label for="job_status">Job Status:</label>
                                <select type="text" id="job_status" name="job_status" onchange="myFunction()">
                                    <option value='' ></option>
                                    <option value='Doing'>Doing</option>
                                    <option value='Pending'>Pending</option>
                                    <option value='Incomplete'>Incomplete</option>
                                    <option value='Completed'>Completed</option>
                                </select>
                            </div>
                            
                            <!--PENDING & INCOMPLETE REASON-->
                            <div id="reasonInput" class="input-box" style="width: 100%;">
                                <label for="reason">Reason</label>
                                <input type="text" id="reason" name="reason" value="">
                            </div>
                            </br>
                            
                            <script>
                                function myFunction() {
                                    var jobStatus = document.getElementById("job_status").value;
                                    var reasonDiv = document.getElementById("reasonInput");
                                    if (jobStatus === "Pending" || jobStatus === "Incomplete") {
                                        reasonDiv.style.display = "block";
                                    } else {
                                        reasonDiv.style.display = "none";
                                    }
                                }
                                // Call the function once to set the initial state of the "reason" div
                                myFunction();
                            </script>
                            <!--PENDING & INCOMPLETE END REASON-->
                            
                            <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="" readonly>
                            
                            <div class="DuplicateUpdateButton" style="display: inline-flex; width: 100%;">
                                <button type="submit" id="submit" name="update">Update</button></n>
                                <button type="button" style="background-color: #f43636 ;" id="duplicate" name="duplicate" value="duplicate" onclick="submitFormSupportAdmin();">Support</button>
                            </div>
                            
                            <p class="control"><b id="messageSupportAdmin"></b></p>
                        </form>
                    </div>


                    <!-- Staff Job Assign -->
                    <input type="radio" class="tab-radio" id="tabDoing2">
                    <label for="tabDoing2" class="tabHeadingStaff" onclick="openTab('JobAssignTab')">Job Assign</label>
                    <div class="tab" id="JobAssignTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('staffpopup').style.display='none'">&times</div>
                        <form id="assignupdate_form" method="post">
                            <input type="hidden" name="jobregister_id" class="jobregister_id" id="jobregister_id2" value="">
                            
                            <label for="job_assign" style="padding-left: 20px;" class="job_assign">Job Assign to:</label><br />
                            
                            <div class="input-box" style="display:flex; width: 100%">
                                <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)">
                                    <option value=""></option> 
                                        
                                        <?php
                                            include "dbconnect.php";
                                            
                                            $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE 
                                                                            technician_rank = '1st Leader' AND tech_avai = '0'
                                                                                OR
                                                                            technician_rank = '2nd Leader' AND tech_avai = '0'
                                                                                OR
                                                                            staff_position='Storekeeper' AND tech_avai = '0' ORDER BY staffregister_id ASC");  // Use select query here
                                            echo "<option></option>";
                                            
                                            while($data = mysqli_fetch_array($records))
                                                {echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." </option>";}	
                                        ?> 
                                    
                                    <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
                                    <input type="hidden" name="job_assign" id='username' value="">
                                    <input type="hidden" name="technician_rank" id='technician_rank' value="" readonly>
                                    <input type="hidden" name="staff_position" id='staff_position' value="" readonly>
                                </select> 
                                
                                <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION['username']?>" readonly>
                                <input type="button" style="color: white; background-color: #081d45; height: 46px; margin-top: -1px;  padding-left: 2px; width: 145px;" class="btn btn-primary" id="technicianassign" name="technicianassign" value="Update" />
                            </div>
                            <p style="padding-left: 20px;"><b id="assignupdateadminmessage"></b></p>
                        </form>

                        <form class="form" id="adminassistant_form" method="post" style="margin-left: 20px;">
                            <input type="hidden" name="jobregister_id" id="jobregister_id3" value="">
                            <input type="hidden" name="ass_date" id="ass_date" value="">
                            <input type="hidden" name="techupdate_date" id="techupdate_date" value="">
                            <input type="hidden" name="tech_leader" id="tech_leader" value="">
                            <input type="hidden" name="cust_name" id="cust_name" value="">
                            <input type="hidden" name="requested_date" id="requested_date2" value="">
                            <input type="hidden" name="machine_name" id="machine_name2" value="">
                            
                            <div id="multipleassist"> 
                                <label for="assistant">Select Assistant :</label>
                                <table id="selectedassistant" style="margin-top: 10px; margin-bottom:20px; margin-right:30px; box-shadow: none; background-color:#FFFFFF;">
                                    <tbody> 
                                    </tbody>
                                </table>
                                
                                <div class="input-box" style="width:100%">
                                    <select name="username[]" class="multiple-assistant" multiple="multiple" style="height: max-content; margin-left:-17px;"> 
                                        
                                        <?php
                                            $query = "SELECT * FROM staff_register 
                                                    WHERE staff_group = 'Technician' AND tech_avai = '0' 
                                                    ORDER BY staffregister_id ASC";
                                            
                                            $query_run = mysqli_query($conn, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach ($query_run as $rowstaff) {
                                        ?> 
                                        
                                        <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option> 
                                        
                                        <?php } } else {echo "No Record Found";} ?> 
                                        
                                    </select>
                                    
                                    <script>
                                        $("#multipleassist").on('change', function() {
                                            $(".multiple-assistant").select2({});
                                        });
                                    </script>
                                </div>
                                
                                <div class="buttonUpdate" style="display: flex;flex-direction: row-reverse;"> 
                                    <input type="hidden" name="jobregisterlastmodify_by2" id="jobregisterlastmodify_by2" value="<?php echo $_SESSION['username']?>" readonly>
                                        <div>
                                            <p class="control"><b id="assignadminmessage"></b></p>
                                        </div>
                                    <input type="button" style="color: white;background-color: #081d45;height: 36px;margin-top: 33px; width: 100px; border-radius: 9px;" id="updateassign" name="updateassign" value="Update"/>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Staff Update Tab -->
                    
                    <!-- Staff Accessories Tab -->

                    <!-- Staff Photo Tab -->

                    <!-- Staff Video Tab -->

                    <!-- Staff Report Tab -->

                </div>
            </div>


            <div class="w3-quarter">
                <div class="overview-boxes">
                    <!-- Employee Modal Box -->
                    <?php
                        include 'dbconnect.php';
                        
                        $results = $conn->query("SELECT * FROM staff_register WHERE staff_position='Leader' ORDER BY username ASC");
                        
                        $numsofrow = mysqli_num_rows($results);
                        $employees = [];
                        $i = 0;
                        
                        while ($row = $results->fetch_assoc()) {
                            $employees[] = $row;
                        }
                        foreach ($employees as $employee) :
                            $i++;
                            $username = $employee['username'];
                                
                            // Start Building Technician Card
                            if ($i % 4 == 1) {
                                echo '<div class="">';
                                echo '<div class="row">';
                            }
                    ?>  

                    <div class="box">
                        <div class="left-side">
                            <div class="box_topic"><?php echo $username ?></div>
                                <?php
                                    $results = $conn->query("SELECT * FROM job_register WHERE (job_assign = '$username' AND job_status = '' AND job_cancel = '')
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

                                <div class="Staff staff-card" id="<?php echo $username ?>" data-type_id="<?php echo $row['type_id']; ?>" data-id="<?php echo $row['jobregister_id']; ?>" data-customer_name="<?php echo $row['customer_name']; ?>" onclick="openPopup('staffpopup')">
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

                    <?php
                            // Finish Building Technician Card
                            if ($i % 4 == 0 && $i !== $numsofrow) { 
                                echo '</div>';
                                echo '</div>';
                            } 
                            if ($i == $numsofrow) { 
                                echo '</div>';
                                echo '</div>';
                            }
                        endforeach;
                    ?>
                </div>
            </div>
            <script type='text/javascript'>
                var job_table;
                // STAFF JOB INFO FUNCTION
                function updateJobInfo(data2){
                    var i;
                    var jobregister_id = document.getElementById('jobregister_idinfo');
                    var support = document.getElementById('support');
                    var job_priority = document.getElementById('job_priority');
                    var job_order_number = document.getElementById('job_order_number');
                    var job_name = document.getElementById('job_name');
                    var job_code = document.getElementById('job_code');
                    var custModel = document.getElementById('custModel');
                    var customer_code = document.getElementById('customer_code');
                    var customer_name = document.getElementById('customer_name');
                    var job_description = document.getElementById('job_description');
                    var assign_date = document.getElementById('DateAssign');
                    var delivery_date = document.getElementById('delivery_date');
                    var requested_date = document.getElementById('requested_date');
                    var customer_grade = document.getElementById('customer_grade');
                    var customer_PIC = document.getElementById('customer_PIC');
                    var cust_phone1 = document.getElementById('cust_phone1');
                    var cust_phone2 = document.getElementById('cust_phone2');
                    var cust_address1 = document.getElementById('cust_address1');
                    var cust_address2 = document.getElementById('cust_address2');
                    var cust_address3 = document.getElementById('cust_address3');
                    var machine_brand = document.getElementById('brandname');
                    var machine_type = document.getElementById('type_name');
                    var serialnumbers = document.getElementById('serialnumbers');
                    var machine_id = document.getElementById('machine_id');
                    var machine_code = document.getElementById('machine_code');
                    var accessories_required = document.getElementById('accessories_required');
                    var machine_name = document.getElementById('machine_name');
                    var job_cancel = document.getElementById('job_cancel');
                    var job_status = document.getElementById('job_status');
                    var reason = document.getElementById('reason');
                    var jobregisterlastmodify_by = document.getElementById('jobregisterlastmodify_by');

                    jobregister_id.value = job_table.jobregister_id;
                    support.value = job_table.job_assign;
                    job_priority.value = job_table.job_priority;
                    job_order_number.value = job_table.job_order_number;
                    job_name.value = job_table.job_name;
                    job_code.value = job_table.job_code;
                    for (i = 0; i < custModel.options.length; i++) {
                        if (custModel.options[i].text === job_table.customer_name) {
                            custModel.options[i].selected = true;
                            break;
                        }
                    }
                    customer_code.value = job_table.customer_code;
                    customer_name.value = job_table.customer_name;
                    customer_grade.value = job_table.customer_grade;
                    customer_PIC.value = job_table.customer_PIC;
                    job_description.value = job_table.job_description;
                    assign_date.value = job_table.DateAssign;
                    delivery_date.value = job_table.delivery_date;
                    requested_date.value = job_table.requested_date;
                    cust_phone1.value = job_table.cust_phone1;
                    cust_phone2.value = job_table.cust_phone2;
                    cust_address1.value = job_table.cust_address1;
                    cust_address2.value = job_table.cust_address2;
                    cust_address3.value = job_table.cust_address3;
                    machine_brand.value = job_table.machine_brand;
                    machine_type.value = job_table.machine_type;
                    machine_id.value = job_table.machine_id;
                    machine_code.value = job_table.machine_code;
                    machine_name.value = job_table.machine_name;
                    for (i = 0; i < data2.length; i++) {
                        addOption(serialnumbers, data2[i]);
                    }
                    for (i = 0; i < serialnumbers.options.length; i++) {
                        if (serialnumbers.options[i].text === job_table.serialnumber) {
                            serialnumbers.options[i].selected = true;
                            break;
                        }
                    }
                    for (i = 0; i < accessories_required.options.length; i++) {
                        if (accessories_required.options[i].text === job_table.accessories_required) {
                            accessories_required.options[i].selected = true;
                            break;
                        }
                    }
                    for (i = 0; i < job_cancel.options.length; i++) {
                        if (job_cancel.options[i].text === job_table.job_cancel) {
                            job_cancel.options[i].selected = true;
                            break;
                        }
                    }
                    for (i = 0; i < job_status.options.length; i++) {
                        if (job_status.options[i].text === job_table.job_status) {
                            job_status.options[i].selected = true;
                            break;
                        }
                    }
                    reason.value = job_table.reason;
                    jobregisterlastmodify_by.value = '<?php echo $_SESSION["username"]?>'
                }

                function addOption(element, data2) {
                    var newOption = document.createElement("option");
                    var serialNumber = data2[7]; 

                    newOption.value = serialNumber;
                    newOption.text = serialNumber;
                    
                    element.appendChild(newOption);
                }

                function GetMachines(str) {
                    if (str.length == 0) {
                        document.getElementById("machine_id").value = "";
                        document.getElementById("serialnumber").value = "";
                        document.getElementById("machine_code").value = "";
                        document.getElementById("machine_name").value = "";
                        return;
                    } 
                    
                    else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var myObj = JSON.parse(this.responseText);
                                document.getElementById("machine_id").value = myObj[0];
                                document.getElementById("serialnumber").value = myObj[1];
                                document.getElementById("machine_code").value = myObj[2];
                                document.getElementById("machine_name").value = myObj[3];
                            }
                        };
                        xmlhttp.open("GET", "fetchmachine.php?serialnumber=" + str, true);
                        xmlhttp.send();
                    }
                }

                function GetCustomer(str) {
                    if (str.length == 0) {
                        document.getElementById("customer_code").value = "";
                        document.getElementById("customer_name").value = "";
                        document.getElementById("customer_grade").value = "";
                        document.getElementById("customer_PIC").value = "";
                        document.getElementById("cust_phone1").value = "";
                        document.getElementById("cust_phone2").value = "";
                        document.getElementById("cust_address1").value = "";
                        document.getElementById("cust_address2").value = "";
                        document.getElementById("cust_address3").value = "";
                        return;
                    } 
                    
                    else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var myObj = JSON.parse(this.responseText);
                                document.getElementById("customer_code").value = myObj[0];
                                document.getElementById("customer_name").value = myObj[1];
                                document.getElementById("customer_grade").value = myObj[2];
                                document.getElementById("customer_PIC").value = myObj[3];
                                document.getElementById("cust_phone1").value = myObj[4];
                                document.getElementById("cust_phone2").value = myObj[5];
                                document.getElementById("cust_address1").value = myObj[6];
                                document.getElementById("cust_address2").value = myObj[7];
                                document.getElementById("cust_address3").value = myObj[8];
                            }
                        };
                        xmlhttp.open("GET", "fetchcustomer.php?customer_id=" + str, true);
                        xmlhttp.send();
                    }
                }
                function submitFormSupportAdmin() {
                    var job_priority = $('input[name=job_priority]').val();
                    var support = $('input[name=support]').val();
                    var job_order_number = $('input[name=job_order_number]').val();
                    var job_name = $('input[name=job_name]').val();
                    var job_code = $('input[name=job_code]').val();
                    var job_description = $('input[name=job_description]').val();
                    var requested_date = $('input[name=requested_date]').val();
                    var delivery_date = $('input[name=delivery_date]').val();
                    var customer_name = $('input[name=customer_name]').val();
                    var customer_code = $('input[name=customer_code]').val();
                    var customer_grade = $('input[name=customer_grade]').val();
                    var cust_address1 = $('input[name=cust_address1]').val();
                    var cust_address2 = $('input[name=cust_address2]').val();
                    var cust_address3 = $('input[name=cust_address3]').val();
                    var customer_PIC = $('input[name=customer_PIC]').val();
                    var cust_phone1 = $('input[name=cust_phone1]').val();
                    var cust_phone2 = $('input[name=cust_phone2]').val();
                    var machine_name = $('input[name=machine_name]').val();
                    var machine_code = $('input[name=machine_code]').val();
                    var machine_type = $('input[name=machine_type]').val();
                    var serialnumber = $('input[name=serialnumber]').val();
                    var machine_id = $('input[name=machine_id]').val();
                    var machine_brand = $('input[name=machine_brand]').val();
                    var accessories_required = $('select[name=accessories_required]').val();
                    var job_cancel = $('select[name=job_cancel]').val();
                    var jobregistercreated_by = $('input[name=jobregistercreated_by]').val();
                    var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
                    
                    if (job_priority != '' || job_priority == '', 
                            support != '' || support == '', 
                    job_order_number != '' || job_order_number == '', 
                            job_name != '' || job_name == '', 
                            job_code != '' || job_code == '', 
                    job_description != '' || job_description == '', 
                    requested_date != '' || requested_date == '', 
                    delivery_date != '' || delivery_date == '', 
                    customer_name != '' || customer_name == '', 
                    customer_code != '' || customer_code == '', 
                    customer_grade != '' || customer_grade == '', 
                    cust_address1 != '' || cust_address1 == '', 
                    cust_address2 != '' || cust_address2 == '', 
                    cust_address3 != '' || cust_address3 == '', 
                        customer_PIC != '' || customer_PIC == '', 
                        cust_phone1 != '' || cust_phone1 == '', 
                        cust_phone2 != '' || cust_phone2 == '', 
                        machine_name != '' || machine_name == '', 
                        machine_code != '' || machine_code == '', 
                        machine_type != '' || machine_type == '', 
                        serialnumber != '' || serialnumber == '', 
                        machine_id != '' || machine_id == '', 
                    machine_brand != '' || machine_brand == '', 
                accessories_required != '' || accessories_required == '', 
                        job_cancel != '' || job_cancel == '', 
            jobregistercreated_by != '' || jobregistercreated_by == '', 
            jobregisterlastmodify_by != '' || jobregisterlastmodify_by == '') 
                    
                    {
                        var formData = {
                            job_priority: job_priority,
                            support: support,
                            job_order_number: job_order_number,
                            job_name: job_name,
                            job_code: job_code,
                            job_description: job_description,
                            requested_date: requested_date,
                            delivery_date: delivery_date,
                            customer_name: customer_name,
                            customer_code: customer_code,
                            customer_grade: customer_grade,
                            cust_address1: cust_address1,
                            cust_address2: cust_address2,
                            cust_address3: cust_address3,
                            customer_PIC: customer_PIC,
                            cust_phone1: cust_phone1,
                            cust_phone2: cust_phone2,
                            machine_name: machine_name,
                            machine_code: machine_code,
                            machine_type: machine_type,
                            serialnumber: serialnumber,
                            machine_id: machine_id,
                            machine_brand: machine_brand,
                            accessories_required: accessories_required,
                            job_cancel: job_cancel,
                            jobregistercreated_by: jobregistercreated_by,
                            jobregisterlastmodify_by: jobregisterlastmodify_by
                        };

                        $.ajax({
                            url: "adminsupporttechnician.php",
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                var res = JSON.parse(response);
                                console.log(res);
                                if (res.success == true) $('#messageSupportAdmin').html('<span style="color: green">Succesfully Request for Support!</span>');
                                else $('#messageSupportAdmin').html('<span style="color: red">Request for support failed</span>');
                            }
                        });
                    }
                }
                
                // STAFF JOB ASSIGN
                function updateJobAssign(data2){
                    var jobregister_id2 = document.getElementById('jobregister_id2');
                    var jobassignto = document.getElementById('jobassignto')
                    jobregister_id2.value = job_table.jobregister_id;
                    for (i = 0; i < jobassignto.options.length; i++) {
                        if (jobassignto.options[i].text === (job_table.job_assign + " - " + job_table.technician_rank)) {
                            jobassignto.options[i].selected = true;
                            break;
                        }
                    }

                    var jobregister_id3 = document.getElementById('jobregister_id3');
                    var tech_leader = document.getElementById('tech_leader');
                    var cust_name = document.getElementById('cust_name');
                    var requested_date2 = document.getElementById('requested_date2');
                    var machine_name = document.getElementById('machine_name2');

                    jobregister_id3.value = job_table.jobregister_id;
                    tech_leader.value = job_table.technician_rank;
                    cust_name.value = job_table.customer_name;
                    requested_date2 = job_table.requested_date;
                    machine_name = job_table.machine_name;

                    var tableBody = document.querySelector('#selectedassistant tbody');
                    tableBody.innerHTML = ''; // Clear the table body

                    data2.forEach(function(record){
                        var tableBody = document.querySelector('#selectedassistant tbody');

                        var newRow = document.createElement("tr");
                        newRow.setAttribute("data-row-id", record[0]);

                        var usernameCell = document.createElement("td");
                        var usernameText = document.createElement("b");
                        usernameText.textContent = record[2];
                        usernameCell.appendChild(usernameText);

                        var actionCell = document.createElement("td");
                        var deleteSpan = document.createElement("span");
                        deleteSpan.style.color = "red";
                        deleteSpan.className = "deleteassa";
                        deleteSpan.setAttribute("data-id", record[0]);
                        deleteSpan.textContent = "Delete";
                        actionCell.appendChild(deleteSpan);

                        newRow.appendChild(usernameCell);
                        newRow.appendChild(actionCell);

                        tableBody.appendChild(newRow);
                    });

                }
                function GetJobAss(str) {
                    if (str.length == 0) {
                        document.getElementById("username").value = "";
                        document.getElementById("technician_rank").value = "";
                        document.getElementById("staff_position").value = "";
                        return;
                    } 
                    
                    else {
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                var myObj = JSON.parse(this.responseText);
                                document.getElementById("username").value = myObj[0];
                                document.getElementById("technician_rank").value = myObj[1];
                                document.getElementById("staff_position").value = myObj[2];
                            }
                        };
                        xmlhttp.open("GET", "fetchtechnicianrank.php?staffregister_id=" + str, true);
                        xmlhttp.send();
                    }
                }

                $(document).ready(function() {
                    $('#technicianassign').click(function() {
                        var data = $('#assignupdate_form').serialize() + '&technicianassign=technicianassign';
                        $.ajax({
                            url: 'assigntechindex.php',
                            type: 'post',
                            data: data,
                            success: function(response) {
                                var res = JSON.parse(response);
                                console.log(res);
                                if (res.success == true) $('#assignupdateadminmessage').html('<span style="color: green">Job Assigned!</span>');
                                else $('#assignupdateadminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                            }
                        });
                    });
                });

                $(document).ready(function() {
                    $('#updateassign').click(function() {
                        var data = $('#adminassistant_form').serialize() + '&updateassign=updateassign';
                        $.ajax({
                            url: 'assignleaderindex.php',
                            type: 'post',
                            data: data,
                            success: function(response) {
                                var res = JSON.parse(response);
                                console.log(res);
                                if (res.success == true) $('#assignadminmessage').html('<span style="color: green;margin-left: -116px;">Update Saved!</span>');
                                else $('#assignadminmessage').html('<span style="color: red;margin-left: -116px;">Data Cannot Be Saved</span>');
                            }
                        });
                    });
                });
                $(document).ready(function() {
                    $(document).on('click', '.deleteassa', function() {
                        var el = this;
                        var deletedid = $(this).data('id');
                        var confirmalert = confirm("Are you sure?" + deletedid);
                        if (confirmalert == true) {
                            // AJAX Request
                            $.ajax({
                                url: 'delete-assistant.php',
                                type: 'POST',
                                data: {id: deletedid},
                                success: function(response) {
                                    if (response == 1) {
                                        $(el).closest('tr').fadeOut(800, function() {
                                            $(this).remove();
                                        });
                                    } 
                                    
                                    else {alert('Invalid ID.');}
                                }
                            });
                        }
                    });
                });

                $(document).ready(function() {
                    $('.staff-card').click(function() {
                        var jobregister_id = $(this).data('id');
                        var type_id = $(this).data('type_id');
                        var customer_name = $(this).data('customer_name');

                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                    type_id: type_id,
                                    customer_name: customer_name,
                                    jobinfo: true},

                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                job_table = res.data;
                                var data2 = res.data2;
                                updateJobInfo(data2);
                            }
                        });
                    });

                    $('#tabDoing2').click(function() {
                        var jobregister_id = job_table.jobregister_id;

                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                   jobassign: true
                            },

                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                var data2 = res.data2;
                                updateJobAssign(data2);

                            }
                        });
                    });

                    $('.staff-card').click(function() {
                        var jobregister_id = $(this).data('id');

                        $.ajax({
                            url: 'AdminHomepageUpdate.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},

                            success: function(response) {
                                $('.<?php echo $username ?>techupdate-details').html(response);
                                $('#jobdetails-<?php echo $username ?>').modal('show');
                            }
                        });
                    });

                    $('.staff-card').click(function() {
                        var jobregister_id = $(this).data('id');

                        $.ajax({
                            url: 'ajaxtabaccessories.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},
                            
                            success: function(response) {
                                $('.<?php echo $username ?>Acc-details').html(response);
                                $('#jobdetails-<?php echo $username ?>').modal('show');
                            }
                        });
                    });

                    $('.staff-card').click(function() {
                        var jobregister_id = $(this).data('id');

                        $.ajax({
                            url: 'ajaxtechphtoupdt.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},

                            success: function(response) {
                                $('.<?php echo $username ?>-photo-details').html(response);
                                $('#jobdetails-<?php echo $username ?>').modal('show');
                            }
                        });
                    });

                    $('.staff-card').click(function() {
                        var jobregister_id = $(this).data('id');

                        $.ajax({
                            url: 'ajaxtechvideoupdt.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},

                            success: function(response) {
                                $('.<?php echo $username ?>-video-details').html(response);
                                $('#jobdetails-<?php echo $username ?>').modal('show');
                            }
                        });
                    });

                    $('.staff-card').click(function() {
                        var jobregister_id = $(this).data('id');

                        $.ajax({
                            url: 'ajaxreportadmin.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},

                            success: function(response) {
                                $('.<?php echo $username ?>-report').html(response);
                                $('#jobdetails-<?php echo $username ?>').modal('show');
                            }
                        });
                    });
                });
            </script>

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

        function resetTabs() {
            // Uncheck all radio buttons
            var tabRadioButtons = document.getElementsByClassName("tab-radio");
            for (var i = 0; i < tabRadioButtons.length; i++) {
                tabRadioButtons[i].checked = false;
            }
            
            // Hide all tab contents
            var tabContents = document.getElementsByClassName("tab");
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }
        }

        function openPopup(popupId) {
            resetTabs(); // Reset tab states and content
            document.getElementById(popupId).style.display = "block"; // Show the popup
            
            // Select the first tab and display its content
            var firstTabRadio = document.getElementById("tabDoing");
            var firstTabContent = document.getElementById("StaffJobInfoTab");
            if (firstTabRadio && firstTabContent) {
                firstTabRadio.checked = true;
                firstTabContent.style.display = "block";
            }
        }

        function openTab(tabId) {
            // Hide all tab contents
            var tabContents = document.getElementsByClassName("tab");
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }
            
            // Uncheck all radio buttons
            var tabRadioButtons = document.getElementsByClassName("tab-radio");
            for (var i = 0; i < tabRadioButtons.length; i++) {
                tabRadioButtons[i].checked = false;
            }
            
            // Display the selected tab content
            document.getElementById(tabId).style.display = "block";
        }
    </script>


    <!-- End of staffs modal -->
    <!-- End of Admin Board Card -->
        </section>
    </main>

    <!--========== MAIN JS ==========-->
    <script src="assets/js/main.js"></script>
</body>

</html>