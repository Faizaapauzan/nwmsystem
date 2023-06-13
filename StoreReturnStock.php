<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>Return Accessory</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-6LpKxj1YoxT8tlzG25apWf3JpilLzHfxnhaJW+K3k07TkodC7W4c6ueXyozQvC7l" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <link href="css/technicianmain.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
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
    <div class="modal fade" id="ReturnEntryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form id="ReturnSaveEntry">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        
                        <div class="mb-3">
                            <label for="">Item</label>
                            
                            <select name="item" id="AddAccessoryReturn" class="form-control" onchange="GetDetail(this.value)">
                                <option value="">-- Select Accessory --</option>
                                    <?php
                                        include "dbconnect.php";
                                        $records = mysqli_query($conn, "SELECT * FROM accessories_inout WHERE balance != '0' OR balance IS NULL ORDER BY out_date DESC");
                                        while($data = mysqli_fetch_array($records)) {
                                            echo "<option value='". $data['accessoriesname'] ."' data-inoutid='". $data['inout_id'] ."' data-techname='". $data['techname'] ."' data-balance='". $data['balance'] ."'>" . $data['techname']." - " . $data['accessoriesname']." - " . $data['out_date']."</option>";
                                        }
                                    ?>
                            </select>

                            <input type="hidden" name="inout_id" id="inout_id" value="">
                        </div>
                        
                        <script>
                            function GetDetail(value) {
                                var selectedOption = document.querySelector('#AddAccessoryReturn option[value="' + value + '"]');
                                var inoutId = selectedOption.getAttribute('data-inoutid');
                                var techName = selectedOption.getAttribute('data-techname');
                                var balance = selectedOption.getAttribute('data-balance');
                                
                                document.querySelector('input[name="technicianname"]').value = techName;
                                document.querySelector('input[name="quantityReturn"]').value = balance;
                                // You can optionally populate the inout_id in a hidden field for submission
                                document.querySelector('input[name="inout_id"]').value = inoutId;
                            }
                        </script>
                        
                        <div class="mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantityReturn" class="form-control"/>
                        </div>

                        <div class="mb-3">
                            <label for="">Technician</label>
                            <input type="text" name="technicianname" class="form-control" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="out_date">In Date Time</label>
                            <div style="display: flex; align-items: center;">
                                <input type="text" id="in_date" name="in_date" class="form-control" />
                                <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;" onclick="ItemInDateTime(event)">Click</button>
                            </div>
                            
                            <script type="text/javascript">
                                function ItemInDateTime(event) {
                                    event.preventDefault();
                                    fetch("departureTime.php").then(response => response.text()).then(result => {
                                        document.getElementById("in_date").value = result;
                                    });
                                }
                            </script>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Received By</label>
                            <input type="text" name="received_by" class="form-control" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Remark</label>
                            <input type="text" name="remarkreturn" class="form-control" />
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
    <div class="modal fade" id="ReturnEntryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form id="ReturnUpdateEntry">
                        
                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="accreturn_id" id="accreturn_id">

                        <input type="hidden" name="inout_id" id="inout_id">

                        <div class="mb-3">
                            <label for="">Item</label>
                            <input type="text" name="item" id="item" class="form-control" style="background-color: transparent;" readonly />
                        </div>
                          
                        <div class="mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantityReturn" id="quantityReturn" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Technician</label>
                            <input type="text" name="technicianname" id="EditTechnicianReturn" class="form-control" style="background-color: transparent;" readonly />
                        </div>
                            
                        <div class="mb-3">
                            <label for="">In Date Time</label>
                            <div style="display: flex; align-items: center;">
                                <input type="text" name="in_date" id="in_dateEdit" class="form-control" />
                                <button type="button" class="btn btn-primary" style="background-color: #081d45; border:none;" onclick="ItemOutDateTimeEdit(event)">Click</button>
                            </div>
                            
                            <script type="text/javascript">
                                function ItemOutDateTimeEdit(event) {
                                    event.preventDefault();
                                    fetch("departureTime.php").then(response => response.text()).then(result => {
                                        document.getElementById("in_dateEdit").value = result;
                                    });
                                }
                            </script>
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Received By</label>
                            <input type="text" name="received_by" id="received_by" class="form-control" />
                        </div>
                        
                        <div class="mb-3">
                            <label for="">Remark</label>
                            <input type="text" name="remarkreturn" id="remarkreturn" class="form-control" />
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
    <div class="modal fade" id="ReturnEntryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                <div class="mb-3">
                        <label for="">Item</label>
                        <p id="view_item" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Quantity</label>
                        <p id="view_quantityReturn" class="form-control"></p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Technician</label>
                        <p id="view_technicianname" class="form-control"></p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">In Date Time</label>
                        <p id="view_accindatetime" class="form-control"></p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Received By</label>
                        <p id="view_receivedby" class="form-control"></p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Remark</label>
                        <p id="view_remarkreturn" class="form-control"></p>
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
                        <h4>Accessory Return
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#ReturnEntryAddModal">Add</button>
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
                                    <th style="text-align: center; white-space: nowrap;">Quantity</th>
                                    <th style="text-align: center; white-space: nowrap;">Return Date</th>
                                    <th style="text-align: center; white-space: nowrap;">Received By</th>
                                    <th style="text-align: center; white-space: nowrap;">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                
                                <?php
                                    
                                    require 'dbconnect.php';
                                    
                                    $query = "SELECT * FROM accessories_return ORDER BY in_date DESC LIMIT 50";
                                    $query_run = mysqli_query($conn, $query);
                                    
                                    if(mysqli_num_rows($query_run) > 0) {
                                        
                                        foreach($query_run as $entry) {
                                ?>
                                
                                <tr>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center; white-space: nowrap;"><?= $entry['technicianname'] ?></td>
                                    <td><?= $entry['item'] ?></td>
                                    <td style="text-align: center;"><?= $entry['quantityReturn'] ?></td>
                                    <td style="white-space: nowrap;"><?= $entry['in_date'] ?></td>
                                    <td style="text-align: center;"><?= $entry['received_by'] ?></td>
                                    <td style="white-space: nowrap;">
                                        <button type="button" value="<?=$entry['accreturn_id'];?>" class="viewEntryBtn btn btn-info btn-sm">View</button>
                                        <button type="button" value="<?=$entry['accreturn_id'];?>" class="editEntryBtn btn btn-success btn-sm">Edit</button>
                                        <button type="button" value="<?=$entry['accreturn_id'];?>" class="deleteEntryBtn btn btn-danger btn-sm">Delete</button>
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
        $(document).on('submit', '#ReturnSaveEntry', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_entry", true);

            $.ajax({
                type: "POST",
                url: "codeReturn.php",
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
                        $('#ReturnEntryAddModal').modal('hide');
                        $('#ReturnSaveEntry')[0].reset();

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
                url: "codeReturn.php?entry_id=" + entry_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }
                    
                    else if(res.status == 200) {

                        $('#accreturn_id').val(res.data.accreturn_id);
                        $('#inout_id').val(res.data.inout_id);
                        $('#item').val(res.data.item);
                        $('#quantityReturn').val(res.data.quantityReturn);
                        $('#EditTechnicianReturn').val(res.data.technicianname);
                        $('#in_dateEdit').val(res.data.in_date);
                        $('#received_by').val(res.data.received_by);
                        $('#remarkreturn').val(res.data.remarkreturn);

                        $('#ReturnEntryEditModal').modal('show');
                    }
                }
            });
        });

        $(document).on('submit', '#ReturnUpdateEntry', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_entry", true);

            $.ajax({
                type: "POST",
                url: "codeReturn.php",
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
                        
                        $('#ReturnEntryEditModal').modal('hide');
                        $('#ReturnUpdateEntry')[0].reset();

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
                url: "codeReturn.php?entry_id=" + entry_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }
                    
                    else if(res.status == 200) {

                        $('#view_item').text(res.data.item);
                        $('#view_quantityReturn').text(res.data.quantityReturn);
                        $('#view_technicianname').text(res.data.technicianname);
                        $('#view_accindatetime').text(res.data.in_date);
                        $('#view_receivedby').text(res.data.received_by);
                        $('#view_remarkreturn').text(res.data.remarkreturn);

                        $('#ReturnEntryViewModal').modal('show');
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
                    url: "codeReturn.php",
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
    </script>

</body>
</html>