<html>
<body bgcolor="#FFFF99">
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
echo "<table border='1'>
<tr>
<th>NAME of the Subject</th>
<th>Subject ID</th>
<th>Grades Obtained</th>
</tr>";

while($row = mysqli_fetch_array($result10))
  {

  echo "<tr>";
  echo "<td>" . $row['sub_name'] ."</td>";
  echo "<td>" . $row['sub_id'] ."</td>";
  echo "<td>" . $subjects[$a] ."</td>";
  echo "</tr>";
  $a=$a+1;
  }
echo "</table>";
echo "SGPA=".$total."";


?>
<br><br><a href="download.php"><b><font size="4">Click Here To Download Grade Card</font></b></a>
</body>
<div style="text-align:right">    
  <a href="examination.html">LOG OUT</a>
  <!-- more links here -->
</div>
</html>












