<?php
    session_start();
    $servername = "resthost";
    $server_user = "root";
    $server_pass = "";
    $dbname = "restaurant";
    $fname = $_SESSION['customername'];
    $conn = mysqli_connect($servername, $server_user, $server_pass, $dbname);

    if($_SESSION['userid']==session_id()){
?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
            <title>Cho-land</title>
            <link href="menu.css" rel="stylesheet">
            <link href="" rel="shortcut icon">
    </head>
    <body>
        <div class="navbar">
                <a href=# class="linkref">Contact</a>
                <div class="dropdown">
                    <button class="dropdownbtn">Account</button>
                    <div class="dropdownlinks">
                        <a href="logout.php">Logout</a>
                        <a href="#">History</a>
                    </div>
                </div>
                <a href=# class="linkref">Help</a>
                <a href="menu.php" class="linkref">Menu</a>
        </div>
        <div class="container">
          <p class="caption">Order your food here.</p>
          <div class="divider"></div>
        <form class="formValidate" id="formValidate" method="post" action="place-order.php" novalidate="novalidate">
            <div class="row">
              <div class="col s12 m4 l3">
                <h4 class="header">Order Menu</h4>
              </div>
              <div>
                  <table id="data-table-customer" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Item Price/Piece</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>

                    <tbody>
                <?php
                    $query = "SELECT * FROM menu WHERE not mdeleted;";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '<tr><td>'.$row["foodname"].'</td><td>'.$row["mprice"].'</td>';                      
                        echo '<td><div class="input-field col s12"><label for='.$row["foodid"].' class="">Quantity</label>';
                        echo '<input id="'.$row["foodid"].'" name="'.$row['foodid'].'" type="text" data-error=".errorTxt'.$row["foodid"].'"><div class="errorTxt'.$row["foodid"].'"></div></td></tr>';
                    }
                ?>
                    </tbody>
</table>
              </div>
                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Order<i class="mdi-content-send right"></i>
                    </button>
            </div>
        </form>
            <div class="divider"></div>
    </body>
</html>
<?php
}
?>