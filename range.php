<?php
	require'dbconnect.php';
	if(ISSET($_POST['search'])){

         $jobregister_id =$_POST['search'];


		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM job_register INNER JOIN servicereport ON job_register.jobregister_id = servicereport.jobregister_id WHERE `srvcreportdate` BETWEEN '$date1' AND '$date2'") or die(mysqli_error($conn));
		
        $row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
        <td></td>
		<td><?php echo $fetch['job_order_number']?></td>
		<td><?php echo $fetch['customer_name']?></td>
		<td><?php echo $fetch['requested_date']?></td>
        <td><?php echo $fetch['srvcreportdate']?></td>
        <td><?php echo $fetch['file_name']?></td>
        <td><div class='jobTypeUpdateDeleteBtn'>
        <button data-id="<?php echo $fetch["jobregister_id"]; ?>" class='viewinfo' id='btnView' data-target="onClick-View"  onclick="document.getElementById('onClick-View').style.display='block'">View</button>
        <button class="btn btn-success" id='btnEdit'><a href="servicereport/<?php echo $fetch['file_name']; ?>" download style="color: #ffffff;">Print</button>
        </div>
        </td>
		
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
  
            $query=mysqli_query($conn, "SELECT * FROM job_register INNER JOIN servicereport ON job_register.jobregister_id = servicereport.jobregister_id") or die(mysqli_error($conn));
            while ($fetch=mysqli_fetch_array($query)) {
                ?>
	<tr>
       

        <td></td>
        
		<td><?php echo $fetch['job_order_number'];?></td>
		<td><?php echo $fetch['customer_name']?></td>
		<td><?php echo $fetch['requested_date']?></td>
        <td><?php echo $fetch['srvcreportdate']?></td>
        <td><?php echo $fetch['file_name']?></td>
        <td>
            <div class='jobTypeUpdateDeleteBtn'>
            <button data-id="<?php echo $fetch["jobregister_id"]; ?>" class='viewinfo' id='btnView' data-target="onClick-View"  onclick="document.getElementById('onClick-View').style.display='block'">View</button>
            <button class="btn btn-success" id='btnEdit'><a href="servicereport/<?php echo $fetch['file_name']; ?>" download style="color: #ffffff;">Print</button>
            </div>
        </td>
		
	</tr>
  

<?php
            }
        } ?>


 <!--Double click Job Info (View Button) -->
    <div id="onClick-View" class="modal">
    <div class="tabView">

        <input type="radio" name="tabViewInfo" id="tabViewInfo1" checked="checked">
        <label for="tabViewInfo1" class="tabHeadingView"> Job Info </label>
        <div class="tab" id="ViewJobInfoTab">
        <div class="contentViewJobInfo">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('onClick-View').style.display='none'">&times</div>
        <div class="view-details">

        </div></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.viewinfo').click(function () {
            var jobregister_id = $(this).data('id');

            // AJAX request
            $.ajax({
            url: 'ajaxservicereport.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.view-details').html(response);
            // Display Modal
            $('#onClick-View').modal('show');
                        }
                    });
                });
            });

        </script>

         <!--Double click Photo (View Button) -->

        <input type="radio" name="tabViewInfo" id="tabViewInfo2">
        <label for="tabViewInfo2" class="tabHeadingView"> Media </label>
        <div class="tab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('onClick-View').style.display='none'">&times</div>
        <!-- <form action="ajaxtabaccessories.php" method="post"> -->
        <div class="view-photos">

        </div></div>

        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('.viewinfo').click(function() {
            var jobregister_id = $(this).data('id');                  
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdt.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
            // Add response in Modal body
            $('.view-photos').html(response);
            // Display Modal
            $('#onClick-View').modal('show');
                     }
                        });
                    });
                });
        </script>

     
        
<script type='text/javascript'>
    $(document).ready(function(){
    $('.userinfo').click(function(){
    var jobregister_id = $(this).data('id');
       
       $.ajax({
            url: 'servicereportpage.php?id="',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(data){
            var win = window.open('servicereportpage.php?id="');
            win.document.write(data);
                        }
                    });
                });
            });
            </script>

