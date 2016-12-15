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
$suchbegriff = $_POST['suchbegriff'];




    if(isset($_POST['suchen']) && !empty($suchbegriff) ) {
        //
        $pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
        $statement = $pdo->prepare("SELECT dbdateien.dateiname
                            FROM dbzuweisung INNER JOIN dbdateien 
                            ON dbdateien.dateiid = dbzuweisung.dateiid
                            WHERE dbdateien.dateiname LIKE '%$suchbegriff%' AND dbzuweisung.userid=1"); // User ID aus session in Variable speichern und hier eingeben
        $statement->execute();
    }


    if(isset($_POST['suchen']) && !empty($suchbegriff) ) {
        while ($suchergebnis = $statement->fetch() && $suchergebnis != 0){
        $resultat = $suchergebnis[0];
        }
        else {
            $resultat = "falsche suche";
        }
    }

?>
<!-- Ende Datenbankabfrage für Dateianzeige -->

<div class="container-fluid">
    <div class="col-lg-12">
        <h3><u>Datei suchen</u></h3>
        <form action = suchen.php method="post" role ="form">
            <div class="form-group">
                <input type="text" class="from-control" name="suchbegriff" placeholder="Suchen"
            </div>
            <button type="submit" class="btn btn-default" name="suchen">Suchen</button>
        </form>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Suchergebnis</th>
            </tr>
            </thead>
            <tbody>
            <?php// if(isset($_POST['suchen']) && !empty($suchbegriff) ) { while ($suchergebnis = $statement->fetch()){?>
            <tr>
                <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> <?php  echo $resultat;   //echo $suchergebnis[0];?>
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
            <?php// }}?>
            </tbody>
        </table>
    </div>
</div>




</body>
</html>