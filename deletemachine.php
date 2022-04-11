    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $machine_id = $_POST['machine_id'];

    $query = "SELECT * FROM machine_list WHERE machine_id='$machine_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="deletemachine.php" method="post">
                                 <p>Are you sure you want to delete this data ?</p>
                                <input type="hidden" name="machine_id" value="<?php echo $row['machine_id']; ?>">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="delete" class="btn btn-primary" id="btnDelete"> Delete </button>
                                
                            </form>

                        </div>
                    </div>

                  <?php
                 if(isset($_POST['delete']))
{
    $machine_id = $_POST['machine_id'];

    $query = "DELETE FROM machine_list WHERE machine_id='$machine_id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:machine.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
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