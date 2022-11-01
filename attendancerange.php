<?php
	require 'dbconnect.php';
    $att_date = date("d-m-Y");
    $_SESSION['storeDate'] = $att_date;

	if(ISSET($_POST['search'])){

         $techname =$_POST['search'];

		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM tech_attendance WHERE `att_date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error($conn));
		
        $row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>

	<tr>
        <td></td>
		<td><?php echo $fetch['techname']?></td>
		<td><?php echo $fetch['clock_in']?></td>
		<td><?php echo $fetch['clock_out']?></td>
        <td></td>
        <td></td>
        
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}
	}else{
  
            $query=mysqli_query($conn, "SELECT * FROM tech_attendance WHERE att_date = '{$_SESSION['storeDate']}'") or die(mysqli_error($conn));
            while ($fetch=mysqli_fetch_array($query)) {
                ?>
	<tr>
       
        <td></td>
        
		<td><?php echo $fetch['techname']?></td>
		<td><?php echo $fetch['clock_in']?></td>
		<td><?php echo $fetch['clock_out']?></td>
        <td></td>
        <td></td>
	</tr>
  
<?php
            }
        } ?>

 