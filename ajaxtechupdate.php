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
        
        <input type="hidden" name="technician_departure" value="<?php echo date('d-m-Y g:i A'); ?>">
        <input type="hidden" name="departure_timestamp" value="<?php echo date('H:i:s'); ?>">
       
        <div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="Departure" value="<?php echo $row['technician_departure']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_DepartureTime" class="buttonbiru update" onclick="TechnicianDeparture(event)">Departure</button>
            </div>
        </div>
      </form>
    
    <script type="text/javascript">
        function TechnicianDeparture(event) {
            event.preventDefault();
            fetch("departureTime.php").then(response => response.text()).then(result => {
                document.getElementById("Departure").value = result;
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
        
        <input type="hidden" name="technician_arrival" value="<?php echo date('d-m-Y g:i A'); ?>">
        <input type="hidden" name="arrival_timestamp" value="<?php echo date('H:i:s'); ?>">
        
        <div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="arrival" value="<?php echo $row['technician_arrival']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_ArrivalTime" class="buttonbiru update" style="padding-left: 64px;" onclick="TechnicianArrival(event)">Arrival</button>
            </div>
        </div>
      </form>
    
    <script type="text/javascript">
        function TechnicianArrival(event) {
            event.preventDefault();
            fetch("departureTime.php").then(response => response.text()).then(result => {
                document.getElementById("arrival").value = result;
            });
            
            var formData = new FormData(document.getElementById("TechnicianTimeAtSite"));
            fetch("arrivalupdate.php", {
                method: "POST",
                body: formData
            }).then(response => response.text()).then(result => {
                console.log(result);
            });
        }
    </script>
    <!-- End of Technician Time At Site Time -->
    
    <!-- Technician Return Time -->
    <label>Return time</label>
      <form id="TechnicianReturnTime">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <input type="hidden" name="technician_leaving" value="<?php echo date('d-m-Y g:i A'); ?>">
        <input type="hidden" name="leaving_timestamp" value="<?php echo date('H:i:s'); ?>">
        
        <div class="input-group mb-3">
            <input readonly type="text" class="form-control" id="leaving" value="<?php echo $row['technician_leaving']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="update_LeavingTime" class="buttonbiru update" style="padding-left: 51px;" onclick="TechnicianLeaving(event)">Leaving</button>
            </div>
        </div>
      </form>
    
    <script type="text/javascript">
        function TechnicianLeaving(event) {
            event.preventDefault();
            fetch("departureTime.php").then(response => response.text()).then(result => {
                document.getElementById("leaving").value = result;
            });
            
            var formData = new FormData(document.getElementById("TechnicianReturnTime"));
            fetch("leavingupdate.php", {
                method: "POST",
                body: formData
            }).then(response => response.text()).then(result => {
                console.log(result);
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
            <input type="hidden" name="tech_out" value="<?php echo date('g:i A'); ?>">
            <input type="hidden" name="technician_out" value="<?php echo date('g:i A'); ?>">
            <input readonly type="text" style="position: static;" class="form-control" id="tech_out" value="<?php echo $row['tech_out']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="buttonbiru" onclick="updateOutTime();" style="position: static; width: fit-content;" type="button">OUT</button>
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

        function updateTechOut() {
            var tech_out = $('input[name=tech_out]').val();
            var jobregister_id = $('input[name=jobregister_id]').val();
            if (tech_out !== '' && jobregister_id !== '') {
                var formData = {
                    tech_out: tech_out,
                    jobregister_id: jobregister_id
                };
                $.post('techoutupdate.php', formData, function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                });
            }
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
            <input type="hidden" name="tech_in" value="<?php echo date('g:i A'); ?>">
            <input type="hidden" name="technician_in" value="<?php echo date('g:i A'); ?>">
            <input readonly type="text" style="position: static;" class="form-control" id="tech_in" value="<?php echo $row['tech_in']?>" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="buttonbiru" style="padding-left: 55px;" onclick="updateInTime();" style="position: static; width: fit-content;" type="button">IN</button>
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

        function updateTechIn() {
            var tech_in = $('input[name=tech_in]').val();
            var jobregister_id = $('input[name=jobregister_id]').val();
            if (tech_in !== '' && jobregister_id !== '') {
                var formData = {
                    tech_in: tech_in,
                    jobregister_id: jobregister_id
                };
                $.post('techinupdate.php', formData, function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                });
            }
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
    
    <?php } } } ?>
</body>

</html>