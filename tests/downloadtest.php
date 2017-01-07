<?php
$fileName = basename('hashwert1.jpg');
$filePath = 'upload/'.$fileName;
if(!empty($fileName) && file_exists($filePath)){
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Content-Type: application/octet-stream"); //--> Hat funktioniert obwohl kein zip download!!! Content-Type:  application/zip     image/jpeg
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($filePath);
    exit;
}else{
    echo 'The file does not exist.';
}

//Quelle: http://www.codexworld.com/force-download-file-php/

?>