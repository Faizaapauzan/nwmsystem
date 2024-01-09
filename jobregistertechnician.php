<?php
    
    session_start();
    
    include "dbconnect.php";

    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_SESSION["username"])) {
        $job_assign = $_SESSION["username"];
        $query_run = mysqli_query($conn, "SELECT * FROM staff_register WHERE username='$job_assign'");
        
        $row = mysqli_fetch_assoc($query_run);
        $username = $row["username"];
        $rank = $row["technician_rank"];
        $position = $row["staff_position"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Job Register</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="css/technicianStyle.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>   
    </head>
    
    <body>
        <!--========== Header ==========-->
        <header>
            <nav class="navbar navbar-light position-fixed top-0 w-100" style="background-color: #C0C0C0; z-index: 2;">
                <ul class="nav start-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="dashicons:welcome-widgets-menus" style="font-size:200%; color: #081d45;"></i></a>
                        <ul class="dropdown-menu ms-3">
                            <li><a class="dropdown-item" href="techattendance.php">Attendance</a></li>
                            <li><a class="dropdown-item" href="techresthour.php">Rest Hour</a></li>
                            <li><a class="dropdown-item" href="techresthour.php">Leave</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="jobregistertechnician.php">Job Register</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="techaccessories.php">Accessory</a></li> -->
                        </ul>
                    </li>
                </ul>

                <nav class="nav ms-auto">
                    <span class="fw-bold">Hi <?=$username?>!</span>
                </nav>
                
                <nav class="nav ms-auto">
                    <a class="nav-link" href="logout.php"><i class="iconify" data-icon="heroicons-outline:logout" style="font-size:200%; color: #081d45;"></i></a>
                </nav>
            </nav>            
        </header>
        
        <!--========== Content ==========-->
        <div class="container p-3" style="margin-top: 70px; margin-bottom: 300px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Job Register</h5>
                </div>

                <div class="card-body">
                    <form action="jobRegisterTechnicianIndex.php" method="POST" id="techJobRegForm" onsubmit="return validateForm()">
                        <input type="hidden" name="job_assign" id="job_assign" value="<?=$username?>">
                        <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?=$username?>">
                        <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?=$username?>">
                        <input type="hidden" name="technician_rank" id="technician_rank" value="<?=$rank?>">
                        <input type="hidden" name="staff_position" id="staff_position" value="<?=$position?>">
                        
                        <input type="hidden" name="job_priority" id="job_priority" value="1">
                        <input type="hidden" name="today_date" id="today_date" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" name="requested_date" id="requested_date" value="<?php echo date('d/m/Y'); ?>">
                        <input type="hidden" name="accessories_required" id="accessories_required" value="No">

                        <label for="customerName" class="form-label fw-bold">Customer Name</label>
                        <select name="customer_name" id="customer_name" class="form-select" style="width: 100%;">
                            <option value="">Select Customer Name</option>
                            <?php
                                
                                include "dbconnect.php";
                                
                                $records = mysqli_query($conn, "SELECT * FROM customer_list ORDER BY customer_name ASC");
                                
                                while ($data = mysqli_fetch_array($records)) {
                                    echo "<option value='".$data['customer_name']."'
                                                  data-custGrade='". $data['customer_grade'] ."'
                                                  data-custCode='". $data['customer_code'] ."'
                                                  data-custPIC='". $data['customer_PIC'] ."'
                                                  data-custAddr1='". $data['cust_address1'] ."'
                                                  data-custAddr2='". $data['cust_address2'] ."'
                                                  data-custAddr3='". $data['cust_address3'] ."'
                                                  data-custNum1='". $data['cust_phone1'] ."'
                                                  data-custNum2='". $data['cust_phone2'] ."'>".$data['customer_name']."</option>";
                                }
                            ?>
                        </select>

                        <div id="alertmessagecustName"></div>
 
                        <!-- Customer hidden info -->
                        <input type="hidden" name="customer_grade" id="customer_grade">
                        <input type="hidden" name="customer_code" id="customer_code">
                        <input type="hidden" name="customer_PIC" id="customer_PIC">
                        <input type="hidden" name="cust_address1" id="cust_address1">
                        <input type="hidden" name="cust_address2" id="cust_address2">
                        <input type="hidden" name="cust_address3" id="cust_address3">
                        <input type="hidden" name="cust_phone1" id="cust_phone1">
                        <input type="hidden" name="cust_phone2" id="cust_phone2">

                        <label for="" class="form-label fw-bold mt-3">Job Order Number</label>
                        <div class="input-group mb-3">
                            <input type="text" name="job_order_number" id="job_order_number" class="form-control">
                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: max-content;" onclick="techJobON();"><i class="iconify" data-icon="clarity:cursor-hand-click-line" style="font-size:20px; color: #FFFFFF;"></i></button>
                        </div>

                        <div id="alertmessageJON"></div>

                        <script>
                            function techJobON() {
                                $.ajax({
                                    url:"jobordernumberindex.php", 
                                    success:function(result) {
                                        $("#job_order_number").val(result);
                                    }
                                })
                            }
                        </script>

                        <label for="JobName" class="form-label fw-bold">Job Name</label>
                        <select name="job_name" id="job_name" class="form-select" style="width: 100%;" onchange="GetJobDetails(this.value)">
                            <option value="">Select Job</option>
                                <?php
                                    
                                    include "dbconnect.php";
                                    
                                    $records = mysqli_query($conn, "SELECT * FROM jobtype_list ORDER BY job_name ASC");
                                    
                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='".$data['job_name']."' 
                                                      data-jobCode='". $data['job_code'] ."'
                                                      data-jobDesc='". $data['job_description'] ."'>".$data['job_name']."</option>";
                                    }
                                ?>
                        </select>

                        <div id="alertmessageJobName"></div>
                        
                        <script>
                            function GetJobDetails(value) {
                                var selectedOptionJob = document.querySelector('#job_name option[value="' + value + '"]');
                                var jobCode = selectedOptionJob.getAttribute('data-jobCode');
                                var jobDesc = selectedOptionJob.getAttribute('data-jobDesc');
                                
                                document.querySelector('input[name="job_code"]').value = jobCode;
                                document.querySelector('input[name="job_description"]').value = jobDesc;
                            }
                        </script>

                        <input type="hidden" name="job_code" id="job_code">
                        
                        <label for="" class="form-label fw-bold mt-3">Job Description</label>
                        <input type="text" name="job_description" id="job_description" class="form-control mb-3">

                        <label for="" class="form-label fw-bold">Serial Number</label>
                        <select name="serialnumber" id="serialnumber"  style="width: 100%;" class="form-select">
                            <option value="">Select Serial Number</option>
                        </select>
                    
                        <label for="" class="form-label fw-bold mt-3">Machine Name</label>
                        <input type="text" name="machine_name" id="machine_name" class="form-control mb-3">
                        
                        <input type="hidden" name="machine_id" id="machine_id">
                        <input type="hidden" name="machine_code" id="machine_code">

                        <label for="" class="form-label fw-bold">Machine Brand</label>
                        <select name="brand_id" id="brand_id"  style="width: 100%;" class="form-select">
                            <option value="">Select Machine Brand</option>
                            <?php
                                
                                include "dbconnect.php";
                                
                                $records = mysqli_query($conn, "SELECT * FROM machine_brand ORDER BY brandname ASC");
                                
                                while ($data = mysqli_fetch_array($records)) {
                                    echo "<option value='".$data['brand_id']."' data-machBrand='". $data['brandname'] ."'>".$data['brandname']."</option>";
                                }
                            ?>
                        </select>

                        <input type="hidden" name="machine_brand" id="machine_brand">

                        <label for="" class="form-label fw-bold mt-3">Machine Type</label>
                        <select name="machine_type" id="machine_type"  style="width: 100%;" class="form-select">
                            <option value="">Select Machine Type</option>
                        </select>
                        
                        <input type="hidden" name="type_id" id="type_id">

                        <button type="submit" id="submitform" class="btn mt-3" style="border: none; background-color: #081d45; color: #FFFFFF; width: 100%;">Submit</button>
                    </form>

                    <script>
                        function validateForm() {
                            var customerName = document.forms["techJobRegForm"]["customer_name"].value;
                            var jobOrderNumber = document.forms["techJobRegForm"]["job_order_number"].value;
                            var jobName = document.forms["techJobRegForm"]["job_name"].value;

                            if (customerName == "" || customerName == null || customerName == "Select Customer Name") {
                                document.getElementById("customer_name").focus();
                                $('#alertmessagecustName').html('<p class="fw-bold mt-3 mb-3" style="color: #FF0000; display:block;">Do not leave Customer Name empty</p>');
                                
                                return false;
                            }
                
                            if (jobOrderNumber == "" || jobOrderNumber == null) {
                                document.getElementById("job_order_number").focus();
                                $('#alertmessageJON').html('<p class="fw-bold mt-3 mb-3" style="color: #FF0000; display:block;">Do not leave Job Order Number empty</p>');
                                
                                return false;
                            }
                
                            if (jobName == "" || jobName == null || jobName == "Select Job") {
                                document.getElementById("job_name").focus();
                                $('#alertmessageJobName').html('<p class="fw-bold mt-3 mb-3" style="color: #FF0000; display:block;">Do not leave Job Name empty</p>');
                                
                                return false;
                            }
                            
                            return true;
                        }
                    </script>

                    <!-- Dropdown populate and autofill -->
                    <script>
                        $(document).ready(function() {
                            // Initialize dropdowns with Select2
                            initializeSelect2(['#customer_name','#job_name','#serialnumber', '#brand_id', '#machine_type']);
                            
                            // Customer Name change event
                            $('#customer_name').on('change', function() {
                                var customerName = $(this).val();
                                
                                fetchMachines(customerName);
                                autoFillCustomerDetails(customerName);
                            });
                            
                            // Serial Number change event
                            $('#serialnumber').on('change', function() {
                                var serialNumber = $(this).val();
                                
                                autoFillMachineDetails(serialNumber);
                            });
                            
                            // Brand ID change event
                            $('#brand_id').on('change', function() {
                                var brandId = $(this).val();
                                
                                populateMachineTypes(brandId);
                                autoFillBrandDetails(brandId);
                            });
                            
                            // Machine Type change event
                            $('#machine_type').on('change', function() {
                                var machineType = $(this).val();
                                
                                autoFillMachineNameAndTypeId(machineType);
                            });
                        });
                        
                        function initializeSelect2(selectors) {
                            $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                selectors.forEach(function(selector) {
                                    $(selector).select2({
                                        dropdownParent: $('#techJobRegForm'),
                                        matcher: oldMatcher(matchStart),
                                        theme: 'bootstrap-5'
                                    });
                                });
                            });
                            
                            function matchStart(term, text) {
                                return text.toUpperCase().indexOf(term.toUpperCase()) === 0;
                            }
                        }
                        
                        // Customer Name change event
                        function fetchMachines(customerName) {
                            if (!customerName) {
                                resetDropdowns();
                                
                                return;
                            }
                            
                            $.ajax({
                                type: "POST",
                                url: "getAllMachineDetails.php",
                                data: { customer_name: customerName },
                                
                                success: function(response) {
                                    var machines = JSON.parse(response);
                                    
                                    populateSerialNumbers(machines);
                                },
                                
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX error: " + textStatus + " - " + errorThrown);
                                }
                            });
                        }
                        
                        function populateSerialNumbers(machines) {
                            var $serialNumberDropdown = $('#serialnumber').empty();
                            
                            $serialNumberDropdown.append('<option value="">Select Serial Number</option>');
                            
                            machines.forEach(function(machine) {
                                $serialNumberDropdown.append('<option value="' + machine.serialnumber + '">' + machine.serialnumber + '</option>');
                            });
                            
                            $serialNumberDropdown.trigger('change');
                        }
                        
                        function resetDropdowns() {
                            $('#serialnumber').empty().append('<option value="">Select Serial Number</option>');
                        }
                        
                        function autoFillCustomerDetails(customerName) {
                            var selectedOption = $('#customer_name option').filter(function () {
                                return $(this).val() === customerName;
                            });
                            
                            $('#customer_grade').val(selectedOption.data('custgrade'));
                            $('#customer_code').val(selectedOption.data('custcode'));
                            $('#customer_PIC').val(selectedOption.data('custpic'));
                            $('#cust_address1').val(selectedOption.data('custaddr1'));
                            $('#cust_address2').val(selectedOption.data('custaddr2'));
                            $('#cust_address3').val(selectedOption.data('custaddr3'));
                            $('#cust_phone1').val(selectedOption.data('custnum1'));
                            $('#cust_phone2').val(selectedOption.data('custnum2'));
                        }
                        
                        // Serial Number change event
                        function autoFillMachineDetails(serialNumber) {
                            if (!serialNumber) {
                                resetMachineDetails();
                                
                                return;
                            }
                            
                            $.ajax({
                                type: "POST",
                                url: "getMachineDetailsBySerial.php",
                                data: { serial_number: serialNumber },
                                
                                success: function(response) {
                                    var machineDetails = JSON.parse(response);
                                    
                                    $('#machine_name').val(machineDetails.machine_name);
                                    $('#machine_id').val(machineDetails.machine_id);
                                    $('#machine_code').val(machineDetails.machine_code);
                                    $('#brand_id').val(machineDetails.brand_id).trigger('change.select2');
                                    $('#machine_brand').val(machineDetails.machine_brand);
                                    $('#type_id').val(machineDetails.type_id);

                                    populateMachineTypes(machineDetails.brand_id, machineDetails.machine_type);
                                },
                                
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX error: " + textStatus + " - " + errorThrown);
                                }
                            });
                        }
                        
                        function resetMachineDetails() {
                            $('#machine_name').val('');
                            $('#machine_id').val('');
                            $('#machine_code').val('');
                            $('#brand_id').val('');
                            $('#machine_brand').val('');
                            $('#machine_type').val('');
                            $('#type_id').val('');
                        }

                        // Brand ID change event
                        function populateMachineTypes(brandId, selectedMachineType = '') {
                            if (!brandId) {
                                $('#machine_type').empty().append('<option value="">Select Machine Type</option>');
                                
                                return;
                            }
                            
                            $.ajax({
                                type: "POST",
                                url: "getMachineTypesByBrand.php",
                                data: { brand_id: brandId },
                                
                                success: function(response) {
                                    var types = JSON.parse(response);
                                    var $machineTypeDropdown = $('#machine_type').empty();
                                        $machineTypeDropdown.append('<option value="">Select Machine Type</option>');
                                        
                                    types.forEach(function(type) {
                                        var isSelected = (type.type_name === selectedMachineType);
                                        var optionHtml = '<option value="' + type.type_name + '" data-typeID="' + type.type_id + '"';
                                        
                                        if (isSelected) {
                                            optionHtml += ' selected';
                                        }
                                        
                                        optionHtml += '>' + type.type_name + '</option>';
                                        $machineTypeDropdown.append(optionHtml);
                                    });

                                },
                                
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX error: " + textStatus + " - " + errorThrown);
                                }
                            });
                        }

                        function autoFillBrandDetails(brandId) {
                            var selectedOptionBrand = $('#brand_id option').filter(function () {
                                return $(this).val() === brandId;
                            });
                            
                            $('#machine_brand').val(selectedOptionBrand.data('machbrand'));
                        }
                        
                        // Machine Type change event
                        function autoFillMachineNameAndTypeId(machineType) {
                            if (!machineType) {
                                $('#machine_name').val('');
                                $('#type_id').val('');
                                
                                return;
                            }

                            var selectedOptionType = $('#machine_type option').filter(function () {
                                return $(this).val() === machineType;
                            });
                            
                            $.ajax({
                                type: "POST",
                                url: "getMachineNameAndTypeIdByType.php",
                                data: { machine_type: machineType },
                                
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    
                                    $('#machine_name').val(data.machine_name);
                                    $('#type_id').val(selectedOptionType.data('typeid'));
                                },
                                
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("AJAX error: " + textStatus + " - " + errorThrown);
                                    
                                    $('#machine_name').val('');
                                    $('#type_id').val('');
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>

        <!--========== Footer ==========-->
        <footer>
            <nav class="navbar navbar-light position-fixed bottom-0 w-100 justify-content-center" style="background-color: #C0C0C0; z-index: 2">
                <ul class="nav">
                    <li class="nav-item dropup">
                        <div class="text-center">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="ep:list" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Job List</span> 

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="assignedjob.php">Assigned Job</a></li>
                                <li><a class="dropdown-item" href="unassignedjob.php">Unassigned Job</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="pendingjoblistst.php"><i class="iconify" data-icon="carbon:warning-filled" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Pending</span>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="technician.php"><i class="iconify" data-icon="ant-design:home-filled" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Home</span>
                        </div>
                    </li>

                    <li class="nav-item me-2">
                        <div class="text-center">
                            <a class="nav-link" href="incompletejoblistst.php"><i class="iconify" data-icon="fluent-emoji-high-contrast:no-entry" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Incomplete</span>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="completejoblistst.php"><i class="iconify" data-icon="fluent-mdl2:completed-solid" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Completed</span>
                        </div>
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>