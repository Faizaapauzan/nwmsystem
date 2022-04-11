<?php
session_start();
?>

<?php 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 
// Set some useful configuration 
$baseURL = 'searchMachine.php'; 
$limit = 10; 
 
// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM machine_list"); 
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
$query = $conn->query("SELECT * FROM machine_list ORDER BY machine_id DESC LIMIT $limit"); 
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Machine</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="layout.css" rel="stylesheet" />
    <link href="machine.css" rel="stylesheet" />
    <script src="number.js" type="text/javascript" defer></script>
    <script src="form-validation.js"></script>

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
    
    <style>

          th {
            padding: 1rem 5.1rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-size: 0.7rem;
            font-weight: 900;
            font-size: 12px;
        }

        td {
            padding: 0.2rem 5.0rem;
        }

        a {
            text-decoration: none;
            color: rgb(15, 0, 0);
        }

        .machineList {
            padding-top: 1%;
        }

        .machineList h1 {
            padding-bottom: 10px;
            padding-left: 1%;
            font-size: 30px;
            font-family: cursive;
            font-weight: 100;
        }


        .MachinePopup .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;

        }

        .MachinePopup .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #081D45);
        }

        .contentMachinePopup form .Machine-details {

            flex-wrap: wrap;
            justify-content: space-between;
            margin: 25px 20px 2px 20px;

        }

        .modal .contentMachinePopup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 550px;
            z-index: 2;
            padding: 20px;
            box-sizing: boder-box;
            margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;

        }

        .modal.active .contentMachinePopup {
            transition: all 300ms ease-in-out;
            transform: translate(-50%, -50%) scale;
        }

        .modal .close {
            right: 10px;
            top: -140px;
            width: 30px;
            height: 30px;

        }


        .updateBtn button {
            width: 100%;
            margin: 0 5px 5px 8px;
        }

        .updateBtn {
            display: flex;
            margin-left: 76%;
            margin-bottom: 5px;
            margin-top: 45px;
        }


        .Machine-descriptions {
            padding: 0.5rem;
        }

        .Machine-descriptions span {
            color: #2f456e;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .MachineUpdateDeleteBtn {
            display: flex;

        }

        .addMachineBtn button {
            width: 100%;
            margin: 0 19px 5px 19px;
            border-radius: 5px;

        }

        .addMachineBtn {
            display: flex;
            margin-left: 85%;
            margin-bottom: 5px;
            margin-top: -40px;
        }

 .search-panel {

            height: 30px;
            width: 50%;
            border-radius: 5px;
            border: none;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 1px;
            margin-left: 10px;
            margin-bottom: 30px;
            position: static;
            
        }

        .loading-overlay{
            margin-bottom: 10px;
            margin-left: 10px;
            position: static;
         
        } 
    </style>

