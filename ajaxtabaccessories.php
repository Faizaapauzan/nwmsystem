<?php
    session_start();
    include 'dbconnect.php';
?>

<!DOCTYPE html>
  <html lang="en">
    <style>
      .tooltip {
        z-index: 1000000;
        background-color: black;
        width: 360px;
        opacity: 1;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
      }
    </style>
    
    <body>
      <form id="adminacc_form" method="post">
        <div class="input-boxAccessories" id="input_fields_wrapAccessories">
          <div class="model">
            <form class="form-inline" id="frm-add-data" action="javascript:void(0)">
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
            
              <?php } } } ?>
            
              <?php
                  
                  include_once("dbconnect.php");
                
                  if (isset($_POST['jobregister_id'])) {
                    $jobregister_id =$_POST['jobregister_id'];
                    
                    $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
                    $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
                    
                    $counter = 1;
                  }
              ?>
              
              <div class="table-responsive">
                <table id="employee_grid" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th style='text-align: center;'>No</th>
                      <th style='text-align: center;'>Code</th>
                      <th style='text-align: center;'>Name</th>
                      <th style='text-align: center;'>UOM</th>
                      <th style='text-align: center;'>Quantity</th>
                      <th></th>
                    </tr>
                  </thead>
                  
                  <tbody id="_editable_table">
                    <?php foreach($queryRecords as $res) :?>
                    <tr data-row-id="<?php echo $res['id'];?>">
                      <td style='text-align: center;'><?= $counter ?></td>
                      <td><a style="color: blue; cursor: pointer;"  data-toggle="tooltip" class="hover" id="<?php echo $res["accessories_id"]; ?>"><?php echo $res["accessories_code"]; ?></a></td>
                      <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['accessories_name'];?>"><?php echo $res['accessories_name'];?></td>
                      <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['accessories_uom'];?>" style="text-align: center;"><?php echo $res['accessories_uom'];?></td>
                      <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $res['accessories_quantity'];?>" style="text-align: center;"><?php echo $res['accessories_quantity'];?></td>
                      <td style="text-align: center;"><span class='delete' style="color: red; font-weight: bold;" data-id='<?php echo $res["id"]; ?>'>Delete</span></td>
                    </tr>
                    <?php $counter++; endforeach;?>
                  </tbody>
                </table>
              </div>
              <a href="javascript:void(0);" class="add_button" title="Add field" type="button">Click Here to Add Accessories</a>
            </form>
            
            <p class="control"><b id="accessoriesmessage"></b></p>
            
            <div class="d-grid d-md-flex justify-content-md-end">
              <button type="button" id="update_acc" name="update_acc" class="btn btn-primary" style="background-color: #1a0845; color: white; border:none;">Update</button>
            </div>
          </div>
        </div>  
      </form>
     
      <script>
        $(document).ready(function () {
          $('#update_acc').click(function () {
            var data = $('#adminacc_form').serialize() + '&update_acc=update_acc';
            
            $.ajax({
              url: 'addaccessoriesindex.php',
              type: 'post',
              data: data,
              success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                if(res.success == true)
                  $('#accessoriesmessage').html('<span style="color: green">Update Success</span>');
                else
                  $('#accessoriesmessage').html('<span style="color: red">Data Cannot Be Saved</span>');
              }
            });
          });
        });
      </script>
      
      <!-- Delete Accessory -->
      <script>
        $(document).ready(function() {
          $('.delete').click(function() {
            var el = this;
            var deleteid = $(this).data('id');
            var confirmalert = confirm("Are you sure?");
            
            if (confirmalert == true) {
              $.ajax({
                url: 'delete-ajax-acc.php',
                type: 'POST',
                data: {id:deleteid},
                
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
      
      <script>
        $(document).ready(function() {
          $('[data-toggle="tooltip"]').tooltip({
            title: fetchData,
            html: true,
            placement: 'right'
          });
          
          function fetchData() {
            var fetch_data = '';
            var element = $(this);
            var accessories_id = element.attr("id");
            
            $.ajax({
              url:"fetch-hover.php",
              method:"POST",
              async: false,
              data:{accessories_id:accessories_id},
              
              success:function(data) {
                fetch_data = data;
              }
            });
            
            return fetch_data;
          }
        });
      </script>
      
      <script type="text/javascript">
        $(document).ready(function() {
          $('td.editable-col').on('focusout', function() {
            data = {};
            data['val'] = $(this).text();
            data['id'] = $(this).parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            
            if($(this).attr('oldVal') === data['val'])
            
            return false;
            
            $.ajax({
              type: "POST",
              url: "server.php",
              cache:false,
              data: data,
              dataType: "json",
              
              success: function(response) {
                if(!response.error) {
                  $("#accessoriesmessage").removeClass('alert-danger');
                  $("#accessoriesmessage").addClass('alert-success').html(response.accessoriesmessage);
                }
                
                else {
                  $("#accessoriesmessage").removeClass('alert-success');
                  $("#accessoriesmessage").addClass('alert-danger').html(response.accessoriesmessage);
                }
              }
            });
          });
        });
      </script>
      
      <script>
        $(document).on('change', '[name="accessoriesModel[]"]', function(){
          var accessories_id = $(this).val();
          var model = $(this).parent('.model');
          
          if (accessories_id != '') {
            $.ajax({
              url:"getcode.php",
              method:"POST",
              data: {accessories_id:accessories_id},
              dataType:"json",
              
              success:function(result){
                model.find(".accessories_id").val(accessories_id);
                model.find(".accessories_code").val(result.accessories_code);
                model.find(".accessories_name").val(result.accessories_name);
                model.find(".accessories_uom").val(result.accessories_uom);
              }
            })
          }
        });
      </script>
      
      <!-- Add more accessory -->
      <script type="text/javascript">
        $(document).ready(function () {
          $('.model').on('change', '.form-select', function () {
            $(this).select2({
              theme: 'bootstrap-5',
              width: '100%',
              placeholder: 'Select Accessories Code',
              allowClear: true,
              dropdownParent: $(this).parent(),
            });
          });
          
          var maxField = 100;
          var addButton = $('.add_button');
          var wrapper = $('.model');
          var fieldHTML = 
          `<div class="field-element">
              <div class="model">
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
       
                <?php } } } ?>
                
                </br>
                <select id="select_box" name="accessoriesModel[]" class="form-select mb-3">
                  <option value="">Select Accessories Code</option>
                    <?php
                        
                        include "dbconnect.php";
                          
                        $records = mysqli_query($conn, "SELECT * FROM accessories_list ORDER BY accessorieslistlasmodify_at DESC");
                        while($data = mysqli_fetch_array($records)) {
                          echo "<option value='". $data['accessories_id'] ."'>" .$data['accessories_code']. " - " . $data['accessories_name']."</option>";
                        }
                    ?>
                </select>
                
                <div id="results">
                  <input type="hidden" name="accessories_id[]" class="accessories_id">
                  
                  <input type="text" id="codes" name="accessories_code[]" placeholder="Accessories Code" class="accessories_code form-control border border-dark">
                  <input type="text" name="accessories_name[]" placeholder="Accessories Name" class="accessories_name form-control border border-dark">
                  <div class="d-grid d-md-flex justify-content-md-start">
                    <input type="text" name="accessories_uom[]" placeholder="Unit of Measurement" class="accessories_uom form-control border border-dark">
                    <input type="text" name="accessories_quantity[]" placeholder="Quantity" class="accQuan form-control border border-dark">
                  </div>
                </div>
                
                <a href="javascript:void(0);" class="remove_button" title="Add field">Remove</a>
              </div>
           </div>`;
           
          var x = 1;
           
          $(addButton).click(function () {
            if (x < maxField) {
              x++;
              
              $(wrapper).append(fieldHTML);
              $('.field-element:last-child .form-select').select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: 'Select Accessories Code',
                allowClear: true,
                dropdownParent: $(this).parent(),
              });
            }
          });
          
          $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).closest(".field-element").remove();
            x--;
          });
        });
      </script>
      
      <script>
        $(document).ready(function () {
          $("#accessoriesModel[]").selectize({
            sortField: 'text'
          });
        });
      </script>
    </body>
  </html>





