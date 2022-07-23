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


        if(isset($_POST['add'])){
            if(isset($_SESSION['cart'])){
                $item_array_id = array_column($_SESSION['cart'], 'pid');

                if(in_array($_POST['pid'], $item_array_id)){
                    echo '<script>alert("Item already added to cart")</script>';
                    echo '<script>window.location="Session.php"</script>';
                }
                else{
                    $count = count($_SESSION['cart']);
                    $item_array = array(
                        'pid' => $_POST['pid']
                    );
                    $_SESSION['cart'][$count]=$item_array;
                }

            }
            else{
                $item_array = array(
                    'pid' => $_POST['pid']
                );
                $_SESSION['cart'][0]=$item_array;

            }
        }
        
?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
            <title>Cho-land</title>
            <link href="sessionstyle.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous"/>
            <link href="icon.png" rel="shortcut icon">
    </head>
    <body>
        <div class="navbar">
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
                <a href=# class="linkref">Help</a>
                <a href="Session.php" class="linkref">Menu</a>
        </div>
        <div class="wd">
            <div class="ubg">
                <br><br>
                <img src="avatar.jpg" class="circle valign profile-image">
            </div>
            <div class="wd1">
                <h3>Welcome <?php echo $fname;?></h3>
                <h5>We're all about making your eating easier!</h5>
                <h5 class="he1">Happy feasting!</h5>
            </div>
            <div class="sidelink">
                <div class="link1">
                    <a href="Session.php" class="mylink">Order Food</a>
                </div>
                <div class="link1">
                    <a href=orders.php class="mylink">Track Order</a>
                </div>
            </div>
        </div>
        <section>
            <div class="smallhead">
                <p>Menu</p>
            </div>
        <div class="items">
            <?php
                $query = "SELECT * FROM menu WHERE not mdeleted;";
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                    component($row["foodname"], $row["mprice"],$row["image"], $row["foodid"]);
                }
            ?>
        </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
<?php
}
?>