<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Staff</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="layout.css" rel="stylesheet" />
    <script src="home.js" type="text/javascript" defer></script>
    <script src="popup.js" type="text/javascript" defer></script>
    <script src="number.js" type="text/javascript" defer></script>
    <script src="form-validation.js"></script>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <style>
        .staffPopup .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;

        }

        .staffPopup .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #081D45);
        }

        .contentStaffPopup form .staff-details {

            flex-wrap: wrap;
            justify-content: space-between;
            margin: 25px 20px 2px 20px;

        }

        .modal .contentStaffPopup {
           position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 600px;
            z-index: 2;
            padding: 20px;
            box-sizing: boder-box;
            margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;

        }

        .modal.active .contentStaffPopup {
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

        .popup-job-description {
            align-content: center;
        }

        .staff-descriptions {
            padding: 0.5rem;
        }

        .staff-descriptions span {
            color: #2f456e;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .staffRegisterBtn button {
            width: 100%;
            margin: 0 19px 5px 19px;
            border-radius: 5px;

        }

        .staffRegisterBtn {
            display: flex;
            margin-left: 85%;
            margin-bottom: 5px;
            margin-top: -40px;
        }

        #btnRegister {
            background: #2f456e;
        }

        .staffUpdateDeleteBtn {
            display: flex;
            width: 70%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .updatetech form .staff-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 30px 20px 2px 20px;
  /* width: 80%; */
}
form .staff-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
  padding: 0 15px 0 15px;
}
form .input-box label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.staff-details .input-box input,
.staff-details .input-box select {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.staff-details .input-box input:focus,
.staff-details .input-box input:valid,
.staff-details .input-box select:focus,
.staff-details .input-box select:valid {
  border-color: #081d45;
}

form .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}
form .category label {
  display: flex;
  align-items: center;
  cursor: pointer;
}

form .button {
  height: 35px;
  margin: 35px 0;
  margin-bottom: 50px;
  
}
form .button input {
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: #081d45;
  margin-bottom: 10px;
}
form .button input:hover {
  /* transform: scale(0.99); */
  opacity: 0.8;
}
form .button #cancelbtn {
  background-color: #f44336;
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

        <!--Staff Register-->
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
                                <input type="text" id="staff_phone" name="staff_phone" oninput="testInfo(document.querySelector('#staff_phone'))" placeholder="Enter Staff Phone Number" required>
                                <span style='color:red' id="out"></span>
                            </div>
                            <div class="input-box">
                                <label for="email" class="details">Email</label>
                                 <input type="email" id="staff_email" name="staff_email" oninput="ValidateEmail(staff_email)" placeholder="Enter Staff Email" required>
                                <span style='color:red' id="alert"></span>         
                            </div>
                            <div class="input-box">
                                <label for="department" class="details">Department</label>
                                <input type="text" id="department" name="staff_department" placeholder="Enter department" required>
                            </div>
                           <div class="input-box">
                                <label for="position" class="details">Position</label>
                                <select id="position" name="staff_position" required>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="technician">Technician</option>
                                    <option value="storekeeper">Storekeeper</option>
                                </select>
                            </div>
                             <div class="input-box">
                                <label for="group" class="details" style="margin-bottom: 14px;">Group</label>
                                <input type="text" id="staff_group" name="staff_group" placeholder="Enter Group" required>
                            </div>


                            <div class="input-box">
                                <label for="techGroup" class="details">Tech Group</label>
                                <input type="text" id="techGroup" name="technician_group" placeholder="Technician group">
                                <div class=TechGroup>
                                    <div class="dropdownName">
                                        <div class="select"><i class='bx bxs-down-arrow'></i></div>
                                        <div class="add"><i class='bx bxs-plus-square'></i></div>
                                    </div>
                                </div>

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

                          
                            <input type="hidden" name="staffregistercreated_by" id="staffregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                            <input type="hidden" name="staffregisterlastmodify_by" id="staffregisterlastmodify_by" value="<?php echo $_SESSION["sername"] ?>" readonly>

                        </div>

                        <div class="button">
                            <input type="submit" name="submit" value="Register">
                            <input type="button" onclick="document.getElementById('id04').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </form>
        </div>
        </div>
        </div>


        <!--Staff List-->

        <div class="staffList">
            <h1>Staff List</h1>
            <div class="staffRegisterBtn">
                <button type="button" id="btnRegister" onclick="document.getElementById('id04').style.display='block'">Register</button>
            </div>

            <?php
            include 'dbconnect.php';
            ?>

            <!-- Staff DataTales -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php
                        $sql = "SELECT * FROM staff_register";

                        $result = $conn->query($sql);
                        ?>
                        <table class="test" width="100%">


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
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $staffregister_id = $row['staffregister_id'];
                                        $username = $row['username'];
                                        $password = $row['password'];
                                        $staff_fullname = $row['staff_fullname'];
                                        $employee_id = $row['employee_id'];
                                        $staff_phone = $row['staff_phone'];
                                        $staff_email = $row['staff_email'];
                                        $staff_department = $row['staff_department'];
                                        $staff_position = $row['staff_position'];
                                        $staff_group = $row['staff_group'];
                                        $technician_group  = $row['technician_group'];
                                        $staffregistercreated_by = $row['staffregistercreated_by'];
                                        $staffregistercreated_at = $row['staffregistercreated_at'];
                                        $staffregisterlastmodify_by = $row['staffregisterlastmodify_by'];
                                        $staffregisterlastmodify_at = $row['staffregisterlastmodify_at'];

                                        echo " <tr>

<td >$staff_fullname</td>
<td>$employee_id</td>
<td>$staff_position</td>

<td>
<div class='staffUpdateDeleteBtn'>
<button data-staffregister_id='" . $staffregister_id . "' class='userinfo' type='button' id='btnView'>View</button>
<button data-staffregister_id='" . $staffregister_id . "' class='updateinfo' type='button' id='btnEdit'>Update</button>
<button data-staffregister_id='" . $staffregister_id . "' class='deletebtn' type='button' id='btnDelete'>Delete</button>
</td>
</tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

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
                                    url: 'deletestaff.php',
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

                            $('.updateinfo').click(function() {

                                var staffregister_id = $(this).data('staffregister_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updatestaff.php',
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
                                    url: 'ajaxstaff.php',
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