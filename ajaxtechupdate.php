<?php session_start(); ?>

<!DOCTYPE html>

<head>
  <meta name="keywords" content=""/>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
  <title>Job Update</title>
  <link href="css/technicianmain.css" rel="stylesheet" />
  <link href="main.css" rel="stylesheet" />
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/testing.js" type="text/javascript"></script>
</head>

<style>
  .status{
    float:none;
  }
</style>

<body>
    
    <?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, 'nwmsystem');
        
        if (isset($_POST['customer_name'])) {
          $customer_name =$_POST['customer_name'];
      
          $query = "SELECT * FROM job_update WHERE customer_name ='$customer_name'";
          $query_run = mysqli_query($connection, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="ajaxtechupdate.php" method="post">
      <input type="hidden" name="customer_name" class="customer_name" value="<?php echo $row['customer_name'] ?>">
      <label>Departure Time</label>
      <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="buttonbiru" onclick="test1()" type="button">Departure</button>
        </div>
        
        <script type="text/javascript">
          function test1()
            {
              $.ajax({url:"departureTime.php", success:function(result)
                {
                  $("#Departure").val(result);
                }
              })
            }
        </script>
        
      </div>
      
      <label>Arrival Time</label>
      <div class="input-group mb-3">
        <input readonly type="text" class="form-control" name="technician_arrival" id="arrival" value="<?php echo $row['technician_arrival']?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button style="padding-left: 64px;" class="buttonbiru" onclick="test2()" type="button">Arrival</button>
        </div>
        
        <script type="text/javascript">
          function test2()
            {
              $.ajax({url:"departureTime.php", success:function(result)
                {
                  $("#arrival").val(result);
                }
              })
            }
        </script>
        
      </div>
      
      <label>Leaving Time</label>
      <div class="input-group mb-3">
        <input readonly type="text" class="form-control" name="technician_leaving" id="leaving" value="<?php echo $row['technician_leaving']?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button style="padding-left: 51px;" class="buttonbiru" onclick="test3()" type="button">Leaving</button>
        </div>
        
        <script type="text/javascript">
          function test3()
            {
              $.ajax({url:"departureTime.php", success:function(result)
                {
                  $("#leaving").val(result);
                }
              })
            }
        </script>
        
      </div>
      
      <p class="control"><b id="message"></b></p>
      <div style="text-align: end;" class="updateBtn">
      <button style="width: fit-content;" type="button" id="update_tech" name="update_tech" value="Update" class="buttonbiru" onclick="submitForm();">Update</button>
      </div>
    </form>
    
    <script type="text/javascript">
      function submitForm()
        {
          var technician_departure = $('input[name=technician_departure]').val();
          var technician_arrival = $('input[name=technician_arrival]').val();
          var technician_leaving = $('input[name=technician_leaving]').val();
          var customer_name = $('input[name=customer_name]').val();
          var today_date = $('input[name=today_date]').val();
          var jobregister_id = $('input[name=jobregister_id]').val();
          
          if
            (technician_departure!='' || technician_departure=='',
               technician_arrival!='' || technician_arrival=='',
               technician_leaving!='' || technician_leaving=='', 
                    customer_name!='' || customer_name=='',
                       today_date!='' || today_date=='',
                   jobregister_id!='' || jobregister_id=='')
              
             {
              var formData = {technician_departure: technician_departure,
                                technician_arrival: technician_arrival,
                                technician_leaving: technician_leaving,
                                     customer_name: customer_name,
                                        today_date: today_date,
                                    jobregister_id: jobregister_id};
                                    
                                    $.ajax({
                                      url:'techupdateindex.php',
                                      type:'POST',
                                      data:formData,
                                      success: function(response)
                                        {
                                          var res = JSON.parse(response);
                                          console.log(res);
                                          if(res.success == true)
                                          $('#message').html('<span style="color: green">Update Saved!</span>');
                                          else
                                          $('#message').html('<span style="color: red">Data Cannot Be Saved</span>');
                                        }
                                      });
                                    }
                                  } 
    </script>
    
    <?php } } ?>

    <?php } ?>

    <!-- Technician Rest hour -->
    <form id="updateResthour" method="post">
      <br>
      <p class="column-title" id="technician" >Rest Hour</p>
      
      <?php
        include 'dbconnect.php';
        $results = $conn->query("SELECT * FROM job_update WHERE customer_name ='$customer_name'");
        while($row = $results->fetch_assoc()) {
      ?>
      
    <!-- technician -->
    <input type="hidden" name="jobupdate_id" class="jobupdate_id" value="<?php echo $row['jobupdate_id'] ?>">
    <div style=" position: static;" class="input-group mb-3">
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
    
    <div style="position: static;" class="input-group mb-3">
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
    
    <p class="control"><b id="message-update"></b></p>
    <div style="text-align: end;" class="updateBtn">
      <button style="width: fit-content;" type="button" id="update_resthour" name="update_resthour" value="Update" class="buttonbiru" onclick="updateForm();">Update</button>
    </div>
  
    </form>
    
    <?php } ?>
    
    <!-- Script to save IN and OUT -->
    <script type="text/javascript">
      function updateForm()
        {
          var tech_out = $('input[name=tech_out]').val();
          var tech_in = $('input[name=tech_in]').val();
          var jobupdate_id  = $('input[name=jobupdate_id]').val();
          
          if  
            (tech_out!='' || tech_out=='',
              tech_in!='' || tech_in=='',
         jobupdate_id!='' || jobupdate_id=='')
            {
              var formData = {tech_out: tech_out,
                               tech_in: tech_in,
                               jobupdate_id: jobupdate_id};
                        
                        $.ajax({
                                  url:"techupdateresthour.php",
                                  type:'POST',
                                  data: formData,
                                  success: function(response)
                                {
                                  var res = JSON.parse(response);
                                  console.log(res);
                                  if(res.success == true)
                                  $('#message-update').html('<span style="color: green">Rest Hour Updated!</span>');
                                  else
                                  $('#message-update').html('<span style="color: red">Rest Hour Cannot Be Update</span>');
                                }
                               });
            }
        } 
    </script>
    <!-- Script to save IN and OUT -->
    <!-- End of Technician Rest Hour -->

</body>
</html>