<div class="list-group">
  <a href="index.php" class="list-group-item active">หน้าแรก</a>
  <?php
if(!isset($_SESSION["stdname"]))
  {
  ?>
  <a href="searchstd.php" class="list-group-item" target="_blank">ค้นหาข้อมูลนักศึกษา</a>
  <?php
  }
  ?>
  <a href="searchmajor.php" class="list-group-item" target="_blank">ค้นหาสาขาวิชา</a>
  <a href="showstudent.php" class="list-group-item" target="_blank">แสดงข้อมมูลนักศึกษา</a>
  <a href="showmajor.php" class="list-group-item" target="_blank">แสดงข้อมูลสาขา</a>
  <a href="searchstd2.php" class="list-group-item" target="_blank">แก้ไขข้อมูลนักศึกษา</a>
  <a href="searchstd4.php" class="list-group-item" target="_blank">ข้อมูลรายได้ของนักศึกษา</a>
  <a href="searchstd5.php" class="list-group-item" target="_blank">ข้อมูลวันเกิดของนักศึกษา</a>








</div>
