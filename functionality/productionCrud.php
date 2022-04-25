<?php
include "conn.php";
// session_start();
    if (isset($_GET['delete'])) {
     
      $sno = $_GET['delete'];
      

      // $sql = "DELETE FROM `purchaseitems` WHERE `purchaseitems`.`billno` = $billno";
      // $result = mysqli_query($conn,$sql);
    
        $sql = "DELETE FROM `production` WHERE `sno` = $sno";
        $result = mysqli_query($conn,$sql);
        if ($result) {
          # code...
          header('Location:addProduction.php');
        }
        if (!$result) {
          $delete = true;
        }
    }

  
    if (isset($_POST['mname'])) {
      // Update the record
      $sno = (int)$_POST["sno"];
      $machineno = $_POST['mmachineno'];
      $name = $_POST['mname'];
      $production = $_POST['mproduction'];
      $duty = $_POST['mduty'];
      $frame = $_POST['mframe'];
      $tb = $_POST['mtb'];
      $date = $_POST['mdate'];

      if ($machineno == "9" || $machineno == "10" ||$machineno == "11" ||$machineno == "12" )
      {
        $total = ($production / 100000) * 200;
      }else {
        $total = ($production / 100000) * 125;
      }

      // $tb = $_POST['etb'];
  
      // Sql query to be executed
      $sql = "UPDATE `production` SET `sno` = '$sno' , `machineno` = '$machineno', `name` = '$name', `production` = '$production', `duty` = '$duty', `frame` = '$frame', `tb` = '$tb', `date` = '$date',`total` = '$total' WHERE `sno` = $sno";
      // echo $sql;
      // var_dump($tb);
      $result = mysqli_query($conn, $sql);
      if ($result) {
        header('Location:report.php');
      }
      else{
        $update = true;
      }
  
    }


    if (isset($_POST["add"])) {
      // bill detail
      $machineno = $_POST['machineno'];
      $name = $_POST['name'];
      $production =$_POST['production'];
      $duty = $_POST['duty'];
      $frame = $_POST['frame'];
      $tb = $_POST['tb'];
      $date = $_POST['date'];
      
      if ($machineno == "9" || $machineno == "10" ||$machineno == "11" ||$machineno == "12" )
      {
        $total = ($production / 100000) * 200;
      }else {
        $total = ($production / 100000) * 125;
      }

      // item detail
      
      // $tb = $_POST['ptb'];

      var_dump($total);
    //   echo "hello";
    //   var_dump($machineno);
    //   var_dump($name);
    //   var_dump($production);
    //   var_dump($frame);
    //   var_dump($tb);
    //   var_dump($date);
      
      // var_dump($tamount);
      if (
        ($name != null || $name != "") && 
        ($machineno != null || $machineno != "") && 
        ($production != null || $production != "") &&
        ($date != null || $date != "") && 
        ($frame != null || $frame != "") && 
        ($tb != null || $tb != "") 
      ) 
      {
        $sql = "INSERT INTO `production` (`machineno`, `name`, `production`,`duty`, `frame`, `tb`,`date`,`total`) VALUES ('$machineno', '$name', '$production','$duty', '$frame', '$tb','$date','$total')";
        $result = mysqli_query($conn,$sql);
        var_dump($sql);
        
        if (!$result) {
          $insert = true;
        }
        else
        {
            header('Location:addProduction.php');
          // $insert = true;
        }
      }
      
    }
?>