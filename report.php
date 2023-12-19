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

        <title>Service Report</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
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
                <div class="modal fade" id="SReportViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <ul class="list-group flex-row" id="myTab" role="tablist">
                                    <li class="list-group-item" role="presentation" style="border: none;">
                                        <a class="nav-link active fw-bold" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Info</a>
                                    </li>
                    
                                    <li class="list-group-item" role="presentation" style="border: none;">
                                        <a class="nav-link fw-bold" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Media</a>
                                    </li>
                                </ul>
                
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="tab-content" id="myTabContent">
                                    <!-- Tab 1 Content -->
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab" style="color: black;">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">ID</label>
                                                <p id="view_ID" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Order Number</label></label>
                                                <p id="view_JON" class="form-control"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Customer Name</label>
                                                <p id="view_custName" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Contact Number</label>
                                                <p id="view_contNum" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Service Type</label>
                                                <p id="view_serType" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Service Engineer</label>
                                                <p id="view_serEng" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Job Status</label>
                                                <p id="view_jobStat" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Time At Site</label>
                                                <p id="view_TAS" class="form-control"></p>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="" class="fw-bold">Return Time</label>
                                                <p id="view_retTime" class="form-control"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Serial Number</label>
                                                <p id="view_serNum" class="form-control"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="fw-bold">Machine Name</label>
                                                <p id="view_machName" class="form-control"></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Tab 2 Content -->
                                    <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab" style="color: black;">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="view_image_container">
                                                    <img id="view_photo" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <p style="text-align: center;">Are you sure you want to delete this accessory?</p>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4>Service Report</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
                            <input type="text" id="min" name="min" placeholder="Start Date" class="form-control border border-dark">
                            <input type="text" id="max" name="max" placeholder="End Date" class="form-control border border-dark">
                            
                            <button type="reset" id="refreshButton" class="btn btn-primary" style="background-color: #1a0845; color: white; border:none;" onclick="document.location='report.php'">Refresh</button>
                        </div>

                        <div class="table-responsive">
                            <table id="serviceReportTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center; white-space: nowrap;'>Job Order Number</th>
                                        <th style='text-align: center; white-space: nowrap;'>Customer Name</th>
                                        <th style='text-align: center; white-space: nowrap;'>Requested Date</th>
                                        <th style='text-align: center; white-space: nowrap;'>Report Date</th>
                                        <th style='text-align: center; white-space: nowrap;'>Service Report Number</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                        require 'dbconnect.php';
                                        
                                        $query = "SELECT * FROM job_register 
                                                  INNER JOIN servicereport 
                                                  ON job_register.jobregister_id = servicereport.jobregister_id 
                                                  ORDER BY job_register.job_order_number DESC";
                                        $query_run = mysqli_query($conn, $query);

                                        $counter = 1;
                                
                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $job) {
                                    ?>
                                    <tr>
                                        <td style='text-align: center; white-space: nowrap;'><?= $counter ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['job_order_number'] ?></td>
                                        <td><?= $job['customer_name'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['requested_date'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['date'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'><?= $job['srvcreportnumber'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'>
                                            <button type="button" value="<?=$job['servicereport_id'];?>" class="viewSReportBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$job['servicereport_id'];?>" data-id2="<?=$job['jobregister_id'];?>" class="printSReportBtn btn btn-success btn-sm">Print</button>
                                            <button type="button" value="<?=$job['servicereport_id'];?>" class="deleteSReportBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php $counter++; } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!--========== JS ==========-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
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
                
                <script>
                    $(document).ready(function(){
                        let table = $('#serviceReportTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                        
                        let minDate, maxDate;
 
                        DataTable.ext.search.push(function (settings, data, dataIndex) {
                            let min = minDate.val();
                            let max = maxDate.val();
                            let parts = data[4].split("-");
                            var formattedDate = new Date(parts[2], parts[1] - 1, parts[0]);
                            let date = new Date(formattedDate);
                        
                            if ((min === null && max === null) ||
                                (min === null && date <= max) ||
                                (min <= date && max === null) ||
                                (min <= date && date <= max)) {
                                    return true;
                            }
                            
                            return false;
                        });

                        minDate = new DateTime('#min', {
                            format: 'DD/MM/YYYY'
                        });
                        
                        maxDate = new DateTime('#max', {
                            format: 'DD/MM/YYYY'
                        });
                        
                        document.querySelectorAll('#min, #max').forEach((el) => {
                            el.addEventListener('change', () => table.draw());
                        });
                    });
                </script>
                
                <script>
                    // <!-- View -->
                    $(document).on('click', '.viewSReportBtn', function () {
                        var servicereport_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "reportCode.php?servicereport_id=" + servicereport_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.servicereport_id);
                                    $('#view_JON').text(res.data.job_order_number);
                                    $('#view_custName').text(res.data.customer_name);
                                    $('#view_contNum').text(res.data.cust_phone1);
                                    $('#view_serType').text(res.data.job_name);
                                    $('#view_serEng').text(res.data.job_assign);
                                    $('#view_jobStat').text(res.data.job_status);
                                    $('#view_TAS').text(res.data.technician_arrival);
                                    $('#view_retTime').text(res.data.technician_leaving);
                                    $('#view_machName').text(res.data.machine_name);
                                    $('#view_serNum').text(res.data.serialnumber);

                                    // Media Tab
                                    var jobregister_id = res.data.jobregister_id;
                                    
                                    $.ajax({
                                        type: "GET",
                                        url: "reportCode.php?jobregister_id=" + jobregister_id,
                                        
                                        success: function (imgresponse) {
                                            var imageResponse = jQuery.parseJSON(imgresponse);
                                            console.log("Tab 2 Response: ", imageResponse);
                                            console.log(imageResponse.data);

                                            if (imageResponse.data) {
                                                $('#view_photo').attr('src', "image/" + imageResponse.data);
                                                $('#view_image_container').show();
                                            }
                                            
                                            else {
                                                $('#view_image_container').hide();
                                            }
                                            
                                            $('#SReportViewModal').modal('show');
                                        }
                                    });
                                }
                            }
                        });
                    });

                    // <!-- Print Report -->
                    $(document).ready(function() {
                        $('.printSReportBtn').click(function() {
                            var servicereport_id = $(this).val();
                            var jobregister_id = $(this).data('id2');
                            
                            $.ajax({
                                url: 'servicereportADMIN.php',
                                type: 'post',
                                data: {servicereport_id: servicereport_id,
                                         jobregister_id: jobregister_id},
                                         
                                success: function(data) {
                                    var win = window.open('servicereportADMIN.php');
                                    win.document.write(data);
                                }
                            });
                        });
                    });

                    // <!-- Delete -->
                    $(document).on('click', '.deleteSReportBtn', function() {
                        var servicereport_id = $(this).val();
                        
                        $('#confirmDeleteBtn').val(servicereport_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var servicereport_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "reportCode.php",
                            data: {'delete_report': true,
                                 'servicereport_id': servicereport_id},
                                    
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