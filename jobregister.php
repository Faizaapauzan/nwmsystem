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

<?php
    
    $today_date = date("Y-m-d");
    
    $_SESSION['today_date'] = $today_date;

?> 

<?php include 'dbconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Job Registration</title>

        <!--========== CSS ==========-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
        <script src="assets/js/main.js"></script>     
        
        <!--========== CONTENTS ==========-->
        <main>
            <!--========== Modal To Add New ==========-->
            <!-- Add New Customer Modal -->
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
                                        <input type="text" id="rgtcustomer_code" name="customer_code" class="form-control" onkeyup="checkcustomer_codelAvailability()"/>
                                        <span id="customer_code-availability-status"></span>
                                    </div>
                                    <script>
                                        function checkcustomer_codelAvailability() {
                                            jQuery.ajax({
                                                url: "customerindex.php",
                                                data: "customer_code=" + $("#rgtcustomer_code").val(),
                                                type: "POST",
                                                success: function (data) {
                                                    $("#customer_code-availability-status").html(data);
                                                },
                                                error: function () {},
                                            });
                                        }
                                    </script>
                                    
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

            <script>
                $(document).on('submit', '#saveCustomer', function (e) {
                    e.preventDefault();
                    var select = document.getElementById("customer_code");
                    
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
                            
                            else if(res.status == 200) {
                                $('#errorMessage').addClass('d-none');
                                $('#saveCustomer')[0].reset();
                                $('#customerAddModal').modal('hide');

                                alertify.set('notifier', 'position', 'top-right');
                                alertify.success(res.message);
                                
                                var newOptionValue = res.latest_customer.customer_id;
                                var newOptionText = res.latest_customer.customer_code + ' - ' + res.latest_customer.customer_name;

                                var option = document.createElement("option");
                                option.value = newOptionValue;
                                option.text = newOptionText;

                                select.appendChild(option);
                            }
                            
                            else if(res.status == 500) {
                                alert(res.message);
                            }
                        }
                    });
                });
            </script>
            <!-- End of Add New Customer Modal -->

            <!-- Add New Job Type Modal -->
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
                                        <input type="text" id="rgtjob_code"name="job_code" class="form-control" onkeyup="checkJobCodelAvailability()"/>
                                        <span id="job_code-availability-status"></span>
                                    </div>

                                    <script>
                                        function checkJobCodelAvailability() {
                                            jQuery.ajax({
                                                url: "jobtypeindex.php",
                                                data: "job_code=" + $("#rgtjob_code").val(),
                                                type: "POST",
                                                success: function (data) {
                                                    $("#job_code-availability-status").html(data);
                                                },
                                                error: function () {},
                                            });
                                        }
                                    </script>
                                
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

            <script>
                $(document).on('submit', '#saveJobType', function (e) {
                    e.preventDefault();
                    var select = document.getElementById("job_code");
                    
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
                            
                            else if(res.status == 200) {
                                $('#errorMessage').addClass('d-none');
                                $('#saveJobType')[0].reset();
                                $('#jobAddModal').modal('hide');
                                
                                alertify.set('notifier', 'position', 'top-right');
                                alertify.success(res.message);

                                var newOptionValue = res.latest_jobtype.job_code;
                                var newOptionText = res.latest_jobtype.job_code + ' - ' + res.latest_jobtype.job_name;

                                var option = document.createElement("option");
                                option.value = newOptionValue;
                                option.text = newOptionText;

                                select.appendChild(option);

                            }
                            
                            else if(res.status == 500) {
                                alert(res.message);
                            }
                        }
                    });
                });
            </script>
            <!-- End of Add New Job Type Modal -->

            <!-- Add New Machine Modal -->
            <div class="modal fade" id="machineAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="tab-buttons" role="tablist" style="text-align: center; display:inline-flex;">
                                <button class="btn tab-button active" data-bs-target="#tab1" aria-controls="tab1" aria-selected="true" id="addMachBrand" style="border:none; margin-left:20px; margin-right:30px; font-weight: bold;">Add New Machine Brand</button>
                                <button class="btn tab-button" data-bs-target="#tab2" aria-controls="tab2" aria-selected="false" id="addMachType" style="border:none; margin-right:30px; font-weight: bold;">Add New Machine Type</button>
                                <button class="btn tab-button" data-bs-target="#tab3" aria-controls="tab3" aria-selected="false" id="addMachine" style="border:none; font-weight: bold;">Add New Machine</button>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="tab-content mt-3">
                                <!-- Add New Machine Brand -->
                                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1" style="color: black;">
                                    <div class="mb-3">
                                        <label for="">New Machine Brand</label>
                                        <input type="text" name="brandname" id="brand" class="form-control" />
                                    </div>

                                    <button type="button" class="btn btn-primary" style="float:right;" onclick="saveBrand()">Save</button>
                                    <p style="margin-left: 20px;margin-top: 1px;margin-bottom: 11px;" class="control"><b id="addbrandmessage"></b></p>
                                </div>
                                
                                <script>
                                    function saveBrand() {
                                        var brandInput = document.getElementById('brand').value;

                                        $.ajax({
                                            url: 'machineCode.php',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {brand: brandInput,
                                                  sBrand: true},

                                            success: function(res) {
                                                if (res.status == 200) {
                                                    $('#addbrandmessage').html('<span style="color: green">' + res.message + '</span>');
                                                    // Update the select element with the new option
                                                    var newOption = $('<option value="' + res.brand_id + '">' + brandInput + '</option>');
                                                    $('#machineBrand').append(newOption.clone());
                                                    $('#machineBrand2').append(newOption);

                                                    // Clear the input field after adding the brand
                                                    $('#brand').val('');

                                                    setTimeout(function() {
                                                        $('#addbrandmessage').html('');
                                                        document.querySelector('[data-bs-target="#tab2"]').click();
                                                    }, 500);

                                                } else if (res.status == 500 || res.status == 422) {
                                                    $('#addbrandmessage').html('<span style="color: red">' + res.message + '</span>');
                                                    setTimeout(function() {
                                                        $('#addbrandmessage').html('');
                                                    }, 500);
                                                }
                                            }
                                        });
                                    }
                                </script>

                                <!-- Add New Machine Type -->
                                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2" style="color: black;">
                                    <div class="mb-3">
                                        <label for="">Machine Brand</label>
                                        <select name="brandname" id="machineBrand" style="width: 100%;" class="form-select form-select mb-3">
                                            <option value=""> Select Machine Brand</option>
                                                <?php
                                                    
                                                    include "dbconnect.php";
                                                    
                                                    $querydrop = "SELECT * FROM machine_brand";
                                                    
                                                    $result = $conn->query($querydrop);
                                                    
                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
                                                <?php } } ?>
                                        </select>
                                    </div>
                                    
                                    <script>
                                        $(document).ready(function(){
                                            $('#machineBrand').select2({
                                                dropdownParent: $('#machineAddModal'),
                                                theme: 'bootstrap-5'
                                            });
                                        });
                                    </script>
                                    
                                    <div class="mb-3">
                                        <label for="">New Machine Type</label>
                                        <input type="text" name="type_name" id="type" class="form-control" />
                                    </div>

                                    <p style="margin-left: 20px;margin-top: 1px;margin-bottom: 11px;" class="control"><b id="addtypemessage"></b></p>

                                    <button type="button" class="btn btn-primary" style="float:right;" onclick="saveType()">Save</button>
                                </div>
                                
                                <script>
                                    function saveType() {
                                        var brand_id = document.getElementById('machineBrand').value;
                                        var typeInput = document.getElementById('type').value;

                                        $.ajax({
                                            url: 'machineCode.php',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {brand_id: brand_id,
                                                  type_name: typeInput,
                                                      sType: true},
                                            
                                            success: function(res) {
                                                if (res.status == 200) {
                                                    $('#addtypemessage').html('<span style="color: green">' + res.message + '</span>');

                                                    $('#type').val('');
                                                    $('#machineBrand').val('').trigger('change');

                                                    setTimeout(function() {
                                                        $('#addtypemessage').html('');
                                                        document.querySelector('[data-bs-target="#tab3"]').click();
                                                    }, 500);   

                                                } 
                                                
                                                else if (res.status == 500 || res.status == 422) {
                                                    $('#addtypemessage').html('<span style="color: red">' + res.message + '</span>');
                                                    
                                                    setTimeout(function() {
                                                        $('#addtypemessage').html('');
                                                    }, 500);
                                                }
                                            }
                                        });
                                    }
                                </script>

                                <!-- Add New Machine -->
                                <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3" style="color: black;">
                                    <form id="addNewMachine">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="">Machine Brand</label>
                                                <select name="machine_brand" id="machineBrand2" style="width: 100%;" class="form-select mb-3">
                                                    <option value="">Select Machine Brand</option>
                                                        <?php
                                                            include "dbconnect.php";
                                                            
                                                            $querydrop = "SELECT * FROM machine_brand";
                                                            
                                                            $result = $conn->query($querydrop);
                                                            
                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                        <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
                                                        <?php } } ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="machineType">Machine Type</label>
                                                <select name="machine_type" id="machineType" style="width: 100%;" class="form-select mb-3">
                                                    <option value="">Select Machine Type</option>
                                                </select>

                                                <input type="hidden" name="type_id" id="selectedBrandId">
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    $('#machineBrand2').select2({
                                                        dropdownParent: $('#machineAddModal'),
                                                        theme: 'bootstrap-5'
                                                    });

                                                    $('#machineType').select2({
                                                        dropdownParent: $('#machineAddModal'),
                                                        theme: 'bootstrap-5'
                                                    });

                                                    $('#machineBrand2').on('change', function() {
                                                        var selectedBrandId = $(this).val();
                                                        $('#selectedBrandId').val(selectedBrandId);

                                                        $.ajax({
                                                            url: 'machineGetMachineType.php',
                                                            type: 'POST',
                                                            data: {brand_id: selectedBrandId},
                                                            dataType: 'json',
                                                            
                                                            success: function(response) {
                                                                $('#selectedBrandId').val()
                                                                $('#machineType').empty().append('<option value="">Select Machine Type</option>');
                                                                $.each(response, function(index, value) {
                                                                    $('#machineType').append('<option value="' + value.machine_type_id + '">' + value.machine_type_name + '</option>');
                                                                });
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Machine Code</label>
                                                <input type="text" name="machine_code" class="form-control" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Machine Name</label>
                                                <input type="text" name="machine_name" class="form-control" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Machine Description</label>
                                                <input type="text" name="machine_description" class="form-control" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Serial Number</label>
                                                <input type="text" name="serialnumber" class="form-control" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Purchase Date</label>
                                                <input type="date" name="purchase_date" class="form-control" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="">Customer Name</label>
                                                <input type="text" name="customer_name" class="form-control" />
                                            </div>

                                            <?php if (isset($_SESSION["username"])) { ?>
                                                <input type="hidden" name="machinelistcreated_by" value="<?php echo $_SESSION["username"] ?>">
                                                <input type="hidden" name="machinelistlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
                                            <?php } ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tabButtons = document.querySelectorAll('.tab-buttons .tab-button');
                    tabButtons.forEach((button) => {
                        button.addEventListener('click', (event) => {
                            event.preventDefault();
                            const targetTab = button.getAttribute('data-bs-target');

                            document.querySelectorAll('.tab-pane').forEach((pane) => {
                                pane.classList.remove('show', 'active');
                            });

                            document.querySelector(targetTab).classList.add('show', 'active');

                            tabButtons.forEach((btn) => {
                                btn.classList.remove('active');
                            });

                            button.classList.add('active');
                        });
                    });
                });
            </script>

            <script>
                $(document).on('submit', '#addNewMachine', function(e) {
                    e.preventDefault();
                    var select = document.getElementById('machine_brand');

                    var form = $(this);
                    var formData = new FormData(form[0]);
                    formData.append('save_machine', true);

                    console.log([...formData.entries()]);


                    $.ajax({
                        type: "POST",
                        url: "machineCode.php",
                        data: formData,
                        dataType: "json",
                        processData: false,
                        contentType: false,

                        success: function(res) {
                            if (res.status == 200) {
                                $('#errorMessage').addClass('d-none');
                                $('#addNewMachine')[0].reset();
                                $('#machineAddModal').modal('hide');
                                
                                alertify.set('notifier', 'position', 'top-right');
                                alertify.success(res.message);

                                var newOptionValue = res.brand_id;
                                var newOptionText = res.brandname;

                                var option = document.createElement("option");
                                option.value = newOptionValue;
                                option.text = newOptionText;

                                select.appendChild(option);
                                
                            } 
                            
                            else if (res.status == 500) {
                                alert(res.message);
                            }
                        }
                    });
                });
            </script>
            <!-- End of Add New Machine Modal -->

            <!--========== Job Registration Form ==========-->
            <section class="mt-4">
                <div class="container">
                    <form action="jobregisterindex.php" class="card" id="JobRegisterForm" method="POST">
                        <div class="card-header">
                            <nav class="nav-2 nav-pills nav-fill" style="display: flex; justify-content: center; align-items: center; font-size: large;">
                                <a class="nav-link tab-pills" href="#">Customer</a>
                                <a class="nav-link tab-pills" href="#">Job</a>
                                <a class="nav-link tab-pills" href="#">Machine</a>
                            </nav>
                        </div>
                        <div class="card-body">
                            <!-- Customer Tab -->
                            <div class="tab d-none">
                                <h4 style="text-align: center; font-weight: bold;">Customer Details</h4>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Customer Code</label>
                                    <select name="customer_id" id="customer_code" class="form-select mb-3" onchange="GetDetail(this.value)">
                                        <option value="">Select Customer Code</option>
                                            <?php
                                                
                                                include "dbconnect.php";
                                                    
                                                    $querydrop = "SELECT * FROM customer_list ORDER BY customer_name";
                                                    
                                                    $result = $conn->query($querydrop);
                                                    
                                                    if ($result->num_rows > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_code']; ?> - <?php echo $row['customer_name']; ?></option>
                                            <?php } } ?>
                                    </select>
                                    <input type="hidden" id="code" class="form-control" name="customer_code" readonly>

                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#customer_code').select2({
                                            theme: 'bootstrap-5',
                                            width: '100%',
                                        });
                                    });
                                </script>
                                
                                <div class="input-group mb-3">
                                    <label for="">Customer Name</label>
                                    <div class="input-group">
                                        <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder='Enter Customer Name'>
                                        <input type="hidden" name="today_date" id="today_date" value="<?php echo $_SESSION["today_date"] ?>">
                                        <button type="button" class="btn btn-primary" style="background-color: #081d45; border: none;" data-bs-toggle="modal" data-bs-target="#customerAddModal"><i class="bi bi-plus-lg fs-6" style="color: #081d45; color: #f1f1f1;"></i></button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="">Customer Grade</label>
                                    <input type="text" name="customer_grade" id="customer_grade" class="form-control" placeholder='Enter Customer Grade'>
                                </div>

                                <div class="mb-3">
                                    <label for="">Customer PIC</label>
                                    <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" placeholder='Enter Customer PIC'>
                                </div>

                                <div class="d-grid gap-2 mb-3">
                                    <label for="">Customer Phone Number</label>
                                    <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" placeholder='Enter Customer Phone'>
                                    <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" placeholder='Enter Customer Phone'>
                                </div>

                                <div class="d-grid gap-2 mb-3">
                                    <label for="">Customer Address</label>
                                    <input type="text" name="cust_address1" id="cust_address1" class="form-control" placeholder='Enter Customer Address'>
                                    <input type="text" name="cust_address2" id="cust_address2" class="form-control" placeholder='Address 2'>
                                    <input type="text" name="cust_address3" id="cust_address3" class="form-control" placeholder='Address 3'>
                                </div>
                            </div>
                            <!-- End Customer Tab -->
                            <script>
                                function GetDetail(str) {
                                    if (str.length == 0) {
                                        document.getElementById("code").value = "";
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
                                                
                                                document.getElementById("code").value = myObj[0];
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
                            </script>
                            
                            <!-- Job Tab -->
                            <div class="tab d-none">
                                <h4 style="text-align: center; font-weight: bold;">Job Details</h4>

                                <div class="input-group mb-3">
                                    <label for="">Job Order Number</label>
                                    <div class="input-group">
                                        <input type="text" id="Departure" name="job_order_number" class="form-control">
                                        <button type="button" onclick="test();" class="btn btn-outline-primary" style="background-color: #1a0845; color: white; border:none;">Job Order Number</button>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    function test() {
                                        $.ajax({
                                            url: "jobordernumberindex.php",
                                            success: function(result) {
                                                $("#Departure").val(result);
                                            }
                                        })
                                    }
                                </script>
                                                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Job Code</label>
                                    <select name="job_code" id="job_code" class="form-select mb-3" onchange="GetJob(this.value)">
                                        <option value="">Select Job Code</option>
                                            <?php
                                                
                                                include "dbconnect.php";
                                                
                                                $querydrop = "SELECT * FROM jobtype_list ORDER BY job_code";
                                                
                                                $result = $conn->query($querydrop);
                                                
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            
                                            <option value="<?php echo $row['job_code']; ?>"><?php echo $row['job_code']; ?> - <?php echo $row['job_name']; ?></option>
                                            
                                            <?php } } ?>
                                    </select>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#job_code').select2({
                                            theme: 'bootstrap-5',
                                            width: '100%'
                                        });
                                    });
                                </script>
                                
                                <div class="input-group mb-3">
                                    <label for="">Job Name</label>
                                    <div class="input-group">
                                        <input type="text" id="job_name" name="job_name" class="form-control">
                                        <button type="button" class="btn btn-primary" style="background-color: #081d45; border: none;" data-bs-toggle="modal" data-bs-target="#jobAddModal"><i class="bi bi-plus-lg fs-6" style="color: #081d45; color: #f1f1f1;"></i></button>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="">Job Description</label>
                                    <input type="text" id="job_description" name="job_description" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Job Priority</label>
                                    <input type="text" name="job_priority" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Requested Date</label>
                                    <input type="date" name="requested_date" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Delivery Date</label>
                                    <input type="date" name="delivery_date" class="form-control">
                                </div>
                            </div>

                            <script>
                                    function GetJob(str) {
                                        if (str.length == 0) {
                                            document.getElementById("job_name").value = "";
                                            document.getElementById("job_description").value = "";
                                            return;
                                        } 
                                        
                                        else {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    var myObj = JSON.parse(this.responseText);
                                                    document.getElementById("job_name").value = myObj[0];
                                                    document.getElementById("job_description").value = myObj[1];
                                                }
                                            };

                                            xmlhttp.open("GET", "fetchjob.php?job_code=" + str, true);
                                            xmlhttp.send();
                                        }
                                    }
                                </script>
                            <!-- End of Job Tab -->
                            
                            <!-- Machine Tab -->
                            <div class="tab d-none">
                                <h4 style="text-align: center; font-weight: bold;">Machine Details</h4>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Machine Brand</label>
                                    <select name="brand_id" id="machine_brand" class="form-select mb-3" onchange="GetBrand(this.value)">
                                        <option value="">Select Machine Brand</option>
                                            <?php
                                                
                                                include "dbconnect.php";
                                                
                                                $querydrop = "SELECT * FROM machine_brand ORDER BY brandname";
                                                
                                                $result = $conn->query($querydrop);
                                                
                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            
                                            <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
                                            
                                            <?php } } ?>
                                    </select>
                                    <input type="hidden" id="NamaJenama" name="machine_brand" onchange="GetBrand(this.value)" readonly>
                                </div>
                                
                                <script>
                                    $(document).ready(function(){
                                        $('#machine_brand').select2({
                                            theme: 'bootstrap-5',
                                            width: '100%'
                                        });
                                    });
                                </script>

                                <script>
                                    function GetBrand(str) {
                                        if (str.length == 0) {
                                            document.getElementById("NamaJenama").value = "";
                                            return;
                                        } else {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    var myObj = JSON.parse(this.responseText);
                                                    document.getElementById("NamaJenama").value = myObj[1];
                                                }
                                            };
                                            xmlhttp.open("GET", "fetchbrand.php?brand_id=" + str, true);
                                            xmlhttp.send();
                                        }
                                    }
                                </script>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Machine Type</label>
                                    <select name="type_id" id="machine_type" class="form-select mb-3" onchange="GetType(this.value)">
                                        <option value="">Select Machine Type</option>
                                    </select>
                                    <input type="hidden" id="NamaJenis" name="machine_type" onchange="GetType(this.value)" readonly>
                                </div>
                                
                                <script>
                                    $(document).ready(function(){
                                        $('#machine_type').select2({
                                            theme: 'bootstrap-5',
                                            width: '100%'
                                        });
                                    });
                                </script>
                                <script>
                                    function GetType(str) {
                                        if (str.length == 0) {
                                            document.getElementById("NamaJenis").value = "";
                                            return;
                                        } else {
                                            var xmlhttp = new XMLHttpRequest();
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    var myObj = JSON.parse(this.responseText);
                                                    document.getElementById("NamaJenis").value = myObj[1];
                                                }
                                            };
                                            xmlhttp.open("GET", "fetchtype.php?type_id=" + str, true);
                                            xmlhttp.send();
                                        }
                                    }
                                </script>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Serial Number</label>
                                    <select id="serialnumber" class="form-select mb-3" onchange="GetMachine(this.value)">
                                        <option value="">Select Serial Number</option>
                                    </select>
                                    <input type="hidden" style="width: 300px; height: 33px;" id="NumberSiriInput" name="serialnumber">
                                </div>
                                
                                <script>
                                    $(document).ready(function() {
                                        $('#serialnumber').select2({
                                            theme: 'bootstrap-5',
                                            width: '100%'
                                        });
                                    });
                                </script>
                                
                                <div class="mb-3">
                                    <label for="">Machine Code</label>
                                    <input type="text" id="CodeMachine" name="machine_code" class="form-control">
                                    <input type="hidden" id="IdMachine" name="machine_id">
                                </div>

                                <div class="input-group mb-3">
                                    <label for="">Machine Name</label>
                                    <div class="input-group">
                                        <input type="text" id="NamaMachine" name="machine_name" class="form-control">
                                        <button type="button" class="btn btn-primary" style="background-color: #081d45; border: none;" data-bs-toggle="modal" data-bs-target="#machineAddModal"><i class="bi bi-plus-lg fs-6" style="color: #081d45; color: #f1f1f1;"></i></button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="">Accessory Require</label>
                                    <select name="accessories_required" id="accessories_required" onchange="myFunctionAccessory()" class="form-select">
                                        <option selected></option>
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="Accessory">
                                    <label for="">Accessory For</label>
                                    <select id="accessories_for" name="accessories_for" class="form-select">
                                        <option value="Technician">Technician Use</option>
                                        <option value="Customer">Customer Request</option>
                                    </select>
                                </div>
                                <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                                <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

                                <script>
                                    function myFunctionAccessory() {
                                        var accessories = document.getElementById("accessories_required").value;
                                        var reasonDiv = document.getElementById("Accessory");
                                        
                                        if (accessories === "Yes") {
                                            reasonDiv.style.display = "block";
                                        }
                                        
                                        else {
                                            reasonDiv.style.display = "none";
                                            document.getElementById("accessories_for").value="";
                                        }
                                    }
                                    
                                    myFunctionAccessory();
                                </script>
                            </div>
                            <!-- End Machine Tab -->
                        </div>

                        <script>
                            $(document).ready(function() {
                                $("#machine_brand").on('change', function() {
                                    var brandid = $(this).val();
                                    $.ajax({
                                        method: "POST",
                                        url: "ajaxData.php",
                                        data: {id: brandid},
                                        datatype: "html",
                                        success: function(data) {
                                            $("#machine_type").html(data);
                                            $("#serialnumber").html('<option value="">Select Serial Number</option>');
                                        }
                                    });
                                });
                                
                                $("#machine_type").on('change', function() {
                                    var typeid = $(this).val();
                                    $.ajax({
                                        method: "POST",
                                        url: "ajaxData.php",
                                        data: {sid: typeid},
                                        datatype: "html",
                                        success: function(data) {
                                            $("#serialnumber").html(data);
                                        }
                                    });
                                });
                            });
                        </script>
                        <script>
                            function GetMachine(str) {
                                if (str.length == 0) {
                                    document.getElementById("IdMachine").value = "";
                                    document.getElementById("NumberSiriInput").value = "";
                                    document.getElementById("CodeMachine").value = "";
                                    document.getElementById("NamaMachine").value = "";
                                    return;
                                } 
                                
                                else {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            var myObj = JSON.parse(this.responseText);
                                            document.getElementById("IdMachine").value = myObj[0];
                                            document.getElementById("NumberSiriInput").value = myObj[1];
                                            document.getElementById("CodeMachine").value = myObj[2];
                                            document.getElementById("NamaMachine").value = myObj[3];
                                        }
                                    };
                                    
                                    xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
                                    xmlhttp.send();
                                }
                            }
                        </script>
                        <div class="card-footer d-flex justify-content-center">
                            <button type="button" id="back_button" class="btn btn-danger w-25" style="margin-right: 10px; background-color:#9c0101; border:none;" onclick="back()">Back</button>
                            <button type="button" id="next_button" class="btn btn-primary w-25" style="background-color: #081d45; border: none;" onclick="next()">Next</button>
                        </div>
                    </form>
                </div>
                <br>
            </section>

            <script>
                var current = 0;
                var tabs = $(".tab");
                var tabs_pill = $(".tab-pills");
                
                loadFormData();
                
                function loadFormData() {
                    $(tabs_pill[current]).addClass("active");
                    $(tabs[current]).removeClass("d-none");
                    $("#back_button").attr("disabled", current === 0);
                    
                    if (current === tabs.length - 1) {
                        $("#next_button").text("Submit").css("background-color", "green");
                    } else if (current === tabs.length ){
                        $("#next_button").attr("type", "submit").attr("name","submit");
                    }
                    else {
                        $("#next_button").attr("type", "button").text("Next").css("background-color", "#081d45").attr("onclick", "next()");
                    }
                }
                
                function scrollToTop() {
                    window.scrollTo(0, 0);
                }
                
                function next() {
                    $(tabs[current]).addClass("d-none");
                    $(tabs_pill[current]).removeClass("active");
                    
                    current++;
                    
                    loadFormData();
                    scrollToTop(); // Scroll to top when clicking Next
                }
                
                function back() {
                    $(tabs[current]).addClass("d-none");
                    $(tabs_pill[current]).removeClass("active");
                    
                    current--;
                    loadFormData();
                    scrollToTop(); // Scroll to top when clicking Back
                }
            </script>
        </main>   
        
    </body>
    </html>