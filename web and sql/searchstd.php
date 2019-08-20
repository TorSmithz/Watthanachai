<!DOCTYPE HTML >
<!-- การค้นหาจากรหัสนักศึกษา -->
<html>
 <head>
  <title> ค้นหาข้อมูลนักศึกษา </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 <?php
 /*SELECT * FROM tblstudent WHERE std_gender='ชาย' AND std_address='นครราชสีมา' //และ
SELECT * FROM tblstudent WHERE std_gender='ชาย' OR std_address='นครราชสีมา'  //หรือ
SELECT * FROM tblstudent WHERE std_name like 'ส%' // หาคนชื่อขึ้นต้นด้วย ส
SELECT * FROM tblstudent WHERE std_name like '%ก' // หาคนชื่อลงท้ายด้วย ก
SELECT * FROM tblstudent WHERE std_name like '%ก%' // หาคนชื่อคนที่มี ก
SELECT * FROM tblstudent WHERE std_salary BETWEEN '20000' AND '30000' //หาคนที่เงินเดือน 20000 ถึง 30000
SELECT * FROM tblstudent WHERE std_birth BETWEEN '1998-01-01' AND '1998-12-31' //หาคนที่เกิด 1-1-98 ถึง 31-12-98*/
include("function.php");
 $servername="localhost";
 $user="root";
 $passwd="12345678";
 $dbname="dbstudent";
 $conn=mysqli_connect($servername,$user,$passwd,$dbname);
 ?>
<center><br><h4>แบบฟอร์มค้นหาข้อมูลนักศึกษา</h4><hr>
 <form action="searchstd.php" method="POST">
 รหัสนักศึกษา : <input type="text" name="data" required>
<input type="submit" value="ค้นหา">
 </form></center><hr>
 <?php
 $data=$_POST["data"];
 echo "ผลการค้นหา : ".$data." ";
 //เขียน SQL ค้นหาข้อมูล
 $sqlsearch="SELECT * FROM tblstudent WHERE std_id='$data' ";
 //echo $sqlsearch;
 //รัน SQL
 $result=mysqli_query($conn,$sqlsearch) or die("SQL ผิด");
 //นับจำนวนข้อมูล
 $count=mysqli_num_rows($result);
 echo "ค้นพบ : ".$count." รายการ <br><br>";

echo "<table class='table table-striped'>";
echo "<tr>";
echo "<th>รหัสนักศึกษา</th>";
echo "<th>ชื่อ-นามสกุลนักศึกษา</th>";
echo "<th>ที่อยู่</th>";
echo "<th>เพศ</th>";
echo "<th>วันเกิด</th>";
echo "<th>รายได้ (บาท)</th>";
echo "</tr>";
while($row=mysqli_fetch_assoc($result))
	{
	echo "<tr>";
	echo "<td>".$row["std_id"]."</td>";
	echo "<td>".$row["std_name"]."</td>";
	echo "<td>".$row["std_address"]."</td>";
	echo "<td>".$row["std_gender"]."</td>";
	echo "<td>";
	echo thdate($row["std_birth"]);
	echo "</td>";
	echo "<td>".number_format($row["std_salary"],2)."</td>";
	echo "</tr>";
	}
	echo "</table>";
 ?>
 </body>
</html>
