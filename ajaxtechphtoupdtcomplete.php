<?php 
    session_start();
    include 'dbconnect.php';
?>

<!DOCTYPE html>
<head>

</head>

<style media="screen">
    #preview{
      display: flex;
      width: 200px;
      height: 200px;
      border: 1px solid black;
      margin-top: -15px;
      flex-wrap: wrap;
      overflow-y: scroll;
    }

    #preview img{
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
    
    .upload-report .input-box input,
    .upload-report .input-box select {
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

<body>
  
  <form id="submitForm">
    
  <!-- for select job register id -->
  <div>
      <?php
          include 'dbconnect.php';
          if (isset($_POST['jobregister_id'])) {
            $jobregister_id =$_POST['jobregister_id'];
            $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
              while ($row = mysqli_fetch_array($query_run)) { 
      ?>
  <div class="input-box">
    <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
  </div>
      <?php }  } } ?>
      
  <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (Before Service)</label></b>
  <input type="hidden" id="description" name="description" value="Machine (Before Service)">
  <div id="previewBefore"></div>
  <div class="update-form">
    <div class="upload-report">
      <div class="input-box" style="display: flex; margin-left: -16px;">
      <input type="file" class="form-control" name="multipleFile[]" id="multipleFile" required="" multiple>
      <input type="submit" name="upload" value="Upload Machine (Before Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
    </div>
  </div>
  <div class="message">
    <p class="control"><b id="messageImagebefore"></b></p>
  </div>
  
    <!-- for select data from tech photo update database -->
    <?php 
        include_once("dbconnect.php");
        if (isset($_POST['jobregister_id'])) {
          $jobregister_id =$_POST['jobregister_id'];
          $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (Before Service)' AND jobregister_id ='$jobregister_id'";
          $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
          }
    ?>
    
  <!-- Photos Table Before Service -->
  <div class="table-responsive">
    <table style="box-shadow: 0 5px 10px #f7f7f7;" >
    <tbody style="display: flex; flex-wrap: wrap;">
    
    <?php foreach($queryRecords as $res) :?>
      <tr style="display:grid; padding-left: 25px;" ><td><a href="image/<?php echo $res['file_name']; ?>" download>
      <img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>
      <td ><span class='deleted' style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span>
      </td>
      </tr> 
    <?php endforeach;?>

    </tbody>
    </table>
  </div>
  </div>
  </form>
  
  <script type="text/javascript">
      $(document).ready(function(){
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
                  contentType : false, // you can also use multipart/form-data replace of false
                  processData : false,
                  data: new FormData(this),
                  success: function(response)
                    {
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
  
  <!-- AFTER -->
  <form id="submitAfterForm">
    <!-- for select job register id -->
    <div>
        <?php
            include 'dbconnect.php';
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              $query = "SELECT * FROM job_register WHERE jobregister_id ='$jobregister_id'";
              $query_run = mysqli_query($conn, $query);
              if ($query_run) {
                while ($row = mysqli_fetch_array($query_run)) {
        ?>
        
        <div class="input-box">
          <input type="hidden" id="jobregister_id" name="jobregister_id" value="<?php echo $row['jobregister_id'] ?>">
        
        <?php }  } } ?>
        
        <b><label style="margin-left: 33px; font-size: 20px;" for="position" class="details">Machine (After Service)</label></b>
        <input type="hidden" id="description" name="description" value="Machine (After Service)">
        <div id="previewAfter"></div>
        <div class="update-form">
          <div class="upload-report">
            <div class="input-box" style="display: flex; margin-left: -16px;">
            <input type="file" class="form-control" name="multipleFile[]" id="multipleAfter" required="" multiple>
            <input type="submit" name="upload" value="Upload Machine (After Service)" style="font-size: 15px; background-color: #081d45; color: #fff; cursor: pointer;">
          </div>
        </div>
        <div class="message">
          <p class="control"><b id="messageImageAfter"></b></p>
        </div>
        
        <!-- for select data from tech photo update database -->
        <?php 
            include_once("dbconnect.php");
            if (isset($_POST['jobregister_id'])) {
              $jobregister_id =$_POST['jobregister_id'];
              $sql =  "SELECT * FROM technician_photoupdate WHERE description='Machine (After Service)' AND jobregister_id ='$jobregister_id'";
              $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
              } 
        ?>
        
        <!-- Photos Table Before Service -->
        <div class="table-responsive">
          <table style="box-shadow: 0 5px 10px #f7f7f7;">
          <tbody style="display: flex; flex-wrap: wrap;">
          <?php foreach($queryRecords as $res) :?>
            <tr style="display:grid; padding-left: 25px;" ><td><a href="image/<?php echo $res['file_name']; ?>" download>
            <img src="<?php echo 'image/'.$res['file_name']; ?>" id="display_image"></td>
            <td >
              <span class='deleted' style="color:red; cursor: pointer;" data-id='<?php echo $res["id"]; ?>'>Delete</span>
            </td>
            </tr>
          <?php endforeach;?>
          </tbody>
          </table>
        </div>
        </div>
  </form>
  
  <script>
      $(document).ready(function(){
        // Delete 
        $('.deleted').click(function(){
          var el = this;
          // Delete id
          var deletedid = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
            // AJAX Request
            $.ajax({
                    url: 'techphoto_delete.php',
                    type: 'POST',
                    data: {id:deletedid},
                    success: function(response) {
                      if(response == 1) {
                        // Remove row from HTML Table
                        // $(el).closest('td').css('background','tomato');
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
  
  <script type="text/javascript">
      $(document).ready(function(){
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
                  contentType : false, // you can also use multipart/form-data replace of false
                  processData : false,
                  data: new FormData(this),
                  success: function(response)
                    {
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

</body>
</html>