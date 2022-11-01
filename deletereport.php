    <?php
    include 'dbconnect.php';

    $servicereport_id = $_POST['servicereport_id'];

    $query = "SELECT * FROM servicereport WHERE servicereport_id='$servicereport_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
           
                    <div class="row">
                        <div class="col-md-12">
                            <form action="deletereport.php" method="post">
                                 <p>Are you sure you want to delete this report ?</p>
                                <input type="hidden" name="servicereport_id" value="<?php echo $row['servicereport_id']; ?>">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="delete" class="btn btn-primary" id="btnDelete"> Delete </button>
                                
                            </form>

                        </div>
                    </div>

                  <?php
                 if(isset($_POST['delete']))
{
    $servicereport_id = $_POST['servicereport_id'];

    $query = "DELETE FROM servicereport WHERE servicereport_id='$servicereport_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:report.php");
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