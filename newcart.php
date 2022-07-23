<div class="items">
                <div class="shop">
                <div class="card shadow">
                    <span class="item-name">
                        <?php
                            $query1 = "SELECT * FROM menu WHERE not mdeleted AND foodid=1;";
                            $result1 = mysqli_query($conn, $query1);
                            while($row1 = mysqli_fetch_array($result1)){
                                echo $row1["foodname"];
                        ?>
                    </span>
                    <div>
                        <img src="Menu/<?php echo $row1["image"];?>" class="cheese">
                    </div>
                    <div class="sdetails">
                        <span class="price">GHc<?php echo $row1["mprice"];?></span>
                        <span ><button type="submit" class="butn">Add to cart <i class="fas fa-shopping-cart"></i></button></span>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                </div>
                <div class="shop">
                <div class="card shadow">
                    <span class="item-name">
                        <?php
                            $query2 = "SELECT * FROM menu WHERE not mdeleted AND foodid=2;";
                            $result2 = mysqli_query($conn, $query2);
                            while($row2 = mysqli_fetch_array($result2)){
                                echo $row2["foodname"];
                        ?>
                    </span>
                    <div>
                        <img src="Menu/<?php echo $row2["image"];?>" class="cheese">
                    </div>
                    <div class="sdetails">
                        <span class="price">GHc<?php echo $row2["mprice"];?></span>
                        <span><button type="submit" class="butn">Add to cart <i class="fas fa-shopping-cart"></i></button></span>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                </div>
                <div class="shop">
                <div class="card shadow">
                    <span class="item-name">
                        <?php
                            $query3 = "SELECT * FROM menu WHERE not mdeleted AND foodid=3;";
                            $result3 = mysqli_query($conn, $query3);
                            while($row3 = mysqli_fetch_array($result3)){
                                echo $row3["foodname"];
                        ?>
                    </span>
                    <div>
                        <img src="Menu/<?php echo $row3["image"];?>" class="cheese">
                    </div>
                    <div class="sdetails">
                        <span class="price">GHc<?php echo $row3["mprice"];?></span>
                        <span><button type="submit" class="butn">Add to cart <i class="fas fa-shopping-cart"></i></button></span>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                </div>
                <div class="shop">
                <div class="card shadow">
                    <span class="item-name">
                        <?php
                            $query4 = "SELECT * FROM menu WHERE not mdeleted AND foodid=4;";
                            $result4 = mysqli_query($conn, $query4);
                            while($row4 = mysqli_fetch_array($result4)){
                                echo $row4["foodname"];
                        ?>
                    </span>
                    <div>
                        <img src="Menu/<?php echo $row4["image"];?>" class="cheese">
                    </div>
                    <div class="sdetails">
                        <span class="price">GHc<?php echo $row4["mprice"];?></span>
                        <span><button type="submit" class="butn">Add to cart <i class="fas fa-shopping-cart"></i></button></span>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                </div>
               
</div>


<?php
    session_start();
    $servername = "resthost";
    $server_user = "root";
    $server_pass = "";
    $dbname = "restaurant";
    $fname = $_SESSION['customername'];
    $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

    

if(isset($_POST['submit'])){
            if(isset($_SESSION['shoppingcart'])){
                $array_item_id = array_column($_SESSION['shoppingcart'], 'item_id');
                if(!in_array($_GET['foodid'], $array_item_id))
                {
                    $count = count($_SESSION['shoppingcart']);
                    $itemarray = array(
                    'item_id' => $_GET['foodid'], 
                    'item_name' => $_POST['hidden_item_name'],
                    'item_price' => $_POST['hidden_item_price'],
                    'item_qty' => $_POST['qty']
                    );
                    $_SESSION['shoppingcart'][$count]=$itemarray;
                }
                else
                {
                    echo '<script>alert("Item already added to cart")</script>';
                    echo '<script>window.location="addtocart.php"</script>';
                }
            }
            else{
                $itemarray = array(
                    'item_id' => $_GET['foodid'], 
                    'item_name' => $_POST['hidden_item_name'],
                    'item_price' => $_POST['hidden_item_price'],
                    'item_qty' => $_POST['qty']
                );
                $_SESSION['shoppingcart'][0]=$itemarray;
            }
    }

if(isset($_GET['action'])){
    if($_GET['action']=="delete"){
        foreach ($_SESSION['shoppingcart'] as $keys => $values) {
            if($values['item_id']==$_GET['foodid']){
                unset($_SESSION['shoppingcart'][$keys]);
                echo "<script>alert("Item removed")</script>";
                echo "<script>window.location="addtocart.php"</script>";
            }
        }
    }
}

?>

<h3>Order details</h3>
<table>
    <tr>
        <th width="40%">Item name</th>
        <th width="20%">Price</th>
        <th width ="10%">Quantity</th>
        <th width ="15%">Total</th>
        <th width ="5%">Action</th>
    </tr>
    <?php
        if(!empty($_SESSION['shoppingcart'])){
            $total=0;
            foreach ($_SESSION['shoppingcart'] as $keys => $values) {
    ?>
    <tr>
        <td><?php echo $values['item_name'];?></td>
        <td>$<?php echo $values['item_price'];?></td>
        <td><form method="post" action="Session.php?action=add&id=<?php echo $row["foodid"]?>"><input type="text" name="qty" value="1"></input></form></td>
        <td><?php echo number_format($values['item_qty'] * $values['item_price'], 2);?></td>
        <td><a href="addtocart.php?action=delete&id=<?php echo $values['item_id'];?>"><span>Remove</span></a></td>
    </tr>
    <?php
                $total=$total + ($values['item_qty'] * $values['item_price']);
            }
    ?>
    <tr>
        <td>Total</td>
        <td>$<?php echo number_format($total, 2);?></td>

    </tr>
    <?php
        }
    ?>
</table>

if(isset($_POST['badd'])){
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $value['qty'] = $_POST['qty'];
                                            $qty = $value['qty'] + 1;
                                            if($qty<0||$qty==0){
                                                $qty = 1;
                                            }
                                        }
                
                                    }

                                    if(isset($_POST['bsub'])){
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                            $value['qty'] = $_POST['qty'];
                                            $qty = $value['qty'] - 1;
                                            if($qty<0||$qty==0){
                                                $qty = 1;
                                            }
                                        }
            
                                    }


if(isset($_POST['order'])){
            if($_GET['action']=='order'){
                
            //  $orderarray = array(
            //      'food_id' => $_POST['pid'],
            //      'quantity' => $_POST['qty'],
            //      'dprice' => $_POST['pprice'],
            //      'image' => $_POST['pimage']
            //  );

            //foreach ($orderarray as $key => $value) {
            //      $k[] = $key;
            //      $v[] = "'".$value."'";

            //      $k = implode(",", $k);
            //      $v = implode(",", $v);
                    
            //      $query1 = "INSERT INTO order_details($k) VALUES ($v);";
            //      $result1 = mysqli_query($conn, $query1);
            //      $success = 1;
                    
            //}

            //  if($success==1){
            //          echo "<script>alert('Order successful')</script>";
            //          echo "<script>window.open('orderdetails.php','_blank')</script>";
            //      }
            
                $count =count($_POST['pid']);

                for($i=0;$i<$count;$i++){
                    $food_id = $_POST['pid'][$i];
                    $quantity = $_POST['qty'][$i];
                    $dprice = $_POST['pprice'][$i];
                    $image = $_POST['pimage'][$i];

                    $sql = "INSERT INTO order_details (food_id, quantity, dprice, image) VALUES ('$food_id','$quantity','dprice','$image');";
                    $result = mysqli_query($conn,$sql);
                    if ($result === FALSE) {
                           die("Query failed!".mysqli_error().$sql);
                    }

                }
                echo "<script>alert('Order successful')</script>";
            }
            
        }
         