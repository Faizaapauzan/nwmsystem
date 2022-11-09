<?php 
    session_start();
    $today_date = date("d-m-Y");
    $_SESSION['storeDate'] = $today_date; 
?>

<!DOCTYPE html>
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
    
<form action="supportindex.php" method="post" class="row g-3" id="supportform">

   <!-- hidden input -->
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="support" class="support" value="Support For <?php echo $row['job_assign'] ?>">
    <input type="hidden" name="today_date" class="today_date" value="<?php echo $_SESSION["storeDate"] ?>">
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    
    <div class="col-md-6" style="width: 70%;">
    <label for="jobpriority" class="form-label">Job Priority</label>
    <input type="text" name="job_priority" class="form-control" value="<?php echo $row['job_priority']?>" style="background-color: white;" readonly>
    </div>

    <div class="col-md-6" style="width: 70%;">
    <label for="jobordernumber" class="form-label">Job Order Number</label>
     <div style="display: flex;">
       <input type="text" class="form-control" name="job_order_number" id="job_order_number" value="<?php echo $row['job_order_number']?>" style="background-color: white;" aria-describedby="basic-addon2">
    <button type="button" style="border-radius: 2px; color: white;background-color: #081d45;border-color: #081d45;padding-left: 7px;padding-right: 8px;" onclick="buttonClick();">Click</button>
    <script>
        var i = 0;
        var jobordernumber = document.getElementById('job_order_number').value;
        
        function buttonClick() 
            {
                i++;
                document.getElementById('job_order_number').value = jobordernumber+'-'+i;
            }
    </script>  
    </div>
    </div>

    <div class="col-md-6" style="width: 70%;">
    <label for="jobname" class="form-label">Job Name</label>
    <input type="text" class="form-control" name="job_name" value="<?php echo $row['job_name']?>">
    <input type="hidden" name="job_code" value="<?php echo $row['job_code']?>">
    </div> 

    <div class="col-md-6" style="width: 70%;">
    <label for="jobdescription" class="form-label">Job Description</label>
    <input type="text" class="form-control" name="job_description" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
    </div>

    <div class="col-md-6" style="width: 70%;">
    <label for="requesteddate" class="form-label">Requested Date</label>
    <input type="date" name="requested_date" class="form-control" value="<?php echo $row['requested_date']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-6" style="width: 70%;">
    <label for="deliverydate" class="form-label">Delivery Date</label>
    <input type="date" class="form-control" name="delivery_date" value="<?php echo $row['delivery_date']?>" style="background-color: white;" readonly>
    </div>  

    <div class="col-md-6" style="width: 70%;">
    <label for="customerpic" class="form-label">Customer PIC</label>
    <input type="text" class="form-control" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-6" style="width: 70%;">
    <label for="customergrade" class="form-label">Customer Grade</label>
    <input type="text" class="form-control" name="customer_grade" value="<?php echo $row['customer_grade']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-12" style="background-color: white;width: 331px;">
    <label for="customeraddress" class="form-label">Customer Address</label>
    <input type="text" class="form-control" name="cust_address1" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" name="cust_address2" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
    <input type="text" class="form-control" name="cust_address3" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-12" style="background-color: white;width: 331px;">
    <label for="customername" class="form-label">Customer Name</label>
    <input type="text" class="form-control" name="customer_name" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
    <input type="hidden" name="customer_code" value="<?php echo $row['customer_code']?>">
    </div> 

    <div class="col-md-6" style="width: 70%;">
    <label for="contactnumber" class="form-label">Contact Number</label>
    <input type="text" class="form-control" name="cust_phone1" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
    </div>   

    <div class="col-md-6" style="width: 70%;">
    <label for="contactnumber" class="form-label"></label>
	<input type="text" class="form-control" name="cust_phone2" value="<?php echo $row['cust_phone2']?>" style="background-color: white;" readonly>
    </div> 

       <div class="col-md-6" style="width: 70%;">
    <label for="brand">Machine Brand</label><br>
    <select disabled style="color: black; height: 33px; width: 200px; border-radius: 4px;" id="brand" required>
    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['machine_brand']; ?></option>
    </select>
    <input type="hidden" id="brand_id" name="brand_id" value="<?php echo $row['brand_id']?>" readonly >  
    <input type="hidden" id="brandname" name="machine_brand" value="<?php echo $row['machine_brand']?>" readonly >  
    </div>

   <div class="col-md-6" style="width: 70%;">
    <label for="type"> Machine Type</label><br>
    <select disabled style="color: black; height: 33px; width: 200px; border-radius: 4px;" class="form-select" id="type" required>
    <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
    </select>
    <input type="hidden" id="type_id" name="type_id" value="<?php echo $row['type_id']?>" readonly >  
    <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" readonly >  
    </div> 

    <div class="col-md-12" style="background-color: white;width: 331px;">
    <label for="" class="form-label">Machine Name</label>
    <input type="text" class="form-control" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>" style="background-color: white;">
    <input type="hidden" name="machine_code" value="<?php echo $row['machine_code']?>">
    <input type="hidden" name="machine_id" value="<?php echo $row['machine_id']?>">
    </div> 
  
    <div class="col-md-6" style="width: 70%;">
    <label for="">Machine Serial Number</label>
    <input readonly type="text" style="background-color: white;" class="form-control" name="serialnumber" value="<?php echo $row['serialnumber']?>">
    </div>

    <div class="col-md-6" style="width: 70%;">
    <label for="accessories_required"  class="accessories_required">Accessories Required</label>
    <select class="form-control" type="text" id="accessories_required" name="accessories_required">
    <option value='' <?php if ($row['accessories_required'] == '') { echo "SELECTED"; } ?>></option>
    <option value="Yes" <?php if ($row['accessories_required'] == "Yes") { echo "SELECTED"; } ?>>Yes</option>
    <option value="No" <?php if ($row['accessories_required'] == "No") { echo "SELECTED";} ?>>No</option>
    </select>
    </div>

    <div class="col-md-6" style="width: 70%;">
    <label for="job_cancel"  class="job_cancel">Assign To:</label>
    <select id="jobassignto" class="form-control" name="job_assign" onchange="GetJobAss(this.value)">
      
    <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE 
         technician_rank = '1st Leader' AND tech_avai = '0'
         OR
         technician_rank = '2nd Leader' AND tech_avai = '0'
         OR
         staff_position='storekeeper' AND tech_avai = '0' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." </option>";  // displaying data in option menu
            
        }	
    ?>

            <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
            <input type="hidden" name="job_assign" id='username'>
            <input type="hidden" name="technician_rank" id='technician_rank' readonly>  
            <input type="hidden" name="staff_position" id='staff_position' readonly>
        
          </select>
        
        <?php
            $DateAssign = date("d-m-Y");
            $_SESSION['storeDate'] = $DateAssign; 
        ?>
    
    <input type="hidden" name="DateAssign" id="DateAssign" value="<?php echo $_SESSION["storeDate"] ?>" readonly>
    </div>
    
    <div style="margin-left: 236px;margin-top: 20px;" class="updateBtn">
     <button type="button" id="duplicate" style="background-color: #081d45;border-color: #081d45;margin-left: -218px;" class="btn btn-primary" name="duplicate" value="duplicate" onclick="submitFormSupport();keep();">Request</button>
    </div>
    <p style="margin-top: 19px;margin-left: 14px;" class="control"><b id="messageSupport"></b></p>
    </form>
    
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
		function GetJobAss(str) {
            if (str.length == 0) {
                document.getElementById("username").value = "";
                document.getElementById("technician_rank").value = "";
                document.getElementById("staff_position").value = "";
                return;
            }
            
            else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {
					if (this.readyState == 4 &&
                    this.status == 200) {
						var myObj = JSON.parse(this.responseText);
                        document.getElementById
                        ("username").value = myObj[0];
                        document.getElementById(
                            "technician_rank").value = myObj[1];
                        document.getElementById(
                            "staff_position").value = myObj[2];    
					}
				};
                
                xmlhttp.open("GET", "fetchtechnicianrank.php?staffregister_id=" + str, true);
                xmlhttp.send();
			}
		}
	</script>

<script>
  $(document).ready(function () {
    $('#duplicate').click(function () {
      var data = $('#supportform').serialize() + '&duplicate=duplicate';
      $.ajax({
        url: 'supportindex.php',
        type: 'post',
        data: data,
        success: function(response)
        {
          var res = JSON.parse(response);
                    console.log(res);
                    if(res.success == true)
                    $('#messageSupport').html('<span style="color: green">Update Saved!</span>');
                    else
                    $('#messageSupport').html('<span style="color: red">Data Cannot Be Saved</span>');
        },
        failure: function (jqXHR, textStatus, errorThrown) 
        {
            $('#messageSupport').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
        }
    });
});
});
</script>
    
</body>
</html>
