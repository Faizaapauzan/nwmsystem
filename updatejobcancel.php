<?php
session_start();

?>    

    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $jobregister_id = $_POST['jobregister_id'];

    $query = "SELECT * FROM job_register WHERE jobregister_id='$jobregister_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <div class="container">
                <div class="jumbotron">

                    <div class="row">
                            <div class="updatetech">
                            <form action="updatejobcancel.php" method="post">
                                 <div class="staff-details" style="display: flex; flex-wrap: wrap; justify-content: space-between; width: 655px;">
                                <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
                                <?php if (isset($_SESSION["username"])) ?>
                                 <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                                <div class="input-box">
                                    <label for=""> Job Code </label>
                                    <input type="text" name="job_name" id="job_name" class="form-control" value="<?php echo $row['job_name'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Job Name </label>
                                    <input type="text" name="job_order_number" id="job_order_number" class="form-control" value="<?php echo $row['job_order_number'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Job Description </label>
                                    <input type="text" name="job_description" id="job_description" class="form-control" value="<?php echo $row['job_description'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Requested Date </label>
                                    <input type="text" name="requested_date" id="requested_date" class="form-control" value="<?php echo $row['requested_date'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Customer Name </label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $row['customer_name'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Customer PIC </label>
                                    <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" value="<?php echo $row['customer_PIC'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Machine Name </label>
                                    <input type="text" name="machine_name" id="machine_name" class="form-control" value="<?php echo $row['machine_name'] ?>">
                                </div>
                                
                                <div class="input-box">
                                    <label for="job_cancel"  class="job_cancel">Cancel Job:</label>
                                    <select id="job_cancel" name="job_cancel">
                                        <option value='' <?php if ($row['job_cancel'] == '') {echo "SELECTED";} ?>></option>
                                        <option value='YES' <?php if ($row['job_cancel'] == 'YES') {echo "SELECTED";} ?>>YES</option>
                                    </select>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
                                </div>
                            </form>
        
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['update'])) {
                        $job_name = $_POST['job_name'];
                        $job_order_number = $_POST['job_order_number'];
                        $job_description = $_POST['job_description'];
                        $requested_date = $_POST['requested_date'];
                        $job_name = $_POST['job_name'];
                        $customer_name = $_POST['customer_name'];
                        $customer_PIC = $_POST['customer_PIC'];
                        $machine_name = $_POST['machine_name'];
                        $job_cancel = $_POST['job_cancel'];
                        $jobregisterlastmodify_by = $_POST['jobregisterlastmodify_by'];
                        
                        $query = "UPDATE job_register SET 
                        job_name='$job_name', 
                        job_order_number='$job_order_number', 
                        job_description='$job_description',
                        requested_date='$requested_date', 
                        job_name='$job_name', 
                        customer_name='$customer_name', 
                        customer_PIC='$customer_PIC', 
                        machine_name='$machine_name',
                        job_cancel='$job_cancel', 
                        jobregisterlastmodify_by='$jobregisterlastmodify_by'
                        WHERE jobregister_id='$jobregister_id'";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:jobcanceled.php");
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