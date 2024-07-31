<?php
    
    session_start();
    
    if($_SESSION['staff_position']=="" ){
        header("location:index.php?error");
    }
    
    if(!isset($_SESSION['username'])) {
        header("location:index.php?error");
    }

    elseif($_SESSION['staff_position']== 'Admin') {

	}
    
    elseif($_SESSION['staff_position']== 'Manager') {

    }
    
    else {
        header("location:index.php?error");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>NWM Technician</title>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="assets/css/styles.css">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    
    <body>
        <!--========== HEADER ==========-->
        <script>
            $(document).ready(function() {
                function toggleMobileView() {
                    if (window.innerWidth <= 768) {
                        $('#home').attr('href', '#');
                        $('#home').off('click');
                        $('#home').click(function(e) {
                            e.preventDefault();
                            
                            if ($('#mobile-view').css('display') === 'none'){
                                $('#mobile-view').css('display', 'block');
                            }
                            
                            else {
                                $('#mobile-view').css('display', 'none');
                            }
                        });
                    }
                    
                    else {
                        $('#home').attr('href', 'Adminhomepage.php');
                        $('#home').off('click');
                    }
                }
                
                toggleMobileView();
                
                $(window).resize(function() {
                    toggleMobileView();
                });
            });
        </script>
        
        <header class="header">
            <div class="header__container">
                <div class="header__search">
                    <div class="dropdown1">
                        <a href="Adminhomepage.php" id="home" style="font-weight: bold; font-size:25px; color:black;">Home</a>
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
            
            <div class="mobile-view" id="mobile-view">
                <div class="dropdown-content2" id="dropdown-content2">
                    <a href="Adminhomepage.php">Home</a>
                    <a href="AdminJobTable.php">Table View</a>
                    <a href="adminjoblisting.php">List View</a>
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
                                <a href="#" class="nav__link">
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

                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-group nav__icon'></i>
                                    <span class="nav__name">Machine</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="machine.php" class="nav__dropdown-item">Machine</a>
                                        <a href="machineBrand.php" class="nav__dropdown-item">Machine Brand</a>
                                        <a href="machineType.php" class="nav__dropdown-item">Machine Type</a>
                                    </div>
                                </div>
                            </div>

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
                                        <a href="technicianJobDaily.php" class="nav__dropdown-item">Daily Job</a>
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
                <!-- View Modal -->
                <div class="modal fade" id="technicianViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Technician</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="">ID</label>
                                        <p id="view_ID" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Employee ID</label>
                                        <p id="view_EmpID" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Username</label>
                                        <p id="view_username" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Full Name</label>
                                        <p id="view_fullName" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Phone</label>
                                        <p id="view_phone" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="">Email</label>
                                        <p id="view_email" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Department</label>
                                        <p id="view_department" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Group</label>
                                        <p id="view_group" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Position</label>
                                        <p id="view_position" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Technician Rank</label>
                                        <p id="view_techRank" class="form-control"></p>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="">Job Ability</label>
                                        <p id="view_jobAbility" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Created By</label>
                                        <p id="view_techCreBy" class="form-control"></p>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="">Created At</label>
                                        <p id="view_techCreAt" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Modify By</label>
                                        <p id="view_lastModBy" class="form-control"></p>
                                    </div>
                                
                                    <div class="col-md-6 mb-3">
                                        <label for="">Last Modify At</label>
                                        <p id="view_lastModAt" class="form-control"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Modal -->
                <div class="modal fade" id="technicianEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Technician</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="updateTechnician">
                                <div class="modal-body">
                                    <input type="hidden" name="staffregister_id" id="staffregister_id">
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="staff_fullname" id="staff_fullname" class="form-control" disabled />
                                        </div>
                                            
                                        <div class="col-md-6 mb-3">
                                            <label for="">Employee ID</label>
                                            <input type="text" name="employee_id" id="employee_id" class="form-control" disabled />
                                        </div>
                                        
                                        <!-- Rank -->
                                        <label for="">Technician Rank</label>

                                        <div class="col-md-6 mb-3">
                                            <input class="form-check-input" type="radio" name="technician_rank" id="technician_rank-1st" value="1st Leader">
                                            <label class="form-check-label" for="inlineRadio1">1st Leader</label>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <input class="form-check-input" type="radio" name="technician_rank" id="technician_rank-2nd" value="2nd Leader">
                                            <label class="form-check-label" for="inlineRadio2">2nd Leader</label>
                                        </div>
                                        <!-- Rank -->

                                        <!-- Ability -->
                                        <label for="">Job Ability</label>
                                        
                                        <div class="col-6 col-md-3">
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityWiring" name="job_ability[]" value="Wiring">
                                            <label class="form-check-label" for="WIRING">Wiring</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-3"> 
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityPneumatic" name="job_ability[]" value="Pneumatic">
                                            <label class="form-check-label" for="PNEUMATIC">Pneumatic</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-3"> 
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityMechanic" name="job_ability[]" value="Mechanic">
                                            <label class="form-check-label" for="MECHANIC">Mechanic</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-3"> 
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityGluepot" name="job_ability[]" value="Gluepot">
                                            <label class="form-check-label" for="GLUEPOT">Gluepot</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-3">  
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityJesh" name="job_ability[]" value="Jesh">
                                            <label class="form-check-label" for="JESH">Jesh</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-3">  
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityCNC" name="job_ability[]" value="Cnc">
                                            <label class="form-check-label" for="CNC">CNC</label>
                                        </div>
                                                  
                                        <div class="col-6 col-md-3">
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityUV" name="job_ability[]" value="Uv">
                                            <label class="form-check-label" for="UV">UV</label>
                                        </div>

                                        <div class="col-6 col-md-3"> 
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityPanelSaw" name="job_ability[]" value="Panel Saw">
                                            <label class="form-check-label" for="PANELSAWMAC">Panel Saw</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-3"> 
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityEdgeBanding" name="job_ability[]" value="Edge Banding">
                                            <label class="form-check-label" for="EDGEBANDINGMAC">Edge Banding</label>
                                        </div>

                                        <div class="col-6 col-md-3"> 
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityFingerJoint" name="job_ability[]" value="Finger Joint">
                                            <label class="form-check-label" for="FINGER JOINT">Finger Joint</label>
                                        </div>
                                                
                                        <div class="col-6 col-md-4">
                                            <input class="form-check-input job-ability-checkbox" type="checkbox" id="job_abilityLoading/Unloading" name="job_ability[]" value="Loading/Unloading">
                                            <label class="form-check-label" for="LOADINGUNLOADING">Loading / Unloading</label>
                                        </div>
                                        <!-- Ability -->
                                        
                                        <?php if (isset($_SESSION["username"])) { ?>
                                            <input type="hidden" name="staffregisterlastmodify_by" id="staffregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
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
                
                <!-- Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Technician List</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="technicianTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='text-align: center;'>No</th>
                                        <th style='text-align: center;'>Name</th>
                                        <th style='text-align: center;'>Rank</th>
                                        <th style='text-align: center;'>Ability</th>
                                        <th style='text-align: center;'>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    
                                        require 'dbconnect.php';
                                
                                        $query = "SELECT * FROM staff_register WHERE (technician_rank = '1st Leader' OR technician_rank = '2nd Leader') ORDER BY staff_fullname ASC";
                                        $query_run = mysqli_query($conn, $query);

                                        $counter = 1;
                                
                                        if(mysqli_num_rows($query_run) > 0) {
                                            foreach($query_run as $technician) {
                                    ?>
                            
                                    <tr>
                                        <td style='text-align: center;'><?= $counter ?></td>
                                        <td style='white-space: nowrap;'><?= $technician['staff_fullname'] ?></td>
                                        <td style='white-space: nowrap;'><?= $technician['technician_rank'] ?></td>
                                        <td style='text-align: center;'><?= $technician['job_ability'] ?></td>
                                        <td style='text-align: center; white-space: nowrap;'>
                                            <button type="button" value="<?=$technician['staffregister_id'];?>" class="viewTechBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$technician['staffregister_id'];?>" class="editTechBtn btn btn-success btn-sm">Update</button>
                                        </td>
                                    </tr>
                                    <?php $counter++; } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </br>
                
                <!--========== JS ==========-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
                <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
                <script src="assets/js/main.js"></script>
                
                <script>
                    $(document).ready(function(){
                        $('#technicianTable').DataTable({
                            responsive:true,
                            language: {search:"_INPUT_",
                                       searchPlaceholder:"Search"},
                            pagingType: 'full_numbers'
                        });
                    });
                </script>
                
                <script>
                    // <!-- View -->
                    $(document).on('click', '.viewTechBtn', function () {
                        var staffregister_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "technicianlistCode.php?staffregister_id=" + staffregister_id,
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if(res.status == 404) {
                                    alert(res.message);
                                }
                                
                                else if(res.status == 200){
                                    $('#view_ID').text(res.data.staffregister_id);
                                    $('#view_username').text(res.data.username);
                                    $('#view_fullName').text(res.data.staff_fullname);
                                    $('#view_EmpID').text(res.data.employee_id);
                                    $('#view_phone').text(res.data.staff_phone);
                                    $('#view_email').text(res.data.staff_email);
                                    $('#view_department').text(res.data.staff_department);
                                    $('#view_position').text(res.data.staff_position);
                                    $('#view_group').text(res.data.staff_group);
                                    $('#view_techRank').text(res.data.technician_rank);
                                    $('#view_jobAbility').text(res.data.job_ability);
                                    $('#view_techCreBy').text(res.data.staffregistercreated_by);
                                    $('#view_techCreAt').text(res.data.staffregistercreated_at);
                                    $('#view_lastModBy').text(res.data.staffregisterlastmodify_by);
                                    $('#view_lastModAt').text(res.data.staffregisterlastmodify_at);
                                    
                                    $('#technicianViewModal').modal('show');
                                }
                            }
                        });
                    });
                    
                    // <!-- Update -->
                    $(document).on('click', '.editTechBtn', function () {
                        var staffregister_id = $(this).val();
                        
                        $.ajax({
                            type: "GET",
                            url: "technicianlistCode.php?staffregister_id=" + staffregister_id,
                            
                            success: function (response) {
                                var res = jQuery.parseJSON(response);
                                
                                if (res.status == 404) {
                                    alert(res.message);
                                } 
                                
                                else if (res.status == 200) {
                                    $('#staffregister_id').val(res.data.staffregister_id);
                                    $('#staff_fullname').val(res.data.staff_fullname);
                                    $('#employee_id').val(res.data.employee_id);
                                    $('input[name=technician_rank][value="' + res.data.technician_rank + '"]').prop('checked', true);

                                    var jobAbilities = res.data.job_ability.split(',');
                                    
                                    $('.job-ability-checkbox').each(function () {
                                        var currentCheckbox = $(this);
                                        var abilityValue = currentCheckbox.val();

                                        if (jobAbilities.includes(abilityValue)) {
                                            currentCheckbox.prop('checked', true);
                                        } 
                                        
                                        else {
                                            currentCheckbox.prop('checked', false);
                                        }
                                    });

                                    $('#staffregisterlastmodify_by').val(res.data.staffregisterlastmodify_by);

                                    $('#technicianEditModal').modal('show');
                                }
                            }
                        });
                    });

                    $(document).on('submit', '#updateTechnician', function (e) {
                        e.preventDefault();
                        
                        var formData = new FormData(this);
                        formData.append('update_technician', true);
                        
                        $.ajax({
                            type: "POST",
                            url: "technicianlistCode.php",
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
                                    $('#updateTechnician')[0].reset();
                                    $('#technicianEditModal').modal('hide');
                                    
                                    alertify.set('notifier','position', 'top-right');
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
                </script>
            </section>
        </main>        
    </body>
    </html>