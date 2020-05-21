<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/admin.css">
    <style>
        body{
        background: url('images/i/a2.jpg');
        background-repeat: repeat;
        background-size: 100%;
        z-index: -1;}
    </style>
</head>
<body><form method="post">
    <header>
        <?php include('assets/homelogo.html'); ?>
        <div class="menu1">
            <button class="menu_btn1">Products</button>
            <div class="content1">
                <button name="pv">View</button>
                <button name="pa">Add</button>
                <button name="pd">Delete</button>
                <button name="pu">Update Price</button>
            </div>
        </div>
        <div class="menu2">
            <button class="menu_btn2">Users</button>
            <div class="content2">
                <button name="uv">View</button>
                <button name="uf">Feedback</button>
                <button name="uo">Orders</button>
            </div>
        </div>
        <!--<div class="menu3">
            <button class="menu_btn3">Orders</button>
            <div class="content3">
                <button name="ao">All Orders</button>
                
            </div>
        </div>-->
        <input type="submit" id="logout_btn" name="logout_btn" value="Logout">
    </header>
</form>



 <?php
    session_start();
    if (!isset($_SESSION['admin'])){
        header('location:adminlogin.php');
    }
    $username=$_SESSION["admin"];
    include("assets/config.php");
    if(isset($_POST['logout_btn'])){
        unset($_SESSION['admin']);
        header("location:adminlogin.php");   
    }

    if(isset($_POST['pv']))
    {
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<center><br><br><br><h1>Food Menu</h1><br><br><div id='tab' style='margin-left:80px;'><table><tr><th>Product ID  </th>
            <th>Product Name</th><th>Type</th><th>Price</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>&emsp;&nbsp;".$row["pid"]."</td><td>&nbsp;&nbsp;".$row["pname"]."&nbsp;&nbsp;</td><td>&emsp;"
                .$row["ptype"]."&emsp;</td><td>&emsp;".$row["pprice"]."₹&emsp;</td></tr>";
            }
            echo "</table><div><br><br>";
        }
        else {
            echo "<script>alert('No products found!');</script>";
        }
    }
    if(isset($_POST['pa']))
    {
        echo "<center><br><br><br><h1>Add Item</h1><br><br><div id='tab' style='margin-left:140px;'><form method='post'><table>
        <tr><td>Product ID</td><td><input type='text' name='ppid'></td></tr>
        <tr><td>Product Name</td><td><input type='text' name='ppname'></td></tr>
        <tr><td>Price</td><td><input type='text' name='ppprice'></td></tr>
        <tr><td>Type</td><td><input type='text' name='ptype'></td></tr>
        <tr><td>Product Image</td><td><input type='text' name='image' placeholder='*.jpg, *.jpeg, *.png,'></td></tr>
        <tr><td colspan='2'><button type='submit' style='color: rgb(209, 163, 12);' name='add'>Add Product</button></td></tr>
        </table></form></div>";
    }
    if(isset($_POST['pd']))
    {
        echo "<center><br><br><br><h1>Delete Item</h1><br><br><div id='tab' style='margin-left:140px;'><form method='post'><table>
        <tr><td>Product ID</td><td><input type='text' name='ppid'></td></tr>
        <tr><td colspan='2'><button type='submit' style='color: rgb(209, 163, 12);' name='delete'>Delete Product</button></td></tr>
        </table></form></div>";
    }
    if(isset($_POST['pu']))
    {
        echo "<center><br><br><br><h1>Update Price</h1><br><br><div id='tab' style='margin-left:140px;'><form method='post'><table>
        <tr><td>Product ID</td><td><input type='text' name='ppid'></td></tr>
        <tr><td>New Price</td><td><input type='text' name='ppprice'></td></tr>
        <tr><td colspan='2'><button type='submit' style='color: rgb(209, 163, 12);' name='update'>Update Price</button></td></tr>
        </table></form></div>";
    }


    
    if(isset($_POST['uv']))
    {
        $sql = "SELECT * FROM registration;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            echo "<center><br><br><br><h1>User Details</h1><br><br><div id='tab' style='margin-left:60px;'><table><tr><th>User Name</th><th>Address</th><th>Email Address</th></tr>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>&emsp;".$row["username"]."&emsp;</td><td>&emsp;".$row["address"]."&emsp;</td><td>&emsp;".$row["email"]."&emsp;</td></tr>";
            }
            echo "</table><div>";
        }
        else
        {
            echo "<script>alert('No users found!');</script>";
        }
    }
    if(isset($_POST['uf']))
    {
        $sql = "SELECT * FROM feedback;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            echo "<center><br><br><br><h1>User Feedbacks</h1><br><br><div id='tab' style='margin-left:100px;'>
            <table><tr><th>User Name</th><th>Ratings</th><th width='60%'>Feedback</th></tr>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>&emsp;".$row["username"]."&emsp;</td><td>&emsp;".$row["rate"]."&emsp;</td><td>&emsp;".$row["feed"]."&emsp;</td></tr>";
            }
            echo "</table><div>";
        }
        else
        {
            echo "<script>alert('No feedback found!');</script>";
        }
    }
    if(isset($_POST['uo']))
    {
        $sql = "SELECT o.username,r.address,o.total_price,o.dated,o.order_status,r.daddress from registration r, orders o where o.username=r.username;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            echo "<center><br><br><br><h1>User Orders</h1><br><br>
            <div id='tab'><table><tr><th>User Name</th><th>Address</th><th>Delivary Address</th><th>Total</th><th>Date</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>&emsp;".$row["username"]."&emsp;</td><td>&emsp;".$row["address"]."&emsp;</td><td>&emsp;".$row["daddress"]."&emsp;</td>
                <td>&emsp;".$row["total_price"]."₹&emsp;</td><td>&emsp;".$row["dated"]."&emsp;</td><td>&emsp;".$row["order_status"]."&emsp;</td></tr>";
            }
            echo "</table><div>";
        }
        else
        {
            echo "<script>alert('No orders found!');</script>";
        }
    }
    /*if(isset($_POST['ao']))
    {
        $sql = "SELECT o.username,o.total_price,o.order_status from registration r, orders o, products p where o.username=r.username";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            echo "<center><br><br><br><h1>User Orders</h1><br><br>
            <div id='tab'><table><tr><th>User Name</th><th>Total</th><th>Status</th></tr>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>&emsp;".$row["username"]."&emsp;</td><td>&emsp;".$row["address"]."&emsp;</td><td>&emsp;".$row["daddress"]."&emsp;</td>
                <td>&emsp;".$row["total_price"]."₹&emsp;</td><td>&emsp;".$row["dated"]."&emsp;</td><td>&emsp;".$row["order_status"]."&emsp;</td></tr>";
            }
            echo "</table><div>";
        }
        else
        {
            echo "<script>alert('No orders found!');</script>";
        }
    }*/



    if(isset($_POST['add']))
    {
        $id=$_POST['ppid'];
        $name=$_POST['ppname'];
        $price=$_POST['ppprice'];
        $type=$_POST['ptype'];
        $image=$_POST['image'];
        $query="select * from products WHERE pid='$id';";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            echo '<script>alert("Duplicate Product ID!")</script>';
        }
        else
        {
            $query="insert into products values('$id','$name','$price','$type','$image');";
            $query_run = $conn->query($query);
            if($query_run)
            {
                echo '<script type="text/javascript"> alert("Item added")</script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Error!!!")</script>';
            }
        }
    }
    if(isset($_POST['delete']))
    {
        $id=$_POST['ppid'];
        $query="select * from products WHERE pid='$id';";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            $query="delete from products where pid='$id';";
            $query_run = $conn->query($query);
            if($query_run)
            {
                echo '<script type="text/javascript"> alert("Item Deleted!")</script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Error!")</script>';
            }
        }
        else
        {
            echo '<script type="text/javascript"> alert("Item not Found!")</script>';
        }
    }
    if(isset($_POST['update']))
    {
        $id=$_POST['ppid'];
        $price=$_POST['ppprice'];
        $query="select * from products WHERE pid='$id';";
        $query_run=mysqli_query($conn,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            $query="update products set pprice=$price WHERE pid=$id;";
            $query_run = $conn->query($query);
            if($query_run)
            {
                echo '<script type="text/javascript"> alert("Price Updated!")</script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Error!")</script>';
            }
        }
        else
        {
            echo '<script type="text/javascript"> alert("Item not Found!")</script>';
        }
    }
    
?>
</body>
</html>