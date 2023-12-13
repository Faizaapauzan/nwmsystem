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
        <div class="container" id="jobAssignTab">
            <div class="card mb-3">
                <form id="adminJobAssign">
                    <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id']?>">
                    
                    <div class="card-body">
                        <label for="" class="form-label fw-bold">Job Assign</label>
                        <div class="input-group mb-2">
                            <select name="job_assign" id="job_assign" class="form-select" onchange="GetTechDetails(this.value)">
                                <option value=""><?php echo $row['job_assign']?></option> 
                                <?php
                                    
                                    include "dbconnect.php";
                                        
                                    $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE staff_position = 'Leader' AND tech_avai = '0' 
                                                                    ORDER BY username ASC");
                                                                        
                                    echo "<option value=''>Select Technician</option>";
                                        
                                    while($data = mysqli_fetch_array($records)) {
                                        echo "<option value='". $data['username'] ."'
                                                      data-techRank='". $data['technician_rank'] ."'
                                                      data-staffPos='". $data['staff_position'] ."'>" .$data['username']. "</option>";
                                    }
                                ?> 
                            </select>
                            
                            <button type="submit" id="jobAssBtn" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF;">Update</button>
                        </div>
                        
                        <div id="assignMessage"></div>
                        
                        <script>
                            function GetTechDetails(value) {
                                var selectedOption = document.querySelector('#job_assign option[value="' + value + '"]');
                                var techRank = selectedOption.getAttribute('data-techRank');
                                var staffPos = selectedOption.getAttribute('data-staffPos');
                                
                                document.querySelector('input[name="technician_rank"]').value = techRank;
                                document.querySelector('input[name="staff_position"]').value = staffPos;
                            }
                        </script>
                        
                        <input type="hidden" id="technician_rank" name="technician_rank" value="<?php echo $row['technician_rank']?>">
                        <input type="hidden" id="staff_position" name="staff_position" value="<?php echo $row['staff_position']?>">
                        
                        <script>
                            $(document).ready(function() {
                                $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                    $("#job_assign").select2({
                                        dropdownParent: $('#adminJobAssign'),
                                        matcher: oldMatcher(matchStart),
                                        theme: 'bootstrap-5'
                                    })
                                });
                                
                                function matchStart (term, text) {
                                    if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                                        return true;
                                    }
                                    
                                    return false;
                                }
                            });
                        </script>
                    </div>
                </form>
            </div>
            
            <div class="card mb-3">
                <div class="card-body">
                    <label for="" class="form-label fw-bold">Assistant</label>
                    <div class="table-responsive mb-3">
                        <table class="table border table-borderless table-striped" id="assistantTable">
                            <tbody>
                                <?php
                                
                                    include 'dbconnect.php';
                                
                                    if (isset($_POST['jobregister_id'])) {
                                        $jobregister_id =$_POST['jobregister_id'];
                
                                        $query = "SELECT * FROM assistants WHERE jobregister_id ='$jobregister_id'";
                
                                        $query_run = mysqli_query($conn, $query);
                                    
                                        if ($query_run) {
                                            while ($name = mysqli_fetch_array($query_run)) {
                                ?>
                                <tr data-id="<?php echo $name['id']?>">
                                    <td style='text-align: center; vertical-align: middle;'><?php echo nl2br($name['username']) ?></td>
                                    <td style='text-align: center; vertical-align: middle;'><button id="deleteAss" class='btn fw-bold' style='color:red; border:none;'>Delete</button></td>
                                </tr>
                                <?php } } } ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <form id="techJobAssistantForm">
                        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id']?>">
                        <input type="hidden" name="ass_date" id="ass_date" value="<?php echo $row['DateAssign']?>">
                        <input type="hidden" name="cust_name" id="cust_name" value="<?php echo $row['customer_name']?>">
                        <input type="hidden" name="requested_date" id="requested_date" value="<?php echo $row['requested_date']?>">
                        <input type="hidden" name="machine_name" id="machine_name" value="<?php echo $row['machine_name']?>">
                                                
                        <select name="username[]" id="username" class="form-select mb-3" multiple>
                            <?php
                                
                                $query = "SELECT * FROM staff_register WHERE staff_group = 'Technician' AND tech_avai = '0' ORDER BY username ASC";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $rowstaff) {
                            ?>
                            
                            <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option>

                            <?php } } else {echo "No Record Found";} ?> 
                        </select>
                        
                        <div id="assistantMessage"></div>

                        <div class="d-grid justify-content-end mt-3">
                            <button type="button" id="addAssistant" class="btn" style="border: none; background-color: #081d45; color: #FFFFFF; width: fit-content;">Update</button>
                        </div>
                    </form>
                    
                    <script>
                        $(document).ready(function() {
                            $.fn.select2.amd.require(['select2/compat/matcher'], function (oldMatcher) {
                                $("#username").select2({
                                    dropdownParent: $('#techJobAssistantForm'),
                                    matcher: oldMatcher(matchStart),
                                    theme: 'bootstrap-5'
                                })
                            });
                            
                            function matchStart (term, text) {
                                if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                                    return true;
                                }
                                
                                return false;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <?php } } } ?>


        <script>
            function hideElementById(elementId) {
                document.getElementById(elementId).style.display = "none";
            }

            // Update Job Assign
            $(document).on('click', '#jobAssBtn', function (e) {
                e.preventDefault();
                
                var formData = new FormData($('#adminJobAssign')[0]);
                    formData.append("update_jobAssign", true);
                        
                $.ajax({
                    type: "POST",
                    url: "AdminHomepageTechnicianIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                            
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status === 200) {
                            $('#assignMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("assignMessage");
                            }, 2000);
                        }
                                
                        else if (res.status === 500) {
                            $('#assignMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                            
                            setTimeout(function () {
                                hideElementById("assignMessage");
                            }, 2000);
                        }
                    },
                            
                    error: function (xhr, status, error) {
                        $('#assignMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                        
                        setTimeout(function () {
                            hideElementById("assignMessage");
                        }, 2000);
                                
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            
            // Add Assistant
            $(document).on('click', '#addAssistant', function (e) {
                e.preventDefault();
                
                var formData = new FormData($('#techJobAssistantForm')[0]);
                    formData.append("submit_Assistant", true);
                        
                        
                $.ajax({
                    type: "POST",
                    url: "AdminHomepageTechnicianIndex.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                            
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                                
                        if (res.status === 200) {
                            $('#assistantMessage').html('<p class="fw-bold" style="text-align: center; color: green; display:block;">' + res.message + '</p>');

                            $('#username').val(null).trigger('change');
                                    
                            setTimeout(function () {
                                hideElementById("assistantMessage");
                            }, 2000);      
                        }
                                
                        else if (res.status === 500) {
                            $('#assistantMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">' + res.message + '</p>');
                                    
                            setTimeout(function () {
                                hideElementById("assistantMessage");
                            }, 2000);
                        }
                    },
                            
                    error: function (xhr, status, error) {
                        $('#assistantMessage').html('<p class="fw-bold" style="text-align: center; color: red; display:block;">An error occurred while processing your request.</p>');
                                
                        setTimeout(function () {
                            hideElementById("assistantMessage");
                        }, 2000);
                                
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
                    
            // Delete Assistant
            $('#assistantTable').on('click', '#deleteAss', function (e) {
                e.preventDefault();
                
                var row = $(this).closest('tr');
                var assistantId = row.data('id');
                
                $.ajax({
                    type: "POST",
                    url: "technicianPopupModalAllIndex.php",
                    data: {id: assistantId},
            
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        
                        if (res.status == 200) {
                            row.remove();
                        }
                        
                        else {
                            console.log("Error deleting assistant.");
                        }
                    },
                    
                    error: function (xhr, status, error) {
                        console.error("Error deleting assistant:", status, error);
                    }
                });
            });
        </script>
    </body>
</html>