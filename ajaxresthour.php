<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <meta name="keywords" content="" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel = "icon" href = "https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type = "image/x-icon">
    <title>NWM Technician Page</title>
	  <link href="css/ajaxtechupdate.css" rel="stylesheet" />
    <link href="css/technicianmain.css" rel="stylesheet" />
    <link href="main.css" rel="stylesheet" />

	
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    
    <?php
        include 'dbconnect.php';
        
        if (isset($_POST['resthour_id'])) {
        $resthour_id =$_POST['resthour_id'];
        
        $query = "SELECT * FROM technician_resthour WHERE resthour_id ='$resthour_id'";
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
    
    <form action="techresthourupdaterindex.php" method="post">
        
    <input type="hidden" name="resthour_id" class="resthour_id" value="<?php echo $row['resthour_id'] ?>">
    
    <label>Technician</label>
    <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="tech_out" name="tech_out" value="<?php echo $row['tech_out'] ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="buttonbiru" onclick="tech_outs()" style="width: fit-content;" type="button">OUT</button>
        </div>
        
        <script type="text/javascript">
            function tech_outs()
                {
                    $.ajax({url:"departureTime.php", success:function(result)
                        {
                            $("#tech_out").val(result);
                        }
                    })
                }
        </script>
    </div>
        
    <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="tech_in" name="tech_in" value="<?php echo $row['tech_in'] ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="buttonbiru" onclick="tech_ins()" style="width: fit-content; padding-left: 55px;" type="button">IN</button>
        </div>
        
        <script type="text/javascript">
            function tech_ins()
                {
                    $.ajax({url:"departureTime.php", success:function(result)
                        {
                            $("#tech_in").val(result);
                        }
                    })
                }
        </script>
    </div>

    <label>Assistant</label>
    <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="ass_out" name="ass_out" value="<?php echo $row['ass_out'] ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="buttonbiru" onclick="ass_outs()" type="button" style="width: fit-content;">OUT</button>
        </div>
        
        <script type="text/javascript">
            function ass_outs()
                {
                    $.ajax({url:"departureTime.php", success:function(result)
                        {
                            $("#ass_out").val(result);
                        }
                    })
                }
        </script>
    </div>
 
    <div class="input-group mb-3">
        <input readonly type="text" class="form-control" id="ass_in" name="ass_in" value="<?php echo $row['ass_in'] ?>" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="buttonbiru" onclick="ass_ins()" style="width: fit-content; padding-left: 60px;" type="button">IN</button>
        </div>
        
        <script type="text/javascript">
            function ass_ins()
                {
                    $.ajax({url:"departureTime.php", success:function(result)
                        {
                            $("#ass_in").val(result);
                        }
                    })
                }
        </script>
    </div>
    
    <p class="control"><b id="message-update"></b></p>
    <div class="updateBtn">
        <div><input type="button" onclick="updateForm();" class="buttonbiru" style="height: 39px; padding-left: 21px; font-size: 15px;" value="Update" /></div>
    </div>
    
    </form>
    
    <script type="text/javascript">

            function updateForm()
              {
                var tech_out = $('input[name=tech_out]').val();
                var tech_in = $('input[name=tech_in]').val();
                var ass_out = $('input[name=ass_out]').val();
                var ass_in = $('input[name=ass_in]').val();
                var resthour_id = $('input[name=resthour_id]').val();
                
                if(tech_out!='' || tech_out=='', 
                    tech_in!='' || tech_in=='', 
                    ass_out!='' || ass_out=='',
                     ass_in!='' || ass_in=='',
                resthour_id!='' || resthour_id=='')

                  {
                    var formData = {tech_out: tech_out,
                                     tech_in: tech_in,
                                     ass_out: ass_out,
                                      ass_in: ass_in,
                                 resthour_id: resthour_id};
                                    
                    $.ajax({
                            url: "techresthourupdaterindex.php", 
                            type: 'POST', 
                            data: formData, 
                            success: function(response)
                      {
                        var res = JSON.parse(response);
                        console.log(res);
                        if(res.success == true)
                          $('#message-update').html('<span style="color: green">Update Saved!</span>');
                        else
                          $('#message-update').html('<span style="color: red">Data Cannot Be Saved</span>');
                      }
                    });
                  }
              } 
        </script>
    
    <?php
    }
}
    ?>
    
    <?php
} 
    ?>

</body>
</html>