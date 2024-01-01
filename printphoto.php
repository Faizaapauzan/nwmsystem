<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">

        <title>Job Photo</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/print.css" media="print">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container m-3 p-3">
            <div class="d-flex justify-content-start mb-3">
                <button type="button" class="btn btn-outline-secondary pb-0 pt-0 mt-1" style="height:min-content;" id="print-btn" onclick="window.print();">Print</button>
            </div>
        
            <div class="row" id="photoContainer"></div>
        </div>

        <script>
            $(document).ready(function () {
                var urlParams = new URLSearchParams(window.location.search);
                var jobregister_id = urlParams.get('jobregister_id');
                
                $.ajax({
                    type: "POST",
                    url: "reportCode.php",
                    data: { jobregister_id: jobregister_id },
                    dataType: 'json',
                
                    success: function (res) {
                        var photoContainer = $('#photoContainer');

                        if (res.status == 200) {
                            var photos = res.photos;
                            
                            if (photos && photos.length > 0) {
                                photos.forEach(function (photo) {
                                    var card = `<div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-3'>
                                                    <div class='card'>
                                                        <img src='image/${photo.file_name}' class='rounded img-fluid' alt='Photo uploaded by technician'>
                                                    </div>
                                               </div>`;

                                    photoContainer.append(card);
                                });
                            }
                            
                            else {
                                console.log("No photos received from the server.");
                            }
                        }
                        
                        else {
                            console.log("Server response status:", res.status);
                            console.log("Server response message:", res.message);
                        }
                    },
                
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            });
        </script>
    </body>
</html>