<?php
session_start();
?>

<?php
include 'dbconnect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Job Registration</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/jobregister.css" rel="stylesheet" />
    <script src="js/home.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>  
    <script src="js/job-register-validation.js" type="text/javascript" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>

<body>

<div class="sidebar">
            <div class="logo-details">
                <i class='bx bx-window-alt'></i>
            <span class="logo_name">NWM System</span>
            </div>
        </a>
        
        <ul class="nav-links">
               <li>
                <a href="jobregister.php">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
            </li>

             <li>
                <a href="accessoriesregister.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="link_name">Job Accessories</span>
                </a>
            </li>
           
            <li>
                <a href="staff.php">
                    <i class="bx bxs-id-card"></i>
                    <span class="link_name">Staff</span>
                </a>
            </li>

            <li>
                <a href="technicianlist.php">
                    <i class="fa fa-users"></i>
                    <span class="link_name">Technician</span>
                </a>
            </li>

            <li>
                <a href="customer.php">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Customers</span>
                </a>
            </li>

            <li>
                <a href="machine.php">
                    <i class="bx bxl-medium-square"></i>
                    <span class="link_name">Machine</span>
                </a>
            </li>

            <li>
                <a href="accessories.php">
                    <i class="bx bx-wrench"></i>
                    <span class="link_name">Accessories</span>
                </a>
            </li>

            <li>
                <a href="jobtype.php">
                    <i class="bx bx-briefcase"></i>
                    <span class="link_name">Job Type</span>
                </a>
            </li>

            <li>
                <a href="jobcanceled.php">
                    <i class="fa fa-minus-square"></i>
                    <span class="link_name">Canceled Job</span>
                </a>
            </li>

            <li>
                <a href="report.php">
                    <i class='bx bxs-report' ></i>
                    <span class="link_name">Report</span>
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
            </li>
            
        </ul>
    </div>

    <!--Home navigation-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <a href="Adminhomepage.php">
                    <span class="dashboard">Home</span>
            </div>
            <div class="notification-button">
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                </a>
            </div>
        </nav>

<!--Job Register-->

        <div class="jobRegisterContainer">
            <div class="jobRegisterheading">
                <div id="progress"></div>
                <div class="step-col"><small>Customer</small></div>
                <div class="step-col"><small> Job </small></div>
                <div class="step-col"><small>Machine</small></div>
              
      
            </div>

 <!--Add Customer Modal -->

        <div id="popupListAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Customer Registration</div>
                <div class="contentListAddForm">
                   <form id="user_form" method="post">
                        <div class="listAddForm-details">
                           
                            <div class="input-box">
                                <label for="customerCode" class="details">Customer Code</label>
                                <input type="text" id="customerCode" name="customer_code" onkeyup="checkcustomer_codelAvailability()" value="" class="form-control" placeholder="Enter Customer Code" required> 
                                <span id="customer_code-availability-status"></span>
                            </div>
                            <div class="input-box">
                                <label for="customerName" class="details">Customer Name</label>
                                <input type="text" id="customername" name="customer_name" placeholder="Enter Customer Name" required>
                            </div>
                            <div class="input-box">
                                <label for="address" class="details">Customer Address</label>
                                <input type="text" id="address1" name="cust_address1" placeholder="Enter Address 1" required>
                            </div>
                             <div class="input-box">
                                <input type="text" id="address2" name="cust_address2" placeholder="Address 2" required>
                            </div>
                             <div class="input-box">
                                <input type="text" id="address3" name="cust_address3" placeholder="Address 3" required>
                            </div>
                            <div class="input-box">
                                <label for="customerGrade" class="details">Customer Grade</label>
                                <input type="text" id="customergrade" name="customer_grade" placeholder="Enter Customer Grade" required>
                            </div>
                            <div class="input-box">
                                <label for="customerPIC" class="details">Customer PIC</label>
                                <input type="text" id="customerPIC" name="customer_PIC" placeholder="Enter Customer PIC" required>
                            </div>
                             <div class="input-box">
                                <label for="customerPhone" class="details">Phone 1</label>
                                <input type="text" id="phone1" name="cust_phone1" placeholder="Enter Customer Phone" required>
                            </div>
                             <div class="input-box">
                                <label for="customerPhone" class="details">Phone 2</label>
                                <input type="text" id="phone1" name="cust_phone1" placeholder="Enter Customer Phone" required>
                            </div>
                             <input type="hidden" name="customercreated_by" id="customercreatedby" value="<?php echo $_SESSION["username"] ?>" readonly>
                            <input type="hidden" name="customerlasmodify_by" id="customerlasmodifyby" value="<?php echo $_SESSION["username"] ?>" readonly>
                        </div>

                        <div class="listAddFormbutton">
                        <p class="control"><b id="mesg"></b></p>
                        <input type="button" id="save_cust" name="save_cust"  value="Register" />
                        <input type="button" onclick="document.getElementById('popupListAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
