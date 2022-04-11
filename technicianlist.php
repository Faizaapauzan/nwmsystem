<?php
session_start();

?>

<?php 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 
// Set some useful configuration 
$baseURL = 'searchTechnician.php'; 
$limit = 10; 
 
// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM staff_register WHERE (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')"); 
$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 
    'baseURL' => $baseURL, 
    'totalRows' => $rowCount, 
    'perPage' => $limit, 
    'contentDiv' => 'dataContainer', 
    'link_func' => 'searchFilter' 
); 
$pagination =  new Pagination($pagConfig); 
 
// Fetch records based on the limit 
$query = $conn->query("SELECT * FROM staff_register WHERE (technician_rank = '1st Leader' OR technician_rank = '2nd Leader') ORDER BY staffregister_id ASC LIMIT $limit"); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Technician</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/technicianlist.css" rel="stylesheet" />
    <script src="js/home.js" type="text/javascript" defer></script>
    <script src="js/popup.js" type="text/javascript" defer></script>
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

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


        <!--Staff List-->

        <div class="technicianList">
            <h1>Technician List</h1>
            <div class="staffRegisterBtn">
                 <!-- <select class="form-control" id="filterBy" onchange="searchFilter();">
                <option value="">Filter by Rank</option>
                <option value="technician_rank">Leader</option>
                <option value="technician_rank">Assistant Leader</option>
              
            </select> -->
                <!-- <button type="button" id="btnRegister" onclick="document.getElementById('id04').style.display='block'">Register</button> -->
            </div>

            <div class="search-panel">
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="keywords" placeholder="Type keywords..." onkeyup="searchFilter();">
        </div>
        <!-- <div class="form-group col-md-4">
           
        </div> -->
    </div>
</div>

            <div class="datalist-wrapper">
    <!-- Loading overlay -->
    <div class="loading-overlay"><div class="overlay-content">Loading...</div></div>
              
            <!-- Customer DataTales -->
             <div id="dataContainer">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Rank</th>
                <th>Ability</th>
                <th>Action</th>
            </tr>
        </thead>

         <tbody>
            <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row["staff_fullname"]; ?></td>
                    <td><?php echo $row["technician_rank"]; ?></td>
                    <td><?php echo $row["job_ability"]; ?></td>
                    <td><div class='staffUpdateDeleteBtn'>
<button data-staffregister_id="<?php echo $row['staffregister_id'];?>" class='userinfo' type='button' id='btnView'>View</button>
<button data-staffregister_id="<?php echo $row['staffregister_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
<button data-staffregister_id="<?php echo $row['staffregister_id'];?>" class='deletebtn' type='button' id='btnDelete'>Delete</button>
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
        <br/>
        <br/>

                <!-- Display pagination links -->
        <?php echo $pagination->createLinks(); ?>
    </div>
</div>

<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var filterBy = $('#filterBy').val();
    $.ajax({
        type: 'POST',
        url: 'searchTechnician.php',
        // data:'page='+page_num+'&keywords='+keywords,
         data:'page='+page_num+'&keywords='+keywords+'&filterBy='+filterBy,
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            $('.loading-overlay').fadeOut("slow");
        }
    });
}
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
                        <br />
                        <div class="modal-body">    
                          
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.deletebtn').click(function() {

                                var staffregister_id = $(this).data('staffregister_id');

                                // AJAX request
                                $.ajax({
                                    url: 'deletetechnician.php',
                                    type: 'post',
                                    data: {
                                        staffregister_id: staffregister_id
                                    },
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
                        <div class="title"> Technician </div>
                        <div class="staff-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

                        </div>
                        <br />
                        <div class="modal-body">                         
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var staffregister_id = $(this).data('staffregister_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updatetechnician.php',
                                    type: 'post',
                                    data: {
                                        staffregister_id: staffregister_id
                                    },
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
                        <br />
                        <div class="modal-body">

                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('staffregister_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxtechnicianlist.php',
                                    type: 'post',
                                    data: {
                                        userid: userid
                                    },
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
    </section>

    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");

        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebar.classList.replace("bx-menu", "bx-menu-alt-right")
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>
</html>