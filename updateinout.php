

<?php
include 'dbconnect.php';

$entry_id = $_POST['entry_id'];

$query = "SELECT * FROM accessories_inout WHERE inout_id='$entry_id' ";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
    while ($row = mysqli_fetch_array($query_run)) {
?>


<div class="row">
    <div class="col-md-12">

        <form action="updateinout.php" method="post">
            <div class="" style="width: 100%;">

                <input type="hidden" name="entry_id" id="entry_id" value="<?php echo $row['inout_id'] ?>">
                <?php if (isset($_SESSION["username"])) ?>
                <input type="hidden" name="inoutlastmodify_by" id="inoutlastmodify_by"
                    value="<?php echo $_SESSION["username"] ?>" readonly>

                <div class="input-box">
                    <label for=""> Item </label>
                    <input type="text" name="accessoriesname" id="accessoriesname" class="form-control"
                        value="<?php echo $row['accessoriesname'] ?>">
                </div>

                <div class="input-box">
                    <label for=""> Technician </label>
                    <input type="text" name="techname" id="techname" class="form-control"
                        value="<?php echo $row['techname'] ?>">
                </div>

                <div class="input-box">
                    <label for=""> Out Date time </label>
                    <input type="text" name="out_date" id="out_date" class="form-control"
                        value="<?php echo $row['out_date'] ?>">
                </div>

                <div class="input-box">
                    <label for=""> Quantity </label>
                    <input type="text" name="quantity" id="quantity" class="form-control"
                        value="<?php echo $row['quantity'] ?>">
                </div>

                <div class="input-box">
                    <label for=""> Remaining </label>
                    <input type="text" name="balance" id="balance" class="form-control"
                        value="<?php echo $row['balance'] ?>">
                </div>

            </div>
            <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

        </form>
    </div>
</div>

<?php
        if (isset($_POST['update'])) {
            $entry_id = $_POST['entry_id'];

            $item = $_POST['accessoriesname'];
            $technician = $_POST['techname'];
            $out_date = $_POST['out_date'];
            $quantity = $_POST['quantity'];
            $remaining = $_POST['balance'];

            $query = "UPDATE accessories_inout SET 
            accessoriesname='$item', 
            techname='$technician', 
            out_date='$out_date',
            quantity='$quantity',
            balance='$remaining'
            WHERE inout_id='$entry_id'";

            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo '<script> alert("Data Updated"); </script>';
                header("location:AccessoryInOut.php");
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