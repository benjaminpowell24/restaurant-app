<?php
session_start();
      $servername = "resthost";
      $server_user = "root";
      $server_pass = "";
      $dbname = "restaurant";
      $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);


      $status = $_POST['status'];
$id = $_POST['id'];
$sql = "UPDATE orders SET ostatus='$status', odeleted=1 WHERE orderno=$id;";
$conn->query($sql);
$sql = mysqli_query($conn, "SELECT * FROM orders where orderno=$id");
while($row1 = mysqli_fetch_array($sql)){
	$total = $row1['total'];
}
	
header("location: ../orders.php");

?>