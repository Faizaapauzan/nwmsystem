<?php
 session_start();
 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['staff_position']=="" ){
  header("location:index.php?error");
 }

if(!isset($_SESSION['username']))
	{	
    header("location:index.php?error");
	}

    elseif($_SESSION['staff_position']== 'Admin')
	{

	}

        elseif($_SESSION['staff_position']== 'Manager')
	{
	}

  else
	{
			header("location:index.php?error");
	}

?>

<?php 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 

// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM machine_list"); 
$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 
 
    'totalRows' => $rowCount, 
  
); 
$pagination =  new Pagination($pagConfig); 
 
// Fetch records based on the limit 
$query = $conn->query("SELECT * FROM machine_list ORDER BY machine_id ASC"); 
?>


<!DOCTYPE html>
<html>

<head>
   <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Machine</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/homepage.css" rel="stylesheet" />
    <link href="css/machine.css" rel="stylesheet" />
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
        <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
   
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

  <div class="sidebar close">
    <div class="logo-details">
	    <img src="neo.png" height="65" width="75"></img>
      <span class="logo_name">NWM SYSTEM</span>
    </div>

    <div class="welcome" style="color: white; text-align: center; font-size:small;">Hi <?php echo $_SESSION["username"] ?>!</div>

    <ul class="nav-links">

      <li>
        <a href="jobregister.php">
          <i class='bx bx-registered' ></i>
          <span class="link_name">Register Job</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobregister.php">Register Job</a></li>
        </ul>
      </li>

       <li>
                <div class="iocn-link">
                    <a href="attendanceadmin.php">
                        <i class='bx bx-calendar-check' ></i>
                        <span class="link_name">Attendance</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="attendanceadmin.php">Attendance</a></li>
                </ul>
            </li>

      <li>
        <div class="iocn-link">
          <a href="staff.php">
            <i class='bx bx-id-card' ></i>
            <span class="link_name">Staff</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="staff.php">Staff</a></li>
        </ul>
      </li>

      <li>
        <a href="technicianlist.php">
          <i class='fa fa-users' ></i>
          <span class="link_name">Technician</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="technicianlist.php">Technician</a></li>
        </ul>
      </li>

      <li>
        <a href="customer.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Customers</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="customer.php">Customers</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="machine.php">
            <i class='fa fa-medium' ></i>
            <span class="link_name">Machine</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="machine.php">Machine</a></li>
        </ul>
      </li>

      <li>
        <a href="accessories.php">
          <i class='bx bx-wrench' ></i>
          <span class="link_name">Accessories</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="accessories.php">Accessories</a></li>
        </ul>
      </li>

      <li>
        <a href="jobtype.php">
          <i class='bx bx-briefcase'></i>
          <span class="link_name">Job Type</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobtype.php">Job Type</a></li>
        </ul>
      </li>

      <li>
        <a href="jobcompleted.php">
          <i class='fa fa-check-square-o' ></i>
          <span class="link_name">Completed Job</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobcompleted.php">Compeleted Job</a></li>
        </ul>
      </li>

      <li>
        <a href="jobcanceled.php">
          <i class='fa fa-minus-square' ></i>
          <span class="link_name">Canceled Job</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="jobcanceled.php">Canceled Job</a></li>
        </ul>
      </li>
      
      <li>
        <a href="report.php">
          <i class='bx bxs-report' ></i>
          <span class="link_name">Report</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="report.php">Report</a></li>
        </ul>
      </li>

      <li>
        <a href="logout.php">
          <i class='bx bx-log-out' ></i>
          <span class="link_name">Logout</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="logout.php">Logout</a></li>
        </ul>
      </li>


  </div>
    
    <!--Home navigation-->
    <section class="home-section">
    <nav>
                <div class="home-content">
                      <i class='bx bx-menu' ></i>
                          <a>
						<button style="background-color: #ffffff; color: black; font-size: 26px; padding: 29px -49px; margin-left: -17px; border: none; cursor: pointer; width: 100%;" class="btn-reset" onclick="document.location='Adminhomepage.php'" ondblclick="document.location='adminjoblisting.php'">Home</button>
                          </a>

                 </div>

    </nav>  

    
    <?php
      include 'dbconnect.php';
    ?>

  <!--Add machine-->
    <div id="doubleClick-machine" class="modal">
    <div class="tabs">
    <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
    <label for="tabDoingOne" class="tabHeading">Machine Brand</label>
    <div class="tab">
    <div class="TechJobInfoTab">
    <div class="contentTechJobInfo">
    <div style="right: 507px; top: -53px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-machine').style.display='none';">&times</div>
    <form action="" method="post">
    <div class="machine-brand">

    <div class="CodeDropdown">
    <label for="brand">Add new Machine Brand</label>
    <input type="text" id="brandname" name="brandname" placeholder="Enter Brand Name">
    </div>
   <p style="margin-top: 19px;margin-left: 14px;" class="control"><b id="messageBrand"></b></p>
    <div style="margin-top: 30px;" class="listAddFormbutton">
    <input type="button" onclick="submitBrand();" value="Add">
    <input type="button" onclick="document.getElementById('doubleClick-machine').style.display='none'" value="Cancel" id="cancelbtn">
    </div>
    </div></form></div></div></div>
        
     <script type="text/javascript">
        function submitBrand()
        {
            var brandname = $('input[name=brandname]').val();
            
            if(
               brandname!='' || brandname=='')
                
               {
                var formData = {brandname};
                
                $.ajax({
                        url: "brandindex.php", 
                        type: 'POST',
                        data: formData,
                        success: function(response)
                        {
                            var res = JSON.parse(response);
                            console.log(res);
                            if(res.success == true)
                            $('#messageBrand').html('<span style="color: green">New Machine Brand Added!</span>');
                            else
                            $('#messageBrand').html('<span style="color: red">Failed to Insert Data !</span>');
                        }
                    });
               }
        } 
    </script>
                  
            <!-- Machine Type Tab -->

  <input type="radio" name="tabDoing" id="tabDoingTwo">
  <label for="tabDoingTwo" class="tabHeading"> Machine Type </label>
  <div class="tab">
  <div class="TechJobInfoTab">
  <div class="contentTechJobInfo">
  <div style="right: 507px; top: -53px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-machine').style.display='none'">&times</div>
  <form action="" method="post">
  <div class="machine-type">

  <div class="CodeDropdown">
  <label for="brand">Machine Brand</label>
  <select class="form-select" id="branddrop" onchange="GetJobAss(this.value)">
  <option value=""> Select Machine Brand</option>
  <?php

   $querydrop = "select * from machine_brand";
   // $query = mysqli_query($con, $qr);
   $result = $conn->query($querydrop);
     if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
  <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
  <?php } } ?>

  </select>
  <input type="hidden" id="brand_id" name="brand_id">
  </div>

  <div class="CodeDropdown" style="padding-top: 15px;">
  <label for="type"> Add New Machine Type</label><br>
  <input type="text" id="type_name" name="type_name" placeholder="Enter Type Name">           
  </div>

  <p style="margin-top: 19px;margin-left: 14px;" class="control"><b id="messageType"></b></p>
    <div style="margin-top: 30px;" class="listAddFormbutton">
    <input type="button" onclick="submitType();" value="Add">
    <input type="button" onclick="document.getElementById('doubleClick-machine').style.display='none'" value="Cancel" id="cancelbtn">
    </div>

  </div></form></div></div></div>

    <script>
