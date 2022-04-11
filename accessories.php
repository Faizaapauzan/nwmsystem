<?php
session_start(); ?>

<?php 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 
// Set some useful configuration 
$baseURL = 'searchAccessories.php'; 
$limit = 10; 
 
// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM accessories_list"); 
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
$query = $conn->query("SELECT * FROM accessories_list ORDER BY accessories_id ASC LIMIT $limit"); 
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Accessories</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/accessories.css" rel="stylesheet" />
     <!-- <link href="machine.css" rel="stylesheet" /> -->
    <script src="js/number.js" type="text/javascript" defer></script>
   
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<style>

    .modal .contentAccessoriesPopup {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  width: auto;
  z-index: 2;
  padding: 20px;
  box-sizing: boder-box;
  margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
}

    </style>
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

        <!--Add register-->
        <div id="popupListAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add Accessories</div>
                <div class="contentListAddForm">
                    <form action="accessoriesindex.php" method="post" enctype="multipart/form-data">
                        <div class="listAddForm-details">
                        <div class="input-box">
                                <label for="AccessoriesCode" class="details">Accessories Code</label>
                                <input type="text" id="accessories_code" name="accessories_code" onkeyup="checkAccessoriesCodelAvailability()" value="" class="form-control" placeholder="Enter Accessories Code" required> 
                                <span style='color:red' id="accessories_code-availability-status"></span>
                            </div>
                            <div class="input-box">
                                <label for="AccessoriesName" class="details">Accessories Name</label>
                                <input type="text" id="accessories_name" name="accessories_name" placeholder="Enter Accessories Name" required>
                            </div>
                            <div class="input-box">
                                <label for="AccessoriesBrand" class="details">Accessories Brand</label>
                                <input type="text" id="accessories_brand" name="accessories_brand" placeholder="Enter Accessories Brand" required>
                            </div>
                            <div class="input-box">
                                <label for="customerGrade" class="details">Accessories Description</label>
                                <input type="text" id="accessories_description" name="accessories_description" placeholder="Enter Customer Description" required>
                            </div>
                            <div class="photoBox">
                                <label for="file_name" class="details">Photo</label>
                                <input type="file" id="image_input" name="files[]" multiple>
                                <div id="display_image"></div>
                            </div>

                              <?php if (isset($_SESSION["username"])) ?>
                            <input type="hidden" name="accessorieslistcreated_by" id="accessorieslistcreatedby" value="<?php echo $_SESSION["username"] ?>" readonly>
                             <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodifyby" value="<?php echo $_SESSION["username"] ?>" readonly>
                            </div>

                        <div class="listAddFormbutton">
                            <input type="submit" name="submit" value="Register">
                            <input type="button" onclick="document.getElementById('popupListAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                        </form>
                </div>
            </div>
        </div>


        <!--Accessories-->

         <div class="accessoriesList">
            <h1>Accessories List</h1>
            <div class="addAccessoriesBtn">
                <button type="button" id="btnRegister" onclick="document.getElementById('popupListAddForm').style.display='block'">Add</button>
                 <button class="btn-reset" onclick="document.location='accessories.php'">Refresh</button>
            </div>



    <div class="search-panel">
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="keywords" placeholder="Type keywords..." onkeyup="searchFilter();">
        </div>
            <!-- <div class="form-group col-md-6">
             <button class="btn-reset" onclick="document.location='report.php'">Refresh</button>
        </div>
         -->
        <!-- <div class="form-group col-md-4">
            <select class="form-control" id="filterBy" onchange="searchFilter();">
                <option value="">Filter by Status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
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
                <th>Code</th>
                <th>Brand</th>
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
                    <td><?php echo $row["accessories_name"]; ?></td>
                    <td><?php echo $row["accessories_code"]; ?></td>
                    <td><?php echo $row["accessories_brand"]; ?></td>
                    <td><div class='accessoriesUpdateDeleteBtn'>
<button data-accessories_id="<?php echo $row['accessories_id'];?>" class='userinfo' type='button' id='btnView'>View</button>
<button data-accessories_id="<?php echo $row['accessories_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
<button data-accessories_id="<?php echo $row['accessories_id'];?>" class='deletebtn' type='button' id='btnDelete'>Delete</button>
</div>
</td>
                    
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
    // var filterBy = $('#filterBy').val();
    $.ajax({
        type: 'POST',
        url: 'searchAccessories.php',
        data:'page='+page_num+'&keywords='+keywords,
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

        <!--Delete Accesssories -->      

          <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

               <div class="accessoriesPopup">
                    <div class="contentAccessoriesPopup">
                        <div class="title">Accessories</div>
                        <div class="accessories-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">    
                          
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.deletebtn').click(function() {

                                var accessories_id = $(this).data('accessories_id');

                                // AJAX request
                                $.ajax({
                                    url: 'deleteaccessories.php',
                                    type: 'post',
                                    data: {
                                        accessories_id: accessories_id
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
        

          <!--Update Customer -->

 <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                <div class="accessoriesPopup">
                    <div class="contentAccessoriesPopup">
                        <div class="title"> Accessories Info</div>
                        <div class="accessories-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">                         
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var accessories_id = $(this).data('accessories_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updateaccessories.php',
                                    type: 'post',
                                    data: {
                                        accessories_id: accessories_id
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
        

        <!--Accessories list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="accessoriesPopup">
                    <div class="contentAccessoriesPopup">
                        <div class="title"> Accessories Info </div>
                        <div class="accessories-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">

                        </div>

                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('accessories_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxaccessories.php',
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
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id03');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id04');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

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

<script src="js/upload photo.js"></script>
<script src="js/form-validation.js"></script>

</body>

</html>