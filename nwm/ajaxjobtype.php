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

$sql = "SELECT * FROM jobtype_list WHERE jobtype_id=" . $userid;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";

while ($row = $result->fetch_assoc()) {
    $jobtype_id = $row['jobtype_id'];
    $job_code = $row['job_code'];
    $job_name = $row['job_name'];
    $job_description = $row['job_description'];
    $jobtypecreated_by = $row['jobtypecreated_by'];
    $jobtypecreated_at = $row['jobtypecreated_at'];
    $jobtypelastmodify_by = $row['jobtypelastmodify_by'];
    $jobtypelastmodify_at = $row['jobtypelastmodify_at'];


    $response .= "<tr>";
    $response .= "<td>ID : </td><td>" . $jobtype_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Code : </td><td>" .  $job_code . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Name : </td><td>" .  $job_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Description : </td><td>" . $job_description . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created By : </td><td>" . $jobtypecreated_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created At : </td><td>" . $jobtypecreated_at . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify By : </td><td>" .  $jobtypelastmodify_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify At : </td><td>" . $jobtypelastmodify_at . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";



echo $response;
exit;
