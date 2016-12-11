<!-- Start Include Dateien -->
<?php include ("includes/bsfixednavbar.php"); ?>
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>
<?php include ("includes/connection.php"); ?>
<!-- Ende Include Dateien -->


<!-- Start Dateiübersicht -->
<?php ?>
<!-- Ende Dateiübersicht -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Suchen</title>

</head>

<body>
</br></br>

<!-- Start Datenbankabfrage für Dateianzeige -->
<?php
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dateiname FROM dbdateien WHERE dateiname LIKE '%g%'"); // User ID aus session in Variable speichern und hier eingeben
$statement->execute();
$statement->fetch();
?>
<!-- Ende Datenbankabfrage für Dateianzeige -->

<div class="container-fluid">
    <div class="col-lg-12">
        <h3><u>Datei suchen</u></h3>
        <form>
            <div class="form-group">
                <input type="text" class="from-control" placeholder="Suchen"
            </div>
            <button type="submit" class="btn btn-default">Suchen</button>
        </form>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Suchergebnis</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> Dateiname-Variable
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/umbenennen.php">Umbenennen</a></li>
                            <li><a href="#">Herunterladen</a></li>
                            <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/teilen.php">Teilen</a></li>
                            <li><a href="#">Löschen</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>




</body>
</html>