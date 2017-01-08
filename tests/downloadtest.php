<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Herunterladen</title>

    <!-- Start Include Dateien -->
    <?php //include ("/home/jv029/public_html/includes/connection.php"); ?>
    <!-- Ende Include Dateien -->
</head>
<body>
<?php
/*$dateiname1 = "schmeagol.jpg";
//DB Abfrage um den zum Dateinamen zugehörigen hashwert auszulesen (Datei ist ja mit hashwert auf dem server gespeichert
$stmt = $pdo->prepare("SELECT dateihash FROM dbdateien WHERE dateiname=:dateiname");
$stmt->bindParam(':dateiname', $dateiname1, PDO::PARAM_STR);
$stmt->execute();
$erg= $stmt->fetch();
$dateihash = $erg[0];
echo $dateihash;*/
$dateiname = basename('hashwert1.jpg');
$pfad = 'upload/'.$dateiname;///home/jv029/public_html/
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
</body>
</html>
