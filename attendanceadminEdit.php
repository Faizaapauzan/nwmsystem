<?php session_start(); ?> 

<?php
    
    include 'dbconnect.php';

    $techupdate_id = $_POST['techupdate_id'];

    $query = "SELECT * FROM tech_update WHERE techupdate_id = $techupdate_id";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        while ($row = mysqli_fetch_array($query_run)) {
?> 

<div class="row">
  <div class="updatetech">
    <form action="attendanceadminEditIndex.php" method="post">
    <input type="hidden" name="techupdate_id" id="techupdate_id" value="<?php echo $row['techupdate_id'] ?>">
    <div class="staff-details">
    <div class="input-box" style="width: 100%; margin-top:-30px;">
      <label for="tech_leader" class="details">Technician: </label>
      
      <select class="input-box" id="tech_leader" name="tech_leader">
      <option value="<?php echo $row["tech_leader"]; ?>"><?php echo $row["tech_leader"]; ?></option>
        <?php
            include "dbconnect.php";
            $records = mysqli_query($conn, "SELECT * FROM staff_register 
                                            WHERE staff_group = 'Technician'
                                            ORDER BY staffregister_id ASC");
            echo "<option></option>";
            while($data = mysqli_fetch_array($records))
            {echo "<option value='". $data['username'] ."'>" .$data['username']. "</option>";}
        ?>
      </select>
    </div>
    
    <button type="submit" name="update" class="btn btn-primary">Update</button>
    
    </div>
    </form>
  </div>
</div>

<?php } } else { ?>
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>No Record Found</h4>
      </div>
    </div>
  </div> 

<?php } ?>