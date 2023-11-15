<?php
    
    session_start();
    
    include "dbconnect.php";

    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_SESSION["username"])) {
        $job_assign = $_SESSION["username"];
        $query_run = mysqli_query($conn, "SELECT * FROM staff_register WHERE username='$job_assign'");
        
        $row = mysqli_fetch_assoc($query_run);
        $username = $row["username"];
    }

    $techupdate_date = date("d-m-Y");
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Attendance</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/technicianStyle.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>   
    </head>
    
    <body>
        <!--========== Header ==========-->
        <header>
            <nav class="navbar navbar-light position-fixed top-0 w-100" style="background-color: #C0C0C0; z-index: 2;">
                <ul class="nav start-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="dashicons:welcome-widgets-menus" style="font-size:200%; color: #081d45;"></i></a>
                        <ul class="dropdown-menu ms-3">
                            <li><a class="dropdown-item" href="techattendance.php">Attendance</a></li>
                            <li><a class="dropdown-item" href="techresthour.php">Rest Hour</a></li>
                            <li><a class="dropdown-item" href="technicianLeave.php">Leave</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="jobregistertechnician.php">Job Register</a></li>
                            <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="techaccessories.php">Accessory</a></li> -->
                        </ul>
                    </li>
                </ul>

                <nav class="nav ms-auto">
                    <span class="fw-bold">Hi <?=$username?>!</span>
                </nav>
                
                <nav class="nav ms-auto">
                    <a class="nav-link" href="logout.php"><i class="iconify" data-icon="heroicons-outline:logout" style="font-size:200%; color: #081d45;"></i></a>
                </nav>
            </nav>            
        </header>
        
        <!--========== Content ==========-->
        <div class="container p-3" style="margin-top: 70px; margin-bottom: 100px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="fw-bold text-center">Attendance</h5>
                </div>

                <div class="card-body">
                    <div class="d-flex mb-3">
                        <label for="" class="form-label fw-bold me-2 mt-1">Technician:</label>
                        <div class="input-group">
                            <input type="text" name="tech_leader" id="tech_leader" value="<?php echo $username; ?>" class="form-control">
                            <input type="hidden" name="techupdate_date" id="techupdate_date" value="<?php echo $techupdate_date; ?>">
                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;" onclick="submitAttname();">Update</button>
                        </div>

                        <p class="fw-bold text-center" id="message"></p>
                    </div>

                    <script type="text/javascript">
                        function submitAttname() {
                            var tech_leader = $('input[name=tech_leader]').val();
                            var techupdate_date = $('input[name=techupdate_date]').val();
                            
                            if (tech_leader != '' || tech_leader == '',
                                techupdate_date != '' || techupdate_date == '') {
                                
                                var formData = {tech_leader: tech_leader,
                                                techupdate_date: techupdate_date};

                                $.ajax({
                                    url: "techattendanceindex.php",
                                    type: 'POST',
                                    data: formData,
                                    
                                    success: function(response) {
                                        var res = JSON.parse(response);
                                        console.log(res);
                                        
                                        if (res.success == true) location.reload();
                                        else $('#message').html('<span style="color: red">Update Cannot Be Saved</span>');
                                    }
                                });
                            }
                        }
                    </script>
                    
                    <?php
                        
                        include 'dbconnect.php';
                        
                        $results = $conn->query("SELECT * FROM tech_update 
                                                 WHERE tech_leader= '{$_SESSION['username']}' 
                                                 AND techupdate_date ='$techupdate_date' 
                                                 ORDER BY techupdate_id DESC LIMIT 1"); 
                        
                        while($row =$results->fetch_assoc()) { 
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="techupdate_id" value="<?= $row['techupdate_id']; ?>">

                        <div class="d-flex mb-3 mt-3">
                            <label for="" class="form-label fw-bold me-2">Date:</label>
                            <h6 class="fw-bold" style="margin-top: 2px;"><?= $row['techupdate_date']; ?></h6>
                        </div>
                    
                        <div class="input-group mb-2">
                            <input type="text" name="tech_clockin" id="tech_clockin" value="<?php echo $row['tech_clockin']; ?>" class="form-control">
                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 80px;" onclick="clock_ins()">IN</button>
                        </div>

                        <script type="text/javascript">
                            function clock_ins() {
                                $.ajax({
                                    url: "techresthourtime.php",
                                    
                                    success: function(result) {
                                        $("#tech_clockin").val(result);
                                    }
                                })
                            }
                        </script>

                        <div class="input-group mb-3">
                            <input type="text" name="tech_clockout" id="tech_clockout" value="<?php echo $row['tech_clockout']; ?>" class="form-control">
                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 80px;" onclick="clock_outs()">OUT</button>
                        </div>

                        <script>
                            function clock_outs() {
                                $.ajax({
                                    url: "techresthourtime.php",
                            
                                    success: function(result) {
                                        $("#tech_clockout").val(result);
                                    }
                                });
                            }
                        </script>

                        <input type="hidden" name="attendancecreated_by" id="attendancecreatedby" value="<?php echo $row['tech_leader']; ?>">

                        <div class="d-grid justify-content-end mb-3">
                            <button type="button" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: 80px;" onclick="submitupdtAtt();">Update</button>
                        </div>

                        <p class="fw-bold text-center" id="updateMessage"></p>
                    </form>
                    <?php } ?>
                
                    <script>
                        function submitupdtAtt() {
                            var tech_leader = $('input[name=tech_leader]').val();
                            var techupdate_date = $('input[name=techupdate_date]').val();
                            var tech_clockin = $('input[name=tech_clockin]').val();
                            var tech_clockout = $('input[name=tech_clockout]').val();
                            var techupdate_id = $('input[name=techupdate_id]').val();
                            var attendancecreated_by = $('input[name=attendancecreated_by]').val();
                            var techdate = <?=$techupdate_date?>;
            
                            if (tech_leader !== '' || tech_leader === '',
                                techupdate_date !== '' || techupdate_date === '',
                                tech_clockin !== '' || tech_clockin === '',
                                tech_clockout !== '' || tech_clockout === '',
                                techupdate_id !== '' || techupdate_id === '',
                                attendancecreated_by !== '' || attendancecreated_by === '') {
                                    
                                var formData = {tech_leader: tech_leader,
                                                techupdate_date: techupdate_date,
                                                tech_clockin: tech_clockin,
                                                tech_clockout: tech_clockout,
                                                techupdate_id: techupdate_id,
                                                attendancecreated_by: attendancecreated_by};
                                                    
                                $.ajax ({
                                    url: "techattendanceupdaterindex.php",
                                    type: 'POST',
                                    data: formData,
                  
                                    success: function(response) {
                                        var res = JSON.parse(response);
                                        console.log(res);
                                            
                                        if (res.success === true) {
                                            $('#updateMessage').html('<span style="color: green">Attendance Saved!</span>');
                                        }
                                            
                                        else {
                                            $('#updateMessage').html('<span style="color: red">Attendance Cannot Be Saved</span>');
                                        }
                                    }
                                });
                            }
                        }
                    </script>
                </div>
            </div>
        </div>

        <!--========== Footer ==========-->
        <footer>
            <nav class="navbar navbar-light position-fixed bottom-0 w-100 justify-content-center" style="background-color: #C0C0C0; z-index: 2">
                <ul class="nav">
                    <li class="nav-item dropup">
                        <div class="text-center">
                            <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="iconify" data-icon="ep:list" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Job List</span> 

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="assignedjob.php">Assigned Job</a></li>
                                <li><a class="dropdown-item" href="unassignedjob.php">Unassigned Job</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="pendingjoblistst.php"><i class="iconify" data-icon="carbon:warning-filled" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Pending</span>
                        </div>
                    </li>
                    
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="technician.php"><i class="iconify" data-icon="ant-design:home-filled" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Home</span>
                        </div>
                    </li>

                    <li class="nav-item me-2">
                        <div class="text-center">
                            <a class="nav-link" href="incompletejoblistst.php"><i class="iconify" data-icon="fluent-emoji-high-contrast:no-entry" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Incomplete</span>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="text-center">
                            <a class="nav-link" href="completejoblistst.php"><i class="iconify" data-icon="fluent-mdl2:completed-solid" style="font-size:180%; color: #081d45;"></i></a>
                            <span>Completed</span>
                        </div>
                    </li>
                </ul>
            </nav>
        </footer>
    </body>
</html>