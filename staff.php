<?php
 session_start();
 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['staff_position']=="" ){
  header("location:index.php?error");
 }

if(!isset($_SESSION['username']))
	{	
    header("location:index.php?error");
	}

    elseif($_SESSION['staff_position']== 'Admin')
	{

	}

        elseif($_SESSION['staff_position']== 'Manager')
	{
	}

  else
	{
			header("location:index.php?error");
	}

?>

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
    <link href="css/homepage.css" rel="stylesheet" />
	<link href="css/machine.css" rel="stylesheet" />
    <link href="css/staff.css" rel="stylesheet" />
    <script src="js/home.js" type="text/javascript" defer></script>
    <script src="js/popup.js" type="text/javascript" defer></script>
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>

    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
<!-- 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/> -->
   
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
                    <a href="attendanceadmin.php">
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

    <!--Home navigation-->
    <section class="home-section">
    <nav>
                <div class="home-content">
                      <i class='bx bx-menu' ></i>
                          <a>
						<button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="btn-reset" onclick="document.location='Adminhomepage.php'" ondblclick="document.location='adminjoblisting.php'">Home</button>
                          </a>

                 </div>

    </nav>  

      <!--Add Staff -->
                         <?php
include 'dbconnect.php';

        $sql = "SELECT * FROM staff_register";
    
        $query_run = mysqli_query($conn, $sql);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

        <div id="id04" class="modal">
        <div class="staffRegister">
        <div class="title">Staff Registration</div>
        <div class="contentStaffRegister">
        <form action="staffindex.php" method="post">
        <div class="staff-details">

        <input type="hidden" id="tech_avai" name="tech_avai" value="0">

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
        <select id="department" name="staff_department">
                  <option value=""></option>
        <option value="Management">Management</option>
        <option value="Maintenance">Maintenance</option>
        <option value="Store">Store</option>
       
        </select>
        </div>

        <div class="input-box">
        <label for="position" class="details">Position</label>
        <select id="position" name="staff_position">
 <option value=""></option>
        <option value="Leader">Leader</option>
        <option value="Assistant Leader">Assistant Leader</option>
        <option value="Admin">Admin</option>
        <option value="Storekeeper">Storekeeper</option>
        <option value="Storekeeper">Manager</option>
        </select>
        </div>

        <div class="input-box">
        <label for="group" class="details">Group</label>
        <select id="staffgroup" name="staff_group">
        <option value=""></option>
        <option value="Technician">Technician</option>
        <option value="Management">Management</option>
        <option value="Storekeeper">Storekeeper</option>
        </select>
        </div>

        <div class="input-box">
        <label for="techGroup" class="details">Technician Group</label>
        <select id="techGroup" name="technician_group">
        <option value=""></option>
        <option value="1st Leader">1st Leader</option>
        <option value="2nd Leader">2nd Leader</option>
        <option value="Assistant Leader">Assistant Leader</option>
        </select>
        </div> 

        <div class="input-box">
        <label for="techGroup" class="details">Technician Rank</label>
        <select id="techGroup" name="technician_rank">
        <option value=""></option>
        <option value="1st Leader">1st Leader</option>
        <option value="2nd Leader">2nd Leader</option>
        <option value="Assistant Leader">Assistant Leader</option>
        </select>
        </div> 

        <div class="input-box">
        <label for="username" class="details">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required>
        </div>

        <div class="input-box">
        <label for="password" class="details">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required>
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
        <td style="text-align: center;"><?php echo $i; ?></td>
        <td><?php echo $row["staff_fullname"]; ?></td>
        <td style="text-align: center;"><?php echo $row["employee_id"]; ?></td>
        <td style="text-align: center;"><?php echo $row["staff_position"]; ?></td>
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

         

</div>
</div>

                    </script>
    </section>

  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

</body>

</html>