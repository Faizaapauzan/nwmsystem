<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print">

    <title>Report Admin</title>
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
  width: 29.7cm;
  height: 21cm;
  overflow: hidden;
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

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}


</style>

<body>
  <div class="text-center">
    <button onclick="window.print();" class="btn btn-primary" id="print-btn" style="margin: 20px;">Print</button>
    </div>
    
    <div class="my-5 page" size="A4">
    <div class="status" style="margin: 20px;">
    Worker Assignment
    <br/>
    Date :
    </div>

    
    <div class="remarks-job" style="margin-top: 27px; margin: 20px;">
    Remark - Total Workers:
    <div class="job-update" style="margin-top: 20px; margin: 20px;">
    <table style="width:100%">
        <thead style="height: 42px;">
            <th></th>
            <th style="width: 10%;">Leader</th>
            <th style="width: 12%;">Assistant</th>
            <th style="width: 15%;">Place</th>
            <th style="width: 32%;">Machine</th>
            <th style="width: 5%;">Departure</th>
            <th style="width: 5%;">Arrival</th>
            <th style="width: 5%;">Leaving</th>
            <th style="width: 5%;">Work Time</th>
            <th style="width: 5%;">Travel Time</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tbody>

    </table>
       </div>
    </div>
<div class="remarks-worker" style="margin: 20px;padding-top: 102px;">
    Remark - Workers Attendance

    <div class="staff-update" style="margin-top: 50px; margin: 20px;">
    <table style="width:100%">
        <thead style="height: 42px;">
            <th style="width: 3%;"></th>
            <th style="width: 20%;">Leader</th>
            <th style="width: 20%;">Assistant</th>
            <th style="width: 10%">Clock In</th>
            <th style="width: 10%;">Clock Out</th>
            <th style="width: 10%;">Rest Out</th>
            <th style="width: 10%;">Rest In</th>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tbody>

    </table>
        </div>
    </div>

    </div>