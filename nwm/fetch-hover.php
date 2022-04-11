<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <style>
 #display_image{
        width: 150px;
        height: 160px;
        border: 1px solid black;
        background-position: center;
        background-size: cover;
        }
        
        </style>
    </head>


<?php
if(isset($_POST["accessories_id"]))
{
 $connect = mysqli_connect("localhost", "root", "", "nwmsystem");
 $output = '';
 $query = "SELECT * FROM accessories_list WHERE accessories_id='".$_POST["accessories_id"]."'";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $output = '
  <p><img src="image/'.$row['file_name'].'" align="center" width="150px" height="160px" /></p>
  <p><b>Code</b> : '.$row['accessories_code'].'</p>
  <p><b>Name</b> : '.$row['accessories_name'].'</p>
  <p><b>Brand</b> : '.$row['accessories_brand'].'</p>
  <p><b>Description</b> : '.$row['accessories_description'].'</p>
  <p><b>Created by</b> : '.$row['accessorieslistcreated_by'].'</p>
  <p><b>Created at</b> : '.$row['accessorieslistcreated_at'].'</p>
  <p><b>Modify by</b> : '.$row['accessorieslistlasmodify_by'].'</p>
  <p><b>Modify at</b> : '.$row['accessorieslistlasmodify_at'].'</p>

  
  ';
 }
 echo $output;
}
?>

</html>