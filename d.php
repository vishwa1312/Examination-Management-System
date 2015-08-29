<!doctype html>
<html lang="en-US">
<head>

	<meta charset="utf-8">

	<title>Student Change Password</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

	<div id="login">

		<h2><span class="fontawesome-lock"></span>Change Password</h2>
		

		<form action="d.php" method="GET">

			<fieldset>
				<p><label for="email">Current Passowrd</label></p>
				<p><input type="password" id="password" name='cur_pass' value="" onBlur="if(this.value=='')this.value='mail@address.com'" onFocus="if(this.value=='mail@address.com')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

				<p><label for="email">New Passowrd</label></p>
				<p><input type="password" id="password" name='new_pass' value="" onBlur="if(this.value=='')this.value='mail@address.com'" onFocus="if(this.value=='mail@address.com')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

				<p><label for="password">Confirm Password</label></p>
				<p><input type="password" id="password" name='con_pass' value="" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

				<p><input type="submit" name="sign" value="Change Password"></p>

			</fieldset>

		</form>

	</div> <!-- end login -->

</body>	
<style>
	body {
	background-color: #686868;
	color: #000;
	font-family: "Varela Round", Arial, Helvetica, sans-serif;
	font-size: 16px;
	line-height: 1.5em;
}

input {
	border: none;
	font-family: inherit;
	font-size: inherit;
	font-weight: inherit;
	line-height: inherit;
	-webkit-appearance: none;
}

/* ---------- LOGIN ---------- */

#login {
	margin: 50px auto;
	width: 400px;
}

#login h2 {
	background-color: #28ad63;
	-webkit-border-radius: 20px 20px 0 0;
	-moz-border-radius: 20px 20px 0 0;
	border-radius: 20px 20px 0 0;
	color: black;
	font-size: 28px;
	padding: 20px 26px;
}

#login h2 span[class*="fontawesome-"] {
	margin-right: 14px;
}

#login fieldset {
	background-color: black;
	-webkit-border-radius: 0 0 20px 20px;
	-moz-border-radius: 0 0 20px 20px;
	border-radius: 0 0 20px 20px;
	padding: 20px 26px;
}

#login fieldset p {
	color: #777;
	margin-bottom: 14px;
}

#login fieldset p:last-child {
	margin-bottom: 0;
}

#login fieldset input {
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

#login fieldset input[type="email"], #login fieldset input[type="password"] {
	background-color: #eee;
	color: #777;
	padding: 4px 10px;
	width: 328px;
}

#login fieldset input[type="submit"] {
	background-color: #33cc77;
	color: #fff;
	display: block;
	margin: 0 auto;
	padding: 4px 0;
	width: 200px;
}

#login fieldset input[type="submit"]:hover {
	background-color: #f95252;
}
</style>

<?php

if(isset($_GET['sign']))
{
	$con = mysqli_connect("localhost","root","root","Exam");
	$new_pass=$_GET['new_pass'];
	$con_pass=$_GET['con_pass'];
	$cur_pass=$_GET['cur_pass'];
	session_start();
	$usn=$_SESSION['login'];
	$pass=$_SESSION['pass'];
if(($pass)==($cur_pass))
{
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	if(($new_pass) == ($con_pass))
	{

		if(mysqli_connect_errno())
		{
		        echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$result=mysqli_query($con,"Update student set password='$new_pass' where usn='$usn'");
		if (!$result)
		{
		        echo "Specified region is not affected by any disease OR does not exist<br>";
		        echo '<a href="ModifyPop.html">Try Again</a>';
		        die();
		}
echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#000000;text-align:center'>  Password Changed Successfully</div>";
	}

	else
	{echo '<a href="d.php"><p style="text-align:center">Passswords Doesnot match Re-enter password</a>';
	echo '<a href="details2.php"><p style="text-align:center">Click here to go to main page</a>';}
}
else
	{echo '<a href="d.php"><p style="text-align:center">Current Password is wrong Re-enter password</a>';
	echo '<a href="details2.php"><p style="text-align:center">Click here to go to main page</a>';}
}
?>

</html>