$(document).ready(function(){	
$("#branddrop").on("change",function(){
   var GetValue=$("#branddrop").val();
   $("#brand_id").val(GetValue);
});
});
</script>

     <script type="text/javascript">
        function submitType()
        {
            var brand_id = $('input[name=brand_id]').val();
            var type_name = $('input[name=type_name]').val();
            
            if( brand_id!='' || brand_id=='',
               type_name!='' || type_name=='')
                
               {
                var formData = {brand_id: brand_id,type_name: type_name};
                
                $.ajax({
                        url: "typeindex.php", 
                        type: 'POST',
                        data: formData,
                        success: function(response)
                        {
                            var res = JSON.parse(response);
                            console.log(res);
                            if(res.success == true)
                            $('#messageType').html('<span style="color: green">New Machine Type Added!</span>');
                            else
                            $('#messageType').html('<span style="color: red">Failed to Insert Data !</span>');
                        }
                    });
               }
        } 
    </script>

    
                    
                         <!-- Register Machine Tab -->

    <input type="radio" name="tabDoing" id="tabDoingThree">
    <label for="tabDoingThree" class="tabHeading"> Register Machine </label>
    <div class="tab">
    <div class="TechJobInfoTab">
    <div class="contentTechJobInfo">
    <div style="right: 507px; top: -53px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-machine').style.display='none'">&times</div>
    <form action="" method="post">
    <div class="machine-register">
    <div class="CodeDropdown">

    
    <label for="brand">Machine Brand</label>
     <select onchange="GetJenama(this.value)" class="form-select" id="brandMesin" required>
    <option value=""> Select Machine Brand</option>
    <?php
    $querydrop = "select * from machine_brand";
    $result = $conn->query($querydrop);
      if ($result->num_rows > 0) {
       while ($row = mysqli_fetch_assoc($result)) { ?>
    <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
    <?php } }  ?>

    </select>
  <input type="hidden" id="BrandId" name="brand_id" onchange="GetJenama(this.value)" readonly >  
  <input type="hidden" id="NamaBrand" name="machine_brand" onchange="GetJenama(this.value)" readonly >  
  </div>

  <script>
		function GetJenama(str) {
			if (str.length == 0) {
                document.getElementById("BrandId").value = "";
                document.getElementById("NamaBrand").value = "";
				return;
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					if (this.readyState == 4 &&
							this.status == 200) {
						
						var myObj = JSON.parse(this.responseText);

				        document.getElementById
							("BrandId").value = myObj[0];
                        document.getElementById
							("NamaBrand").value = myObj[1];
            
					}
				};

				xmlhttp.open("GET", "fetchbrand.php?brand_id=" + str, true);
				xmlhttp.send();
			}
		}
	</script>




    <div class="CodeDropdown" style="padding-top: 15px;">
    <label for="type"> Machine Type</label><br>
     <select onchange="GetJenis(this.value)" class="form-select" style="width: 400px; height:40px;" id="type" required>
    <!-- <select name="type_id" style="width: 400px; height:40px;" class="form-select" id="type"> -->
    <option value="">Select Machine Type</option>
    </select>
    <input type="hidden" id="IdType" name="type_id" onchange="GetJenis(this.value)" readonly >  
    <input type="hidden" id="TypeNama" name="machine_type" onchange="GetJenis(this.value)" readonly >  
    </div> 

      <script>
		function GetJenis(str) {
			if (str.length == 0) {
                document.getElementById("IdType").value = "";
                 document.getElementById("TypeNama").value = "";
				return;
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					if (this.readyState == 4 &&
							this.status == 200) {
						
						var myObj = JSON.parse(this.responseText);

				        document.getElementById
							("IdType").value = myObj[0];

                        document.getElementById
							("TypeNama").value = myObj[1];
            
					}
				};

				xmlhttp.open("GET", "fetchtype.php?type_id=" + str, true);
				xmlhttp.send();
			}
		}
	</script>


    <div class="CodeDropdown" style="padding-top: 20px;">
    <label for="sn"> Serial Number </label><br>
    <input type="text" id="serialnumber" name="serialnumber" placeholder="Enter Machine Serial Number">  
    </div> 
 
    <div class="CodeDropdown" style="padding-top: 20px;">
    <label for="MachineCode" class="details">Machine Code</label>
    <input type="text" id="machine_code" name="machine_code" value="" class="form-control" placeholder="Enter Machine Code" required> 
    </div>
     
    <div class="CodeDropdown" style="padding-top: 20px;">
    <label for="MachineCode" class="details">Machine Name</label>
    <input type="text" id="machine_name" name="machine_name" placeholder="Enter Machine Name" required>
    </div>

 <div class="CodeDropdown" style="padding-top: 15px;">
    <label for="type"> Customer Name</label><br>
    <select style="width: 400px; height:40px;" class="form-select" id="customername" onchange="GetCustName(this.value)">
    <option value=""> Select Customer</option>
    <?php
     $querycust = "select * from customer_list";
    $result = $conn->query($querycust);
      if ($result->num_rows > 0) {
       while ($row = mysqli_fetch_assoc($result)) { ?>
    <option value="<?php echo $row['customer_id']; ?>"><?php echo $row['customer_name']; ?></option>
    <?php } }  ?>

    </select></div>

           <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#customername").select2();

        });
        </script>

    <input type="hidden" id="customer_name" name="customer_name" onchange="GetCustName(this.value)">
    </div>

    <div class="CodeDropdown" style="padding-top: 20px;">
    <label for="PurchaseDate" class="details">Purchase Date</label>
    <input type="date" id="PurchaseDate" name="purchase_date" placeholder="Enter Machine Purchase Date">
    </div>

    <div class="CodeDropdown" style="padding-top: 20px;">
    <label for="MachineDescription" class="details">Machine Description</label>
    <input type="text" id="MachineDescription" name="machine_description" placeholder="Enter Machine Description">
    </div>

    <?php if (isset($_SESSION["username"])) ?>
    <input type="hidden" name="machinelistcreated_by" id="machinelistcreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    <input type="hidden" name="machinelistlastmodify_by" id="machinelistlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
    </div>
 <p style="margin-top: 19px;margin-left: 14px;" class="control"><b id="messageMachine"></b></p>
        <div class="listAddFormbutton">
            <input type="button" onclick="submitMachine();" value="Add">
        <input type="button" onclick="document.getElementById('popupListAddForm').style.display='none'" value="Cancel" id="cancelbtn">
        </div>
        </form></div>
        </div>
        </div>

        <script>

		function GetCustName(str) {
			if (str.length == 0) {
				document.getElementById("customer_name").value = "";
               
				return;
			}
			else {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {
					if (this.readyState == 4 &&
							this.status == 200) {
						
						var myObj = JSON.parse(this.responseText);
						
						document.getElementById
							("customer_name").value = myObj[0];

                            
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchcustomername.php?customer_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>

            <!-- <script>
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

            </script> -->

         <script>
        $(document).ready(function() {
            $("#brandMesin").on('change', function() {
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
                        $("#serialnumbers").html('<option value="">Select Serial Number</option><option value="Add Serial Number" style="color:darkblue;">Add Serial Number</option>');

                    }
                });
            });
       
        });
    </script>

     <script type="text/javascript">
        function submitMachine()
        {
            var type_id = $('input[name=type_id]').val();
             var machine_type = $('input[name=machine_type]').val();
              var brand_id = $('input[name=brand_id]').val();
               var machine_brand = $('input[name=machine_brand]').val();
            var serialnumber = $('input[name=serialnumber]').val();
             var machine_code = $('input[name=machine_code]').val();
             var machine_name = $('input[name=machine_name]').val();
             var customer_name = $('input[name=customer_name]').val();
             var purchase_date = $('input[name=purchase_date]').val();
             var machine_description = $('input[name=machine_description]').val();
             var machinelistcreated_by = $('input[name=machinelistcreated_by]').val();
             var machinelistlastmodify_by = $('input[name=machinelistlastmodify_by]').val();;
             
            
            if( type_id!='' || type_id=='',
            machine_type!='' || machine_type=='',
            brand_id!='' || brand_id=='',
            machine_brand!='' || machine_brand=='',
               serialnumber!='' || serialnumber=='',
               machine_code!='' || machine_code=='',
               machine_name!='' || machine_name=='',
               customer_name!='' || customer_name=='',
               purchase_date!='' || purchase_date=='',
               machine_description!='' || machine_description=='',
               machinelistcreated_by!='' || machinelistcreated_by=='',
                 machinelistlastmodify_by!='' || machinelistlastmodify_by==''
               )
                
               {
                var formData = {type_id: type_id,
                  machine_type: machine_type,
                  brand_id: brand_id,
                  machine_brand: machine_brand,
                  serialnumber: serialnumber,
                  machine_code: machine_code,
                  machine_name: machine_name,
                  customer_name: customer_name,
                  purchase_date: purchase_date,
                  machine_description: machine_description,
                  machinelistcreated_by: machinelistcreated_by,
                     machinelistlastmodify_by: machinelistlastmodify_by
                };
                
                $.ajax({
                        url: "machineindex.php", 
                        type: 'POST',
                        data: formData,
                        success: function(response)
                        {
                            var res = JSON.parse(response);
                            console.log(res);
                            if(res.success == true)
                            $('#messageMachine').html('<span style="color: green">Succesfully Registered Machine!</span>');
                            else
                            $('#messageMachine').html('<span style="color: red">Failed to Insert Data !</span>');
                        }
                    });
               }
        } 
    </script>


    
       <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#type").select2();

        });
        </script>

   

