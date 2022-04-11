<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $staffregister_id = $_POST['staffregister_id'];

    $query = "SELECT * FROM staff_register WHERE staffregister_id='$staffregister_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
            
?>
            <div class="container">
            <div class="jumbotron">
                
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
                                    <input type="text" name="staff_department" id="staff_department" class="form-control" value="<?php echo $row['staff_department'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for="position" class="form-control">Position</label>
                                    <select type="text" id="staff_position" name="staff_position">
            <option value="Admin" <?php if($row['staff_position'] == "Admin") { echo "SELECTED"; } ?>>Admin</option>
            <option value="Manager" <?php if($row['staff_position'] == "Manager") { echo "SELECTED"; } ?>>Manager</option>
            <option value="Technician" <?php if($row['staff_position'] == "Technician") { echo "SELECTED"; } ?>>Technician</option>
            <option value="Storekeeper" <?php if($row['staff_position'] == "Storekeeper") { echo "SELECTED"; } ?>>Storekeeper</option>
            <option value="General Worker" <?php if($row['staff_position'] == "General Worker") { echo "SELECTED"; } ?>>General Worker</option>
                                    </select>
                                </div>
                              
                                    <div class="input-box">
                                    <label for=""> Group </label>
                                    <select type="text" id="staff_group" name="staff_group">
            <option value="" <?php if($row['staff_group'] == "") { echo "SELECTED"; } ?>></option>
            <option value="Management" <?php if($row['staff_group'] == "Management") { echo "SELECTED"; } ?>>Management</option>
            <option value="Service" <?php if($row['staff_group'] == "Service") { echo "SELECTED"; } ?>>Service</option>
            <option value="Storekeeper" <?php if($row['staff_group'] == "Storekeeper") { echo "SELECTED"; } ?>>Storekeeper</option>
                                    </select>
                                </div>

                                    <div class="input-box">
                                    <label for=""> Technician Group </label>
                                    <select type="text" id="technician_rank" name="technician_rank">
            <option value="" <?php if($row['technician_rank'] == "") { echo "SELECTED"; } ?>></option>
            <option value="Leader" <?php if($row['technician_rank'] == "Leader") { echo "SELECTED"; } ?>>Leader</option>
            <option value="Assistant Leader" <?php if($row['technician_rank'] == "Assistant Leader") { echo "SELECTED"; } ?>>Assistant Leader</option>
            <option value="General Worker" <?php if($row['technician_rank'] == "General Worker") { echo "SELECTED"; } ?>>General Worker</option>
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
