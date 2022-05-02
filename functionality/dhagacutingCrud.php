<?php
include "conn.php";
$insert = false;

// session_start();
    if (isset($_GET['delete'])) {
     
      $sno = $_GET['delete'];
   
        $sql = "DELETE FROM `dhagacuting` WHERE `sno` = $sno";
        $result = mysqli_query($conn,$sql);
        if ($result) {
          if ($_SESSION['page'] == "adddhagacuting") {
            echo '<script>window.location.href = "/page/ledger/adddhagacuting.php";";</script>';
          }
          if ($_SESSION['page'] == "dhagacutingReport") {
            echo '<script>window.location.href = "/page/ledger/dhagacutingReport.php";</script>';
          }
          // echo '<script>window.location.href = "adddhagacuting.php";</script>';

        }
        if (!$result) {
          $delete = true;
        }
    }

  
    if (isset($_POST['update'])) {
      // Update the record
      $sno = (int)$_POST["sno"];
      $name = $_POST['name'];
      $saree = (int)$_POST['saree'];
      $price = (int)$_POST['price'];
      $date = $_POST['date'];
      $total = 0;  

      if ($saree != null && $price != null) {
        $total = $saree * $price;
      }
      // Sql query to be executed
      $sql = "UPDATE `dhagacuting` SET  `name` = '$name', `saree` = '$saree', `price` = '$price', `date` = '$date',`total` = '$total' WHERE `sno` = $sno";
      // echo $sql;
      // var_dump($tb);
      $result = mysqli_query($conn, $sql);
      if ($result) {
        // header('Location:dhagacuting.php');
      }
      else{
        $update = true;
      }
  
    }


    if (isset($_POST["add"])) {
      // bill detail
      $name = $_POST['name'];
      $production =$_POST['production'];
      $price = $_POST['price'];
      $date = $_POST['date'];
      
      //   var_dump($machineno);
      //   var_dump($name);
      //   var_dump($production);
      //   var_dump($frame);
      //   var_dump($tb);
      //   var_dump($date);
      
      // var_dump($tamount);
      if (
        ($name != null || $name != "") &&  
        ($production != null || $production != "") &&
        ($date != null || $date != "") && 
        ($price != null || $price != "") 
      ) 
      {
          $total = $production * $price;
          // var_dump($total);

        $sql = "INSERT INTO `dhagacuting` (`name`, `saree`,`price`, `total`,`date`) VALUES ('$name', '$production','$price', '$total','$date')";
        $result = mysqli_query($conn,$sql);
        // var_dump($sql);
        
        if (!$result) {
          $insert = true;
        }
        else
        {
          if($_SESSION['page'] == "adddhagacuting"){
            echo '<script>window.location.href = "adddhagacuting.php";</script>';
          }

          // $insert = true;
        }
      }else 
      {
        $insert = true;
      }
      
    }
?>