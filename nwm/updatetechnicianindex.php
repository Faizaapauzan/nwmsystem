<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'nwmsystem');

     if (isset($_POST['update'])) {
                        $staff_fullname = $_POST['staff_fullname'];
                        $employee_id = $_POST['employee_id'];
                        $technician_rank = $_POST['technician_rank'];
                        $job_ability = $_POST['job_ability'];

       $ability=implode(",",$job_ability);
    {
     
        $query = "UPDATE staff_register SET staff_fullname='$staff_fullname', employee_id='$employee_id', technician_rank='$technician_rank', job_ability='$ability' WHERE staffregister_id='$staffregister_id'";
        $query_run = mysqli_query($connection, $query);
    }

                        // $query = "UPDATE staff_register SET staff_fullname='$staff_fullname', employee_id='$employee_id', technician_rank='$technician_rank', job_ability='$job_ability' WHERE staffregister_id='$staffregister_id'";
                        // $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:technicianlist.php");
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>