<script>
    $(document).ready(function () {
        $('#save_cust').click(function () {
            var data = $('#user_form').serialize() + '&save_cust=save_cust';
            $.ajax({
                url: 'insertcustomer.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#mesg').text(response);
                    $('#customer_code').text('');
                    $('#customer_name').text('');
                    $('#cust_address1').text('');
                    $('#cust_address2').text('');
                    $('#cust_address3').text('');
                    $('#customer_grade').text('');
                    $('#customer_PIC').text('');
                    $('#cust_phone1').text('');
                    $('#cust_phone2').text('');
                    $('#customercreated_by').text('');
                    $('#customerlasmodify_by').text('');
                }
            });
        });
    });
</script>
 <!--Finish Add Customer -->
        
 <!--Add Job Modal-->

        <div id="jobAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add Job</div>
                <div class="contentListAddForm">
                     <form id="jobForm" method="post">
                        <div class="listAddForm-details">
                            <div class="input-box">
                                <label for="JobCode" class="details">Job Code</label>
                                <input type="text" id="job_code" name="job_code" onkeyup="checkJobCodelAvailability()" value="" class="form-control" placeholder="Enter Job Code" required> 
                                <span id="job_code-availability-status"></span>  
                            </div>
                            <div class="input-box">
                                <label for="JobName" class="details">Job Name</label>
                                <input type="text" id="JobName" name="job_name" placeholder="Enter Job Name" required>
                            </div>
                            <div class="input-box">
                                <label for="JobDescription" class="details">Job Description</label>
                                <input type="text" id="JobDescription" name="job_description" placeholder="Enter Job Description" required>
                            </div>

                            <?php if (isset($_SESSION["username"])) ?>
                            <input type="hidden" name="jobtypecreated_by" id="jobtypecreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                            <input type="hidden" name="jobtypelastmodify_by" id="jobtypelastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                        </div>

                        <div class="listAddFormbutton">
                        <p class="control"><b id="mesage"></b></p>
                        <input class="button is-info is-large" id="save_job" name="save_job" type="button" value="Register" />                    
                           <input type="button" onclick="document.getElementById('jobAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div> 


<script>
    $(document).ready(function () {
        $('#save_job').click(function () {
            var data = $('#jobForm').serialize() + '&save_job=save_job';
            $.ajax({
                url: 'insertjob.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#mesage').text(response);
                    $('#job_code').text('');
                    $('#job_name').text('');
                    $('#job_description').text('');
                    $('#jobtypecreated_by').text('');
                    $('#jobtypelastmodify_by').text('');
                    
                  
                }
            });
        });
    });
