<?php session_start(); ?>

<!DOCTYPE html>

<head>

<meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>NWM Technician Page</title>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	

</head>

<style>
    .OFF{
        color: red;
    }
</style>

<body>

<?php
include 'dbconnect.php';

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];


        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

 <form class="form" id="assigntechnician_form" method="post">
    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">


  <div class="assign">
    <label for="job_assign">Job Assign To :</label>
  <select disabled class="form-control" id="jobassignto" name="job_assign" onchange="GetJobAss(this.value)"> <option value=""> <?php echo $row['job_assign']?> </option>
                     <?php
        include "dbconnect.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT staffregister_id, username, staff_position, technician_rank, tech_avai FROM staff_register WHERE technician_rank = '1st Leader' OR technician_rank = '2nd Leader' OR staff_position='storekeeper' ORDER BY staffregister_id ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option class='" . $data['tech_avai']."' value='". $data['staffregister_id'] ."'>" .$data['username']. "      -      " . $data['technician_rank']." " . $data['tech_avai']."</option>";  // displaying data in option menu
           
        }	
    ?>
<input type="hidden" id='jobassign' onchange="GetJobAss(this.value)">
<input type="hidden" name="job_assign" id='username' value="<?php echo $row['job_assign']?>">
<input type="hidden" name="technician_rank" id='technician_rank' value="<?php echo $row['technician_rank']?>" readonly>  
<input type="hidden" name="staff_position" id='staff_position' value="<?php echo $row['staff_position']?>" readonly>      
</select>  
</div>

     <?php
//include connection file 
include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql2 = "SELECT * FROM `assistants` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql2) or die("Error to fetch Accessories data");
  }
  
?>

 <div class="assistants" style="padding-top: 25px;" id="multipselect">
    <label for="Job_assistant">Assistants :</label>
    <input type="text" id='assistants' class="form-control" value="<?php foreach($queryRecords as $res) :?><?php echo $res['username'] ?> / <?php endforeach;?>" readonly>      
    <br/>
</div>

<br><br>
<div class="col align-self-end">         		 
         <?php if (isset($_SESSION["username"])) { ; } ?>
         <input type="hidden" name="jobregisterlastmodify_by" id="jobregisterlastmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>	 
   
</div>		 
    </form>
	<br>
  <?php
        }
    }
    ?>

              <?php
            } ?>

</body></html>

        