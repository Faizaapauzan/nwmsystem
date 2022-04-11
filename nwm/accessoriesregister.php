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
    <link href="layout.css" rel="stylesheet" />
    <script src="home.js" type="text/javascript" defer></script>
    <script src="form-validation.js"></script>  
    <script src="job-register-validation.js" type="text/javascript" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script> -->

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
   
    <style>

        .jobRegisterContainer {
            max-width: 70%;
            width: 1000px;
            height: 1500px;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            margin: 10px 0px 30px 200px;
            position: relative;
            overflow: hidden;
        }

        .jobRegisterheading {
            text-align: center;
            display: flex;
            margin: -23px -30px 0px -30px;
            padding: 10px 10px 5px 10px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.15);
            background-color: rgba(247, 245, 245, 0.548);
            border-radius: 5px;
        }

        .jobRegisterContainer input {
            padding: 10px 60px;

        }

        .jobRegisterContainer h2 {
            padding-bottom: 10px;
        }

        .jobRegisterContainer .input-box {
            padding-top: 10px;
        }

        .jobRegisterContainer button {
            color: #fff;
            width: 24%;
            margin: 0 5px 5px 8px;
            background-color: #09275eef;

        }

        .jobRegisterContainer input[type=text],
        input[type=date] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #jobInfo1 .btn-box,
        #jobInfo2 .btn-box,
        #jobInfo3 .btn-box,
        #jobInfo4 .btn-box {
            text-align: center;
            margin-top: 30px;

        }


        .dropdownCode {
            position: absolute;

            min-width: -50px;
            height: 0px;
            margin-top: -40px;
            flex-wrap: wrap;
            font-size: 22px;
            margin-left: 90%;
            display: flex;
            align-items: center;
        }

        .dropdownCode i:hover {
            color: rgb(53, 118, 202);
        }

        .jobRegisterContainer #jobInfo1 {
            padding-top: 20px;
            position: absolute;
            width: 91%;
        }


        .step-col {
            padding: 7px 10px;
            margin-top: -10px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            color: #333;
            font-size: 23px;
            position: relative;
        }

        #progress {
            position: absolute;
            height: 4%;
            width: 25%;
            margin: -21px 0px 0px -10px;
            padding-bottom: 61px;
            background-color: #CDDCDC;
            background-image: radial-gradient(at 50% 100%, rgba(255, 255, 255, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%), linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(0, 0, 0, 0.25) 100%);
            background-blend-mode: screen, overlay;
            transition: 1s;
        }

        #progress::after {
            content: '';
            height: 4%;
            width: 0;
            border-top: 36px solid transparent;
            border-bottom: 23px solid transparent;
            position: absolute;
            right: -20px;
            top: 0;
            border-left: 20px solid #CDDCDC;

        }

.modal .close {
  right: 10px;
  top: -140px;
  width: 30px;
  height: 30px;
}


/*All Add form list (in customer list, machine list, accessories list, jobtype list)*/
.listAddForm {
  max-width: 600px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 450px;
}

.listAddForm .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.listAddForm .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #081d45);
}

.contentListAddForm form .listAddForm-details {
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 25px 20px 2px 20px;
}

.modal.active .contentListAddForm {
  transition: all 300ms ease-in-out;
  transform: translate(-50%, -50%) scale;
}

.modal .close {
  right: 10px;
  top: -140px;
  width: 30px;
  height: 30px;
}

form .listAddForm-details .input-box {
  margin-bottom: 15px;
  font-weight: 500;
  padding: 0 15px 0 15px;
}

.listAddForm-details .input-box input {
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

.listAddForm-details .input-box input:focus,
.listAddForm-details .input-box input:valid,
.listAddForm-details .input-box select:focus,
.listAddForm-details .input-box select:valid {
  border-color: #081d45;
}

.listAddFormbutton input {
  height: 30px;
  width: 27%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 13px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: #081d45;
  margin-bottom: 10px;
}

form .listAddFormbutton input:hover {
  /* transform: scale(0.99); */
  opacity: 0.8;
}

form .listAddFormbutton #cancelbtn {
  background-color: #f44336;
}

.listAddFormbutton {
  margin-left: 157px;
}

  #display_image {
        width: 200px;
        height: 130px;
        border: 1px solid black;
        background-position: center;
        background-size: cover; 

}

     /*Accessories*/
  .Accessories i{
    position: absolute;
    margin-top: 35px;
    margin-left: 730px;
    font-size: 25px;
    cursor: pointer;

  }

  .Accessories input, .Accessories select{
    margin-bottom: 15px;
    /* width: calc(100% - 100px); */
    width: 800px;
    padding: 0 12px 0 12px;
    height: 45px;
    outline: none;
    font-size: 13px;
    border-radius: 5px;
    padding-left: 25px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    border-color: #081D45;
  }

  .Accessories input[type=text]{
    /* width: calc(100% - 100px); */
    width: 190px;
    padding: 12px 12px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    margin-right: 10px;
  }

    .Accessories {
    width: 100%;
    /* width: 900px; */
    margin-left: 12px;
    margin-bottom: 15px;
    
  }

  .Accessories i:hover,
  .Accessories i:focus {
    opacity: 0.8;
    cursor: pointer;
  }

    .addAccessoriesBtn button {
            width: 100%;
            margin: 0 19px 5px 19px;
            border-radius: 5px;
            

        }

        .addAccessoriesBtn {
            display: flex;
            margin-left: 85%;
            margin-bottom: 5px;
            margin-top: -40px;
           
        }

        .CodeDropdown select{
    margin-bottom: 10px;
    width: calc(100% - 100px);
    width: 820px;
    padding: 0 12px 0 12px;
    height: 35px;
    outline: none;
    font-size: 13px;
    border-radius: 5px;
    padding-left: 25px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    border-color: #081D45;
  }


    </style>