</script>
<!--Finish Add Job -->

        
<!--Add machine Modal-->
        <div id="machineAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add Machine</div>
                <div class="contentListAddForm">
                    <form id="machineForm" method="post">
                        <div class="listAddForm-details">
                            <div class="input-box">
                                <label for="MachineCode" class="details">Machine Code</label>
                                <input type="text" id="machineCode" name="machine_code" onkeyup="checkMachineCodelAvailability()" value="" class="form-control" placeholder="Enter Machine Code" required> 
                                <span id="machine_code-availability-status"></span>
                            </div>
                            <div class="input-box">
                                <label for="MachineName" class="details">Machine Name</label>
                                <input type="text" id="machinename" name="machine_name" placeholder="Enter Machine Name" required>
                            </div>
                            <div class="input-box">
                                <label for="MachineType" class="details">Machine Type</label>
                                <input type="text" id="MachineType" name="machine_type" placeholder="Enter Machine Type" required>
                            </div>
                            <div class="input-box">
                                <label for="MachineBrand" class="details">Machine Brand</label>
                                <input type="text" id="MachineBrand" name="machine_brand" placeholder="Enter Machine Brand" required>
                            </div>
                             <div class="input-box">
                                <label for="SerialNumber" class="details">Serial Number</label>
                                <input type="text" id="SerialNumber" name="serialnumber" placeholder="Enter Machine Serial Number" required>
                            </div>
                             <div class="input-box">
                                <label for="customerName" class="details">Customer Name</label>
                                <input type="text" id="customerName" name="customer_name" placeholder="Enter Customer Name" required>
                            </div>
                             <div class="input-box">
                                <label for="PurchaseDate" class="details">Purchase Date</label>
                                <input type="date" id="PurchaseDate" name="purchase_date" placeholder="Enter Machine Purchase Date" required>
                            </div>
                            <div class="input-box">
                                <label for="MachineDescription" class="details">Machine Description</label>
                                <input type="text" id="MachineDescription" name="machine_description" placeholder="Enter Machine Description" required>
                            </div>

                             <?php if (isset($_SESSION["username"])) ?>
                            <input type="hidden" name="machinelistcreated_by" id="machinelistcreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                            <input type="hidden" name="machinelistlastmodify_by" id="machinelistlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

                        </div>

                        <div class="listAddFormbutton">
                            <p class="control"><b id="mchmesage"></b></p>      
                            <input class="button is-info is-large" id="save_machine" name="save_machine" type="button" value="Register" />
                            <input type="button" onclick="document.getElementById('machineAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
    $(document).ready(function () {
        $('#save_machine').click(function () {
            var data = $('#machineForm').serialize() + '&save_machine=save_machine';
            $.ajax({
                url: 'insertmachine.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#mchmesage').text(response);
                    $('#machine_code').text('');
                    $('#machine_name').text('');
                    $('#machine_type').text('');
                    $('#machine_brand').text('');
                    $('#serialnumber').text('');
                    $('#customer_name').text('');
                    $('#purchase_date').text('');
                    $('#machine_description').text('');
                    $('#machinelistcreated_by').text('');
                    $('#machinelistlastmodify_by').text('');
                  
                }
            });
        });
    });
</script>
<!--Finish Add Machine -->


<!--Job Info 1 Customer-->

    <?php
        $db = mysqli_connect("localhost","root","","nwmsystem");
        if(!$db)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>

    <form action="jobregisterindex.php" method="post">
    <div id="jobInfo1">
    <div class="jobInfoTitle">
    <h2>Customer Details</h2>
    </div>
    <br/>
    <div class="CodeDropdown">
    <div class="form-group"><label>Customer Code</label>  
    <br/>
    <br/>
    <select id="ddlModel" onchange="GetDetail(this.value)"> <option value="">--  Select Customer --</option>
   <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT customer_id, customer_code, customer_name From customer_list ORDER BY customerlasmodify_at ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['customer_id'] ."'>" .$data['customer_code']. "      -      " . $data['customer_name']."</option>";  // displaying data in option menu
        }	
    ?>  
    </select>
         <!-- <input type='button' value='Seleted option' id='but_read'> -->
        
    <div class="input-box">
    <input type="hidden" id="text" class="form-control" name="customer_id" onchange="GetDetail(this.value)" readonly >  
    </div>
    <div class="input-box">
    <input type="text" id="customer_code" class="form-control" name="customer_code" placeholder="Enter Customer Code" readonly >  
    </div></div></div>
    <div class="dropdownCode">
    <!-- <div class="select"><i class='bx bxs-down-arrow'></i></div> -->
    <div class="add"><i class='bx bxs-plus-square'onclick="document.getElementById('popupListAddForm').style.display='block'"></i></div>
    </div>
    <br/>               
    <div class="form-group"><label>Customer Name</label>
	<input type="text" name="customer_name" id="customer_name" class="form-control" placeholder='Enter Customer Name'>
	</div>
    <br/> 
    <div class="form-group"><label>Customer Grade</label>
	<input type="text" name="customer_grade" id="customer_grade" class="form-control" placeholder='Enter Customer Grade'>
	</div>
    <br/>
    <div class="form-group"><label>Customer PIC</label>
	<input type="text" name="customer_PIC" id="customer_PIC" class="form-control" placeholder='Enter Customer PIC'>
	</div>
    <br/>
    <div class="form-group"><label>Phone 1</label>
	<input type="text" name="cust_phone1" id="cust_phone1" class="form-control" placeholder='Enter Customer Phone'>
	</div>
    <div class="form-group"><label>Phone 2</label>
	<input type="text" name="cust_phone2" id="cust_phone2" class="form-control" placeholder='Enter Customer Phone'>
	</div>
    <br/>
    <div class="form-group"><label>Customer Address</label>
	<input type="text" name="cust_address1" id="cust_address1" class="form-control" placeholder='Enter Customer Address'>
    <input type="text" name="cust_address2" id="cust_address2" class="form-control" placeholder='Address 2'>
    <input type="text" name="cust_address3" id="cust_address3" class="form-control" placeholder='Address 3'>
	</div>

    <div class="btn-box">
    <button type="next" id="btnNext1">Next</button>
    </div>
    </div>

      <!-- Script -->
        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#ddlModel").select2();

            // Read selected option
            // $('#but_read').click(function(){
            //     var customer_code = $('#ddlModel option:selected').text();
            //     var customer_id = $('#ddlModel').val();
           

            // });
        });
        </script>

