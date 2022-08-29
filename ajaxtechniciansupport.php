<?php 
    session_start();
    $today_date = date("Y.m.d");
    $_SESSION['storeDate'] = $today_date; 
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
    
<form action="supportindex.php" method="post" class="row g-3">

   <!-- hidden input -->
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="support" class="support" value="Support">
    <input type="hidden" name="today_date" class="today_date" value="<?php echo $_SESSION["storeDate"] ?>">
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    
    <div class="col-md-6">
    <label for="jobpriority" class="form-label">Job Priority</label>
    <input type="text" name="job_priority" class="form-control" value="<?php echo $row['job_priority']?>" style="background-color: white;" readonly>
    </div>

    <div class="col-md-6">
    <label for="jobordernumber" class="form-label">Job Order Number</label>
    <input type="text" class="form-control" name="job_order_number" id="job_order_number" value="<?php echo $row['job_order_number']?>" style="background-color: white;" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button type="button" style="background-color: #081d45; border-color: #081d45; color: white; padding: 7px 44px; margin: 8px 0; border: none; width: 100%; margin: auto; border-radius: 4px;" onclick="buttonClick();">Click</button>
    <script>
        var i = 0;
        var jobordernumber = document.getElementById('job_order_number');
        
        function buttonClick() 
            {
                i++;
                document.getElementById('job_order_number').value = jobordernumber.value+'-'+i;
            }
    </script>  
    </div>
    </div>

    <div class="col-md-6">
    <label for="jobname" class="form-label">Job Name</label>
    <input type="text" class="form-control" name="job_name" value="<?php echo $row['job_name']?>">
    <input type="hidden" name="job_code" value="<?php echo $row['job_code']?>">
    </div> 

    <div class="col-md-6">
    <label for="jobdescription" class="form-label">Job Description</label>
    <input type="text" class="form-control" name="job_description" value="<?php echo $row['job_description']?>" style="background-color: white;" readonly>
    </div>

    <div class="col-md-6">
    <label for="requesteddate" class="form-label">Requested Date</label>
    <input type="date" name="requested_date" class="form-control" value="<?php echo $row['requested_date']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-6">
    <label for="deliverydate" class="form-label">Delivery Date</label>
    <input type="date" class="form-control" name="delivery_date" value="<?php echo $row['delivery_date']?>" style="background-color: white;" readonly>
    </div>  

    <div class="col-md-6">
    <label for="customerpic" class="form-label">Customer PIC</label>
    <input type="text" class="form-control" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-6">
    <label for="customergrade" class="form-label">Customer Grade</label>
    <input type="text" class="form-control" name="customer_grade" value="<?php echo $row['customer_grade']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-12">
    <label for="customeraddress" class="form-label">Customer Address</label>
    <input type="text" class="form-control" name="cust_address1" value="<?php echo $row['cust_address1']?>" style="background-color: white;" readonly>
	<input type="text" class="form-control" name="cust_address2" value="<?php echo $row['cust_address2']?>" style="background-color: white;" readonly>
    <input type="text" class="form-control" name="cust_address3" value="<?php echo $row['cust_address3']?>" style="background-color: white;" readonly>
    </div> 

    <div class="col-md-12">
    <label for="customername" class="form-label">Customer Name</label>
    <input type="text" class="form-control" name="customer_name" value="<?php echo $row['customer_name']?>" style="background-color: white;" readonly>
    <input type="hidden" name="customer_code" value="<?php echo $row['customer_code']?>">
    </div> 

    <div class="col-md-6">
    <label for="contactnumber" class="form-label">Contact Number</label>
    <input type="text" class="form-control" name="cust_phone1" value="<?php echo $row['cust_phone1']?>" style="background-color: white;" readonly>
    </div>   

    <div class="col-md-6">
    <label for="contactnumber" class="form-label"></label>
	<input type="text" class="form-control" name="cust_phone2" value="<?php echo $row['cust_phone2']?>" style="background-color: white;" readonly>
    </div> 

    <div class="CodeDropdown" style="padding-left: 17px;">
    <label for="brand">Machine Brand</label><br>
    <select disabled style="color: black; height: 33px; width: 200px; border-radius: 4px;" id="brand" required>
    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['machine_brand']; ?></option>
    </select>
    <input type="hidden" id="brand_id" name="brand_id" value="<?php echo $row['brand_id']?>" readonly >  
    <input type="hidden" id="brandname" name="machine_brand" value="<?php echo $row['machine_brand']?>" readonly >  
    </div>

    <div class="CodeDropdown" style="padding-left: 31px;">
    <label for="type"> Machine Type</label><br>
    <select disabled style="color: black; height: 33px; width: 200px; border-radius: 4px;" class="form-select" id="type" required>
    <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
    </select>
    <input type="hidden" id="type_id" name="type_id" value="<?php echo $row['type_id']?>" readonly >  
    <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" readonly >  
    </div> 

    <div class="col-md-12">
    <label for="" class="form-label">Machine Name</label>
    <input type="text" class="form-control" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>" style="background-color: white;width: 425px;">
    <input type="hidden" name="machine_code" value="<?php echo $row['machine_code']?>">
    <input type="hidden" name="machine_id" value="<?php echo $row['machine_id']?>">
    </div> 
  
    <div class="col-md-6">
    <label for="">Machine Serial Number</label>
    <input readonly type="text" style="background-color: white;" class="form-control" name="serialnumber" value="<?php echo $row['serialnumber']?>">
    </div>

    <div class="col-md-6">
    <label for="accessories_required"  class="accessories_required">Accessories Required</label>
    <select class="form-control" type="text" id="accessories_required" name="accessories_required">
    <option value='' <?php if ($row['accessories_required'] == '') { echo "SELECTED"; } ?>></option>
    <option value="Yes" <?php if ($row['accessories_required'] == "Yes") { echo "SELECTED"; } ?>>Yes</option>
    <option value="No" <?php if ($row['accessories_required'] == "No") { echo "SELECTED";} ?>>No</option>
    </select>
    </div>

    <div class="col-md-6">
    <label for="job_cancel"  class="job_cancel">Assign To:</label>
    <select id="jobassignto" class="form-control" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> Select Technician </option>
      
    <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE 
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
            <input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
            <input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>  
            <input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>
        
          </select>
        
        <?php
            $DateAssign = date("Y.m.d");
            $_SESSION['storeDate'] = $DateAssign; 
        ?>
    
        <input type="hidden" name="DateAssign" id="DateAssign" value="<?php echo $_SESSION["storeDate"] ?>" readonly>
    </div>
    
    <div style="margin-left: 365px;margin-top: 20px;" class="updateBtn">
     <button type="button" id="duplicate" style="background-color: #081d45; border-color: #081d45;" class="btn btn-primary" name="duplicate" value="duplicate" onclick="submitFormSupport();keep();">Request</button>
    </div>
    <p style="margin-top: -35px;margin-left: 14px;" class="control"><b id="messageSupport"></b></p>
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
    
    <script type="text/javascript">
        function submitFormSupport()
        {
            var technician_rank = $('input[name=technician_rank]').val();
            var staff_position = $('input[name=staff_position]').val();
            var support = $('input[name=support]').val();
            var today_date = $('input[name=today_date]').val();
            var job_priority = $('input[name=job_priority]').val();
            var job_order_number = $('input[name=job_order_number]').val();
            var job_name = $('input[name=job_name]').val();
            var job_code = $('input[name=job_code]').val();
            var job_description = $('input[name=job_description]').val();
            var requested_date = $('input[name=requested_date]').val();
            var delivery_date = $('input[name=delivery_date]').val();
            var customer_name = $('input[name=customer_name]').val();
            var customer_code = $('input[name=customer_code]').val();
            var customer_grade = $('input[name=customer_grade]').val();
            var cust_address1 = $('input[name=cust_address1]').val();
            var cust_address2 = $('input[name=cust_address2]').val();
            var cust_address3 = $('input[name=cust_address3]').val();
            var customer_PIC = $('input[name=customer_PIC]').val();
            var cust_phone1 = $('input[name=cust_phone1]').val();
            var cust_phone2 = $('input[name=cust_phone2]').val();
            var machine_id = $('input[name=machine_id]').val();
            var machine_name = $('input[name=machine_name]').val();
            var machine_code = $('input[name=machine_code]').val();
            var machine_type = $('input[name=machine_type]').val();
            var type_id = $('input[name=type_id]').val();
            var serialnumber = $('input[name=serialnumber]').val();
            var machine_brand = $('input[name=machine_brand]').val();
            var brand_id = $('input[name=brand_id]').val();
            var accessories_required = $('select[name=accessories_required]').val();
            var DateAssign = $('input[name=DateAssign]').val();
            var job_assign = $('input[name=job_assign]').val();
            var jobregistercreated_by = $('input[name=jobregistercreated_by]').val();
            var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
            
            if(
               technician_rank!='' || technician_rank=='',
               staff_position!='' || staff_position=='',
               support!='' || support=='',
               today_date!='' || today_date=='',  
               job_priority!='' || job_priority=='', 
               job_order_number!='' || job_order_number=='',
               job_name!='' || job_name=='',
               job_code!='' || job_code=='',
               job_description!='' || job_description=='',
               requested_date!='' || requested_date=='', 
               delivery_date!='' || delivery_date=='', 
               customer_name!='' || customer_name=='',
               customer_code!='' || customer_code=='',  
               customer_grade!='' || customer_grade=='', 
               cust_address1!='' || cust_address1=='',
               cust_address2!='' || cust_address2=='',
               cust_address3!='' || cust_address3=='',
               customer_PIC!='' || customer_PIC=='', 
               cust_phone1!='' || cust_phone1=='', 
               cust_phone2!='' || cust_phone2=='', 
               machine_id!='' || machine_id=='',
               machine_name!='' || machine_name=='',
               machine_code!='' || machine_code=='',  
               machine_type!='' || machine_type=='',
               type_id!='' || type_id=='',
               serialnumber!='' || serialnumber=='',
               machine_brand!='' || machine_brand=='',
               brand_id!='' || brand_id=='',
               accessories_required!='' || accessories_required=='', 
               DateAssign!='' || DateAssign=='',
               job_assign!='' || job_assign=='',
               jobregistercreated_by!='' || jobregistercreated_by=='',
               jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='')
                
               {
                var formData = {technician_rank: technician_rank,
                                staff_position: staff_position,
                                support: support,
                                today_date: today_date,
                                job_priority: job_priority,
                                job_order_number: job_order_number,
                                job_name: job_name,
                                job_code: job_code,
                                job_description: job_description,
                                requested_date: requested_date,
                                delivery_date: delivery_date,
                                customer_name: customer_name,
                                customer_code: customer_code,
                                customer_grade: customer_grade,
                                cust_address1: cust_address1,
                                cust_address2: cust_address2,
                                cust_address3: cust_address3,
                                customer_PIC: customer_PIC,
                                cust_phone1: cust_phone1,
                                cust_phone2: cust_phone2,
                                machine_id: machine_id,
                                machine_name: machine_name,
                                machine_code: machine_code,
                                machine_type: machine_type,
                                type_id: type_id,
                                serialnumber: serialnumber,
                                machine_brand: machine_brand,
                                brand_id: brand_id,
                                accessories_required: accessories_required,
                                DateAssign: DateAssign,
                                job_assign: job_assign,
                                jobregistercreated_by: jobregistercreated_by,
                                jobregisterlastmodify_by: jobregisterlastmodify_by};
                
                $.ajax({
                        url: "supportindex.php", 
                        type: 'POST',
                        data: formData,
                        success: function(response)
                        {
                            var res = JSON.parse(response);
                            console.log(res);
                            if(res.success == true)
                            $('#messageSupport').html('<span style="color: green">Succesfully Request for Support!</span>');
                            else
                            $('#messageSupport').html('<span style="color: red">Request for support failed</span>');
                        }
                    });
               }
        } 
    </script>

    <!-- Save customer name and requested date into job update table -->
    <script type="text/javascript">
    function keep()
      {
        var tech_name = $('input[name=job_assign]').val();
        var support = $('input[name=support]').val();
        var customer_name = $('input[name=customer_name]').val();
        var machine_name = $('input[name=machine_name]').val();
        var requested_date = $('input[name=requested_date]').val();
        var jobregister_id = $('input[name=jobregister_id]').val();
        
            if(tech_name!='' || tech_name=='',
                 support!='' || support=='',
           customer_name!='' || customer_name=='',
            machine_name!='' || machine_name=='',
          requested_date!='' || requested_date=='',
          jobregister_id!='' || jobregister_id=='')
            {
              var formData = {tech_name:tech_name,
                                support:support,
                          customer_name:customer_name,
                          machine_name:machine_name,
                         requested_date:requested_date,
                         jobregister_id:jobregister_id};
                    
              $.ajax({  
                        url: "savecustname.php",
                        type: 'POST',
                        data: formData,
                        success: function(response)
                          {
                            var res = JSON.parse(response);
                                      console.log(res);
                          }
                      });
            }
      } 
    </script>

</body>
</html>
