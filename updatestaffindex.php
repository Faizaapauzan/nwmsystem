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

     $query = "UPDATE staff_register SET staff_fullname='$staff_fullname', employee_id='$employee_id', staff_phone='$staff_phone', staff_email='$staff_email', staff_department='$staff_department', staff_position='$staff_position', staff_group='$staff_group', technician_group='$technician_group', technician_rank='$technician_rank', username='$username', password='$password' WHERE staffregister_id='$staffregister_id'  ";
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