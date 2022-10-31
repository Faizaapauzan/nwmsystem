<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
	  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
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
  
  <form class="form" id="assigntechnician_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="customer_name" class="customer_name" value="<?php echo $row['customer_name'] ?>">
    <input type="hidden" name="requested_date" class="requested_date" value="<?php echo $row['requested_date'] ?>">
    <input type="hidden" name="support" class="support" value="<?php echo $row['support'] ?>">
    
    <label for="job_assign">Job Assign To :</label>
    <p class="control"><b id="assignupdatetechnicianmessage"></b></p>
    <div class="assign" style="display:flex;">
    <select class="form-control" id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
    
      <?php
          include "dbconnect.php";  // Using database connection file here
          $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE technician_rank = '1st Leader' AND tech_avai = '0'
          OR
          technician_rank = '2nd Leader' AND tech_avai = '0'
          OR
          staff_position='Storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 
          while($data = mysqli_fetch_array($records))
            {
              echo "<option class='" . $data['tech_avai']."' value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
              // echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
            }	
      ?>
      
      <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
      <input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
      <input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>
      <input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>      
    
    </select>
    
    <?php
        $DateAssign = date("Y.m.d");
        $_SESSION['storeDate'] = $DateAssign; 
    ?>
    
    <input type="hidden" name="DateAssign" id="DateAssign" value="<?php echo $_SESSION["storeDate"] ?>" readonly>
    
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <input style="border:none; background-color: #081d45;" type="button" onclick="saveJobUpdate();" class="btn btn-primary" id="technicianassign" name="technicianassign" value="Update" />
    </div>
  </form>

         <script>
              $(document).ready(function () {
                $('#technicianassign').click(function () {
                  var data = $('#assigntechnician_form').serialize() + '&technicianassign=technicianassign';
                  $.ajax({
                          url: 'assigntechindex.php',
                          type: 'post',
                          data: data,
                          success: function(response)
                            {
                              var res = JSON.parse(response);
                                        console.log(res);
                              if(res.success == true)
                              $('#assignupdatetechnicianmessage').html('<span style="color: green">Job Assigned!</span>');
                              else
                              $('#assignupdatetechnicianmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                            }
                        });
                  });
              });
         </script>
         
  <!-- ASSIGN ASSISTANT -->
  <form class="form" id="assignassistant_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="customer_name" class="customer_name" value="<?php echo $row['customer_name'] ?>">
    <input type="hidden" name="machine_name" class="machine_name" value="<?php echo $row['machine_name'] ?>">
    <input type="hidden" name="requested_date" class="requested_date" value="<?php echo $row['requested_date'] ?>">
    
    <div class="assistants" style="padding-top: 20px;" id="multipselect">
        
        <?php
           include 'dbconnect.php';
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              $fetchquery = "SELECT username FROM assistants WHERE jobregister_id='$jobregister_id' ";
              $fetchquery_run = mysqli_query($conn, $fetchquery);
              $JobAssistant = [];
              
              foreach($fetchquery_run as $fetchrow)
                {
                  $JobAssistant[] = $fetchrow['username'];
                }
            }
        ?>
        
        <br/>
        
        <?php
            //include connection file
            include_once("dbconnect.php");
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              $sql = "SELECT * FROM `assistants` WHERE  jobregister_id ='$jobregister_id'";
              $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
            }
        ?>
        
        <label style="color: #22304d;" for="assistant">Select Assistant :</label>
        <table style="box-shadow: 0 5px 10px #f7f7f7; margin-left: -6px; margin-top: -31px;" class="table" width="60%" cellspacing="0">
        <thead>
          <tr>
            <th>

            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($queryRecords as $res) :?>
            <tr data-row-id="<?php echo $res['id'];?>">
            <td><b><?php echo $res['username'];?></b></td>
            <td><span style="color: red" class='deleteasst' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
            </tr>
          <?php endforeach;?>
        </tbody>
        </table>
        
        <select name="assistant[]" class="form-control multiple-select" multiple="multiple">
		        
          <?php
              $query = "SELECT staffregister_id, username, staff_group, technician_rank, tech_avai FROM staff_register 
                        WHERE staff_group = 'Technician' AND tech_avai = '0'ORDER BY staffregister_id ASC";
              $query_run = mysqli_query($conn, $query);
              if(mysqli_num_rows($query_run) > 0)
                {
                  foreach ($query_run as $rowstaff){
          ?>
          
          <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option>
          
          <?php
              }
            }
            else
              {
                echo "No Record Found";
              }
          ?>

        </select>
        
        <script>
            $("#multipselect").on('change', function () {
              $(".multiple-select").select2({
                //maximumSelectionLength: 2
              });
            });
        </script>
        
    </div>
    
    <div style="margin-left: 255px;margin-top: 20px;" class="updateBtn">
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <input style="margin-left: -255px; border:none; background-color: #081d45;" type="button" class="btn btn-primary" id="updateassign" name="updateassign" value="Update" />
    </div>
    
    <p class="control"><b id="assigntechnicianmessage"></b></p>	 	 
  </form>
  
  <br>
  
  <?php } } ?>
  
  <?php } ?>
  
  <script>
      $(document).ready(function(){
        $("#jobassignto").on("change",function(){
          var GetValue=$("#jobassignto").val();
          $("#jobassign").val(GetValue);
        });
      });
  </script>
  
  <script>
      $(document).ready(function(){
        // Delete
        $('.deleteasst').click(function(){
          var el = this;
          // Delete id
          var deletedid = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
            // AJAX Request
            $.ajax({
                    url: 'delete-assistant.php',
                    type: 'POST',
                    data: { id:deletedid },
                    success: function(response){
                      if(response == 1){
                        // Remove row from HTML Table
                        // $(el).closest('td').css('background','tomato');
                        $(el).closest('tr').fadeOut(800,function(){
                          $(this).remove();
                        });
                      }
                      else
                      {
                        alert('Invalid ID.');
                      }
                    }
                  });
          }
        });
      });
  </script>
  
  <script>
      // onkeyup event will occur when the user
		  // release the key and calls the function
		  // assigned to this event
		  function GetJobAss(str) {
        if (str.length == 0) {
          document.getElementById("username").value = "";
          document.getElementById("technician_rank").value = "";
          document.getElementById("staff_position").value = "";
          return;
        }
        
        else {
          // Creates a new XMLHttpRequest object
				  var xmlhttp = new XMLHttpRequest();
				  xmlhttp.onreadystatechange = function () {
            // Defines a function to be called when
					  // the readyState property changes
            if (this.readyState == 4 && this.status == 200) {
              // Typical action to be performed
						  // when the document is ready
              var myObj = JSON.parse(this.responseText);
              // Returns the response data as a
						  // string and store this array in
						  // a variable assign the value
						  // received to first name input field
              document.getElementById
              ("username").value = myObj[0];
              // Assign the value received to
              // last name input field
              document.getElementById(
                "technician_rank").value = myObj[1];
                document.getElementById(
                "staff_position").value = myObj[2];
              }
            };
            // xhttp.open("GET", "filename", true);
            xmlhttp.open("GET", "fetchtechnicianrank.php?staffregister_id=" + str, true);
            // Sends the request to the server
            xmlhttp.send();
          }
        }
  </script>
  
  <script>
    $(document).ready(function () {
      $('#updateassign').click(function () {
        var data = $('#assignassistant_form').serialize() + '&updateassign=updateassign';
        $.ajax({
                url: 'assignleaderindex.php',
                type: 'post',
                data: data,
                success: function(response)
                  {
                    var res = JSON.parse(response);
                              console.log(res);
                    if(res.success == true)
                    $('#assigntechnicianmessage').html('<span style="color: green">Assistant Saved!</span>');
                    else
                    $('#assigntechnicianmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                  }
                });
      });
    });
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>

        