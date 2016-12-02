<?php
$mysqli=new mysqli('127.0.0.1','candyTong','candyTong123.','lovewall');
if($mysqli->errno){
	die('Connect Error:'.$mysqli->error);
}else{
	$mysqli->set_charset('UTF8');
}