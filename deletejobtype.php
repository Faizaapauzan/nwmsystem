    <?php
    include 'dbconnect.php';

    $jobtype_id = $_POST['jobtype_id'];

    $query = "SELECT * FROM jobtype_list WHERE jobtype_id='$jobtype_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
     
                    <div class="row">
                        <div class="col-md-12">
                            <form action="deletejobtype.php" method="post">
                                 <p>Are you sure you want to delete this job ?</p>
                                <input type="hidden" name="jobtype_id" value="<?php echo $row['jobtype_id']; ?>">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" name="delete" class="btn btn-primary" id="btnDelete"> Delete </button>
                                
                            </form>

                        </div>
                    </div>

                  <?php
                 if(isset($_POST['delete']))
{
    $jobtype_id = $_POST['jobtype_id'];

    $query = "DELETE FROM jobtype_list WHERE jobtype_id='$jobtype_id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:jobtype.php");
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