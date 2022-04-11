<?php
session_start();
?>

<!DOCTYPE html>

<html lang=”en”>


<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>


	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>


	
</head>


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



  <div class="col-md-6">
    <label for="jobpriority" class="form-label">Job Priority</label>
    <input type="text" class="form-control" id="jobpriority" value="<?php echo $row['job_priority']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6">
    <label for="jobordernumber" class="form-label">Job Order Number</label>
    <input type="text" class="form-control" id="jobordernumber" value="<?php echo $row['job_order_number']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6">
    <label for="jobname" class="form-label">Job Name</label>
    <input type="text" class="form-control" id="jobname" value="<?php echo $row['job_name']?>" style="background-color: white;" readonly>
  </div>  
  
  <div class="col-md-6">
    <label for="requesteddate" class="form-label">Requested Date</label>
    <input type="date" class="form-control" id="requesteddate" value="<?php echo $row['requested_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="deliverydate" class="form-label">Delivery Date</label>
    <input type="date" class="form-control" id="deliverydate" value="<?php echo $row['delivery_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="customername" class="form-label">Customer Name</label>
    <input type="text" class="form-control" id="customername" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="customergrade" class="form-label">Customer Grade</label>
    <input type="text" class="form-control" id="customergrade" value="<?php echo $row['customer_grade']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="jobdescription" class="form-label">Job Description</label>
    <input type="text" class="form-control" id="jobdescription" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="customeraddress" class="form-label">Customer Address</label>
    <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
    <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="customerpic" class="form-label">Customer PIC</label>
    <input type="text" class="form-control" id="customerpic" value="<?php echo $row['customer_PIC']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="contactnumber" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="contactnumber" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="contactnumber" value="<?php echo $row['cust_phone2']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6">
    <label for="machinename" class="form-label">Machine Name</label>
    <input type="text" class="form-control" id="machinename" value="<?php echo $row['machine_name']?>" style="background-color: white;" readonly>
  </div> 
  
  <div class="col-md-6">
    <label for="machinetype" class="form-label">Machine Type</label>
    <input type="text" class="form-control" id="machinetype" value="<?php echo $row['machine_type']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6">
    <label for="machinebrand" class="form-label">Machine Brand</label>
    <input type="text" class="form-control" id="machinebrand" value="<?php echo $row['machine_brand']?>" style="background-color: white;" readonly>
  </div>   

  <div class="col-md-6">
    <label for="accessories_required">Accessories Required</label>
    <select disabled class="form-control" id="accessories_required" readonly>
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
    <select disabled class="form-control" id="job_assign" readonly>
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

  <div class="col-md-6">
    <label for="Job_assistant">Assistant :</label>
    <select disabled class="form-control" id="Job_assistant" readonly>
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

  <div class="col-md-6">
    <label for="job_description" class="form-label">Job Description</label>
    <input type="text" class="form-control" id="job_description" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
  </div> 
<br>
    <?php if (isset($_SESSION["username"])) ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

</form>  

         <?php
        }
    }
    ?>

              <?php
            } ?> 


</body>

</html>