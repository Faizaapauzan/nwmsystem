<?php
	require'dbconnect.php';
	if(ISSET($_POST['search'])){

        $jobregister_id =$_POST['search'];

		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM job_register WHERE job_status = 'Completed' AND `today_date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error($conn));
		
        $row=mysqli_num_rows($query);
		if($row>0){
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
        <td></td>
		<td><?php echo $fetch['job_order_number']?></td>
		<td><?php echo $fetch['customer_name']?></td>
		<td><?php echo $fetch['job_assign']?></td>
        <td><?php echo $fetch['date']?></td>
        <td><div class='jobTypeUpdateDeleteBtn'>
        <button data-jobregister_id="<?php echo $fetch["jobregister_id"]; ?>" class='userinfo' id='btnView' data-target="doubleClick-completed"  onclick="document.getElementById('doubleClick-completed').style.display='block'">Details</button>
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
  
        $query=mysqli_query($conn, "SELECT * FROM job_register WHERE job_status = 'Completed'") or die(mysqli_error($conn));
            while ($fetch=mysqli_fetch_array($query)) {
                ?>
	<tr>
       
        <td></td>
        
		<td><?php echo $fetch['job_order_number']?></td>
		<td><?php echo $fetch['customer_name']?></td>
		<td><?php echo $fetch['job_assign']?></td>
        <td><?php echo $fetch['today_date']?></td>
        <td>
            <div class='jobTypeUpdateDeleteBtn'>
            <button data-jobregister_id="<?php echo $fetch["jobregister_id"]; ?>" class='userinfo' id='btnView' data-target="doubleClick-completed"  onclick="document.getElementById('doubleClick-completed').style.display='block'">Details</button>
            </div>
        </td>
	</tr>
  

<?php
            }
        } ?>


                <!--Double click Completed -->
    <div id="doubleClick-completed" class="modal">
    <div class="tabCompleted" >

                <input type="radio" name="tabDoingCompleted" id="tabDoingCompleted" checked="checked">
                <label for="tabDoingCompleted" class="tabHeadingComplete"> Job Info </label>
                <div class="tabC" id="completedJobInfoTab">
                <div class="contentCompletedJobInfo">
                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
                <form action="ajaxjobcompleted.php" method="post">
                <div class="completed-details">
               
                </div></form></div></div>

                <script type='text/javascript'>
                    $(document).ready(function() {
                    $('.userinfo').click(function() {
                    var jobregister_id = $(this).data('jobregister_id');
                    // AJAX request
                    $.ajax({
                    url: 'ajaxjobcompleted.php',
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

        <!--Double click Update-->
        <input type="radio" name="tabDoingCompleted" id="tabDoingCompleted2">
        <label for="tabDoingCompleted2" class="tabHeadingComplete">Update</label>
        <div class="tabC" id="completedJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
        <form action="" method="post">
        <div class="completed-update">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.userinfo').click(function () {
            var jobregister_id = $(this).data('jobregister_id');

            // AJAX request
            $.ajax({
            url: 'ajaxtechupdatecomplete.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.completed-update').html(response);
            // Display Modal
            $('#doubleClick-completed').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Remarks-->
        <input type="radio" name="tabDoingCompleted" id="tabDoingCompleted3">
        <label for="tabDoingCompleted3" class="tabHeadingComplete">Remarks</label>
        <div class="tabC" id="completedJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
        <form action="" method="post">
        <div class="completed-remark">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.userinfo').click(function () {
            var jobregister_id = $(this).data('jobregister_id');
            // AJAX request
            $.ajax({
            url: 'ajaxremarkscomplete.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.completed-remark').html(response);
            // Display Modal
            $('#doubleClick-completed').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Accessories -->
        <input type="radio" name="tabDoingCompleted" id="tabDoingCompleted4">
        <label for="tabDoingCompleted4" class="tabHeadingComplete">Accessories</label>
        <div class="tabC" id="completedJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
        <form action="ajaxtabaccessories.php" method="post">
        <div class="completed-accessories">

        </div></form></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.userinfo').click(function () {
            var jobregister_id = $(this).data('jobregister_id');
            // AJAX request
            $.ajax({
            url: 'ajaxtabaccessoriescomplete.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.completed-accessories').html(response);
            // Display Modal
            $('#doubleClick-completed').modal('show');
                        }
                    });
                });
            });

        </script>

        <!--Double click Photo-->
        <input type="radio" name="tabDoingCompleted" id="tabDoingCompleted5">
        <label for="tabDoingCompleted5" class="tabHeadingComplete">Photo</label>
        <div class="tabC" id="completedJobInfoTab">
        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
        <form action="ajaxtechphtoupdt.php" method="post">
        <div class="completed-photos">

        </div></form></div>

                
        <!-- div for doubleclick and tabs -->
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.userinfo').click(function () {
            var jobregister_id = $(this).data('jobregister_id');
            // AJAX request
            $.ajax({
            url: 'ajaxtechphtoupdtcomplete.php',
            type: 'post',
            data: { jobregister_id: jobregister_id },
            success: function (response) {
            // Add response in Modal body
            $('.completed-photos').html(response);
            // Display Modal
            $('#doubleClick-completed').modal('show');
                }
             });
                });
                     });
        </script>

<!-- END OF COMPLETED -->
     
 

