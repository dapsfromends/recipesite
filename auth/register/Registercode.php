<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../connection.php');
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $confirmpassword=$_POST['confirmpassword'];

    if($password !== $confirmpassword)
    {
       echo "Passwords do not match!";
       header("Location: /auth/register");
    }
       
    else
    {   
        $sql = "INSERT INTO blogusers (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
        $result = mysqli_query($db, $sql);

        if($result)
        {
            echo "Registered Successfully";
            header("Location: /auth/login");
        }
        else
        {
            echo "Something Went Wrong!";
            header("Location: /auth/register");
        }
    }
   
?>