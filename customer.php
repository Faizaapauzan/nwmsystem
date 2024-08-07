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

        <title>Customer List</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                <div class="modal fade" id="customerAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="saveCustomer">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Code</label>
                                            <input type="text" name="customer_code" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Grade</label>
                                            <input type="text" name="customer_grade" class="form-control" />
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Name</label>
                                            <input type="text" name="customer_name" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Person In Charge</label>
                                            <input type="text" name="customer_PIC" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Address</label>
                                            <input type="text" name="cust_address1" class="form-control" />
                                            <input type="text" name="cust_address2" class="form-control" />
                                            <input type="text" name="cust_address3" class="form-control" />
                                        </div>
                                    
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Contact Number</label>
                                            <input type="text" name="cust_phone1" class="form-control" />
                                            <input type="text" name="cust_phone2" class="form-control" />
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="customercreated_by" value="<?php echo $_SESSION["username"] ?>">
                                            <input type="hidden" name="customerlasmodify_by" value="<?php echo $_SESSION["username"] ?>">
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
                <div class="modal fade" id="custViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Customer Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">ID</label>
                                        <p id="view_ID" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Name</label>
                                        <p id="view_name" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Code</label>
                                        <p id="view_code" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Grade</label>
                                        <p id="view_grade" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Address</label>
                                        <p id="view_address1" class="form-control"></p>
                                        <p id="view_address2" class="form-control"></p>
                                        <p id="view_address3" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Contact Number</label>
                                        <p id="view_phone1" class="form-control"></p>
                                        <p id="view_phone2" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Person In Charge</label>
                                        <p id="view_PIC" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Created By</label>
                                        <p id="view_custCreatedBy" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Created At</label>
                                        <p id="view_custCreatedAt" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Last Modify By</label>
                                        <p id="view_custLastModBy" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Last Modify By</label>
                                        <p id="view_custLastModAt" class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Modal -->
                <div class="modal fade" id="custEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Customer Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="updateCustomer">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="customer_id" id="customer_id" >
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Code</label>
                                            <input type="text" name="customer_code" id="customer_code" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Name</label>
                                            <input type="text" name="customer_name" id="customer_name" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Grade</label>
                                            <input type="text" name="customer_grade" id="customer_grade" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Person In Charge</label>
                                            <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Address</label>
                                            <input type="text" name="cust_address1" id="cust_address1" class="form-control" />
                                            <input type="text" name="cust_address2" id="cust_address2" class="form-control" />
                                            <input type="text" name="cust_address3" id="cust_address3" class="form-control" />
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="">Customer Contact Number</label>
                                            <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" />
                                            <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" />
                                        </div>

                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="customerlasmodify_by" id="customerlasmodify_by" value="<?php echo $_SESSION["username"] ?>">
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
                                <p style="text-align: center;">Are you sure you want to delete this customer?</p>
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
                        <h4>Customer List<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#customerAddModal">Add</button></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="custListTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center; white-space: nowrap;'>Customer Name</th>
                                        <th style='text-align: center; white-space: nowrap;'>Customer Code</th>
                                        <th style='text-align: center; white-space: nowrap;'>Customer Grade</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                        require 'dbconnect.php';
                                
                                        $query = "SELECT * FROM customer_list ORDER BY customer_name";
                                        $query_run = mysqli_query($conn, $query);

                                        $counter = 1;
                                
                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $staff) {
                                    ?>
                            
                                    <tr>
                                        <td style='text-align: center;'><?= $counter ?></td>
                                        <td><?= $staff['customer_name'] ?></td>
                                        <td style='text-align: center;'><?= $staff['customer_code'] ?></td>
                                        <td style='text-align: center;'><?= $staff['customer_grade'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'>
                                            <button type="button" value="<?=$staff['customer_id'];?>" class="viewCustBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$staff['customer_id'];?>" class="editCustBtn btn btn-success btn-sm">Update</button>
                                            <button type="button" value="<?=$staff['customer_id'];?>" class="deleteCustBtn btn btn-danger btn-sm">Delete</button>
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
                        $('#custListTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                    });
                </script>
                
                <script>
                    // <!-- Add -->
                    $(document).on('submit', '#saveCustomer', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("save_customer", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "customerCode.php",
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
                                    $('#saveCustomer')[0].reset();
                                    $('#customerAddModal').modal('hide');

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
                    $(document).on('click', '.viewCustBtn', function () {
                        var customer_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "customerCode.php?customer_id=" + customer_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.customer_id);
                                    $('#view_code').text(res.data.customer_code);
                                    $('#view_name').text(res.data.customer_name);
                                    $('#view_grade').text(res.data.customer_grade);
                                    $('#view_PIC').text(res.data.customer_PIC);
                                    $('#view_phone1').text(res.data.cust_phone1);
                                    $('#view_phone2').text(res.data.cust_phone2);
                                    $('#view_address1').text(res.data.cust_address1);
                                    $('#view_address2').text(res.data.cust_address2);
                                    $('#view_address3').text(res.data.cust_address3);
                                    $('#view_custCreatedBy').text(res.data.customercreated_by);
                                    $('#view_custCreatedAt').text(res.data.customercreated_at);
                                    $('#view_custLastModBy').text(res.data.customerlasmodify_by);
                                    $('#view_custLastModAt').text(res.data.customerlasmodify_at);
                                    
                                    $('#custViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Update -->
                    $(document).on('click', '.editCustBtn', function () {
                        var customer_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "customerCode.php?customer_id=" + customer_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#customer_id').val(res.data.customer_id);
                                    $('#customer_code').val(res.data.customer_code);
                                    $('#customer_name').val(res.data.customer_name);
                                    $('#customer_grade').val(res.data.customer_grade);
                                    $('#customer_PIC').val(res.data.customer_PIC);
                                    $('#cust_phone1').val(res.data.cust_phone1);
                                    $('#cust_phone2').val(res.data.cust_phone2);
                                    $('#cust_address1').val(res.data.cust_address1);
                                    $('#cust_address2').val(res.data.cust_address2);
                                    $('#cust_address3').val(res.data.cust_address3);
                                    $('#customerlasmodify_by').val(res.data.customerlasmodify_by);
                                    
                                    $('#custEditModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    $(document).on('submit', '#updateCustomer', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("update_customer", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "customerCode.php",
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
                                    $('#updateCustomer')[0].reset();
                                    $('#custEditModal').modal('hide');

                                    alertify.set('notifier', 'position', 'top-right');
                                    alertify.success(res.message);
                                    
                                    setTimeout(function() {
                                        location.reload();
                                    }, 700);;
                                }
                                
                                else if(res.status == 500) {
                                    alert(res.message);
                                }
                            }
                        });
                    });
                    
                    // <!-- Delete -->
                    $(document).on('click', '.deleteCustBtn', function() {
                        var customer_id = $(this).val();
                        
                        $('#confirmDeleteBtn').val(customer_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var customer_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "customerCode.php",
                            data: {'delete_customer': true,
                                       'customer_id': customer_id},
                                    
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