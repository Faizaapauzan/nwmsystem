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

$entry_id = $_POST['entry_id'];

$sql = "SELECT * FROM accessories_inout WHERE inout_id=" . $entry_id;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";

while ($row = $result->fetch_assoc()) {
    $item = $row['accessoriesname'];
    $technician = $row['techname'];
    $out_date = $row['out_date'];
    $quantity = $row['quantity'];
    $remaining = $row['balance'];


    $response .= "<tr>";
    $response .= "<td>Item : </td><td>" . $item . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Technician : </td><td>" .  $technician . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Out Date Time : </td><td>" .  $out_date . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Quantity : </td><td>" . $quantity . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Remaining : </td><td>" . $remaining . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";



echo $response;
exit;
