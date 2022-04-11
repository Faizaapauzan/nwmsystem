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
                            <form action="updatestaff.php" method="post">
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
                                    <label for="position" class="details">Position</label>
                                    <select type="text" id="staff_position" name="staff_position">
            <option value="admin" <?php if($row['staff_position'] == "admin") { echo "SELECTED"; } ?>>Admin</option>
            <option value="manager" <?php if($row['staff_position'] == "manager") { echo "SELECTED"; } ?>>Manager</option>
            <option value="technician" <?php if($row['staff_position'] == "technician") { echo "SELECTED"; } ?>>Technician</option>
            <option value="storekeeper" <?php if($row['staff_position'] == "storekeeper") { echo "SELECTED"; } ?>>Storekeeper</option>
        </select>
                                </div>
                                <div class="input-box">
                                     <label for="" style="margin-bottom: 14px;">Group</label>
                                 <input type="text" id="staff_group" name="staff_group" value="<?php echo $row['staff_group'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Technician Group </label>
                                    <input type="text" name="technician_group" id="technician_group" class="form-control" value="<?php echo $row['technician_group'] ?>">
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

                    <?php
                    if (isset($_POST['update'])) {
                        $staff_fullname = $_POST['staff_fullname'];
                        $employee_id = $_POST['employee_id'];
                        $staff_phone = $_POST['staff_phone'];
                        $staff_email = $_POST['staff_email'];
                        $staff_department = $_POST['staff_department'];
                        $staff_position= $_POST['staff_position'];
                        $staff_group = $_POST['staff_group'];
                        $technician_group = $_POST['technician_group'];
                        $username = $_POST['username'];
                        $password= $_POST['password'];

                        $query = "UPDATE staff_register SET staff_fullname='$staff_fullname', employee_id='$employee_id', staff_phone='$staff_phone', staff_email='$staff_email', staff_department='$staff_department', staff_position='$staff_position', staff_group='$staff_group', technician_group='$technician_group', username='$username', password='$password' WHERE staffregister_id='$staffregister_id'  ";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:staff.php");
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
