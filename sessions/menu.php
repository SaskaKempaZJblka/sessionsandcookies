<?php
error_reporting(E_ERROR | E_PARSE);
if( session_status() == PHP_SESSION_NONE )
{
	
	session_start();
	if(!isset($_SESSION['journal'])) {
        $_SESSION['journal'] = array();
	}
    //array_push($_SESSION['journal'], date("Y-m-d H:i:s"));
	//var_dump($_SESSION['journal']);
	
}
else
	echo 'Sesja nie wystartowała';
//$_POST['journal'] = array();
if(!isset($_COOKIE['logger'])){
	setcookie('logger', '1');
}


$uid = isset($_COOKIE['usrId']) ? $_COOKIE['usrId'] : 0;
((int)$uid==13) ? $_SESSION['usrName']='dRoot' : null;
$user = array_key_exists('usrName',$_SESSION) ? $_SESSION['usrName'] : false;
//$_SESSION['journal'] = array();
if($user){
	$logLink = '<a href="logout.php">Logout ('.$user.')</a>';
	$adminPnl = '<a href="admin.php">Panel Administratora</a>';
} else
	$logLink = '<a href="login.php">Login</a>';
echo '<nav>
	<a href="demo.php">Main</a>
	<a href="form.php">Form</a>
	'.$logLink.'
	'.$adminPnl.'
	<a href="logger.php">Logger</a>
</nav>';
?>
