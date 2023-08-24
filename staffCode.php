<?php
    require 'dbconnect.php';
    
    // ========== Add ==========
    if(isset($_POST['save_staff'])) {
        $staff_fullname = mysqli_real_escape_string($conn, $_POST['staff_fullname']);
        $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
        $staff_phone = mysqli_real_escape_string($conn, $_POST['staff_phone']);
        $staff_email = mysqli_real_escape_string($conn, $_POST['staff_email']);
        $staff_department = mysqli_real_escape_string($conn, $_POST['staff_department']);
        $staff_position = mysqli_real_escape_string($conn, $_POST['staff_position']);
        $staff_group = mysqli_real_escape_string($conn, $_POST['staff_group']);
        $technician_group = mysqli_real_escape_string($conn, $_POST['technician_group']);
        $technician_rank = mysqli_real_escape_string($conn, $_POST['technician_rank']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $raw_password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($raw_password, PASSWORD_DEFAULT);
        $staffregistercreated_by = mysqli_real_escape_string($conn, $_POST['staffregistercreated_by']);
        $staffregisterlastmodify_by = mysqli_real_escape_string($conn, $_POST['staffregisterlastmodify_by']);
        
        if($staff_fullname == NULL || $employee_id == NULL || $staff_phone == NULL || $staff_email == NULL || 
           $staff_department == NULL || $staff_position == NULL || 
           $staff_group == NULL || $username == NULL || $password == NULL || 
           $staffregistercreated_by == NULL || $staffregisterlastmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'Some info cannot be leave empty'];
                    
            echo json_encode($res);
            
            return;
        }
        
        $query = "INSERT INTO staff_register (staff_fullname, employee_id, staff_phone, staff_email, 
                                      staff_department, staff_position, staff_group, technician_group, 
                                      technician_rank, username, password, 
                                      staffregistercreated_by, staffregisterlastmodify_by) 

                  VALUES ('$staff_fullname','$employee_id','$staff_phone','$staff_email', 
                          '$staff_department','$staff_position','$staff_group','$technician_group', 
                          '$technician_rank','$username','$password',
                          '$staffregistercreated_by','$staffregisterlastmodify_by')";
        
        $query_run = mysqli_query($conn, $query);
        
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Staff Registered Successfully!'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Staff Not Registered'];
            
            echo json_encode($res);
            
            return;
        }
    }
    
    // ========== View ==========
    if(isset($_GET['staffregister_id'])) {
        
        $staffregister_id = mysqli_real_escape_string($conn, $_GET['staffregister_id']);
        
        $query = "SELECT * FROM staff_register WHERE staffregister_id='$staffregister_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($query_run) == 1) {
            $staff = mysqli_fetch_array($query_run);
            
            $res = ['status' => 200, 'message' => 'Staff Fetch Successfully', 'data' => $staff];
        
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 404, 'message' => 'Staff ID Not Found'];
        
            echo json_encode($res);
            
            return;
        }
    }

    // ========== Update ==========
    if(isset($_POST['update_staff'])) {
        $staffregister_id = mysqli_real_escape_string($conn, $_POST['staffregister_id']);
        $staff_fullname = mysqli_real_escape_string($conn, $_POST['staff_fullname']);
        $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
        $staff_phone = mysqli_real_escape_string($conn, $_POST['staff_phone']);
        $staff_email = mysqli_real_escape_string($conn, $_POST['staff_email']);
        $staff_department = mysqli_real_escape_string($conn, $_POST['staff_department']);
        $staff_position = mysqli_real_escape_string($conn, $_POST['staff_position']);
        $staff_group = mysqli_real_escape_string($conn, $_POST['staff_group']);
        $technician_group = mysqli_real_escape_string($conn, $_POST['technician_group']);
        $technician_rank = mysqli_real_escape_string($conn, $_POST['technician_rank']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $staffregisterlastmodify_by = mysqli_real_escape_string($conn, $_POST['staffregisterlastmodify_by']);
        
        if($staff_fullname == NULL || $employee_id == NULL || $staff_phone == NULL || $staff_email == NULL ||
           $staff_department == NULL || $staff_position == NULL || $staff_group == NULL || 
           $username == NULL || $staffregisterlastmodify_by == NULL) {
            
            $res = ['status' => 422, 'message' => 'All fields are mandatory'];
            
            echo json_encode($res);
            
            return;
        }
        
        // Check if a new password is provided
        if (!empty($_POST['password'])) {
            $raw_password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($raw_password, PASSWORD_DEFAULT);
            
            $query = "UPDATE staff_register SET 
                             staff_fullname='$staff_fullname', 
                             employee_id='$employee_id', 
                             staff_phone='$staff_phone', 
                             staff_email='$staff_email',
                             staff_department='$staff_department', 
                             staff_position='$staff_position', 
                             staff_group='$staff_group', 
                             technician_group='$technician_group',
                             technician_rank='$technician_rank', 
                             username='$username', 
                             password='$password', 
                             staffregisterlastmodify_by='$staffregisterlastmodify_by'  
                      WHERE staffregister_id='$staffregister_id'";
        } 
        
        else {
            
            $query = "UPDATE staff_register SET 
                             staff_fullname='$staff_fullname', 
                             employee_id='$employee_id', 
                             staff_phone='$staff_phone', 
                             staff_email='$staff_email',
                             staff_department='$staff_department', 
                             staff_position='$staff_position', 
                             staff_group='$staff_group', 
                             technician_group='$technician_group',
                             technician_rank='$technician_rank', 
                             username='$username', 
                             staffregisterlastmodify_by='$staffregisterlastmodify_by'  
                      WHERE staffregister_id='$staffregister_id'";
        }
              
        $query_run = mysqli_query($conn, $query);
    
        if($query_run) {
            $res = ['status' => 200, 'message' => 'Staff Updated Successfully!'];
    
            echo json_encode($res);
        
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Staff Not Updated'];
    
            echo json_encode($res);
    
            return;
        }
    }

    // ========== Delete ==========
    if(isset($_POST['delete_staff'])) {
        $staffregister_id = mysqli_real_escape_string($conn, $_POST['staffregister_id']);
        
        $query = "DELETE FROM staff_register WHERE staffregister_id='$staffregister_id'";
        
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Staff Deleted Successfully'];
            
            echo json_encode($res);
            
            return;
        }
        
        else {
            $res = ['status' => 500, 'message' => 'Staff Not Deleted'];
        
            echo json_encode($res);
            
            return;
        }
    }
?>