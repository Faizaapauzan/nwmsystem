<?php
    session_start();

    if (isset($_SESSION["username"]))

    date_default_timezone_set("Asia/Kuala_Lumpur");

    $today_date = date("d-m-Y");
    $_SESSION['storeDate'] = $today_date;
?>
 
<!DOCTYPE html>

<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician Rest Hour</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: auto;
  bottom: 55px;
  padding-left: 20px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  padding-right: 7px;
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

.AddAssisstant{
  display: none;
}

.showAssRestHour{
  display: none;
}

.OFF {
  color: red;
}
</style>

<body>

	<nav class="nav">
	
	<div class="nav__link nav__link dropdown">
	  <i class="material-icons">list_alt</i>
	  <span class="nav__text">Job Listing</span>
		<div class="dropdown-content">
			<a href="assignedjob.php">Assigned Job</a>
			<a href="unassignedjob.php">Unassigned Job</a>
		  </div>
	</div>

  <a href="pendingjoblistst.php" class="nav__link">
	  <i class="material-icons">pending_actions</i>
	  <span class="nav__text">Pending</span>
  </a>
  
  <a href="technician.php" class="nav__link">
	  <i class="material-icons">home</i>
	  <span class="nav__text">Home</span>
  </a>

  <a href="incompletejoblistst.php" class="nav__link">
	  <i class="material-icons">do_not_disturb_on</i>
	  <span class="nav__text">Incomplete</span>
  </a>
  
  <a href="completejoblistst.php" class="nav__link">
	  <i class="material-icons">check_circle</i>
	  <span class="nav__text">Complete</span>
  </a>
	
  </nav>
	
<!--save technician name and date-->
<div class="container">
<div class="column" >
<p class="column-title" id="technician" >Technician & Assistant In Charge</p>
  <form action="" method="POST">
    <div style="display: inline-flex;">
    <div class="input-box">
      <label style="font-size: 15px;">Technician: </label>
    <input type="text" name="tech_leader" id="tech_leader" value="<?php echo $_SESSION["username"] ?>" style="border: none; width: 100px; padding-left: 6px; border-radius: 3px; font-size: 15px;" readonly>
    <input type="hidden" name="techupdate_date" id='techupdate_date' value="<?php echo $date = date('d-m-Y'); ?>" readonly>
    </div>
    </div>
    <div>
      <div><input type="button" onclick="submitFormrest();" class="buttonbiru" style="width: fit-content; margin-top: 19px; height: 32px; padding-top: 3px; padding-left: 20px; padding-right: 20px;" value="Save" />
      <p class="control"><b id="message"></b></p>
    </div>
    </div>
  </form>
</div>
<!--save technician name and date-->

<!-- script to save technician and assistant name -->
  <script type="text/javascript">
      function submitFormrest()
        {
          var tech_leader = $('input[name=tech_leader]').val();
          var techupdate_date = $('input[name=techupdate_date]').val();

          if(tech_leader!='' || tech_leader=='',
          techupdate_date!='' || techupdate_date=='')
             
             {
              var formData = {tech_leader: tech_leader,
                techupdate_date: techupdate_date};
                                
                                $.ajax({
                                  url: "techresthourindex.php", 
                                  type: 'POST',
                                  data: formData,
                                  success: function(response)
                                  {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    if(res.success == true)
                                    location.reload();
                                    else
                                    $('#message').html('<span style="color: red">Rest Hour Cannot Be Saved</span>');
                                  }
                                });
                              }
                            }
  </script>
<!-- script to save technician and assistant name -->

<!-- DISPLAY REST HOUR IN AND OUT -->
    <?php
        include 'dbconnect.php';
        $results = $conn->query("SELECT * FROM tech_update WHERE tech_leader = '{$_SESSION['username']}' AND techupdate_date = '{$_SESSION['storeDate']}' ORDER BY techupdate_id  DESC");
        while($row = $results->fetch_assoc()) {
    ?>
    
  <div class="column" >
  <p class="column-title" id="technician" >Rest Hour</p>
  <hr>
  <div class="cards">
    <div class="card" style=" position: static; padding-left: 31px; margin-top: 20px; margin-bottom: 20px;">
    <input type="hidden" name="techupdate_id" class="techupdate_id" value="<?= $row['techupdate_id']; ?>">
    
    <!-- technician -->
    <div style=" position: static; font-size: larger; margin-bottom: 20px; color: darkblue;" class="tarikh">Date: <?= $row['techupdate_date']; ?></div>
    <label style="position: static; font-weight: 600; font-size: 20px;"><?= $row['tech_leader']; ?></label>
    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="tech_out" name="technician_out" value="<?= $row['technician_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="tech_outs()" style="position: static; width: fit-content;" type="button">OUT</button>
    </div>
    
    <script type="text/javascript">
        function tech_outs()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#tech_out").val(result);
              }
            })
          }
    </script>

    </div>
    
    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="technician_in" name="technician_in" value="<?= $row['technician_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="tech_ins()" style="position: static; width: fit-content; padding-left: 55px;" type="button">IN</button>
    </div>
    
    <script type="text/javascript">
        function tech_ins()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#technician_in").val(result);
              }
            })
          }
    </script>

    </div>
  
    </div>
    
    <p class="control"><b id="message-update"></b></p>
    <div style="position: static; width: fit-content;" class="updateBtn">
    <div><input type="button" onclick="updateForm();" class="buttonbiru" style="position: static; margin-bottom: 20px; height: 39px; padding-left: 36px; font-size: 15px;" value="Update" /></div>
    </div>
  
    </div>
    </form>

    <!-- Script to save IN and OUT -->
    <script type="text/javascript">

      function updateForm()
              {
                var tech_leader = $('input[name=tech_leader]').val();
                var techupdate_date = $('input[name=techupdate_date]').val();
                var technician_out = $('input[name=technician_out]').val();
                var technician_in = $('input[name=technician_in]').val();
                var techupdate_id  = $('input[name=techupdate_id ]').val();
                
                if(tech_leader!='' || tech_leader=='', 
                    techupdate_date!='' || techupdate_date=='',
                    technician_out!='' || technician_out=='', 
                    technician_in!='' || technician_in=='',
                    techupdate_id !='' || techupdate_id =='')

                  {
                    var formData = {tech_leader: tech_leader,
                                    techupdate_date: techupdate_date,
                                     technician_out: technician_out,
                                     technician_in: technician_in,
                                     techupdate_id : techupdate_id };
                                    
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
  <!-- Script to save IN and OUT -->
  
  <?php } ?>

   </div>
   </div>
   </div>

<!-- DISPLAY REST HOUR IN AND OUT -->	

<!--TOP BAR-->
  
  <div class="line" style="background-color: #181148;"></div>
  <br>
  <div class="modal-body p-0">
					
<script>
$(document).ready(function(){
	
$("#jobassistantto1").on("change",function(){
   var GetValue=$("#jobassistantto1").val();
   $("#Ass_1").val(GetValue);
});

$("#jobassistantto2").on("change",function(){
   var GetValue=$("#jobassistantto2").val();
   $("#Ass_2").val(GetValue);
});

$("#jobassistantto3").on("change",function(){
   var GetValue=$("#jobassistantto3").val();
   $("#Ass_3").val(GetValue);
});

$("#jobassistantto4").on("change",function(){
   var GetValue=$("#jobassistantto4").val();
   $("#Ass_4").val(GetValue);
});

});
</script>

</body>
</html>