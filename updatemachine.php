<?php
session_start();

?>


<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $machine_id = $_POST['machine_id'];

    $query = "SELECT * FROM machine_list WHERE machine_id='$machine_id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
           <div class="container">
                <div class="jumbotron">

                    <div class="row">
                       <div class="updatetech">

                            <form action="updatemachine.php" method="post">
                            <div class="staff-details" style="display: flex; flex-wrap: wrap; justify-content: space-between; width: 580px;">

                                <input type="hidden" name="machine_id" id="machine_id" value="<?php echo $row['machine_id'] ?>">

                                 <?php if (isset($_SESSION["username"])) ?>
                                 <input type="hidden" name="machinelistlastmodify_by" id="machinelistlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

                                <div class="input-box">
                                    <label for=""> Machine Code </label>
                                    <input type="text" name="machine_code" id="machine_code" class="form-control" value="<?php echo $row['machine_code'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Machine Name </label>
                                    <input type="text" name="machine_name" id="machine_name" class="form-control" value="<?php echo $row['machine_name'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Machine Type </label>
                                    <input type="text" name="machine_type" id="machine_type" class="form-control" value="<?php echo $row['machine_type'] ?>">
                                </div>

                                <div class="input-box">
                                    <label for=""> Machine Brand </label>
                                    <input type="text" name="machine_brand" id="machine_brand" class="form-control" value="<?php echo $row['machine_brand'] ?>">
                                </div>

                                  <div class="input-box">
                                <label for="">Serial Number</label>
                                <input type="text" id="SerialNumber" name="serialnumber" class="form-control" value="<?php echo $row['serialnumber'] ?>">
                            </div>

                            <div class="input-box">
                                <label for="customerName" class="details">Customer Name</label>
                                <input type="text" id="customerName" name="customer_name" class="form-control" value="<?php echo $row['customer_name'] ?>" >
                            </div>

                             <div class="input-box">
                                <label for="PurchaseDate" class="details">Purchase Date</label>
                                <input type="date" id="PurchaseDate" name="purchase_date" class="form-control" value="<?php echo $row['purchase_date'] ?>">
                            </div>

                            
                             <div class="input-box">
                                <label for="" class="details"></label>
                                <input type="hidden" id="" name="" class="form-control" value="">
                            </div>

                              <div class="input-box">
                            <label for="">Machine Description</label>
                            <textarea name="machine_description" class="machine_description" rows="3" cols="100" style="width: 541px; height: 65px;"><?php echo $row['machine_description'] ?></textarea>
                            </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
                            </div>
                            </form>

                        </div>
                    </div>

                    <?php
                    if (isset($_POST['update'])) {
                        $machine_code = $_POST['machine_code'];
                        $machine_name = $_POST['machine_name'];
                        $machine_type = $_POST['machine_type'];
                        $machine_brand = $_POST['machine_brand'];
                        $serialnumber = $_POST['serialnumber'];
                        $customer_name = $_POST['customer_name'];
                        $purchase_date = $_POST['purchase_date'];
                        $machine_description = $_POST['machine_description'];
                        $machinelistlastmodify_by = $_POST['machinelistlastmodify_by'];

                        $query = "UPDATE machine_list SET
machine_code='$machine_code',
machine_name='$machine_name',
machine_type='$machine_type',
machine_brand='$machine_brand',
serialnumber='$serialnumber',
customer_name='$customer_name',
purchase_date='$purchase_date',
machine_description='$machine_description',
machinelistlastmodify_by='$machinelistlastmodify_by'

WHERE machine_id='$machine_id'";

                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:machine.php");
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
