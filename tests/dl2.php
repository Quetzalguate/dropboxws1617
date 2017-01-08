<?php
$dateiname = "Juan Luis Guerra - Quisiera ser un pez.mp3";
$dateipfad = "upload/".$dateiname;
echo mime_content_type($dateipfad);

/*
$basename = basename('hashwert1.jpg');
$pfad = 'upload/'.$basename;
if(!empty($basename) && file_exists($pfad)){
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$basename");
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($pfad);
    exit;
}else{
    echo 'The file does not exist.';
}
*/
?>