<?php
    
    session_start();
    
    if($_SESSION['staff_position']=="" ) {
        header("location:index.php?error");
    }
    
    if(!isset($_SESSION['username'])) {
        header("location:index.php?error");
	}

    elseif($_SESSION['staff_position']== 'Admin') {

    }
    
    elseif($_SESSION['staff_position']== 'Manager') {

    }
    
    else {
        header("location:index.php?error");
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Canceled Job</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
                <!-- View Modal -->
                <div class="modal fade" id="jobViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Job Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">ID</label>
                                        <p id="view_ID" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Order Number</label>
                                        <p id="view_JON" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Name</label>
                                        <p id="view_jobName" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Description</label>
                                        <p id="view_description" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Name</label>
                                        <p id="view_custName" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer PIC</label>
                                        <p id="view_PIC" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Machine Name</label>
                                        <p id="view_machName" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Assign</label>
                                        <p id="view_jobAss" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Requested Date</label>
                                        <p id="view_reqDate" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Register By</label>
                                        <p id="view_jobRegBy" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Job Register At</label>
                                        <p id="view_jobRegAt" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Modify By</label>
                                        <p id="view_lastModBy" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Modify At</label>
                                        <p id="view_lastModAt" class="form-control"></p>
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
                                <h5 class="modal-title" id="exampleModalLabel">Update Job Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="updateJob">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="jobregister_id" id="jobregister_id" >
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Job Order Number</label>
                                            <input type="text" name="job_order_number" id="job_order_number" class="form-control" disabled />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Job Name</label>
                                            <select type="text" name="job_name" id="job_name" style="width: 100%;" class="form-select" onchange="GetDetail(this.value)">
                                                <option value="">-- Select Job Name --</option>
                                                    <?php
                                                        
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT * FROM jobtype_list ORDER BY jobtype_id ASC");

                                                        while ($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='" . $data['job_name'] . "' data-jobDescription='". $data['job_description'] ."' data-jobCode='". $data['job_code'] ."'>" . $data['job_name'] . "</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>

                                        <script>
                                            $(document).ready(function(){
                                                $('#job_name').select2({
                                                    dropdownParent: $('#jobEditModal'),
                                                    theme: 'bootstrap-5'
                                                });
                                            });
                                        </script>
                                        
                                        <script>
                                            function GetDetail(value) {
                                                var selectedOption = document.querySelector('#job_name option[value="' + value + '"]');
                                                var jobDescription = selectedOption.getAttribute('data-jobDescription');
                                                var jobCode = selectedOption.getAttribute('data-jobCode');
                                                
                                                document.querySelector('input[name="job_description"]').value = jobDescription;
                                                document.querySelector('input[name="job_code"]').value = jobCode;
                                            }
                                        </script>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Job Description</label>
                                            <input type="text" name="job_description" id="job_description" class="form-control" />
                                            <input type="hidden" name="job_code" id="job_code" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Name</label>
                                            <input type="text" name="customer_name" id="customer_name" class="form-control" disabled />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer PIC</label>
                                            <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Machine Name</label>
                                            <input type="text" name="machine_name" id="machine_name" class="form-control" disabled />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Job Assign</label>
                                            <select type="text" name="job_assign" id="job_assign" style="width: 100%;" class="form-select">
                                                <option value="">-- Select Technician --</option>
                                                    <?php
                                                        
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE tech_avai = '0' 
                                                                                        AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                                                                        ORDER BY username ASC");

                                                        while ($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='" . $data['username'] . "'>" . $data['username'] . "</option>";
                                                        }
                                                     ?>
                                            </select>
                                        </div>

                                        <script>
                                            $(document).ready(function(){
                                                $('#job_assign').select2({
                                                    dropdownParent: $('#jobEditModal'),
                                                    theme: 'bootstrap-5'
                                                });
                                            });
                                        </script>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Requested Date</label>
                                            <input type="date" name="requested_date" id="requested_date" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Cancel Job</label>
                                            <select name="job_cancel" id="job_cancel" class="form-select">
                                                <option selected></option>
                                                <option value="YES">YES</option>
                                            </select>
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
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
                
                <!-- Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Canceled Job</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="jobCanceledTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Order Number</th>
                                        <th style='text-align: center; white-space: nowrap;'>Customer Name</th>
                                        <th style='text-align: center; white-space: nowrap;'>Requested Date</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    
                                        require 'dbconnect.php';
                                
                                        $query = "SELECT * FROM job_register WHERE (job_cancel = 'YES') ORDER BY requested_date DESC";
                                        $query_run = mysqli_query($conn, $query);

                                        $counter = 1;
                                
                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $job) {
                                    ?>
                            
                                    <tr>
                                        <td style='text-align: center;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['job_order_number'] ?></td>
                                        <td style='white-space: nowrap;'><?= $job['customer_name'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['requested_date'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'>
                                            <button type="button" value="<?=$job['jobregister_id'];?>" class="viewJobBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$job['jobregister_id'];?>" class="editJobBtn btn btn-success btn-sm">Update</button>
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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
                
                <script>
                    $(document).ready(function(){
                        $('#jobCanceledTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                    });
                </script>
                
                <script>
                    // <!-- View -->
                    $(document).on('click', '.viewJobBtn', function () {
                        var jobregister_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "jobcanceledCode.php?jobregister_id=" + jobregister_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.jobregister_id);
                                    $('#view_JON').text(res.data.job_order_number);
                                    $('#view_jobName').text(res.data.job_name);
                                    $('#view_description').text(res.data.job_description);
                                    $('#view_custName').text(res.data.customer_name);
                                    $('#view_PIC').text(res.data.customer_PIC);
                                    $('#view_machName').text(res.data.machine_name);
                                    $('#view_jobAss').text(res.data.job_assign);
                                    $('#view_reqDate').text(res.data.requested_date);
                                    $('#view_jobRegBy').text(res.data.jobregistercreated_by);
                                    $('#view_jobRegAt').text(res.data.jobregistercreated_at);
                                    $('#view_lastModBy').text(res.data.jobregisterlastmodify_by);
                                    $('#view_lastModAt').text(res.data.jobregisterlastmodify_at);
                                    
                                    $('#jobViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Update -->
                    $(document).on('click', '.editJobBtn', function () {
                        var jobregister_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "jobcanceledCode.php?jobregister_id=" + jobregister_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#jobregister_id').val(res.data.jobregister_id);
                                    $('#job_order_number').val(res.data.job_order_number);
                                    $('#job_name').val(res.data.job_name).trigger('change');
                                    $('#job_code').val(res.data.job_code);
                                    $('#job_description').val(res.data.job_description);
                                    $('#customer_name').val(res.data.customer_name);
                                    $('#customer_PIC').val(res.data.customer_PIC);
                                    $('#machine_name').val(res.data.machine_name);
                                    $('#job_assign').val(res.data.job_assign).trigger('change');
                                    $('#requested_date').val(res.data.requested_date);
                                    $('#job_cancel').val(res.data.job_cancel);
                                    $('#jobregisterlastmodify_by').val(res.data.jobregisterlastmodify_by);
                                    
                                    $('#jobEditModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    $(document).on('submit', '#updateJob', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("update_job", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "jobcanceledCode.php",
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
                                    $('#updateJob')[0].reset();
                                    $('#jobEditModal').modal('hide');
                                    
                                    alertify.set('notifier','position', 'top-right');
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
                </script>
            </section>
        </main>        
    </body>
    </html>