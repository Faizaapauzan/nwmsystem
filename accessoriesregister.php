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
    <title>NWM Job Accessories</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/homepage.css" rel="stylesheet" />
    <link href="css/machine.css" rel="stylesheet" />
    <link href="css/accessoriesregister.css" rel="stylesheet" />
    <script src="js/home.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>  
    <script src="js/job-register-validation.js" type="text/javascript" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Script -->
    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

<!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
   

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

<!--Job Register-->
        <div class="jobRegisterContainer">
            <div class="jobRegisterheading">
                <div id="progress"></div>
                <div class="step-col"><small>Accessories</small></div>
            </div>

<!--Add accessories modal-->
        <div id="accessoriesAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add Accessories</div>
                <div class="contentListAddForm">
                     <form action="accessoriesindex.php" method="post" enctype="multipart/form-data">
                        <div class="listAddForm-details">
                           <div class="input-box">
                                <label for="AccessoriesCode" class="details">Accessories Code</label>
                                <input type="text" id="accessories_code" name="accessories_code" onkeyup="checkAccessoriesCodelAvailability()" value="" class="form-control" placeholder="Enter Accessories Code" required> 
                                <span style='color:red' id="accessories_code-availability-status"></span>
                            </div>
                            <div class="input-box">
                                <label for="AccessoriesName" class="details">Accessories Name</label>
                                <input type="text" id="accessories_name" name="accessories_name" placeholder="Enter Accessories Name" required>
                            </div>
                             <div class="input-box">
                                <label for="AccessoriesUOM" class="details">Unit of Measurement</label>
                                <input type="text" id="accessories_uom" name="accessories_uom" placeholder="Enter Accessories UOM" required>
                            </div>
                            <div class="input-box">
                                <label for="AccessoriesBrand" class="details">Accessories Brand</label>
                                <input type="text" id="accessories_brand" name="accessories_brand" placeholder="Enter Accessories Brand" required>
                            </div>
                            <div class="input-box">
                                <label for="customerGrade" class="details">Accessories Description</label>
                                <input type="text" id="accessories_description" name="accessories_description" placeholder="Enter Customer Description" required>
                            </div>
                            <div class="photoBox">
                                <label for="file_name" class="details">Photo</label>
                                <input type="file" id="image_input" name="files[]" multiple>
                                <div id="display_image"></div>
                            </div>

                              <?php if (isset($_SESSION["username"])) ?>
                            <input type="hidden" name="accessorieslistcreated_by" id="accessorieslistcreatedby" value="<?php echo $_SESSION["username"] ?>" readonly>
                             <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodifyby" value="<?php echo $_SESSION["username"] ?>" readonly>
                            </div>

                        <div class="listAddFormbutton">
                            <input type="submit" name="submit" value="Register">
                            <input type="button" onclick="document.getElementById('accessoriesAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                        </form>
                </div>
            </div>
        </div> 

          
<!--Finish add accessories -->

<!--Choose Job-->

    <?php
        $db = mysqli_connect("localhost","root","","nwmsystem");
        if(!$db)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>

    <form action="quantityindex.php" method="post">
    <div id="jobInfo1">
     <div class="jobInfoTitle">
                        <h2>Accessories Details</h2>  <div class="addAccessoriesBtn">
                <button type="button" id="btnRegister" onclick="document.getElementById('accessoriesAddForm').style.display='block'">Add</button>
            </div>
                    </div>
                     <!-- <form action="quantityindex.php" method="post"> -->
                    <div class="input-box">
                       <div class="CodeDropdown"><div class="form-group"><label>Job Selection</label><br/><br/>
                     <select id="jobaccessories" onchange="GetJobReg(this.value)"> <option value="">-- Select Job Registered --</option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT job_order_number, job_name From job_register ORDER BY job_order_number DESC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['job_order_number'] ."'>" .$data['job_order_number']. "      -      " . $data['job_name']."</option>";  // displaying data in option menu
        }	
    ?></select>
    <div class="input-box">
    <input type="hidden" name="job_order_number" id='jobtext' class='form-control' onchange="GetJobReg(this.value)" readonly>
    </div></div></div>
    <div class="input-box">
    <input type="text" id="job_description" name="job_description" placeholder="Job Description Here" required>
                    </div>
<div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" readonly>
 </div>

                    <br/>
                    </div>
                    <br/>
                           
