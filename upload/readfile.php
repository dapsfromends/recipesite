<?php

include "config.php";

$images_sql = "SELECT * from images ORDER BY id desc limit 1";

$result = mysqli_query($con,$images_sql);

$row = mysqli_fetch_array($result);

//$filename = $row['name'];
$image = $row['image'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title></title>
</head>
<body>
   <!-- <img src="upload/<?= $filename ?>" width='300px' height='300px'> -->

    <br><br>

    <img src="<?= $image ?>" width='300px' height='300px'>
    
</body>
</html>
