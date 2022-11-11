<?php
$today_date = date("d-m-Y");
$_SESSION['today_date'] = $today_date;
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

 <form action="homeindex.php" method="post" style="display: contents;">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="support" class="support" value="Support For <?php echo $row['job_assign'] ?>">
    <input type="hidden" name="today_date" id="today_date" value="<?php echo $_SESSION["today_date"] ?>">

     <div class="input-box">
            <label for="">Job Priority</label>
            <input type="text" class="job_priority" name="job_priority" value="<?php echo $row['job_priority']?>">
        </div>

        <div class="input-box">
            <label for="">Job Order Number</label>
            <div style="display: flex;">
            <input type="text" class="job_order_number" name="job_order_number" id="job_order_number" value="<?php echo $row['job_order_number']?>">
            <button type="button" style="border-radius: 5px; color: white;background-color: #081d45;border-color: #081d45;padding-left: 7px;padding-right: 8px; width:auto" onclick="buttonClick();">Click</button>
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
         <select id="custModel" onchange="GetCustomer(this.value)"> <option value=""> <?php echo $row['customer_name']?> </option>
   <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT customer_id, customer_code, customer_name From customer_list ORDER BY customerlasmodify_at ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
             echo "<option value='". $data['customer_id'] ."'>" . $data['customer_name']."</option>";  // displaying data in option menu
        }	
    ?>  
    </select> 
    <input type="hidden" id="cust" class="form-control" name="customer_id" onchange="GetCustomer(this.value)" readonly >  
    <input type="hidden" id="customer_code" class="form-control" name="customer_code" value="<?php echo $row['customer_code']?>" readonly >   
    <input type="hidden" name="customer_name" id="customer_name" class="form-control" value="<?php echo $row['customer_name']?>">

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

  <div class="CodeDropdown" style="padding-left: 19px;">
            <label for="brand">Machine Brand</label><br>
            <select style="height: 43px; width: 308px;" onchange="GetBrand(this.value)" class="form-select" id="brand" required>
            <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['machine_brand']; ?></option>
            </select>
             <input type="hidden" id="brandname" name="machine_brand" value="<?php echo $row['machine_brand']?>" onchange="GetBrand(this.value)" readonly >  
        </div>


         <div class="CodeDropdown" style="padding-left: 30px;">
            <label for="type"> Machine Type</label><br>
            <select style="height: 43px; width: 298px;" onchange="GetType(this.value)" class="form-select" id="type" required>
                <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
            </select>
            <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" onchange="GetType(this.value)" readonly >  
        </div> 

            <div class="CodeDropdown" style="padding-left: 23px;">
            <label for="sn"> Serial Number </label><br>
            <select style="width: 300px; height: 43px;" id="serialnumbers" onchange="GetMachines(this.value)">
                <option value="<?php echo $row['serialnumber']?>"><?php echo $row['serialnumber']?></option>
                <!-- <option value="Add Serial Number" style="color:blue;">Add Serial Number</option> -->
                <?php
                    include 'dbconnect.php';

                    if (isset($_POST['type_id'])) {
                      $customer_name =$_POST['customer_name'];
                      $type_id =$_POST['type_id'];
            
                      $query = ("SELECT * FROM machine_list WHERE type_id ='$type_id' AND customer_name ='$customer_name'");

                      $query_run = mysqli_query($conn, $query);
                      while ($rows = mysqli_fetch_array($query_run)) {
                ?>

                       
                <option value="<?php echo $rows['machine_id']; ?>"><?php echo $rows['serialnumber']; ?></option>
                <?php
                    }
                }

                ?>
            </select>

   
            <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']?>">  
            <input type="hidden" style="width: 300px; height: 33px;" id="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">  
            <input type="hidden" id="machine_code" name="machine_code" value="<?php echo $row['machine_code']?>">
               </div>

             <div class="input-box" style="margin-left: 20px;">
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
            
            <div class="input-box-address" style="width: 100%;padding-left: 20px;">
            <label for="">Machine Name</label>
            <input type="text" style="width: 652px;" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>">
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


         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         
         <div class="DuplicateUpdateButton" style="display: inline-flex; width: 100%;">
         <button type="submit" id="submit" name="update">Update</button></n>
         <button type="button" style="background-color: #f43636 ;" id="duplicate" name="duplicate" value="duplicate" onclick="submitFormSupportAdmin();">Support</button>
            </div>
            <p class="control"><b id="messageSupportAdmin"></b></p>
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

function submitFormSupportAdmin()

  {var today_date = $('input[name=today_date]').val();
   var technician_rank = $('input[name=technician_rank]').val();
   var staff_position = $('input[name=staff_position]').val();
   var job_priority = $('input[name=job_priority]').val();
   var support = $('input[name=support]').val();
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
    var machine_id = $('input[name=machine_id]').val();
   var machine_brand = $('input[name=machine_brand]').val();
   var accessories_required = $('select[name=accessories_required]').val();
   var job_cancel = $('select[name=job_cancel]').val();
   var jobregistercreated_by = $('input[name=jobregistercreated_by]').val();
   var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
    
    if(today_date!='' || today_date =='', 
       technician_rank!='' || technician_rank=='', 
       staff_position!='' || staff_position=='', 
       job_priority!='' || job_priority=='', 
       support!='' || support=='', 
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
       machine_id!='' || machine_id=='',
       machine_brand!='' || machine_brand=='',
       accessories_required!='' || accessories_required=='', 
       job_cancel!='' || job_cancel=='',
       jobregistercreated_by!='' || jobregistercreated_by=='',
       jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='')

      {
        var formData = {today_date: today_date,
                        technician_rank: technician_rank,
                        staff_position: staff_position,
                        job_priority: job_priority,
                         support: support,
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
                        machine_id: machine_id,
                        machine_brand: machine_brand,
                        accessories_required: accessories_required,
                        job_cancel: job_cancel,
                        jobregistercreated_by: jobregistercreated_by,
                        jobregisterlastmodify_by: jobregisterlastmodify_by};
                        
        $.ajax({
                url: "adminsupporttechnician.php", 
                type: 'POST', 
                data: formData, 
                success: function(response)
          {
            var res = JSON.parse(response);
            console.log(res);
            if(res.success == true)
              $('#messageSupportAdmin').html('<span style="color: green">Succesfully Request for Support!</span>');
            else
              $('#messageSupportAdmin').html('<span style="color: red">Request for support failed</span>');
          }
        });
      }
  } 
</script>

        </body></html>
