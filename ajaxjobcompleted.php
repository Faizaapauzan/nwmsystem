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

$jobregister_id =$_POST['jobregister_id'];

$sql = "SELECT * FROM job_register WHERE jobregister_id=" . $jobregister_id;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";

while ($row = $result->fetch_assoc()) {
    $jobregister_id = $row['jobregister_id'];
    $job_priority = $row['job_priority'];
    $job_name = $row['job_name'];
    $job_order_number = $row['job_order_number'];
    $job_description = $row['job_description'];
    $delivery_date = $row['delivery_date'];
    $requested_date = $row['requested_date'];
    $job_assign = $row['job_assign'];
    $customer_name = $row['customer_name'];
    $customer_PIC = $row['customer_PIC'];
    $cust_phone1 = $row['cust_phone1'];
    $cust_phone2 = $row['cust_phone2'];
    $cust_address1 = $row['cust_address1'];
    $cust_address2 = $row['cust_address2'];
    $cust_address3 = $row['cust_address3'];
    $machine_type = $row['machine_type'];
    $machine_brand = $row['machine_brand'];
    $Job_assistant = $row['Job_assistant']; 
    $Job_assistant2 = $row['Job_assistant2']; 
    $Job_assistant3 = $row['Job_assistant3']; 
    $Job_assistant4 = $row['Job_assistant4'];    
    $job_description = $row['job_description'];
    $machine_name = $row['machine_name'];
    $jobregistercreated_by = $row['jobregistercreated_by'];
    $jobregistercreated_at = $row['jobregistercreated_at'];
    $jobregisterlastmodify_by = $row['jobregisterlastmodify_by'];
    $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];


    $response .= "<tr>";
    $response .= "<td>Job Priority : </td><td>" . $jobregister_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Order Number : </td><td>" .  $job_order_number . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Name : </td><td>" .  $job_name . "</td>";
    $response .= "</tr>";
    
    $response .= "<tr>";
    $response .= "<td>Requested Date : </td><td>" .  $requested_date . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Delivery Date : </td><td>" .  $delivery_date . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer Name : </td><td>" .  $customer_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer PIC : </td><td>" .  $customer_PIC . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer Address : </td><td>" .  $cust_address1 . "  " .  $cust_address2 . "  " .  $cust_address3 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Contact No : </td><td>" .  $cust_phone1 . " / " .  $cust_phone2 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Name : </td><td>" .  $machine_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Type : </td><td>" .  $machine_type . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Brand : </td><td>" .  $machine_brand . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Assign : </td><td>" .  $job_assign . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Assistant : </td><td>" . $Job_assistant . "  " . $Job_assistant2 . "  " . $Job_assistant3 . "  " . $Job_assistant4 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Job Description : </td><td>" . $job_description . "</td>";
    $response .= "</tr>";

   
}
$response .= "</table>";



echo $response;
exit;
