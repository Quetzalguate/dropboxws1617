<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Ende Bootstrap Einbindung -->
<?php
function makeDownload($file, $dir, $type) {

    header("Content-Type: $type");

    header("Content-Disposition: attachment; filename=\"$file\"");

    readfile($dir.$file);

}
$dir = '/public_html/upload/';

$type = 'image/jpeg';

if(!empty($_GET['file']) && !preg_match('=/=', $_GET['file'])) {
    echo "juhu";
    if(file_exists ($dir.$_GET['file']))     {
        echo "hallo";
        makeDownload($_GET['file'], $dir, $type);
    }

}
else
    echo" nein";

?>