<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Technician Update</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="css/NeoSauKeong.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    </head>

    <body>
        <!--========== Header ==========-->
        <header class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <a class="nav-link m-3" href="NeoSauKeongAttendance.php"><i class="iconify" data-icon="mdi:table-clock" style="font-size:220%; color: #081d45;"></i></a>
            </div>

            <div style="margin-top: 25px;">
                <h6>Hi! Neo Sau Keong</h6>
            </div>
        
            <div class="d-flex justify-content-end">
                <a class="nav-link m-3" href="logout.php"><i class="iconify" data-icon="heroicons-outline:logout" style="font-size:220%; color: #081d45;"></i></a>
            </div>
        </header>

        <!--========== Content ==========-->
        <div class="container p-3" style="margin-bottom: 70px;">
            <form method="GET" id="getRecord">
                <!-- Search function -->
                <input type="text" name="DateAssign" id="myInput" class="form-control text-center mb-3" autocomplete="off" readonly onchange="changeRecord();">

                <script>
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    var formattedDay = (day < 10) ? '0' + day : day;
                    var formattedMonth = (month < 10) ? '0' + month : month;
                    var formattedDate = formattedDay + "-" + formattedMonth + "-" + year;
                    var pattern = /DateAssign=[0-9]{2}-[0-9]{2}-[0-9]{4}/;
                
                    $(document).ready(function() {
                        $("#myInput").datepicker();
                        $("#myInput").datepicker("option", "dateFormat", "dd-mm-yy");
                    
                        var urlParams = new URLSearchParams(window.location.search);
                        var dateFromUrl = urlParams.get('DateAssign');
                    
                        if (!pattern.test(document.URL)) {
                            $("#myInput").datepicker("setDate", new Date());
                            document.getElementById("getRecord").submit();
                        }
                    
                        else {
                            $("#myInput").datepicker("setDate", dateFromUrl);
                        }
                    });
                
                    function changeRecord() {
                        document.getElementById("getRecord").submit();
                    }
                </script>
                
                <div id="no-table">
                    <div class="Box card mb-3">
                        <div class="card-body">
                            <div class="clearfix mb-2">
                                <div class="float-start"><h6 class="fw-bold" style="color: #081d45;">Attendance And Rest Time</h6></div>
                            </div>
                            
                            <div class="Job">
                                <table class="col-sm-12 table-bordered caption-top mb-3 cf">
                                    <thead class="cf">
                                        <tr>
                                            <th style='text-align: center;'>No</th>
                                            <th style='text-align: center;'>Leader</th>
                                            <th style='text-align: center;'>Assistant</th>
                                            <th style='text-align: center; white-space: nowrap;'>Clock In</th>
                                            <th style='text-align: center; white-space: nowrap;'>Clock Out</th>
                                            <th style='text-align: center; white-space: nowrap;'>Rest Out</th>
                                            <th style='text-align: center; white-space: nowrap;'>Rest In</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                            
                                            include_once 'dbconnect.php';
                                            
                                            if(isset($_GET['DateAssign'])) {
                                                $DateAssign = $_GET['DateAssign'];
                                                
                                                $query = mysqli_query($conn, "SELECT * FROM tech_update WHERE techupdate_date='$DateAssign'");
                                                
                                                if(mysqli_num_rows($query) > 0) {
                                                    $counter = 1;
                                                    
                                                    foreach($query as $row) {
                                                        echo "<tr>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='No'>{$counter}</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Leader'>{$row["tech_leader"]}</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Assistant'>".nl2br($row['username'])."</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Clock In'>{$row["tech_clockin"]}</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Clock Out'>{$row["tech_clockout"]}</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Rest Out'>{$row["technician_out"]}</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Rest In'>{$row["technician_in"]}</td>
                                                              </tr>";
                        
                                                        $counter++;
                                                    }
                                                }
                                
                                                else {
                                                    echo "<tr><td colspan='7' class='no-record-td text-center' style='color: red; font-weight: bold;'>No record found</td></tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="Box card mb-3">
                        <div class="card-body">
                            <div class="clearfix mb-2">
                                <div class="float-start"><h6 class="fw-bold" style="color: #081d45;">Technician On Leave</h6></div>
                            </div>
                            
                            <div class="Job">
                                <table class="col-sm-12 table-bordered caption-top mb-3 cf">
                                    <thead class="cf">
                                        <tr>
                                            <th style='text-align: center;'>No</th>
                                            <th style='text-align: center; white-space: nowrap;'>Technician</th>
                                            <th style='text-align: center;'></th>
                                        </tr>
                                    </thead>
                    
                                    <tbody>
                                        <?php
                                            include_once 'dbconnect.php';
                                            
                                            if(isset($_GET['DateAssign'])) {
                                                $DateAssign = $_GET['DateAssign'];
                                                
                                                $query = mysqli_query($conn, "SELECT * FROM tech_off WHERE leave_date='$DateAssign'");
                                                
                                                if(mysqli_num_rows($query) > 0) {
                                                    $counter = 1;
                                                    
                                                    foreach($query as $row) {
                                                        echo "<tr>
                                                                <td style='text-align: center; vertical-align: middle;' data-title='No'>{$counter}</td>
                                                                <td style='text-align: center; white-space: nowrap; vertical-align: middle;' data-title='Technician'>{$row["tech_name"]}</td>
                                                                <td style='text-align: center; vertical-align: middle; color:red;' data-title='' class='fw-bold'>OFF</td>
                                                              </tr>";
                        
                                                        $counter++;
                                                    }
                                                }
            
                                                else {
                                                    echo "<tr><td colspan='7' class='no-record-td text-center' style='color: red; font-weight: bold;'>No record found</td></tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>
            </form>
        </div>

        <!--========== Footer ==========-->
        <footer>
            <nav class="navbar navbar-light position-fixed bottom-0 w-100 justify-content-center" style="background-color: #C0C0C0; z-index: 2">
                <ul class="nav">
                    <li class="nav-item dropup">
                        <div class="text-center">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="ep:list" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Assigned</span>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-center" href="NeoSauKeongTodojob.php">Todo</a></li>
                                <li><hr class="dropdown-divider"></hr></li>
                                <li><a class="dropdown-item text-center" href="NeoSauKeongDoingjob.php">Doing</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeongPendingjob.php"><i class="iconify" data-icon="carbon:warning-filled" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Pending</span>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeong.php"><i class="iconify" data-icon="ant-design:home-filled" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Home</span>
                        </div>
                    </li>

                    <li class="nav-item me-2">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeongIncompletejob.php"><i class="iconify" data-icon="fluent-emoji-high-contrast:no-entry" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Incomplete</span>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="NeoSauKeongCompletedjob.php"><i class="iconify" data-icon="fluent-mdl2:completed-solid" style="font-size:160%; color: #081d45;"></i></a>
                            <span>Completed</span>
                        </div>
                    </li>
                </ul>
            </nav>          
        </footer>
    </body>
</html>