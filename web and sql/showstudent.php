<!DOCTYPE HTML>
<html>
 <head>
  <title> แสดงข้อมูลนักศึกษา </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>

<?php
include("function.php");
$servername="localhost";
$user="root";
$passwd="12345678";
$dbname="dbstudent";
//เชื่อมต่อ MySQL
$conn=mysqli_connect($servername,$user,$passwd,$dbname);

//เขียน SQL จัดการข้อมูล
$sqlmajor="select*from tblmajor";
$result=mysqli_query($conn,$sqlmajor) or die("SQL ผิด");
$count=mysqli_num_rows($result);//นับจำนวนข้อมูล
//echo $count;
//แปลงข้อมูลเป็น Array
/*echo " <center> <h3> แสดงข้อมูลสาขา </h3> </center> <hr> ";
echo "ข้อมูลทั้งหมด ".$count." สาขา";
echo "<br>";
echo "<br>";
echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th>รหัสสาขา</th>";
echo "<th>ชื่อสาขา</th>";
echo "</tr>";
while($row=mysqli_fetch_assoc($result))
	{
	echo "<tr>";
	echo "<td>".$row["major_id"]."</td>";
	echo "<td>".$row["major_name"]."</td>";
	echo "</tr>";
	}
	echo "</table>";*/

	$sqlstudent="SELECT * FROM tblstudent INNER JOIN tblmajor ON tblstudent.major_id = tblmajor.major_id";
$result2=mysqli_query($conn,$sqlstudent) or die("SQL ผิด");
$count2=mysqli_num_rows($result2);//นับจำนวนข้อมูล

echo " <center> <h3> แสดงข้อมูลนักศึกษา </h3> </center> <hr> ";
echo "ข้อมูลทั้งหมด ".$count2." คน";
echo "<br>";
echo "<br>";
echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th>รหัสนักศึกษา</th>";
echo "<th>ชื่อ-นามสกุลนักศึกษา</th>";
echo "<th>ที่อยู่</th>";
echo "<th>เพศ</th>";
echo "<th>วันเกิด</th>";
echo "<th>รายได้ (บาท)</th>";
echo "<th>สาขา</th>";
echo "</tr>";
while($row2=mysqli_fetch_assoc($result2))
	{
	echo "<tr>";
	echo "<td>".$row2["std_id"]."</td>";
	echo "<td>".$row2["std_name"]."</td>";
	echo "<td>".$row2["std_address"]."</td>";
	echo "<td>".$row2["std_gender"]."</td>";
	echo "<td>";
	echo thdate($row2["std_birth"]);
	echo "</td>";
	echo "<td>".number_format($row2["std_salary"],2)."</td>";
	echo "<td>".$row2["major_name"]."</td>";
	echo "</tr>";
	}
	echo "</table>";

//ปิดการเชื่อมต่อ
mysqli_close($conn);
?>

 </body>
</html>
