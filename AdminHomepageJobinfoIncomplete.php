<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
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
    <form method="post" id="incompleteJobinfo" class="mx-2">
        <div class="row">
            <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
            
            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Job Priority</label>
                <input type="text" name="job_priority" value="<?php echo $row['job_priority']?>" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Job Order Number</label>
                <div class="input-group">
                    <input type="text" name="job_order_number" id="job_order_number" class="form-control" value="<?php echo $row['job_order_number']?>" readonly>
                    <button type="button" class="btn" style="color: white; background-color: #081d45; border:none; width: fit-content;" id="button-addon2" onclick="buttonClick()">Click</button>
                </div>
            </div>

            <script>
                var i = 1;
                var jobordernumber2;
                                                        
                function buttonClick() {
                    if (i == 1){
                        var jobordernumber = document.getElementById('job_order_number').value;
                        jobordernumber2 = jobordernumber;
                    }
                        
                    var parts = jobordernumber2.split('-');
                    var newNumber = parts[parts.length-1] + "-" + i;
                    var newJobOrderNumber = parts[0];
                        
                    for (var j = 1; j < parts.length-1; j++){
                        newJobOrderNumber = newJobOrderNumber + "-" + parts[j];
                    }
                
                    newJobOrderNumber = newJobOrderNumber + "-" + newNumber;
                    document.getElementById('job_order_number').value = newJobOrderNumber;
                
                    i++;
                }
            </script>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Job Name</label>
                <select type="text" name="job_name" id="job_name" style="width: 100%;" class="form-select" onchange="GetDetail(this.value)">
                    <option value="<?php echo $row['job_name']?>"><?php echo $row['job_name']?></option>
                        <?php
                            
                            include "dbconnect.php";
                                                        
                            $records = mysqli_query($conn, "SELECT * FROM jobtype_list ORDER BY jobtype_id ASC");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='" . $data['job_name'] . "' data-jobDescription='". $data['job_description'] ."' data-jobCode='". $data['job_code'] ."'>" . $data['job_name'] . "</option>";
                            }
                        ?>
                </select>
                    
                <input type="hidden" name="job_code" id="job_code" value="<?php echo $row['job_code']?>">
            </div>

            <script>
                $(document).ready(function(){
                    $('#job_name').select2({
                        dropdownParent: $('#incompleteJobinfo'),
                        theme: 'bootstrap-5'
                    });
                });
            </script>

            <script>
                function GetDetail(value) {
                    var selectedOption = document.querySelector('#job_name option[value="' + value + '"]');
                    var jobDescription = selectedOption.getAttribute('data-jobDescription');
                    var jobCode = selectedOption.getAttribute('data-jobCode');
                            
                    document.querySelector('input[name="job_description"]').value = jobDescription;
                    document.querySelector('input[name="job_code"]').value = jobCode;
                }
            </script>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Job Description</label>
                <input type="text" name="job_description" id="job_description" value="<?php echo $row['job_description']?>" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Delivery Date</label>
                <input type="text" name="delivery_date" id="delivery_date" class="form-control" value="<?php echo $row['delivery_date']?>">
            </div>
                                            
            <script>
                $(document).ready(function () {
                    $("#delivery_date").datepicker({
                        dateFormat: "dd/mm/yy"
                    });
                });
            </script>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Requested Date</label>
                <input type="text" name="requested_date" id="requested_date" class="form-control" value="<?php echo $row['requested_date']?>">
            </div>
                                            
            <script>
                $(document).ready(function () {
                    $("#requested_date").datepicker({
                        dateFormat: "dd/mm/yy"
                    });
                });
            </script>
                                            
            <div class="mb-3">
                <label for="" class="fw-bold">Customer Name</label>
                <select type="text" name="customer_name" id="customer_name" style="width: 100%;" class="form-select" onchange="GetCustDetails(this.value)">
                    <option value="<?php echo $row['customer_name']?>"><?php echo $row['customer_name']?></option>
                        <?php
                            
                            include "dbconnect.php";
                                                        
                            $records = mysqli_query($conn, "SELECT * FROM customer_list ORDER BY customer_name ASC");

                            while ($data = mysqli_fetch_array($records)) {
                                echo "<option value='".$data['customer_name']."'
                                              data-custGrade='". $data['customer_grade'] ."'
                                              data-custCode='". $data['customer_code'] ."'
                                              data-custPIC='". $data['customer_PIC'] ."'
                                              data-custAddr1='". $data['cust_address1'] ."'
                                              data-custAddr2='". $data['cust_address2'] ."'
                                              data-custAddr3='". $data['cust_address3'] ."'
                                              data-custNum1='". $data['cust_phone1'] ."'
                                              data-custNum2='". $data['cust_phone2'] ."'> ".$data['customer_name']."
                                      </option>";
                            }
                        ?>
                </select>
                    
                <input type="hidden" name="customer_code" value="<?php echo $row['customer_code'] ?>">
            </div>

            <script>
                $(document).ready(function(){
                    $('#customer_name').select2({
                        dropdownParent: $('#incompleteJobinfo'),
                        dropdownPosition: 'below',
                        theme: 'bootstrap-5'
                    });
                });
            </script>

            <script>
                function GetCustDetails(value) {
                    var selectedOption = document.querySelector('#customer_name option[value="' + value + '"]');
                    var custGrade = selectedOption.getAttribute('data-custGrade');
                    var custCode = selectedOption.getAttribute('data-custCode');
                    var custPIC = selectedOption.getAttribute('data-custPIC');
                    var custAddr1 = selectedOption.getAttribute('data-custAddr1');
                    var custAddr2 = selectedOption.getAttribute('data-custAddr2');
                    var custAddr3 = selectedOption.getAttribute('data-custAddr3');
                    var custNum1 = selectedOption.getAttribute('data-custNum1');
                    var custNum2 = selectedOption.getAttribute('data-custNum2');
                            
                    document.querySelector('input[name="customer_grade"]').value = custGrade;
                    document.querySelector('input[name="customer_code"]').value = custCode;
                    document.querySelector('input[name="customer_PIC"]').value = custPIC;
                    document.querySelector('input[name="cust_address1"]').value = custAddr1;
                    document.querySelector('input[name="cust_address2"]').value = custAddr2;
                    document.querySelector('input[name="cust_address3"]').value = custAddr3;
                    document.querySelector('input[name="cust_phone1"]').value = custNum1;
                    document.querySelector('input[name="cust_phone2"]').value = custNum2;
                }
            </script>

            <div class="mb-3">
                <label for="" class="fw-bold">Customer Address</label>
                <input type="text" name="cust_address1" id="cust_address1" value="<?php echo $row['cust_address1']?>" class="form-control">
                <div class="d-grid d-flex gap-2 mt-2">
                    <input type="text" name="cust_address2" id="cust_address2" value="<?php echo $row['cust_address2']?>" class="form-control">
                    <input type="text" name="cust_address3" id="cust_address3" value="<?php echo $row['cust_address3']?>" class="form-control">
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Customer Grade</label>
                <input type="text" name="customer_grade" id="customer_grade" value="<?php echo $row['customer_grade']?>" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Customer PIC</label>
                <input type="text" name="customer_PIC" id="customer_PIC" value="<?php echo $row['customer_PIC']?>" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Contact Number 1</label>
                <input type="text" name="cust_phone1" id="cust_phone1" value="<?php echo $row['cust_phone1']?>" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Contact Number 2</label>
                <input type="text" name="cust_phone2" id="cust_phone2" value="<?php echo $row['cust_phone2']?>" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                    <label for="" class="fw-bold">Machine Brand</label>
                    <select type="text" name="brand_id" id="machine_brand" style="width: 100%;" class="form-select">
                        <option value="<?php echo $row['brand_id'] ?>"><?php echo $row['machine_brand'] ?></option>
                            <?php
                                
                                include "dbconnect.php";
                                
                                $querydrop = "SELECT * FROM machine_brand";
                                $result = $conn->query($querydrop);
                                
                                if ($result->num_rows > 0) {
                                    while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                        <option value="<?php echo $rows['brand_id']; ?>"><?php echo $rows['brandname']; ?></option>
                            <?php } } ?>
                        
                        <input type="hidden" id="brand" name="machine_brand" value="<?php echo $row['machine_brand'] ?>">
                    </select>
                    
                    <!-- <input type="hidden" name="brand_id" value="<?php echo $row['brand_id'] ?>"> -->
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Machine Type</label>
                <select type="text" name="type_id" id="machine_type" style="width: 100%;" class="form-select"></select>
                    
                <input type="hidden" id="type" name="machine_type" value="<?php echo $row['machine_type'] ?>">
            </div>

            <script>
                function getType(){
                    for (i = 0; i < document.getElementById('machine_type').options.length; i++) {
                        if (document.getElementById('machine_type').options[i].text === "<?php echo $row['machine_type']?>") {
                            document.getElementById('machine_type').options[i].selected = true;
                            
                            break;
                        }
                    }
                }
            </script>

            <div class="mb-3">
                <label for="" class="fw-bold">Machine Name</label>
                <input type="text" name="machine_name" id="machine_name" class="form-control">
                        
                <input type="hidden" name="machine_code" id="machine_code">
                <input type="hidden" name="machine_id" id="machine_id">
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Serial Number</label>
                <select type="text" name="serialnumber" id="serialnumber" style="width: 100%;" class="form-select"></select>
            </div>

            <script>
                function getSerialNumber() {
                    for (i = 0; i < document.getElementById('serialnumber').options.length; i++) {
                        if (document.getElementById('serialnumber').options[i].value === "<?php echo $row['serialnumber']?>") {
                            document.getElementById('serialnumber').options[i].selected = true;
                                
                            break;
                        }
                    }
                }
            </script>
            
            <div class="col-md-6 mb-3">
                <label for="accessories_required" class="fw-bold">Accessory Required</label>
                <select name="accessories_required" id="accessories_required" class="form-select" onchange="myFunctionAccessory()">
                    <option value='' <?php if ($row['accessories_required'] == '') {echo "SELECTED";} ?>></option>
                    <option value='Yes' <?php if ($row['accessories_required'] == 'Yes') {echo "SELECTED";} ?>>Yes</option>
                    <option value='No' <?php if ($row['accessories_required'] == 'No') {echo "SELECTED";} ?>>No</option>
                </select>
            </div>
            
            <!-- Accessory For -->
            <script>
                function myFunctionAccessory() {
                    var accessories = document.getElementById("accessories_required").value;
                    var accForDiv = document.getElementById("Accessory");
                        
                    if (accessories === "Yes") {
                        accForDiv.style.display = "block";
                    }
                        
                    else {
                        accForDiv.style.display = "none";
                        document.getElementById("accessories_for").value = "";
                    }
                }
            </script>
                                     
            <div class="mb-3" id="Accessory" style="display: none;">
                <label for="accessories_for" class="fw-bold">Accessory For</label>
                <select name="accessories_for" id="accessories_for" class="form-select">
                    <option value='' <?php if ($row['accessories_for'] == '') {echo "SELECTED";} ?>></option>
                    <option value='Technician Use' <?php if ($row['accessories_for'] == "Technician Use") {echo "SELECTED";} ?>>Technician Use</option>
                    <option value='Customer Request' <?php if ($row['accessories_for'] == "Customer Request") {echo "SELECTED";} ?>>Customer Request</option>
                </select>
            </div>
            <!-- End of Accessory For -->

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Cancel Job</label>
                <select id="job_cancel" name="job_cancel" class="form-select">
                    <option value='' <?php if ($row['job_cancel'] == '') {echo "SELECTED";} ?>></option>
                    <option value='YES' <?php if ($row['job_cancel'] == 'YES') {echo "SELECTED";} ?>>YES</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="" class="fw-bold">Job Status</label>
                <select type="text" id="job_status" name="job_status" class="form-select" onchange="myFunction()">
                    <option value='' <?php if ($row["job_status"] == "") {echo "SELECTED";} ?>></option>
                    <option value='Doing' <?php if ($row["job_status"] == "Doing") {echo "SELECTED";} ?>>Doing</option>
                    <option value='Pending' <?php if ($row["job_status"] == "Pending") {echo "SELECTED";} ?>>Pending</option>
                    <option value='Incomplete' <?php if ($row["job_status"] == "Incomplete") {echo "SELECTED";} ?>>Incomplete</option>
                    <option value='Completed' <?php if ($row["job_status"] == "Completed") {echo "SELECTED";} ?>>Completed</option>
                </select>
            </div>

            <!--PENDING & INCOMPLETE REASON-->
            <div class="mb-3" id="reasonInput">
                <label for="" class="fw-bold">Reason</label>
                <input type="text" name="reason" id="inputreason" value="<?php echo $row['reason']?>" class="form-control">
            </div>
                
            <script>
                function myFunction() {
                    var jobStatus = document.getElementById("job_status").value;
                    var reasonDiv = document.getElementById("reasonInput");
                        
                    if (jobStatus === "Pending" || jobStatus === "Incomplete") {
                        reasonDiv.style.display = "block";
                    } 
                        
                    else {
                        reasonDiv.style.display = "none";
                    }
                }
           
                myFunction();
            </script>
            <!--PENDING & INCOMPLETE END REASON-->

            <?php if (isset($_SESSION["username"])) { ?>
                <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>">
                <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
            <?php } ?>

            <div class="col-md-6 mb-3">
                <button type="submit" id="submit" name="update" class="btn" style="background-color: #081d45; color:white; border:none; width:100%">Update</button>
            </div>

            <div class="col-md-6 mb-3">
                <button type="button" id="duplicate" name="duplicate" class="btn" style="background-color: #023603; color:white; border:none; width:100%" onclick="submitFormDuplicate();">Duplicate</button>
            </div>

            <p class="control"><b id="messageDuplicatelist"></b></p>
            <p class="text-center fw-bold" id="updatetextinfoIncomplete" style="display: none;"></p>
        </div>
    </form>
    <?php } } } ?>

    <!-- Submit Update Form -->
    <script>
        $(document).ready(function() {
            function hideSuccessMessage() {
                document.getElementById("updatetextinfoIncomplete").style.display = "none";
            }
            
            $("#incompleteJobinfo").submit(function(e) {
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append("update", "true");
                
                $.ajax({
                    type: "POST",
                    url: "homeindex.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "text",
                        
                    success: function(response) {
                        response = response.trim();
                        if (response == "success") {
                            $("#updatetextinfoIncomplete").html("Updated Successfully");
                            $("#updatetextinfoIncomplete").css("color", "green");
                            $("#updatetextinfoIncomplete").css("display", "block");
                            
                            setTimeout(hideSuccessMessage, 2000);
                        }
                        
                        else {
                            console.error("AJAX error:", response);
                                
                            $("#updatetextinfoIncomplete").html("Failed to update");
                            $("#updatetextinfoIncomplete").css("color", "red");
                            $("#updatetextinfoIncomplete").css("display", "block");
                            
                            setTimeout(hideSuccessMessage, 2000);
                        }
                    },
                    
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        });
    </script>

    <!-- Populate machine_type dropdown -->
    <script>
        $(document).ready(function() {
            var brand_id = $('#machine_brand').val();
            var brand = document.getElementById("brand");
            var selectedBrandText = $('#machine_brand').find('option:selected').text();

            $.ajax({
                url: 'machineGetMachineType.php',
                type: 'POST',
                data: {brand_id: brand_id},
                dataType: 'json',
                        
                success: function(response) {
                    brand.value = selectedBrandText;
                    
                    $('#selectedBrandId').val();
                    $('#machine_type').empty().append('<option value="">Select Machine Type</option>');
                    
                    $.each(response, function(index, value) {
                        $('#machine_type').append('<option value="' + value.machine_type_id + '">' + value.machine_type_name + '</option>');
                    });
                            
                    getType();
                        
                    var selecteTypeId = $('#machine_type').val();
                    var type = document.getElementById("type");
                        
                    $('#selecteTypeId').val(selecteTypeId);
                    var selectedTypeText = $('#machine_type').find('option:selected').text();
                        
                    $.ajax({
                        url: 'machineGetMachineSerialNum.php',
                        type: 'POST',
                        data: {type_id: selecteTypeId},
                        dataType: 'json',
                        
                        success: function(response) {
                            type.value = selectedTypeText;
                            
                            $('#selecteTypeId').val()
                            $('#serialnumber').empty().append('<option value="">Select Serial Number</option>');
                                
                            $.each(response, function(index, value) {
                                $('#serialnumber').append('<option value="' + value.machine_serialNumber + '">' + value.machine_serialNumber + ' - ' + value.machine_custName + '</option>');
                            });
                                
                            getSerialNumber();  
                                
                            var selectedSerialNumber = $('#serialnumber').val();
                                
                            $.ajax({
                                url: 'machineGetMachineDetails.php',
                                type: 'POST',
                                data: { serialnumber: selectedSerialNumber },
                                dataType: 'json',
                                
                                success: function(response) {
                                    console.log(response);
                                    
                                    if (response.machine_name) {
                                        $('#machine_name').val(response.machine_name);
                                            $('#machine_code').val(response.machine_code);
                                            $('#machine_id').val(response.machine_id);
                                    }
                                        
                                    else {
                                        $('#machine_name').val('');
                                        $('#machine_code').val('');
                                        $('#machine_id').val('');
                                    }
                                },
                                    
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error:', error);
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    });
                }
            });
        });
                
        $(document).ready(function() {
            $('#machine_brand').select2({
                dropdownParent: $('#incompleteJobinfo'),
                theme: 'bootstrap-5'
            });
                
            $('#machine_type').select2({
                dropdownParent: $('#incompleteJobinfo'),
                theme: 'bootstrap-5'
            });
            
            $('#machine_brand').on('change', function() {
                var selectedBrandId = $(this).val();
                var brand = document.getElementById("brand");
                var selectedBrandText = $(this).find('option:selected').text();
                
                $('#selectedBrandId').val(selectedBrandId);
                
                $.ajax({
                    url: 'machineGetMachineType.php',
                    type: 'POST',
                    data: {brand_id: selectedBrandId},
                    dataType: 'json',
                        
                    success: function(response) {
                        brand.value = selectedBrandText;
                        
                        $('#selectedBrandId').val()
                        $('#machine_type').empty().append('<option value="">Select Machine Type</option>');
                        
                        $.each(response, function(index, value) {
                            $('#machine_type').append('<option value="' + value.machine_type_id + '">' + value.machine_type_name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
            
    <!-- Populate serialnumber dropdown -->
    <script>
        $(document).ready(function() {
            $('#serialnumber').select2({
                dropdownParent: $('#incompleteJobinfo'),
                dropdownPosition: 'below',
                theme: 'bootstrap-5'
            });
                
            $('#machine_type').on('change', function() {
                var selecteTypeId = $(this).val();
                var type = document.getElementById("type");
                    
                $('#selecteTypeId').val(selecteTypeId);
                var selectedTypeText = $(this).find('option:selected').text();

                $.ajax({
                    url: 'machineGetMachineSerialNum.php',
                    type: 'POST',
                    data: {type_id: selecteTypeId},
                    dataType: 'json',
                    
                    success: function(response) {
                        type.value = selectedTypeText;
                        
                        $('#selecteTypeId').val()
                        $('#serialnumber').empty().append('<option value="">Select Serial Number</option>');
                        
                        $.each(response, function(index, value) {
                            $('#serialnumber').append('<option value="' + value.machine_serialNumber + '">' + value.machine_serialNumber + ' - ' + value.machine_custName + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <!-- Autofill machine_name, machine_code, and machine_id -->
    <script>
        $(document).ready(function() {
            $('#serialnumber').on('change', function() {
                var selectedSerialNumber = $(this).val();
                
                $.ajax({
                    url: 'machineGetMachineDetails.php',
                    type: 'POST',
                    data: { serialnumber: selectedSerialNumber },
                    dataType: 'json',
                    
                    success: function(response) {
                        console.log(response);
                        
                        if (response.machine_name) {
                            $('#machine_name').val(response.machine_name);
                            $('#machine_code').val(response.machine_code);
                            $('#machine_id').val(response.machine_id);
                        } 
                                
                        else {
                            $('#machine_name').val('');
                            $('#machine_code').val('');
                            $('#machine_id').val('');
                        }
                    },
                    
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.log(xhr.responseText);
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
            
            if (jobregister_id != '' || jobregister_id == '', 
                  machine_name != '' || machine_name == '') {
                
                var formData = {jobregister_id: jobregister_id,
                                  machine_name: machine_name};
                
                $.ajax({
                    url: "machineassistant.php",
                    type: 'POST',
                    data: formData,
                    
                    success: function(response) {
                            var res = JSON.parse(response);
                            console.log(res);
                    }
                });
            }
        }
    </script>
    <!-- End of Update machine name in assistant table -->

    <!-- To duplicate Job -->
    <script type="text/javascript">
        function submitFormDuplicate() {
            var job_priority = $('input[name=job_priority]').val();
            var job_order_number = $('input[name=job_order_number]').val();
            var job_name = $('select[name=job_name]').val();
            var job_code = $('input[name=job_code]').val();
            var job_description = $('input[name=job_description]').val();
            var requested_date = $('input[name=requested_date]').val();
            var delivery_date = $('input[name=delivery_date]').val();
            var customer_name = $('select[name=customer_name]').val();
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
            var reason = $('input[name=reason]').val();
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