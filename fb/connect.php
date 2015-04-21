<?php
$server = "localhost";
$username = "societypageup";
$password = "1q2w3e1q2w3e";
$database = "societycoin";

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server");
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database");
?>