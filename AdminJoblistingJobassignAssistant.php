<?php
    session_start();

    date_default_timezone_set("Asia/Kuala_Lumpur");

    $today_date = date("d-m-Y");
    $_SESSION['storeDate'] = $today_date; 
?>

<!DOCTYPE html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

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
    
    <!-- ASSIGN TECHNICIAN -->
    <form id="assignupdate_form" method="post">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <label for="job_assign">Job Assign to:</label><br />
        
        <div class="input-box" style="display:flex; width: 541px">
            <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)">
                <option value=""><?php echo $row['job_assign']?></option> 
                    
                    <?php
                        include "dbconnect.php";
                        
                        $records = mysqli_query($conn, "SELECT * FROM staff_register WHERE 
                                                        technician_rank = '1st Leader' AND tech_avai = '0'
                                                            OR
                                                        technician_rank = '2nd Leader' AND tech_avai = '0'
                                                            OR
                                                        staff_position='Storekeeper' AND tech_avai = '0' ORDER BY staffregister_id ASC");  // Use select query here
                        echo "<option></option>";
                        
                        while($data = mysqli_fetch_array($records))
                            {echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." </option>";}	
                    ?> 
                
                <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
                <input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
                <input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>
                <input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>
            </select> 
            
            <?php if (isset($_SESSION["username"])) { ; } ?> 
            <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
            <input type="button" style="color: white; background-color: #081d45; height: 46px; margin-top: -1px;  padding-left: 2px; width: 145px;" class="btn btn-primary" id="technicianassign" name="technicianassign" value="Update" />
        </div>
        <p style="padding-left: 20px;"><b id="assignupdateadminmessage"></b></p>
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
                        if (res.success == true) $('#assignupdateadminmessage').html('<span style="color: green">Job Assigned!</span>');
                        else $('#assignupdateadminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                    }
                });
            });
        });
    </script>
    <!-- ASSIGN TECHNICIAN -->
    
    <!-- ASSIGN ASSISTANT -->
    <form class="form" id="adminassistant_form" method="post" style="margin-left: 20px;">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        <input type="hidden" name="ass_date" value="<?php echo $_SESSION["storeDate"] ?>">
        <input type="hidden" name="techupdate_date" value="<?php echo $_SESSION["storeDate"] ?>">
        <input type="hidden" name="tech_leader" value="<?php echo $row['job_assign'] ?>">
        <input type="hidden" name="cust_name" value="<?php echo $row['customer_name'] ?>">
        <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
        <input type="hidden" name="machine_name" value="<?php echo $row['machine_name'] ?>">
        
        <div id="multipleassist"> 
            
            <?php
                include 'dbconnect.php';
                
                if (isset($_POST['jobregister_id'])) {
                    
                    $jobregister_id =$_POST['jobregister_id'];
                    
                    $fetchquery = "SELECT * FROM assistants WHERE jobregister_id='$jobregister_id' ";
                    $fetchquery_run = mysqli_query($conn, $fetchquery);
                    $JobAssistant = [];
                    foreach($fetchquery_run as $fetchrow)
                        {$JobAssistant[] = $fetchrow['username'];}
                }
            ?> 
            
            <br /> 
            
            <?php
                include_once("dbconnect.php");
                
                if (isset($_POST['jobregister_id'])) {
                    $jobregister_id =$_POST['jobregister_id'];
                    $sql = "SELECT * FROM assistants WHERE  jobregister_id ='$jobregister_id'";
                    $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
                }
            ?> 
            
            <label for="assistant" style="margin-left:-19px;">Select Assistant :</label>
            <table style="margin-bottom:20px; margin-left:-50px; box-shadow: none; width:100%">
                <tbody> 
                    <?php foreach($queryRecords as $res) :?> 
                        <tr data-row-id="<?php echo $res['id'];?>">
                            <td><b><?php echo $res['username'];?></b></td>
                            <td><span style="color: red" class='deleteassa' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                        </tr> 
                    <?php endforeach;?> 
                </tbody>
            </table>
            
            <div class="input-box" style="width:100%">
                <select name="username[]" class="multiple-assistant" multiple="multiple" style="height: max-content; margin-left:-17px; width:100%"> 
                    
                    <?php
                        $query = "SELECT * FROM staff_register 
                                  WHERE staff_group = 'Technician' AND tech_avai = '0' 
                                  ORDER BY staffregister_id ASC";
                        
                        $query_run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach ($query_run as $rowstaff) {
                    ?> 
                    
                    <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option> 
                    
                    <?php } } else {echo "No Record Found";} ?> 
                    
                </select>
                
                <script>
                    $("#multipleassist").on('change', function() {
                        $(".multiple-assistant").select2({});
                    });
                </script>
            </div>
            
            <div class="buttonUpdate" style="display: flex;flex-direction: row-reverse;"> 
            <?php if (isset($_SESSION["username"])) { ; } ?> 
            <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                <div>
                    <p class="control"><b id="assignadminmessage"></b></p>
                </div>
            <input type="button" style="color: white;background-color: #081d45;height: 36px;margin-top: 33px; width: 100px; border-radius: 9px;" id="updateassign" name="updateassign" value="Update" onclick="updateASS();" />
            </div>
    </form>
    
    <br> 
    
    <?php } } } ?> 
    
    <script>
        $(document).ready(function() {
            $('#updateassign').click(function() {
                var data = $('#adminassistant_form').serialize() + '&updateassign=updateassign';
                $.ajax({
                    url: 'assignleaderindex.php',
                    type: 'post',
                    data: data,
                    success: function(response) {
                        var res = JSON.parse(response);
                        console.log(res);
                        if (res.success == true) $('#assignadminmessage').html('<span style="color: green;margin-left: -116px;">Update Saved!</span>');
                        else $('#assignadminmessage').html('<span style="color: red;margin-left: -116px;">Data Cannot Be Saved</span>');
                    }
                });
            });
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $('#updateassign').click(function() {
                var data = $('#adminassistant_form').serialize() + '&updateassign=updateassign';
                $.ajax({
                    url: 'assistantupdate.php',
                    type: 'post',
                    data: data,
                    success: function(response) {
                        var res = JSON.parse(response);
                        console.log(res);
                        if (res.success == true) $('#assignadminmessage').html('<span style="color: green;margin-left: -116px;">Update Saved!</span>');
                        else $('#assignadminmessage').html('<span style="color: red;margin-left: -116px;">Data Cannot Be Saved</span>');
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
        $(document).ready(function() {
            $('.deleteassa').click(function() {
                var el = this;
                var deletedid = $(this).data('id');
                var confirmalert = confirm("Are you sure?");
                if (confirmalert == true) {
                    // AJAX Request
                    $.ajax({
                        url: 'delete-assistant.php',
                        type: 'POST',
                        data: {id: deletedid},
                        success: function(response) {
                            if (response == 1) {
                                $(el).closest('tr').fadeOut(800, function() {
                                    $(this).remove();
                                });
                            } 
                            
                            else {alert('Invalid ID.');}
                        }
                    });
                }
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