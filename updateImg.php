<?php 
session_start();
require_once "inc/dbConnection.php";
require_once "inc/header.php";

?>

<form action="handlers/handle-img.php" method="POST" enctype="multipart/form-data">
<div class="container w-50 my-2">
    <h5>Upload Your Profile Picture</h5>
    <input name="img" class="form-control" type="file" >
    <a class="btn btn-info my-2" href="handlers/handle-img.php">Upload</a>
    </div>
</form>

<?php
require_once "inc/footer.php";
?>