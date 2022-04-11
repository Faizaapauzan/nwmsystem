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

$sql = "SELECT * FROM staff_register WHERE staffregister_id=" . $userid;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";
while ($row = $result->fetch_assoc()) {
    $staffregister_id = $row['staffregister_id'];
    $username = $row['username'];
    $password = $row['password'];
    $staff_fullname = $row['staff_fullname'];
    $employee_id = $row['employee_id'];
    $staff_phone = $row['staff_phone'];
    $staff_email = $row['staff_email'];
    $staff_department = $row['staff_department'];
    $staff_position = $row['staff_position'];
    $staff_group = $row['staff_group'];
    $technician_group  = $row['technician_group'];
    $staffregistercreated_by = $row['staffregistercreated_by'];
    $staffregistercreated_at = $row['staffregistercreated_at'];
    $staffregisterlastmodify_by = $row['staffregisterlastmodify_by'];
    $staffregisterlastmodify_at = $row['staffregisterlastmodify_at'];


    $response .= "<tr>";
    $response .= "<td>ID : </td><td>" . $staffregister_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Username : </td><td>" . $username . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Full Name : </td><td>" .  $staff_fullname  . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Employee ID : </td><td>" . $employee_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>No. Phone : </td><td>" . $staff_phone . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Email : </td><td>" . $staff_email . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Department : </td><td>" . $staff_department . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Position : </td><td>" . $staff_position . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Group : </td><td>" . $staff_group . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Technician Group : </td><td>" . $technician_group . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created By : </td><td>" . $staffregistercreated_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created At : </td><td>" . $staffregistercreated_at . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify By : </td><td>" . $staffregisterlastmodify_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify At : </td><td>" . $staffregisterlastmodify_at . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";



echo $response;
exit;
