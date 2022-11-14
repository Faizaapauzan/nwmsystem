<?php
	require 'dbconnect.php';
	if(ISSET($_POST['search'])){

         $jobregister_id =$_POST['search'];

		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM job_register INNER JOIN servicereport ON job_register.jobregister_id = servicereport.jobregister_id WHERE `date` BETWEEN '$date1' AND '$date2'") or die(mysqli_error($conn));
		
        $row=mysqli_num_rows($query);
		if($row>0){
            $i = 1;
			while($fetch=mysqli_fetch_array($query)){
?>

        <div class="datalist-wrapper">    
        <div class="col-lg-12" style="border: none;">

         <table class="table table-striped sortable">


	<tr>
        <td><?php echo $i; $i++;?></td>
		<td><?php echo $fetch['job_order_number']?></td>
		<td><?php echo $fetch['customer_name']?></td>
		<td><?php echo $fetch['requested_date']?></td>
        <td><?php echo $fetch['date']?></td>
        <td><?php echo $fetch['srvcreportnumber']?></td>
        <td><div class='jobTypeUpdateDeleteBtn'>
        <button data-id="<?php echo $fetch["jobregister_id"]; ?>" data-id3="<?php echo $fetch["servicereport_id"]; ?>"  class='viewinfo' id='btnView' data-target="onClick-View"  onclick="document.getElementById('onClick-View').style.display='block'">View</button>
        <button class="userinfo btn btn-success" type="button" id='btnEdit' data-id='<?php echo $fetch['servicereport_id']; ?>' data-id2='<?php echo $fetch['jobregister_id']; ?>' style="color: #ffffff;">Print</button>
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
            $row=mysqli_num_rows($query);        
            if ($row>0) {
            $i = 1;
            while ($fetch=mysqli_fetch_array($query)) {
                ?>


	<tr>
       
        <td><?php echo $i; $i++;?></td>
		<td><?php echo $fetch['job_order_number'];?></td>
		<td><?php echo $fetch['customer_name']?></td>
		<td><?php echo $fetch['requested_date']?></td>
        <td><?php echo $fetch['date']?></td>
        <td><?php echo $fetch['srvcreportnumber']?></td>
        <td>
            <div class='jobTypeUpdateDeleteBtn'>
            <button data-id="<?php echo $fetch["jobregister_id"]; ?>" data-id3="<?php echo $fetch["servicereport_id"]; ?>" class='viewinfo' id='btnView' data-target="onClick-View"  onclick="document.getElementById('onClick-View').style.display='block'">View</button>
            <button class="userinfo btn btn-success" type="button" id='btnEdit' data-id='<?php echo $fetch['servicereport_id']; ?>' data-id2='<?php echo $fetch['jobregister_id']; ?>' style="color: #ffffff;">Print</button>
        <button type="button" class="deletebtn" id='btnDelete' data-id='<?php echo $fetch['servicereport_id']; ?>'>Delete</button>    
        </div>
        </td>
	</tr>
  
<?php
            }
        } } 
        ?>



        <script type="text/javascript">
    $(document).ready(function(){
        $('table').DataTable();

    });

</script>

 <!--Double click Job Info (View Button) -->
    <div id="onClick-View" class="modal">
    <div class="tabView">

        <input type="radio" name="tabViewInfo" id="tabViewInfo1" checked="checked">
        <label for="tabViewInfo1" class="tabHeadingView"> Job Info </label>
        <div class="tab" id="ViewJobInfoTab">
        <div class="contentViewJobInfo">
        <div style="right: 540px; top: -7px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('onClick-View').style.display='none'">&times</div>
        <div class="view-details">

        </div></div></div>

        <script type='text/javascript'>
            $(document).ready(function () {
            $('.viewinfo').click(function () {
            var servicereport_id = $(this).data('id3');

            // AJAX request
            $.ajax({
            url: 'ajaxservicereport.php',
            type: 'post',
            data: { servicereport_id: servicereport_id },
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
        <div style="right: 540px; top: -7px;" class="techClose" data-dismiss="modal" onclick="document.getElementById('onClick-View').style.display='none'">&times</div>
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
            url: 'ajaxphotoreport.php',
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

        <!-- FOR PRINT SERVICE REPORT-->	
	    <script type='text/javascript'>
        $(document).ready(function(){
        $('.userinfo').click(function(){
        var servicereport_id = $(this).data('id');
        var jobregister_id = $(this).data('id2');
        $.ajax({
            url: 'servicereportADMIN.php',
            type: 'post',
            data: {servicereport_id: servicereport_id,
                       jobregister_id: jobregister_id},
            success: function(data){
            var win = window.open('servicereportADMIN.php');
            win.document.write(data);
                        }
                    });
                });
            });
    </script>

    <!-- FOR DELETE REPORT -->
  

        <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->

        <div class="MachinePopup">
        <div class="contentMachinePopup">
        <div class="title">Delete Report</div>
        <div class="Machine-details">
        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>

        </div>
        <div class="modal-body">    
                          
        </div></div>

        <script type='text/javascript'>
            $(document).ready(function() {
            $('body').on('click','.deletebtn',function(){ 
              var servicereport_id = $(this).data('id');

            // AJAX request
            $.ajax({
                url: 'deletereport.php',
                type: 'post',
                data: { servicereport_id: servicereport_id },
                success: function(response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                // Display Modal
                $('#empModal').modal('show');
                                    }
                                });
                            });
                        });
        </script>


     
 
