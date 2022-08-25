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
    
<form action="supportindex.php" method="post" style="display: contents;">

    <!-- hidden input -->
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="support" class="support" value="support">
    <input type="hidden" name="today_date" class="today_date" value="<?php echo $_SESSION["storeDate"] ?>">
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    
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
        <input type="hidden" name="job_code" value="<?php echo $row['job_code']?>">
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
        <input type="hidden" name="customer_code" value="<?php echo $row['customer_code']?>">
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
        <input type="text" style="width: 100%;" class="cust_address1" name="cust_address1" value="<?php echo $row['cust_address1']?>">
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
        <input type="hidden" name="machine_code" value="<?php echo $row['machine_code']?>">
        <input type="hidden" name="machine_id" value="<?php echo $row['machine_id']?>">
    </div>
    
    <div class="input-box">
        <label for="">Machine Type</label>
        <input type="text" class="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>">
        <input type="hidden" class="type_id" name="type_id" value="<?php echo $row['type_id']?>">
    </div>
    
    <div class="input-box">
        <label for="">Machine Serial Number</label>
        <input type="text" class="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">
    </div>
    
    <div class="input-box">
        <label for="">Machine Brand</label>
        <input type="text" class="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>">
        <input type="hidden" class="brand_id" name="brand_id" value="<?php echo $row['brand_id']?>">
    </div>
    
    <div class="input-box">
        <label for="accessories_required"  class="accessories_required">Accessories Required</label>
        <select type="text" id="accessories_required" name="accessories_required">
            <option value='' <?php if ($row['accessories_required'] == '') {echo "SELECTED";} ?>></option>
            <option value="Yes" <?php if ($row['accessories_required'] == "Yes") {echo "SELECTED";} ?>>Yes</option>
            <option value="No" <?php if ($row['accessories_required'] == "No") {echo "SELECTED";} ?>>No</option>
        </select>
    </div>
    
    <div class="input-box">
        <label for="">Job Description</label>
        <textarea name="job_description" class="job_description" rows="3" cols="100" style="width: 300px; height: 63px;"><?php echo $row['job_description']?></textarea>
    </div>
    
    <div class="input-box">
        <label for="job_cancel"  class="job_cancel">Assign To:</label>
        <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> Select Technician </option>
            
            <?php
                include "dbconnect.php";  // Using database connection file here
                
                $records = mysqli_query($connection, "SELECT * FROM staff_register WHERE 
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
    
    <div class="input-box">
        <label for="exampleFormControlSelect2">Job Status</label>
        <select type="text" id="job_status" name="job_status">
            <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
            <option value="Incomplete" <?php if($row['job_status'] == "Incomplete") { echo "SELECTED"; } ?>>Incomplete</option>
            <option value="Completed" <?php if($row['job_status'] == "Completed") { echo "SELECTED"; } ?>>Completed</option>
        </select>
    </div>
    
    <div class="DuplicateUpdateButton" style="display: inline-flex; width: 100%;">
        <button type="button" style="background-color: #f43636 ;" id="duplicate" name="duplicate" value="duplicate" onclick="submitFormSupport();keep();">Request</button>
    </div>
    
    <p class="control"><b id="messageSupport"></b></p>
    
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
            var job_description = $('textarea[name=job_description]').val();
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
            var job_status = $('select[name=job_status]').val();
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
               job_status!='' || job_status=='',
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
                                job_status: job_status,
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
        var customer_name = $('input[name=customer_name]').val();
        var requested_date = $('input[name=requested_date]').val();
        var jobregister_id = $('input[name=jobregister_id]').val();
        
            if(tech_name!='' || tech_name=='',
           customer_name!='' || customer_name=='',
          requested_date!='' || requested_date=='',
          jobregister_id!='' || jobregister_id=='')
            {
              var formData = {tech_name:tech_name,
                          customer_name:customer_name,
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
