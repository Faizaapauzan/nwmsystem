<?php
session_start(); ?>

<?php 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 

// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM staff_register"); 
$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 
 
    'totalRows' => $rowCount, 
  
); 
$pagination =  new Pagination($pagConfig); 
 
// Fetch records based on the limit 
$query = $conn->query("SELECT * FROM staff_register ORDER BY staffregister_id ASC"); 
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Staff</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/staff.css" rel="stylesheet" />
    <script src="js/home.js" type="text/javascript" defer></script>
    <script src="js/popup.js" type="text/javascript" defer></script>
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
   
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>


<body>

<div class="sidebar">
    <div class="logo-details">
    <i class='bx bx-window-alt'></i>
    <span class="logo_name">NWM System</span>
</div>
</a>
        
        <ul class="nav-links">
               <li>
                <a href="jobregister.php">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
                </li>

             <li>
                <a href="accessoriesregister.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="link_name">Job Accessories</span>
                </a>
            </li>
           
            <li>
                <a href="staff.php">
                    <i class="bx bxs-id-card"></i>
                    <span class="link_name">Staff</span>
                </a>
            </li>

            <li>
                <a href="technicianlist.php">
                    <i class="fa fa-users"></i>
                    <span class="link_name">Technician</span>
                </a>
            </li>

            <li>
                <a href="customer.php">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Customers</span>
                </a>
            </li>

            <li>
                <a href="machine.php">
                    <i class="bx bxl-medium-square"></i>
                    <span class="link_name">Machine</span>
                </a>
            </li>

            <li>
                <a href="accessories.php">
                    <i class="bx bx-wrench"></i>
                    <span class="link_name">Accessories</span>
                </a>
            </li>

            <li>
                <a href="jobtype.php">
                    <i class="bx bx-briefcase"></i>
                    <span class="link_name">Job Type</span>
                </a>
            </li>

            <li>
                <a href="jobcompleted.php">
                    <i class="fa fa-check-square-o"></i>
                    <span class="link_name">Completed Job</span>
                </a>
            </li>


            <li>
                <a href="jobcanceled.php">
                    <i class="fa fa-minus-square"></i>
                    <span class="link_name">Canceled Job</span>
                </a>
            </li>

            <li>
                <a href="report.php">
                    <i class='bx bxs-report' ></i>
                    <span class="link_name">Report</span>
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
            </li>
            
        </ul>
    </div>

    <!--Home navigation-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <a href="Adminhomepage.php">
                    <span class="dashboard">Home</span>
            </div>
            <div class="notification-button">
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                </a>
            </div>
        </nav>

      <!--Add Staff -->
                         <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

        $sql = "SELECT * FROM staff_register";
    
        $query_run = mysqli_query($connection, $sql);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

        <div id="id04" class="modal">
        <div class="staffRegister">
        <div class="title">Staff Registration</div>
        <div class="contentStaffRegister">
        <form action="staffindex.php" method="post">
        <div class="staff-details">

        <div class="input-box">
        <label for="fname" class="details">Full Name</label>
        <input type="text" id="fname" name="staff_fullname" placeholder="Enter staff name" required>
        </div>

        <div class="input-box">
        <label for="employee_id" class="details">Employee ID</label>
        <input type="text" id="employee_id" name="employee_id" oninput="EmployeeIDlAvailability()" value="" class="form-control" placeholder="Enter Employee ID" required> 
        <span style='color:red' id="employeeID-availability-status"></span>
        </div>

        <div class="input-box">
        <label for="pNumber" class="details">Phone Number</label>
        <input type="text" id="staff_phone" name="staff_phone" placeholder="Enter Staff Phone Number" required>  
        </div>

        <div class="input-box">
        <label for="email" class="details">Email</label>
        <input type="email" id="staff_email" name="staff_email" oninput="ValidateEmail(staff_email)" placeholder="Enter Staff Email" required>
        <span style='color:red' id="alert"></span>         
        </div>

        <div class="input-box">
        <label for="department" class="details">Department</label>
        <input type="text" id="department" name="staff_department" placeholder="Enter department">
        </div>

        <div class="input-box">
        <label for="position" class="details">Position</label>
        <select id="position" name="staff_position" required>
        <option value=""></option>
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <option value="Technician">Technician</option>
        <option value="Storekeeper">Storekeeper</option>
        </select>
        </div>

        <div class="input-box">
        <label for="group" class="details">Group</label>
        <select id="staffgroup" name="staff_group">
        <option value='' <?php if ($row['staff_group'] == '') { echo "SELECTED"; } ?>></option>
        <option value="Service" <?php if ($row['staff_group'] == "Service") { echo "SELECTED"; } ?>>Service</option>
        <option value="Management" <?php if ($row['staff_group'] == "Management") { echo "SELECTED"; } ?>>Management</option>
        <option value="Storekeeper" <?php if ($row['staff_group'] == "Storekeeper") { echo "SELECTED"; } ?>>Storekeeper</option>
        </select>
        </div>

        <div class="input-box">
        <label for="techGroup" class="details">Technician Group</label>
        <select id="techGroup" name="technician_rank">
        <option value='' <?php if ($row['technician_rank'] == '') { echo "SELECTED"; } ?>></option>
        <option value="1st Leader" <?php if ($row['technician_rank'] == "1st Leader") { echo "SELECTED"; } ?>>1st Leader</option>
        <option value="2nd Leader" <?php if ($row['technician_rank'] == "2nd Leader") { echo "SELECTED";} ?>>2nd Leader</option>
        <option value="Assistant Leader" <?php if ($row['technician_rank'] == "Assistant Leader") { echo "SELECTED"; } ?>>Assistant Leader</option>
        </select>
        </div> 

        <div class="input-box">
        <label for="username" class="details">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>

        <div class="input-box">
        <label for="password" class="details">Password</label>
        <input type="password" id="password" name="password" oninput="validatepassword()" value="" class="form-control" placeholder="Enter Password" required>
        <span style='color:red' id="message1"></span>  
        </div>

        <?php if (isset($_SESSION["username"])) ?>
        <input type="hidden" name="staffregistercreated_by" id="staffregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        <input type="hidden" name="staffregisterlastmodify_by" id="staffregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        </div>

        <div class="button">
        <input type="submit" name="submit" value="Register">
        <input type="button" onclick="document.getElementById('id04').style.display='none'" value="Cancel" id="cancelbtn">
        </div>
        </form>
        </div>
        </div>
        </div>

                      
         <?php
        }
    }
    ?>
   
         <!--Staff List-->

        <div class="staffList">
        <h1>Staff List</h1>
        <div class="staffRegisterBtn">
        <button type="button" id="btnRegister" onclick="document.getElementById('id04').style.display='block'">Register</button>
        <button class="btn-reset" onclick="document.location='staff.php'">Refresh</button>
        </div>

        <div class="datalist-wrapper">    
        <div class="col-lg-12" style="border: none;">

    <table class="table table-striped sortable">
    <thead>
    <tr>
    <th>No</th>
    <th>Full Name</th>
    <th>Employee ID</th>
    <th>Position</th>
    <th>Action</th>
    </tr>
    </thead>

    <tbody>
    <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
     
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row["staff_fullname"]; ?></td>
        <td><?php echo $row["employee_id"]; ?></td>
        <td><?php echo $row["staff_position"]; ?></td>
        <td><div class='staffUpdateDeleteBtn'>
