<?php

session_start();

if(!isset($_SESSION['username']))
	{	
        header("location:loginpage.php");
	}

    elseif($_SESSION['staff_position']== 'admin')
	{
	}
     elseif($_SESSION['staff_position']== 'manager')
	{
	}

  else
	{
			header("location:loginpage.php");
	}
?>

<!DOCTYPE html>

<html lang="en">

<head>
     
 <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Admin Page</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="layout.css"rel="stylesheet" />
    <link href="admin.css"rel="stylesheet" />
    <!-- <link href="tab.css"rel="stylesheet" /> -->

  <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script> -->
    
    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">

<style>
    
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

.tabs .completedJobInfoTab {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  border-radius: 5px;
  margin-left: 0px;
}

.tabs .tabHeadingComplete {
  order: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem 1.5rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background-color: #fff;
  font-weight: bold;
  font-size: 10px;
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

.Job_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 4%;
  left: 5%;
}

.tech3_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 52%;
  left: 11%;
}

.store_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 4%;
  left: 35%;
}

.pending_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 52%;
  left: 37%;
}

.tech1_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 4%;
  right: 33%;
}

.incomplete_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 52%;
  right: 34%;
}

.tech2_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 4%;
  right: 9%;
}

.completed_topic{
  font-size:20px;
  font-weight: 500;
  position: absolute;
  top: 52%;
  right: 10%;
}



