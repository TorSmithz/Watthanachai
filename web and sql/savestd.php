<?php
 $servername="localhost";
 $user="root";
 $passwd="12345678";
 $dbname="dbstudent";
 $conn=mysqli_connect($servername,$user,$passwd,$dbname);

$std_id=$_POST["std_id"];
$std_name=$_POST["std_name"];
$std_address=$_POST["std_address"];
$std_gender=$_POST["std_gender"];
$std_birth=$_POST["std_birth"];
$std_salary=$_POST["std_salary"];
$major_id=$_POST["major_id"];
$sqlcheck="select * from tblstudent where std_id='$std_id' ";
$resultcheck=mysqli_query($conn,$sqlcheck)or die("SQLCHECK ผิด");
$count=mysqli_num_rows($resultcheck);
if($count>0)
{
	echo "<script>";
	echo "alert('รหัสประจำตัวซ้ำกรุณากรอกใหม่');";
	echo "location.href='javascript:history.go(-1)'; ";
	echo "</script>";
}
else
	{
$sqladd="insert into tblstudent(std_id,std_name,std_address,std_gender,std_birth,std_salary,major_id) values('$std_id','$std_name','$std_address','$std_gender','$std_birth','$std_salary','$major_id')";
mysqli_query($conn,$sqladd)or die("SQLADD ผิด");
echo "<script>";
echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
echo "location.href='showstudent.php'; ";
echo "</script>";
mysqli_close($conn);
	}
?>