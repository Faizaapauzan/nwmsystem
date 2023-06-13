<?php session_start(); ?>

<?php
    
    include_once 'Pagination.class.php';
    
    require_once 'dbconnect.php';
    
    $query   = $conn->query("SELECT COUNT(*) as rowNum FROM accessories_list");
    $result  = $query->fetch_assoc();
    $rowCount= $result['rowNum'];
    
    $pagConfig = array('totalRows' => $rowCount,);
    $pagination =  new Pagination($pagConfig);
    
    $query = $conn->query("SELECT * FROM accessories_list ORDER BY accessories_id ASC"); 
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>Store Accessories</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link href="css/homepage.css" rel="stylesheet" />
	<link href="css/machine.css" rel="stylesheet" />
    <link href="css/accessories.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/cd421cdcf3.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Mukta:wght@300;400;600;700;800&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

<style>
    .modal .contentAccessoriesPopup {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        width: auto;
        z-index: 2;
        padding: 20px;
        box-sizing: boder-box;
        margin: 2% auto 15% auto;
        border: 1px solid #888;
    }
</style>

<body>

    <!--Home Button-->
    <nav class="navbar1" >
    <div class="wrapper">
        <div class="ul2" style="float: right; margin-top: 10px; margin-bottom: 10px; margin-right: 10px;">
            <a href="store.php" class="nav1-links"><i class="iconify" data-icon="material-symbols:home-outline" style="font-size:40px;"></i></a>
        </div>
    </div>
    </nav>
    
    <!--Accessories List-->
    <div class="accessoriesList" style="margin-right:15px; margin-left:15px;">
    <h1 style="text-align: center; font-weight: bold;">Accessories List</h1>
    <div class="datalist-wrapper">
    <div class="addAccessoriesBtn" style="margin-top:3px; margin-right:-15px">
        <button type="button" id="btnRegister" onclick="document.getElementById('popupListAddForm').style.display='block'">Add</button>
        <button class="btn-reset" onclick="document.location='accessories.php'">Refresh</button>
    </div>
        <div class="col-lg-12" style="border: none;">
        <table class="table table-striped sortable" style="box-shadow: inset;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
                
                <?php
                    
                    if($query->num_rows > 0){ $i=0;
                        while($row = $query->fetch_assoc()){ $i++;
                ?>
                
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["accessories_name"]; ?></td>
                    <td><?php echo $row["accessories_code"]; ?></td>
                    <td><?php echo $row["accessories_brand"]; ?></td>
                    <td><div class='accessoriesUpdateDeleteBtn'>
                        <button data-accessories_id="<?php echo $row['accessories_id'];?>" class='userinfo' type='button' id='btnView'>View</button>
                        <button data-accessories_id="<?php echo $row['accessories_id'];?>" class='updateinfo' type='button' id='btnEdit'>Update</button>
                        <button data-accessories_id="<?php echo $row['accessories_id'];?>" class='deletebtn' type='button' id='btnDelete'>Delete</button>
                    </div></td>
                </tr>
                    
                <?php } }
                    
                    else {
                        echo '<tr><td colspan="6">No records found...</td></tr>'; 
                    }
                ?>

            </tbody>
        </table>
        </div>
    </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>

    <!--Add Accessories-->
    <div id="popupListAddForm" class="modal">
        <div class="listAddForm">
            <div class="title">Add Accessories</div>
            <div class="contentListAddForm">
                <form action="accessoriesindex.php" method="post" enctype="multipart/form-data">
                    <div class="listAddForm-details">
                        <div class="input-box">
                            <label for="AccessoriesCode" class="details">Accessories Code</label>
                            <input type="text" id="accessories_code" name="accessories_code" onkeyup="checkAccessoriesCodelAvailability()" value="" class="form-control" placeholder="Enter Accessories Code" required> 
                            <span style='color:red' id="accessories_code-availability-status"></span>
                        </div>
                            
                        <div class="input-box">
                            <label for="AccessoriesName" class="details">Accessories Name</label>
                            <input type="text" id="accessories_name" name="accessories_name" placeholder="Enter Accessories Name" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="AccessoriesUOM" class="details">Unit of Measurement</label>
                            <input type="text" id="accessories_uom" name="accessories_uom" placeholder="Enter Accessories UOM" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="AccessoriesBrand" class="details">Accessories Brand</label>
                            <input type="text" id="accessories_brand" name="accessories_brand" placeholder="Enter Accessories Brand" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="customerGrade" class="details">Accessories Description</label>
                            <input type="text" id="accessories_description" name="accessories_description" placeholder="Enter Customer Description" required>
                        </div>
                        
                        <div class="photoBox">
                            <label for="file_name" class="details">Photo</label>
                            <input type="file" id="image_input" name="files[]" multiple>
                            <div id="display_image"></div>
                        </div>
                        
                        <?php if (isset($_SESSION["username"])) ?>
                        <input type="hidden" name="accessorieslistcreated_by" id="accessorieslistcreatedby" value="<?php echo $_SESSION["username"] ?>" readonly>
                        <input type="hidden" name="accessorieslistlasmodify_by" id="accessorieslistlasmodifyby" value="<?php echo $_SESSION["username"] ?>" readonly>
                    </div>
                    
                    <div class="listAddFormbutton">
                        <input type="submit" name="submit" value="Register">
                        <input type="button" onclick="document.getElementById('popupListAddForm').style.display='none'" value="Cancel" id="cancelbtn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--Delete Accesssories -->
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="accessoriesPopup">
                <div class="contentAccessoriesPopup">
                    <div class="title">Accessories</div>
                    <div class="accessories-details">
                        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>
                    </div>
                    
                    <br/>
                    
                    <div class="modal-body">

                    </div>
                </div>
                
                <script type='text/javascript'>
                    $(document).ready(function() {
                        $('body').on('click','.deletebtn',function(){
                            var accessories_id = $(this).data('accessories_id');
                            
                            $.ajax({
                                url: 'deleteaccessories.php',
                                type: 'post',
                                data: { accessories_id: accessories_id },
                                success: function(response) {
                                    $('.modal-body').html(response);
                                    $('#empModal').modal('show');
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
                
    <!--Update Accesssories -->
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="accessoriesPopup">
                <div class="contentAccessoriesPopup">
                    <div class="title"> Accessories Info</div>
                    <div class="accessories-details">
                        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>
                    </div>
                    
                </br>
                    
                    <div class="modal-body">                         

                    </div>
                </div>
                
                <script type='text/javascript'>
                    $(document).ready(function() {
                        $('body').on('click','.updateinfo',function(){
                            var accessories_id = $(this).data('accessories_id');
                            
                            $.ajax({
                                url: 'updateaccessories.php',
                                type: 'post',
                                data: { accessories_id: accessories_id },
                                success: function(response) {
                                    $('.modal-body').html(response);
                                    $('#empModal').modal('show');
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
        
    <!--Accessories list pop up form-->
    <div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="accessoriesPopup">
                <div class="contentAccessoriesPopup">
                    <div class="title"> Accessories Info </div>
                    <div class="accessories-details">
                        <div class="close" data-dismiss="modal" onclick="document.getElementById('popup-1').style.display='none'">&times</div>
                    </div>
                    
                    <br/>
                    
                    <div class="modal-body">

                    </div>
                </div>
                
                <script type='text/javascript'>
                    $(document).ready(function() {
                        $('body').on('click','.userinfo',function(){
                            var userid = $(this).data('accessories_id');
                            
                            $.ajax({
                                url: 'ajaxaccessories.php',
                                type: 'post',
                                data: {userid: userid},
                                success: function(response) {
                                    $('.modal-body').html(response);
                                    $('#empModal').modal('show');
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </div>
    
    </section>

    <script>
        var modal = document.getElementById('id01');
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        var modal = document.getElementById('id02');
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        var modal = document.getElementById('id03');
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script>
        var modal = document.getElementById('id04');
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="js/upload photo.js"></script>
    <script src="js/form-validation.js"></script>

</body>

</html>