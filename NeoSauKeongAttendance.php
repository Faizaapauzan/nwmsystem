<?php session_start(); ?>
 
<!DOCTYPE html>

<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance And Rest Hour</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/technicianmain.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
    
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
    
    <div class="container">
        <div class="column">
            <p class="column-title" id="technician">Technician Attendance And Rest Hour</p>
            <form action="" method="GET">
                
                <div class="column-inside">
                <div class="CodeDropdown" style="margin-right: 20px;margin-left: 21px;">
                <label for="date" class="details" style="padding-right: 4px;">Date</label>
                <input id="myInput" placeholder="DD - MM - YYYY" type="text" style="height: 36px; width:auto;" name="DateAssign" value="<?php if(isset($_GET['DateAssign'])){echo $_GET['DateAssign'];} else { echo $date = date('d-m-Y'); } ?>" class="form-control">
                <button type="submit" style="width:fit-content; height:fit-content; background: #081d45;border-color: #081d45;color: white; padding: 10px 10px;">Search</button>
                <button style="width:fit-content; height:fit-content; background: #8B0000;border-color: #8B0000;color: white; padding: 10px 10px;" onclick="document.getElementById('myInput').value = ''">Clear</button>
                </div>
                <div class="remarks-worker" style="margin-right: 10px;">
                <div class="staff-update" style="margin-top: 50px; margin: 20px;">
                <table id="auto" style="width:100%">
                <thead style="height: 42px;">
                    <th style="width:auto"></th>
                    <th style="width: auto;">Leader</th>
                    <th style="width: auto;">Assistant</th>
                    <th style="width: auto">Clock In</th>
                    <th style="width: auto;">Clock Out</th>
                    <th style="width: auto;">Rest Out</th>
                    <th style="width: auto;">Rest In</th>
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
                    <td style="text-align: right;"></td>
                    <td style="text-align: center;"><?php echo $row["tech_leader"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["username"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["tech_clockin"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["tech_clockout"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["technician_out"]; ?></td>
                    <td style="text-align: center;"><?php echo $row["technician_in"]; ?></td>
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
                </div>
    </form>
            </div>
            </div>
            
            <script>
                let arrow = document.querySelectorAll(".arrow");
                for (var i = 0; i < arrow.length; i++) 
                    {
                        arrow[i].addEventListener("click", (e)=>
                            {
                                let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
                                arrowParent.classList.toggle("showMenu");
                            });
                    }
                let sidebar = document.querySelector(".sidebar");
                let sidebarBtn = document.querySelector(".bx-menu");
                console.log(sidebarBtn);
                sidebarBtn.addEventListener("click", ()=>
                    {
                        sidebar.classList.toggle("close");
                    });
            </script>
                
        </div>
    </div>
   
</body>
</html>