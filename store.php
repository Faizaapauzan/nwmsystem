<?php

session_start();

if(!isset($_SESSION['username']))
	{	
    header("location:loginpage.php");
	}

    elseif($_SESSION['staff_position']== 'Storekeeper')
	{

	}

  else
	{
			header("location:loginpage.php");
	}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Storekeeper</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="store.css"rel="stylesheet" />
    <link href="tab.css"rel="stylesheet" />
    <!-- <script src="todostore.js" type="text/javascript" defer></script> -->

      <!--Boxicons link -->  
      <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
      <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

<style>

 .status {
  border-radius: 6px;
  font-size: 14px;
  padding: 2px 5px 2px 5px;
  text-align: center;
  margin-top: -30px;
  margin-left: 280px;
  font-weight: bold;
  font-family: "Times New Roman", Times, serif;
  float: right;
}  

.welcome {
  font-size:30px;
  font-family: "Garamond";
  font-variant: small-caps;
  color: #000099; 
  width: 100%;
  display: flex;
  justify-content: center;
}


.JobStatusUpdate select {
  margin-bottom: 15px;
  padding: 0 15px 0 15px;
  height: 25px;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 25px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  border-color: #081d45;
  margin-right: 10px;
}


.container {
  padding: 1%;
  display: flex;
  flex-direction: column;
  width: 100%;
  /* justify-content: space-around; */
  padding: 0 30px;
  margin-bottom: 20px;
}

.column {
  background: #f5f5f5;
  margin-right: 2%;
  padding: 1%;
  border-radius: 3px;
  width: 100%;
  float: left;
  height: auto;
}

.home-section nav {
  position: relative;
  left: 0px;
  height: 80px;
  background: #fff;
  padding: 0 20px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-size: 24px;
  font-weight: 500;
  width: 100%;
  white-space: nowrap;
}
</style>

</head>

<body>

    <!--Home navigation-->
    <section class="home-section">
        <nav>

            <div class="sidebar-button">
              <i class='bx bx-log-out'></i>
              <a href="logout.php">
                    <span class="dashboard">LOGOUT</span>
                </a>
            </div>

            <div class="welcome">Welcome <?php echo $_SESSION["username"] ?> !</div>

            <!-- <div class="notification-button">
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                </a>
            </div> -->
        </nav>
        
        <div class="container">
          <div class="column">
            <p class="column-title" id="todo">Todo</p>

               <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (accessories_required = 'Yes' AND job_status = ''
               OR
               job_assign = 'Nuraein' AND job_status = 'Incomplete'
               OR
                job_assign = 'Sau Hwe' AND job_status = 'Incomplete'
               OR
               job_assign = 'Nuraein' AND job_status = ''
               OR
               job_assign = 'Sau Hwe' AND job_status = '')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");

              while($row = $results->fetch_assoc()) {
              
              ?>

              <div class="cards">
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1" ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                 <p ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                  </p>
                </div>
              </div>

              <?php } ?>

            </div>
            
            <div class="column">
              <p class="column-title"id="pending" >Accessories Ready</p>

            <?php
              
              include 'dbconnect.php';
              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Nuraein' AND job_status = 'Ready'
              OR
              job_assign = 'Sau Hwe' AND job_status = 'Ready'
              OR
              accessories_required = 'Yes' AND job_status = 'Ready')
              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              while($row = $results->fetch_assoc()) {
              
              ?>

              <div class="cards" >
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1" ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                 <p ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="readyStatus">
                    <?php echo $row['job_status']?>
                    </div>
                  </p>
                </div>
              </div>

              <?php } ?>

            </div>
            
            <div class="column">
              <p class="column-title" id="done">Accessories Not Ready</p>

            <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (accessories_required = 'Yes' AND job_status = 'Not Ready'
              OR
              accessories_required = 'Yes' AND job_status = 'Pending'
              OR
              job_assign = 'Nuraein' AND job_status = 'Pending'
              OR
              job_assign = 'Sau Hwe' AND job_status = 'Pending')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              
              while($row = $results->fetch_assoc()) {
              
              ?>

              <div class="cards">
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1" ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                 <p ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="pendingStatus">
                    <?php echo $row['job_status']?>
                    </div>
                  </p>
                </div>
              </div>

              <?php } ?>


            </div>
          </div>
        </section>


 <!--Double click Todo Doing(Yellow)-->
<div id="doubleClick-1" class="modal">
    <div class="tabs" >
        <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
        <label for="tabDoingOne" class="tabHeading">Job Info</label>
        <div class="tab" id=jobInfoTabs>
            <div class="TechJobInfoTab">
                <div class="contentTechJobInfo">
                    <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                    <form action="ajaxtechnician.php" method="post">
                        <div class="tech-details">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
 <script type='text/javascript'>
    
    $(document).ready(function() {

    $('.card').click(function() {

    var jobregister_id = $(this).data('id');

    // AJAX request
    $.ajax({
    
        url: 'ajaxtechnician.php',
        type: 'post',
        data: {jobregister_id: jobregister_id},
        success: function(response) {
     // Add response in Modal body
        $('.tech-details').html(response);
    // Display Modal
        $('#doubleClick-1').modal('show');
        }
        });
         });
         });

         </script>
  

<input type="radio" name="tabDoing" id="tabDoingTwo">
<label for="tabDoingTwo" class="tabHeading"> Update </label>
<div class="tab">
    <div class="TechJobInfoTab">
        <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
            <form action="ajaxstoreupdate.php" method="post">
                <div class="storeupdate-details">

                </div>
            </form>
        </div>
    </div>
</div>

<script type='text/javascript'>

$(document).ready(function() {
    $('.card').click(function() {
        var jobregister_id = $(this).data('id');
        
        // AJAX request
        
        $.ajax({
            url: 'ajaxstoreupdate.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                // Add response in Modal body
                $('.storeupdate-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>

 <input type="radio" name="tabDoing" id="tabDoingThree" >
    <label for="tabDoingThree" class="tabHeading">Status</label>
<div class="tab">
    <div class="TechJobInfoTab">
        <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
            <form action="ajaxstorejobstatus.php" method="post">
                <div class="storejobstatus-details">

                </div>
            </form>
        </div>
    </div>
</div>

  <script type='text/javascript'>

$(document).ready(function() {
    $('.card').click(function() {
        var jobregister_id = $(this).data('id');
        
        // AJAX request
        
        $.ajax({
            url: 'ajaxstorejobstatus.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                // Add response in Modal body
                $('.storejobstatus-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>


</body>

</html>