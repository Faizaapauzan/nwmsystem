<?php
    include 'dbconnect.php';

    $technician_departure = mysqli_real_escape_string($conn, $_POST['technician_departure']);
    $technician_arrival = mysqli_real_escape_string($conn, $_POST['technician_arrival']);
    $technician_leaving = mysqli_real_escape_string($conn, $_POST['technician_leaving']);
    $tech_out = mysqli_real_escape_string($conn, $_POST['tech_out']);
    $tech_in = mysqli_real_escape_string($conn, $_POST['tech_in']);
    $jobregister_id = mysqli_real_escape_string($conn, $_POST['jobregister_id']);

    $sql = "UPDATE job_register SET 
            technician_departure='$technician_departure', 
            technician_arrival='$technician_arrival', 
            technician_leaving='$technician_leaving',
            tech_out='$tech_out', 
            tech_in='$tech_in'  
            WHERE jobregister_id='$jobregister_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo 'Data has been updated successfully';
    } 
    
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>
