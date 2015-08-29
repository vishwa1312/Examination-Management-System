<html>
<body bgcolor="#FFFF99">
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

echo "<table border='1'>
<tr>
<th>NAME</th>
<th>USN</th>
<th>SEM</th>
<th>SEX</th>
<th>Phone</th>
<th>Email</th>
<th>DEPARTMENT</th>
<th>REG_STATUS</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] ."</td>";
  echo "<td>" . $row['usn'] ."</td>";
  echo "<td>" . $row['sem'] ."</td>";
	$r=$row['sem'];
  echo "<td>" . $row['sex'] ."</td>"; 
  echo "<td>" . $row['phone'] ."</td>";
  echo "<td>" . $row['email'] ."</td>";
  echo "<td>" . $row['did'] ."</td>";
	$d=$row['did'];
  echo "<td>" . $row['reg_status'] ."</td>";
  echo "</tr>";
  }	
echo "</table>";




session_start();
$_SESSION['sem']=$r;
$_SESSION['dep']=$d;
mysqli_close($con);

?>

<br><br><br><br>
<a href="d.php"><b><font size="6">Change Password</font></b></a><br><br>
<a href="reg.php"><b><font size="6">Register for Examination</font></b></a><br><br>
<a href="st_time.php"><b><font size="6">View Time Table</font></b></a><br><br>
<a href="student_res.php"><b><font size="6">View Results</font></b></a><br><br><br><br><br><br><br><br><br><br>

<div style="text-align:right">    
  <a href="examination.html">LOG OUT</a>
  <!-- more links here -->
</div>

</body>
</html>
