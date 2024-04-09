<?php
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>

    <?php
    if(isset($_POST['but_upload'])){
        $filename = $_FILES['file']['name'];
        $target_dir = "C:/xampp/htdocs/reciperadar/upload/";
        if($filename != ''){

            $target_file = $target_dir.basename($_FILES['file']['name']);

            //File extension
            $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            //Valid file extension
            $extensions_arr = array("jpg", "jpeg","png","gif");

            //Check extension
            if(in_array($extension,$extensions_arr)){
                
                //Convert to base64
                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                $image = "data::image/".$extension.";base64,".$image_base64;

                //Store image to 'upload' folder

                //if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){

                    //Insert record
                    //$query = "INSERT INTO images(name,image) VALUES('".$filename."', '" .$image."')";
                    $query = "INSERT INTO images(image) VALUES( '" .$image."')";
                    mysqli_query($con,$query);

                //}

            }

        }

    }
    
    ?>
</head>
<body>
    <form method='post' action='' enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="but_upload" value="Upload">

    </form>
    
</body>
</html>