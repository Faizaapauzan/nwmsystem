<?php session_start(); ?>

<!DOCTYPE html>

<head>

<meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>
    <link href="css/technicianmain.css"rel="stylesheet" />
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	<script src="js/search.js" type="text/javascript"></script>

</head>

<style>
    .OFF{
        color: red;
    }
</style>

<body>

<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];


        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>




<!-- <form class="row g-3" action="assignleaderindex.php" method="post"> -->
 <form class="row g-3" id="assigntechnician_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">


  <div class="col-md-6">
    <label for="job_assign">Job Assign To :</label>
  <select disabled class="form-control" id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE technician_rank = '1st Leader' OR technician_rank = '2nd Leader' OR staff_position='storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." " . $data['tech_avai']."</option>";  // displaying data in option menu
            // echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
        }	
    ?>
<input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
<input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
<input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>  
<input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>      
</select>
   
    </div>


 <div class="col-md-6">
    <label for="Job_assistant">Assistant 1:</label>
    <select class="form-control" id="jobassistantto1" onchange="GetAssistant(this.value)">
		<option value=""> <?php echo $row['Job_assistant']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']." " . $data['tech_avai']."</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="Job_assistant" id='assistant1' value="<?php echo $row['Job_assistant']?>" onchange="GetAssistant(this.value)" readonly>
      </div>

      
  <div class="col-md-6">
    <label for="Job_assistant">Assistant 2:</label>
    <select class="form-control" id="jobassistantto2" onchange="GetAssistant(this.value)">
		<option value=""> <?php echo $row['Job_assistant2']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']." " . $data['tech_avai']."</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="Job_assistant2" id='assistant2' value="<?php echo $row['Job_assistant2']?>" onchange="GetAssistant(this.value)" readonly>
      </div>


      
  <div class="col-md-6">
    <label for="Job_assistant">Assistant 3:</label>
    <select class="form-control" id="jobassistantto3" onchange="GetAssistant(this.value)">
		<option value=""> <?php echo $row['Job_assistant3']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']." " . $data['tech_avai']."</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="Job_assistant3" id='assistant3' value="<?php echo $row['Job_assistant3']?>" onchange="GetAssistant(this.value)" readonly>
      </div>


      
  <div class="col-md-6">
    <label for="Job_assistant">Assistant 4:</label>
    <select class="form-control" id="jobassistantto4" onchange="GetAssistant(this.value)">
		<option value=""> <?php echo $row['Job_assistant4']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']." " . $data['tech_avai']."</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="Job_assistant4" id='assistant4' value="<?php echo $row['Job_assistant4']?>" onchange="GetAssistant(this.value)" readonly>
      </div>



  
<br><br>
<div class="col align-self-end" style="margin-top: 41px;" >         		 
         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>	 
          <p class="control"><b id="assigntodotechmessage"></b></p>	 
         <!-- <button type="submit" id="submit" name="updateassign" class="btn btn-primary">Update</button>	 -->
        <input type="button" class="btn btn-primary" id="updateassign" name="updateassign" value="Update" />
         <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
</div>		 
    </form>
	<br>
	
	
           
         <?php
        }
    }
    ?>

              <?php
            } ?>

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
	
$("#jobassistantto1").on("change",function(){
   var GetValue=$("#jobassistantto1").val();
   $("#assistant1").val(GetValue);
});

});
</script>


<script>
$(document).ready(function(){
	
$("#jobassistantto2").on("change",function(){
   var GetValue=$("#jobassistantto2").val();
   $("#assistant2").val(GetValue);
});

});
</script>

<script>
$(document).ready(function(){
	
$("#jobassistantto3").on("change",function(){
   var GetValue=$("#jobassistantto3").val();
   $("#assistant3").val(GetValue);
});

});
</script>

<script>
$(document).ready(function(){
	
$("#jobassistantto4").on("change",function(){
   var GetValue=$("#jobassistantto4").val();
   $("#assistant4").val(GetValue);
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
					if (this.readyState == 4 &&
							this.status == 200) {
						
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
            var data = $('#assigntechnician_form').serialize() + '&updateassign=updateassign';
            $.ajax({
                url: 'assignleaderindex.php',
                type: 'post',
                data: data,
                success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#assigntodotechmessage').html('<span style="color: green">Update Saved!</span>');
                        else
                          $('#assigntodotechmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                      }
            });
        });
    });
</script>



        </body></html>

        