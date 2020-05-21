<html>
<head>
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <style>
        a{  text-decoration:none;   }
        a:hover{    text-decoration:underline;  }
    </style>
</head>
<body>
    <form method="post">
        <header>
            <?php include('assets/homelogo.html'); ?>
            <input type="submit" id="logout_btn" name="logout_btn" value="Logout">
        </header>
    </form>
    <div id="con">
        <font style="color:rgb(245, 189, 7); font-size:40pt; font-weight:bolder;">Order Placed</font><br>
        <font style="color:rgb(205, 189, 7); font-size:20pt; font-weight:bolder; ">Thankyou for using our service</font><br><br>
        <a href="feedback.php"><font style="color:rgb(145, 219, 220); font-size:16pt; ">Rate us</font></a>
    </div>
<?php
    include("assets/config.php");
    session_start();
    $username=$_SESSION["username"];
    if (!isset($_SESSION['username'])){
        header('location:home.php');    }
    if(isset($_POST['logout_btn'])){
        unset($_SESSION['username']);
        header("location:home.php");    }
    
   
           
?>
</body>
</html>




