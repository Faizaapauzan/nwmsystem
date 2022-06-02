<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>Technician Rest Hour</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="css/technicianmain.css"rel="stylesheet" />	
</head>

<body>
  
<!-- home button -->
  <nav class="navbar">
    <div class="wrapper">
      <ul class="main-nav" id="js-menu">
        <a href="technician.php" class="nav-links sidebarbutton" style="text-decoration: none;"><i class='bx bx-home'></i>HOME</a>
    </div>
  </nav>
  <!-- home button -->

  <!-- save technician and assistant name -->
  <form action="techresthour.php" method="post">
    
      <div style="display: inline-flex;">
      <div class="input-box">
        <label>Technician: </label>
        <?php if (isset($_SESSION["username"])) ?>
        <input type="text" name="technician" id="technician" value="<?php echo $_SESSION["username"] ?>" style="border:none;" readonly>
        <label>Assistant: </label>
  
        <select id="jobassistantto" name="assistant" onchange="GetAssistant(this.value)"> <option value="<?php echo $row['assistant']?>">  </option>
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
      
      <div class="updateBtn">
        <div><input type="button" onclick="submitFormrest();" class="buttonbiru" style="width: fit-content; padding:5px;" value="Save" /></div>
        <p class="control"><b id="message"></b></p>
      </div>
      
  </form>
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

<!-- Display Info -->
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
<!-- Display Info -->
  
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