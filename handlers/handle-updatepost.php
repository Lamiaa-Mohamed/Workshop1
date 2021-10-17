<?php 
session_start();
require_once "../inc/dbConnection.php";

if(isset($_POST['submit']) && isset($_GET['id'])){
    $title=trim($_POST['title']);
    $body=trim($_POST['body']);
    $img=$_FILES['img'];
    $id=$_GET['id'];
    $imgName=$img['name'];
    $imgTmpName=$img['tmp_name'];
    $imgError=$img['error'];
    $imgSize=$img['size'];
    $imgSizeMb=$imgSize/(1024**2);
    $ext=strtolower(pathinfo($imgName,PATHINFO_EXTENSION));
    $errors=[];
    
    if(empty($title)){
        $errors[]="Title is Required";
    }
    elseif(strlen($title) < 3 || strlen($title) > 255){
        $errors[]="Title Length between [3-255]";
    }
    elseif(is_numeric($title)){
        $errors[]="Title must be String";
    }
    if(empty($body)){
        $errors[]="Body is required";
    }
    elseif(strlen($body)<10 || strlen($desc)>500){
        $errors[]="Body Length between [10-500]";
    }

    if (empty($errors)){
        if(!empty($imgName)){
        $rand=uniqid();
        $imgNewName=$rand.$ext;
        move_uploaded_file($imgTmpName,"../uploads/$imgNewName");
        $query="UPDATE `posts` SET `title`='$title',`body`='$body',
        `img`='$imgNewName' WHERE id=$id";
         $runQuery=mysqli_query($conn,$query);
         var_dump($runQuery);
         header("location:../index.php");
    }
    else{
        $query="UPDATE `posts` SET `title`='$title',`body`='$body' 
        WHERE id=$id";
         $runQuery=mysqli_query($conn,$query);
         var_dump($runQuery);
         header("location:../index.php");
    } 
}

    else {
        $_SESSION['errors']=$errors;
        header("location:../updatepost.php");
    }
}


?>