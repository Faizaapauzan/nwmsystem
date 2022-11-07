<?php
    session_start();
    $storeDate = date("d-m-Y");
    $_SESSION['storeDate'] = $storeDate;
    

?>

<!DOCTYPE html>
<head>
<link href="css/ajaxtechupdate.css"rel="stylesheet" />
</head>

<body>

    <!-- To open ajax -->
        <?php
        include 'dbconnect.php';
        if (isset($_POST['jobregister_id'])) { 
          $jobregister_id =$_POST['jobregister_id'];
        
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>

      <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
      <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
      <input type="hidden" name="job_assign" value="<?php echo $row['job_assign'] ?>">
      <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
      <input type="hidden" name="today_date" value="<?php echo  $_SESSION['storeDate'] ?>">
      
    <?php } } } ?>

    <!-- To update travel time and rest hour -->
    <?php
        include 'dbconnect.php';
         if (isset($_POST['jobregister_id'])) { 
          $jobregister_id =$_POST['jobregister_id'];
        
          $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
          $query_run = mysqli_query($conn, $query);
          if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form id="formStatus" action="" method="post" style="margin-left: 20px;">

    <input type="hidden" name="job_status" value="Doing">
    <input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>">
    <input type="hidden" name="job_assign" value="<?php echo $row['job_assign'] ?>">
    <input type="hidden" name="requested_date" value="<?php echo $row['requested_date'] ?>">
    <input type="hidden" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
     
      <label><?php echo $row['job_assign'] ?></label><br>
      <label><?php echo $row['customer_name'] ?></label><br>

      <br>
      
      <div class="input-box-departure">
        <label for="">Departure Time</label>
        <div class="technician-time">
          <input type="text" class="technician_departure" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure']?>">
          
          <input type="button" id="status" value="Departure" onclick="doSomething();">
          
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

               <script>
    $(document).ready(function () {
        $('#status').click(function () {
            var data = $('#formStatus').serialize() + '&status=status';
            $.ajax({
                url: 'changeStatus.php',
                type: 'post',
                data: data,
                success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                       
                      }
            });
        });
    });
</script>
              
            
              
            </div>
          </div>
      
      <div class="input-box-arrival">
        <label for="">Time at site</label>
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
        <label for="">Return time</label>
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
        <div class="out-time" style="display: flex; align-items: baseline;">
          <input type="text" class="technician_leaving" name="tech_out" id="tech_out" value="<?= $row['tech_out']; ?>">
          <input style="background-color: #1a0845; color: white; width: 216px;" type="button" value="OUT" onclick="tech_outs(); RestOut2()">
          
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
                function RestOut2()
                {
                  var tech_out = $('input[name=tech_out]').val();
                  var technician = $('input[name=job_assign]').val();
                  var today_date = $('input[name=today_date]').val();
                  
                  if(tech_out!='' || tech_out=='',
                  technician!='' || technician=='',
                  today_date!='' || today_date=='')
                 
                 {
                  var formData = {tech_out:tech_out,
                                technician:technician,
                                today_date:today_date};
                  
                  $.ajax({
                            url: "techoutupdate2.php",
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
        <div class="in-time" style="display: flex; align-items: baseline;">
          <input type="text" class="technician_leaving" name="tech_in" id="tech_in" value="<?= $row['tech_in']; ?>">
          <input style="background-color: #1a0845; color: white; width: 216px;" type="button" value="IN" onclick="tech_ins();">
          
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

      <?php
          date_default_timezone_set("Asia/Kuala_Lumpur");
    $RestTime = date('g:i A');
    $_SESSION['resttime'] = $RestTime; 
      ?>

      <input type="hidden" name="technician_in" value="<?php echo $_SESSION["resttime"] ?>">  
        <input type="hidden" name="job_assign" value="<?php echo $row['job_assign'] ?>"> 
        <input type="hidden" name="today_date" value="<?php echo  $_SESSION['storeDate'] ?>">
      <p class="control"><b id="messageupdate"></b></p>
      <div class="updateBtn">
      
      <input style="height: 36px; margin-left: 20px; margin-right: 43px; font-size: 15px;" type="button" id="update_time" onclick="RestIn2();" name="update_time" value="Update" />
      </div>
    
    </form>
          
          <script>
      $(document).ready(function () {
      $('#update_time').click(function () {
        var data = $('#formStatus').serialize() + '&update_time=update_time';
        $.ajax({
                  url: 'jobupdate.php',
                  type: 'post',
                  data: data,
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
      });
      });
  </script>

   <script type="text/javascript">
                   function RestIn2()
                  {
                    var technician_in = $('input[name=technician_in]').val();
                    var technician = $('input[name=job_assign]').val();
                    var today_date = $('input[name=today_date]').val();
                    
                    if(technician_in!='' || technician_in=='',
                    technician!='' || technician=='',
                    today_date!='' || today_date=='')
                  
                  {
                    var formData = {technician_in:technician_in,
                                 technician:technician,
                                 today_date:today_date};
                    
                    $.ajax({
                              url: "techinupdate2.php",
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
        


    <?php } } } ?>

</body>
</html>