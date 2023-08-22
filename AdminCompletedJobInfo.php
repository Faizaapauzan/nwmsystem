<?php session_start(); ?>

<!DOCTYPE html>
    <html>
        <head>

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
            
            <form action="homeindex.php" method="post" id="formjobinfo">
                <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                <input type="hidden" name="job_cancel" value="<?php echo $row['job_cancel'] ?>">
                <input type="hidden" name="job_status" value="<?php echo $row['job_status'] ?>">
                <input type="hidden" name="reason" value="<?php echo $row['reason'] ?>">
                <input type="hidden" name="accessories_required" value="<?php echo $row['accessories_required'] ?>">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Job Priority</label>
                        <input type="text" name="job_priority" value="<?php echo $row['job_priority']?>" class="form-control">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Job Order Number</label>
                        <input type="text" name="job_order_number" value="<?php echo $row['job_order_number']?>" class="form-control" readonly>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Job Name</label>
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
                    </div>

                    <script>
                        $(document).ready(function(){
                            $('#job_name').select2({
                                dropdownParent: $('#formjobinfo'),
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
                        <label for="">Assign Date</label>
                        <input type="date" name="DateAssign" value="<?php echo $row['DateAssign']?>" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label for="">Job Description</label>
                        <input type="text" name="job_description" value="<?php echo $row['job_description']?>" class="form-control">
                        <input type="hidden" name="job_code" id="job_code" value="<?php echo $row['job_code']?>" />
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="">Requested date</label>
                        <input type="date" name="requested_date" value="<?php echo $row['requested_date']?>" class="form-control">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="">Delivery date</label>
                        <input type="date" name="delivery_date" value="<?php echo $row['delivery_date']?>" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label for="">Customer Name</label>
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
                                                            data-custNum2='". $data['cust_phone2'] ."'> ".$data['customer_name']."</option>";
                                    }
                                ?>
                        </select>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $('#customer_name').select2({
                                dropdownParent: $('#formjobinfo'),
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
                        <label for="">Customer Address</label>
                        <input type="text" name="cust_address1" value="<?php echo $row['cust_address1']?>" class="form-control">
                        <div class="input-group">
                            <input type="text" name="cust_address2" value="<?php echo $row['cust_address2']?>" class="form-control">
                            <input type="text" name="cust_address3" value="<?php echo $row['cust_address3']?>" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Customer Grade</label>
                        <input type="text" name="customer_grade" value="<?php echo $row['customer_grade']?>" class="form-control">
                        <input type="hidden" id="customer_code" name="customer_code" value="<?php echo $row['customer_code']?>">   
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="">Customer PIC</label>
                        <input type="text" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" class="form-control">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="">Contact Number 1</label>
                        <input type="text" name="cust_phone1" value="<?php echo $row['cust_phone1']?>" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Contact Number 2</label>
                        <input type="text" name="cust_phone2" value="<?php echo $row['cust_phone2']?>" class="form-control">
                    </div>
    
                    <div class="col-md-6 mb-3">
                        <label for="">Machine Brand</label>
                        <select type="text" name="machine_brand" id="machine_brand" style="width: 100%;" class="form-select">
                            <option value="<?php echo $row['machine_brand'] ?>"><?php echo $row['machine_brand'] ?></option>
                                <?php
                                    
                                    include "dbconnect.php";
                                    
                                    $querydrop = "SELECT * FROM machine_brand";
                                    $result = $conn->query($querydrop);
                                    
                                    if ($result->num_rows > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
                                <?php } } ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Machine Type</label>
                        <select type="text" name="machine_type" id="machine_type" style="width: 100%;" class="form-select"></select>
                        
                        <input type="hidden" name="type_id" value="<?php echo $row['type_id'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="">Serial Number</label>
                        <select type="text" name="serialnumber" id="serialnumber" style="width: 100%;" class="form-select"></select>
                    </div>

                    <div class="mb-3">
                        <label for="">Machine Name</label>
                        <input type="text" name="machine_name" id="machine_name" class="form-control">
                        
                        <input type="text" name="machine_code" id="machine_code">
                        <input type="text" name="machine_id" id="machine_id">
                    </div>

                    <?php if (isset($_SESSION["username"])) { ?>
                        <input type="text" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>">
                    <?php } ?>

                    <button type="submit" id="submit" name="update" class="btn btn-primary" onclick="updtMchn();">Update</button>
                </div>
            </form>
            <?php } } } ?>

            <!-- Populate machine_type dropdown -->
            <script>
                $(document).ready(function() {
                    $('#machine_brand').select2({
                        dropdownParent: $('#formjobinfo'),
                        dropdownPosition: 'below',
                        theme: 'bootstrap-5'
                    });
                    
                    $('#machine_type').select2({
                        dropdownParent: $('#formjobinfo'),
                        dropdownPosition: 'below',
                        theme: 'bootstrap-5'
                    });
                    
                    $('#machine_brand').on('change', function() {
                        var selectedBrandId = $(this).val();
                        $('#selectedBrandId').val(selectedBrandId);
                        
                        $.ajax({
                            url: 'machineGetMachineType.php',
                            type: 'POST',
                            data: {brand_id: selectedBrandId},
                            dataType: 'json',
                            
                            success: function(response) {
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
                        dropdownParent: $('#formjobinfo'),
                        dropdownPosition: 'below',
                        theme: 'bootstrap-5'
                    });
                    
                    $('#machine_type').on('change', function() {
                        var selecteTypeId = $(this).val();
                        $('#selecteTypeId').val(selecteTypeId);
                        
                        $.ajax({
                            url: 'machineGetMachineSerialNum.php',
                            type: 'POST',
                            data: {type_id: selecteTypeId},
                            dataType: 'json',
                            
                            success: function(response) {
                                $('#selecteTypeId').val()
                                $('#serialnumber').empty().append('<option value="">Select Serial Number</option>');
                                $.each(response, function(index, value) {
                                    $('#serialnumber').append('<option value="' + value.machine_serialNumber + '">' + value.machine_serialNumber + '</option>');
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
                    
                    if(jobregister_id!='' || jobregister_id=='',
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
        </body>
    </html>

        