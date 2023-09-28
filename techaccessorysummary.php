<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://i.ibb.co/ngKJ7c4/android-chrome-512x512.png" type="image/x-icon">
        
        <title>Technician Accessory On Hand</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <style>
        ::-webkit-scrollbar {display: none;}
    </style>

    <body>
        <div class="card m-2" style="border:none;">
            <div class="card-body">
                <div class="clearfix mb-3">
                    <div class="float-start">
                        <button type="button" class="btn" style="color: white; background-color:#081d45; border:none"><a href="StoreInOutStock.php" style="text-decoration: none;"><i class="bi bi-arrow-left" style="font-size: 1rem; color:white; font-weight: bold;"></i></a></button>
                    </div>  
                </div>

                <label for="" class="fw-bold mb-3">Accessory On Hand (Technician)</label>

                <div class="table-responsive">
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th style='text-align: center;'>No</th>
                                <th style='text-align: center;'>Technician</th>
                                <th style='text-align: center;'>Item</th>
                                <th style='text-align: center;'>Quantity</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            <?php
                                
                                require 'dbconnect.php';
                                
                                $query = "SELECT * FROM accessories_inout WHERE balance != '0' ORDER BY techname DESC";
                                    
                                $query_run = mysqli_query($conn, $query);

                                    
                                $counter = 1;
                                $data = array();
                                $previousItem = [];
                                $previousName = null;
                                $firstOccurrenceIndex;
                                $i = 0;
                                
                                if(mysqli_num_rows($query_run) > 0) {
                                    while ($row = $query_run->fetch_assoc()) {
                                        $data[] = array(
                                            'accessoriesname' => $row['accessoriesname'],
                                            'techname' => $row['techname'],
                                            'balance' => $row['balance']
                                        );
                                    }
                                    // echo "<script>console.log(" . json_encode($data) . ")</script>";

                                }
                                foreach($data as $item) {
                                    $currentItem = $item['accessoriesname'];
                                    $currentName = $item['techname'];
                        
                                    if ($previousName != $currentName){
                                        // echo "<script>console.log(" . json_encode($previousItem) . ")</script>";
                                        $previousName = $currentName;
                                        $previousItem = [];
                                    }
                                    $firstOccurrenceIndex = array_search($currentItem, $previousItem);
                                    echo "<script>console.log(" . json_encode($firstOccurrenceIndex) . ")</script>";


                                    if ($firstOccurrenceIndex !== false || $firstOccurrenceIndex === 0) {
                                        $previousBalance = $data[$i - count($previousItem) + $firstOccurrenceIndex]['balance'];
                                        $currentBalance = $item['balance'];
                                        $previousBalance += $currentBalance;
                                        $data[$i - count($previousItem) + $firstOccurrenceIndex]['balance'] = $previousBalance;
                                        echo "<script>console.log(" . json_encode($data[$i]) . ")</script>";

                                        unset($data[$i]);
                                    }
                                    $previousItem[] = $currentItem;
                                    $i++;
                                } 
                                foreach($data as $item){
                                    echo "<tr>";
                                    echo "    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>$counter</td>";
                                    echo "    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>{$item['techname']}</td>";
                                    echo "    <td style='vertical-align: middle;'>{$item['accessoriesname']}</td>";
                                    echo "    <td style='text-align: center; white-space: nowrap; vertical-align: middle;'>{$item['balance']}</td>";
                                    echo "</tr>";
                                    
                                    $counter++; 
                                }
                            
                            ?>
                        </tbody>
                    </table>

                    <script>
                        $(document).ready(function() {
                            var previousName = null;
                            var count = 1;
                            var index2;
                            
                            $("#tbody tr").each(function(index) {

                                index2 = index;
                                var currentName = $(this).find("td:eq(1)").text();
                                var currentItem = $("#tbody tr:eq(" + (index) + ") td:eq(2)").html();
                                
                                
                                if (previousName !== currentName) {
                                    if (count > 1) {
                                        $("#tbody tr:eq(" + (index - count) + ") td:eq(1)").attr("rowspan", count);
                                    }
                                    
                                    count = 1;
                                    
                                    previousName = currentName;
                                    
                                }
                                
                                else {
                                    count++;
                                    
                                    $(this).find("td:eq(1)").hide();
                                }
                            });
                            
                            if (count > 1) {
                                $("#tbody tr:eq(" + (index2 - count + 1) + ") td:eq(1)").attr("rowspan", count);
                            }
                            
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>