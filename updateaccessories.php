<?php
session_start();

?>

<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $accessories_id = $_POST['accessories_id'];

    $query = "SELECT * FROM accessories_list WHERE accessories_id='$accessories_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
           <div class="container">
                <div class="jumbotron">

                    <div class="row">
                    <div class="updatetech">

                            <form action="updateaccessories.php" method="post">
                            <div class="staff-details" style="display: flex; flex-wrap: wrap; justify-content: space-between; width: 764px;">

                                <input type="hidden" name="accessories_id" id="accessories_id" value="<?php echo $row['accessories_id'] ?>">
                                <?php if (isset($_SESSION["username"])) ?>
                                <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                                <div class="input-box">
                                    <label for=""> Accessories Code </label>
                                    <input type="text" name="accessories_code" id="accessories_code" class="form-control" value="<?php echo $row['accessories_code'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Accessories Name </label>
                                    <input type="text" name="accessories_name" id="accessories_name" class="form-control" value="<?php echo $row['accessories_name'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Accessories Group </label>
                                    <input type="text" name="accessories_brand" id="accessories_brand" class="form-control" value="<?php echo $row['accessories_brand'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Accessories Description </label>
                                    <input type="text" name="accessories_description" id="accessories_description" class="form-control" value="<?php echo $row['accessories_description'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for="customerPIC" class="details">Accessories Photo</label>
                                    <input type="file" id="Photo" name="file_name" id="file_name" value="<?php echo $row['file_name'] ?>">
                                </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
                             
                            </form>

                        </div>
                        </div>

                    <?php
                    if (isset($_POST['update'])) {
                        $accessories_code = $_POST['accessories_code'];
                        $accessories_name = $_POST['accessories_name'];
                        $accessories_brand = $_POST['accessories_brand'];
                        $accessories_description = $_POST['accessories_description'];
                        $file_name = $_POST['file_name'];
                        $accessorieslistlasmodify_by = $_POST['accessorieslistlasmodify_by'];

                        $query = "UPDATE accessories_list SET accessories_code='$accessories_code', accessories_name='$accessories_name', accessories_brand=' $accessories_brand', accessories_description='$accessories_description', file_name='$file_name', accessorieslistlasmodify_by='$accessorieslistlasmodify_by' WHERE accessories_id='$accessories_id'  ";
                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:accessories.php");
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
</body>

</html>