<?php
if(isset($_POST['download']))
{
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
	$fp=fopen("samp.txt","w+") or die("could not open file");
	fwrite($fp, "-------------------------------------------------------\n");
	fwrite($fp, "GRADE CARD	\n");
	fwrite($fp, "-------------------------------------------------------\n");
	fwrite($fp, "USN:".$usn."\n");
	fwrite($fp, "-------------------------------------------------------\n");
	fwrite($fp, "Subject Name\t\tSubject ID\t\tGrade\n\n");
	$a=0;	
$result11 = mysqli_query($con,"SELECT * FROM subject,student where subject.dep=student.did and subject.sem=student.sem and usn='$usn'");
	while($row = mysqli_fetch_array($result11))
	{
	fwrite($fp,$row['sub_name']."\t\t".$row['sub_id']."\t\t\t".$subjects[$a]."\n");
	$a=$a+1;
	}	
	fwrite($fp, "-------------------------------------------------------\n");
	fwrite($fp, "SGPA=".$total."\n");
	fwrite($fp, "-------------------------------------------------------\n");
	fclose($fp);

	$file="samp.txt";
	header('Content-Type: text/plain');

	header('Content-Disposition:attachment; filename="'.$file.'"'); 

	readfile($file); 
	
	exit();

}
?>
<html>
<body bgcolor="#6B5D5D">
<form action="download.php" method="post" align="center"><br><br><br><br><br><br><br><br><br><br><br><br>
<div style="text-align:center"><b><input type="submit" value="DOWNLOAD  GRADE  CARD" name="download" style="height:100px; width:400px;"/></b></div> 
</body>
</html>
