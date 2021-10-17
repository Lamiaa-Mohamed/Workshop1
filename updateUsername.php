<?php 
session_start();
require_once "inc/dbConnection.php";
require_once "inc/header.php";

?>

<form action="handlers/handle-username.php" method="POST">
    <input class="form-control" name="username" type="text">
    <a class="btn btn-info" href="handlers/handle-username.php">Update</a>
</form>



<?php
require_once "inc/footer.php";
?>