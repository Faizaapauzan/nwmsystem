<?php
    
    include 'dbconnect.php';
    
    if (isset($_POST['customer_name'])) {
        $customer_name = $_POST['customer_name'];
        
        $query = "SELECT * FROM machine_list WHERE customer_name = '$customer_name'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<option value=''>Select Serial Number</option>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['serialnumber'] . "'
                              data-machName ='" . $row['machine_name'] . "'
                              data-machID ='" . $row['machine_id'] . "'
                              data-machCode ='" . $row['machine_code'] . "'
                              data-brandID ='" . $row['brand_id'] . "'
                              data-machBrand ='" . $row['machine_brand'] . "'
                              data-machType ='" . $row['machine_type'] . "'
                              data-typeID ='" . $row['type_id'] . "'>" . $row['serialnumber'] . "</option>";
            }
        }
        
        else {
            echo "<option value=''>No Serial Numbers Available</option>";
        }
    }
    
?>

