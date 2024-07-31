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

        <title>Job Type</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
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

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-group nav__icon'></i>
                                    <span class="nav__name">Machine</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="machine.php" class="nav__dropdown-item">Machine</a>
                                        <a href="machineBrand.php" class="nav__dropdown-item">Machine Brand</a>
                                        <a href="machineType.php" class="nav__dropdown-item">Machine Type</a>
                                    </div>
                                </div>
                            </div>

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
                                        <a href="technicianJobDaily.php" class="nav__dropdown-item">Daily Job</a>
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
                <div class="modal fade" id="jobAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Job Type</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="saveJobType">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="">Job Code</label>
                                            <input type="text" name="job_code" class="form-control" />
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="">Job Name</label>
                                            <input type="text" name="job_name" class="form-control" />
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Job Description</label>
                                            <input type="text" name="job_description" class="form-control" />
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="jobtypecreated_by" value="<?php echo $_SESSION["username"] ?>">
                                            <input type="hidden" name="jobtypelastmodify_by" value="<?php echo $_SESSION["username"] ?>">
                                        <?php } ?>
                                    </div>
                                    <div id="errorMessage" class="alert alert-warning d-none" style="text-align: center;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- View Modal -->
                <div class="modal fade" id="jobViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Job Type Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">ID</label>
                                        <p id="view_ID" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Code</label>
                                        <p id="view_TypeCode" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Name</label>
                                        <p id="view_TypeName" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Description</label>
                                        <p id="view_TypeDesc" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Created By</label>
                                        <p id="view_TypeCrBy" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Created At</label>
                                        <p id="view_TypeCrAt" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Last Modify By</label>
                                        <p id="view_TypeModBy" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Type Last Modify At</label>
                                        <p id="view_TypeModAt" class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Modal -->
                <div class="modal fade" id="jobEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Job Type Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="updateJobType">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="jobtype_id" id="jobtype_id" >
                                        
                                        <div class="mb-3">
                                            <label for="">Job Code</label>
                                            <input type="text" name="job_code" id="job_code" class="form-control" />
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Job Name</label>
                                            <input type="text" name="job_name" id="job_name" class="form-control" />
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Job Description</label>
                                            <input type="text" name="job_description" id="job_description" class="form-control" />
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="text" name="jobtypelastmodify_by" id="jobtypelastmodify_by" value="<?php echo $_SESSION["username"] ?>">
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
                                <p style="text-align: center;">Are you sure you want to delete this job type?</p>
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
                        <h4>Job Type List<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#jobAddModal">Add</button></h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="JobTypeList" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Name</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Code</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                    
                                    require 'dbconnect.php';
                                
                                    $query = "SELECT * FROM jobtype_list ORDER BY job_name";
                                    $query_run = mysqli_query($conn, $query);

                                    $counter = 1;
                                
                                    if(mysqli_num_rows($query_run) > 0) {
                                        foreach($query_run as $job) {
                                ?>
                            
                                <tr>
                                    <td style='text-align: center;'><?= $counter ?></td>
                                    <td><?= $job['job_name'] ?></td>
                                    <td style='text-align: center;'><?= $job['job_code'] ?></td>
                                    <td style='text-align: center; white-space: nowrap;'>
                                        <button type="button" value="<?=$job['jobtype_id'];?>" class="viewJobBtn btn btn-info btn-sm">View</button>
                                        <button type="button" value="<?=$job['jobtype_id'];?>" class="editJobBtn btn btn-success btn-sm">Update</button>
                                        <button type="button" value="<?=$job['jobtype_id'];?>" class="deleteJobBtn btn btn-danger btn-sm">Delete</button>
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
                        $('#JobTypeList').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                    });
                </script>
                
                <script>
                    // <!-- Add -->
                    $(document).on('submit', '#saveJobType', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("save_jobType", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "jobtypeCode.php",
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
                                    $('#saveJobType')[0].reset();
                                    $('#jobAddModal').modal('hide');

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
                    $(document).on('click', '.viewJobBtn', function () {
                        var jobtype_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "jobtypeCode.php?jobtype_id=" + jobtype_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.jobtype_id);
                                    $('#view_TypeCode').text(res.data.job_code);
                                    $('#view_TypeName').text(res.data.job_name);
                                    $('#view_TypeDesc').text(res.data.job_description);
                                    $('#view_TypeCrBy').text(res.data.jobtypecreated_by);
                                    $('#view_TypeCrAt').text(res.data.jobtypecreated_at);
                                    $('#view_TypeModBy').text(res.data.jobtypelastmodify_by);
                                    $('#view_TypeModAt').text(res.data.jobtypelastmodify_at);
                                    
                                    $('#jobViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Update -->
                    $(document).on('click', '.editJobBtn', function () {
                        var jobtype_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "jobtypeCode.php?jobtype_id=" + jobtype_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#jobtype_id').val(res.data.jobtype_id);
                                    $('#job_code').val(res.data.job_code);
                                    $('#job_name').val(res.data.job_name);
                                    $('#job_description').val(res.data.job_description);
                                    $('#jobtypelastmodify_by').val(res.data.jobtypelastmodify_by);
                                    
                                    $('#jobEditModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    $(document).on('submit', '#updateJobType', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("update_jobType", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "jobtypeCode.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 422) {
                                    $('#errorMessageUpdate').removeClass('d-none');
                                    $('#errorMessageUpdate').text(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#errorMessageUpdate').addClass('d-none');
                                    $('#updateJobType')[0].reset();
                                    $('#jobEditModal').modal('hide');

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
                    
                    // <!-- Delete -->
                    $(document).on('click', '.deleteJobBtn', function() {
                        var jobtype_id = $(this).val();
                        
                        $('#confirmDeleteBtn').val(jobtype_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var jobtype_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "jobtypeCode.php",
                            data: {'delete_jobType': true,
                                       'jobtype_id': jobtype_id},
                                    
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