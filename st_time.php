<html>
<body bgcolor="#6B5D5D">
<br><br><br>
<?php


$con = mysqli_connect("localhost","root","root","Exam");
session_start();
$sm=$_SESSION['sem'];
$did=$_SESSION['dep'];


if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$result = mysqli_query($con,"SELECT * FROM routine
WHERE sem='$sm' and dep_id='$did'");
while($row = mysqli_fetch_array($result))
{

$image=$row['image'];
}
echo '<center><img src=' . $image .'></center>';
?>
<div style="text-align:right">    
  <a href="examination.html">LOG OUT</a>
  <!-- more links here -->
</div>
</html>