<body>

    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-window-alt'></i>
            <span class="logo_name">NWM System</span>
        </div>

        <ul class="nav-links">
            <li>
                <a href="jobregister.php" onclick="document.getElementById('id01').style.display='block'">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
            </li>
            <li>
                <a href="accessoriesregister.php" onclick="document.getElementById('id01').style.display='block'">
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
                    <i class="bx bxs-cog"></i>
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
                    <i class='bx bx-briefcase'></i>
                    <span class="link_name">Job Type</span>
                </a>
            </li>
            <li>
                <a href="report.php">
                    <i class='bx bxs-report'></i>
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
                <div class="step-col"><small>Accessories</small></div>
            </div>

<!--Add accessories modal-->
        <div id="accessoriesAddForm" class="modal">
            <div class="listAddForm">
                <div class="title">Add Accessories</div>
                <div class="contentListAddForm">
                     <form id="accessoriesForm" method="post" enctype="multipart/form-data">
                        <div class="listAddForm-details">
                           <div class="input-box">
                        <label for="AccessoriesCode" class="details">Accessories Code</label>
                        <input type="text" id="accessories_code" name="accessories_code" onkeyup="checkAccessoriesCodelAvailability()" value="" class="form-control" placeholder="Enter Accessories Code" required> 
                        <span style='color:red' id="accessories_code-availability-status"></span>
                    </div>
                            <div class="input-box">
                                <label for="AccessoriesName" class="details">Accessories Name</label>
                                <input type="text" id="AccessoriesName" name="accessories_name" placeholder="Enter Accessories Name" required>
                            </div>
                            <div class="input-box">
                                <label for="AccessoriesBrand" class="details">Accessories Brand</label>
                                <input type="text" id="AccessoriesBrand" name="accessories_brand" placeholder="Enter Accessories Brand" required>
                            </div>
                            <div class="input-box">
                                <label for="AccessoriesDescr" class="details">Accessories Description</label>
                                <input type="text" id="AccessoriesDescr" name="accessories_description" placeholder="Enter Customer Description" required>
                            </div>
                            <div class="photoBox">
                                <label for="file_name" class="details">Photo</label>
                                <input type="file" id="image_input" name="file_name" multiple>
                                <div id="display_image"></div>
                            </div>
                            <?php if (isset($_SESSION["username"])) ?>
                            <input type="hidden" name="accessorieslistcreated_by" id="accessorieslistcreatedby" value="<?php echo $_SESSION["username"] ?>" readonly>
                             <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodifyby" value="<?php echo $_SESSION["username"] ?>" readonly>
                        </div>

                        <div class="listAddFormbutton">
                             <p class="control"><b id="accmesage"></b></p>
                            <input class="button is-info is-large" id="save_acc" name="save_acc" type="button" value="Register" />
                          <input type="button" onclick="document.getElementById('accessoriesAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                        </div>
                        </form>
                </div>
            </div>
        </div> 

         <script>
    $(document).ready(function () {
        $('#save_acc').click(function () {
            var data = $('#accessoriesForm').serialize() + '&save_acc=save_acc';
            $.ajax({
                url: 'insertaccessories.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#accmesage').text(response);
                    $('#accessories_code').text('');
                    $('#accessories_name').text('');
                    $('#accessories_brand').text('');
                    $('#accessories_description').text('');
                    $('#file_name').text('');
                    $('#accessorieslistcreated_by').text('');
                  
                }
            });
        });
    });
</script>
          
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


         <script>

$(function() {
    $("#save_acc").click(function(e) {
        e.preventDefault();
        var accessories_code = $("#accessories_code").val();
		var dataString = 'accessories_code=' + accessories_code; 
        if(accessories_code =='')
        {   $('.success').fadeOut(200).hide();
            $('.error').fadeIn(200).show();
        }
        else
        {
            $.ajax({
                type: "POST",				
                url: "insertaccessories.php",
				data: dataString,
                success: function(data) {
                 $('#form').fadeOut(200).hide();
                 $('.success').fadeIn(200).show();
                 $('.error').fadeOut(200).hide();
                 $('#accessoriesModel').append($('<option>', {
                    value: data.id,
                    text: accessories_code , accessories_name , accessories_id
    }));
}
            });
        }
      
    });
});

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

    
<script src="upload photo.js"></script>

</body>

</html>