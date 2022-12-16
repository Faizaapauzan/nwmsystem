<?php session_start(); ?>

<!doctype html>
<html lang=en>
<head>
    <title>Completed Job</title>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width,initial-scale=1">
    <link href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" rel="icon" type="image/x-icon">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/NeoSauKeong.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
        <div class="seven">
            <h1>Completed</h1>
        </div>
        <input type="text" id="myInput" placeholder="Search">
        <br>
            <!-- Completed --> 
                <?php
                    include 'dbconnect.php';
                        
                    $results = $conn->query
                                ("SELECT * FROM job_register WHERE 
                                (job_status = 'Completed' AND job_cancel = '')
                                    OR
                                (job_status = 'Completed' AND job_cancel IS NULL)
                             ORDER BY jobregisterlastmodify_at DESC LIMIT 50");
                                 
                    while($row = $results->fetch_assoc()) {
                        $jobregisterlastmodify_at = $row['jobregisterlastmodify_at'];
                        $date = substr($jobregisterlastmodify_at,0,10);            
				?> 
            
            <div class="cards" id="livesearch">
                <div class="card" id="notYetStatus" style="padding: 15px; background-color: #ededed" data-id="<?php echo $row['jobregister_id'];?>" data-toggle="modal" data-target="#myModal">
                <ul class="b">
                    <strong text-align="center" style="color: #081d45"><?php echo $row['customer_name']?> [<?php echo $row['customer_grade']?>]</strong>
                    <hr style="width: 100%; color: black; color: gray; background-color: gray; height: 2px;" />
                    <li><?php echo $row['job_priority']?></li>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_description']?></li>
                    <li><?php echo $row['machine_type']?></li>
                    <li><?php echo $row['machine_name']?></li>
                    <li><?php echo $row['serialnumber']?></li>
                </ul>
                <div class='timestamp'>
                    <strong><?php echo $row['job_assign']?></strong>
                    <br>
                    <strong><?php echo $date?></strong>
                    <br>
                    <strong><?php echo $row['support']?></strong>
                </div>
                </div>
            </div>
            <br> 
                <?php } ?>
            <!-- End of Completed -->

        <!-- Search Function -->
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#livesearch div").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <!-- End of Search Function -->

        <!-- PopUp Modal -->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                        <div class="tabs active" id="tab01">
                            <h6 class="font-weight-bold">Job Info</h6>
                        </div>
                        <div class="tabs" id="tab02">
                            <h6 class="text-muted">Job Assign</h6>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="line"></div>
                        <br>
                        <div class="modal-body p-0">

                            <!--JOB INFO-->
                            <fieldset class="show" id="tab011">
                                <form action="ajaxtechleader.php" method="post">
                                    <div class="tech-details">
                                    </div>
                                </form>
                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('.card').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            var type_id = $(this).data('type_id');
                                            // AJAX request
                                            $.ajax({
                                                url: 'ajaxtechnician-completed.php',
                                                type: 'post',
                                                data: {
                                                    jobregister_id: jobregister_id,
                                                    type_id: type_id
                                                },
                                                success: function(response) {
                                                    // Add response in Modal body
                                                    $('.tech-details').html(response);
                                                    // Display Modal
                                                    $('#myModal').modal('show');
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </fieldset>

                            <!--Job Assign-->
                            <fieldset id="tab021">
                                <form action="jobassignst.php" method="post">
                                    <div class="techupdate-details">
                                    </div>
                                </form>
                                <script type='text/javascript'>
                                    $(document).ready(function() {
                                        $('.card').click(function() {
                                            var jobregister_id = $(this).data('id');
                                            // AJAX request
                                            $.ajax({
                                                url: 'jobassignst-completed.php',
                                                type: 'post',
                                                data: {
                                                    jobregister_id: jobregister_id
                                                },
                                                success: function(response) {
                                                    // Add response in Modal body
                                                    $('.techupdate-details').html(response);
                                                    // Display Modal
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
        <!-- End of PopUp Modal -->

    </div>
</body>

</html>