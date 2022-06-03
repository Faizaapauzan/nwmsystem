<?php
 session_start(); ?>
 

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="css/technicianmain.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>

	<script src="https://kit.fontawesome.com/7b6b55bad0.js" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
</head>

<style>
.dropbtn {
    background-color: #1a0845;
    color: white;
    border-radius: 5px;
    border: none;
    font-size: 17px;
    font-weight: bold;
    letter-spacing: 1px;
    cursor: pointer;
    padding: 7px 7px;
    margin-right: 10px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  color:whitesmoke;
}

#notYetStatus{
	position: static;
}

</style>

<body>

  <nav class="navbar">
    <div class="wrapper">
    <ul class="main-nav" id="js-menu">
		   <a href="technician.php" class="nav-links sidebarbutton" style="text-decoration: none;"><i class='bx bx-home'></i>HOME</a>
    </ul>
   
    </div>
  </nav>
	
<!-- save technician and assistant name -->
<div class="container">
<div class="column" >
<p class="column-title" id="technician" >Technician & Assistant In Charge</p>
<form action="" method="GET">
    
      <div style="display: inline-flex;">
      <div class="input-box">
        <label style="font-size: 15px;">Technician: </label>
        <?php if (isset($_SESSION["username"])) ?>
        <input type="text" name="technician" id="technician" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>" style="border: none; width: 100px; padding-left: 6px; border-radius: 3px; font-size: 15px;" readonly>
        <label style="font-size: 15px;">Assistant: </label>
  
        <select style="border-color: #081d45; border-radius: 5px; border: 1px solid #ccc; border-bottom-width: 2px; width: 105px; outline: none; font-size: 15px;" id="jobassistantto" name="assistant" onchange="GetAssistant(this.value)"> <option value="<?php echo $row['assistant']?>">  </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position FROM staff_register WHERE staff_position = 'technician' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['username'] ."'>" .$data['username']. "</option>";  // displaying data in option menu
        }	
    ?></select>

    <input type="hidden" name="assistant" id='assistant' value="<?php if(isset($_GET['assistant'])){echo $_GET['assistant'];} ?>" onchange="GetAssistant(this.value)" readonly>
    
      </div>
      </div>
      
      <div>
        <div><input type="button" onclick="submitFormrest();" class="buttonbiru" style="width: fit-content; margin-top: 19px; height: 32px; padding-top: 3px; padding-left: 20px; padding-right: 20px;" value="Save" />
         <button style="width: fit-content; margin-top: -4px; height: 32px; padding-top: 3px; padding-left: 20px; padding-right: 20px;" type="submit" class="btn btn-primary">Search</button>
        <p class="control"><b id="message"></b></p>
      </div></div>
      
  </form>
  </div>

  <!-- save technician and assistant name -->

  <!-- script to save technician and assistant name -->
  <script type="text/javascript">
      function submitFormrest()
        {
          var technician = $('input[name=technician]').val();
          var assistant = $('input[name=assistant]').val();
          
          if(technician!='' || technician=='',
              assistant!='' || assistant=='')
             
             {
               var formData = {technician: technician,
                                assistant: assistant};
                                
                                $.ajax({
                                  url: "techresthourindex.php", 
                                  type: 'POST',
                                  data: formData,
                                  success: function(response)
                                  {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    if(res.success == true)
                                    $('#message').html('<span style="color: green">Rest Hour Saved!</span>');
                                    else
                                    $('#message').html('<span style="color: red">Rest Hour Cannot Be Saved</span>');
                                  }
                                });
                              }
                            }
  </script>
<!-- script to save technician and assistant name -->

