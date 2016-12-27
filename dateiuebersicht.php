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
            background-color: rgba(0, 0, 0, 0.3);
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
                                        <li><a href="#">Herunterladen</a></li>
                                        <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php?var=<?php echo $dateiname[0]; ?>">Teilen</a></li>
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