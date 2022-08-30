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

<html lang="en">

<head>
<meta name="keywords" content="" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
<link href="css/technicianmain.css"rel="stylesheet" />
<script src="js/testing.js" type="text/javascript"></script>	
</head>

<style>
 
.status{
  float:none;
}

</style>

<body>
<form id="technicianupdate_form" method="post" class="row g-3">
<input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
  
  <div class="col-md-6" style="width: 70%;">
  <label for="jobpriority" class="form-label">Job Priority</label>
  <input type="text" class="form-control" id="jobpriority" value="<?php echo $row['job_priority']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6" style="width: 70%;">
  <label for="jobordernumber" class="form-label">Job Order Number</label>
  <input type="text" class="form-control" id="jobordernumber" value="<?php echo $row['job_order_number']?>" style="background-color: white;" readonly>
  </div>
  
  <div class="col-md-6" style="width: 70%;">
  <label for="jobname" class="form-label">Job Name</label>
  <input type="text" class="form-control" id="jobname" value="<?php echo $row['job_name']?>" style="background-color: white;" readonly>
  </div> 
  
  <div class="col-md-6" style="width: 70%;">
  <label for="jobdescription" class="form-label">Job Description</label>
  <input type="text" class="form-control" id="jobdescription" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
  </div> 
  
  <div class="col-md-6" style="width: 70%;">
  <label for="requesteddate" class="form-label">Requested Date</label>
  <input type="date" class="form-control" id="requesteddate" value="<?php echo $row['requested_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6" style="width: 70%;"> 
  <label for="deliverydate" class="form-label">Delivery Date</label>
  <input type="date" class="form-control" id="deliverydate" value="<?php echo $row['delivery_date']?>" style="background-color: white;" readonly>
  </div>   
  
  <div class="col-md-6" style="width: 70%;">
  <label for="customerpic" class="form-label">Customer PIC</label>
  <input type="text" class="form-control" id="customerpic" value="<?php echo $row['customer_PIC']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6" style="width: 70%;">
  <label for="customergrade" class="form-label">Customer Grade</label>
  <input type="text" class="form-control" id="customergrade" value="<?php echo $row['customer_grade']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-12" style="width: 70%;">
  <label for="customeraddress" class="form-label">Customer Address</label>
  <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
  <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-12" style="width: 70%;">
  <label for="customername" class="form-label">Customer Name</label>
  <input type="text" class="form-control" id="customername" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
  </div> 

  <div class="col-md-6" style="width: 70%;">
  <label for="contactnumber" class="form-label">Contact Number</label>
  <input type="text" class="form-control" id="contactnumber" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
  </div>   

  <div class="col-md-6" style="margin-top: 23px;width: 70%;">
  <label for="contactnumber" class="form-label"></label>
	<input type="text" class="form-control" id="contactnumber" value="<?php echo $row['cust_phone2']?>" style="background-color: white;" readonly>
  </div>   
   
  <div class="col-md-6" style="width: 70%;">
  <label for="brand" class="form-label">Machine Brand</label><br>
  <select disabled style="color: black; height: 33px; width: 135px; border-radius: 4px;" id="brand" required>
  <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['machine_brand']; ?></option>
  </select>
  <input type="hidden" id="brand_id" name="brand_id" value="<?php echo $row['brand_id']?>" readonly >  
  <input type="hidden" id="brandname" name="machine_brand" value="<?php echo $row['machine_brand']?>" readonly >  
  </div>

 <div class="col-md-6" style="margin-top: 23px;width: 70%;">
  <label for="type" class="form-label"> Machine Type</label><br>
  <select disabled style="color: black; height: 33px; width: 162px; border-radius: 4px;" class="form-select" id="type" required>
  <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
  </select>
  <input type="hidden" id="type_id" name="type_id" value="<?php echo $row['type_id']?>" readonly >  
  <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" readonly >  
  </div> 
    
  <div class="col-md-12" style="margin-top: 11px;">
  <label for="" class="form-label">Machine Name</label>
  <input type="text" class="form-control" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>" style="background-color: white;width: 331px;" readonly>
  </div> 

  <div class="CodeDropdown" style="width: 70%; padding-left: 18px;padding-top: 9px;margin-bottom: 20px; color: black;">
  <label for="sn" class="form-label"> Machine Serial Number </label><br>
  <select disabled style="color: black; width: 300px; height: 43px;" id="serialnumbers" onchange="GetMachine(this.value)">
  <option value="<?php echo $row['serialnumber']?>"><?php echo $row['serialnumber']?></option>
  <option value="Add Serial Number" style="color:mediumblue;">Add Serial Number</option>

  <option value="<?php echo $row['machine_id']; ?>"><?php echo $row['serialnumber']; ?></option>

  </select>
  <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']?>">  
  <input type="hidden" style="width: 300px; height: 33px;" id="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">  
  <input type="hidden" id="machine_code" name="machine_code" value="<?php echo $row['machine_code']?>">
  </div> 

  <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        

 
  </form>
            
  <?php } ?>
  <?php } } ?>

 
</body>
</html>