<?php
$filename = 'hashwert1.jpg';
$dir = "upload/".$filename;
//sftp://jv029@mars.iuk.hdm-stuttgart.de/home/jv029/public_html/tests/upload/gollum.jpg

if (file_exists($dir)) {
    echo "file exists";
    header('Content-Description: File Transfer');
    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    ob_clean();
    readfile($filename,$dir);
    exit;
}
else
    echo " file doesnt exist";

?>