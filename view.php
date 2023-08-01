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

        #ajax tr:nth-child(even) {
            background-color: rgba(221, 219, 219, 0.671);
        }
    </style>
</head>

</html>
<?php
include "dbconnect.php";

$inout_id = $_POST['inout_id'];

$sql = "SELECT * FROM accessories_inout WHERE inout_id=" . $inout_id;
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
