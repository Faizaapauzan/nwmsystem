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
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Leave</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="css/technicianStyle.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multidatespicker/1.6.6/jquery-ui.multidatespicker.js"></script>
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
                    <h5 class="fw-bold text-center">Leave</h5>
                </div>

                <div class="card-body">
                    <div class="card mb-3">
                        <form id="techleaveForm">
                            <div class="card-body">
                                <input type="hidden" name="tech_name" id="tech_name" value="<?=$username?>">
                                
                                <label for="" class="form-label">Date</label>
                                <input type="text" id="datePick" name="leave_date" class="form-control mb-3" placeholder="Select Date" autocomplete="off">
                                
                                <script>
                                    $(document).ready(function() {
                                        $('#datePick').multiDatesPicker({
                                            dateFormat: 'dd-mm-yy'
                                        });
                                        
                                        $("form").submit(function() {
                                            var selectedDates = $("#datePick").multiDatesPicker("getDates");
                                            $("#datePick").val(selectedDates.join(","));
                                        });
                                    });
                                </script>

                                <label for="" class="form-label">Reason</label>
                                <input type="text" name="reason" id="reason" class="form-control mb-3" autocomplete="off">

                                <div id="errorMessage" class="alert alert-warning d-none" style="text-align: center;"></div>

                                <div class="d-grid justify-content-end">
                                    <button type="submit" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF;">Submit</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            $(document).on('submit', '#techleaveForm', function (e) {
                                e.preventDefault();
                                
                                var formData = new FormData(this);
                                formData.append("save_record", true);
                                
                                $.ajax({
                                    type: "POST",
                                    url: "AdminLeaveCode.php",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                            
                                    success: function (response) {
                                        var res = jQuery.parseJSON(response);
                                        
                                        if(res.status == 422) {
                                            $('#errorMessage').removeClass('d-none');
                                            $('#errorMessage').text(res.message);
                                        }
                                
                                        else if(res.status == 200) {
                                            $('#techleaveForm')[0].reset();
                                            
                                            setTimeout(function() {
                                                location.reload();
                                            }, 0);
                                        }
                                
                                        else if(res.status == 500) {
                                            $('#errorMessage').removeClass('d-none');
                                            $('#errorMessage').text(res.message);
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-sm caption-top">
                            <caption class="fw-bold mb-3" style='text-align: center; color:black;'>Leave Date</caption>
                            <thead>
                                <tr>
                                    <th style='text-align: center;'>Date</th>
                                    <th style='text-align: center;'>Reason</th>
                                </tr>
                            </thead>

                            <?php
                                
                                require 'dbconnect.php';
                                
                                $query = "SELECT * FROM tech_off WHERE tech_name = '{$_SESSION['username']}' 
                                          AND SUBSTRING(leave_date, 7, 4) = SUBSTRING(CURDATE(), 1, 4)
                                          ORDER BY techOFF_id DESC";
                                          
                                $query_run = mysqli_query($conn, $query);
                                
                                if(mysqli_num_rows($query_run) > 0) {
                                    foreach($query_run as $staff) {
                            ?>
                            <tr id="<?=$staff['techOFF_id'];?>">
                                <td class="editable" contenteditable="true" style='text-align: center'><?= $staff['leave_date'] ?></td>
                                <td class="editable" contenteditable="true"><?= $staff['reason'] ?></td>
                            </tr>
                            <?php } } ?>
                        </table>

                        <div id="leaveUpdateMessage"></div>

                        <script>
                            $(document).ready(function () {
                                // Hide respond message
                                function hideElementById(elementId) {
                                    document.getElementById(elementId).style.display = "none";
                                }
                                
                                function saveData(cell) {
                                    var rowData = {
                                        techOFF_id: cell.parent().attr('id'), 
                                        date: cell.parent().find('.editable:first').text(),
                                        reason: cell.parent().find('.editable:last').text(),
                                        update_record: true
                                    };
                                    
                                    $.ajax({
                                        type: 'POST',
                                        url: "AdminLeaveCode.php",
                                        data: rowData,
                                        dataType: 'json',
                                        
                                        success: function (res) {
                                            $('#leaveUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                                            
                                            setTimeout(function () {
                                                hideElementById("leaveUpdateMessage");
                                                location.reload();
                                            }, 700);
                                        },
                                        
                                        error: function (error) {
                                            $('#leaveUpdateMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + error.responseJSON.message + '</p>');
                                            
                                            setTimeout(function () {
                                                hideElementById("leaveUpdateMessage");
                                                location.reload();
                                            }, 700);
                                        }
                                    });
                                }
                                
                                // Detect changes in editable cells and trigger autosave
                                $('.editable').on('input', function () {
                                    saveData($(this));
                                });
                            });
                        </script>
                    </div>
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