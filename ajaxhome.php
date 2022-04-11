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


 <form action="homeindex.php" method="post" style="display: contents;">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

     <div class="input-box">
            <label for="">Job Priority</label>
            <input type="text" class="job_priority" name="job_priority" value="<?php echo $row['job_priority']?>">
        </div>

        <div class="input-box">
            <label for="">Job Order Number</label>
            <input type="text" class="job_order_number" name="job_order_number" value="<?php echo $row['job_order_number']?>">
        </div>
        
        <div class="input-box">
            <label for="">Job Name</label>
            <input type="text" class="job_name" name="job_name" value="<?php echo $row['job_name']?>">
        </div>

        <div class="input-box">
            <label for="">Requested date</label>
            <input type="date" class="requested_date" name="requested_date" value="<?php echo $row['requested_date']?>">
        </div>

        <div class="input-box">
            <label for="">Delivery date</label>
            <input type="date" class="delivery_date" name="delivery_date" value="<?php echo $row['delivery_date']?>">
        </div>

        <div class="input-box">
            <label for="">Customer Name</label>
            <input type="text" class="customer_name" name="customer_name" value="<?php echo $row['customer_name']?>">
        </div>

        <div class="input-box">
            <label for="">Customer Grade</label>
            <input type="text" class="customer_grade" name="customer_grade" value="<?php echo $row['customer_grade']?>"> 
        </div>
       
        <div class="input-box">
            <label for="">Customer PIC</label>
            <input type="text" class="customer_PIC" name="customer_PIC" value="<?php echo $row['customer_PIC']?>">
        </div>

         <div class="input-box-address">
            <label for="">Customer Address</label>
            <input type="text" class="cust_address1" name="cust_address1" value="<?php echo $row['cust_address1']?>">
            <input type="text" class="cust_address2" name="cust_address2" value="<?php echo $row['cust_address2']?>">
            <input type="text" class="cust_address3" name="cust_address3" value="<?php echo $row['cust_address3']?>">
            <br/><br/>
        </div>

        <div class="input-box">
            <label for="">Contact Number 1</label>
            <input type="text" class="cust_phone1" name="cust_phone1" value="<?php echo $row['cust_phone1']?>">
        </div>

        <div class="input-box">
            <label for="">Contact Number 2</label>
            <input type="text" class="cust_phone2" name="cust_phone2" value="<?php echo $row['cust_phone2']?>">
        </div>

        <div class="input-box">
            <label for="">Machine Name</label>
            <input type="text" class="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>">
        </div>

        <div class="input-box">
            <label for="">Machine Type</label>
            <input type="text" class="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>">
        </div>

        <div class="input-box">
            <label for="">Machine Brand</label>
            <input type="text" class="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>">
        </div>

        <div class="input-box">
            <label for="accessories_required"  class="accessories_required">Accessories Required</label>
            <select id="accessories_required" name="accessories_required">
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

   <div class="input-box">
            <label for="job_assign" class="job_assign">Job Assign to:</label>
             <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, technician_rank FROM staff_register WHERE technician_rank = '1st Leader' OR technician_rank = '2nd Leader' OR staff_position='storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
        }	
    ?></select>
    <input type="hidden" name="job_assign" id='jobassign' value="<?php echo $row['job_assign']?>" onchange="GetJobAss(this.value)" readonly>
    </div>


      <div class="input-box">
        <label for="Job_assistant"  class="Job_assistant">Assistant:</label>
        <select id="jobassistantto" name="Job_assistant" onchange="GetAssistant(this.value)"> <option value=""> <?php echo $row['Job_assistant']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position FROM staff_register WHERE staff_position = 'technician' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']."</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="Job_assistant" id='assistant' value="<?php echo $row['Job_assistant']?>" onchange="GetAssistant(this.value)" readonly>
      </div>

        <div class="input-box">
            <label for="">Job Description</label>
            <textarea name="job_description" class="job_description" rows="3" cols="100" style="width: 300px; height: 63px;"><?php echo $row['job_description']?></textarea>
        </div>

        <div class="input-box">
            <label for="job_cancel"  class="job_cancel">Cancel Job:</label>
            <select id="job_cancel" name="job_cancel">
                <option value='' <?php if ($row['job_cancel'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value='YES' <?php if ($row['job_cancel'] == 'YES') {
                    echo "SELECTED";
                } ?>>YES</option>
            </select>
        </div>
         
         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         <button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>
    </form>
            
           
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

        