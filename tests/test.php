<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Ende Bootstrap Einbindung -->
<?php

$filename = 'gollum.jpg';
$dir = "upload/".$filename;

if (file_exists($dir)) {
    echo "file exists";
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filename).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    readfile($filename,$dir);
    exit;
}
else
    echo " file doesnt exist";

/*$file = "gandalf.jpg";
$dir = "upload/".$filename;
if( file_exists($dir) ){
    echo "file exists";
}
else
    echo "file doesnt exist";
// Quick check to verify that the file exists
if( !file_exists($dir) ) die("File not found");
// Force the download
header("Content-Disposition: attachment; filename=$file ");
header("Content-Length: " . filesize($file));
header("Content-Type: application/octet-stream;");
readfile($file,$dir);
*/


/*$filename = "gandalf.jpg";
echo $filename;
// define error message
$err = '<p style="color:#990000">Sorry, the file you are requesting is unavailable.</p>';
if (!$filename) {
    // if variable $filename is NULL or false display the message
    echo " filename NULL";
    echo $err;

} else {
    // define the path to your download folder plus assign the file name
    $path = 'upload/'.$filename;
    /*if (is_readable($path)) {
        echo " path readable";
    }
    else {
        echo " path not readable";
    }
    if (file_exists($path)){
        echo " file exists";
    }
    else {
        echo " file doesnt exist";
    }*/
    // check that file exists and is readable
    /*if (file_exists($path) && is_readable($path)) {
        echo "file exists";
        // get the file size and send the http headers
        $size = filesize($path);
        header('Content-Type: image/png');
        header('Content-Length: '.$size);
        header('Content-Disposition: attachment; filename='.$filename);
        //header('Content-Transfer-Encoding: binary');
        // open the file in binary read-only mode
        // display the error message if file can't be opened

        readfile($path.$filename);
        /*$file = @ fopen($path, 'rb');
        if ($file) {
            // stream the file and exit the script when complete
            fpassthru($file);
            exit;
        } else {
            echo $err ."nein1";
        }
    } else {
        echo $err."nein2";
    }
}*/


?>