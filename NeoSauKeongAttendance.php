<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Assigned Job</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" rel="icon" type="image/x-icon"/>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link href="css/NeoSauKeong.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script src="js/testing.js" type="text/javascript"></script>
    </head>

    <body>

        <!-- Bottom Navigation -->
        <nav class="nav">
            <div class="nav__link nav__link dropdown">
                <i class="material-icons">list_alt</i>
                <span class="nav__text">Assigned Job</span>
                <div class="dropdown-content">
                    <a href="NeoSauKeongTodojob.php">Todo</a>
                    <a href="NeoSauKeongDoingjob.php">Doing</a>
                </div>
            </div>
            <a href="NeoSauKeongPendingjob.php" class="nav__link">
                <i class="material-icons">pending_actions</i>
                <span class="nav__text">Pending</span>
            </a>
            <a href="NeoSauKeong.php" class="nav__link">
                <i class="material-icons">home</i>
                <span class="nav__text">Home</span>
            </a>
            <a href="NeoSauKeongIncompletejob.php" class="nav__link">
                <i class="material-icons">do_not_disturb_on</i>
                <span class="nav__text">Incomplete</span>
            </a>
            <a href="NeoSauKeongCompletedjob.php" class="nav__link">
                <i class="material-icons">check_circle</i>
                <span class="nav__text">Complete</span>
            </a>
        </nav>
        <!-- End of Bottom Navigation -->

        <div class="container">
            <div class="three">
                <h1>Technician Attendance And Rest Hour</h1>
            </div>
            <form action="" method="GET">
                    <div class="example">
                        <input type="text"  id="myInput" name="DateAssign" placeholder="DD - MM - YYYY" value="<?php if(isset($_GET['DateAssign'])){echo $_GET['DateAssign'];} else { echo $date = date('d-m-Y'); } ?>"/>
                        <button type="submit">Search</button>
                    </div>
                    <br>
                    <div id="wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th style="font-weight: bold;background: #B2BEB5;">Leader</th>
                                    <th>Assistant</th>
                                    <th>Clock In</th>
                                    <th>Clock Out</th>
                                    <th>Rest Out</th>
                                    <th>Rest In</th>
                                </tr>
                            </thead>

                                <?php
                                    include_once 'dbconnect.php';
                                    
                                    if(isset($_GET['DateAssign']))
                                        {
                                            $DateAssign = $_GET['DateAssign'];
                                            
                                            $sql = "SELECT * FROM tech_update WHERE techupdate_date='$DateAssign'";
                                            $result = mysqli_query($conn, $sql);
                                            if(mysqli_num_rows($result) > 0) 
                                                { 
                                                    foreach($result as $row) 
                                                    { 
                                ?>

                            <tbody>
                                <tr>
                                    <td data-label="Leader" style=" font-weight: bold; background: #B2BEB5;"><?php echo $row["tech_leader"]; ?></td>
                                    <td data-label="Assistant"><?php echo $row["username"]; ?></td>
                                    <td data-label="Clock In"><?php echo $row["tech_clockin"]; ?></td>
                                    <td data-label="Clock Out"><?php echo $row["tech_clockout"]; ?></td>
                                    <td data-label="Rest Out"><?php echo $row["technician_out"]; ?></td>
                                    <td data-label="Rest In"><?php echo $row["technician_in"]; ?></td>
                                </tr>
                            </tbody>

                                <?php
                                    } }
                                        else
                                            {
                                                echo "No Record Found";
                                            }
                                        }
                                ?>
                        </table>
                        <br>
                    </div>
            </form>
        </div>
    </body>
</html>
