<?php 
session_start();
require_once "../inc/dbConnection.php";

if(isset($_POST['submit'])){
    $title=trim($_POST['title']);
    $body=trim($_POST['body']);
    $img=$_FILES['img'];
    echo $title,$body;
    print_r($img);

    $imgName=$img['name'];
    $imgTmpName=$img['tmp_name'];
    $imgError=$img['error'];
    $imgSize=$img['size'];
    $imgSizeMb=$imgSize/(1024**2);
    $ext=pathinfo($imgName,PATHINFO_EXTENSION);
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
        $errors[]="Body is Required";
    }
    elseif(strlen($body) < 10 || strlen($body) > 500){
        $errors[]="Body Length between [10-500]";
    }
    if($imgError > 0){
        $errors[]="Error While Uploading";
    }
    elseif(!in_array(strtolower($ext),['png','jpeg','gif','jfif','jpg'])){
        $errors[]="Must be Image";
    }
    elseif ($imgSizeMb > 5) {
        $errors[]="Image Max Size 5Mb";
    }

    if (empty($errors)){
        $rand=uniqid();
        $imgNewName=$rand.$ext;
        move_uploaded_file($imgTmpName,"../uploads/$imgNewName");
        $query="INSERT INTO `posts` (`title`,`body`,`img`) VALUES
         ('$title','$body','$imgNewName')";
         $runQuery=mysqli_query($conn,$query);
         header("location:../index.php");
    }
    else {
        $_SESSION['errors']=$errors;
        header("location:../addpost.php");
    }
}


?>