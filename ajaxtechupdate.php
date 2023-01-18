<?php
    
    session_start();
    
    date_default_timezone_set('Asia/Kuala_Lumpur');

    if (isset($_SESSION["username"])) {
        $tech_leader = $_SESSION["username"];
      }

?>

<!DOCTYPE html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
    <title>Job Update</title>
    <link href="css/technicianmain.css" rel="stylesheet" />
    <link href="main.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/testing.js" type="text/javascript"></script>
</head>

<body> 
    
    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) {
          $jobregister_id =$_POST['jobregister_id'];
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run)
            {
              while ($row = mysqli_fetch_array($query_run))
              {
    ?> 
    
    <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    
    <!-- Technician Departure Time -->
    <label>Departure time</label>
    <form id="TechnicianDepartureTime">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        <input type="hidden" name="DateAssign" value="<?php echo date('d-m-Y'); ?>">
        <input type="hidden" name="job_status" value="Doing">
        <input type="hidden" name="departure_timestamp" value="<?php echo date('H:i:s'); ?>">
        
        <div class="input-group mb-3">
            <input readonly type="text" class="form-control" name="technician_departure" id="technician_departure" value="<?php echo $row['technician_departure']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_DepartureTime" class="buttonbiru update" style="width: max-content; padding-right:10px; padding-left:10px;" onclick="TechnicianDeparture(event)">Departure</button>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        function TechnicianDeparture(event) {
            event.preventDefault();
            fetch("departureTime.php").then(response => response.text()).then(result => {
                document.getElementById("technician_departure").value = result;
            });
            
            var formData = new FormData(document.getElementById("TechnicianDepartureTime"));
            fetch("departureupdate.php", {
                method: "POST",
                body: formData
            }).then(response => response.text()).then(result => {
                console.log(result);
            });
        }
    </script>
    <!-- End of Technician Departure Time -->
    
    <!-- Technician Time At Site Time -->
    <label>Time at site</label>
    <form id="TechnicianTimeAtSite">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="technician_arrival" name="technician_arrival" value="<?php echo $row['technician_arrival']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_ArrivalTime" class="buttonbiru update" style="width: max-content; padding-right:23px; padding-left:23px;" onclick="TechnicianArrival(event)">Arrival</button>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        function TechnicianArrival(event) {
            event.preventDefault();
            fetch("departureTime.php").then(response => response.text()).then(result => {
                document.getElementById("technician_arrival").value = result;
            });
        }
    </script>
    <!-- End of Technician Time At Site Time -->
    
    <!-- Technician Return Time -->
    <label>Return time</label>
    <form id="TechnicianReturnTime">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="technician_leaving" name="technician_leaving" value="<?php echo $row['technician_leaving']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_LeavingTime" class="buttonbiru update" style="width: max-content; padding-right:18.5px; padding-left:18.5px;" onclick="TechnicianLeaving(event)">Leaving</button>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        function TechnicianLeaving(event) {
            event.preventDefault();
            fetch("departureTime.php").then(response => response.text()).then(result => {
                document.getElementById("technician_leaving").value = result;
            });
        }
    </script>
    <!-- End of Technician Return Time -->
    
    <label>Rest Hour</label>
    <!-- Technician Rest Hour Out -->
    <form id="TechnicianRestHourOut">
        <div class="input-group mb-3">
            <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
            <input type="hidden" name="tech_leader" value="<?php echo $tech_leader; ?>">
            <input type="hidden" name="techupdate_date" value="<?php echo date('d-m-Y'); ?>">
            <input type="hidden" name="technician_out" value="<?php echo date('g:i A'); ?>">
            <input readonly type="text" style="position: static;" class="form-control" id="tech_out" name="tech_out" value="<?php echo $row['tech_out']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="buttonbiru" onclick="updateOutTime(); updateTechnicianOut();" style="position: static; padding-left: 30px; padding-right: 30px;" type="button">OUT</button>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        function updateOutTime() {
            $.ajax({
                url: "techresthourtime.php",
                success: function(result) {
                    $("#tech_out").val(result);
                    updateTechOut();
                    updateTechnicianOut();
                }
            });
        }

        function updateTechnicianOut() {
            var technician_out = $('input[name=technician_out]').val();
            var tech_leader = $('input[name=tech_leader]').val();
            var techupdate_date = $('input[name=techupdate_date]').val();
            
            if (technician_out !== '' && tech_leader !== '' && techupdate_date !== '') {
                var formData = {
                    technician_out: technician_out,
                    tech_leader: tech_leader,
                    techupdate_date: techupdate_date
                };
                
                $.post('techoutupdate2.php', formData, function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                });
            }
        }
    </script>
    <!-- End of Technician Rest Hour Out -->
    
    <!-- Technician Rest Hour In -->
    <form id="TechnicianRestHourIn">
        <div class="input-group mb-3">
            <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
            <input type="hidden" name="tech_leader" value="<?php echo $tech_leader; ?>">
            <input type="hidden" name="techupdate_date" value="<?php echo date('d-m-Y'); ?>">
            <input type="hidden" name="technician_in" value="<?php echo date('g:i A'); ?>">
            <input readonly type="text" style="position: static;" class="form-control" id="tech_in" name="tech_in" value="<?php echo $row['tech_in']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="buttonbiru" onclick="updateInTime(); updateTechnicianIn();" style="position: static; padding-left: 37px; padding-right: 37px; width: max-content" type="button">IN</button>
            </div>
        </div>
    </form>
    
    <script type="text/javascript">
        function updateInTime() {
            $.ajax({
                url: "techresthourtime.php",
                success: function(result) {
                    $("#tech_in").val(result);
                    updateTechIn();
                    updateTechnicianIn();
                }
            });
        }

        function updateTechnicianIn() {
            var technician_in = $('input[name=technician_in]').val();
            var tech_leader = $('input[name=tech_leader]').val();
            var techupdate_date = $('input[name=techupdate_date]').val();
            
            if (technician_in !== '' && tech_leader !== '' && techupdate_date !== '') {
                var formData = {
                    technician_in: technician_in,
                    tech_leader: tech_leader,
                    techupdate_date: techupdate_date
                };
                
                $.post('techinupdate2.php', formData, function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                });
            }
        }
    </script>
    <!-- End of Technician Rest Hour In -->

    <div id="message" style="font-family: sans-serif; font-weight: bold; font-size: 15px; color:green"></div>
    <div style="text-align: end;" class="updateBtn">
        <button type="button" id="update_tech" class="buttonbiru" style="padding-left: 37px; padding-right: 37px; width: max-content">Update</button>
    </div>

    <script>
        $(function() {
            $('#update_tech').click(function() {
                var technician_departure = $('#technician_departure').val();
                var technician_arrival = $('#technician_arrival').val();
                var technician_leaving = $('#technician_leaving').val();
                var tech_out = $('#tech_out').val();
                var tech_in = $('#tech_in').val();
                var jobregister_id = $('#jobregister_id').val();
                
                $.ajax({
                    type: 'POST',
                    url: 'techupdateindex.php',
                    data: {
                        technician_departure: technician_departure,
                        technician_arrival: technician_arrival,
                        technician_leaving: technician_leaving,
                        tech_out: tech_out,
                        tech_in: tech_in,
                        jobregister_id: jobregister_id
                    },
                    
                    success: function(response) {
                        $('#message').html('Time has been update successfully');
                    },
                    error: function() {
                        $('#message').html('An error occurred while updating the data');
                    }
                });
            });
        });
    </script> 
    
    <?php } } } ?>

</body>

</html>