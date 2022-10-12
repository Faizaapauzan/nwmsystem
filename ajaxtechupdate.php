<?php
    session_start();
    $showDate = date("d.m.Y");
    $_SESSION['storeDate'] = $showDate;
?>

<!DOCTYPE html>
<head>
  <meta name="keywords" content=""/>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
  <title>Job Update</title>
  <link href="css/technicianmain.css" rel="stylesheet"/>
  <link href="main.css" rel="stylesheet"/>
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
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) { 
          $jobregister_id =$_POST['jobregister_id'];
       
          $query = "SELECT * FROM job_register 
                    WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>

        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

    <?php } } } ?>

    <?php
        include 'dbconnect.php';
         if (isset($_POST['jobregister_id'])) { 
          $jobregister_id =$_POST['jobregister_id'];
      
          $query = "SELECT * FROM job_register 
                    WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="" method="post">

        
      <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
      <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
      <input type="hidden" name="job_assign" value="<?php echo $row['job_assign'] ?>">

      <label><?php echo $row['job_assign'] ?></label><br>
      <label><?php echo $row['customer_name'] ?></label><br>

      <br>

           <?php
                date_default_timezone_set("Asia/Kuala_Lumpur");
                $ArrivalDateTime = date('d-m-Y g:i A');
                $_SESSION['arrivaltime'] = $ArrivalDateTime; 
           ?>

      <label>Departure Time</label>
      <input type="hidden" name="technician_departure" value="<?php echo $_SESSION["arrivaltime"] ?>">
      <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="Departure" value="<?php echo $row['technician_departure']?>" aria-describedby="basic-addon2">
        <input type="hidden" name="job_status" value="Doing">
        <div class="input-group-append">
          <button id="update_techstatus" name="update_techstatus" class="buttonbiru update" onclick="doSomething();doSomethingElse();departureTechnician();" type="button">Departure</button>
        </div>
      
              <script type="text/javascript">
                  function doSomething()
                  {
                    $.ajax({url:"departureTime.php", success:function(result)
                      {
                        $("#Departure").val(result);
                      }
                    })
                  }
              </script>
              
              <!-- change job status to doing -->
              <script type="text/javascript">
                  function doSomethingElse()
                    {
                      var job_status = $('input[name=job_status]').val();
                      var job_assign = $('input[name=job_assign]').val();
                      var customer_name = $('input[name=customer_name]').val();
                      var requested_date = $('input[name=requested_date]').val();
                      
                      if(job_status!='' || job_status=='',
                         job_assign!='' || job_assign=='',
                      customer_name!='' || customer_name=='',
                     requested_date!='' || requested_date=='')
                        {
                          var formData = {job_status:job_status,
                                          job_assign:job_assign,
                                       customer_name:customer_name,
                                       requested_date:requested_date};
                          
                          $.ajax({
                                    url: "changeStatus.php",
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

                    <script type="text/javascript">

                  function departureTechnician()
                    {
                      var technician_departure = $('input[name=technician_departure]').val();
                      var storeDate = $('input[name=storeDate]').val();
                      var jobupdate_id = $('input[name=jobupdate_id]').val();
                      
                      
                      if(technician_departure!='' || technician_departure=='',
                         storeDate!='' || storeDate=='',
                         jobupdate_id!='' || jobupdate_id=='')
                        {
                          var formData = {technician_departure:technician_departure,
                                          storeDate:storeDate,
                                          jobupdate_id:jobupdate_id};
                          
                          $.ajax({
                                    url: "departureupdate.php",
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
      
      </div>


      <label>Arrival Time</label>
      <input type="hidden" name="technician_arrival" value="<?php echo $_SESSION["arrivaltime"] ?>">
      <div class="input-group mb-3">
      <input readonly type="text" class="form-control" id="arrival" value="<?php echo $row['technician_arrival']?>" aria-describedby="basic-addon2">
      <div class="input-group-append">
      <button style="padding-left: 64px;" id="arrivaltechnician" class="buttonbiru" onclick="ArrivalTime();arrivalTechnician();" type="button">Arrival</button>
        </div>

           <script type="text/javascript">
                  function ArrivalTime()
                    {
                      $.ajax({url:"departureTime.php", success:function(result)
                        {
                          $("#arrival").val(result);
                        }
                      })
                    }
              </script>


         <script type="text/javascript">

                  function arrivalTechnician()
                    {
                      var technician_arrival = $('input[name=technician_arrival]').val();
                      var jobupdate_id = $('input[name=jobupdate_id]').val();
                      
                      
                      if(technician_arrival!='' || technician_arrival=='',
                         jobupdate_id!='' || jobupdate_id=='')
                        {
                          var formData = {technician_arrival:technician_arrival,
                                          jobupdate_id:jobupdate_id};
                          
                          $.ajax({
                                    url: "arrivalupdate.php",
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

             

            
      </div>
      
      <label>Leaving Time</label>
      <input type="hidden" name="technician_leaving" value="<?php echo $_SESSION["arrivaltime"] ?>">
      <div class="input-group mb-3">
        <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        <input readonly type="text" class="form-control" id="leaving" value="<?php echo $row['technician_leaving']?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button style="padding-left: 51px;" class="buttonbiru" onclick="test3();leavingTechnician();" type="button">Leaving</button>
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

                            <script type="text/javascript">
                  function leavingTechnician()
                    {
                      var technician_leaving = $('input[name=technician_leaving]').val();
                      var jobupdate_id = $('input[name=jobupdate_id]').val();
                      
                      
                      if(technician_leaving!='' || technician_leaving=='',
                         jobupdate_id!='' || jobupdate_id=='')
                        {
                          var formData = {technician_leaving:technician_leaving,
                                          jobupdate_id:jobupdate_id};
                          
                          $.ajax({
                                    url: "leavingupdate.php",
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


      </div>

                 <?php
     date_default_timezone_set("Asia/Kuala_Lumpur");
        $RestTime = date('g:i A');
        $_SESSION['resttime'] = $RestTime; 
    ?>
      
      <label>Rest Hour</label>
      <input type="hidden" name="tech_out" value="<?php echo $_SESSION["resttime"] ?>">
      <div class="input-group mb-3">
        <input readonly type="text" style="position: static;" class="form-control" id="tech_out"  value="<?= $row['tech_out']; ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="buttonbiru" onclick="tech_outs();RestOut();" style="position: static; width: fit-content;" type="button">OUT</button>
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

                <script type="text/javascript">
                  function RestOut()
                    {
                      var tech_out = $('input[name=tech_out]').val();
                      var jobupdate_id = $('input[name=jobupdate_id]').val();
                      
                      
                      if(tech_out!='' || tech_out=='',
                         jobupdate_id!='' || jobupdate_id=='')
                        {
                          var formData = {tech_out:tech_out,
                                          jobupdate_id:jobupdate_id};
                          
                          $.ajax({
                                    url: "techoutupdate.php",
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
        
      </div>
      
      <div class="input-group mb-3">
        <input type="hidden" name="tech_in" value="<?php echo $_SESSION["resttime"] ?>">
        <input readonly type="text" style="position: static;" class="form-control" id="tech_in"  value="<?= $row['tech_in']; ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="buttonbiru" onclick="tech_ins(); RestIn();" style="position: static; width: fit-content; padding-left: 55px;" type="button">IN</button>
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

                      function RestIn()
                    {
                      var tech_in = $('input[name=tech_in]').val();
                      var jobupdate_id = $('input[name=jobupdate_id]').val();
                      
                      
                      if(tech_in!='' || tech_in=='',
                         jobupdate_id!='' || jobupdate_id=='')
                        {
                          var formData = {tech_in:tech_in,
                                          jobupdate_id:jobupdate_id};
                          
                          $.ajax({
                                    url: "techinupdate.php",
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


        
      </div>
      
      <!-- <p class="control"><b id="messageupdate"></b></p>
      <div style="text-align: end;" class="updateBtn">
        <button style="width: fit-content;" type="button" id="update_tech" name="update_tech" value="Update" class="buttonbiru" onclick="jobupdate();">Update</button>
      </div> -->
    </form>
          

    
    <?php } } } ?>

</body>
</html>