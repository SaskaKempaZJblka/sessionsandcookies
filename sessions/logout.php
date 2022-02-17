<?php
include("menu.php");
$logOut = array(
	'logOut' => date("Y-m-d H:i:s"),
	'Dzialanie' => "Wylogowanie uzytkownika",
	'url' => "logout.php",
);
array_push($_SESSION['journal'], $logOut);

// session_destroy();
$_SESSION['usrId'] = 0;
unset($_COOKIE['usrName']);
header("Location: demo.php");
?>
