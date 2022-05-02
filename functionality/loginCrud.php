<?php
include "conn.php";
$feedbackerror = false;
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // echo $username;
        // echo $password;
        if ($username == "" ||$email == "" ||$password == "" ||$cpassword == "") {
            $insert = true;
            $errormsg = "invalid credencial.";
        }
        else 
        {
            if ($password == $cpassword) {
                $email = $email.'@Khodal.com';
                $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username','$email', '$password')";
                // echo $sql;
                $result = mysqli_query($conn,$sql);
                if($result) {
                    $_SESSION['logout'] = false;
                    echo '<script>window.location.href = "index.php";</script>';
                }else {
                    $insert = true;
                    $errormsg = "record not added.";
                }
            }else {
                $insert = true;
                $errormsg = "!password does not match.";
            }
            
        }   
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo $username;
        // echo $password;
        if ($username == "" ||$password == "") {
            $insert = true;
            $errormsg = "invalid credencial.";
        }
        else 
        {
            $sql = "select * from users where username = '".$username."' and password = '".$password."'";
            // echo $sql;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
            // var_dump($row);
            if ($row > 0){
                $username == "KHODAL7027" && $password == "KHODAL7027" ?
                    $_SESSION['login'] = "admin" : $_SESSION['login'] = "user";
                $_SESSION['username'] = $username;
                $_SESSION['logout'] = false;
                echo '<script>window.location.href = "home.php";</script>';
            }else {
                $insert = true;
                $errormsg = "record not added.";
            }
        }     
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        // echo $name;
        // echo $message;
        if ($name == "" ||$email == "" ||$phone == "" ||$message == "") {
            $insert = true;
            $errormsg = "invalid credencial.";
        }
        else 
        {
                $sql = "INSERT INTO `feedback` (`name`,`email`, `phone`,`message`) VALUES ('$name','$email', $phone,'$message')";
                // echo $sql;
                $result = mysqli_query($conn,$sql);
                if($result) {
                    header("location: about.php");
                }else {
                    $insert = true;
                    $errormsg = "record not added.";
                }   
        }   
    }

?>