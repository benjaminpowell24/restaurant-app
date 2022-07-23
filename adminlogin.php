<?php  
	$servername = "resthost";
	$server_user = "root";    	
	$server_pass = "";
	$dbname = "restaurant";
    $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

	if(isset($_POST['login'])){

		
		$userid = $_POST['userid'];
		$password = $_POST['password'];

		if (empty($userid) || (empty($password))) {
			header("Location: ../adminlogin.html?login=empty");
			exit();
		}
		else{
			$sql="SELECT * FROM employee WHERE not edeleted AND empssn=? AND role='admin';";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../adminlogin.php?login=wrongid");
				exit();
			}
			else{

			mysqli_stmt_bind_param($stmt, "s", $userid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
					if($password==false){
						echo "<script>alert('Wrong Password')</script>";
					}
					else if($password == true){
							$user_id = $row['empssn'];
							$name = $row['fname'];
							$role= $row['role'];
							session_start();
							$_SESSION['admin_sid']=session_id();
							$_SESSION['user_id'] = $user_id;
							$_SESSION['role'] = $role;
							$_SESSION['name'] = $name;

							header("location: ../adminsession.php");
						}
					}
					
			}
			}

	}
	
		
		
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Admin-Login</title>


  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
 
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
 
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">




  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
      
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>




  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form method="POST" action="adminlogin.php" class="login-form" id="form">
        <div class="row">
          <div class="input-field col s12 center">
            <p class="center login-form-text">Login</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="userid" id="userid" type="text">
            <label for="userid" class="center-align">ID</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="password" id="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
			<button type="submit" class="btn waves-effect waves-light col s12" name="login">Login</button>
          </div>
		  		<div class="row">
        </div>


      </form>
    </div>
  </div>



 
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  
  <script type="text/javascript" src="js/materialize.min.js"></script>
 
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>

</body>
</html>