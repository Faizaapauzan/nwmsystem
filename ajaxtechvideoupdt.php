<?php 
    session_start();
    
    include 'dbconnect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <body>
    <!-- Before Service -->
    <div class="card mb-3">
      <div class="card-body">
        <form id="submitVideoBefore">
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

          <label for="" class="fw-bold mb-3">Video Before Service</label>
          <div class="input-group">
            <input type="file" name="multipleVideo[]" id="multipleVideo" multiple class="form-control">
            <input type="hidden" id="description" name="description" value="Machine (Before Service)">
            <button type="submit" name="uploadVideo" class="btn" style="background-color: #081d45; color:#fff; border:none">Upload</button>
          </div>

          <div class="message">
            <p class="control"><b id="messageVideoBefore"></b></p>
          </div>

          <div id="previewBeforeVideo" class="mb-3"></div>

          <?php 
              include_once("dbconnect.php");
              if (isset($_POST['jobregister_id'])) {
                $jobregister_id =$_POST['jobregister_id'];
                $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
                $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
                } 
          ?>

          <div class="table-responsive">
            <table>
              <tbody style="display: flex; flex-wrap: wrap;">
                <?php foreach($queryRecords as $res) :?>
                <tr>
                  <td style="display:grid;"><video width="170" height="150" src="image/<?=$res['video_url']?>" controls></video></td>
                  <td><span class="deletedv fw-bold" style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>

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
        $("#submitVideoBefore").on("submit", function(e){
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
    <!-- End of Before Service -->

    <!-- After Service -->
    <div class="card mb-3">
      <div class="card-body">
        <form id="submitAfterVideo">
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
          
          <label for="" class="fw-bold mb-3">Video After Service</label>
          <div class="input-group">
            <input type="file" name="multipleVideo[]" id="multipleAfterVideo" multiple class="form-control">
            <input type="hidden" id="description" name="description" value="Machine (After Service)">
            <button type="submit" name="uploadVideo" class="btn" style="background-color: #081d45; color:#fff; border:none">Upload</button>
          </div>

          <div class="message">
            <p class="control"><b id="messageVideoAfter"></b></p>
          </div>
          
          <div id="previewAfterVideo"></div>

          <?php
              
              include_once("dbconnect.php");
              
              if (isset($_POST['jobregister_id'])) {
                $jobregister_id =$_POST['jobregister_id'];
                
                $sql =  "SELECT * FROM technician_videoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
                
                $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
              } 
          ?>

          <div class="table-responsive">
            <table>
              <tbody style="display: flex; flex-wrap: wrap;">
                <?php foreach($queryRecords as $res) :?>
                <tr>
                  <td style="display:grid;"><video width="170" height="150" src="image/<?=$res['video_url']?>" controls></video></td>
                  <td><span class="deletedv fw-bold"  style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>      
        </form>
      </div>
    </div>

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
        $("#submitAfterVideo").on("submit", function(e){
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
    <!-- end of After Service -->

    <!-- delete video -->
    <script>
      $(document).ready(function(){
        $('.deletedv').click(function(){
          var el = this;
          var deletedid = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
              
          if (confirmalert == true) {
            $.ajax({
              url: 'techvideo-delete.php',
              type: 'POST',
              data: {id:deletedid},
              
              success: function(response){
                if(response == 1){
                  $(el).closest('tr').css('background','tomato');
                  $(el).closest('tr').fadeOut(800,function(){
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
    <!-- End of delete video -->
  </body>
</html>