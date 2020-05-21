<html>
    <head>
        <title>AboutUs</title>
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
    <div id="info">
        <br>This is a project developed a mini project for the Web Technology and it's application lab.
        <center><h3>Developed by</h3></center>
        * NAGASHREE D SHETTY&emsp;&emsp;&emsp;* NAYAN P JOSHI&emsp;&emsp;&emsp;* MOHAMED AFNAN AMAN<br>
        &nbsp;&nbsp;&nbsp;Dept. of CSE&nbsp;&emsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dept. of CSE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dept. of CSE<br>
        &nbsp;&nbsp;&nbsp;AIET Mijar&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;AIET Mijar&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;AIET Mijar<br>
    </div>
    <?php include('assets/footer.php'); ?>
</body>
</html>