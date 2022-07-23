<?php
session_start();
      $servername = "resthost";
      $server_user = "root";
      $server_pass = "";
      $dbname = "restaurant";
      $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

      

	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_role/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE employee SET role = '$value' WHERE empssn = $key;";
			$conn->query($sql);
		}
		
		if(preg_match("/[0-9]+_edeleted/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE employee SET edeleted = '$value' WHERE empssn = $key;";
			$conn->query($sql);
		}		
		if(preg_match("/[0-9]+_cdeleted/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE customer SET mdeleted = '$value' WHERE cphoneno = $key;";
			$conn->query($sql);
		}	
				
	}
header("location: ../users.php");
?>