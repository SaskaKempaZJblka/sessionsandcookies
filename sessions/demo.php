<?php

include("menu.php");

echo '<h3>Zagadnienia</h3>';
$li.= '<li>Obsługa sesji</li>';
$li.= '<li>Obsługa ciasteczek</li>';
$li.= '<li>Obsługa formulrza</li>';
echo '<ul>'.$li.'</ul>';
echo '<h3>Witaj '.($user?$user:'gościu').'!</h3>';
$siteLoaded = array(
	'Czas' => date("Y-m-d H:i:s"),
	'Dzialanie' => "Załadowanie strony głównej",
	'url' => "demo.php",
);

array_push($_SESSION['journal'], $siteLoaded);
// $_SESSION['journal'][] = array_push($_SESSION['journal'], $siteLoaded);

?>
