<?php session_start(); ?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Store Accessories</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css">
        <link href="css/technicianmain.css" rel="stylesheet">

        <!--========== BOX ICONS ==========-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    </head>

    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        #accessoryListTable {
            counter-reset: rowNumber;
        }
        
        #accessoryListTable tr>td:first-child {
            counter-increment: rowNumber;
        }
        
        #accessoryListTable tr td:first-child::before {
            content: counter(rowNumber);
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
                <div class="modal fade" id="accessoryAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Accessory</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <form id="saveAccessory" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Code</label>
                                            <input type="text" name="accessories_code" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Name</label>
                                            <input type="text" name="accessories_name" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Unit of Measurement (UOM)</label>
                                            <input type="text" name="accessories_uom" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Brand</label>
                                            <input type="text" name="accessories_brand" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Description</label>
                                            <input type="text" name="accessories_description" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Photo</label>
                                            <input type="file" id="image_input" name="files[]" multiple class="form-control" />
                                            <div id="image_preview"></div>
                                        </div>
                                        
                                        <script>
                                            // JavaScript code to handle image preview
                                            document.getElementById("image_input").addEventListener("change", function (event) {
                                                const imagePreview = document.getElementById("image_preview");
                                                imagePreview.innerHTML = "";
                                                const files = event.target.files;
                                                for (let i = 0; i < files.length; i++) {
                                                    const file = files[i];
                                                    const reader = new FileReader();
                                                    
                                                    reader.onload = function (e) {
                                                        const img = document.createElement("img");
                                                        img.src = e.target.result;
                                                        img.classList.add("preview-image");
                                                        imagePreview.appendChild(img);
                                                    };
                                                    
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        </script>
                                        
                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="accessorieslistcreated_by" id="accessorieslistcreatedby" value="<?php echo $_SESSION["username"] ?>" class="form-control" readonly>
                                            <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodify_by" value="<?php echo $_SESSION["username"] ?>" class="form-control" readonly>
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
                <div class="modal fade" id="accessoryViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Accessory Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">ID</label>
                                        <p id="view_ID" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Code</label>
                                        <p id="view_code" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Name</label>
                                        <p id="view_name" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Unit of Measurement (UOM)</label>
                                        <p id="view_UOM" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Brand</label>
                                        <p id="view_brand" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Description</label>
                                        <p id="view_description" class="form-control"></p>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="">Photo</label>
                                        <div id="view_image_container">
                                            <img id="view_photo" class="form-control" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Created by</label>
                                        <p id="view_createdby" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Created at</label>
                                        <p id="view_createdat" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Modify by</label>
                                        <p id="view_modifyby" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Modify at</label>
                                        <p id="view_modifyat" class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Modal -->
                <div class="modal fade" id="accessoryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Accessory Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="updateAccessory" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="accessories_id" id="accessories_id" >
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Code</label>
                                            <input type="text" name="accessories_code" id="accessories_code" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Name</label>
                                            <input type="text" name="accessories_name" id="accessories_name" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Unit of Measurement (UOM)</label>
                                            <input type="text" name="accessories_uom" id="accessories_uom" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Brand</label>
                                            <input type="text" name="accessories_brand" id="accessories_brand" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Description</label>
                                            <input type="text" name="accessories_description" id="accessories_description" class="form-control" />
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="">Accessories Photo</label>
                                            <img id="edit_view_photo" class="form-control" alt="Preview" />
                                            <input type="file" name="file_name" id="file_name" class="form-control" />
                                        </div>
                                        
                                        <script>
                                            document.getElementById("file_name").addEventListener("change", function (event) {
                                                const imagePreview = document.getElementById("edit_view_photo");
                                                imagePreview.src = URL.createObjectURL(event.target.files[0]);
                                            });
                                        </script>
                                            
                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodifyby" value="<?php echo $_SESSION["username"] ?>" class="form-control" readonly>
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
                                <p style="text-align: center;">Are you sure you want to delete this accessory?</p>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
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
                                    <h4>Accessory List<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#accessoryAddModal">Add</button></h4>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="accessoryListTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style='text-align: center;'></th>
                                                    <th style='text-align: center;'>Name</th>
                                                    <th style='text-align: center;'>Code</th>
                                                    <th style='text-align: center;'>Brand</th>
                                                    <th style='text-align: center;'>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php
                                                    
                                                    require 'dbconnect.php';
                                                    
                                                    $query = "SELECT * FROM accessories_list ORDER BY accessories_name ASC";
                                                    $query_run = mysqli_query($conn, $query);
                                                    
                                                    if (mysqli_num_rows($query_run) > 0) {
                                                        while ($entry = mysqli_fetch_array($query_run)) {
                                                            echo "<tr>";
                                                            echo "<td style='text-align: center;'></td>";
                                                            echo "<td>" . $entry['accessories_name'] . "</td>";
                                                            echo "<td>" . $entry['accessories_code'] . "</td>";
                                                            echo "<td style='text-align: center; white-space: nowrap;'>" . $entry['accessories_brand'] . "</td>";
                                                            echo "<td style='text-align: center; white-space: nowrap;'>
                                                                    <button type='button' value='" . $entry['accessories_id'] . "' class='viewAccessoryBtn btn btn-info btn-sm'>View</button>
                                                                    <button type='button' value='" . $entry['accessories_id'] . "' class='editAccessoryBtn btn btn-success btn-sm'>Update</button>
                                                                    <button type='button' value='" . $entry['accessories_id'] . "' class='deleteAccessoryBtn btn btn-danger btn-sm'>Delete</button>
                                                                  </td>";
                                                            echo "</tr>";
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
                </br>
                </br>
                </br>
                
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
                
                <script>
                    $(document).ready(function(){
                        $('#accessoryListTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                        });
                    });
                </script>
                
                <script>
                    // <!-- Add -->
                    $(document).on('submit', '#saveAccessory', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("save_entry", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "codeStoreAccessoryList.php",
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
                    $(document).on('click', '.viewAccessoryBtn', function () {
                        var entry_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "codeStoreAccessoryList.php?entry_id=" + entry_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.accessories_id);
                                    $('#view_code').text(res.data.accessories_code);
                                    $('#view_name').text(res.data.accessories_name);
                                    $('#view_UOM').text(res.data.accessories_uom);
                                    $('#view_brand').text(res.data.accessories_brand);
                                    $('#view_description').text(res.data.accessories_description);
                                    
                                    // Update the photo display
                                    if (res.data.file_name) {
                                        $('#view_photo').attr('src', res.data.file_name);
                                        $('#view_image_container').show();
                                    }
                                    
                                    else {
                                        // Hide the photo container if there is no photo
                                        $('#view_image_container').hide();
                                    }
                                    
                                    $('#view_createdby').text(res.data.accessorieslistcreated_by);
                                    $('#view_createdat').text(res.data.accessorieslistcreated_at);
                                    $('#view_modifyby').text(res.data.accessorieslistlasmodify_by);
                                    $('#view_modifyat').text(res.data.accessorieslistlasmodify_at);
                                    
                                    $('#accessoryViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Update -->
                    $(document).on('click', '.editAccessoryBtn', function () {
                        var entry_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "codeStoreAccessoryList.php?entry_id=" + entry_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#accessories_id').val(res.data.accessories_id);
                                    $('#accessories_code').val(res.data.accessories_code);
                                    $('#accessories_name').val(res.data.accessories_name);
                                    $('#accessories_uom').val(res.data.accessories_uom);
                                    $('#accessories_brand').val(res.data.accessories_brand);
                                    $('#accessories_description').val(res.data.accessories_description);
                                    $('#accessorieslistlasmodify_by').val(res.data.accessorieslistlasmodify_by);
                                    
                                    if (res.data.file_name) {
                                        $('#edit_view_photo').attr('src', res.data.file_name);
                                    }
                                    
                                    else {
                                        // Hide the photo preview if there is no photo
                                        $('#edit_photo_preview').hide();
                                    }
                                    
                                    $('#accessoryEditModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    $(document).on('submit', '#updateAccessory', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append("update_entry", true);
                        
                        $.ajax({
                            type: "POST",
                            url: "codeStoreAccessoryList.php",
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
                    
                    // <!-- Delete -->
                    $(document).on('click', '.deleteAccessoryBtn', function() {
                        var entry_id = $(this).val();
                        $('#confirmDeleteBtn').val(entry_id); 
                        $('#deleteConfirmationModal').modal('show'); 
                    });
                    
                    // Handle the delete confirmation
                    $(document).on('click', '#confirmDeleteBtn', function() {
                        var entry_id = $(this).val();
                        
                        $.ajax({
                            type: "POST",
                            url: "codeStoreAccessoryList.php",
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
                </script>
            </section>
        </main>        
    </body>
    </html>