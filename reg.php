<html>
<body bgcolor="#FFFF99">
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
echo "<table border='1'>
<tr>
<th>NAME of the Subject</th>
<th>Subject ID</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['sub_name'] ."</td>";
  echo "<td>" . $row['sub_id'] ."</td>";
  echo "</tr>";
  }
echo "</table>";
?>
<body>
<form action="succ_reg.php" method="GET">
<input type="submit" name="reg" value="REGISTER FOR EXAM"/>
</body>
<div style="text-align:right">    
  <a href="examination.html">LOG OUT</a>
  <!-- more links here -->
</div>
</html>
