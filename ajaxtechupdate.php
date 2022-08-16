<?php session_start(); ?>

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

/* #updatejob{
  display: none;
} */
</style>

<body>
  
  <div>
    <!-- To select company name from job register table -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) { 
          $jobregister_id =$_POST['jobregister_id'];
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <label><?php echo $row['job_assign'] ?></label>
    <input type="hidden" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <div class="input-group mb-3">
      <input readonly type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="customer_name" value="<?php echo $row['customer_name'] ?>">
    </div>

    <div class="input-group mb-3">
      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="today_date" value="<?php echo $row['today_date'] ?>">
    </div>
    
    <div style="text-align: end;" class="updateBtn">
      <button style="width: fit-content;" type="button" id="jobupdate" name="jobupdate" class="buttonbiru" onclick="JobUpdate();">Verify</button>
    </div>
    
          <script type="text/javascript">
              function JobUpdate()
                  {
                    var customer_name = $('input[name=customer_name]').val();
                    var today_date = $('input[name=today_date]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    
                    if(customer_name!='' || customer_name=='',
                          today_date!='' || today_date=='',
                      jobregister_id!='' || jobregister_id=='')
                      {
                        var formData = {customer_name: customer_name,
                                           today_date: today_date,
                                       jobregister_id: jobregister_id};
                        
                        $.ajax({
                                  url:'jobupdate.php',
                                  type: 'POST',
                                  data: formData,
                                  success: function(response)
                                    {
                                      var res = JSON.parse(response);
                                      console.log(res);
                                      if(res.success == true)
                                      location.reload('#updatejob');
                                      else
                                      $('#message-update').html('<span style="color: red">Data Cannot Be Saved</span>');
                                    }
                                });
                      }
                  } 
          </script>
    
    <?php } } } ?>
    
    <!-- To update travel time and rest hour -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id']) && isset($_POST['jobregister_id'])) { 
          $jobregister_id =$_POST['jobregister_id'];
          $query = "SELECT * FROM job_update WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <div id="updatejob">
    <form action="" method="post">
    <input type="hidden" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="jobupdate_id" value="<?php echo $row['jobupdate_id'] ?>">
        <label>Departure Time</label>
        <div class="input-group mb-3">
          <input readonly type="text" class="form-control" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>" aria-describedby="basic-addon2">
          <input type="hidden" name="job_status" value="Doing">
          <div class="input-group-append">
            <button id="update_techstatus" name="update_techstatus" class="buttonbiru update" onclick="doSomething();doSomethingElse();" type="button">Departure</button>
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
            
            <script type="text/javascript">
                function doSomethingElse()
                  {
                    var job_status = $('input[name=job_status]').val();
                    var jobregister_id = $('input[name=jobregister_id]').val();
                    if(job_status!='' || job_status=='',
                    jobregister_id!='' || jobregister_id=='')
                      {
                        var formData = {job_status: job_status,
                                    jobregister_id: jobregister_id};
                                    
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

        <label>Rest Hour</label>
        <div class="input-group mb-3">
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

        <div class="input-group mb-3">
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
        
        <p class="control"><b id="message"></b></p>
            <div style="text-align: end;" class="updateBtn">
              <button style="width: fit-content;" type="button" id="update_tech" name="update_tech" value="Update" class="buttonbiru" onclick="submitForm();">Update</button>
            </div>
      </form>
      </div>
      
      <script type="text/javascript">
        function submitForm()
          {
            var technician_departure = $('input[name=technician_departure]').val();
            var technician_arrival = $('input[name=technician_arrival]').val();
            var technician_leaving = $('input[name=technician_leaving]').val();
            var tech_out = $('input[name=tech_out]').val();
            var tech_in = $('input[name=tech_in]').val();
            var jobupdate_id = $('input[name=jobupdate_id]').val();
            
            if
              (technician_departure!='' || technician_departure=='',
                 technician_arrival!='' || technician_arrival=='', 
                 technician_leaving!='' || technician_leaving=='', 
                           tech_out!='' || tech_out=='',
                            tech_in!='' || tech_in=='',
                       jobupdate_id!='' || jobupdate_id=='')

                     {
                      var formData = {technician_departure: technician_departure,
                                        technician_arrival: technician_arrival,
                                        technician_leaving: technician_leaving,
                                                  tech_out: tech_out,
                                                   tech_in: tech_in,
                                              jobupdate_id: jobupdate_id};
                      
                      $.ajax({
                                url:'techupdateindex.php',
                                type:'POST',
                                data: formData,
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

<?php } } } ?>

</body>
</html>