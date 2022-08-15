<?php
session_start();
?>

<!DOCTYPE html>
<head>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
	<link href="css/ajaxtechupdate.css"rel="stylesheet" />
  
</script> 
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
 <form id="" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">

     <div class="input-box-departure">
            <label for="">Departure Time</label>
               <div class="technician-time">
            <input style="border-color: #081d45; border-radius: 3px;" type="text" class="technician_departure" id="Departure" name="technician_departure" value="<?php echo $row['technician_departure'] ?>" readonly>
          
            <!-- <div class="alarm-button"><i class='bx bx-alarm' onclick="test1()"></i></div> -->
                </div>
              </div>
        <div class="input-box-arrival">
            <label for="">Arrival Time</label>
            <div class="technician-time">
            <input style="border-color: #081d45; border-radius: 3px;" type="text" class="technician_arrival" name="technician_arrival" id="arrival" value="<?php echo $row['technician_arrival']?>" readonly>
            
            <!-- <div class="alarm-button"><i class='bx bx-alarm' onclick="test2()"></i></div> -->
                </div>
              </div>
        <div class="input-box-leaving">
            <label for="">Leaving Time</label>
            <div class="technician-time">
            <input style="border-color: #081d45; border-radius: 3px;" type="text" class="technician_leaving" name="technician_leaving" id="leaving" value="<?php echo $row['technician_leaving']?>" readonly >
            
    
                </div>
              </div>
     
              

               
</form>


           <?php
        }
    }
    ?>

                   <?php
            } ?>

     
     

    