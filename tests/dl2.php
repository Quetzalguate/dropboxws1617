<?php
include ("/home/jv029/public_html/includes/connection.php");

$dateiname = "schmeagol.jpg";

$stmt = $pdo->prepare("SELECT dateihash FROM dbdateien WHERE dateiname=:dateiname");
$stmt->bindParam(':dateiname', $dateiname, PDO::PARAM_STR);
$stmt->execute();
$erg= $stmt->fetch();
$dateihash = $erg[0];


$basename = basename($dateihash);
$pfad = '/home/jv029/public_html/upload/'.$basename;
$mimetype = mime_content_type($pfad);
if(!empty($basename) && file_exists($pfad)){
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