<?php
session_start();

?>

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

    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
     <div class="input-box">
            <label for="">Job Priority</label>
            <input type="text" class="job_priority" name="job_priority" value="<?php echo $row['job_priority']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Job Order Number</label>
            <input type="text" class="job_order_number" name="job_order_number" value="<?php echo $row['job_order_number']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Job Name</label>
            <input type="text" class="job_name" name="job_name" value="<?php echo $row['job_name']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Requested date</label>
            <input type="date" class="requested_date" name="requested_date" value="<?php echo $row['requested_date']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Delivery date</label>
            <input type="date" class="delivery_date" name="delivery_date" value="<?php echo $row['delivery_date']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Customer Name</label>
            <input type="text" class="customer_name" name="customer_name" value="<?php echo $row['customer_name']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Customer Grade</label>
            <input type="text" class="customer_grade" name="customer_grade" value="<?php echo $row['customer_grade']?>" readonly> 
        </div>
         <div class="input-box">
            <label for="">Job Description</label>
            <textarea name="job_description" class="job_description" rows="3" cols="20" readonly><?php echo $row['job_description']?></textarea>
        </div>
       <div class="input-box-address">
            <label for="">Customer Address</label>
            <input type="text" class="cust_address1" name="cust_address1" value="<?php echo $row['cust_address1']?>" readonly>
            <input type="text" class="cust_address2" name="cust_address2" value="<?php echo $row['cust_address2']?>" readonly>
            <input type="text" class="cust_address3" name="cust_address3" value="<?php echo $row['cust_address3']?>" readonly>
            <br/><br/>
        </div>
        <div class="input-box">
            <label for="">Customer PIC</label>
            <input type="text" class="customer_PIC" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Contact Number 1</label>
            <input type="text" class="cust_phone1" name="cust_phone1" value="<?php echo $row['cust_phone1']?>" readonly>
        </div>
         <div class="input-box">
            <label for="">Contact Number 2</label>
            <input type="text" class="cust_phone2" name="cust_phone2" value="<?php echo $row['cust_phone2']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Name</label>
            <input type="text" class="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Type</label>
            <input type="text" class="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Brand</label>
            <input type="text" class="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>" readonly> 
        </div>
            
                    <?php

            } ?>

     
     
    <?php
        }
    }
    ?>