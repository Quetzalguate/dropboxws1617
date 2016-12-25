<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Ende Bootstrap Einbindung -->
<?php
/*$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";

$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dbuser.email
                            FROM dbuser INNER JOIN dbzuweisung 
                            ON dbuser.userid = dbzuweisung.userid
                            WHERE dbzuweisung.dateiid=1 AND dbzuweisung.besitzer =0");
$statement->execute();
$useremail = $statement->fetch();
echo $useremail[0];*/



/*
$dir = '/home/upload/';
$file = "hashwertgollum1.jpg";
$type = 'image/jpg';



function makeDownload($file, $dir, $type) {

    header("Content-Type: $type");

    header("Content-Disposition: attachment; filename=\"$file\"");

    readfile($dir.$file);

}*/

$dir = '/home/upload/';
$file = "hashwertgollum1.jpg";
function makeDownload($file, $dir)
{
    switch(strtolower(end(explode(".", $file)))) {
        //case "jpg": $type = "image/jpg"; break;
        //case "rar": $type = "application/x-rar-compressed"; break;
        default: $type = "image/jpg";
    }
    header("Content-Type: $type");
    header("Content-Disposition: attachment; filename=\"$file\"");
    readfile($dir.$file);
    exit; // you should exit here to prevent the file from becoming corrupted if anything else gets echo'd after this function was called.
}


makeDownload($file, $dir);

?>