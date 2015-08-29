<html>


<body>
<form action="st_del.php" method="GET">

<table cellpadding="8" width="60%" bgcolor="00CC33" align="center"
cellspacing="5" >

<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>Delete Student Account</b></font></center><br>
</td>
</tr>
<tr>
<td>USN</td>
<td><input type="number" name="usn" id="usn" size="30"><br><br></td>

</tr>

<br><br><tr>

<td colspan="2"><input type="submit" name="sub" value="DELETE" /></td>
</tr>
</table>
</form>
</body>

<style>
	body {
	background-color: #686868;
	}
	table{border-radius: 20px ;}
	</style>
<?php
if(isset($_GET['sub']))
{
	
	$con = mysqli_connect("localhost","root","root","Exam");
	$usn=Null;
	
	$usn=$_GET['usn'];
	
	

	if($usn==Null)
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

$exist1="abc";
break;
}
}
if($exist1!="abc")
{
	echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> Enter the valid USN</div>";
}
else{










		$result=mysqli_query($con,"DELETE FROM student WHERE usn='$usn'");
		if($result)
		{
		echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> Deleted Successfully</div>";
	echo '<a href="admin_menu1.html"><p style="text-align:center">Click here to go to main page</a>';								
		}
		else
		echo "Not deleted";

		mysqli_close($con); 

	}}
}



?>
</html>

















	
