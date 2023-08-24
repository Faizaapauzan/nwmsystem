<?php
    session_start();

    date_default_timezone_set("Asia/Kuala_Lumpur");

    $today_date = date("d-m-Y");
    $_SESSION["storeDate"] = $today_date;

    if (isset($_SESSION["username"]))
?>

<!DOCTYPE html>
    <html>
        <body>
            <?php
                
                include "dbconnect.php";
            
                if (isset($_POST["jobregister_id"])) {
                    $jobregister_id = $_POST["jobregister_id"];
                
                    $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
                    $query_run = mysqli_query($conn, $query);
                
                    if ($query_run) {while ($row = mysqli_fetch_array($query_run)) { 
        
            ?>
        
            <!-- ASSIGN TECHNICIAN -->
            <input type="hidden" name="jobregister_id" value="<?php echo $row["jobregister_id"]; ?>">
        
            <label for="job_assign" style="font-size: 15px; font-weight: bold;">Job Assign to: <?php echo $row["job_assign"]; ?></label>
        
            <br>
        
            <!-- ASSIGN ASSISTANT -->
            <form id="adminassistant_form" method="post">
                <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                <input type="hidden" name="ass_date" value="<?php echo $_SESSION["storeDate"] ?>">
                <input type="hidden" name="techupdate_date" value="<?php echo $_SESSION["storeDate"] ?>">
                <input type="hidden" name="tech_leader" value="<?php echo $row['job_assign'] ?>">
                <input type="hidden" name="cust_name" value="<?php echo $row['customer_name'] ?>">
                <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
                <input type="hidden" name="machine_name" value="<?php echo $row['machine_name'] ?>">
            
                <br>
            
                <?php
                
                    include 'dbconnect.php';
                
                    if (isset($_POST['jobregister_id'])) {
                        $jobregister_id =$_POST['jobregister_id'];
                    
                        $fetchquery = "SELECT username FROM assistants WHERE jobregister_id='$jobregister_id' ";
                        $fetchquery_run = mysqli_query($conn, $fetchquery);
                    
                        $JobAssistant = [];
                        foreach($fetchquery_run as $fetchrow){
                            $JobAssistant[] = $fetchrow['username'];
                        }
                    }
                ?>
            
                <?php
                
                    include_once("dbconnect.php");
                
                    if (isset($_POST['jobregister_id'])) {
                        $jobregister_id =$_POST['jobregister_id'];
                    
                        $sql = "SELECT * FROM assistants WHERE jobregister_id ='$jobregister_id'";
                        $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
                    }
            
                ?>
                
                <label style="color: blue; font-size: 15px; font-weight: bold; margin-bottom:10px;" for="assistant">Select Assistant</label>
            
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table border table-borderless table-striped">
                                <tbody>
                                    <?php foreach($queryRecords as $res) :?>
                                    <tr data-row-id="<?php echo $res['id'];?>">
                                        <td><b><?php echo $res['username'];?></b></td>
                                        <td style="text-align: center;"><span style='color: red;' class='deleteassa' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                        <select class="form-select" name="username[]" id="assistant" multiple="multiple">
                            <?php
                        
                                $query = "SELECT * FROM staff_register WHERE staff_group = 'Technician' AND tech_avai = '0' ORDER BY staffregister_id ASC";
                                $query_run = mysqli_query($conn, $query);
                        
                                if(mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $rowstaff){
                            ?>
  
                            <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option>
      
                            <?php } }
                                else {
                                    echo "No Record Found";
                                }
                            ?>
                        </select>
                
                        <script>
                            $(document).ready(function(){
                                $('#assistant').select2({
                                    dropdownParent: $('#adminassistant_form'),
                                    theme: 'bootstrap-5',
                                    placeholder: 'Select Assistant',
                                    width: '100%',
                                });
                            });
                        </script>
                    </div>    
                </div>

                <br>
            
                <div class="buttonUpdate" style="display: flex;flex-direction: row-reverse;">
                    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                
                    <div><p class="control"><b id="assignadminmessage"></b></p></div>
                    <input type="button" style="color: white;background-color: #081d45;height: 36px;margin-top: 33px; width: 100px; border-radius: 9px;" id="updateassign" name="updateassign" value="Update" onclick="updateASS();"/>
                </div>		 
            </form>
        
            <br>
    
            <?php } } } ?>
        
            <script>
                $(document).ready(function(){
                    $("#jobassignto").on("change",function() {
                        var GetValue=$("#jobassignto").val();
                        $("#jobassign").val(GetValue);
                    });
                });
            </script>
    
            <script>
                $(document).ready(function () {
                    $('#updateassign').click(function () {
                        var data = $('#adminassistant_form').serialize() + '&updateassign=updateassign';
                    
                        $.ajax({
                            url: 'assignleaderindex.php',
                            type: 'post',
                            data: data,
                        
                            success: function(response) {
                                var res = JSON.parse(response);
                                console.log(res);
                                if(res.success == true)
                                    $('#assignadminmessage').html('<span style="color: green;margin-left: -116px;">Update Saved!</span>');
                                else
                                    $('#assignadminmessage').html('<span style="color: red;margin-left: -116px;">Data Cannot Be Saved</span>');
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
                            
                                if (res.success == true)
                                    $('#assignadminmessage').html('<span style="color: green;margin-left: -116px;">Update Saved!</span>');
                                else
                                    $('#assignadminmessage').html('<span style="color: red;margin-left: -116px;">Data Cannot Be Saved</span>');
                            }
                        });
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
                                
                                    else {
                                        alert('Invalid ID.');
                                    }
                                }
                            });
                        }
                    });
                });
	        </script>
        </body>
    </html>