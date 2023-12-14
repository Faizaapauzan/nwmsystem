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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Attendance</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>

    <style>
        ::-webkit-scrollbar {display: none;}
              
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
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="Adminhomepage.php" class="nav__link nav__logo">
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
                                        <a href="AccessoryInOut.php" class="nav__dropdown-item" style="white-space: nowrap;">Accessories In/Out</a>
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
        <main>
            <section>  
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <p style="text-align: center;">Are you sure you want to delete this record?</p>
                            </div>
                            
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Attendance</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="attendanceTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center; white-space: nowrap;'>Date</th>
                                        <th style='text-align: center; white-space: nowrap;'>Technician</th>
                                        <th style='text-align: center;'>Assistant</th>
                                        <th style='text-align: center; white-space: nowrap;'>Clock In</th>
                                        <th style='text-align: center; white-space: nowrap;'>Clock Out</th>
                                        <th style='text-align: center; white-space: nowrap;'>Rest In</th>
                                        <th style='text-align: center; white-space: nowrap;'>Rest Out</th>
                                        <th style='text-align: center; white-space: nowrap;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    
                                    require 'dbconnect.php';
                                
                                    $query = "SELECT * FROM tech_update ORDER BY techupdate_id DESC";
                                    $query_run = mysqli_query($conn, $query);

                                    $counter = 1;
                                
                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $staff) {
                                ?>
                            
                                <tr>
                                    <td style='text-align: center; vertical-align: middle;'><?= $counter ?></td>
                                    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $staff['techupdate_date'] ?></td>
                                    <td style='text-align: center; vertical-align: middle;'><?= $staff['tech_leader'] ?></td>
                                    <td style='text-align: center; vertical-align: middle;'><?= nl2br($staff['username']) ?></td>
                                    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $staff['tech_clockin'] ?></td>
                                    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $staff['tech_clockout'] ?></td>
                                    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $staff['technician_out'] ?></td>
                                    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'><?= $staff['technician_in'] ?></td>
                                    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>
                                        <button type="button" value="<?=$staff['techupdate_id'];?>" class="deleteAttendanceBtn btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                                <?php $counter++; } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </br>
                
                <!--========== JS ==========-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
                
                <script>
                    $(document).ready(function(){
                        $('#attendanceTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                    });
                </script>
                
                <script> 
                    // <!-- Delete -->
                    $(document).on('click', '.deleteAttendanceBtn', function() {
                        var techupdate_id = $(this).val();
                        
                        $('#confirmDeleteBtn').val(techupdate_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var techupdate_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "attendanceadminCode.php",
                            data: {'delete_attendance': true,
                                       'techupdate_id': techupdate_id},
                                    
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                if (res.status == 500) {
                                    alert(res.message);
                                }
                                
                                else {
                                    $('#errorMessage').addClass('d-none');
                                    $('#deleteConfirmationModal').modal('hide');
                                    
                                    alertify.set('notifier', 'position', 'top-right');
                                    alertify.success(res.message);
                                
                                    setTimeout(function() {
                                        location.reload();
                                    }, 700);
                                }
                            }
                        });
                    });
                </script>
            </section>
        </main>        
    </body>
    </html>