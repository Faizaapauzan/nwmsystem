<?php
    session_start();
    
    if (isset($_SESSION["username"])) {
      $tech_leader = $_SESSION["username"];
    }
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
    
    $techupdate_date = date("d-m-Y");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician Attendance</title>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/technicianmain.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: auto;
        bottom: 55px;
        padding-left: 20px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        padding-right: 7px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        color: whitesmoke;
    }

    #notYetStatus {
        position: static;
    }

    .showAssRestHour {
        display: none;
    }

    .OFF {
        color: red;
    }
</style>

<body>
    <nav class="nav">
        <div class="nav__link nav__link dropdown">
            <i class="material-icons">list_alt</i>
            <span class="nav__text">Job Listing</span>
            <div class="dropdown-content">
                <a href="assignedjob.php">Assigned Job</a>
                <a href="unassignedjob.php">Unassigned Job</a>
            </div>
        </div>
        <a href="pendingjoblistst.php" class="nav__link">
            <i class="material-icons">pending_actions</i>
            <span class="nav__text">Pending</span>
        </a>
        <a href="technician.php" class="nav__link">
            <i class="material-icons">home</i>
            <span class="nav__text">Home</span>
        </a>
        <a href="incompletejoblistst.php" class="nav__link">
            <i class="material-icons">do_not_disturb_on</i>
            <span class="nav__text">Incomplete</span>
        </a>
        <a href="completejoblistst.php" class="nav__link">
            <i class="material-icons">check_circle</i>
            <span class="nav__text">Complete</span>
        </a>
    </nav>

    <div class="container">
    <!-- save technician name -->
    <div class="column">
        <p class="column-title" id="technician">Technician</p>
        <form action="" method="POST">
            <div style="display: inline-flex">
                <div class="input-box">
                    <label style="font-size: 16px; font-weight: 500">Technician:</label>
                    <input type="text" name="tech_leader" id="tech_leader" value="<?php echo $tech_leader; ?>" style="border: none; width: 100px; padding: 6px; border-radius: 3px; font-size: 16px; height: 38px;"readonly/>
                    <input type="hidden" name="techupdate_date" id="techupdate_date" value="<?php echo $techupdate_date; ?>"readonly/>
                </div>
                <div>
                    <input type="button" onclick="submitAttname();" class="buttonbiru" style=" width: 70px; padding: 6px; border-radius: 3px; font-size: 16px; height: 38px;" value="Save"/>
                    <p class="control"><b id="message"></b></p>
                </div>
            </div>
        </form>
    </div>

    <!-- script to save technician name -->
    <script type="text/javascript">
        function submitAttname() {
            var tech_leader = $('input[name=tech_leader]').val();
            var techupdate_date = $('input[name=techupdate_date]').val();

            if (tech_leader != '' || tech_leader == '',
            techupdate_date != '' || techupdate_date == '')

              {
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
    <!-- script to save technician name -->
    <!-- End of save technician name -->

    <!-- DISPLAY IN AND OUT -->
      <?php
          include 'dbconnect.php';
          $results = $conn->query("SELECT * FROM tech_update 
                                    WHERE tech_leader= '{$_SESSION['username']}' 
                                    AND techupdate_date ='$techupdate_date' 
                                    ORDER BY techupdate_id 
                                    DESC LIMIT 1"); 
          while($row =$results->fetch_assoc()) { 
      ?>
    
    <form action="" method="POST">
        <div class="column">
            <p class="column-title" id="technician">Atendance Time</p>
            <div class="card" style="position: static; padding-left: 15px; padding-right: 15px; margin-top: 20px; margin-bottom: 20px;">
                <input type="hidden" name="techupdate_id" class="resthour_id" value="<?= $row['techupdate_id']; ?>"/>
                <div style="position: static; font-size: larger; margin-bottom: 10px; margin-top: 10px; color: darkblue;" class="tarikh">Date:<?= $row['techupdate_date']; ?></div>
                <label style="position: static; font-weight: 600; font-size: 18px"><?= $row['tech_leader']; ?></label>

                <!-- Tech Clock In -->
                <div style="position: static; width: fit-content" class="input-group mb-3">
                <input type="text" class="form-control" id="clock_in" name="tech_clockin" value="<?php echo $row['tech_clockin']; ?>" style="position: static" aria-describedby="basic-addon2" readonly />
                <div class="input-group-append">
                  <button type="button" class="buttonbiru" style="position: static; width: fit-content; padding-left: 60px;" onclick="clock_ins()">IN</button>
                </div>

                    <script type="text/javascript">
                        function clock_ins() {
                            $.ajax({
                                url: "techresthourtime.php",
                                success: function(result) {
                                    $("#clock_in").val(result);
                                }
                            })
                        }
                    </script>
                </div>

                <!-- Tech Clock Out -->
                <div style="position: static;width: fit-content; display: flex; flex-direction: column; align-items: end;">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" id="clock_out" name="tech_clockout" value="<?php echo $row['tech_clockout']; ?>" style="position: static" aria-describedby="basic-addon2" readonly/>
                    <div class="input-group-append">
                      <button type="button" class="buttonbiru" style="position: static; width: fit-content;" onclick="clock_outs()">OUT</button>
                    </div>

                    <script>
                        function clock_outs() {
                          $.ajax({
                            url: "techresthourtime.php",
                            success: function(result) {
                              $("#clock_out").val(result);
                            }
                          });
                        }
                    </script>
                    </div>

                    <input type="hidden" name="attendancecreated_by" id="attendancecreatedby" value="<?php echo $tech_leader; ?>" readonly>
                
                    <div style="position: static; width: fit-content; margin-top: 10px;">
                        <input type="button" onclick="submitupdtAtt();" class="buttonbiru" style=" width: 118px; height: 40px; padding-left: 20px; padding-right: 20px;" value="Update"/>
                    </div>
                    <p class="control"><b id="message-update2"></b></p>
                </div>
            </div>
        </div>
    </form>
</div>

      <!-- Script to save IN and OUT -->
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
       attendancecreated_by !== '' || attendancecreated_by === '') 
              
              {
                var formData = {tech_leader: tech_leader,
                            techupdate_date: techupdate_date,
                               tech_clockin: tech_clockin,
                              tech_clockout: tech_clockout,
                              techupdate_id: techupdate_id,
                              attendancecreated_by: attendancecreated_by};
                
                $.ajax({
                  url: "techattendanceupdaterindex.php",
                  type: 'POST',
                  data: formData,
                  success: function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                    if (res.success === true) {
                      $('#message-update2').html('<span style="color: green">Attendance Saved!</span>');
                    } 
                    else {
                      $('#message-update2').html('<span style="color: red">Attendance Cannot Be Saved</span>');
                    }
                  }
                });
              }
          }
      </script>
      <!-- Script to save IN and OUT -->
      
      <?php } ?>
      
      <!-- DISPLAY IN AND OUT -->
</body>

</html>