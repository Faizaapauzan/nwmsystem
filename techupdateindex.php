<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'nwmsystem');

    if(isset($_POST['update_tech']))
    {   
        $jobregister_id = $_POST['jobregister_id'];
        
    $technician_departure = $_POST['technician_departure'];
    $technician_arrival = $_POST['technician_arrival'];
    $technician_leaving = $_POST['technician_leaving'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];


        $sql = "UPDATE job_register SET
                        
    technician_departure ='$technician_departure',
    technician_arrival ='$technician_arrival',
    technician_leaving ='$technician_leaving',
    latitude ='$latitude',
    longitude ='$longitude'


WHERE jobregister_id='$jobregister_id'";

       $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
if($query)
{
	echo "Data Saved Successfully";
	
} else {
	echo "Failed to save data";
}
    }
?>