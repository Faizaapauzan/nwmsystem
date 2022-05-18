<style>

.Pending {
  color: blue;
} 

.Incomplete {
  color: orange;
} 


    </style>

<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.class.php'; 
     
    // Include database configuration file 
    require_once 'dbconnect.php'; 
     
    // Set some useful configuration 
    $baseURL = 'getData.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for column sorting 
    $sortSQL = ''; 
    if(!empty($_POST['coltype']) && !empty($_POST['colorder'])){ 
        $coltype = $_POST['coltype']; 
        $colorder = $_POST['colorder']; 
        $sortSQL = " ORDER BY $coltype $colorder"; 
    } 

      if(!empty($_POST['keywords'])){ 
        $sortSQL = " WHERE (job_order_number LIKE '%".$_POST['keywords']."%' OR job_priority LIKE '%".$_POST['keywords']."%' OR job_status LIKE '%".$_POST['keywords']."%' OR customer_name LIKE '%".$_POST['keywords']."%' OR job_name LIKE '%".$_POST['keywords']."%' OR machine_code LIKE '%".$_POST['keywords']."%' OR job_assign LIKE '%".$_POST['keywords']."%' OR Job_assistant LIKE '%".$_POST['keywords']."%') "; 
    } 
     
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM job_register".$sortSQL); 
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'baseURL' => $baseURL, 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer', 
        'link_func' => 'columnSorting',
        'link_search' => 'searchFilter'
    ); 
    $pagination =  new Pagination($pagConfig); 
 
    // Fetch records based on the offset and limit 
    $query = $conn->query("SELECT * FROM job_register $sortSQL LIMIT $offset,$limit"); 
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
    <!-- Data list container --> 
    <table class="table table-striped sortable"> 
    <thead> 
        <tr> 
            <th scope="col">No</th>
                <th scope="col" class="sorting" coltype="job_order_number" colorder="">Job Order Number</th>
                <th scope="col" class="sorting" coltype="job_priority" colorder="">Job Priority</th>
                <th scope="col" class="sorting" coltype="job_status" colorder="">Job Status</th>
                <th scope="col" class="sorting" coltype="customer_name" colorder="">Customer Name</th>
                <th scope="col" class="sorting" coltype="job_name" colorder="">Job Name</th>
                <th scope="col" class="sorting" coltype="machine_code" colorder="">Machine Code</th>
                <th scope="col" class="sorting" coltype="job_assign" colorder="">Job Assign</th>
                <th scope="col" class="sorting" coltype="Job_assistant" colorder="">Assistant</th>
                
        </tr> 
    </thead> 
    <tbody> 
        <?php 
      if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){ 
                $offset++ 
        ?> 
            <tr> 
               <th class="<?php echo $row["job_status"]; ?>" scope="row"><?php echo $offset; ?></th> 
                      <td data-id="<?php echo $row['jobregister_id'];?>" class='JobInfo <?php echo $row["job_status"]; ?>' data-target="doubleClick-info"  onClick="document.getElementById('doubleClick-info').style.display='block'"><?php echo $row["job_order_number"]; ?></td>
                    <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["job_priority"]; ?></td>
                     <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["job_status"]; ?></td>
                    <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["customer_name"]; ?></td>
                    <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["job_name"]; ?></td>
                    <td class="<?php echo $row["job_status"]; ?>"><?php echo $row["machine_code"]; ?></td>
                  <td class="<?php echo $row["job_status"]; ?>">  
                           <select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; width: 105px; outline: none; font-size: 13px;" onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['jobregister_id'] ?>')"><option value=""> <?php echo $row['job_assign']?> </option>  
                               <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank FROM staff_register WHERE technician_rank = '1st Leader' OR technician_rank = '2nd Leader' OR staff_position='storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
        }	
    ?></select>
                      </td>  
                    <td class="<?php echo $row["job_status"]; ?>"> <select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; width: 110px; outline: none; font-size: 13px;" onchange="assistant_update(this.options[this.selectedIndex].value,'<?php echo $row['jobregister_id'] ?>')"> <option value=""> <?php echo $row['Job_assistant']?> </option>
                    <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank FROM staff_register WHERE staff_position = 'Technician' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['staff_position']."</option>";  // displaying data in option menu
        }	
    ?></select>
</td>
                    
            </tr> 
        <?php 
            } 
        }else{ 
            echo '<tr><td colspan="6">No records found...</td></tr>'; 
        } 
        ?> 
    </tbody> 
    </table> 


     
    <!-- Display pagination links --> 
    <?php echo $pagination->createLinks(); ?> 
<?php 
} 
?>


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

