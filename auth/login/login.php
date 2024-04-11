<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../../connection.php"); 
    if(empty($_POST["email"]) || empty($_POST["password"]))
    {
        echo "Both fields are required.";
    }
    else
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT fname FROM blogusers WHERE email='$email' and password='$password'";
        $result=mysqli_query($db,$sql);

         if(mysqli_num_rows($result) == 1)
        {
            header("location: /home"); // Redirecting To another Page
        }
        else
        {
            // Echo Wont work redircting using header would aleminate the Echo
            echo "Incorrect username or password.";
            header("location: /auth/login");
            
        }
    }
?>