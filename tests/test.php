<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Ende Bootstrap Einbindung -->
<?php
//connection
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);



//RENAME FILE
$userid="1";
$dateiname = $_GET['var'];
$neuerdateiname = $_POST['neuerdateiname'];

//
//Ausgeben welche dateiid der dateiname hat, der von user xy hochgeladen wurde
$stmt1 = $pdo->prepare("SELECT dateiid FROM dbdateien WHERE dateiname=:dateiname "); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
$stmt1->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
//$stmt->bindParam(':userid', $userid, PDO::PARAM_STR);
$stmt1->execute();
$erg2= $stmt1->fetch();
//echo $dateiid[0];
$dateiid = $erg2[0];

//Auslesen ob Besitzer gleich 0 oder 1
$stmt2 = $pdo->prepare("SELECT besitzer FROM dbzuweisung WHERE dateiid=:dateiid AND userid=:userid"); // Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
$stmt2->bindParam(':dateiid', $dateiid, PDO::PARAM_STR);
$stmt2->bindParam(':userid', $userid, PDO::PARAM_STR);
$stmt2->execute();
$besitzer= $stmt2->fetch();
$besitzerzw = $besitzer[0];
//echo "Berechtigung: ".$besitzerzw." !";

//Überprüfen ob User berechtigt ist die Datei umzunennen

//Alten Dateihash auslesen und in Variable speichern $alterdateihash
$stmt = $verbindung->prepare("SELCET dateihash FROM dbdateien WHERE dateiname= :dateiname");// Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
$stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
$stmt->execute();
$erg= $stmt->fetch();
$alterdateihash=$erg[0];

//Neuen Dateihash erstellen
$md5 = md5($neuerdateiname);
$extension=strrchr($dateiname,".");
$neuerdateihash = $md5.$userid.$extension;

//Neuer Dateihash wird in dbdateien gespeichert
$stmt2 = $verbindung->prepare("UPDATE dateihash FROM dbdateien WHERE dateiname= :dateiname");// Hier muss als Bedingung noch die userid im hashwert einbezogen werden, da ja der datainame nicht eindeutig ist
$stmt2->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
$stmt2->execute();

//Datei auf dem Server wird umbenannt
$alterdateihashpfad = "upload/".$alterdateihash;
$neuerdateihashpfad = "upload/".$neuerdateihash;
rename($alterdateihashpfad,$neuerdateihashpfad);

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