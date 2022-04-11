<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NWM Report</title>
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <link href="css/layout.css" rel="stylesheet" />
    <link href="css/jobcanceled.css" rel="stylesheet" />
    <script src="js/form-validation.js"></script>  
    <!-- Datatable CSS -->
    <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" type="text/css" href="jquery-ui.min.css">

    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/> -->
    <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jQuery Library -->
    <script src="jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>

    <!-- Datatable JS -->
    <script src="DataTables/datatables.min.js"></script>

    <script src='bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Boxicons link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
		
	</head>

    <style>

    .btn-search {

  padding: 0 15px 0 15px;
  height: 39px;
  width: 105px;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  border-color: #081D45;
  background-color: #081D45;
  color: #fff;
  margin-left: 10px;
  margin-right: -29px;
  cursor: pointer;
}


.btn-reset {

  padding: 0 15px 0 15px;
  height: 39px;
  width: 105px;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  border-color: #081D45;
  background-color: #081D45;
  color: #fff;
  margin-left: -80px;
  cursor: pointer;
}

/*VIEW*/


.ViewJobInfoTab {
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 300px;
}
.ViewJobInfoTab .title {
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.ViewJobInfoTab .title::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 90px;
  border-radius: 5px;
  background: linear-gradient(135deg, #ffb300, #ff4da6, #924adb);
}
.contentViewJobInfo form .view-details {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 30px 20px 2px 20px;
}
form .view-details .input-box {
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
  padding: 0 15px 0 15px;
}
form .input-box label.details {
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.view-details .input-box input,
.view-details .input-box select {
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
.view-details .input-box input:focus,
.view-details .input-box input:valid,
.view-details .input-box select:focus,
.view-details .input-box select:valid {
  border-color: #081d45;
}

form .category {
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}
form .category label {
  display: flex;
  align-items: center;
  cursor: pointer;
}

form .button {
  height: 45px;
  margin: 35px 0;
  margin-bottom: 50px;
}
form .button input {
  height: 100%;
  width: 100%;
  border-radius: 5px;
  border: none;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  cursor: pointer;
  transition: all 0.3s ease;
  background-color: #081d45;
  margin-bottom: 10px;
}
form .button input:hover {
  /* transform: scale(0.99); */
  opacity: 0.8;
}
form .button #cancelbtn {
  background-color: #f44336;
}
@media (max-width: 584px) {
  .container {
    max-width: 100%;
  }
  form .view-details .input-box {
    margin-bottom: 15px;

    width: 100%;
  }
  form .category {
    width: 100%;
  }
  .content form .view-details {
    max-height: 300px;
    overflow-y: scroll;
  }
  .view-details::-webkit-scrollbar {
    width: 5px;
  }
}
@media (max-width: 459px) {
  .container .content .category {
    flex-direction: column;
  }
}

input[type="text"],
input[type="date"],
input[type="datetime-local"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/*TABS STORE*/
.tabView {
  display: flex;
  flex-wrap: wrap;
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  margin: 30px 300px 30px 300px;
}

.tabView .ViewJobInfoTab {
  /* max-width: 700px;
  width: 100%; */
  background-color: #fff;
  border-radius: 0px;
  margin-left: 0px;
}

.tabView .tabHeadingView {
  order: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1.2rem 2rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background-color: #fff;
  font-weight: bold;
  transition: background ease 0.3s;
}

.tabView .tab {
  order: 9;
  flex-grow: 1;
  width: 100%;
  height: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
  padding: 20px;
}

.tabView input[type="radio"] {
  display: none;
}

.tabView input[type="radio"]:checked + label {
  background: rgba(209, 209, 209, 0.377);
}

.tabView input[type="radio"]:checked + label + .tab {
  display: block;
}

@media (max-width: 465px) {
  .tabView .tab,
  .tabView label {
    order: initial;
  }

  .tabView label {
    width: 100%;
    margin-left: 50px;
  }
}

/* The Close Button (x) */
.techClose {
  position: absolute;
  right: 166px;
  margin-top: 135px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.techClose:hover,
.techClose:focus {
  color: red;
  cursor: pointer;
}


</style>

    <body>

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


    <!--Home navigation-->
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <a href="Adminhomepage.php">
                    <span class="dashboard">Home</span>
            </div>
            <div class="notification-button">
                <a href="#">
                    <i class='bx bxs-bell-ring'></i>
                </a>
            </div>
        </nav>
	

<div class="jobTypeList">
            <h1>Service Report</h1>
	
		
		<form class="form-inline" method="POST" action="">
            <table>
                <tr>
                <td><input type="date" class="form-control" placeholder="START"  name="date1"/></td>
                <td><input type="date" class="form-control" placeholder="END"  name="date2"/></td>
                <td><button id="btn_search" name="search" class="btn-search">Search</button></td>
                <td><button class="btn-reset" onclick="document.location='report.php'">Refresh</button></td>
                </tr>
            </table>
		</form>

		    <div class="table-responsive">	
			<table id="auto" class='display dataTable'>
			<thead class="alert-info">
					<tr>
            <th>No</th>
						<th>Job Order Number</th>
						<th>Customer Name</th>
						<th>Requested Date</th>
            <th>Report Date</th>
            <th>File Name</th>
           
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>	
	</div>

    
    <script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");

        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebar.classList.replace("bx-menu", "bx-menu-alt-right")
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>
</html>