<div class="Accessories">
     <label for="Accessories" class="details">Accessories</label>
<div>
<br/>
<form class="form-inline" id="frm-add-data" action="javascript:void(0)">
      
			<div class="model">
                <select class="accessoriesModel" name="accessoriesModel[]"> <option value=""> Select Accessories Code </option>
<?php include "dbconnect.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT accessories_code, accessories_name, accessories_uom, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                     {
                         
                     echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";  // displaying data in option menu
                    
                    }

  ?>    
</select>

<input type="hidden" name="accessories_id[]" class="accessories_id">
<input type="text" class="accessories_code" name="accessories_code[]" placeholder="Accessories Code">
<input type="text" class="accessories_name" name="accessories_name[]" placeholder="Accessories Name">
<input type="text" class="accessories_uom" name="accessories_uom[]" placeholder="Accessories UOM">
<input type="text" class="accQuan" name="accessories_quantity[]" placeholder="Accessories Quantity">


<a href="javascript:void(0);" class="add_button" title="Add field">+</a>
			
	
</form>

</div>


 <div class="btn-box">
 <button type="submit" name="save" value="register">Register</button>

    </form>
        </div>  
        

        <script>


    $(document).on('change', '[name="accessoriesModel[]"]', function(){ 

  var accessories_id = $(this).val(); 
  var model = $(this).parent('.model');
if (accessories_id != '') {
        $.ajax({  
            url:"getcode.php",  
            method:"POST",  
            data: { accessories_id:accessories_id },
            dataType:"json",  
            success:function(result){  
              
                // $(this).parents('.model').find('[name="accessories_id[]"]').val(accessories_id);
                // $(this).parents('.model').find('[name="accessories_code[]"]').val(result.accessories_code);
                // $(this).parents('.model').find('[name="accessories_name[]"]').val(result.accessories_name);
                model.find(".accessories_id").val(accessories_id);
                model.find(".accessories_code").val(result.accessories_code);
                model.find(".accessories_name").val(result.accessories_name);
                model.find(".accessories_uom").val(result.accessories_uom);
            }
        })
    }
    
    
});

	</script>

    
    <!--Accessories add-->
  <script type="text/javascript">

		$(document).ready(function () {

			var maxField = 100; // Total 100 product fields we add

			var addButton = $('.add_button'); // Add more button selector

			var wrapper = $('.model'); // Input fields wrapper

			var fieldHTML = `

		<div class="field-element">
        <div class="model">
 <select class="accessoriesModel" name="accessoriesModel[]"> <option value=""> Select Accessories Code </option>
<?php include "dbconnect.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT accessories_code, accessories_name, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                     {
                         
                     echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";  // displaying data in option menu
                     }	
  ?>   
</select>

<input type="hidden" name="accessories_id[]" class="accessories_id">
<input type="text" class="accessories_code" name="accessories_code[]" placeholder="Accessories Code">
<input type="text" class="accessories_name" name="accessories_name[]" placeholder="Accessories Name">
<input type="text" class="accessories_uom" name="accessories_uom[]" placeholder="Accessories UOM">
<input type="text" class="accQuan" name="accessories_quantity[]" placeholder="Accessories Quantity">
					
<a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></div></div>


					
				`; //New input field html 


			var x = 1; //Initial field counter is 1

			$(addButton).click(function () {
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					$(wrapper).append(fieldHTML);
				}
			});

			//Once remove button is clicked
			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).parent().closest(".field-element").remove();
				x--; //Decrement field counter
			});
		});
</script>

        <script>
$(document).ready(function(){
	
$("#jobaccessories").on("change",function(){
   var GetValue=$("#jobaccessories").val();
   $("#jobtext").val(GetValue);
});

});

</script>
      <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("[name='accessoriesModel[]']").select2();

         
        });
        </script>


<script>
		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetJobReg(str) {
			if (str.length == 0) {
				document.getElementById("job_description").value = "";
                document.getElementById("jobregister_id").value = "";
				
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
							("job_description").value = myObj[0];
						
						// Assign the value received to
						// last name input field
                        document.getElementById(
							"jobregister_id").value = myObj[1];
					
                           
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchjobreg.php?job_order_number=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>



</section>

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
  
<script src="js/upload photo.js"></script>

</body>

</html>