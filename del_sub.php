<html>


<body>
<form action="del_sub.php" method="GET">

<table cellpadding="8" width="60%" bgcolor="00CC33" align="center"
cellspacing="5" >

<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>Delete Subject</b></font></center><br>
</td>
</tr>
<tr>
<td>Subject Code</td>
<td><input type="text" name="sub_id" id="sub_code" size="30"><br><br></td>

</tr>

<br><br><tr>

<td colspan="2"><input type="submit" name="sub" value="DELETE Subject" /></td>
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
	$id=Null;
	
	$id=$_GET['sub_id'];
	
	

	if($id==Null)
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
  		$result1 = mysqli_query($con,"SELECT * FROM subject");

while($row=mysqli_fetch_array($result1))
{

if($id==$row['sub_id'])
{

$exist1="abc";
break;
}
}
if($exist1!="abc")
{
	echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> Entered Subject Code doesn't Exist</div>";
}
else{










		$result=mysqli_query($con,"DELETE FROM subject WHERE sub_id='$id'");
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

















	
