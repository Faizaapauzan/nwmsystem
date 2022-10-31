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
<link href="css/ajaxtab.css"rel="stylesheet" />

</head>

<body>
		
 <form id="" method="post">
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
 
<table style="box-shadow: 0 5px 10px #f7f7f7;" id="employee_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">
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
        <td><label><a href="#" data-toggle="tooltip" class="fetch" id="<?php echo $res["accessories_id"]; ?>"><?php echo $res["accessories_code"]; ?></a></label></td>
         <td class="editable-col"><?php echo $res['accessories_name'];?></td>
         <td class="editable-col"><?php echo $res['accessories_uom'];?></td>
         <td class="editable-col"><?php echo $res['accessories_quantity'];?></td>
         <td></td>
      </tr>
	  <?php endforeach;?>
  
   </tbody>
    
</table>
	
</form>

</div>  
</form>


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

