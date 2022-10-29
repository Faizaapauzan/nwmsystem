<?php
session_start();

?>    

    <?php
    $connection = mysqli_connect("localhost", "Ithink", "iThink3399*");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $jobtype_id = $_POST['jobtype_id'];

    $query = "SELECT * FROM jobtype_list WHERE jobtype_id='$jobtype_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
 

            <div class="row">
            <div class="updatetech">

            <form action="updatejobtype.php" method="post">
            <div class="staff-details" style="width: 840px;">

                <input type="hidden" name="jobtype_id" id="jobtype_id" value="<?php echo $row['jobtype_id'] ?>">
                    <?php if (isset($_SESSION["username"])) ?>
                 <input type="hidden" name="jobtypelastmodify_by" id="jobtypelastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>

                <div class="input-box">
                <label for=""> Job Code </label>
                <input type="text" name="job_code" id="job_code" class="form-control" value="<?php echo $row['job_code'] ?>">
                </div>

                <div class="input-box">
                <label for=""> Job Name </label>
                <input type="text" name="job_name" id="job_name" class="form-control" value="<?php echo $row['job_name'] ?>">
                </div>

                <div class="input-box">
                <label for=""> Job Description </label>
                <input type="text" name="job_description" id="job_description" class="form-control" value="<?php echo $row['job_description'] ?>">
                </div>

        </div>
                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
                                
        </form>
        </div>
        </div>

                    <?php
                    if (isset($_POST['update'])) {
                        $job_code = $_POST['job_code'];
                        $job_name = $_POST['job_name'];
                        $job_description = $_POST['job_description'];
                        $jobtypelastmodify_by = $_POST['jobtypelastmodify_by'];

                        $query = "UPDATE jobtype_list SET 

                        job_code ='".addslashes($job_code)."',
                        job_name ='".addslashes($job_name)."',
                        job_description ='".addslashes($job_description)."',
                        jobtypelastmodify_by ='".addslashes($jobtypelastmodify_by)."'

                        WHERE  jobtype_id ='".addslashes($jobtype_id)."' ";
                        
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:jobtype.php");
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