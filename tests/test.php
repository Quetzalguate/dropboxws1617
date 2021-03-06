<!DOCTYPE html>
<html lang="de">
<head>
    <link rel='shortcut icon' type='image/x-icon' href='images/minimalboxfavicon.ico' />
    <title>Test</title>
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
//1.0 DATEIGROESSE IN MB
//1.1 Dateigroesse in byte
$file = "smeagol.jpg";
$file2= "upload/hashwert1.jpg";
$filesizeinbyte = filesize($file);

//1.2 Dateigroesse in kilobyte
$erginkb = $filesizeinbyte / 1024;

//1.3 Dateigroesse in megabyte
$erginmb = $erginkb /1024;
echo $erginmb;

//1.4 Dateigroesse in megabyte auf 4 Nachkommastellen gerundet
$gerundeteserg = round($erginmb,4);
echo "</br>".$gerundeteserg;


//2.0 DATEIGROESSE AUS DB AUSLESEN
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";
$userid = "8";
//2.1 Dateigroessen in einem assoziativem Array speichern
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$stmt3 = $pdo->prepare("SELECT dbdateien.dateigroesse FROM dbzuweisung INNER JOIN dbdateien ON dbdateien.dateiid = dbzuweisung.dateiid WHERE dbzuweisung.userid=$userid");
$stmt3->execute();
$result= $stmt3->fetchAll(PDO::FETCH_ASSOC);
// 2.2 Jede Dateigroesse in Schleife ausgeben und Summe Variable gespeichert;
foreach($result as $show){

    foreach($show as $display){
        $summe+= $display; //$ergforeach .= $display."+"
    }
}

//2.3 Die Summe der Dateigroessen vom verfügbaren Speicher abziehen und freien Speicher ausgeben
$freierspeicher = 20 - $sum;
echo "</br>Du hast noch: ".$freierspeicher ." mb frei!";


//echo "</br>".$erg[2];

/*while($erg= $stmt3->fetch()){
    echo $erg[0]."+";
}*/

/*
foreach($erg AS $name) {
    echo $name.", ";
}
for($i=0; $i<=10; $i++)
{
    echo $erg[$i].",  ";
}*/


?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"  align="center">
            <a class="btn btn-primary btn-lg" href="https://mars.iuk.hdm-stuttgart.de/~jv029/login.php" role="button">Sitzung abgelaufen - zum Login</a>
        </div>
    </div>
</div>

</body>
</html>