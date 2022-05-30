<?php

include 'dbconnect.php';

    if(isset($_POST['update']))
    {  

    $staffregister_id = $_POST['staffregister_id'];
        
    $staff_fullname = $_POST['staff_fullname'];
    $employee_id = $_POST['employee_id'];
    $staff_phone = $_POST['staff_phone'];
    $staff_email = $_POST['staff_email'];
    $staff_department = $_POST['staff_department'];
    $staff_position= $_POST['staff_position'];
    $staff_group = $_POST['staff_group'];
    $technician_group = $_POST['technician_group'];
    $technician_rank = $_POST['technician_rank'];
    $username = $_POST['username'];
    $password= $_POST['password'];
    $staffregisterlastmodify_by = $_POST['staffregisterlastmodify_by'];

     $query = "UPDATE staff_register SET 

    staff_fullname ='".addslashes($staff_fullname)."',
    employee_id ='".addslashes($employee_id)."',
    staff_phone ='".addslashes($staff_phone)."',
    staff_email ='".addslashes($staff_email)."',
    staff_department ='".addslashes($staff_department)."',
    staff_position ='".addslashes($staff_position)."',
    staff_group ='".addslashes($staff_group)."',
    technician_group ='".addslashes($technician_group)."',
    technician_rank ='".addslashes($technician_rank)."',
    username ='".addslashes($username)."',
    password ='".addslashes($password)."',
    staffregisterlastmodify_by ='".addslashes($staffregisterlastmodify_by)."'

    WHERE  staffregister_id ='".addslashes($staffregister_id)."' ";
     
     
     $query_run = mysqli_query($conn, $query);
     
if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:staff.php");
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>
?>