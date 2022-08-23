<?php session_start(); ?>


<!DOCTYPE html>
<html>

<head>
    
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
  
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

</head>


<style>
    .OFF{
        color: red;
    }
</style>

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


    <form action="homeindex.php" method="post" style="display: flex; flex-flow: wrap;">
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
        $records = mysqli_query($connection, "SELECT customer_id, customer_code, customer_name From customer_list ORDER BY customerlasmodify_at ASC");  // Use select query here 

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
            <input type="text" name="customer_grade" id="customer_grade" class="form-control" value="<?php echo $row['customer_grade']?>">

        </div>
       
        <div class="input-box">
            <label for="">Customer PIC</label>
            <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" value="<?php echo $row['customer_PIC']?>">
        </div>

         <div class="input-box-address" style="width: 100%;">
            <label for="">Customer Address</label>
            <input type="text" style="width: 100%;" name="cust_address1" id="cust_address1" class="form-control" value="<?php echo $row['cust_address1']?>">
            <input type="text" name="cust_address2" id="cust_address2" class="form-control" value="<?php echo $row['cust_address2']?>">
            <input type="text" name="cust_address3" id="cust_address3" class="form-control" value="<?php echo $row['cust_address3']?>">

            <br/><br/>
        </div>

        <div class="input-box">
            <label for="">Contact Number 1</label>
            <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" value="<?php echo $row['cust_phone1']?>">
        </div>

        <div class="input-box">
            <label for="">Contact Number 2</label>
            <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" value="<?php echo $row['cust_phone2']?>">
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
            <select style="height: 43px; width: 319px;" onchange="GetType(this.value)" class="form-select" id="type" required>
                <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
            </select>
            <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" onchange="GetType(this.value)" readonly >  
        </div> 

            <div class="CodeDropdown" style="padding-left: 23px;">
            <label for="sn"> Serial Number </label><br>
            <select style="width: 300px; height: 43px;" id="serialnumbers" onchange="GetMachines(this.value)">
                <option value="<?php echo $row['serialnumber']?>"><?php echo $row['serialnumber']?></option>
                <option value="Add Serial Number" style="color:blue;">Add Serial Number</option>
                <?php

                $query = "select * from machine_list";
                // $query = mysqli_query($con, $qr);
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {

                ?>
                       
                <option value="<?php echo $rows['machine_id']; ?>"><?php echo $rows['serialnumber']; ?></option>
                <?php
                    }
                }

                ?>
            </select>

   
            <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']?>">  
            <input type="text" style="width: 300px; height: 33px;" id="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">  
            <input type="hidden" id="machine_code" name="machine_code" value="<?php echo $row['machine_code']?>">
            <input type="hidden" style="width: 100%;" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>">
      

        </div>
        <div class="input-box" style="padding-left: 35px;">
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

        <div class="input-box">
            <label for="">Job Description</label>
            <textarea name="job_description" class="job_description" rows="3" cols="100" style="width: 300px; height: 63px;"><?php echo $row['job_description']?></textarea>
        </div>

        <div class="input-box">
            <label for="job_cancel"  class="job_cancel">Cancel Job:</label>
            <select id="job_cancel" name="job_cancel">
                <option value='' <?php if ($row['job_cancel'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value='YES' <?php if ($row['job_cancel'] == 'YES') {
                    echo "SELECTED";
                } ?>>YES</option>
            </select>
            </div>

          <input type="hidden" class="job_status" name="job_status" value="<?php echo $row['job_status']?>">

         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         <button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>
    </form>
            
           
         <?php
        }
    }
    ?>

              <?php
            } ?>

    <script>
    $(document).ready(function() {

    $('#serialnumber').hide();

    $("#serialnumbers").change(function() {
        var val = $(this).val();
        
        if (val == 'Add Serial Number') {
            $('#serialnumber').show();
        } else {
            $('#serialnumber').hide();
        }
    }).change();

        });

    </script>

             <script>
        $(document).ready(function() {
            $("#brand").on('change', function() {
                var brandid = $(this).val();

                $.ajax({
                    method: "POST",
                    url: "ajaxData.php",
                    data: {
                        id: brandid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#type").html(data);
                        $("#serialnumbers").html('<option value="">Select Serial Number</option');

                    }
                });
            });
            $("#type").on('change', function() {
                var typeid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "ajaxData.php",
                    data: {
                        sid: typeid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#serialnumbers").html(data);

                    }

                });
            });
        });
    </script>

                        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#serialnumbers").select2();

        });
        </script>


                    <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#custModel").select2();

        });
        </script>

        <script>
$(document).ready(function(){
	
$("#custModel").on("change",function(){
   var GetValue=$("#custModel").val();
   $("#cust").val(GetValue);
});

});

</script>


<script>

		function GetCustomer(str) {
			if (str.length == 0) {
                document.getElementById("customer_code").value = "";
				document.getElementById("customer_name").value = "";
				document.getElementById("customer_grade").value = "";
                document.getElementById("customer_PIC").value = "";
				document.getElementById("cust_phone1").value = "";
                document.getElementById("cust_phone2").value = "";
                document.getElementById("cust_address1").value = "";
                document.getElementById("cust_address2").value = "";
                document.getElementById("cust_address3").value = "";
				return;
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					if (this.readyState == 4 &&
							this.status == 200) {
						
						var myObj = JSON.parse(this.responseText);
						
						document.getElementById
							("customer_code").value = myObj[0];
                        document.getElementById
							("customer_name").value = myObj[1];
						document.getElementById(
							"customer_grade").value = myObj[2];
                        document.getElementById(
							"customer_PIC").value = myObj[3];
                        document.getElementById(
							"cust_phone1").value = myObj[4];
                        document.getElementById(
							"cust_phone2").value = myObj[5];
                        document.getElementById(
							"cust_address1").value = myObj[6];
                        document.getElementById(
							"cust_address2").value = myObj[7];
                        document.getElementById(
							"cust_address3").value = myObj[8];
					}
				};

				xmlhttp.open("GET", "fetchcustomer.php?customer_id=" + str, true);
				xmlhttp.send();
			}
		}
	</script>

    <script>

		function GetMachines(str) {
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

					if (this.readyState == 4 &&
							this.status == 200) {
						
						var myObj = JSON.parse(this.responseText);
	
                        document.getElementById
							("machine_id").value = myObj[0];

                            	document.getElementById
							("serialnumber").value = myObj[1];
                        
						document.getElementById
							("machine_code").value = myObj[2];
						
                        document.getElementById
							("machine_name").value = myObj[3];
    
                            
                           
					}
				};

				xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
				xmlhttp.send();
			}
		}
	</script>


    </body></html>

        