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
        <div class="col-md-3"></div>
        <div class="col-md-6" >
            <h3 class="text-center">Deine Dateien</h3>
            <table class="table table-hover">
                <thead>
                <tr align="center">
                    <th>Dateiname</th>
                    <th>Dateigröße</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> datei.jpg
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/umbenennen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Edit" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABhUlEQVRoQ+2Y7U0DMQxAXzdgJTZgBJgAmADYgA2ATTpCR2AEmABkqUEHOB+Xi2NXan5eL9F7jpOrvePEx+7E+TkLeO9gtB24Ax6Ad+AGONQCFEngGnhZAH8AlzWJKAJ/4ZNHVSKCQA6+ScJboAZflfAUaIUvSngJrIVPEvvjwf456x4CvfAC/QlcLK/W2QI5eLnzZSyvUe0TcA88ewmU4F+PUKXdeQPk919j1g60wAtY7j0VXibMEDCDnyFgCm8tYA5vKTAF3kpgGryFwFT40QLT4UcKuMCPEnCDHyHgCr9VwB1+i0AI+F6BMPA9AqHg1wqEg18jEBK+VSAsfItAaPiagBTPt0plLQV4qmG7ykCtWu99lispw0c+CWsCGrz0Y64AaSylsboA741yaZ4m8KVMeAIeo8HnzoAmIO+m3A8R+VIK5QRkjhzef80lINu3sUib5ZqtKVTicINfm0KahCv8VgF3+C0CIeB7BcLA1/5KWF8gQ9af0Z0eAppb5CxgGt6Gxb8B3BaLMbHRAogAAAAASUVORK5CYII=" width="15" height="15"> Umbenennen</a></li>
                                    <li><a href="#"><img class="icon icons8-Download" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABP0lEQVRoQ+2Y4REBQQyFnwrohBJ0gsrQiRLohAqYzBxzjJNNXpa7k/tlRnaz38t7Z8cEA38mAz8/EuDXE6wxgasCFdozdLPm4AlgsWVO4I1aaaG0kEWBtBCpVr6F0kJpIVKBtBAp4F++hXYAVqRwXcv3ANaWvT0TmAE4AJhbGhXUngAsAZwLah8lHgBZvGggppZmH2ovzeGP1v28ANJHRr21Nuyo3wAQa5ofBkCaReTB7Ps2JQvA5sHl+0gAJg9u30cDePPg9n0NAGseKN/XAijNA+37WgAleQjxfU0ALQ8hvq8N0JWHMN9/A+A1D6G+/wZAOw/yWS5p5ntOyb2C/SXWetyvxq57jra5fF8boOQMVE0CUPIFLB7lBLT/9wN0o7Z4Ev3dBBKA0ldfPP4J6Br0qGKUb6Ee6asfZfATuAFjmDoxEkrRdwAAAABJRU5ErkJggg==" width="15" height="15"> Herunterladen</a></li>
                                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Share" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAACTElEQVRoQ+2Y/TFFMRDF91VAB3SAClABHaACVIAKUAE6oAJUgA7ogAqY30wyk4lsPtxE8mZu/r177ztn9+zueVnIkp/FkuOXmUDvCo5SgWMRORSRTZOQVxG5EpG7VIJ6E1gVkUcHuI8XIrsi8qkR6U3gJQLeYobE1ogETkTkMiUR8/xIRG5DsT0rkJP9ZBV6EvjOzL4NC2KdCRRmkXAmD2PzvODdN63Z/7sCBwb4egF4Qrs3MQuKibNTCJxwNfs8bF0B5AJwtmzofJgltaE8Bzykuywyq3NI+OfLWAXsAuAgyF6wRADOs+Dsdz/WogJk7EZENJ0/GLDvf5DTr1dqEgAwctmPyIEsP9UAHl0OgR+IucXUWEQujEwkUf2kKpDjFonR5HJtwKtNOJVRikCJX3GxPBud4ySbnhiBErdoQTIWee++KWrn4zECJdn3x+J/4Y8usipusTWTWAWWngANqK14P7FMGcYkU6fZxAlVs3YTs11PR2liCJdUwU0Q2xYiXccogFhSgIm5RWLWlGZFVhctZZVaZBZXzC1CgNl/ppCgJ7AS9Ef1k0sg54exE2R8TwlGTsiqi5nLIWBjsNP4eE1WbGmIDGenfZLICumsBNj7Y5f/ysQPdzdKfyArAIYOVYCMBe7HDHM3CkCIbJdo0cQOdTfKNENWWn9o/Lpfq7jAUmM3REKtQs0xWqqOKmZxJlCadie+xGcNczfq8i35yzpUE7skcqrQ9W40pbAct9vtbjQF3n0+1N1oCfDJsT3H6GTwfGAmUCWNEz7yAx/gdjEN5otJAAAAAElFTkSuQmCC" width="15" height="15"> Teilen</a></li>
                                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/includes/loeschen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Delete" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABGklEQVRoQ+2Z3Q2CQBCEhwosQUuwEy1BO7AUO9ASpBNL0A60As0ZeNKE/c4DAw7Pw+787G5IqDTypxo5f1nArxN0AlNLYCPp0CHqKGlbSnjJEYqQb3kXE0EEPEq5FqwT4hYCNQ0tIOh8CwuZGwJNJQFo4DBwksAwjGCXHAF9LzPihMAD7QLihMAWEJtvZCoCOwEn8O6ARyg2FQiFTEVgL3EsCGQqAjsBJ+Az+nLAn9Mdq4AOCwL7CvkK+Qr5CkW2AB0WBPYVivgv9t/uLxO4SZrFzMSoq6QFeSsngZOkFWkCsLWkNcCzeWsKJ4fOPaRwl7SUdOlbQKqfROybhnPS8AM2jU0yZEfJp1o5I/Ql37KvW0BZP3m10SfwBGTHLTF2D3mmAAAAAElFTkSuQmCC" width="15" height="15"> Löschen</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>Dateigröße-Variable</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>