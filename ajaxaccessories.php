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

        #display_image{
        width: 200px;
        height: 130px;
        border: 1px solid black;
        background-position: center;
        background-size: cover;
        }

    </style>
</head>

</html>

<?php
include "dbconnect.php";

$userid = $_POST['userid'];

$sql = "SELECT * FROM accessories_list WHERE accessories_id=" . $userid;
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
?>

<table table id='ajax' width='100%'>
 
<tr>
<td>ID : </td><td><?php echo $row['accessories_id']; ?></td>
</tr>

<tr>
<td>Code : </td><td><?php echo $row['accessories_code']; ?></td>
</tr>

<tr>
<td>Name : </td><td><?php echo $row['accessories_name']; ?></td>
</tr>

<tr>
<td>Brand : </td><td><?php echo $row['accessories_brand']; ?></td>
</tr>

<tr>
<td>Description : </td><td><?php echo $row['accessories_description']; ?></td>
</tr>

<tr>
<td>Photo : </td> <td><img src="image/<?php echo $row['file_name']; ?> " id="display_image"/></td>
</tr>

<tr>
<td>Created by : </td><td><?php echo $row['accessorieslistcreated_by']; ?></td>
</tr>

<tr>
<td>Created at : </td><td><?php echo $row['accessorieslistcreated_at']; ?></td>
</tr>

<tr>
<td>Modify by : </td><td><?php echo $row['accessorieslistlasmodify_by']; ?></td>
</tr>

<tr>
<td>Modify at : </td><td><?php echo $row['accessorieslistlasmodify_at']; ?></td>
</tr>

</table>

<?php } ?>