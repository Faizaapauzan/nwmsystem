<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">

    <title>PHOTO REPORT</title>
</head>
<style>

:root {
  --body-bg: rgb(204, 204, 204);
  --white: #ffffff;
  --darkWhite: rgb(0, 0, 0);
  --themeColor: #ffffff;
}

/* Font Include */
@import url("https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap");

.page {
  /* background: var(--white); */
  display: block;
  margin: 0 auto;
  position: relative;
}

.page[size="A4"] {
  width: 21cm;
  height: 59.4cm;
  overflow: hidden;
}

.bb {
  border-bottom: 2px solid var(--darkWhite);
  margin-left: 12px;
  margin-right: 14px;
  /* width: 100px; */
}

/* Top Section */
.top-content {
  padding-bottom: 15px;
}

.top-left p {
  margin: 0;
}

.top-left .graphic-path {
  /* height: 40px; */
  position: relative;
}

.top-left .graphic-path::before {
  content: "";
  height: 20px;
  background-color: var(--dark);
  position: absolute;
  left: 15px;
  right: 0;
  top: -15px;
  z-index: 2;
}

.top-left .graphic-path::after {
  content: "";
  height: 22px;
  width: 17px;
  background: var(--black);
  position: absolute;
  top: -13px;
  left: 6px;
  transform: rotate(45deg);
}

.top-left .graphic-path p {
  color: black;
  height: 40px;
  left: 0;
  text-transform: uppercase;
  background-color: var(--themeColor);
  font: 25px;
  z-index: 3;
  position: absolute;
  text-align: center;
  /* padding-left: 10px; */
}

/* Footer Section */
footer {
  position: absolute;
  left: 75px;
}

footer hr {
  margin-bottom: -22px;
  border-top: 3px solid var(--darkWhite);
}

footer a {
  color: var(--themeColor);
}

footer p {
  padding: 6px;
  background-color: var(--white);
  display: inline-block;
}

  #display_photo{
        width: 330px;
        height: 250px;
        border: 1px solid black;
        background-position: center;

        }

    </style>

<body>

    <div class="text-center">
    <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
    </div>


    <form action="servicereport.php" method="post">
 

      <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `technician_photoupdate` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");

  } ?>
<table id="remark_grid" align="center" class="table table-condensed table-hover table-striped bootgrid-table" width="100%" cellspacing="0">

   <thead>
   </thead>
  <br/><br/>
   <tbody>
      <?php foreach($queryRecords as $res) :?>
      <tr data-row-id="<?php echo $res['id'];?>">
        <td col-index='2'><img src="image/<?php echo $res['file_name']; ?>" id="display_photo"/></td>
        <td><input readonly type="text" style="font-size: 20px; border: none;" class="description" value="<?php echo $res['description']; ?>" /></td>

      </tr>
	  <?php endforeach;?>
   </tbody>
</table>


</body>
</html>