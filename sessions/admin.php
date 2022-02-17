<?php
require("menu.php");

?>

<form action = "<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="adminForm">
<label >Czyszczenie sesji</label> <input type="submit" name="sessionDelete" value="Wyczyść"><br>
<label>Czyszczenie ciasteczka</label><input type="submit" name="cookieDelete" value ="Wyczyść"><br>
<label>Zapisz dziennik zdarzeń do pliku</label><input type="submit" name="save" value ="Zapisz"><br>
<p>Dziennik zdarzeń: </p><br>
<?php
    
    showLogs();
    //var_dump($_POST['journal']);
    if(isset($_POST['sessionDelete'])){
        session_unset();
    }
    elseif(isset($_POST['cookieDelete'])){
        setcookie('usrId', "", time()+0);
    }
    elseif(isset($_POST['save'])){

        $fp = fopen('journal.csv', 'w');

        foreach($_SESSION['journal'] as $fields){
            fputcsv($fp, $fields);
        }

        fclose($fp);

    }


    function showLogs(){
        var_dump($_SESSION['journal']);
    }
?>