<?php
$dateiname = basename('Homer_Simpson_2006.png');
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
    exit;
}else{
    echo 'The file does not exist.';
}

//Quelle: http://www.codexworld.com/force-download-file-php/

?>