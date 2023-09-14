<?php session_start(); ?>

<?php
    
    include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];

      $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
      $query_run = mysqli_query($conn, $query);
        if ($query_run) {
          while ($row = mysqli_fetch_array($query_run)) {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    
    
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
    
    <script src="js/testing.js" type="text/javascript"></script>
  </head>
  
  <style>
    .status{float:none;}
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
      
      <div class="col-md-12" style="background-color: white;width: 331px;">
        <label for="customeraddress" class="form-label">Customer Address</label>
        <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	      <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
        <input type="text" class="form-control" id="customeraddress" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
      </div>
      
      <div class="col-md-12">
        <label for="customername" class="form-label">Customer Name</label>
        <input type="text" class="form-control" id="customername" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
      </div>
      
      <div class="col-md-6" style="width: 70%;">
        <label for="contactnumber" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="contactnumber" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
      </div>
      
      <div class="col-md-6" style="margin-top: 4px;width: 70%;">
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
      
      <div class="col-md-6" style="margin-top: 4px; width: 70%;">
        <label for="type" class="form-label"> Machine Type</label><br>
        <select disabled style="color: black; height: 33px; width: 162px; border-radius: 4px;" class="form-select" id="type" required>
          <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
        </select>
        <input type="hidden" id="type_id" name="type_id" value="<?php echo $row['type_id']?>" readonly >  
        <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" readonly >  
      </div>
      
      <div class="col-md-12" style="margin-top: 11px; width: 331px;">
        <label for="" class="form-label">Machine Name</label>
        <input type="text" class="form-control" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>" style="background-color: white;width: 331px;">
      </div>
      
      <div class="CodeDropdown" style="padding-left: 18px;padding-top: 9px;width: 331px;">
        <label for="sn" class="form-label"> Machine Serial Number </label><br>
        <select style="width: 300px; height: 43px;" id="serialnumbers" onchange="GetMachine(this.value)">
          <option value="<?php echo $row['serialnumber']?>"><?php echo $row['serialnumber']?></option>
          <option value="Add Serial Number" style="color:mediumblue;">Add Serial Number</option>
              <?php 
                  
                  include 'dbconnect.php';
                  
                  if (isset($_POST['type_id']) && isset($_POST['customer_name'])) {
                    $customer_name =$_POST['customer_name'];
                    $type_id =$_POST['type_id'];
                  
                  $query = ("SELECT * FROM machine_list WHERE type_id ='$type_id' AND customer_name ='$customer_name'");
                  
                  $query_run = mysqli_query($conn, $query);
                  
                  while ($row = mysqli_fetch_array($query_run)) {
              
              ?>
          <option value="<?php echo $row['machine_id']; ?>"><?php echo $row['serialnumber']; ?></option>
              <?php } } ?>
        </select>
        <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']?>">
        <input type="hidden" id="machine_code" name="machine_code" value="<?php echo $row['machine_code']?>">
        
        <input type="text" style="width: 300px; height: 33px;" id="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">
      </div> 
      
      <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
      
      <div style="margin-left: 270px;margin-top: 20px;" class="updateBtn">
        <input type="button" style="color: white;background-color: #081d45;border-color: #081d45;margin-bottom: 20px;" class="btn btn-primary" id="updatetechnician" name="updatetechnician" onclick="updtMchn();" value="Update" />
      </div>
      
      <p class="control" style="margin-left: 20px; margin-top: -28px;"><b id="updatetechnicianmessage"></b></p>
    </form>
    
<?php } } } ?>

<!-- UPDATE FORM -->
<script>
  $(document).ready(function () {
    $('#updatetechnician').click(function () {
      var data = $('#technicianupdate_form').serialize() + '&updatetechnician=updatetechnician';
      $.ajax({
        url: 'ajaxtechnicianindex.php',
        type: 'post',
        data: data,
        success: function(response) {
          var res = JSON.parse(response);
          console.log(res);
          if(res.success == true)
            $('#updatetechnicianmessage').html('<span style="color: green">Successfully Updated!</span>');
          else
            $('#updatetechnicianmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
        }
      });
    });
  });
</script>
  
<!-- Update machine name in assistant table -->
<script type="text/javascript">
  function updtMchn() {
    var jobregister_id = $('input[name=jobregister_id]').val();
    var machine_name = $('input[name=machine_name]').val();
    
    if(
      jobregister_id!='' || jobregister_id=='',
        machine_name!='' || machine_name=='') {
          
          var formData = {jobregister_id:jobregister_id,
                            machine_name:machine_name};
          
          $.ajax({
            url:"machineassistant.php",
            type:'POST',
            data: formData,
            success: function(response) {
              var res = JSON.parse(response);
              console.log(res);
            }
          });
        }
  } 
</script>

<!-- ADD INPUT SERIAL NUMBER -->
<script>
  $(document).ready(function() {
    $('#serialnumber').hide();
    $("#serialnumbers").change(function() {
      var val = $(this).val();
      if (val == 'Add Serial Number') {
        $('#serialnumber').show();
      } 
      else {
        $('#serialnumber').hide();
      }
    }).change();
  });
</script>

<!-- SEARCH DROPDOWN SERIAL NUMBER -->
<script> $(document).ready(function(){$("#serialnumbers").select2();});</script>

<!-- AUTO FETCH MACHINE DETAILS FROM DROPDOWN -->
<script>
  function GetMachine(str) {
    if (str.length == 0) {
      document.getElementById("machine_id").value = "";
      document.getElementById("serialnumber").value = "";
      document.getElementById("machine_code").value = "";
      document.getElementById("machine_name").value = "";
      return;
    }
    
    else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          
          var myObj = JSON.parse(this.responseText);
          
          document.getElementById("machine_id").value = myObj[0];
          document.getElementById("serialnumber").value = myObj[1];
          document.getElementById("machine_code").value = myObj[2];
          document.getElementById("machine_name").value = myObj[3];
        }
      };
      
      xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
      xmlhttp.send();
    }
  }
</script>

</body>
</html>