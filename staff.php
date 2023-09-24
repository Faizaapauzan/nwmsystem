<?php
    
    session_start();
    
    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");
    }
    
    if (!isset($_SESSION['username'])) {
        header("location: index.php?error=login");
    } 
    
    elseif ($_SESSION['staff_position'] != 'Admin' && $_SESSION['staff_position'] != 'Manager') {
        header("location: index.php?error=permission");
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Staff List</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>

    <body>
        <!--========== HEADER ==========-->
        <script>
            $(document).ready(function() {
                function toggleMobileView() {
                    if (window.innerWidth <= 768) {
                        $('#home').attr('href', '#');
                        $('#home').off('click');
                        $('#home').click(function(e) {
                            e.preventDefault();
                            
                            if ($('#mobile-view').css('display') === 'none'){
                                $('#mobile-view').css('display', 'block');
                            }
                            
                            else {
                                $('#mobile-view').css('display', 'none');
                            }
                        });
                    }
                    
                    else {
                        $('#home').attr('href', 'Adminhomepage.php');
                        $('#home').off('click');
                    }
                }
                
                toggleMobileView();
                
                $(window).resize(function() {
                    toggleMobileView();
                });
            });
        </script>
        
        <header class="header">
            <div class="header__container">
                <div class="header__search">
                    <div class="dropdown1">
                        <a href="Adminhomepage.php" id="home" style="font-weight: bold; font-size:25px; color:black;">Home</a>
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
            
            <div class="mobile-view" id="mobile-view">
                <div class="dropdown-content2" id="dropdown-content2">
                    <a href="Adminhomepage.php">Home</a>
                    <a href="AdminJobTable.php">Table View</a>
                    <a href="adminjoblisting.php">List View</a>
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
                <!-- Add Modal -->
                <div class="modal fade" id="staffAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Register New Staff</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="addStaff">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="staff_fullname" class="form-control" autocomplete="off" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Employee ID</label>
                                            <input type="text" name="employee_id" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="staff_phone" class="form-control" />
                                        </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="staff_email" class="form-control" />
                                        </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="">Department</label>
                                            <select name="staff_department" class="form-select">
                                                <option selected></option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="Management">Management</option>
                                                <option value="Store">Store</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Group</label>
                                            <select name="staff_group" class="form-select">
                                                <option selected></option>
                                                <option value="Technician">Technician</option>
                                                <option value="Management">Management</option>
                                                <option value="Storekeeper">Storekeeper</option>
                                            </select>
                                        </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="">Position</label>
                                            <select name="staff_position" class="form-select">
                                                <option selected></option>
                                                <option value="Leader">Leader</option>
                                                <option value="Assistant Leader">Assistant Leader</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Storekeeper">Storekeeper</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="">Technician Group</label>
                                            <select name="technician_group" class="form-select">
                                                <option selected></option>
                                                <option value="1st Leader">1st Leader</option>
                                                <option value="2nd Leader">2nd Leader</option>
                                                <option value="Assistant Leader">Assistant Leader</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Technician Rank</label>
                                            <select name="technician_rank" class="form-select">
                                                <option selected></option>
                                                <option value="1st Leader">1st Leader</option>
                                                <option value="2nd Leader">2nd Leader</option>
                                                <option value="Assistant Leader">Assistant Leader</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" class="form-control" autocomplete="off" />
                                        </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="password" class="form-control" autocomplete="off" />
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="staffregistercreated_by" value="<?php echo $_SESSION["username"] ?>">
                                            <input type="hidden" name="staffregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
                                        <?php } ?>
                                    </div>
                                    <div id="errorMessage" class="alert alert-warning d-none" style="text-align: center;"></div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- View Modal -->
                <div class="modal fade" id="staffViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Staff Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">ID</label>
                                        <p id="view_ID" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Employee ID</label>
                                        <p id="view_employeeID" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Username</label>
                                        <p id="view_username" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Name</label>
                                        <p id="view_name" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Phone Number</label>
                                        <p id="view_phone" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Email</label>
                                        <p id="view_email" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Department</label>
                                        <p id="view_department" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Group</label>
                                        <p id="view_group" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Position</label>
                                        <p id="view_position" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Technician Rank</label>
                                        <p id="view_techRank" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Register By</label>
                                        <p id="view_registerBy" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Register At</label>
                                        <p id="view_registerAt" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Modify By</label>
                                        <p id="view_lastModifyBy" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Modify At</label>
                                        <p id="view_lastModifyAt" class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Modal -->
                <div class="modal fade" id="staffEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Staff Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="updateStaff">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="staffregister_id" id="staffregister_id" >
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="staff_fullname" id="staff_fullname" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Employee ID</label>
                                            <input type="text" name="employee_id" id="employee_id" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="staff_phone" id="staff_phone" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="staff_email" id="staff_email" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Department</label>
                                            <select name="staff_department" id="staff_department" class="form-select">
                                                <option selected></option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="Management">Management</option>
                                                <option value="Store">Store</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Staff Group</label>
                                            <select name="staff_group" id="staff_group" class="form-select">
                                                <option selected></option>
                                                <option value="Technician">Technician</option>
                                                <option value="Management">Management</option>
                                                <option value="Storekeeper">Storekeeper</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Position</label>
                                            <select name="staff_position" id="staff_position" class="form-select">
                                                <option selected></option>
                                                <option value="Leader">Leader</option>
                                                <option value="Assistant Leader">Assistant Leader</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Storekeeper">Storekeeper</option>
                                                <option value="Manager">Manager</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Technician Group</label>
                                            <select name="technician_group" id="technician_group" class="form-select">
                                                <option selected></option>
                                                <option value="1st Leader">1st Leader</option>
                                                <option value="2nd Leader">2nd Leader</option>
                                                <option value="Assistant Leader">Assistant Leader</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Technician Rank</label>
                                            <select name="technician_rank" id="technician_rank" class="form-select">
                                                <option selected></option>
                                                <option value="1st Leader">1st Leader</option>
                                                <option value="2nd Leader">2nd Leader</option>
                                                <option value="Assistant Leader">Assistant Leader</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" />
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="password" id="password" class="form-control" />
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="staffregisterlastmodify_by" id="staffregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
                                        <?php } ?>
                                    </div>
                                    <div id="errorMessageUpdate" class="alert alert-warning d-none" style="text-align: center;"></div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <p style="text-align: center;">Are you sure you want to delete this staff?</p>
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
                        <h4>Staff List<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staffAddModal">Register</button></h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="staffListTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th style='text-align: center;'></th>
                                        <th style='text-align: center;'>Name</th>
                                        <th style='text-align: center; white-space: nowrap;'>Employee ID</th>
                                        <th style='text-align: center;'>Position</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    
                                    require 'dbconnect.php';
                                
                                    $query = "SELECT * FROM staff_register ORDER BY staff_position";
                                    $query_run = mysqli_query($conn, $query);

                                    $counter = 1;
                                
                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $staff) {
                                ?>
                            
                                <tr>
                                    <td style='text-align: center;'><?= $counter ?></td>
                                    <td><?= $staff['staff_fullname'] ?></td>
                                    <td style='text-align: center;'><?= $staff['employee_id'] ?></td>
                                    <td style='text-align: center;'><?= $staff['staff_position'] ?></td>
                                    <td style='text-align: center; white-space: nowrap;'>
                                        <button type="button" value="<?=$staff['staffregister_id'];?>" class="viewStaffBtn btn btn-info btn-sm">View</button>
                                        <button type="button" value="<?=$staff['staffregister_id'];?>" class="editStaffBtn btn btn-success btn-sm">Update</button>
                                        <button type="button" value="<?=$staff['staffregister_id'];?>" class="deleteStaffBtn btn btn-danger btn-sm">Delete</button>
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
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
                
                <script>
                    $(document).ready(function(){
                        $('#staffListTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                    });
                </script>
                
                <script>
                    // <!-- Add -->
                    $(document).on('submit', '#addStaff', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("save_staff", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "staffCode.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 422) {
                                    $('#errorMessage').removeClass('d-none');
                                    $('#errorMessage').text(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#errorMessage').addClass('d-none');
                                    $('#addStaff')[0].reset();
                                    $('#staffAddModal').modal('hide');
                                    
                                    alertify.set('notifier', 'position', 'top-right');
                                    alertify.success(res.message);
                                    
                                    setTimeout(function() {
                                        location.reload();
                                    }, 700);
                                }
                                
                                else if(res.status == 500) {
                                    alert(res.message);
                                }
                            }
                        });
                    });

                    // <!-- View -->
                    $(document).on('click', '.viewStaffBtn', function () {
                        var staffregister_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "staffCode.php?staffregister_id=" + staffregister_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.staffregister_id);
                                    $('#view_username').text(res.data.username);
                                    $('#view_name').text(res.data.staff_fullname);
                                    $('#view_employeeID').text(res.data.employee_id);
                                    $('#view_phone').text(res.data.staff_phone);
                                    $('#view_email').text(res.data.staff_email);
                                    $('#view_department').text(res.data.staff_department);
                                    $('#view_position').text(res.data.staff_position);
                                    $('#view_group').text(res.data.staff_group);
                                    $('#view_techRank').text(res.data.technician_rank);
                                    $('#view_registerBy').text(res.data.staffregistercreated_by);
                                    $('#view_registerAt').text(res.data.staffregistercreated_at);
                                    $('#view_lastModifyBy').text(res.data.staffregisterlastmodify_by);
                                    $('#view_lastModifyAt').text(res.data.staffregisterlastmodify_at);

                                    $('#staffViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Update -->
                    $(document).on('click', '.editStaffBtn', function () {
                        var staffregister_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "staffCode.php?staffregister_id=" + staffregister_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#staffregister_id').val(res.data.staffregister_id);
                                    $('#staff_fullname').val(res.data.staff_fullname);
                                    $('#employee_id').val(res.data.employee_id);
                                    $('#staff_phone').val(res.data.staff_phone);
                                    $('#staff_email').val(res.data.staff_email);
                                    $('#staff_department').val(res.data.staff_department);
                                    $('#staff_position').val(res.data.staff_position);
                                    $('#staff_group').val(res.data.staff_group);
                                    $('#technician_group').val(res.data.technician_group);
                                    $('#technician_rank').val(res.data.technician_rank);
                                    $('#username').val(res.data.username);
                                    $('#password').val(res.data.password);
                                    $('#staffregisterlastmodify_by').val(res.data.staffregisterlastmodify_by);
                                    
                                    $('#staffEditModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    $(document).on('submit', '#updateStaff', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("update_staff", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "staffCode.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if (res.status == 422) {
                                    $('#errorMessageUpdate').removeClass('d-none');
                                    $('#errorMessageUpdate').text(res.message);
                                } 
                                
                                else if (res.status == 200) {
                                    $('#errorMessageUpdate').addClass('d-none');
                                    $('#updateStaff')[0].reset();
                                    $('#staffEditModal').modal('hide');
                                    
                                    alertify.set('notifier', 'position', 'top-right');
                                    alertify.success(res.message);
                                    
                                    setTimeout(function() {
                                        location.reload();
                                    }, 700);
                                } 
                                
                                else if (res.status == 500) {
                                    alert(res.message);
                                }
                            }
                        });
                    });
                    
                    // <!-- Delete -->
                    $(document).on('click', '.deleteStaffBtn', function() {
                        var staffregister_id = $(this).val();
                        
                        $('#confirmDeleteBtn').val(staffregister_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var staffregister_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "staffCode.php",
                            data: {'delete_staff': true,
                                   'staffregister_id': staffregister_id},
                                    
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