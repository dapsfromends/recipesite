<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ("../../connection.php");

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = mysqli_real_escape_string($db, $_GET['id']);

    // SQL query to delete the record with the specified ID
    $sql = "DELETE FROM recipemethod WHERE id = $id";
    if(mysqli_query($db, $sql)){
        // Record deleted successfully
        echo "Record deleted successfully.";
    } else{
        // Error executing the query
        echo "Error deleting record: " . mysqli_error($db);
    }
} else{
    // No ID parameter provided
    echo "ID parameter is missing.";
}

// Top Five
$top5 = "SELECT id, image, chefname, RecipeName FROM recipemethod";
$result_top5 = $db->query($top5);
?>