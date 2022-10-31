<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">

    <title>SERVICE REPORT</title>
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
}

/* Top Section */
.top-content {
  padding-bottom: 15px;
}

.top-left p {
  margin: 0;
}

.top-left .graphic-path {
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

.SR {
  float: left;
  font-weight: bold;
  font-size: 22px;
  text-align: center;
  margin-right: -87px;
  margin-left: 251px;
}

.SRno {
  font-weight: bold;
  font-size: 20px;
  float: left;
  text-align: left;
  margin-left: 119px;
}

.serviceno {
  border: 0;
  border-bottom: 0px solid #000;
  width: 90px;
}

.report {
  border: 0;
  border-bottom: 0px solid #000;
  text-align: left;
  width: 647px;
  height: 320px;
  margin: 32px;
  position: inherit;
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
}

/* User Store Section */
.store-user {
  padding-bottom: 25px;
}

.store-user p {
  margin: 2px;
  margin-left: 20px;
  font-weight: 600;
}


.try3 {
  margin: -12px;
  font-weight: 600;
  margin-left: 49px;
}

.rightleft {
  display: inline-flex;

}

.rightside {
  margin-left: 30px;

}

    
.bothside {
  display: inline-flex;
  margin-top: 20px;
}

.infoarea {
 writing-mode: horizontal-tb !important;
    font-family: Arial;
    font-size: 13px;
    font-weight: 500;
    text-rendering: auto;
    display: inline-block;
    line-height: 12px;
    text-align: start;
    cursor: text;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    overflow:hidden;
    column-count: initial !important;
    width: 311px;
    height: 92px;
    margin: 19px;
    padding: 1px 2px;
    border-width: 1px;
    resize: none;
    box-sizing: border-box;
    border-style: solid;
}

.problemarea {
    writing-mode: horizontal-tb !important;
    font-family: Arial;
    font-size: 13px;
    font-weight: 500;
    text-rendering: auto;
    line-height: 12px;
    display: inline-block;
    text-align: start;
    cursor: text;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    overflow:hidden;
    column-count: initial !important;
    width: 311px;
    height: 92px;
    margin: 19px;
    padding: 1px 2px;
    border-width: 1px;
    resize: none;
    box-sizing: border-box;
    border-style: solid;
}


.extra-info p span {
  font-weight: 400;
}

.input {
  border: 0;
  border-bottom: 0px solid #000;
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

.signature {
  border: 0;
  border-bottom: 1px solid #000;
}

.sign1 {
  margin: 2px;
  font-weight: 600;
  display: inline-block;
  margin-left: 64px;
  
}

.sign2 {
  font-weight: 600;
  display: inline-block;
  margin-left: 38px;
      margin-top: -37px;
}

.sign3 {
  margin: 2px;
  font-weight: 600;
  display: block;
  margin-left: 226px;
  margin-bottom: 13px;
}

footer p {
  padding: 6px;
  background-color: var(--white);
  display: inline-block;
}

tbody {
  counter-reset: Serial;   
}

tr td:first-child:before {
  counter-increment: Serial;      
	content: counter(Serial) "."; 
  padding-left: 5px;
  padding: 5px;
  
}

    </style>

<body>
    
    <div class="my-5 page" size="A4">
    <div class="p-5">
    <section class="top-content bb d-flex justify-content-between">
    <div class="top-left">
    <div class="graphic-path">

    <h3 style="display: block; font-size: 1.17em; margin-block-start: 1em; margin-block-end: 0em; margin-inline-start: 0px; margin-inline-end: 0px; font-weight: bold; text-align:center">
    NEO WOODWORKING MACHINERY SDN. BHD.</h3>
    <p><center>NO 1, JALAN KOTA MURNI, TAMAN INDUSTRI KOTA MURNI,<br/>
    OFF JALAN MINYAK BEKU 83000 BATU PAHAT, JOHOR.<br/>
    Tel: 07-4355595, 07-4355596 Fax: 07-4355596<br/>
    Email: neowoodworking@hotmail.com
    </center> </p>
    </div>
                  
    <div class="position-relative"><br/><br/>
    <center>
   <div class="SR">Service Report</div>
    <div class="text-center">
    </div>

    <?php
include 'dbconnect.php';
                
        if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            $query = ("SELECT * FROM servicereport WHERE jobregister_id='$jobregister_id'");
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>

    <form action="servicereportEDIT.php" method="post">

    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
    <input type="hidden" id="servicereport_id" name="servicereport_id" value="<?php echo $row['servicereport_id'] ?>">
    
    <div class="SRno">Service Report No:<input type="text" name="srvcreportnumber" id="numbreport" value="<?php echo $row['srvcreportnumber'] ?>" class="serviceno" /></div></center>
    
    </div></div>
    <br/><br/>
    </section>

            
    <section class="store-user mt-5">
    <div class="col-10">
    <div class="row bb pb-3">
    <br/>
    <div class="row extra-info pt-3">
     <div class="rightleft">
    <div class="leftside">
    
    <p><label>Date :</label> <span><input type="text" name="date" value="<?php echo $row['date'] ?>" class="input"/></span></p>
    <p><label style="position:absolute;">Customer Name :</label><span style="font-size: 13px; width: 207px; height:13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 130px;" class="textarea" role="textarea" contenteditable><?php echo $row['customer_name'] ?></span><input type="hidden" name="customer_name" value="<?php echo $row['customer_name'] ?>" class="input" /></p>
    <p><label>Contact No :</label><span><input type="text" name="cust_phone1" value="<?php echo $row['cust_phone1'] ?>" class="input" /></span></p>
    <p><label>Service Type :</label><span><input type="text" style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 2px;" name="job_name" class="textarea" role="textbox" contenteditable value="<?php echo $row['job_name'] ?>"/></span></p>
    <p><label>Service Engineer :</label> <span><input type="text" name="job_assign" value="<?php echo $row['job_assign'] ?>" class="input" /></span></p>
    <p><label style="position:absolute;">Assistants :</label><span style="font-size: 13px; width: 207px; height:13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 81px;" class="textarea" role="textarea" contenteditable><?php echo $row['assistants'] ?></span><input type="hidden" name="assistants" value="<?php echo $row['assistants'] ?>" class="input" /></p>
    	 
    </div>

    <div class="rightside">
    <p><label>Departure time :</label><span><input type="technician_departure" name="technician_departure" class="input" value="<?php echo $row['technician_departure'] ?>" /></span></p>
    <p><label>Time At  Site :</label> <span><input type="text" name="technician_arrival" value="<?php echo $row['technician_arrival'] ?>" class="input" /></span></p>
    <p><label>Return Time :</label><span><input type="text" name="technician_leaving" value="<?php echo $row['technician_leaving'] ?>" class="input" /></span></p>
    <p><label style="position:absolute;">Machine Name :</label><span style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 118px;" class="textarea" role="textarea" contenteditable><?php echo $row['machine_name'] ?></span><input type="hidden" name="machine_name" value="<?php echo $row['machine_name'] ?>" class="input" /></p>
    <p><label>Serial Number :</label> <span><input type="text" name="serialnumber" value="<?php echo $row['serialnumber'] ?>" class="input" /></span></p>


    <br/></div></div>

    <div class="bothside">
    <div class="problemside">
    <p>Problem Description :-</p> 
    <textarea class="problemarea" id="autoresizing" name="Problem_Description" value=""><?php echo $row['Problem_Description'] ?></textarea>

    <script type="text/javascript">
        $('#autoresizing').on('input', function () {
        this.style.height = '92px';
          
        this.style.height = 
                (this.scrollHeight) + 'px';
        });
    </script>
 
    </div>

    <div class="additionalside">
    <p>Additional Info :-</p>
    <textarea name="Submitted_Items" class="infoarea" id="autoresizing_item"><?php echo $row['Submitted_Items'] ?></textarea>

     <script type="text/javascript">
        $('#autoresizing_item').on('input', function () {
            this.style.height = '92px';
              
            this.style.height = 
                    (this.scrollHeight) + 'px';
        });
     </script>

 
    </div></div>

    <br/><br/>
    <div class="try3">
    <p>Report :-</p><textarea name="report" style="writing-mode: horizontal-tb !important;
    font-family: Arial;
    text-rendering: auto;
    text-align: start;
    cursor: text;
    white-space: pre-wrap;
    overflow-wrap: break-word;
    column-count: initial !important;
    width: 621px;
    height: 300px;
    margin: 19px;
    padding: 1px 2px;
    border-width: 0px;
    resize: none;"><?php echo $row['report'];?></textarea>

    </div>

 <?php include_once("dbconnect.php");

  if (isset($_POST['jobregister_id'])) {
      $jobregister_id =$_POST['jobregister_id'];

      $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
      $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
  }

      if ($queryRecords) {
        while ($row = mysqli_fetch_array($queryRecords)) {

          ?>
        <div class="part_used">
        <table id="remark_grid" text-align="center" class="table table-condensed table-hover table-striped bootgrid-table" style="margin-top: -41px; margin-bottom: 14px; border-collapse: collapse; border: 1px solid black;">
          <thead>
          </thead>
          <br/><br/>
        <tbody>
   
         <th colspan="4" style="text-align:left; padding-left:5px;">Accessories/ Sparts Part Used:</th>
         <?php foreach ($queryRecords as $res) :?>
        
            <tr data-row-id="<?php echo $res['id']; ?>">
             <td></td></div>

            <td><span style="font-size: 13px; max-width: 207px; height: 13px; font-family: Arial; border-width: 0px; resize: none; overflow: hidden; margin-left: 0px;" class="textarea" role="textbox" contenteditable><?php echo $row['accessories_name'] ?></span></td>
            <td><input type="text" style="font-size: 15px; border: none; text-align:center;" class="accessories_uom" name="accessories_uom" value="<?php echo $res['accessories_uom']; ?>" /></td>
            <td><input readonly type="text" style="font-size: 15px; border: none; text-align:center;" class="accessories_quantity" name="accessories_quantity" value="<?php echo $res['accessories_quantity']; ?>" /></td>

            </tr> 

	        <?php endforeach; ?>

        <?php
           }

        }
        ?>

          </tbody>
        </table>

          </div>

    </div></div></div>
      
    </section>
    <br/>
    <?php
include 'dbconnect.php';

        if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            $query = ("SELECT * FROM servicereport WHERE jobregister_id ='$jobregister_id'");
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    <div class="sign1">
    <p>Issue By : <input type="text" name="Issue_By" class="serviceno" value="<?php echo $row['Issue_By'] ?>" /></p>
    </div>
    <div class="sign2"><br />
    <p>Customer Name : <input style="width:250px" type="text" name="cust" class="serviceno" value="<?php echo $row['cust'] ?>" /></p>
    <p>Phone Number : <input style="width:250px" type="text" name="custphone" class="serviceno" value="<?php echo $row['custphone'] ?>" /></p>
    </div>
    <!-- <div class="sign3"><p>Date and Time:</p></div> -->
    <div><input type="button" onclick="submitFormEdit();" id="print-btn" value="Save" /></div>

        <script type="text/javascript">
            function submitFormEdit()
              { 
                var servicereport_id = $('input[name=servicereport_id]').val();
                var jobregister_id = $('input[name=jobregister_id]').val();
                var date = $('input[name=date]').val();
                var customer_name = $('input[name=customer_name]').val();
                var cust_phone1 = $('input[name=cust_phone1]').val();
                var job_name = $('input[name=job_name]').val();
                var job_assign = $('input[name=job_assign]').val();
                var assistants = $('input[name=assistants]').val();
                var technician_arrival = $('input[name=technician_arrival]').val();
                var technician_leaving = $('input[name=technician_leaving]').val();
                var machine_name = $('input[name=machine_name]').val();
                var serialnumber = $('input[name=serialnumber]').val();
                var srvcreportnumber = $('input[name=srvcreportnumber]').val();
                var Issue_By = $('input[name=Issue_By]').val();
                var report = $('textarea[name=report]').val();
                var cust = $('input[name=cust]').val();
                var custphone = $('input[name=custphone]').val();
                var technician_departure = $('input[name=technician_departure]').val();
                var Submitted_Items = $('textarea[name=Submitted_Items]').val();
                var Problem_Description = $('textarea[name=Problem_Description]').val();

                if (servicereport_id!= '' || servicereport_id == '',
                    jobregister_id!= '' || jobregister_id == '',
                    date!= '' || date == '',
                    customer_name!= '' || customer_name == '', 
                    cust_phone1!= '' || cust_phone1 == '', 
                    job_name!= '' || job_name == '', 
                    job_assign!= '' || job_assign == '', 
                    assistants!= '' || assistants == '', 
                    technician_arrival!= '' || technician_arrival == '', 
                    technician_leaving!= '' || technician_leaving == '', 
                    machine_name!= '' || machine_name == '', 
                    serialnumber!= '' || serialnumber == '',
                    srvcreportnumber!= '' || srvcreportnumber == '', 
                    Issue_By!= '' || Issue_By == '', 
                    report!= '' || report == '', 
                    cust!= '' || cust == '', 
                    custphone!= '' || custphone == '', 
                    technician_departure!= '' || technician_departure == '', 
                    Submitted_Items!= '' || Submitted_Items == '', 
                    Problem_Description!= '' || Problem_Description == '')

                  {
                    var formData = {servicereport_id: servicereport_id,
                                    jobregister_id: jobregister_id,
                                    date: date,
                                    customer_name: customer_name,
                                    cust_phone1: cust_phone1,
                                    job_name: job_name,
                                    job_assign: job_assign,
                                    assistants: assistants,
                                    technician_arrival: technician_arrival,
                                    technician_leaving: technician_leaving,
                                    machine_name: machine_name,
                                    serialnumber: serialnumber,
                                    srvcreportnumber: srvcreportnumber,
                                    Issue_By: Issue_By,
                                    report: report,
                                    cust: cust,
                                    custphone: custphone,
                                    technician_departure: technician_departure,
                                    Submitted_Items: Submitted_Items,
                                    Problem_Description: Problem_Description};
                                    
                    $('#messageEdit').html('<span style="color: red">Processing form. . . please wait. . .</span>');
                    $.ajax({
                            url: "servicereportEDITindex.php", 
                            type: 'POST', 
                            data: formData, 
                            success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                        alert('Report is successfully updated');
                        else
                        alert('Report failed to update');
                      }
                    });
                  }
              } 
        </script>

    </form>
          <?php
            } ?>
   <?php
        }
    }
    ?>
    <?php
        }
    }
    ?>
              <?php
            } ?>

          
</body>
</html>