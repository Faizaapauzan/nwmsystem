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




<form class="row g-3" action="techleaderindex.php" method="post">

    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">


  <div class="col-md-6">
    <label for="" class="form-label">Job Priority</label>
    <input type="text" class="form-control" id="job_priority" value="<?php echo $row['job_priority']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6">
    <label for="" class="form-label">Job Order Number</label>
    <input type="text" class="form-control" id="job_order_number" value="<?php echo $row['job_order_number']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6">
    <label for="" class="form-label">Job Name</label>
    <input type="text" class="form-control" id="job_name" value="<?php echo $row['job_name']?>" style="background-color: white;" readonly>
  </div>  
  
  <div class="col-md-6">
    <label for="" class="form-label">Requested Date</label>
    <input type="date" class="form-control" id="requested_date" value="<?php echo $row['requested_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="" class="form-label">Delivery Date</label>
    <input type="date" class="form-control" id="delivery_date" value="<?php echo $row['delivery_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="" class="form-label">Customer Name</label>
    <input type="text" class="form-control" id="customer_name" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Customer Grade</label>
    <input type="text" class="form-control" id="customer_grade" value="<?php echo $row['customer_grade']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Job Description</label>
    <input type="text" class="form-control" id="job_description" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-12">
    <label for="" class="form-label">Customer Address</label>
    <input type="text" class="form-control" id="customer_address1" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="customer_address2" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
    <input type="text" class="form-control" id="customer_address3" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Customer PIC</label>
    <input type="text" class="form-control" id="customer_PIC" value="<?php echo $row['customer_PIC']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="cust_phone1" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="cust_phone2" value="<?php echo $row['cust_phone2']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="" class="form-label">Machine Name</label>
    <input type="text" class="form-control" id="machine_name" value="<?php echo $row['machine_name']?>" style="background-color: white;" readonly>
  </div> 
  
  <div class="col-md-6">
    <label for="" class="form-label">Machine Type</label>
    <input type="text" class="form-control" id="machine_type" value="<?php echo $row['machine_type']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
            <label for=""  class="form-label">Machine Serial Number</label>
            <input type="text" class="form-control" style="background-color: white;" value="<?php echo $row['serialnumber']?>" readonly>
        </div>

  <div class="col-md-6">
    <label for="" class="form-label">Machine Brand</label>
    <input type="text" class="form-control" id="machine_brand" value="<?php echo $row['machine_brand']?>" style="background-color: white;" readonly>
  </div>
  
  
  <div class="col-md-6">
    <label for="accessories_required">Accessories Required</label>
    <select class="form-control" id="accessories_required" name="accessories_required">
                <option value='' <?php if ($row['accessories_required'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value="Yes" <?php if ($row['accessories_required'] == "Yes") {
                    echo "SELECTED";
                } ?>>Yes</option>
                <option value="No" <?php if ($row['accessories_required'] == "No") {
                    echo "SELECTED";
                } ?>>No</option>
    </select>
  </div>  
  

  <div class="col-md-6">
    <label for="job_assign">Job Assign To :</label>
  <select class="form-control" id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
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
    <label for="Job_assistant">Assistant :</label>
    <select class="form-control" id="jobassistantto" onchange="GetAssistant(this.value)">
		<option value=""> <?php echo $row['Job_assistant']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']." " . $data['tech_avai']."</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="Job_assistant" id='assistant' value="<?php echo $row['Job_assistant']?>" onchange="GetAssistant(this.value)" readonly>
      </div>


  <div class="col-md-6">
    <label for="" class="form-label">Job Description</label>
    <input type="text" class="form-control" id="job_description" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
  </div>





  <div class="col-md-6">
    <label for="job_cancel">Cancel Job:</label>
    <select class="form-control" id="job_cancel">
                <option readonly value='' <?php if ($row['job_cancel'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option readonly value='YES' <?php if ($row['job_cancel'] == 'YES') {
                    echo "SELECTED";
                } ?>>YES</option>
    </select>
  </div>  

  
<br><br>
<div class="col align-self-end" >         		 
         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>	 
         <button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>	
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
	
$("#jobassistantto").on("change",function(){
   var GetValue=$("#jobassistantto").val();
   $("#assistant").val(GetValue);
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



        </body></html>

        