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
<script src="popper.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="tab.css"/>
</head>
<style>
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

.tooltip{
  position:absolute;
  z-index:1070;
  display:block;
  font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size:12px;
  font-style:normal;
  font-weight:400;
  line-height:1.42857143;
  text-align:left;
  text-align:start;
  text-decoration:none;
  text-shadow:none;
  text-transform:none;
  letter-spacing:normal;
  word-break:normal;
  word-spacing:normal;
  word-wrap:normal;
  white-space:normal;
  filter:alpha(opacity=0);
  opacity:0;
  line-break:auto
}
.tooltip.in{
  filter:alpha(opacity=90);
  opacity:.9
}.tooltip.right{
  padding:0 5px;
  margin-left:3px
}

.tooltip-inner{
  max-width:200px;
  padding:3px 8px;
  color:#fff;
  background-color:#000;
  border-radius:4px
}
.tooltip-arrow{
  position:absolute;
  width:0;
  height:0;
  border-color:transparent;
  border-style:solid
}
.tooltip.top .tooltip-arrow{
  bottom:0;
  left:50%;
  margin-left:-5px;
  border-width:5px 5px 0;
  border-top-color:#000
}
.tooltip.top-left .tooltip-arrow{
  right:5px;
  bottom:0;
  margin-bottom:-5px;
  border-width:5px 5px 0;
  border-top-color:#000
}
.tooltip.top-right .tooltip-arrow{
  bottom:0;
  left:5px;
  margin-bottom:-5px;
  border-width:5px 5px 0;
  border-top-color:#000
}
.tooltip.right .tooltip-arrow{
  top:50%;
  left:0;
  margin-top:-5px;
  border-width:5px 5px 5px 0;
  border-right-color:#000
}
.tooltip.left .tooltip-arrow{
  top:50%;right:0;
  margin-top:-5px;
  border-width:5px 0 5px 5px;
  border-left-color:#000
}
.tooltip.bottom .tooltip-arrow{
  top:0;left:50%;
  margin-left:-5px;
  border-width:0 5px 5px;
  border-bottom-color:#000
}
.tooltip.bottom-left .tooltip-arrow{
  top:0;right:5px;
  margin-top:-5px;
  border-width:0 5px 5px;
  border-bottom-color:#000
}
.tooltip.bottom-right .tooltip-arrow{
  top:0;left:5px;margin-top:-5px;
  border-width:0 5px 5px;border-bottom-color:#000
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
		
 <form id="techacc_form" method="post">
 <div class="input-boxAccessories" id="input_fields_wrapAccessories">
     
     <div id="mesej" class="alerts"></div>
<div>

<form class="form-inline" id="frm-add-data" action="javascript:void(0)">


      <?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="model">
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

      $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }
  
?>
 
<table id="employee_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">
    <!-- <table id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table"> -->
   <thead>
      <tr>
        <th>No</th>
         <th>Code</th>
         <th>Name</th>
         <th>Quantity</th>
      </tr>
   </thead>
  
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
        <td></td>
        <td><label><a href="#" class="hover" id="<?php echo $res["accessories_id"]; ?>"><?php echo $res["accessories_code"]; ?></a></label></td>
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['accessories_name'];?>"><?php echo $res['accessories_name'];?></td>
         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['accessories_quantity'];?>"><?php echo $res['accessories_quantity'];?></td>
         <td><span class='delete' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
      </tr>
	  <?php endforeach;?>
  
   </tbody>
    
</table>

<!-- <button onclick="javascript:void(0);" class="add_button" title="Add field">Add</button> -->
<a href="javascript:void(0);" class="add_button" title="Add field" type="button">Click Here to Add Accessories</a>
	
</form>

</div>  
<div class="btn-box">
<p class="control"><b id="mesej"></b></p>
<input type="button" id="update_techacc" name="update_techacc" value="Update" />
<!-- <button type="submit" name="save" value="update">Update</button> -->
</form></div>   

<script>
    $(document).ready(function () {
        $('#update_techacc').click(function () {
            var data = $('#techacc_form').serialize() + '&update_techacc=update_techacc';
            $.ajax({
                url: 'addaccessoriestech.php',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#mesej').text(response);
                    $('#s_accessories_id').text('');
                    $('#s_accessories_code').text('');
                    $('#s_accessories_name').text('');
                    $('#s_accessories_quantity').text('');
                   
                }
            });
        });
    });
</script>

<script>
  $(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('id');
 
   var confirmalert = confirm("Are you sure?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'delete-ajax-acc.php',
        type: 'POST',
        data: { id:deleteid },
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

<script>
 $(document).ready(function(){

  $('.hover').tooltip({
   title: fetchData,
   html: true,
   placement: 'right'
  });

  function fetchData()
  {
   var fetch_data = '';
   var element = $(this);
   var accessories_id = element.attr("id");
   $.ajax({
    url:"fetch-hover.php",
    method:"POST",
    async: false,
    data:{accessories_id:accessories_id},
    success:function(data)
    {
     fetch_data = data;
    }
   });   
   return fetch_data;
  }
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
					url: "server-tech.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#mesej").removeClass('alerts-danger');
							$("#mesej").addClass('alerts-success').html(response.message);
						} else {
							$("#mesej").removeClass('alerts-success');
							$("#mesej").addClass('alerts-danger').html(response.message);
						}
					}   
				});
	});
});

</script>

<script>

    $(document).on('change', '[name="accessoriesModel[]"]', function(){ 

  var accessories_id = $(this).val(); 
  var model = $(this).parent('.model');
if (accessories_id != '') {
        $.ajax({  
            url:"getcode.php",  
            method:"POST",  
            data: { accessories_id:accessories_id },
            dataType:"json",  
            success:function(result){  
              
                // $(this).parents('.model').find('[name="accessories_id[]"]').val(accessories_id);
                // $(this).parents('.model').find('[name="accessories_code[]"]').val(result.accessories_code);
                // $(this).parents('.model').find('[name="accessories_name[]"]').val(result.accessories_name);
                model.find(".accessories_id").val(accessories_id);
                model.find(".accessories_code").val(result.accessories_code);
                model.find(".accessories_name").val(result.accessories_name);
            }
        })
    }
    
    
});
	</script>

   <!--Accessories add-->
  <script type="text/javascript">

		$(document).ready(function () {

			var maxField = 100; // Total 100 product fields we add

			var addButton = $('.add_button'); // Add more button selector

			var wrapper = $('.model'); // Input fields wrapper

			var fieldHTML = `

		<div class="field-element">
   
        <div class="model">
         <?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {

        $jobregister_id =$_POST['jobregister_id'];

        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<div class="model">
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
 </div>

 <?php
            }
        }
        }
 ?>
<select class="accessoriesModel" name="accessoriesModel[]"><option value=""> Select Accessories Code </option>
<?php include "dbconnect.php";  // Using database connection file here
                    $records = mysqli_query($db, "SELECT accessories_code, accessories_name, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                     {
                         
                     echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";  // displaying data in option menu
                     }	
  ?>   
</select>
<input type="hidden" name="accessories_id[]" class="accessories_id">
<input type="text" class="accessories_code" name="accessories_code[]" placeholder="Accessories Code">
<input type="text" class="accessories_name" name="accessories_name[]" placeholder="Accessories Name">
<input type="text" class="accQuan" name="accessories_quantity[]" placeholder="Accessories Quantity">

					
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
				$(this).parent().closest(".field-element").remove();
				x--; //Decrement field counter
			});
		});
</script>