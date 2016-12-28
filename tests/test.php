<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Ende Bootstrap Einbindung -->

<div class="row">
    <div align="center">
        <form action="bsfixednavbar.php" method="POST" role="form">
            <div class="form-check" class="text-right">
                <input type="checkbox" name="licht" checked data-toggle="toggle" data-on="Licht an" data-off="Licht aus" data-onstyle="default" data-offstyle="default" data-size="mini">
            </div>
        </form>
    </div>
</div>
<?php
//connection
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);


//toggle test


//------------------------------------------------------------------------------------------------------------------
//RENAME FILE
//Variablen deklarieren
/*$userid="1";
$dateiname = $_GET['var'];
$neuerdateiname = $_POST['neuerdateiname'];

//1.0 BERECHTIGUNG ZUM UMBENENNEN ÜBERPRÜFEN
//1.1 Zugehörige Dateiid zum Dateinamen ausgeben
$stmt1 = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
$stmt1->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
$stmt1->execute();
$erg1= $stmt1->fetch();
$dateiid = $erg1[0];

//1.2 Auslesen ob Besitzer gleich 0 oder 1
$stmt2 = $pdo->prepare("SELECT besitzer FROM dbzuweisung WHERE dateiid=:dateiid AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
$stmt2->bindParam(':dateiid', $dateiid, PDO::PARAM_STR);
$stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);
$stmt2->execute();
$erg2= $stmt2->fetch();
$besitzer = $erg2[0];

if ($besitzer !='0'){

    if (isset($_POST['umbenennen']) && !empty($neuerdateiname)){

        //2.0 DATEI UMBENENNEN
        //2.1 Alten Dateihash auslesen und in Variable speichern $alterdateihash
        $stmt3 = $verbindung->prepare("SELCET dateihash FROM dbdateien WHERE dateiname= :dateiname");// Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt3->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        $stmt3->execute();
        $erg= $stmt3->fetch();
        $alterdateihash=$erg[0];

        //2.2 Neuen Dateihash erstellen
        $md5 = md5($neuerdateiname);
        $extension=strrchr($dateiname,"."); //gibt Zeichen wider ab dem .
        $neuerdateihash = $md5.$userid.$extension;

        //2.3 Neuer Dateihash wird in dbdateien gespeichert
        $stmt4 = $verbindung->prepare("UPDATE dateihash FROM dbdateien WHERE dateiname= :dateiname");// Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
        $stmt4->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
        $stmt4->execute();

        //2.4 Datei auf dem Server wird umbenannt
        $alterdateihashpfad = "upload/".$alterdateihash;
        $neuerdateihashpfad = "upload/".$neuerdateihash;
        rename($alterdateihashpfad,$neuerdateihashpfad);

        echo "
            <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-success\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Datei wurde erfolgreich umbenannt!</strong>
                    </div>
                </div>
            </div>
        ";

    }
    else {
        echo "
        <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Wähle einen passenden Namen aus - Die Dateiendung muss beibehalten werden!</strong>
                    </div>
                </div>
            </div>
        ";
    }

}

else {
    echo "
        <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Du bist nicht dazu berechtigt diese Datei umzubennen!</strong>
                    </div>
                </div>
            </div>
        ";
}*/
//-------------------------------------------------------------------------------------------------
//DOWNLOAD FILE
/*
$filename='gollum.jpg';
@header("Content-type: image/jpg");
@header("Content-Disposition: attachment; filename=$filename");
echo file_get_contents('upload/gollum.jpg');
*/

//-------------------------------------------------------------------------------------------------

/*$filename = 'gollum.jpg';
$dir = "upload/".$filename;

//sftp://jv029@mars.iuk.hdm-stuttgart.de/home/jv029/public_html/tests/upload/gollum.jpg

if (file_exists($dir)) {
    echo "file exists";
    header('Content-Description: File Transfer');
    header('Content-Type: image/jpg');
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    ob_clean();
    flush();
    readfile($filename,$dir);
    exit;
}
else
    echo " file doesnt exist";*/

//-------------------------------------------------------------------------------------------------

/*$file = "gandalf.jpg";
$dir = "upload/".$filename;
if( file_exists($dir) ){
    echo "file exists";
}
else
    echo "file doesnt exist";
// Quick check to verify that the file exists
if( !file_exists($dir) ) die("File not found");
// Force the download
header("Content-Disposition: attachment; filename=$file ");
header("Content-Length: " . filesize($file));
header("Content-Type: application/octet-stream;");
readfile($file,$dir);
*/


/*$filename = "gollum.jpg";
echo $filename;
// define error message
$err = '<p style="color:#990000">Sorry, the file you are requesting is unavailable.</p>';
if (!$filename) {
    // if variable $filename is NULL or false display the message
    echo " filename NULL";
    echo $err;

} else {
    // define the path to your download folder plus assign the file name
    $path = 'upload/'.$filename;
    if (is_readable($path)) {
        echo " path readable";
    }
    else {
        echo " path not readable";
    }
    if (file_exists($path)){
        echo " file exists";
    }
    else {
        echo " file doesnt exist";
    }
    // check that file exists and is readable
    if (file_exists($path) && is_readable($path)) {
        echo "file exists";
        // get the file size and send the http headers
        $size = filesize($path);
        header('Content-Type: image/png');
        header('Content-Length: '.$size);
        header('Content-Disposition: attachment; filename='.$filename);
        //header('Content-Transfer-Encoding: binary');
        // open the file in binary read-only mode
        // display the error message if file can't be opened

        readfile($path.$filename);
        $file = fopen($path, 'rb');
        if ($file) {
            // stream the file and exit the script when complete
            fpassthru($file);
            exit;
        } else {
            echo $err ."nein1";
        }
    } else {
        echo $err."nein2";
    }
}
*/

?>