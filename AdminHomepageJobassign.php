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
            <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
            
            <div class="col-md-6 mb-3">
                <label for="" class="mb-3 fw-bold">Job Assign</label>
                <div class="input-group">
                    <select name="job_assign" id="job_assign" class="form-select" onchange="GetAssign(this.value)">
                        <option value=""><?php echo $row['job_assign']?></option>
                            <?php
                                
                                include "dbconnect.php";
                                
                                $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE (staff_position = 'Leader' OR staff_position = 'Storekeeper') AND tech_avai = '0' ORDER BY username ASC");
                                
                                echo "<option value=''></option>";
                    
                                while($data = mysqli_fetch_array($records)) {
                                    echo "<option value='". $data['username'] ."' data-techRank='". $data['technician_rank'] ."' data-staffPost='". $data['staff_position'] ."'>" .$data['username']. " - " . $data['technician_rank']."</option>";
                                }
                            ?> 
                    </select>
                    
                    <button type="button" class="btn btn-outline-secondary" id="technicianassign" name="technicianassign" style="color: white; background-color: #081d45; border-color: #081d45; width:max-content">Update</button>
                </div>
                <p class="fw-bold mb-3 mt-3" id="assignupdateadminmessage"></p>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('#job_assign').select2({
                        dropdownParent: $('#assignupdate_form'),
                        theme: 'bootstrap-5',
                        dropdownPosition: 'below',
                    });
                });
            </script>

            <script>
                function GetAssign(value) {
                    var selectedOption = document.querySelector('#job_assign option[value="' + value + '"]');
                    var techRank = selectedOption.getAttribute('data-techRank');
                    var staffPost = selectedOption.getAttribute('data-staffPost');
                            
                    document.querySelector('input[name="technician_rank"]').value = techRank;
                    document.querySelector('input[name="staff_position"]').value = staffPost;
                }
            </script>

            <input type="hidden" name="technician_rank" value="<?php echo $row['technician_rank'] ?>">
            <input type="hidden" name="staff_position" value="<?php echo $row['staff_position'] ?>">
            
            <?php if (isset($_SESSION["username"])) { ?>
                <input type="hidden" name="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
            <?php } ?>
        </form>

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
                                $('#assignupdateadminmessage').html('<span style="color: red">Failed to assign job</span>');
                        }
                    });
                });
            });
        </script>

        <?php } } } ?> 
    </body>
</html>