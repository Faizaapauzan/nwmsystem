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
<link href="tab.css"rel="stylesheet" />
</head>

<style>

     .btn-box input {
  height: 30px;
  width:100px;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 13px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: #081d45;
  margin-bottom: 10px;
}


.alerts {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 4px;
}
.alerts h4 {
  margin-top: 0;
  color: inherit;
}
.alerts .alerts-link {
  font-weight: 700;
}
.alerts > p,
.alerts > ul {
  margin-bottom: 0;
}
.alerts > p + p {
  margin-top: 5px;
}
.alerts-dismissable,
.alerts-dismissible {
  padding-right: 35px;
}
.alerts-dismissable .close,
.alerts-dismissible .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit;
}
.alerts-success {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}
.alerts-success hr {
  border-top-color: #c9e2b3;
}
.alerts-success .alerts-link {
  color: #2b542c;
}
.alerts-info {
  color: #31708f;
  background-color: #d9edf7;
  border-color: #bce8f1;
}
.alerts-info hr {
  border-top-color: #a6e1ec;
}
.alerts-info .alerts-link {
  color: #245269;
}
.alerts-warning {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #faebcc;
}
.alerts-warning hr {
  border-top-color: #f7e1b5;
}
.alerts-warning .alerts-link {
  color: #66512c;
}
.alerts-danger {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
}
.alerts-danger hr {
  border-top-color: #e4b9c0;
}
.alerts-danger .alerts-link {
  color: #843534;
}


</style>


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




 
