<?php session_start(); ?>

<?php
// Include pagination library file 
include_once 'Pagination.class.php';

// Include database configuration file
require_once 'dbconnect.php';

// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM job_register WHERE job_cancel = '' AND job_status != 'Completed' 
                                                                         OR job_cancel IS NULL AND job_status != 'Completed' ");
$result  = $query->fetch_assoc();
$rowCount = $result['rowNum'];

// Initialize pagination class
$pagConfig = array('totalRows' => $rowCount);
$pagination =  new Pagination($pagConfig);

// Fetch records based on the limit
$query = $conn->query("SELECT * FROM job_register WHERE job_cancel = '' AND job_status != 'Completed' 
                                                      OR job_cancel IS NULL AND job_status != 'Completed' 
                                                      ORDER BY jobregisterlastmodify_at DESC");
?>

<?php
//Database connectivity
require_once 'dbconnect.php';

//Get Update id and status
if (isset($_GET['jobregister_id']) && isset($_GET['job_assign'])) {
    $jobregister_id = $_GET['jobregister_id'];
    $job_assign = $_GET['job_assign'];
    mysqli_query($conn, "update job_register set job_assign='$job_assign' where jobregister_id='$jobregister_id'");
    header("location:adminjoblisting.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<meta name="keywords" content="" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NWM Job Listing</title>
<link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="assets/css/styles.css">
<link href="css/adminjoblisting1.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


<!--Boxicons link -->
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
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
            
            .dropdown:hover .dropbtn {color:#f5f5f5}
            .dropdown1:hover .dropbtn1 {color:#f5f5f5}

            .dropdown-content a:hover {background-color:#f1f1f1}
            .dropdown-content1 a:hover {background-color:#f1f1f1}

            .dropdown:hover .dropdown-content {display:block}
            .dropdown1:hover .dropdown-content1 {display:block}

            .dropdown-content {
                display:none;
                position:absolute;
                background-color:#f9f9f9;
                min-width:auto;
                padding-left:20px;
                bottom:55px;
                box-shadow:0 8px 16px 0 rgba(0,0,0,.2);
                z-index:1
            }
            
            .dropdown-content1{
                display:none;
                position:absolute;
                background-color:#f9f9f9;
                min-width:160px;
                box-shadow:0 8px 16px 0 rgba(0,0,0,.2);
                padding:12px 16px;z-index:1
            }
            
            .dropdown-content a {
                color:#000;
                padding:10px 10px;
                text-decoration:none;
                display:block;
                padding-right:7px
            }
            
            .dropdown-content1 a{
                color:#000;
                padding:12px 16px;
                text-decoration:none;
                display:block;
                padding-right:7px
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
                    top:-10px;
                }
                
                .dropdown-content1 {
                    display: none;
                }
                
                .dropdown1:hover .dropdown-content1 {
                    display: none;
                }
            }
            
            .mobile-view a {
                color:black;
                margin-left: 10px;
            }
        </style>

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

    <main>
        <section>
            <div class="card">
                <div class="card-header">
                    <h4>Job Listing</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped sortable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Job Order Number</th>
                                    <th>Job Priority</th>
                                    <th>Job Status</th>
                                    <th>Customer Name</th>
                                    <th>Job Name</th>
                                    <th>Machine Code</th>
                                    <th>Job Assign</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                if ($query->num_rows > 0) {
                                    $i = 0;
                                    while ($row = $query->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td id="<?php echo $row["job_status"]; ?>"><?php echo $i; ?></td>
                                            <td id="<?php echo $row["job_status"]; ?>" data-id="<?php echo $row['jobregister_id']; ?>" data-idupdate="<?php echo $row['customer_name']; ?>" data-idlagi="<?php echo $row['job_assign']; ?>" data-idagain="<?php echo $row['requested_date']; ?>" class='<?php echo $row["job_status"]; ?>' data-bs-toggle="modal" data-bs-target="#JobListingPopup" class="joblistPopup">
                                                <p style="cursor:pointer; text-decoration: underline; text-align: left; padding-left: 40px; height: 34px; font-weight: 400;" data-id="<?php echo $row['jobregister_id']; ?>" data-idupdate="<?php echo $row['customer_name']; ?>" data-idlagi="<?php echo $row['job_assign']; ?>" data-idagain="<?php echo $row['requested_date']; ?>" class='JobInfo'><?php echo $row["job_order_number"]; ?>
                                                </p>
                                            </td>
                                            <td id="<?php echo $row["job_status"]; ?>"><?php echo $row["job_priority"]; ?></td>
                                            <td id="<?php echo $row["job_status"]; ?>"><?php echo $row["job_status"]; ?></td>
                                            <td id="<?php echo $row["job_status"]; ?>"><?php echo $row["customer_name"]; ?></td>
                                            <td id="<?php echo $row["job_status"]; ?>"><?php echo $row["job_name"]; ?></td>
                                            <td id="<?php echo $row["job_status"]; ?>"><?php echo $row["machine_code"]; ?></td>
                                            <td id="<?php echo $row["job_status"]; ?>">
                                                <select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; width: 105px; outline: none; font-size: 13px;" onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['jobregister_id'] ?>')">
                                                    <option value=""><?php echo $row['job_assign'] ?></option>
                                                    <?php
                                                    include "dbconnect.php";  // Using database connection file here

                                                    $records = mysqli_query(
                                                        $conn,
                                                        "SELECT * FROM staff_register WHERE
                                                            technician_rank = '1st Leader' AND tech_avai = '0'
                                                                OR
                                                            technician_rank = '2nd Leader' AND tech_avai = '0'
                                                                OR
                                                            staff_position='storekeeper' AND tech_avai = '0' 
                                                         ORDER BY staffregister_id ASC"
                                                    );

                                                    while ($data = mysqli_fetch_array($records)) {
                                                        echo "<option value='" . $data['username'] . "'>" . $data['username'] . "      -      " . $data['technician_rank'] . "</option>";  // displaying data in option menu
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="6">No records found...</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function status_update(value, jobregister_id) {
                    //alert(id);
                    let url = "adminjoblisting.php";
                    window.location.href = url + "?jobregister_id=" + jobregister_id + "&job_assign=" + value;
                }
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('table').DataTable({
                        responsive: true,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search"
                        },
                        pagingType: 'full_numbers'
                    });
                });
            </script>
            <!-- Job Listing Popup Modal -->
            <div class="modal fade" id="JobListingPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="tab-buttons container px-auto" role="tablist">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn tab-button active" data-bs-target="#tab1" aria-controls="tab1" aria-selected="true" id="jobInfoTab" style="border: none; font-weight: bold;">Job Info</button>
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn tab-button" data-bs-target="#tab2" aria-controls="tab2" aria-selected="false" id="AssistantsTab" style="border: none; font-weight: bold; white-space: nowrap;">Assistants</button>
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn tab-button" data-bs-target="#tab3" aria-controls="tab3" aria-selected="false" id="updateTab" style="border: none; font-weight: bold; white-space: nowrap;">Update</button>
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn tab-button" data-bs-target="#tab4" aria-controls="tab4" aria-selected="false" id="accessoryTab" style="border: none; font-weight: bold;">Accessory</button>
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn tab-button" data-bs-target="#tab5" aria-controls="tab5" aria-selected="false" id="photoTab" style="border: none; font-weight: bold;">Photo</button>
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn tab-button" data-bs-target="#tab6" aria-controls="tab6" aria-selected="false" id="videoTab" style="border: none; font-weight: bold;">Video</button>
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn tab-button" data-bs-target="#tab7" aria-controls="tab7" aria-selected="false" id="reportTab" style="border: none; font-weight: bold;">Report</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="tab-content">
                                <!--Job Info Tab-->
                                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1" style="color: black;">
                                    <form action="homeindex.php" method="post">
                                        <div class="info-details">

                                        </div>
                                    </form>
                                </div>
                                <!-- Job Info for jobinfo -->
                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('.joblistPopup').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            // AJAX request
                                            $.ajax({
                                                url: 'AdminJoblistingJobinfo.php',
                                                type: 'post',
                                                data: {
                                                    jobregister_id: jobregister_id
                                                },
                                                success: function(response) {
                                                    // Add response in Modal body
                                                    $('.info-details').html(response);
                                                }
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tabButtonsTech = document.querySelectorAll('.tab-buttons .tab-button');
                    
                    tabButtonsTech.forEach((button) => {
                        button.addEventListener('click', (event) => {
                            event.preventDefault();
                            
                            const targetTab = button.getAttribute('data-bs-target');
                            const jobregisterId = button.getAttribute('data-jobregister-id');
                            const modal = new bootstrap.Modal(document.querySelector(targetTab));
                            
                            document.querySelectorAll('.tab-pane').forEach((pane) => {
                                pane.classList.remove('show', 'active');
                            });
                            
                            document.querySelector(targetTab).classList.add('show', 'active');
                            
                            tabButtonsTech.forEach((btn) => {
                                btn.classList.remove('active');
                            });
                            
                            button.classList.add('active');
                        });
                    });
                    
                    const todoElements = document.querySelectorAll('.todo.card-body[data-jobregister-id]');
                    
                    todoElements.forEach((todoElement) => {
                        todoElement.addEventListener('click', () => {
                            const jobregisterId = todoElement.getAttribute('data-jobregister-id');
                            const modal = new bootstrap.Modal(document.getElementById('techPopup'));
                            modal.show();
                        });
                    });
                });
            </script>
            
            <!-- Job Listing Pop Up Modal -->
            <div id="doubleClick-info" class="modal">
                <div class="tabInfo">

                    <!-- Job Listing Job Info Tab -->
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

                  


                    <!-- Job Listing Assistant Tab -->
                    <input type="radio" name="tabDoingInfo" id="tabDoingInfo2">
                    <label for="tabDoingInfo2" class="tabHeadingInfo">Assistants</label>
                    <div class="tab" id="JobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                        <form method="post">
                            <div class="info-assistant">

                            </div>
                        </form>
                    </div>

                    <!-- Assistant for Pending status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Pending', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingJobassign.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-assistant').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Assistant for Doing status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Doing', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingJobassignAssistant.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-assistant').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Assistant for Incomplete status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Incomplete', function() {
                                // $('.JobInfo').click(function () {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingJobassign.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-assistant').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Assistant for Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Ready', function() {
                                // $('.JobInfo').click(function () {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingJobassign.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-assistant').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Assistant for Not Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Not Ready', function() {
                                // $('.JobInfo').click(function () {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingJobassign.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-assistant').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Assistant for job info -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.JobInfo', function() {
                                // $('.JobInfo').click(function () {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingJobassign.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-assistant').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Job Listing Update Tab -->
                    <input type="radio" name="tabDoingInfo" id="tabDoingInfo3">
                    <label for="tabDoingInfo3" class="tabHeadingInfo">Update</label>
                    <div class="tab" id="JobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                        <form action="AdminJoblistingUpdate.php" method="post">
                            <div class="info-update">

                            </div>
                        </form>
                    </div>

                    <!-- Update for pending status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Pending', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingUpdate.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-update').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Update for Doing status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Doing', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingUpdate.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-update').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Update for Incomplete status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Incomplete', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingUpdate.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-update').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Update for Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingUpdate.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-update').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Update for Not Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Not Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingUpdate.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-update').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Update for JobInfo -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.JobInfo', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'AdminJoblistingUpdate.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-update').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Job Listing Accessories Tab -->
                    <input type="radio" name="tabDoingInfo" id="tabDoingInfo4">
                    <label for="tabDoingInfo4" class="tabHeadingInfo">Accessories</label>
                    <div class="tab" id="JobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                        <form action="ajaxtabaccessories.php" method="post">
                            <div class="info-accessories">

                            </div>
                        </form>
                    </div>

                    <!-- Accessories Tab for doing status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Doing', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtabaccessories.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-accessories').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Accessories Tab for Pending status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Pending', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtabaccessories.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-accessories').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Accessories Tab for Incomplete status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Incomplete', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtabaccessories.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-accessories').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Accessories Tab for Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtabaccessories.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-accessories').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Accessories Tab for Not Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Not Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtabaccessories.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-accessories').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Accessories Tab for JobInfo -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            //  $("th").click(function() {
                            $('body').on('click', '.JobInfo', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtabaccessories.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-accessories').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Job Listing Photo Tab -->
                    <input type="radio" name="tabDoingInfo" id="tabDoingInfo5">
                    <label for="tabDoingInfo5" class="tabHeadingInfo">Photo</label>
                    <div class="tab" id="JobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                        <form action="ajaxtechphtoupdt.php" method="post">
                            <div class="info-photos">

                            </div>
                        </form>
                    </div>

                    <!-- Photo Tab for Doing status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Doing', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechphtoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-photos').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Photo Tab for Pending status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Pending', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechphtoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-photos').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Photo Tab for Incomplete status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Incomplete', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechphtoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-photos').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Photo Tab for Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechphtoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-photos').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Photo Tab for Not Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Not Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechphtoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-photos').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Photo Tab for JobInfo -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            // $("th").click(function() {
                            $('body').on('click', '.JobInfo', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechphtoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-photos').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Job Listing Video Tab -->
                    <input type="radio" name="tabDoingInfo" id="tabDoingInfo6">
                    <label for="tabDoingInfo6" class="tabHeadingInfo">Video</label>
                    <div class="tab" id="JobInfoTab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                        <form action="ajaxtechvideoupdt.php" method="post">
                            <div class="info-video">

                            </div>
                        </form>
                    </div>

                    <!-- Video Tab for Doing status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Doing', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechvideoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-video').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Video Tab for Pending status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Pending', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechvideoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-video').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Video Tab for Incomplete status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Incomplete', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechvideoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-video').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Video Tab for Not Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Not Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechvideoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-video').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Video Tab for Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechvideoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-video').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Video Tab for JobInfo -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            //  $("th").click(function() {
                            $('body').on('click', '.JobInfo', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechvideoupdt.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-video').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Job Listing Report Tab -->
                    <input type="radio" name="tabDoingInfo" id="tabDoingInfo8">
                    <label for="tabDoingInfo8" class="tabHeadingInfo">Report</label>
                    <div class="tab">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
                        <form action="ajaxreportadmin.php" method="post">
                            <div class="info-report">

                            </div>
                        </form>
                    </div>

                    <!-- Report Tab for Doing status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Doing', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Report Tab for Pending status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Pending', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Report Tab for Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Report Tab for Not Ready status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Not Ready', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Report Tab for Incomplete status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Incomplete', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Report Tab for Completed status -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            $('body').on('click', '.Completed', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>

                    <!-- Report Tab for JobInfo -->
                    <script type='text/javascript'>
                        $(document).ready(function() {
                            //  $("p").click(function() {
                            $('body').on('click', '.JobInfo', function() {
                                var jobregister_id = $(this).data('id');
                                // AJAX request
                                $.ajax({
                                    url: 'ajaxreportadmin.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
                                    },
                                    success: function(response) {
                                        // Add response in Modal body
                                        $('.info-report').html(response);
                                        // Display Modal
                                        $('#doubleClick-info').modal('show');
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>


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
                    var tabRadioButtons = document.getElementsByClassName("tabbutton");
                    
                    for (var i = 0; i < tabRadioButtons.length; i++) {
                        tabRadioButtons[i].checked = false;
                    }
                    
                    var tabContents = document.getElementsByClassName("tab");
                    
                    for (var i = 0; i < tabContents.length; i++) {
                        tabContents[i].style.display = "none";
                    }
                }
                
                function openPopup(popupId) {
                    resetTabs();
                    
                    document.getElementById(popupId).style.display = "block";
                    document.body.classList.add("popup-open");
                    
                    var firstTabRadio = document.getElementById("tabDoing");
                    var firstTabContent = document.getElementById("StaffJobInfoTab");
                    
                    if (firstTabRadio && firstTabContent) {
                        firstTabRadio.checked = true;
                        firstTabContent.style.display = "block";
                    }
                }
                
                function openTab(tabId) {
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

            <!-- Script -->

        </section>
        <script src="assets/js/main.js"></script>
    </main>
</body>

</html>