<?php
session_start();
require_once "../inc/dbConnection.php";

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordHash=password_hash($password,PASSWORD_DEFAULT);
    $repassword=$_POST['repassword'];
    $img=$_FILES['img'];
    $imgName=$img['name'];
    $imgTmpName=$img['tmp_name'];
    $imgError=$img['error'];
    $imgSize=$img['size'];
    $imgSizeMb=$imgSize/(1024**2);
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
    $errors=[];

    if (empty($username)){
        $errors[]='Username is Requird';
    } 
    else if (is_numeric($username) || ! is_string($username)) {
        $errors[]='Name must be String';
    } 
    else if(strlen($username) < 5 || strlen($username) > 30 ){
        $errors[]='Name length between 5 and 30';
    }

    if (empty($email)){
        $errors[]='Email is Requird';
    } 
    else if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors[]='Must be Valid Email';
    } 

    if (empty($password)){
        $errors[]='Password is Requird';
    } 
    else if(strlen($password) < 8 || strlen($password) > 30 ){
        $errors[]='Password Length must be between 8 and 30';
    }
    if (!$password === $repassword) {
        $errors[]="Password Doesn't Match";
    }

    if($imgError > 0){
        $errors[]="Error While Uploading";
    }
    elseif(! in_array(strtolower($ext),['png','jpeg','gif','jpg'])){
        $errors[]="Must be Image";
    }
    elseif ($imgSizeMb > 5) {
        $errors[]="Image Max Size 5Mb";
    }
}
    if (empty($errors)){
        $rand=uniqid();
        $imgNewName=$rand.$ext;
        move_uploaded_file($imgTmpName,"../uploads/$imgNewName");
        $query="INSERT INTO `users` (`name`,`email`,`password`,`img`) 
        VALUES ('$username','$email','$password','$img')";
        $runQuery=mysqli_query($conn,$query);
        $user=mysqli_fetch_assoc($runQuery);
        print_r($user);
    // header("location:../login.php");
    
} 
else {
    $_SESSION['errors']=$errors;
    header("location:../register.php");
}










?>