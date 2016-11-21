<!-- Start Include Dateien -->
<?php include ("includes/bsfixednavbar.php"); ?>
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>
<?php include ("includes/connection.php"); ?>
<!-- Ende Include Dateien -->


<!-- Start Datenbankabfrage für Dateianzeige -->
<?php
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dateiname FROM dbdateien WHERE userid =1"); // User ID aus session in Variable speichern und hier eingeben
$statement->execute();
?>
<!-- Ende Datenbankabfrage für Dateianzeige -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Dateiübersicht</title>

</head>

<body>
    </br></br>

    <!-- Start Ergebnis der Datenbankabfrage per while Schleife in Tabelle ausgeben -->
    <div class="container-fluid">
        <h3><u>Dateiübersicht</u></h3>
        <table class="table table-hover">
            <thead>
                <tr>
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
                                <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/umbenennen.php">Umbenennen</a></li>
                                <li><a href="#">Herunterladen</a></li>
                                <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php">Teilen</a></li>
                                <li><a href="#">Löschen</a></li>
                            </ul>
                        </div>
                    </td>
                    <td>Dateigröße-Variable</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Ende Ergebnis der Datenbankabfrage per while Schleife in Tabelle ausgeben -->
</body>
</html>