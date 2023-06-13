<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>In and Out Stock Record</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <link href="css/technicianmain.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>


<style>
    #myTable { counter-reset: rowNumber; }

    #myTable tr>td:first-child { counter-increment: rowNumber; }

    #myTable tr td:first-child::before {
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
                            <label for="">Item</label>
                            <select name="accessoriesname" id="AddAccessory" class="form-control">
                                <option value="">-- Select Accessory --</option>
                                    <?php
                                        include "dbconnect.php";
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                        
                                        while($data = mysqli_fetch_array($records)) {
                                            echo "<option value='". $data['accessories_name'] ."'>" . $data['accessories_name']."</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                        
                        <script>
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
                                        
                                        while($data = mysqli_fetch_array($records)) {
                                            echo "<option value='". $data['username'] ."'>" . $data['username']."</option>";
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
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" class="form-control" />
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
                        
                        <input type="hidden" name="inout_id" id="inout_id" >
                        
                        <div class="mb-3">
                            <label for="">Item</label>
                            <select type="text" name="accessoriesname" id="EditAccessory" class="form-control">
                                <option value="">-- Select Accessory --</option>
                                    <?php
                                        
                                        include "dbconnect.php";
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");
                                        
                                        while($data = mysqli_fetch_array($records)) {
                                            echo "<option value='". $data['accessories_name'] ."'>" . $data['accessories_name']."</option>";
                                        }
                                    ?>
                            </select>
                        </div>

                        <script>$(document).ready(function(){$("#EditAccessory").select2();});</script>
                        
                        <div class="mb-3">
                            <label for="">Technician</label>
                            <select type="text" name="techname" id="EditTechnician" class="form-control">
                                <option value="">-- Select Technician --</option>
                                    <?php
                                        include "dbconnect.php";
                                        
                                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE tech_avai = '0' 
                                                                                                     AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                                                                                     ORDER BY username ASC");
                                        
                                        while($data = mysqli_fetch_array($records)) {
                                            echo "<option value='". $data['username'] ."'>" . $data['username']."</option>";
                                        }
                                    ?>  
                            </select>
                        </div>

                        <script>$(document).ready(function(){$("#EditTechnician").select2();});</script>
                        
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
                            <input type="number" name="quantity" id="quantity" class="form-control" />
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
    
    <!-- Table -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Accessory In and Out
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#entryAddModal">Add</button>
                            <a href="StoreReturnStock.php" class="btn btn-secondary float-end mx-2">Return</a>
                        </h4>
                    </div>
                    
                    <div class="card-body">
                        <input type="text" style="width: 100%; max-width: 400px; height: 35px;" id="myInput" placeholder="Search">
                        <br><br>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
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
                                        
                                        $query = "SELECT * FROM accessories_inout ORDER BY out_date DESC LIMIT 50";
                                        
                                        $query_run = mysqli_query($conn, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $entry) {
                                    ?>
                                    
                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center; white-space: nowrap;"><?= $entry['techname'] ?></td>
                                        <td><?= $entry['accessoriesname'] ?></td>
                                        <td style="white-space: nowrap;"><?= $entry['out_date'] ?></td>
                                        <td style="text-align: center;"><?= $entry['quantity'] ?></td>
                                        <td style="text-align: center;"><?= $entry['balance'] ?></td>
                                        <td style="text-align: center; white-space: nowrap;"><button type="button" value="<?=$entry['inout_id'];?>" id="RemarkButton" class="RemarkBtn btn btn-warning btn-sm">Remark</button></td>
                                        <td style="text-align: center; white-space: nowrap;">
                                            <button type="button" value="<?=$entry['inout_id'];?>" class="viewEntryBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$entry['inout_id'];?>" class="editEntryBtn btn btn-success btn-sm">Edit</button>
                                            <button type="button" value="<?=$entry['inout_id'];?>" class="deleteEntryBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Table -->

    <!-- Search Function -->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });});
    </script>
    <!-- End of Search Function -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#saveEntry', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_entry", true);

            $.ajax({
                type: "POST",
                url: "code.php",
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
                        $('#entryAddModal').modal('hide');
                        $('#saveEntry')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");
                    }
                    
                    else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editEntryBtn', function () {

            var entry_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?entry_id=" + entry_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }
                    
                    else if(res.status == 200) {

                        $('#inout_id').val(res.data.inout_id);
                        $('#EditAccessory').val(res.data.accessoriesname);
                        $('#EditTechnician').val(res.data.techname);
                        $('#out_dateEdit').val(res.data.out_date);
                        $('#quantity').val(res.data.quantity);
                        $('#balance').val(res.data.balance);
                        
                        $('#entryEditModal').modal('show');
                    }
                }
            });
        });

        $(document).on('submit', '#updateEntry', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_entry", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    }
                    
                    else if(res.status == 200) {

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#entryEditModal').modal('hide');
                        $('#updateEntry')[0].reset();

                        $('#myTable').load(location.href + " #myTable");
                    }
                    
                    else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewEntryBtn', function () {

            var entry_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?entry_id=" + entry_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }
                    
                    else if(res.status == 200) {

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

        $(document).on('click', '.deleteEntryBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var entry_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {'delete_entry': true,
                               'entry_id': entry_id},
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }
                        
                        else {
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });

        $(document).on('click', '.RemarkBtn', function () {
            var entry_idRemark = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?entry_idRemark=" + entry_idRemark,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    
                    if (res.status == 404) {
                        alert(res.message);
                    } 
                    
                    else if (res.status == 200) {
                        
                        var remarks = res.data;
                        
                        $('#remarkContainer').empty();
                        
                        remarks.forEach(function (remark) {
                            
                            var inputGroup = '<div class="mb-3">' +
                                                '<div class="row">' +
                                                    '<div class="col-sm">'+
                                                        '<label for="Remark">Remark</label>' +
                                                        '<input type="text" value="' + remark.remark_note + '" style="background:none;" class="form-control" Readonly></input>'+
                                                    '</div>' +
                                                    
                                                    '<div class="col-sm" style="text-align:center;">'+
                                                        '<label for="Date">Date</label>' +
                                                        '<input type="text" value="' + remark.remark_date + '" style="text-align:center; background:none;" class="form-control" Readonly></input>'+
                                                    '</div>' +
                                                    
                                                    '<div class="col-sm-3" style="text-align:center;">'+
                                                        '<label for="Quantity">Quantity</label>' +
                                                        '<input type="text" value="' + remark.remark_quantity + '" style="text-align:center; background:none;" class="form-control" Readonly></input>'+
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
    </script>

</body>
</html>