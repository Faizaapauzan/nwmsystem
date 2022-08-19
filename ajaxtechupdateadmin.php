<?php
    session_start();
    $showDate = date("d.m.Y");
    $_SESSION['storeDate'] = $showDate;
?>

<!DOCTYPE html>
<head>
<link href="css/ajaxtechupdate.css"rel="stylesheet" />
</head>

<body>
  
  <div>
    <!-- To update company name, date and technician name into job info table -->
    <?php
        include 'dbconnect.php';
        if (isset($_POST['customer_name']) && isset($_POST['job_assign'])) { 
          $customer_name =$_POST['customer_name'];
          $job_assign =$_POST['job_assign'];
          $query = "SELECT * FROM job_register 
                    WHERE customer_name ='$customer_name'
                    AND job_assign ='$job_assign'
                    ORDER BY customer_name DESC LIMIT 1";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form style="margin-left: 20px;" action="" method="post">

      <input type="hidden" name="storeDate" value="<?php echo $_SESSION['storeDate']; ?>">
      <input type="hidden" name="tech_name" value="<?php echo $row['job_assign'] ?>">
      <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
      <input type="hidden" name="DateAssign" value="<?php echo $row['DateAssign'] ?>">
      
      <div class="input-box-departure">
        <label for="">Departure Time</label>
        <div class="technician-time">
          <input type="text" class="technician_departure" id="Departure" name="technician_departure">
          <input type="hidden" name="job_status" value="Doing">
          <input type="button" value="Departure" onclick="doSomething();doSomethingElse();">
          
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
                      var DateAssign = $('input[name=DateAssign]').val();
                      
                      if(job_status!='' || job_status=='',
                         job_assign!='' || job_assign=='',
                      customer_name!='' || customer_name=='',
                         DateAssign!='' || DateAssign=='')
                        {
                          var formData = {job_status:job_status,
                                          job_assign:job_assign,
                                       customer_name:customer_name,
                                          DateAssign:DateAssign};
                          
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
        
        <div class="updateBtn">
          <p style="margin-left: -26px;margin-top: -35px;" class="control"><b id="message"></b></p>
          <input type="button" id="update_tech" name="update_tech" onclick="submitForm();" style="margin-top: -30px; width: 101px; height: 38px; margin-left: 16px; padding-left: 20px;" value="Update"/>
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
        if (isset($_POST['customer_name']) && isset($_POST['job_assign'])) { 
          $customer_name =$_POST['customer_name'];
          $job_assign =$_POST['job_assign'];
          $query = "SELECT * FROM job_update 
                    WHERE customer_name ='$customer_name'
                    AND tech_name ='$job_assign'
                    AND storeDate ='{$_SESSION['storeDate']}' ORDER BY jobupdate_id DESC LIMIT 1";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="" method="post" style="margin-left: 20px;">

      <input type="hidden" name="jobupdate_id" value="<?php echo $row['jobupdate_id'] ?>">
      <label><?php echo $row['tech_name'] ?></label><br>
      <label><?php echo $row['storeDate'] ?></label><br>
      <label><?php echo $row['customer_name'] ?></label><br>

      <br>
      
      <div class="input-box-departure">
        <label for="">Departure Time</label>
        <div class="technician-time">
          <input type="text" class="technician_departure" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>">
        </div>
      </div>
      
      <div class="input-box-arrival">
        <label for="">Arrival Time</label>
        <div class="technician-time">
          <input type="text" class="technician_arrival" name="technician_arrival" id="arrival" value="<?php echo $row['technician_arrival']?>">
          <input type="button" value="Arrival" onclick="test2()">
            
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
      </div>
      
      <div class="input-box-leaving">
        <label for="">Leaving Time</label>
        <div class="technician-time">
          <input type="text" class="technician_leaving" name="technician_leaving" id="leaving" value="<?php echo $row['technician_leaving']?>">
          <input type="button" value="Leaving" onclick="test3()">
          
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
      </div>
      
      <div class="input-box-out">
        <label for="">Rest Hour</label>
        <div class="technician-time">
          <input type="text" class="technician_leaving" name="tech_out" id="tech_out" value="<?= $row['tech_out']; ?>">
          <input type="button" value="OUT" onclick="tech_outs()">
          
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
              
          <input type="text" class="technician_leaving" name="tech_in" id="tech_in" value="<?= $row['tech_in']; ?>">
          <input type="button" value="IN" onclick="tech_ins()">
          
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
      </div>
      
      <div class="updateBtn">
        <p style="margin-left: -26px;margin-top: -3px;" class="control"><b id="messageupdate"></b></p>
        <input type="button" id="update_tech" name="update_tech" onclick="jobupdate();" style="width: 101px; height: 38px; margin-left: -2px; padding-left: 20px;" value="Update" />
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