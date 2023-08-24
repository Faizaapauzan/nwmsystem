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
            
            <title>Sample</title>
            
            <!--========== CSS ==========-->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                    <!-- View Modal -->
                <div class="modal fade" id="entryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Item</label>
                                        <p id="view_accessoryname" class="form-control"></p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="">Technician</label>
                                        <p id="view_techname" class="form-control"></p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="">Out Date Time</label>
                                        <p id="view_accoutdatetime" class="form-control"></p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="">Quantity</label>
                                        <p id="view_quantity" class="form-control"></p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="">Remaining</label>
                                        <p id="view_balance" class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Remark -->
                <div class="modal fade" id="RemarkViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Remark</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="remarkContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    <!-- Table -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Accessory In/Out</h4>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="btn-group" role="group" aria-label="Table Switch">
                                    <button type="button" class="btn btn-outline-secondary rounded switch-table" style="margin-right: 10px;" data-table-id="myTable">Job Requirement</button>
                                    <button type="button" class="btn btn-outline-secondary rounded switch-table" data-table-id="myTable-2">Technician Request</button>
                                </div>

                                </br>
                                </br>
                                
                                <table id="myTable" class="display table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; white-space: nowrap;"></th>
                                            <th style="text-align: center; white-space: nowrap;">Job</th>
                                            <th style="text-align: center; white-space: nowrap;">Job Name</th>
                                            <th style="text-align: center; white-space: nowrap;">Customer</th>
                                            <th style="text-align: center; white-space: nowrap;">Technician</th>
                                            <th style="text-align: center; white-space: nowrap;">Item</th>
                                            <th style="text-align: center; white-space: nowrap;">Out Date</th>
                                            <th style="text-align: center; white-space: nowrap;">Quantity</th>
                                            <th style="text-align: center; white-space: nowrap;">Remaining</th>
                                            <th style="text-align: center; white-space: nowrap;">Remark</th>
                                            <th style="text-align: center; white-space: nowrap;">Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            
                                            require 'dbconnect.php';
                                            
                                            $query = "SELECT * FROM accessories_inout ORDER BY CreatedTime_inout";
                                            
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            $counter = 1;
                                            
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $entry) {
                                                    $query2 = "SELECT job_order_number, job_name, customer_name 
                                                               FROM accessories_inout, job_accessories, job_register 
                                                               WHERE accessories_inout.accessoriesname = '{$entry['accessoriesname']}' 
                                                               AND accessories_inout.accessoriesname = job_accessories.accessories_name 
                                                               AND job_accessories.jobregister_id=job_register.jobregister_id";
                                                    
                                                    $query_run2 = mysqli_query($conn, $query2);
                                                    
                                                    if (mysqli_num_rows($query_run2) > 0) {
                                                        $entry2 = mysqli_fetch_array($query_run2);
                                        ?>                                                
                                        <tr>
                                            <td style='text-align: center;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap'><?= $entry2['job_order_number'] ?></td>
                                            <td style='text-align: center;'><?= $entry2['job_name'] ?></td>
                                            <td style='text-align: center;'><?= $entry2['customer_name'] ?></td>
                                            <td style='text-align: center; white-space: nowrap;'><?= $entry['techname'] ?></td>
                                            <td><?= $entry['accessoriesname'] ?></td>
                                            <td style='white-space: nowrap;'><?= $entry['out_date'] ?></td>
                                            <td style='text-align: center;'><?= $entry['quantity'] ?></td>
                                            <td style='text-align: center;'><?= $entry['balance'] ?></td>
                                            <td style='text-align: center; white-space: nowrap;'>
                                                <button type='button' value='<?= $entry['inout_id'] ?>' class='RemarkBtn btn btn-warning btn-sm'>Remark</button>
                                            </td>
                                            <td style='text-align: center; white-space: nowrap;'>
                                                <button type='button' value='<?= $entry['inout_id'] ?>' class='viewEntryBtn btn btn-info btn-sm'>View</button>
                                            </td>
                                        </tr>
                                        <?php $counter++; } } } ?>
                                    </tbody>
                                </table>
                                
                                <table id="myTable-2" class="display table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; white-space: nowrap;"></th>
                                            <th style="text-align: center; white-space: nowrap;">Technician</th>
                                            <th style="text-align: center; white-space: nowrap;">Item</th>
                                            <th style="text-align: center; white-space: nowrap;">Out Date</th>
                                            <th style="text-align: center; white-space: nowrap;">Quantity</th>
                                            <th style="text-align: center; white-space: nowrap;">Remaining</th>
                                            <th style="text-align: center; white-space: nowrap;">Remark</th>
                                            <th style="text-align: center; white-space: nowrap;">Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <?php
                                            
                                            require 'dbconnect.php';
                                                    
                                            $query = "SELECT * FROM accessories_inout ORDER BY CreatedTime_inout";
                                                    
                                            $query_run = mysqli_query($conn, $query);

                                            $counter = 1;
                                            
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $entry) {
                                                    $query2 = "SELECT job_order_number, job_name, customer_name 
                                                               FROM accessories_inout, job_accessories, job_register 
                                                               WHERE accessories_inout.accessoriesname = '$entry[accessoriesname]' 
                                                               AND accessories_inout.accessoriesname = job_accessories.accessories_name 
                                                               AND job_accessories.jobregister_id=job_register.jobregister_id";
                                                            
                                                    $query_run2 = mysqli_query($conn, $query2);
                                                            
                                                    if (mysqli_num_rows($query_run2) == 0) {
                                                                
                                        ?>
                                        <tr>
                                            <td style='text-align: center;'><?= $counter ?></td>
                                            <td style='text-align: center; white-space: nowrap;'><?= $entry['techname'] ?></td>
                                            <td><?= $entry['accessoriesname'] ?></td>
                                            <td style='white-space: nowrap;'><?= $entry['out_date'] ?></td>
                                            <td style='text-align: center;'><?= $entry['quantity'] ?></td>
                                            <td style='text-align: center;'><?= $entry['balance'] ?></td>
                                            <td style='text-align: center; white-space: nowrap;'>
                                                <button type='button' value='<?= $entry['inout_id'] ?>' class='RemarkBtn btn btn-warning btn-sm'>Remark</button>
                                            </td>
                                            <td style='text-align: center; white-space: nowrap;'>
                                                <button type='button' value='<?= $entry['inout_id'] ?>' class='viewEntryBtn btn btn-info btn-sm'>View</button>
                                            </td>
                                        </tr>
                                        <?php $counter++; } } } ?>
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
                            var tables = {
                                'myTable': $('#myTable'),
                                'myTable-2': $('#myTable-2')
                            };
                            
                            $('table.display').DataTable({
                                responsive: true,
                                language: {search: "_INPUT_",
                                           searchPlaceholder: "Search"},
                                pagingType: 'full_numbers'
                            });
                            
                            for (var tableId in tables) {
                                if (tableId !== 'myTable') {
                                    tables[tableId].hide();
                                }
                            }
                            
                            $('#myTable-2_wrapper .dataTables_length, #myTable-2_wrapper .dataTables_filter, #myTable-2_wrapper .pagination, #myTable-2_wrapper .dataTables_info').hide();
                            
                            $('.switch-table').on('click', function() {
                                var tableId = $(this).data('table-id');
                                for (var id in tables) {
                                    if (id === tableId) {
                                        tables[id].show();
                                        $('#' + id + '_wrapper .dataTables_length, #' + id + '_wrapper .dataTables_filter, #' + id + '_wrapper .pagination, #' + id + '_wrapper .dataTables_info').show();
                                    } 
                                    
                                    else {
                                        tables[id].hide();
                                        $('#' + id + '_wrapper .dataTables_length, #' + id + '_wrapper .dataTables_filter, #' + id + '_wrapper .pagination, #' + id + '_wrapper .dataTables_info').hide();
                                    }
                                }
                            });
                        });
                    </script>
                    
                    <script>
                        // <!-- View -->
                        $(document).on('click', '.viewEntryBtn', function() {
                            var entry_id = $(this).val();
                            
                            $.ajax({
                            type: "GET",
                            url: "code.php?entry_id=" + entry_id,
                            
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                
                                if (res.status == 404) {
                                    alert(res.message);
                                } 
                                
                                else if (res.status == 200) {
                                    $('#view_accessoryname').text(res.data.accessoriesname);
                                    $('#view_techname').text(res.data.techname);
                                    $('#view_accoutdatetime').text(res.data.out_date);
                                    $('#view_quantity').text(res.data.quantity);
                                    $('#view_balance').text(res.data.balance);

                                    $('#entryViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                  
                    
                   
                    
                    // <!-- Remark -->
                    $(document).on('click', '.RemarkBtn', function() {
                        var entry_idRemark = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "code.php?entry_idRemark=" + entry_idRemark,
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                
                                if (res.status == 404) {
                                    alert(res.message);
                                } 
                                
                                else if (res.status == 200) {
                                    var remarks = res.data;
                                    
                                    $('#remarkContainer').empty();
                                    
                                    remarks.forEach(function(remark) {
                                        var inputGroup =
                                            '<div class="mb-3">' +
                                                '<div class="row">' +
                                                    '<div class="col-sm">' +
                                                        '<label for="Remark">Remark</label>' +
                                                        '<input type="text" value="' + remark.remark_note + '" style="background:none;" class="form-control" Readonly></input>' +
                                                        '</div>' +
                                                         
                                                    '<div class="col-sm" style="text-align:center;">' +
                                                        '<label for="Date">Date</label>' +
                                                        '<input type="text" value="' + remark.remark_date + '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                                    '</div>' +
                                                         
                                                    '<div class="col-sm-3" style="text-align:center;">' +
                                                        '<label for="Quantity">Quantity</label>' +
                                                        '<input type="text" value="' + remark.remark_quantity + '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                                    '</div>' +
                                                '</div>'
                                            '</div>';
                                                        
                                        $('#remarkContainer').append(inputGroup);
                                    });
                                    
                                    $('#RemarkViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Request -->
                    $(document).on('click', '.requestBtn', function() {
                        $.ajax({
                            type: "GET",
                            url: "code.php",
                            data: {'Request': true},
                            
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                
                                if (res.status == 404) {
                                    alert(res.message);
                                } 
                                
                                else if (res.status == 200) {
                                    var requests = res.data;
                                    
                                    $('#requestContainer').empty();
                                    
                                    requests.forEach(function(request) {
                                        var inputGroup =
                                            '<div class="mb-3"  id="request' + request.remarkid + '">' +
                                                '<div class="row d-flex flex-row">' +
                                                    '<div class="col-sm-4">' +
                                                        '<label for="request">Request</label>' +
                                                        '<input type="text" value="' + request.remark_note + '" style="background:none;" class="form-control" Readonly></input>' +
                                                    '</div>' +
                                                                
                                                    '<div class="col-sm-3" style="text-align:center;">' +
                                                        '<label for="item">Item</label>' +
                                                        '<input type="text" data-item-id="' + request.inout_id + '" class="form-control item-input" Readonly></input>' +
                                                    '</div>' +

                                                    '<div class="col-sm-3" style="text-align:center;">' +
                                                        '<label for="Date">Date</label>' +
                                                        '<input type="text" value="' + request.remark_date + '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                                    '</div>' +

                                                    '<div class="col-sm-2" style="text-align:center;">' +
                                                        '<label for="Quantity">Quantity</label>' +
                                                        '<input type="text" value="' + request.remark_quantity + '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                                    '</div>' +

                                                    '<div class="col-sm">' +
                                                        '<label for=""></label>' +
                                                        '<button id="acceptBtn" style="width: 70px; margin-left: 80%;height: 40px; background-color: green; color:white;" class="form-control" onclick="acceptRecord(' + request.remarkid + ')" style="width: 70px; color: white; background-color:green;">accept</button>' +
                                                    '</div>' +

                                                    '<div class="col-sm">' +
                                                        '<label for=""></label>' +
                                                        '<button id="rejectBtn" style="width: 70px; height: 40px; background-color: red; color:white;"class="form-control" onclick="rejectRecord(' + request.remarkid + ')" style="width: 70px; color: white; background-color:red;">reject</button>' +
                                                    '</div>'
                                                '</div>'
                                            '</div>';

                                        $('#requestContainer').append(inputGroup);
                                        fetchItemNames();
                                    });
                                
                                    $('#RequestModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    function fetchItemNames() {
                        var itemInputs = $('.item-input');
                        
                        itemInputs.each(function(index, element) {
                            var itemId = $(element).data('item-id');
                            
                            $.ajax({
                                type: "GET",
                                url: "code.php",
                                data: {'inout_id': itemId,
                                       'RequestItem': true},
                                       
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    
                                    if (res.status == 404) {
                                        alert(res.message);
                                    } 
                                    
                                    else if (res.status == 200) {
                                        $(element).val(res.accessoriesname);
                                    }
                                },
                                
                                error: function() {

                                }
                            });
                        });
                    }
                    
                   
                    
              
                </script>
            </section>
        </main>        
    </body>
    </html>