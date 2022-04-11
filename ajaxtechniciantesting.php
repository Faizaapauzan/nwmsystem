<?php
session_start();

?>


<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];


        $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
    
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
                ?>

<html lang="en">

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Ajax Technician Page</title>
    <link href="css/testing.css"rel="stylesheet" />
	<link href="css/ajaxtechniciantesting.css"rel="stylesheet" />
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	

	
</head>

<body>




<div class="container">

    <input type="hidden" name="jobregister_id" class="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
     <div class="input-box">
            <label for="">Job Priority</label>
            <input type="text" class="jobinfo" name="job_priority" value="<?php echo $row['job_priority']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Job Order Number</label>
            <input type="text" class="jobinfo" name="job_order_number" value="<?php echo $row['job_order_number']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Job Name</label>
            <input type="text" class="jobinfo" name="job_name" value="<?php echo $row['job_name']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Requested date</label>
            <input type="date" class="jobinfo" name="requested_date" value="<?php echo $row['requested_date']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Delivery date</label>
            <input type="date" class="jobinfo" name="delivery_date" value="<?php echo $row['delivery_date']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Customer Name</label>
            <input type="text" class="jobinfo" name="customer_name" value="<?php echo $row['customer_name']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Customer Grade</label>
            <input type="text" class="jobinfo" name="customer_grade" value="<?php echo $row['customer_grade']?>" readonly> 
        </div>
         <div class="input-box">
            <label for="">Job Description</label>
            <textarea name="jobinfo" class="job_description" rows="3" cols="20" readonly><?php echo $row['job_description']?></textarea>
        </div>
       <div class="input-box-address">
            <label for="">Customer Address</label>
            <input type="text" class="jobinfo" name="cust_address1" value="<?php echo $row['cust_address1']?>" readonly>
            <input type="text" class="jobinfo" name="cust_address2" value="<?php echo $row['cust_address2']?>" readonly>
            <input type="text" class="jobinfo" name="cust_address3" value="<?php echo $row['cust_address3']?>" readonly>
            <br/><br/>
        </div>
        <div class="input-box">
            <label for="">Customer PIC</label>
            <input type="text" class="jobinfo" name="customer_PIC" value="<?php echo $row['customer_PIC']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Contact Number 1</label>
            <input type="text" class="jobinfo" name="cust_phone1" value="<?php echo $row['cust_phone1']?>" readonly>
        </div>
         <div class="input-box">
            <label for="">Contact Number 2</label>
            <input type="text" class="jobinfo" name="cust_phone2" value="<?php echo $row['cust_phone2']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Name</label>
            <input type="text" class="jobinfo" name="machine_name" value="<?php echo $row['machine_name']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Type</label>
            <input type="text" class="jobinfo" name="machine_type" value="<?php echo $row['machine_type']?>" readonly>
        </div>
        <div class="input-box">
            <label for="">Machine Brand</label>
            <input type="text" class="jobinfo" name="machine_brand" value="<?php echo $row['machine_brand']?>" readonly> 
        </div>
            
                    <?php

            } ?>

    </div>
    <?php


        }
		
    }
    ?>

	</body>
</html>