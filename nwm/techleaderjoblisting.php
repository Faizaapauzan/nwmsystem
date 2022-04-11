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
<link href="tech.css"rel="stylesheet" />
<link href="tab.css"rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--Boxicons link -->  
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
 
<style>

  /*Pending*/
.tabs {
  display: flex;
  flex-wrap: wrap;
  max-width: 700px;
  width: 60%;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 300px;
}

.tabs .TechJobInfoTab {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  border-radius: 5px;
  margin-left: 0px;
}

.tabs .tabHeading {
  order: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem 1.5rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background-color: #fff;
  font-weight: bold;
  font-size: 15px;
  transition: background ease 0.3s;
}

.tabs .tab {
  order: 9;
  flex-grow: 1;
  width: 100%;
  height: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
  padding: 20px;
}

.tabs input[type="radio"] {
  display: none;
}

.tabs input[type="radio"]:checked + label {
  background: rgba(209, 209, 209, 0.377);
}

.tabs input[type="radio"]:checked + label + .tab {
  display: block;
}

@media (max-width: 465px) {
  .tabs .tab,
  .tabs label {
    order: initial;
  }

  .tabs label {
    width: 100%;
    margin-left: 50px;
  }
}

.welcome {
  font-size:30px;
  font-family: "Garamond";
  font-variant: small-caps;
  color: #000099; 
  width: 100%;
  display: flex;
  justify-content: center;
}

.home-content .overview-boxes {
  display: flex;
  width: 100%;
  justify-content: space-around;
  padding: 0 30px;
  margin-bottom: 20px;
}

.home-content .overview-boxes .box {
  width: calc(100% / 4 - 15px);
  display: fixed;
  justify-content: center;
  padding: 15px 14px;
  background: #d8d8dfaf;
  border-radius: 8px;
  height: 300px;
  overflow: auto;
}

.home-content .overview-boxes .listbox {
  width: calc(100% / 4 - 15px);
  display: fixed;
  justify-content: center;
  padding: 15px 14px;
  background: #d8d8dfaf;
  border-radius: 8px;
  height: 300px;
  overflow: auto;
}

.home-content .overview-boxes .box_topic {
  font-size: 20px;
  font-weight: 500;
  margin-left: 15px;
  margin-bottom: 20px;
}

.todo,
#todo {
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  background-color: #f7f7f7ab;
  box-shadow: rgba(15, 15, 15, 0.1) 0px 0px 0px 1px,
    rgba(15, 15, 15, 0.1) 0px 0px 0px 4px;
  border-radius: 12px;
  padding: 0.7rem 2rem;
  font-size: 14px;
  margin: 10px 10px;
  cursor: pointer;
  text-align: left;
}

.todo,
a {
  cursor: move;
}
#todo {
  margin-bottom: 20px;
  cursor: -webkit-grab;
  cursor: grab;
}
#todo {
  cursor: -webkit-grab;
  cursor: grab;
}

textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

</style>

</head>

<body>
    
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-home'></i>
            <a href="techleader.php"><span class="dashboard">HOME</span></a>
        </div>
    </nav>
    
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
        <div class="column"><b>Isk</b></p>
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
                (job_assign = 'Razwill' AND job_status = ''
                 OR
                 job_assign = 'Razwill' AND job_status = 'Doing'
                 OR
                 job_assign = 'Razwill' AND job_status = 'Ready'
                 OR
                 job_assign = 'Razwill' AND job_status = 'Incomplete')
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
            url: 'ajaxtechleader.php',
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

    <!--Double click Accessories -->
    <input type="radio" name="tabDoing" id="tabDoingTwo">
    <label for="tabDoingTwo" class="tabHeading"> Accessories </label>
    <div class="tab">
        <div class="TechJobInfoTab">
            <div class="contentTechJobInfo">
                <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                <form action="ajaxtabaccessories.php" method="post">
                    <div class="acc-details">

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
            url: 'ajaxtabaccessories.php',
            type: 'post',
            data: {jobregister_id: jobregister_id},
            success: function(response) {
                
                // Add response in Modal body
                $('.acc-details').html(response);
                // Display Modal
                $('#doubleClick-1').modal('show');
            }
        });
    });
});

</script>

</body>

</html>