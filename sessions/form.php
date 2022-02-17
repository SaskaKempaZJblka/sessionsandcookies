<?php
include("menu.php");

?>
<!doctype html>
<html>
    <head>
        <meta charset = "utf-8">
</head>
<body>
<form action = "<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="userForm" enctype="multipart/form-data">
    <input type= "radio" id = "zip" name = "pack" value = "unpack">
    <label for="unpack">unpack</label>
    <input type= "radio" id = "zip" name= "pack" value = "pack">
    <label for="pack">pack</label>
    <input type="submit" value="submit" >
    <input type="file" name="file[]" multiple>
    <label> Prześlij tutaj pliki do spakowania </label><br>
    
    <input type="file" name="file2" >
    <label> Prześlij tutaj swój plik zip </label><br> 

</form>
</body>
</html>
<?php

$formLoaded = array(
	'formLoaded' => date("Y-m-d H:i:s"),
	'Dzialanie' => "Zaladowanie formularza",
	'url' => "form.php",
);

array_push($_SESSION['journal'], $formLoaded);
// $_SESSION['journal'][] = $formLoaded;
// $_POST['journal'] = array();
// $_SESSION['journal'][] = $_POST['journal'];
//var_dump($_SESSION['journal']);
error_reporting(E_ERROR | E_PARSE);

//$names = array("pack", "src", "unpack", "upload");      //todo sprytniejsze sprawdzanie czy kazdy katalog istnieje zamiast miliona if-ów
if(!file_exists("pack"))
{
    mkdir("pack", 0777);
}
     if(!file_exists("src"))
    {
        mkdir("src", 0777);
    }
         if(!file_exists("unpack"))
        {
            mkdir("unpack", 0777);
        }
            if(!file_exists("upload"))                     //todo jakis trycatch aby wyrzuciło błąd jak nie uda sie utworzyc folderów
            {
                mkdir("upload", 0777);
            }
        
if(isset($_POST['pack']))
{
    if($_POST['pack']=='pack')
    {
        $countfiles = count($_FILES['file']['name']);
        for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'][$i];
            move_uploaded_file($_FILES["file"]["tmp_name"][$i], "src/" .$filename);      
        }
        pakuj();
    }
    
    if($_POST['pack']=='unpack')
    {
    rozpakuj();
    echo "Pomyślnie rozpakowano";
    $unzipped= array(
        'Czas' => date("Y-m-d H:i:s"),
        'Dzialanie' => "Rozpakowano pliki",
        'url' => "form.php",
    );
    array_push($_SESSION['journal'], $unzipped);
    }
    
}

function rozpakuj(){

    $plikZip = new ZipArchive();
    $filename = $_FILES['file2']['name'];
    move_uploaded_file($_FILES['file2']['tmp_name'],'pack/'.$filename);
    
    if( $plikZip->open( "pack/".$filename ) ) {
        
        $plikZip->extractTo('unpack/');
        $plikZip->close();
        
    } 
}
    function pakuj(){
        $plikZip = new ZipArchive();
        if ($plikZip->open("pack/plikZip.zip", 
                            ZipArchive::CREATE)!== TRUE) 
        {
            
        }
        else{
            foreach (glob("src/*") as $file) {
                $plikZip->addFile($file);
            }
           
        }
        $zipped= array(
            'Czas' => date("Y-m-d H:i:s"),
            'Dzialanie' => "Spakowano pliki",
            'url' => "form.php",
        );
        echo "Pomyślnie Spakowano";
        array_push($_SESSION['journal'], $zipped);
    }
?>