<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.class.php'; 
     
    // Include database configuration file 
    require_once 'dbconnect.php'; 
     
    // Set some useful configuration 
    $baseURL = 'searchMachine.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for search 
    $whereSQL = ''; 
    if(!empty($_POST['keywords'])){ 
        $whereSQL = " WHERE (machine_name LIKE '%".$_POST['keywords']."%' OR machine_code LIKE '%".$_POST['keywords']."%' OR customer_name LIKE '%".$_POST['keywords']."%') "; 
    } 
    // if(isset($_POST['filterBy']) && $_POST['filterBy'] != ''){ 
    //     $whereSQL .= (strpos($whereSQL, 'WHERE') !== false)?" AND ":" WHERE "; 
    //     $whereSQL .= " status = ".$_POST['filterBy']; 
    // } 
     
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM machine_list ".$whereSQL); 
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'baseURL' => $baseURL, 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer', 
        'link_func' => 'searchFilter' 
    ); 
    $pagination =  new Pagination($pagConfig); 
 
    // Fetch records based on the offset and limit 
    $query = $conn->query("SELECT * FROM machine_list $whereSQL ORDER BY machine_id ASC LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
    <table class="table table-striped"> 
    <thead> 
        <tr> 
              <th>No</th>
                <th>Customer Name</th>
                <th>Machine Code</th>
                <th>Machine Name</th>
                <th>Serial Number</th>
                <th>Action</th>
            
        </tr> 
    </thead> 
    <tbody> 
        <?php 
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){ 
                $offset++ 
        ?> 
            <tr> 
                <th scope="row"><?php echo $offset; ?></th> 
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

    
     <br/>
     <br/>
    <!-- Display pagination links --> 
    <?php echo $pagination->createLinks(); ?> 
<?php 
} 
?>

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
                        <br />
                        <div class="modal-body">    
                          
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.deletebtn').click(function() {

                                var machine_id = $(this).data('machine_id');

                                // AJAX request
                                $.ajax({
                                    url: 'deletemachine.php',
                                    type: 'post',
                                    data: {
                                        machine_id: machine_id
                                    },
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
                        <br />
                        <div class="modal-body">                         
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var machine_id = $(this).data('machine_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updatemachine.php',
                                    type: 'post',
                                    data: {
                                        machine_id: machine_id
                                    },
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
                        <br />
                        <div class="modal-body">

                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('machine_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxmachine.php',
                                    type: 'post',
                                    data: {
                                        userid: userid
                                    },
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