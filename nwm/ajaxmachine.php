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

$sql = "SELECT * FROM machine_list WHERE machine_id=" . $userid;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";
while ($row = $result->fetch_assoc()) {
    $machine_id = $row['machine_id'];
    $machine_code = $row['machine_code'];
    $machine_name = $row['machine_name'];
    $machine_type = $row['machine_type'];
    $machine_brand = $row['machine_brand'];
    $serialnumber = $row['serialnumber'];
    $customer_name = $row['customer_name'];
    $purchase_date = $row['purchase_date'];
    $machine_description = $row['machine_description'];
    $machinelistcreated_by = $row['machinelistcreated_by'];
    $machinelistcreated_at = $row['machinelistcreated_at'];
    $machinelistlastmodify_by = $row['machinelistlastmodify_by'];
    $machinelistlastmodify_at  = $row['machinelistlastmodify_at'];

    $response .= "<tr>";
    $response .= "<td>ID : </td><td>" . $machine_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Code : </td><td>" .  $machine_code . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Name : </td><td>" . $machine_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Type : </td><td>" .  $machine_type . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Brand : </td><td>" . $machine_brand . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Serial Number : </td><td>" . $serialnumber . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Customer Name : </td><td>" . $customer_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Purchase Date : </td><td>" . $purchase_date . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Machine Description : </td><td>" . $machine_description . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created By : </td><td>" . $machinelistcreated_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created At : </td><td>" . $machinelistcreated_at . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify By : </td><td>" . $machinelistlastmodify_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify At : </td><td>" . $machinelistlastmodify_at . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";



echo $response;
exit;
