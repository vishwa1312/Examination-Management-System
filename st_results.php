<!DOCTYPE html>
<html>
<body>



<div id="container" style="width:1280px">


<div id="header" style="background-color:#6B5D5D;height:100px;border-radius: 10px ;">
<br><h1 style="margin-bottom:0;">&nbsp&nbsp&nbspStudent Results</h1>
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
<a>&nbsp&nbsp</a><a href="details2.php"><b><font size="2">Home Page</font></b></a><br><br><br><br><br>
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

<div id="content" style="background-color:#EEEEEE;height:550px;width:1060px;float:left;border-radius: 10px ;"><br><br>
<?php


$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$sm=$_SESSION['sem'];
$usn=$_SESSION['login'];
$did=$_SESSION['dep'];
if (mysqli_connect_errno()) 
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!$con)
{
  	die('Could not connect: ' . mysql_error());
}
$result = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result))
{
	$sub1=$row['sub1'];
}
$result1 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result1))
{
	$sub2=$row['sub2'];
}
$result3 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result3))
{
	$sub3=$row['sub3'];
}
$result4 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result4))
{
	$sub4=$row['sub4'];
}
$result5 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result5))
{
	$sub5=$row['sub5'];
}
$result6 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result6))
{
	$sub6=$row['sub6'];
}
$result7 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result7))
{
	$sub7=$row['sub7'];
}
$result8 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result8))
{
	$sub8=$row['sub8'];
}
$result9 = mysqli_query($con,"SELECT * FROM results
WHERE usn='$usn'");
while($row = mysqli_fetch_array($result9))
{
	$total=$row['total'];
}
$subjects=array();
$a=0;
$subjects[0]=$sub1;
$subjects[1]=$sub2;
$subjects[2]=$sub3;
$subjects[3]=$sub4;
$subjects[4]=$sub5;
$subjects[5]=$sub6;
$subjects[6]=$sub7;
$subjects[7]=$sub8;

$result10 = mysqli_query($con,"SELECT * FROM subject,student where subject.dep=student.did and subject.sem=student.sem and usn='$usn'");

echo "<table border='1' width='600' height='400' align='center'>
<tr>
<th>NAME of the Subject</th>
<th>Subject ID</th>
<th>Grades Obtained</th>
</tr>
<style>
table {background-color:#6495ED}
th {font-variant:small-caps;font-style:normal;color:#A40000;font-size:18px;}
table {font-style:normal;color:black;}</style>";

while($row = mysqli_fetch_array($result10))
  {

  echo "<tr>";
  echo "<td>&nbsp&nbsp" . $row['sub_name'] ."</td>";
  echo "<td>&nbsp&nbsp" . $row['sub_id'] ."</td>";
  echo "<td><center>" . $subjects[$a] ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</center></td>";
  echo "</tr>";
  $a=$a+1;
  }
echo "</table>";
echo "<br><center>SGPA=".$total."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</center>";


?>

<br><br><center><a href="download.php"><b><font size="4" color="red">Click Here To Download Grade Card</font></b></a></center>
</body>

</div>

	
</div>
 
</body>
<style>
h1 {color:#F0EAD6;}
body {background-color:#000000;}
 


</style>
</html>

