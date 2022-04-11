<?php
session_start();

?>

<?php
  include 'dbconnect.php';
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/tab.css"rel="stylesheet" />
<link href="css/ajaxstoreupdate.css"rel="stylesheet" />
</head>

<body>
<!-- <div class="container" style="padding:50px 250px;"> -->

<?php
//include connection file 
include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }
  
?>

 <form id="storeupdate_form" method="post">
          <div id="storesmsg" class="alerts"></div>
<table id="remark_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">

    <!-- <table id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table"> -->
   <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Remarks</th>
        <th>Created At</th>
        <th>Modify At</th>
      </tr>
   </thead>
  
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
        <td><input type="hidden" name="accessories_id" class="accessories_id" value="<?php echo $res['accessories_id'] ?>"><input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $res['jobregister_id'] ?>"></td>
        <td col-index='1' oldVal ="<?php echo $res['accessories_name'];?>"><?php echo $res['accessories_name'];?></td>
        <td col-index='1' oldVal ="<?php echo $res['accessories_quantity'];?>"><?php echo $res['accessories_quantity'];?></td>
        <td><select style="border-color: #081d45; border-radius: 5px; padding-left: 25px; border: 1px solid #ccc; border-bottom-width: 2px; padding: 0 15px 0 15px; height: 25px; outline: none; font-size: 16px;" name='accessories_status[<?=$res['accessories_id']?>]'>
<option value='' <?php if ($res['accessories_status'] == '') { echo "SELECTED"; } ?>></option>
<option value="Ready" <?php if ($res['accessories_status'] == "Ready") { echo "SELECTED";} ?>>Ready</option>
<option value="Not Ready" <?php if ($res['accessories_status'] == "Not Ready") { echo "SELECTED"; } ?>>Not Ready</option>
</select></td>
         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['accessories_remark'];?>"><?php echo $res['accessories_remark'];?></td>
          <td col-index='2' oldVal ="<?php echo $res['accessoriesregister_at'];?>"><?php echo $res['accessoriesregister_at'];?></td>
           <td col-index='2' oldVal ="<?php echo $res['accessoriesmodify_at'];?>"><?php echo $res['accessoriesmodify_at'];?></td>
      </tr>
	  <?php endforeach;?>
  
   </tbody>
    
</table>



<div class="btn-box">
<p class="control"><b id="storemsg"></b></p>
<input type="button" id="update_store" name="update_store" value="Update" />
<!-- <button type="submit" id="submit" name="updating" class="btn btn-primary"> Update Data </button> -->
</form></div> 


<script>
    $(document).ready(function () {
        $('#update_store').click(function () {
            var data = $('#storeupdate_form').serialize() + '&update_store=update_store';
            $.ajax({
                url: 'updatestore.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#storemsg').text(response);
                    $('#accessories_status').text('');
                               
                }
            });
        });
    });
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['index'] = $(this).attr('col-index');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "server-store.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#storesmsg").removeClass('alerts-danger');
							$("#storesmsg").addClass('alerts-success').html(response.message);
						} else {
							$("#storesmsg").removeClass('alerts-success');
							$("#storesmsg").addClass('alerts-danger').html(response.message);
						}
					}   
				});
	});
});

</script>




 
