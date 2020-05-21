<html>
<head>
    <title>Orders</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <style>
        .menu1{float:left; margin-left:20px;width:120px;}
        .menu_btn1{
            background-color: rgb(85, 25, 73);
            color: rgb(209, 163, 12);
            padding-top:14px;
            padding-bottom:13px;
            font-size: 16px;
            border: none;
            outline:none;
            width: 120px;}
            .content1,.content2,.content3 {
    display: none;
    position: absolute;
    background-color: rgba(83, 33, 73, 0.938);
    width: 120px;}
.content1 button,.content2 button,.content3 button {
    color: rgb(209, 163, 12);
    padding: 12px 16px;
    text-decoration: none;
    display: block;}
    button{
    outline: none;
    border: none;
    width:100%;
    background-color: rgb(85, 25, 73);
}
button:hover {background-color: rgba(94, 23, 80, 0.938); color: rgb(245, 189, 7);}
.menu1:hover .content1 {display: block;}
.menu1:hover .menu_btn1 {background-color: rgba(88, 10, 73, 0.938);}
    </style>
</head>
<body>
    <!--<form method="post">
        <header>
            <?php //include('assets/homelogo.html'); ?>
            <input type="submit" id="cart_btn" name="cart_btn" value="Go to Cart">
            <input type="submit" id="logout_btn" name="logout_btn" value="Logout">
        </header>
    </form>-->
<form method="post">
    <header>
        <?php include('assets/homelogo.html'); ?>
        <div class="menu1">
            <button class="menu_btn1">Products</button>
            <div class="content1">
                <button name="veg">Vegetarian</button>
                <button name="nveg">Non Vegetarian</button>
                <button name="dsrt">Deserts</button>
                <button name="snak">Snacks</button>
                <button name="bvrg">Beverages</button>
                <button name="spcl">Special</button>
            </div>
        </div>
        <input type="submit" id="cart_btn" name="cart_btn" value="Go to Cart">
        <input type="submit" id="logout_btn" name="logout_btn" value="Logout">
    </header>
</form>
<?php
    include("assets/config.php");
    session_start();
    if (!isset($_SESSION['username'])){
        header('location:home.php');    }
    if(isset($_POST['logout_btn'])){
        unset($_SESSION['username']);
        header("location:home.php");    }
    if(isset($_POST['cart_btn'])){
        header("location:cart.php");    }
    
    $username=$_SESSION["username"];
    
if(isset($_POST['veg']))    
{
    $sql = "SELECT * FROM products WHERE ptype='veg' order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Vegetarian</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}
else if(isset($_POST['nveg']))    
{
    $sql = "SELECT * FROM products WHERE ptype='nveg' order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Non Veg</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}
else if(isset($_POST['snak']))    
{
    $sql = "SELECT * FROM products WHERE ptype='snak' order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Snacks</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}
else if(isset($_POST['dsrt']))    
{
    $sql = "SELECT * FROM products WHERE ptype='dsrt' order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Deserts</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}
else if(isset($_POST['bvrg']))    
{
    $sql = "SELECT * FROM products WHERE ptype='bvrg' order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Beverages</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}
else if(isset($_POST['spcl']))    
{
    $sql = "SELECT * FROM products WHERE ptype='spcl' order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Today's Special</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}   
else    
{
    $sql = "SELECT * FROM products order by pid asc;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {        
        echo "<center><br><br><h1>Food Menu</h1>";
        while($row = $result->fetch_assoc()) 
        {
?>          <form method='post' action="orders.php">
            <div id='item'>&emsp;<?php echo $row["pname"]; ?>
            <div style='float:right;'><?php echo $row["pprice"]; ?>₹&emsp;</div>
            <br><img id='food' <?php echo "src='images/foods/".$row["image"]."'" ?> height='130px' width='240px'><br><br>&nbsp;
            Quantity&nbsp;<input type='number' name='quantity' style='width:40px;border-radius:5px;' value='1' min='0' max='10'>
            <input type='hidden' name='hidden_id' value="<?php echo $row['pid']; ?>">
            <input type='hidden' name='hidden_name' value="<?php echo $row['pname']; ?>">
            <input type='hidden' name='hidden_price' value="<?php echo $row['pprice']; ?>">
            &emsp;&emsp;&nbsp;<button type='submit' id='addToCart' name='addToCart'>Add to Cart</button></div></form>
<?php    
        }
    }
}




    if(isset($_POST['addToCart']))
    {
        $id=$_POST['hidden_id'];
        $name=$_POST['hidden_name'];
        $qty=$_POST['quantity'];
        $price=$_POST['hidden_price'];
        $status='incart';

        
        //add to cart;

        $query="SELECT * FROM orders WHERE username='$username';";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            $row = mysqli_fetch_row($query_run);

           if($row[0]==1)
            { 
                $query="UPDATE orders SET item_count=2, item2='$id', quantity2='$qty' where username='$username';";
                $query_run=mysqli_query($conn,$query);
                echo "<div id='done' style='margin-left:30px;'>2 Items Added to cart!</div>";
                if(!$query_run)
                    echo "fail";
            }
            if($row[0]==2)
            {
                $query="UPDATE orders SET item_count=3, item3='$id', quantity3='$qty' where username='$username';";
                $query_run=mysqli_query($conn,$query);
                echo "<div id='done'style='margin-left:30px;'>3 Items Added to cart!</div>";
                if(!$query_run)
                    echo " fail";
            }
            if($row[0]==3)
            {
                $query="UPDATE orders SET item_count=4, item4='$id', quantity4='$qty' where username='$username';";
                $query_run=mysqli_query($conn,$query);
                echo "<div id='done'style='margin-left:30px;'>4 Items Added to cart!</div>";
                if(!$query_run)
                    echo " fail";
            }
            if($row[0]==4)
            {
                $query="UPDATE orders SET item_count=5, item5='$id', quantity5='$qty' where username='$username';";
                $query_run=mysqli_query($conn,$query);
                echo "<div id='done'style='margin-left:30px;'>5 Items Added to cart!</div>";
                if(!$query_run)
                    echo " fail";
            }
            if($row[0]>4)
            echo "<div id='done'>Maximum amount reached!!</div>";
        
        }
        else
        {
            $query="INSERT INTO orders(item_count,item1,quantity1,order_status,username) VALUES ('1','$id','$qty','$status','$username');";
            $query_run=mysqli_query($conn,$query);
            echo "<div id='done'style='margin-left:30px;'>1 Item Added to cart!</div>";
            if(!$query_run)
            echo " fail";
        }       

    }
    
?>
</body>
</html>




