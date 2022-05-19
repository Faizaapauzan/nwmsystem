<?php
session_start();
$today_date = date("Y.m.d");
$_SESSION['storeDate'] = $today_date;
?>

<?php
include 'dbconnect.php';
?>


<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>NWM Job Registration</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link href="css/homepage.css"rel="stylesheet" />
    <!-- Boxiocns CDN Link -->
    
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>


   
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">NWM SYSTEM</span>
    </div>

    <div class="welcome" style="color: white; text-align: center;">Hi IMRAN!</div>

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

<section class="home-section">
    <nav>
                <div class="home-content">
                      <i class='bx bx-menu' ></i>
                          <a href="homepagev2.php">
                          <span class="text" style="">Home</span>
                          </a>

                </div>

    </nav>
  
<!--Job Register-->

<div class="jobRegisterContainer">
            <div class="jobRegisterheading">
                <div id="progress"></div>
                <div class="step-col"><small>Customer</small></div>
                <div class="step-col"><small> Job </small></div>
                <div class="step-col"><small>Machine</small></div>     
            </div>



















            

            
        <!-- <form action="jobregisterindex.php" method="post"> -->

        <div id="jobInfo1">
                <div class="jobInfoTitle">
                <h2>Customer Details</h2>
                </div>


                <br>
                <div class="CodeDropdown">
                    <div class="form-group"><label>Customer Code</label>  
                     <br><br>

                        <select id="custcode" name="custcode">
                            <option value="">--Select Customer--</option>
                        </select>
                    </div>
                </div>

                    <div class="input-box">
                        <input type="hidden" id="text" class="form-control" name="customer_id" onchange="GetDetail(this.value)" readonly >  
                    </div>
                    

                    <div class="input-box">
                        <input type="text" id="customer_code" class="form-control" name="customer_code" placeholder="Enter Customer Code" readonly >  
                    </div>
                    
                    <div class="dropdownCode">
                        <div class="add"><i class='bx bxs-plus-square'onclick="document.getElementById('popupListAddForm').style.display='block'"></i></div>
                    </div>


                    <div class="form-group"><label>Customer Name</label>
	                    <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder='Enter Customer Name'>
	                </div>
                    <br> 

                    <div class="form-group"><label>Customer Grade</label>
	                    <input type="text" name="customer_grade" id="customer_grade" class="form-control" placeholder='Enter Customer Grade'>
	                </div>
                    <br>

                    <div class="form-group"><label>Customer PIC</label>
	                    <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" placeholder='Enter Customer PIC'>
	                </div>
                    <br>

                    <div class="form-group"><label>Phone 1</label>
	                    <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" placeholder='Enter Customer Phone'>
	                </div>
                    <div class="form-group"><label>Phone 2</label>
	                    <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" placeholder='Enter Customer Phone'>
	                </div>
                    <br>

                    <div class="form-group"><label>Customer Address</label>
	                    <input type="text" name="cust_address1" id="cust_address1" class="form-control" placeholder='Enter Customer Address'>
                        <input type="text" name="cust_address2" id="cust_address2" class="form-control" placeholder='Address 2'>
                        <input type="text" name="cust_address3" id="cust_address3" class="form-control" placeholder='Address 3'>
	                </div>

                    <div class="btn-box" style="text-align: center;">
                        <button type="next" id="btnNext1">Next</button>
                    </div>
                    
        </div>
            

                    <script>
                        $(document).ready(function(){           
                        $("#ddlModel").select2();
                        });
                    </script>

                    <script>
                        $(function() {
                        $("#save_cust").click(function(e) {
                        e.preventDefault();
                        var customer_code = $("#customer_code").val();
		                var dataString = 'customer_code=' + customer_code; 
                        if(customer_code =='')
                        {   $('.success').fadeOut(200).hide();
                        $('.error').fadeIn(200).show();
                        }
                        else
                        {
                             $.ajax({
                            type: "POST",				
                            url: "insertcustomer.php",
				            data: dataString,
                            success: function(data) {
                            $('#form').fadeOut(200).hide();
                            $('.success').fadeIn(200).show();
                            $('.error').fadeOut(200).hide();
                            $('#ddlModel').append($('<option>', {
                            value: data.id,
                            text: customer_code
                                }));
                            }
                        });
                    }     
                });
            });

                    </script>
                    
                    <script>
                        $(document).ready(function(){	
                        $("#ddlModel").on("change",function(){
                        var GetValue=$("#ddlModel").val();
                        $("#text").val(GetValue);
                        });
                        });

                    </script>

                    <script>
		                function GetDetail(str) {
			            if (str.length == 0) {
                        document.getElementById("customer_code").value = "";
				        document.getElementById("customer_name").value = "";
				        document.getElementById("customer_grade").value = "";
                        document.getElementById("customer_PIC").value = "";
				        document.getElementById("cust_phone1").value = "";
                        document.getElementById("cust_phone2").value = "";
                        document.getElementById("cust_address1").value = "";
                        document.getElementById("cust_address2").value = "";
                        document.getElementById("cust_address3").value = "";
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
							("customer_code").value = myObj[0];
						
						// Assign the value received to
						// last name input field
                        document.getElementById
							("customer_name").value = myObj[1];
						document.getElementById(
							"customer_grade").value = myObj[2];
                            document.getElementById(
							"customer_PIC").value = myObj[3];
                            document.getElementById(
							"cust_phone1").value = myObj[4];
                            document.getElementById(
							"cust_phone2").value = myObj[5];
                              document.getElementById(
							"cust_address1").value = myObj[6];
                              document.getElementById(
							"cust_address2").value = myObj[7];
                              document.getElementById(
							"cust_address3").value = myObj[8];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchcustomer.php?customer_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>



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


        










</section>

</body>