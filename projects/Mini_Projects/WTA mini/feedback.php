<html>
    <head>
        <title>Feedback</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    </head>
<body>
	<header>
		<?php include('assets/homelogo.html'); ?>
		<div id="login_field">
			<b><p id="msg1">&nbsp;</p></b>
			<form  method="post" action="home.php">
				<input type="text" id="user" name="luser"  placeholder="Username" required>
				<input type="password" id="pass" name="lpass" placeholder="Password" required>
				<button type="submit" id="login_btn" name="login_btn">Log In</button>
			</form>
		</div>
    </header>
    <div id="feed">
		<form method="post" action="feedback.php">
			<center><h2>Feedback</h2>
			<b><p id="msg2">&nbsp;</p></b>
<?php
	session_start();
    if (isset($_SESSION['username'])){
		$username=$_SESSION["username"];
		echo '<input type="text" id="uname" name="uname" value="'.$username.'" placeholder="Username" required><br><br>';
	}
	else 
		echo'<input type="text" id="uname" name="uname" placeholder="Username" required><br><br>';
?>
			<textarea rows="6" cols="32" name="feed" placeholder="Enter your Opinions" required></textarea><br><br>
			Rate us&emsp; 
			1<input type="radio" name="rate" value="1" required>
			2<input type="radio" name="rate" value="2" required>
			3<input type="radio" name="rate" value="3" required>
			4<input type="radio" name="rate" value="4" required>
			5<input type="radio" name="rate" value="5" required>&emsp;<br><br>
			<button type="submit" name="feed_btn" id="feedback_btn">Submit</button> 
		</form>
	</div>
	<?php 
	include("assets/config.php");
	include('assets/footer.php');		

	if(isset($_POST['feed_btn']))
	{
		unset($_SESSION['username']);
		$username=$_POST['uname'];
		$feedback=$_POST['feed'];
		$rate=$_POST['rate'];
		$query="select * from registration WHERE username='$username';";
		$query_run=mysqli_query($conn,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			$query="insert into feedback(username,rate,feed) values('$username','$rate','$feedback');";
			$query_run=mysqli_query($conn,$query);
			if($query_run)
			{
				echo '<script type="text/javascript"> document.getElementById("msg2").innerHTML="<font color=`green`>Feedback Submitted!</font>";</script>';
			}
			else
			{
				echo '<script type="text/javascript"> alert("Error!!!")</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript"> document.getElementById("msg2").innerHTML="<font color=`brown`>Invalid Username!</font>";</script>';
		}
	}
	?>
</body>
</html>
