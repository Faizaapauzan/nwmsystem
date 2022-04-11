<?php
session_start();
?>

<!DOCTYPE html>
<head>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/></script> 
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
                <div class="input-boxLocation" id="inputLocationBox">
                <label for="Location" class="details">Location</label>
                <div class="add_field_button1"><i class='bx bx-compass' onclick="getLocation()"></i></div>
                <textarea style="width: 290px; height: 40px; resize: none;" name="latitude" id="latitude" rows="2" cols="10" placeholder="Latitude"><?php echo $row['latitude'] ?></textarea>
                <textarea style="width: 290px; height: 40px; resize: none;" name="longitude" id="longitude" rows="2" cols="10" placeholder="Longitude"><?php echo $row['longitude'] ?></textarea>
              </div>
              

            <div class="updateBtn">
            <p class="control"><b id="mesg"></b></p>
            <input type="button" id="update_tech" name="update_tech" value="Update" />
              <!-- <button type="submit" id="submit" name="update" class="btn btn-primary"> Update  </button> -->
            </div>           
</form>

<script>
    var x = document.getElementById("latitude");
    var y = document.getElementById("longitude");
    console.log(x , y);
       function getLocation() {
         if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
         } else {
           x.innerHTML = "Geolocation is not supported by this browser.";
            y.innerHTML = "Geolocation is not supported by this browser.";
         }
       }

       function showPosition(position) {
        x.innerHTML = position.coords.latitude;
        y.innerHTML = position.coords.longitude;
       }

       </script>

<script>
    $(document).ready(function () {
        $('#update_tech').click(function () {
            var data = $('#techupdate_form').serialize() + '&update_tech=update_tech';
            $.ajax({
                url: 'techupdateindex.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#mesg').text(response);
                    $('#technician_departure').text('');
                    $('#technician_arrival').text('');
                    $('#technician_leaving').text('');
                    $('#latitude').text('');
                    $('#longitude').text('');
                   
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

     
     

    