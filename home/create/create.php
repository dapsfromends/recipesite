<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from POST request
    if (empty($_POST["chefname"]) || empty($_POST["category"]) || empty($_POST["RecipeName"]) || empty($_POST["Ingredients"]) || empty($_POST["Directions"])) {
        echo "All fields are required.";
    } else {
        $chefname = $_POST['chefname'];
        $image = $_POST['image'];
        $category = $_POST['category'];
        $RecipeName = $_POST['RecipeName'];
        $Ingredients = $_POST['Ingredients'];
        $Directions = $_POST['Directions'];

       
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        
        $chefname = mysqli_real_escape_string($db, $chefname);
        $image = mysqli_real_escape_string($db, $image);
        $Directions = mysqli_real_escape_string($db, $Directions);
        $Ingredients = mysqli_real_escape_string($db, $Ingredients);

        // Prepare and execute SQL query
        $sql = "INSERT INTO recipemethod (chefname, category, RecipeName, Ingredients, Directions, image, rate ) VALUES ('$chefname','$category','$RecipeName','$Ingredients','$Directions', '$image', 5)";
        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {

            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }

    // Close connection
    $db->close();
}
?>