<script>
$(function() {
    $("#save_cust").click(function(e) {
        e.preventDefault();
        var customer_code = $("#customer_code").val();
		var dataString = 'customer_code=' + customer_code; 
        if(customer_code =='')
        {   $('.success').fadeOut(200).hide();
            $('.error').fadeIn(200).show();
        }
        else
        {
            $.ajax({
                type: "POST",				
                url: "insertcustomer.php",
				data: dataString,
                success: function(data) {
                 $('#form').fadeOut(200).hide();
                 $('.success').fadeIn(200).show();
                 $('.error').fadeOut(200).hide();
                 $('#ddlModel').append($('<option>', {
                    value: data.id,
                    text: customer_code
    }));
}
            });
        }
      
    });
});

</script>
<script>
$(document).ready(function(){
	
$("#ddlModel").on("change",function(){
   var GetValue=$("#ddlModel").val();
   $("#text").val(GetValue);
});

});

</script>

<script>
		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
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
							("customer_code").value = myObj[0];
						
						// Assign the value received to
						// last name input field
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

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchcustomer.php?customer_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>

<!--Job Info 2 Job-->

<?php
$db = mysqli_connect("localhost","root","","nwmsystem");
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>

        <div id="jobInfo2">
                    <div class="jobInfoTitle">
                        <h2>Job Details</h2>
                    </div>
					
					<label for="job_order_number" class:"details" >Job Order Number</label>
					<div class="technician-time">
					<input type="text" id="Departure" name="job_order_number" class="technician-time-input" placeholder="Enter Job Order Number">
					<button onclick="test();" class="technician-time-botton" type="submit">Get Job Order Number</button>
					<script type="text/javascript">
                    function test()
                    {
                    $.ajax({url:"jobordernumberindex.php", success:function(result)
                    {
                    $("#Departure").val(result);
                    }
                    })
                    }
                    </script>
					</div>
					
					
                    <div class="CodeDropdown">
    <div class="form-group"><label>Job Code</label>  
    <br/><br/>
    <select id="jobModel" onchange="GetJob(this.value)"> <option value="">-- Select Job --</option>
                    <?php include "dbconnect.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT job_code, job_name From jobtype_list ORDER BY jobtypelastmodify_at DESC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                     {
                   echo "<option value='". $data['job_code'] ."'>" .$data['job_code']. "      -      " . $data['job_name']."</option>";  // displaying data in option menu
                     }	
                     ?>  
  </select>
    <div class="input-box">
     <input type="text" name="job_code" id='jobText' class='form-control' placeholder='Enter Job Code' onchange="GetJob(this.value)" value="" readonly>
    </div></div></div>
                    <div class="dropdownCode">
                        <!-- <div class="select"><i class='bx bxs-down-arrow'></i></div> -->
                        <div class="add"><i class='bx bxs-plus-square' id="btnRegister" onclick="document.getElementById('jobAddForm').style.display='block'"></i></div>
                    </div>
                    <div class="input-box">
                        <label for="job_name" class="details">Job Name</label>
                        <input type="text" id="job_name" name="job_name" placeholder="Enter Job Name" required>
                    </div>
                    <div class="input-box">
                        <label for="JobDescription" class="details">Job Description</label>
                        <textarea name="job_description" id="job_description" placeholder="Enter Job Description" rows="5" cols="119" required>
                        </textarea>
                    </div>
                    <div class="input-box">
                        <label for="job_priority" class="details">Job Priority</label>
                        <input type="text" id="jobPriority" name="job_priority" placeholder="Enter Job Priority">
                    </div>
                    <div class="input-box">
                        <label for="requested_date" class="details">Request Date</label>
                        <input type="date" id="requestDate" name="requested_date" placeholder="Enter Request Date">
                    </div>
                    <div class="input-box">
                        <label for="delivery_date" class="details">Delivery Date</label>
                        <input type="date" id="deliveryDate" name="delivery_date" placeholder="Enter Delivery Date">
                        

                    </div>
                    <div class="btn-box">
                        <button type="button" id="btnBack2">Back</button>
                        <button type="next" id="btnNext2">Next</button>
