<!DOCTYPE html>
<html>
<body>



<div id="container" style="width:1280px">


<div id="header" style="background-color:#6B5D5D;height:100px;border-radius: 10px ;">
<br><h1 style="margin-bottom:0;">&nbsp&nbsp&nbspStudent Information</h1>
<a href="examination.html" style="float: right;color:#AEC6CF;"><b><font size="2">LOG OUT</font></b></a>
<?php


$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$abc=$_SESSION['login'];

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$result = mysqli_query($con,"SELECT * FROM student
WHERE usn='$abc'");


while($row = mysqli_fetch_array($result))
  {
	echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#AEC6CF;text-align:right'><a><b>". $row['name'] ."&nbsp&nbsp| &nbsp&nbsp<b></a></div>";

  }	



?>

</div>


<div id="menu" style="background-color:#B2ABAB;height:550px;width:220px;float:left;border-radius: 10px ;">
<br><a>&nbsp&nbsp</a><a href="d.php"><b><font size="2">Change Password</font></b></a><br><br>
<a>&nbsp&nbsp</a><a href="st_registration.php"><b><font size="2">Register for Examination</font></b></a><br><br>
<a>&nbsp&nbsp</a><a href="st_timetable.php"><b><font size="2">View Time Table</font></b></a><br><br>
<a>&nbsp&nbsp</a><a href="st_results.php"><b><font size="2">View Results</font></b></a><br><br><br><br><br>
<?php


$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$abc=$_SESSION['login'];

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$result = mysqli_query($con,"SELECT * FROM student
WHERE usn='$abc'");


while($row = mysqli_fetch_array($result))
  {
$image=$row['image'];
	echo '
<p align="center">
	<img src="' . $image . '"width=150 height=200 alt="" />

</p>
';	

  }	



?>
</div>

<div id="content" style="background-color:#EEEEEE;height:550px;width:1060px;float:left;border-radius: 10px ;">
<?php


$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$abc=$_SESSION['login'];

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$result = mysqli_query($con,"SELECT * FROM student
WHERE usn='$abc'");


while($row = mysqli_fetch_array($result))
  {

	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspName of the Student   &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['name'] ."<b></a></div>";
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspUSN  &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['usn'] ."<b></a></div>";
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspSem &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['sem'] ."<b></a></div>";
$r=$row['sem'];
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspSex &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['sex'] ."<b></a></div>";
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspPhone Number &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['phone'] ."<b></a></div>";
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspE-mail ID &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['email'] ."<b></a></div>";
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspDepartment &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['did'] ."<b></a></div>";
$d=$row['did'];
	echo "<br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:left'>&nbsp&nbsp&nbsp&nbspRegistration-Status &nbsp&nbsp:&nbsp&nbsp<a><b>". $row['reg_status'] ."<b></a></div>";
	



  }	




session_start();
$_SESSION['sem']=$r;
$_SESSION['dep']=$d;
mysqli_close($con);

?>

</div>

	
</div>
 
</body>
<style>
h1 {color:#F0EAD6;}
body {background-color:#000000;}
 


</style>
</html>

