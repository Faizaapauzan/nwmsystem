<?php
session_start();
?>

<!DOCTYPE html>
<head>
<link href="css/ajaxtechupdate.css"rel="stylesheet" />
</head>

<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];


        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>
 <form id="techupdate_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

     <div class="input-box-departure">
            <label for="">Departure Time</label>
               <div class="technician-time">
            <input type="text" class="technician_departure" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>">
            <input type="button" value="Departure" onclick="test1()">
            <!-- <div class="alarm-button"><i class='bx bx-alarm' onclick="test1()"></i></div> -->
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
              </div>
        <div class="input-box-arrival">
            <label for="">Arrival Time</label>
            <div class="technician-time">
            <input type="text" class="technician_arrival" name="technician_arrival" id="arrival" value="<?php echo $row['technician_arrival']?>">
             <input type="button" value="Arrival" onclick="test2()">
            <!-- <div class="alarm-button"><i class='bx bx-alarm' onclick="test2()"></i></div> -->
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
             <!-- <div class="alarm-button"><i class='bx bx-alarm' onclick="test3()"></i></div> -->
            <!-- <button type="button" onclick="test3()" class="technician-time-butang">Leaving</button> -->
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

              <?php if (isset($_SESSION["username"])) ?>
              <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
              

            <div class="updateBtn">
            <p class="control"><b id="adminmessage"></b></p>
            <input type="button" id="update_tech" name="update_tech" value="Update" />
              <!-- <button type="submit" id="submit" name="update" class="btn btn-primary"> Update  </button> -->
            </div>           
</form>

<script>
    $(document).ready(function () {
        $('#update_tech').click(function () {
            var data = $('#techupdate_form').serialize() + '&update_tech=update_tech';
            $.ajax({
                url: 'techupdateindex.php',
                type: 'post',
                data: data,
                success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#adminmessage').html('<span style="color: green">Update Saved!</span>');
                        else
                          $('#adminmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
                      }
            });
        });
    });
</script>
     

           <?php
        }
    }
    ?>

                   <?php
            } ?>

     
     

    