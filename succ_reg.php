<html>
<body bgcolor="#FFFF99">
<?php
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
echo "<br><br><div style ='font:55px/21px Arial,tahoma,sans-serif;color:#000000'> Successfully Registered for Exams</div>";

mysqli_close($con);
?> 
<body>
<br><br><br><br>
<a href="details.php" target="_blank">click here to check registration status</a><br>
</body>
</html>
