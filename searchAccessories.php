<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.class.php'; 
     
    // Include database configuration file 
    require_once 'dbconnect.php'; 
     
    // Set some useful configuration 
    $baseURL = 'searchAccessories.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for search 
    $whereSQL = ''; 
    if(!empty($_POST['keywords'])){ 
        $whereSQL = " WHERE (accessories_name LIKE '%".$_POST['keywords']."%' OR accessories_code LIKE '%".$_POST['keywords']."%' OR accessories_brand LIKE '%".$_POST['keywords']."%') "; 
    } 
    // if(isset($_POST['filterBy']) && $_POST['filterBy'] != ''){ 
    //     $whereSQL .= (strpos($whereSQL, 'WHERE') !== false)?" AND ":" WHERE "; 
    //     $whereSQL .= " status = ".$_POST['filterBy']; 
    // } 
     
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM accessories_list ".$whereSQL); 
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
    $query = $conn->query("SELECT * FROM accessories_list $whereSQL ORDER BY accessories_id ASC LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
    <table class="table table-striped" width="100%" > 
    <thead> 
        <tr> 
            <th scope="col">No</th> 
            <th scope="col">Name</th> 
            <th scope="col">Code</th> 
            <th scope="col">Brand</th> 
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
              <td><?php echo $row["accessories_name"]; ?></td>
                    <td><?php echo $row["accessories_code"]; ?></td>
                    <td><?php echo $row["accessories_brand"]; ?></td>
                    <td><div class='accessoriesUpdateDeleteBtn'>
<button data-accessories_id="<?php echo $row['accessories_id'];?>" class='userinfo' type='button' id='btnView'>View</button>
<button data-accessories_id="<?php echo $row['accessories_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
<button data-accessories_id="<?php echo $row['accessories_id'];?>" class='deletebtn' type='button' id='btnDelete'>Delete</button>
</div>
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

    
     <br/>
     <br/>
    <!-- Display pagination links --> 
    <?php echo $pagination->createLinks(); ?> 
<?php 
} 
?>

      <!--Delete Accesssories -->      

          <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

               <div class="accessoriesPopup">
                    <div class="contentAccessoriesPopup">
                        <div class="title">Accessories</div>
                        <div class="accessories-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">    
                          
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.deletebtn').click(function() {

                                var accessories_id = $(this).data('accessories_id');

                                // AJAX request
                                $.ajax({
                                    url: 'deleteaccessories.php',
                                    type: 'post',
                                    data: {
                                        accessories_id: accessories_id
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
        

          <!--Update Customer -->

 <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->

                <div class="accessoriesPopup">
                    <div class="contentAccessoriesPopup">
                        <div class="title"> Accessories Info</div>
                        <div class="accessories-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">                         
                        </div>


                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.updateinfo').click(function() {

                                var accessories_id = $(this).data('accessories_id');

                                // AJAX request
                                $.ajax({
                                    url: 'updateaccessories.php',
                                    type: 'post',
                                    data: {
                                        accessories_id: accessories_id
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
        

        <!--Accessories list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="accessoriesPopup">
                    <div class="contentAccessoriesPopup">
                        <div class="title"> Accessories Info </div>
                        <div class="accessories-details">
                            <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


                        </div>
                        <br />
                        <div class="modal-body">

                        </div>

                    </div>
                    <script type='text/javascript'>
                        $(document).ready(function() {

                            $('.userinfo').click(function() {

                                var userid = $(this).data('accessories_id');

                                // AJAX request
                                $.ajax({
                                    url: 'ajaxaccessories.php',
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