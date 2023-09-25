<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <body>
        
        <?php
        
            include_once("dbconnect.php");
        
            if (isset($_POST['jobregister_id'])) {
                $jobregister_id =$_POST['jobregister_id'];
            
                $sql = "SELECT * FROM `job_accessories` WHERE  jobregister_id ='$jobregister_id'";
                $queryRecords = mysqli_query($conn, $sql) or die("Error to fetch Accessories data");
            }
        ?>
        
        <form id="storeupdate_form" method="post">
            <div id="storesmsg" class="alerts"></div>

            <div class="table-responsive">
                <table id="remark_grid" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style='text-align: center;'>No</th>
                            <th style='text-align: center;'>Name</th>
                            <th style='text-align: center;'>UOM</th>
                            <th style='text-align: center;'>Quantity</th>
                            <th style='text-align: center;'>Status</th>
                            <th style='text-align: center;'>Remarks</th>
                            <th style='text-align: center; white-space: nowrap;'>Created At</th>
                            <th style='text-align: center; white-space: nowrap;'>Modify At</th>
                        </tr>
                    </thead>

                    
                    <tbody id="_editable_table">
                        <?php foreach($queryRecords as $res) :?>
                        <tr data-row-id="<?php echo $res['id'];?>">
                            <td style="text-align: center; vertical-align: middle;"><input type="hidden" name="accessories_id" value="<?php echo $res['accessories_id'] ?>"><input type="hidden" name="jobregister_id" value="<?php echo $res['jobregister_id'] ?>"></td>
                            <td style="text-align: center; vertical-align: middle;" oldVal ="<?php echo $res['accessories_name'];?>"><?php echo $res['accessories_name'];?></td>
                            <td style="text-align: center; vertical-align: middle; white-space: nowrap;" oldVal ="<?php echo $res['accessories_uom'];?>"><?php echo $res['accessories_uom'];?></td>
                            <td style="text-align: center; vertical-align: middle; white-space: nowrap;" oldVal ="<?php echo $res['accessories_quantity'];?>"><?php echo $res['accessories_quantity'];?></td>
                            <td style="text-align: center; vertical-align: middle; white-space: nowrap;">
                                <select class="form-select" name='accessories_status[<?=$res['accessories_id']?>]'>
                                    <option value='' <?php if ($res['accessories_status'] == '') { echo "SELECTED"; } ?>></option>
                                    <option value="Ready" <?php if ($res['accessories_status'] == "Ready") { echo "SELECTED";} ?>>Ready</option>
                                    <option value="Not Ready" <?php if ($res['accessories_status'] == "Not Ready") { echo "SELECTED"; } ?>>Not Ready</option>
                                </select>
                            </td>
                            <td style="text-align: center; vertical-align: middle;" contenteditable="true" oldVal ="<?php echo $res['accessories_remark'];?>"><?php echo $res['accessories_remark'];?></td>
                            <td style="text-align: center; vertical-align: middle;" oldVal ="<?php echo $res['accessoriesregister_at'];?>"><?php echo $res['accessoriesregister_at'];?></td>
                            <td style="text-align: center; vertical-align: middle;" oldVal ="<?php echo $res['accessoriesmodify_at'];?>"> <?php echo $res['accessoriesmodify_at'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>

                <p class="control"><b id="storemsg"></b></p>

                <div class="d-flex justify-content-end">
                    <button type="button" id="update_store" name="update_store" class="btn" style="color: white; background-color:#081d45; border:none;">Update</button>
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function () {
                $('#update_store').click(function () {
                    var data = $('#storeupdate_form').serialize() + '&update_store=update_store';
                    
                    $.ajax({
                        url: 'updatestore.php',
                        type: 'post',
                        data: data,
                
                        success: function (response) {
                            $('#storemsg').text(response);
                            $('#accessories_status').text('');
                        }
                    });
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('td.editable-col').on('focusout', function() {
                    data = {};
                    data['val'] = $(this).text();
		            data['id'] = $(this).parent('tr').attr('data-row-id');
		            data['index'] = $(this).attr('col-index');
	    
                    if($(this).attr('oldVal') === data['val'])
                    
                    return false;
                    
                    $.ajax({
                        type: "POST",
                        url: "server-store.php",
                        cache:false,
                        data: data,
                        dataType: "json",
                        
                        success: function(response) {
                            if(!response.error) {
                                $("#storesmsg").removeClass('alerts-danger');
                                $("#storesmsg").addClass('alerts-success').html(response.message);
                            }
                            
                            else {
                                $("#storesmsg").removeClass('alerts-success');
							    $("#storesmsg").addClass('alerts-danger').html(response.message);
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>