</div></div>						


        <!--START MACHINE LIST-->
        <div class="machineList">
        <h1>Machine List</h1>
        <div class="addMachineBtn">
        <button style="background-color: #081d45; padding-left: 54px;" type="button" id="btnRegister" class="todo" data-target="doubleClick-machine"  onclick="document.getElementById('doubleClick-machine').style.display='block'">Add</button>
        <button class="btn-reset" onclick="document.location='machine.php'">Refresh</button>
        </div>

        <div class="datalist-wrapper">    
        <div class="col-lg-12" style="border: none;">

    <table class="table table-striped sortable">
    <thead>
    <tr>
    <th>No</th>
    <th>Customer Name</th>
    <th>Machine Code</th>
    <th>Machine Name</th>
    <th>Serial Number</th>
    <th>Action</th>
    </thead>

    <tbody>
    <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
     
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row["customer_name"]; ?></td>
        <td><?php echo $row["machine_code"]; ?></td>
        <td><?php echo $row["machine_name"]; ?></td>
        <td><?php echo $row["serialnumber"]; ?></td>
        <td><div class='MachineUpdateDeleteBtn'>
<button data-machine_id="<?php echo $row["machine_id"]; ?>" class="userinfo" type='button' id='btnView'>View</button>
<button data-machine_id="<?php echo $row["machine_id"]; ?>" class="updateinfo" type='button' id='btnEdit'>Update</button>
<button data-machine_id="<?php echo $row["machine_id"]; ?>" class="deletebtn" type='button' id='btnDelete'>Delete</button>
</div></td>
       

    </tr>
        <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
        </tbody>
        </table>
		

    </div>
    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable();

    });

