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
    	$sql2 = "SELECT * FROM customer where cphoneno = '$cphone';";
    	$result2 = mysqli_query($conn, $sql2);
    		if($result2 === FALSE){
				die("Query failed!".mysqli_error().$sql2);    		}
			while($row2 = mysqli_fetch_array($result2)){
				$name = $row2['fname'];	
				$address = $row2['address'];
	}
         
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

  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
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
                <h5 class="breadcrumbs-title">Provide Order Details</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
				<div class="container">
          <p class="caption">Provide required delivery and payment details.</p>
          <div class="divider"></div>
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Details</h4>
              </div>
<div>
                <div class="card-panel">
                  <div class="row">
                    <form class="formValidate col s12 m12 l6" id="formValidate" method="post" action="confirmorder.php?action=confirmorder" novalidate="novalidate">
                      <div class="row">
                        <div class="input-field col s12">
							<label for="payment_type">Payment Type</label><br><br>
							<select id="payment_type" name="payment_type">
									<option value="Cash on Delivery" selected>Cash on Delivery</option>
									<option value="Wallet" <?php echo 'disabled';?>>Wallet</option>
																
							</select>
                        </div>
                      </div>					
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-home prefix"></i>
							<textarea name="address" id="address" class="materialize-textarea validate" data-error=".errorTxt1"><?php echo $address;?></textarea>
							<label for="address" class="">Address</label>
							<div class="errorTxt1"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-action-credit-card prefix"></i>
							<input name="cc_number" id="cc_number" type="text" data-error=".errorTxt2" <?php echo 'disabled';?>>
							<label for="cc_number" class="">Card Number</label>
							<div class="errorTxt2"></div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="mdi-communication-vpn-key prefix"></i>	
							<input name="cvv_number" id="cvv_number" type="text" data-error=".errorTxt3" <?php echo 'disabled';?>>
							<label for="cvv_number" class="">CVV Number</label>								
							<div class="errorTxt3"></div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                              <i class="mdi-content-send right"></i>
                            </button>
                          </div>
                        </div>
                      </div>
					  
                    </form>
                  </div>
                </div>
              </div>
            <div class="divider"></div>
            
          </div>
        <!--end container-->

      </div>
	  
        <div class="container">
          <p class="caption">Estimated Receipt</p>
          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
<div class="row">
<div>
<ul id="issues-collection" class="collection">
<?php
    echo '<li class="collection-item avatar">
        <i class="mdi-content-content-paste red circle"></i>
        <p><strong>Name: </strong>'.$fname.' '.$lname.'</p>
		<p><strong>Contact Number:</strong> 0'.$cphone.'</p>
        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>';
		
		$total = 0;
		$i=0;


		if(isset($_POST['order'])){
				if($_GET['action']=='order'){
						$pid = array_column($_SESSION['cart'], 'pid');
       					$query = "SELECT * FROM menu WHERE not mdeleted;";
               			$result = mysqli_query($conn,$query);
                		while($row = mysqli_fetch_assoc($result)){  
                       			foreach ($pid as $fid){
        	        				if($row["foodid"]== $fid){
				
			
							$food_id = $row["foodid"];
							$quantity = $_POST['qty'][$i];
							$_SESSION['qty'][$i] = $quantity;
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
		$i = $i + 1;
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

  <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            address: {
                required: true,
                minlength: 5
            },
            cc_number: {
                required: true,
                minlength: 16,
            },
            cvv_number: {
                required: true,
                minlength: 3,
			},
		},
        messages: {
           address:{
                required: "Enter a address",
                minlength: "Enter at least 5 characters"
            },	
           cc_number:{
                required: "Please provide card number",
                minlength: "Enter at least 16 digits",
            },	
           cvv_number:{
                required: "Please provide CVV number",
                minlength: "Enter at least 3 digits",		
            },				
		},
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });
	  $('#cc_number').formatter({
          'pattern': '{{9999}}-{{9999}}-{{9999}}-{{9999}}',
          'persistent': true
      });
	  $('#cvv_number').formatter({
          'pattern': '{{9}}-{{9}}-{{9}}',
          'persistent': true
      });
		$('#payment_type').change(function() {
		if ($(this).val() === 'Cash On Delivery') {
		  $("#cc_number").prop('disabled', true);
		  $("#cvv_number").prop('disabled', true);		  
		}
		if ($(this).val() === 'Wallet'){
		  $("#cc_number").prop('disabled', false);
		  $("#cvv_number").prop('disabled', false);	
		}
		});
    </script>
</body>
</html>

<?php
}
?>