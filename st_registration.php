<!DOCTYPE html>
<html>
<body>



<div id="container" style="width:1280px">


<div id="header" style="background-color:#6B5D5D;height:100px;border-radius: 10px ;">
<br><h1 style="margin-bottom:0;">&nbsp&nbsp&nbspRegistration For Exam</h1>
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
<a>&nbsp&nbsp</a><a href="st_timetable.php"><b><font size="2">View Time Table</font></b></a><br><br>
<a>&nbsp&nbsp</a><a href="st_results.php"><b><font size="2">View Results</font></b></a><br><br>
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

<div id="content" style="background-color:#EEEEEE;height:550px;width:1060px;float:left;border-radius: 10px ;">
<br><br>
<?php


$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$sm=$_SESSION['sem'];
$usn=$_SESSION['login'];
$did=$_SESSION['dep'];

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$result = mysqli_query($con,"SELECT * FROM subject
WHERE sem='$sm' and dep='$did'");
echo "<table border='1' width='500' height='350' align='center' >


<th>NAME of the Subject&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
<th>Subject ID</th>
</tr>
<style>
table {background-color:#6495ED}
th {font-variant:small-caps;font-style:normal;color:#A40000;font-size:18px;}
table {font-style:normal;color:black;}</style>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>&nbsp&nbsp&nbsp&nbsp" . $row['sub_name'] ."</td>";
  echo "<td>&nbsp&nbsp&nbsp&nbsp" . $row['sub_id'] ."</td>";
  echo "</tr>";
  }
echo "</table>";
?>
<body><br><br>
<form action="st_registration.php" method="GET">
<center><input type="submit" name="reg" value="REGISTER FOR EXAM"/><center>
</body>
<?php
if(isset($_GET['reg']))
{
$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$usn=$_SESSION['login'];
if(mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
$result=mysqli_query($con,"Update student set reg_status='registered' where usn='$usn'");
if (!$result)
        {
                echo "Specified region is not affected by any disease OR does not exist<br>";
                echo '<a href="ModifyPop.html">Try Again</a>';
                die();
        }
echo "<br><br><div style ='font:21px/21px Arial,tahoma,sans-serif;color:#CC0000'> Successfully Registered for Exams</div>";

mysqli_close($con);
}
?> 


</div>

	
</div>
 
</body>








<style>
h1 {color:#F0EAD6;}
body {background-color:#000000;}
 


</style>
</html>

