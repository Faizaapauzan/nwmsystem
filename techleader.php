<?php

session_start();

if(!isset($_SESSION['username']))
	{	
    header("location:loginpage.php");
	}

    elseif($_SESSION['staff_position']== 'technician')
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
    <title>NWM Technician Page</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/tech.css"rel="stylesheet" />
    <link href="css/technicianone.css"rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Boxicons link -->  
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
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
           <div class="sidebar-button">
            <i class='bx bx-detail'></i>
            <a href="techleaderjoblisting.php">
                  <span class="dashboard">JOB LISTING</span>
              </a>
          </div>

          <div class="welcome">Welcome <?php echo $_SESSION["username"] ?> !</div>
<!-- 
            <div class="notification-button">
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
              (job_assign = 'Technician Group 1' AND job_status = ''
               OR
               job_assign = 'Technician Group 1' AND job_status = 'Doing'
               OR
               job_assign = 'Technician Group 1' AND job_status = 'Ready'
               OR
               job_assign = 'Technician Group 1' AND job_status = 'Incomplete'
               OR
               job_assign = 'Technician Group 2' AND job_status = ''
               OR
               job_assign = 'Technician Group 2' AND job_status = 'Doing'
               OR
               job_assign = 'Technician Group 2' AND job_status = 'Ready'
               OR
               job_assign = 'Technician Group 2' AND job_status = 'Incomplete'
               OR
               job_assign = 'Technician Group 3' AND job_status = ''
               OR
               job_assign = 'Technician Group 3' AND job_status = 'Doing'
               OR
               job_assign = 'Technician Group 3' AND job_status = 'Ready'
               OR
               job_assign = 'Technician Group 3' AND job_status = 'Incomplete')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");

              while($row = $results->fetch_assoc()) {
              
              ?>

              <div class="cards">
              <div class="card" id="notYetStatus" draggable="true" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  onchange="dragDrop()" ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <p ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="toDoStatus">
                    <?php echo $row['job_status']?>
                    </div>
                  </p>
                </div>
              </div>

              <?php } ?>
            
            </div>
  
            <div class="column" >
              <p class="column-title"id="pending" >Pending</p>

             <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Technician Group 1' AND job_status = 'Pending'
               OR
               job_assign = 'Technician Group 2' AND job_status = 'Pending'
               OR
               job_assign = 'Technician Group 3' AND job_status = 'Pending')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              
              while($row = $results->fetch_assoc()) {
                  
              ?>

              <div class="cards" >
              <div class="card" id="notYetStatus" draggable="true" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  onchange="dragDrop()" ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
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

          
            <div class="column">
              <p class="column-title" id="done">Complete</p>
              
               <?php
              
              include 'dbconnect.php';
              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Technician Group 1' AND job_status = 'Completed'
               OR
               job_assign = 'Technician Group 2' AND job_status = 'Completed'
               OR
               job_assign = 'Technician Group 3' AND job_status = 'Completed')
              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              while($row = $results->fetch_assoc()) {
                
              ?>

              <div class="cards"  >
              <div class="card" id="notYetStatus" draggable="true" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  onchange="dragDrop()" ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <p ondblclick="document.getElementById('doubleClick-1').style.display='block'" >
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="completedStatus">
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
  <div class="tabs">

    <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
  <label for="tabDoingOne" class="tabHeading">Job Info</label>
  <div class="tab" id=jobInfoTabs>
      <div class="TechJobInfoTab">
          <div class="contentTechJobInfo">
              <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
             <form action="" method="post">
              <div class="tech-details">
             
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
    <label for="tabDoingTwo" class="tabHeading">Update</label>
    <div class="tab" id=jobInfoTabs>
    <div class="TechJobInfoTab">
        <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
            <form action="ajaxtechupdate.php" method="post">
                <div class="techupdate-details">

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
            url:'ajaxtechupdate.php',
            type:'post',
            data:{jobregister_id: jobregister_id},
            success: function(response) {
              // Add response in Modal body
              $('.techupdate-details').html(response);
              // Display Modal
              $('#doubleClick-1').modal('show');
            }
          });
        });
      });
      
      </script>
          <input type="radio" name="tabDoing" id="tabDoingSix">
    <label for="tabDoingSix" class="tabHeading"> Remarks </label>
    <div class="tab">
      <div class="TechJobInfoTab">
          <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
            <form action="ajaxremarks.php" method="post">
                <div class="remark-details">
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
            url: 'ajaxremarks.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                
                // Add response in Modal body
                $('.remark-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>
      
       <input type="radio" name="tabDoing" id="tabDoingFour">
    <label for="tabDoingFour" class="tabHeading"> Accessories </label>
    <div class="tab">
      <div class="TechJobInfoTab">
          <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
            <form action="ajaxtabaccessoriestech.php" method="post">
                <div class="acc-details">
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
            url: 'ajaxtabaccessoriestech.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                
                // Add response in Modal body
                $('.acc-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>
<input type="radio" name="tabDoing" id="tabDoingThree">
    <label for="tabDoingThree" class="tabHeading"> Photo </label>
    <div class="tab">
      <div class="TechJobInfoTab">
          <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
          <form action="ajaxtechphtoupdt.php" method="post">
              <div class="photo-details">
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
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                
                // Add response in Modal body
                $('.photo-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>

      <input type="radio" name="tabDoing" id="tabDoingFive">
    <label for="tabDoingFive" class="tabHeading">Job Status</label>
    <div class="tab" id=jobInfoTabs>
    <div class="TechJobInfoTab">
        <div class="contentTechJobInfo">
            <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
            <form action="ajaxtechjobstatus.php" method="post">
                <div class="techjobstatus-details">

                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<script type='text/javascript'>

$(document).ready(function() {
    $('.card').click(function() {
        var jobregister_id = $(this).data('id');
        
        // AJAX request
        
        $.ajax({
            url: 'ajaxtechjobstatus.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                // Add response in Modal body
                $('.techjobstatus-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>

</body>
</html>