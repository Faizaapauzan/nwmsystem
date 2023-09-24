<?php
    
    session_start();
    
    date_default_timezone_set('Asia/Kuala_Lumpur');

    if (isset($_SESSION["username"])) {
        $tech_leader = $_SESSION["username"];
      }

?>

<!DOCTYPE html>
<html lang="en">
    <body>
    <?php
        include 'dbconnect.php';
        
        if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            
            $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
            
            $query_run = mysqli_query($conn, $query);
            
            if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
    ?>
    <!-- Departure Time -->
    <label for="" class="fw-bold mb-2">Departure Time</label>
    <form id="TechnicianDepartureTime">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        <input type="hidden" name="DateAssign" value="<?php echo date('d-m-Y'); ?>">
        <input type="hidden" name="job_status" value="Doing">
        <input type="hidden" name="departure_timestamp" value="<?php echo date('H:i:s'); ?>">
                    
        <div class="input-group mb-3">
            <input type="text" id="technician_departure" name="technician_departure" value="<?php echo $row['technician_departure']?>" class="form-control">
            <button type="button" id="update_DepartureTime" class="btn" style="background-color: #081d45; color:white; border:none; width:100px;" onclick="TechnicianDeparture(event)">Departure</button>
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
    <!-- End of Departure Time -->

    <!-- Time at site -->
    <label for="" class="fw-bold mb-2">Time at site</label>
    <form id="TechnicianTimeAtSite">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <div class="input-group mb-3">
            <input type="text" id="technician_arrival" name="technician_arrival" value="<?php echo $row['technician_arrival']?>" class="form-control">
            <button type="button" class="btn" id="update_ArrivalTime" style="background-color: #081d45; color:white; border:none; width:100px;" onclick="TechnicianArrival(event)">Arrival</button>
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
    <!-- End of Time at site -->

    <!-- Return time -->
    <label for="" class="fw-bold mb-2">Return time</label>
    <form id="TechnicianReturnTime">
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <div class="input-group mb-3">
            <input type="text" id="technician_leaving" name="technician_leaving" value="<?php echo $row['technician_leaving']?>" class="form-control">
            <button type="button" id="update_LeavingTime" class="btn" style="background-color: #081d45; color:white; border:none; width:100px;" onclick="TechnicianLeaving(event)">Return</button>
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
    <!-- End of Return time -->

    <!-- Rest Hour -->
    <label for="" class="fw-bold mb-2">Rest Time</label>
    <div class="d-grid gap-2">
        <form id="TechnicianRestHourOut">
            <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
            <input type="hidden" name="tech_leader" value="<?php echo $tech_leader; ?>">
            <input type="hidden" name="techupdate_date" value="<?php echo date('d-m-Y'); ?>">
            <input type="hidden" name="technician_out" value="<?php echo date('g:i A'); ?>">
            
            <div class="input-group">
                <input type="text" id="tech_out" name="tech_out" value="<?php echo $row['tech_out']?>" class="form-control">
                <button type="button" class="btn" style="background-color: #081d45; color:white; border:none; width:100px;" onclick="updateOutTime(); updateTechnicianOut();">OUT</button>
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
        
        <form id="TechnicianRestHourIn">
            <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
            <input type="hidden" name="tech_leader" value="<?php echo $tech_leader; ?>">
            <input type="hidden" name="techupdate_date" value="<?php echo date('d-m-Y'); ?>">
            <input type="hidden" name="technician_in" value="<?php echo date('g:i A'); ?>">
            
            <div class="input-group">
                <input type="text" id="tech_in" name="tech_in" value="<?php echo $row['tech_in']?>" class="form-control">
                <button type="button" class="btn" style="background-color: #081d45; color:white; border:none; width:100px;" onclick="updateInTime(); updateTechnicianIn();">IN</button>
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
    </div>
    
    <p class="control" style="color: green;"><b id="techupdateAdmin"></b></p>

    <div class="d-grid justify-content-end mt-3">
        <button type="button" id="update_tech" name="update_tech" class="btn" style="color: white; background-color: #081d45; border:none; width: 100px;">Update</button>
    </div>
    <!-- End of Rest Hour -->
    <?php } } } ?>

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
                        $('#techupdateAdmin').html('Time has been update successfully');
                    },
                    error: function() {
                        $('#techupdateAdmin').html('An error occurred while updating the time');
                    }
                });
            });
        });
    </script>
    </body>
</html>