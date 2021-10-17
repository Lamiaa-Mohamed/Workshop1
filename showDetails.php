<?php
require_once "inc/dbConnection.php";

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM `posts` WHERE id=$id";
    $runQuery=mysqli_query($conn,$query);
    $post=mysqli_fetch_assoc($runQuery);
    // print_r($post);
}
?>


<?php 

require_once "inc/header.php";
?>


<div class="container my-5 py-5">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="uploads/<?php echo $post['img']?>" alt="">
        </div>
        <div class="col-md-6">
            <h1><?php echo $post['title']?></h1>
            <p><?php echo $post['body']?></p>
            
        </div>
    </div>
</div>




<?php 

require_once "inc/footer.php";
?>