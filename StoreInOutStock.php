<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
        
        <title>In and Out Stock Record</title>

        <!--========== CSS ==========-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link href="css/technicianmain.css" rel="stylesheet" />

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        
        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    </head>

    <style>
        ::-webkit-scrollbar {display: none;}
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
        <!-- Add Modal -->
        <div class="modal fade" id="entryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Entry</h5>
                        <button type="button" onclick="location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <script>let selectedjobregister_id = null;</script>
                    
                    <form id="saveEntry">
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="">Job</label>
                                    <select name="jobregister_id" id="AddJob" onchange="GetDetail(this.value)" class="form-select" style="width: 100%;">
                                        <option value="">-- Select Job --</option>
                                            <?php
                                            
                                                include "dbconnect.php";
                                                
                                                $currentJobRegisterID = null;
                                                
                                                $records = mysqli_query($conn, "SELECT * FROM job_register,job_accessories WHERE job_register.jobregister_id=job_accessories.jobregister_id");
                                                
                                                while ($data = mysqli_fetch_array($records)) {
                                                    if ($currentJobRegisterID !== $data['jobregister_id']) {
                                                        $currentJobRegisterID = $data['jobregister_id'];
                                                        
                                                        echo "<option value='" . $data['jobregister_id'] . "'>" . $data['job_order_number'] . "&nbsp;&nbsp;&nbsp;" . $data['job_name'] . " - " . $data['customer_name'] . "</option>";
                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#AddJob').select2({
                                            dropdownParent: $('#saveEntry'),
                                            theme: 'bootstrap-5'
                                        });
                                    });
                                </script>
                                
                                <div class="mb-3">
                                    <label for="">Enable Job Selection</label>
                                    <input type="checkbox" id="enableJobSelect" onchange="toggleJobSelect()" checked />
                                </div>
                                        
                                <script>
                                    function toggleJobSelect() {
                                        var checkbox = document.getElementById("enableJobSelect");
                                        var jobSelect = document.getElementById("AddJob");
                                        var addbutton = document.getElementById("toggleButton")
                                        
                                        if (checkbox.checked) {
                                            jobSelect.removeAttribute("disabled");
                                            $('#toggleButton').prop("disabled", false);
                                        }
                                        
                                        else {
                                            jobSelect.setAttribute("disabled", "disabled");
                                            addbutton.setAttribute("disabled", "disabled");
                                            $('#contentDiv').css('display', 'none');
                                            jobSelect.selectedIndex = 0;
                                            document.getElementById("AddAccessory").innerHTML = 
                                                `<option value="">-- Select Accessory --</option>
                                                    
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
                                            selectedjobregister_id = null;
                                            document.getElementById("AddAccessory").innerHTML = 
                                                `<option value="">-- Select Accessory --</option>
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
                                            selectedjobregister_id = str;
                                            var xmlhttp = new XMLHttpRequest();
                                            
                                            xmlhttp.onreadystatechange = function() {
                                                if (this.readyState == 4 && this.status == 200) {
                                                    var myObj = JSON.parse(this.responseText);
                                                    var technician = document.getElementById("Addtechnician");
                    
                                                    console.log("Before: "+ technician.value);
                                                    
                                                    if (myObj.length > 0) {
                                                        for (i = 0; i < technician.options.length; i++){
                                                            if (technician.options[i].text === myObj[0].jobassign) {
                                                                technician.options[i].selected = true;
                                                                break;
                                                            }
                                                        }
                                                        console.log("After: "+ technician.value);
                                                        var accessoriesHtml = "<option value=''>-- Select Accessory --</option>";
                                                        
                                                        for (var i = 0; i < myObj.length; i++) {
                                                            accessoriesHtml += "<option value='" + myObj[i].name + "'>" + myObj[i].name + "</option>";
                                                        }
                                                        
                                                        document.getElementById("AddAccessory").innerHTML = accessoriesHtml;
                                                    }
                                                    
                                                    else {
                                                        document.getElementById("AddAccessory").innerHTML = 
                                                            `<option value="">-- Select Accessory --</option>
                                                                
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
                                                
                                <div class="mb-3">
                                    <label for="">Item</label>
                                    <div class="input-group">
                                        <select name="accessoriesname" id="AddAccessory" onchange="changeQuantity(this.value)" class="form-select">
                                            <option value="">-- Select Accessory --</option>
                                                <?php
                                                
                                                    include "dbconnect.php";
                                                        
                                                    $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                                        
                                                    while ($data = mysqli_fetch_array($records)) {
                                                        echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                                    }
                                                ?>
                                        </select>

                                        <button type="button" id="toggleButton" class="btn" style="background-color: #081d45; color:white; border:none;"><i class="iconify" data-icon="fluent:add-12-filled"></i></button>
                                    </div>

                                    <!-- Add More Accessory -->
                                    <div class="card mt-3" id="contentDiv" style="display: none;">
                                        <div class="card-body">
                                            <form id="moreaddaccessory">
                                                <label for="" class="fw-bold mb-3">Add More Accessory</label>
                                                <select class="form-select" id="addAcc" name="accessories_id" onchange="getAcc(this.value)">
                                                    <option value="">Select Accessories Code</option>
                                                        <?php
                                                            include "dbconnect.php";
                                                        
                                                            $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_code ASC");
                                                        
                                                            while($data = mysqli_fetch_array($records)) {
                                                                echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. " - " . $data['accessories_name']."</option>";
                                                            }
                                                        ?>
                                                </select>
                                            
                                                <input type="text" name="accessories_code" id="moreaccessories_code" class="form-control mt-2" value="">
                                            
                                                <div class="d-flex gap-2 mt-2 mb-2">
                                                    <input type="text" id="moreaccessories_name" class="form-control" name="accessories_name" value="">
                                                    <input type="number" class="form-control" id="moreaccessories_quantity" name="accessories_quantity" value="">
                                                    <input type="hidden" id="moreaccessories_uom" name="accessories_uom" value="">
                                                </div>
                                            
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn" style="color: white; background-color:#081d45; border:none;" onclick="submitForm();">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        function getAcc(str) {
                                            if (str.length == 0) {
                                                document.getElementById('moreaccessories_code').value = "";
                                                document.getElementById('moreaccessories_name').value = "";
                                                document.getElementById('moreaccessories_quantity').value = "";
                                                document.getElementById('moreaccessories_uom').value = "";
                                            
                                                return;
                                            }
                                        
                                            else {
                                                var xmlhttp = new XMLHttpRequest();
                                                
                                                xmlhttp.onreadystatechange = function() {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                        var myObj = JSON.parse(this.responseText);
                                                        
                                                        document.getElementById('moreaccessories_code').value = myObj.code;
                                                        document.getElementById('moreaccessories_name').value = myObj.name;
                                                        document.getElementById('moreaccessories_uom').value = myObj.uom;
                                                    }
                                                };
                                            
                                                xmlhttp.open("GET", "fetchinout.php?accessory_id=" + str, true);
                                                xmlhttp.send();
                                            }
                                        }
                                    </script>
                                
                                    <script>
                                        function submitForm() {
                                            accessories_id = document.getElementById('addAcc').value;
                                            accessories_code = document.getElementById('moreaccessories_code').value;
                                            accessories_name = document.getElementById('moreaccessories_name').value;
                                            accessories_quantity = document.getElementById('moreaccessories_quantity').value;
                                            accessories_uom = document.getElementById('moreaccessories_uom').value;
                                            
                                            $.ajax({
                                                url: "code.php",
                                                type: "POST",
                                                data: {
                                                    accessories_id:accessories_id,
                                                    accessories_code:accessories_code,
                                                    accessories_name:accessories_name,
                                                    accessories_quantity:accessories_quantity,
                                                    accessories_uom:accessories_uom,
                                                    jobregister_id:selectedjobregister_id,
                                                    moreacc: true
                                                },
                                                
                                                success: function (response) {
                                                    console.log(response);
                                                    
                                                    var res = JSON.parse(response);
                                                    
                                                    if (res.status == 200) {
                                                        var acc = document.getElementById("AddAccessory")
                                                        var option = document.createElement("option");
                                                        
                                                        option.value = document.getElementById('moreaccessories_name').value;
                                                        option.text = document.getElementById('moreaccessories_name').value;
                                                        acc.appendChild(option);
                                                        document.querySelector("#AddAccessory option[value='" + option.value +"']").selected = true;

                                                        document.getElementById('quantity').value = document.getElementById('moreaccessories_quantity').value;
                                                        document.getElementById('contentDiv').style.display = "none";
                                                        document.getElementById('addAcc').selectedIndex = 0;
                                                        document.getElementById('moreaccessories_code').value = "";
                                                        document.getElementById('moreaccessories_name').value = "";
                                                        document.getElementById('moreaccessories_quantity').value = "";
                                                        document.getElementById('moreaccessories_uom').value = "";
                                                    }
                                                },
                                            
                                                error: function (xhr, status, error) {
                                                    console.error(error);
                                                },
                                            });
                                        }
                                    </script>
                                    
                                    <script>
                                        $(document).ready(function(){
                                            $('#addAcc').select2({
                                                theme: 'bootstrap-5'
                                            });
                                        });
                                    </script>
                                            
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            const toggleButton = document.getElementById("toggleButton");
                                            const contentDiv = document.getElementById("contentDiv");
                                            
                                            toggleButton.addEventListener("click", function () {
                                                if (contentDiv.style.display === "none") {
                                                    contentDiv.style.display = "block";
                                                }
                                            
                                                else {
                                                    contentDiv.style.display = "none";
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#AddAccessory').select2({
                                            dropdownParent: $('#saveEntry'),
                                            theme: 'bootstrap-5'
                                        });
                                    });
                                </script>
                                        
                                <script>
                                    function changeQuantity(str) {
                                        if (document.getElementById("enableJobSelect").checked){
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
                                    }
                                </script>

                                <div class="mb-3">
                                    <label for="out_date">Item Out Date</label>
                                    <div class="input-group">
                                        <input type="text" id="out_date" name="out_date" class="form-control" />
                                        <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;" onclick="ItemOutDateTime(event)">Click</button>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    function ItemOutDateTime(event) {
                                        event.preventDefault();
                                        
                                        fetch("departureTime.php").then(response => response.text()).then(result => {
                                            document.getElementById("out_date").value = result;
                                        });
                                    }
                                </script>
                                        
                                <div class="mb-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" />
                                </div>
                            </div>
                            
                            <div id="errorMessage" class="alert alert-warning d-none" style="text-align: center;"></div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="saveEntry()">Save</button>
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
                        <button type="button" onclick="location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form id="updateEntry">
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="inout_id" id="inout_id">
                                
                                <div class="mb-3">
                                    <label for="">Item</label>
                                    <input type="text" name="accessoriesname" id="EditAccessory" class="form-control" disabled readonly />
                                </div>
    
                                <div class="mb-3">
                                    <label for="">Technician</label>
                                    <input type="text" name="techname" id="EditTechnician" class="form-control" disabled readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="">Out Date Time</label>
                                    <div class="input-group">
                                        <input type="text" name="out_date" id="out_dateEdit" class="form-control" />
                                        <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;" onclick="ItemOutDateTimeEdit(event)">Date</button>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    function ItemOutDateTimeEdit(event) {
                                        event.preventDefault();
                                        fetch("departureTime.php").then(response => response.text()).then(result => {
                                            document.getElementById("out_dateEdit").value = result;
                                        });
                                    }
                                </script>
                                
                                <div class="mb-3">
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" id="quantity1" class="form-control" disabled readonly/>
                                </div>
                                        
                                <div class="mb-3">
                                    <label for="">Remaining</label>
                                    <input type="number" name="balance" id="balance" class="form-control"/>
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
                        <button type="button" onclick="location.reload()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Return Form -->
                    <div class="clearfix me-3 mt-3">
                        <div class="float-end">
                            <button type="button" id="returnButton" class="btn" style="color: white; background-color:#081d45; border:none">Return</button>
                        </div>  
                    </div>
                    
                    <div class="card m-3" id="returnForm" style="display: none;">
                        <div class="card-body">
                            <form id="remarkEntry">
                                <input type="hidden" name="inout_id" id="inout_idremark">
                                
                                <div class="row mb-3">    
                                    <div class="col-md-6 mb-2">
                                        <label for="">Remark</label>
                                        <input type="text" class="form-control" name="remark_note[]" id="remark_note" value="Return to Store">
                                    </div>
                                    
                                    <div class="col-md-6 mb-2">
                                        <label for="">Date</label>
                                        <div class="input-group">
                                            <input type="text" id="remark_date" name="remark_date[]" class="form-control" autocomplete="off" />
                                            <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;"><i class="iconify" data-icon="clarity:cursor-hand-click-line" onclick="RemarkDateAsal(event)"></i></button>
                                        </div>
                                    </div>
                                    
                                    <script type="text/javascript">
                                        function RemarkDateAsal(event) {
                                            event.preventDefault();
                                            
                                            fetch("AccessoryHandoverDate.php").then(response => response.text()).then(result => {
                                                document.getElementById("remark_date").value = result;
                                            });
                                        }
                                    </script>
                                    
                                    <div class="col-md-6">
                                        <label for="">Quantity</label>
                                        <input type="number" class="form-control" name="remark_quantity[]" id="remark_quantity">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Verify By</label>
                                        <input type="text" class="form-control" name="verified_by" id="verified_by" value="<?php echo $_SESSION['username']?>">
                                    </div>
                                </div>
                                
                                <div class="d-grid justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                    
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const returnButton = document.getElementById("returnButton");
                            const returnDiv = document.getElementById("returnForm");
                                        
                            returnButton.addEventListener("click", function () {
                                if (returnDiv.style.display === "none") {
                                    returnDiv.style.display = "block";
                                }
                                
                                else {
                                    returnDiv.style.display = "none";
                                }
                            });
                        });
                    </script>
                    <!-- End of Return Form -->
                    
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
                        <button type="button" onclick="location.reload();" class="btn-close" data-bs-dismiss="modal" ></button>
                        
                    </div>
                            
                    <div class="modal-body">
                        <div id="requestContainer"></div>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="card m-3">
            <div class="card-header">
                <h4>Accessory In and Out</h4>
            </div>
            
            <?php
                $recordcount = 0;
                $queryRequest = "SELECT * FROM accessories_remark";
    
                $queryRequest_run = mysqli_query($conn, $queryRequest);
        
                $pattern = '/.*\(request by [^)]+\)/';
            
                if (mysqli_num_rows($queryRequest_run) > 0) {
                    $resultsRequest = array();
                    
                    while ($row = mysqli_fetch_assoc($queryRequest_run)) {
                        if (preg_match($pattern, $row['remark_note'])) {
                            $resultsRequest[] = $row;
                        }
                    }
                    
                    $recordcount = count($resultsRequest);
                } 
            ?>

            <style>
                .notification-badge {
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 10px;
                    height: 10px;
                    background-color: red;
                    border-radius: 50%;
                }
            </style>
 
            <div class="card-body">
                <div class="clearfix mb-3">
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded float-start switch-table me-2" data-table-id="myTable">Job Requirement</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm rounded float-start switch-table" data-table-id="myTable-2">Technician Request</button>

                    <button type="button" class="btn btn-sm rounded float-end" style="background-color: #006400;"><a href="techaccessorysummary.php" style="text-decoration: none; color:white">Summary</a></button>
                    <button type="button" style="position: relative"id="requestbtn" class="requestBtn btn btn-secondary btn-sm rounded float-end me-2">Request</button>
                    <button type="button" class="btn btn-sm rounded float-end me-2" style="background-color: #081d45; color:white; border:none;" data-bs-toggle="modal" data-bs-target="#entryAddModal">Add</button>
                </div>
                
                <script>
                    function showNotificationBadge() {
                        if (<?= $recordcount ?> > 0) {
                            var badge = document.createElement('div');
                            badge.className = 'notification-badge';
                            
                            var requestBtn = document.getElementById('requestbtn');
                            requestBtn.appendChild(badge);
                        }
                    }

                    showNotificationBadge();
                </script>

                <div class="table-responsive">
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
                                                    
                                $query = "SELECT * FROM accessories_inout WHERE jobregister_id !='' ORDER BY ModifyTime_inou DESC";
                                                    
                                $query_run = mysqli_query($conn, $query);
                                                    
                                if (mysqli_num_rows($query_run) > 0) {
                                    $counter = 1;
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
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='viewEntryBtn btn btn-sm' style="background-color: #191970; color:white; border:none">View</button>
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='editEntryBtn btn btn-success btn-sm'>Edit</button>
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='deleteEntryBtn btn btn-sm' style="background-color: #800000; color:white; border:none">Delete</button>
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
                                
                                $query = "SELECT * FROM accessories_inout WHERE jobregister_id IS NULL ORDER BY ModifyTime_inou DESC";
                                                    
                                $query_run = mysqli_query($conn, $query);
                                                    
                                if (mysqli_num_rows($query_run) > 0) {
                                    $counter = 1;
                                    foreach ($query_run as $entry) {
    
                                                                
                            ?>
                            <tr>
                                <td style='text-align: center;'><?= $counter ?></td>
                                <td style='text-align: center; white-space: nowrap;'><?= $entry['techname'] ?></td>
                                <td><?= $entry['accessoriesname'] ?></td>
                                <td style='text-align: center; white-space: nowrap;'><?= $entry['out_date'] ?></td>
                                <td style='text-align: center;'><?= $entry['quantity'] ?></td>
                                <td style='text-align: center;'><?= $entry['balance'] ?></td>
                                <td style='text-align: center; white-space: nowrap;'>
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='RemarkBtn btn btn-warning btn-sm'>Remark</button>
                                </td>
                                <td style='text-align: center; white-space: nowrap;'>
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='viewEntryBtn btn btn-sm' style="background-color: #191970; color:white; border:none">View</button>
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='editEntryBtn btn btn-success btn-sm'>Update</button>
                                    <button type='button' value='<?= $entry['inout_id'] ?>' class='deleteEntryBtn btn btn-sm' style="background-color: #800000; color:white; border:none">Delete</button>
                                </td>
                            </tr>
                            <?php $counter++;  } } ?>
                        </tbody>
                    </table>
                </div>     
            </div>
        </div>

        <!--========== JS ==========-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

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
            // <!-- Add -->
            function saveEntry(){
                var checkbox = document.getElementById("enableJobSelect");
                var formData = new FormData(document.getElementById('saveEntry'));
                formData.append("save_entry", true);
                
                for (d of formData.entries()){
                    console.log(d);
                }
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
            }

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
                            }, 700);
                        }
                        
                        else if (res.status == 500) {
                            alert(res.message);
                        }
                    }
                });
            });

            $(document).on('submit', '#remarkEntry', function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("return", true);
                
                for (var p of formData) {
                    let name = p[0];
                    let value = p[1];
                    
                    console.log(name, value)
                }
                
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
                            }, 700);
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
                        document.getElementById("inout_idremark").value = entry_idRemark;
                        
                        if (res.status == 200) {
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
                        
  
                        }
                        $('#RemarkViewModal').modal('show');
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
    </body>
</html>