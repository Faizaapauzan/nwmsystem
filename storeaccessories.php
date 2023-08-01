<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    <title>Store Accessories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="css/technicianmain.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>

<style>
    #myTable {
        counter-reset: rowNumber;
    }

    #myTable tr>td:first-child {
        counter-increment: rowNumber;
    }

    #myTable tr td:first-child::before {
        content: counter(rowNumber);
    }

    ::-webkit-scrollbar {
        display: none;
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Accessory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="saveEntry" enctype="multipart/form-data">
                    <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">

                        <div class="mb-3">
                            <label for="">Accessories Code</label>
                            <input type="text" name="accessories_code" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Accessories Name</label>
                            <input type="text" name="accessories_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Unit of Measurement (UOM)</label>
                            <input type="text" name="accessories_uom" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Accessories Brand</label>
                            <input type="text" name="accessories_brand" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Accessories Description</label>
                            <input type="text" name="accessories_description" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Photo</label>
                            <input type="file" id="image_input" name="files[]" multiple class="form-control" />
                            <div id="image_preview"></div>
                        </div>

                        <script>
                            // JavaScript code to handle image preview
                            document.getElementById("image_input").addEventListener("change", function (event) {
                                const imagePreview = document.getElementById("image_preview");
                                imagePreview.innerHTML = ""; // Clear previous previews
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

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <?php if (isset($_SESSION["username"])) { ?>
                            <input type="hidden" name="accessorieslistcreated_by" id="accessorieslistcreatedby" value="<?php echo $_SESSION["username"] ?>" class="form-control" readonly>
                            <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodify_by" value="<?php echo $_SESSION["username"] ?>" class="form-control" readonly>
                        <?php } ?>

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

                <form id="updateEntry" enctype="multipart/form-data">
                    <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">

                        <input type="hidden" name="accessories_id" id="accessories_id">

                        <div class="mb-3">
                            <label for="">Accessories Code</label>
                            <input type="text" name="accessories_code" id="accessories_code" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Accessories Name</label>
                            <input type="text" name="accessories_name" id="accessories_name" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Unit of Measurement (UOM)</label>
                            <input type="text" name="accessories_uom" id="accessories_uom" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Accessories Brand</label>
                            <input type="text" name="accessories_brand" id="accessories_brand" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Accessories Description</label>
                            <input type="text" name="accessories_description" id="accessories_description" class="form-control" />
                        </div>
                        
                        <div class="mb-3">
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

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <?php if (isset($_SESSION["username"])) { ?>
                            <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodifyby" value="<?php echo $_SESSION["username"] ?>" class="form-control" readonly>
                        <?php } ?>
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
                        <label for="">ID</label>
                        <p id="view_ID" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Code</label>
                        <p id="view_code" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Name</label>
                        <p id="view_name" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Unit of Measurement (UOM)</label>
                        <p id="view_UOM" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Brand</label>
                        <p id="view_brand" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <p id="view_description" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Photo</label>
                        <div id="view_image_container">
                            <img id="view_photo" class="form-control" />
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="">Created by</label>
                        <p id="view_createdby" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Created at</label>
                        <p id="view_createdat" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Modify by</label>
                        <p id="view_modifyby" class="form-control"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Modify at</label>
                        <p id="view_modifyat" class="form-control"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
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
                        <h4>Accessory List
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#entryAddModal">Add</button>
                        </h4>
                    </div>
                    <div class="card-body" style="margin-bottom: 50px;">
                        <div class="table-responsive">
                            <script>
                                $(document).ready(function() {
                                    $('#myTable').DataTable();
                                });
                            </script>
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Brand</th>
                                        <th>Action</th>
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
                                                echo "<td style='white-space: nowrap;'>" . $entry['accessories_code'] . "</td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>" . $entry['accessories_brand'] . "</td>";
                                                echo "<td style='text-align: center; white-space: nowrap;'>
                                                        <button type='button' value='" . $entry['accessories_id'] . "' class='viewEntryBtn btn btn-info btn-sm'>View</button>
                                                        <button type='button' value='" . $entry['accessories_id'] . "' class='editEntryBtn btn btn-success btn-sm'>Edit</button>
                                                        <button type='button' value='" . $entry['accessories_id'] . "' class='deleteEntryBtn btn btn-danger btn-sm'>Delete</button>
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
    <!-- End of Table -->

    <!-- Search Function -->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <!-- End of Search Function -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        // <!--========== Save (add) ==========-->
        $(document).on('submit', '#saveEntry', function (e) {
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

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#entryAddModal').modal('hide');
                        $('#saveEntry')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        location.reload(); // Reload the entire page

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        // <!--========== Update ==========-->
        $(document).on('click', '.editEntryBtn', function() {
            var entry_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "codeStoreAccessoryList.php?entry_id=" + entry_id,
                
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {
                        alert(res.message);
                    } 
                    
                    else if (res.status == 200) {
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
                url: "codeStoreAccessoryList.php",
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

                        location.reload(); // Reload the entire page
                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        // <!--========== View ==========-->
        $(document).on('click', '.viewEntryBtn', function() {

            var entry_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "codeStoreAccessoryList.php?entry_id=" + entry_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {

                        alert(res.message);
                    } else if (res.status == 200) {

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

                        $('#entryViewModal').modal('show');
                    }
                }
            });
        });

        // <!--========== Delete ==========-->
        $(document).on('click', '.deleteEntryBtn', function() {
            var entry_id = $(this).val();
            $('#confirmDeleteBtn').val(entry_id); // Set the value of the delete button to the entry_id
            $('#deleteConfirmationModal').modal('show'); // Show the delete confirmation modal
        });
        
        // Handle the delete confirmation
        $(document).on('click', '#confirmDeleteBtn', function() {
            var entry_id = $(this).val();
            
            $.ajax({
                type: "POST",
                url: "codeStoreAccessoryList.php",
                data: {
                    'delete_entry': true,
                    'entry_id': entry_id
                },
                
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {
                        alert(res.message);
                    } 
                    
                    else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        
                        // Close the delete confirmation modal
                        $('#deleteConfirmationModal').modal('hide');
                        
                        location.reload(); // Reload the entire page
                    }
                }
            });
        });
    </script>

</body>

</html>