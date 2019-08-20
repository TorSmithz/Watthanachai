<?php
session_start();
?>

<html>
 <head>
  <title> ระบบข้อมูลนักศึกษา </title>
  <meta charset="UTF-8">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="container">
    <div class="row">
    <div class="col-sm-12">
        <img src="logo.jpg" class="img-responsive">
      </div>
    </div>
    <div class="row">
      <!-- เมนู -->
    <div class="col-sm-4">
      <?php
  include("menu.php");
  ?>
        </div>
        <!-- ข้อมูล -->
    <div class="col-sm-8">
      <br>
      ยินดีต้อนรับสู่ระบบจัดการข้อมูลนักศีกษา
      <br>
      <br>
      <br>
      <br>
 ข่าวประชาสัมพันธ์


        </div>
      </div>
    </div>



</body>
</html>
