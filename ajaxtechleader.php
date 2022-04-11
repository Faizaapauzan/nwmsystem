<?php
session_start();
?>


<!DOCTYPE html>

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
    <input type="text" class="form-control" id="job_priority" name="job_priority" value="<?php echo $row['job_priority']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6">
    <label for="" class="form-label">Job Order Number</label>
    <input type="text" class="form-control" id="job_order_number" name="job_order_number" value="<?php echo $row['job_order_number']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6">
    <label for="" class="form-label">Job Name</label>
    <input type="text" class="form-control" id="job_name" name="job_name" value="<?php echo $row['job_name']?>" style="background-color: white;" readonly>
  </div>  
  
  <div class="col-md-6">
    <label for="" class="form-label">Requested Date</label>
    <input type="date" class="form-control" id="requested_date" name="requested_date" value="<?php echo $row['requested_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="" class="form-label">Delivery Date</label>
    <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="<?php echo $row['delivery_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="" class="form-label">Customer Name</label>
    <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Customer Grade</label>
    <input type="text" class="form-control" id="customer_grade" name="customer_grade" value="<?php echo $row['customer_grade']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Job Description</label>
    <input type="text" class="form-control" id="job_description" name="job_description" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Customer Address</label>
    <input type="text" class="form-control" id="customer_address1" name="customer_address1" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="customer_address2" name="customer_address2" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
    <input type="text" class="form-control" id="customer_address3" name="customer_address3" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Customer PIC</label>
    <input type="text" class="form-control" id="customer_PIC" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="cust_phone1" name="cust_phone1" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="cust_phone2" name="cust_phone2" value="<?php echo $row['cust_phone2']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="" class="form-label">Machine Name</label>
    <input type="text" class="form-control" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>" style="background-color: white;" readonly>
  </div> 
  
  <div class="col-md-6">
    <label for="" class="form-label">Machine Type</label>
    <input type="text" class="form-control" id="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="" class="form-label">Machine Brand</label>
    <input type="text" class="form-control" id="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>" style="background-color: white;" readonly>
  </div>
  
  
  <div class="col-md-6">
    <label for="accessories_required">Accessories Required</label>
    <select class="form-control" id="accessories_required">
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
    <select class="form-control" id="jobassignto" onchange="GetJobAss(this.value)">
			 <option value=""> <?php echo $row['job_assign']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, technician_rank FROM staff_register WHERE technician_rank = 'Leader' OR technician_rank = 'Assistant Leader' OR staff_position='storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']."</option>";  // displaying data in option menu
        }	
    ?></select>
    <input type="hidden" name="job_assign" id='jobassign' value="<?php echo $row['job_assign']?>" onchange="GetJobAss(this.value)" readonly>
    </div>





  <div class="col-md-6">
    <label for="Job_assistant">Assistant :</label>
    <select class="form-control" id="jobassistantto" onchange="GetAssistant(this.value)">
		<option value=""> <?php echo $row['Job_assistant']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']."</option>";  // displaying data in option menu
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


        </body></html>

        