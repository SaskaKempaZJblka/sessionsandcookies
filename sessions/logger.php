<?php
    require("menu.php");
    $loggerLoaded= array(
        'Czas' => date("Y-m-d H:i:s"),
        'Dzialanie' => "Załadowanie loggera",
        'url' => "logger.php",
    );
    array_push($_SESSION['journal'], $loggerLoaded);
    showLogs();
    
    if($_COOKIE['logger'] == 1)
    {
        showLogs();
    }
    else
    {
        echo "wartosc ciasteczka logger ustawiona jest na 0";
    }

    function showLogs(){
        print "<pre>";
        print_r($_SESSION['journal']);
        print "</pre>";
    }
?>