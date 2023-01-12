<?php
    
    session_start();
    
    date_default_timezone_set('Asia/Kuala_Lumpur');

    if (isset($_SESSION["username"])) {
        $tech_leader = $_SESSION["username"];
      }

?>

<!DOCTYPE html>

<head>
    <link href="css/ajaxtechupdate.css" rel="stylesheet" />
</head>

<body>

    <!-- To open ajax --> 
    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
    ?> 
    
    <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>"> <?php } } } ?>
    
    <!-- To update travel time and rest hour --> 
    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
    ?> 
    
    <div style="margin-left: 30px">
        <!-- Departure Time -->
        <div class="input-box-departure">
            <label for="">Departure Time</label>
            <form id="TechnicianDepartureTime">
                <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                <input type="hidden" name="DateAssign" value="<?php echo date('d-m-Y'); ?>">
                <input type="hidden" name="job_status" value="Doing">
                <input type="hidden" name="departure_timestamp" value="<?php echo date('H:i:s'); ?>">
                
                <input type="text" class="technician_departure" id="technician_departure" name="technician_departure" value="<?php echo $row['technician_departure']?>">
                <input type="button" id="update_DepartureTime" value="Departure" style=" background-color: #081d45;" onclick="TechnicianDeparture(event)">
            </form>
        </div>
        
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
        <!-- End of Departure Time -->
        
        <!-- Time at site -->
        <div class="input-box-arrival">
            <label for="">Time at site</label>
            <form id="TechnicianTimeAtSite">
                <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                
                <input type="text" class="technician_arrival" id="technician_arrival" name="technician_arrival" value="<?php echo $row['technician_arrival']?>">
                <input type="button" id="update_ArrivalTime" value="Arrival" style=" background-color: #081d45;" onclick="TechnicianArrival(event)">
            </form>
        </div>
        
        <script type="text/javascript">
            function TechnicianArrival(event) {
                event.preventDefault();
                fetch("departureTime.php").then(response => response.text()).then(result => {
                    document.getElementById("technician_arrival").value = result;
                });
            }
        </script>
        <!-- End of Time at site -->
        
        <!-- Return Time -->
        <div class="input-box-leaving">
            <label for="">Return time</label>
            <form id="TechnicianReturnTime">
                <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                
                <input type="text" class="technician_arrival" id="technician_leaving" name="technician_leaving" value="<?php echo $row['technician_leaving']?>">
                <input type="button" id="update_LeavingTime" value="Leaving" style="background-color: #081d45;" onclick="TechnicianLeaving(event)">
            </form>
        </div>
        
        <script type="text/javascript">
            function TechnicianLeaving(event) {
                event.preventDefault();
                fetch("departureTime.php").then(response => response.text()).then(result => {
                    document.getElementById("technician_leaving").value = result;
                });
            }
        </script>
        <!-- End of Return Time -->
        
        <div class="input-box-out">
            <label for="">Rest Hour</label>
            <!-- Rest Hour Out -->
            <form id="TechnicianRestHourOut">
                <div style="display: flex; align-items: baseline;">
                    <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                    <input type="hidden" name="tech_leader" value="<?php echo $tech_leader; ?>">
                    <input type="hidden" name="techupdate_date" value="<?php echo date('d-m-Y'); ?>">
                    <input type="hidden" name="technician_out" value="<?php echo date('g:i A'); ?>">
                    
                    <input type="text" style="width: 440px;" id="tech_out" name="tech_out" value="<?php echo $row['tech_out']?>">
                    <input style="background-color: #081d45; color: white; width: 203.8px" type="button" value="OUT" onclick="updateOutTime(); updateTechnicianOut();">
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
            <!-- End of Rest Hour Out -->
            
            <!-- Rest Hour In -->
            <form id="TechnicianRestHourIn">
                <div style="display: flex; align-items: baseline;">
                    <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                    <input type="hidden" name="tech_leader" value="<?php echo $tech_leader; ?>">
                    <input type="hidden" name="techupdate_date" value="<?php echo date('d-m-Y'); ?>">
                    <input type="hidden" name="technician_in" value="<?php echo date('g:i A'); ?>">
                    
                    <input type="text" style="width: 443px;" id="tech_in" name="tech_in" value="<?php echo $row['tech_in']?>">
                    <input style="background-color: #081d45; color: white; width: 203.8px" type="button" value="IN" onclick="updateInTime(); updateTechnicianIn();">
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
            <!-- End of Rest Hour In -->
        </div>
        
        <p class="control" style="color: green;"><b id="techupdateAdminList"></b></p>
        <div style="margin-top:30px; margin-left:450px; margin-bottom:30px">
            <input type="button" id="update_tech" name="update_tech" value="Update" style="background-color: #081d45; color: white; width: 203.8px; height:40px; border: none; border-radius: 4px; font-size:15px;">
        </div>
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
                        $('#techupdateAdminList').html('Time has been update successfully');
                    },
                    error: function() {
                        $('#techupdateAdminList').html('An error occurred while updating the time');
                    }
                });
            });
        });
    </script> 
    
    <?php } } } ?>
    
</body>

</html>