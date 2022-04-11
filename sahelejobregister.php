<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>
    <link href="css/testing.css"rel="stylesheet" />
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	<script src="js/search.js" type="text/javascript"></script>
	
</head>
<body>



<section class="home-section">


    <nav>
        <div class="sidebar-button">
            <i class='bx bx-home'></i>
            <a href="sahele.php"><span class="dashboard">HOME</span></a><br>
        </div>
    </nav>
	



<div class="example" style="margin:auto;max-width:1096px">
    <input type="text" id="search">
    <input type="button" id="button" onmousedown="doSearch(document.getElementById('search').value)" value="Find">
</div>	


<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
                }
            }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
            }
    </script>



<!--TODO-->


<div class="container">


    <div class="column">
            <p class="column-title" id="joblisting">Job Listing</p>
			<?php
				include 'dbconnect.php';
				$results = $conn->query("SELECT
				jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, accessories_required, job_status
				FROM job_register WHERE
				(accessories_required = '' AND job_status = '' AND job_assign = ''
				OR
				accessories_required = 'NO' AND job_status = '' AND job_assign = ''
				OR
				job_assign = 'Storekeeper' AND job_status = 'Ready'
				OR
				job_assign = '' AND job_status = 'Ready')
				ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
				while($row = $results->fetch_assoc()) {
			?>
        
		<div class="cards">
			<div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
			<button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
				<ul class="b" id="draged">
					<strong align="center"><?php echo $row['job_order_number']?></strong>
					<li><?php echo $row['job_priority']?></li>
					<li><?php echo $row['customer_name']?></li>
					<li><?php echo $row['customer_grade']?></li>
					<li><?php echo $row['job_name']?></li>
					<li><b><?php echo $row['accessories_required']?></b> accessories required</li>
					<li><?php echo $row['job_status']?></li>
				</ul>
			</div>
		</div>
			<?php } ?>
            
    </div>     


    <div class="column">
        <p class="column-title" id="joblisting" ><b>Sahele</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Sahele' AND job_status = ''
                 OR
                 job_assign = 'Sahele' AND job_status = 'Doing'
                 OR
                 job_assign = 'Sahele' AND job_status = 'Ready'
                 OR
                 job_assign = 'Sahele' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>



    <div class="column">
            <p class="column-title" id="joblisting">Teck</p>
	
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Teck' AND job_status = ''
                 OR
                 job_assign = 'Teck' AND job_status = 'Doing'
                 OR
                 job_assign = 'Teck' AND job_status = 'Ready'
                 OR
                 job_assign = 'Teck' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
	</div>


	

    <div class="column">
        <p class="column-title" id="joblisting"><b>Boon</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Boon' AND job_status = ''
                 OR
                 job_assign = 'Boon' AND job_status = 'Doing'
                 OR
                 job_assign = 'Boon' AND job_status = 'Ready'
                 OR
                 job_assign = 'Boon' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Hafiz</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Hafiz' AND job_status = ''
                 OR
                 job_assign = 'Hafiz' AND job_status = 'Doing'
                 OR
                 job_assign = 'Hafiz' AND job_status = 'Ready'
                 OR
                 job_assign = 'Hafiz' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Hamir</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Hamir' AND job_status = ''
                 OR
                 job_assign = 'Hamir' AND job_status = 'Doing'
                 OR
                 job_assign = 'Hamir' AND job_status = 'Ready'
                 OR
                 job_assign = 'Hamir' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Hwa</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Hwa' AND job_status = ''
                 OR
                 job_assign = 'Hwa' AND job_status = 'Doing'
                 OR
                 job_assign = 'Hwa' AND job_status = 'Ready'
                 OR
                 job_assign = 'Hwa' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Iskandar</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Isk' AND job_status = ''
                 OR
                 job_assign = 'Isk' AND job_status = 'Doing'
                 OR
                 job_assign = 'Isk' AND job_status = 'Ready'
                 OR
                 job_assign = 'Isk' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>John</b></p>
        <?php
            include 'dbconnect.php';
            $results = $conn->query("SELECT
            jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
            FROM job_register WHERE
            (job_assign = 'John' AND job_status = ''
             OR
             job_assign = 'John' AND job_status = 'Doing'
             OR
             job_assign = 'John' AND job_status = 'Ready'
             OR
             job_assign = 'John' AND job_status = 'Incomplete')
            ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
            while($row = $results->fetch_assoc()) {
        ?>
        
		<div class="cards">
        <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
        <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
        <ul class="b" id="draged">
            <strong align="center"><?php echo $row['job_order_number']?></strong>
            <li><?php echo $row['job_priority']?></li>
            <li><?php echo $row['customer_name']?></li>
            <li><?php echo $row['customer_grade']?></li>
            <li><?php echo $row['job_name']?></li>
            <li><?php echo $row['job_status']?></li>
        </ul>
        </div>
		</div>
        <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Jun Jie</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Jun Jie' AND job_status = ''
                 OR
                 job_assign = 'Jun Jie' AND job_status = 'Doing'
                 OR
                 job_assign = 'Jun Jie' AND job_status = 'Ready'
                 OR
                 job_assign = 'Jun Jie' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Razwill</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Will' AND job_status = ''
                 OR
                 job_assign = 'Will' AND job_status = 'Doing'
                 OR
                 job_assign = 'Will' AND job_status = 'Ready'
                 OR
                 job_assign = 'Will' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Aizat</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Aizat' AND job_status = ''
                 OR
                 job_assign = 'Aizat' AND job_status = 'Doing'
                 OR
                 job_assign = 'Aizat' AND job_status = 'Ready'
                 OR
                 job_assign = 'Aizat' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Sazaly</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Sazaly' AND job_status = ''
                 OR
                 job_assign = 'Sazaly' AND job_status = 'Doing'
                 OR
                 job_assign = 'Sazaly' AND job_status = 'Ready'
                 OR
                 job_assign = 'Sazaly' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Faizan</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Faizan' AND job_status = ''
                 OR
                 job_assign = 'Faizan' AND job_status = 'Doing'
                 OR
                 job_assign = 'Faizan' AND job_status = 'Ready'
                 OR
                 job_assign = 'Faizan' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Fauzin</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Fauzin' AND job_status = ''
                 OR
                 job_assign = 'Fauzin' AND job_status = 'Doing'
                 OR
                 job_assign = 'Fauzin' AND job_status = 'Ready'
                 OR
                 job_assign = 'Fauzin' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>



    <div class="column">
        <p class="column-title" id="joblisting"><b>Izaan</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Izaan' AND job_status = ''
                 OR
                 job_assign = 'Izaan' AND job_status = 'Doing'
                 OR
                 job_assign = 'Izaan' AND job_status = 'Ready'
                 OR
                 job_assign = 'Izaan' AND job_status = 'Incomplete')
                 ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                 while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>



    <div class="column">
        <p class="column-title" id="joblisting"><b>Salam</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_assign = 'Salam' AND job_status = ''
                 OR
                 job_assign = 'Salam' AND job_status = 'Doing'
                 OR
                 job_assign = 'Salam' AND job_status = 'Ready'
                 OR
                 job_assign = 'Salam' AND job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Pending</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_status = 'Pending')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>


    <div class="column">
        <p class="column-title" id="joblisting"><b>Incomplete</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM
                job_register WHERE
                (job_status = 'Incomplete')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
            <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
			</div>
            <?php } ?>
    </div>

    <div class="column">
        <p class="column-title" id="joblisting"><b>Completed</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_status = 'Completed')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
			<div class="cards">
            <div class="completed" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#mymodalCompleted">
                        <button type="button" class="btn btn-outline-dark text-left font-weight-bold font-color-black">
                        <ul class="b" id="draged">
                            <strong align="center"><?php echo $row['job_order_number']?></strong>
                            <li><?php echo $row['job_priority']?></li>
                            <li><?php echo $row['customer_name']?></li>
                            <li><?php echo $row['customer_grade']?></li>
                            <li><?php echo $row['job_name']?></li>
                            <li><?php echo $row['job_status']?></li>
                        </ul>
                        </div>
						</div>
                        <?php } ?>
                    </div>
                </div>

 </div>		
