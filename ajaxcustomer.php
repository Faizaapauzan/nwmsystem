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

$sql = "SELECT * FROM customer_list WHERE customer_id=" . $userid;
$result = $conn->query($sql);

$response = "<table id='ajax' width='100%'>";
while ($row = $result->fetch_assoc()) {
    $customer_id = $row['customer_id'];
    $customer_code = $row['customer_code'];
    $customer_name = $row['customer_name'];
    $customer_grade = $row['customer_grade'];
    $customer_PIC = $row['customer_PIC'];
    $cust_phone1 = $row['cust_phone1'];
    $cust_phone2 = $row['cust_phone2'];
    $cust_address1 = $row['cust_address1'];
    $cust_address2 = $row['cust_address2'];
    $cust_address3 = $row['cust_address3'];
    $customercreated_by = $row['customercreated_by'];
    $customercreated_at = $row['customercreated_at'];
    $customerlasmodify_by = $row['customerlasmodify_by'];
    $customerlasmodify_at  = $row['customerlasmodify_at'];


    $response .= "<tr>";
    $response .= "<td>ID : </td><td>" . $customer_id . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Code : </td><td>" . $customer_code . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Name : </td><td>" . $customer_name . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Grade : </td><td>" . $customer_grade . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>PIC : </td><td>" . $customer_PIC . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Phone 1 : </td><td>" . $cust_phone1 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Phone 2 : </td><td>" . $cust_phone2 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Address 1 : </td><td>" . $cust_address1 . "</td>";
    $response .= "</tr>";

     $response .= "<tr>";
    $response .= "<td>Address 2 : </td><td>" . $cust_address2 . "</td>";
    $response .= "</tr>";

     $response .= "<tr>";
    $response .= "<td>Address 3 : </td><td>" . $cust_address3 . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created By : </td><td>" . $customercreated_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Created At : </td><td>" . $customercreated_at . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify By : </td><td>" . $customerlasmodify_by . "</td>";
    $response .= "</tr>";

    $response .= "<tr>";
    $response .= "<td>Last Modify At : </td><td>" . $customerlasmodify_at . "</td>";
    $response .= "</tr>";
}
$response .= "</table>";



echo $response;
exit;
