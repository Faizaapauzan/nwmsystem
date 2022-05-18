<?php
session_start(); ?>

<?php 
 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 

// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM job_register"); 
$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 

    'totalRows' => $rowCount, 

); 
$pagination =  new Pagination($pagConfig); 
 
// Fetch records based on the limit 
$query = $conn->query("SELECT * FROM job_register"); 
 
?>

 <?php  
 //Database connectivity  
 $con=mysqli_connect('localhost','root','','nwmsystem');  
 $sql=mysqli_query($con,"select * from job_register");  
 //Get Update id and status  
 if (isset($_GET['jobregister_id']) && isset($_GET['job_assign'])) {  
      $jobregister_id=$_GET['jobregister_id'];  
      $job_assign=$_GET['job_assign'];  
      mysqli_query($con,"update job_register set job_assign='$job_assign' where jobregister_id='$jobregister_id'");  
      header("location:adminjoblisting.php");  
      die();  
 }  
 ?> 

  <?php  
 //Database connectivity  
 $con=mysqli_connect('localhost','root','','nwmsystem');  
 $sql=mysqli_query($con,"select * from job_register");  
 //Get Update id and status  
 if (isset($_GET['jobregister_id']) && isset($_GET['Job_assistant'])) {  
      $jobregister_id=$_GET['jobregister_id'];  
      $Job_assistant=$_GET['Job_assistant'];  
      mysqli_query($con,"update job_register set Job_assistant='$Job_assistant' where jobregister_id='$jobregister_id'");  
      header("location:adminjoblisting.php");  
      die();  
 }  
 ?> 


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Job Listing</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/adminjoblisting.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>

   <!-- Script -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

<style>

    .input-box-address {
  margin-bottom: 15px;
  padding: 0 15px 0 15px;
}
.input-box-address {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.input-box-address input,
.input-box-address select {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.input-box-address input:focus,
.input-box-address input:valid,
.input-box-address select:focus,
.input-box-address select:valid {
  border-color: #081d45;
}

/* The Close Button (x) */
.techClose {
  position: absolute;
  right: 166px;
  margin-top: 135px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.techClose:hover,
.techClose:focus {
  color: red;
  cursor: pointer;
}

/*TABS PENDING*/
.tabInfo {
  display: flex;
  flex-wrap: wrap;
  max-width: 800px;
  width: 100%;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 300px;
}

.tabInfo .JobInfoTab {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  border-radius: 5px;
  margin-left: 0px;
}

.tabInfo .tabHeadingInfo {
  order: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1.2rem 2rem;
  margin-right: 3.2rem;
  cursor: pointer;
  background-color: #fff;
  font-size: 15px;
  font-weight: bold;
  transition: background ease 0.3s;
}

.tabInfo .tab {
  order: 9;
  flex-grow: 1;
  width: 100%;
  height: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
  padding: 20px;
}

/*JOB INFO*/

.JobInfo,
#JobInfo {

  font-size: 14px;
  cursor: pointer;
  text-align: left;
  text-decoration: underline;
}

.JobInfoTab {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 300px;
}
.JobInfoTab .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.JobInfoTab .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 90px;
  border-radius: 5px;
  background: linear-gradient(135deg, #ffb300, #ff4da6, #924adb);
}
.contentJobInfo form .info-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 30px 20px 2px 20px;
}
form .info-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
  padding: 0 15px 0 15px;
}
form .info-details label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.info-details .input-box input,
.info-details .input-box select {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.info-details .input-box input:focus,
.info-details .input-box input:valid,
.info-details .input-box select:focus,
.info-details .input-box select:valid {
  border-color: #081d45;
}

form .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}
form .category label {
  display: flex;
  align-items: center;
  cursor: pointer;
}

form .button {
  height: 45px;
  margin: 35px 0;
  margin-bottom: 50px;
}
form .button input {
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: #081d45;
  margin-bottom: 10px;
}
form .button input:hover {
  /* transform: scale(0.99); */
  opacity: 0.8;
}
form .button #cancelbtn {
  background-color: #f44336;
}
@media (max-width: 584px) {
  .container {
    max-width: 100%;
  }
  form .info-details .input-box {
    margin-bottom: 15px;

    width: 100%;
  }
  form .category {
    width: 100%;
  }
  .content form .info-details {
    max-height: 300px;
    overflow-y: scroll;
  }
  .info-details::-webkit-scrollbar {
    width: 5px;
  }
}
@media (max-width: 459px) {
  .container .content .category {
    flex-direction: column;
  }
}