<body>

   <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-window-alt'></i>
            <span class="logo_name">NWM System</span>
        </div>

        <ul class="nav-links">
            <li>
                <a href="jobregister.php" onclick="document.getElementById('id01').style.display='block'">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
            </li>
             <li>
                <a href="accessoriesregister.php" onclick="document.getElementById('id01').style.display='block'">
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
                    <i class="bx bxs-cog"></i>
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
                    <i class='bx bx-briefcase'></i>
                    <span class="link_name">Job Type</span>
                </a>
            </li>
            <li>
                <a href="report.php">
                    <i class='bx bxs-report'></i>
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

        <!--Add machine-->
        <div id="popupListAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add Machine</div>
                <div class="contentListAddForm">
                    <form action="machineindex.php" method="post">
                        <div class="listAddForm-details">
                            <div class="input-box">
                                <label for="MachineCode" class="details">Machine Code</label>
                                <input type="text" id="machine_code" name="machine_code" onkeyup="checkMachineCodelAvailability()" value="" class="form-control" placeholder="Enter Machine Code" required> 
                                <span id="machine_code-availability-status"></span>
                            </div>
                            <div class="input-box">
                                <label for="MachineCode" class="details">Machine Name</label>
                                <input type="text" id="machine_name" name="machine_name" placeholder="Enter Machine Name" required>
                            </div>
                            <div class="input-box">
                                <label for="MachineType" class="details">Machine Type</label>
                                <input type="text" id="MachineType" name="machine_type" placeholder="Enter Machine Type" required>
                            </div>
                            <div class="input-box">
                                <label for="MachineBrand" class="details">Machine Brand</label>
                                <input type="text" id="MachineBrand" name="machine_brand" placeholder="Enter Machine Brand" required>
                            </div>
                             <div class="input-box">
                                <label for="SerialNumber" class="details">Serial Number</label>
                                <input type="text" id="SerialNumber" name="serialnumber" placeholder="Enter Machine Serial Number" required>
                            </div>
                            <div class="input-box">
                                <label for="customerName" class="details">Customer Name</label>
                                <input type="text" id="customerName" name="customer_name" placeholder="Enter Customer Name" required>
                            </div>
                             <div class="input-box">
                                <label for="PurchaseDate" class="details">Purchase Date</label>
                                <input type="date" id="PurchaseDate" name="purchase_date" placeholder="Enter Machine Purchase Date" required>
                            </div>
                            <div class="input-box">
                                <label for="MachineDescription" class="details">Machine Description</label>
                                <input type="text" id="MachineDescription" name="machine_description" placeholder="Enter Machine Description" required>
                            </div>

                             <?php if (isset($_SESSION["username"])) ?>
                            <input type="hidden" name="machinelistcreated_by" id="machinelistcreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                            <input type="hidden" name="machinelistlastmodify_by" id="machinelistlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                        </div>


                        <div class="listAddFormbutton">
                            <input type="submit" name="submit" value="Register">
                            <input type="button" onclick="document.getElementById('popupListAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>

     <!--Machine-->
        <div class="machineList">
            <h1>Machine List</h1>
            <div class="addMachineBtn">
                <button type="button" id="btnRegister" onclick="document.getElementById('popupListAddForm').style.display='block'">Add</button>
            </div>

            <div class="search-panel">
    <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="keywords" placeholder="Type keywords..." onkeyup="searchFilter();">
        </div>
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
                <th scope="col">No</th>
                <th scope="col">Machine Name</th>
                <th scope="col">Code</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

         <tbody>
            <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row["machine_name"]; ?></td>
                    <td><?php echo $row["machine_code"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><div class='MachineUpdateDeleteBtn'>
<button data-machine_id="<?php echo $row["machine_id"]; ?>" class="userinfo" type='button' id='btnView'>View</button>
<button data-machine_id="<?php echo $row["machine_id"]; ?>" class="updateinfo" type='button' id='btnEdit'>Update</button>
<button data-machine_id="<?php echo $row["machine_id"]; ?>" class="deletebtn" type='button' id='btnDelete'>Delete</button>
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
    // var filterBy = $('#filterBy').val();
    $.ajax({
        type: 'POST',
        url: 'searchMachine.php',
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

         <!--Delete Machine -->      

          <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                 <div class="MachinePopup">
                    <div class="contentMachinePopup">
                        <div class="title">Machine</div>
                         <div class="Machine-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">    
                          
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.deletebtn').click(function() {

                                var machine_id = $(this).data('machine_id');

                                // AJAX request
                                $.ajax({
                                    url: 'deletemachine.php',
                                    type: 'post',
                                    data: {
                                        machine_id: machine_id
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
        


         <!--Update Machine -->

 <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                <div class="MachinePopup">
                    <div class="contentMachinePopup">
                        <div class="title"> Machine Info </div>
                        <div class="Machine-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">                         
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var machine_id = $(this).data('machine_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updatemachine.php',
                                    type: 'post',
                                    data: {
                                        machine_id: machine_id
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
        



        <!--Machine list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="MachinePopup">
                    <div class="contentMachinePopup">
                        <div class="title"> Machine Info </div>
                        <div class="Machine-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">

                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('machine_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxmachine.php',
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