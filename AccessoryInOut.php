<?php
session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['staff_position'] == "") {
    header("location:index.php?error");
}

if (!isset($_SESSION['username'])) {
    header("location:index.php?error");
} elseif ($_SESSION['staff_position'] == 'Admin') {
} elseif ($_SESSION['staff_position'] == 'Manager') {
} else {
    header("location:index.php?error");
}

?>

<?php
// Include pagination library file 
include_once 'Pagination.class.php';

// Include database configuration file 
require_once 'dbconnect.php';


// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM accessories_inout");
$result  = $query->fetch_assoc();
$rowCount = $result['rowNum'];

// Initialize pagination class 
$pagConfig = array(

    'totalRows' => $rowCount,

);
$pagination =  new Pagination($pagConfig);

// Fetch records based on the limit 
$query = $conn->query("SELECT * FROM accessories_inout ORDER BY CreatedTime_inout DESC LIMIT 50");
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Accessories In Out</title>
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    <link href="css/homepage.css" rel="stylesheet" />
    <link href="css/machine.css" rel="stylesheet" />
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>
    <link href="css/customer.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap"
        rel="stylesheet">

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
</style>

<body>

    <!-- Navigation Sidebar -->
    <div class="sidebar close">
        <div class="logo-details">
            <img src="neo.png" height="65" width="75"></img>
            <span class="logo_name">NWM SYSTEM</span>
        </div>

        <div class="welcome" style="color: white; text-align: center; font-size:small;">Hi
            <?php echo $_SESSION["username"] ?>!</div>

        <ul class="nav-links">
            <li>
                <a href="jobregister.php">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobregister.php">Register Job</a></li>
                </ul>
            </li>

            <li>
                <a href="attendanceadmin.php">
                    <i class='bx bxs-report'></i>
                    <span class="link_name">Attendance</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="attendanceadmin.php">Attendance</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="staff.php">
                        <i class='bx bx-id-card'></i>
                        <span class="link_name">Staff</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="staff.php">Staff</a></li>
                </ul>
            </li>

            <li>
                <a href="technicianlist.php">
                    <i class='fa fa-users'></i>
                    <span class="link_name">Technician</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="technicianlist.php">Technician</a></li>
                </ul>
            </li>

            <li>
                <a href="customer.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Customers</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="customer.php">Customers</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                    <a href="machine.php">
                        <i class='fa fa-medium'></i>
                        <span class="link_name">Machine</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="machine.php">Machine</a></li>
                </ul>
            </li>

            <li>
                <a href="accessories.php">
                    <i class='bx bx-wrench'></i>
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
                    <i class='fa fa-check-square-o'></i>
                    <span class="link_name">Completed Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobcompleted.php">Compeleted Job</a></li>
                </ul>
            </li>

            <li>
                <a href="jobcanceled.php">
                    <i class='fa fa-minus-square'></i>
                    <span class="link_name">Canceled Job</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="jobcanceled.php">Canceled Job</a></li>
                </ul>
            </li>

            <li>
                <a href="adminreport.php">
                    <i class='bx bxs-report'></i>
                    <span class="link_name">Report</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminreport.php">Admin Report</a></li>
                </ul>
            </li>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
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
                <i class='bx bx-menu'></i>
                <a>
                    <button
                        style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;"
                        class="btn-reset" onclick="document.location='Adminhomepage.php'"
                        ondblclick="document.location='adminjoblisting.php'">Home</button>
                </a>

            </div>

        </nav>

        <!-- Add Entry -->
        <div id="popupListAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add New Entry</div>
                <div class="contentListAddForm">
                    <form action="inoutindex.php" method="post">
                        <div class="listAddForm-details">

                            <div class="input-box">
                                <label for="customerCode" class="details">Item</label>
                                <select name="accessoriesname" id="AddAccessory" class="form-control">
                                    <option value="">-- Select Accessory --</option>
                                    <?php
                                    include "dbconnect.php";

                                    $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessories_name ASC");

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['accessories_name'] . "'>" . $data['accessories_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $("#AddAccessory").select2({
                                    placeholder: "-- Select Accessory --",
                                    allowClear: true
                                });
                            });
                            </script>

                            <div class="input-box">
                                <label for="customerName" class="details">Technician</label>
                                <select name="techname" id="Addtechnician" class="form-control">
                                    <option value="">-- Select Technician --</option>
                                    <?php
                                    include "dbconnect.php";

                                    $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE tech_avai = '0' 
                                                                                    AND (technician_rank = '1st Leader' OR technician_rank = '2nd Leader')
                                                                                    ORDER BY username ASC");

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option value='" . $data['username'] . "'>" . $data['username'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $("#Addtechnician").select2({
                                    placeholder: "-- Select Technician --",
                                    allowClear: true
                                });
                            });
                            </script>

                            <div class="input-box">
                                <label for="address" class="details">In Out Date</label>
                                <div style="display: flex; align-items: center;">
                                    <input style="height:35px;" type="text" id="out_date" name="out_date" class="form-control" />
                                    <input type="button" class="btn btn-primary"
                                        style="height:35px; background-color: #081d45; border:none; width:20%;"
                                        onclick="ItemOutDateTime(event)" value="Click"/>
                                </div>

                                <script type="text/javascript">
                                function ItemOutDateTime(event) {
                                    event.preventDefault();
                                    fetch("departureTime.php").then(response => response.text()).then(result => {
                                        document.getElementById("out_date").value = result;
                                    });
                                }
                                </script>
                            </div>

                            <div class="input-box">
                                <label for="customerGrade" class="details">Quantity</label>
                                <input style="height:35px;" type="number" name="quantity" class="form-control" />
                            </div>
                        </div>

                        <div class="listAddFormbutton">
                            <input type="submit" id="submit" name="submit" value="Save">
                            <input type="button"
                                onclick="document.getElementById('popupListAddForm').style.display='none'"
                                value="Cancel" id="cancelbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--In Out-->
        <div class="customerList">
            <h1>Accessory In Out Stock Record</h1>

            <div class="addCustomerBtn">
                <button id="btnRegister" style="float: inline-end;" onclick="document.getElementById('popupListAddForm').style.display='block'">Add</button>
                <button class="btn-reset float-end mx-2" onclick="document.location='AccessoryInOut.php'">Refresh</button>
            </div>

            <div class="datalist-wrapper">
                <div class="col-lg-12" style="border: none;">

                    <table class="table table-striped sortable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Technician</th>
                                <th>Item</th>
                                <th>Out Date</th>
                                <th>Quantity</th>
                                <th>Remaining</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($query->num_rows > 0) {
                                $i = 0;
                                while ($row = $query->fetch_assoc()) {
                                    $i++;
                            ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["techname"]; ?></td>
                                <td><?php echo $row["accessoriesname"]; ?></td>
                                <td style="white-space: nowrap;"><?php echo $row["out_date"]; ?></td>
                                <td><?php echo $row["quantity"]; ?></td>
                                <td><?php echo $row["balance"]; ?></td>
                                <td><button type="button" value="<?php echo $row['inout_id']; ?>" id="RemarkButton"
                                        class="RemarkBtn btn btn-warning btn-sm">Remark</button></td>
                                <td style="padding:0px;display:flex; margin-top:7px;">
                                    <button data-inout_id="<?php echo $row['inout_id']; ?>" class='inoutinfo'
                                        type='button' id='btnView'>View</button>
                                    <button data-inout_id="<?php echo $row['inout_id']; ?>" class='updateinfo'
                                        type='button' id='btnEdit'>Update</button>
                                    <button data-inout_id="<?php echo $row['inout_id']; ?>" class='deletebtn'
                                        type='button' id='btnDelete'>Delete</button>
                                </td>

                            </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="6">No records found...</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable();

        });
        </script>

        <script>
            $(document).on('click', '.RemarkBtn', function () {
            var entry_idRemark = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?entry_idRemark=" + entry_idRemark,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    
                    if (res.status == 404) {
                        alert(res.message);
                    } 
                    
                    else if (res.status == 200) {
                        
                        var remarks = res.data;
                        
                        $('#remarkContainer').empty();
                        
                        remarks.forEach(function (remark) {
                            
                            var inputGroup = '<div class="mb-3">' +
                                                '<div class="row">' +
                                                    '<div class="col-sm">'+
                                                        '<label for="Remark">Remark</label>' +
                                                        '<input type="text" value="' + remark.remark_note + '" style="background:none;" class="form-control" Readonly></input>'+
                                                    '</div>' +
                                                    
                                                    '<div class="col-sm" style="text-align:center;">'+
                                                        '<label for="Date">Date</label>' +
                                                        '<input type="text" value="' + remark.remark_date + '" style="text-align:center; background:none;" class="form-control" Readonly></input>'+
                                                    '</div>' +
                                                    
                                                    '<div class="col-sm-3" style="text-align:center;">'+
                                                        '<label for="Quantity">Quantity</label>' +
                                                        '<input type="text" value="' + remark.remark_quantity + '" style="text-align:center; background:none;" class="form-control" Readonly></input>'+
                                                    '</div>' +
                                                '</div>'
                                              '</div>';
                            
                                             $('#remarkContainer').append(inputGroup);
                        });
                        
                        $('#RemarkViewModal').modal('show');
                    }
                }
            });
        });
        </script>

        <!--Delete record -->

        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->

                <div class="customerPopup">
                    <div class="contentCustomerPopup">
                        <div class="title">In Out Record</div>
                        <div class="Machine-details">
                            <div class="close" data-dismiss="modal"
                                onclick="document.getElementById('popup-1').style.display='none'">&times</div>

                        </div>
                        <br />
                        <div class="modal-body"></div>

                    </div>

                    <script type='text/javascript'>
                    $(document).ready(function() {
                        $('body').on('click', '.deletebtn', function() {
                            var entry_id = $(this).data('inout_id');

                            // AJAX request
                            $.ajax({
                                url: 'deleteinout.php',
                                type: 'post',
                                data: {
                                    'entry_id': entry_id
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


                    <!--Update record -->

                    <div class="modal fade" id="empModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="InfoPopup">
                                <div class="contentInfoPopup">
                                    <div class="title"> In Out Record Info </div>
                                    <div class="Machine-details">
                                        <div class="close" data-dismiss="modal"
                                            onclick="document.getElementById('popup-1').style.display='none'">&times
                                        </div>


                                    </div><br />
                                    <div class="modal-body">
                                    </div>
                                </div>

                                <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('body').on('click', '.updateinfo', function() {
                                        var entry_id = $(this).data('inout_id');

                                        // AJAX request
                                        $.ajax({
                                            url: 'updateinout.php',
                                            type: 'POST',
                                            data: {
                                                'entry_id': entry_id
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

                                <!--In Out Record pop up form-->
                                <!-- Modal -->
                                <div class="modal fade" id="empModal" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="customerPopup">
                                            <div class="contentCustomerPopup">
                                                <div class="title"> In Out Record Info </div>
                                                <div class="Machine-details">
                                                    <div class="close" data-dismiss="modal"
                                                        onclick="document.getElementById('popup-1').style.display='none'">
                                                        &times</div>

                                                </div>
                                                <br />
                                                <div class="modal-body">
                                                </div>
                                            </div>

                                            <script type='text/javascript'>
                                            $(document).ready(function() {
                                                $('body').on('click', '.inoutinfo', function() {
                                                    var entry_id = $(this).data('inout_id');

                                                    // AJAX request
                                                    $.ajax({
                                                        url: 'ajaxinout.php',
                                                        type: 'post',
                                                        data: {
                                                            'entry_id': entry_id
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




                                        </div>
                                    </div>


    </section>
    <section>

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
</body>

</html>