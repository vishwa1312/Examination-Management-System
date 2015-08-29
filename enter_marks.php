<html>
<style>
	body {
	background-color: #686868;
	}
	table{border-radius: 20px ;}
</style>


<body>
<form action="enter_marks.php" method="GET"><br><br>

<table cellpadding="8" width="80%" bgcolor="00CC33" align="center"
cellspacing="5">
<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>Enter Grades</b></font></center>
</td>
</tr>
<?php

$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$usn=$_SESSION['usn'];
if (mysqli_connect_errno()) 
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!$con)
{
  	die('Could not connect: ' . mysql_error());
}
$result = mysqli_query($con,"SELECT sub_id FROM subject,student where student.did=subject.dep and student.sem=subject.sem and usn='$usn'");
	$sub1=Null;
	$sub2=Null;
	$sub3=Null;
	$sub4=Null;
	$sub5=Null;
	$sub6=Null;
	$sub7=Null;
	$sub8=Null;
	$total=Null;
$marks=array();
$a=0;
while($row=mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['sub_id']."</td>";
	echo '<td><input type="text" name='.$row['sub_id'].' id="email" size="30"></td>';
	echo "</tr>";
	$marks[$a]=$_GET[$row['sub_id']];
	$a=$a+1;
}	
	echo "<tr>";
	echo "<td>SGPA</td>";
	echo '<td><input type="text" name="total" id="reg_status" size="30"></td>';
	echo "</tr>";
if(isset($_GET['sub']))
{


		if (mysqli_connect_errno()) 
		{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	if (!$con)
  		{
  		die('Could not connect: ' . mysql_error());
  		}
$result1 = mysqli_query($con,"SELECT * FROM results");

while($row=mysqli_fetch_array($result1))
{

if($usn==$row['usn'])
{
echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'>Grades for this USN has been alredy entered</div>";
$exist="abc";
break;
}
}
		




	if($exist!="abc")
{





























	$sub1=$marks[0];
	$sub2=$marks[1];
	$sub3=$marks[2];
	$sub4=$marks[3];
	$sub5=$marks[4];
	$sub6=$marks[5];
	$sub7=$marks[6];
	$sub8=$marks[7];
	$total=$_GET['total'];

	if(($sub1==Null)||($sub2==Null)||($sub3==Null)||($sub4==Null)||($sub5==Null)||($sub6==Null)||($sub7==Null)||($sub8==Null)||($total==Null))
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
	$result=mysqli_query($con,"INSERT INTO results (usn, sub1, sub2, sub3, sub4, sub5, sub6, sub7, sub8, total)
	VALUES ('$usn', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$sub6', '$sub7', '$sub8', '$total')");
		if($result)
		{
echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> Successfully Entered</div>";
									
		}
		else
		echo "Failed to enter marks";
	}




















}


}
?>


<tr>

<td colspan="2"><input type="submit" name="sub" value="DONE" /></td>
</tr>
</form>
</html>
