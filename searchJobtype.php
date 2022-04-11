<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.class.php'; 
     
    // Include database configuration file 
    require_once 'dbconnect.php'; 
     
    // Set some useful configuration 
    $baseURL = 'searchJobtype.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for search 
    $whereSQL = ''; 
    if(!empty($_POST['keywords'])){ 
        $whereSQL = " WHERE (job_name LIKE '%".$_POST['keywords']."%' OR job_code LIKE '%".$_POST['keywords']."%') "; 
    } 
    // if(isset($_POST['filterBy']) && $_POST['filterBy'] != ''){ 
    //     $whereSQL .= (strpos($whereSQL, 'WHERE') !== false)?" AND ":" WHERE "; 
    //     $whereSQL .= " status = ".$_POST['filterBy']; 
    // } 
     
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM jobtype_list ".$whereSQL); 
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
    $query = $conn->query("SELECT * FROM jobtype_list $whereSQL ORDER BY jobtype_id ASC LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
    <table class="table table-striped" width="100%" > 
    <thead> 
        <tr> 
            <th scope="col">No</th> 
            <th scope="col">Name</th> 
            <th scope="col">Code</th> 
            <th scope="col">Action</th> 
            
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
              <td><?php echo $row["job_name"]; ?></td>
                    <td><?php echo $row["job_code"]; ?></td>
                   <td><div class=jobTypeUpdateDeleteBtn>
<button data-jobtype_id="<?php echo $row['jobtype_id'];?>" class='userinfo' type='button' id='btnView'>View</button>
<button data-jobtype_id="<?php echo $row['jobtype_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
<button data-jobtype_id="<?php echo $row['jobtype_id'];?>" class='deletebtn' type='button' id='btnDelete'>Delete</button>
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

        <!--Delete JobType -->      

          <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

               <div class="jobTypePopup">
                    <div class="contentjobTypePopup">
                        <div class="title">Job Type</div>
                        <div class="jobType-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">    
                          
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.deletebtn').click(function() {

                                var jobtype_id = $(this).data('jobtype_id');

                                // AJAX request
                                $.ajax({
                                    url: 'deletejobtype.php',
                                    type: 'post',
                                    data: {
                                        jobtype_id: jobtype_id
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
        


<!--Update JobType -->

 <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

               <div class="jobTypePopup">
                    <div class="contentjobTypePopup">
                        <div class="title">Job Type</div>
                        <div class="jobType-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">    
                             <h5>Job Type Update</h5>                       
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var jobtype_id = $(this).data('jobtype_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updatejobtype.php',
                                    type: 'post',
                                    data: {
                                        jobtype_id: jobtype_id
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
        



        <!--Job Type list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="jobTypePopup">
                    <div class="contentjobTypePopup">
                        <div class="title">Job Type</div>
                        <div class="jobType-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        
                        <div class="modal-body">
                        <h5>Job Type Info</h5>  
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('jobtype_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxjobtype.php',
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
