<!DOCTYPE HTML >
<html>
 <head>
  <title> ค้นหาสาขาวิชา </title>
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
 $conn=mysqli_connect($servername,$user,$passwd,$dbname);
 ?>
<center><br><h4>แบบฟอร์มค้นหาสาขาวิชา</h4><hr>
 <form action="searchmajor.php" method="POST">
ชื่อหรือรหัสสาขา : <input type="text" name="data" required>
<input type="submit" value="ค้นหา">
 </form></center><hr>
 <?php
 if($_POST["data"]!="")
 {
 $data=$_POST["data"];
 echo "ผลการค้นหา : ".$data." ";
 //เขียน SQL ค้นหาข้อมูล
 $sqlsearch="SELECT * FROM tblmajor WHERE major_id like '%$data%' or major_name like '%$data%' ";
 //echo $sqlsearch;
 //รัน SQL
 $result=mysqli_query($conn,$sqlsearch) or die("SQL ผิด");
 //นับจำนวนข้อมูล
 $count=mysqli_num_rows($result);
 echo "ค้นพบ : ".$count." รายการ <br><br>";

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
	echo "</table>";
	mysqli_close($conn);
	}
 ?>
 </body>
</html>
