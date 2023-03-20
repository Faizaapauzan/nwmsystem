<?php
    
    session_start();

    date_default_timezone_set("Asia/Kuala_Lumpur");

    if (isset($_SESSION["username"])) {
        $job_assign = $_SESSION["username"];
      }

?>
 
<!DOCTYPE html>

<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>Job Register</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link href="css/technicianmain.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>    
</head>

<body>
    
    <nav class="nav">
        
    <div class="nav__link nav__link dropdown">
        <i class="material-icons">list_alt</i>
        <span class="nav__text">Job Listing</span>
        <div class="dropdown-content">
            <a href="assignedjob.php">Assigned Job</a>
            <a href="unassignedjob.php">Unassigned Job</a>
		</div>
	</div>
    
    <a href="pendingjoblistst.php" class="nav__link">
        <i class="material-icons">pending_actions</i>
        <span class="nav__text">Pending</span>
    </a>
    
    <a href="technician.php" class="nav__link">
        <i class="material-icons">home</i>
        <span class="nav__text">Home</span>
    </a>
    
    <a href="incompletejoblistst.php" class="nav__link">
        <i class="material-icons">do_not_disturb_on</i>
        <span class="nav__text">Incomplete</span>
    </a>
    
    <a href="completejoblistst.php" class="nav__link">
        <i class="material-icons">check_circle</i>
        <span class="nav__text">Complete</span>
    </a>
    
    </nav>

    <div class="container">
        <div class="column">
            <p class="column-title" id="technician">Job Register</p>
            
            <div class="column-inside">
                
            <?php include 'dbconnect.php'; ?>
            
            <form action="jobtechnicianindex.php" name="JobForm" method="post" onsubmit="return validateForm()">
                
                <input type="hidden" name="job_assign" id="job_assign" value="<?php echo $job_assign; ?>">
                <input type="hidden" name="customer_grade" id="customer_grade">
                <input type="hidden" name="customer_PIC" id="customer_PIC">
                <input type="hidden" name="cust_phone1" id="cust_phone1">
                <input type="hidden" name="cust_phone2" id="cust_phone2">
                <input type="hidden" name="cust_address1" id="cust_address1">
                <input type="hidden" name="cust_address2" id="cust_address2">
                <input type="hidden" name="cust_address3" id="cust_address3">
                <input type="hidden" name="today_date" id="today_date" value="<?php echo date('Y-m-d'); ?>">
                <input type="hidden" name="accessories_required" id="accessories_required" value="No">
                <input type="hidden" name="requested_date" id="requestDate" value="<?php echo date('Y-m-d'); ?>">
                
                <div class="CodeDropdown">
                    <div class="form-group"><label>Select Customer</label>
                    
                    <br/>
            
                    <select id="ddlModel" onchange="GetDetail(this.value)"> 
                        <option value="">-- Select Customer --</option>
                        <?php
                            include "dbconnect.php";
                            $records = mysqli_query($conn, "SELECT * From customer_list ORDER BY customer_name ASC");
                            while($data = mysqli_fetch_array($records))
                                {
                                    echo "<option value='". $data['customer_id'] ."'>" .$data['customer_code']. "      -      " . $data['customer_name']."</option>";
                                }
                        ?>  
                    </select>
            
                    <br/>
                
                    <input type="hidden" id="text" name="customer_id" onchange="GetDetail(this.value)">
                    <input type="hidden" id="customer_code" name="customer_code">
                    <input type="hidden" name="customer_name" id="customer_name">
                    </div>
                </div>
            
                <script>$(document).ready(function(){$("#ddlModel").select2();});</script>
                
                <script>
                    $(document).ready(function(){
                        $("#ddlModel").on("change",function(){
                            var GetValue=$("#ddlModel").val();
                            $("#text").val(GetValue);
                        });
                    });
                </script>
            
                <script>
                    function GetDetail(str) {
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
                                    var myObj = JSON.parse (this.responseText);
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
            
                <label for="job_order_number" class="details">Job Order Number</label>
                <div class="technician-time">
                    <input type="text" id="techJobONum" name="job_order_number" class="technician-time-input" placeholder="Enter Job Order Number">
                    <input type="button" onclick="techJobON();" class="technician-time-botton" value="Click"/>
                        
                        <script type="text/javascript">
                            function techJobON()
                                {
                                    $.ajax({url:"jobordernumberindex.php", success:function(result)
                                        {
                                            $("#techJobONum").val(result);
                                        }
                                    })
                                }
                        </script>
                        
                        <p class="control"><b id="alertmessage"></b></p>
                </div>
                
                <div class="CodeDropdown" style="padding-top: 14px;">
                    <div class="form-group"><label>Select Job</label>
                
                    <br/>
                
                        <select id="jobModel" onchange="GetJob(this.value)"> 
                            <option value="">-- Select Job --</option>
                                <?php
                                    include "dbconnect.php";
                                    
                                    $records = mysqli_query($conn, "SELECT * From jobtype_list ORDER BY job_name ASC");
                                    while($data = mysqli_fetch_array($records)) {
                                        echo "<option value='". $data['job_code'] ."'>" .$data['job_code']. "      -      " . $data['job_name']."</option>";
                                    }
                                ?>  
                        </select>

                        <input type="hidden" name="job_code" id='jobText' onchange="GetJob(this.value)">
                        <input type="hidden" name="job_name" id="job_name">
                        
                        <div class="input-box" style="margin-top:20px;">
                            <label for="JobDescription" class="details">Job Description</label>
                            <input type="text" name="job_description" id="job_description" placeholder="Enter Job Description">
                        </div>
                    </div>
                </div>
            
                <script>$(document).ready(function(){$("#jobModel").select2();});</script>
            
                <script>
                    $(document).ready(function(){
                        $("#jobModel").on("change",function(){
                            var GetValue=$("#jobModel").val();
                            $("#jobText").val(GetValue);
                        });
                    });
                </script>
            
                <script>
                    function GetJob(str) {
                        if (str.length == 0) {
                            document.getElementById("job_name").value = "";
                            document.getElementById("job_description").value = "";
                            return;
                        }
                        
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    document.getElementById("job_name").value = myObj[0];
                                    document.getElementById("job_description").value = myObj[1];
                                }
                            };
                            
                            xmlhttp.open("GET", "fetchjob.php?job_code=" + str, true);
                            xmlhttp.send();
                        }
                    }
	            </script>
                
                <div class="CodeDropdown">
                    <label for="brand">Machine Brand</label>
                    
                    <select onchange="GetBrand(this.value)" class="form-select" id="JenamaMachine">
                        <option value="">-- Select Brand --</option>
                            <?php
                                $query = "SELECT * FROM machine_brand";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                        <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
                            <?php } }  ?>
                    </select>
                    
                    <input type="hidden" id="IdJenama" name="brand_id" onchange="GetBrand(this.value)" readonly >
                    <input type="hidden" id="NamaJenama" name="machine_brand" onchange="GetBrand(this.value)" readonly >
                </div>

                <script>$(document).ready(function() {$('#JenamaMachine').select2();});</script>
                
                <script>
                    function GetBrand(str) {
                        if (str.length == 0) {
                            document.getElementById("IdJenama").value = "";
                            document.getElementById("NamaJenama").value = "";
                            return;
                        }
                        
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    document.getElementById ("IdJenama").value = myObj[0];
                                    document.getElementById ("NamaJenama").value = myObj[1];
                                }
                            };
                            
                            xmlhttp.open("GET", "fetchbrand.php?brand_id=" + str, true);
                            xmlhttp.send();
                        }
                    }
	            </script>
            
                <script>
                    $(document).ready(function() {
                        $("#JenamaMachine").on('change', function() {
                            var brandid = $(this).val();
                            
                            $.ajax({
                                method: "POST",
                                url: "ajaxData.php",
                                data: {id: brandid},
                                datatype: "html",
                                success: function(data) {
                                    $("#JenisMachine").html(data);
                                    $("#NumberSiriSelect").html('<option value="">Select Serial Number</option>');
                                }
                            });
                        });
                        
                        $("#JenisMachine").on('change', function() {
                            var typeid = $(this).val();
                            
                            $.ajax({
                                method: "POST",
                                url: "ajaxData.php",
                                data: {sid: typeid},
                                datatype: "html",
                                success: function(data) {
                                    $("#NumberSiriSelect").html(data);
                                }
                            });
                        });
                    });
                </script>
            
                <div class="CodeDropdown" style="padding-top: 15px;">
                    <label for="type"> Machine Type</label>
                        
                        <select onchange="GetType(this.value)" class="form-select" id="JenisMachine">
                            <option value="">-- Select Type --</option>
                        </select>
                    
                    <input type="hidden" id="IdJenis" name="type_id" onchange="GetType(this.value)" readonly >  
                    <input type="hidden" id="NamaJenis" name="machine_type" onchange="GetType(this.value)" readonly >  
                </div>

                <script>$(document).ready(function(){$("#JenisMachine").select2();});</script>
            
                <script>
                    function GetType(str) {
                        if (str.length == 0) {
                            document.getElementById ("IdJenis").value = "";
                            document.getElementById ("NamaJenis").value = "";
                            return;
                        }
                        
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    document.getElementById ("IdJenis").value = myObj[0];
                                    document.getElementById ("NamaJenis").value = myObj[1];
                                }
                            };
                            
                            xmlhttp.open("GET", "fetchtype.php?type_id=" + str, true);
                            xmlhttp.send();
                        }
                    }
	            </script>
                
                <div class="CodeDropdown" style="padding-top: 20px;">
                    <label for="sn">Serial Number</label>
                    
                    <select class="form-select" id="NumberSiriSelect" onchange="GetMachine(this.value)">
                        <option value="">-- Select Serial Number --</option>    
                    </select>
             
                    <input type="hidden" id="NumberSiriInput" name="serialnumber">
                    <input type="hidden" id="IdMachine" name="machine_id">
                    <input type="hidden" id="CodeMachine" name="machine_code">  
                </div>
            
                <br/>

                <script>$(document).ready(function(){$("#NumberSiriSelect").select2();});</script>
                
                <script>
                    function GetMachine(str) {
                        if (str.length == 0) {
                            document.getElementById("IdMachine").value = "";
                            document.getElementById("NumberSiriInput").value = "";
                            document.getElementById("CodeMachine").value = "";
                            document.getElementById("NamaMachine").value = "";
                            document.getElementById("DescriptionMachine").value = "";
                            return;
                        }
                        
                        else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    var myObj = JSON.parse(this.responseText);
                                    document.getElementById ("IdMachine").value = myObj[0];
                                    document.getElementById ("NumberSiriInput").value = myObj[1];
                                    document.getElementById ("CodeMachine").value = myObj[2];
                                    document.getElementById ("NamaMachine").value = myObj[3];
                                    document.getElementById ("DescriptionMachine").value = myObj[4];
                                }
                            };
                            
                            xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
                            xmlhttp.send();
                        }
                    }
                </script>
                
                <div class="input-box">
                    <label for="" class="details">Machine Name</label>
                        <input type="text" id="NamaMachine" name="machine_name" placeholder="Enter Machine Name">
                        
                        <input type="hidden" name="machine_description" id="DescriptionMachine">
                </div>
                
                <input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $job_assign; ?>" readonly>
                <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $job_assign; ?>" readonly>
                
                <div class="btn-box">
                    <button class="buttonbiru" type="submit" name="submit" value="register">Register</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    </br>

    <script>
        function validateForm() {
            var x = document.forms["JobForm"]["job_order_number"].value;
            if (x == "" || x == null) {
                document.getElementById("techJobONum").focus();
                $('#alertmessage').html('<span style="color: red">Job Order Number be filled out</span>');
                return false;
            }
        }
    </script>

</body>
</html>