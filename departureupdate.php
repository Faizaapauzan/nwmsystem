<?php
    include 'dbconnect.php';

    $jobregister_id = mysqli_real_escape_string($conn, $_POST['jobregister_id']);
    $job_status = mysqli_real_escape_string($conn, $_POST['job_status']);
    $departure_timestamp = mysqli_real_escape_string($conn, $_POST['departure_timestamp']);

    $sql = "UPDATE job_register SET 
            job_status='$job_status', 
            departure_timestamp='$departure_timestamp' 
            WHERE jobregister_id='$jobregister_id'";
    
    if (mysqli_query($conn, $sql)) {
       
    } 
    
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
