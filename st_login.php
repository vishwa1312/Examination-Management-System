<!doctype html>
<html lang="en-US">
<head>

	<meta charset="utf-8">

	<title>Student Login</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

	<div id="login">

		<h2><span class="fontawesome-lock"></span>Student Log In</h2>
		

		<form action="st_login.php" method="GET">

			<fieldset>

				<p><label for="email">USN of the Student</label></p>
				<p><input type="text" id="email" name='USN' value="" onBlur="if(this.value=='')this.value='mail@address.com'" onFocus="if(this.value=='mail@address.com')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

				<p><label for="password">Password</label></p>
				<p><input type="password" id="password" name='password' value="" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

				<p><input type="submit" name="sign" value="Sign In"></p>

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
	width: 100px;
}

#login fieldset input[type="submit"]:hover {
	background-color: #f95252;
}
</style>
<?php
if(isset($_GET['sign']))
{

$con = mysqli_connect("localhost","root","root","Exam");
$username=$_GET['USN'];
$password=$_GET['password'];


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$result = mysqli_query($con,"SELECT * FROM student WHERE usn='$username' and password='$password'");
$email=null;
while($row=mysqli_fetch_array($result))
{

$email=$row['usn'];
}
if(($email)==null)
{
echo '<a href="st_login.php"><p style="text-align:center">Invalid Username Or Password. Try Again</a>';
}
if(($email)!=null)
{
session_start();
$_SESSION['login']=$username;
$_SESSION['pass']=$password;
header('Location:details2.php');
}


}
?>
</html>
