<html>


<body>

<form action="reg_det.php" method="GET"><br><br>

<table cellpadding="8" width="80%" bgcolor="00CC33" align="center"
cellspacing="5">

<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>View Registration Details</b></font></center>
</td>
</tr>
<tr>
<td>Sem</td>
<td><input type="number" name="sem" id="sem" size="30"></td>

</tr>
<tr>
<td>Department</td>
<td><select name="department">
<option value="" selected>select..</option>
<option value="ECE">ECE</option>
<option value="CSE">CSE</option>
<option value="ISE">ISE</option>
<option value="EEE">EEE</option>
<option value="MECH">MECH</option>
</select></td>
</tr>
<tr>
<td>Reg Status</td>
<td><input type="radio" name="reg" value="registered" size="10">Registered
<input type="radio" name="reg" value="not registered" size="10">Not Registered</td>
</tr>
<tr>

<td colspan="2"><input type="submit" name="sub" value="View Details" /></td>
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
	$sem=Null;
	$dep=Null;
	$reg=Null;
     	$sem=$_GET['sem'];
	$dep=$_GET['department'];
	$reg=$_GET['reg'];
	if(($sem==Null)||($dep==Null)||($reg==Null))
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

		$result = mysqli_query($con,"SELECT * FROM student WHERE sem='$sem' and did='$dep' and reg_status='$reg'");
		echo "<table border='2' align='center' bgcolor='00CC33'>
		
		<tr>
		<th> <font color='990000'>Student Name</font> </th>
		<th><font color='990000'>USN</font></th>
		</tr>";
		while($row = mysqli_fetch_array($result))
	        {
	
	          echo "<tr>";
		  echo "<td>" . $row['name'] ."</td>";
		  echo "<td>" . $row['usn'] ."</td>";
		  echo "</tr>";
		}
		echo "</table>";
}
}
?>
</html>
















