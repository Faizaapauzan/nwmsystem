<?php 
if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.class.php'; 
     
    // Include database configuration file 
    require_once 'dbconnect.php'; 
     
    // Set some useful configuration 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 10; 
     
    // Set conditions for column sorting 
    $sortSQL = ''; 
    if(!empty($_POST['coltype']) && !empty($_POST['colorder'])){ 
        $coltype = $_POST['coltype']; 
        $colorder = $_POST['colorder']; 
        $sortSQL = " ORDER BY $coltype $colorder"; 
    } 
     
    // Count of all records 
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM job_register"); 
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer', 
        'link_func' => 'columnSorting' 
    ); 
    $pagination =  new Pagination($pagConfig); 
 
    // Fetch records based on the offset and limit 
    $query = $conn->query("SELECT * FROM job_register $sortSQL LIMIT $offset,$limit"); 
?> 
    <!-- Data list container --> 
    <table class="table table-striped sortable"> 
    <thead> 
        <tr> 
            <th scope="col">No</th>
                <th scope="col" class="sorting" coltype="job_order_number" colorder="">Job Order Number</th>
                <th scope="col" class="sorting" coltype="job_priority" colorder="">Job Priority</th>
                <th scope="col" class="sorting" coltype="customer_name" colorder="">Customer Name</th>
                <th scope="col" class="sorting" coltype="job_name" colorder="">Job Name</th>
                <th scope="col" class="sorting" coltype="machine_code" colorder="">Machine Code</th>
                <th scope="col" class="sorting" coltype="job_assign" colorder="">Job Assign</th>
                <th scope="col" class="sorting" coltype="Job_assistant" colorder="">Assistant</th>
                <th scope="col">Action</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php 
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){ 
        ?> 
            <tr> 
               <th scope="row"><?php echo $row["jobregister_id"]; ?></th>
                    <td><?php echo $row["job_order_number"]; ?></td>
                    <td><?php echo $row["job_priority"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["job_name"]; ?></td>
                    <td><?php echo $row["machine_code"]; ?></td>
                    <td><?php echo $row["job_assign"]; ?></td>
                    <td><?php echo $row["Job_assistant"]; ?></td>
                    <td><div class='adminlistingUpdateBtn'>
                    <button data-jobregister_id="<?php echo $row['jobregister_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
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
     
    <!-- Display pagination links --> 
    <?php echo $pagination->createLinks(); ?> 
<?php 
} 
?>