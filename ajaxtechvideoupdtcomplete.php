<?php 
    session_start();
    include 'dbconnect.php'; 
?>

<!DOCTYPE html>
  <html lang="en">
    <style media="screen">
      #preview {
        display: flex;
        width: 200px;
        height: 200px;
        border: 1px solid black;
        margin-top: -15px;
        flex-wrap: wrap;
        overflow-y: scroll;
      }
      
      #preview img {
        width: 50%;
        height: 50%;
      }
      
      form .upload-report .input-box {
        padding-left: 49px;
        margin-bottom: 1px;
        margin-top: 7px;
        width: calc(100% / 2 - -302px);
        padding: 0 -9px 0 15px;
      }
      
      form .upload-report label.details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
      }
      
      .upload-report .input-box input, .upload-report .input-box select {
        height: 40px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
      }
      
      .upload-report .input-box input:focus,
      .upload-report .input-box input:valid,
      .upload-report .input-box select:focus,
      .upload-report .input-box select:valid {border-color: #081d45;}
    </style>
    
    <body>
      <form id="submitVideoBefore">
        <!-- for select job register id -->
        <?php
            
            include 'dbconnect.php';
            
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              
              $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
              $query_run = mysqli_query($conn, $query);
              
              if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
        ?>
        
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <?php }  } } ?>
        
        <b><label style="font-size: 15px; margin-bottom:15px;" for="position">Video Machine (Before Service)</label></b>
        <div class="update-form">
          <div class="upload-report">
            <div class="input-group" style="margin-bottom: 20px;">
              <input type="file" class="form-control" name="multipleVideo[]" id="multipleVideo" required="" multiple aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              <input type="hidden" id="description" name="description" value="Machine (Before Service)">
              <button type="submit" name="uploadVideo" class="btn btn-outline-secondary" style="background-color: #081d45; color: #fff; cursor: pointer;">Upload</button>
            </div>
          </div>
          
          <div id="previewBeforeVideo"></div>
            
          <div class="message">
            <p class="control"><b id="messageVideoBefore"></b></p>
          </div>
          
          <!-- for select data from tech video update database -->
          <?php
            include_once("dbconnect.php");
              
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
                
              $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
              $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
            } 
          ?>
            
          <!-- Photos Table Before Service -->
          <div class="table-responsive">
            <table style="box-shadow: 0 5px 10px #f7f7f7;">
              <tbody style="display: flex; flex-wrap: wrap; padding-left: 15px; margin-top:-20px;">
                <?php foreach($queryRecords as $res) :?>
                <tr style="display:grid; padding-left: 25px; margin-left: 3px;" >
                  <td><video width="170" height="150" src="image/<?=$res['video_url']?>" controls></video></td>
                  <td style='text-align: center;'><span class='deletedv' style="color:red; cursor: pointer; font-weight:bold;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                </tr> 
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </form>
      
      <script type="text/javascript">
        $(document).ready(function(){
          function previewVideos() {
            var $preview = $('#previewBeforeVideo').empty();
            if (this.files) $.each(this.files, readAndPreview);
            
            function readAndPreview(i, file) {
              var reader = new FileReader();
              
              $(reader).on("load", function() {
                $preview.append($("<video/>", {src:this.result, height:100}));
              });
              
              reader.readAsDataURL(file);
            }
          }
          
          $('#multipleVideo').on("change", previewVideos);
          
          $("#submitVideoBefore").on("submit", function(e) {
            e.preventDefault();
            
            $.ajax({
              url :"uploadvideo.php",
              type :"POST",
              cache :false,
              contentType : false,
              processData : false,
              data: new FormData(this),
              
              success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                
                if(res.success == true)
                  $('#messageVideoBefore').html('<span style="color: green">Video Uploaded!</span>');
                else
                  $('#messageVideoBefore').html('<span style="color: red">Video cannot be Upload</span>');
                  $("#multipleVideo").val("");
              }
            });
          });
        });
      </script>
     
      <!-- AFTER -->
      <form id="submitAfterVideo">
        <!-- for select job register id -->
        <?php
            
            include 'dbconnect.php';
            
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
              $query_run = mysqli_query($conn, $query);
              if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
        ?>
        
        <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
              
        <?php }  } } ?>
        
        <b><label style="font-size: 15px; margin-bottom:15px; margin-top:15px;" for="position" class="details">Video Machine (After Service)</label></b>
        <div class="update-form">
          <div class="upload-report" style="margin-bottom: 20px;">
            <div class="input-group">
              <input type="file" class="form-control" name="multipleVideo[]" id="multipleAfterVideo" required="" multiple aria-describedby="inputGroupFileAddon04" aria-label="Upload">
              <input type="hidden" id="description" name="description" value="Machine (After Service)">
              <button type="submit" name="uploadVideo" class="btn btn-outline-secondary" style="background-color: #081d45; color: #fff; cursor: pointer;">Upload</button>
            </div>
          </div>
          
          <div id="previewAfterVideo"></div>
          
          <div class="message">
            <p class="control"><b id="messageVideoAfter"></b></p>
          </div>
          
          <!-- for select data from tech photo update database -->
          <?php
              
              include_once("dbconnect.php");
              
              if (isset($_POST['jobregister_id'])) {
                $jobregister_id =$_POST['jobregister_id'];
                
                $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
                $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
              } 
          ?>
          
          <!-- Photos Table After Service -->
          <div class="table-responsive">
            <table style="box-shadow: 0 5px 10px #f7f7f7; margin-top:-20px;">
              <tbody style="display: flex; flex-wrap: wrap;">
                <?php foreach($queryRecords as $res) :?>
                <tr style="display:grid; padding-left: 25px;">
                  <td><video width="170" height="150" src="image/<?=$res['video_url']?>" controls></video></td>
                  <td style='text-align: center;'><span class='deletedv' style="color:red; cursor: pointer; font-weight:bold;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                </tr> 
                <?php endforeach;?>
              </tbody>	
            </table>
          </div>
        </div>
      </form>
      
      <script>
        $(document).ready(function() {
          $('.deletedv').click(function() {
            var el = this;
            var deletedid = $(this).data('id');
            var confirmalert = confirm("Are you sure?");
            
            if (confirmalert == true) {
              $.ajax({
                url: 'techvideo-delete.php',
                type: 'POST',
                data: {id:deletedid},
                
                success: function(response) {
                  if(response == 1) {
                    $(el).closest('tr').css('background','tomato');
                    
                    $(el).closest('tr').fadeOut(800,function() {
                      $(this).remove();
                    });
                  }
                  
                  else {
                    alert('Invalid ID.');
                  }
                }
              });
            }
          });
        });
      </script>
      
      <script type="text/javascript">
        $(document).ready(function() {
          function previewVideos() {
            var $preview = $('#previewAfterVideo').empty();
            if (this.files) $.each(this.files, readAndPreview);
            
            function readAndPreview(i, file) {
              var reader = new FileReader();
              
              $(reader).on("load", function() {
                $preview.append($("<video/>", {src:this.result, height:100}));
              });
              
              reader.readAsDataURL(file);
            }
          }
          
          $('#multipleAfterVideo').on("change", previewVideos);
          $("#submitAfterVideo").on("submit", function(e) {
            e.preventDefault();
                $.ajax({
                  url  :"uploadvideo.php",
                  type :"POST",
                  cache:false,
                  contentType : false,
                  processData : false,
                  data: new FormData(this),
                  
                  success: function(response) {
                    var res = JSON.parse(response);
                    console.log(res);
                    
                    if(res.success == true)
                      $('#messageVideoAfter').html('<span style="color: green">Video Uploaded!</span>');
                    else
                      $('#messageVideoAfter').html('<span style="color: red">Video cannot be Upload</span>');
                      $("#multipleAfterVideo").val("");
                  }
                });
          });
        });
      </script>
    </body>
  </html>