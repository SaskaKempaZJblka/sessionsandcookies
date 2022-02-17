<?php
    require("menu.php");
    $loggerLoaded= array(
        'Czas' => date("Y-m-d H:i:s"),
        'Dzialanie' => "Załadowanie loggera",
        'url' => "logger.php",
    );
?>

<form action = "<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="loggerForm">
<label>Czyszczenie logow</label> <input type="submit" name="loggerDelete" value="Wyczyść logi"><br>
<label>Rejsetrowanie logow</label> <input type="submit" name="loggerDisable" value="Wyłącz"><input type="submit" name="loggerEnable" value="Włącz"><br>
<?php

    if(isset($_POST['loggerDelete'])){
        $_SESSION['journal'] = array();
    }

    if(isset($_POST['loggerDisable']))
    {
        setcookie('logger', '0');
        header("Refresh:0");
    }
    if(isset($_POST['loggerEnable']))
    {
        setcookie('logger', '1');
        header("Refresh:0");
    }
    array_push($_SESSION['journal'], $loggerLoaded);
    
    
    if($_COOKIE['logger'] == 1)
    {
        showLogs();
    }
    else
    {
        echo "Wartosc ciasteczka logger ustawiona jest na 0";

    }

    function showLogs(){
        print "<pre>";
        print_r($_SESSION['journal']);
        print "</pre>";
    }
?>