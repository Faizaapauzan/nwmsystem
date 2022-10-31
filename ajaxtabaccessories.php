<?php
session_start();

?>


 <?php
include 'dbconnect.php';
    ?>


<!DOCTYPE html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="css/tab.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

</head>

<style>

.tooltip {
z-index: 1000000;
  background-color: black;
  width: 360px;
  opacity: 1;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
}

</style>
<body>
		
 <form id="adminacc_form" method="post">
 <div class="input-boxAccessories" id="input_fields_wrapAccessories">
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
 
<table style="box-shadow: 0 5px 10px #f7f7f7; margin-left: -6px; margin-top: -18px;" id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="60%" cellspacing="0">
   <thead>
      <tr>
        <th>No</th>
        <th>Code</th>
        <th>Name</th>
        <th>UOM</th>
        <th>Quantity</th>
      </tr>
   </thead>
  
   <tbody id="_editable_table">
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
        <td></td>
        <td><a style="color: blue; cursor: pointer;"  data-toggle="tooltip" class="hover" id="<?php echo $res["accessories_id"]; ?>"><?php echo $res["accessories_code"]; ?></a></td>
         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['accessories_name'];?>"><?php echo $res['accessories_name'];?></td>
          <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['accessories_uom'];?>"><?php echo $res['accessories_uom'];?></td>
         <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $res['accessories_quantity'];?>"><?php echo $res['accessories_quantity'];?></td>
         <td><span class='delete' data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
      </tr>
	  <?php endforeach;?>
  
</tbody>
</table>

<a href="javascript:void(0);" class="add_button" title="Add field" type="button">Click Here to Add Accessories</a>
	
</form>

</div>  

 <div class="updateBtn">
<p class="control"><b id="accessoriesmessage"></b></p>
<input type="button" id="update_acc" name="update_acc" value="Update" />
</form></div>   

<script>
    $(document).ready(function () {
        $('#update_acc').click(function () {
            var data = $('#adminacc_form').serialize() + '&update_acc=update_acc';
            $.ajax({
                url: 'addaccessoriesindex.php',
                type: 'post',
                data: data,
                success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#accessoriesmessage').html('<span style="color: green">Update Success</span>');
                        else
                          $('#accessoriesmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
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

  $('[data-toggle="tooltip"]').tooltip({
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
					url: "server.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#accessoriesmessage").removeClass('alert-danger');
							$("#accessoriesmessage").addClass('alert-success').html(response.accessoriesmessage);
						} else {
							$("#accessoriesmessage").removeClass('alert-success');
							$("#accessoriesmessage").addClass('alert-danger').html(response.accessoriesmessage);
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
              
                model.find(".accessories_id").val(accessories_id);
                model.find(".accessories_code").val(result.accessories_code);
                model.find(".accessories_name").val(result.accessories_name);
                model.find(".accessories_uom").val(result.accessories_uom);
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
         <?php include 'dbconnect.php';

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
 
 <select style="width: 90%;"  id="select_box" class="accessoriesModel" name="accessoriesModel[]"> <option value=""> Select Accessories Code </option>
<?php include "dbconnect.php";  // Using database connection file here
                    $records = mysqli_query($conn, "SELECT accessories_code, accessories_name, accessories_uom, accessories_id  From accessories_list ORDER BY accessorieslistlasmodify_at DESC");  // Use select query here 

                    while($data = mysqli_fetch_array($records))
                     {
                         
                     echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. "      -      " . $data['accessories_name']."</option>";  // displaying data in option menu
                     }	
  ?>   
</select>
<div id="results">
<input type="hidden" name="accessories_id[]" class="accessories_id">
<input type="text" id="codes" class="accessories_code" name="accessories_code[]" placeholder="Accessories Code">
<input type="text" class="accessories_name" name="accessories_name[]" placeholder="Accessories Name">
<input type="text" class="accessories_uom" name="accessories_uom[]" placeholder="Unit of Measurement">
<input type="text" class="accQuan" name="accessories_quantity[]" placeholder="Accessories Quantity">
</div>
					
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


<script>

    $(document).ready(function () {
      $("#accessoriesModel[]").selectize({
          sortField: 'text'
      });
  });

  </script>





