<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
    <form method="post">
        <header>
            <?php include('assets/homelogo.html'); ?>
            <input type="submit" id="back_btn" name="back_btn" value="Back">
            <input type="submit" id="clr_btn" name="clr_btn" value="Clear Cart">
            <input type="submit" id="order_btn" name="order_btn" value="Place Order">
            <input type="submit" id="logout_btn" name="logout_btn" value="Logout">
        </header>
    </form>
    <center><br><br><h1>Order Details</h1>
<?php
    include("assets/config.php");
    session_start();
    $username=$_SESSION["username"];
    if (!isset($_SESSION['username'])){
        header('location:home.php');    }
    if(isset($_POST['logout_btn'])){
        unset($_SESSION['username']);
        header("location:home.php");    }
    if(isset($_POST['back_btn'])){
        header("location:orders.php");    } 
    if(isset($_POST['clr_btn'])){
        $query="DELETE FROM orders where username='$username';";
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        echo "<div id='done' style='margin-left:50px;'>Cart Cleared!!</div>";     }
    if(isset($_POST['order_btn'])){
        $query="UPDATE orders SET order_status='ordered' where username='$username';";
        $query_run=mysqli_query($conn,$query);
        $query="SELECT * FROM orders where username='$username';";
        $result = $conn->query($query);
        if ($result->num_rows > 0)
            header('location:confirm.php');
        else
        {   echo "<script>alert('Select atleast one item!!');</script>";
            //header('location:order.php');
        }}
    
    $total1=0;$total2=0;$total3=0;$total4=0;$total5=0;

    echo "<table><tr><th>Item name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

    $query="SELECT p.pname,p.pprice,o.quantity1 from products p, orders o where o.item1=p.pid and o.username='$username';";
    $query_run=mysqli_query($conn,$query);
    $row = mysqli_fetch_row($query_run);
    if($row[2]!=0){ $total1=$row[1]*$row[2];
        echo "<tr><td>&emsp;".$row[0]."&emsp;</td><td>&emsp;".$row[1]."₹&emsp;</td><td>&emsp;".$row[2].
        "&emsp;</td><td>&emsp;".$total1."₹&emsp;</td></tr>";    }

    $query="SELECT p.pname,p.pprice,o.quantity2 from products p, orders o where o.item2=p.pid and o.username='$username';";
    $query_run=mysqli_query($conn,$query);
    $row = mysqli_fetch_row($query_run);
    if($row[2]!=0){ $total2=$row[1]*$row[2];
        echo "<tr><td>&emsp;".$row[0]."&emsp;</td><td>&emsp;".$row[1]."₹&emsp;</td><td>&emsp;".$row[2].
        "&emsp;</td><td>&emsp;".$total2."₹&emsp;</td></tr>";    }

    $query="SELECT p.pname,p.pprice,o.quantity3 from products p, orders o where o.item3=p.pid and o.username='$username';";
    $query_run=mysqli_query($conn,$query);
    $row = mysqli_fetch_row($query_run);
    if($row[2]!=0){ $total3=$row[1]*$row[2];
        echo "<tr><td>&emsp;".$row[0]."&emsp;</td><td>&emsp;".$row[1]."₹&emsp;</td><td>&emsp;".$row[2].
        "&emsp;</td><td>&emsp;".$total3."₹&emsp;</td></tr>";    }

    $query="SELECT p.pname,p.pprice,o.quantity4 from products p, orders o where o.item4=p.pid and o.username='$username';";
    $query_run=mysqli_query($conn,$query);
    $row = mysqli_fetch_row($query_run);
    if($row[2]!=0){ $total4=$row[1]*$row[2];
        echo "<tr><td>&emsp;".$row[0]."&emsp;</td><td>&emsp;".$row[1]."₹&emsp;</td><td>&emsp;".$row[2].
        "&emsp;</td><td>&emsp;".$total4."₹&emsp;</td></tr>";    }

    $query="SELECT p.pname,p.pprice,o.quantity5 from products p, orders o where o.item5=p.pid and o.username='$username';";
    $query_run=mysqli_query($conn,$query);
    $row = mysqli_fetch_row($query_run);
    if($row[2]!=0){ $total5=$row[1]*$row[2];
        echo "<tr><td>&emsp;".$row[0]."&emsp;</td><td>&emsp;".$row[1]."₹&emsp;</td><td>&emsp;".$row[2].
        "&emsp;</td><td>&emsp;".$total5."₹&emsp;</td></tr>";    }
        
    $total=$total1+$total2+$total3+$total4+$total5;
    if($total==0)
        echo "<tr><th colspan='4'>&emsp;No items selected!!</th></tr>";    
    else
        echo "<tr><th colspan='3'>&emsp;Payable Amount&emsp;</th><th>&emsp;".$total."₹&emsp;</th></tr>";
    echo "</table>";

    $query="UPDATE orders SET total_price='$total' where username='$username';";
    $query_run=mysqli_query($conn,$query);
         
    echo "<br><br><br><div id='delivery'><form method='post' action='cart.php'>Update delivery address<br><br>
    <input type='text' name='daddress' placeholder='*optional' required><br><br>
    <button type='submit' id='daddress' name='updatead'>Update</button></form></div>";

    if(isset($_POST['updatead']))
    {
        $daddress=$_POST['daddress'];
        $query="UPDATE registration SET daddress='$daddress' where username='$username';";
        $query_run=mysqli_query($conn,$query);
        echo "<div id='done'>Delivery Address Updated!</div>";
        if(!$query_run)
            echo "fail";
    }
?>
</body>
</html>




