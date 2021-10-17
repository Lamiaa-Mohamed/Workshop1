<?php 
session_start();
require_once "../inc/dbConnection.php";

if(isset($_POST['submit']) && isset($_GET['id'])){
    $img=$_FILES['img'];
    $id=$_GET['id'];
    $imgName=$img['name'];
    $imgTmpName=$img['tmp_name'];
    $imgError=$img['error'];
    $imgSize=$img['size'];
    $imgSizeMb=$imgSize/(1024**2);
    $ext=strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
    $errors=[];

    if (empty($errors)){
        if(!empty($imgName)){
        $rand=uniqid();
        $imgNewName=$rand.$ext;
        move_uploaded_file($imgTmpName,"../uploads/$imgNewName");
        $query="UPDATE `users` SET `img`='$imgNewName' WHERE id=$id";
         $runQuery=mysqli_query($conn,$query);
         var_dump($runQuery);
         header("location:../profile.php");
    }
    else{
         header("location:../index.php");
    } 
}
    else {
        $_SESSION['errors']=$errors;
        header("location:../updatepost.php");
    }
}







?>