</div>
                </div>

                        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#jobModel").select2();

        });
        </script>


<script>

$(function() {
    $("#save_job").click(function(e) {
        e.preventDefault();
        var job_code = $("#job_code").val();
		var dataString = 'job_code=' + job_code; 
        if(job_code =='')
        {   $('.success').fadeOut(200).hide();
            $('.error').fadeIn(200).show();
        }
        else
        {
            $.ajax({
                type: "POST",				
                url: "insertjob.php",
				data: dataString,
                success: function(data) {
                 $('#form').fadeOut(200).hide();
                 $('.success').fadeIn(200).show();
                 $('.error').fadeOut(200).hide();
                 $('#jobModel').append($('<option>', {
                    value: data.id,
                    text: job_code
    }));
}
            });
        }
      
    });
});

</script>


                <script>
$(document).ready(function(){
	
$("#jobModel").on("change",function(){
   var GetValue=$("#jobModel").val();
   $("#jobText").val(GetValue);
});

});

</script>

<script>
		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetJob(str) {
			if (str.length == 0) {
				document.getElementById("job_name").value = "";
				document.getElementById("job_description").value = "";
               
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
							("job_name").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"job_description").value = myObj[1];
                            
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchjob.php?job_code=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>


<!--Job Info 3 Machine-->

    <?php
        $db = mysqli_connect("localhost","root","","nwmsystem");
        if(!$db)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>

                <div id="jobInfo3">
                    <div class="jobInfoTitle">
                        <h2>Machine Details</h2>
                    </div>
                    <br/>
 <div class="CodeDropdown">
    <div class="form-group"><label>Machine Code</label>
    <br/><br/>
   <select id="machineModel" onchange="GetMachine(this.value)"> <option value="">-- Select Machine --</option>
   
   <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT machine_code, machine_name, machine_id, customer_name From machine_list ORDER BY machinelistlastmodify_at DESC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['machine_id'] ."'>" .$data['machine_code']. "      -      " . $data['machine_name']."  -   " . $data['customer_name']."</option>";  // displaying data in option menu
        }	
    ?></select>
    <div class="input-box">
    <input type="hidden" name="machine_id" id='machinetext' class='form-control' onchange="GetMachine(this.value)" value="" readonly>
    </div>
    <div class="input-box">
    <input type="text" id="machine_code" name="machine_code" placeholder="Enter Machine Code" readonly>
    </div>
    </div></div>
                    <div class="dropdownCode">
                        <!-- <div class="select"><i class='bx bxs-down-arrow'></i></div> -->
                        <div class="add"><i class='bx bxs-plus-square' id="btnRegister" onclick="document.getElementById('machineAddForm').style.display='block'"></i></div>
                    </div>
                    <div class="input-box">
                        <label for="machine_name" class="details">Machine Name</label>
                        <input type="text" id="machine_name" name="machine_name" placeholder="Enter Machine Name" required>
                    </div>
                    <div class="input-box">
                        <label for="machine_type" class="details">Machine Type</label>
                        <input type="text" id="machine_type" name="machine_type" placeholder="Enter Machine Type" required>
                    </div>
                    <div class="input-box">
                        <label for="machine_brand" class="details">Machine Brand</label>
                        <input type="text" id="machine_brand" name="machine_brand" placeholder="Enter Machine Brand" required>
                    </div>
                     <div class="input-box">
                        <label for="serialnumber" class="details">Serial Number</label>
                        <input type="text" id="serialnumber" name="serialnumber" placeholder="Enter Serial Number" required>
                    </div>
                       <div class="input-box">
                        <label for="MachineDescription" class="details">Machine Description</label>
                        <textarea name="machine_description" id="machine_description" placeholder="Enter Machine Description" rows="5" cols="119">
                        </textarea>
                     <div class="CodeDropdown">
                        <label for="Accessories Required" class="details">Accessories Required</label><br/>
                        <select type="text" id="accessories_required" name="accessories_required">
            <option value=''></option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
                           
                    </div>

                    <?php if (isset($_SESSION["username"])) ?>
