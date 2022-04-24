<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "emp";
$insert = false;
$update = false;
$delete = false;
// How to make connection 
$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
   echo "<br>Connection Was not Successful. Sorry we connect to failed." . mysqli_connect_error();
}
?>