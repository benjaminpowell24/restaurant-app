<?php
	session_start();
	$servername = "resthost";
    $server_user = "root";
    $server_pass = "";
    $dbname = "restaurant";
    $fname = $_SESSION['customername'];
    $lname = $_SESSION['lname'];
    $cphone = $_SESSION['phoneno'];
    $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

$total = 0;
$i = 0;
$address = htmlspecialchars($_POST['address']);
$payment_type = $_POST['payment_type'];
$total = $_POST['total'];

	$sDate = date("Y-m-d H:i:s");
	$sql = "INSERT INTO orders (customer_id, payment, address, total, odate) VALUES ($cphone, '$payment_type', '$address', '$total', '$sDate');";
		$result = mysqli_query($conn, $sql);

		if($result === TRUE){
			  $pid = array_column($_SESSION['cart'], 'pid');
       					$query = "SELECT * FROM menu WHERE not mdeleted;";
               			$result = mysqli_query($conn,$query);
                		while($row = mysqli_fetch_assoc($result)){  
                       			foreach ($pid as $fid){
        	        				if($row["foodid"]== $fid){
				
			
							$food_id = $row["foodid"];
							$quantity = $_SESSION['qty'][$i];
							$quan[$i] = $quantity;
							$dprice = $row["mprice"];
							$foodname = $row["foodname"];

					 $sql = "INSERT INTO order_details (food_id, quantity, dprice, cphone, orderdate) VALUES ('$food_id','$quan[$i]','$dprice','$cphone','$sDate');";
					$r = mysqli_query($conn,$sql);

					$i = $i + 1;
					
				}
				
			}
		}
		$query = "SELECT * FROM orders WHERE customer_id = $cphone AND odate = '$sDate'";
		$res = mysqli_query($conn,$query);
		if ($row1 = mysqli_fetch_assoc($res)) {
			$ono = $row1["orderno"];
		
		if($res === false){
			die("Error".mysqli_error($conn).$query);
			}

		$sql1 = "UPDATE order_details SET order_no='$ono' WHERE cphone = $cphone AND orderdate = '$sDate';";
		$res2 = mysqli_query($conn, $sql1);

		if($res2 === false){
			die("Error2".mysqli_error($conn).$sql1);
			}
		echo "<script>alert('Order successful')</script>";
		echo "<script>window.location='Session.php'</script>";
	}

	}
	elseif ($result === false) {
		die("result error".mysqli_error($conn).$sql1);
	}
	



?>