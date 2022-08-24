<?php
session_start();

?>



<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $machine_id = $_POST['machine_id'];

    $query = "SELECT * 
    FROM machine_list
    JOIN machine_type ON machine_list.type_id=machine_type.type_id
    JOIN machine_brand ON machine_type.brand_id=machine_brand.brand_id
    WHERE machine_list.machine_id = $machine_id";

    //  $query = "SELECT * FROM machine_list WHERE machine_id='$machine_id'";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
          

    <div class="row">
    <div class="updatetech">

    <form action="updatemachineindex.php" method="post">
    <div class="staff-details" style="display: flex; flex-wrap: wrap; justify-content: space-between; width: 580px;">

    <input type="hidden" name="machine_id" id="machine_id" value="<?php echo $row['machine_id'] ?>">

    <?php if (isset($_SESSION["username"])) ?>
    <input type="hidden" name="machinelistlastmodify_by" id="machinelistlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

    <div class="input-box">
    <label for="brand">Machine Brand</label><br>
    <select class="form-select" id="brandupdate" required>
     <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brandname']; ?></option>
        <?php

                $querydrop = "select * from machine_brand";
                // $query = mysqli_query($con, $qr);
                $result = $connection->query($querydrop);
                if ($result->num_rows > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {

                ?>

                <option value="<?php echo $rows['brand_id']; ?>"><?php echo $rows['brandname']; ?></option>
                <?php
                    }
                }

                ?>

    </select>

    </div>

    <div class="input-box">
    <label for="type"> Machine Type</label><br>
    <select class="form-select" id="typeupdate" required>
    <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></option>
    </select>

    </div>

    <div class="input-box">
    <label for="">Serial Number</label>
    <select  class="form-select" id="snupdate" onchange="GetMachineUpd(this.value)">
    <option value="<?php echo $row['serialnumber']?>"><?php echo $row['serialnumber']?></option>
    <option value="Add Serial Number" style="color:blue;">Add Serial Number</option>
    <?php

                $query = "select * from machine_list";
                // $query = mysqli_query($con, $qr);
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($rowm = mysqli_fetch_assoc($result)) {

                ?>
                       
                <option value="<?php echo $rowm['machine_id']; ?>"><?php echo $rowm['serialnumber']; ?></option>
                <?php
                    }
                }

                ?>
            </select>

   
            <input type="hidden" id="machineId" name="machine_id" value="<?php echo $row['machine_id']?>">  
            <input type="text" id="SerialNumber" name="serialnumber" value="<?php echo $row['serialnumber']?>">  
            </div>


    <div class="input-box">
    <label for=""> Machine Code </label>
    <input type="text" id="machineCode" name="machine_code" value="<?php echo $row['machine_code']?>">
    </div>

    <div class="input-box">
    <label for=""> Machine Name </label>
    <input type="text" style="width: 100%;" id="machineName" name="machine_name" value="<?php echo $row['machine_name']?>">
    </div>

  
    <div class="input-box">
    <label for="" class="details">Customer Name</label>
    <input type="text" style="width: 100%;" id="customerName" name="customer_name" value="<?php echo $row['customer_name']?>">
    </div>

    <div class="input-box">
    <label for="PurchaseDate" class="details">Purchase Date</label>
    <input type="date" id="PurchaseDate" name="purchase_date" class="form-control" value="<?php echo $row['purchase_date'] ?>">
    </div>

    <div class="input-box">
    <label for="" class="details"></label>
    <input type="hidden" id="" name="" class="form-control" value="">
    </div>

    <div class="input-box">
    <label for="">Machine Description</label>
     <textarea name="machine_description" id="machineDescription" rows="3" cols="100" style="width: 541px; height: 65px;"><?php echo $row['machine_description'] ?></textarea>
    </div>

     <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
     </div></form></div></div>

    <script>
    $(document).ready(function() {

    $('#serialnumberupd').hide();

    $("#snupdate").change(function() {
        var val = $(this).val();
        
        if (val == 'Add Serial Number') {
            $('#serialnumberupd').show();
        } else {
            $('#serialnumberupd').hide();
        }
    }).change();

});

            </script>

             <script>
        $(document).ready(function() {
            $("#brandupdate").on('change', function() {
                var brandid = $(this).val();

                $.ajax({
                    method: "POST",
                    url: "ajaxData.php",
                    data: {
                        id: brandid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#typeupdate").html(data);
                        $("#snupdate").html('<option value="">Select Serial Number</option');

                    }
                });
            });
            $("#typeupdate").on('change', function() {
                var typeid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "ajaxData.php",
                    data: {
                        sid: typeid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#snupdate").html(data);

                    }

                });
            });
        });
    </script>

                        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#snupdate").select2();

        });
        </script>


   <script>
		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetMachineUpd(str) {
			if (str.length == 0) {
                 document.getElementById("machineId").value = "";
                 document.getElementById("SerialNumber").value = "";
                document.getElementById("machineCode").value = "";
				document.getElementById("machineName").value = "";
                 document.getElementById("machineDescription").value = "";
                 document.getElementById("customerName").value = "";
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
							("machineId").value = myObj[0];

                            	document.getElementById
							("SerialNumber").value = myObj[1];
                        
						document.getElementById
							("machineCode").value = myObj[2];
						
						// Assign the value received to
						// last name input field
                        document.getElementById
							("machineName").value = myObj[3];
                            document.getElementById(
							"machineDescription").value = myObj[4];

                                 document.getElementById(
							"customerName").value = myObj[5];
                           
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchmachine.php?machine_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>

          
                </div>
            </div>
        <?php
        }
    } else {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