<input type="hidden" name="jobregistercreated_by" id="jobregistercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
<input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

                   <div class="btn-box">
 <button type="button" id="btnBack3">Back</button>
 <button type="submit" name="submit" value="register">Register</button>

                    <!-- </form>  -->
    </form>
        </div>
        </div>

        </div>

                            <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#machineModel").select2();

        });
        </script>

                <script>

$(function() {
    $("#save_machine").click(function(e) {
        e.preventDefault();
        var machine_code = $("#machine_code").val();
		var dataString = 'machine_code=' + machine_code; 
        if(machine_code =='')
        {   $('.success').fadeOut(200).hide();
            $('.error').fadeIn(200).show();
        }
        else
        {
            $.ajax({
                type: "POST",				
                url: "insertmachine.php",
				data: dataString,
                success: function(data) {
                 $('#form').fadeOut(200).hide();
                 $('.success').fadeIn(200).show();
                 $('.error').fadeOut(200).hide();
                 $('#machineModel').append($('<option>', {
                    value: data.id,
                    text: machine_code
    }));
}
            });
        }
      
    });
});

</script>

<script>
$(document).ready(function(){
	
$("#machineModel").on("change",function(){
   var GetValue=$("#machineModel").val();
   $("#machinetext").val(GetValue);
});

});

</script>

<script>
		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetMachine(str) {
			if (str.length == 0) {
                document.getElementById("machine_code").value = "";
				document.getElementById("machine_name").value = "";
				document.getElementById("machine_type").value = "";
                document.getElementById("machine_brand").value = "";
                document.getElementById("serialnumber").value = "";
                 document.getElementById("machine_description").value = "";
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
							("machine_code").value = myObj[0];
						
						// Assign the value received to
						// last name input field
                        document.getElementById
							("machine_name").value = myObj[1];
						document.getElementById(
							"machine_type").value = myObj[2];
                            document.getElementById(
							"machine_brand").value = myObj[3];
                            document.getElementById(
							"serialnumber").value = myObj[4];
                            document.getElementById(
							"machine_description").value = myObj[5];
                           
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>

    <script>
        var jobInfo1 = document.getElementById("jobInfo1");
        var jobInfo2 = document.getElementById("jobInfo2");
        var jobInfo3 = document.getElementById("jobInfo3");
       
        var btnNext1 = document.getElementById("btnNext1");
        var btnNext2 = document.getElementById("btnNext2");
      
        var btnBack2 = document.getElementById("btnBack2");
        var btnBack3 = document.getElementById("btnBack3");
    
        var progress = document.getElementById("progress");

        btnNext1.onclick = function() {
            jobInfo1.style.left = "-1300px";
            jobInfo2.style.left = "40px";
            progress.style.width = "50%";
        }

        btnBack2.onclick = function() {
            jobInfo1.style.left = "40px";
            jobInfo2.style.left = "1300px";
            progress.style.width = "25%";
        }

        btnNext2.onclick = function() {
            jobInfo2.style.left = "-1300px";
            jobInfo3.style.left = "40px";
            progress.style.width = "75%";
        }

        btnBack3.onclick = function() {
            jobInfo2.style.left = "40px";
            jobInfo3.style.left = "1300px";
            progress.style.width = "50%";
        }

        btnNext3.onclick = function() {
            jobInfo3.style.left = "-1300px";
            jobInfo4.style.left = "40px";
            progress.style.width = "100%";
        }

        btnBack4.onclick = function() {
            jobInfo3.style.left = "40px";
            jobInfo4.style.left = "1300px";
            progress.style.width = "75%";
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id03');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('id04');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>   
    
<script src="js/upload photo.js"></script>

</body>

</html>