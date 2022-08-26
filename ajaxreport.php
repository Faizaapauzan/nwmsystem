<?php session_start(); ?>

<!DOCTYPE html>
<html lang=”en”>
<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/tab.css"/>
	<link href="css/ajax.css"rel="stylesheet" />
	<link href="css/technicianmain.css"rel="stylesheet" />
</head>

<style>
  
.status{
  float:none;
}

</style>

<body>
    
    <?php
        //include connection file 
        include_once("dbconnect.php");
        if (isset($_POST['jobregister_id'])) {
        $jobregister_id =$_POST['jobregister_id'];
        $sql = "SELECT * FROM `job_register` WHERE  jobregister_id ='$jobregister_id'";
        $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
        }
    ?>

    <?php
        // Return current date from the remote server
        $date = date('d-m-Y');
    ?>
    
    <table id="date_grid" class="table table-condensed table-hover table-striped bootgrid-table" width="80%" cellspacing="0">
    <!-- <table id="employee_grid" class="table table-condensed table-hover table-striped bootgrid-table"> -->
        
    <p class="controls"><b id="msgdate"></b></p>
    <tbody id="_editable_table">
        <?php foreach($queryRecords as $res) :?>
            <tr data-row-id="<?php echo $res['jobregister_id'];?>">
            <td style="display:none;"></td>
            <td><label>Service Report Date :</label><?php echo $date; ?></td>
            <td><button class="userinfo btn btn-success" type="button" data-id='<?php echo $res['jobregister_id']; ?>' data-custname='<?php echo $res['customer_name']; ?>' data-machine_name='<?php echo $res['machine_name']; ?>' data-requested_date='<?php echo $res['requested_date']; ?>'>NEW</button></td>
            <td><button class="useredit btn btn-success" type="button" style="background:#081d45;border: #081d45;" data-id2='<?php echo $res['jobregister_id']; ?>'>EDIT</button></td>
            </tr>
        <?php endforeach;?>
    </tbody>
    </table>
    
    <!-- FOR NEW SERVICE REPORT-->	
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.userinfo').click(function(){
                var jobregister_id = $(this).data('id');
                var customer_name = $(this).data('custname');
                var machine_name = $(this).data('machine_name');
                var requested_date = $(this).data('requested_date');
            $.ajax({
                    url: 'servicereport.php',
                    type: 'post',
                    data: {jobregister_id: jobregister_id, 
                            customer_name:customer_name,
                             machine_name:machine_name,
                           requested_date:requested_date},
                    success: function(data) {
                        var win = window.open('servicereport.php');
                        win.document.write(data);
                    }
                    });
            });
        });
    </script>
    <!-- FOR NEW SERVICE REPORT-->	

    <!-- FOR EDIT SERVICE REPORT-->	
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.useredit').click(function(){
                var jobregister_id = $(this).data('id2');
                $.ajax({
                    url: 'servicereportEDIT.php',
                    type: 'post',
                    data: {jobregister_id: jobregister_id},
                    success: function(data){
                        var win = window.open('servicereportEDIT.php');
                        win.document.write(data);
                    }
                });
            });
        });
    </script>
    <!-- FOR EDIT SERVICE REPORT-->
    
</body>
</html>