<?php

    require 'dbconnect.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // ========== Add New Machine Brand ==========
    if (isset($_POST['sBrand'])) {
        $brandname = $_POST['brand'];
    
        if (empty($brandname)) {
            $res = ['status' => 422, 'message' => 'Brand name is mandatory'];
            echo json_encode($res);
            return;
        }
    
        $stmt = $conn->prepare("INSERT INTO machine_brand (brandname) VALUES (?)");
        $stmt->bind_param("s", $brandname);
        
        if ($stmt->execute()) {
            $stmtSelect = $conn->prepare("SELECT brand_id FROM machine_brand WHERE brandname = ?");
            $stmtSelect->bind_param("s", $brandname);
            $stmtSelect->execute();
            $stmtSelect->bind_result($brand_id);
            
            if ($stmtSelect->fetch()) {
                $res = ['status' => 200, 'message' =>'Machine Brand Added Successfully', 'brand_id' => $brand_id];
            } 
            
            else {
                $res = ['status' => 500, 'message' =>'Machine Brand Not Added'];
            }
            
            $stmtSelect->close();
        } 
        
        else {
            $res = ['status' => 500, 'message' =>'Machine Brand Not Added'];
        }
    
        echo json_encode($res);
    }
    
    // ========== Add New Machine Type ==========
    if (isset($_POST['sType'])) {
        $brand_id = $_POST['brand_id'];
        $type_name = $_POST['type_name'];
    
        if (empty($brand_id) || empty($type_name)) {
            $res = ['status' => 422, 'message' => 'Brand and Type are mandatory'];
            echo json_encode($res);
            return;
        }
    
        $stmt = $conn->prepare("INSERT INTO machine_type (type_name, brand_id) VALUES (?, ?)");
        $stmt->bind_param("ss", $type_name, $brand_id);
    
        if ($stmt->execute()) {
            $stmtSelect = $conn->prepare("SELECT type_id FROM machine_type WHERE type_name = ?");
            $stmtSelect->bind_param("s", $type_name);
            $stmtSelect->execute();
            $stmtSelect->bind_result($type_id);
    
            if ($stmtSelect->fetch()) {
                $res = ['status' => 200, 'message' =>'Machine Type Added Successfully!', 'type_id' => $type_id];
            } 
            
            else {
                $res = ['status' => 500, 'message' => 'Machine Type Not Added'];
            }

            $stmtSelect->close();
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Machine Type Not Added'];
        }
    
        echo json_encode($res);
    }
    
    // ========== Add New Machine ==========
    if(isset($_POST['save_machine'])) {

        $machine_code = mysqli_real_escape_string($conn, $_POST['machine_code']);
        $machine_name = mysqli_real_escape_string($conn, $_POST['machine_name']);
        $brand_id = mysqli_real_escape_string($conn, $_POST['machine_brand']);
        $type_id = mysqli_real_escape_string($conn, $_POST['machine_type']);
        $serialnumber = mysqli_real_escape_string($conn, $_POST['serialnumber']);
        $machine_description = mysqli_real_escape_string($conn, $_POST['machine_description']);
        $purchase_date = mysqli_real_escape_string($conn, $_POST['purchase_date']);
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $machinelistcreated_by = mysqli_real_escape_string($conn, $_POST['machinelistcreated_by']);
        $machinelistlastmodify_by = mysqli_real_escape_string($conn, $_POST['machinelistlastmodify_by']);

        $stmt1 = $conn->prepare("SELECT brandname FROM machine_brand WHERE brand_id = ?");
        $stmt1->bind_param("s", $brand_id);
        $stmt1->execute();
        $stmt1->bind_result($machine_brand);
        $stmt1->fetch();
        $stmt1->close();

        $stmt2 = $conn->prepare("SELECT type_name FROM machine_type WHERE type_id = ?");
        $stmt2->bind_param("s", $type_id);
        $stmt2->execute();
        $stmt2->bind_result($machine_type);
        $stmt2->fetch();
        $stmt2->close();

        $query = "INSERT INTO machine_list (machine_code, machine_name, machine_brand, brand_id, machine_type, type_id, serialnumber, machine_description, purchase_date, customer_name, machinelistcreated_by, machinelistlastmodify_by) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("ssssssssssss", $machine_code, $machine_name, $machine_brand, $brand_id, $machine_type, $type_id, $serialnumber, $machine_description, $purchase_date, $customer_name, $machinelistcreated_by, $machinelistlastmodify_by);

        if ($stmt->execute()) {
            $stmt3 = $conn->prepare("SELECT brand_id, brandname FROM machine_brand ORDER BY brand_id DESC LIMIT 1");
            $stmt3->execute();
            $stmt3->bind_result($brand_id, $brandname);
            $stmt3->fetch();
            $stmt3->close();
            $res = ['status' => 200, 'message' => 'Machine Added Successfully', 'brand_id' => $brand_id, 'brandname' => $brandname];
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Error executing query: ' . $stmt->error];
        }

        $stmt->close();

        echo json_encode($res);
        return;
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