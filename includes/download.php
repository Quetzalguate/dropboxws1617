<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Herunterladen</title>

    <!-- Start Include Dateien -->
    <?php include ("/home/jv029/public_html/includes/connection.php"); ?>
    <!-- Ende Include Dateien -->
</head>
<body>
<?php
$dateiname = $_GET['var'];
//echo $dateiname;
//$dateiname = "schmeagol.jpg";

$stmt = $pdo->prepare("SELECT dateihash FROM dbdateien WHERE dateiname=:dateiname");
$stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
$stmt->execute();
$erg= $stmt->fetch();
$dateihash = $erg[0];
//echo "</br>".$dateihash;


$basename = basename($dateihash);
$pfad = '/home/jv029/public_html/upload/'.$basename;
$mimetype = mime_content_type($pfad);
echo "</br>".$mimetype;
if(!empty($basename) && file_exists($pfad)){
    //echo "</br>if bedingung erfüllt";
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$basename");
    header("Content-Type: $mimetype");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($pfad);
    exit;
}else{
    echo 'Datei existiert nicht.';
}

?>