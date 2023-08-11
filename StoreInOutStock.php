<?php session_start(); ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>In and Out Stock Record</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link href="css/technicianmain.css" rel="stylesheet" />

        <!--========== JS ==========-->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    </head>
    
    <style>
        ::-webkit-scrollbar {display: none;}
        
        #myTable {counter-reset:rowNumber}
        #myTable tr>td:first-child {counter-increment:rowNumber}
        #myTable tr td:first-child::before {content:counter(rowNumber)}

        #myTable2 {counter-reset:rowNumber}
        #myTable2 tr>td:first-child {counter-increment:rowNumber}
        #myTable2 tr td:first-child::before {content:counter(rowNumber)}

        div.dataTables_length {
            float: left;
            width: 20%;
            margin-top: 4px;
        }
        
        div.row align-items-center float-start {
            width: 100%;
        }
    </style>
    
    <body>
        <!--========== NAV ==========-->
        <nav class="nav">
            <div class="nav__link nav__link dropdown">
                <i class="material-icons">list_alt</i>
                <span class="nav__text">Preparing</span>
                <div class="dropdown-content">
                    <a href="StoreTechnicianUse.php">Technician Use</a>
                    <a href="StoreCustomerRequest.php">Customer Request</a>
                </div>
            </div>
            
            <a href="StorePending.php" class="nav__link">
                <i class="material-icons">pending_actions</i>
                <span class="nav__text">Pending</span>
            </a>
            
            <a href="store.php" class="nav__link">
                <i class="material-icons">home</i>
                <span class="nav__text">Home</span>
            </a>
            
            <a href="StoreReady.php" class="nav__link">
                <i class="material-icons">do_not_disturb_on</i>
                <span class="nav__text">Ready</span>
            </a>
            
            <a href="StoreInOutStock.php" class="nav__link">
                <i class="material-icons">check_circle</i>
                <span class="nav__text">In/Out Stock</span>
            </a>
        </nav>

        <!--========== CONTENTS ==========-->
        <main>
            <section>
                <!-- Add Modal -->
                <div class="modal fade" id="entryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Entry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <form id="saveEntry">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="">Job</label>
                                            <select name="jobname" id="AddJob" onchange="GetDetail(this.value)" class="form-select" style="width: 100%;">
                                                <option value="">-- Select Job --</option>
                                                    <?php
                                                        
                                                        include "dbconnect.php";
                                                        
                                                        $currentJobRegisterID = null;
                                                        $records = mysqli_query($conn, "SELECT * FROM job_register,job_accessories WHERE job_register.jobregister_id=job_accessories.jobregister_id");
                                                        
                                                        while ($data = mysqli_fetch_array($records)) {
                                                            if ($currentJobRegisterID !== $data['jobregister_id']) {
                                                                $currentJobRegisterID = $data['jobregister_id'];
                                                                
                                                                echo "<option value='" . $data['jobregister_id'] . "'>" . $data['job_order_number'] . "&nbsp;&nbsp;&nbsp;" . $data['job_name'] . "</option>";
                                                            }
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Enable Job Selection</label>
                                            <input type="checkbox" id="enableJobSelect" onchange="toggleJobSelect()" checked />
                                        </div>
                                        
                                        <script>
                                            function toggleJobSelect() {
                                                var checkbox = document.getElementById("enableJobSelect");
                                                var jobSelect = document.getElementById("AddJob");
                                                
                                                if (checkbox.checked) {
                                                    jobSelect.removeAttribute("disabled");
                                                } 
                                                
                                                else {
                                                    jobSelect.setAttribute("disabled", "disabled");
                                                    jobSelect.selectedIndex = 0;
                                                    document.getElementById("AddAccessory").innerHTML = `<option value="">-- Select Accessory --</option>
                                                    
                                                    <?php
                                                        
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                                        
                                                        while ($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                                        }
                                                    ?>`;
                                                    
                                                    document.getElementById("quantity").value = "";
                                                }
                                            }
                                            
                                            toggleJobSelect();
                                        </script>
                                        
                                        <script>
                                            function GetDetail(str) {
                                                if (str.length == 0) {
                                                    document.getElementById("AddAccessory").innerHTML = `<option value="">-- Select Accessory --</option>
                                                    
                                                    <?php
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                                        
                                                        while ($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                                        }
                                                    ?>`;
                                                    
                                                    document.getElementById("quantity").value = "";
                                                    
                                                    return;
                                                } 
                                                
                                                else {
                                                    var xmlhttp = new XMLHttpRequest();
                                                    
                                                    xmlhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            var myObj = JSON.parse(this.responseText);
                                                            
                                                            if (myObj.length > 0) {
                                                                var accessoriesHtml = "<option value=''>-- Select Accessory --</option>";
                                                                
                                                                for (var i = 0; i < myObj.length; i++) {
                                                                    accessoriesHtml += "<option value='" + myObj[i].name + "'>" + myObj[i].name + "</option>";
                                                                }
                                                                
                                                                document.getElementById("AddAccessory").innerHTML = accessoriesHtml;
                                                            } 
                                                            
                                                            else {
                                                                document.getElementById("AddAccessory").innerHTML = `<option value="">-- Select Accessory --</option>
                                                                
                                                                <?php
                                                                    
                                                                    include "dbconnect.php";
                                                                    
                                                                    $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                                                    
                                                                    while ($data = mysqli_fetch_array($records)) {
                                                                        echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                                                    }
                                                                ?>`;
                                                            }
                                                            
                                                            document.getElementById("quantity").value = "";
                                                        }
                                                    };
                                                    
                                                    xmlhttp.open("GET", "fetchinout.php?jobregister_id=" + str, true);
                                                    xmlhttp.send();
                                                }
                                            }
                                            
                                            $('#AddJob').select2({
                                                dropdownParent: $('#entryAddModal')
                                            });
                                        </script>
                                        
                                        <div class="mb-3">
                                            <label for="">Technician</label>
                                            <select name="techname" id="Addtechnician" class="form-select" style="width: 100%;">
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
                                            $('#Addtechnician').select2({
                                                dropdownParent: $('#entryAddModal')
                                            });
                                        </script>
                                        
                                        <div class="mb-3">
                                            <label for="">Item</label>
                                            <select name="accessoriesname" id="AddAccessory" onchange="changeQuantity(this.value)" class="form-select" style="width: 100%;">
                                                <option value="">-- Select Accessory --</option>
                                                    <?php
                                                        
                                                        include "dbconnect.php";
                                                        
                                                        $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                                        
                                                        while ($data = mysqli_fetch_array($records)) {
                                                            echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                        
                                        <script>
                                            function changeQuantity(str) {
                                                if (str.length == 0) {
                                                    document.getElementById("quantity").value = "";
                                                    
                                                    return;
                                                } 
                                                
                                                else {
                                                    var xmlhttp = new XMLHttpRequest();
                                                    
                                                    xmlhttp.onreadystatechange = function() {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            var myObj = JSON.parse(this.responseText);
                                                            
                                                            document.getElementById('quantity').value = myObj;
                                                        }
                                                    };
                                                    
                                                    xmlhttp.open("GET", "fetchinout.php?accessory_name=" + str, true);
                                                    xmlhttp.send();
                                                }
                                            }
                                            
                                            $('#AddAccessory').select2({
                                                dropdownParent: $('#entryAddModal')
                                            });
                                        </script>

                                        <div class="mb-3">
                                            <label for="out_date">Item Out Date</label>
                                            <div style="display: flex; align-items: center;">
                                                <input type="text" id="out_date" name="out_date" class="form-control" />
                                                <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;" onclick="ItemOutDateTime(event)">Click</button>
                                            </div>
                                        
                                            <script type="text/javascript">
                                                function ItemOutDateTime(event) {
                                                    event.preventDefault();
                                                    fetch("departureTime.php").then(response => response.text()).then(result => {
                                                        document.getElementById("out_date").value = result;
                                                    });
                                                }
                                            </script>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" id="quantity" name="quantity" class="form-control" />
                                        </div>
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

                <!-- Update Modal -->
                <div class="modal fade" id="entryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Entry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <form id="updateStudent">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="inout_id" id="inout_id">
                                        
                                        <div class="mb-3">
                                            <label for="">Item</label>
                                            <input type="text" name="accessoriesname" id="EditAccessory" class="form-control" disabled />
                                        </div>
    
                                        <div class="mb-3">
                                            <label for="">Technician</label>
                                            <select type="text" name="techname" id="EditTechnician" style="width: 100%;" class="form-select">
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
                                                $('#EditTechnician').select2({
                                                    dropdownParent: $('#entryEditModal')
                                                });
                                            });
                                        </script>

                                        <div class="mb-3">
                                            <label for="">Out Date Time</label>
                                            <div style="display: flex; align-items: center;">
                                                <input type="text" name="out_date" id="out_dateEdit" class="form-control" />
                                                <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;" onclick="ItemOutDateTimeEdit(event)">Click</button>
                                            </div>
                                        
                                            <script type="text/javascript">
                                                function ItemOutDateTimeEdit(event) {
                                                    event.preventDefault();
                                                    fetch("departureTime.php").then(response => response.text()).then(result => {
                                                        document.getElementById("out_dateEdit").value = result;
                                                    });
                                                }
                                            </script>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" id="quantity1" class="form-control" disabled />
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Remaining</label>
                                            <input type="number" name="balance" id="balance" class="form-control" />
                                        </div>
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
                                <p style="text-align: center;">Are you sure you want to delete this accessory?</p>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
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

                <!-- request -->
                <div class="modal fade" id="RequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                                <button type="button" onclick="location.reload('StoreInOutStock.php');" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div id="requestContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Accessory In and Out</h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        
                                        <div class="float-end mx-2" style="padding-bottom: 15px;">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#entryAddModal">Add</button>
                                            <a href="StoreReturnStock.php" class="btn btn-secondary btn-sm">Return</a>
                                            <button type='button' class='requestBtn btn btn-secondary btn-sm'>Request</button>
                                        </div>

                                        <div class="row g-3 align-items-center float-start" style="padding-right: 15px; text-size-adjust: small;">
                                            <div class="col-auto" style="padding-right:0;">
                                                <label class="col-form-label">Table</label>
                                            </div>
                                            
                                            <div class="col-auto">
                                                <select name="job_tech" id="job_tech" onchange="showSelectedTable()" class="form-select form-select-sm">
                                                    <option value="jobuse">Job</option>
                                                    <option value="techuse">Technician</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <script>
                                            let currentTable;
                                            
                                            function showSelectedTable() {
                                                const selectedOption = document.getElementById("job_tech");
                                                const tableContainer = document.getElementById("table-container");
                                                const jobuseTable = document.getElementById("myTable");
                                                const techuseTable = document.getElementById("myTable2");
                                                
                                                const selectedValue = selectedOption.value;
                                                
                                                jobuseTable.style.display = "none";
                                                techuseTable.style.display = "none";
                                                
                                                if (currentTable) {
                                                    currentTable.destroy();
                                                    currentTable = null;
                                                }
                                                
                                                if (selectedValue == "jobuse") {
                                                    jobuseTable.style.display = "block";
                                                    jobuseTable.classList.remove("dataTable", "no-footer");
                                                    
                                                    currentTable = new DataTable('#myTable', {
                                                        autoWidth: false,
                                                        responsive: true,
                                                        dom: '<"toolbar">lfrtip'
                                                    });
                                                } 
                                                
                                                else if (selectedValue == "techuse") {
                                                    techuseTable.style.display = "block";
                                                    techuseTable.classList.remove("dataTable", "no-footer");
                                                    
                                                    currentTable = new DataTable('#myTable2', {
                                                        autoWidth: false,
                                                        responsive: true,
                                                        dom: '<"toolbar">lfrtip'
                                                    });
                                                }
                                            }
                                            
                                            document.addEventListener("DOMContentLoaded", function() {
                                                showSelectedTable();
                                            });
                                        </script>
                                        
                                        <table id="myTable" class="table table-bordered table-striped" style="display:none;" >
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
                                                    <td style='text-align: center;'></td>
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
                                                        <button type='button' value='<?= $entry['inout_id'] ?>' class='editEntryBtn btn btn-success btn-sm'>Edit</button>
                                                        <button type='button' value='<?= $entry['inout_id'] ?>' class='deleteEntryBtn btn btn-danger btn-sm'>Delete</button>
                                                    </td>
                                                </tr>
                                                <?php } } } ?>
                                            </tbody>
                                        </table>
                                        
                                        <table id="myTable2" class="table table-bordered table-striped" style="display:none">
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
                                                    
                                                    if (mysqli_num_rows($query_run) > 0) {
                                                        foreach ($query_run as $entry) {
                                                            $query2 = "SELECT job_order_number, job_name, customer_name 
                                                                       FROM accessories_inout, job_accessories, job_register 
                                                                       WHERE accessories_inout.accessoriesname = '$entry[accessoriesname]' 
                                                                       AND accessories_inout.accessoriesname = job_accessories.accessories_name 
                                                                       AND job_accessories.jobregister_id=job_register.jobregister_id";
                                                            
                                                            $query_run2 = mysqli_query($conn, $query2);
                                                            
                                                            if (mysqli_num_rows($query_run2) > 0) {
                                                                $entry = mysqli_fetch_array($query_run2);
                                                ?>
                                                
                                                <tr>
                                                    <td style='text-align: center;'></td>
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
                                                        <button type='button' value='<?= $entry['inout_id'] ?>' class='editEntryBtn btn btn-success btn-sm'>Edit</button>
                                                        <button type='button' value='<?= $entry['inout_id'] ?>' class='deleteEntryBtn btn btn-danger btn-sm'>Delete</button>
                                                    </td>
                                                </tr>
                                                <?php } } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                </br>
                </br>                
                
                <!--========== JS ==========-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                  
                <script>
                    // <!-- Add -->
                    $(document).on('submit', '#saveEntry', function(e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        formData.append("save_entry", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                            
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                
                                if (res.status == 422) {
                                    $('#errorMessage').removeClass('d-none');
                                    $('#errorMessage').text(res.message);
                                } 
                                
                                else if (res.status == 200) {
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
                    
                    // <!-- Update -->
                    $(document).on('click', '.editEntryBtn', function() {
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
                                    $('#inout_id').val(res.data.inout_id);
                                    $('#EditAccessory').val(res.data.accessoriesname);
                                    $('#EditTechnician').val(res.data.techname).trigger('change');
                                    $('#out_dateEdit').val(res.data.out_date);
                                    $('#quantity1').val(res.data.quantity);
                                    $('#balance').val(res.data.balance);
                                    
                                    $('#entryEditModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    $(document).on('submit', '#updateEntry', function(e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("update_entry", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "code.php",
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
                                    }, 700);;
                                } 
                                
                                else if (res.status == 500) {
                                    alert(res.message);
                                }
                            }
                        });
                    });
                    
                    // <!-- Delete -->
                    $(document).on('click', '.deleteEntryBtn', function() {
                        var entry_id = $(this).val();
                        
                        $('#confirmDeleteBtn').val(entry_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var entry_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: {'delete_entry': true,
                                       'entry_id': entry_id},
                                    
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
                    
                    function acceptRecord(remarkid) {
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: {'remarkid': remarkid,
                                     'accept': true},
                                     
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                $('#request' + remarkid).remove();
                                alertify.set('notifier', 'position', 'top-right');
                                alertify.success(res.message);
                            },
                        });
                    }
                    
                    function rejectRecord(remarkid) {
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: {'remarkid': remarkid,
                                     'delete': true},
                                     
                            success: function(response) {
                                var res = jQuery.parseJSON(response);
                                $('#request' + remarkid).remove();
                                alertify.set('notifier', 'position', 'top-right');
                                alertify.success(res.message);
                                
                                setTimeout(function() {
                                    location.reload();
                                }, 700);
                            },
                        });
                    }
                </script>
            </section>
        </main>        
    </body>
    </html>