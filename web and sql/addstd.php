<!DOCTYPE HTML>
<html>
 <head>
  <title> addstd.php </title>
  <meta charset="UTF-8">
 </head>
 <body>
 <?php
 $servername="localhost";
 $user="root";
 $passwd="12345678";
 $dbname="dbstudent";
 $conn=mysqli_connect($servername,$user,$passwd,$dbname);
 ?>
แบบฟอร์มบันทึกข้อมูลนักศึกษา<hr>
 <form action="savestd.php" method="POST">
 <table>
 <tr>
	<th>รหัสนักศึกษา</th>
	<td>
	<input type="text" name="std_id" required maxlength="10"> 
	</td>
</tr>
<tr>
	<th>ชื่อ-สกุล</th>
		<td>
		<input type="text" name="std_name" required> 
		</td>
</tr>
<tr>
	<th>ที่อยู่</th>
		<td>
		<input type="text" name="std_address" required> 
		</td>
</tr>
<tr>
	<th>เพศ</th>
		<td>
		<input type="radio" name="std_gender" value="ชาย" checked>ชาย
		<input type="radio" name="std_gender" value="หญิง">หญิง
		</td>
</tr>
<tr>
	<th>วันเกิด</th>
		<td>
		<input type="date" name="std_birth" required>
		</td>
</tr>
<tr>
	<th>รายได้</th>
		<td>
		<input type="text" name="std_salary" required>
		</td>
</tr>
<tr>
	<th>สาขา</th>
		<td>
		<select name="major_id" required>
		<?php
		$sqlmajor="select * from tblmajor";
		$resultmajor=mysqli_query($conn,$sqlmajor)or die("SQL ผิด");
		while($data=mysqli_fetch_assoc($resultmajor))
		{
			echo "<option value='$data[major_id]'>$data[major_name]</option>";
		}
		?>
		</select>
		</td>
</tr>
<tr>
	<th></th>
		<td>
		<input type="submit" value="บันทึก">
		</td>
</tr>
 </table>
 </form>
 </body>
</html>
