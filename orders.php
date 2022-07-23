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
  <link href="style.min1.css" type="text/css" rel="stylesheet" media="screen,projection">
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

#left-sidebar-nav{position:fixed;width:100px;left:180px;z-index:999;height:100%}

#left-sidebar-nav span.badge.new{margin-top:0px}

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

 <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
      <!-- START LEFT SIDEBAR NAV-->
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
            </div>
            </li>
            <li class="bold"><a href="Session.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Order Food</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan active"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
                                <li class="<?php
                                if(!isset($_GET['status'])){
                                        echo 'active';
                                    }?>
                                    "><a href="orders.php">Track Orders</a>
                                </li>
                                <?php
                                    $sql = mysqli_query($conn, "SELECT DISTINCT ostatus FROM orders  WHERE customer_id = $cphone;");
                                    while($row = mysqli_fetch_array($sql)){
                                    if(isset($_GET['status'])){
                                        $status = $row['ostatus'];
                                    }
                                    echo '<li class='.(isset($_GET['status'])?($status == $_GET['status'] ? 'active' : ''): '').'><a href="orders.php?status='.$row['ostatus'].'">'.$row['ostatus'].'</a>
                                    </li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>                    
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <!-- END LEFT SIDEBAR NAV-->

      
      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Order History</h5>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          <p class="caption">List of your orders with details</p>
          <div class="divider"></div>
          <!--editableTable-->
<div id="work-collections" class="seaction">
             
                    <?php
                    if(isset($_GET['status'])){
                        $status = $_GET['status'];
                    }
                    else{
                        $status = '%';
                    }
                    $sql = mysqli_query($conn, "SELECT * FROM orders WHERE customer_id = $cphone AND ostatus LIKE '$status';");
                    echo '              <div class="row">
                <div>
                    <h4 class="header">List</h4>
                    <ul id="issues-collection" class="collection">';
                    while($row = mysqli_fetch_array($sql))
                    {
                        $status = $row['ostatus'];
                        echo '<li class="collection-item avatar">
                              <i class="mdi-content-content-paste red circle"></i>
                              <span class="collection-header">Order No. '.$row['orderno'].'</span>
                              <p><strong>Date:</strong> '.$row['odate'].'</p>
                              <p><strong>Payment Type:</strong> '.$row['payment'].'</p>
                              <p><strong>Address: </strong>'.$row['address'].'</p>                            
                              <p><strong>Status:</strong> '.($status=='Paused' ? 'Paused <a  data-position="bottom" data-delay="50" data-tooltip="Please contact administrator for further details." class="btn-floating waves-effect waves-light tooltipped cyan">    ?</a>' : $status).'</p>                            
                              <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                              </li>';
                        $order_id = $row['orderno'];
                        $sql1 = mysqli_query($conn, "SELECT * FROM order_details WHERE order_no = $order_id;");
                        while($row1 = mysqli_fetch_array($sql1))
                        {
                            $item_id = $row1['food_id'];
                            $sql2 = mysqli_query($conn, "SELECT * FROM menu WHERE foodid = $item_id;");
                            while($row2 = mysqli_fetch_array($sql2)){
                                $item_name = $row2['foodname'];
                            }
                            echo '<li class="collection-item">
                            <div class="row">
                            <div class="col s7">
                            <p class="collections-title"><strong>#'.$row1['food_id'].'</strong> '.$item_name.'</p>
                            </div>
                            <div class="col s2">
                            <span>'.$row1['quantity'].' Pieces</span>
                            </div>
                            <div class="col s3">
                            <span>GHc. '.$row1['dprice'].'</span>
                            </div>
                            </div>
                            </li>';
                            $id = $row1['order_no'];
                        }
                                echo'<li class="collection-item">
                                        <div class="row">
                                            <div class="col s7">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s2">
                                            <span> </span>
                                            </div>
                                            <div class="col s3">
                                                <span><strong>GHc. '.$row['total'].'</strong></span>
                                            </div>';
                                if(!preg_match('/^Cancelled/', $status)){
                                    if($status != 'Delivered'){
                                echo '<form action="cancel-order.php" method="post">
                                        <input type="hidden" value="'.$id.'" name="id">
                                        <input type="hidden" value="Cancelled by Customer" name="status">   
                                        <input type="hidden" value="'.$row['payment'].'" name="payment_type">                                          
                                        <button class="btn waves-effect waves-light right submit" type="submit" name="action">Cancel Order
                                              <i class="mdi-content-clear right"></i> 
                                        </button>
                                        </form>';
                                }
                                }
                                echo'</div></li>';

                    }
                    ?>
                     </ul>
                </div>
              </div>
            </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
</div>
</div>


    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <!--angularjs-->
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>       
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
   
</body>

</html>    

<?php
}
?>