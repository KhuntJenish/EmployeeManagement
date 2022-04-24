<?php
include "conn.php";


    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $adhar = strtoupper($_POST['adharno']) ;
        $category = $_POST['category'];
        $mobile = $_POST['mobile']; 
        $sno = $_POST['sno'];
        
        
        $sql = "UPDATE `account` SET `name` = '$name' ,`adhar` = '$adhar', `category` = '$category', `mobile` = '$mobile'  WHERE `account`.`sno` = $sno";
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        // echo '<script>window.location.href = "account.php";</script>';
      
        
    }

    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $adhar = strtoupper($_POST['adharno']) ;
        $category = $_POST['category'];
        $mobile = $_POST['mobile'];
      

        $sql = "INSERT INTO `account` (`name`, `adhar`, `category`, `mobile`) VALUES ('$name', '$adhar', '$category', '$mobile')";
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        
        // echo '<script>window.location.href = "account.php";</script>';
    }

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
        // echo $sno;
    

        $sql = "DELETE FROM `account` WHERE `account`.`sno` = $sno";
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        echo '<script>window.location.href = "account.php";</script>';
        // if ($result) {
        //     header('Location:account.php'); 
        // }
    
    }

?>