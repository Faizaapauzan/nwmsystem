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
  
  <div>
    <!-- To update company name, date and technician name into job info table -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['customer_name'])) { 
          $customer_name =$_POST['customer_name'];
          $query = "SELECT * FROM job_register 
                    WHERE customer_name ='$customer_name'
                    AND job_assign ='{$_SESSION['username']}' 
                    LIMIT 1";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="" method="post">

      <input type="hidden" name="storeDate" value="<?php echo $_SESSION['storeDate']; ?>">
      <input type="hidden" name="tech_name" value="<?php echo $_SESSION['username']; ?>">
      <input type="hidden" name="job_assign" value="<?php echo $_SESSION['username']; ?>">
      <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
      <input type="hidden" name="today_date" value="<?php echo $row['today_date'] ?>">

      <label>Departure Time</label>
      <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="Departure" name="technician_departure" aria-describedby="basic-addon2">
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
              
              <!-- change job status to doing -->
              <script type="text/javascript">
                  function doSomethingElse()
                    {
                      var job_status = $('input[name=job_status]').val();
                      var job_assign = $('input[name=job_assign]').val();
                      var customer_name = $('input[name=customer_name]').val();
                      var today_date = $('input[name=today_date]').val();
                      
                      if(job_status!='' || job_status=='',
                         job_assign!='' || job_assign=='',
                      customer_name!='' || customer_name=='',
                         today_date!='' || today_date=='')
                        {
                          var formData = {job_status: job_status,
                                          job_assign: job_assign,
                                       customer_name: customer_name,
                                          today_date: today_date};
                          
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

      <p class="control"><b id="message"></b></p>
      <div style="text-align: end;" class="updateBtn">
        <button style="width: fit-content;" type="button" id="update_tech" name="update_tech" value="Update" class="buttonbiru" onclick="submitForm();">Update</button>
      </div>     
      
    </form>
              <!-- insert departure input into database -->
              <script type="text/javascript">
                 function submitForm()
                   {
                    var storeDate = $('input[name=storeDate]').val();
                    var tech_name = $('input[name=tech_name]').val();
                    var customer_name = $('input[name=customer_name]').val();
                    var technician_departure = $('input[name=technician_departure]').val();
                    
                    if
                      (storeDate!='' || storeDate=='',
                       tech_name!='' || tech_name=='', 
                   customer_name!='' || customer_name=='', 
            technician_departure!='' || technician_departure=='')
                         
                         {
                          var formData = {storeDate:storeDate,
                                          tech_name:tech_name,
                                      customer_name:customer_name,
                               technician_departure:technician_departure};
                      
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

    <!-- To show travel time and rest hour -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['customer_name'])) { 
          $customer_name =$_POST['customer_name'];
          $query = "SELECT * FROM job_update 
                    WHERE customer_name ='$customer_name'
                    AND tech_name ='{$_SESSION['username']}'
                    AND storeDate ='{$_SESSION['storeDate']}'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="" method="post">

      <input type="hidden" name="jobupdate_id" value="<?php echo $row['jobupdate_id'] ?>">
      <label><?php echo $row['tech_name'] ?></label><br>
      <label><?php echo $row['storeDate'] ?></label><br>
      <label><?php echo $row['customer_name'] ?></label><br>

      <br>

      <label>Departure Time</label>
      <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>" aria-describedby="basic-addon2">
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
      
      <p class="control"><b id="messageupdate"></b></p>
      <div style="text-align: end;" class="updateBtn">
        <button style="width: fit-content;" type="button" id="update_tech" name="update_tech" value="Update" class="buttonbiru" onclick="jobupdate();">Update</button>
      </div>
    </form>
          
          <script type="text/javascript">
              function jobupdate()
                {
                  var technician_arrival = $('input[name=technician_arrival]').val();
                  var technician_leaving = $('input[name=technician_leaving]').val();
                  var tech_out = $('input[name=tech_out]').val();
                  var tech_in = $('input[name=tech_in]').val();
                  var jobupdate_id = $('input[name=jobupdate_id]').val();
                  
                  if
                      (technician_arrival!='' || technician_arrival=='',
                       technician_leaving!='' || technician_leaving=='', 
                                 tech_out!='' || tech_out=='', 
                                  tech_in!='' || tech_in=='',
                             jobupdate_id!='' || jobupdate_id=='')
                             
                             {
                              var formData = {technician_arrival:technician_arrival,
                                              technician_leaving:technician_leaving,
                                                        tech_out:tech_out,
                                                         tech_in:tech_in,
                                                    jobupdate_id:jobupdate_id};
                              $.ajax({
                                      url:'jobupdate.php',
                                      type:'POST',
                                      data: formData,
                                      success: function(response)
                                        {
                                          var res = JSON.parse(response);
                                          console.log(res);
                                          if(res.success == true)
                                          $('#messageupdate').html('<span style="color: green">Update Saved!</span>');
                                          else
                                          $('#messageupdate').html('<span style="color: red">Data Cannot Be Saved</span>');
                                        }
                                    });
                             }
                } 
          </script>
    
    <?php } } } ?>

</body>
</html>