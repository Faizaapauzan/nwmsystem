<?php session_start(); ?>


<!DOCTYPE html>
<html>

<head>
    
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <!-- jQuery --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

    <!-- Select2 JS --> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
</head>


<style>
    .OFF{
        color: red;
    }
</style>

<body>
    
<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];


        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>


    <form action="homeindex.php" method="post" style="display: flex; flex-flow: wrap;">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

     <div class="input-box">
            <label for="">Job Priority</label>
            <input type="text" class="job_priority" name="job_priority" value="<?php echo $row['job_priority']?>">
        </div>

        <div class="input-box">
            <label for="">Job Order Number</label>
            <input type="text" class="job_order_number" name="job_order_number" value="<?php echo $row['job_order_number']?>">
        </div>
        
        <div class="input-box">
            <label for="">Job Name</label>
            <input type="text" class="job_name" name="job_name" value="<?php echo $row['job_name']?>">
        </div>

        <div class="input-box">
            <label for="">Requested date</label>
            <input type="date" class="requested_date" name="requested_date" value="<?php echo $row['requested_date']?>">
        </div>

        <div class="input-box">
            <label for="">Delivery date</label>
            <input type="date" class="delivery_date" name="delivery_date" value="<?php echo $row['delivery_date']?>">
        </div>

        <div class="input-box">
            <label for="">Customer Name</label>
         <select id="custModel" onchange="GetCustomer(this.value)"> <option value=""> <?php echo $row['customer_name']?> </option>
   <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT customer_id, customer_code, customer_name From customer_list ORDER BY customerlasmodify_at ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
             echo "<option value='". $data['customer_id'] ."'>" . $data['customer_name']."</option>";  // displaying data in option menu
        }	
    ?>  
    </select> 
    <input type="hidden" id="cust" class="form-control" name="customer_id" onchange="GetCustomer(this.value)" readonly >  
    <input type="hidden" id="customer_code" class="form-control" name="customer_code" value="<?php echo $row['customer_code']?>" readonly >   
    <input type="hidden" name="customer_name" id="customer_name" class="form-control" value="<?php echo $row['customer_name']?>">

    </div>

        <div class="input-box">
            <label for="">Customer Grade</label>
            <input type="text" name="customer_grade" id="customer_grade" class="form-control" value="<?php echo $row['customer_grade']?>">

        </div>
       
        <div class="input-box">
            <label for="">Customer PIC</label>
            <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" value="<?php echo $row['customer_PIC']?>">
        </div>

         <div class="input-box-address" style="width: 100%;">
            <label for="">Customer Address</label>
            <input type="text" style="width: 100%;" name="cust_address1" id="cust_address1" class="form-control" value="<?php echo $row['cust_address1']?>">
            <input type="text" name="cust_address2" id="cust_address2" class="form-control" value="<?php echo $row['cust_address2']?>">
            <input type="text" name="cust_address3" id="cust_address3" class="form-control" value="<?php echo $row['cust_address3']?>">

            <br/><br/>
        </div>

        <div class="input-box">
            <label for="">Contact Number 1</label>
            <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" value="<?php echo $row['cust_phone1']?>">
        </div>

        <div class="input-box">
            <label for="">Contact Number 2</label>
            <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" value="<?php echo $row['cust_phone2']?>">
        </div>

        <div class="input-box-address" style="width: 100%;">
            <label for="">Machine Name</label>
            <input type="text" style="width: 100%;" class="machine_name" class="machine_name" name="machine_name" value="<?php echo $row['machine_name']?>">
        </div>
        
          
        <div class="input-box">
            <label for="">Machine Type</label>
            <input type="text" class="machine_type" name="machine_type" value="<?php echo $row['machine_type']?>">
        </div>

         <div class="input-box">
            <label for="">Machine Serial Number</label>
            <input type="text" class="serialnumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">
        </div>

        <div class="input-box">
            <label for="">Machine Brand</label>
            <input type="text" class="machine_brand" name="machine_brand" value="<?php echo $row['machine_brand']?>">
        </div>
        

        <div class="input-box">
            <label for="accessories_required"  class="accessories_required">Accessories Required</label>
            <select id="accessories_required" name="accessories_required">
                <option value='' <?php if ($row['accessories_required'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value="Yes" <?php if ($row['accessories_required'] == "Yes") {
                    echo "SELECTED";
                } ?>>Yes</option>
                <option value="No" <?php if ($row['accessories_required'] == "No") {
                    echo "SELECTED";
                } ?>>No</option>
            </select>
        </div>

 
        <div class="input-box">
            <label for="">Job Description</label>
            <textarea name="job_description" class="job_description" rows="3" cols="100" style="width: 300px; height: 63px;"><?php echo $row['job_description']?></textarea>
        </div>

        <div class="input-box">
            <label for="job_cancel"  class="job_cancel">Cancel Job:</label>
            <select id="job_cancel" name="job_cancel">
                <option value='' <?php if ($row['job_cancel'] == '') {
                    echo "SELECTED";
                } ?>></option>
                <option value='YES' <?php if ($row['job_cancel'] == 'YES') {
                    echo "SELECTED";
                } ?>>YES</option>
            </select>
        </div>
          <input type="hidden" class="job_status" name="job_status" value="<?php echo $row['job_status']?>">

         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
         <button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>
    </form>
            
           
         <?php
        }
    }
    ?>

              <?php
            } ?>

                    <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#custModel").select2();

            // Read selected option
            // $('#but_read').click(function(){
            //     var customer_code = $('#ddlModel option:selected').text();
            //     var customer_id = $('#ddlModel').val();
           

            // });
        });
        </script>

        <script>
$(document).ready(function(){
	
$("#custModel").on("change",function(){
   var GetValue=$("#custModel").val();
   $("#cust").val(GetValue);
});

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
                 $('#custModel').append($('<option>', {
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
		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetCustomer(str) {
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


<script>
$(document).ready(function(){
	
$("#jobassignto").on("change",function(){
   var GetValue=$("#jobassignto").val();
   $("#jobassign").val(GetValue);
});

});
</script>

<script>
$(document).ready(function(){
	
$("#jobassistantto").on("change",function(){
   var GetValue=$("#jobassistantto").val();
   $("#assistant").val(GetValue);
});

});
</script>


    <!-- <script>

        $.fn.textWidth = function(text, font) {
    
    if (!$.fn.textWidth.fakeEl) $.fn.textWidth.fakeEl = $('<span>').hide().appendTo(document.body);
    
    $.fn.textWidth.fakeEl.text(text || this.val() || this.text() || this.attr('placeholder')).css('font', font || this.css('font'));
    
    return $.fn.textWidth.fakeEl.width();
};

$('.width-dynamic').on('input', function() {
    var inputWidth = $(this).textWidth();
    $(this).css({
        width: inputWidth
    })
}).trigger('input');


function inputWidth(elem, minW, maxW) {
    elem = $(this);
    console.log(elem)
}

var targetElem = $('.width-dynamic');

inputWidth(targetElem);

        </script> -->



        </body></html>

        