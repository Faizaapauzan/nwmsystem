<?php
session_start();

?>


 <?php
        $db = mysqli_connect("localhost","root","","nwmsystem");
        if(!$db)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>


<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="tab.css"/>

</head>
<style>

  
/*Remark*/
  .input-boxRemark i{
    position: absolute;
    margin-top: 20px;
    margin-left: 600px;
    font-size: 20px;
    cursor: pointer;

  }

  .input-boxRemark input{
    margin-bottom: 15px;
    width: calc(100% / 2 - 15px);
    padding: 0 15px 0 15px;
    height: 45px;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 25px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    border-color: #081D45;
    margin-right: 10px;
    
  }

  form .input-boxRemark {
    width: 100%;
    margin-left: 12px;
  }

  form .tech-details .input-boxRemark{
      margin-bottom: 15px;
    }

  .remove_field {
    position: absolute;
    /*margin-left: 50px;*/
    margin-top: 10px;
    color: #000;
    font-size: 35px;
  }
  
  .input-boxRemark i:hover,
  .input-boxRemark i:focus {
    opacity: 0.8;
    cursor: pointer;
  }

  .remove_field:hover,
  .remove_field:focus {
    color: red;
    cursor: pointer;
  }
  
  /*Accessories*/
  .input-boxAccessories i{
    position: absolute;
    margin-top: 20px;
    margin-left: 590px;
    font-size: 20px;
    cursor: pointer;

  }

  .input-boxAccessories input, .input-boxAccessories select{
    margin-bottom: 15px;
    width: calc(100% / 4 - 20px);
    padding: 0 15px 0 15px;
    height: 45px;
    outline: none;
    font-size: 13px;
    border-radius: 5px;
    padding-left: 25px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    border-color: #081D45;
    margin-right: 10px; 
  }

  form .input-boxAccessories {
    width: 100%;
    margin-left: 12px;
  }

  form .tech-details .input-boxAccessories{
      margin-bottom: 15px;
  }

  .input-boxAccessories i:hover,
  .input-boxAccessories i:focus {
    opacity: 0.8;
    cursor: pointer;
  }

  .dropDown i{
    left: 10px;
  }

.content{
    border: 1px solid black;
    padding: 5px;
    margin-bottom: 5px;
}
.content span{
    width: 250px;

}

.content span:hover{
    cursor: pointer;
}

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

</style>

<body>
<!-- <div class="container" style="padding:50px 250px;"> -->
		
 <form id="remark_form" method="post">
 <div class="input-boxRemark" id="input_fields_wrap">
    
     <div id="msg" class="alert"></div>
<div>

<form class="remark-inline" id="frm-add-remark" action="javascript:void(0)">


      <?php

include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="remark">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>


 <?php
//include connection file 
include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `technician_remark` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }
  
?>
 
<table id="remark_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">
    <!-- <table id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table"> -->
   <thead>
      <tr>
        <th>No</th>
         <th>Remark</th>
         <th>Solution</th>
      </tr>
   </thead>
  
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
        <td></td>
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['remark_desc'];?>"><?php echo $res['remark_desc'];?></td>
         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['remark_solution'];?>"><?php echo $res['remark_solution'];?></td>
         <td><span class='deletes' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
      </tr>
	  <?php endforeach;?>
  
   </tbody>
    
</table>

<!-- <button onclick="javascript:void(0);" class="add_button" title="Add field">Add</button> -->

<a href="javascript:void(0);" class="add_remark" title="Add remark" type="button">Click Here to Add Remark</a>
	
</form>

</div>  
<div class="btn-box">
<p class="control"><b id="message"></b></p>
<input type="button" id="update_remark" name="update_remark" value="Update" />
<!-- <button type="submit" name="update" value="update">Update</button> -->
</form></div>  


<!-- FOR SAVE WITHOUT SUBMIT -->

<script>
    $(document).ready(function () {
        $('#update_remark').click(function () {
            var data = $('#remark_form').serialize() + '&update_remark=update_remark';
            $.ajax({
                url: 'remarkindex.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#message').text(response);
                    $('#s_remark_desc').text('');
                    $('#s_remark_solution').text('');
               
                }
            });
        });
    });
</script>


<!-- FOR DELETE -->

<script>
  $(document).ready(function(){

 // Delete 
 $('.deletes').click(function(){
   var el = this;
  
   // Delete id
   var deletesid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete-ajax-remark.php',
        type: 'POST',
        data: { id:deletesid },
        success: function(response){

          if(response == 1){
	    // Remove row from HTML Table
	    $(el).closest('tr').css('background','tomato');
	    $(el).closest('tr').fadeOut(800,function(){
	       $(this).remove();
	    });
          }else{
	    alert('Invalid ID.');
          }

        }
      });
   }

 });

});

</script>

<!-- FOR EDIT DATA BASED ON DATA ROW ID -->

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
					url: "server-remark.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#msg").removeClass('alert-danger');
							$("#msg").addClass('alert-success').html(response.msg);
						} else {
							$("#msg").removeClass('alert-success');
							$("#msg").addClass('alert-danger').html(response.msg);
						}
					}   
				});
	});
});

</script>

<!-- FOR ADD MULTIPLE REMARKS -->

   <!--Accessories add-->
  <script type="text/javascript">

		$(document).ready(function () {

			var maxField = 10; // Total 100 product fields we add

			var addButton = $('.add_remark'); // Add more button selector

			var wrapper = $('.remark'); // Input fields wrapper

			var fieldHTML = `

		<div class="remark-element">
   
        <div class="remark">
         <?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {

        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="remark">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>

 <div>

<input type="text" class="remark_desc" name="remark_desc[]" placeholder="Enter Problem">
<input type="text" class="remark_solution" name="remark_solution[]" placeholder="Enter Solution">
<br></div>
					
<a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a></div></div>

					
				`; //New input field html 

			var x = 1; //Initial field counter is 1

			$(addButton).click(function () {
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					$(wrapper).append(fieldHTML);
				}
			});

			//Once remove button is clicked
			$(wrapper).on('click', '.remove_button', function (e) {
				e.preventDefault();
				$(this).parent().closest(".remark-element").remove();
				x--; //Decrement field counter
			});
		});
</script>