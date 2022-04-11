
<html lang="en">

<head>

    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <title>NWM Technician Page</title>
    <link href="css/testing.css"rel="stylesheet" />
	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="js/testing.js" type="text/javascript"></script>
	

 
</head>

<body>

    <!--Home navigation-->
    <section class="home-section">
        <nav>
		
           <div class="sidebar-button1">
            <i class='bx bx-log-out'></i>
            <a href="logout.php">
                  <span class="dashboard">LOGOUT</span>
            </a>
           </div>		

           <div class="sidebar-button">
            <i class='bx bx-detail'></i>
            <a href="aizatjoblisting.php">
                  <span class="dashboard">JOB LISTING</span>
              </a>
           </div>
	
          <div class="welcome">Welcome <?php echo $_SESSION["username"] ?>!</div>
        </nav>
        
		
<!--TODO-->


        <div class="container">
          <div class="column">
            <p class="column-title" id="todo">Todo</p>
  <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
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

              <div class="cards">
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" >
			  	<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info">VIEW</button> <!-- Modal-->                  
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="toDoStatus">
                    <?php echo $row['job_status']?>
                    </div>
                </div>
              </div>

              <?php } ?>
            
            </div>
  
  
<!--PENDING-->  
  
  
            <div class="column" >
              <p class="column-title"id="pending" >Pending</p>

             <?php
              
              include 'dbconnect.php';

              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Aizat' AND job_status = 'Pending')

              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              
              while($row = $results->fetch_assoc()) {
                  
              ?>

              <div class="cards" >
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>" >
			  <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info">VIEW</button> <!-- Modal-->
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="pendingStatus">
                    <?php echo $row['job_status']?>
                    </div>
                </div>
              </div>

              <?php } ?>

            </div>


 <!--COMPLETE-->


          
            <div class="column">
              <p class="column-title" id="done">Complete</p>
              
               <?php
              
              include 'dbconnect.php';
              $results = $conn->query("SELECT
              jobregister_id, job_order_number, job_priority, job_name, customer_name, customer_grade, job_status
              FROM
              job_register
              WHERE
              (job_assign = 'Aizat' AND job_status = 'Completed')
              ORDER BY jobregisterlastmodify_at
              DESC LIMIT 50");
              while($row = $results->fetch_assoc()) {
                
              ?>

              <div class="cards"  >
              <div class="card" id="notYetStatus" data-id="<?php echo $row['jobregister_id'];?>">
			  	<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info">VIEW</button> <!-- Modal-->
                  <ul class="b" id="draged">
                    <strong align="center"><?php echo $row['job_priority']?></strong>
                    <li><?php echo $row['job_order_number']?></li>
                    <li><?php echo $row['job_name']?></li>
                    <li><?php echo $row['customer_name']?>  [<?php echo $row['customer_grade']?>] </li>
                  </ul>
                    <div class="status"  id="completedStatus">
                    <?php echo $row['job_status']?>
                    </div>
                </div>
              </div>

              <?php } ?>

            </div>
            </div>
        </section>



 <!--VIEW BUTTON MODAL AJAX-->
	


        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
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
                            <h6 class="text-muted">Remarks</h6>
                        </div>
                        <div class="tabs" id="tab04">
                            <h6 class="text-muted">Report</h6>
                        </div>
						<div class="tabs" id="tab05">
                            <h6 class="text-muted">Accessories</h6>
                        </div>
						<div class="tabs" id="tab06">
                            <h6 class="text-muted">Photo</h6>
                        </div>
						<div class="tabs" id="tab07">
                            <h6 class="text-muted">Job Status</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="modal-body p-0">
                        <fieldset class="show" id="tab011">
                            <div class="bg-light">
                                <h5 class="text-center mb-4 mt-0 pt-4">My Apps</h5>
                                <h6 class="px-3">Most Used Apps</h6>
                                <ol class="pb-4">
                                    <li>Watsapp</li>
                                    <li>Instagram</li>
                                    <li>Chrome</li>
                                    <li>Linkedin</li>
                                </ol>
                            </div>
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-android"></span> Suggested Apps</h6>
                                <h6 class="text-primary pb-2"><a href="#">Opera Browser</a> <span class="text-secondary">- One of the best browsers</span></h6>
                                <h6 class="text-primary pb-2"><a href="#">Camscanner</a> <span class="text-secondary">- Easily scan your documents</span></h6>
                                <h6 class="text-primary pb-4"><a href="#">Coursera</a> <span class="text-secondary">- Learn online, lecturers from top universities</span></h6>
                            </div>
                        </fieldset>
                        <fieldset id="tab021">
                            <div class="bg-light">
                                <h5 class="text-center mb-4 mt-0 pt-4">Knowledge Center</h5>
                                <form>
                                    <div class="form-group pb-5 px-3"> <select name="account" class="form-control">
                                            <option selected disabled>Select Product</option>
                                            <option>Product 1</option>
                                            <option>Product 2</option>
                                            <option>Product 3</option>
                                            <option>Product 4</option>
                                        </select> </div>
                                </form>
                            </div>
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-star"></span> Popular Topics</h6>
                                <h6 class="text-primary pb-2"><a href="#">Getting started with Blazemeter</a></h6>
                                <h6 class="text-primary pb-2"><a href="#">Creating tests</a></h6>
                                <h6 class="text-primary pb-4"><a href="#">Running tests</a></h6>
                            </div>
                        </fieldset>
                        <fieldset id="tab031">
                            <div class="bg-light">
                                <h5 class="text-center mb-4 mt-0 pt-4">Communities</h5>
                                <form>
                                    <div class="form-group pb-5 px-3 row justify-content-center"> <button type="button" class="btn btn-primary">New Community +</button> </div>
                                </form>
                            </div>
                            <div class="px-3">
                                <div class="border border-1 box">
                                    <h5>Community 1</h5>
                                    <p class="text-muted mb-1">Members : <strong>27</strong></p>
                                </div>
                                <div class="border border-1 box">
                                    <h5>Community 2</h5>
                                    <p class="text-muted mb-1">Members : <strong>16</strong></p>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="tab041">
                            <div class="bg-light">
                                <h5 class="text-center mb-4 mt-0 pt-4">Education</h5>
                                <form>
                                    <div class="form-group pb-2 px-3"> <input type="text" placeholder="Enter College Name" class="form-control"> </div>
                                    <div class="form-group row pb-2 px-3">
                                        <div class="col-6"> <input type="text" placeholder="Percentage" class="form-control"> </div>
                                        <div class="col-6"> <input type="text" placeholder="Grade" class="form-control"> </div>
                                    </div>
                                    <div class="form-group px-3 pb-2"> <label class="form-control-label">
                                            <h6>What are you good at ?</h6>
                                        </label>
                                        <div class="custom-control custom-checkbox"> <input class="custom-control-input" id="option1" type="checkbox" value=""> <label class="custom-control-label" for="option1">Web Development</label> </div>
                                        <div class="custom-control custom-checkbox"> <input class="custom-control-input" id="option2" type="checkbox" value=""> <label class="custom-control-label" for="option2">Data Structures & Algorithms</label> </div>
                                        <div class="custom-control custom-checkbox"> <input class="custom-control-input" id="option3" type="checkbox" value=""> <label class="custom-control-label" for="option3">Android Development</label> </div>
                                        <div class="custom-control custom-checkbox"> <input class="custom-control-input" id="option4" type="checkbox" value=""> <label class="custom-control-label" for="option4">Blockchain</label> </div>
                                        <div class="custom-control custom-checkbox"> <input class="custom-control-input" id="option5" type="checkbox" value=""> <label class="custom-control-label" for="option5">Machine Learning Algorithms</label> </div>
                                    </div>
                                    <div class="form-group pb-5 row justify-content-center"> <button type="button" class="btn btn-primary px-3">Submit</button> </div>
                                </form>
                            </div>
                            <div class="px-3">
                                <h6 class="pt-3 pb-3 mb-4 border-bottom"><span class="fa fa-rocket"></span> Trending Technologies</h6>
                                <h6 class="text-primary pb-2"><a href="#">Augmented Reality and Virtual Reality</a></h6>
                                <h6 class="text-primary pb-2"><a href="#">Angular and React</a></h6>
                                <h6 class="text-primary pb-2"><a href="#">Big Data and Hadoop</a></h6>
                                <h6 class="text-primary pb-4"><a href="#">Internet of Things (IoT)</a></h6>
                            </div>
                        </fieldset>
                    </div>
                    <div class="line"></div>
                    <div class="modal-footer d-flex flex-column justify-content-center border-0">
                        <p class="text-muted">Can't find what you're looking for?</p> <button type="button" class="btn btn-primary">Contact Support Team</button>
                    </div>
                </div>
            </div>
        </div>

						
						

	



















</body>
</html>