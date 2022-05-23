<?php
session_start(); ?>

<?php 
// Include pagination library file 
include_once 'Pagination.class.php'; 
 
// Include database configuration file 
require_once 'dbconnect.php'; 
 

// Count of all records 
$query   = $conn->query("SELECT COUNT(*) as rowNum FROM customer_list"); 
$result  = $query->fetch_assoc(); 
$rowCount= $result['rowNum']; 
 
// Initialize pagination class 
$pagConfig = array( 
 
    'totalRows' => $rowCount, 
  
); 
$pagination =  new Pagination($pagConfig); 
 
// Fetch records based on the limit 
$query = $conn->query("SELECT * FROM customer_list ORDER BY customer_id ASC"); 
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Customer</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/homepage.css"rel="stylesheet" />
	    <link href="css/machine.css"rel="stylesheet" />
    <script src="js/number.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>  
    <link href="css/customer.css"rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
   
   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
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
          <a href="accessoriesregister.php">
            <i class='bx bx-spreadsheet' ></i>
            <span class="link_name">Job Accessories</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="accessoriesregister.php">Job Accessories</a></li>
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

      <!--Add Customer -->
        <div id="popupListAddForm" class="modal">
        <div class="listAddForm">
        <div class="title">Customer Registration</div>
        <div class="contentListAddForm">
        <form action="customerindex.php" method="post">
        <div class="listAddForm-details">

        <div class="input-box">
        <label for="customerCode" class="details">Customer Code</label>
        <input type="text" id="customer_code" name="customer_code" onkeyup="checkcustomer_codelAvailability()" value="" class="form-control" placeholder="Enter Customer Code" required> 
        <span id="customer_code-availability-status"></span>
        </div>

        <div class="input-box">
        <label for="customerName" class="details">Customer Name</label>
        <input type="text" id="customerName" name="customer_name" placeholder="Enter Customer Name" required>
        </div>

        <div class="input-box">
        <label for="address" class="details">Customer Address</label>
        <input type="text" id="cust_address1" name="cust_address1" placeholder="Enter Address 1" required>
        <input type="text" id="cust_address2" name="cust_address2" placeholder="Address 2">
        <input type="text" id="cust_address3" name="cust_address3" placeholder="Address 3">
        </div>

        <div class="input-box">
        <label for="customerGrade" class="details">Customer Grade</label>
        <input type="text" id="customerGrade" name="customer_grade" placeholder="Enter Customer Grade" required>
        </div>

        <div class="input-box">
        <label for="customerPIC" class="details">Customer PIC</label>
        <input type="text" id="customerPIC" name="customer_PIC" placeholder="Enter Customer PIC" required>
        </div>

        <div class="input-box">
        <label for="customerPhone" class="details">Phone 1</label>
        <input type="text" id="cust_phone1" name="cust_phone1" placeholder="Enter Customer Phone" required>
        </div>

        <div class="input-box">
        <label for="customerPhone" class="details">Phone 2</label>
        <input type="text" id="cust_phone2" name="cust_phone2" placeholder="Enter Customer Phone">
        </div>
        
        <?php if (isset($_SESSION["username"])) ?>
        <input type="hidden" name="customercreated_by" id="customercreated_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        <input type="hidden" name="customerlasmodify_by" id="customerlasmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
        </div>

        <div class="listAddFormbutton">
        <input type="submit" id="submit" name="submit" value="Register">
        <input type="button" onclick="document.getElementById('popupListAddForm').style.display='none'" value="Cancel" id="cancelbtn">
        </div>
        </form>
        </div></div></div>


         <!--Customer-->
        <div class="customerList">
        <h1>Customer List</h1>

        <div class="addCustomerBtn">
        <button id="btnRegister" onclick="document.getElementById('popupListAddForm').style.display='block'">Add</button>
        <button class="btn-reset" onclick="document.location='customer.php'">Refresh</button>
        </div>

        <div class="datalist-wrapper">    
        <div class="col-lg-12" style="border: none;">

    <table class="table table-striped sortable">
    <thead>
    <tr>
    <th>No</th>
    <th>Name</th>
    <th>Code</th>
    <th>Grade</th>
    <th>Action</th>
    </tr>
    </thead>

    <tbody>
    <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
     
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row["customer_name"]; ?></td>
        <td><?php echo $row["customer_code"]; ?></td>
        <td><?php echo $row["customer_grade"]; ?></td>
        <td><div class='customerUpdateDeleteBtn'>
<button data-customer_id="<?php echo $row["customer_id"]; ?>" class='userinfo' type='button' id='btnView'>View</button>
<button data-customer_id="<?php echo $row['customer_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
<button data-customer_id="<?php echo $row['customer_id'];?>" class='deletebtn' type='button' id='btnDelete'>Delete</button>
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

        <!--Delete JobType -->      

        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->

        <div class="customerPopup">
        <div class="contentCustomerPopup">
        <div class="title">Customer</div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <br />
        <div class="modal-body"></div>

         </div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.deletebtn',function(){ 
            var customer_id = $(this).data('customer_id');

            // AJAX request
            $.ajax({
                url: 'deletecustomer.php',
                type: 'post',
                data: { customer_id: customer_id },
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
        <div class="customerPopup">
        <div class="contentCustomerPopup">
        <div class="title"> Customer Info </div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>


        </div><br />
        <div class="modal-body">                         
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.updateinfo',function(){ 
            var customer_id = $(this).data('customer_id');

            // AJAX request
            $.ajax({
                url: 'updatecustomer.php',
                type: 'post',
                data: { customer_id: customer_id },
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
        
        <!--Customer list pop up form-->
        <!-- Modal -->
        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="customerPopup">
        <div class="contentCustomerPopup">
        <div class="title"> Customer Info </div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <br />
        <div class="modal-body">
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.userinfo',function(){ 
            var userid = $(this).data('customer_id');

            // AJAX request
                $.ajax({
                    url: 'ajaxcustomer.php',
                    type: 'post',
                    data: { userid: userid },
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


                    </section>
<section>

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