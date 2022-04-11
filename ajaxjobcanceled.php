<!DOCTYPE html>
<html>

<head>
    <style>
        #ajax {
            border: 1px solid #ddd;
            text-align: left;
        }

        #ajax td,
        #ajax th {
            border: 1px solid #ddd;
            text-align: left;
        }

        #ajax {
            border-collapse: collapse;
            width: 100%;
        }

        #ajax td,
        #ajax th {
            padding: 10px;
        }
    </style>
</head>

</html>
<?php
include "dbconnect.php";

$userid = $_POST['userid'];

$sql = "SELECT * FROM job_register WHERE jobregister_id=" . $userid;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";

while ($row = $result->fetch_assoc()) {
    $jobregister_id = $row['jobregister_id'];
    $job_name = $row['job_name'];
    $job_order_number = $row['job_order_number'];
    $job_description = $row['job_description'];
    $requested_date = $row['requested_date'];
    $job_assign = $row['job_assign'];
    $customer_name = $row['customer_name'];
    $customer_PIC = $row['customer_PIC'];
    $machine_name = $row['machine_name'];
    $jobregistercreated_by = $row['jobregistercreated_by'];
    $jobregistercreated_at = $row['jobregistercreated_at'];
    $jobregisterlastmodify_by = $row['jobregisterlastmodify_by'];
    $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];


    $response .= "<tr>";
    $response .= "<td>ID : </td><td>" . $jobregister_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Name : </td><td>" .  $job_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Order Number : </td><td>" .  $job_order_number . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Description : </td><td>" .  $job_description . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Requested Date : </td><td>" .  $requested_date . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Status Job : </td><td>" .  $job_assign . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer Name : </td><td>" .  $customer_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer PIC : </td><td>" .  $customer_PIC . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine name : </td><td>" .  $machine_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created By : </td><td>" . $jobregistercreated_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created At : </td><td>" . $jobregistercreated_at . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify By : </td><td>" .  $jobregisterlastmodify_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify At : </td><td>" . $jobregisterlastmodify_at . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";



echo $response;
exit;
