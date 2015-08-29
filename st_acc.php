<html>


<body><br>
<form action="st_acc.php" method="GET">

<table cellpadding="8" width="80%" bgcolor="00CC33" align="center"
cellspacing="5">

<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>Create Student Account</b></font></center>
</td>
</tr>

<tr>
<td>Name</td>
<td><input type=text name="name" id="name" size="30"></td>
</tr>

<tr>
<td>USN</td>
<td><input type="text" name="usn" id="usn"
size="30"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="email" id="email" size="30"></td>
</tr>
<tr>
<td>Sem</td>
<td><input type="number" name="sem" id="sem" size="30"></td>

</tr>


<tr>
<td>Sex</td>
<td><input type="radio" name="sex" value="m" size="10">Male
<input type="radio" name="sex" value="f" size="10">Female</td>
</tr>

<tr>
<td>Department</td>
<td><select name="department">
<option value="" selected>select..</option>
<option value="ECE">ECE</option>
<option value="CSE">CSE</option>
<option value="ISE">ISE</option>
<option value="EEE">EEE</option>
<option value="MECH">MECH</option>
</select></td>
</tr>
<tr>
<td>MobileNo</td>
<td><input type="text" name="phone" id="mobileno" size="30"></td>
</tr>
<tr>
<td>Student Image</td>
<td><input type=text name="image" id="name" size="30"></td>
</tr>

<tr>
<td>Password</td>
<td><input type="text" name="password" id="password" size="30"></td>

</tr>
<tr>
<td>Registration Status</td>
<td><input type="text" name="reg_status" id="reg_status" size="30"></td>

</tr>

<tr>

<td colspan="2"><input type="submit" name="sub" value="Submit Form" /></td>
</tr>
</table>
</form>
</body>

<style>
	body {
	background-color: #686868;}
	table{border-radius: 20px ;}
	</style>
<?php
if(isset($_GET['sub']))
{
	
	$con = mysqli_connect("localhost","root","root","Exam");
	$name=Null;
	$usn=Null;
	$email=Null;
	$sem=Null;
	$dep=Null;
	$sex=Null;
	$phone=Null;
	$password=Null;
	$reg=Null;
	$image=Null;
	$name=$_GET['name'];
	$usn=$_GET['usn'];
	$email=$_GET['email'];
	$sem=$_GET['sem'];
	$dep=$_GET['department'];
	$sex=$_GET['sex'];
	$phone=$_GET['phone'];
	$image=$_GET['image'];
	$password=$_GET['password'];
	$reg=$_GET['reg_status'];


	if(($name==Null)||($usn==Null)||($email==Null)||($sem==Null)||($dep==Null)||($sex==Null)||($phone==Null)||($password==Null)||($reg==Null)||($image==Null))
	{  
	 	echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'>Fill in all the fields</div>";
	}
	else
	{	
		if (mysqli_connect_errno()) 
		{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	if (!$con)
  		{
  		die('Could not connect: ' . mysql_error());
  		}

$result1 = mysqli_query($con,"SELECT * FROM student");

while($row=mysqli_fetch_array($result1))
{

if($usn==$row['usn'])
{
echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> USN Already Exists. Enter Corrcet USN</div>";
$exist="abc";
break;
}
}
		




	if($exist!="abc")
	{

		$result=mysqli_query($con,"INSERT INTO student (name, usn, email, sex, did, phone, password, reg_status, sem, image)
		VALUES ('$name', '$usn', '$email', '$sex', '$dep', '$phone', '$password', '$reg', '$sem', '$image')");
		if($result)
		{
echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> Student account created successfully</div>";
									
		}
		else
		echo "Account not created";
	}
} 
	
}














?>

</html>
