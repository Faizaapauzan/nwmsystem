<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

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
    
    <form action="homeindex.php" method="post" style="display: flex; flex-flow: wrap;">
    
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    
    <div class="input-box" style="width:350px;">
        <label for="">Job Priority</label>
        <input type="text" class="job_priority" name="job_priority" value="<?php echo $row['job_priority']?>">
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
        <label for="">Job Order Number</label>
        <input type="text" class="job_order_number" name="job_order_number" value="<?php echo $row['job_order_number']?>">
    </div>
    
    <div class="input-box" style="width:350px;">
        <label for="">Job Name</label>
        <input type="text" class="job_name" name="job_name" value="<?php echo $row['job_name']?>">
    </div>

    <div class="input-box" style="margin-left: 27px; width:350px;">
    <label for="">Job Description</label>
    <input type="text" style="width: 100%;" name="job_description"value="<?php echo $row['job_description']?>">
    </div>
    
    <div class="input-box" style="width:350px;">
        <label for="">Requested date</label>
        <input type="date" class="requested_date" name="requested_date" value="<?php echo $row['requested_date']?>">
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
        <label for="">Delivery date</label>
        <input type="date" class="delivery_date" name="delivery_date" value="<?php echo $row['delivery_date']?>">
    </div>

    <div class="input-box" style="width:350px;">
        <label for="">Assign Date</label>
        <input type="text" class="DateAssign" name="DateAssign" value="<?php echo $row['DateAssign']?>">
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
        <label for="">Customer Name</label>
            <select id="custModel" onchange="GetCustomer(this.value)"> <option value=""><?php echo $row['customer_name']?> </option>
                <?php
                    include "dbconnect.php";
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
    
    <div class="input-box" style="width:350px;">
        <label for="">Customer Grade</label>
        <input type="text" name="customer_grade" id="customer_grade" class="form-control" value="<?php echo $row['customer_grade']?>">
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
        <label for="">Customer PIC</label>
        <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" value="<?php echo $row['customer_PIC']?>">
    </div>
    
    <div class="input-box-address" style="width: 730px;">
    <label for="">Customer Address</label>
    <input type="text" style="width: 100%;" name="cust_address1" id="cust_address1" value="<?php echo $row['cust_address1']?>">
    <input type="text" style="width: 360px;" name="cust_address2" id="cust_address2" value="<?php echo $row['cust_address2']?>">
    <input type="text" style="width: 360px; margin-right:6px;" name="cust_address3" id="cust_address3" value="<?php echo $row['cust_address3']?>">
    <br/>
    </div>
    
    <div class="input-box" style="width:350px;">
        <label for="">Contact Number 1</label>
        <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" value="<?php echo $row['cust_phone1']?>">
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
        <label for="">Contact Number 2</label>
        <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" value="<?php echo $row['cust_phone2']?>">
    </div>

    <div class="input-box" style="width:350px;">
    <label for="accessories_required"  class="accessories_required">Accessories Required</label>
    <select id="accessories_required" class="form-control" name="accessories_required">
        <option value='' <?php if ($row['accessories_required'] == '') {echo "SELECTED";} ?>></option>
        <option value="Yes" <?php if ($row['accessories_required'] == "Yes") {echo "SELECTED";} ?>>Yes</option>
        <option value="No" <?php if ($row['accessories_required'] == "No") {echo "SELECTED";} ?>>No</option>
    </select>
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
    <label for="">Machine Brand</label>
        <select onchange="GetBrand(this.value)" id="brand" class="form-control">
            <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['machine_brand']; ?></option>
        </select>
    <input type="hidden" id="brandname" name="machine_brand" value="<?php echo $row['machine_brand']?>" onchange="GetBrand(this.value)" readonly >  
    </div>
    
    <div class="input-box" style="width:350px;">
    <label for="" class="accessories_required">Machine Type</label>
        <select onchange="GetType(this.value)" id="type" class="form-control">
            <option value="<?php echo $row['type_id']; ?>"><?php echo $row['machine_type']; ?></option>
        </select>
    <input type="hidden" id="type_name" name="machine_type" value="<?php echo $row['machine_type']?>" onchange="GetType(this.value)" readonly >  
    </div>
    
    <div class="input-box" style="margin-left: 27px; width:350px;">
    <label for="" class="accessories_required">Serial Number</label>
        <select id="serialnumbers" onchange="GetMachines(this.value)" class="form-control">
            <option value="<?php echo $row['serialnumber']?>"><?php echo $row['serialnumber']?></option>
                <?php
                    include 'dbconnect.php';

                    if (isset($_POST['type_id']) AND isset($_POST['customer_name'])) {
                      $customer_name =$_POST['customer_name'];
                      $type_id =$_POST['type_id'];
            
                      $query = ("SELECT * FROM machine_list WHERE type_id ='$type_id' AND customer_name ='$customer_name'");

                      $query_run = mysqli_query($conn, $query);
                      while ($rows = mysqli_fetch_array($query_run)) {
                ?>    
            <option value="<?php echo $rows['machine_id']; ?>"><?php echo $rows['serialnumber']; ?></option>
                <?php } } ?>
        </select>
    <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']?>">
    <input type="hidden" id="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">
    <input type="hidden" id="machine_code" name="machine_code" value="<?php echo $row['machine_code']?>">
    </div>
    
    <div class="input-box-address" style="width: 730px;">
    <label for="">Machine Name</label>
    <input type="text" style="width: 100%;" id="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>">
    </div>
    
    <input type="hidden" class="job_status" name="job_status" value="<?php echo $row['job_status']?>">
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <button type="submit" id="submit" name="update" class="btn btn-primary" onclick="updtMchn();">Update</button>
    </form>
    
    <?php } } ?>
    
    <?php } ?>
    
    <!-- Update machine name in assistant table -->
    <script type="text/javascript">
      function updtMchn()
        {
          var jobregister_id = $('input[name=jobregister_id]').val();
          var machine_name = $('input[name=machine_name]').val();
          
            if(
              jobregister_id!='' || jobregister_id=='',
                machine_name!='' || machine_name=='')
                
                {
                  var formData = {jobregister_id:jobregister_id,
                                    machine_name:machine_name};
                  
                  $.ajax({
                            url:"machineassistant.php",
                            type:'POST',
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
    
    <script>
        $(document).ready(function() {
            $("#brand").on('change', function() {
                var brandid = $(this).val();
                $.ajax({
                        method: "POST",
                        url: "ajaxData.php",
                        data: {id: brandid},
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
                            data: {sid: typeid},
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
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        document.getElementById ("customer_code").value = myObj[0];
                        document.getElementById ("customer_name").value = myObj[1];
						document.getElementById ("customer_grade").value = myObj[2];
                        document.getElementById ("customer_PIC").value = myObj[3];
                        document.getElementById ("cust_phone1").value = myObj[4];
                        document.getElementById ("cust_phone2").value = myObj[5];
                        document.getElementById ("cust_address1").value = myObj[6];
                        document.getElementById ("cust_address2").value = myObj[7];
                        document.getElementById ("cust_address3").value = myObj[8];
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
                        if (this.readyState == 4 && this.status == 200) {
                            var myObj = JSON.parse(this.responseText);
                            document.getElementById ("machine_id").value = myObj[0];
                            document.getElementById ("serialnumber").value = myObj[1];
                            document.getElementById ("machine_code").value = myObj[2];
                            document.getElementById ("machine_name").value = myObj[3];
                        }
                    };
                    
                    xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
                    xmlhttp.send();
                }
            }
	</script>

</body>
</html>

        