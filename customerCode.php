<?php
    
    require 'dbconnect.php';
    
    // ========== Add ==========
    if(isset($_POST['save_customer'])) {
        $customer_code = mysqli_real_escape_string($conn, $_POST['customer_code']);
        $customer_grade = mysqli_real_escape_string($conn, $_POST['customer_grade']);
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $customer_PIC = mysqli_real_escape_string($conn, $_POST['customer_PIC']);
        $cust_address1 = mysqli_real_escape_string($conn, $_POST['cust_address1']);
        $cust_address2 = mysqli_real_escape_string($conn, $_POST['cust_address2']);
        $cust_address3 = mysqli_real_escape_string($conn, $_POST['cust_address3']);
        $cust_phone1 = mysqli_real_escape_string($conn, $_POST['cust_phone1']);
        $cust_phone2 = mysqli_real_escape_string($conn, $_POST['cust_phone2']);
        $customercreated_by = mysqli_real_escape_string($conn, $_POST['customercreated_by']);
        $customerlasmodify_by = mysqli_real_escape_string($conn, $_POST['customerlasmodify_by']);
        
        if($customer_code == NULL || $customer_grade == NULL || $customer_name == NULL || $customer_PIC == NULL ||
           $cust_address1 == NULL || $cust_phone1 == NULL || $customercreated_by == NULL || $customerlasmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'Some fields cannot be leave empty'];
            
            echo json_encode($res);
            
            return;
        }
        
        $query = "INSERT INTO customer_list (customer_code, customer_grade, customer_name, customer_PIC, cust_address1, 
                                             cust_address2, cust_address3, cust_phone1, cust_phone2, customercreated_by, 
                                             customerlasmodify_by)

                  VALUES ('$customer_code','$customer_grade','$customer_name','$customer_PIC', '$cust_address1',
                          '$cust_address2','$cust_address3','$cust_phone1', '$cust_phone2','$customercreated_by',
                          '$customerlasmodify_by')";
                          
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $latest_query = "SELECT * FROM customer_list ORDER BY customer_id DESC LIMIT 1";
            $latest_result = mysqli_query($conn, $latest_query);
            $latest_row = mysqli_fetch_assoc($latest_result);
            
            $res = [
                'status' => 200,
                'message' => 'Customer Created Successfully',
                'latest_customer' => $latest_row  // Add the latest customer details
            ];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Customer Not Created'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== View ==========
    if(isset($_GET['customer_id'])) {
        $customer_id = mysqli_real_escape_string($conn, $_GET['customer_id']);
        
        $query = "SELECT * FROM customer_list WHERE customer_id='$customer_id'";
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $customer = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Customer Fetch Successfully by id', 'data' => $customer];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Student Id Not Found'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Update ==========
    if(isset($_POST['update_customer'])) {
        $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
        $customer_code = mysqli_real_escape_string($conn, $_POST['customer_code']);
        $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
        $customer_grade = mysqli_real_escape_string($conn, $_POST['customer_grade']);
        $customer_PIC = mysqli_real_escape_string($conn, $_POST['customer_PIC']);
        $cust_phone1 = mysqli_real_escape_string($conn, $_POST['cust_phone1']);
        $cust_phone2 = mysqli_real_escape_string($conn, $_POST['cust_phone2']);
        $cust_address1 = mysqli_real_escape_string($conn, $_POST['cust_address1']);
        $cust_address2 = mysqli_real_escape_string($conn, $_POST['cust_address2']);
        $cust_address3 = mysqli_real_escape_string($conn, $_POST['cust_address3']);
        $customerlasmodify_by = mysqli_real_escape_string($conn, $_POST['customerlasmodify_by']);
        
        if($customer_code == NULL || $customer_name == NULL || $customer_grade == NULL || $customer_PIC == NULL ||
           $cust_phone1 == NULL || $cust_address1 == NULL || $customerlasmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'Some fields cannot be leave empty'];
            
            echo json_encode($res);
            
            return;
        }
        
        $query ="UPDATE customer_list SET 
                         customer_code='$customer_code', 
                         customer_name='$customer_name', 
                         customer_grade='$customer_grade', 
                         customer_PIC='$customer_PIC',
                         cust_phone1='$cust_phone1', 
                         cust_phone2='$cust_phone2', 
                         cust_address1='$cust_address1',
                         cust_address2='$cust_address2', 
                         cust_address3='$cust_address3', 
                         customerlasmodify_by='$customerlasmodify_by'  
                 WHERE customer_id='$customer_id'";
    
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Customer Updated Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Customer Not Updated'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== Delete ==========
    if(isset($_POST['delete_customer'])) {
        $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
        
        $query = "DELETE FROM customer_list WHERE customer_id='$customer_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Customer Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Customer Not Deleted'];
            
            echo json_encode($res);
            
            return;
        }
    }

?>