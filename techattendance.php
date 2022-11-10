<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
$att_date = date("d-m-Y");
$_SESSION['storeDate'] = $att_date;
?>
 
<!DOCTYPE html>

<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Technician Attendance</title>
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
	
<!-- save technician name -->
<div class="container">
<div class="column">
<p class="column-title" id="technician">Technician</p>
  <form action="" method="POST">
    <div style="display: inline-flex;">
    <div class="input-box">
      <label style="font-size:15px;">Technician: </label>
        <?php if (isset($_SESSION["username"])) ?>
        <input type="text" name="tech_leader" id="tech_leader" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>" style="border: none; width: 100px; padding-left: 6px; border-radius: 3px; font-size: 15px;" readonly>      
        <input type="hidden" name="techupdate_date" id='techupdate_date' value="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date('d-m-Y'); ?>" readonly>
    </div>
    </div>
    <div>
      <div><input type="button" onclick="submitAttname();" class="buttonbiru" style="width: fit-content; margin-top: 19px; height: 32px; padding-top: 3px; padding-left: 20px; padding-right: 20px;" value="Save" />
      <span id="customer_code-availability-status"></span>
      <p class="control"><b id="message"></b></p>
    </div>
    </div>
  </form>
</div>
<!-- save technician name -->

<!-- script to save technician name -->
  <script type="text/javascript">
      function submitAttname()
        {
          var tech_leader = $('input[name=tech_leader]').val();
          var techupdate_date = $('input[name=techupdate_date]').val();

          if(tech_leader!='' || tech_leader=='',
          techupdate_date!='' || techupdate_date=='')
             
             {
              var formData = {tech_leader: tech_leader, 
                techupdate_date: techupdate_date};
                                
                                $.ajax({
                                  url: "techattendanceindex.php", 
                                  type: 'POST',
                                  data: formData,
                                  success: function(response)
                                  {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    if(res.success == true)
                                    location.reload();  
                                    else
                                    $('#message').html('<span style="color: red">Update Cannot Be Saved</span>');
                                  
                                    
                                  }
   
                                });
                              }
                            }
  </script>
<!-- script to save technician name -->

<!-- DISPLAY IN AND OUT -->
    <?php
        include 'dbconnect.php';
        $results = $conn->query("SELECT * FROM tech_update WHERE tech_leader= '{$_SESSION['username']}' AND techupdate_date = '{$_SESSION['storeDate']}' ORDER BY techupdate_id DESC LIMIT 1");
        while($row = $results->fetch_assoc()) {
    ?>
  
  <form action="" method="POST">

  <div class="column" >
  <p class="column-title" id="technician">Atendance Time</p>
  <hr>
  <div class="cards">
    <div class="card" style=" position: static; padding-left: 31px; margin-top: 20px; margin-bottom: 20px;">
    <input type="hidden" name="techupdate_id" class="resthour_id" value="<?= $row['techupdate_id']; ?>">
    
    <!-- technician -->
    <br/>
    <div style=" position: static; font-size: larger; margin-bottom: 20px; color: darkblue;" class="tarikh">Date: <?= $row['techupdate_date']; ?></div>
    <label style="position: static; font-weight: 600; font-size: 20px;"><?= $row['tech_leader']; ?></label>
    
    <div style=" position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="clock_in" name="tech_clockin" value="<?= $row['tech_clockin']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="clock_ins()" style="position: static; width: fit-content; padding-left: 60px;" type="button">IN</button>
    </div>
    
    <script type="text/javascript">
        function clock_ins()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#clock_in").val(result);
              }
            })
          }
    </script>

    </div>
    
    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="clock_out" name="tech_clockout" value="<?= $row['tech_clockout']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="clock_outs()" style="position: static; width: fit-content;" type="button">OUT</button>
    </div>
    
    <script type="text/javascript">
        function clock_outs()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#clock_out").val(result);
              }
            })
          }
    </script>

    </div>
    
    <p class="control"><b id="message-update2"></b></p>
    <div style="position: static; width: fit-content;" class="updateBtn">
    <div><input type="button" onclick="submitupdtAtt();" class="buttonbiru" style="width: fit-content; margin-top: 19px; height: 32px; padding-top: 3px; padding-left: 20px; padding-right: 20px;" value="Update" /></div>
    </div>
  
        </br>

    </div>
    </form>

    <!-- Script to save IN and OUT -->
    <script type="text/javascript">
      function submitupdtAtt()
        {
          var tech_clockin = $('input[name=tech_clockin]').val();
          var tech_clockout = $('input[name=tech_clockout]').val();
          var techupdate_id = $('input[name=techupdate_id]').val();

          if(tech_clockin!='' || tech_clockin=='',
          tech_clockout!='' || tech_clockout=='',
              techupdate_id!='' || techupdate_id=='')
             
             {
              var formData = {tech_clockin: tech_clockin, 
                tech_clockout: tech_clockout,
                               techupdate_id: techupdate_id};
                                
                                $.ajax({
                                  url: "techattendanceupdaterindex.php", 
                                  type: 'POST',
                                  data: formData,
                                  success: function(response)
                                  {
                                    var res = JSON.parse(response);
                                    console.log(res);
                                    if(res.success == true)
                                    $('#message-update2').html('<span style="color: green">Attendance Saved!</span>');
                                    else
                                    $('#message-update2').html('<span style="color: red">Attendance Cannot Be Saved</span>');
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

<!-- DISPLAY IN AND OUT -->	

<!--TOP BAR-->

<div class="line" style="background-color: #181148;"></div>
<br>
<div class="modal-body p-0">
              
</body>
</html>