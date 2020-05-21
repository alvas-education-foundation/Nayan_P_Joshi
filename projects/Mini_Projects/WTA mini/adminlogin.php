<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="icon" href="images/logo.png" type="image/png">
    <title>FoodCart</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>
<body>
	<header>
		<?php include('assets/homelogo.html'); ?>
		<div id="login_field">
			<b><p id="msg1">&nbsp;</p></b>
			<form id="loginform" method="post" action="home.php">
				<input type="text" id="user" name="luser"  placeholder="Username" required>
				<input type="password" id="pass" name="lpass" placeholder="Password" required>
				<button type="submit" id="login_btn" name="login_btn">Log In</button>
			</form>
		</div>
	</header>

	<div id="signup_field">
        <center><h2><b>Admin Login</b></h2>
		<form id="signupform" method="post" action="adminlogin.php">
			<b><p id="msg2">&nbsp;</p></b>
			<input type="text" id="username" name="username" placeholder="Username" required>
			<input type="password" id="password" name="password" placeholder="Password" required><br><br>
			<button type="submit" id="signup_btn" name="alogin_btn" >Log In</button><br>
		</form>
    </div>


<?php
	include("assets/config.php");
	if(isset($_POST['alogin_btn']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from admin WHERE adminid='$username' AND apassword='$password';";
		$query_run=mysqli_query($conn,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			session_start();
			$_SESSION['admin']=$username;
            echo '<script type="text/javascript"> alert("Logged in");</script>';
            header("location:adminhome.php");
		}
		else
		{
			echo '<script type="text/javascript"> document.getElementById("msg2").innerHTML="<font color=`brown`>Invalid Credentials!</font>";</script>';
		}
	}
	
?>
</body>
</html>