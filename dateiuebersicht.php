<!DOCTYPE html>
<html lang="de">

    <head>
    <meta charset="UTF-8">
    <title>MinimalBox - Dateiübersicht</title>
        <link rel='shortcut icon' type='image/x-icon' href='images/minimalboxfavicon.ico' />

        <!-- Start Include Dateien -->
        <?php include ("includes/coockie.php"); ?>
        <?php include ("includes/bsfixednavbar.php"); ?>
        <?php include ("includes/bsfooter.php"); ?>
        <?php include ("includes/bseinbindung.php"); ?>
        <?php include ("includes/connection.php"); ?>
        <?php echo $_COOKIE["background"]; ?>
        <!-- Ende Include Dateien -->

    </head>

    <body>

        </br></br>

            <!-- Start Datenbankabfrage für Dateianzeige -->
        <?php
        // 1.0 DB ABFRAGE FÜR DATEIANZEIGE
        // 1.1 Dateinamen aus DB auslesen
        $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
        $statement = $pdo->prepare("SELECT dbdateien.dateiname
                                FROM dbzuweisung INNER JOIN dbdateien 
                                ON dbdateien.dateiid = dbzuweisung.dateiid
                                WHERE dbzuweisung.userid=:userid");
        $statement->bindParam(':userid', $userid, PDO::PARAM_STR);
        $statement->execute();

        // 1.2 Dateigroesse aus DB auslesen
        $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
        $statement2 = $pdo->prepare("SELECT dbdateien.dateigroesse
                                FROM dbzuweisung INNER JOIN dbdateien 
                                ON dbdateien.dateiid = dbzuweisung.dateiid
                                WHERE dbzuweisung.userid=:userid");
        $statement2->bindParam(':userid', $userid, PDO::PARAM_STR);
        $statement2->execute();

        ?>
        <!-- Ende Datenbankabfrage für Dateianzeige -->

        <!-- Start: Ergebnis der Datenbankabfrage per while Schleife in Tabelle ausgeben -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" >
                <h3 class="text-center">Deine Dateien</h3>
                    </br></br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th align="left">Dateiname</th>
                                <th align="right">Dateigröße</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while (($dateiname = $statement->fetch()) && ($dateigroesse = $statement2->fetch())) {?>
                            <tr>
                                <td>
                                    <!-- Start: Dropdown Menü für jede einzelne Datei -->
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> <?php echo $dateiname[0]; ?>
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/umbenennen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Edit" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABhUlEQVRoQ+2Y7U0DMQxAXzdgJTZgBJgAmADYgA2ATTpCR2AEmABkqUEHOB+Xi2NXan5eL9F7jpOrvePEx+7E+TkLeO9gtB24Ax6Ad+AGONQCFEngGnhZAH8AlzWJKAJ/4ZNHVSKCQA6+ScJboAZflfAUaIUvSngJrIVPEvvjwf456x4CvfAC/QlcLK/W2QI5eLnzZSyvUe0TcA88ewmU4F+PUKXdeQPk919j1g60wAtY7j0VXibMEDCDnyFgCm8tYA5vKTAF3kpgGryFwFT40QLT4UcKuMCPEnCDHyHgCr9VwB1+i0AI+F6BMPA9AqHg1wqEg18jEBK+VSAsfItAaPiagBTPt0plLQV4qmG7ykCtWu99lispw0c+CWsCGrz0Y64AaSylsboA741yaZ4m8KVMeAIeo8HnzoAmIO+m3A8R+VIK5QRkjhzef80lINu3sUib5ZqtKVTicINfm0KahCv8VgF3+C0CIeB7BcLA1/5KWF8gQ9af0Z0eAppb5CxgGt6Gxb8B3BaLMbHRAogAAAAASUVORK5CYII=" width="15" height="15"> Umbenennen</a></li>
                                            <li><a href="#"><img class="icon icons8-Download" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABP0lEQVRoQ+2Y4REBQQyFnwrohBJ0gsrQiRLohAqYzBxzjJNNXpa7k/tlRnaz38t7Z8cEA38mAz8/EuDXE6wxgasCFdozdLPm4AlgsWVO4I1aaaG0kEWBtBCpVr6F0kJpIVKBtBAp4F++hXYAVqRwXcv3ANaWvT0TmAE4AJhbGhXUngAsAZwLah8lHgBZvGggppZmH2ovzeGP1v28ANJHRr21Nuyo3wAQa5ofBkCaReTB7Ps2JQvA5sHl+0gAJg9u30cDePPg9n0NAGseKN/XAijNA+37WgAleQjxfU0ALQ8hvq8N0JWHMN9/A+A1D6G+/wZAOw/yWS5p5ntOyb2C/SXWetyvxq57jra5fF8boOQMVE0CUPIFLB7lBLT/9wN0o7Z4Ev3dBBKA0ldfPP4J6Br0qGKUb6Ee6asfZfATuAFjmDoxEkrRdwAAAABJRU5ErkJggg==" width="15" height="15"> Herunterladen</a></li>
                                            <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Share" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAACTElEQVRoQ+2Y/TFFMRDF91VAB3SAClABHaACVIAKUAE6oAJUgA7ogAqY30wyk4lsPtxE8mZu/r177ztn9+zueVnIkp/FkuOXmUDvCo5SgWMRORSRTZOQVxG5EpG7VIJ6E1gVkUcHuI8XIrsi8qkR6U3gJQLeYobE1ogETkTkMiUR8/xIRG5DsT0rkJP9ZBV6EvjOzL4NC2KdCRRmkXAmD2PzvODdN63Z/7sCBwb4egF4Qrs3MQuKibNTCJxwNfs8bF0B5AJwtmzofJgltaE8Bzykuywyq3NI+OfLWAXsAuAgyF6wRADOs+Dsdz/WogJk7EZENJ0/GLDvf5DTr1dqEgAwctmPyIEsP9UAHl0OgR+IucXUWEQujEwkUf2kKpDjFonR5HJtwKtNOJVRikCJX3GxPBud4ySbnhiBErdoQTIWee++KWrn4zECJdn3x+J/4Y8usipusTWTWAWWngANqK14P7FMGcYkU6fZxAlVs3YTs11PR2liCJdUwU0Q2xYiXccogFhSgIm5RWLWlGZFVhctZZVaZBZXzC1CgNl/ppCgJ7AS9Ef1k0sg54exE2R8TwlGTsiqi5nLIWBjsNP4eE1WbGmIDGenfZLICumsBNj7Y5f/ysQPdzdKfyArAIYOVYCMBe7HDHM3CkCIbJdo0cQOdTfKNENWWn9o/Lpfq7jAUmM3REKtQs0xWqqOKmZxJlCadie+xGcNczfq8i35yzpUE7skcqrQ9W40pbAct9vtbjQF3n0+1N1oCfDJsT3H6GTwfGAmUCWNEz7yAx/gdjEN5otJAAAAAElFTkSuQmCC" width="15" height="15"> Teilen</a></li>
                                            <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/includes/loeschen.php?var=<?php echo $dateiname[0]; ?>"><img class="icon icons8-Delete" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABGklEQVRoQ+2Z3Q2CQBCEhwosQUuwEy1BO7AUO9ASpBNL0A60As0ZeNKE/c4DAw7Pw+787G5IqDTypxo5f1nArxN0AlNLYCPp0CHqKGlbSnjJEYqQb3kXE0EEPEq5FqwT4hYCNQ0tIOh8CwuZGwJNJQFo4DBwksAwjGCXHAF9LzPihMAD7QLihMAWEJtvZCoCOwEn8O6ARyg2FQiFTEVgL3EsCGQqAjsBJ+Az+nLAn9Mdq4AOCwL7CvkK+Qr5CkW2AB0WBPYVivgv9t/uLxO4SZrFzMSoq6QFeSsngZOkFWkCsLWkNcCzeWsKJ4fOPaRwl7SUdOlbQKqfROybhnPS8AM2jU0yZEfJp1o5I/Ql37KvW0BZP3m10SfwBGTHLTF2D3mmAAAAAElFTkSuQmCC" width="15" height="15"> Löschen</a></li>
                                        </ul>
                                    </div>
                                    <!-- Ende: Dropdown Menü für jede einzelne Datei -->
                                </td>
                                <td align="right"><?php echo $dateigroesse[0];?> mb</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Ende: Ergebnis der Datenbankabfrage per while Schleife in Tabelle ausgeben -->

    </body>
</html>