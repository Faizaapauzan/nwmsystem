<?php session_start(); ?>

<!DOCTYPE html>
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

<!-- ASSIGN TECHNICIAN -->

  <form id="assignupdate_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" name="customer_name" class="customer_name" value="<?php echo $row['customer_name'] ?>">
    <input type="hidden" name="requested_date" class="requested_date" value="<?php echo $row['requested_date'] ?>">
    
    <label for="job_assign" style="padding-left: 20px;" class="job_assign">Job Assign to:</label><br/>
    <p class="control"><b id="assignupdateadminmessage"></b></p>
    <div class="input-box" style="display:flex; width: 541px">
    
    <select id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
    
      <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($connection, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE 
         technician_rank = '1st Leader' AND tech_avai = '0'
         OR
         technician_rank = '2nd Leader' AND tech_avai = '0'
         OR
         staff_position='storekeeper' AND tech_avai = '0' ORDER BY staffregister_id ASC");  // Use select query here 
        echo "<option></option>";
        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." </option>";  // displaying data in option menu
            // echo "<option value='". $data['username'] ."'>" .$data['username']. "      -      " . $data['technician_rank']."</option>";  // displaying data in option menu
        }	
      ?>

    <input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
    <input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
    <input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>  
    <input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>
  </select>
  
  <?php
      $DateAssign = date("Y.m.d");
      $_SESSION['storeDate'] = $DateAssign; ?>
    
    <input type="hidden" name="DateAssign" id="DateAssign" value="<?php echo $_SESSION["storeDate"] ?>" readonly>	
  
  <?php if (isset($_SESSION["username"])) { ; } ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>	 
    <input type="button" style="color: white; background-color: #081d45; height: 46px; margin-top: -1px;  padding-left: 2px; width: 145px;" class="btn btn-primary" id="technicianassign" name="technicianassign" value="Update" onclick="keep();" />
    <!-- <button style="height: 42px; margin-top: 2px;  border-radius: 5px; width: 145px;" id="technicianassign" name="technicianassign">Update</button> -->
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
                      $('#assignupdateadminmessage').html('<span style="color: green">Technician Assign!</span>');
                      else
                      $('#assignupdateadminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                    }
                });
      });
      });
  </script>

  <!-- Save customer name and requested date into job update table -->
<script type="text/javascript">
    function keep()
      {
        var tech_name = $('input[name=job_assign]').val();
        var customer_name = $('input[name=customer_name]').val();
        var requested_date = $('input[name=requested_date]').val();
        
            if(tech_name!='' || tech_name=='',
           customer_name!='' || customer_name=='',
          requested_date!='' || requested_date=='')
            {
              var formData = {tech_name:tech_name,
                          customer_name:customer_name,
                         requested_date:requested_date};
                    
              $.ajax({  
                        url: "savecustname.php",
                        type: 'POST',
                        data: formData,
                        success: function(response)
                          {
                            var res = JSON.parse(response);
                                      console.log(res);
                          }
                      });
            }
      } 
</script>

<!-- ASSIGN TECHNICIAN -->

<!-- ASSIGN ASSISTANT -->

<form class="form" id="adminassistant_form" method="post" style="margin-left: 20px;">
<input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
<div class="assistants" id="multipleassist">
  
  <?php
      $con = mysqli_connect("localhost","root","","nwmsystem");

      if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];
      $fetchquery = "SELECT staffregister_id FROM assistants WHERE jobregister_id='$jobregister_id' ";
      $fetchquery_run = mysqli_query($con, $fetchquery);
      $JobAssistant = [];
      foreach($fetchquery_run as $fetchrow)
        {
          $JobAssistant[] = $fetchrow['staffregister_id'];
        }
      }
 ?>
 
 <br/>
 
  <?php
      //include connection file 
      include_once("dbconnect.php");
      if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];
      $sql = "SELECT * FROM `assistants` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
      }
  ?>

<label style="color: blue" for="assistant">Select Assistant :</label>
<table style="box-shadow: 0 5px 10px #f7f7f7; margin-left: -6px; margin-top: -11px;" class="table" width="60%" cellspacing="0">
   <thead>
      <tr>
        <th></th>
      </tr>
   </thead>
   <tbody>
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
         <td><b><?php echo $res['username'];?></b></td>
         <td><span style="color: red" class='deleteassa' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
      </tr>
	  <?php endforeach;?>
   </tbody>
</table>

<div class="input-box" style="width: 432px;">
  <select name="assistant[]" class="form-control multiple-assistant" multiple="multiple" style="height: auto; margin-left: -19px;">
      
      <?php
           $query = "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' OR staff_position = 'General Worker' ORDER BY staffregister_id ASC";
           $query_run = mysqli_query($con, $query);
           if(mysqli_num_rows($query_run) > 0)
            {
              foreach ($query_run as $rowstaff){
      ?>
  
  <option value="<?php echo $rowstaff["username"]; ?>"><?php echo $rowstaff["username"]; ?></option>
      
      <?php } }
          else
          {
            echo "No Record Found";
          }
      ?>
  
  </select>
  
  <script>
      $("#multipleassist").on('change', function () {
        $(".multiple-assistant").select2({
          //maximumSelectionLength: 2
        });
      });
  </script>

</div>

<div class="buttonUpdate" style="display: flex;flex-direction: row-reverse;">
  <?php if (isset($_SESSION["username"])) { ; } ?>
<input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>	 
<p class="control"><b id="assignadminmessage"></b></p>	 
<input type="button" style="color: white;background-color: #081d45;height: 36px;margin-top: 33px; width: 100px; border-radius: 9px;" id="updateassign" name="updateassign" value="Update"/>
        
</div>		 
    </form>
	<br>
  <?php
        }
    }
    ?>

              <?php
            } ?>

<script>
    $(document).ready(function () {
        $('#updateassign').click(function () {
            var data = $('#adminassistant_form').serialize() + '&updateassign=updateassign';
            $.ajax({
                url: 'assignleaderindex.php',
                type: 'post',
                data: data,
                success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#assignadminmessage').html('<span style="color: green">Update Saved!</span>');
                          
                        else
                        
                          $('#assignadminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');

                          
                      }
            });
        });
    });
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


</body></html>

        