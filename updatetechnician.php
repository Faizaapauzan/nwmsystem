<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $staffregister_id = $_POST['staffregister_id'];

    $query = "SELECT * FROM staff_register WHERE staffregister_id='$staffregister_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    
    $job_ability = $row['job_ability'];  
    $ability1 = explode("," ,  $job_ability)

?>
            <div class="container">
            <div class="jumbotron">
                
                    <div class="row">
                        <div class="updatetech">
                            <form action="updatetechnician.php" method="post">
                                <div class="staff-details">
                                <input type="hidden" name="staffregister_id" id="staffregister_id" value="<?php echo $row['staffregister_id'] ?>">
                                <div class="input-box">
                                    <label for=""> Full Name </label>
                                    <input type="text" name="staff_fullname" id="staff_fullname" class="form-control" value="<?php echo $row['staff_fullname'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Employee ID </label>
                                    <input type="text" name="employee_id" id="employee_id" class="form-control" value="<?php echo $row['employee_id'] ?>">
                                </div>
                                <fieldset>
                                <div class="input-box"> <label for=""> <h2>Rank</h2> </label></div>
                                <input type="radio" id="leader" name="technician_rank" value="1st Leader" <?php if($row['technician_rank'] == "1st Leader") { echo "checked"; }?>><label for="leader">1st Leader</label><br>
                                <input type="radio" id="assistantleader" name="technician_rank" value="2nd Leader" <?php if($row['technician_rank'] == "2nd Leader") { echo "checked"; }?>><label for="assistant">2nd Leader</label><br>  
                                </fieldset>

                                <fieldset>
                              <div class="input-box">
                                    <label for=""> <h2>Job Ability</h2> </label></div>
                                    <div class="row"> 
                                    <div class="col"> 
                                <input type="checkbox" id="ability" name="job_ability[]" value="WIRING" <?php if(in_array("WIRING", $ability1)) { echo "checked"; } ?>><label for="WIRING"> WIRING </label></div>
                                 <div class="col"> 
                                <input type="checkbox" id="ability" name="job_ability[]" value="PNEUMATIC / MECHANIC" <?php if(in_array("PNEUMATIC / MECHANIC", $ability1)) { echo "checked"; } ?>><label for="PNEUMATIC/MECHANIC"> PNEUMATIC / MECHANIC</label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="GLUEPOT" <?php if(in_array("GLUEPOT", $ability1)) { echo "checked"; } ?>><label for="GLUEPOT"> GLUEPOT </label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="PANEL SAW MAC" <?php if(in_array("PANEL SAW MAC", $ability1)) { echo "checked"; } ?>><label for="PANELSAWMAC"> PANEL SAW MAC </label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="EDGE BANDING MAC" <?php if(in_array("EDGE BANDING MAC", $ability1)) { echo "checked"; } ?>><label for="EDGEBANDINGMAC"> EDGE BANDING MAC </label><br></div>
                                <div class="col">  <input type="checkbox" id="ability" name="job_ability[]" value="JESH / CNC" <?php if(in_array("JESH / CNC", $ability1)) { echo "checked"; } ?>><label for="JESH/CNC"> JESH / CNC </label></div>
                                  <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="FINGER JOINT / UV" <?php if(in_array("FINGER JOINT / UV", $ability1)) { echo "checked"; } ?>><label for="FINGER JOINT/UV"> FINGER JOINT / UV </label></div>
                                <div class="col">  <input type="checkbox" id="ability" name="job_ability[]" value="LOADING / UNLOADING" <?php if(in_array("LOADING / UNLOADING", $ability1)) { echo "checked"; } ?>><label for="LOADINGUNLOADING"> LOADING / UNLOADING </label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="OTHERS" <?php if(in_array("OTHERS", $ability1)) { echo "checked"; } ?>><label for="OTHERS"> OTHERS </label></div>
                                <!-- <div class="col">  <input type="checkbox" id="vehicle2" name="job_ability[]" value="Car"><label for="vehicle2"> MAC </label></div> -->
                                </fieldset>
                                
                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
                                </form>

                        </div>
            </div>

                    <?php
                    if (isset($_POST['update'])) {
                        $staff_fullname = $_POST['staff_fullname'];
                        $employee_id = $_POST['employee_id'];
                        $technician_rank = $_POST['technician_rank'];
                        $job_ability = $_POST['job_ability'];

                        $ability=implode(",", $job_ability);
    {
     
        $query = "UPDATE staff_register SET staff_fullname='$staff_fullname', employee_id='$employee_id', technician_rank='$technician_rank', job_ability='$ability' WHERE staffregister_id='$staffregister_id'";
        $query_run = mysqli_query($connection, $query);
    }

                        // $query = "UPDATE staff_register SET staff_fullname='$staff_fullname', employee_id='$employee_id', technician_rank='$technician_rank', job_ability='$job_ability' WHERE staffregister_id='$staffregister_id'";
                        // $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            header("location:technicianlist.php");
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

                </div>
            </div>
        <?php
        }
    } else {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        
    <?php
    }
    ?>
