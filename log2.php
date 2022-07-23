<?php
	$conn = mysqli_connect('resthost','root','','restaurant');

	if (isset($_POST['submit'])) {
		$cphoneno = $_POST['cphoneno'];
		$cpassword = $_POST['cpassword'];

		if (empty($cphoneno) || (empty($cpassword))) {
			header("Location: ../login.html?login=empty");
			exit();
		} else {
			$sql = "SELECT * FROM customer WHERE cphoneno=?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../login.html?login=wrongid");
			exit();
			}
			else{

				mysqli_stmt_bind_param($stmt, "s", $cphoneno);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) {
					if ($cpassword == false) {
						echo"<script>alert('Wrong password')</script>";
					}else if ($cpassword == true) {
						session_start();
						$_SESSION['userid'] = session_id();
						$_SESSION['customername'] = $row['fname'];
						$_SESSION['lname'] = $row['lname'];
						$_SESSION['phoneno'] = $row['cphoneno'];

						header("location: ../Session.php");
				}
			}
			else {
				header("location: ../Registration.html?login=nouser");
				exit();
			}

	}
		}
}
else {
	header("Location: ../index.php?login=error");
	exit();
}
?>