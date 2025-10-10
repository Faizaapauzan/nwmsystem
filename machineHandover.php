<?php
    session_start();
    
    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");

        exit;
    }
    
    if (!isset($_SESSION['username'])) {
        header("location: index.php?error=login");

        exit;
    } 
    
    if ($_SESSION['staff_position'] != 'Admin' && $_SESSION['staff_position'] != 'Manager') {
        header("location: index.php?error=permission");

        exit;
    }

    // Fetch customer list once for reuse
    include "dbconnect.php";

    $customerQuery = "SELECT customer_name FROM customer_list ORDER BY customer_name ASC";
    $customerResult = $conn->query($customerQuery);
    $customerOptions = '';
    
    while ($row = $customerResult->fetch_assoc()) {
        $customerOptions .= "<option value='" . htmlspecialchars($row['customer_name']) . "'>" . htmlspecialchars($row['customer_name']) . "</option>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
        <title>Machine Handover</title>
        
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    
    <body>
        <!--========== HEADER ==========-->
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
                        <img src="neo.png" height="50" width="60" alt="Logo">
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
                                        <a href="machineHandover.php" class="nav__dropdown-item" style="white-space: nowrap;">Machine Handover</a>
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
                <!-- Add Modal -->
                <div class="modal fade" id="mchnHndovrAddModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Add New Machine Handover Entry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            
                            <form id="mchneHndovrForm">
                                <div class="modal-body">
                                    <label class="fw-bold mb-2">Customer Name</label>
                                    <select name="machHO_cstrmNm" id="cstmrNmMH" class="form-select">
                                        <option value="">Select Customer Name</option>
                                        <?php echo $customerOptions; ?>
                                    </select>
                                    
                                    <label class="fw-bold mb-2 mt-3">Machine Information</label>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label class="mb-1">Delivery Date</label>
                                            <input type="date" name="machHO_delDate" class="form-control">
                                        </div>
                                        
                                        <div class="col">
                                            <label class="mb-1">Delivery Time</label>
                                            <input type="time" name="machHO_delTime" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div id="machinesContainer">
                                        <div class="border border-secondary rounded p-3 mb-3" data-machine-index="1">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="fw-bold mb-0">Machine 1:</h6>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="mb-1">Model</label>
                                                    <input type="text" name="machModel" class="form-control">
                                                </div>
                                                
                                                <div class="col">
                                                    <label class="mb-1">Number of Packages</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="numPckg" class="form-control">
                                                        <span class="position-absolute top-50 end-0 translate-middle-y pe-3">Boxes</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col">
                                                    <label class="mb-1">Nameplate Number</label>
                                                    <input type="text" name="nameplatNum" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="button" id="addMachineBtn" class="btn mb-3" style="width: 100%; background-color: #081d45; color: #ffff;">Add Machine</button>
                                    
                                    <label class="fw-bold mb-2">Transportation Information</label>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label class="mb-1">Loading Date</label>
                                            <input type="date" name="loadDate" class="form-control">
                                        </div>
                                        
                                        <div class="col">
                                            <label class="mb-1">Loading Time</label>
                                            <input type="time" name="loadTime" class="form-control">
                                        </div>
                                        
                                        <div class="col">
                                            <label class="mb-1">Lorry Size</label>
                                            <div class="position-relative">
                                                <input type="text" name="lorrySize" class="form-control">
                                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3">ft</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <label class="fw-bold mb-2">Forklift Information</label>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="mb-1">Forklift Capacity</label>
                                            <div class="position-relative">
                                                <input type="text" name="fklftCapcty" class="form-control">
                                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3">Tons</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col offset-1">
                                            <label class="mb-3">Extended Forks Used</label>
                                            <div class="d-flex gap-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="extFrk" id="extFrkY" value="Yes">
                                                    <label class="form-check-label" for="extFrkY">Yes</label>
                                                </div>
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="extFrk" id="extFrkN" value="No">
                                                    <label class="form-check-label" for="extFrkN">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="fw-bold mb-2">Installation Progress</label>
                                        <div class="mb-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="instllnProg" value="Machine Installed">
                                                <label class="form-check-label">Machine Installed</label>
                                            </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="instllnProg" value="Machine Tested">
                                                <label class="form-check-label">Machine Tested</label>
                                            </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="instllnProg" value="Staff Trained">
                                                <label class="form-check-label">Staff Trained</label>
                                            </div>
                                        </div>
                                        
                                        <small class="text-muted">(Check box if task is completed)</small>
                                    </div>
                                    
                                    <label class="fw-bold mb-2">Remarks</label>
                                    <input type="text" name="Remark" class="form-control mb-3">
                                    
                                    <div id="errorMessageAdd" class="alert d-none text-center"></div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- View Modal -->
                <div class="modal fade" id="mchnHndovrViewModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Machine Handover</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            
                            <div class="modal-body">
                                <label class="fw-bold mb-2">Customer Name</label>
                                <p id="view_CustNmHndOvr" class="form-control"></p>
                                
                                <label class="fw-bold mb-2 mt-3">Machine Information</label>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label class="mb-1">Delivery Date</label>
                                        <p id="view_McHoDelDt" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col">
                                        <label class="mb-1">Delivery Time</label>
                                        <p id="view_McHoDelTm" class="form-control"></p>
                                    </div>
                                </div>
                                
                                <div id="viewMachinesContainer"></div>
                                
                                <label class="fw-bold mb-2">Transportation Information</label>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label class="mb-1">Loading Date</label>
                                        <p id="view_McHoLdDt" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col">
                                        <label class="mb-1">Loading Time</label>
                                        <p id="view_McHoLdTm" class="form-control"></p>
                                    </div>
                                    
                                    <div class="col">
                                        <label class="mb-1">Lorry Size</label>
                                        <div class="position-relative">
                                            <p id="view_McHoLrSz" class="form-control"></p>
                                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3">ft</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <label class="fw-bold mb-2">Forklift Information</label>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="mb-1">Forklift Capacity</label>
                                        <div class="position-relative">
                                            <p id="view_McHoFklfCpty" class="form-control"></p>
                                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3">Tons</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col offset-1">
                                        <label class="mb-3">Extended Forks Used</label>
                                        <div class="d-flex gap-4 pe-none">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="extFrkView" value="Yes">
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="extFrkView" value="No">
                                                <label class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="fw-bold mb-2">Installation Progress</label>
                                    <div class="pe-none">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Machine Installed">
                                            <label class="form-check-label">Machine Installed</label>
                                        </div>
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Machine Tested">
                                            <label class="form-check-label">Machine Tested</label>
                                        </div>
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="Staff Trained">
                                            <label class="form-check-label">Staff Trained</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <label class="fw-bold mb-2">Remarks</label>
                                <p id="view_McHoRmrk" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Update Modal -->
                <div class="modal fade" id="mchnHndovrUpdateModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Update Machine Handover Entry</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            
                            <form id="mchneHndovrUpdateForm">
                                <div class="modal-body">
                                    <input type="hidden" name="machHO_id" id="update_machHO_id">
                                    
                                    <label class="fw-bold mb-2">Customer Name</label>
                                    <select name="machHO_cstrmNm" id="update_cstmrNmMH" class="form-select">
                                        <option value="">Select Customer Name</option>
                                        <?php echo $customerOptions; ?>
                                    </select>
                                    
                                    <label class="fw-bold mb-2 mt-3">Machine Information</label>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label class="mb-1">Delivery Date</label>
                                            <input type="date" name="machHO_delDate" id="update_machHO_delDate" class="form-control">
                                        </div>
                                        
                                        <div class="col">
                                            <label class="mb-1">Delivery Time</label>
                                            <input type="time" name="machHO_delTime" id="update_machHO_delTime" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div id="updateMachinesContainer"></div>
                                    
                                    <button type="button" id="addUpdateMachineBtn" class="btn mb-3" style="width: 100%; background-color: #081d45; color: #ffff;">Add Machine</button>
                                    
                                    <label class="fw-bold mb-2">Transportation Information</label>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label class="mb-1">Loading Date</label>
                                            <input type="date" name="loadDate" id="update_loadDate" class="form-control">
                                        </div>
                                        
                                        <div class="col">
                                            <label class="mb-1">Loading Time</label>
                                            <input type="time" name="loadTime" id="update_loadTime" class="form-control">
                                        </div>
                                        
                                        <div class="col">
                                            <label class="mb-1">Lorry Size</label>
                                            <div class="position-relative">
                                                <input type="text" name="lorrySize" id="update_lorrySize" class="form-control">
                                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3">ft</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <label class="fw-bold mb-2">Forklift Information</label>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class="mb-1">Forklift Capacity</label>
                                            <div class="position-relative">
                                                <input type="text" name="fklftCapcty" id="update_fklftCapcty" class="form-control">
                                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3">Tons</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col offset-1">
                                            <label class="mb-3">Extended Forks Used</label>
                                            <div class="d-flex gap-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="extFrk" id="update_extFrkY" value="Yes">
                                                    <label class="form-check-label" for="update_extFrkY">Yes</label>
                                                </div>
                                                
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="extFrk" id="update_extFrkN" value="No">
                                                    <label class="form-check-label" for="update_extFrkN">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="fw-bold mb-2">Installation Progress</label>
                                        <div class="mb-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="instllnProg" id="update_mchninstl" value="Machine Installed">
                                                <label class="form-check-label" for="update_mchninstl">Machine Installed</label>
                                            </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="instllnProg" id="update_mchntstd" value="Machine Tested">
                                                <label class="form-check-label" for="update_mchntstd">Machine Tested</label>
                                            </div>
                                            
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="instllnProg" id="update_stfftrnd" value="Staff Trained">
                                                <label class="form-check-label" for="update_stfftrnd">Staff Trained</label>
                                            </div>
                                        </div>
                                        
                                        <small class="text-muted">(Check box once each task is completed)</small>
                                    </div>
                                    
                                    <label class="fw-bold mb-2">Remarks</label>
                                    <input type="text" name="Remark" id="update_Remark" class="form-control mb-3">
                                    
                                    <div id="errorMessageUpdate" class="alert d-none text-center"></div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Delete Modal -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            
                            <div class="modal-body">
                                <p id="deleteConfirmText" class="text-center">Are you sure you want to delete this entry?</p>
                                <div id="errorMessageDelete" class="alert d-none text-center"></div>
                            </div>
                            
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Machine Handover<button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#mchnHndovrAddModal">Add</button></h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="mchnHndOvrListTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center text-nowrap">Customer Name</th>
                                        <th class="text-center text-nowrap">Machine Information</th>
                                        <th class="text-center text-nowrap">Transportation Information</th>
                                        <th class="text-center text-nowrap">Forklift Information</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM machine_handover ORDER BY machHO_delDate";
                                        $query_run = mysqli_query($conn, $query);
                                        $counter = 1;
                                        
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $hndOvr) {
                                                $machModels = array_map('trim', explode(',', $hndOvr['machModel']));
                                                $numPckgs = array_map('trim', explode(',', $hndOvr['numPckg']));
                                                $nameplatNums = array_map('trim', explode(',', $hndOvr['nameplatNum']));
                                                $maxCount = max(count($machModels), count($numPckgs), count($nameplatNums));
                                                
                                                $machineInfo = "Delivery Date: " . htmlspecialchars($hndOvr['machHO_delDate']) . "<br>";
                                                $machineInfo .= "Delivery Time: " . date('h:i A', strtotime($hndOvr['machHO_delTime'])) . "<br><br>";
                                                
                                                for ($i = 0; $i < $maxCount; $i++) {
                                                    $machineInfo .= "Machine " . ($i + 1) . "<br>";
                                                    $machineInfo .= "Model: " . htmlspecialchars($machModels[$i] ?? 'N/A') . "<br>";
                                                    $machineInfo .= "Number of Packages: " . htmlspecialchars($numPckgs[$i] ?? 'N/A') . " Boxes<br>";
                                                    $machineInfo .= "Nameplate Number: " . htmlspecialchars($nameplatNums[$i] ?? 'N/A');
                                                    
                                                    if ($i < $maxCount - 1) $machineInfo .= "<br><br>";
                                                }
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $counter ?></td>
                                        <td><?= htmlspecialchars($hndOvr['machHO_cstrmNm']) ?></td>
                                        <td><?= $machineInfo ?></td>
                                        <td>Loading Date: <?= htmlspecialchars($hndOvr['loadDate']) ?><br>
                                            Loading Time: <?= date('h:i A', strtotime($hndOvr['loadTime'])) ?><br>
                                            Lorry Size: <?= htmlspecialchars($hndOvr['lorrySize']) ?> ft</td>
                                        <td>Forklift Capacity: <?= htmlspecialchars($hndOvr['fklftCapcty']) ?> Tons<br>
                                            Extended Forks: <?= htmlspecialchars($hndOvr['extFrk']) ?></td>
                                        <td class="text-center text-nowrap align-middle">
                                            <button type="button" value="<?= $hndOvr['machHO_id']; ?>" class="viewHndOvrBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?= $hndOvr['machHO_id']; ?>" class="editHndOvrBtn btn btn-success btn-sm">Update</button>
                                            <button type="button" value="<?= $hndOvr['machHO_id']; ?>" class="deleteHndOvrBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php $counter++; } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
        <!--========== JS ==========-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/js/main.js"></script>
        
        <script>
            $(document).ready(function() {
                // Mobile view toggle
                function toggleMobileView() {
                    const isMobile = window.innerWidth <= 768;
                    const $home = $('#home');
                    
                    if (isMobile) {
                        $home.attr('href', '#').off('click').on('click', function(e) {
                            e.preventDefault();
                            
                            $('#mobile-view').toggle();
                        });
                    }
                    
                    else {
                        $home.attr('href', 'Adminhomepage.php').off('click');
                    }
                }
                
                toggleMobileView();
                
                $(window).resize(toggleMobileView);
                
                $('#mchnHndOvrListTable').DataTable({
                    responsive: true,
                    language: { search: "_INPUT_", searchPlaceholder: "Search" },
                    pagingType: 'full_numbers'
                });
                
                function initSelect2(selector, parent) {
                    $(selector).select2({
                        dropdownParent: parent,
                        theme: 'bootstrap-5',
                        
                        matcher: function(params, data) {
                            if (!params.term) return data;
                            if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) === 0) return data;
                            
                            return null;
                        }
                    });
                }
                
                const utils = {
                    formatDate: (dateStr) => {
                        if (!dateStr) return '';
                        const d = new Date(dateStr);
                        return isNaN(d) ? dateStr : `${('0'+d.getDate()).slice(-2)}/${('0'+(d.getMonth()+1)).slice(-2)}/${d.getFullYear()}`;
                    },
                    
                    formatTime: (timeStr) => {
                        if (!timeStr) return '';
                        const [h, m] = timeStr.split(':');
                        const hour = parseInt(h);
                        return `${hour % 12 || 12}:${m} ${hour >= 12 ? 'PM' : 'AM'}`;
                    },
                    
                    parseCSV: (str) => str ? str.split(',').map(s => s.trim()).filter(Boolean) : [''],
                    
                    showAlert: (elem, msg, type = 'warning') => {
                        $(elem).removeClass('d-none alert-success alert-warning').addClass(`alert-${type}`).text(msg);
                    },
                    
                    hideAlert: (elem) => {
                        $(elem).addClass('d-none').removeClass('alert-success alert-warning').text('');
                    }
                };
                
                // Machine management for Add modal
                let machineCount = 1;
                
                function createMachineHTML(idx, data = {}, prefix = '') {
                    const namePrefix = prefix || (idx === 1 ? '' : `machines[${idx}]`);
                    const modelName = namePrefix ? `${namePrefix}[machModel]` : 'machModel';
                    const packagesName = namePrefix ? `${namePrefix}[numPckg]` : 'numPckg';
                    const nameplateName = namePrefix ? `${namePrefix}[nameplatNum]` : 'nameplatNum';
                    
                    return `<div class="border border-secondary rounded p-3 mb-3" data-machine-index="${idx}">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="fw-bold mb-0">Machine ${idx}:</h6>
                                    ${idx > 1 || prefix ? '<button type="button" class="btn-close remove-machine"></button>' : ''}
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="mb-1">Model</label>
                                        <input type="text" name="${modelName}" class="form-control" value="${data.model || ''}">
                                    </div>
                                    
                                    <div class="col">
                                        <label class="mb-1">Number of Packages</label>
                                        <div class="position-relative">
                                            <input type="text" name="${packagesName}" class="form-control" value="${data.packages || ''}">
                                            <span class="position-absolute top-50 end-0 translate-middle-y pe-3">Boxes</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                        <label class="mb-1">Nameplate Number</label>
                                        <input type="text" name="${nameplateName}" class="form-control" value="${data.nameplate || ''}">
                                    </div>
                                </div>
                            </div>`;
                }
                
                $('#addMachineBtn').on('click', function() {
                    machineCount++;

                    $('#machinesContainer').append(createMachineHTML(machineCount));
                });
                
                $(document).on('click', '#machinesContainer .remove-machine', function() {
                    $(this).closest('[data-machine-index]').remove();
                    
                    $('#machinesContainer [data-machine-index]').each(function(i) {
                        const newIdx = i + 1;
                        
                        $(this).attr('data-machine-index', newIdx).find('h6').text(`Machine ${newIdx}:`);
                        
                        if (newIdx > 1) {
                            $(this).find('input').each(function() {
                                const name = $(this).attr('name');
                                
                                if (name && name.includes('[')) {
                                    const field = name.split('][')[1].replace(']', '');
                                    $(this).attr('name', `machines[${newIdx}][${field}]`);
                                }
                            });
                        }
                    });
                    
                    machineCount = $('#machinesContainer [data-machine-index]').length;
                });
                
                // Add form submission
                let formSubmitted = false;
                
                $('#mchneHndovrForm').on('submit', function(e) {
                    e.preventDefault();
                    
                    const $btn = $(this).find('button[type="submit"]');
                    
                    $btn.prop('disabled', true).text('Submitting');
                    utils.hideAlert('#errorMessageAdd');
                    
                    const machines = [];
                    
                    $('#machinesContainer [data-machine-index]').each(function() {
                        const idx = $(this).data('machine-index');
                        
                        machines.push({
                            machModel: $(this).find(`input[name$="[machModel]"], input[name="machModel"]`).val(),
                            numPckg: $(this).find(`input[name$="[numPckg]"], input[name="numPckg"]`).val(),
                            nameplatNum: $(this).find(`input[name$="[nameplatNum]"], input[name="nameplatNum"]`).val()
                        });
                    });
                    
                    const formData = $(this).serialize() + '&instllnProg=' + 
                                     $('input[name="instllnProg"]:checked').map(function() { return this.value; }).get().join(',') + '&machines_data=' + 
                                     encodeURIComponent(JSON.stringify(machines));
                
                    $.ajax({
                        url: 'AdminMachineHandoverSubmit.php',
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        
                        success: function(res) {
                            $btn.prop('disabled', false).text('Submit');
                            
                            if (res.success) {
                                utils.showAlert('#errorMessageAdd', 'Entry successfully added!', 'success');
                                
                                formSubmitted = true;
                            }
                            
                            else {
                                utils.showAlert('#errorMessageAdd', res.message || 'Error saving data');
                            }
                        },
                        
                        error: function() {
                            $btn.prop('disabled', false).text('Submit');
                            
                            utils.showAlert('#errorMessageAdd', 'An error occurred');
                        }
                    });
                });
                
                // Add modal close
                $('#mchnHndovrAddModal').on('hidden.bs.modal', function() {
                    const refresh = formSubmitted;
                    
                    $(this).find('form')[0].reset();
                    $('#machinesContainer').html(createMachineHTML(1));
                    
                    machineCount = 1;
                    
                    $('#cstmrNmMH').val('').trigger('change');
                    $('input[type="checkbox"], input[type="radio"]').prop('checked', false);
                    
                    utils.hideAlert('#errorMessageAdd');
                    
                    formSubmitted = false;
                    
                    if (refresh) location.reload();
                });
                
                // Update modal - machine management
                let updateMachineCount = 0;
                
                $('#addUpdateMachineBtn').on('click', function() {
                    updateMachineCount++;
                    
                    $('#updateMachinesContainer').append(createMachineHTML(updateMachineCount, {}, `update_machines[${updateMachineCount}]`));
                });
                
                $(document).on('click', '#updateMachinesContainer .remove-machine', function() {
                    if (updateMachineCount > 1) {
                        $(this).closest('[data-machine-index]').remove();
                        
                        $('#updateMachinesContainer [data-machine-index]').each(function(i) {
                            const newIdx = i + 1;
                            
                            $(this).attr('data-machine-index', newIdx).find('h6').text(`Machine ${newIdx}:`);
                            $(this).find('input').each(function() {
                                const name = $(this).attr('name');
                                
                                if (name && name.includes('update_machines')) {
                                    const field = name.match(/\[(\w+)\]$/)[1];
                                    
                                    $(this).attr('name', `update_machines[${newIdx}][${field}]`);
                                }
                            });
                        });
                        
                        updateMachineCount = $('#updateMachinesContainer [data-machine-index]').length;
                    }
                });
                
                // View modal
                $(document).on('click', '.viewHndOvrBtn', function() {
                    $.get('AdminMachineHandoverSubmit.php', { machHO_id: $(this).val() }, function(res) {
                        if (res.status === 200) {
                            const d = res.data;
                            
                            $('#view_CustNmHndOvr').text(d.machHO_cstrmNm || '');
                            $('#view_McHoDelDt').text(utils.formatDate(d.machHO_delDate));
                            $('#view_McHoDelTm').text(utils.formatTime(d.machHO_delTime));
                            $('#view_McHoLdDt').text(utils.formatDate(d.loadDate));
                            $('#view_McHoLdTm').text(utils.formatTime(d.loadTime));
                            $('#view_McHoLrSz').text(d.lorrySize || '');
                            $('#view_McHoFklfCpty').text(d.fklftCapcty || '');
                            $('#view_McHoRmrk').text(d.Remark || '');
                            
                            $(`input[name="extFrkView"][value="${d.extFrk}"]`).prop('checked', true);
                            
                            const progs = d.instllnProg.split(',');
                            $('#mchnHndovrViewModal input[type="checkbox"]').prop('checked', false);
                            progs.forEach(p => $(`#mchnHndovrViewModal input[value="${p.trim()}"]`).prop('checked', true));
                            
                            const models = utils.parseCSV(d.machModel);
                            const packages = utils.parseCSV(d.numPckg);
                            const nameplates = utils.parseCSV(d.nameplatNum);
                            const max = Math.max(models.length, packages.length, nameplates.length);
                            
                            let html = '';
                            
                            for (let i = 0; i < max; i++) {
                                html += `<div class="border border-secondary rounded p-3 mb-3">
                                            <h6 class="fw-bold mb-3">Machine ${i+1}:</h6>
                                            
                                            <div class="row mb-3">
                                                <div class="col"><label class="mb-1">Model</label><p class="form-control">${models[i] || ''}</p></div>
                                                
                                                <div class="col"><label class="mb-1">Number of Packages</label>
                                                
                                                <div class="position-relative"><p class="form-control">${packages[i] || ''}</p>
                                                    <span class="position-absolute top-50 end-0 translate-middle-y pe-3">Boxes</span></div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col"><label class="mb-1">Nameplate Number</label><p class="form-control">${nameplates[i] || ''}</p></div>
                                            </div>
                                        </div>`;
                            }
                            
                            $('#viewMachinesContainer').html(html);
                            $('#mchnHndovrViewModal').modal('show');
                        }
                    }, 'json');
                });
                
                // Update modal
                $(document).on('click', '.editHndOvrBtn', function() {
                    $.get('AdminMachineHandoverSubmit.php', { machHO_id: $(this).val() }, function(res) {
                        if (res.status === 200) {
                            const d = res.data;
                            
                            $('#update_machHO_id').val(d.machHO_id);
                            $('#update_cstmrNmMH').val(d.machHO_cstrmNm);
                            $('#update_machHO_delDate').val(d.machHO_delDate);
                            $('#update_machHO_delTime').val(d.machHO_delTime);
                            $('#update_loadDate').val(d.loadDate);
                            $('#update_loadTime').val(d.loadTime);
                            $('#update_lorrySize').val(d.lorrySize);
                            $('#update_fklftCapcty').val(d.fklftCapcty);
                            $('#update_Remark').val(d.Remark);
                            $(`input[name="extFrk"][value="${d.extFrk}"]`).prop('checked', true);
                            
                            const progs = d.instllnProg.split(',');
                            
                            $('#update_mchninstl, #update_mchntstd, #update_stfftrnd').prop('checked', false);
                            
                            progs.forEach(p => {
                                const clean = p.trim();
                                if (clean === 'Machine Installed') $('#update_mchninstl').prop('checked', true);
                                else if (clean === 'Machine Tested') $('#update_mchntstd').prop('checked', true);
                                else if (clean === 'Staff Trained') $('#update_stfftrnd').prop('checked', true);
                            });
                            
                            const models = utils.parseCSV(d.machModel);
                            const packages = utils.parseCSV(d.numPckg);
                            const nameplates = utils.parseCSV(d.nameplatNum);
                            const max = Math.max(models.length, packages.length, nameplates.length, 1);
                            
                            let html = '';
                            
                            for (let i = 0; i < max; i++) {
                                html += createMachineHTML(i + 1, { 
                                    model: models[i] || '',
                                    packages: packages[i] || '',
                                    nameplate: nameplates[i] || ''
                                }, `update_machines[${i + 1}]`);
                            }
                            
                            $('#updateMachinesContainer').html(html);
                            
                            updateMachineCount = max;
                            
                            utils.hideAlert('#errorMessageUpdate');
                            
                            $('#mchnHndovrUpdateModal').modal('show');
                        }
                    }, 'json');
                });
                
                // Initialize Select2 on modals shown
                $('#mchnHndovrAddModal').on('shown.bs.modal', () => initSelect2('#cstmrNmMH', $('#mchnHndovrAddModal')));
                $('#mchnHndovrUpdateModal').on('shown.bs.modal', () => initSelect2('#update_cstmrNmMH', $('#mchnHndovrUpdateModal')));
                
                // Update form submission
                let updateSubmitted = false;
                
                $('#mchneHndovrUpdateForm').on('submit', function(e) {
                    e.preventDefault();
                    
                    const $btn = $(this).find('button[type="submit"]');
                    
                    $btn.prop('disabled', true).text('Updating');
                    utils.hideAlert('#errorMessageUpdate');
                    
                    const machines = [];
                    
                    $('#updateMachinesContainer [data-machine-index]').each(function() {
                        const idx = $(this).data('machine-index');
                        
                        machines.push({
                            machModel: $(this).find(`input[name="update_machines[${idx}][machModel]"]`).val(),
                            numPckg: $(this).find(`input[name="update_machines[${idx}][numPckg]"]`).val(),
                            nameplatNum: $(this).find(`input[name="update_machines[${idx}][nameplatNum]"]`).val()
                        });
                    });
                    
                    const formData = new FormData(this);
                    
                    formData.append('update_entry', '1');
                    formData.set('instllnProg', $('#mchneHndovrUpdateForm input[name="instllnProg"]:checked').map(function() { return this.value; }).get().join(','));
                    formData.append('machines_data', JSON.stringify(machines));
                    
                    $.ajax({
                        url: 'AdminMachineHandoverSubmit.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        
                        success: function(res) {
                            $btn.prop('disabled', false).text('Update');
                            
                            if (res.success) {
                                utils.showAlert('#errorMessageUpdate', res.message, 'success');
                                updateSubmitted = true;
                            }
                            
                            else {
                                utils.showAlert('#errorMessageUpdate', res.message);
                            }
                        },
                        
                        error: function() {
                            $btn.prop('disabled', false).text('Update');
                            utils.showAlert('#errorMessageUpdate', 'An error occurred');
                        }
                    });
                });
                
                // Update modal close
                $('#mchnHndovrUpdateModal').on('hidden.bs.modal', function() {
                    const refresh = updateSubmitted;
                    
                    $(this).find('form')[0].reset();
                    $('#updateMachinesContainer').html('');
                    
                    updateMachineCount = 0;
                    
                    $('#update_cstmrNmMH').val('').trigger('change');
                    $('input[type="checkbox"], input[type="radio"]').prop('checked', false);
                    
                    utils.hideAlert('#errorMessageUpdate');
                    updateSubmitted = false;
                    
                    if (refresh) location.reload();
                });
                
                // Delete
                $(document).on('click', '.deleteHndOvrBtn', function() {
                    $('#confirmDeleteBtn').val($(this).val());
                    $('#deleteConfirmText').show();
                    $('.modal-footer').show();
                    
                    utils.hideAlert('#errorMessageDelete');
                    
                    $('#deleteConfirmationModal').modal('show');
                });
                
                $('#confirmDeleteBtn').on('click', function() {
                    const id = $(this).val();
                    
                    $(this).prop('disabled', true).text('Deleting');
                    
                    $.post('AdminMachineHandoverSubmit.php', { delete_entry: true, machHO_id: id }, function(res) {
                        if (res.status === 200) {
                            $('#deleteConfirmText, .modal-footer').hide();
                            
                            utils.showAlert('#errorMessageDelete', 'Entry successfully deleted!', 'success');
                            
                            setTimeout(() => location.reload(), 500);
                        }
                        
                        else {
                            utils.showAlert('#errorMessageDelete', res.message || 'Error deleting entry');
                            
                            $('#confirmDeleteBtn').prop('disabled', false).text('Delete');
                        }
                    }, 'json');
                });
            });
        </script>
    </body>
</html>