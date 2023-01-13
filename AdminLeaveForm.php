<?php
include "dbconnect.php";

// Get the form data
$tech_name = mysqli_real_escape_string($conn, $_POST['tech_name']);
$reason = mysqli_real_escape_string($conn, $_POST['reason']);

// Validate the form data
if (empty($tech_name)) {
    echo "Error: Please enter a name.";
    exit();
}
if (empty($reason)) {
    echo "Error: Please enter a reason.";
    exit();
}

if (empty($_POST['leave_date'])) {
    echo "Error: Please select at least one leave date.";
    exit();
}

// loop through selected dates
foreach (explode(",", $_POST['leave_date']) as $leave_date) {
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "INSERT INTO tech_off (tech_name, reason, leave_date) VALUES (?, ?, ?)");

    // Bind the input parameters
    mysqli_stmt_bind_param($stmt, 'sss', $tech_name, $reason, $leave_date);

    // Execute the statement
    if (!mysqli_stmt_execute($stmt)) {
        echo "Error: " . mysqli_stmt_error($stmt);
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);

// Redirect to the admin page
header("location: AdminLeave.php");
exit();
?>
