<html>


<body>
<form action="delete_rout.php" method="GET"><br><br><br>

<table cellpadding="8" width="80%" bgcolor="00CC33" align="center"
cellspacing="5">

<tr>
<td colspan=2>
<center><font size=8><font color="990000"><b>Delete Time Table</b></font></center>
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

<td colspan="2"><input type="submit" name="sub" value="DELETE" /></td>
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
	$sem=$_GET['sem'];
	$dep=$_GET['department'];
	

	if(($sem==Null)||($dep==Null))
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
		$result=mysqli_query($con,"DELETE FROM routine WHERE sem='$sem' and dep_id='$dep'");
		if($result)
		{
		echo "<div style ='font:21px/21px Arial,tahoma,sans-serif;color:#990000;text-align:center'> Deleted Successfully</div>";
	echo '<a href="admin_menu1.html"><p style="text-align:center">Click here to go to main page</a>';								
		}
		else
		echo "Not deleted";

		mysqli_close($con); 

	}
}



?>
</html>

















	
