<?php
session_start();
 require_once "inc/dbConnection.php";
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
</style>
</head>
<body>
<div class="container register-form">
<?php if(isset($_SESSION['errors'])) {?>

<div class="alert alert-danger w-50">
<?php foreach($_SESSION['errors'] as $error) {?>
    <p><?php echo $error?></p>
    <?php } unset($_SESSION['errors'])?>
</div>

<?php }?>
    <form action="handlers/handle-register.php" method="POST" enctype="maltipart/formdata">
        <div class="note">
            <p>This is a simpleRegister Form made using Boostrap.</p>
        </div>

        <div class="form-content">
            <div class="row">
         <div class="col-md-6">
             <div class="form-group">
             <input required name="username" type="text" class="form-control" placeholder="Your Name *" value=""/>
             </div>
             <div class="form-group">
             <input name="email" type="email" class="form-control" placeholder="Your Email *" value=""/>
             </div>
             <div class="form-group">
             <input name="img" type="file" class="form-control" placeholder="Your Profile Picture" value=""/>
             </div>
             </div>
             <div class="col-md-6">
             <div class="form-group">
             <input name="password" type="password" class="form-control" placeholder="Your Password *" value=""/>
             </div>
             <div class="form-group">
             <input name="repassword" type="password" class="form-control" placeholder="Confirm Password *" value=""/>
             </div>
             </div>
             </div>
             <button name="submit" type="submit" class="btnSubmit">Submit</button>
             </div>
            </div>
 </div>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script></body>
</html>

