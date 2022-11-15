<?php session_start(); ?>

<!DOCTYPE html>
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

<?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
?>

<!-- ASSIGN TECHNICIAN -->

  <form id="assignupdate_form" method="post" style="margin-bottom: 30px;">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
   
    <label for="job_assign" style="padding-left: 20px;" class="job_assign">Job Assign to:</label><br/>
    <p style="margin-left: 20px;margin-top: 1px;margin-bottom: 11px;" class="control"><b id="assignupdateadminmessage"></b></p>
    <div class="input-box" style="display:flex; width: 541px">
    
    <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
      
      <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE 
         technician_rank = '1st Leader' AND tech_avai = '0'
         OR
         technician_rank = '2nd Leader' AND tech_avai = '0'
         OR
         staff_position='Storekeeper' AND tech_avai = '0' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." </option>";  // displaying data in option menu
          
        }	
      ?>

    <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
    <input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
    <input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>  
    <input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>
  
    </select>
  
    <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>	 
    <input type="button" style="color: white; background-color: #081d45; height: 46px; margin-top: -1px;  padding-left: 2px; width: 145px;" class="btn btn-primary" id="technicianassign" name="technicianassign" value="Update"/>
    </div>
    </form>
    

  
  <script>
      $(document).ready(function () {
      $('#technicianassign').click(function () {
        var data = $('#assignupdate_form').serialize() + '&technicianassign=technicianassign';
        $.ajax({
                  url: 'assigntechindex.php',
                  type: 'post',
                  data: data,
                  success: function(response)
                    {
                      var res = JSON.parse(response);
                      console.log(res);
                      if(res.success == true)
                      $('#assignupdateadminmessage').html('<span style="color: green">Job Assigned!</span>');
                      else
                      $('#assignupdateadminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                    }
                });
      });
      });
  </script>
  <br>

<!-- ASSIGN TECHNICIAN -->

<?php
        }
    }
    ?>
              <?php
            } ?>

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
 // Delete 
 $('.deleteassa').click(function(){
   var el = this;
   // Delete id
   var deletedid = $(this).data('id');
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete-assistant.php',
        type: 'POST',
        data: { id:deletedid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    // $(el).closest('td').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

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
		function GetJobAss(str) {
			if (str.length == 0) {
				document.getElementById("username").value = "";
                document.getElementById("technician_rank").value = "";
                 document.getElementById("staff_position").value = "";
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
							("username").value = myObj[0];
						
						// Assign the value received to
						// last name input field
						document.getElementById(
							"technician_rank").value = myObj[1];

                            document.getElementById(
							"staff_position").value = myObj[2];
                            
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "fetchtechnicianrank.php?staffregister_id=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>

</body>
</html>

        