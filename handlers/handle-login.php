<?php 
session_start();
require_once "../inc/dbConnection.php";

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordHash=password_hash($password,PASSWORD_DEFAULT);
    // echo $email,$password;
    $query="SELECT * FROM `users` WHERE email='$email'";
    $runQuery=mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery)>0){
        $user=mysqli_fetch_assoc($runQuery);
        // print_r($passwordHash);
        $isCorrect=password_verify($password,$passwordHash);
        if($isCorrect){
            $_SESSION['email']=$user['email'];
            header("location:../index.php");       
        }
        else {
            $_SESSION['errors']="Password isn't Correct";
            header("location:../login.php");
        }
    } else {
        $_SESSION['errors']="Email doesn't Exist";
            header("location:../login.php");
    }
}

?>