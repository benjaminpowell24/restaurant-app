<?php
session_start();
      $servername = "resthost";
      $server_user = "root";
      $server_pass = "";
      $dbname = "restaurant";
      $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE orders SET ostatus='$status' WHERE orderno=$id;";
$conn->query($sql);

header("location: ../all-orders.php");
?>