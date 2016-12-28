<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Dateiübersicht</title>

    <!-- Start Include Dateien -->
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php include ("includes/connection.php"); ?>
    <!-- Ende Include Dateien -->

    <style>
        body {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body>
    </br></br>

    <!-- Start Datenbankabfrage für Dateianzeige -->
    <?php
    $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
    $statement = $pdo->prepare("SELECT dbdateien.dateiname
                            FROM dbzuweisung INNER JOIN dbdateien 
                            ON dbdateien.dateiid = dbzuweisung.dateiid
                            WHERE dbzuweisung.userid=1"); // User ID aus session in Variable speichern und hier eingeben
    $statement->execute();

    /*$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
    $statement2 = $pdo->prepare ("SELECT dateiid FROM dbzuweisung WHERE userid=1 AND besitzer=1");
    $statement2->execute();
    $dateiid= $statement2->fetch();*/
    ?>
    <!-- Ende Datenbankabfrage für Dateianzeige -->

    <!-- Start Ergebnis der Datenbankabfrage per while Schleife in Tabelle ausgeben -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" >
            <h3 class="text-center">Deine Dateien</h3>
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Dateiname</th>
                            <th>Dateigröße</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($dateiname = $statement->fetch()) {?>
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> <?php echo $dateiname[0]; ?>
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/umbenennen.php?var=<?php echo $dateiname[0]; ?>">Umbenennen</a></li>
                                        <li><a href="#"><img class="icon icons8-Download" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABP0lEQVRoQ+2Y4REBQQyFnwrohBJ0gsrQiRLohAqYzBxzjJNNXpa7k/tlRnaz38t7Z8cEA38mAz8/EuDXE6wxgasCFdozdLPm4AlgsWVO4I1aaaG0kEWBtBCpVr6F0kJpIVKBtBAp4F++hXYAVqRwXcv3ANaWvT0TmAE4AJhbGhXUngAsAZwLah8lHgBZvGggppZmH2ovzeGP1v28ANJHRr21Nuyo3wAQa5ofBkCaReTB7Ps2JQvA5sHl+0gAJg9u30cDePPg9n0NAGseKN/XAijNA+37WgAleQjxfU0ALQ8hvq8N0JWHMN9/A+A1D6G+/wZAOw/yWS5p5ntOyb2C/SXWetyvxq57jra5fF8boOQMVE0CUPIFLB7lBLT/9wN0o7Z4Ev3dBBKA0ldfPP4J6Br0qGKUb6Ee6asfZfATuAFjmDoxEkrRdwAAAABJRU5ErkJggg==" width="15" height="15">Herunterladen</a></li>
                                        <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Share" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAACTElEQVRoQ+2Y/TFFMRDF91VAB3SAClABHaACVIAKUAE6oAJUgA7ogAqY30wyk4lsPtxE8mZu/r177ztn9+zueVnIkp/FkuOXmUDvCo5SgWMRORSRTZOQVxG5EpG7VIJ6E1gVkUcHuI8XIrsi8qkR6U3gJQLeYobE1ogETkTkMiUR8/xIRG5DsT0rkJP9ZBV6EvjOzL4NC2KdCRRmkXAmD2PzvODdN63Z/7sCBwb4egF4Qrs3MQuKibNTCJxwNfs8bF0B5AJwtmzofJgltaE8Bzykuywyq3NI+OfLWAXsAuAgyF6wRADOs+Dsdz/WogJk7EZENJ0/GLDvf5DTr1dqEgAwctmPyIEsP9UAHl0OgR+IucXUWEQujEwkUf2kKpDjFonR5HJtwKtNOJVRikCJX3GxPBud4ySbnhiBErdoQTIWee++KWrn4zECJdn3x+J/4Y8usipusTWTWAWWngANqK14P7FMGcYkU6fZxAlVs3YTs11PR2liCJdUwU0Q2xYiXccogFhSgIm5RWLWlGZFVhctZZVaZBZXzC1CgNl/ppCgJ7AS9Ef1k0sg54exE2R8TwlGTsiqi5nLIWBjsNP4eE1WbGmIDGenfZLICumsBNj7Y5f/ysQPdzdKfyArAIYOVYCMBe7HDHM3CkCIbJdo0cQOdTfKNENWWn9o/Lpfq7jAUmM3REKtQs0xWqqOKmZxJlCadie+xGcNczfq8i35yzpUE7skcqrQ9W40pbAct9vtbjQF3n0+1N1oCfDJsT3H6GTwfGAmUCWNEz7yAx/gdjEN5otJAAAAAElFTkSuQmCC" width="15" height="15">Teilen</a></li>
                                        <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/includes/loeschen.php?var=<?php echo $dateiname[0]; ?>">Löschen</a></li>
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
    <!-- Ende Ergebnis der Datenbankabfrage per while Schleife in Tabelle ausgeben -->
</body>
</html>