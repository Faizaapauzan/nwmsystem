<?php session_start(); ?>

<?php
include 'dbconnect.php';

    $staffregister_id = $_POST['staffregister_id'];

    $query = "SELECT * FROM staff_register WHERE staffregister_id='$staffregister_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
            
?>
      
                
                <div class="row">
                <div class="updatetech">

                            <form action="updatestaffindex.php" method="post">

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

                                <div class="input-box">
                                    <label for=""> Phone Number </label>
                                    <input type="text" name="staff_phone" id="staff_phone" class="form-control" value="<?php echo $row['staff_phone'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Email </label>
                                    <input type="text" name="staff_email" id="staff_email" class="form-control" value="<?php echo $row['staff_email'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Department </label>
                                    <select type="text" id="staff_department" name="staff_department" value="<?php echo $row['staff_department'] ?>">
            <option value="Management" <?php if($row['staff_department'] == "Management") { echo "SELECTED"; } ?>>Management</option>
            <option value="Maintenance" <?php if($row['staff_department'] == "Maintenance") { echo "SELECTED"; } ?>>Maintenance</option>
            <option value="Store" <?php if($row['staff_department'] == "Store") { echo "SELECTED"; } ?>>Store</option>

                                    </select>
                                </div>

                                <div class="input-box">
                                    <label for="position">Position</label>
                                    <select type="text" id="staff_position" name="staff_position" value="<?php echo $row['staff_position'] ?>">
                                    <option value="Leader" <?php if($row['staff_position'] == "Leader") { echo "SELECTED"; } ?>>Leader</option>
                                    <option value="Assistant Leader" <?php if($row['staff_position'] == "Assistant Leader") { echo "SELECTED"; } ?>>Assistant Leader</option>
                                    <option value="Admin" <?php if($row['staff_position'] == "Admin") { echo "SELECTED"; } ?>>Admin</option>
                                    <option value="Storekeeper" <?php if($row['staff_position'] == "Storekeeper") { echo "SELECTED"; } ?>>Storekeeper</option>
                                    <option value="Manager" <?php if($row['staff_position'] == "Manager") { echo "SELECTED"; } ?>>Manager</option>
                                    </select>
                                </div>
                              
                                    <div class="input-box">
                                    <label for=""> Group </label>
                                    <select type="text" id="staff_group" name="staff_group" value="<?php echo $row['staff_group'] ?>">
            <option value="" <?php if($row['staff_group'] == "") { echo "SELECTED"; } ?>></option>
            <option value="Management" <?php if($row['staff_group'] == "Management") { echo "SELECTED"; } ?>>Management</option>
            <option value="Technician" <?php if($row['staff_group'] == "Technician") { echo "SELECTED"; } ?>>Technician</option>
            <option value="Storekeeper" <?php if($row['staff_group'] == "Storekeeper") { echo "SELECTED"; } ?>>Storekeeper</option>
                                    </select>
                                </div>

                                                                       <div class="input-box">
        <label for="techGroup" class="details">Technician Group</label>
        <select id="techGroup" name="technician_group" value="<?php echo $row['technician_group'] ?>">
        <option value='' <?php if ($row['technician_group'] == '') { echo "SELECTED"; } ?>></option>
        <option value="1st Leader" <?php if ($row['technician_group'] == "1st Leader") { echo "SELECTED"; } ?>>1st Leader</option>
        <option value="2nd Leader" <?php if ($row['technician_group'] == "2nd Leader") { echo "SELECTED";} ?>>2nd Leader</option>
        <option value="Assistant Leader" <?php if ($row['technician_group'] == "Assistant Leader") { echo "SELECTED"; } ?>>Assistant Leader</option>
        </select>
        </div> 


        <div class="input-box">
        <label for="techGroup" class="details">Technician Rank</label>
        <select id="techGroup" name="technician_rank" value="<?php echo $row['technician_rank'] ?>">
        <option value='' <?php if ($row['technician_rank'] == '') { echo "SELECTED"; } ?>></option>
        <option value="1st Leader" <?php if ($row['technician_rank'] == "1st Leader") { echo "SELECTED"; } ?>>1st Leader</option>
        <option value="2nd Leader" <?php if ($row['technician_rank'] == "2nd Leader") { echo "SELECTED";} ?>>2nd Leader</option>
        <option value="Assistant Leader" <?php if ($row['technician_rank'] == "Assistant Leader") { echo "SELECTED"; } ?>>Assistant Leader</option>
        </select>
        </div> 

                                              <div class="input-box">
                                    <label for=""> Username </label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['username'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Password </label>
                                    <input type="text" name="password" id="password" class="form-control" value="<?php echo $row['password'] ?>">
                                </div>

                                <?php if (isset($_SESSION["username"])) { ; } ?>
                                    <input type="hidden" name="staffregisterlastmodify_by" id="staffregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
                                </form>
                        
            </div>
            </div>


        </div>
        </div>

        <?php
        }
    } else {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <h4>No Record Found</h4>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