</section>

 <!--VIEW BUTTON MODAL AJAX-->
	

        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">	
					
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Job Info</h6>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
	

<!--JOB INFO-->
						
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab011">
						
						
                        <form action="techleaderindex.php" method="post">
                            <div class="tech-details">

                            </div>
                        </form>				
						
						
							<script type='text/javascript'>

							$(document).ready(function() {
							$('.card').click(function() {
							var jobregister_id = $(this).data('id');
        
							// AJAX request
        
							$.ajax({
							url: 'ajaxtechleader.php',
							type: 'post',
							data: {jobregister_id: jobregister_id},
							success: function(response) {
							// Add response in Modal body
							$('.tech-details').html(response);
							// Display Modal
							$('#myModal').modal('show');
							}
						});
					});
				});
							</script>	

							
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>					

	
					
						</fieldset>
					</div>

					</div>
				</div>
			</div>
		</div>







		



 <!--VIEW COMPLETED BUTTON MODAL AJAX-->
	

        <div id="mymodalCompleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">	
					
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Job Info</h6>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
	

<!--JOB INFO-->
						
                    <div class="line"></div>
					<br>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab011">
						
						
                        <form action="techleaderindex.php" method="post">
                            <div class="tech-details">

                            </div>
                        </form>				
						
						
							<script type='text/javascript'>

							$(document).ready(function() {
							$('.completed').click(function() {
							var jobregister_id = $(this).data('id');
        
							// AJAX request
        
							$.ajax({
							url: 'ajaxtechnician.php',
							type: 'post',
							data: {jobregister_id: jobregister_id},
							success: function(response) {
							// Add response in Modal body
							$('.tech-details').html(response);
							// Display Modal
							$('#mymodalCompleted').modal('show');
							}
						});
					});
				});
							</script>	

							
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
							</div>					

	
					
						</fieldset>
					</div>

					</div>
				</div>
			</div>
		</div>





























</body>

</html>