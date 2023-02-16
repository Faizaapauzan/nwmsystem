<?php
    
    session_start();
    if (session_status() == PHP_SESSION_NONE) {
        header("location: index.php?error=session");
    }
    if(!isset($_SESSION['username'])) {
        header("location: index.php?error=login");
    }
    elseif($_SESSION['staff_position']!= 'Admin' && $_SESSION['staff_position']!='Manager') {
        header("location: index.php?error=permission");
    }

?> 

<?php

    include_once 'Pagination.class.php';
    require_once 'dbconnect.php';
    
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM tech_update");
    $result  = $query->fetch_assoc();
    $rowCount= $result['rowNum'];
    
    $pagConfig = array('totalRows' => $rowCount,);
    $pagination =  new Pagination($pagConfig);
    
    $query = $conn->query("SELECT * FROM tech_update ORDER BY techupdate_id DESC"); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician Attendance</title>
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    
    <link href="css/homepage.css" rel="stylesheet" />
    <link href="css/machine.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />
    
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<style>
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        padding-bottom: 30px;
    }
</style>

<body>
    <!-- Navigation Sidebar -->
    <div class="sidebar close">
        <div class="logo-details">
            <img src="neo.png" height="65" width="75"></img>
            <span class="logo_name">NWM SYSTEM</span>
        </div>
        
        <div class="welcome" style="color: white; text-align: center; font-size:small;">Hi  <?php echo $_SESSION["username"] ?>!</div>
        
        <ul class="nav-links">
            <li>
                <a href="jobregister.php">
                    <i class='bx bx-registered' ></i>
                    <span class="link_name">Register Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobregister.php">Register Job</a></li>
                </ul>
            </li>
            
            <li>
                <div class="iocn-link">
                    <a href="">
                        <i class='bx bx-calendar-check' ></i>
                        <span class="link_name">Attendance</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="attendanceadmin.php">Attendance</a></li>
                    <li><a class="link_name" href="AdminLeave.php">Leave</a></li>
                </ul>
            </li>
            
            <li>
                <div class="iocn-link">
                    <a href="staff.php">
                        <i class='bx bx-id-card' ></i>
                        <span class="link_name">Staff</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="staff.php">Staff</a></li>
                </ul>
            </li>
            
            <li>
                <a href="technicianlist.php">
                    <i class='fa fa-users' ></i>
                    <span class="link_name">Technician</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="technicianlist.php">Technician</a></li>
                </ul>
            </li>
            
            <li>
                <a href="customer.php">
                    <i class='bx bx-user' ></i>
                    <span class="link_name">Customers</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="customer.php">Customers</a></li>
                </ul>
            </li>
            
            <li>
                <div class="iocn-link">
                    <a href="machine.php">
                        <i class='fa fa-medium' ></i>
                        <span class="link_name">Machine</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="machine.php">Machine</a></li>
                </ul>
            </li>
            
            <li>
                <a href="accessories.php">
                    <i class='bx bx-wrench' ></i>
                    <span class="link_name">Accessories</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="accessories.php">Accessories</a></li>
                </ul>
            </li>
            
            <li>
                <a href="jobtype.php">
                    <i class='bx bx-briefcase'></i>
                    <span class="link_name">Job Type</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobtype.php">Job Type</a></li>
                </ul>
            </li>
            
            <li>
                <a href="jobcompleted.php">
                    <i class='fa fa-check-square-o' ></i>
                    <span class="link_name">Completed Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobcompleted.php">Compeleted Job</a></li>
                </ul>
            </li>
            
            <li>
                <a href="jobcanceled.php">
                    <i class='fa fa-minus-square' ></i>
                    <span class="link_name">Canceled Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobcanceled.php">Canceled Job</a></li>
                </ul>
            </li>
            
            <li>
                <a href="">
                    <i class='bx bxs-report' ></i>
                    <span class="link_name">Report</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminreport.php">Admin Report</a></li>
                    <li><a class="link_name" href="report.php">Service Report</a></li>
                </ul>
            </li>
            
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out' ></i>
                    <span class="link_name">Logout</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End of Navigation Sidebar -->
    
    <section class="home-section">
        <!-- Home Button -->
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <a>
                    <button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="btn-reset" onclick="document.location='Adminhomepage.php'" ondblclick="document.location='adminjoblisting.php'">Home</button>
                </a>
            </div>
        </nav>
        <!-- End of Home Button -->
        
        <!-- Attendance Table -->
        <div class="machineList">
            <h1>Attendance</h1>
            
            <div class="addMachineBtn">
                <button style="margin-right: 50px;" class="btn-reset" onclick="document.location='attendanceadmin.php'">Refresh</button>
            </div>
            
            <div class="datalist-wrapper">
                <div class="col-lg-12" style="border: none;">
                    <table class="table table-striped sortable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Technician</th>
                                <th>Assistant</th>
                                <th>Clock In</th>
                                <th>Clock Out</th>
                                <th>Rest Out</th>
                                <th>Rest In</th>
                                <th></th>
                            </tr>
                        </thead>
                        
                        <tbody> 
                            
                            <?php
                                if($query->num_rows > 0){ $i=0;
                                    while($row = $query->fetch_assoc()){ $i++;
                            ?> 
                            
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="text-center"><?php echo $row["techupdate_date"]; ?></td>
                                <td class="text-center"><?php echo $row["tech_leader"]; ?></td>
                                <td class="text-center"><?php echo $row["username"]; ?></td>
                                <td class="text-center"><?php echo $row["tech_clockin"]; ?></td>
                                <td class="text-center"><?php echo $row["tech_clockout"]; ?></td>
                                <td class="text-center"><?php echo $row["technician_out"]; ?></td>
                                <td class="text-center"><?php echo $row["technician_in"]; ?></td>
                                <td class="align-center">
                                    <button class="updateinfo" type='button' id='btnEdit' style="width: max-content; height:35px; padding-right:20px; padding-left:20px; border-radius:7px; background-color:#006400" data-techupdate_id="<?php echo $row["techupdate_id"]; ?>">Update</button>
                                    <button class="btn-delete" style="width: max-content; height:35px; padding-right:20px; padding-left:20px; border-radius:7px; background-color:#D10000" data-id="<?php echo $row['techupdate_id']; ?>">Delete</button>
                                </td>
                            </tr> 
                            
                            <?php } } else {echo '<tr><td class="text-center" colspan="8">No records found...</td></tr>';} ?> </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End of Attendance Table -->
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('table').DataTable();
            });
        </script>

    </section>
    
    <!-- Delete Function-->
    <div id="modalConfirm" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this record?</p>
            <div class="button-group" style="display: flex; justify-content: space-between;">
                <button id="confirmDelete" type="button" style="background-color: red;">Delete</button>
                <button id="cancelDelete" type="button" style="background-color: green;">Cancel</button>
            </div>
        </div>
    </div>
    
    <script>
        var modal = document.getElementById("modalConfirm");
        var btnDelete = document.getElementsByClassName("btn-delete");
        var span = document.getElementsByClassName("close")[0];
        var btnConfirm = document.getElementById("confirmDelete");
        var btnCancel = document.getElementById("cancelDelete");
        var selectedId;
        
        for (var i = 0; i < btnDelete.length; i++) {
            btnDelete[i].onclick = function() {
                modal.style.display = "block";
                selectedId = this.getAttribute("data-id");
            }
        }
        
        span.onclick = function() { modal.style.display = "none"; }
        
        btnCancel.onclick = function() { modal.style.display = "none"; }
        
        btnConfirm.onclick = function() {
            // Make an HTTP request to the PHP script
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "attendanceadminDelete.php?techupdate_id=" + selectedId, true);
            xhttp.send();
            // Refresh the table
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    modal.style.display = "none";
                    location.reload();
                }
            };
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <!-- End of Delete Function-->
    
    <!-- Edit Function -->
    <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="MachinePopup">
            <div class="contentMachinePopup">
                <div class="title">Attendance</div>
                <div class="Machine-details">
                    <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>
                </div>
                <div class="modal-body">
                </div>
            </div>
            
            <script type='text/javascript'>
                $(document).ready(function() {
                    $('body').on('click', '.updateinfo', function() {
                        var techupdate_id = $(this).data('techupdate_id');
                        // AJAX request
                        $.ajax({
                            url: 'attendanceadminEdit.php',
                            type: 'post',
                            data: { techupdate_id: techupdate_id },
                            success: function(response) {
                                // Add response in Modal body
                                $('.modal-body').html(response);
                                // Display Modal
                                $('#empModal').modal('show');
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
    </div>
    <!-- End of Edit Function -->
    
    <!-- Script to expand sidebar  -->
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
    <!-- End of Script to expand sidebar  -->
</body>

</html>