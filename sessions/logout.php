<?php
require("menu.php");

$Name = 'logger';
$val = 1;
$host = 'localhost';
$time = 3600;
$expTime = time()-$time;
$Name = 'usrId';
$val = 15;
setcookie( $Name, $val, $expTime, "/", $host, false, false );

$_SESSION['usrId'] = 0;
unset($_SESSION['usrName']);
$logOut = array(
	'Czas' => date("Y-m-d H:i:s"),
	'Dzialanie' => "Wylogowanie uzytkownika",
	'url' => "logout.php",
);
array_push($_SESSION['journal'], $logOut);
header("Location: demo.php");
?>