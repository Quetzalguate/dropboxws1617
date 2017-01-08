<?php
$name = $_GET['var'];
$dateiname = basename("senf.jpg");
$pfad = 'upload/'.$dateiname;
if(!empty($dateiname) && file_exists($pfad)){
    // Header definieren
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$dateiname");
    header("Content-Type: application/octet-stream"); //--> Hat funktioniert obwohl kein zip download!!! Content-Type:  application/zip     image/jpeg
    header("Content-Transfer-Encoding: binary");

    // Datei auslesen
    readfile($pfad);
    echo "
                    <meta http-equiv=\"refresh\" content=\"2; url=https://mars.iuk.hdm-stuttgart.de/~jv029/dateiuebersicht.php
                ";
    exit;
}else{
    echo 'The file '.$name.' does not exist.';
}

?>