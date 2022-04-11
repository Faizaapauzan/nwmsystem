<?php
session_start();

?>    
    
    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'nwmsystem');

    $customer_id = $_POST['customer_id'];

    $query = "SELECT * FROM customer_list WHERE customer_id='$customer_id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
 

            <div class="container">
                <div class="jumbotron">

                    <div class="row">
                    <div class="updatetech">

                            <form action="updatecustomer.php" method="post">

                                <div class="staff-details" style="display: flex; flex-wrap: wrap; justify-content: space-between; width: 580px;">
                                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $row['customer_id'] ?>">
                                <?php if (isset($_SESSION["username"])) ?>
                                <input type="hidden" name="customerlasmodify_by" id="customerlasmodify_by" value="<?php echo $_SESSION["username"] ?>" readonly>
                                <div class="input-box">
                                    <label for="">Customer Code </label>
                                    <input type="text" name="customer_code" id="customer_code" class="form-control" value="<?php echo $row['customer_code'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Customer Name </label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $row['customer_name'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Customer Grade </label>
                                    <input type="text" name="customer_grade" id="customer_grade" class="form-control" value="<?php echo $row['customer_grade'] ?>">
                                </div>
                                <div class="input-box">
                                    <label for=""> Customer PIC </label>
                                    <input type="text" name="customer_PIC" id="customer_PIC" class="form-control" value="<?php echo $row['customer_PIC'] ?>">
                                </div>
                                <div class="input-box">
                                <label for="customerPhone" class="details">Customer Phone 1</label>
                               <input type="text" name="cust_phone1" id="cust_phone1" class="form-control" value="<?php echo $row['cust_phone1'] ?>">
                            </div>
                             <div class="input-box">
                                <label for="customerPhone" class="details">Customer Phone 2</label>
                              <input type="text" name="cust_phone2" id="cust_phone2" class="form-control" value="<?php echo $row['cust_phone2'] ?>">
                            </div>
                                   <div class="input-box-address">
            <label for="">Customer Address</label>
            <input type="text" class="cust_address1" name="cust_address1" value="<?php echo $row['cust_address1']?>">
            <input type="text" class="cust_address2" name="cust_address2" value="<?php echo $row['cust_address2']?>">
            <input type="text" class="cust_address3" name="cust_address3" value="<?php echo $row['cust_address3']?>">
            <br/><br/>
        </div>

                                 <button type="submit" id="submit" name="update" class="btn btn-primary"> Update Data </button>
                   
                                </form>

                        </div>
                    </div>

                    <?php
                    if (isset($_POST['update'])) {
                        $customer_code = $_POST['customer_code'];
                        $customer_name = $_POST['customer_name'];
                        $customer_grade = $_POST['customer_grade'];
                        $customer_PIC   = $_POST['customer_PIC'];
                        $cust_phone1  = $_POST['cust_phone1'];
		                $cust_phone2  = $_POST['cust_phone2'];
                        $cust_address1 = $_POST['cust_address1'];
		                $cust_address2 = $_POST['cust_address2'];
		                $cust_address3 = $_POST['cust_address3'];
                        $customerlasmodify_by = $_POST['customerlasmodify_by'];

                        $query = "UPDATE customer_list SET
customer_code='$customer_code',
customer_name='$customer_name',
customer_grade='$customer_grade',
customer_PIC='$customer_PIC',
cust_phone1='$cust_phone1',
cust_phone2='$cust_phone2',
cust_address1='$cust_address1',
cust_address2='$cust_address2',
cust_address3='$cust_address3',
customerlasmodify_by='$customerlasmodify_by'


WHERE customer_id='$customer_id'";

                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:customer.php");
                        } else {
                            echo '<script> alert("Data Not Updated"); </script>';
                        }
                    }
                    ?>

                </div>
            </div>
        <?php
        }
    } else {
        // echo '<script> alert("No Record Found"); </script>';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
