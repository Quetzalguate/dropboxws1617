<!DOCTYPE html>
<html lang="de">
<head>
<!-- Start Bootstrap Einbindung -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Ende Bootstrap Einbindung -->

</head>
<body>

<?php
$file = "smeagol.jpg";
$file2= "upload/hashwert1.jpg";
$filesizeinbyte = filesize($file2);

$erginkb = $filesizeinbyte / 1024;
//echo $erginkb;
$erginmb = $erginkb /1024;
echo $erginmb;

//echo gettype($erginmb);

$gerundeteserg = round($erginmb,2)

echo "</br>".$gerundeteserg;


?>

</body>
</html>