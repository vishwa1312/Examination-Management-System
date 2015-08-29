<html>


<body>
<form action="res.php" method="GET"><br><br><br><br>

<table cellpadding="8" width="50%" bgcolor="00CC33" align="center"
cellspacing="5">

<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>Results</b></font></center>
</td>
</tr>
<tr>
<td>usn</td>
<td><input type="text" name="usn" id="usn" size="30"></td>

</tr>
<tr>

<td colspan="2"><input type="submit" name="sub" value="SUBMIT" /></td>
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
	 	echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'>Fill in the fields</div>";
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



		$result=mysqli_query($con,"SELECT * FROM student WHERE reg_status='not registered'");
		while($row=mysqli_fetch_array($result))
		{
			if($usn==$row['usn'])
			{
echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'>Student IS Not Registered for Exam</div>";
				$exist="abc";
				break;
			}
		}
		if($exist!="abc")
		{
		session_start();
		$_SESSION['usn']=$usn;
		header('Location:enter_marks.php');
		}}
	}
}
?>
</html>
