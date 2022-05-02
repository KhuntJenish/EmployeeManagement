<?php
session_start(); 
$_SESSION['page'] = "register";
$_SESSION['logout'] = true;
include "functionality/conn.php";

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register account</title>
</head>

<body>
    <?php 
      include "component/navbar.php";
      include "functionality/loginCrud.php";
      if($insert){
       echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>something went wrong!</strong> '.$errormsg.'.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
    ?>


    <div class="container mt-4 ">
        <h3>Register Page</h3>

        <form class="mt-3 mb-3" action="register.php" method="post">
            <div class="mb-3 ">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter here username">
            </div>
            <div class="mb-3 ">
                <label class="form-label">Email address</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" name="email">
                    <span class="input-group-text email" id="email">@Khodal.com</span>
                </div>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" class="form-control password" id="password" name="password" placeholder="Enter below 10 digit password" maxlength="10">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control cpassword" id="cpassword" name="cpassword" placeholder="Enter below 10 digit password" maxlength="10">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" >Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary register" id="register" name="register">Register</button>
        </form>
    </div>

 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

 
</body>

</html>