<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>NWM Job Accessories</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link href="css/homepage.css"rel="stylesheet" />
    <script src="js/home.js" type="text/javascript" defer></script>
    <script src="js/form-validation.js"></script>  
    <script src="js/job-register-validation.js" type="text/javascript" defer></script>
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
</div>            


</section>











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


<script src="js/upload photo.js"></script>











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