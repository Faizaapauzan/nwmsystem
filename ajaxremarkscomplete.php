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
<link rel="stylesheet" type="text/css" href="css/tab.css"/>
<link href="css/ajax.css"rel="stylesheet" />

</head>
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
         <td class="editable-col" col-index='1' oldVal ="<?php echo $res['remark_desc'];?>"><?php echo $res['remark_desc'];?></td>
         <td class="editable-col" col-index='2' oldVal ="<?php echo $res['remark_solution'];?>"><?php echo $res['remark_solution'];?></td>
         <td></td>
      </tr>
	  <?php endforeach;?>
  
   </tbody>
    
</table>

<!-- <button onclick="javascript:void(0);" class="add_button" title="Add field">Add</button> -->

<!-- <a href="javascript:void(0);" class="add_remark" title="Add remark" type="button">Click Here to Add Remark</a> -->
	
</form>

</div>  
<!-- <div class="btn-box">
<p class="control"><b id="message"></b></p>
<input type="button" id="update_remark" name="update_remark" value="Update" /> -->
<!-- <button type="submit" name="update" value="update">Update</button> -->
</form>
<!-- </div>   -->

