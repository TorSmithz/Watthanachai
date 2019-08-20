<?php
$servername="localhost";
 $user="root";
 $passwd="12345678";
 $dbname="dbstudent";
 $conn=mysqli_connect($servername,$user,$passwd,$dbname);

$std_id=$_GET["std_id"];
$sqldel="DELETE FROM tblstudent WHERE std_id='$std_id' ";
mysqli_query($conn,$sqldel) or die("sqldel ผิด");
echo "<script>";
echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
echo "window.location.href='searchstd2.php';";
echo "</script>";

?>