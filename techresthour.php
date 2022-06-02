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
  <form action="techresthour.php" method="post">
    
      <div style="display: inline-flex;">
      <div class="input-box">
        <label style="font-size: 15px;">Technician: </label>
        <?php if (isset($_SESSION["username"])) ?>
        <input type="text" name="technician" id="technician" value="<?php echo $_SESSION["username"] ?>" style="border: none; width: 100px; padding-left: 6px; border-radius: 3px; font-size: 15px;" readonly>
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

    <input type="hidden" name="assistant" id='assistant' value="<?php echo $row['assistant']?>" onchange="GetAssistant(this.value)" readonly>
    
      </div>
      </div>
      
      <div>
        <div><input type="button" onclick="submitFormrest();" class="buttonbiru" style="width: fit-content; margin-top: 19px; height: 32px; padding-top: 3px; padding-left: 20px; padding-right: 20px;" value="Save" /></div>
           <!-- <button style="width: fit-content; padding:5px;" type="button" id="update_rest" name="update_rest" value="Save" class="buttonbiru" onclick="submitFormrest();">Update</button> -->
        <p class="control"><b id="message"></b></p>
      </div>
      
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

<!--BOARD REST HOUR-->

				<div class="column" >
					<p class="column-title" id="technician" >Rest Hour</p>
         <?php
      include 'dbconnect.php';
      $query = "SELECT * FROM technician_resthour ORDER BY resthour_id DESC LIMIT 1";
      $result = mysqli_query($conn, $query);
  ?>
   <?php while($row = mysqli_fetch_array($result)) { ?>

				            <div class="cards">
							 <div class="card" data-id="<?php echo $row['resthour_id'];?>" data-toggle="modal" data-target="#myModal" >
									<button type="button" class="btn btn-light text-left font-weight-bold font-color-black"> <!-- Modal-->                  
									<ul class="b" id="draged">
          Technician: <?php echo $row['technician']?>
          <li>Out: <?php echo $row['tech_out']?></li>
          <li>In: <?php echo $row['tech_in']?></li>
          Assistant: <?php echo $row['assistant']?>
          <li>Out: <?php echo $row['ass_out']?></li>
          <li>In: <?php echo $row['ass_in']?></li>
        </ul>
										
								</div>
							</div>
					<?php } ?>				
				</div>
				

<!--TOP BAR-->
						
						<div class="line" style="background-color: #181148;"></div>
							<br>
						<div class="modal-body p-0">
					
<!-- Display modal -->
  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
          <div class="tabs active" id="tab01">
            <h6 class="font-weight-bold">Rest Hour</h6>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="line"></div>
          <br>
          <div class="modal-body p-0">
            
          <fieldset class="show" id="tab011">
            <form action="" method="post">
              <div class="tech-details">

              </div>
            </form>
  <script type='text/javascript'>
    $(document).ready(function() {
      $('.card').click(function() {
        var resthour_id = $(this).data('id');
        $.ajax({
          url: 'ajaxresthour.php',
          type: 'post',
          data: {resthour_id: resthour_id},
          success: function(response) {
            $('.tech-details').html(response);
            $('#myModal').modal('show');
          }
        });
      });
    });
  </script>								
						</fieldset>						
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Display modal -->


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