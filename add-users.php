<?php
session_start();
      $servername = "resthost";
      $server_user = "root";
      $server_pass = "";
      $dbname = "restaurant";
      $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

      


$fname = $_POST['fname'];
$password = $_POST['password'];
$lname = $_POST['lname'];
$salary = $_POST['salary'];
$ssn = $_POST['ssn'];
$address = $_POST['address'];
$role = $_POST['role'];

$sql = "INSERT INTO employee(fname, epasssword, lname, salary, empssn, address, role) VALUES ('$fname', '$password', '$lname', '$salary', '$ssn', '$address', '$role')";

$result = mysqli_query($conn, $sql);
if($result===false){
	die("Query failed".mysqli_error($conn).$sql);
}
else{
header("location: ../users.php");
}
?>