<?php session_start(); ?>

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
        </div>

        <div class="input-box">
            <label for="">Machine Type</label>
            <input type="text" class="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>">
        </div>

         <div class="input-box">
            <label for="">Machine Serial Number</label>
            <input type="text" class="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">
        </div>

        <div class="input-box">
            <label for="">Machine Brand</label>
            <input type="text" class="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>">
        </div>
        
        <div class="input-box">
            <label for="accessories_required"  class="accessories_required">Accessories Required</label>
            <select type="text" id="accessories_required" name="accessories_required">
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
            <label for="">Job Description</label>
            <textarea name="job_description" class="job_description" rows="3" cols="100" style="width: 300px; height: 63px;"><?php echo $row['job_description']?></textarea>
        </div>

        <div class="input-box">
            <label for="job_cancel"  class="job_cancel">Cancel Job:</label>
            <select type="text" id="job_cancel" name="job_cancel">
                <option value='' <?php if ($row['job_cancel'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value='YES' <?php if ($row['job_cancel'] == 'YES') {
                    echo "SELECTED";
                } ?>>YES</option>
            </select>
        </div>

        <div class="input-box">
        <label for="exampleFormControlSelect2">Job Status</label>
        <select type="text" id="job_status" name="job_status">
            <option value='' <?php if($row['job_status'] == '') { echo "SELECTED"; } ?>></option>
            <option value="Incomplete" <?php if($row['job_status'] == "Incomplete") { echo "SELECTED"; } ?>>Incomplete</option>
            <option value="Completed" <?php if($row['job_status'] == "Completed") { echo "SELECTED"; } ?>>Completed</option>
        </select>
        </div>

         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         
         <div class="DuplicateUpdateButton" style="display: inline-flex; width: 100%;">
         <button type="submit" id="submit" name="update">Update</button></n>
         <button type="button" style="background-color: #f43636 ;" id="duplicate" name="duplicate" value="duplicate" onclick="submitFormDuplicate();">Duplicate</button>
            </div>
            <p class="control"><b id="messageDuplicate"></b></p>
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

function submitFormDuplicate()

  {var technician_rank = $('input[name=technician_rank]').val();
   var staff_position = $('input[name=staff_position]').val();
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
   var machine_name = $('input[name=machine_name]').val();
   var machine_code = $('input[name=machine_code]').val();
   var machine_type = $('input[name=machine_type]').val();
   var serialnumber = $('input[name=serialnumber]').val();
   var machine_brand = $('input[name=machine_brand]').val();
   var accessories_required = $('select[name=accessories_required]').val();
   var job_cancel = $('select[name=job_cancel]').val();
   var job_status = $('select[name=job_status]').val();
   var jobregistercreated_by = $('input[name=jobregistercreated_by]').val();
   var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
    
    if(technician_rank!='' || technician_rank=='', 
       staff_position!='' || staff_position=='', 
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
       machine_name!='' || machine_name=='',
       machine_code!='' || machine_code=='',  
       machine_type!='' || machine_type=='',
       serialnumber!='' || serialnumber=='',
       machine_brand!='' || machine_brand=='',
       accessories_required!='' || accessories_required=='', 
       job_cancel!='' || job_cancel=='',
       job_status!='' || job_status=='',
       jobregistercreated_by!='' || jobregistercreated_by=='',
       jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='')

      {
        var formData = {technician_rank: technician_rank,
                        staff_position: staff_position,
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
                        machine_name: machine_name,
                        machine_code: machine_code,
                        machine_type: machine_type,
                        serialnumber: serialnumber,
                        machine_brand: machine_brand,
                        accessories_required: accessories_required,
                        job_cancel: job_cancel,
                        job_status: job_status,
                        jobregistercreated_by: jobregistercreated_by,
                        jobregisterlastmodify_by: jobregisterlastmodify_by};
                        
        $.ajax({
                url: "homeincompleteindex.php", 
                type: 'POST', 
                data: formData, 
                success: function(response)
          {
            var res = JSON.parse(response);
            console.log(res);
            if(res.success == true)
              $('#messageDuplicate').html('<span style="color: green">Job Duplicated Successfully!</span>');
            else
              $('#messageDuplicate').html('<span style="color: red">Job cannot be duplicated</span>');
          }
        });
      }
  } 
</script>

        </body></html>
