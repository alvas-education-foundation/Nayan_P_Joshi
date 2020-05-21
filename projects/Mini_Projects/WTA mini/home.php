<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="icon" href="images/logo.png" type="image/png">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<script>
		function validate()
		{
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var address = document.getElementById("email").value;
			if (reg.test(address) == false) 
				document.getElementById("msg2").innerHTML="<font color=`brown`>Invalid Email Address!</font>";
			else
				document.getElementById("msg2").innerHTML="<font color=`green`>Email Address is Valid!</font>";
		}
	</script>
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
	
	<div id="notify">
		<marquee scrollamount="10"	>****** Delivery available within selected cities only! ******</marquee>
	</div>

	<div id="signup_field">
        <center><h2>Welcome to <b>FoodCart</b></h2>
	    <p>&nbsp;&nbsp;Fill in the form to create an account!</p>	
		<form id="signupform" method="post" action="home.php">
			<b><p id="msg2">&nbsp;</p></b>
			<input type="text" id="username" name="username" placeholder="Username" required>
			<input type="text" id="email" name="email" placeholder="Email" onblur="validate();" required>
			<input type="text" id="address" name="address" placeholder="Address"  required>
			<input type="password" id="password" name="password" placeholder="Password" required>
			<input type="password" id="repassword" name="repassword" placeholder="Confirm Password" minlength="3" required><br><br>
			<button type="submit" id="signup_btn" name="signup_btn" >Sign Up</button><br>
		</form>
    </div>

    <?php include('assets/footer.php'); ?>

<?php
	include("assets/config.php");
	if(isset($_POST['login_btn']))
	{
		$username=$_POST['luser'];
		$password=$_POST['lpass'];
		$query="select * from registration WHERE username='$username' AND password='$password';";
		$query_run=mysqli_query($conn,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			session_start();
			$_SESSION['username']=$username;
			echo '<script type="text/javascript"> alert("Logged in");</script>';			
			header('location:orders.php');
		}
		else
		{
			echo '<script type="text/javascript"> document.getElementById("msg1").innerHTML="<font color=`brown`>Invalid Credentials!</font>";</script>';
		}
	}
	if(isset($_POST['signup_btn']))
	{
		$user =$_POST['username'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$pass =$_POST['password'];
		$repass =$_POST['repassword'];
		if($pass==$repass)
		{
			$query="select * from registration WHERE username='$user';";
			$query_run=mysqli_query($conn,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				echo '<script type="text/javascript"> document.getElementById("msg2").innerHTML="<font color=`brown`>Username alresdy exists!</font>";</script>';
			}
			else
			{
				$query="insert into registration values('$user','$email','$address','$address','$pass','$repass');";
				$query_run=mysqli_query($conn,$query);
				if($query_run)
				{
					echo '<script type="text/javascript"> document.getElementById("msg2").innerHTML="<font color=`green`>Registration successful!</font>";</script>';
				}
				else
				{
					echo '<script type="text/javascript"> alert("Error!!!")</script>';
				}
			}
		}
		else
		{
			echo '<script type="text/javascript"> document.getElementById("msg2").innerHTML="<font color=`brown`>Password does\'t match!</font>";</script>';
		}
	}
?>
</body>
</html>