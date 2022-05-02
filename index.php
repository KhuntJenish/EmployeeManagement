<?php
session_start(); 
$_SESSION['page'] = "index";
$_SESSION['logout'] = true;
include "functionality/conn.php";
 $_SESSION['logout'] = isset($_SESSION['logout']) ? $_SESSION['logout'] : true;
 
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

    <title>Login page!</title>
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


    <div class="container mt-4 mb-3">
        <h3>Login Page</h3>

        <form class="mt-3" action="index.php" method="post">
            <div class="mb-3 ">
                <label class="form-label">Username</label>
                <input type="text" class="form-control username" id="username" name="username"  placeholder="Enter your username">
            </div>
           
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control password" maxlength="10" id="password" name="password" placeholder="Enter 10 digit password">
            </div>
          
            <button type="submit" class="btn btn-primary login" id="login" name="login">Login</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

  
</body>

</html>