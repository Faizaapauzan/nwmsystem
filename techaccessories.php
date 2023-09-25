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
        <link href="css/technicianmain.css" rel="stylesheet">

        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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
                <span class="nav__text">Job Listing</span>
                <div class="dropdown-content">
                    <a href="assignedjob.php">Assigned Job</a>
                    <a href="unassignedjob.php">Unassigned Job</a>
                </div>
            </div>
            
            <a href="pendingjoblistst.php" class="nav__link">
                <i class="material-icons">pending_actions</i>
                <span class="nav__text">Pending</span>
            </a>
            
            <a href="technician.php" class="nav__link">
                <i class="material-icons">home</i>
                <span class="nav__text">Home</span>
            </a>
            
            <a href="incompletejoblistst.php" class="nav__link">
                <i class="material-icons">do_not_disturb_on</i>
                <span class="nav__text">Incomplete</span>
            </a>
            
            <a href="completejoblistst.php" class="nav__link">
                <i class="material-icons">check_circle</i>
                <span class="nav__text">Complete</span>
            </a>
        </nav>

        <!--========== CONTENTS ==========-->
        <!-- View Modal -->
        <div class="modal fade" id="entryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
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
                
        <!-- Update For Job Modal -->
        <div class="modal fade" id="entryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Accessory On Hand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form id="updateEntry">
                        <div class="modal-body">
                            <div id="errorMessageUpdate" class="alert alert-warning d-none">
                                <span id="errorStatus"></span> <span id="errorMessage"></span>
                            </div>
                            
                            <input type="hidden" name="inout_id[]" id="inout_id" class="prime-row-inout-id">
                            
                            <div class="row mb-3">    
                                <div class="col-sm">
                                    <label for="Phone">Remark</label>
                                    <input type="text" class="form-control" name="remark_note[]" id="remark_note">
                                </div>
                                    
                                <div class="col-sm">
                                    <label for="DateofBirth">Date</label>
                                    <div style="display: flex; align-items: center;">
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
                                    
                                <div class="col-sm-2">
                                    <label for="Phone">Quantity</label>
                                    <input type="number" class="form-control" name="remark_quantity[]" id="remark_quantity">
                                </div>
                            </div>
                            
                            <div id="next" class="mb-3"></div>
                            
                            <button type="button" name="addrow" id="addrow" class="btn btn-success">Add</button>
                            
                            <div id="errorMessageUpdate" class="alert alert-warning d-none" style="text-align: center;"></div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('#addrow').click(function() {
                var length = $('.sl').length;
                var i = parseInt(length) + 1;
                var newrow = $(
                    '<div class="row mb-3">' +
                        '<div class=""><label for="">Send To Other Technician</label><input type="checkbox" class="enableJobSelect" onchange="toggleJobSelect(this)" /></div>' +
                        
                        '<div><input type="hidden" name="inout_id[]" id="inout_id' + i + '" class="dynamic-row-inout-id"></div>' +
                            
                        '<div class="col-sm">' + 
                            '<label for="Remark">Remark</label>' + 
                            '<input type="text" class="form-control" name="remark_note[]" id="remark_note' + i + '">' + 
                        '</div>' +
                            
                        '<div class="col-sm">' + 
                            '<label for="Date">Date</label>' + 
                            '<div style="display: flex; align-items: center;">' + 
                                '<input type="text" id="remark_date' + i + '" name="remark_date[]" class="form-control" autocomplete="off"/>' + 
                                '<button type="button" class="btn btn-primary" onclick="RemarkDateS(event, this)" style="background-color: #081d45; border:none;"><i class="iconify" data-icon="clarity:cursor-hand-click-line"></i></button>' + 
                            '</div>' + 
                        '</div>' +
                            
                        '<div class="col-sm-2">' + 
                            '<label for="Quantity">Quantity</label>' + 
                            '<input type="number" class="form-control" name="remark_quantity[]" id="remark_quantity' + i + '">' + 
                        '</div>' +
                            
                        '<button type="button" style="width: fit-content; height: 30px; border:none; border-radius: 5px;" class="btnRemove btn-danger"><i class="iconify" data-icon="ic:baseline-remove-circle"></i></button>' + 
                    '</div>');
                    
                var primeRowValue = $('#inout_id').val();
                    
                newrow.find('.dynamic-row-inout-id').val(primeRowValue);
                    
                $('#next').append(newrow);
            });
            
            $('body').on('click', '.btnRemove', function() {
                $(this).closest('div').remove();
            });
        </script>

        <!-- Update Request Modal -->
        <div class="modal fade" id="entryEdit2Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Accessory On Hand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <form id="updateEntry2">
                        <div class="modal-body">
                            <div id="errorMessageUpdate" class="alert alert-warning d-none">
                                <span id="errorStatus"></span> 
                                <span id="errorMessage"></span>
                            </div>
                            
                            <input type="hidden" name="inout_id[]" id="inout_id" class="prime-row-inout-id">
                            
                            <script>
                                function toggleJobSelect(checkbox) {
                                    var remarkNoteField = $(checkbox).closest('.row').find('.form-control[name="remark_note[]"]');
                                    
                                    if (checkbox.checked) {
                                        remarkNoteField.val(remarkNoteField.val() + " (request by <?php echo $_SESSION['username']; ?>)");
                                    }
                                    
                                    else {
                                        remarkNoteField.val(remarkNoteField.val().replace(" (request by <?php echo $_SESSION['username']; ?>)", ""));
                                    }
                                    
                                    updateRequestStyle(remarkNoteField);
                                }
                            </script>
                            
                            <div class="row mb-3">
                                <div class="">
                                    <label for="">Send To Other Technician</label>
                                    <input type="checkbox" class="enableJobSelect" onchange="toggleJobSelect(this)" />
                                </div>
                                    
                                <div class="col-sm">
                                    <label for="Phone">Remark</label>
                                    <input type="text" class="form-control" name="remark_note[]" id="remark_note">
                                </div>
                                    
                                <div class="col-sm">
                                    <label for="DateofBirth">Date</label>
                                    <div style="display: flex; align-items: center;">
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
                                    
                                <div class="col-sm-2">
                                    <label for="Phone">Quantity</label>
                                    <input type="number" class="form-control" name="remark_quantity[]" id="remark_quantity">
                                </div>
                            </div>
                            
                            <div id="next" class="mb-3"></div>
                            
                            <button type="button" name="addrow" id="addrow" class="btn btn-success">Add</button>
                            
                            <div id="errorMessageUpdate" class="alert alert-warning d-none" style="text-align: center;"></div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Print date -->
        <script type="text/javascript">
            function RemarkDateS(event, element) {
                event.preventDefault();
                
                fetch("AccessoryHandoverDate.php").then(response => response.text()).then(result => {
                    element.previousElementSibling.value = result;
                });
            }
        </script>
                
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

        <div class="m-3">
            <div class="table-responsive mb-3">
                <label for="" class="fw-bold mb-3">Accessory For Job</label>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center; white-space: nowrap;"></th>
                            <th style="text-align: center; white-space: nowrap;">Item</th>
                            <th style="text-align: center; white-space: nowrap;">Quantity</th>
                            <th style="text-align: center; white-space: nowrap;">Remaining</th>
                            <th style="text-align: center; white-space: nowrap;">Remark</th>
                            <th style="text-align: center; white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            
                            require 'dbconnect.php';
                            
                            $query = "SELECT * FROM accessories_inout WHERE techname ='$_SESSION[username]' ORDER BY out_date DESC LIMIT 50";
                            
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $entry) {
                        ?>
                        <tr>
                            <td style="text-align: center;"></td>
                            <td><?= $entry['accessoriesname'] ?></td>
                            <td style="text-align: center"><?= $entry['quantity'] ?></td>
                            <td style="text-align: center"><?= $entry['balance'] ?></td>
                            <td style="text-align: center; white-space: nowrap;"><button type="button" value="<?= $entry['inout_id']; ?>" id="RemarkButton" class="RemarkBtn btn btn-sm" style="border: none; color:white; background-color: #081d45;">Remark</button></td>
                            <td style="text-align: center; white-space: nowrap;">
                                <button type="button" value="<?= $entry['inout_id']; ?>" class="viewEntryBtn btn btn-info btn-sm">View</button>
                                <button type="button" value="<?= $entry['inout_id']; ?>" class="editEntryBtn btn btn-success btn-sm">Edit</button>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="table-responsive mb-3">
                <label for="" class="fw-bold mb-3">Accessory Request</label>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center; white-space: nowrap;"></th>
                            <th style="text-align: center; white-space: nowrap;">Item</th>
                            <th style="text-align: center; white-space: nowrap;">Quantity</th>
                            <th style="text-align: center; white-space: nowrap;">Remaining</th>
                            <th style="text-align: center; white-space: nowrap;">Remark</th>
                            <th style="text-align: center; white-space: nowrap;">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            
                            require 'dbconnect.php';
                                                    
                            $query = "SELECT * FROM accessories_inout WHERE techname ='$_SESSION[username]' ORDER BY out_date DESC LIMIT 50";
                            
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $entry) {
                        ?>

                        <tr>
                            <td style="text-align: center;"></td>
                            <td><?= $entry['accessoriesname'] ?></td>
                            <td style="text-align: center"><?= $entry['quantity'] ?></td>
                            <td style="text-align: center"><?= $entry['balance'] ?></td>
                            <td style="text-align: center; white-space: nowrap;"><button type="button" value="<?= $entry['inout_id']; ?>" id="RemarkButton" class="RemarkBtn btn btn-sm" style="border: none; color:white; background-color: #081d45;">Remark</button></td>
                            <td style="text-align: center; white-space: nowrap;">
                                <button type="button" value="<?= $entry['inout_id']; ?>" class="viewEntryBtn btn btn-info btn-sm">View</button>
                                <button type="button" value="<?= $entry['inout_id']; ?>" class="editEntry2Btn btn btn-success btn-sm">Edit</button>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div> 
        </div>

        <script>
            // View
            $(document).on('click', '.viewEntryBtn', function() {
                var entry_id = $(this).val();
                
                $.ajax({
                    type: "GET",
                    url: "codetech.php?entry_id=" + entry_id,
                            
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

            // Update For Job
            $(document).on('click', '.editEntryBtn', function() {
                var entry_id = $(this).val();
                
                $.ajax({
                    type: "GET",
                    url: "codetech.php?entry_id=" + entry_id,
                            
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            alert(res.message);
                        }
                        
                        else if (res.status == 200) {
                            $('#inout_id').val(res.data.inout_id);
                            $('#remark_note').val(res.data.remark_note);
                            $('#remark_date').val(res.data.remark_date);
                            $('#remark_quatity').val(res.data.remark_quantity);
                            
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
                    url: "codetech.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                            
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 422) {
                            $('#errorMessageUpdate').removeClass('d-none');
                            $('#errorStatus').text(res.status);
                            $('#errorMessage').text(res.message);
                        }
                        
                        else if (res.status == 200) {
                            $('#errorMessageUpdate').addClass('d-none');
                            
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                                    
                            $('#entryEditModal').modal('hide');
                            $('#updateEntry')[0].reset();
                                    
                            setTimeout(function() {
                                location.reload("techaccessories.php");
                            }, 1500);
                        }
                        
                        else if (res.status == 500) {
                            alert(res.message);
                        }
                    }
                });
            });

            // Update Request
            $(document).on('click', '.editEntry2Btn', function() {
                var entry_id = $(this).val();
                
                $.ajax({
                    type: "GET",
                    url: "codetech.php?entry_id=" + entry_id,
                            
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 404) {
                            alert(res.message);
                        }
                        
                        else if (res.status == 200) {
                            $('#inout_id').val(res.data.inout_id);
                            $('#remark_note').val(res.data.remark_note);
                            $('#remark_date').val(res.data.remark_date);
                            $('#remark_quatity').val(res.data.remark_quantity);
                            
                            $('#entryEdit2Modal').modal('show');
                        }
                    }
                });
            });
                    
            $(document).on('submit', '#updateEntry2', function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("update_entry2", true);
                
                $.ajax({
                    type: "POST",
                    url: "codetech.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                            
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 422) {
                            $('#errorMessageUpdate').removeClass('d-none');
                            $('#errorStatus').text(res.status);
                            $('#errorMessage').text(res.message);
                        }
                        
                        else if (res.status == 200) {
                            $('#errorMessageUpdate').addClass('d-none');
                            
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                                    
                            $('#entryEditModal').modal('hide');
                            $('#updateEntry')[0].reset();
                                    
                            setTimeout(function() {
                                location.reload("techaccessories.php");
                            }, 1500);
                        }
                        
                        else if (res.status == 500) {
                            alert(res.message);
                        }
                    }
                });
            });
            
            // Remark
            $(document).on('click', '.RemarkBtn', function() {
                var entry_idRemark = $(this).val();
                
                $.ajax({
                    type: "GET",
                    url: "codetech.php?entry_idRemark=" + entry_idRemark,
                    
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
        </script>
    </body>
</html>