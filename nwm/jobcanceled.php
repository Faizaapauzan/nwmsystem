<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Canceled Job</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="layout.css" rel="stylesheet" />
    <script src="form-validation.js"></script>  
    <!-- Script -->
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
        .jobTypeList th {
            padding: 1rem 5.1rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            font-size: 0.7rem;
            font-weight: 900;
            font-size: 12px;
        }

        .jobTypeList td {
            padding: 0.2rem 5.0rem;
        }

        .jobTypeList {
            padding-top: 1%;
        }

        .jobTypeList h1 {
            padding-bottom: 10px;
            padding-left: 1%;
            font-size: 30px;
            font-family: cursive;
            font-weight: 100;
        }

        .jobTypePopup .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;

        }

        .jobTypePopup .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #081D45);
        }

        .contentjobTypePopup form .jobType-details {

            flex-wrap: wrap;
            justify-content: space-between;
            margin: 25px 20px 2px 20px;

        }

        .modal .contentjobTypePopup {
             position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 450px;
            z-index: 2;
            padding: 20px;
            box-sizing: boder-box;
            margin: 2% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;

        }

        .modal.active .contentjobTypePopup {
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


        .jobType-descriptions {
            padding: 0.5rem;
        }

        .jobType-descriptions span {
            color: #2f456e;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .jobTypeUpdateDeleteBtn {
            display: flex;

        }

        .addJobTypeBtn button {
            width: 100%;
            margin: 0 19px 5px 19px;
            border-radius: 5px;

        }

        .addJobTypeBtn {
            display: flex;
            margin-left: 85%;
            margin-bottom: 5px;
            margin-top: -40px;
        }

        #auto {
            counter-reset: rowNumber;
        }

        #auto tr>td:first-child {
            counter-increment: rowNumber;
        }

        #auto tr td:first-child::before {
            content: counter(rowNumber);
            min-width: 1em;
            margin-right: 0.5em;
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

        <!--Job Type-->

        <div class="jobTypeList">
            <h1>Canceled Job List</h1>

            <?php
            include 'dbconnect.php';
            ?>

            <!-- Jobtype DataTales -->

            <?php
            $sql = "SELECT * FROM job_register WHERE (job_assign = 'Cancel')";

            $result = $conn->query($sql);
            ?>


            <table id='auto' width="100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Job Order Number</th>
                        <th>Customer Name</th>
                        <th>Requested Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $jobregister_id = $row['jobregister_id'];
                            $job_order_number = $row['job_order_number'];
                            $customer_name = $row['customer_name'];
                            $requested_date = $row['requested_date'];
                            $jobregistercreated_by = $row['jobregistercreated_by'];
                            $jobregistercreated_at = $row['jobregistercreated_at'];
                            $jobregisterlastmodify_by = $row['jobregisterlastmodify_by'];
                            $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];

                            echo  "<tr>                            
<td></td>
<td>$job_order_number</td>
<td>$customer_name</td>
<td>$requested_date</td>
<td>
<div class=jobTypeUpdateDeleteBtn>
<button data-jobregister_id='" . $jobregister_id . "' class='userinfo' type='button' id='btnView'>View</button>
<button data-jobregister_id='" . $jobregister_id . "' class='updateinfo' type='button' id='btnEdit'>Update</button>

</td>
</div>

</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>

<!--Update JobType -->

 <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

               <div class="jobTypePopup">
                    <div class="contentjobTypePopup">
                        <div class="title">Canceled Job</div>
                        <div class="jobType-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">    
                             <h5>Canceled Job Update</h5>                       
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var jobregister_id = $(this).data('jobregister_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updatejobcancel.php',
                                    type: 'post',
                                    data: {
                                        jobregister_id: jobregister_id
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
        



        <!--Job Type list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="jobTypePopup">
                    <div class="contentjobTypePopup">
                        <div class="title">Canceled Job</div>
                        <div class="jobType-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        
                        <div class="modal-body">
                        <h5>Canceled Job Info</h5>  
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('jobregister_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxjobcanceled.php',
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