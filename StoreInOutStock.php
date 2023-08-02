<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    <title>In and Out Stock Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="css/technicianmain.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

</head>


<style>
    #myTable,
    #myTable2 {
        counter-reset: rowNumber;
    }

    #myTable tr>td:first-child,
    #myTable2 tr>td:first-child {
        counter-increment: rowNumber;
    }

    #myTable tr td:first-child::before,
    #myTable2 tr>td:first-child::before {
        content: counter(rowNumber);
    }
</style>

<body>
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

    <!-- Add Entry -->
    <div class="modal fade" id="entryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="saveEntry">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Job</label>
                            <select name="jobname" id="AddJob" class="form-control" onchange="GetDetail(this.value)">
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
                                } else {
                                    jobSelect.setAttribute("disabled", "disabled");
                                    // Reset the selected option to "-- Select Job --"
                                    jobSelect.selectedIndex = 0;
                                    // Clear the accessory options and quantity when disabling job select
                                    document.getElementById("AddAccessory").innerHTML = `
                                    <option value="">-- Select Accessory --</option>
                                    <?php
                                    include "dbconnect.php";

                                    $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                    }
                                    ?>
                                    `;
                                    document.getElementById("quantity").value = "";
                                }
                            }

                            // Call the function when the page loads
                            toggleJobSelect();
                        </script>

                        <script>
                            function GetDetail(str) {
                                if (str.length == 0) {
                                    document.getElementById("AddAccessory").innerHTML = `
                                    <option value="">-- Select Accessory --</option>
                                    <?php
                                    include "dbconnect.php";

                                    $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                    }
                                    ?>
                                    `;
                                    document.getElementById("quantity").value = "";
                                    return;
                                } else {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {

                                            var myObj = JSON.parse(this.responseText);

                                            if (myObj.length > 0) {
                                                // If there are accessories, update the accessory item
                                                var accessoriesHtml = "<option value=''>-- Select Accessory --</option>";
                                                for (var i = 0; i < myObj.length; i++) {
                                                    accessoriesHtml += "<option value='" + myObj[i].name + "'>" + myObj[i].name + "</option>";
                                                }
                                                document.getElementById("AddAccessory").innerHTML = accessoriesHtml;
                                            } else {
                                                // No accessories found, clear the accessory item and quantity
                                                document.getElementById("AddAccessory").innerHTML = `
                                                <option value="">-- Select Accessory --</option>
                                                <?php
                                                include "dbconnect.php";

                                                $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");

                                                while ($data = mysqli_fetch_array($records)) {
                                                    echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                                }
                                                ?>
                                                `;
                                            }
                                            document.getElementById("quantity").value = "";

                                        }
                                    };

                                    xmlhttp.open("GET", "fetchinout.php?jobregister_id=" + str, true);
                                    xmlhttp.send();
                                }
                            }
                            $(document).ready(function() {
                                $("#AddJob").select2({
                                    placeholder: "-- Select Job --",
                                    allowClear: true
                                });
                            });
                        </script>

                        <div class="mb-3">
                            <label for="">Item</label>
                            <select name="accessoriesname" id="AddAccessory" class="form-control" onchange="changeQuantity(this.value)">
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
                                } else {
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
                            $(document).ready(function() {
                                $("#AddAccessory").select2({
                                    placeholder: "-- Select Accessory --",
                                    allowClear: true
                                });
                            });
                        </script>

                        <div class="mb-3">
                            <label for="">Technician</label>
                            <select name="techname" id="Addtechnician" class="form-control">
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
                            $(document).ready(function() {
                                $("#Addtechnician").select2({
                                    placeholder: "-- Select Technician --",
                                    allowClear: true
                                });
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

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="entryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="updateEntry">
                    <div class="modal-body">
                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="inout_id" id="inout_id">

                        <div class="mb-3">
                            <label for="">Item</label>
                            <select type="text" name="accessoriesname" id="EditAccessory" class="form-control">
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
                            $(document).ready(function() {
                                $("#EditAccessory").select2();
                            });
                        </script>

                        <div class="mb-3">
                            <label for="">Technician</label>
                            <select type="text" name="techname" id="EditTechnician" class="form-control">
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
                            $(document).ready(function() {
                                $("#EditTechnician").select2();
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
                            <input type="number" name="quantity" id="quantity1" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Remaining</label>
                            <input type="number" name="balance" id="balance" class="form-control" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="entryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
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

    <!-- View Remark -->
    <div class="modal fade" id="RemarkViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remark</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div id="remarkContainer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Request -->
    <div class="modal fade" id="RequestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                    <button type="button" onclick="location.reload('StoreInOutStock.php');" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div id="requestContainer"></div>
                    </div>
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
                    <div class="card-body" style="margin-bottom: 50px;">
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#entryAddModal">Add</button>
                        <a href="StoreReturnStock.php" class="btn btn-secondary float-end mx-2">Return</a>
                        <button type='button' class='requestBtn btn btn-secondary float-end'>Request</button>
                        <div style="margin-bottom: 10px;">
                            <label for="job_tech">For: </label>
                            <select name="job_tech" id="job_tech" onchange="showSelectedTable()">
                                <option value="jobuse">Job</option>
                                <option value="techuse">Technician</option>
                            </select>
                        </div>
                        <div class="table-responsive" id="table-container">
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

                                        // Restore the original table structure (remove DataTables classes)
                                        jobuseTable.classList.remove("dataTable", "no-footer");

                                        // Initialize the DataTable for jobuseTable
                                        currentTable = new DataTable('#myTable', {
                                            autoWidth: false, // Disable automatic width adjustment
                                            dom: '<"toolbar">lfrtip'
                                        });

                                    } else if (selectedValue == "techuse") {
                                        techuseTable.style.display = "block";

                                        // Restore the original table structure (remove DataTables classes)
                                        techuseTable.classList.remove("dataTable", "no-footer");

                                        // Initialize the DataTable for techuseTable
                                        currentTable = new DataTable('#myTable2', {
                                            autoWidth: false, // Disable automatic width adjustment
                                            dom: '<"toolbar">lfrtip'
                                        });
                                    }

                                }
                                document.addEventListener("DOMContentLoaded", function() {
                                    showSelectedTable();
                                });
                            </script>
                            <table id="myTable" class="table table-bordered table-striped" style="display:none">
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

                                    $query = "SELECT * FROM accessories_inout ORDER BY CreatedTime_inout DESC LIMIT 50";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($entry = mysqli_fetch_array($query_run)) {
                                            $query2 = "SELECT job_order_number, job_name, customer_name FROM accessories_inout, job_accessories, job_register WHERE accessories_inout.accessoriesname = '$entry[accessoriesname]' AND accessories_inout.accessoriesname = job_accessories.accessories_name AND job_accessories.jobregister_id=job_register.jobregister_id";
                                            $query_run2 = mysqli_query($conn, $query2);
                                            if (mysqli_num_rows($query_run2) > 0) {
                                                $entry2 = mysqli_fetch_array($query_run2);
                                                echo "<tr>";
                                                echo "<td style='text-align: center;'></td>";
                                                echo "<td style='text-align: center;'>" . $entry2['job_order_number'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $entry2['job_name'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $entry2['customer_name'] . "</td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>" . $entry['techname'] . "</td>";
                                                echo "<td>" . $entry['accessoriesname'] . "</td>";
                                                echo "<td style='white-space: nowrap;'>" . $entry['out_date'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $entry['quantity'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $entry['balance'] . "</td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>
                                                    <button type='button' value='" . $entry['inout_id'] . "' class='RemarkBtn btn btn-warning btn-sm'>Remark</button>
                                                </td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>
                                                    <button type='button' value='" . $entry['inout_id'] . "' class='viewEntryBtn btn btn-info btn-sm'>View</button>
                                                    <button type='button' value='" . $entry['inout_id'] . "' class='editEntryBtn btn btn-success btn-sm'>Edit</button>
                                                    <button type='button' value='" . $entry['inout_id'] . "' class='deleteEntryBtn btn btn-danger btn-sm'>Delete</button>
                                                </td>";
                                                echo "</tr>";
                                            }
                                        }
                                    }
                                    ?>
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

                                    $query = "SELECT * FROM accessories_inout ORDER BY CreatedTime_inout DESC LIMIT 50";

                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($entry = mysqli_fetch_array($query_run)) {
                                            $query2 = "SELECT job_order_number, job_name, customer_name FROM accessories_inout, job_accessories, job_register WHERE accessories_inout.accessoriesname = '$entry[accessoriesname]' AND accessories_inout.accessoriesname = job_accessories.accessories_name AND job_accessories.jobregister_id=job_register.jobregister_id";
                                            $query_run2 = mysqli_query($conn, $query2);
                                            if (mysqli_num_rows($query_run2) == 0) {
                                                echo "<tr>";
                                                echo "<td style='text-align: center;'></td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>" . $entry['techname'] . "</td>";
                                                echo "<td>" . $entry['accessoriesname'] . "</td>";
                                                echo "<td style='white-space: nowrap;'>" . $entry['out_date'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $entry['quantity'] . "</td>";
                                                echo "<td style='text-align: center;'>" . $entry['balance'] . "</td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>
                                                <button type='button' value='" . $entry['inout_id'] . "' class='RemarkBtn btn btn-warning btn-sm'>Remark</button>
                                            </td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>
                                                <button type='button' value='" . $entry['inout_id'] . "' class='viewEntryBtn btn btn-info btn-sm'>View</button>
                                                <button type='button' value='" . $entry['inout_id'] . "' class='editEntryBtn btn btn-success btn-sm'>Edit</button>
                                                <button type='button' value='" . $entry['inout_id'] . "' class='deleteEntryBtn btn btn-danger btn-sm'>Delete</button>
                                            </td>";
                                                echo "</tr>";
                                            }
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Table -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
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
                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none');
                        $('#entryAddModal').modal('hide');
                        $('#saveEntry')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        setTimeout(function() {
                            location.reload("StockInOutStock.php");
                        }, 1500);
                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editEntryBtn', function() {

            var entry_id = $(this).val();

            $.ajax({
                type: "GET",
                url: "code.php?entry_id=" + entry_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {

                        $('#inout_id').val(res.data.inout_id);
                        $('#EditAccessory').val(res.data.accessoriesname);
                        $('#EditTechnician').val(res.data.techname);
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
                    } else if (res.status == 200) {

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#entryEditModal').modal('hide');
                        $('#updateEntry')[0].reset();

                        setTimeout(function() {
                            location.reload("StockInOutStock.php");
                        }, 1500);
                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewEntryBtn', function() {

            var entry_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?entry_id=" + entry_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {

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

        $(document).on('click', '.deleteEntryBtn', function(e) {
            e.preventDefault();

            if (confirm('Are you sure you want to delete this data?')) {
                var entry_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_entry': true,
                        'entry_id': entry_id
                    },
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (res.status == 500) {

                            alert(res.message);
                        } else {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);

                            setTimeout(function() {
                                location.reload("StoreInOutStock.php");
                            }, 1500);
                        }
                    }
                });
            }
        });

        $(document).on('click', '.RemarkBtn', function() {
            var entry_idRemark = $(this).val();

            $.ajax({
                type: "GET",
                url: "code.php?entry_idRemark=" + entry_idRemark,
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {

                        var remarks = res.data;

                        $('#remarkContainer').empty();

                        remarks.forEach(function(remark) {

                            var inputGroup = '<div class="mb-3">' +
                                '<div class="row">' +
                                '<div class="col-sm">' +
                                '<label for="Remark">Remark</label>' +
                                '<input type="text" value="' + remark.remark_note +
                                '" style="background:none;" class="form-control" Readonly></input>' +
                                '</div>' +

                                '<div class="col-sm" style="text-align:center;">' +
                                '<label for="Date">Date</label>' +
                                '<input type="text" value="' + remark.remark_date +
                                '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                '</div>' +

                                '<div class="col-sm-3" style="text-align:center;">' +
                                '<label for="Quantity">Quantity</label>' +
                                '<input type="text" value="' + remark.remark_quantity +
                                '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
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
        $(document).on('click', '.requestBtn', function() {
            $.ajax({
                type: "GET",
                url: "code.php",
                data: {
                    'Request': true
                },
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {

                        var requests = res.data;

                        $('#requestContainer').empty();

                        requests.forEach(function(request) {
                            var inputGroup = '<div class="mb-3"  id="request' + request.remarkid + '">' +
                                '<div class="row d-flex flex-row">' +
                                '<div class="col-sm-4">' +
                                '<label for="request">Request</label>' +
                                '<input type="text" value="' + request.remark_note +
                                '" style="background:none;" class="form-control" Readonly></input>' +
                                '</div>' +

                                '<div class="col-sm-3" style="text-align:center;">' +
                                '<label for="item">Item</label>' +
                                '<input type="text" data-item-id="' + request.inout_id + '" class="form-control item-input" Readonly></input>' +
                                '</div>' +

                                '<div class="col-sm-3" style="text-align:center;">' +
                                '<label for="Date">Date</label>' +
                                '<input type="text" value="' + request.remark_date +
                                '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                '</div>' +

                                '<div class="col-sm-2" style="text-align:center;">' +
                                '<label for="Quantity">Quantity</label>' +
                                '<input type="text" value="' + request.remark_quantity +
                                '" style="text-align:center; background:none;" class="form-control" Readonly></input>' +
                                '</div>' +

                                '<div class="col-sm">' +
                                '<label for=""></label>' +
                                '<button id="acceptBtn" style="width: 70px; margin-left: 80%;height: 40px; background-color: green; color:white;" class="form-control" onclick="acceptRecord(' + request.remarkid + ')" style="width: 70px; color: white; background-color:green;">accept</button>' +
                                '</div>' +

                                '<div class="col-sm">' +
                                '<label for=""></label>' +
                                '<button id="rejectBtn" style="width: 70px; height: 40px; background-color: red; color:white;"class="form-control" onclick="rejectRecord(' + request.remarkid + ')" style="width: 70px; color: white; background-color:red;">reject</button>' +
                                '</div>'
                            '</div> </div>';


                            $('#requestContainer').append(inputGroup);
                            fetchItemNames();
                        });


                        $('#RequestModal').modal('show');
                    }
                }
            });
        });

        function fetchItemNames() {
            // Select all input elements with the class 'item-input'
            var itemInputs = $('.item-input');

            // Loop through each input element to fetch the item name
            itemInputs.each(function(index, element) {
                var itemId = $(element).data('item-id');

                // Make an AJAX call to a PHP script that fetches the item name based on the item ID
                $.ajax({
                    type: "GET",
                    url: "code.php",
                    data: {
                        'inout_id': itemId,
                        'RequestItem': true
                    },
                    success: function(response) {
                        var res = jQuery.parseJSON(response);

                        if (res.status == 404) {
                            alert(res.message);
                        } else if (res.status == 200) {
                            // Update the input field with the item name
                            $(element).val(res.accessoriesname);
                        }
                    },
                    error: function() {
                        // Handle error if needed   
                    }
                });
            });
        }

        function acceptRecord(remarkid) {
            // Make an AJAX call to your PHP script to delete the record
            $.ajax({
                type: "POST", // or "GET" depending on your server-side code
                url: "code.php", // Replace with the URL of your PHP script that handles record deletion
                data: {
                    'remarkid': remarkid,
                    'accept': true
                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    // Handle success (e.g., remove the corresponding record from the UI)
                    $('#request' + remarkid).remove();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                },
            });
        }

        function rejectRecord(remarkid) {
            // Make an AJAX call to your PHP script to delete the record
            $.ajax({
                type: "POST", // or "GET" depending on your server-side code
                url: "code.php", // Replace with the URL of your PHP script that handles record deletion
                data: {
                    'remarkid': remarkid,
                    'delete': true
                },
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    // Handle success (e.g., remove the corresponding record from the UI)
                    $('#request' + remarkid).remove();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                },
            });
        }
    </script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>


</body>

</html>