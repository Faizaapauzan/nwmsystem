<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Technician Job Listing</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
<link href="css/tech.css"rel="stylesheet" />
<link href="css/tab.css"rel="stylesheet" />
<link href="css/joblisting.css"rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--Boxicons link -->  
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
    function doSearch(text) {
    if (window.find && window.getSelection) {
        document.designMode = "on";
        var sel = window.getSelection();
        sel.collapse(document.body, 0);
        
        while (window.find(text)) {
            document.getElementById("button").blur();
            document.execCommand("HiliteColor", false, "yellow");
            sel.collapseToEnd();
        }
        document.designMode = "off";
    } else if (document.body.createTextRange) {
        var textRange = document.body.createTextRange();
        while (textRange.findText(text)) {
            textRange.execCommand("BackColor", false, "yellow");
            textRange.collapse(false);
        }
    }
}
</script>
</head>

<body>
    
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-home'></i>
            <a href="salam.php"><span class="dashboard">HOME</span></a>
        </div>
    </nav>

    <input type="text" id="search" >
    <input type="button" id="button" onmousedown="doSearch(document.getElementById('search').value)" value="Find">
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

    <div class="home-content">

    <div class="container">
    <div class="column"><b>Job Listing</b></p>
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
        
        <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
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
        <?php } ?>
    </div>
</div>

    
        
    <div class="container">
        <div class="column"><b>Teck</b></p>
            
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Aizat</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Boon</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Hafiz</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Hamir</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Hwa</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Iskandar</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>John</b></p>
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
        
        <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
        <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
        <ul class="b" id="draged">
            <strong align="center"><?php echo $row['job_order_number']?></strong>
            <li><?php echo $row['job_priority']?></li>
            <li><?php echo $row['customer_name']?></li>
            <li><?php echo $row['customer_grade']?></li>
            <li><?php echo $row['job_name']?></li>
            <li><?php echo $row['job_status']?></li>
        </ul>
        </div>
        <?php } ?>
    </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Jun Jie</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Razwill</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Sahele</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Sazaly</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Faizan</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Fauzin</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Izaan</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Salam</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Pending</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_status = 'Pending')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Incomplete</b></p>
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
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="container">
        <div class="column"><b>Completed</b></p>
            <?php
                include 'dbconnect.php';
                $results = $conn->query("SELECT
                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                FROM job_register WHERE
                (job_status = 'Completed')
                ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                while($row = $results->fetch_assoc()) {
            ?>
            
            <div draggable="true" ondragstart="drag(event)" class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
            <input type="hidden" name="jobregister_id" id="jobregister_id" value="<?php echo $row['jobregister_id'] ?>" readonly>
            <ul class="b" id="draged">
                <strong align="center"><?php echo $row['job_order_number']?></strong>
                <li><?php echo $row['job_priority']?></li>
                <li><?php echo $row['customer_name']?></li>
                <li><?php echo $row['customer_grade']?></li>
                <li><?php echo $row['job_name']?></li>
                <li><?php echo $row['job_status']?></li>
            </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</section>

    <!--Double click Completed -->
    <div id="doubleClick-completed" class="modal">
        <input type="radio" name="tabDoing" id="tabDoingCompleted">
        <label for="tabDoingCompleted" class="tabHeadingComplete"> Job Info </label>
        <div class="tab">
            <div class="completedJobInfoTab">
                <div class="contentCompletedJobInfo">
                    <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-completed').style.display='none'">&times</div>
                    <form action="ajaxtechleader.php" method="post">
                        <div class="completed-details">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type='text/javascript'>

$(document).ready(function() {
    $('.completed').click(function() {
        var jobregister_id = $(this).data('id');
        
        // AJAX request
        
        $.ajax({
            url: 'ajaxtechnonleader.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                
                // Add response in Modal body
                $('.completed-details').html(response);
                // Display Modal
                $('#doubleClick-completed').modal('show');
            }
        });
    });
});

</script>
</div>
</div>
</div>
</section>
    
    <!--Double click Job Info (Job Listing) -->
    <div id="doubleClick-1" class="modal">
        <div class="tabs">
            <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
            <label for="tabDoingOne" class="tabHeading">Job Info</label>
            <div class="tab" id=jobInfoTabs>
                <div class="TechJobInfoTab">
                    <div class="contentTechJobInfo">
                        <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                        <form action="techleaderindex.php" method="post">
                            <div class="tech-details">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

<script type='text/javascript'>

$(document).ready(function() {
    $('.todo').click(function() {
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
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>

</body>

</html>