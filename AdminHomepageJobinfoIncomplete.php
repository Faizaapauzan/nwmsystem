<?php
    session_start();

    if (isset($_SESSION["username"]))
?>

<!DOCTYPE html>

<style>
    #reason {display: none;}
</style>

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
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <div class="input-box" style="width: 50%;">
            <label for="">Job Priority</label>
            <input type="text" name="job_priority" value="<?php echo $row['job_priority']?>">
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="">Job Order Number</label>
            <div style="display: flex;">
                <input type="text" class="job_order_number" name="job_order_number" id="job_order_number" value="<?php echo $row['job_order_number']?>">
                <button type="button" style="border-radius: 5px; color: white;background-color: #081d45;border-color: #081d45;padding-left: 7px;padding-right: 8px; width:auto" onclick="buttonClick();">Click</button>
                
                <script>
                    var i = 0;
                    var jobordernumber = document.getElementById('job_order_number').value;

                    function buttonClick() {
                        i++;
                        document.getElementById('job_order_number').value = jobordernumber + '-' + i;
                    }
                </script>

            </div>
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="">Job Name</label>
            <input type="text" name="job_name" value="<?php echo $row['job_name']?>">
            <input type="hidden" name="job_code" value="<?php echo $row['job_code']?>">
        </div>

        <div class="input-box" style="width: 50%;">
            <label for="">Customer Name</label>
            <input type="text" name="customer_name" value="<?php echo $row['customer_name']?>">
            <input type="hidden" name="customer_code" value="<?php echo $row['customer_code']?>">
        </div>

        <div class="input-box" style="width: 100%;">
            <label for="">Job Description</label>
            <input type="text" name="job_description" value="<?php echo $row['job_description']?>">
        </div>

        <div class="input-box" style="width: 50%;">
            <label for="">Delivery date</label>
            <input type="date" name="delivery_date" value="<?php echo $row['delivery_date']?>">
        </div>

        <div class="input-box" style="width: 50%;">
            <label for="">Requested date</label>
            <input type="date" name="requested_date" value="<?php echo $row['requested_date']?>">
        </div>

        <div class="input-box" style="width: 50%;">
            <label for="">Customer Grade</label>
            <input type="text" name="customer_grade" value="<?php echo $row['customer_grade']?>">
        </div>

        <div class="input-box" style="width: 50%;">
            <label for="">Customer PIC</label>
            <input type="text" name="customer_PIC" value="<?php echo $row['customer_PIC']?>">
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="">Contact Number 1</label>
            <input type="text" name="cust_phone1" value="<?php echo $row['cust_phone1']?>">
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="">Contact Number 2</label>
            <input type="text" name="cust_phone2" value="<?php echo $row['cust_phone2']?>">
        </div>
        
        <div class="input-box" style="width: 100%;">
            <label for="">Customer Address</label>
            <input type="text" name="cust_address1" value="<?php echo $row['cust_address1']?>">
            <input type="text" style="width: calc(100% / 2 - 2.5px);" name="cust_address2" value="<?php echo $row['cust_address2']?>">
            <input type="text" style="width: calc(100% / 2 - 2.5px);" name="cust_address3" value="<?php echo $row['cust_address3']?>">
        </div>

        <div class="input-box" style="width: 50%;">
            <label for="">Machine Brand</label>
            <input type="text" name="machine_brand" value="<?php echo $row['machine_brand']?>">
        </div>
         
        <div class="input-box" style="width: 50%;">
            <label for="">Machine Type</label>
            <input type="text" name="machine_type" value="<?php echo $row['machine_type']?>">
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="sn">Serial Number</label>
            <select id="serialnumbers" onchange="GetMachines(this.value)">
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
                
                <option value="<?php echo $rows['machine_id']; ?>"><?php echo $rows['serialnumber']; ?></option> <?php } } ?>
            </select>
            <input type="hidden" id="machine_id" name="machine_id" value="<?php echo $row['machine_id']?>">
            <input type="hidden" id="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">
            <input type="hidden" id="machine_code" name="machine_code" value="<?php echo $row['machine_code']?>">
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="accessories_required">Accessories Required</label>
            <select type="text" id="accessories_required" name="accessories_required">
                <option value='' <?php if ($row['accessories_required'] == '') {echo "SELECTED";} ?>></option>
                <option value="Yes" <?php if ($row['accessories_required'] == "Yes") {echo "SELECTED";} ?>>Yes</option>
                <option value="No" <?php if ($row['accessories_required'] == "No") {echo "SELECTED";} ?>>No</option>
            </select>
        </div>
        
        <div class="input-box" style="width: 100%;">
            <label for="">Machine Name</label>
            <input type="text" name="machine_name" value="<?php echo $row['machine_name']?>">
            <input type="hidden" name="machine_code" value="<?php echo $row['machine_code']?>">
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="job_cancel">Cancel Job:</label>
            <select type="text" id="job_cancel" name="job_cancel">
                <option value='' <?php if ($row['job_cancel'] == '') {echo "SELECTED";} ?>></option>
                <option value='YES' <?php if ($row['job_cancel'] == 'YES') {echo "SELECTED";} ?>>YES</option>
            </select>
        </div>
        
        <div class="input-box" style="width: 50%;">
            <label for="job_status">Job Status:</label>
            <select type="text" id="job_status" name="job_status" onchange="myFunction()">
                <option value='' <?php if ($row["job_status"] == "") {echo "SELECTED";} ?>></option>
                <option value='Doing' <?php if ($row["job_status"] == "Doing") {echo "SELECTED";} ?>>Doing</option>
                <option value='Pending' <?php if ($row["job_status"] == "Pending") {echo "SELECTED";} ?>>Pending</option>
                <option value='Incomplete' <?php if ($row["job_status"] == "Incomplete") {echo "SELECTED";} ?>>Incomplete</option>
                <option value='Completed' <?php if ($row["job_status"] == "Completed") {echo "SELECTED";} ?>>Completed</option>
            </select>
        </div>
        
        <!--PENDING & INCOMPLETE REASON-->
        <div id="reason" class="input-box" style="width: 100%;">
            <label for="reason">Reason</label>
            <input type="text" name="reason" value="<?php echo $row["reason"]; ?>">
        </div>
        
        <script type="text/javascript">
            function myFunction() {
                var x = document.getElementById("job_status").value;
                if (x == 'Pending' || x == 'Incomplete') {
                    document.getElementById("reason").style.display = 'block';
                } 
                
                else {
                    document.getElementById("reason").style.display = 'none';
                }
            }
        </script>
        <!--PENDING & INCOMPLETE END REASON-->
        
        <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        
        <div class="DuplicateUpdateButton" style="display: inline-flex; width: 100%;">
            <button type="submit" id="submit" name="update">Update</button></n>
            <button type="button" style="background-color: #f43636 ;" id="duplicate" name="duplicate" value="duplicate" onclick="submitFormDuplicate();">Duplicate</button>
        </div>
        
        <p class="control"><b id="messageDuplicatelist"></b></p>
    </form> 
    
    <?php } } } ?>
    
    <!-- Update machine name in assistant table -->
    <script type="text/javascript">
        function updtMchn() {
            var jobregister_id = $('input[name=jobregister_id]').val();
            var machine_name = $('input[name=machine_name]').val();
            
            if (jobregister_id != '' || jobregister_id == '', 
                  machine_name != '' || machine_name == '') 
            
            {
                var formData = {jobregister_id: jobregister_id,
                                  machine_name: machine_name};
                
                $.ajax({
                    url: "machineassistant.php",
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
    <!-- End of Update machine name in assistant table -->
    
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
        $(document).ready(function() {$("#serialnumbers").select2();});
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
                xmlhttp.onreadystatechange = function() {
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
    
    <!-- To duplicate Job -->
    <script type="text/javascript">
        function submitFormDuplicate() {
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
            var machine_name = $('input[name=machine_name]').val();
            var machine_code = $('input[name=machine_code]').val();
            var machine_type = $('input[name=machine_type]').val();
            var serialnumber = $('input[name=serialnumber]').val();
            var machine_id = $('input[name=machine_id]').val();
            var machine_brand = $('input[name=machine_brand]').val();
            var accessories_required = $('select[name=accessories_required]').val();
            var job_cancel = $('select[name=job_cancel]').val();
            var reason = $('select[name=reason]').val();
            var jobregistercreated_by = $('input[name=jobregistercreated_by]').val();
            var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
            
            if (   job_priority != '' || job_priority == '', 
               job_order_number != '' || job_order_number == '', 
                       job_name != '' || job_name == '', 
                       job_code != '' || job_code == '', 
                job_description != '' || job_description == '', 
                 requested_date != '' || requested_date == '', 
                  delivery_date != '' || delivery_date == '', 
                  customer_name != '' || customer_name == '', 
                  customer_code != '' || customer_code == '', 
                 customer_grade != '' || customer_grade == '', 
                  cust_address1 != '' || cust_address1 == '', 
                  cust_address2 != '' || cust_address2 == '', 
                  cust_address3 != '' || cust_address3 == '', 
                   customer_PIC != '' || customer_PIC == '', 
                    cust_phone1 != '' || cust_phone1 == '', 
                    cust_phone2 != '' || cust_phone2 == '', 
                   machine_name != '' || machine_name == '', 
                   machine_code != '' || machine_code == '', 
                   machine_type != '' || machine_type == '', 
                   serialnumber != '' || serialnumber == '', 
                     machine_id != '' || machine_id == '', 
                  machine_brand != '' || machine_brand == '', 
           accessories_required != '' || accessories_required == '', 
                     job_cancel != '' || job_cancel == '', 
                         reason != '' || reason == '', 
          jobregistercreated_by != '' || jobregistercreated_by == '', 
       jobregisterlastmodify_by != '' || jobregisterlastmodify_by == '') 
            
            {
                var formData = {
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
                    machine_id: machine_id,
                    machine_brand: machine_brand,
                    accessories_required: accessories_required,
                    job_cancel: job_cancel,
                    reason: reason,
                    jobregistercreated_by: jobregistercreated_by,
                    jobregisterlastmodify_by: jobregisterlastmodify_by
                };
                $.ajax({
                    url: "homeincompleteindex.php",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        var res = JSON.parse(response);
                        console.log(res);
                        if (res.success == true) $('#messageDuplicatelist').html('<span style="color: green">Job Duplicated Successfully!</span>');
                        else $('#messageDuplicatelist').html('<span style="color: red">Job cannot be duplicated</span>');
                    }
                });
            }
        }
    </script>
    <!-- End of To duplicate Job -->

</body>

</html>