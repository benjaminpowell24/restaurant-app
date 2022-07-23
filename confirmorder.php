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

    require("method.php");

     if($_SESSION['userid']==session_id()){
          if($_POST['payment_type'] == 'Cash on Delivery'){
            $continue = 1;
          }

if($continue){
         
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8" name="viewport" content="device-width, initial-scale=1">
	<!-- <link href="checkstyle.css" rel="stylesheet"> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous"/>
            <link href="icon.png" rel="shortcut icon">
			<title>Order details</title>

			<link href="materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
       <style type="text/css">

  .dropdownbtn {
  margin-left:initial;
  background-color:#0005;
  color: white;
	padding-left: 25px;
  padding-right: 25px;
  padding-top: 16px;
  padding-bottom: 12px;
  font-size: 15px;
  border: none;
  cursor: pointer;
  text-decoration:none;
  transition: 0.6s all;
  font-weight: 550;
 
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-left: 1087.5px;
}

/* Dropdown Content (Hidden by Default) */
.dropdownlinks {
  margin-left:initial;
  display: none;
  position: fixed;
  background-color: #0005;
  min-width: 105px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdownlinks a {
  color: white;
  line-height: 1.0;
  padding:16px 25px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdownlinks a:hover {
    background-color: black;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdownlinks {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropdownbtn {
  background-color:#F73859;
}

.back {
  margin-left:initial;
  background-color:#0005;
  color: white;
  padding-left: 25px;
  padding-right: 25px;
  padding-top: 16px;
  padding-bottom: 12px;
  font-size: 15px;
  border: none;
  cursor: pointer;
  text-decoration:none;
  transition: 0.6s all;
  font-weight: 550;
  position: relative;
  display: inline-block;
  margin-left: 0px;
}


.navbar{
    width:100%;
    height:50px;
    background-color:#2f2d38;
    color:white;
    position:fixed;
    top:0;
    font-weight: 550;

}

.linkref:hover{
    background-color:#F73859;

}

.navbar a{
    color:white;
    text-decoration:none;
}

.linkref {
    text-align:left;
    float:right;
    display:inline-block;
    line-height:1.0;
    padding:17.5px 25px;
    word-spacing:auto;
    font-size:15px;
    transition: 0.6s all;
}

  
  
  </style>
</head>
<body>
		<div class="navbar">
					<button class="back"><a href="Session.php">Back</a></button>
                <a href="#" class="linkref">Track Order</a>
                <div class="dropdown">
                    <button class="dropdownbtn">Account</button>
                    <div class="dropdownlinks">
                        <a href="logout.php">Logout</a>
                        <a href="#">History</a>
                    </div>
                </div>
                <a href="Session.php" class="linkref">Menu</a>
        </div>
	<section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Confirm Order Details</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->

	  
         <!--start container-->
        <div class="container">
          <p class="caption">Receipt</p>
          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
<div class="row">
<div>
<ul id="issues-collection" class="collection">
<?php
    echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste red circle"></i>
        <p><strong>Name:</strong> '.$fname.' '.$lname.'</p>
    <p><strong>Contact Number:</strong> 0'.$cphone.'</p>
    <p><strong>Address:</strong> '.htmlspecialchars($_POST['address']).'</p>  
    <p><strong>Payment Type:</strong> '.$_POST['payment_type'].'</p>      
        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>';

$total = 0;
$i = 0;
		if(isset($_POST['action'])){
				if($_GET['action']=='confirmorder'){
						$pid = array_column($_SESSION['cart'], 'pid');
       					$query = "SELECT * FROM menu WHERE not mdeleted;";
               			$result = mysqli_query($conn,$query);
                		while($row = mysqli_fetch_assoc($result)){  
                       			foreach ($pid as $fid){
        	        				if($row["foodid"] == $fid){
				
			
							$food_id = $row["foodid"];
							$quantity = $_SESSION['qty'][$i];
              $quan[$i] = $quantity;
							$dprice = $row["mprice"];
							$image = $row["image"];
							$foodname = $row["foodname"];

					// $sql = "INSERT INTO order_details (food_id, quantity, dprice, image, cphone) VALUES ('$food_id','$quantity','$dprice','$image','$cphone');";
					// $r = mysqli_query($conn,$sql);
					// if ($r === FALSE) {
						   // die("Query failed!".mysqli_error().$sql);
					// }

						$dprice = $quantity*$dprice;
			    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"><strong>#'.$food_id.' </strong>'.$foodname.'</p>
            </div>
            <div class="col s2">
                <span>'.$quantity.' Pieces</span>
            </div>
            <div class="col s3">
                <span>GHc. '.$dprice.'</span>
            </div>
        </div>
    </li>';
		$total = $total + $dprice;
    $i=$i+1;
				}
        
				// echo "<script>alert('Order successful')</script>";
				// echo "<script>window.location='orderdetails.php'</script>";
			}
		}
	}
}
		
    echo '<li class="collection-item">
        <div class="row">
            <div class="col s7">
                <p class="collections-title"> Total</p>
            </div>
            <div class="col s2">
                <span>&nbsp;</span>
            </div>
            <div class="col s3">
                <span><strong>GHc. '.$total.'</strong></span>
            </div>
        </div>
    </li>';
		
?>
<form action="orderfinal.php" method="post">
<input type="hidden" name="payment_type" value="<?php echo $_POST['payment_type'];?>">
<input type="hidden" name="address" value="<?php echo htmlspecialchars($_POST['address']);?>">
<input type="hidden" name="total" value="<?php echo $total;?>">

<div class="input-field col s12">
<button class="btn cyan waves-effect waves-light right" type="submit" name="action">Confirm Order<i class="mdi-content-send right"></i>
</button>
</div>
</form>
</ul>


                </div>
				</div>
                </div>
              </div>
            </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->

  </div>

  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>	
	<script type="text/javascript" src="js/plugins/formatter/jquery.formatter.min.js"></script>   
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>

</body>
</html>

<?php
}
}
?>