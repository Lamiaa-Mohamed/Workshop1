<?php 
session_start();
require_once "inc/dbConnection.php";
require_once "inc/header.php";
?>

<?php 
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $query="SELECT * FROM `users` WHERE id=$id";
    $runQuery=mysqli_query($conn,$query);
    $user=mysqli_fetch_assoc($runQuery);
    // print_r($user);
}
?>

<form action="" method="GET">
<div>
<img class="img-fluid" src="uploads/<?php echo $user['img']?>" alt="">
<a class="btn btn-info" href="updateImg.php?id=<?php echo $user['id']?>">Change Profile Picture</a>  
</div>
<div>
<h5><?php echo $user['name']?></h5>
<a class="btn btn-info" href="handlers/handle-username.php?id=<?php echo $user['id']?>">Change Name</a>  
</div>
<div>
<h5><?php echo $user['email']?></h5>
</div>
<div>
<h5>Password :</h5>
<a class="btn btn-info" href="handlers/handle-password.php?id=<?php echo $user['id']?>">Change Password</a>  
</div>
</form>



<?php 
require_once "inc/footer.php";
?>