</script>

         <!--Delete Machine -->      

        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->

        <div class="MachinePopup">
        <div class="contentMachinePopup">
        <div class="title">Machine</div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <div class="modal-body">    
                          
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.deletebtn',function(){ 
            var machine_id = $(this).data('machine_id');

            // AJAX request
            $.ajax({
                url: 'deletemachine.php',
                type: 'post',
                data: { machine_id: machine_id },
                success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                // Display Modal
                $('#empModal').modal('show');
                                    }
                                });
                            });
                        });
        </script>
        
         <!--Update Machine -->
    <div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="MachinePopup">
        <div class="contentMachinePopup">
        <div class="title"> Machine Info </div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <div class="modal-body">                         
        </div>
        </div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.updateinfo',function(){ 
            var machine_id = $(this).data('machine_id');

            // AJAX request
            $.ajax({
                url: 'updatemachine.php',
                type: 'post',
                data: { machine_id: machine_id },
                success: function(response) {
            // Add response in Modal body
                $('.modal-body').html(response);
            // Display Modal
                $('#empModal').modal('show');
                                    }
                                });
                            });
                        });
        </script>
        
        <!--Machine list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="MachinePopup">
        <div class="contentMachinePopup">
        <div class="title"> Machine Info </div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <div class="modal-body">
        </div>
        </div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.userinfo',function(){ 
            var machine_id = $(this).data('machine_id');

            // AJAX request
            $.ajax({
                url: 'ajaxmachine.php',
                type: 'post',
                data: { machine_id: machine_id },
                success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                // Display Modal
                $('#empModal').modal('show');
                                    }
                                });
                            });
                        });
        </script>
         


</div>
</div>
                    </script>


    </section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>

</body>

</html>