<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Technician Report Off</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
	<link href="css/technicianmain.css"rel="stylesheet" />

	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

<nav class="navbar">
    <div class="wrapper">
    <ul class="main-nav" id="js-menu">
        <a href="technician.php" class="nav-links sidebarbutton" style="text-decoration: none;"><i class='bx bx-home'></i>HOME</a>
    </div>
  </nav>

<!-- Availability toggle button -->

<!-- Availability toggle button -->

<!-- Date Picker -->
<input type="text" name="datepicker" id="datePicker">

<button onclick="submit()">Submit</button>


<script type="text/javascript">
	$(document).ready(function(){
	  	$('#datePicker').daterangepicker();
	});

	function submit() {
		//dptkn range of date kat sni
		var dateRange = document.getElementById('datePicker').value;
		//splitkn range of date utk mmbolehkn kita kira diference date
		var splitDate = dateRange.split("-");
		var startDate = new Date(splitDate[0]);
		var endDate = new Date(splitDate[1]);

		var Difference_In_Time = endDate.getTime() - startDate.getTime();
  
		// To calculate the no. of days between two dates
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

		var dateArr = [];

		for( var i = 0; i <= Difference_In_Days; i++){
			
			var date = new Date(startDate);
			//kat sni kita dpt tarikh2 yg user plih
			date.setDate(startDate.getDate() + i);

			//pastu kita push masuk dlm array utk hntar ke php
			dateArr.push(date.toLocaleDateString());
		}

		$.ajax({  
		    type: 'POST',  
		    url: 'test.php', 
		    data: { data:JSON.stringify(dateArr) },
		    success: function(response) {
		        alert(response);
		    }
		});
	}
	
</script>
<!-- Date Picker -->

</body>
</html>