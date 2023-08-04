<?php

    require 'dbconnect.php';

    // ========== Add New Machine Brand ==========
    if (isset($_POST['save_machine_brand'])) {
        $brandname = mysqli_real_escape_string($conn, $_POST['brandname']);
        
        if ($brandname == NULL) {
            $res = ['status' => 422, 'message' => 'Brand name is mandatory'];
            echo json_encode($res);
            return;
        }
        
        $query = "INSERT INTO machine_brand (brandname) VALUES ('$brandname')";
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Machine Brand Added Successfully!'];
            
            echo json_encode($res);
            
            return;
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Brand Not Added'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Add New Machine Type ==========
    if (isset($_POST['save_machine_type'])) {
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        $type_name = mysqli_real_escape_string($conn, $_POST['type_name']);
        
        if ($brand_id == NULL || $type_name == NULL) {
            $res = ['status' => 422, 'message' => 'Brand and type are mandatory'];
            
            echo json_encode($res);
            
            return;
        }
        
        $query = "INSERT INTO machine_type (brand_id, machine_type_name) VALUES ('$brand_id', '$type_name')";
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Machine Type Added Successfully!'];
            
            echo json_encode($res);
            
            return;
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Type Not Added'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Add New Machine ==========
    if(isset($_POST['save_machine'])) {
        $machine_code = mysqli_real_escape_string($conn, $_POST['machine_code']);
        $machine_name = mysqli_real_escape_string($conn, $_POST['machine_name']);
        $machine_brand = mysqli_real_escape_string($conn, $_POST['machine_brand']);
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        $machine_type = mysqli_real_escape_string($conn, $_POST['machine_type']);
        $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
        $serialnumber = mysqli_real_escape_string($conn, $_POST['serialnumber']);
        $machine_description = mysqli_real_escape_string($conn, $_POST['machine_description']);
        $purchase_date = mysqli_real_escape_string($conn, $_POST['purchase_date']);
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $machinelistcreated_by = mysqli_real_escape_string($conn, $_POST['machinelistcreated_by']);
        $machinelistlastmodify_by = mysqli_real_escape_string($conn, $_POST['machinelistlastmodify_by']);
        
        if($machine_code == NULL || $machine_name == NULL || $machine_brand == NULL || $brand_id == NULL ||
           $machine_type == NULL || $type_id == NULL || $serialnumber == NULL || $machine_description == NULL || 
           $purchase_date == NULL || $customer_name == NULL || $machinelistcreated_by == NULL || $machinelistlastmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
                    
            echo json_encode($res);
            
            return;
        }
        
        $query = "INSERT INTO machine_list (machine_code, machine_name, machine_brand, 
                                            brand_id, machine_type, type_id, serialnumber, 
                                            machine_description, purchase_date, customer_name, 
                                            machinelistcreated_by, machinelistlastmodify_by) 
                  
                  VALUES ('$machine_code','$machine_name','$machine_brand','$brand_id', 
                          '$machine_type','$type_id','$serialnumber','$machine_description', 
                          '$purchase_date','$customer_name','$machinelistcreated_by',
                          '$staffregistercreated_by','$staffregisterlastmodify_by')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Machine Added Successfully!'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Not Added'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== View ==========
    if(isset($_GET['machine_id'])) {
        
        $machine_id = mysqli_real_escape_string($conn, $_GET['machine_id']);
        
        $query = "SELECT * FROM machine_list WHERE machine_id='$machine_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $machine = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Machine Fetch Successfully', 'data' => $machine];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Machine ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Update ==========
    if(isset($_POST['update_machine'])) {
        $machine_id = mysqli_real_escape_string($conn, $_POST['machine_id']);
        $machine_code = mysqli_real_escape_string($conn, $_POST['machine_code']);
        $machine_name = mysqli_real_escape_string($conn, $_POST['machine_name']);
        $machine_brand = mysqli_real_escape_string($conn, $_POST['machine_brand']);
        $brand_id = mysqli_real_escape_string($conn, $_POST['brand_id']);
        $machine_type = mysqli_real_escape_string($conn, $_POST['machine_type']);
        $type_id = mysqli_real_escape_string($conn, $_POST['type_id']);
        $serialnumber = mysqli_real_escape_string($conn, $_POST['serialnumber']);
        $machine_description = mysqli_real_escape_string($conn, $_POST['machine_description']);
        $purchase_date = mysqli_real_escape_string($conn, $_POST['purchase_date']);
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $machinelistlastmodify_by = mysqli_real_escape_string($conn, $_POST['machinelistlastmodify_by']);
        
        if($machine_code == NULL || $machine_name == NULL || $machine_brand == NULL || $brand_id == NULL ||
           $machine_type == NULL || $type_id == NULL || $serialnumber == NULL || $machine_description == NULL || 
           $purchase_date == NULL || $customer_name == NULL || $machinelistlastmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
        
            echo json_encode($res);
            
            return;
        }
        
        $query = "UPDATE machine_list SET 
                    machine_code='$machine_code', 
                    machine_name='$machine_name', 
                    machine_brand='$machine_brand', 
                    brand_id='$brand_id',
                    machine_type='$machine_type', 
                    type_id='$type_id', 
                    serialnumber='$serialnumber',
                    machine_description='$machine_description', 
                    purchase_date='$purchase_date', 
                    customer_name='$customer_name',
                    machinelistlastmodify_by='$machinelistlastmodify_by'
                  WHERE machine_id='$machine_id'";
                  
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Machine Updated Successfully!'];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Not Updated'];
        
            echo json_encode($res);
        
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_machine'])) {
        $machine_id = mysqli_real_escape_string($conn, $_POST['machine_id']);
        
        $query = "DELETE FROM machine_list WHERE machine_id='$machine_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Machine Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>