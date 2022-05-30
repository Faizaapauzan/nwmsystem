<?php
session_start();
?>



<!DOCTYPE html>
<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>NWM Technician Page</title>
	  <link href="css/ajaxtechupdate.css" rel="stylesheet" />
    <link href="css/technicianmain.css" rel="stylesheet" />
    <link href="main.css" rel="stylesheet" />

	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
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

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];


        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

 <form action="ajaxtechupdate.php" method="post">

    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

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

    <label for="Location" class="details">Location</label>
  <div class="input-boxLocation" id="inputLocationBox">
            
                <div class="add_field_button1"></div>
                <textarea style="width: 210px; height: 40px; resize: none;" name="latitude" id="latitude" rows="2" cols="10" placeholder="Latitude"><?php echo $row['latitude'] ?></textarea>
                <textarea style="width: 210px; height: 40px; resize: none;" name="longitude" id="longitude" rows="2" cols="10" placeholder="Longitude"><?php echo $row['longitude'] ?></textarea>
				
              </div>

			  <button type="button" onclick="getLocation()" class="buttonbiru">Click to Get Location</button>


        <?php if (isset($_SESSION["username"])) ?>
    <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
            
            <p class="control"><b id="message"></b></p>
            <div class="updateBtn">
              <button style="padding-left: 26px;" type="button" id="update_tech" name="update_tech" value="Update" class="buttonbiru" onclick="submitForm();">Update</button>
      
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

<script type="text/javascript">

            function submitForm()
              {
                var technician_departure = $('input[name=technician_departure]').val();
                var technician_arrival = $('input[name=technician_arrival]').val();
                var technician_leaving = $('input[name=technician_leaving]').val();
                var latitude = $('textarea[name=latitude]').val();
                var longitude = $('textarea[name=longitude]').val();
                var jobregisterlastmodify_by = $('input[name=jobregisterlastmodify_by]').val();
                var jobregister_id = $('input[name=jobregister_id]').val();
                
                if(technician_departure!='' || technician_departure=='', 
                   technician_arrival!='' || technician_arrival=='', 
                   technician_leaving!='' || technician_leaving=='', 
                   latitude!='' || latitude=='', 
                   longitude!='' || longitude=='',
                   jobregisterlastmodify_by!='' || jobregisterlastmodify_by=='',
                   jobregister_id!='' || jobregister_id=='')

                  {
                    var formData = {technician_departure: technician_departure,
                                    technician_arrival: technician_arrival,
                                    technician_leaving: technician_leaving,
                                    latitude: latitude,
                                    longitude: longitude,
                                    jobregisterlastmodify_by: jobregisterlastmodify_by,
                                    jobregister_id: jobregister_id};
                                    
                    $.ajax({
                            url: "techupdateindex.php", 
                            type: 'POST', 
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
     
           <?php
        }
    }
    ?>

                   <?php
            } ?>

     

</body>