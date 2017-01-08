<?php
$dateihash = "senf.jpg";
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
    echo 'The file does not exist.';
}

?>