<button data-staffregister_id="<?php echo $row["staffregister_id"]; ?>" class='userinfo' id='btnView'>View</button>
<button data-staffregister_id="<?php echo $row["staffregister_id"];?>" class='updateinfo' id='btnEdit'>Update</button>
<button data-staffregister_id="<?php echo $row["staffregister_id"];?>" class='deletebtn' id='btnDelete'>Delete</button>
</div></td>
       

    </tr>
        <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
        </tbody>
        </table>
		

    </div>
    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function(){
    $('table').DataTable();

    });

</script>

       <!--Delete Staff -->      

        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->

        <div class="staffPopup">
        <div class="contentStaffPopup">
        <div class="title">Staff</div>
        <div class="staff-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>              
        <div class="modal-body">    
                          
        </div>
        </div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.deletebtn',function(){ 
            var staffregister_id = $(this).data('staffregister_id');

            // AJAX request
            $.ajax({
                url: 'deletestaff.php',
                type: 'post',
                data: { staffregister_id: staffregister_id },
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

         <!--Update staff -->

        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->

        <div class="staffPopup">
        <div class="contentStaffPopup">
        <div class="title"> Staff Info </div>
        <div class="staff-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <div class="modal-body">                         
        </div>
        </div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.updateinfo',function(){ 
            var staffregister_id = $(this).data('staffregister_id');

            // AJAX request
            $.ajax({
                url: 'updatestaff.php',
                type: 'post',
                data: { staffregister_id: staffregister_id },
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
        
        <!--Staff list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="staffPopup">
        <div class="contentStaffPopup">
        <div class="title"> Staff Info </div>
        <div class="staff-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>            
        <div class="modal-body">

        </div>
        </div>
                    
        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.userinfo',function(){
            var userid = $(this).data('staffregister_id');

            // AJAX request
            $.ajax({
                url: 'ajaxstaff.php',
                type: 'post',
                data: { userid: userid },
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

         
<script>
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function(){
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
        sidebar.classList.replace("bx-menu","bx-menu-alt-right")
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right","bx-menu");
}
</script>

</div>
</div>


</body>

</html>