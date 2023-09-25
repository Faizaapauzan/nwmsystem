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
        <form id="submitForm">
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

          <label for="" class="fw-bold mb-3">Photo Before Service</label>
          <div class="input-group">
            <input type="file" name="multipleFile[]" id="multipleFile" multiple class="form-control">
            <input type="hidden" id="description" name="description" value="Machine (Before Service)">
            <button type="submit" name="upload" class="btn" style="background-color: #081d45; color:#fff; border:none">Upload</button>
          </div>

          <div class="message">
            <p class="control"><b id="messageImagebefore"></b></p>
          </div>

          <div id="previewBefore" class="mb-3"></div>

          <?php 
            include_once("dbconnect.php");
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
              $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
              }
          ?>

          <div class="table-responsive">
            <table>
              <tbody style="display: flex; flex-wrap: wrap;">
                <?php foreach($queryRecords as $res) :?>
                <tr>
                  <td style="display:grid;"><a href="image/<?php echo $res['file_name']; ?>" download><img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>
                  <td><span class="deleted fw-bold" style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
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
          function previewImages() {
            var $preview = $('#previewBefore').empty();
            
            if (this.files) $.each(this.files, readAndPreview);
            
            function readAndPreview(i, file) {
              var reader = new FileReader();
              
              $(reader).on("load", function() {
                $preview.append($("<img/>", {src:this.result, height:100}));
              });
              
              reader.readAsDataURL(file);
            }
          }
          
          $('#multipleFile').on("change", previewImages);
          $("#submitForm").on("submit", function(e){
            e.preventDefault();
            
            $.ajax({
              url  :"uploads.php",
              type :"POST",
              cache:false,
              contentType : false,
              processData : false,
              data: new FormData(this),
                    
              success: function(response) {
                var res = JSON.parse(response);
                
                console.log(res);
                if(res.success == true)
                  $('#messageImagebefore').html('<span style="color: green">Image Uploaded!</span>');
                else
                  $('#messageImagebefore').html('<span style="color: red">Image cannot be Upload</span>');
                  $("#multipleFile").val("");
              }
            });
          });
        });
    </script>
    <!-- End of Before Service -->

    <!-- After Service -->
    <div class="card mb-3">
      <div class="card-body">
        <form id="submitAfterForm">
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
          
          <label for="" class="fw-bold mb-3">Photo After Service</label>
          <div class="input-group">
            <input type="file" name="multipleFile[]" id="multipleAfter" multiple class="form-control">
            <input type="hidden" id="description" name="description" value="Machine (After Service)">
            <button type="submit" name="upload" class="btn" style="background-color: #081d45; color:#fff; border:none">Upload</button>
          </div>

          <div class="message">
            <p class="control"><b id="messageImageAfter"></b></p>
          </div>
          
          <div id="previewAfter" class="mb-3"></div>

          <?php 
              
              include_once("dbconnect.php");
              
              if (isset($_POST['jobregister_id'])) {
                $jobregister_id =$_POST['jobregister_id'];
                
                $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
                
                $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
              }

          ?>

          <div class="table-responsive">
            <table>
              <tbody style="display: flex; flex-wrap: wrap;">
                <?php foreach($queryRecords as $res) :?>
                <tr>
                  <td style="display:grid;"><a href="image/<?php echo $res['file_name']; ?>" download><img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>
                  <td><span class="deleted fw-bold"  style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
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
        function previewImages() {
          var $preview = $('#previewAfter').empty();
          
          if (this.files) $.each(this.files, readAndPreview);
          
          function readAndPreview(i, file) {
            var reader = new FileReader();
            
            $(reader).on("load", function() {
              $preview.append($("<img/>", {src:this.result, height:100}));
            });
            
            reader.readAsDataURL(file);
          }
        }
        
        $('#multipleAfter').on("change", previewImages);
        $("#submitAfterForm").on("submit", function(e) {
          e.preventDefault();
          
          $.ajax({
            url  :"uploads.php",
            type :"POST",
            cache:false,
            contentType : false,
            processData : false,
            data: new FormData(this),
                      
            success: function(response) {
              var res = JSON.parse(response);
              
              console.log(res);
              if(res.success == true)
                $('#messageImageAfter').html('<span style="color: green">Image Uploaded!</span>');
              else
                $('#messageImageAfter').html('<span style="color: red">Image cannot be Upload</span>');
                $("#multipleAfter").val("");
            }
          });
        });
      });
    </script>
    <!-- end of After Service -->

    <!-- delete photo -->
    <script>
      $(document).ready(function(){
        $('.deleted').click(function(){
          var el = this;
          var deletedid = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          
          if (confirmalert == true) {
            $.ajax({
              url: 'techphoto_delete.php',
              type: 'POST',
              data: {id:deletedid},
                        
              success: function(response) {
                if(response == 1) {
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
    <!-- End of delete photo -->
  </body>
</html>