<!-- SEARCH TO DISPLAY REST HOUR IN AND OUT -->



      <?php 
        $con = mysqli_connect("localhost","root","","nwmsystem");

        if(isset($_GET['technician'])) {
                                     
          $technician = $_GET['technician'];
          $assistant = $_GET['assistant'];

          $query = "SELECT * FROM technician_resthour WHERE technician='$technician' AND assistant='$assistant' ORDER BY resthour_id DESC LIMIT 1";
          $query_run = mysqli_query($con, $query);

          if(mysqli_num_rows($query_run) > 0){

           foreach($query_run as $row)

              { ?>

                    <div class="column" >
			<p class="column-title" id="technician" >Rest Hour</p>
      <hr>
<div class="cards">
  <div class="card">
        <input type="hidden" name="resthour_id" class="resthour_id" value="<?= $row['resthour_id']; ?>">
                <div class="dalamboard" style="padding-left: 31px; margin-top: 20px; margin-bottom: 20px;">
    <label><?= $row['technician']; ?></label>
    <div style="width: fit-content;" class="input-group mb-3">
    <input readonly type="text" class="form-control" id="tech_out" name="tech_out" value="<?= $row['tech_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button class="buttonbiru" onclick="tech_outs()" style="width: fit-content;" type="button">OUT</button>
    </div>
        
    <script type="text/javascript">
      function tech_outs()
        {
          $.ajax({url:"departureTime.php", success:function(result)
            {
              $("#tech_out").val(result);
                        }
                    })
                }
    </script>
    </div>
        
    <div style="width: fit-content;" class="input-group mb-3">
    <input readonly type="text" class="form-control" id="tech_in" name="tech_in" value="<?= $row['tech_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button class="buttonbiru" onclick="tech_ins()" style="width: fit-content; padding-left: 55px;" type="button">IN</button>
    </div>
        
    <script type="text/javascript">
      function tech_ins()
        {
          $.ajax({url:"departureTime.php", success:function(result)
        {
          $("#tech_in").val(result);
        }
          })
                }
    </script>
    </div>

    <label><?= $row['assistant']; ?></label>
    <div style="width: fit-content;" class="input-group mb-3">
    <input readonly type="text" class="form-control" id="ass_out" name="ass_out" value="<?= $row['ass_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button class="buttonbiru" onclick="ass_outs()" type="button" style="width: fit-content;">OUT</button>
    </div>
        
    <script type="text/javascript">
      function ass_outs()
        {
          $.ajax({url:"departureTime.php", success:function(result)
        {
          $("#ass_out").val(result);
        }
          })
                }
    </script>
    </div>
 
    <div style="width: fit-content;" class="input-group mb-3">
    <input readonly type="text" class="form-control" id="ass_in" name="ass_in" value="<?= $row['ass_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
    <button class="buttonbiru" onclick="ass_ins()" style="width: fit-content; padding-left: 60px;" type="button">IN</button>
    </div>
        
    <script type="text/javascript">
      function ass_ins()
        {
          $.ajax({url:"departureTime.php", success:function(result)
        {
          $("#ass_in").val(result);
        }
          })
              }
    </script>
    </div>
    
    <p class="control"><b id="message-update"></b></p>
    <div style="width: fit-content;" class="updateBtn">
    <div><input type="button" onclick="updateForm();" class="buttonbiru" style="height: 39px; padding-left: 36px; font-size: 15px;" value="Update" /></div>
    </div></div>
    </form>
    
    <script type="text/javascript">

      function updateForm()
              {
                var tech_out = $('input[name=tech_out]').val();
                var tech_in = $('input[name=tech_in]').val();
                var ass_out = $('input[name=ass_out]').val();
                var ass_in = $('input[name=ass_in]').val();
                var resthour_id = $('input[name=resthour_id]').val();
                
                if(tech_out!='' || tech_out=='', 
                    tech_in!='' || tech_in=='', 
                    ass_out!='' || ass_out=='',
                     ass_in!='' || ass_in=='',
                resthour_id!='' || resthour_id=='')

                  {
                    var formData = {tech_out: tech_out,
                                     tech_in: tech_in,
                                     ass_out: ass_out,
                                      ass_in: ass_in,
                                 resthour_id: resthour_id};
                                    
                    $.ajax({
                            url: "techresthourupdaterindex.php", 
                            type: 'POST', 
                            data: formData, 
                            success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#message-update').html('<span style="color: green">Update Saved!</span>');
                        else
                          $('#message-update').html('<span style="color: red">Data Cannot Be Saved</span>');
                      }
                    });
                  }
              } 
    </script>
            <?php
                    }
                            }
                       else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

   </div>
   </div>
   		</div>
                                  </div>


<!-- SEARCH TO DISPLAY REST HOUR IN AND OUT -->	

<!--TOP BAR-->
						
						<div class="line" style="background-color: #181148;"></div>
							<br>
						<div class="modal-body p-0">
					

<script>
$(document).ready(function(){
	
$("#jobassistantto").on("change",function(){
   var GetValue=$("#jobassistantto").val();
   $("#assistant").val(GetValue);
});

});
</script>

</body>
</html>