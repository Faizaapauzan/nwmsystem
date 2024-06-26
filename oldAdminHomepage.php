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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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

    .tooltip {
      z-index: 1000000;
      background-color: black;
      width: 360px;
      opacity: 1;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      /* Position the tooltip */
      position: absolute;
    }
    
    #preview {
      display: flex;
      width: 200px;
      height: 200px;
      border: 1px solid black;
      margin-top: -15px;
      flex-wrap: wrap;
      overflow-y: scroll;
    }
    
    #preview img {
      width: 50%;
      height: 50%;
    }

    /* #ImageRow {
      margin-right: 20px;
      margin-left: 40px;
      display: flex; 
      width: 200px; 
      height: 200px;

    } */
    
    form .upload-report .input-box {
      padding-left: 49px;
      margin-bottom: 1px;
      margin-top: 7px;
      width: calc(100% / 2 - -302px);
      padding: 0 -9px 0 15px;
    }
    
    form .upload-report label.details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }
    
    .upload-report .input-box input,
    .upload-report .input-box select {
      height: 40px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }
    
    .upload-report .input-box input:focus,
    .upload-report .input-box input:valid,
    .upload-report .input-box select:focus,
    .upload-report .input-box select:valid {border-color: #081d45;} 
    
    .popup-open {
        overflow: hidden; /* Prevent scrolling on the background */
    }

    .modal {
        opacity:1 !important;
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
                            <a href="#" class="nav__link">
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
            <div class="modal fade" id="staffpopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div style="text-align: center; display:inline-flex;">
                                <button  id="tabDoing" class="btn tab-button tabbutton" checked="checked" onclick="openTab('StaffJobInfoTab')">Job Info</button>
                                <button class="btn tab-button tabbutton" id="tabDoing2" onclick="openTab('JobAssignTab')">Job Assign</button>
                                <button class="btn tab-button tabbutton" id="tabDoing3" onclick="openTab('JobUpdateTab')">Update</button>
                                <button class="btn tab-button tabbutton" id="tabDoing4" onclick="openTab('JobAccessoriesTab')">Accessories</button>
                                <button class="btn tab-button tabbutton" id="tabDoing5" onclick="openTab('JobPhotoTab')">Photo</button>
                                <button class="btn tab-button tabbutton" id="tabDoing6" onclick="openTab('JobVideoTab')">Video</button>
                                <button class="btn tab-button tabbutton" id="tabDoing7" onclick="openTab('JobReportTab')">Report</button>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="document.getElementById('staffpopup').style.display='none';document.body.classList.remove('popup-open');"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Staff Job Info -->
                            
                            
                            <div class="tab" id="StaffJobInfoTab">
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

                            <div class="tab" id="JobAssignTab">
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

                            <div class="tab" id="JobUpdateTab">
                                <input type="hidden" name="jobregister_id" id="jobregister_idupdate" value="">
                                <div style="margin-left: 30px">
                                    <!-- Departure Time -->
                                    <div class="input-box-departure">
                                        <label for="">Departure Time</label>
                                        <input type="text" class="technician_departure" id="technician_departure" name="technician_departure" value="">
                                        <input type="button" id="update_DepartureTime" value="Departure" style=" background-color: #081d45;" onclick="getFormattedDateTime('technician_departure')">
                                    </div>
                                    <!-- End of Departure Time -->
                                    
                                    <!-- Time at site -->
                                    <div class="input-box-arrival">
                                        <label for="">Time at site</label>
                                        <input type="text" class="technician_arrival" id="technician_arrival" name="technician_arrival" value="">
                                        <input type="button" id="update_ArrivalTime" value="Arrival" style=" background-color: #081d45;" onclick="getFormattedDateTime('technician_arrival')">
                                    </div>
                                    <!-- End of Time at site -->
                                    
                                    <!-- Return Time -->
                                    <div class="input-box-leaving">
                                        <label for="">Return time</label>
                                        <div style="display: flex; align-items: baseline;">
                                            <input type="text" class="technician_leaving" id="technician_leaving" name="technician_leaving" value="">
                                            <input type="button" id="update_LeavingTime" value="Leaving" style="background-color: #081d45;" onclick="getFormattedDateTime('technician_leaving')">
                                        </div>
                                    </div>
                                    <!-- End of Return Time -->
                                    
                                    <div class="input-box-out">
                                        <label for="">Rest Hour</label>
                                        <!-- Rest Hour Out -->
                                        <div style="display: flex; align-items: baseline;"> 
                                            <input type="text" style="width: 406.5px;" id="tech_out" name="tech_out" value="">
                                            <input style="background-color: #081d45; color: white; width: 203.8px" type="button" value="OUT" onclick="getFormattedTime('tech_out')">
                                        </div>
                                        <!-- End of Rest Hour Out -->
                                        
                                        <!-- Rest Hour In -->
                                    
                                        <div style="display: flex; align-items: baseline;">
                                            <input type="text" style="width: 408px;" id="tech_in" name="tech_in" value="">
                                            <input style="background-color: #081d45; color: white; width: 203.8px" type="button" value="IN" onclick="getFormattedTime('tech_in')">
                                        </div>
                                        <!-- End of Rest Hour In -->
                                    </div>
                                    
                                    <p class="control" style="color: green;"><b id="techupdateAdmin"></b></p>
                                    <div style="margin-top:30px; margin-left:420px; margin-bottom:30px">
                                        <input type="button" id="update_tech" name="update_tech" value="Update" style="background-color: #081d45; color: white; width: 203.8px; height:40px; border: none; border-radius: 4px; font-size:15px;">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Staff Accessories Tab -->

                            <div class="tab" id="JobAccessoriesTab">
                                <div class="input-boxAccessories" id="input_fields_wrapAccessories">
                                    <table style="box-shadow: 0 5px 10px #f7f7f7; margin-left: -6px; margin-top: -18px;" id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>UOM</th>
                                            <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="_editable_table">
                                        </tbody>
                                    </table>
                                    <a href="javascript:void(0);" class="add_button" title="Add field" type="button">Click Here to Add Accessories</a>
                                    <form  id="adminacc_form" method="post">
                                        <div class="model">
                                        </div>
                                        <div class="updateBtn">
                                            <p class="control"><b id="accessoriesmessage"></b></p>
                                            <input type="button" id="update_acc" name="update_acc" value="Update"/>
                                        </div>
                                    </form>
                                </div>              
                            </div>

                            <!-- Staff Photo Tab -->

                            <div class="tab" id="JobPhotoTab">
                                <form id="submitForm">
                                    <!-- for select job register id -->
                                    <input type="hidden" id="jobregister_idp1" name="jobregister_id" value="">
                                    <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (Before Service)</label></b>
                                    <input type="hidden" id="description" name="description" value="Machine (Before Service)">
                                    <div id="previewBefore"></div>
                                    <div class="update-form">
                                        <div class="upload-report">
                                            <div class="input-box" style="display: flex; margin-left: -16px;">
                                                <input type="file" class="form-control" name="multipleFile[]" id="multipleFile" required="" multiple>
                                                <input type="submit" name="upload" value="Upload Machine (Before Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message">
                                        <p class="control"><b id="messageImagebefore"></b></p>
                                    </div>

                                    <!-- for select data from tech photo update database -->

                                    <!-- Photos Table Before Service -->
                                    <div class="table-responsivep1">
                                        <table id="tablep1" style="box-shadow: 0 5px 10px #f7f7f7;">
                                            <tbody id="tbodyp1" style="display: flex; flex-wrap: wrap;">
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <form id="submitAfterForm">
                                    <!-- for select job register id -->
                                    <input type="hidden" id="jobregister_idp2" name="jobregister_id" value="">
                                    <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (After Service)</label></b>
                                    <input type="hidden" id="description" name="description" value="Machine (After Service)">
                                    <div id="previewAfter"></div>
                                    <div class="update-form">
                                        <div class="upload-report">
                                            <div class="input-box" style="display: flex; margin-left: -16px;">
                                                <input type="file" class="form-control" name="multipleFile[]" id="multipleAfter" required="" multiple>
                                                <input type="submit" name="upload" value="Upload Machine (After Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <p class="control"><b id="messageImageAfter"></b></p>
                                        </div>
                                        
                                        <!-- for select data from tech photo update database -->
                                        
                                        <!-- Photos Table After Service -->
                                        <div class="table-responsivep2">
                                            <table id="tablep2" style="box-shadow: 0 5px 10px #f7f7f7;">
                                                <tbody id="tbodyp2" style="display: flex; flex-wrap: wrap;">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Staff Video Tab -->

                            <div class="tab" id="JobVideoTab">
                                <form id="submitVideoBefore">
                                    <!-- for select job register id -->
                                    <input type="hidden" id="jobregister_idv1" name="jobregister_id" value="">
                                    <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (Before Service)</label></b>
                                    <input type="hidden" id="description" name="description" value="Machine (Before Service)">
                                    <div id="previewBeforeVideo"></div>
                                    <div class="update-form">
                                        <div class="upload-report">
                                            <div class="input-box" style="display: flex; margin-left: -16px;">
                                                <input type="file" class="form-control" name="multipleVideo[]" id="multipleVideo" required="" multiple>
                                                <input type="submit" name="uploadVideo" value="Upload Machine (Before Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <p class="control"><b id="messageVideoBefore"></b></p>
                                        </div>

                                        <!-- for select data from tech video update database -->

                                        <!-- Videos Table Before Service -->
                                        <div class="table-responsivev1">
                                            <table id="tablev1" style="box-shadow: 0 5px 10px #f7f7f7;">
                                                <tbody id="tbodyv1"style="display: flex; flex-wrap: wrap; padding-left: 15px;">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                                <form id="submitAfterVideo">
                                    <!-- for select job register id -->
                                    <input type="hidden" id="jobregister_idv2" name="jobregister_id" value="">
                                    <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (After Service)</label></b>
                                    <input type="hidden" id="description" name="description" value="Machine (After Service)">
                                    <div id="previewAfterVideo"></div>
                                    <div class="update-form">
                                        <div class="upload-report">
                                            <div class="input-box" style="display: flex; margin-left: -16px;">
                                                <input type="file" class="form-control" name="multipleVideo[]" id="multipleAfterVideo" required="" multiple>
                                                <input type="submit" name="uploadVideo" value="Upload Machine (After Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
                                            </div>
                                        </div>
                                        <div class="message">
                                            <p class="control"><b id="messageVideoAfter"></b></p>
                                        </div>

                                        <!-- for select data from tech video update database -->
                                        <!-- Videos Table After Service -->
                                        <div class="table-responsivev2">
                                            <table id="tablev2" style="box-shadow: 0 5px 10px #f7f7f7;">
                                                <tbody id="tbodyv2" style="display: flex; flex-wrap: wrap; padding-left: 15px;">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>


                            </div>

                            <!-- Staff Report Tab -->

                            <div class="tab" id="JobReportTab">
                                <form method="POST" action="servicereportdate.php">
                                    <input type="hidden" id="jobregister_idreport" name="jobregister_id" value="">
                                    <label for="reportdate" style="margin-left: 20px">Service Report Date:</label>
                                    <div class="date-form">
                                        <div class="submit-date" style="padding-left: 20px; padding-right: 25px;">
                                            <div class="input-box" style="width: 75%; display: flex; align-items: baseline;">
                                                <input type="text" id="srvcreportdate" name="srvcreportdate" value="<?php $date = date('d-m-Y');?>" readonly>
                                                <div class="input-group-append" style="display: flex; justify-content: space-between; flex-wrap: nowrap;">
                                                    <!-- closing div for input-group-append is missing in your provided code -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="view_form" method="post">
                                    <div style="display:flex;">
                                    <button  style="padding: 8px 44px; border-radius: 4px;" id="userinfo" class="userinfo" type="button" 
                                    >New</button></n>
                                    <button style="padding: 8px 44px; border-radius: 4px; display: flex; background-color: #f43636 ;" id="useredit" class="useredit" type="button" >Edit</button>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="w3-quarter">
                <div class="overview-boxes">
                    <!-- First row of Admin Board Card -->
                    <div class="row">
                        <!-- Job Listing -->
                        <div class="box" id="myModal">
                            <div class="box_topic">Job Listing</div>
                                <?php
                                    
                                    include 'dbconnect.php';
                                    
                                    $results = $conn->query("SELECT * FROM job_register WHERE (accessories_required = 'NO' AND job_status IS NULL AND job_assign IS NULL AND job_cancel = '')
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
                                                (job_assign IS NULL AND job_status = 'Ready' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                        
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

                                    $numRow_run = mysqli_query($conn, $numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;">Total Job: ' . $row_Total . ' </h4>';
                                    } 
                                    
                                    else {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                    
                                    while ($row = $results->fetch_assoc()) {
                                ?>
                                
                                <div class="todo" data-id="<?php echo $row['jobregister_id']; ?>" data-type_id="<?php echo $row['type_id']; ?>" data-customer_name="<?php echo $row['customer_name']; ?>" data-target="doubleClick-1" ondblclick="document.getElementById('doubleClick-1').style.display='block';document.body.classList.add('popup-open');">
                                    <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                        <ul class="b" id="draged">
                                            <strong text-align="center"><?php echo $row['job_order_number'] ?></strong>
                                            <li><?php echo $row['job_priority'] ?></li>
                                            <li><?php echo $row['customer_name'] ?></li>
                                            <li><?php echo $row['machine_type'] ?></li>
                                            <li><?php echo $row['job_description'] ?></li>
                                            <li><b><?php echo $row['accessories_required'] ?></b> accessories required</li>
                                            <li><?php echo $row['job_status'] ?></li>
                                            <strong text-align="center" style="color:red"><?php echo $row['reason'] ?></strong>
                                        </ul>
                                        <div class='supports' id='support'> <?php echo $row['support'] ?></div>
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
                                    
                                    $results = $conn->query("SELECT * FROM job_register WHERE (accessories_required = 'Yes' AND job_status = '' AND job_cancel = '')
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
                                                (staff_position = 'Storekeeper' AND job_status = 'Pending' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

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
                                                
                                    $numRow_run = mysqli_query($conn, $numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;" >Total Job: ' . $row_Total . ' </h4>';
                                    } 
                                    
                                    else {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                    
                                    while ($row = $results->fetch_assoc()) {
                                ?>
                                
                                <div class="Store" data-id="<?php echo $row['jobregister_id']; ?>" data-type_id="<?php echo $row['type_id']; ?>" data-target="doubleClick-Store" ondblclick="document.getElementById('doubleClick-Store').style.display='block';document.body.classList.add('popup-open');">
                                    <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                        <ul class="b" id="draged">
                                            <strong text-align="center"><?php echo $row['job_order_number'] ?></strong>
                                            <li><?php echo $row['job_priority'] ?></li>
                                            <li><?php echo $row['customer_name'] ?></li>
                                            <li><?php echo $row['machine_type'] ?></li>
                                            <li><?php echo $row['job_description'] ?></li>
                                            <li><?php echo $row['job_status'] ?></li>
                                            <strong text-align="center" style="color:red"><?php echo $row['reason'] ?></strong>
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
                                    $(document).ready(function() {
                                        $('.Store').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            var type_id = $(this).data('type_id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageJobinfoStorekeeper.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id,
                                                                type_id: type_id},
                                                            
                                                success: function(response) {
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
                                    
                                    $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                                OR    
                                                            (job_status = 'Pending' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                    $numRow = "SELECT * FROM job_register WHERE (job_status = 'Pending' AND job_cancel = '')
                                                    OR    
                                                (job_status = 'Pending' AND job_cancel IS NULL)";

                                    $numRow_run = mysqli_query($conn, $numRow);

                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;">Total Job: ' . $row_Total . ' </h4>';
                                    }
                                    
                                    else {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                    
                                    while ($row = $results->fetch_assoc()) {
                                ?>
                                
                                <div class="Pending" data-type_id="<?php echo $row['type_id']; ?>" data-id="<?php echo $row['jobregister_id']; ?>" data-target="doubleClick-Pending" ondblclick="document.body.classList.add('popup-open');document.getElementById('doubleClick-Pending').style.display='block';">
                                    <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                        <ul class="b" id="draged">
                                            <strong text-align="center"><?php echo $row['job_order_number'] ?></strong>
                                            <li><?php echo $row['job_priority'] ?></li>
                                            <li><?php echo $row['customer_name'] ?></li>
                                            <li><?php echo $row['machine_type'] ?></li>
                                            <li><?php echo $row['job_description'] ?></li>
                                            <li><?php echo $row['job_status'] ?></li>
                                            <li><b>Pending Reason: </b><?php echo $row['reason'] ?></li>
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
                                    $(document).ready(function() {
                                        $('.Pending').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            var type_id = $(this).data('type_id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageJobinfoPending.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id,
                                                                type_id: type_id},
                                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('body').on('click', '.Pending', function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageJobassign.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Pending').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageUpdate.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Pending').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtabaccessories.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Pending').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtechphtoupdt.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Pending').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtechvideoupdt.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                            
                                                success: function(response) {
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
                                    
                                    $results = $conn->query("SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                                OR    
                                                            (job_status = 'Incomplete' AND job_cancel IS NULL) ORDER BY jobregisterlastmodify_at DESC LIMIT 50");

                                    $numRow ="SELECT * FROM job_register WHERE (job_status = 'Incomplete' AND job_cancel = '')
                                                OR    
                                                (job_status = 'Incomplete' AND job_cancel IS NULL)";

                                    $numRow_run = mysqli_query($conn, $numRow);
                                    
                                    if ($row_Total = mysqli_num_rows($numRow_run)) {
                                        echo '<h4 style="text-align:right;">Total Job: ' . $row_Total . ' </h4>';
                                    } 
                                    
                                    else {
                                        echo '<h4 style="text-align:right;">No Data </h4>';
                                    }
                                    
                                    while ($row = $results->fetch_assoc()) {
                                ?>

                                <div class="Incomplete" data-id="<?php echo $row['jobregister_id']; ?>" data-target="doubleClick-Incomplete" ondblclick="document.body.classList.add('popup-open');document.getElementById('doubleClick-Incomplete').style.display='block';">
                                    <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
                                        <ul class="b" id="draged">
                                            <strong text-align="center"><?php echo $row['job_order_number'] ?></strong>
                                            <li><?php echo $row['job_priority'] ?></li>
                                            <li><?php echo $row['customer_name'] ?></li>
                                            <li><?php echo $row['machine_type'] ?></li>
                                            <li><?php echo $row['job_description'] ?></li>
                                            <li><?php echo $row['job_status'] ?></li>
                                            <li><b>Incomplete Reason: </b><?php echo $row['reason'] ?></li>
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
                                    $(document).ready(function() {
                                        $('.Incomplete').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageJobinfoIncomplete.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Incomplete').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageJobassign.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},

                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Incomplete').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'AdminHomepageUpdate.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Incomplete').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtabaccessories.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Incomplete').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtechphtoupdt.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},

                                                success: function(response) {
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
                                    $(document).ready(function() {
                                        $('.Incomplete').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtechvideoupdt.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
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
                // STAFF UPDATE TAB
                function updateJobUpdate(){
                    var technician_departure = document.getElementById('technician_departure');
                    var technician_arrival = document.getElementById('technician_arrival');
                    var technician_leaving = document.getElementById('technician_leaving');
                    var tech_out = document.getElementById('tech_out');
                    var tech_in = document.getElementById('tech_in');

                    technician_departure.value = job_table.technician_departure;
                    technician_arrival.value = job_table.technician_arrival;
                    technician_leaving.value = job_table.technician_leaving;
                    tech_out.value = job_table.tech_out;
                    tech_in.value = job_table.tech_in;
                }

                function getFormattedDateTime(textid) {
                    var options = {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit',
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                    };
                    var textchange = document.getElementById(textid);
                    var formattedDateTime = new Date().toLocaleString('en-SG', options);
                    textchange.value = formattedDateTime;
                }
                function getFormattedTime(textid) {
                    var options = {
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: true
                    };
                    var textchange = document.getElementById(textid);
                    var formattedTime = new Date().toLocaleTimeString('en-SG', options);
                    textchange.value =formattedTime;
                }
                $(function() {
                    $('#update_tech').click(function() {
                        var technician_departure = $('#technician_departure').val();
                        var technician_arrival = $('#technician_arrival').val();
                        var technician_leaving = $('#technician_leaving').val();
                        var tech_out = $('#tech_out').val();
                        var tech_in = $('#tech_in').val();
                        var jobregister_id = job_table.jobregister_id;
                        $.ajax({
                            type: 'POST',
                            url: 'techupdateindex.php',
                            data: {
                                technician_departure: technician_departure,
                                technician_arrival: technician_arrival,
                                technician_leaving: technician_leaving,
                                tech_out: tech_out,
                                tech_in: tech_in,
                                jobregister_id: jobregister_id
                            },
                            success: function(response) {
                                $('#techupdateAdmin').html('Time has been update successfully');
                            },
                            error: function() {
                                $('#techupdateAdmin').html('An error occurred while updating the time');
                            }
                        });
                    });
                });

                // STAFF ACCESSORIES TAB
                function updateJobAccessory(data2){
                    var count = 1;
                    var tbody = document.getElementById("_editable_table");

                    tbody.innerHTML = "";

                    data2.forEach(function(res){
                        var row = document.createElement("tr");
                        row.setAttribute("data-row-id", res[0]);

                        var idCell = document.createElement("td");
                        idCell.textContent = count++;
                        row.appendChild(idCell);

                        var codeCell = document.createElement("td");
                        var codeLink = document.createElement("a");
                        codeLink.style.color = "blue";
                        codeLink.style.cursor = "pointer";
                        codeLink.textContent = res[3];
                        codeLink.setAttribute("data-toggle", "tooltip");
                        codeLink.className = "hover";
                        codeLink.id = res[2];
                        codeCell.appendChild(codeLink);
                        row.appendChild(codeCell);

                        var nameCell = createEditableCell(res[4], 1);
                        var uomCell = createEditableCell(res[5], 2);
                        var quantityCell = createEditableCell(res[6], 3);
                        row.appendChild(nameCell);
                        row.appendChild(uomCell);
                        row.appendChild(quantityCell);

                        var deleteCell = document.createElement("td");
                        var deleteSpan = document.createElement("span");
                        deleteSpan.className = "delete";
                        deleteSpan.setAttribute("data-id", res[0]);
                        deleteSpan.textContent = "Delete";
                        deleteCell.appendChild(deleteSpan);
                        row.appendChild(deleteCell);

                        tbody.appendChild(row);
                    });

                    $('[data-toggle="tooltip"]').tooltip({
                        title: fetchData,
                        html: true,
                        placement: 'right'
                    });
                }

                function createEditableCell(value, colIndex) {
                    var cell = document.createElement("td");
                    cell.className = "editable-col";
                    cell.setAttribute("contenteditable", "true");
                    cell.setAttribute("col-index", colIndex);
                    cell.setAttribute("oldVal", value);
                    cell.textContent = value;
                    return cell;
                }
                $(document).ready(function(){
                    $('#update_acc').click(function () {
                        var data = $('#adminacc_form').serialize(); 
                        $.ajax({
                                url: 'addaccessoriesindex.php',
                                type: 'post',
                                data: { data: data, jobregister_id: job_table.jobregister_id, update_acc: true },

                                success: function(response)
                                {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    if(res.success == true)
                                        $('#accessoriesmessage').html('<span style="color: green">Update Success</span>');
                                    else
                                        $('#accessoriesmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                                }
                         });
                    });
                    // Delete
                    $(document).on('click', '.delete', function() {
                        var el = this;
                        // Delete id
                        var deleteid = $(this).data('id');
                        var confirmalert = confirm("Are you sure?");
                        if (confirmalert == true) {
                            // AJAX Request
                            $.ajax({
                                    url: 'delete-ajax-acc.php',
                                    type: 'POST',
                                    data: { id:deleteid },
                                    success: function(response){
                                    if(response == 1){
                                        // Remove row from HTML Table
                                        $(el).closest('tr').css('background','tomato');
                                        $(el).closest('tr').fadeOut(800,function(){
                                        $(this).remove();
                                        });
                                    } 
                                    else {
                                        alert('Invalid ID.');
                                    }
                                }
                            });
                        }
                    });
                });

                function fetchData(){
                    var fetch_data = '';
                    var element = $(this);
                    var accessories_id = element.attr("id");
                    $.ajax({
                            url:"fetch-hover.php",
                            method:"POST",
                            async: false,
                            data:{accessories_id:accessories_id},
                            success:function(data)
                            {
                                fetch_data = data;
                            }
                    });
                    return fetch_data;
                }

                $(document).ready(function () {

                    var maxField = 100; // Total 100 product fields we add
                    var addButton = $('.add_button'); // Add more button selector
                    var wrapper = $('.model'); // Input fields wrapper
                    var fieldHTML = `
                    <div class="field-element">
                        <div class="model">
                            <select style="width: 90%;" id="select_box" class="accessoriesModel" name="accessoriesModel[]">
                                <option value=""> Select Accessories Code </option>
                                <!-- Options will be dynamically added using PHP -->
                                <?php 
                                    include "dbconnect.php";  // Using database connection file here
                                    $records = mysqli_query($conn, "SELECT accessories_code, accessories_name, accessories_uom, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");  // Use select query here
                                    while($data = mysqli_fetch_array($records))
                                    {
                                    echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";  // displaying data in option menu
                                    }	
                                ?>
                            </select>
                            <div id="results">
                                <input type="hidden" name="accessories_id[]" class="accessories_id">
                                <input type="text" id="codes" class="accessories_code" name="accessories_code[]" placeholder="Accessories Code">
                                <input type="text" class="accessories_name" name="accessories_name[]" placeholder="Accessories Name">
                                <input type="text" class="accessories_uom" name="accessories_uom[]" placeholder="Unit of Measurement">
                                <input type="text" class="accQuan" name="accessories_quantity[]" placeholder="Accessories Quantity">
                            </div>
                            <a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a>
                        </div>
                    </div>`;
                    
                    
                    var x = 1; //Initial field counter is 1
                    $(addButton).click(function () {
                        //Check maximum number of input fields
                        console.log("Add button clicked");  
                        if (x < maxField) {
                            console.log("Adding field");
                            x++; //Increment field counter
                            $(wrapper).append(fieldHTML);
                        }
                    });
                    
                    //Once remove button is clicked
                    $(wrapper).on('click', '.remove_button', function (e) {
                        e.preventDefault();
                        $(this).parent().closest(".field-element").remove();
                        x--; //Decrement field counter
                    });

                    // $("#accessoriesModel[]").selectize({
                    //     sortField: 'text'
                    // });
                });

                $(document).on('change', '[name="accessoriesModel[]"]', function(){
                    var accessories_id = $(this).val();
                    var model = $(this).parent('.model');
                    if (accessories_id != '') {
                    $.ajax({
                            url:"getcode.php",
                            method:"POST",
                            data: { accessories_id:accessories_id },
                            dataType:"json",
                            success:function(result){
                                model.find(".accessories_id").val(accessories_id);
                                model.find(".accessories_code").val(result.accessories_code);
                                model.find(".accessories_name").val(result.accessories_name);
                                model.find(".accessories_uom").val(result.accessories_uom);
                            }
                            })
                        }
                });

                // STAFF PHOTO TAB
                $(document).ready(function(){
                    function setupImageUpload(formSelector, previewContainer, messageContainer) {
                        function previewImages() {
                            var $preview = $(previewContainer).empty();
                            if (this.files) $.each(this.files, readAndPreview);
                            function readAndPreview(i, file) {
                                var reader = new FileReader();
                                $(reader).on("load", function() {
                                    $preview.append($("<img/>", { src: this.result, height: 100 }));
                                });
                                reader.readAsDataURL(file);
                            }
                        }

                        $(formSelector + " input[type=file]").on("change", previewImages);
                        
                        $(formSelector).on("submit", function (e) {
                            e.preventDefault();
                            $.ajax({
                                url: 'uploads.php',
                                type: 'POST',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: new FormData(this),
                                success: function (response) {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    if (res.success == true) {
                                        $(messageContainer).html('<span style="color: green">Image Uploaded!</span>');
                                    } else {
                                        $(messageContainer).html('<span style="color: red">Image cannot be Upload</span>');
                                    }
                                    $(formSelector + " input[type=file]").val("");
                                }
                            });
                        });
                    }

                    setupImageUpload("#submitForm", "#previewBefore", "#messageImagebefore");
                    setupImageUpload("#submitAfterForm", "#previewAfter", "#messageImageAfter");


                    // Delete 
                    $(document).on('click', '.deleted', function () {
                        var el = this;
                        var deletedid = $(this).data('id');
                        var confirmalert = confirm("Are you sure?");
                        if (confirmalert == true) {
                            $.ajax({
                                url: 'techphoto_delete.php',
                                type: 'POST',
                                data: { id: deletedid },
                                success: function (response) {
                                    if (response == 1) {
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        alert('Invalid ID.');
                                    }
                                }
                            });
                        }
                    });
                });
                function clearTableBody(tableSelector) {
                    $(tableSelector + ' tbody').empty();
                }
                function updatephototab(data2, data3){
                    clearTableBody("#tablep1");
                    clearTableBody("#tablep2");
                    var jobregister_idp1 = document.getElementById('jobregister_idp1');
                    jobregister_idp1.value = job_table.jobregister_id;
                    var tbodyp1 = document.getElementById('tbodyp1');

                    data2.forEach(function(res) {
                        var newRow = document.createElement('tr');
                        newRow.style.display = 'grid';
                        newRow.style.paddingLeft = '25px';
                        
                        var imgCell = document.createElement('td');
                        var imgLink = document.createElement('a');
                        imgLink.href = 'image/' + res[2];
                        imgLink.download = '';
                        var imgElement = document.createElement('img');
                        imgElement.src = 'image/' + res[2];
                        imgElement.id = 'display_image';
                        imgLink.appendChild(imgElement);
                        imgCell.appendChild(imgLink);
                        
                        var deleteCell = document.createElement('td');
                        var deleteSpan = document.createElement('span');
                        deleteSpan.className = 'deleted';
                        deleteSpan.style.color = 'red';
                        deleteSpan.style.cursor = 'pointer';
                        deleteSpan.setAttribute('data-id', res[0]);
                        deleteSpan.textContent = 'Delete';
                        deleteCell.appendChild(deleteSpan);
                        
                        newRow.appendChild(imgCell);
                        newRow.appendChild(deleteCell);
                        
                        // Append the new row to the tbody
                        tbodyp1.appendChild(newRow);
                    });

                    var jobregister_idp2 = document.getElementById('jobregister_idp2');
                    jobregister_idp2.value = job_table.jobregister_id;
                    var tbodyp2 = document.getElementById('tbodyp2');

                    data3.forEach(function(res2) {
                        var newRow = document.createElement('tr');
                        newRow.style.display = 'grid';
                        newRow.style.paddingLeft = '25px';

                        var imgCell = document.createElement('td');
                        var imgLink = document.createElement('a');
                        imgLink.href = 'image/' + res2[2];
                        imgLink.download = '';
                        var imgElement = document.createElement('img');
                        imgElement.src = 'image/' + res2[2];
                        imgElement.id = 'display_image';
                        imgLink.appendChild(imgElement);
                        imgCell.appendChild(imgLink);

                        var deleteCell = document.createElement('td');
                        var deleteSpan = document.createElement('span');
                        deleteSpan.className = 'deleted';
                        deleteSpan.style.color = 'red';
                        deleteSpan.style.cursor = 'pointer';
                        deleteSpan.setAttribute('data-id', res2[0]);
                        deleteSpan.textContent = 'Delete';
                        deleteCell.appendChild(deleteSpan);

                        newRow.appendChild(imgCell);
                        newRow.appendChild(deleteCell);

                        // Append the new row to the tbody
                        tbodyp2.appendChild(newRow);
                    });
                }

                // STAFF VIDEO TAB
                $(document).ready(function() {
                    function setupVideoUpload(formSelector, previewContainer, messageContainer) {
                        function previewVideos() {
                            var $preview = $(previewContainer).empty();
                            if (this.files) {
                                $.each(this.files, function(i, file) {
                                    var reader = new FileReader();
                                    $(reader).on("load", function() {
                                        $preview.append($("<video/>", { src: this.result, height: 100, controls: true }));
                                    });
                                    reader.readAsDataURL(file);
                                });
                            }
                        }

                        $(formSelector + " input[type=file]").on("change", previewVideos);

                        $(formSelector).on("submit", function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: 'uploadvideo.php',
                                type: 'POST',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: new FormData(this),
                                success: function(response) {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    var message = res.success ? "Video Uploaded!" : "Video cannot be Upload";
                                    $(messageContainer).html('<span style="color: ' + (res.success ? 'green' : 'red') + '">' + message + '</span>');
                                    $(formSelector + " input[type=file]").val("");
                                }
                            });
                        });
                    }

                    setupVideoUpload("#submitVideoBefore", "#previewBeforeVideo", "#messageVideoBefore");
                    setupVideoUpload("#submitAfterVideo", "#previewAfterVideo", "#messageVideoAfter");

                    // Delete
                    $(document).on('click', '.deletedv', function () {
                        var el = this;
                        var deletedid = $(this).data('id');
                        var confirmalert = confirm("Are you sure?");
                        if (confirmalert == true) {
                            $.ajax({
                                    url: 'techvideo-delete.php',
                                    type: 'POST',
                                    data: {id:deletedid},
                                    success: function(response){
                                    if(response == 1){
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                        });
                                    }
                                    else {
                                        alert('Invalid ID.');
                                    }
                                }
                            });
                        }
                    });
                });
                function updatevideotab(data2, data3){
                    clearTableBody("#tablev1");
                    clearTableBody("#tablev2");
                    var jobregister_idv1 = document.getElementById('jobregister_idv1');
                    var tbodyv1 = document.getElementById('tbodyv1');
                    data2.forEach(function(data) {
                        var newRow = document.createElement('tr');
                        newRow.style.display = 'grid';
                        newRow.style.paddingLeft = '25px';
                        newRow.style.marginLeft = '3px';
                        
                        var videoCell = document.createElement('td');
                        var videoElement = document.createElement('video');
                        videoElement.width = 170;
                        videoElement.height = 150;
                        videoElement.src = 'image/' + data.video_url;
                        videoElement.controls = true;
                        videoCell.appendChild(videoElement);
                        
                        var deleteCell = document.createElement('td');
                        var deleteSpan = document.createElement('span');
                        deleteSpan.className = 'deletedv';
                        deleteSpan.style.color = 'red';
                        deleteSpan.style.cursor = 'pointer';
                        deleteSpan.setAttribute('data-id', data.id);
                        deleteSpan.textContent = 'Delete';
                        deleteCell.appendChild(deleteSpan);
                        
                        newRow.appendChild(videoCell);
                        newRow.appendChild(deleteCell);
                        
                        // Append the new row to the tbody
                        tbodyv1.appendChild(newRow);
                    });

                    var jobregister_idv2 = document.getElementById('jobregister_idv2');
                    var tbodyv2 = document.getElementById('tbodyv2');
                    data3.forEach(function(data) {
                        var newRow = document.createElement('tr');
                        newRow.style.display = 'grid';
                        newRow.style.paddingLeft = '25px';
                        newRow.style.marginLeft = '3px';
                        
                        var videoCell = document.createElement('td');
                        var videoElement = document.createElement('video');
                        videoElement.width = 170;
                        videoElement.height = 150;
                        videoElement.src = 'image/' + data.video_url;
                        videoElement.controls = true;
                        videoCell.appendChild(videoElement);
                        
                        var deleteCell = document.createElement('td');
                        var deleteSpan = document.createElement('span');
                        deleteSpan.className = 'deletedv';
                        deleteSpan.style.color = 'red';
                        deleteSpan.style.cursor = 'pointer';
                        deleteSpan.setAttribute('data-id', data.id);
                        deleteSpan.textContent = 'Delete';
                        deleteCell.appendChild(deleteSpan);
                        
                        newRow.appendChild(videoCell);
                        newRow.appendChild(deleteCell);
                        
                        // Append the new row to the tbody
                        tbodyv2.appendChild(newRow);
                    });
                }


                // STAFF REPORT TAB
                function updatereporttab(){
                    var jobregister_id = document.getElementById('jobregister_idreport');
                    jobregister_id.value = job_table.jobregister_id;
                }
                $(document).ready(function(){
                    $('.userinfo').click(function(){
                        var jobregister_id = job_table.jobregister_id;

                        $.ajax({
                            url: 'servicereportajaxadmin.php',
                            type: 'post',
                            data: {jobregister_id:jobregister_id},
                            success: function(data){
                                var win = window.open('servicereport.php');
                                win.document.write(data);
                            }
                        });
                    });

                    $('.useredit').click(function(){
                        var jobregister_id = job_table.jobregister_id;
                        $.ajax({
                            url: 'servicereportEDIT.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id},
                            success: function(data){
                                var win = window.open('servicereportEDIT.php');
                                win.document.write(data);
                            }
                        });
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

                    $('#tabDoing3').click(function() {
                        updateJobUpdate();
                    });

                    $('#tabDoing4').click(function() {
                        var model = $('.model');
                        model.empty();
                        var jobregister_id = job_table.jobregister_id;

                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                jobaccessories: true},
                            
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                var data2 = res.data2;
                                updateJobAccessory(data2);
                            }
                        });
                    });

                    $('#tabDoing5').click(function() {
                        var jobregister_id = job_table.jobregister_id;

                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                photo: true},
                            
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                var data2 = res.data2;
                                var data3 = res.data3;
                                updatephototab(data2, data3);
                            }
                        });
                    });

                    $('#tabDoing6').click(function() {
                        var jobregister_id = job_table.jobregister_id;

                        $.ajax({
                            url: 'AdminHomepageStaffCode.php',
                            type: 'post',
                            data: {jobregister_id: jobregister_id,
                                video: true},
                            
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                var data2 = res.data2;
                                var data3 = res.data3;
                                updatevideotab(data2, data3);
                            }
                        });
                    });

                    $('#tabDoing7').click(function() {
                        
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
            var tabRadioButtons = document.getElementsByClassName("tabbutton");
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
            document.body.classList.add("popup-open");
            
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
            var tabRadioButtons = document.getElementsByClassName("tabbutton");
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