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
  

    	if(isset($_POST['remove'])){
    		if($_GET['action']=='remove'){
        		foreach ($_SESSION['cart'] as $key => $value) {
            		if($value["pid"] == $_POST['pid']){
                		unset($_SESSION['cart'][$key]);
                		echo "<script>alert('Item removed')</script>";
                		echo "<script>window.location='addtocart.php'</script>";
            		}
        		}
    		}
		}

		

        
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
            <link href="cartstyle.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous"/>
            <link href="icon.png" rel="shortcut icon">
			<title>Choland - Checkout</title>
			
</head>
<body>
<div class="bg-light">
	<div class="navbar">
				<button class="back"><a href="Session.php">Back</a></button>
                <a href="addtocart.php" class="linkref"><i class="fas fa-shopping-cart"></i> Cart 
                    <?php
                        if(isset($_SESSION['cart'])){
                            $count=count($_SESSION['cart']);
                            echo "<span id=\"cart-count\" class=\"text-warning bg-light\">$count</span>";
                        }
                        else{
                            echo"<span id=\"cart-count\" class=\"text-warning bg-light\">0</span>";
                        }
                    ?>
                </a>
                <div class="dropdown">
                    <button class="dropdownbtn">Account</button>
                    <div class="dropdownlinks">
                        <a href="logout.php">Logout</a>
                        <a href="#">History</a>
                    </div>
                </div>
                <a href="Session.php" class="linkref">Menu</a>
        </div>
        <div class="container-fluid myfont">
        	<div class="row px-5">
        		<div class="col-md-7">
        			<div class="shopping-cart">
        				<div class="mycart">
        				<h4> My Cart</h4>
        				</div>
        				<hr>
        			<form method="POST" action="orderdetails.php?action=order" novalidate="novalidate">
        			<?php
        				$total=0;
        				$charges=15;
        				if(isset($_SESSION['cart'])){
        					$pid = array_column($_SESSION['cart'], 'pid');

        					$query = "SELECT * FROM menu WHERE not mdeleted;";
                			$result = mysqli_query($conn,$query);
	                		while($row = mysqli_fetch_assoc($result)){
    	            			foreach ($pid as $fid) {
        	        				if($row["foodid"]== $fid){
                					cartElement($row["image"],$row["foodname"],$row["mprice"],$row["foodid"]);
                					$total = $total + ((int)$row["mprice"]);

                						
			
		
         

                					}
            	    			}
                			}
        				}
        				else{
        					echo"<script>alert('Cart is empty')</script>";
        					echo"<script>window.location='Session.php'</script>";
        				}
        			?>
        				
        			</div>
        		</div>
        		<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
        			<div class="pt-4">
        				<h4>PRICE DETAILS</h4>
        				<hr>
        				<div class="row price-details">
        					<div class="col-md-6">
        						<?php
        							if(isset($_SESSION['cart'])){
        								$count = count($_SESSION['cart']);
        								echo"<h6>Price ($count items)</h6>";
        							}
        							else{
        								echo"<h6>Price (0 items)</h6>";
        							}
        						?>
        						<h6>Delivery Charges</h6>
        						<hr>
        						<h6>Amount Payable</h6>
        					</div>
        					<div class="col-md-6">
        						<h6>GHc<?php echo $total;?></h6>
        						<h6>GHc<?php echo $charges;?></h6>
        						<hr>
        						<?php $Payable=$charges+$total;?>
        						<h6>GHc<?php echo $Payable;?></h6>
        						<br>
        						
        						<button class="btn btn-danger" name="order" type="submit" formmethod="POST">Order</button>
        						
        					</div>
        				</div>
					</form>
        			</div>
        		</div>
        	
        	</div>
        </div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</div>
</body>
</html>

<?php
}
?>