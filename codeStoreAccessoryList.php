<?php
    
    require 'dbconnect.php';
    
    // ========== Add ==========

    if (isset($_POST['save_entry'])) {
        $accessories_code = mysqli_real_escape_string($conn, $_POST['accessories_code']);
        $accessories_name = mysqli_real_escape_string($conn, $_POST['accessories_name']);
        $accessories_uom = mysqli_real_escape_string($conn, $_POST['accessories_uom']);
        $accessories_brand = mysqli_real_escape_string($conn, $_POST['accessories_brand']);
        $accessories_description = mysqli_real_escape_string($conn, $_POST['accessories_description']);
        $accessorieslistcreated_by = mysqli_real_escape_string($conn, $_POST['accessorieslistcreated_by']);
        $accessorieslistlasmodify_by = mysqli_real_escape_string($conn, $_POST['accessorieslistlasmodify_by']);
        
        // File upload handling
        if (!empty($_FILES['files']['name'][0])) {
            $targetDir = "image/";
            $imageName = basename($_FILES["files"]["name"][0]);
            $targetFilePath = $targetDir . $imageName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            
            // Allow certain file formats
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (!in_array($fileType, $allowedTypes)) {
                $res = ['status' => 422, 'message' => 'Invalid photo format. Only JPG, JPEG, PNG, and GIF are allowed.'];
                echo json_encode($res);
                return;
            }
            
            // Move uploaded file to target directory
            if (move_uploaded_file($_FILES["files"]["tmp_name"][0], $targetFilePath)) {
                $query = "INSERT INTO accessories_list (accessories_code, accessories_name, accessories_uom, accessories_brand, 
                                                        accessories_description, file_name, accessorieslistcreated_by, 
                                                        accessorieslistlasmodify_by) 
                          
                          VALUES ('$accessories_code', '$accessories_name', '$accessories_uom', 
                                  '$accessories_brand', '$accessories_description', '$targetFilePath', 
                                  '$accessorieslistcreated_by', '$accessorieslistlasmodify_by')";
                
                $query_run = mysqli_query($conn, $query);
                
                if ($query_run) {
                    $res = ['status' => 200, 'message' => 'New Accessory Inserted'];
                    echo json_encode($res);
                    
                    return;
                } 
                
                else {
                    $res = ['status' => 500, 'message' => 'Accessory Not Inserted'];
                    echo json_encode($res);
                    
                    return;
                }
            } 
            
            else {
                $res = ['status' => 500, 'message' => 'Error uploading file. Please try again.'];
                echo json_encode($res);
                
                return;
            }
        } 
        
        else {
            $res = ['status' => 422, 'message' => 'All fields are mandatory, including the image.'];
            echo json_encode($res);
            return;
        }
    }
    
    // ========== Update ==========

    if (isset($_POST['update_entry'])) {
        $accessories_id = mysqli_real_escape_string($conn, $_POST['accessories_id']);
        $accessories_code = mysqli_real_escape_string($conn, $_POST['accessories_code']);
        $accessories_name = mysqli_real_escape_string($conn, $_POST['accessories_name']);
        $accessories_uom = mysqli_real_escape_string($conn, $_POST['accessories_uom']);
        $accessories_brand = mysqli_real_escape_string($conn, $_POST['accessories_brand']);
        $accessories_description = mysqli_real_escape_string($conn, $_POST['accessories_description']);
        $accessorieslistlasmodify_by = mysqli_real_escape_string($conn, $_POST['accessorieslistlasmodify_by']);
        
        if (!empty($_FILES['file_name']['name'])) {
            $targetDir = "image/";
            $file_name = basename($_FILES["file_name"]["name"]);
            $targetFilePath = $targetDir . $file_name;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
            if (!in_array($fileType, $allowedTypes)) {
                $res = ['status' => 422, 'message' => 'Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.'];
                echo json_encode($res);
                return;
            }
        
            if (!move_uploaded_file($_FILES["file_name"]["tmp_name"], $targetFilePath)) {
                $res = ['status' => 500, 'message' => 'Error uploading file. Please try again.'];
                echo json_encode($res);
                return;
            }
            $file_name = $targetFilePath;
        } 
        
        else {
            $query = "SELECT file_name FROM accessories_list WHERE accessories_id='$accessories_id'";
            $result = mysqli_query($conn, $query);
        
            if ($row = mysqli_fetch_assoc($result)) {
                $file_name = $row['file_name'];
            } 
            
            else {
                $res = ['status' => 500, 'message' => 'Error retrieving existing photo.'];
                echo json_encode($res);
                return;
            }
        }

        $query = "UPDATE accessories_list SET 
                         accessories_code='$accessories_code', 
                         accessories_name='$accessories_name', 
                         accessories_uom='$accessories_uom',
                         accessories_brand='$accessories_brand',
                         accessories_description='$accessories_description',
                         accessorieslistlasmodify_by='$accessorieslistlasmodify_by',
                         file_name='$file_name'
                  WHERE accessories_id='$accessories_id'";

        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Accessory Updated Successfully'];
            echo json_encode($res);
            
            return;
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Accessory Not Updated'];
            echo json_encode($res);
            return;
        }
    }
    
    // ========== View ==========
    
    if (isset($_GET['entry_id'])) {
        $entry_id = mysqli_real_escape_string($conn, $_GET['entry_id']);
        $query = "SELECT * FROM accessories_list WHERE accessories_id='$entry_id'";
        $query_run = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($query_run) == 1) {
            $accessory = mysqli_fetch_assoc($query_run);

            if (!empty($accessory['file_name'])) {
                $photoPath =$accessory['file_name'];
                $accessory['file_name'] = $photoPath;
            } 
            
            else {
                $accessory['file_name'] = null;
            }
            
            $res = ['status' => 200, 'message' => 'Accessory Fetch Successfully by id', 'data' => $accessory];
            
            echo json_encode($res);
            
            return;
        } 
        
        else {
            $res = ['status' => 404, 'message' => 'Accessory Id Not Found'];
            echo json_encode($res);
            return;
        }
    }
    
    // ========== Delete ==========
    
    if(isset($_POST['delete_entry'])) {
        $entry_id = mysqli_real_escape_string($conn, $_POST['entry_id']);
        $query = "DELETE FROM accessories_list WHERE accessories_id='$entry_id'";
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            $res = ['status' => 200, 'message' => 'Accessory Deleted Successfully'];
            echo json_encode($res);
        
            return;
        } 
        
        else {
            $res = ['status' => 500, 'message' => 'Accessory Not Deleted'];
            echo json_encode($res);
        
            return;
        }
    }
    
?>
