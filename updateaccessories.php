<?php session_start(); ?>

<?php
    
    include 'dbconnect.php';

    $accessories_id = $_POST['accessories_id'];

    $query = "SELECT * FROM accessories_list WHERE accessories_id='$accessories_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
?>
    
    <div class="row">
        <div class="updatetech">
            <form action="updateaccessories.php" method="post" enctype="multipart/form-data">
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
                    <label for=""> Unit of Measurement </label>
                    <input type="text" name="accessories_uom" id="accessories_uom" class="form-control" value="<?php echo $row['accessories_uom'] ?>">
                </div>
                
                <div class="input-box">
                    <label for=""> Accessories Brand </label>
                    <input type="text" name="accessories_brand" id="accessories_brand" class="form-control" value="<?php echo $row['accessories_brand'] ?>">
                </div>
                
                <div class="input-box">
                    <label for=""> Accessories Description </label>
                    <input type="text" name="accessories_description" id="accessories_description" class="form-control" value="<?php echo $row['accessories_description'] ?>">
                </div>
                
                <div class="input-box">
                    <label for="customerPIC" class="details">Accessories Photo</label>
                    <input type="file" name="file_name" id="file_name">
                </div>
                
                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>
            </form>
        </div>
    </div>
    
    <?php
        
        if (isset($_POST['update'])) {
            $accessories_id = $_POST['accessories_id'];
            $accessories_code = $_POST['accessories_code'];
            $accessories_name = $_POST['accessories_name'];
            $accessories_uom = $_POST['accessories_uom'];
            $accessories_brand = $_POST['accessories_brand'];
            $accessories_description = $_POST['accessories_description'];
            $accessorieslistlasmodify_by = $_POST['accessorieslistlasmodify_by'];
            
            $file_name = '';
            
            // Check if a file was uploaded
            if ($_FILES['file_name']['name']) {
                $target_dir = "image/";
                $target_file = $target_dir . basename($_FILES["file_name"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
            // Check if the file is a valid image
            if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {
                // Upload the file
                if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)) {
                    $file_name = basename($_FILES["file_name"]["name"]);
                } 
                
                else {
                    echo '<script> alert("Sorry, there was an error uploading your file."); </script>';
                }
            } 
            
            else {
                echo '<script> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed."); </script>';
            }
        }
    
        // Update the record in the database
        $query = "UPDATE accessories_list SET 
                    accessories_code='$accessories_code', 
                    accessories_name='$accessories_name', 
                    accessories_uom='$accessories_uom', 
                    accessories_brand='$accessories_brand', 
                    accessories_description='$accessories_description',";
        
        // Add the file_name column to the update statement if a file was uploaded
        if(!empty($file_name)) { // use !empty() to check if $file_name is defined and not empty
            $query .= " file_name='$file_name',";
        }
    
        $query .= " accessorieslistlasmodify_by='$accessorieslistlasmodify_by' WHERE accessories_id='$accessories_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            echo '<script> alert("Data Updated"); </script>';
            header("location:accessories.php");
        } 
        
        else {
            echo '<script> alert("Data Not Updated"); </script>';
        }
        }
    ?>
    
    <?php } } 
        
        else {
            // echo '<script> alert("No Record Found"); </script>';
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>No Record Found</h4>
            </div>
        </div>
    </div>
    
    <?php } ?>

</body>
</html>