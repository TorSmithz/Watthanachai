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
$sqlupdate="UPDATE tblstudent SET std_name='$std_name',std_address='$std_address',std_gender='$std_gender',std_birth='$std_birth'
,std_salary='$std_salary',major_id='$major_id' WHERE std_id='$std_id' ";
mysqli_query($conn,$sqlupdate) or die("sqlupdate ผิด");
echo "<script>";
echo "alert('แก้ไขข้อมูลเรียบร้อยแล้ว');";
echo "window.location.href='searchstd2.php';";
echo "</script>";
?>