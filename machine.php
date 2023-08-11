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

    <title>Machine List</title>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css">

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== JS ==========-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<style>
    ::-webkit-scrollbar {
        display: none;
    }

    #machineListTable {
        counter-reset: rowNumber
    }

    #machineListTable tr>td:first-child {
        counter-increment: rowNumber
    }

    #machineListTable tr td:first-child::before {
        content: counter(rowNumber)
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
            <!-- Add Modal -->
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
                                        <select name="brandname" id="machineBrand" style="width: 100%;" class="form-select form-select-lg mb-3">
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
                                        $('#machineBrand').select2({
                                            dropdownParent: $('#machineAddModal')
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
                                                        dropdownParent: $('#machineAddModal')
                                                    });

                                                    $('#machineType').select2({
                                                        dropdownParent: $('#machineAddModal')
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

            <!-- View Modal -->
            <div class="modal fade" id="machineViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Machine Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">ID</label>
                                    <p id="view_ID" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Code</label>
                                    <p id="view_machineCode" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Name</label>
                                    <p id="view_machineName" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Brand</label>
                                    <p id="view_machineBrand" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Type</label>
                                    <p id="view_machineType" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Serial Number</label>
                                    <p id="view_serialNum" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Description</label>
                                    <p id="view_machineDes" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Puchase Date</label>
                                    <p id="view_purDate" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Customer Name</label>
                                    <p id="view_cusName" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Register By</label>
                                    <p id="view_machRegBy" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Machine Register At</label>
                                    <p id="view_machRegAt" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Last Modify By</label>
                                    <p id="view_machModBy" class="form-control"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Last Modify At</label>
                                    <p id="view_machModAt" class="form-control"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Modal -->
            <div class="modal fade" id="machineEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Machine Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="updateMachine">
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="machine_id" id="machine_id">

                                    <div class="col-md-6 mb-3">
                                        <label for="">Machine Code</label>
                                        <input type="text" name="machine_code" id="machine_code" class="form-control" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Machine Name</label>
                                        <input type="text" name="machine_name" id="machine_name" class="form-control" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Machine Brand</label>
                                        <input type="text" name="machine_brand" id="machine_brand" class="form-control" />
                                        <input type="hidden" name="brand_id" id="brand_id" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Machine Type</label>
                                        <input type="text" name="machine_type" id="machine_type" class="form-control" />
                                        <input type="hidden" name="type_id" id="type_id" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Serial Number</label>
                                        <input type="text" name="serialnumber" id="serialnumber" class="form-control" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Machine Description</label>
                                        <input type="text" name="machine_description" id="machine_description" class="form-control" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Puchase Date</label>
                                        <input type="text" name="purchase_date" id="purchase_date" class="form-control" />
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Customer Name</label>
                                        <input type="text" name="customer_name" id="customer_name" class="form-control" />
                                    </div>

                                    <?php if (isset($_SESSION["username"])) { ?>
                                        <input type="hidden" name="machinelistlastmodify_by" id="staffregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
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
                            <p style="text-align: center;">Are you sure you want to delete this machine?</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="card">
                <div class="card-header">
                    <h4>Machine List<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#machineAddModal">Add</button></h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="machineListTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style='text-align: center;'>No</th>
                                    <th style='text-align: center; white-space: nowrap;'>Machine Name</th>
                                    <th style='text-align: center; white-space: nowrap;'>Machine Code</th>
                                    <th style='text-align: center; white-space: nowrap;'>Customer Name</th>
                                    <th style='text-align: center; white-space: nowrap;'>Serial Number</th>
                                    <th style='text-align: center;'>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                require 'dbconnect.php';

                                $query = "SELECT * FROM machine_list ORDER BY machine_name";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $machine) {
                                ?>

                                        <tr>
                                            <td style='text-align: center;'></td>
                                            <td><?= $machine['machine_name'] ?></td>
                                            <td><?= $machine['machine_code'] ?></td>
                                            <td><?= $machine['customer_name'] ?></td>
                                            <td style='text-align: center; white-space: nowrap;'><?= $machine['serialnumber'] ?></td>
                                            <td style='text-align: center; white-space: nowrap;'>
                                                <button type="button" value="<?= $machine['machine_id']; ?>" class="viewMachineBtn btn btn-info btn-sm">View</button>
                                                <button type="button" value="<?= $machine['machine_id']; ?>" class="editMachineBtn btn btn-success btn-sm">Update</button>
                                                <button type="button" value="<?= $machine['machine_id']; ?>" class="deleteMachineBtn btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </br>

            <!--========== JS ==========-->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
            <script src="assets/js/main.js"></script>

            <script>
                $(document).ready(function() {
                    $('#machineListTable').DataTable({
                        responsive: true,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search"
                        },
                    });
                });
            </script>

            <script>
                // <!-- Add New Machine -->
                $(document).on('submit', '#addNewMachine', function(e) {
                    e.preventDefault();

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

                // <!-- View -->
                $(document).on('click', '.viewMachineBtn', function() {
                    var machine_id = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "machineCode.php?machine_id=" + machine_id,
                        success: function(response) {
                            var res = jQuery.parseJSON(response);

                            if (res.status == 404) {
                                alert(res.message);
                            } else if (res.status == 200) {
                                $('#view_ID').text(res.data.machine_id);
                                $('#view_machineCode').text(res.data.machine_code);
                                $('#view_machineName').text(res.data.machine_name);
                                $('#view_machineBrand').text(res.data.machine_brand);
                                $('#view_machineType').text(res.data.machine_type);
                                $('#view_serialNum').text(res.data.serialnumber);
                                $('#view_machineDes').text(res.data.machine_description);
                                $('#view_purDate').text(res.data.purchase_date);
                                $('#view_cusName').text(res.data.customer_name);
                                $('#view_machRegBy').text(res.data.machinelistcreated_by);
                                $('#view_machRegAt').text(res.data.machinelistcreated_at);
                                $('#view_machModBy').text(res.data.machinelistlastmodify_by);
                                $('#view_machModAt').text(res.data.machinelistlastmodify_at);

                                $('#machineViewModal').modal('show');
                            }
                        }
                    });
                });

                // <!-- Update -->
                $(document).on('click', '.editMachineBtn', function() {
                    var machine_id = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "machineCode.php?machine_id=" + machine_id,
                        success: function(response) {
                            var res = jQuery.parseJSON(response);

                            if (res.status == 404) {
                                alert(res.message);
                            } 
                            
                            else if (res.status == 200) {
                                $('#machine_id').val(res.data.machine_id);
                                $('#machine_code').val(res.data.machine_code);
                                $('#machine_name').val(res.data.machine_name);
                                $('#machine_brand').val(res.data.machine_brand);
                                $('#brand_id').val(res.data.brand_id);
                                $('#machine_type').val(res.data.machine_type);
                                $('#type_id').val(res.data.type_id);
                                $('#serialnumber').val(res.data.serialnumber);
                                $('#machine_description').val(res.data.machine_description);
                                $('#purchase_date').val(res.data.purchase_date);
                                $('#customer_name').val(res.data.customer_name);
                                $('#machinelistlastmodify_by').val(res.data.machinelistlastmodify_by);

                                $('#machineEditModal').modal('show');
                            }
                        }
                    });
                });

                $(document).on('submit', '#updateMachine', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);
                    formData.append("update_machine", true);

                    $.ajax({
                        type: "POST",
                        url: "machineCode.php",
                        data: formData,
                        processData: false,
                        contentType: false,

                        success: function(response) {
                            var res = jQuery.parseJSON(response);

                            if (res.status == 422) {
                                $('#errorMessageUpdate').removeClass('d-none');
                                $('#errorMessageUpdate').text(res.message);
                            } 
                            
                            else if (res.status == 200) {
                                $('#errorMessageUpdate').addClass('d-none');

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
                $(document).on('click', '.deleteMachineBtn', function() {
                    var machine_id = $(this).val();

                    $('#confirmDeleteBtn').val(machine_id);
                    $('#deleteConfirmationModal').modal('show');
                });

                $(document).on('click', '#confirmDeleteBtn', function() {
                    var machine_id = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "machineCode.php",
                        data: {'delete_machine': true,
                                   'machine_id': machine_id
                        },

                        success: function(response) {
                            var res = jQuery.parseJSON(response);
                            
                            if (res.status == 500) {
                                alert(res.message);
                            } 
                            
                            else {
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