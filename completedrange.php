<?php
    require "dbconnect.php";
    
    if (isset($_POST["search"])) {
    $jobregister_id = $_POST["search"];

    $date1 = date("Y-m-d", strtotime($_POST["date1"]));
    $date2 = date("Y-m-d", strtotime($_POST["date2"]));
    ($query = mysqli_query($conn,"SELECT * FROM job_register WHERE job_status = 'Completed' AND `today_date` BETWEEN '$date1' AND '$date2'")) 
    
    or die(mysqli_error($conn));

    $row = mysqli_num_rows($query);
    if ($row > 0) {
        $i = 1;
        while ($fetch = mysqli_fetch_array($query)) { 
?>


    <div class="datalist-wrapper">
        <div class="col-lg-12" style="border: none;">
        <table class="table table-striped sortable">
            <tr>
                <td><?php echo $i; $i++; ?></td>
				<td><?php echo $fetch["job_order_number"]; ?></td>
				<td><?php echo $fetch["customer_name"]; ?></td>
				<td><?php echo $fetch["job_assign"]; ?></td>
				<td><?php echo $fetch["today_date"]; ?></td>
				<td>
					<div class='jobTypeUpdateDeleteBtn'>
						<button data-jobregister_id="<?php echo $fetch["jobregister_id"]; ?>" 
                                data-customer_name="<?php echo $fetch["customer_name"]; ?>" 
                                data-job_assign="<?php echo $fetch["job_assign"]; ?>" 
                                data-requested_date="<?php echo $fetch["requested_date"]; ?>" 
                                class='userinfo' id='btnView' 
                                data-target="doubleClick-completed" 
                                onclick="document.getElementById('doubleClick-completed').style.display='block'">Details
                        </button>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>

<?php 
    } } 
    
    else 
        {
            echo '<tr><td colspan = "4"><center>Record Not Found</center></td></tr>';
        }
    } 
    
    else 
        {
            ($query = mysqli_query($conn,"SELECT * FROM job_register WHERE job_status = 'Completed'")) or die(mysqli_error($conn));
            $row = mysqli_num_rows($query);
            if ($row > 0) {
                $i = 1;
                while ($fetch = mysqli_fetch_array($query)) { 
?>
            <tr>
                <td><?php echo $i; $i++; ?></td>
                <td><?php echo $fetch["job_order_number"]; ?></td>
                <td><?php echo $fetch["customer_name"]; ?></td>
                <td><?php echo $fetch["job_assign"]; ?></td>
                <td><?php echo $fetch["today_date"]; ?></td>
                <td>
                    <div class='jobTypeUpdateDeleteBtn'>
                        <button data-jobregister_id="<?php echo $fetch["jobregister_id"]; ?>" 
                                class='userinfo' id='btnView' 
                                data-target="doubleClick-completed" 
                                onclick="document.getElementById('doubleClick-completed').style.display='block'">Details</button>
                    </div>
                </td>
            </tr>

<?php } } } ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('table').DataTable();

	});
</script>