.completed,
#completed {
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

 form .completed-details .input-box {
    margin-bottom: 15px;

    width: 100%;
  }
  form .category {
    width: 100%;
  }
  .content form .completed-details {
    max-height: 300px;
    overflow-y: scroll;
  }
  .completed-details::-webkit-scrollbar {
    width: 5px;
  }

  .contentCompletedJobInfo form .completed-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 30px 20px 2px 20px;
}
form .completed-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
  padding: 0 15px 0 15px;
}
form .input-box label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.completed-details .input-box input,
.completed-details .input-box select {
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.completed-details .input-box input:focus,
.completed-details .input-box input:valid,
.completed-details .input-box select:focus,
.completed-details .input-box select:valid {
  border-color: #081d45;
}

/*Job Info*/
.contentCompletedJobInfo {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 300px;
}
.contentCompletedJobInfo .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.contentCompletedJobInfo .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 90px;
  border-radius: 5px;
  background: linear-gradient(135deg, #ffb300, #ff4da6, #924adb);
}



</style>
</head>

 <body>

    <!--Home navigation-->

    <div class="sidebar">
            <div class="logo-details">
                <i class='bx bx-window-alt'></i>
            <span class="logo_name">NWM System</span>
            </div>
        </a>
        
        <ul class="nav-links">
               <li>
                <a href="jobregister.php">
                    <i class='bx bx-registered'></i>
                    <span class="link_name">Register Job</span>
                </a>
            </li>

             <li>
                <a href="accessoriesregister.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="link_name">Job Accessories</span>
                </a>
            </li>
           
            <li>
                <a href="staff.php">
                    <i class="bx bxs-id-card"></i>
                    <span class="link_name">Staff</span>
                </a>
            </li>

            <li>
                <a href="technicianlist.php">
                    <i class="fa fa-users"></i>
                    <span class="link_name">Technician</span>
                </a>
            </li>

            <li>
                <a href="customer.php">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Customers</span>
                </a>
            </li>

            <li>
                <a href="machine.php">
                    <i class="bx bxl-medium-square"></i>
                    <span class="link_name">Machine</span>
                </a>
            </li>

            <li>
                <a href="accessories.php">
                    <i class="bx bx-wrench"></i>
                    <span class="link_name">Accessories</span>
                </a>
            </li>

            <li>
                <a href="jobtype.php">
                    <i class="bx bx-briefcase"></i>
                    <span class="link_name">Job Type</span>
                </a>
            </li>

            <li>
                <a href="jobcanceled.php">
                    <i class="fa fa-minus-square"></i>
                    <span class="link_name">Canceled Job</span>
                </a>
            </li>

            <li>
                <a href="report.php">
                    <i class='bx bxs-report' ></i>
                    <span class="link_name">Report</span>
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Log Out</span>
                </a>
            </li>
            
        </ul>
    </div>
    
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn' ></i>
                <a href="Adminhomepage.php">
                    <span class="dashboard">Home</span>
                </a>
            </div>

            <div class="notification-button">
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                </a>
            </div>
        </nav>

        <div class="welcome">Welcome <?php echo $_SESSION["username"] ?> !</div>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Job Listing</div>

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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
                                 while($row = $results->fetch_assoc()) {
                            ?>
                            
                        <div class="todo" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-1"  ondblclick="document.getElementById('doubleClick-1').style.display='block'">
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
                
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Store</div>
                            
                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT
                                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, accessories_required, job_status
                                FROM job_register WHERE
                                (accessories_required = 'Yes' AND job_status = ''
                                 OR
                                 job_assign = 'Storekeeper' AND job_status = ''
                                 OR
                                 accessories_required = 'Yes' AND job_status = 'Not Ready'
                                 OR
                                 job_assign = 'Storekeeper' AND job_status = 'Not Ready'
                                 OR
                                 job_assign = 'Storekeeper' AND job_status = 'Incomplete')
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box" id="myModal">
                    <div class="left-side" >
                        <div class="box_topic">Boon</div>
                        
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Hafiz</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

            <div class="overview-boxes" >
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Hamir</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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
                
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Hwa</div>
                        
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Isk</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">John</div>
                        
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

            <div class="overview-boxes" >
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Jun Jie</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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
                
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Razwill</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Sahele</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Sazaly</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

            <div class="overview-boxes" >
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Faizan</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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
                
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Fauzin</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Izaan</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Salam</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

            <div class="overview-boxes" >
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Teck</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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

                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Aizat</div>
                            
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
                                 ORDER BY jobregisterlastmodify_at
                                 DESC LIMIT 50");
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
                
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Pending</div>
                            
                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT
                                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                                FROM job_register WHERE
                                (job_status = 'Pending')
                                ORDER BY jobregisterlastmodify_at
                                DESC LIMIT 50");
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
                
                <div class="box">
                    <div class="left-side">
                        <div class="box_topic">Incomplete</div>
                            
                            <?php
                                include 'dbconnect.php';
                                
                                $results = $conn->query("SELECT
                                jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                                FROM
                                job_register
                                WHERE
                                (job_status = 'Incomplete')
                                ORDER BY jobregisterlastmodify_at
                                DESC LIMIT 50");
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
            
            <div class="overview-boxes" >
                <div class="box" id="myModal">
                    <div class="left-side">
                        <div class="box_topic">Completed</div>
                        
                        <?php
                            include 'dbconnect.php';
                            
                            $results = $conn->query("SELECT
                            jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
                            FROM job_register WHERE
                            (job_status = 'Completed')
                            ORDER BY jobregisterlastmodify_at
                            DESC LIMIT 50");
                            while($row = $results->fetch_assoc()) {
                        ?>
                        
                         <div draggable="true" ondragstart="drag(event)" class="completed" data-id="<?php echo $row['jobregister_id'];?>" data-target="doubleClick-completed" ondblclick="document.getElementById('doubleClick-completed').style.display='block'">
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
            <form action="ajaxtechnician.php" method="post">
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
            url: 'ajaxtechnician.php',
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
    <div class="tabs" >
        <input type="radio" name="tabDoing" id="tabDoingOne" checked="checked">
        <label for="tabDoingOne" class="tabHeading">Job Info</label>
        <div class="tab" id=jobInfoTabs>
            <div class="TechJobInfoTab">
                <div class="contentTechJobInfo">
                    <div class="techClose" data-dismiss="modal" onclick="document.getElementById('doubleClick-1').style.display='none'">&times</div>
                    <form action="homeindex.php" method="post">
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
            url: 'ajaxhome.php',
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


<script>

let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function(){
    sidebar.classList.toggle("active");
    if(sidebar.classList.contains("active")){
        sidebar.classList.replace("bx-menu","bx-menu-alt-right")
    }else
    sidebarBtn.classList.replace("bx-menu-alt-right","bx-menu");
}

</script>

</body>

</html>