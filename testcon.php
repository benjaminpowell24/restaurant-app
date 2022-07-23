<?php
    $conn = mysqli_connect('resthost','root','','restaurant');
        

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];

        $lname = $_POST['lname'];

        $cpassword = $_POST['cpassword'];

        $cphoneno = $_POST['cphoneno'];

        $email = $_POST['email'];

        $mysql = "SELECT * FROM customer WHERE cphoneno = $cphoneno;";
        
        $myresult= mysqli_query($conn,$mysql);
        $rowcheck= mysqli_num_rows($myresult);
        
        if($rowcheck>0){
            header("location: ../Registration.html?UserTaken");
        }
        
        $hashedpswd = password_hash($cpassword, PASSWORD_DEFAULT);

        $query = "INSERT INTO customer(fname,lname,email,cphoneno,cpassword,hashpswd) VALUES ('$fname','$lname','$email','$cphoneno','$cpassword','$hashedpswd');";

        $results = mysqli_query($conn, $query);
        if($row = mysqli_fetch_assoc($results)){
            session_start();
            $_SESSION['userid'] = session_id();
            $_SESSION['customername'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['phoneno'] = $row['cphoneno'];
            header("location: ../Session.php");
        }
    }
    else{
        header("location: ../Registration.html?Unsuccessful");
    }
?>