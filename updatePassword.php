<?php 
session_start();
require_once "inc/dbConnection.php";
require_once "inc/header.php";

?>

<form action="handlers/handle-password.php" method="POST">
    <div class="container w-50 my-2">
    <h6>Current</h6>
    <input class="form-control" name="currentpassword" type="password">
    <h6>New</h6>
    <input class="form-control" name="newpassword" type="password">
    <h6>Re-type New</h6>
    <input class="form-control" name="repassword" type="password">
    <a class="btn btn-info m-2" href="handlers/handle-username.php">Change</a>
    </div>
</form>



<?php
require_once "inc/footer.php";
?>