<!--Completed PopUp Modal-->
<div id="doubleClick-completed" class="modal">
	<div class="tabCompleted">

        <!-- Job Info PopUp Modal -->
		<input type="radio" name="tabDoingCompleted" id="tabDoingCompleted" checked="checked">
		<label for="tabDoingCompleted" class="tabHeadingComplete">Job Info</label>
		<div class="tabC" id="completedJobInfoTab">
			<div class="contentCompletedJobInfo">
				<div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
				<form action="AdminCompletedJobInfo.php" method="post">
					<div class="completed-details">

					</div>
				</form>
			</div>
		</div>

		<script type='text/javascript'>
			$(document).ready(function() {
				$('.userinfo').click(function() {
					var jobregister_id = $(this).data('jobregister_id');
					// AJAX request
					$.ajax({
						url: 'AdminCompletedJobInfo.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {

							// Add response in Modal body
							$('.completed-details').html(response);
							// Display Modal
							$('#doubleClick-completed').modal('show');
						}
					});
				});
			});
		</script>

        <!--Job Assign PopUp Modal-->
		<input type="radio" name="tabDoingCompleted" id="tabDoingCompleted2">
		<label for="tabDoingCompleted2" class="tabHeadingComplete">Job Assign</label>
		<div class="tabC" id="completedJobInfoTab">
			<div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
			<form action="jobassignAdminCOMPLETED.php" method="post">
				<div class="completed-JobAssign">

				</div>
			</form>
		</div>

		<script type='text/javascript'>
			$(document).ready(function() {
				$('.userinfo').click(function() {
					var jobregister_id = $(this).data('jobregister_id');
					// AJAX request
					$.ajax({
						url: 'jobassignAdminCOMPLETED.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {
							// Add response in Modal body
							$('.completed-JobAssign').html(response);
							// Display Modal
							$('#doubleClick-completed').modal('show');
						}
					});
				});
			});
		</script>

		<!--Update PopUp Modal-->
		<input type="radio" name="tabDoingCompleted" id="tabDoingCompleted3">
		<label for="tabDoingCompleted3" class="tabHeadingComplete">Update</label>
		<div class="tabC" id="completedJobInfoTab">
			<div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
			<form action="ajaxtechupdatecomplete.php" method="post">
				<div class="completed-update">

				</div>
			</form>
		</div>

		<script type='text/javascript'>
			$(document).ready(function() {
				$('.userinfo').click(function() {
					var jobregister_id = $(this).data('jobregister_id');
					// AJAX request
					$.ajax({
						url: 'ajaxtechupdatecomplete.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {
							// Add response in Modal body
							$('.completed-update').html(response);
							// Display Modal
							$('#doubleClick-completed').modal('show');
						}
					});
				});
			});
		</script>

		<!--Accessories PopUp Modal-->
		<input type="radio" name="tabDoingCompleted" id="tabDoingCompleted4">
		<label for="tabDoingCompleted4" class="tabHeadingComplete">Accessories</label>
		<div class="tabC" id="completedJobInfoTab">
			<div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
			<form action="ajaxtabaccessories.php" method="post">
				<div class="completed-accessories">

				</div>
			</form>
		</div>

		<script type='text/javascript'>
			$(document).ready(function() {
				$('.userinfo').click(function() {
					var jobregister_id = $(this).data('jobregister_id');
					// AJAX request
					$.ajax({
						url: 'ajaxtabaccessoriescomplete.php',
						type: 'post',
						data: {
							jobregister_id: jobregister_id
						},
						success: function(response) {
							// Add response in Modal body
							$('.completed-accessories').html(response);
							// Display Modal
							$('#doubleClick-completed').modal('show');
						}
					});
				});
			});
		</script>

		<!--Photo PopUp Modal-->
		<input type="radio" name="tabDoingCompleted" id="tabDoingCompleted5">
		<label for="tabDoingCompleted5" class="tabHeadingComplete">Photo</label>
		<div class="tabC" id="completedJobInfoTab">
			<div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
			<form action="ajaxtechphtoupdtcomplete.php" method="post">
				<div class="completed-photos">

				</div>
			</form>
		</div>

		<script type='text/javascript'>
			$(document).ready(function() {
				$('.userinfo').click(function() {
					var jobregister_id = $(this).data('jobregister_id');
					// AJAX request
					$.ajax({
						url: 'ajaxtechphtoupdtcomplete.php',
						type: 'post',
						data: {jobregister_id: jobregister_id},
						success: function(response) {
							// Add response in Modal body
							$('.completed-photos').html(response);
							// Display Modal
							$('#doubleClick-completed').modal('show');
						}
					});
				});
			});
		</script>

		<!--Video PopUp Modal-->
		<input type="radio" name="tabDoingCompleted" id="tabDoingCompleted6">
		<label for="tabDoingCompleted6" class="tabHeadingComplete">Video</label>
		<div class="tabC" id="completedJobInfoTab">
			<div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
			<form action="ajaxtechvideoupdtcomplete.php" method="post">
				<div class="completed-video">

				</div>
			</form>
		</div>

        <script type='text/javascript'>
            $(document).ready(function() {
                $('.userinfo').click(function() {
                    var jobregister_id = $(this).data('jobregister_id');
                    // AJAX request
                    $.ajax({
                        url: 'ajaxtechvideoupdtcomplete.php',
                        type: 'post',
                        data: {jobregister_id: jobregister_id},
                        success: function(response) {
                            // Add response in Modal body
                            $('.completed-video').html(response);
                            // Display Modal
                            $('#doubleClick-completed').modal('show');
                        }
                    });
                });
                });
        </script>

	</div>
</div>

<!-- END OF COMPLETED -->