<?php session_start(); ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
        
        <title>Technician Use</title>

        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
        <link href="css/technicianmain.css"rel="stylesheet"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
        <script src="js/testing.js" type="text/javascript"></script>
	    <script src="js/search.js" type="text/javascript"></script>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="#"rel="shortcut icon"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/7b6b55bad0.js" crossorigin="anonymous"></script>
    </head>
    
    <style>
        .dropdown-content {
            display: none;
            padding-left: 20px;
            position: absolute;
            background-color: #f9f9f9;
            min-width: auto;
            bottom: 55px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            padding-right: 7px;
        }
        
        .dropdown-content a:hover {background-color: #f1f1f1}
    
        .dropdown:hover .dropdown-content {display: block;}
    
        .dropdown:hover .dropbtn {color:whitesmoke;}
    
        #notYetStatus{position: static;}
        
        .navbar {
            margin-top: 20px;
            background-color: #ddd;
            overflow: hidden;
            max-height: 1800px;
                -webkit-transition: max-height 0.3s;
                -moz-transition: max-height 0.3s;
                -ms-transition: max-height 0.3s;
                -o-transition: max-height 0.3s; 
            transition: max-height 0.3s;
        }
        
        .navbar-toggle {
            background-color: #D2D2CF;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            font-weight: bold;
        }
        
        .nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
    </style>
    
    <body>
        <!-- Bottom Navigation -->
        <nav class="nav">
            <div class="nav__link nav__link dropdown">
                <i class="material-icons">list_alt</i>
                <span class="nav__text">Preparing</span>
                <div class="dropdown-content">
                    <a href="StoreTechnicianUse.php">Technician Use</a>
                    <a href="StoreCustomerRequest.php">Customer Request</a>
                </div>
            </div>
            
            <a href="StorePending.php" class="nav__link">
                <i class="material-icons">pending_actions</i>
                <span class="nav__text">Pending</span>
            </a>
            
            <a href="store.php" class="nav__link">
                <i class="material-icons">home</i>
                <span class="nav__text">Home</span>
            </a>
            
            <a href="StoreReady.php" class="nav__link">
                <i class="material-icons">do_not_disturb_on</i>
                <span class="nav__text">Ready</span>
            </a>
            
            <a href="StoreInOutStock.php" class="nav__link">
                <i class="material-icons">check_circle</i>
                <span class="nav__text">In/Out Stock</span>
            </a>
        </nav>
        <!-- End of Bottom Navigation -->
        
        <div class="container">
            <div class="example" style="text-align: end; padding-bottom: 10px;">
            <input type="text" id="search">
            <input type="button"  id="button" onmousedown="doSearch(document.getElementById('search').value)" value="Find">
        </div>
        
        <div class="column">
            <p class="column-title" id="joblisting"><b>Technician Use</b></p>
                <?php
                    
                    include 'dbconnect.php';
                    
                    $query = "SELECT * FROM job_register 
                                WHERE staff_position = 'Storekeeper' 
                                AND (job_status = '' OR job_status IS NULL OR job_status = 'Doing' OR job_status = 'Incomplete')
                                AND (job_cancel= '' OR job_cancel IS NULL)
                                AND accessories_for = 'Technician Use'
			                  ORDER BY jobregisterlastmodify_at DESC";

			        $result = mysqli_query($conn, $query);

			        $customer_name = '';
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
                        $updatedate = substr($jobregisterlastmodify_at,0,10);
                        $row['updatedate'] = $updatedate;
                        
                        if ($row['customer_name'] != $customer_name) {
                            echo "<button id='navToggle' class='navbar-toggle'>".$row['customer_name']." [".$row['customer_grade']."]</button>";
                            $customer_name = $row['customer_name'];
                        }
                        
                        echo "<div class='cards'>
				                <div class='card' id='notYetStatus' data-id='".$row['jobregister_id']."' data-toggle='modal' data-target='#mymodal'>
				                <button type='button' class='btn btn-light text-left font-weight-bold font-color-black'>
				                    <ul class='b' id='draged'>
				  	                    <strong text-align='center'>".$row['job_priority']."</strong>
				  	                    <li>".$row['job_order_number']."</li>
				  	                    <li>".$row['job_description']."</li>
				  	                    <li>".$row['machine_name']."</li>
				  	                    <li>".$row['machine_type']."</li>
				                    </ul>
				                </div>
				              </div>";
			        }
		        ?>
	    </div>
        
        <!-- Popup Modal -->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Job Info</h6>
                        </div>
                        
                        <div class="tabs" id="tab02">
                            <h6 class="text-muted">Update</h6>
                        </div>
                        
                        <div class="tabs" id="tab03">
                            <h6 class="text-muted">Status</h6>
                        </div>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        
                        <!--JOB INFO-->
                        <div class="line"></div>
                        <br>
                        <div class="modal-body p-0">
                            <fieldset class="show" id="tab011">
                                <form action="" method="post">
                                    <div class="tech-details">

                                    </div>
                                </form>
                                
                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('.card').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            
                                            $.ajax({
                                                url: 'ajaxtechnician.php',
                                                type: 'post',
                                                data: {jobregister_id: jobregister_id},
                                                
                                                success: function(response) {
                                                    $('.tech-details').html(response);
                                                    $('#myModal').modal('show');
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </fieldset>
                        </div>
                        
                        <!--UPDATE-->
                        <fieldset  id="tab021">
                            <form action="ajaxstoreupdate.php" method="post">
                                <div class="storeupdate-details">

                                </div>
                            </form>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('.card').click(function() {
                                        var jobregister_id = $(this).data('id');
                                        
                                        $.ajax({
                                            url: 'ajaxstoreupdate.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            
                                            success: function(response) {
                                                $('.storeupdate-details').html(response);
                                                $('#myModal').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>
                        </fieldset>
                    
                        <!--STATUS-->
                        <fieldset  id="tab031">
                            <form action="ajaxstorejobstatus.php" method="post">
                                <div class="storejobstatus-details">

                                </div>
                            </form>
                            
                            <script type='text/javascript'>
                                $(document).ready(function() {
                                    $('.card').click(function() {
                                        var jobregister_id = $(this).data('id');
                                        
                                        $.ajax({
                                            url: 'ajaxstorejobstatus.php',
                                            type: 'post',
                                            data: {jobregister_id: jobregister_id},
                                            
                                            success: function(response) {
                                                $('.storejobstatus-details').html(response);
                                                $('#myModal').modal('show');
                                            }
                                        });
                                    });
                                });
                            </script>								
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>