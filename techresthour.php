<?php
session_start();
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
        <?php if (isset($_SESSION["username"])) ?>
        <input type="text" name="technician" id="technician" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>" style="border: none; width: 100px; padding-left: 6px; border-radius: 3px; font-size: 15px;" readonly>  
        <input type="hidden" name="today_date" id='today_date' value="<?php echo $date = date('d-m-Y'); ?>" readonly>
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
          var technician = $('input[name=technician]').val();
          var today_date = $('input[name=today_date]').val();

          if(technician!='' || technician=='',
             today_date!='' || today_date=='')
             
             {
              var formData = {technician: technician,
                              today_date: today_date};
                                
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
        $results = $conn->query("SELECT * FROM technician_resthour WHERE technician= '{$_SESSION['username']}' AND today_date = '{$_SESSION['storeDate']}' ORDER BY resthour_id DESC");
        while($row = $results->fetch_assoc()) {
    ?>
    
  <div class="column" >
  <p class="column-title" id="technician" >Rest Hour</p>
  <hr>
  <div class="cards">
    <div class="card" style=" position: static; padding-left: 31px; margin-top: 20px; margin-bottom: 20px;">
    <input type="hidden" name="resthour_id" class="resthour_id" value="<?= $row['resthour_id']; ?>">
    
    <!-- technician -->
    <div style=" position: static; font-size: larger; margin-bottom: 20px; color: darkblue;" class="tarikh">Date: <?= $row['today_date']; ?></div>
    <label style="position: static; font-weight: 600; font-size: 20px;"><?= $row['technician']; ?></label>
    <div style=" position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="tech_out" name="tech_out" value="<?= $row['tech_out']; ?>" aria-describedby="basic-addon2">
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
    <input readonly type="text" style="position: static;" class="form-control" id="tech_in" name="tech_in" value="<?= $row['tech_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="tech_ins()" style="position: static; width: fit-content; padding-left: 55px;" type="button">IN</button>
    </div>
    
    <script type="text/javascript">
        function tech_ins()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#tech_in").val(result);
              }
            })
          }
    </script>

    </div>
    
    <label> Did you bring assistant with you? <input type="checkbox" name="showAssistantRest" value="showAssistantRest"></label>

     <!-- Script to show assistant class -->
      <script type="text/javascript">
        $(document).ready(function() {
          $('input[type="checkbox"]').click(function() {
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
          });
        });
      </script>
     <!-- Script to show assistant class -->

    <div class="showAssistantRest showAssRestHour">

    <!-- Assistant 1 -->
    <label style=" position: static; font-weight: 600; font-size: 20px;">Assistant 1: </label>
    <select style="border-color: #081d45; border-radius: 5px; border: 1px solid #ccc; border-bottom-width: 2px; width: 145px; outline: none; font-size: 17px;" id="jobassistantto1" name="Ass_1" onchange="GetAssistant(this.value)"><option value=" "><?php echo $row['Ass_1']?></option>
        <?php
            include "dbconnect.php";  // Using database connection file here
            $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' ORDER BY staffregister_id ASC");  // Use select query here
            echo "<option></option>";
            while($data = mysqli_fetch_array($records))
              {
                echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'>" .$data['username']. " " . $data['tech_avai']."</option>";  // displaying data in option menu
              }
        ?>
    </select>
    <input type="hidden" name="Ass_1" id='Ass_1' value="<?php echo $row['Ass_1']?>" onchange="GetAssistant(this.value)" readonly>
    
    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass1_out" name="Ass1_out" value="<?= $row['Ass1_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass1_outs()" type="button" style="position: static; width: fit-content;">OUT</button>
    </div>
    
    <script type="text/javascript">
        function Ass1_outs()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#Ass1_out").val(result);
              }
            })
          }
    </script>

    </div>
    
    <div style=" position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass1_in" name="Ass1_in" value="<?= $row['Ass1_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass1_ins()" style="position: static; width: fit-content; padding-left: 60px;" type="button">IN</button>
    </div>
    
    <script type="text/javascript">
        function Ass1_ins()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#Ass1_in").val(result);
              }
            })
          }
    </script>
    
    </div>
    
    <!-- Assistant 2 -->
    <label style=" position: static; font-weight: 600; font-size: 20px;">Assistant 2: </label>
      <select style="border-color: #081d45; border-radius: 5px; border: 1px solid #ccc; border-bottom-width: 2px; width: 145px; outline: none; font-size: 17px;" id="jobassistantto2" name="Ass_2" onchange="GetAssistant(this.value)"><option value=" "><?php echo $row['Ass_2']?></option>
          <?php
              include "dbconnect.php";  // Using database connection file here
              $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position FROM staff_register WHERE staff_position = 'technician' ORDER BY staffregister_id ASC");  // Use select query here
              echo"<option></option>";
              while($data = mysqli_fetch_array($records))
                {
                  echo "<option value='". $data['username'] ."'>" .$data['username']. "</option>";  // displaying data in option menu
                }
          ?>
      </select>
      <input type="hidden" name="Ass_2" id='Ass_2' value="<?php echo $row['Ass_2']?>" onchange="GetAssistant(this.value)" readonly>

    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass2_out" name="Ass2_out" value="<?= $row['Ass2_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass2_outs()" type="button" style="position: static; width: fit-content;">OUT</button>
    </div>
    
    <script type="text/javascript">
        function Ass2_outs()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#Ass2_out").val(result);
              }
            })
          }
    </script>
    
    </div>
    
    <div style=" position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass2_in" name="Ass2_in" value="<?= $row['Ass2_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass2_ins()" style="position: static; width: fit-content; padding-left: 60px;" type="button">IN</button>
    </div>
    
    <script type="text/javascript">
        function Ass2_ins()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#Ass2_in").val(result);
              }
            })
          }
    </script>
    
    </div>
    
    <!-- Assistant 3 -->
    <label style=" position: static; font-weight: 600; font-size: 20px;">Assistant 3:<?= $row['Ass_3']; ?></label>
    <select style="border-color: #081d45; border-radius: 5px; border: 1px solid #ccc; border-bottom-width: 2px; width: 145px; outline: none; font-size: 17px;" id="jobassistantto3" name="Ass_3" onchange="GetAssistant(this.value)"> <option value=" "><?php echo $row['Ass_3']?></option>
        <?php
            include "dbconnect.php";  // Using database connection file here
            $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' ORDER BY staffregister_id ASC");  // Use select query here
            echo "<option></option>";
            while($data = mysqli_fetch_array($records))
              {
                echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'> " .$data['username']. " " . $data['tech_avai']."</option>";  // displaying data in option menu
              }
        ?>
    </select>
    <input type="hidden" name="Ass_3" id='Ass_3' value="<?php echo $row['Ass_3']?>" onchange="GetAssistant(this.value)" readonly>

    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass3_out" name="Ass3_out" value="<?= $row['Ass3_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass3_outs()" type="button" style="position: static; width: fit-content;">OUT</button>
    </div>
    
    <script type="text/javascript">
        function Ass3_outs()
            {
              $.ajax({url:"techresthourtime.php", success:function(result)
                {
                  $("#Ass3_out").val(result);
                }
              })
            }
    </script>
    
    </div>
 
    <div style=" position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass3_in" name="Ass3_in" value="<?= $row['Ass3_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass3_ins()" style="position: static; width: fit-content; padding-left: 60px;" type="button">IN</button>
    </div>
        
    <script type="text/javascript">
      function Ass3_ins()
        {
          $.ajax({url:"techresthourtime.php", success:function(result)
        {
          $("#Ass3_in").val(result);
        }
          })
              }
    </script>

    </div>
    
    <!-- Assistant 4 -->
    <label style=" position: static; font-weight: 600; font-size: 20px;">Assistant 4:<?= $row['Ass_4']; ?></label>
    <select style="border-color: #081d45; border-radius: 5px; border: 1px solid #ccc; border-bottom-width: 2px; width: 145px; outline: none; font-size: 17px;" id="jobassistantto4" name="Ass_4" onchange="GetAssistant(this.value)"> <option value=" "><?php echo $row['Ass_4']?></option>
        <?php
            include "dbconnect.php";  // Using database connection file here
            $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, tech_avai FROM staff_register WHERE staff_position = 'technician' ORDER BY staffregister_id ASC");  // Use select query here
            echo "<option></option>";
            while($data = mysqli_fetch_array($records))
              {
                echo "<option class='" . $data['tech_avai']."' value='". $data['username'] ."'> " .$data['username']. " " . $data['tech_avai']."</option>";  // displaying data in option menu
              }
        ?>
    </select>
    <input type="hidden" name="Ass_4" id='Ass_4' value="<?php echo $row['Ass_4']?>" onchange="GetAssistant(this.value)" readonly>

    <div style="position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass4_out" name="Ass4_out" value="<?= $row['Ass4_out']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass4_outs()" type="button" style="position: static; width: fit-content;">OUT</button>
    </div>
    
    <script type="text/javascript">
        function Ass4_outs()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#Ass4_out").val(result);
              }
            })
          }
    </script>
    
    </div>
 
    <div style=" position: static; width: fit-content;" class="input-group mb-3">
    <input readonly type="text" style="position: static;" class="form-control" id="Ass4_in" name="Ass4_in" value="<?= $row['Ass4_in']; ?>" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="buttonbiru" onclick="Ass4_ins()" style="position: static; width: fit-content; padding-left: 60px;" type="button">IN</button>
    </div>
    
    <script type="text/javascript">
        function Ass4_ins()
          {
            $.ajax({url:"techresthourtime.php", success:function(result)
              {
                $("#Ass4_in").val(result);
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
                var tech_out = $('input[name=tech_out]').val();
                var tech_in = $('input[name=tech_in]').val();
                var Ass_1 = $('input[name=Ass_1]').val();
                var Ass1_out = $('input[name=Ass1_out]').val();
                var Ass1_in = $('input[name=Ass1_in]').val();
                var Ass_2 = $('input[name=Ass_2]').val();
                var Ass2_out = $('input[name=Ass2_out]').val();
                var Ass2_in = $('input[name=Ass2_in]').val();
                var Ass_3 = $('input[name=Ass_3]').val();
                var Ass3_out = $('input[name=Ass3_out]').val();
                var Ass3_in = $('input[name=Ass3_in]').val();
                var Ass_4 = $('input[name=Ass_4]').val();
                var Ass4_out = $('input[name=Ass4_out]').val();
                var Ass4_in = $('input[name=Ass4_in]').val();
                var resthour_id = $('input[name=resthour_id]').val();
                
                if(tech_out!='' || tech_out=='', 
                    tech_in!='' || tech_in=='',
                      Ass_1!='' || Ass_1=='', 
                   Ass1_out!='' || Ass1_out=='',
                    Ass1_in!='' || Ass1_in=='',
                      Ass_2!='' || Ass_2=='', 
                   Ass2_out!='' || Ass2_out=='',
                    Ass2_in!='' || Ass2_in=='',
                      Ass_3!='' || Ass_3=='', 
                   Ass3_out!='' || Ass3_out=='',
                    Ass3_in!='' || Ass3_in=='',
                      Ass_4!='' || Ass_4=='', 
                   Ass4_out!='' || Ass4_out=='',
                    Ass4_in!='' || Ass4_in=='',
                resthour_id!='' || resthour_id=='')

                  {
                    var formData = {tech_out: tech_out,
                                     tech_in: tech_in,
                                       Ass_1: Ass_1,
                                    Ass1_out: Ass1_out,
                                     Ass1_in: Ass1_in,
                                       Ass_2: Ass_2,
                                    Ass2_out: Ass2_out,
                                     Ass2_in: Ass2_in,
                                       Ass_3: Ass_3,
                                    Ass3_out: Ass3_out,
                                     Ass3_in: Ass3_in,
                                       Ass_4: Ass_4,
                                    Ass4_out: Ass4_out,
                                     Ass4_in: Ass4_in,
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