input[type="text"],
input[type="date"],
input[type="datetime-local"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.tabInfo input[type="radio"] {
  display: none;
}

.tabInfo input[type="radio"]:checked + label {
  background: rgba(209, 209, 209, 0.377);
}

.tabInfo input[type="radio"]:checked + label + .tab {
  display: block;
}

@media (max-width: 465px) {
  .tabInfo .tab,
  .tabInfo label {
    order: initial;
  }

  .tabInfo label {
    width: 100%;
    margin-left: 50px;
  }
}

table {
  border-collapse: collapse;
  box-shadow: 0 5px 10px rgb(37, 19, 19);
  background-color: #fff;
  text-align: center;
  overflow: hidden;
  width: 100%;
  display: fixed;
  justify-content: center;
}

thead {
  box-shadow: 0 5px 10px rgb(186, 189, 183);
  text-align: center;

  /* padding: 1rem 5.1rem; */
}

.Pending {
  color: blue;
} 

.Incomplete {
  color: orange;
} 

</style>


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
                <a href="jobcompleted.php">
                    <i class="fa fa-check-square-o"></i>
                    <span class="link_name">Completed Job</span>
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

         <div class="jobListingList">
            <h1>Job Listing</h1>
  <div class="addAccessoriesBtn">
                <button style="color:#ccc;" class="btn-reset" onclick="document.location='adminjoblisting.php'">Refresh</button>
            </div>

       <div class="datalist-wrapper">    
        <div class="col-lg-12" style="border: none;">



        <table class="table table-striped sortable">
<thead>
    <tr>
      <th>No</th>
    <th>Job Order Number</th>
    <th>Job Priority</th>
    <th>Job Status</th>
    <th>Customer Name</th>
    <th>Job Name</th>
    <th>Machine Code</th>
    <th>Job Assign</th>
    <th>Assistant</th>
    </tr>
</thead>
<tbody>
    <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
     
    <tr>
      <td class="<?php echo $row["job_status"]; ?>"><?php echo $i; ?></td>
        <td data-id="<?php echo $row['jobregister_id'];?>" class='JobInfo <?php echo $row["job_status"]; ?>' data-target="doubleClick-info"  onClick="document.getElementById('doubleClick-info').style.display='block'"><?php echo $row["job_order_number"]; ?></td>
        <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["job_priority"]; ?></td>
        <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["job_status"]; ?></td>
        <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["customer_name"]; ?></td>
        <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["job_name"]; ?></td>
        <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["machine_code"]; ?></td>
        <td class="<?php echo $row["job_status"]; ?>"> <select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; width: 105px; outline: none; font-size: 13px;" onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['jobregister_id'] ?>')"><option value=""> <?php echo $row['job_assign']?> </option>  
                               <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank FROM staff_register WHERE technician_rank = '1st Leader' OR technician_rank = '2nd Leader' OR staff_position='storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
        }	
    ?></select></td>
        <td class="<?php echo $row["job_status"]; ?>"><select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; width: 110px; outline: none; font-size: 13px;" onchange="assistant_update(this.options[this.selectedIndex].value,'<?php echo $row['jobregister_id'] ?>')"> <option value=""> <?php echo $row['Job_assistant']?> </option>
                    <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank FROM staff_register WHERE staff_position = 'Technician' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']."</option>";  // displaying data in option menu
        }	
    ?></select></td>

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
      function status_update(value,jobregister_id){  
           //alert(id);  
           let url = "adminjoblisting.php";  
           window.location.href= url+"?jobregister_id="+jobregister_id+"&job_assign="+value;  
      }  
 </script>  

         <script type="text/javascript">  
      function assistant_update(value,jobregister_id){  
           //alert(id);  
           let url = "adminjoblisting.php";  
           window.location.href= url+"?jobregister_id="+jobregister_id+"&Job_assistant="+value;  
      }  
 </script>  


<script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable();

    });

</script>

    <!--Double click Job Info (Job Order Number) -->
    <div id="doubleClick-info" class="modal">
    <div class="tabInfo">

        <input type="radio" name="tabDoingInfo" id="tabDoingInfo1" checked="checked">
        <label for="tabDoingInfo1" class="tabHeadingInfo"> Job Info </label>
        <div class="tab" id="JobInfoTab">
        <div class="contentJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
        <form action="homeindex.php" method="post">
        <div class="info-details">
        
        </div></form></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.JobInfo').click(function () {
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxhome.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.info-details').html(response);
            // Display Modal
            $('#doubleClick-info').modal('show');
                        }
                    });
                });
            });

        </script>

         <!--Double click Update-->
        <input type="radio" name="tabDoingInfo" id="tabDoingInfo2">
        <label for="tabDoingInfo2" class="tabHeadingInfo">Update</label>
        <div class="tab" id="JobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
        <form action="ajaxtechupdateadmin.php" method="post">
        <div class="info-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.JobInfo').click(function () {
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdateadmin.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.info-update').html(response);
            // Display Modal
            $('#doubleClick-info').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingInfo" id="tabDoingInfo3">
        <label for="tabDoingInfo3" class="tabHeadingInfo">Remarks</label>
        <div class="tab" id="JobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
        <form action="ajaxremarks.php" method="post">
        <div class="info-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.JobInfo').click(function () {
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarks.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.info-remark').html(response);
            // Display Modal
            $('#doubleClick-info').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingInfo" id="tabDoingInfo4">
        <label for="tabDoingInfo4" class="tabHeadingInfo">Accessories</label>
        <div class="tab" id="JobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="info-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.JobInfo').click(function () {
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.info-accessories').html(response);
            // Display Modal
            $('#doubleClick-info').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingInfo" id="tabDoingInfo5">
        <label for="tabDoingInfo5" class="tabHeadingInfo">Media</label>
        <div class="tab" id="JobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="info-photos">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.JobInfo').click(function () {
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.info-photos').html(response);
            // Display Modal
            $('#doubleClick-info').modal('show');
                }
             });
                });
                     });
        </script>

        <!--Double click Report-->
        <input type="radio" name="tabDoingInfo" id="tabDoingInfo6">
        <label for="tabDoingInfo6" class="tabHeadingInfo"> Report </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-info').style.display='none'">&times</div>
        <form action="ajaxreportadmin.php" method="post">
        <div class="info-report">

        </div></form></div>

        <!-- div for doubleclick and tabs -->
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('.JobInfo').click(function() {
            var jobregister_id = $(this).data('id');
            // AJAX request
            $.ajax({
            url: 'ajaxreportadmin.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.info-report').html(response);
            // Display Modal
            $('#doubleClick-info').modal('show');
                     }
                    });
                });
            });
        </script>

         
<script>
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function(){
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
        sidebar.classList.replace("bx-menu","bx-menu-alt-right")
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right","bx-menu");
}
</script>

</div>
</div>