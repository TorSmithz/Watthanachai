<!DOCTYPE HTML>
<html>
 <head>
  <title> editstd.php </title>
  <meta charset="UTF-8">
 </head>

 <body>
 <?php
  $servername="localhost";
 $user="root";
 $passwd="12345678";
 $dbname="dbstudent";
 $conn=mysqli_connect($servername,$user,$passwd,$dbname);
 $std_id=$_GET["std_id"];
 $sqlstd="SELECT * FROM tblstudent WHERE std_id='$std_id' ";
 $result=mysqli_query($conn,$sqlstd) or die("sql ผิด");
 $row=mysqli_fetch_array ($result);
 $std_id=$row["std_id"];
 $std_name=$row["std_name"];
 $std_address=$row["std_address"];
 $std_gender=$row["std_gender"];
 $std_birth=$row["std_birth"];
$std_salary=$row["std_salary"];
$major_id=$row["major_id"];
 ?>
 แบบฟอร์มแก้ไขข้อมูลนักศึกษา<hr>
 <form action="updatestd.php" method="POST">
 <table>
 <tr>
	<th>รหัสนักศึกษา</th>
	<td>
	<input type="text" name="std_id" required maxlength="10" value="<?php echo $std_id; ?>" readonly> 
	</td>
</tr>
<tr>
	<th>ชื่อ-สกุล</th>
		<td>
		<input type="text" name="std_name" required value="<?php echo $std_name; ?>"> 
		</td>
</tr>
<tr>
	<th>ที่อยู่</th>
		<td>
		<input type="text" name="std_address" required value="<?php echo $std_address; ?>"> 
		</td>
</tr>
<tr>
	<th>เพศ</th>
		<td>
		<input type="radio" name="std_gender" value="ชาย" <?php if($std_gender=="ชาย") echo "checked"; ?>>ชาย
		<input type="radio" name="std_gender" value="หญิง" <?php if($std_gender=="หญิง") echo "checked"; ?>>หญิง
		</td>
</tr>
<tr>
	<th>วันเกิด</th>
		<td>
		<input type="date" name="std_birth" required value="<?php echo $std_birth; ?>">
		</td>
</tr>
<tr>
	<th>รายได้</th>
		<td>
		<input type="text" name="std_salary" required value="<?php echo $std_salary; ?>">
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
			if($major_id==$data[major_id])
			{
			echo "<option value='$data[major_id]'
			selected>$data[major_name]</option>";
		}
		else
		{
		echo "<option value='$data[major_id]'>$data[major_name]</option>";
		}
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
