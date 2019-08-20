<?php
function hello(){
	echo "Hello"."<br>";
}
function helloname($name){
	echo "สวัสดี ".$name."<br>";
}
function helloname2($name,$surname){
	echo "สวัสดี ".$name." ".$surname."<br>";
}
function helloname3($name="ไม่ระบุ"){
	echo "สวัสดี ".$name."<br>";
}
function sum($x,$y,$z){
	$total=$x+$y+$z;
	return $total;
}
function avg($a,$b,$c,$e,$f){
	$total=($a+$b+$c+$e+$f)/5;
	return $total;
}
function price($p){
	$pv=$p*1.07;
	return $pv;
}
function thdate($d){
	$month=array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม",
		              "04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน",
		              "07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน",
		              "10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
   $year=substr($d,0,4)+543;
   $m=substr($d,5,2);
   $day=substr($d,8,2);
   echo $day." ".$month[$m]." พ.ศ.".$year."<br>";
}

?>