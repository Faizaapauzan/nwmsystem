<?php session_start(); ?>

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
        <form id="assignupdate_form" method="post">
            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold mb-3">Assign Job</label>
                <div class="input-group">
                    <select class="form-select" id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)">
                        <option value=""><?php echo $row['job_assign']?></option> 
                            <?php
                                    
                                include "dbconnect.php";
                        
                                $records = mysqli_query($conn, "SELECT * FROM staff_register 
                                                                WHERE technician_rank = '1st Leader' AND tech_avai = '0'
                                                                OR technician_rank = '2nd Leader' AND tech_avai = '0'
                                                                OR staff_position='Storekeeper' AND tech_avai = '0' 
                                                                ORDER BY staffregister_id ASC");
                                echo "<option></option>";
                    
                                while($data = mysqli_fetch_array($records)) {
                                        echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. " - " . $data['technician_rank']." </option>";
                                }
                            ?> 
                    
                        <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
                        <input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
                        <input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>
                        <input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>
                    </select> 
            
                    <?php if (isset($_SESSION["username"])) { ?>
                        <input type="hidden" name="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
                    <?php } ?>
            
                    <button type="" class="btn" style="background-color: #081d45; color:white; border:none;">Update</button>
                </div>
                    
                <p style="margin-left: 20px;margin-top: 1px;margin-bottom: 11px;" class="control"><b id="assignupdateadminmessage"></b></p>
            </div>
        </form>
        <?php } } } ?>

        <script>
            $(document).ready(function(){
                $('#jobassignto').select2({
                    dropdownParent: $('#assignupdate_form'),
                    dropdownPosition: 'below',
                    theme: 'bootstrap-5'
                });
            });
        </script>
        
        <script>
            $(document).ready(function() {
                $('#technicianassign').click(function() {
                    var data = $('#assignupdate_form').serialize() + '&technicianassign=technicianassign';
                    
                    $.ajax({
                        url: 'assigntechindex.php',
                        type: 'post',
                        data: data,
                    
                        success: function(response) {
                            var res = JSON.parse(response);
                            console.log(res);
                            
                            if (res.success == true) 
                                $('#assignupdateadminmessage').html('<span style="color: green">Job Assigned!</span>');
                            else 
                                $('#assignupdateadminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                        }
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $("#jobassignto").on("change", function() {
                    var GetValue = $("#jobassignto").val();
                    $("#jobassign").val(GetValue);
                });
            });
        </script>

        <script>
            function GetJobAss(str) {
                if (str.length == 0) {
                    document.getElementById("username").value = "";
                    document.getElementById("technician_rank").value = "";
                    document.getElementById("staff_position").value = "";
                
                    return;
                } 
            
                else {
                    var xmlhttp = new XMLHttpRequest();
                    
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var myObj = JSON.parse(this.responseText);
                            
                            document.getElementById("username").value = myObj[0];
                            document.getElementById("technician_rank").value = myObj[1];
                            document.getElementById("staff_position").value = myObj[2];
                        }
                    };
                
                    xmlhttp.open("GET", "fetchtechnicianrank.php?staffregister_id=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
    </body>
</html>