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
                                    <div class="row" style="margin-right: -22px; margin-left: -6px;"> 
                                    <div class="col"> 
                                <input type="checkbox" id="ability" name="job_ability[]" value="Wiring" <?php if(in_array("Wiring", $ability1)) { echo "checked"; } ?>><label for="WIRING"> Wiring </label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="Pneumatic" <?php if(in_array("Pneumatic", $ability1)) { echo "checked"; } ?>><label for="PNEUMATIC"> Pneumatic</label></div>
                                  <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="Mechanic" <?php if(in_array("Mechanic", $ability1)) { echo "checked"; } ?>><label for="MECHANIC"> Mechanic</label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="Gluepot" <?php if(in_array("Gluepot", $ability1)) { echo "checked"; } ?>><label for="GLUEPOT"> Gluepot </label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="Panel Saw" <?php if(in_array("Panel Saw", $ability1)) { echo "checked"; } ?>><label for="PANELSAWMAC"> Panel Saw </label></div>
                                 <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="Edge Banding" <?php if(in_array("Edge Banding", $ability1)) { echo "checked"; } ?>><label for="EDGEBANDINGMAC"> Edge Banding </label><br></div>
                                <div class="col">  <input type="checkbox" id="ability" name="job_ability[]" value="Jesh" <?php if(in_array("Jesh", $ability1)) { echo "checked"; } ?>><label for="JESH"> Jesh </label></div>
                                <div class="col">  <input type="checkbox" id="ability" name="job_ability[]" value="CNC" <?php if(in_array("CNC", $ability1)) { echo "checked"; } ?>><label for="CNC"> CNC </label></div>
                                  <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="Finger Joint" <?php if(in_array("Finger Joint", $ability1)) { echo "checked"; } ?>><label for="FINGER JOINT"> Finger Joint </label></div>
                                  <div class="col"> <input type="checkbox" id="ability" name="job_ability[]" value="UV" <?php if(in_array("UV", $ability1)) { echo "checked"; } ?>><label for="UV"> UV </label></div>
                                <div class="col">  <input type="checkbox" id="ability" name="job_ability[]" value="Loading / Unloading" <?php if(in_array("Loading / Unloading", $ability1)) { echo "checked"; } ?>><label for="LOADINGUNLOADING"> Loading / Unloading </label></div>
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

                        if ($query_run) {
                            header("Location:".$_SERVER["HTTP_REFERER"]);
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

        ?>
        
    <?php
    }
    ?>
