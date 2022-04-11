<?php
session_start();
?>

<!DOCTYPE html>

<html lang=”en”>

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

 <form action="techleaderindex.php" method="post">
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
            <label for="">Customer PIC</label>
            <input type="text" class="customer_PIC" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" readonly>
        </div>
         <div class="input-box-address">
            <label for="">Customer Address</label>
            <input type="text" class="cust_address1" name="cust_address1" value="<?php echo $row['cust_address1']?>" readonly>
            <input type="text" class="cust_address2" name="cust_address2" value="<?php echo $row['cust_address2']?>" readonly>
            <input type="text" class="cust_address3" name="cust_address3" value="<?php echo $row['cust_address3']?>" readonly>
            <br/><br/>
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
            <textarea type="text" class="machine_name" name="machine_name" rows="3" cols="70" readonly><?php echo $row['machine_name']?></textarea>
        </div>
        <div class="input-box">
            <label for="">Machine Type</label>
            <input type="text" class="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Brand</label>
            <input type="text" class="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>" readonly>
        </div>
        
        <div class="input-box">
            <label for="accessories_required"  class="accessories_required">Accessories Required</label>
            <select id="accessories_required" name="accessories_required" readonly>
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
            <label for="job_assign"  class="job_assign">Job Assign to:</label>
            <select id="job_assign" name="job_assign" readonly>
                <option value='' <?php if ($row['job_assign'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value="Boon" <?php if ($row['job_assign'] == "Boon") {
                    echo "SELECTED";
                } ?>>Boon</option>
                <option value="Hafiz" <?php if ($row['job_assign'] == "Hafiz") {
                    echo "SELECTED";
                } ?>>Hafiz</option>
                <option value="Hamir" <?php if ($row['job_assign'] == "Hamir") {
                    echo "SELECTED";
                } ?>>Hamir</option>
                <option value="Hwa" <?php if ($row['job_assign'] == "Hwa") {
                    echo "SELECTED";
                } ?>>Hwa</option>
                <option value="Isk" <?php if ($row['job_assign'] == "Isk") {
                    echo "SELECTED";
                } ?>>Isk</option>
                <option value="John" <?php if ($row['job_assign'] == "John") {
                    echo "SELECTED";
                } ?>>John</option>
                <option value="Jun Jie" <?php if ($row['job_assign'] == "Jun Jie") {
                    echo "SELECTED";
                } ?>>Jun Jie</option>
                <option value="Razwill" <?php if ($row['job_assign'] == "Razwill") {
                    echo "SELECTED";
                } ?>>Razwill</option>
                <option value="Sahele" <?php if ($row['job_assign'] == "Sahele") {
                    echo "SELECTED";
                } ?>>Sahele</option>
                <option value="Sazaly" <?php if ($row['job_assign'] == "Sazaly") {
                    echo "SELECTED";
                } ?>>Sazaly</option>
                <option value="Teck" <?php if ($row['job_assign'] == "Teck") {
                    echo "SELECTED";
                } ?>>Teck</option>
                <option value="Keong" <?php if ($row['job_assign'] == "Aizat") {
                    echo "SELECTED";
                } ?>>Keong</option>
                <option value="Storekeeper" <?php if ($row['job_assign'] == "Storekeeper") {
                    echo "SELECTED";
                } ?>>Storekeeper</option>
                <option value="Cancel" <?php if ($row['job_assign'] == "Cancel") {
                    echo "SELECTED";
                } ?>>Cancel</option>
                
            </select>
        </div>

        <div class="input-box">
            <label for="Job_assistant"  class="Job_assistant">Assistant:</label>
            <select id="Job_assistant" name="Job_assistant" readonly>
                <option value='' <?php if ($row['Job_assistant'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value="Boon" <?php if ($row['Job_assistant'] == "Boon") {
                    echo "SELECTED";
                } ?>>Boon</option>
                <option value="Hafiz" <?php if ($row['Job_assistant'] == "Hafiz") {
                    echo "SELECTED";
                } ?>>Hafiz</option>
                <option value="Hamir" <?php if ($row['Job_assistant'] == "Hamir") {
                    echo "SELECTED";
                } ?>>Hamir</option>
                <option value="Hwa" <?php if ($row['Job_assistant'] == "Hwa") {
                    echo "SELECTED";
                } ?>>Hwa</option>
            </select>
        </div>

        <div class="input-box">
            <label for="job_description">Job Description</label>
            <textarea name="job_description" class="job_description" rows="3" cols="70" readonly><?php echo $row['job_description']?></textarea>
        </div>


        <?php if (isset($_SESSION["username"])) ?>
        <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         </div>
</form>
           
         <?php
        }
    }
    ?>

              <?php
            } ?>


</body>

</html>