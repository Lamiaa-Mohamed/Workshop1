<?php 
session_start();
require_once "inc/dbConnection.php";
require_once "inc/header.php";

$postQuery="SELECT * FROM `posts`";
$postRunQuery=mysqli_query($conn,$postQuery);
$posts=mysqli_fetch_all($postRunQuery,MYSQLI_ASSOC);
// if(isset($_GET)){
//     $id=$_GET['id'];
//     $userQuery="SELECT * FROM `users` WHERE id=$id";
//     $userRunQuery=mysqli_query($conn,$userQuery);
//     $users=mysqli_fetch_all($userRunQuery,MYSQLI_ASSOC);
// }
?>

<div class="container py-3">
    <a class="btn btn-secondary" href="profile.php?id=<?php echo $user['id']?>">Profile</a>
    <?php if(!isset($_SESSION['email'])){?>
    <a class="btn btn-secondary" href="login.php">Log In</a>
    <?php }?>
    <?php if(isset($_SESSION['email'])){?>
    <a class="btn btn-secondary" href="logout.php">Log Out</a>
    <?php }?>
    <?php if(isset($_SESSION['email'])){?>
    <a class="float-end btn btn-primary" href="addPost.php">Add Post</a>
    <?php }?>
    <div class="row p-2">
        <?php foreach($posts as $post){?>
        <div class="col-md-4 m-2">
            <img class="img-fluid" src="uploads/<?php echo $post['img'] ?>" alt="">
            <h1><?php echo $post['title'] ?></h1>
           <a class="btn btn-info" href="showDetails.php?id=<?php echo $post['id']?>">Show Details</a>
           <?php if(isset($_SESSION['email'])){?>
           <a class="btn btn-success" href="updatepost.php?id=<?php echo $post['id']?>">Update</a>
           <a class="btn btn-warning" href="deletepost.php?id=<?php echo $post['id']?>">Delete</a>
           <?php }?>
        </div>
        <?php }?>
    </div>
</div>










<?php

require_once "inc/footer.php";